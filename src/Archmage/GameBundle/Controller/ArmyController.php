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
                    $this->addFlash('danger', 'No tienes turnos suficientes para eso.');
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
                if (!empty($attackerArmy) && $target) {
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
        $manager = $this->getDoctrine()->getManager(); //TODO COMPROBAR SI HAY ALGUN CONFLICTO CON 2 MANAGER TRABAJANDO SOBRE LA MISMA ENTIDAD
        $player = $this->getUser()->getPlayer();
        //MESSAGE
        $text = array();
        //ATTACKER ITEM AND RESEARCH
        if ($attackerResearch) {
            $chance = 100; //TODO CAMBIAR POR DEFENSA MAGICA
            if ($chance > $target->getMagicDefense()) {
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El mago atacante lanza el Hechizo '.$attackerResearch->getSpell()->getName().'.');
            } else {
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El mago atacante no ha logrado lanzar el Hechizo '.$attackerResearch->getSpell()->getName().'.');
            }
        }
        $attackerItem = $target->getItem();
        if ($attackerItem) {
            $chance = 100; //TODO CAMBIAR POR DEFENSA MAGICA
            if ($chance > $target->getMagicDefense()) {
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El mago atacante activa el Artefacto '.$attackerItem->getArtifact()->getName().'.');
            } else {
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El mago atacante no ha logrado activar el Artefacto '.$attackerItem->getArtifact()->getName().'.');
            }
        }
        //DEFENDER ITEM AND RESEARCH
        $defenderResearch = $target->getResearch();
        if ($defenderResearch) {
            $defenderResearch->getSpell()->getFaction() == $target->getFaction() ? $bonus = 1 : $bonus = 2;
            $mana = $defenderResearch->getSpell()->getManaCost() * $bonus;
            if ($mana <= $target->getMana()) {
                $target->setMana($target->getMana() - $mana);
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', 'El mago defensor lanza el Hechizo '.$defenderResearch->getSpell()->getName().'.');
            } else {
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', 'El mago defensor no tiene Maná para lanzar el Hechizo '.$defenderResearch->getSpell()->getName().'.');
                $defenderResearch = null;
            }
        }
        $defenderItem = $target->getItem();
        if ($defenderItem) {
            if ($defenderItem->getQuantity() > 0) {
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', 'El mago defensor activa el Artefacto '.$defenderItem->getArtifact()->getName().'.');
                $defenderItem->setQuantity($defenderItem->getQuantity() - 1);
                if ($defenderItem <= 0) {
                    $target->removeItem($defenderItem);
                    $manager->remove($defenderItem);
                }
            } else {
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', 'El mago defensor no tiene reservas del Artefacto '.$defenderItem->getArtifact()->getName().'.');
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
                if ($skill->getFamily() == $troop->getFamily() || $skill->getType() == $troop->getType()) {
                    $attackBonus += $skill->getAttackBonus();
                    $defenseBonus += $skill->getDefenseBonus();
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            //defender -> attacker research bonuses
            if ($defenderResearch && !$defenderResearch->getSelf()) {
                $skill = $defenderResearch->getSpell()->getSkill();
                if ($skill->getFamily() == $troop->getFamily() || $skill->getType() == $troop->getType()) {
                    $attackBonus += $skill->getAttackBonus();
                    $defenseBonus += $skill->getDefenseBonus();
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            //attacker -> self artifact bonuses
            if ($attackerItem && $attackerItem->getSelf()) {
                $skill = $attackerItem->getSpell()->getSkill();
                if ($skill->getFamily() == $troop->getFamily() || $skill->getType() == $troop->getType()) {
                    $attackBonus += $skill->getAttackBonus();
                    $defenseBonus += $skill->getDefenseBonus();
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            //defender -> attacker artifact bonuses
            if ($defenderItem && !$defenderItem->getSelf()) {
                $skill = $defenderItem->getSpell()->getSkill();
                if ($skill->getFamily() == $troop->getFamily() || $skill->getType() == $troop->getType()) {
                    $attackBonus += $skill->getAttackBonus();
                    $defenseBonus += $skill->getDefenseBonus();
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            $attackerArmy[] = array(
                $troop,
                $quantity, //$_POST
                $attackBonus,
                $defenseBonus,
                $troop->getUnit()->getSpeed() + $speedBonus,
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
                if ($skill->getFamily() == $troop->getFamily() || $skill->getType() == $troop->getType()) {
                    $attackBonus += $skill->getAttackBonus();
                    $defenseBonus += $skill->getDefenseBonus();
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            //attacker -> defender research bonuses
            if ($defenderResearch && !$defenderResearch->getSelf()) {
                $skill = $defenderResearch->getSpell()->getSkill();
                if ($skill->getFamily() == $troop->getFamily() || $skill->getType() == $troop->getType()) {
                    $attackBonus += $skill->getAttackBonus();
                    $defenseBonus += $skill->getDefenseBonus();
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            //defender -> self artifact bonuses
            if ($attackerItem && $attackerItem->getSelf()) {
                $skill = $attackerItem->getSpell()->getSkill();
                if ($skill->getFamily() == $troop->getFamily() || $skill->getType() == $troop->getType()) {
                    $attackBonus += $skill->getAttackBonus();
                    $defenseBonus += $skill->getDefenseBonus();
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            //attacker -> defender artifact bonuses
            if ($defenderItem && !$defenderItem->getSelf()) {
                $skill = $defenderItem->getSpell()->getSkill();
                if ($skill->getFamily() == $troop->getFamily() || $skill->getType() == $troop->getType()) {
                    $attackBonus += $skill->getAttackBonus();
                    $defenseBonus += $skill->getDefenseBonus();
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            $defenderArmy[] = array(
                $troop,
                $troop->getQuantity(), //ALL
                $attackBonus,
                $defenseBonus,
                $troop->getUnit()->getSpeed() + $speedBonus,
            );
        }
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
            $text[] = array('default', 12, 0, 'center', 'Ronda '.($i+1).'/'.$rounds.': <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"> '.$attackerTroop->getUnit()->getName().'</span> con '.$attackerSpeed.' Velocidad contra <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getCLass().'">'.$defenderTroop->getUnit()->getName().'</span> con '.$defenderSpeed.' Velocidad');
            if ($attackerSpeed == $defenderSpeed) {
                //atacante igual velocidad que defensor, atacan y defienden a la vez
                //atacante => defensor
                $defenderCasualties = min($defenderQuantity, (int)floor($attackerAttack / $defenderTroop->getUnit()->getDefense()));
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', $this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'">'.$attackerTroop->getUnit()->getName().'</span> impactan con '.$this->get('service.controller')->nf($attackerAttack).' ataque a '.$this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'">'.$defenderTroop->getUnit()->getName().'</span> con '.$this->get('service.controller')->nf($defenderDefense).' defensa, matando a '.$this->get('service.controller')->nf($defenderCasualties).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'">'.$defenderTroop->getUnit()->getName().'</span>');
                //defensor => atacante
                $attackerCasualties = min($attackerQuantity, (int)floor($defenderAttack / $attackerTroop->getUnit()->getDefense()));
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', $this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'">'.$defenderTroop->getUnit()->getName().'</span> impactan con '.$this->get('service.controller')->nf($defenderAttack).' ataque a '.$this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'">'.$attackerTroop->getUnit()->getName().'</span> con '.$this->get('service.controller')->nf($attackerDefense).' defensa, matando a '.$this->get('service.controller')->nf($attackerCasualties).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'">'.$attackerTroop->getUnit()->getName().'</span>');
                //modifico por referencia
                $attackerQuantity -= $attackerCasualties;
                $defenderQuantity -= $defenderCasualties;
            }
            if ($attackerSpeed > $defenderSpeed) {
                //atacante mayor velocidad que defensor, atacante ataca primero
                //atacante => defensor
                $defenderCasualties = min($defenderQuantity, (int)floor($attackerAttack / $defenderTroop->getUnit()->getDefense()));
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', $this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'">'.$attackerTroop->getUnit()->getName().'</span> impactan con '.$this->get('service.controller')->nf($attackerAttack).' ataque a '.$this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'">'.$defenderTroop->getUnit()->getName().'</span> con '.$this->get('service.controller')->nf($defenderDefense).' defensa, matando a '.$this->get('service.controller')->nf($defenderCasualties).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'">'.$defenderTroop->getUnit()->getName().'</span>');
                //modifico por referencia
                $defenderQuantity -= $defenderCasualties;
                //recalculamos ataque del defensor por si ha sufrido bajas
                $defenderAttack = $defenderTroop->getUnit()->getAttack() * $defenderQuantity; //TODO BONUS
                //defensor => atacante
                $attackerCasualties = min($attackerQuantity, (int)floor($defenderAttack / $attackerTroop->getUnit()->getDefense()));
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', $this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'">'.$defenderTroop->getUnit()->getName().'</span> impactan con '.$this->get('service.controller')->nf($defenderAttack).' ataque a '.$this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'">'.$attackerTroop->getUnit()->getName().'</span> con '.$this->get('service.controller')->nf($attackerDefense).' defensa, matando a '.$this->get('service.controller')->nf($attackerCasualties).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'">'.$attackerTroop->getUnit()->getName().'</span>');
                //modifico por referencia
                $attackerQuantity -= $attackerCasualties;
            }
            if ($attackerSpeed < $defenderSpeed) {
                //atacante menor velocidad que defensor, defensor ataca primero
                //defensor => atacante
                $attackerCasualties = min($attackerQuantity, (int)floor($defenderAttack / $attackerTroop->getUnit()->getDefense()));
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', $this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'">'.$defenderTroop->getUnit()->getName().'</span> impactan con '.$this->get('service.controller')->nf($defenderAttack).' ataque a '.$this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'">'.$attackerTroop->getUnit()->getName().'</span> con '.$this->get('service.controller')->nf($attackerDefense).' defensa, matando a '.$this->get('service.controller')->nf($attackerCasualties).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'">'.$attackerTroop->getUnit()->getName().'</span>');
                //modifico por referencia
                $attackerQuantity -= $attackerCasualties;
                //recalculamos ataque del atacante por si ha sufrido bajas y contraatacamos
                $attackerAttack = $attackerTroop->getUnit()->getAttack() * $attackerQuantity; //TODO BONUS
                //atacante => defensor
                $defenderCasualties = min($defenderQuantity, (int)floor($attackerAttack / $defenderTroop->getUnit()->getDefense()));
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', $this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'">'.$attackerTroop->getUnit()->getName().'</span> impactan con '.$this->get('service.controller')->nf($attackerAttack).' ataque a '.$this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'">'.$defenderTroop->getUnit()->getName().'</span> con '.$this->get('service.controller')->nf($defenderDefense).' defensa, matando a '.$this->get('service.controller')->nf($defenderCasualties).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'">'.$defenderTroop->getUnit()->getName().'</span>');
                //modifico por referencia
                $defenderQuantity -= $defenderCasualties;
            }
            //siguiente ronda
            $attackerTurn++;
            $defenderTurn++;
        }
        $this->get('service.controller')->sendMessage($player, $player, 'Reporte de Batalla', $text); //TODO CAMBIAR PLAYER POR TARGET
    }
}
