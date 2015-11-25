<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\Common\Collections\Criteria;
use Symfony\Component\HttpFoundation\Request;
use Archmage\GameBundle\Entity\Research;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Spell;
use Archmage\GameBundle\Entity\Player;
use Archmage\GameBundle\Entity\Enchantment;
use Archmage\GameBundle\Entity\Item;
use Archmage\GameBundle\Entity\Unit;
use Archmage\GameBundle\Entity\Artifact;
use Archmage\GameBundle\Entity\Message;
use Archmage\GameBundle\Entity\Quest;
use Archmage\GameBundle\Entity\Recipe;
use Archmage\GameBundle\Entity\Contract;

class MagicController extends Controller
{
    /**
     * Constants
     */
    const BROKEN = 3;

    /**
     * @Route("/game/magic/meditate")
     * @Template("ArchmageGameBundle:Magic:meditate.html.twig")
     */
    public function meditateAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        if ($request->isMethod('POST')) {
            $turns = isset($_POST['turns'])?$_POST['turns']:null;
            if ($turns && is_numeric($turns) && $turns > 0 && $turns <= $player->getTurns()) {
                /*
                 * MANTENIMIENTOS
                 */
                $player->setTurns($player->getTurns() - $turns);
                $this->get('service.controller')->checkMaintenances($turns);
                /*
                 * ACCION
                 */
                $mana = $turns * $player->getManaResourcePerTurn() * 2;
                if ($player->getMana() + $mana >= $player->getManaCap()) $player->setMana($player->getManaCap()); else $player->setMana($player->getMana() + $mana);
                /*
                 * PERSISTENCIA
                 */
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span> y recargado '.$this->get('service.controller')->nff($mana).' <span class="label label-extra">Maná</span>.');
            } else {
                $this->addFlash('danger', 'No tienes los <span class="label label-extra">Turnos</span> necesarios para eso.');
            }
            return $this->redirect($this->generateUrl('archmage_game_magic_meditate'));
        }
        return array(
            'player' => $player,
        );
    }

    /**
     * @Route("/game/magic/research")
     * @Template("ArchmageGameBundle:Magic:research.html.twig")
     */
    public function researchAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $spells = $manager->getRepository('ArchmageGameBundle:Spell')->findAllSpellsResearchablesByPlayer($player);
        if ($request->isMethod('POST')) {
            //recibe datos del form post y busca en database sus ids
            $turns = isset($_POST['turns'])?$_POST['turns']:null;
            $research = isset($_POST['research'])?$_POST['research']:null;
            $research = $manager->getRepository('ArchmageGameBundle:Research')->findOneById($research);
            $spell = isset($_POST['spell'])?$_POST['spell']:null;
            $spell = $manager->getRepository('ArchmageGameBundle:Spell')->findOneById($spell);
            if (($research || $spell) && $turns && is_numeric($turns) && $turns > 0 && $turns <= $player->getTurns()){
                /*
                 * MANTENIMIENTOS
                 */
                $player->setTurns($player->getTurns() - $turns);
                $this->get('service.controller')->checkMaintenances($turns);
                /*
                 * ACCION
                 */
                //si quiere investigar un spell que no tenia, se crea un nuevo research
                if ($spell) {
                    $research = new Research();
                    $research->setSpell($spell);
                    $research->setTurns(0);
                    $research->setPlayer($player);
                    $research->setActive(false);
                    $manager->persist($research);
                    $player->addResearch($research);
                }
                //tanto si ya tenia anteriormente un research como ha creado uno nuevo se suman los turnos
                if ($research) {
                    $research->setTurns($research->getTurns() + $turns);
                    //si ha terminado de investigarlo se activa
                    if ($research->getTurns() >= $player->getResearchRatio($research->getSpell()->getTurnsResearch())) {
                        $research->setActive(true);
                        //subir nivel de magia
                        if ($player->getLevel() > $player->getMagic()){
                            $player->setMagic($player->getLevel());
                            $this->addFlash('success', 'Has aumentado 1 punto tu nivel de <span class="label label-extra">Magia</span>.');
                        }
                        $this->addFlash('success', 'Has investigado completamente el hechizo <span class="label label-'.$research->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($research->getSpell()->getName()).'" class="link">'.$research->getSpell()->getName().'</a></span>.');
                    }
                }
                /*
                 * PERSISTENCIA
                 */
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span> investigando el hechizo <span class="label label-'.$research->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($research->getSpell()->getName()).'" class="link">'.$research->getSpell()->getName().'</a></span>.');
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_magic_research'));
        }
        return array(
            'player' => $player,
            'spells' => $spells,
        );
    }

    /**
     * @Route("/game/magic/conjure")
     * @Template("ArchmageGameBundle:Magic:conjure.html.twig")
     */
    public function conjureAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $targets = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
        $apocalypse = $manager->getRepository('ArchmageGameBundle:Enchantment')->findOneBySpell($manager->getRepository('ArchmageGameBundle:Spell')->findByName('Apocalipsis'));
        if ($request->isMethod('POST')) {
            $research = isset($_POST['research'])?$_POST['research']:null;
            $action = isset($_POST['action'])?$_POST['action']:null;
            $research = $manager->getRepository('ArchmageGameBundle:Research')->findOneById($research);
            if ($action && $research) {
                if ($action == 'defense') {
                    $turns = 1;
                    if ($turns <= $player->getTurns()) {
                        /*
                         * MANTENIMIENTOS
                         */
                        $player->setTurns($player->getTurns() - $turns);
                        $this->get('service.controller')->checkMaintenances($turns);
                        /*
                         * ACCION
                         */
                        $player->setResearch($research);
                        $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span> en defender con <span class="label label-'.$research->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($research->getSpell()->getName()).'" class="link">'.$research->getSpell()->getName().'</a></span>.');
                    } else {
                        $this->addFlash('danger', 'No tienes los <span class="label label-extra">Turnos</span> necesarios para eso.');
                    }
                } else {
                    $research->getSpell()->getFaction() == $player->getFaction() ? $bonus = 1 : $bonus = 2;
                    $turns = $research->getSpell()->getTurnsCost();
                    $mana = $research->getSpell()->getManaCost() * $bonus;
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
                        if ($research->getSpell()->getSkill()->getSelf()) {
                            $this->conjureSelf($research->getSpell());
                            $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span> y '.$this->get('service.controller')->nff($mana).' <span class="label label-extra">Maná</span> en conjurar <span class="label label-'.$research->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($research->getSpell()->getName()).'" class="link">'.$research->getSpell()->getName().'</a></span>.');
                        } else {
                            $target = isset($_POST['target'])?$_POST['target']:null;
                            $target = $manager->getRepository('ArchmageGameBundle:Player')->findOneById($target);
                            if ($target) {
                                $chance = rand(0,99);
                                if ($chance > $target->getMagicDefense()) {
                                    $this->conjureTarget($research->getSpell(), $target);
                                    $manager->persist($target);
                                    $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span> y '.$this->get('service.controller')->nff($mana).' <span class="label label-extra">Maná</span> en conjurar <span class="label label-'.$research->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($research->getSpell()->getName()).'" class="link">'.$research->getSpell()->getName().'</a></span> sobre <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                                } else {
                                    $broken = floor($target->getConstruction('Barreras')->getQuantity() * self::BROKEN / (float)100);
                                    $target->setConstruction('Tierras', $target->getFree() + $broken);
                                    $target->setConstruction('Barreras', max(0, $target->getConstruction('Barreras')->getQuantity() - $broken));
                                    $this->addFlash('danger', 'Has gastado '.$this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span> y '.$this->get('service.controller')->nff($mana).' <span class="label label-extra">Maná</span> en conjurar <span class="label label-'.$research->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($research->getSpell()->getName()).'" class="link">'.$research->getSpell()->getName().'</a></span> sobre <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>, pero no has superado su <span class="label label-extra">Defesa Mágica</span>, aunque le has destruido algunas <span class="label label-extra">Barreras</span>.');
                                }
                            } else {
                                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
                            }
                        }
                    } else {
                        $this->addFlash('danger', 'No tienes los <span class="label label-extra">Recursos</span> necesarios eso.');
                    }
                }
                /*
                 * PERSISTENCIA
                 */
                $manager->persist($player);
                $manager->flush();
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_magic_conjure'));
        }
        return array(
            'player' => $player,
            'targets' => $targets,
            'apocalypse' => $apocalypse,
        );
    }

    /**
     * @Route("/game/magic/dispell")
     * @Template("ArchmageGameBundle:Magic:dispell.html.twig")
     */
    public function dispellAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        if ($request->isMethod('POST')) {
            $turns = 5;
            $enchantment = isset($_POST['enchantment'])?$_POST['enchantment']:null;
            if ($turns <= $player->getTurns()) {
                $enchantment = $manager->getRepository('ArchmageGameBundle:Enchantment')->findOneById($enchantment);
                if ($enchantment) {
                    /*
                     * MANTENIMIENTO
                     */
                    $player->setTurns($player->getTurns() - $turns);
                    $this->get('service.controller')->checkMaintenances($turns);
                    /*
                     * ACCION
                     */
                    if ($enchantment->getOwner() == $player) {
                        $player->removeEnchantmentsVictim($enchantment);
                        $player->removeEnchantmentsOwner($enchantment);
                        $this->addFlash('success', 'Has gastado '.$turns.' <span class="label label-extra">Turnos</span> y roto el Encantamiento <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($enchantment->getSpell()->getName()).'" class="link">'.$enchantment->getSpell()->getName().'</a></span>.');
                        if ($enchantment->getSpell()->getSkill()->getWin()) $player->setUncovered(false);
                        $manager->remove($enchantment);
                    } else {
                        $chance = rand(0,99);
                        if ($chance > $enchantment->getOwner()->getMagicDefense()) {
                            //MESSAGE
                            $text = array();
                            $player->removeEnchantmentsVictim($enchantment);
                            $enchantment->getOwner()->removeEnchantmentsOwner($enchantment);
                            $manager->persist($enchantment->getOwner());
                            $this->addFlash('success', 'Has gastado '.$turns.' <span class="label label-extra">Turnos</span> y roto el Encantamiento <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($enchantment->getSpell()->getName()).'" class="link">'.$enchantment->getSpell()->getName().'</a></span> de <span class="label label-'.$enchantment->getOwner()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $enchantment->getOwner()->getId())).'" class="link">'.$enchantment->getOwner()->getNick().'</a></span>.');
                            $text[] = array('default', 12, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> ha roto tu Encantamiento <span class="label label-' . $enchantment->getSpell()->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_home_help') . '#' . $this->get('service.controller')->toSlug($enchantment->getSpell()->getName()) . '" class="link">' . $enchantment->getSpell()->getName() . '</a></span>.');
                            $this->get('service.controller')->sendMessage($player, $enchantment->getOwner(), 'Reporte de Hechizo', $text, 'magic');
                            $manager->remove($enchantment);
                        } else {
                            $this->addFlash('danger', 'Has gastado '.$turns.' <span class="label label-extra">Turnos</span>, pero no has conseguido romper el Encantamiento <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($enchantment->getSpell()->getName()).'" class="link">'.$enchantment->getSpell()->getName().'</a></span> de <span class="label label-'.$enchantment->getOwner()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $enchantment->getOwner()->getId())).'" class="link">'.$enchantment->getOwner()->getNick().'</a></span>.');
                        }
                    }
                    /*
                     * PERSISTENCIA
                     */
                    $manager->persist($player);
                    $manager->flush();
                } else {
                    $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
                }
            } else {
                $this->addFlash('danger', 'No tienes los <span class="label label-extra">Turnos</span> necesarios para eso.');
            }
            return $this->redirect($this->generateUrl('archmage_game_magic_dispell'));
        }
        return array(
            'player' => $player,
        );
    }

    /**
     * @Route("/game/magic/artifact")
     * @Template("ArchmageGameBundle:Magic:artifact.html.twig")
     */
    public function artifactAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $targets = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
        if ($request->isMethod('POST')) {
            $turns = 1;
            $item = isset($_POST['item'])?$_POST['item']:null;
            $action = isset($_POST['action'])?$_POST['action']:null;
            if ($turns <= $player->getTurns()) {
                $item = $manager->getRepository('ArchmageGameBundle:Item')->findOneById($item);
                if ($item && $action) {
                    /*
                     * MANTENIMIENTO
                     */
                    $player->setTurns($player->getTurns() - $turns);
                    $this->get('service.controller')->checkMaintenances($turns);
                    /*
                     * ACCION
                     */
                    if ($action == 'activate') {
                        $target = isset($_POST['target'])?$_POST['target']:null;
                        $target = $manager->getRepository('ArchmageGameBundle:Player')->findOneById($target);
                        if (!$target) {
                            $this->activateSelf($item->getArtifact());
                            $this->addFlash('success', 'Has gastado '. $this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span> en activar <span class="label label-'.$item->getArtifact()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($item->getArtifact()->getName()).'" class="link">'.$item->getArtifact()->getName().'</a></span>.');
                        } else {
                            $chance = rand(0,99);
                            if ($chance > $target->getMagicDefense()) {
                                $this->activateTarget($item->getArtifact(), $target);
                                $manager->persist($target);
                                $this->addFlash('success', 'Has gastado ' . $this->get('service.controller')->nff($turns) . ' <span class="label label-extra">Turnos</span> en activar <span class="label label-'.$item->getArtifact()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($item->getArtifact()->getName()).'" class="link">'.$item->getArtifact()->getName().'</a></span> sobre <span class="label label-' . $target->getFaction()->getClass() . '"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">' . $target->getNick() . '</a></span>.');
                            } else {
                                $broken = floor($target->getConstruction('Barreras')->getQuantity() * self::BROKEN / (float)100);
                                $target->setConstruction('Tierras', $target->getFree() + $broken);
                                $target->setConstruction('Barreras', max(0, $target->getConstruction('Barreras')->getQuantity() - $broken));
                                $this->addFlash('danger', 'Has gastado ' . $this->get('service.controller')->nff($turns) . ' <span class="label label-extra">Turnos</span> en activar <span class="label label-'.$item->getArtifact()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($item->getArtifact()->getName()).'" class="link">'.$item->getArtifact()->getName().'</a></span> sobre <span class="label label-' . $target->getFaction()->getClass() . '"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">' . $target->getNick() . '</a></span>, pero no has superado su <span class="label label-extra">Defesa Mágica</span>, aunque le has destruido algunas <span class="label label-extra">Barreras</span>.');
                            }
                        }
                        $item->setQuantity($item->getQuantity() - 1);
                        if ($item->getQuantity() <= 0) {
                            if ($player->getItem() && $player->getItem()->getArtifact() == $item->getArtifact()) $player->setItem(null);
                            $player->removeItem($item);
                            $manager->remove($item);
                        }
                    } elseif ($action == 'defense') {
                        $player->setItem($item);
                        $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span> en defender con <span class="label label-'.$item->getArtifact()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($item->getArtifact()->getName()).'" class="link">'.$item->getArtifact()->getName().'</a></span>.');
                    }
                    /*
                     * PERSISTENCIA
                     */
                    $manager->persist($player);
                    $manager->flush();
                } else {
                    $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
                }
            } else {
                $this->addFlash('danger', 'No tienes los <span class="label label-extra">Turnos</span> necesarios para eso.');
            }
            return $this->redirect($this->generateUrl('archmage_game_magic_artifact'));
        }
        return array(
            'player' => $player,
            'targets' => $targets,
        );
    }

    /**
     * @Route("/game/magic/alchemy")
     * @Template("ArchmageGameBundle:Magic:alchemy.html.twig")
     */
    public function alchemyAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        if ($request->isMethod('POST')) {
            $turns = 5;
            $recipe = isset($_POST['recipe'])?$_POST['recipe']:null;
            $action = isset($_POST['action'])?$_POST['action']:null;
            $recipe = $manager->getRepository('ArchmageGameBundle:Recipe')->findOneById($recipe);
            if ($recipe && $action) {
                if ($action == 'craft') {
                    $turns = 5;
                    if ($turns <= $player->getTurns()) {
                        $item1 = $player->hasArtifact($recipe->getFirst());
                        $item2 = $player->hasArtifact($recipe->getSecond());
                        $gold = $recipe->getGold();
                        if ($item1 && $item2 && $gold <= $player->getGold()) {
                            /*
                            * MANTENIMIENTO
                            */
                            $player->setTurns($player->getTurns() - $turns);
                            $player->setGold($player->getGold() - $gold);
                            $this->get('service.controller')->checkMaintenances($turns);
                            /*
                             * ACCION
                             */
                            $item1->setQuantity($item1->getQuantity() - 1);
                            if ($item1->getQuantity() <= 0) {
                                if ($player->getItem() && $player->getItem()->getArtifact() == $item1->getArtifact()) $player->setItem(null);
                                $player->removeItem($item1);
                                $manager->remove($item1);
                            }
                            $item2->setQuantity($item2->getQuantity() - 1);
                            if ($item2->getQuantity() <= 0) {
                                if ($player->getItem() && $player->getItem()->getArtifact() == $item2->getArtifact()) $player->setItem(null);
                                $player->removeItem($item2);
                                $manager->remove($item2);
                            }
                            $item = $player->hasArtifact($recipe->getResult());
                            if ($item) {
                                $item->setQuantity($item->getQuantity() + 1);
                            } else {
                                $item = new Item();
                                $manager->persist($item);
                                $item->setArtifact($recipe->getResult());
                                $item->setQuantity(1);
                                $item->setPlayer($player);
                                $player->addItem($item);
                            }
                            $this->addFlash('success', 'Has gastado los ingredientes, '.$turns.' <span class="label label-extra">Turnos</span>, '.$this->get('service.controller')->nff($gold).' <span class="label label-extra">Oro</span> y fabricado el Artefacto <span class="label label-' . $item->getArtifact()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_home_help') . '#' . $this->get('service.controller')->toSlug($item->getArtifact()->getName()) . '" class="link">' . $item->getArtifact()->getName() . '</a></span>.');
                            if ($recipe->getResult()->getLegendary()) {
                                $player->removeRecipe($recipe);
                                $manager->remove($recipe);
                                $this->addFlash('danger', 'La <span class="label label-recipe">Receta</span> era demasiado poderosa y se ha quemado.');
                            }
                        } else {
                            $this->addFlash('danger', 'No tienes los <span class="label label-extra">Artefactos</span> o el <span class="label label-extra">Oro</span> necesario para eso.');
                        }
                    } else {
                        $this->addFlash('danger', 'No tienes los <span class="label label-extra">Turnos</span> necesarios para eso.');
                    }
                } elseif ($action == 'forget') {
                    $player->removeRecipe($recipe);
                    $manager->remove($recipe);
                    $this->addFlash('success', 'Has olvidado correctamente esa <span class="label label-recipe">Receta</span>.');
                }
                /*
                 * PERSISTENCIA
                 */
                $manager->persist($player);
                $manager->flush();
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_magic_alchemy'));
        }
        return array(
            'player' => $player,
        );
    }

    /**
     * Spionage report message
     */
    public function createEspionage(Player $target)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $subject = 'Reporte de Espionaje';
        $text = array(
            array('default', 12, 0, 'center', 'Reporte de Espionaje de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>'),
            array('default', 12, 0, 'center', 'Oro: '.$this->get('service.controller')->nff($target->getGold())),
            array('default', 12, 0, 'center', 'Maná: '.$this->get('service.controller')->nff($target->getMana())),
            array('default', 12, 0, 'center', 'Personas: '.$this->get('service.controller')->nff($target->getPeople())),
            array('default', 12, 0, 'center', 'Tierras: '.$this->get('service.controller')->nff($target->getLands())),
            array('default', 12, 0, 'center', 'Tierras libres: '.$this->get('service.controller')->nff($target->getFree())),
            array('default', 12, 0, 'center', 'Héroes: '.$this->get('service.controller')->nff($target->getContracts()->count())),
            array('default', 12, 0, 'center', 'Artefactos: '.$this->get('service.controller')->nff($target->getArtifacts())),
            array('default', 12, 0, 'center', 'Mapas: '.$this->get('service.controller')->nff($target->getQuests()->count())),
            array('default', 12, 0, 'center', 'Recetas: '.$this->get('service.controller')->nff($target->getRecipes()->count())),
            array('default', 12, 0, 'center', 'Magia: '.$this->get('service.controller')->nff($target->getMagic())),
            array('default', 12, 0, 'center', 'Defensa Mágica: '.$this->get('service.controller')->nff($target->getMagicDefense()).'%'),
            array('default', 12, 0, 'center', 'Defensa Física: '.$this->get('service.controller')->nff($target->getArmyDefense()).'%'),
            array('default', 12, 0, 'center', 'Poder: '.$this->get('service.controller')->nff($target->getPower())),
            array('default', 12, 0, 'center', 'Unidades: '.$this->get('service.controller')->nff($target->getUnits())),
            array('default', 12, 0, 'center', 'Ejército: '.$target->getArmyToString()),
            array('default', 12, 0, 'center', 'Encantamientos: '.$target->getEnchantmentsVictimToString()),
        );
        $target->setUncovered($target->getApocalypse());
        $manager->persist($target);
        $manager->flush();
        $this->get('service.controller')->sendMessage($target, $player, $subject, $text, 'espionage');
    }

    /**
     * Conjure a spell on myself, can be used from conjure/attack/temple
     */
    public function conjureSelf(Spell $spell)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        if ($spell->getSkill()->getSummon()) {
            //SUMMON
            if ($spell->getSkill()->getUnit()) {
                $unit = $spell->getSkill()->getUnit();
                $quantity = $spell->getSkill()->getQuantityBonus();
            } elseif ($spell->getSkill()->getRandom()) {
                $units = $manager->getRepository('ArchmageGameBundle:Unit')->findByFamily($spell->getSkill()->getFamily());
                shuffle($units);
                $unit = $units[0];
                $quantity = $spell->getSkill()->getQuantityBonus() / $unit->getPower();
            }
            $quantity += round($quantity * $player->getSummonBonus() / (float)100);
            $troop = $player->hasUnit($unit);
            if ($troop) {
                $troop->setQuantity($troop->getQuantity() + $quantity);
                $this->addFlash('success', 'Has invocado '.$this->get('service.controller')->nff($quantity).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
            } else {
                if ($player->getTroops()->count() < $player::TROOPS_CAP) {
                    $troop = new Troop();
                    $manager->persist($troop);
                    $troop->setUnit($unit);
                    $troop->setQuantity($quantity);
                    $troop->setPlayer($player);
                    $player->addTroop($troop);
                    $this->addFlash('success', 'Has invocado '.$this->get('service.controller')->nff($quantity).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
                } else {
                    $this->addFlash('danger', 'No puedes tener más de '.$player::TROOPS_CAP.' tropas distintas al mismo tiempo, debes <i class="fa fa-fw fa-user-times"></i><a href='.$this->generateUrl('archmage_game_army_disband').'>Desbandar</a> alguna.');
                }
            }
        } elseif ($spell->getEnchantment()) {
            //ENCHANTMENT
            $enchantment = $player->hasEnchantmentVictim($spell);
            if ($enchantment) {
                $player->removeEnchantmentsVictim($enchantment);
                $player->removeEnchantmentsOwner($enchantment);
                $manager->remove($enchantment);
            }
            $enchantment = new Enchantment();
            $manager->persist($enchantment);
            $enchantment->setSpell($spell);
            $enchantment->setVictim($player);
            $player->addEnchantmentsVictim($enchantment);
            $enchantment->setOwner($player);
            $player->addEnchantmentsOwner($enchantment);
            $this->addFlash('success', 'Has lanzado el Encantamiento <span class="label label-' . $enchantment->getSpell()->getFaction()->getClass() . '"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($enchantment->getSpell()->getName()).'" class="link">' . $enchantment->getSpell()->getName() . '</a></span> sobre tu Reino.');
            if ($enchantment->getSpell()->getSkill()->getWin()) {
                $receivers = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
                $subject = 'Apocalipsis';
                $text = array();
                $text[] = array('default', 12, 0, 'center', 'Alguien ha convocado el <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($enchantment->getSpell()->getName()).'" class="link">'.$enchantment->getSpell()->getName().'</a></span>, impedidlo antes de que sea tarde!');
                foreach ($receivers as $receiver) {
                    if ($receiver != $player) $this->get('service.controller')->sendMessage($receiver, $receiver, $subject, $text, 'apocalypse');
                }
            }
        } elseif ($spell->getSkill()->getArtifactBonus() > 0) {
            //ARTIFACT
            $maxchance = $spell->getSkill()->getArtifactBonus() * $player->getMagic();
            $chance = rand(0,99);
            if ($chance < $maxchance) {
                $criteria = new Criteria();
                $criteria->where($criteria->expr()->lte('rarity', rand(0,99)));
                $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->matching($criteria)->toArray();
                shuffle($artifacts);
                $artifact = $artifacts[0];
                $item = $player->hasArtifact($artifact);
                if ($item) {
                    $item->setQuantity($item->getQuantity() + 1);
                } else {
                    $item = new Item();
                    $manager->persist($item);
                    $item->setArtifact($artifact);
                    $item->setQuantity(1);
                    $item->setPlayer($player);
                    $player->addItem($item);
                }
                $this->addFlash('success', 'Has encontrado el Artefacto <span class="label label-' . $item->getArtifact()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_home_help') . '#' . $this->get('service.controller')->toSlug($item->getArtifact()->getName()) . '" class="link">' . $item->getArtifact()->getName() . '</a></span>.');
            } else {
                $this->addFlash('danger', 'No has encontrado nada.');
            }
        } elseif ($spell->getSkill()->getQuestBonus() > 0) {
            //MAP
            $maxchance = $spell->getSkill()->getQuestBonus() * $player->getMagic();
            $chance = rand(0,99);
            if ($chance < $maxchance) {
                $level = rand(1,3);
                $criteria = new Criteria();
                $criteria->where($criteria->expr()->lte('rarity', $level * 33));
                $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->matching($criteria)->toArray();
                shuffle($artifacts);
                $artifact = $artifacts[0];
                $quest = new Quest();
                $manager->persist($quest);
                $quest->setArtifact($artifact);
                $units = $manager->getRepository('ArchmageGameBundle:Unit')->findAll();
                shuffle($units);
                for ($i = 0; $i < $level; $i++) {
                    $unit = $units[$i];
                    $troop = new Troop();
                    $manager->persist($troop);
                    $troop->setUnit($unit);
                    $troop->setQuantity(500000 / $unit->getPower());
                    $troop->setQuest($quest);
                    $quest->addTroop($troop);
                }
                $player->addQuest($quest);
                $this->addFlash('success', 'Has descubierto una nueva <span class="label label-quest"><a href="'.$this->generateUrl('archmage_game_army_quest').'" class="link">Aventura</a></span>.');
            } else {
                $this->addFlash('danger', 'No has descubierto nada.');
            }
        } elseif ($spell->getSkill()->getRecipeBonus() > 0) {
            //RECIPE
            $maxchance = $spell->getSkill()->getRecipeBonus() * $player->getMagic();
            $chance = rand(0,99);
            if ($chance < $maxchance) {
                $criteria = new Criteria();
                $criteria->where($criteria->expr()->lte('rarity', rand(0,99)));
                $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->matching($criteria)->toArray();
                $recipe = new Recipe();
                $manager->persist($recipe);
                shuffle($artifacts);
                $recipe->setFirst($artifacts[0]);
                shuffle($artifacts);
                $recipe->setSecond($artifacts[0]);
                shuffle($artifacts);
                $recipe->setResult($artifacts[0]);
                $recipe->setGold($recipe->getResult()->getGoldAuction() / 2);
                $recipe->setPlayer($player);
                $player->addRecipe($recipe);
                $this->addFlash('success', 'Has descubierto una nueva <span class="label label-recipe"><a href="'.$this->generateUrl('archmage_game_magic_alchemy').'" class="link">Recipe</a></span>.');
            } else {
                $this->addFlash('danger', 'No has descubierto nada.');
            }
        }
    }

    /**
     * Conjure a spell on target nonbattle only
     */
    public function conjureTarget(Spell $spell, Player $target)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        //MESSAGE
        $text = array();
        $text[] = array('default', 12, 0, 'center', 'El mago <span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> ha lanzado el Hechizo <span class="label label-'.$spell->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($spell->getName()).'" class="link">'.$spell->getName().'</a></span> sobre tu Reino.');
        if ($spell->getSkill()->getSpyBonus() > 0) {
            //ESPIONAGE
            $maxchance = $spell->getSkill()->getSpyBonus() * $player->getMagic();
            $chance = rand(0, 99);
            if ($chance < $maxchance) {
                $this->createEspionage($target);
                $this->addFlash('success', 'Has logrado obtener información relevante del Reino objetivo.');
            } else {
                $this->addFlash('danger', 'No has logrado obtener ninguna información relevante del Reino objetivo.');
            }
        } elseif ($spell->getSkill()->getDispellBonus() > 0) {
            $maxchance = $spell->getSkill()->getDispellBonus() * $player->getMagic();
            $chance = rand(0, 99);
            if ($chance < $maxchance) {
                $enchantments = array();
                foreach ($target->getEnchantmentsVictim() as $enchantment) {
                    if (!$enchantment->getSpell()->getSkill()->getWin()) $enchantments[] = $enchantment;
                }
                if (count($enchantments) > 0) {
                    shuffle($enchantments);
                    $enchantment = $enchantments[0];
                    $target->removeEnchantmentsVictim($enchantment);
                    $enchantment->getOwner()->removeEnchantmentsOwner($enchantment);
                    $manager->persist($enchantment->getOwner());
                    $manager->remove($enchantment);
                    $this->addFlash('success', 'Has desencantado <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($enchantment->getSpell()->getName()).'" class="link">'.$enchantment->getSpell()->getName().'</a></span> a <span class="label label-' . $target->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())) . '" class="link">' . $target->getNick() . '</a></span>.');
                    $text[] = array('default', 12, 0, 'center', 'Te han desencantado <span class="label label-' . $enchantment->getSpell()->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_home_help') . '#' . $this->get('service.controller')->toSlug($enchantment->getSpell()->getName()) . '" class="link">' . $enchantment->getSpell()->getName() . '</a></span>.');
                } else {
                    $this->addFlash('danger', 'El mago <span class="label label-' . $target->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())) . '" class="link">' . $target->getNick() . '</a></span> no tiene ningún Encantamiento que romper sobre su Reino.');
                    $text[] = array('default', 12, 0, 'center', 'Han intentado desencantarte, pero no tenías ningún Encantamiento en tu reino.');
                }
            } else {
                $this->addFlash('danger', 'No has logrado romper ningún Encantamiento de <span class="label label-' . $target->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())) . '" class="link">' . $target->getNick() . '</a></span>.');
                $text[] = array('default', 12, 0, 'center', 'Han intentado desencantarte, pero no lo han logrado.');
            }
        } elseif ($spell->getEnchantment()) {
            //ENCHANTMENT
            $previous = $target->hasEnchantmentVictim($spell);
            if (!$previous || ($previous && $previous->getOwner()->getMagic() <= $player->getMagic() && $previous->getOwner()->getMagicDefense() <= $player->getMagicDefense())) {
                if ($previous) {
                    $text2 = array();
                    $text2[] = array('default', 12, 0, 'center', 'Alguien ha sobreescrito tu Encantamiento <span class="label label-' . $previous->getSpell()->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_home_help') . '#' . $this->get('service.controller')->toSlug($previous->getSpell()->getName()) . '" class="link">' . $previous->getSpell()->getName() . '</a></span> a <span class="label label-' . $previous->getVictim()->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_account_profile', array('id' => $previous->getVictim()->getId())) . '" class="link">' . $previous->getVictim()->getNick() . '</a></span> con el suyo propio.');
                    if ($previous->getOwner() != $player) $this->get('service.controller')->sendMessage($previous->getVictim(), $previous->getOwner(), 'Reporte de Hechizo', $text2, 'magic');
                    $previous->getVictim()->removeEnchantmentsVictim($previous);
                    $manager->persist($previous->getVictim());
                    $previous->getOwner()->removeEnchantmentsOwner($previous);
                    $manager->persist($previous->getOwner());
                    $manager->remove($previous);
                }
                $enchantment = new Enchantment();
                $manager->persist($enchantment);
                $enchantment->setSpell($spell);
                $enchantment->setVictim($target);
                $enchantment->setOwner($player);
                $target->addEnchantmentsVictim($enchantment);
                $player->addEnchantmentsOwner($enchantment);
                $this->addFlash('success', 'Se ha encantado al mago <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span> con <span class="label label-'.$spell->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($spell->getName()).'" class="link">'.$spell->getName().'</a></span>.');
                $text[] = array('default', 12, 0, 'center', 'Te han encantado con <span class="label label-'.$spell->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($spell->getName()).'" class="link">'.$spell->getName().'</a></span>.');
            } else {
                $this->addFlash('danger', 'El mago <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span> ya tenía ese Encantamiento y tu <span class="label label-extra">Magia</span> y <span class="label label-extra">Defensa Mágica</span> no los superan para sustituirlo.');
                $text[] = array('default', 12, 0, 'center', 'No te han podido encantar con <span class="label label-'.$spell->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($spell->getName()).'" class="link">'.$spell->getName().'</a></span>.');
            }
        } elseif ($spell->getSkill()->getArtifactBonus() < 0) {
            if ($target->getItems()->count() > 0) {
                $maxchance = abs($spell->getSkill()->getArtifactBonus()) * $player->getMagic();
                $chance = rand(0,99);
                if ($chance < $maxchance) {
                    $items = $target->getItems()->toArray();
                    shuffle($items);
                    $item = $items[0];
                    $item->setQuantity($item->getQuantity() - 1);
                    if ($item->getQuantity() <= 0) {
                        if ($target->getItem() && $target->getItem()->getArtifact() == $item->getArtifact()) $target->setItem(null);
                        $target->removeItem($item);
                        $manager->remove($item);
                    }
                    $this->addFlash('success', 'Has destruido el Artefacto <span class="label label-' . $item->getArtifact()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_home_help') . '#' . $this->get('service.controller')->toSlug($item->getArtifact()->getName()) . '" class="link">' . $item->getArtifact()->getName() . '</a></span> de <span class="label label-' . $target->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())) . '" class="link">' . $target->getNick() . '</a></span>.');
                    $text[] = array('default', 12, 0, 'center', 'Te han destruido el Artefacto <span class="label label-' . $item->getArtifact()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_home_help') . '#' . $this->get('service.controller')->toSlug($item->getArtifact()->getName()) . '" class="link">' . $item->getArtifact()->getName() . '</a></span>.');
                } else {
                    $this->addFlash('danger', 'No has logrado destruir nada a <span class="label label-' . $target->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())) . '" class="link">' . $target->getNick() . '</a></span>.');
                    $text[] = array('default', 12, 0, 'center', 'Te han intentado destruir un Artefacto, pero no lo han logrado.');
                }
            } else {
                $this->addFlash('danger', 'El mago <span class="label label-' . $target->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())) . '" class="link">' . $target->getNick() . '</a></span> no tiene Artefactos para destruir.');
                $text[] = array('default', 12, 0, 'center', 'Te han intentado destruir un Artefacto, pero no tenías ninguno.');
            }
        } elseif ($spell->getSkill()->getDamageBonus() < 0) {
            //DAMAGE
            if ($target->getUnits() > 0) {
                $troops = $target->getTroops()->toArray();
                shuffle($troops);
                $troop = $troops[0]; //suponemos > 0
                $casualties = floor($spell->getSkill()->getDamageBonus() * $player->getMagic() * $troop->getQuantity() / (float)100);
                $troop->setQuantity($troop->getQuantity() + $casualties);
                if ($troop->getQuantity() <= 0) {
                    $target->removeTroop($troop);
                    $manager->remove($troop);
                }
                $this->addFlash('success', 'Has matado '.$this->get('service.controller')->nff($casualties).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                $text[] = array('default', 12, 0, 'center', 'Te han matado '.$this->get('service.controller')->nff($casualties).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
            } else {
                $this->addFlash('danger', 'No hay más tropas que matar.');
                $text[] = array('default', 12, 0, 'center', 'No te han matado tropas.');
            }
        } elseif ($spell->getSkill()->getGoldBonus() < 0) {
            //GOLD
            $gold = $target->getGold() * $spell->getSkill()->getGoldBonus() * $player->getMagic() / (float)100;
            $target->setGold($target->getGold() + $gold);
            $this->addFlash('success', 'Has eliminado '.$this->get('service.controller')->nff($gold).' <span class="label label-extra">Oro</span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
            $text[] = array('default', 12, 0, 'center', 'Has perdido '.$this->get('service.controller')->nff($gold).' <span class="label label-extra">Oro</span>.');
        } elseif ($spell->getSkill()->getPeopleBonus() < 0) {
            //PEOPLE
            $people = $target->getPeople() * $spell->getSkill()->getPeopleBonus() * $player->getMagic() / (float)100;
            $target->setPeople($target->getPeople() + $people);
            $this->addFlash('success', 'Has eliminado '.$this->get('service.controller')->nff($people).' <span class="label label-extra">Personas</span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
            $text[] = array('default', 12, 0, 'center', 'Has perdido '.$this->get('service.controller')->nff($people).' <span class="label label-extra">Personas</span>.');
        } elseif ($spell->getSkill()->getManaBonus() < 0) {
            //MANA
            $mana = $target->getMana() * $spell->getSkill()->getManaBonus() * $player->getMagic() / (float)100;
            $target->setMana($target->getMana() + $mana);
            $this->addFlash('success', 'Has eliminado '.$this->get('service.controller')->nff($mana).' <span class="label label-extra">Maná</span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
            $text[] = array('default', 12, 0, 'center', 'Has perdido '.$this->get('service.controller')->nff($mana).' <span class="label label-extra">Maná</span>.');
        }
        $this->get('service.controller')->sendMessage($player, $target, 'Reporte de Hechizo', $text, 'magic');
    }

    /**
     * Activate an artifact on myself nonbattle only
     */
    public function activateSelf(Artifact $artifact)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        //SUMMON
        if ($artifact->getSkill()->getSummon()) {
            if ($artifact->getSkill()->getUnit()) {
                $unit = $artifact->getSkill()->getUnit();
            } elseif ($artifact->getSkill()->getRandom()) {
                $units = $manager->getRepository('ArchmageGameBundle:Unit')->findByFamily($artifact->getSkill()->getFamily());
                shuffle($units);
                $unit = $units[0];
            }
            $troop = $player->hasUnit($unit);
            $quantity = ($artifact->getSkill()->getQuantityBonus() * 2) / $unit->getPower();
            $quantity += round($quantity * $player->getSummonBonus() / (float)100);
            if ($troop) {
                $troop->setQuantity($troop->getQuantity() + $quantity);
                $this->addFlash('success', 'Has invocado '.$this->get('service.controller')->nff($quantity).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
            } else {
                if ($player->getTroops()->count() < $player::TROOPS_CAP) {
                    $troop = new Troop();
                    $manager->persist($troop);
                    $troop->setUnit($unit);
                    $troop->setQuantity($quantity);
                    $troop->setPlayer($player);
                    $player->addTroop($troop);
                    $this->addFlash('success', 'Has invocado '.$this->get('service.controller')->nff($quantity).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
                } else {
                    $this->addFlash('danger', 'No puedes tener más de '.$player::TROOPS_CAP.' tropas distintas al mismo tiempo, debes <i class="fa fa-fw fa-user-times"></i><a href='.$this->generateUrl('archmage_game_army_disband').'>Desbandar</a> alguna.');
                }
            }
        } elseif ($artifact->getSkill()->getTerrainBonus() > 0) {
            //TERRAIN
            $free = rand($artifact->getSkill()->getTerrainBonus() / 2, $artifact->getSkill()->getTerrainBonus());
            $player->setConstruction('Tierras', $player->getFree() + $free);
            $this->addFlash('success', 'Has encontrado '.$this->get('service.controller')->nff($free).' <span class="label label-extra">Tierras</span>.');
        } elseif ($artifact->getSkill()->getHeroBonus() > 0) {
            //HERO LEVEL
            if ($player->getHeroes() > 0) {
                $contracts = $player->getContracts()->toArray();
                shuffle($contracts);
                $contract = $contracts[0]; //suponemos > 0
                $levels = rand(1, $artifact->getSkill()->getHeroBonus());
                $contract->setLevel($contract->getLevel() + $levels);
                $this->addFlash('success', 'Tu <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> ha subido '.$levels.' niveles.');
            } else {
                $this->addFlash('danger', 'No tienes héroes en tu Reino.');
            }
        } elseif ($artifact->getSkill()->getGoldBonus() > 0) {
            //GOLD
            $gold = rand($artifact->getSkill()->getGoldBonus() / 2, $artifact->getSkill()->getGoldBonus());
            $player->setGold($player->getGold() + $gold);
            $this->addFlash('success', 'Has generado '.$this->get('service.controller')->nff($gold).' <span class="label label-extra">Oro</span>.');
        } elseif ($artifact->getSkill()->getPeopleBonus() > 0) {
            //PEOPLE
            $people = $player->getPeopleCap() * $artifact->getSkill()->getPeopleBonus() / (float)100;
            $player->setPeople($player->getPeople() + $people);
            $this->addFlash('success', 'Has generado '.$this->get('service.controller')->nff($people).' <span class="label label-extra">Personas</span>.');
        } elseif ($artifact->getSkill()->getManaBonus() > 0) {
            //MANA
            $mana = $player->getManaCap() * $artifact->getSkill()->getManaBonus() / (float)100;
            $player->setMana($player->getMana() + $mana);
            $this->addFlash('success', 'Has generado '.$this->get('service.controller')->nff($mana).' <span class="label label-extra">Maná</span>.');
        } elseif ($artifact->getSkill()->getDispellBonus() > 0) {
            //DISPELL
            if ($player->getEnchantmentsVictim()->count() > 0) {
                $enchantments = $player->getEnchantmentsVictim()->toArray();
                shuffle($enchantments);
                $enchantment = $enchantments[0]; //suponemos > 0
                $player->removeEnchantmentsVictim($enchantment);
                $enchantment->getOwner()->removeEnchantmentsOwner($enchantment);
                $manager->persist($enchantment->getOwner());
                $this->addFlash('success', 'Has roto el Encantamiento <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($enchantment->getSpell()->getName()).'" class="link">'.$enchantment->getSpell()->getName().'</a></span> de <span class="label label-'.$enchantment->getOwner()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $enchantment->getOwner()->getId())).'" class="link">'.$enchantment->getOwner()->getNick().'</a></span>.');
                $text = array();
                $text[] = array('default', 12, 0, 'center', '<span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> ha roto tu Encantamiento <span class="label label-' . $enchantment->getSpell()->getFaction()->getClass() . '"><a href="' . $this->generateUrl('archmage_game_home_help') . '#' . $this->get('service.controller')->toSlug($enchantment->getSpell()->getName()) . '" class="link">' . $enchantment->getSpell()->getName() . '</a></span>.');
                $manager->remove($enchantment);
                if ($enchantment->getOwner() != $player) $this->get('service.controller')->sendMessage($player, $enchantment->getOwner(), 'Reporte de Artefacto', $text, 'magic');
            } else {
                $this->addFlash('danger', 'No tienes ningún Encantamiento en tu Reino que romper.');
            }
        } elseif ($artifact->getSkill()->getTurnsBonus() < 0) {
            //TURNOS
            $turns = rand($artifact->getSkill()->getTurnsBonus() / 2, $artifact->getSkill()->getTurnsBonus());
            foreach ($player->getEnchantmentsVictim() as $enchantment) {
                $enchantment->setExpiration(max(0, $enchantment->getExpiration() + $turns));
            }
            $this->addFlash('success', 'Has restado '.$this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span> a todos los Encantamientos de tu Reino.');
        }
    }

    /**
     * Activate an artifact on target nonbattle only
     */
    public function activateTarget(Artifact $artifact, Player $target)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        //MESSAGE
        $text = array();
        $text[] = array('default', 12, 0, 'center', 'El mago <a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link"><span class="label label-'.$player->getFaction()->getClass().'">'.$player->getNick().'</span></a> ha activado el Artefacto <span class="label label-'.$artifact->getClass().'">'.$artifact->getName().'</span> sobre tu Reino.');
        if ($artifact->getSkill()->getSpyBonus() > 0) {
            //SPIONAGE
            $this->createEspionage($target);
            $this->addFlash('success', 'Has logrado obtener información importante del Reino objetivo.');
        } elseif ($artifact->getSkill()->getHeroBonus() < 0) {
            //HERO LEVEL
            if ($target->getHeroes() > 0) {
                $contracts = $target->getContracts()->toArray();
                shuffle($contracts);
                $contract = $contracts[0]; //suponemos > 0
                $levels = rand(-1, $artifact->getSkill()->getHeroBonus());
                $contract->setLevel($contract->getLevel() + $levels);
                if ($contract->getLevel() <= 0) {
                    $target->removeContract($contract);
                    $manager->remove($contract);
                    $this->addFlash('success', '<span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span> ha perdido '.$levels.' y ha muerto.');
                    $text[] = array('default', 12, 0, 'center', 'Tu héroe <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> ha perdido '.$levels.' niveles y ha muerto.');
                } else {
                    $this->addFlash('success', '<span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span> ha perdido '.$levels.' niveles.');
                    $text[] = array('default', 12, 0, 'center', 'Tu héroe <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> ha perdido '.$levels.' niveles.');
                }
            } else {
                $this->addFlash('danger', '<span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span> no tiene héroes en su Reino.');
                $text[] = array('default', 12, 0, 'center', 'No tienes héroes en tu reino.');
            }
        } elseif ($artifact->getSkill()->getTerrainBonus() < 0) {
            //TERRAIN
            $total = 0;
            foreach ($target->getConstructions() as $construction) {
                $destroyed = floor($artifact->getSkill()->getTerrainBonus() * $construction->getQuantity() / (float)100);
                $construction->setQuantity($construction->getQuantity() + $destroyed);
                $total += $destroyed;
            }
            $this->addFlash('success', 'Has eliminado '.$this->get('service.controller')->nff($total).' <span class="label label-extra">Edificios</span> de <a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link"><span class="label label-'.$target->getFaction()->getClass().'">'.$target->getNick().'</span></a>.');
            $text[] = array('default', 12, 0, 'center', 'Pierdes '.$this->get('service.controller')->nff($total).' <span class="label label-extra">Edificios</span>.');
        } elseif ($artifact->getSkill()->getGoldBonus() < 0) {
            //GOLD
            $gold = $target->getGold() * $artifact->getSkill()->getGoldBonus() / (float)100;
            $target->setGold($target->getGold() + $gold);
            $this->addFlash('success', 'Has eliminado '.$this->get('service.controller')->nff($gold).' <span class="label label-extra">Oro</span> de <a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link"><span class="label label-'.$target->getFaction()->getClass().'">'.$target->getNick().'</span></a>.');
            $text[] = array('default', 12, 0, 'center', 'Pierdes '.$this->get('service.controller')->nff($gold).' <span class="label label-extra">Oro</span>.');
        } elseif ($artifact->getSkill()->getPeopleBonus() < 0) {
            //PEOPLE
            $people = $target->getPeople() * $artifact->getSkill()->getPeopleBonus() / (float)100;
            $target->setPeople($target->getPeople() + $people);
            $this->addFlash('success', 'Has eliminado '.$this->get('service.controller')->nff($people).' <span class="label label-extra">Personas</span> de <a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link"><span class="label label-'.$target->getFaction()->getClass().'">'.$target->getNick().'</span></a>.');
            $text[] = array('default', 12, 0, 'center', 'Pierdes '.$this->get('service.controller')->nff($people).' <span class="label label-extra">Personas</span>.');
        } elseif ($artifact->getSkill()->getManaBonus() < 0) {
            //MANA
            $mana = $target->getMana() * $artifact->getSkill()->getManaBonus() / (float)100;
            $target->setMana($target->getMana() + $mana);
            $this->addFlash('success', 'Has eliminado '.$this->get('service.controller')->nff($mana).' <span class="label label-extra">Maná</span> de <span class="label label-' . $target->getFaction()->getClass() . '">' . $target->getNick() . '</span>.');
            $text[] = array('default', 12, 0, 'center', 'Pierdes '.$this->get('service.controller')->nff($mana).' <span class="label label-extra">Maná</span>.');
        } elseif ($artifact->getSkill()->getTurnsBonus() < 0) {
            //TURNOS
            $turns = rand(-1, $artifact->getSkill()->getTurnsBonus());
            $target->setTurns(max(0, $target->getTurns() + $turns));
            $this->addFlash('success', 'Has eliminado '.$this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span> de <span class="label label-' . $target->getFaction()->getClass() . '">' . $target->getNick() . '</span>.');
            $text[] = array('default', 12, 0, 'center', 'Pierdes '.$this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span>.');
        }
        $this->get('service.controller')->sendMessage($player, $target, 'Reporte de Artefacto', $text, 'magic');
    }
}
