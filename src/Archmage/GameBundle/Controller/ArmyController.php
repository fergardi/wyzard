<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Message;

class ArmyController extends Controller
{
    /**
     * @Route("/game/army/recruit")
     * @Template("ArchmageGameBundle:Army:recruit.html.twig")
     */
    public function recruitAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $neutral = $manager->getRepository('ArchmageGameBundle:Faction')->findOneByName('Neutral');
        $units = $manager->getRepository('ArchmageGameBundle:Unit')->findByFaction($neutral);
        if ($request->isMethod('POST')) {
            $quantity = isset($_POST['quantity'])?$_POST['quantity']:null;
            $unit = isset($_POST['unit'])?$_POST['unit']:null;
            $unit = $manager->getRepository('ArchmageGameBundle:Unit')->findOneById($unit);
            if ($unit && $quantity && is_numeric($quantity) && $quantity > 0) {
                $turns = ceil($quantity / max($player->getConstruction('Barracones')->getQuantity(), 1));
                $gold = $unit->getGoldRecruit() * $quantity;
                if ($turns <= $player->getTurns() && $gold <= $player->getGold()) {
                    /*
                     * MANTENIMIENTOS
                     */
                    $player->setTurns($player->getTurns() - $turns);
                    $player->setGold($player->getGold() - $gold);
                    $this->get('service.controller')->checkMaintenances($turns);
                    /*
                     * ACCION
                     */
                    $troop = $player->hasUnit($unit);
                    if ($troop) {
                        $troop->setQuantity($troop->getQuantity() + $quantity);
                    } else {
                        if ($player->getTroops()->count() < $player::TROOPS_CAP) {
                            $troop = new Troop();
                            $manager->persist($troop);
                            $troop->setUnit($unit);
                            $troop->setQuantity($quantity);
                            $troop->setPlayer($player);
                            $player->addTroop($troop);
                        } else {
                            $this->addFlash('danger', 'No puedes tener más de '.$player::TROOPS_CAP.' tropas distintas al mismo tiempo, debes <i class="fa fa-fw fa-user-times"></i><a href='.$this->generateUrl('archmage_game_army_disband').'>Desbandar</a> alguna.');
                            return $this->redirect($this->generateUrl('archmage_game_army_recruit'));
                        }
                    }
                    /*
                     * PERSISTENCIA
                     */
                    $manager->persist($player);
                    $manager->flush();
                    $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> y '.$this->get('service.controller')->nf($gold).' <span class="label label-extra">Oro</span> en reclutar '.$this->get('service.controller')->nf($quantity).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
                } else {
                    $this->addFlash('danger', 'No tienes los <span class="label label-extra">Recursos</span> suficientes para eso.');
                }
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            //return $this->redirect($this->generateUrl('archmage_game_army_recruit'));
        }
        return array(
            'player' => $player,
            'units' => $units,
        );
    }

