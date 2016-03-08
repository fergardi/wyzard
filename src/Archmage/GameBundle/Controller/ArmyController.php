<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Item;
use Archmage\GameBundle\Entity\Message;
use Archmage\GameBundle\Entity\Attack;
use Archmage\GameBundle\Entity\Player;

class ArmyController extends Controller
{
    /**
     * Const
     */
    const BROKEN_PERCENT = 5;
    const REGULAR_PERCENT = 3;
    const PILLAGE_PERCENT = 6;
    const SIEGE_PERCENT = 9;
    const FACTION_BONUS = 50;
    const TYPE_BONUS = 50;
    const HERO_EXPERIENCE = 50;
    const BONUS_CAP = 0.10;

    /**
     * usort sorting function by speed
     */
    function sortBySpeed($row1, $row2)
    {
        return ($row1[4] >= $row2[4]) ? -1 : 1;
    }

    /**
     * usort sorting function by power
     */
    function sortByPower($row1, $row2)
    {
        return ($row1[0]->getPower() >= $row2[0]->getPower()) ? -1 : 1;
    }

    /**
     * @Route("/game/army/attack")
     * @Template("ArchmageGameBundle:Army:attack.html.twig")
     */
    public function attackAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $targets = $manager->getRepository('ArchmageGameBundle:Player')->findAllValidAttackTargetsByPlayer($player);
        if ($request->isMethod('POST')) {
            $turns = 2;
            $target = isset($_POST['target'])?$_POST['target']:null;
            $target = $manager->getRepository('ArchmageGameBundle:Player')->findOneById($target);
            $type = isset($_POST['type'])?$_POST['type']:null;
            if ($target && in_array($target, $targets) && $type) {
                $attackerResearch = isset($_POST['research']) ? $_POST['research'] : null;
                $attackerResearch = $manager->getRepository('ArchmageGameBundle:Research')->findOneById($attackerResearch);
                $mana = 0;
                if ($attackerResearch) {
                    $attackerResearch->getSpell()->getFaction() == $player->getFaction() ? $bonus = 1 : $bonus = 2;
                    $mana = $attackerResearch->getSpell()->getManaCost() * $bonus;
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
                    $troop1 = isset($_POST['troop1']) ? $_POST['troop1'] : null;
                    $troop1 = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop1);
                    $quantity1 = isset($_POST['quantity1']) ? $_POST['quantity1'] : null;
                    if ($troop1 && $quantity1 > 0) $attackerArmy[] = array($troop1, $quantity1);
                    //tropa2
                    $troop2 = isset($_POST['troop2']) ? $_POST['troop2'] : null;
                    $troop2 = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop2);
                    $quantity2 = isset($_POST['quantity2']) ? $_POST['quantity2'] : null;
                    if ($troop2 && $quantity2 > 0) $attackerArmy[] = array($troop2, $quantity2);
                    //tropa3
                    $troop3 = isset($_POST['troop3']) ? $_POST['troop3'] : null;
                    $troop3 = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop3);
                    $quantity3 = isset($_POST['quantity3']) ? $_POST['quantity3'] : null;
                    if ($troop3 && $quantity3 > 0) $attackerArmy[] = array($troop3, $quantity3);
                    //tropa4
                    $troop4 = isset($_POST['troop4']) ? $_POST['troop4'] : null;
                    $troop4 = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop4);
                    $quantity4 = isset($_POST['quantity4']) ? $_POST['quantity4'] : null;
                    if ($troop4 && $quantity4 > 0) $attackerArmy[] = array($troop4, $quantity4);
                    //tropa5
                    $troop5 = isset($_POST['troop5']) ? $_POST['troop5'] : null;
                    $troop5 = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop5);
                    $quantity5 = isset($_POST['quantity5']) ? $_POST['quantity5'] : null;
                    if ($troop5 && $quantity5 > 0) $attackerArmy[] = array($troop5, $quantity5);
                    //quantity > 0
                    if ($player->getUnits() > 0 && !empty($attackerArmy) && $target) {
                        $chance = rand(0, 99);
                        if ($chance > $target->getArmyDefense()) {
                            $report = null;
                            $attackerItem = isset($_POST['item']) ? $_POST['item'] : null;
                            $attackerItem = $manager->getRepository('ArchmageGameBundle:Item')->findOneById($attackerItem);
                            if ($attackerItem) {
                                $attackerItem->setQuantity($attackerItem->getQuantity() - 1);
                                if ($attackerItem->getQuantity() <= 0) {
                                    if ($player->getItem() && $player->getItem()->getArtifact() == $attackerItem->getArtifact()) $player->setItem(null);
                                    $player->removeItem($attackerItem);
                                    $manager->remove($attackerItem);
                                }
                            }
                            $report = $this->attackTarget($attackerArmy, $attackerResearch, $attackerItem, $target, $type);
                            $manager->persist($target);
                            $this->addFlash('success', 'Has gastado ' . $turns . ' <span class="label label-extra">Turnos</span> en atacar al mago <span class="label label-' . $target->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())) . '" class="link">' . $target->getNick() . '</a></span>.');
                        } else {
                            $broken = floor($target->getConstruction('Fortalezas')->getQuantity() * self::BROKEN_PERCENT / (float)100);
                            $target->setConstruction('Tierras', $target->getFree() + $broken);
                            $target->setConstruction('Fortalezas', max(0, $target->getConstruction('Fortalezas')->getQuantity() - $broken));
                            $this->addFlash('danger', 'No has conseguido traspasar la <span class="label label-extra">Defensa Física</span> de <span class="label label-' . $target->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())) . '" class="link">' . $target->getNick() . '</a></span>, aunque le has destruido algunas <span class="label label-extra">Fortalezas</span>.');
                        }
                        /*
                         * PERSISTENCIA
                         */
                        $manager->persist($player);
                        $manager->flush();
                        //redirect to battle report
                        if ($report != null) return $this->redirect($this->generateUrl('archmage_game_account_message', array('hash' => $report->getHash())));
                    } else {
                        $this->addFlash('danger', 'Debes atacar con al menos 1 unidad.');
                    }
                } else {
                    $this->addFlash('danger', 'No tienes los <span class="label label-extra">Turnos</span> o el <span class="label label-extra">Maná</span> necesarios para eso.');
                }
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_army_attack'));
        }
        return array(
            'player' => $player,
            'targets' => $targets,
        );
    }

    /**
     * @Route("/game/army/disband")
     * @Template("ArchmageGameBundle:Army:disband.html.twig")
     */
    public function disbandAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        if ($request->isMethod('POST')) {
            $quantity = isset($_POST['quantity'])?$_POST['quantity']:null;
            $troop = isset($_POST['troop'])?$_POST['troop']:null;
            $troop = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop);
            $contract = isset($_POST['contract'])?$_POST['contract']:null;
            $contract = $manager->getRepository('ArchmageGameBundle:Contract')->findOneById($contract);
            if (($troop && $player->hasTroop($troop) && $quantity && is_numeric($quantity) && $quantity > 0 && $quantity <= $troop->getQuantity()) || ($contract && $player->hasContract($contract))) {
                /*
                 * ACCION
                 */
                if ($troop) {
                    $troop->setQuantity($troop->getQuantity() - $quantity);
                    $this->addFlash('success', 'Has desbandado ' . $this->get('service.controller')->nff($quantity) . ' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
                    if ($troop->getQuantity() <= 0) {
                        $player->removeTroop($troop);
                        $manager->remove($troop);
                    }
                }
                if ($contract) {
                    $player->removeContract($contract);
                    $this->addFlash('success', 'Has desbandado a <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span>.');
                    $manager->remove($contract);
                }
                /*
                 * PERSISTENCIA
                 */
                $manager->persist($player);
                $manager->flush();

            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_army_disband'));
        }
        return array(
            'player' => $player,
        );
    }

    /**
     * @Route("/game/army/quest")
     * @Template("ArchmageGameBundle:Army:quest.html.twig")
     */
    public function questAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        if ($request->isMethod('POST')) {
            $turns = 2;
            $quest = isset($_POST['quest'])?$_POST['quest']:null;
            if ($turns <= $player->getTurns()) {
                if ($player->getUnits() > 0) {
                    $quest = $manager->getRepository('ArchmageGameBundle:Quest')->findOneById($quest);
                    if ($quest) {
                        /*
                        * MANTENIMIENTO
                        */
                        $player->setTurns($player->getTurns() - $turns);
                        $this->get('service.controller')->checkMaintenances($turns);
                        /*
                         * ACCION
                         */
                        $report = null;
                        $report = $this->attackQuest($quest);
                        $player->removeQuest($quest);
                        $manager->remove($quest);
                        $this->addFlash('success', 'Has gastado ' . $turns . ' <span class="label label-extra">Turnos</span> en comenzar una <span class="label label-quest">Aventura</span>.');
                        /*
                         * PERSISTENCIA
                         */
                        $manager->persist($player);
                        $manager->flush();
                        //redirect to battle report
                        if ($report != null) return $this->redirect($this->generateUrl('archmage_game_account_message', array('hash' => $report->getHash())));
                    } else {
                        $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
                    }
                } else {
                    $this->addFlash('danger', 'Debes atacar con al menos 1 unidad.');
                }
            } else {
                $this->addFlash('danger', 'No tienes los <span class="label label-extra">Turnos</span> necesarios para eso.');
            }
        }
        return array(
            'player' => $player,
        );
    }

    /**
     * attackQuest, battle only
     */
    public function attackQuest($quest) {
        $player = $this->getUser()->getPlayer();
        $manager = $this->getDoctrine()->getManager();
        //ATTACKER
        $attackerArmy = array();
        foreach ($player->getTroops() as $troop) {
            $quantity = $troop->getQuantity();
            //base bonuses
            $attackBonus = 1;
            $defenseBonus = 1;
            $speedBonus = 0;
            //attacker -> self hero bonuses
            foreach ($player->getContracts() as $contract) {
                $skill = $contract->getHero()->getSkill();
                if ((!$skill->getFamily() && !$skill->getType() && !$skill->getFaction()) || $skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType() || $skill->getFaction() == $troop->getUnit()->getFaction()) {
                    $attackBonus = max(self::BONUS_CAP, $attackBonus + ($contract->getHero()->getFaction() == $player->getFaction() ? $skill->getAttackBonus() * 2 : $skill->getAttackBonus()) * $contract->getLevel() / 100);
                    $defenseBonus = max(self::BONUS_CAP, $defenseBonus + ($contract->getHero()->getFaction() == $player->getFaction() ? $skill->getDefenseBonus() * 2 : $skill->getDefenseBonus()) * $contract->getLevel() / 100);
                    $speedBonus += $skill->getSpeedBonus() * $contract->getLevel();
                }
            }
            //attacker -> self unit bonuses
            if ($troop->getUnit()->getSkill()) {
                $skill = $troop->getUnit()->getSkill();
                $attackBonus = max(self::BONUS_CAP, $attackBonus + $skill->getAttackBonus() / 100);
                $defenseBonus = max(self::BONUS_CAP, $defenseBonus + $skill->getDefenseBonus() / 100);
                $speedBonus += $skill->getSpeedBonus();
            }
            $attackerArmy[] = array(
                $troop,
                $quantity, //$_POST
                $attackBonus,
                $defenseBonus,
                $troop->getUnit()->getSpeed() + $speedBonus, //total porque hay que ordenarlo por speed
                $quantity, //numero original para restar las bajas
            );
        }
        //DEFENDER
        $defenderArmy = array();
        foreach ($quest->getTroops() as $troop) {
            //base bonuses
            $attackBonus = 1;
            $defenseBonus = 1;
            $speedBonus = 0;
            $defenderArmy[] = array(
                $troop,
                $troop->getQuantity(), //ALL
                $attackBonus,
                $defenseBonus,
                $troop->getUnit()->getSpeed() + $speedBonus, //total, porque hay que ordenarlo por speed
            );
        }
        //BATTLE
        //ORDERING BY POWER
        usort($attackerArmy, array($this, "sortByPower"));
        usort($defenderArmy, array($this, "sortByPower"));
        //BATTLE
        $attackerTurn = 0;
        $defenderTurn = 0;
        $rounds = max(count($attackerArmy), count($defenderArmy));
        for ($i = 0; $i < $rounds; $i++) {
            //si ya no nos quedan tropas volvemos a empezar
            if (!array_key_exists($attackerTurn, $attackerArmy)) $attackerTurn = 0;
            //busca la siguiente tropa con cantidad positiva
            while (array_key_exists($attackerTurn, $attackerArmy) && $attackerArmy[$attackerTurn][1] <= 0) $attackerTurn++;
            //si no me quedan tropas vivas, se acabo la batalla
            if ($attackerTurn >= count($attackerArmy)) break;
            //si ya no nos quedan tropas volvemos a empezar
            if (!array_key_exists($defenderTurn, $defenderArmy)) $defenderTurn = 0;
            //busca la siguiente tropa con cantidad positiva
            while (array_key_exists($defenderTurn, $defenderArmy) && $defenderArmy[$defenderTurn][1] <= 0) $defenderTurn++;
            //si no me quedan tropas vivas, se acabo la batalla
            if ($defenderTurn >= count($defenderArmy)) break;
            //tropas atacantes y defensoras
            $attackerTroop = $attackerArmy[$attackerTurn][0];
            $defenderTroop = $defenderArmy[$defenderTurn][0];
            //atacante
            //paso por referencia para modificar directamente la cantidad de tropas del array para la siguiente ronda
            $attackerQuantity = &$attackerArmy[$attackerTurn][1];
            $attackerAttackBonus = $attackerArmy[$attackerTurn][2];
            if ($attackerTroop->getUnit()->getFaction()->getOpposite() == $defenderTroop->getUnit()->getFaction()) $attackerAttackBonus += self::FACTION_BONUS / 100;
            if ($attackerTroop->getUnit()->getType()->getOpposite() == $defenderTroop->getUnit()->getType()) $attackerAttackBonus += self::TYPE_BONUS / 100;
            $attackerAttack = $attackerTroop->getUnit()->getAttack() * $attackerQuantity * $attackerAttackBonus;
            $attackerDefenseBonus = $attackerArmy[$attackerTurn][3];
            $attackerDefense = $attackerTroop->getUnit()->getDefense() * $attackerQuantity * $attackerDefenseBonus;
            $attackerSpeed = $attackerArmy[$attackerTurn][4];
            //defensor
            //paso por referencia para modificar directamente la cantidad de tropas del array para la siguiente ronda
            $defenderQuantity = &$defenderArmy[$defenderTurn][1];
            $defenderAttackBonus = $defenderArmy[$defenderTurn][2];
            if ($defenderTroop->getUnit()->getFaction()->getOpposite() == $attackerTroop->getUnit()->getFaction()) $defenderAttackBonus += self::FACTION_BONUS / 100;
            if ($defenderTroop->getUnit()->getType()->getOpposite() == $attackerTroop->getUnit()->getType()) $defenderAttackBonus += self::TYPE_BONUS / 100;
            $defenderAttack = $defenderTroop->getUnit()->getAttack() * $defenderQuantity * $defenderAttackBonus;
            $defenderDefenseBonus = $defenderArmy[$defenderTurn][3];
            $defenderDefense = $defenderTroop->getUnit()->getDefense() * $defenderQuantity * $defenderDefenseBonus;
            $defenderSpeed = $defenderArmy[$defenderTurn][4];
            //comprobar velocidades
            $text[] = array('default', 12, 0, 'center', 'Ronda '.($i+1).': <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> con '.$attackerSpeed.' Velocidad contra <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getCLass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> con '.$defenderSpeed.' Velocidad.');
            if ($attackerSpeed == $defenderSpeed) {
                //atacante igual velocidad que defensor, atacan y defienden a la vez
                //atacante => defensor
                $defenderCasualties = min($defenderQuantity, (int)round($attackerAttack / ($defenderTroop->getUnit()->getDefense() * $defenderDefenseBonus)));
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', $this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($attackerAttack).' Ataque a '.$this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($defenderDefense).' Defensa, matando a '.$this->get('service.controller')->nf($defenderCasualties).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span>.');
                //defensor => atacante
                $attackerCasualties = min($attackerQuantity, (int)round($defenderAttack / ($attackerTroop->getUnit()->getDefense() * $attackerDefenseBonus)));
                $text[] = array('quest', 11, 1, 'center', $this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($defenderAttack).' Ataque a '.$this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($attackerDefense).' Defensa, matando a '.$this->get('service.controller')->nf($attackerCasualties).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span>.');
                //modifico por referencia
                $attackerQuantity -= $attackerCasualties;
                $defenderQuantity -= $defenderCasualties;
            }
            if ($attackerSpeed > $defenderSpeed) {
                //atacante mayor velocidad que defensor, atacante ataca primero
                //atacante => defensor
                $defenderCasualties = min($defenderQuantity, (int)round($attackerAttack / ($defenderTroop->getUnit()->getDefense() * $defenderDefenseBonus)));
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', $this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($attackerAttack).' Ataque a '.$this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($defenderDefense).' Defensa, matando a '.$this->get('service.controller')->nf($defenderCasualties).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span>.');
                //modifico por referencia
                $defenderQuantity -= $defenderCasualties;
                if ($defenderQuantity <= 0) {
                    //no puede contraatacar porque no quedan tropas vivas
                    $text[] = array('quest', 11, 1, 'center', 'Han muerto todos las tropas de <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span>, por lo que no pueden contraatacar.');
                } else {
                    //recalculamos ataque del defensor por si ha sufrido bajas
                    $defenderAttack = $defenderTroop->getUnit()->getAttack() * $defenderQuantity * $defenderAttackBonus;
                    //defensor => atacante
                    $attackerCasualties = min($attackerQuantity, (int)round($defenderAttack / ($attackerTroop->getUnit()->getDefense() * $attackerDefenseBonus)));
                    $text[] = array('quest', 11, 1, 'center', $this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($defenderAttack).' Ataque a '.$this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($attackerDefense).' Defensa, matando a '.$this->get('service.controller')->nf($attackerCasualties).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span>.');
                    //modifico por referencia
                    $attackerQuantity -= $attackerCasualties;
                }
            }
            if ($attackerSpeed < $defenderSpeed) {
                //atacante menor velocidad que defensor, defensor ataca primero
                //defensor => atacante
                $attackerCasualties = min($attackerQuantity, (int)round($defenderAttack / ($attackerTroop->getUnit()->getDefense() * $attackerDefenseBonus)));
                $text[] = array('quest', 11, 1, 'center', $this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($defenderAttack).' Ataque a '.$this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($attackerDefense).' Defensa, matando a '.$this->get('service.controller')->nf($attackerCasualties).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span>.');
                //modifico por referencia
                $attackerQuantity -= $attackerCasualties;
                if ($attackerQuantity <= 0) {
                    //no puede contraatacar porque no quedan tropas vivas
                    $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'Han muerto todos las tropas de <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span>, por lo que no pueden contraatacar.');
                } else {
                    //recalculamos ataque del atacante por si ha sufrido bajas y contraatacamos
                    $attackerAttack = $attackerTroop->getUnit()->getAttack() * $attackerQuantity * $attackerAttackBonus;
                    //atacante => defensor
                    $defenderCasualties = min($defenderQuantity, (int)round($attackerAttack / ($defenderTroop->getUnit()->getDefense() * $defenderDefenseBonus)));
                    $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', $this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($attackerAttack).' Ataque a '.$this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($defenderDefense).' Defensa, matando a '.$this->get('service.controller')->nf($defenderCasualties).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span>.');
                    //modifico por referencia
                    $defenderQuantity -= $defenderCasualties;
                }
            }
            //siguiente ronda
            $attackerTurn++;
            $defenderTurn++;
        }
        //UPDATE ARMIES
        foreach ($attackerArmy as $row) {
            $row[0]->setQuantity($row[0]->getQuantity() - $row[5] + $row[1]);
            if ($row[0]->getQuantity() <= 0) {
                $player->removeTroop($row[0]);
                $manager->remove($row[0]);
            }
        }
        $wipe = false;
        foreach ($defenderArmy as $row) {
            $row[0]->setQuantity($row[1]);
            if ($row[0]->getQuantity() <= 0) {
                $quest->removeTroop($row[0]);
                $manager->remove($row[0]);
            } else {
                $wipe = true;
            }
        }
        $text[] = array('default', 12, 0, 'center', 'Fin del ataque.');
        if (!$wipe) {
            $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'Has vencido al ejército enemigo y has obtenido la recompensa!');
            $player->setGold($player->getGold() + $quest->getGold());
            $player->setRunes($player->getRunes() + $quest->getRunes());
            $item = $player->hasArtifact($quest->getArtifact());
            if ($item) {
                $item->setQuantity($item->getQuantity() + 1);
            } else {
                $item = new Item();
                $manager->persist($item);
                $item->setArtifact($quest->getArtifact());
                $item->setQuantity(1);
                $item->setPlayer($player);
                $player->addItem($item);
            }
            $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'Has ganado '.$this->get('service.controller')->nff($quest->getGold()).' <span class="label label-extra">Oro</span>.');
            $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'Has ganado 1 <span class="label label-artifact"><a href="'.$this->generateUrl('archmage_game_kingdom_market').'" class="link">Runa</a></span>.');
            $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'Has encontrado <span class="label label-' . $item->getArtifact()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_home_help') . '#' . $this->get('service.controller')->toSlug($item->getArtifact()->getName()) . '" class="link">' . $item->getArtifact()->getName() . '</a></span>.');
            //ganamos experiencia con todos nuestros heroes
            foreach ($player->getContracts() as $contract) {
                $contract->setExperience($contract->getExperience() + self::HERO_EXPERIENCE);
            }
            $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'Los héroes de <span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> ganan '.self::HERO_EXPERIENCE.' experiencia.');
        } else {
            $text[] = array('quest', 11, 1, 'center', 'No has sido capaz de derrotar por completo al ejército enemigo.');
        }
        //UNIDADES DEL ATACANTE
        foreach ($attackerArmy as $attackerTroop) {
            $troop = $attackerTroop[0];
            if ($troop->getUnit()->getSkill() && $troop->getUnit()->getSkill()->getResurrectionBonus() > 0) {
                $resurrection = $troop->getUnit()->getSkill()->getResurrectionBonus() / 100 * $attackerTroop[1];
                $troop->setQuantity($troop->getQuantity() + $resurrection);
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'Resucitan '.$this->get('service.controller')->nf($resurrection).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span> de <span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span>.');
            }
        }
        /*
         * FIN
         */
        //mensaje al jugador
        $redirect = $this->get('service.controller')->sendMessage($player, $player, 'Reporte de Aventura', $text, 'battle');
        //redirect to see message
        return $redirect;
    }

    /**
     * attackTarget, battle only
     */
    public function attackTarget($attacker, $attackerResearch, $attackerItem, $target, $type)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        //MESSAGE
        $text = array();
        $text[] = array('default', 12, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> ataca a <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
        //ATTACKER ITEM
        if ($attackerItem) {
            $chance = rand(0,99);
            if ($chance > $target->getMagicDefense()) {
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> ACTIVA el Artefacto <span class="label label-'.$attackerItem->getArtifact()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerItem->getArtifact()->getName()).'" class="link">'.$attackerItem->getArtifact()->getName().'</a></span>.');
                if ($attackerItem->getArtifact()->getSkill()->getManaBonus() > 0) {
                    $mana = floor($player->getManaCap() * $attackerItem->getArtifact()->getSkill()->getManaBonus() / (float)100);
                    $player->setMana($player->getMana() + $mana);
                }
            } else {
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> NO ha logrado activar el Artefacto <span class="label label-'.$attackerItem->getArtifact()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerItem->getArtifact()->getName()).'" class="link">'.$attackerItem->getArtifact()->getName().'</a></span>.');
                $attackerItem = null;
            }
        }
        //ATTACKER RESEARCH
        if ($attackerResearch) {
            $chance = rand(0,99);
            if ($chance > $target->getMagicDefense()) {
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> LANZA el Hechizo <span class="label label-'.$attackerResearch->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerResearch->getSpell()->getName()).'" class="link">'.$attackerResearch->getSpell()->getName().'</a></span>.');
            } else {
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> NO ha logrado lanzar el Hechizo <span class="label label-'.$attackerResearch->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerResearch->getSpell()->getName()).'" class="link">'.$attackerResearch->getSpell()->getName().'</a></span>.');
                $attackerResearch = null;
            }
        }
        //DEFENDER ITEM
        $defenderItem = $target->getItem();
        if ($defenderItem) {
            $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', '<span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span> ACTIVA el Artefacto <span class="label label-'.$defenderItem->getArtifact()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderItem->getArtifact()->getName()).'" class="link">'.$defenderItem->getArtifact()->getName().'</a></span>.');
            if ($defenderItem->getArtifact()->getSkill()->getManaBonus() > 0) {
                $mana = floor($target->getManaCap() * $defenderItem->getArtifact()->getSkill()->getManaBonus() / (float)100);
                $target->setMana($target->getMana() + $mana);
            }
            $defenderItem->setQuantity($defenderItem->getQuantity() - 1);
            $target->setItem(null);
            if ($defenderItem->getQuantity() <= 0) {
                $target->removeItem($defenderItem);
                $manager->remove($defenderItem);
            }
        }
        //DEFENDER RESEARCH
        $defenderResearch = $target->getResearch();
        if ($defenderResearch) {
            $defenderResearch->getSpell()->getFaction() == $target->getFaction() ? $bonus = 1 : $bonus = 2;
            $mana = $defenderResearch->getSpell()->getManaCost() * $bonus;
            if ($mana <= $target->getMana()) {
                $target->setMana($target->getMana() - $mana);
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', '<span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span> LANZA el Hechizo <span class="label label-'.$defenderResearch->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderResearch->getSpell()->getName()).'" class="link">'.$defenderResearch->getSpell()->getName().'</a></span>.');
            } else {
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', '<span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span> NO tiene <span class="label label-extra">Maná</span> para lanzar el Hechizo <span class="label label-'.$defenderResearch->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderResearch->getSpell()->getName()).'" class="link">'.$defenderResearch->getSpell()->getName().'</a></span>.');
                $defenderResearch = null;
            }
        }
        //ATTACKER
        $attackerArmy = array();
        foreach ($attacker as $arr) {
            $troop = $arr[0];
            $quantity = $arr[1];
            //base bonuses
            $attackBonus = 1;
            $defenseBonus = 1;
            $speedBonus = 0;
            //attacker -> self research bonuses
            if ($attackerResearch && $attackerResearch->getSpell()->getSkill()->getSelf()) {
                $skill = $attackerResearch->getSpell()->getSkill();
                if ((!$skill->getFamily() && !$skill->getType() && !$skill->getFaction()) || $skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType() || $skill->getFaction() == $troop->getUnit()->getFaction()) {
                    $attackBonus = max(self::BONUS_CAP, $attackBonus + $skill->getAttackBonus() * $player->getMagic() / 100);
                    $defenseBonus = max(self::BONUS_CAP, $defenseBonus + $skill->getDefenseBonus() * $player->getMagic() / 100);
                    $speedBonus += $skill->getSpeedBonus() * $player->getMagic();
                }
            }
            //defender -> attacker research bonuses
            if ($defenderResearch && !$defenderResearch->getSpell()->getSkill()->getSelf()) {
                $skill = $defenderResearch->getSpell()->getSkill();
                if ((!$skill->getFamily() && !$skill->getType() && !$skill->getFaction()) || $skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType() || $skill->getFaction() == $troop->getUnit()->getFaction()) {
                    $attackBonus = max(self::BONUS_CAP, $attackBonus + $skill->getAttackBonus() * $target->getMagic() / 100);
                    $defenseBonus = max(self::BONUS_CAP, $defenseBonus + $skill->getDefenseBonus() * $target->getMagic() / 100);
                    $speedBonus += $skill->getSpeedBonus() * $target->getMagic();
                }
            }
            //attacker -> self artifact bonuses
            if ($attackerItem && $attackerItem->getArtifact()->getSkill()->getSelf()) {
                $skill = $attackerItem->getArtifact()->getSkill();
                if ((!$skill->getFamily() && !$skill->getType() && !$skill->getFaction()) || $skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType() || $skill->getFaction() == $troop->getUnit()->getFaction()) {
                    $attackBonus = max(self::BONUS_CAP, $attackBonus + $skill->getAttackBonus() / 100);
                    $defenseBonus = max(self::BONUS_CAP, $defenseBonus + $skill->getDefenseBonus() / 100);
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            //defender -> attacker artifact bonuses
            if ($defenderItem && !$defenderItem->getArtifact()->getSkill()->getSelf()) {
                $skill = $defenderItem->getArtifact()->getSkill();
                if ((!$skill->getFamily() && !$skill->getType() && !$skill->getFaction()) || $skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType() || $skill->getFaction() == $troop->getUnit()->getFaction()) {
                    $attackBonus = max(self::BONUS_CAP, $attackBonus + $skill->getAttackBonus() / 100);
                    $defenseBonus = max(self::BONUS_CAP, $defenseBonus + $skill->getDefenseBonus() / 100);
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            //attacker -> self hero bonuses
            foreach ($player->getContracts() as $contract) {
                $skill = $contract->getHero()->getSkill();
                if ((!$skill->getFamily() && !$skill->getType() && !$skill->getFaction()) || $skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType() || $skill->getFaction() == $troop->getUnit()->getFaction()) {
                    $attackBonus = max(self::BONUS_CAP, $attackBonus + ($contract->getHero()->getFaction() == $player->getFaction() ? $skill->getAttackBonus() * 2 : $skill->getAttackBonus()) * $contract->getLevel() / 100);
                    $defenseBonus = max(self::BONUS_CAP, $defenseBonus + ($contract->getHero()->getFaction() == $player->getFaction() ? $skill->getDefenseBonus() * 2 : $skill->getDefenseBonus()) * $contract->getLevel() / 100);
                    $speedBonus += $skill->getSpeedBonus() * $contract->getLevel();
                }
            }
            //attacker -> self unit bonuses
            if ($troop->getUnit()->getSkill()) {
                $skill = $troop->getUnit()->getSkill();
                $attackBonus = max(self::BONUS_CAP, $attackBonus + $skill->getAttackBonus() / 100);
                $defenseBonus = max(self::BONUS_CAP, $defenseBonus + $skill->getDefenseBonus() / 100);
                $speedBonus += $skill->getSpeedBonus();
            }
            $attackerArmy[] = array(
                $troop,
                $quantity, //$_POST
                $attackBonus,
                $defenseBonus,
                $troop->getUnit()->getSpeed() + $speedBonus, //total porque hay que ordenarlo por speed
                $quantity, //numero original para restar las bajas
            );
        }
        //DEFENDER
        $defenderArmy = array();
        foreach ($target->getTroops() as $troop) {
            //base bonuses
            $attackBonus = 1;
            $defenseBonus = 1;
            $speedBonus = 0;
            //defender -> self research bonuses
            if ($defenderResearch && $defenderResearch->getSpell()->getSkill()->getSelf()) {
                $skill = $defenderResearch->getSpell()->getSkill();
                if ((!$skill->getFamily() && !$skill->getType() && !$skill->getFaction()) || $skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType() || $skill->getFaction() == $troop->getUnit()->getFaction()) {
                    $attackBonus = max(self::BONUS_CAP, $attackBonus + $skill->getAttackBonus() * $target->getMagic() / 100);
                    $defenseBonus = max(self::BONUS_CAP, $defenseBonus + $skill->getDefenseBonus() * $target->getMagic() / 100);
                    $speedBonus += $skill->getSpeedBonus() * $target->getMagic();
                }
            }
            //attacker -> defender research bonuses
            if ($attackerResearch && !$attackerResearch->getSpell()->getSkill()->getSelf()) {
                $skill = $attackerResearch->getSpell()->getSkill();
                if ((!$skill->getFamily() && !$skill->getType() && !$skill->getFaction()) || $skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType() || $skill->getFaction() == $troop->getUnit()->getFaction()) {
                    $attackBonus = max(self::BONUS_CAP, $attackBonus + $skill->getAttackBonus() * $player->getMagic() / 100);
                    $defenseBonus = max(self::BONUS_CAP, $defenseBonus + $skill->getDefenseBonus() * $player->getMagic() / 100);
                    $speedBonus += $skill->getSpeedBonus() * $player->getMagic();
                }
            }
            //defender -> self artifact bonuses
            if ($defenderItem && $defenderItem->getArtifact()->getSkill()->getSelf()) {
                $skill = $defenderItem->getArtifact()->getSkill();
                if ((!$skill->getFamily() && !$skill->getType() && !$skill->getFaction()) || $skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType() || $skill->getFaction() == $troop->getUnit()->getFaction()) {
                    $attackBonus = max(self::BONUS_CAP, $attackBonus + $skill->getAttackBonus() / 100);
                    $defenseBonus = max(self::BONUS_CAP, $defenseBonus + $skill->getDefenseBonus() / 100);
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            //attacker -> defender artifact bonuses
            if ($attackerItem && !$attackerItem->getArtifact()->getSkill()->getSelf()) {
                $skill = $attackerItem->getArtifact()->getSkill();
                if ((!$skill->getFamily() && !$skill->getType() && !$skill->getFaction()) || $skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType() || $skill->getFaction() == $troop->getUnit()->getFaction()) {
                    $attackBonus = max(self::BONUS_CAP, $attackBonus + $skill->getAttackBonus() / 100);
                    $defenseBonus = max(self::BONUS_CAP, $defenseBonus + $skill->getDefenseBonus() / 100);
                    $speedBonus += $skill->getSpeedBonus();
                }
            }
            //defender -> self hero bonuses
            foreach ($target->getContracts() as $contract) {
                $skill = $contract->getHero()->getSkill();
                if ((!$skill->getFamily() && !$skill->getType() && !$skill->getFaction()) || $skill->getFamily() == $troop->getUnit()->getFamily() || $skill->getType() == $troop->getUnit()->getType() || $skill->getFaction() == $troop->getUnit()->getFaction()) {
                    $attackBonus = max(self::BONUS_CAP, $attackBonus + ($contract->getHero()->getFaction() == $target->getFaction() ? $skill->getAttackBonus() * 2 : $skill->getAttackBonus()) * $contract->getLevel() / 100);
                    $defenseBonus = max(self::BONUS_CAP, $defenseBonus + ($contract->getHero()->getFaction() == $target->getFaction() ? $skill->getDefenseBonus() * 2 : $skill->getDefenseBonus()) * $contract->getLevel() / 100);
                    $speedBonus += $skill->getSpeedBonus() * $contract->getLevel();
                }
            }
            //defender -> self unit bonuses
            if ($troop->getUnit()->getSkill()) {
                $skill = $troop->getUnit()->getSkill();
                $attackBonus = max(self::BONUS_CAP, $attackBonus + $skill->getAttackBonus() / 100);
                $defenseBonus = max(self::BONUS_CAP, $defenseBonus + $skill->getDefenseBonus() / 100);
                $speedBonus += $skill->getSpeedBonus();
            }
            $defenderArmy[] = array(
                $troop,
                $troop->getQuantity(), //ALL
                $attackBonus,
                $defenseBonus,
                $troop->getUnit()->getSpeed() + $speedBonus, //total, porque hay que ordenarlo por speed
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
            //ORDERING BY POWER
            usort($attackerArmy, array($this, "sortByPower"));
            usort($defenderArmy, array($this, "sortByPower"));
            //BATTLE
            $attackerTurn = 0;
            $defenderTurn = 0;
            $rounds = max(count($attackerArmy), count($defenderArmy));
            for ($i = 0; $i < $rounds; $i++) {
                //si ya no nos quedan tropas volvemos a empezar
                if (!array_key_exists($attackerTurn, $attackerArmy)) $attackerTurn = 0;
                //busca la siguiente tropa con cantidad positiva
                while (array_key_exists($attackerTurn, $attackerArmy) && $attackerArmy[$attackerTurn][1] <= 0) $attackerTurn++;
                //si no me quedan tropas vivas, se acabo la batalla
                if ($attackerTurn >= count($attackerArmy)) break;
                //si ya no nos quedan tropas volvemos a empezar
                if (!array_key_exists($defenderTurn, $defenderArmy)) $defenderTurn = 0;
                //busca la siguiente tropa con cantidad positiva
                while (array_key_exists($defenderTurn, $defenderArmy) && $defenderArmy[$defenderTurn][1] <= 0) $defenderTurn++;
                //si no me quedan tropas vivas, se acabo la batalla
                if ($defenderTurn >= count($defenderArmy)) break;
                //tropas atacantes y defensoras
                $attackerTroop = $attackerArmy[$attackerTurn][0];
                $defenderTroop = $defenderArmy[$defenderTurn][0];
                //atacante
                //paso por referencia para modificar directamente la cantidad de tropas del array para la siguiente ronda
                $attackerQuantity = &$attackerArmy[$attackerTurn][1];
                $attackerAttackBonus = $attackerArmy[$attackerTurn][2];
                if ($attackerTroop->getUnit()->getFaction()->getOpposite() == $defenderTroop->getUnit()->getFaction()) $attackerAttackBonus += self::FACTION_BONUS / 100;
                if ($attackerTroop->getUnit()->getType()->getOpposite() == $defenderTroop->getUnit()->getType()) $attackerAttackBonus += self::TYPE_BONUS / 100;
                $attackerAttack = $attackerTroop->getUnit()->getAttack() * $attackerQuantity * $attackerAttackBonus;
                $attackerDefenseBonus = $attackerArmy[$attackerTurn][3];
                $attackerDefense = $attackerTroop->getUnit()->getDefense() * $attackerQuantity * $attackerDefenseBonus;
                $attackerSpeed = $attackerArmy[$attackerTurn][4];
                //defensor
                //paso por referencia para modificar directamente la cantidad de tropas del array para la siguiente ronda
                $defenderQuantity = &$defenderArmy[$defenderTurn][1];
                $defenderAttackBonus = $defenderArmy[$defenderTurn][2];
                if ($defenderTroop->getUnit()->getFaction()->getOpposite() == $attackerTroop->getUnit()->getFaction()) $defenderAttackBonus += self::FACTION_BONUS / 100;
                if ($defenderTroop->getUnit()->getType()->getOpposite() == $attackerTroop->getUnit()->getType()) $defenderAttackBonus += self::TYPE_BONUS / 100;
                $defenderAttack = $defenderTroop->getUnit()->getAttack() * $defenderQuantity * $defenderAttackBonus;
                $defenderDefenseBonus = $defenderArmy[$defenderTurn][3];
                $defenderDefense = $defenderTroop->getUnit()->getDefense() * $defenderQuantity * $defenderDefenseBonus;
                $defenderSpeed = $defenderArmy[$defenderTurn][4];
                //comprobar velocidades
                $text[] = array('default', 12, 0, 'center', 'Ronda '.($i+1).': <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> con '.$attackerSpeed.' Velocidad contra <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getCLass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> con '.$defenderSpeed.' Velocidad.');
                //atacante igual velocidad que defensor, atacan y defienden a la vez
                if ($attackerSpeed == $defenderSpeed) {
                    //atacante => defensor
                    $defenderSkill = $defenderTroop->getUnit()->getSkill();
                    if ($defenderSkill && $defenderSkill->getEvasionBonus() > 0 && rand(0,99) < $defenderSkill->getEvasionBonus()) {
                        $defenderCasualties = 0;
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', $this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($attackerAttack).' Ataque a '.$this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($defenderDefense).' Defensa, pero ESQUIVAN el ataque.');
                    } else {
                        $defenderCasualties = min($defenderQuantity, (int)round($attackerAttack / ($defenderTroop->getUnit()->getDefense() * $defenderDefenseBonus)));
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', $this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($attackerAttack).' Ataque a '.$this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($defenderDefense).' Defensa, matando a '.$this->get('service.controller')->nf($defenderCasualties).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span>.');
                    }
                    //defensor => atacante
                    $attackerSkill = $attackerTroop->getUnit()->getSkill();
                    if ($attackerSkill && $attackerSkill->getEvasionBonus() > 0 && rand(0,99) < $attackerSkill->getEvasionBonus()) {
                        $attackerCasualties = 0;
                        $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', $this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($defenderAttack).' Ataque a '.$this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($attackerDefense).' Defensa, pero ESQUIVAN el ataque.');
                    } else {
                        $attackerCasualties = min($attackerQuantity, (int)round($defenderAttack / ($attackerTroop->getUnit()->getDefense() * $attackerDefenseBonus)));
                        $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', $this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($defenderAttack).' Ataque a '.$this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($attackerDefense).' Defensa, matando a '.$this->get('service.controller')->nf($attackerCasualties).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span>.');
                    }
                    //modifico por referencia
                    $defenderQuantity -= $defenderCasualties;
                    $attackerQuantity -= $attackerCasualties;
                }
                //atacante mayor velocidad que defensor, atacante ataca primero
                if ($attackerSpeed > $defenderSpeed) {
                    //atacante => defensor
                    $defenderSkill = $defenderTroop->getUnit()->getSkill();
                    if ($defenderSkill && $defenderSkill->getEvasionBonus() > 0 && rand(0,99) < $defenderSkill->getEvasionBonus()) {
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', $this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($attackerAttack).' Ataque a '.$this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($defenderDefense).' Defensa, pero ESQUIVAN el ataque.');
                    } else {
                        $defenderCasualties = min($defenderQuantity, (int)round($attackerAttack / ($defenderTroop->getUnit()->getDefense() * $defenderDefenseBonus)));
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', $this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($attackerAttack).' Ataque a '.$this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($defenderDefense).' Defensa, matando a '.$this->get('service.controller')->nf($defenderCasualties).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span>.');
                        //modifico por referencia
                        $defenderQuantity -= $defenderCasualties;
                    }
                    if ($defenderQuantity <= 0) {
                        //no puede contraatacar porque no quedan tropas vivas
                        $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', 'Han muerto todos las tropas de <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span>, por lo que no pueden contraatacar.');
                    } else {
                        //recalculamos ataque del defensor por si ha sufrido bajas
                        $defenderAttack = $defenderTroop->getUnit()->getAttack() * $defenderQuantity * $defenderAttackBonus;
                        //defensor => atacante
                        $attackerSkill = $attackerTroop->getUnit()->getSkill();
                        if ($attackerSkill && $attackerSkill->getEvasionBonus() > 0 && rand(0,99) < $attackerSkill->getEvasionBonus()) {
                            $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', $this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($defenderAttack).' Ataque a '.$this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($attackerDefense).' Defensa, pero ESQUIVAN el ataque.');
                        } else {
                            $attackerCasualties = min($attackerQuantity, (int)round($defenderAttack / ($attackerTroop->getUnit()->getDefense() * $attackerDefenseBonus)));
                            $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', $this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($defenderAttack).' Ataque a '.$this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($attackerDefense).' Defensa, matando a '.$this->get('service.controller')->nf($attackerCasualties).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span>.');
                            //modifico por referencia
                            $attackerQuantity -= $attackerCasualties;
                        }
                    }
                }
                //atacante menor velocidad que defensor, defensor ataca primero
                if ($attackerSpeed < $defenderSpeed) {
                    //defensor => atacante
                    $attackerSkill = $attackerTroop->getUnit()->getSkill();
                    if ($attackerSkill && $attackerSkill->getEvasionBonus() > 0 && rand(0,99) < $attackerSkill->getEvasionBonus()) {
                        $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', $this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($defenderAttack).' Ataque a '.$this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($attackerDefense).' Defensa, pero ESQUIVAN el ataque.');
                    } else {
                        $attackerCasualties = min($attackerQuantity, (int)round($defenderAttack / ($attackerTroop->getUnit()->getDefense() * $attackerDefenseBonus)));
                        $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', $this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($defenderAttack).' Ataque a '.$this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($attackerDefense).' Defensa, matando a '.$this->get('service.controller')->nf($attackerCasualties).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span>.');
                        //modifico por referencia
                        $attackerQuantity -= $attackerCasualties;
                    }
                    if ($attackerQuantity <= 0) {
                        //no puede contraatacar porque no quedan tropas vivas
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'Han muerto todos las tropas de <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span>, por lo que no pueden contraatacar.');
                    } else {
                        //recalculamos ataque del atacante por si ha sufrido bajas y contraatacamos
                        $attackerAttack = $attackerTroop->getUnit()->getAttack() * $attackerQuantity * $attackerAttackBonus;
                        //atacante => defensor
                        $defenderSkill = $defenderTroop->getUnit()->getSkill();
                        if ($defenderSkill && $defenderSkill->getEvasionBonus() > 0 && rand(0,99) < $defenderSkill->getEvasionBonus()) {
                            $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', $this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($attackerAttack).' Ataque a '.$this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($defenderDefense).' Defensa, pero ESQUIVAN el ataque.');
                        } else {
                            $defenderCasualties = min($defenderQuantity, (int)round($attackerAttack / ($defenderTroop->getUnit()->getDefense() * $defenderDefenseBonus)));
                            $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', $this->get('service.controller')->nf($attackerQuantity).' <span class="label label-'.$attackerTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($attackerTroop->getUnit()->getName()).'" class="link">'.$attackerTroop->getUnit()->getName().'</a></span> atacan con '.$this->get('service.controller')->nf($attackerAttack).' Ataque a '.$this->get('service.controller')->nf($defenderQuantity).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span> con '.$this->get('service.controller')->nf($defenderDefense).' Defensa, matando a '.$this->get('service.controller')->nf($defenderCasualties).' <span class="label label-'.$defenderTroop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($defenderTroop->getUnit()->getName()).'" class="link">'.$defenderTroop->getUnit()->getName().'</a></span>.');
                            //modifico por referencia
                            $defenderQuantity -= $defenderCasualties;
                        }
                    }
                }
                //siguiente ronda
                $attackerTurn++;
                $defenderTurn++;
            }
            //UPDATE ARMIES
            foreach ($attackerArmy as $row) {
                $row[0]->setQuantity($row[0]->getQuantity() - $row[5] + $row[1]);
                if ($row[0]->getQuantity() <= 0) {
                    $player->removeTroop($row[0]);
                    $manager->remove($row[0]);
                }
            }
            foreach ($defenderArmy as $row) {
                $row[0]->setQuantity($row[1]);
                if ($row[0]->getQuantity() <= 0) {
                    $target->removeTroop($row[0]);
                    $manager->remove($row[0]);
                }
            }
        }
        $text[] = array('default', 12, 0, 'center', 'Fin del ataque.');
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
        //VICTORIA
        if ($attackerPowerAfter > 0 && ($attackerPower < $defenderPower || $target->getUnits() <= 0)) {
            //VICTORIA TOTAL
            if ($attackerPower * 3 < $defenderPower || $target->getUnits() <= 0) {
                switch ($type) {
                    case 'conquest':
                        $total = 0;
                        foreach ($player->getConstructions() as $attackerConstruction) {
                            $defenderConstruction = $target->getConstruction($attackerConstruction->getBuilding()->getName());
                            $stolen = floor($defenderConstruction->getQuantity() * self::REGULAR_PERCENT / (float)100);
                            $defenderConstruction->setQuantity($defenderConstruction->getQuantity() - $stolen);
                            $attackerConstruction->setQuantity($attackerConstruction->getQuantity() + $stolen);
                            $total += abs($stolen);
                        }
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> gana la CONQUISTA por perder mucho menos poder y ROBA '.$this->get('service.controller')->nff($total).' edificios de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                        break;
                    case 'pillage':
                        //GOLD
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> gana el PILLAJE por perder mucho menos poder.');
                        $robbery = floor($target->getGold() * self::PILLAGE_PERCENT / (float)100);
                        $target->setGold($target->getGold() - $robbery);
                        $player->setGold($player->getGold() + $robbery);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> ROBA '.$this->get('service.controller')->nff($robbery).' <span class="label label-extra">Oro</span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                        //PEOPLE
                        $robbery = floor($target->getPeople() * self::PILLAGE_PERCENT / (float)100);
                        $target->setPeople($target->getPeople() - $robbery);
                        $player->setPeople($player->getPeople() + $robbery);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> ROBA '.$this->get('service.controller')->nff($robbery).' <span class="label label-extra">Personas</span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                        //MANA
                        $robbery = floor($target->getMana() * self::PILLAGE_PERCENT / (float)100);
                        $target->setMana($target->getMana() - $robbery);
                        $player->setMana($player->getMana() + $robbery);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> ROBA '.$this->get('service.controller')->nff($robbery).' <span class="label label-extra">Maná</span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                        //RUNES
                        $target->getRunes() > 0 ? $robbery = 1 : $robbery = 0;
                        $target->setRunes($target->getRunes() - $robbery);
                        $player->setRunes($player->getRunes() + $robbery);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> ROBA '.$this->get('service.controller')->nff($robbery).' <span class="label label-artifact">Runa(s)</span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                        break;
                    case 'siege':
                        $total = 0;
                        foreach ($target->getConstructions() as $defenderConstruction) {
                            $destroyed = floor($defenderConstruction->getQuantity() * self::SIEGE_PERCENT / (float)100);
                            $defenderConstruction->setQuantity($defenderConstruction->getQuantity() - $destroyed);
                            $total += abs($destroyed);
                        }
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> gana el ASEDIO por perder mucho menos poder y DESTRUYE '.$this->get('service.controller')->nff($total).' edificios de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                        //GOLD
                        $gold = floor($target->getMana() * self::SIEGE_PERCENT / (float)100);
                        $target->setGold($target->getGold() - $gold);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> DESTRUYE '.$this->get('service.controller')->nff($gold).' <span class="label label-extra">Oro</span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                        //PEOPLE
                        $people = floor($target->getMana() * self::SIEGE_PERCENT / (float)100);
                        $target->setPeople($target->getPeople() - $people);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> DESTRUYE '.$this->get('service.controller')->nff($people).' <span class="label label-extra">Personas</span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                        //MANA
                        $mana = floor($target->getMana() * self::SIEGE_PERCENT / (float)100);
                        $target->setMana($target->getMana() - $mana);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> DESTRUYE '.$this->get('service.controller')->nff($mana).' <span class="label label-extra">Maná</span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                        break;
                }
            //VICTORIA SIMPLE, NO HACEMOS NADA
            } else {
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> gana el ataque por perder menos poder que <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>, pero no consigue nada.');
            }
            //HEROES DEL ATACANTE TRAS COMBATE VICTORIOSO
            foreach ($player->getContracts() as $contract) {
                $skill = $contract->getHero()->getSkill();
                if ($skill->getBattle()) {
                    if ($skill->getGoldBonus() < 0) {
                        $gold = $contract->getLevel() * ($contract->getHero()->getFaction() == $player->getFaction() ? $skill->getGoldBonus() * 2 : $skill->getGoldBonus()) * $target->getGold() / 100;
                        $target->setGold($target->getGold() + $gold);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El Héroe <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> de <span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> elimina '.$this->get('service.controller')->nff($gold).' <span class="label label-extra">Oro</span> a <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                    }
                    if ($skill->getPeopleBonus() < 0) {
                        $people = $contract->getLevel() * ($contract->getHero()->getFaction() == $player->getFaction() ? $skill->getPeopleBonus() * 2 : $skill->getPeopleBonus()) * $target->getPeople() / 100;
                        $target->setPeople($target->getPeople() + $people);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El Héroe <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> de <span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> elimina '.$this->get('service.controller')->nff($people).' <span class="label label-extra">Personas</span> a <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                    }
                    if ($skill->getManaBonus() < 0) {
                        $mana = $contract->getLevel() * ($contract->getHero()->getFaction() == $player->getFaction() ? $skill->getManaBonus() * 2 : $skill->getManaBonus()) * $target->getMana() / 100;
                        $target->setMana($target->getMana() + $mana);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El Héroe <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> de <span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> elimina '.$this->get('service.controller')->nff($mana).' <span class="label label-extra">Maná</span> a <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                    }
                    if ($skill->getTurnsBonus() < 0) {
                        $turns = $contract->getLevel() * ($contract->getHero()->getFaction() == $player->getFaction() ? $skill->getTurnsBonus() * 2 : $skill->getTurnsBonus());
                        $target->setTurns(max(0, $target->getTurns() + $turns));
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El Héroe <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> de <span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> elimina '.$this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span> a <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                    }
                    if ($skill->getTerrainBonus() < 0) {
                        $constructions = $target->getConstructions()->toArray();
                        shuffle($constructions);
                        $construction = $constructions[0]; //suponemos > 0
                        $destroyed = floor($contract->getLevel() * ($contract->getHero()->getFaction() == $player->getFaction() ? $skill->getTerrainBonus() * 2 : $skill->getTerrainBonus()) * $construction->getQuantity() / (float)100);
                        $construction->setQuantity($construction->getQuantity() + $destroyed);
                        $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El Héroe <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> de <span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> elimina '.$this->get('service.controller')->nff($destroyed).' <span class="label label-extra">'.$construction->getBuilding()->getName().'</span> a <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                    }
                }
            }
            //ganamos experiencia con todos nuestros heroes
            foreach ($player->getContracts() as $contract) {
                $contract->setExperience($contract->getExperience() + self::HERO_EXPERIENCE);
            }
            $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'Los héroes de <span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> ganan '.self::HERO_EXPERIENCE.' experiencia.');
        } else {
            //derrota
            if ($attackerPowerAfter <= 0) {
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> pierde el ataque por quedarse sin tropas para saquear a <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
            } else {
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> pierde el ataque por no inflingir suficiente daño a <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
            }
        }
        //UNIDADES DEL ATACANTE
        foreach ($attackerArmy as $attackerTroop) {
            $troop = $attackerTroop[0];
            if ($troop->getUnit()->getSkill() && $troop->getUnit()->getSkill()->getResurrectionBonus() > 0) {
                $resurrection = $troop->getUnit()->getSkill()->getResurrectionBonus() / 100 * $attackerTroop[1];
                $troop->setQuantity($troop->getQuantity() + $resurrection);
                $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'Resucitan '.$this->get('service.controller')->nf($resurrection).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span> de <span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span>.');
            }
        }
        //UNIDADES DEL DEFENSOR
        foreach ($defenderArmy as $defenderTroop) {
            $troop = $defenderTroop[0];
            if ($troop->getUnit()->getSkill() && $troop->getUnit()->getSkill()->getResurrectionBonus() > 0) {
                $resurrection = $troop->getUnit()->getSkill()->getResurrectionBonus() / 100 * $defenderTroop[1];
                $troop->setQuantity($troop->getQuantity() + $resurrection);
                $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', 'Resucitan '.$this->get('service.controller')->nf($resurrection).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
            }
        }
        //HEROES DEL ATACANTE, VICTORIA O DERROTA
        foreach ($player->getContracts() as $contract) {
            $skill = $contract->getHero()->getSkill();
            if ($skill->getBattle()) {
                if ($skill->getResurrectionBonus() > 0) {
                    $resurrection = floor(($attackerPower + $defenderPower) * $contract->getLevel() * ($contract->getHero()->getFaction() == $player->getFaction() ? $contract->getHero()->getSkill()->getResurrectionBonus() * 2 : $contract->getHero()->getSkill()->getResurrectionBonus()) / 100 / $skill->getUnit()->getPower());
                    $troop = $player->hasUnit($skill->getUnit());
                    if ($troop) {
                        $troop->setQuantity($troop->getQuantity() + $resurrection);
                    } else {
                        $troop = new Troop();
                        $manager->persist($troop);
                        $troop->setUnit($skill->getUnit());
                        $troop->setQuantity($resurrection);
                        $troop->setPlayer($player);
                        $player->addTroop($troop);
                    }
                    $text[] = array($player->getFaction()->getClass(), 11, 0, 'center', 'El Héroe <span class="label label-' . $contract->getHero()->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_home_help') . '#' . $this->get('service.controller')->toSlug($contract->getHero()->getName()) . '" class="link">' . $contract->getHero()->getName() . '</a></span> de <span class="label label-' . $player->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())) . '" class="link">' . $player->getNick() . '</a></span> resucita ' . $this->get('service.controller')->nff($resurrection) . ' <span class="label label-' . $contract->getHero()->getSkill()->getUnit()->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_home_help') . '#' . $this->get('service.controller')->toSlug($contract->getHero()->getSkill()->getUnit()->getName()) . '" class="link">' . $contract->getHero()->getSkill()->getUnit()->getName() . '</a></span>.');
                }
            }
        }
        //HEROES DEL DEFENSOR, VICTORIA O DERROTA
        foreach ($target->getContracts() as $contract) {
            $skill = $contract->getHero()->getSkill();
            if ($skill->getBattle()) {
                if ($skill->getResurrectionBonus() > 0) {
                    $resurrection = floor(($attackerPower + $defenderPower) * $contract->getLevel() * ($contract->getHero()->getFaction() == $target->getFaction() ? $contract->getHero()->getSkill()->getResurrectionBonus() * 2 : $contract->getHero()->getSkill()->getResurrectionBonus()) / 100 / $skill->getUnit()->getPower());
                    $troop = $target->hasUnit($skill->getUnit());
                    if ($troop) {
                        $troop->setQuantity($troop->getQuantity() + $resurrection);
                    } else {
                        $troop = new Troop();
                        $manager->persist($troop);
                        $troop->setPlayer($target);
                        $troop->setUnit($skill->getUnit());
                        $troop->setQuantity($resurrection);
                        $troop->setPlayer($target);
                        $target->addTroop($troop);
                    }
                    $text[] = array($target->getFaction()->getClass(), 11, 1, 'center', 'El Héroe <span class="label label-' . $contract->getHero()->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_home_help') . '#' . $this->get('service.controller')->toSlug($contract->getHero()->getName()) . '" class="link">' . $contract->getHero()->getName() . '</a></span> de <span class="label label-' . $target->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())) . '" class="link">' . $target->getNick() . '</a></span> resucita ' . $this->get('service.controller')->nff($resurrection) . ' <span class="label label-'.$contract->getHero()->getSkill()->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getSkill()->getUnit()->getName()).'" class="link">'.$contract->getHero()->getSkill()->getUnit()->getName().'</a></span>.');
                }
            }
        }
        /*
         * FIN
         */
        $blacklist = $manager->getRepository('ArchmageGameBundle:Attack')->findOneBy(array('attacker' => $player, 'defender' => $target));
        if ($blacklist) {
            //actualizar ataque
            $blacklist->setDateTime(new \DateTime("now"));
        } else {
            //nuevo registro en la tabla de ataques para contraataques
            $blacklist = new Attack();
            $blacklist->setAttacker($player);
            $blacklist->setDefender($target);
            $manager->persist($blacklist);
        }
        $counter = $manager->getRepository('ArchmageGameBundle:Attack')->findOneBy(array('attacker' => $target, 'defender' => $player));
        if ($counter) $manager->remove($counter);
        //mensajes al objetivo y al jugador
        $this->get('service.controller')->sendMessage($player, $target, 'Reporte de Batalla', $text, 'battle');
        $redirect = $this->get('service.controller')->sendMessage($target, $player, 'Reporte de Batalla', $text, 'battle');
        //redirect to see message
        return $redirect;
    }
}