    /**
     * @Route("/game/army/disband")
     * @Template("ArchmageGameBundle:Army:disband.html.twig")
     */
    public function disbandAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        if ($request->isMethod('POST')) {
            $turns = 0;
            $quantity = isset($_POST['quantity'])?$_POST['quantity']:null;
            $troop = isset($_POST['troop'])?$_POST['troop']:null;
            $troop = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop);
            if ($turns <= $player->getTurns()) {
                if ($troop && $quantity && is_numeric($quantity) && $quantity > 0 && $quantity <= $troop->getQuantity()) {
                    /*
                     * MANTENIMIENTOS
                     */
                    $player->setTurns($player->getTurns() - $turns);
                    $this->get('service.controller')->checkMaintenances($turns);
                    /*
                     * ACCION
                     */
                    $troop->setQuantity($troop->getQuantity() - $quantity);
                    if ($troop->getQuantity() <= 0) {
                        $player->removeTroop($troop);
                        $manager->remove($troop);
                    }
                    /*
                     * PERSISTENCIA
                     */
                    $manager->persist($player);
                    $manager->flush();
                    $this->addFlash('success', 'Has gastado ' . $this->get('service.controller')->nf($turns) . ' turnos y desbandado ' . $this->get('service.controller')->nf($quantity) . ' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
                } else {
                    $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
                }
            }
            else{
                $this->addFlash('danger', 'No tienes los <span class="label label-extra">Turnos</span> suficientes para eso.');
            }
            //return $this->redirect($this->generateUrl('archmage_game_army_disband'));
        }
        return array(
            'player' => $player,
        );
    }

    /**
     * @Route("/game/army/attack")
     * @Template("ArchmageGameBundle:Army:attack.html.twig")
     */
    public function attackAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $targets = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
        if ($request->isMethod('POST')) {
            $turns = 2;
            $target = isset($_POST['target'])?$_POST['target']:null;
            $target = $manager->getRepository('ArchmageGameBundle:Player')->findOneById($target);
            $attackerResearch = isset($_POST['research'])?$_POST['research']:null;
            $attackerResearch = $manager->getRepository('ArchmageGameBundle:Research')->findOneById($attackerResearch);
            $mana = 0;
            if ($attackerResearch) {
                $attackerResearch->getSpell()->getFaction() == $player->getFaction() ? $bonus = 1 : $bonus = 2;
                $mana = $attackerResearch->getSpell()->getManaCost() * $bonus;
            }
            $attackerItem = isset($_POST['item'])?$_POST['item']:null;
            $attackerItem = $manager->getRepository('ArchmageGameBundle:Item')->findOneById($attackerItem);
            if ($attackerItem) {
                $attackerItem->setQuantity($attackerItem->getQuantity() - 1);
                if ($attackerItem->getQuantity() <= 0) {
                    $player->removeItem($attackerItem);
                    $manager->remove($attackerItem);
                }
            }
            if ($turns <= $player->getTurns() && $mana <= $player->getMana()) {
                /*
                 * MANTENIMIENTOS
                 */
                $player->setTurns($player->getTurns() - $turns);
                $player->setMana($player->getMana() - $mana);
                $this->get('service.controller')->checkMaintenances($turns);
                /*
                 * ACCION
                 */
                $attackerArmy = array();
                //tropa1
                $troop1 = isset($_POST['troop1'])?$_POST['troop1']:null;
                $troop1 = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop1);
                $quantity1 = isset($_POST['quantity1'])?$_POST['quantity1']:null;
                if ($troop1 && $quantity1 > 0) $attackerArmy[] = array($troop1, $quantity1);
                //tropa2
                $troop2 = isset($_POST['troop2'])?$_POST['troop2']:null;
                $troop2 = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop2);
                $quantity2 = isset($_POST['quantity2'])?$_POST['quantity2']:null;
                if ($troop2 && $quantity2 > 0) $attackerArmy[] = array($troop2, $quantity2);
                //tropa3
                $troop3 = isset($_POST['troop3'])?$_POST['troop3']:null;
                $troop3 = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop3);
                $quantity3 = isset($_POST['quantity3'])?$_POST['quantity3']:null;
                if ($troop3 && $quantity3 > 0) $attackerArmy[] = array($troop3, $quantity3);
                //tropa4
                $troop4 = isset($_POST['troop4'])?$_POST['troop4']:null;
                $troop4 = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop4);
                $quantity4 = isset($_POST['quantity4'])?$_POST['quantity4']:null;
                if ($troop4 && $quantity4 > 0) $attackerArmy[] = array($troop4, $quantity4);
                //tropa5
                $troop5 = isset($_POST['troop5'])?$_POST['troop5']:null;
                $troop5 = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop5);
                $quantity5 = isset($_POST['quantity5'])?$_POST['quantity5']:null;
                if ($troop5 && $quantity5 > 0) $attackerArmy[] = array($troop5, $quantity5);
                //quantity > 0
                if ($player->getTroops()->count() > 0 && !empty($attackerArmy) && $target) {
                    $chance = 100;
                    //$chance = rand(0,99); //TODO CAMBIAR POR RAND
                    if ($chance >= $target->getArmyDefense()) {
                        $this->attackTarget($attackerArmy, $attackerResearch, $attackerItem, $target);
                        $manager->persist($target);
                        $this->addFlash('danger', 'Has gastado '.$turns.' <span class="label label-extra">Turnos</span> en atacar al mago <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                    } else {
                        $this->addFlash('danger', 'Has gastado '.$turns.' <span class="label label-extra">Turnos</span> en atacar, pero no has conseguido traspasar las Fortalezas de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                    }
                    /*
                     * PERSISTENCIA
                     */
                    $manager->persist($player);
                    $manager->flush();
                } else {
                    $this->addFlash('danger', 'Debes atacar con al menos 1 unidad.');
                }
            } else {
                $this->addFlash('danger', 'No tienes los <span class="label label-extra">Recursos</span> necesarios para eso.');
            }
            return $this->redirect($this->generateUrl('archmage_game_army_attack'));
        }
        return array(
            'player' => $player,
            'targets' => $targets,
        );
    }

    /**
     * usort sorting function
     */
    function sortBySpeed($row1, $row2)
    {
        return ($row1[4] >= $row2[4]) ? -1 : 1;
    }

    /**
     * attackTarget, battle only
     */
    public function attackTarget($attacker, $attackerResearch, $attackerItem, $target)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        //MESSAGE
        $text = array();
        $text[] = array('default', 12, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> ataca a <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
        //ATTACKER ITEM AND RESEARCH
        if ($attackerResearch) {
            $chance = rand(0,99);
            if ($chance > $target->getMagicDefense()) {
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El mago atacante lanza el Hechizo <span class="label label-'.$attackerResearch->getSpell()->getFaction()->getClass().'">'.$attackerResearch->getSpell()->getName().'</span>.');
            } else {
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El mago atacante no ha logrado lanzar el Hechizo <span class="label label-'.$attackerResearch->getSpell()->getFaction()->getClass().'">'.$attackerResearch->getSpell()->getName().'</span>.');
            }
        }
        if ($attackerItem) {
            $chance = rand(0,99);
            if ($chance > $target->getMagicDefense()) {
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El mago atacante activa el Artefacto <span class="label label-'.$attackerItem->getArtifact()->getFaction()->getClass().'">'.$attackerItem->getArtifact()->getName().'</span>.');
            } else {
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El mago atacante no ha logrado activar el Artefacto <span class="label label-'.$attackerItem->getArtifact()->getFaction()->getClass().'">'.$attackerItem->getArtifact()->getName().'</span>.');
            }
        }
        //DEFENDER ITEM AND RESEARCH
        $defenderResearch = $target->getResearch();
        if ($defenderResearch) {
            $defenderResearch->getSpell()->getFaction() == $target->getFaction() ? $bonus = 1 : $bonus = 2;
            $mana = $defenderResearch->getSpell()->getManaCost() * $bonus;
            if ($mana <= $target->getMana()) {
                $target->setMana($target->getMana() - $mana);
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', 'El mago defensor lanza el Hechizo <span class="label label-'.$defenderResearch->getSpell()->getFaction()->getClass().'">'.$defenderResearch->getSpell()->getName().'</span>.');
            } else {
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', 'El mago defensor no tiene Maná para lanzar el Hechizo <span class="label label-'.$defenderResearch->getSpell()->getFaction()->getClass().'">'.$defenderResearch->getSpell()->getName().'</span>.');
                $defenderResearch = null;
            }
        }
        $defenderItem = $target->getItem();
        if ($defenderItem) {
            if ($defenderItem->getQuantity() > 0) {
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', 'El mago defensor activa el Artefacto <span class="label label-'.$defenderItem->getArtifact()->getFaction()->getClass().'">'.$defenderItem->getArtifact()->getName().'</span>.');
                $defenderItem->setQuantity($defenderItem->getQuantity() - 1);
                if ($defenderItem <= 0) {
                    $target->removeItem($defenderItem);
                    $manager->remove($defenderItem);
                }
            } else {
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', 'El mago defensor no tiene reservas del Artefacto <span class="label label-'.$defenderItem->getArtifact()->getFaction()->getClass().'">'.$defenderItem->getArtifact()->getName().'</span>.');
            }
        }
        //ATTACKER
        $attackerArmy = array();
        foreach ($attacker as $arr) {
            $troop = $arr[0];
            $quantity = $arr[1];
            //base bonuses
            $attackBonus = 0;
            $defenseBonus = 0;
            $speedBonus = 0;
            //attacker -> self research bonuses
            if ($attackerResearch && $attackerResearch->getSelf()) {
                $skill = $attackerResearch->getSpell()->getSkill();
                if ($skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType()) {
                    $attackBonus += $skill->getAttackBonus() * $player->getMagic();
                    $defenseBonus += $skill->getDefenseBonus() * $player->getMagic();
                    $speedBonus += $skill->getSpeedBonus() * $player->getMagic();
                }
            }
            //defender -> attacker research bonuses
            if ($defenderResearch && !$defenderResearch->getSelf()) {
                $skill = $defenderResearch->getSpell()->getSkill();
                if ($skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType()) {
                    $attackBonus += $skill->getAttackBonus() * $target->getMagic();
                    $defenseBonus += $skill->getDefenseBonus() * $target->getMagic();
                    $speedBonus += $skill->getSpeedBonus() * $target->getMagic();
                }
            }
            //attacker -> self artifact bonuses
            if ($attackerItem && $attackerItem->getSelf()) {
                $skill = $attackerItem->getSpell()->getSkill();
                if ($skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType()) {
                    $attackBonus += $skill->getAttackBonus();
                    $defenseBonus += $skill->getDefenseBonus();
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            //defender -> attacker artifact bonuses
            if ($defenderItem && !$defenderItem->getSelf()) {
                $skill = $defenderItem->getSpell()->getSkill();
                if ($skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType()) {
                    $attackBonus += $skill->getAttackBonus();
                    $defenseBonus += $skill->getDefenseBonus();
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            //attacker -> self hero bonuses
            foreach ($player->getContracts() as $contract) {
                $skill = $contract->getHero()->getSkill();
                if ($skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType()) {
                    $attackBonus += $skill->getAttackBonus() * $contract->getLevel();
                    $defenseBonus += $skill->getDefenseBonus() * $contract->getLevel();
                    $speedBonus += $skill->getSpeedBonus() * $contract->getLevel();
                }
            }
            $attackerArmy[] = array(
                $troop,
                $quantity, //$_POST
                $attackBonus,
                $defenseBonus,
                $troop->getUnit()->getSpeed() + $speedBonus, //total porque hay que ordenarlo por speed
            );
        }
        //DEFENDER
        $defenderArmy = array();
        foreach ($target->getTroops() as $troop) {
            //base bonuses
            $attackBonus = 0;
            $defenseBonus = 0;
            $speedBonus = 0;
            //defender -> self research bonuses
            if ($defenderResearch && $defenderResearch->getSelf()) {
                $skill = $defenderResearch->getSpell()->getSkill();
                if ($skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType()) {
                    $attackBonus += $skill->getAttackBonus() * $target->getMagic();
                    $defenseBonus += $skill->getDefenseBonus() * $target->getMagic();
                    $speedBonus += $skill->getSpeedBonus() * $target->getMagic();
                }
            }
            //attacker -> defender research bonuses
            if ($defenderResearch && !$defenderResearch->getSelf()) {
                $skill = $defenderResearch->getSpell()->getSkill();
                if ($skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType()) {
                    $attackBonus += $skill->getAttackBonus() * $player->getMagic();
                    $defenseBonus += $skill->getDefenseBonus() * $player->getMagic();
                    $speedBonus += $skill->getSpeedBonus() * $player->getMagic();
                }
            }
            //defender -> self artifact bonuses
            if ($attackerItem && $attackerItem->getSelf()) {
                $skill = $attackerItem->getSpell()->getSkill();
                if ($skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType()) {
                    $attackBonus += $skill->getAttackBonus();
                    $defenseBonus += $skill->getDefenseBonus();
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            //attacker -> defender artifact bonuses
            if ($defenderItem && !$defenderItem->getSelf()) {
                $skill = $defenderItem->getSpell()->getSkill();
                if ($skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType()) {
                    $attackBonus += $skill->getAttackBonus();
                    $defenseBonus += $skill->getDefenseBonus();
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            //defender -> self hero bonuses
            foreach ($target->getContracts() as $contract) {
                $skill = $contract->getHero()->getSkill();
                if ($skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType()) {
                    $attackBonus += $skill->getAttackBonus() * $contract->getLevel();
                    $defenseBonus += $skill->getDefenseBonus() * $contract->getLevel();
                    $speedBonus += $skill->getSpeedBonus() * $contract->getLevel();
                }
            }
            $defenderArmy[] = array(
                $troop,
                $troop->getQuantity(), //ALL
                $attackBonus,
                $defenseBonus,
                $troop->getUnit()->getSpeed() + $speedBonus, //total porque hay que ordenarlo por speed
            );
        }
        //POWER BEFORE
        $attackerPowerBefore = 0;
        foreach ($attackerArmy as $troop) {
            $attackerPowerBefore += $troop[0]->getUnit()->getPower() * $troop[1];
        }
        $defenderPowerBefore = 0;
        foreach ($defenderArmy as $troop) {
            $defenderPowerBefore += $troop[0]->getUnit()->getPower() * $troop[1];
        }
        //BATTLE
        if (!empty($defenderArmy)) {
            //ORDERING BY SPEED
            usort($attackerArmy, array($this, "sortBySpeed"));
            usort($defenderArmy, array($this, "sortBySpeed"));
            //BATTLE
            $attackerTurn = 0;
            $defenderTurn = 0;
            $rounds = max(count($attackerArmy), count($defenderArmy));
            for ($i = 0; $i < $rounds; $i++) {
                //si ya no nos quedan tropas volvemos a empezar
                if (!array_key_exists($attackerTurn, $attackerArmy)) $attackerTurn = 0;
                if (!array_key_exists($defenderTurn, $defenderArmy)) $defenderTurn = 0;
                $attackerTroop = $attackerArmy[$attackerTurn][0];
                //paso por referencia para modificar directamente los valores del array para la siguiente ronda
                $attackerQuantity = &$attackerArmy[$attackerTurn][1];
                $attackerAttack = $attackerTroop->getUnit()->getAttack() * $attackerQuantity; //TODO BONUS
                $attackerDefense = $attackerTroop->getUnit()->getDefense() * $attackerQuantity; //TODO BONUS
                $attackerSpeed = $attackerArmy[$attackerTurn][4];
                $defenderTroop = $defenderArmy[$defenderTurn][0];
                //paso por referencia para modificar directamente los valores del array para la siguiente ronda
                $defenderQuantity = &$defenderArmy[$defenderTurn][1];
                $defenderAttack = $defenderTroop->getUnit()->getAttack() * $defenderQuantity; //TODO BONUS
                $defenderDefense = $defenderTroop->getUnit()->getDefense() * $defenderQuantity; //TODO BONUS
                $defenderSpeed = $defenderArmy[$defenderTurn][4];
                //comprobar velocidades
                $text[] = array('default', 12, 0, 'center', 'Ronda '.($i+1).'/'.$rounds.': <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"> '.$attackerTroop->getUnit()->getName().'</span> <i class="fa fa-fw fa-bolt"></i>'.$attackerSpeed.' vs <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getCLass().'">'.$defenderTroop->getUnit()->getName().'</span> <i class="fa fa-fw fa-bolt"></i>'.$defenderSpeed);
                if ($attackerSpeed == $defenderSpeed) {
                    //atacante igual velocidad que defensor, atacan y defienden a la vez
                    //atacante => defensor
                    $defenderCasualties = min($defenderQuantity, (int)floor($attackerAttack / $defenderTroop->getUnit()->getDefense()));
                    $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', $this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($attackerAttack).' <i class="fa fa-fw fa-crosshairs"></i> a '.$this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($defenderDefense).' <i class="fa fa-fw fa-shield"></i>, matando a '.$this->get('service.controller')->nf($defenderCasualties).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span>');
                    //defensor => atacante
                    $attackerCasualties = min($attackerQuantity, (int)floor($defenderAttack / $attackerTroop->getUnit()->getDefense()));
                    $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', $this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($defenderAttack).' <i class="fa fa-fw fa-crosshairs"></i> a '.$this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($attackerDefense).' <i class="fa fa-fw fa-shield"></i>, matando a '.$this->get('service.controller')->nf($attackerCasualties).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span>');
                    //modifico por referencia
                    $attackerQuantity -= $attackerCasualties;
                    $defenderQuantity -= $defenderCasualties;
                }
                if ($attackerSpeed > $defenderSpeed) {
                    //atacante mayor velocidad que defensor, atacante ataca primero
                    //atacante => defensor
                    $defenderCasualties = min($defenderQuantity, (int)floor($attackerAttack / $defenderTroop->getUnit()->getDefense()));
                    $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', $this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($attackerAttack).' <i class="fa fa-fw fa-crosshairs"></i> a '.$this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($defenderDefense).' <i class="fa fa-fw fa-shield"></i>, matando a '.$this->get('service.controller')->nf($defenderCasualties).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span>');
                    //modifico por referencia
                    $defenderQuantity -= $defenderCasualties;
                    //recalculamos ataque del defensor por si ha sufrido bajas
                    $defenderAttack = $defenderTroop->getUnit()->getAttack() * $defenderQuantity; //TODO BONUS
                    //defensor => atacante
                    $attackerCasualties = min($attackerQuantity, (int)floor($defenderAttack / $attackerTroop->getUnit()->getDefense()));
                    $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', $this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($defenderAttack).' <i class="fa fa-fw fa-crosshairs"></i> a '.$this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($attackerDefense).' <i class="fa fa-fw fa-shield"></i>, matando a '.$this->get('service.controller')->nf($attackerCasualties).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span>');
                    //modifico por referencia
                    $attackerQuantity -= $attackerCasualties;
                }
                if ($attackerSpeed < $defenderSpeed) {
                    //atacante menor velocidad que defensor, defensor ataca primero
                    //defensor => atacante
                    $attackerCasualties = min($attackerQuantity, (int)floor($defenderAttack / $attackerTroop->getUnit()->getDefense()));
                    $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', $this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($defenderAttack).' <i class="fa fa-fw fa-crosshairs"></i> a '.$this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($attackerDefense).' <i class="fa fa-fw fa-shield"></i>, matando a '.$this->get('service.controller')->nf($attackerCasualties).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span>');
                    //modifico por referencia
                    $attackerQuantity -= $attackerCasualties;
                    //recalculamos ataque del atacante por si ha sufrido bajas y contraatacamos
                    $attackerAttack = $attackerTroop->getUnit()->getAttack() * $attackerQuantity; //TODO BONUS
                    //atacante => defensor
                    $defenderCasualties = min($defenderQuantity, (int)floor($attackerAttack / $defenderTroop->getUnit()->getDefense()));
                    $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', $this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($attackerAttack).' <i class="fa fa-fw fa-crosshairs"></i> a '.$this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($defenderDefense).' <i class="fa fa-fw fa-shield"></i>, matando a '.$this->get('service.controller')->nf($defenderCasualties).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span>');
                    //modifico por referencia
                    $defenderQuantity -= $defenderCasualties;
                }
                //siguiente ronda
                $attackerTurn++;
                $defenderTurn++;
            }
            //UPDATE ARMIES
            foreach ($attackerArmy as $row) {
                $troop = $player->hasTroop($row[0]);
                $troop->setQuantity($row[1]);
                if ($troop->getQuantity() <= 0) {
                    $player->removeTroop($troop);
                    $manager->remove($troop);
                }
            }
            foreach ($defenderArmy as $row) {
                $troop = $target->hasTroop($row[0]);
                $troop->setQuantity($row[1]);
                if ($troop->getQuantity() <= 0) {
                    $target->removeTroop($troop);
                    $manager->remove($troop);
                }
            }
        }
        //POWER AFTER
        $attackerPowerAfter = 0;
        foreach ($attackerArmy as $troop) {
            $attackerPowerAfter += $troop[0]->getUnit()->getPower() * $troop[1];
        }
        $defenderPowerAfter = 0;
        foreach ($defenderArmy as $troop) {
            $defenderPowerAfter += $troop[0]->getUnit()->getPower() * $troop[1];
        }
        //CONDICIONES DE VICTORIA
        $attackerPower = abs($attackerPowerBefore - $attackerPowerAfter);
        $defenderPower = abs($defenderPowerBefore - $defenderPowerAfter);
        if ($attackerPower <= $defenderPower) {
            //VICTORIA TOTAL, robo de edificios
            if ($attackerPower * 1.30 <= $defenderPower) {
                $percent = 5;
                foreach ($player->getConstructions() as $attackerConstruction) {
                    $defenderConstruction = $target->getConstruction($attackerConstruction->getBuilding()->getName());
                    $new = $defenderConstruction->getQuantity() * $percent / 100;
                    $defenderConstruction->setQuantity($defenderConstruction->getQuantity() - $new);
                    $attackerConstruction->setQuantity($attackerConstruction->getQuantity() + $new);
                }
                $text[] = array('default', 12, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> gana el ataque y roba un '.$percent.'% de los edificios de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
            //VICTORIA SIMPLE, nada
            } else {
                $text[] = array('default', 12, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> gana el ataque contra <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>, pero no consigue robar nada.');
            }
            //HEROES TRAS COMBATE VICTORIOSO
            foreach ($player->getContracts() as $contract) {
                $skill = $contract->getHero()->getSkill();
                if ($skill->getBattle()) {
                    if ($skill->getPeopleBonus() < 0) {
                        $people = $contract->getLevel() * $skill->getPeopleBonus() * $target->getPeople() / 100;
                        $target->setPeople($target->getPeople() + $people);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El Héroe <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> elimina '.$this->get('service.controller')->nf($people).' <span class="label label-extra">Personas</span> a <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                    }
                    if ($skill->getGoldBonus() < 0) {
                        $gold = $contract->getLevel() * $skill->getGoldBonus() * $target->getGold() / 100;
                        $target->setGold($target->getGold() + $gold);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El Héroe <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> elimina '.$this->get('service.controller')->nf($gold).' <span class="label label-extra">Oro</span> a <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                    }
                    if ($skill->getManaBonus() < 0) {
                        $mana = $contract->getLevel() * $skill->getManaBonus() * $target->getMana() / 100;
                        $target->setMana($target->getMana() + $mana);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El Héroe <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> elimina '.$this->get('service.controller')->nf($mana).' <span class="label label-extra">Maná</span> a <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                    }
                    if ($skill->getTurnsBonus() < 0) {
                        $turns = $contract->getLevel() * $skill->getTurnsBonus() * $target->getTurns() / 100;
                        $target->setTurns($target->getTurns() + $turns);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El Héroe <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> elimina '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> a <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                    }
                    if ($skill->getTerrainBonus() < 0) {
                        $free = $contract->getLevel() * $skill->getTerrainBonus() * $target->getFree() / 100;
                        $target->setConstruction('Tierras', $target->getFree() + $free);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El Héroe <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> elimina '.$this->get('service.controller')->nf($free).' <span class="label label-extra">Tierras</span> a <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                    }
                }
            }
            if ($target->getHeroes() > 0) {
                $contracts = $target->getContracts()->toArray();
                shuffle($contracts);
                $contract = $contracts[0]; //suponemos > 0
                $contract->setLevel($contract->getLevel() - 1);
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', 'El Héroe <span class="label label-' . $contract->getHero()->getFaction()->getClass() . '"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">' . $contract->getHero()->getName() . '</a></span> pierde un nivel.');
                if ($contract->getLevel() <= 0) {
                    $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', 'El Héroe <span class="label label-' . $contract->getHero()->getFaction()->getClass() . '"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">' . $contract->getHero()->getName() . '</a></span> ha muerto.');
                    $target->removeContract($contract);
                    $manager->remove($contract);
                }
            }
        } else {
            //derrota
            $text[] = array('default', 12, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> pierde el ataque contra <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
        }
        $text[] = array('default', 12, 0, 'center', 'Fin del ataque.');
        //mensajes al objetivo y al jugador
        $this->get('service.controller')->sendMessage($player, $target, 'Reporte de Batalla', $text, 'battle');
        $this->get('service.controller')->sendMessage($target, $player, 'Reporte de Batalla', $text, 'battle');
    }
}
