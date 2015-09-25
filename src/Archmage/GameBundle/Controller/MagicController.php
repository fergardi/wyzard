<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Archmage\GameBundle\Entity\Research;
use Archmage\GameBundle\Entity\Troop;

class MagicController extends Controller
{
    const MAX_TROOPS = 5;

    /**
     * @Route("/game/magic/charge")
     * @Template("ArchmageGameBundle:Magic:charge.html.twig")
     */
    public function chargeAction(Request $request)
    {
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
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> y recargado '.$this->get('service.controller')->nf($mana).' <span class="label label-extra">Maná</span>.');
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_magic_charge'));
        }
        return array(
            'player' => $player,
        );
    }


    /**
     * @Route("/game/magic/conjure")
     * @Template("ArchmageGameBundle:Magic:conjure.html.twig")
     */
    public function conjureAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $targets = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
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
                        $player->setResearchDefense($research);
                        $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> en defender con <span class="label label-'.$research->getSpell()->getFaction()->getClass().'">'.$research->getSpell()->getName().'</span>.');
                    } else {
                        $this->addFlash('danger', 'No tienes los <span class="label label-extra">Turnos</span> necesarios.');
                    }
                } else {
                    $turns = $research->getSpell()->getTurnsCost() * $player->getMagic();
                    $mana = ($research->getSpell()->getFaction() == $player->getFaction())?$research->getSpell()->getManaCost():$research->getSpell()->getManaCost()*2;
                    if ($turns <= $player->getTurns() && $mana <= $player->getMana()) {
                        if ($research->getSpell()->getSkill()->getSelf()) {
                            /*
                             * MANTENIMIENTOS
                             */
                            $player->setTurns($player->getTurns() - $turns);
                            $player->setMana($player->getMana() - $mana);
                            $this->get('service.controller')->checkMaintenances($turns);
                            /*
                             * ACCION
                             */
                            $this->get('service.controller')->conjureSelf($research->getSpell());
                            $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> y '.$this->get('service.controller')->nf($mana).' <span class="label label-extra">Maná</span> en conjurar <span class="label label-'.$research->getSpell()->getFaction()->getClass().'">'.$research->getSpell()->getName().'</span>.');
                        } else {
                            $target = isset($_POST['target'])?$_POST['target']:null;
                            $target = $manager->getRepository('ArchmageGameBundle:Player')->findOneById($target);
                            if ($target) {
                                /*
                                 * MANTENIMIENTOS
                                 */
                                $player->setTurns($player->getTurns() - $turns);
                                $player->setMana($player->getMana() - $mana);
                                $this->get('service.controller')->checkMaintenances($turns);
                                /*
                                 * ACCION
                                 */
                                if (rand(0,99) >= $target->getMagicDefense()) {
                                    $this->get('service.controller')->conjureTarget($research->getSpell(), $target);
                                    $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> y '.$this->get('service.controller')->nf($mana).' <span class="label label-extra">Maná</span> en conjurar <span class="label label-'.$research->getSpell()->getFaction()->getClass().'">'.$research->getSpell()->getName().'</span> sobre <span class="label label-'.$target->getFaction()->getClass().'">'.$target->getNick().'</span>.');
                                } else {
                                    $this->addFlash('danger', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> y '.$this->get('service.controller')->nf($mana).' <span class="label label-extra">Maná</span> en conjurar <span class="label label-'.$research->getSpell()->getFaction()->getClass().'">'.$research->getSpell()->getName().'</span> sobre <span class="label label-'.$target->getFaction()->getClass().'">'.$target->getNick().'</span>, pero no has superado su <span class="label label-extra">Defesa Mágica</span>.');
                                }
                            } else {
                                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
                            }
                        }
                    } else {
                        $this->addFlash('danger', 'No tienes los recursos necesarios para conjurar ese hechizo.');
                    }
                }
                $manager->persist($player);
                $manager->flush();
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
        }
        return array(
            'player' => $player,
            'targets' => $targets,
        );
    }

    /**
     * @Route("/game/magic/research")
     * @Template("ArchmageGameBundle:Magic:research.html.twig")
     */
    public function researchAction(Request $request)
    {
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
                        $this->addFlash('success', 'Has investigado completamente el hechizo <span class="label label-'.$research->getSpell()->getFaction()->getClass().'">'.$research->getSpell()->getName().'</span>.');
                    }
                }
                /*
                 * PERSISTENCIA
                 */
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> investigando el hechizo <span class="label label-'.$research->getSpell()->getFaction()->getClass().'">'.$research->getSpell()->getName().'</span>.');
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
     * @Route("/game/magic/artifact")
     * @Template("ArchmageGameBundle:Magic:artifact.html.twig")
     */
    public function artifactAction(Request $request)
    {
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
                        //TODO
                        $this->addFlash('success', 'Has gastado '. $this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> en activar <span class="label label-'.$item->getArtifact()->getFaction()->getClass().'">'.$item->getArtifact()->getName().'</span>.');
                    } elseif ($action == 'defense') {
                        $player->setItemDefense($item);
                        $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> en defender con <span class="label label-'.$item->getArtifact()->getFaction()->getClass().'">'.$item->getArtifact()->getName().'</span>.');
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
                $this->addFlash('danger', 'No tienes <span class="label label-extra">Turnos</span> suficientes para eso.');
            }
            return $this->redirect($this->generateUrl('archmage_game_magic_artifact'));
        }
        return array(
            'player' => $player,
            'targets' => $targets,
        );
    }

    /**
     * @Route("/game/magic/dispell")
     * @Template("ArchmageGameBundle:Magic:dispell.html.twig")
     */
    public function dispellAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        if ($request->isMethod('POST')) {
            $turns = 1;
            $enchantment = isset($_POST['enchantment'])?$_POST['enchantment']:null;
            if ($turns <= $player->getTurns()) {
                $enchantment = $manager->getRepository('ArchmageGameBundle:Enchantment')->findOneById($enchantment);
                if ($enchantment) {
                    /*
                     * MANTENIMIENTO
                     */
                    $player->setTurns($player->getTurns() - $turns);
                    $this->get('service.controller')->checkMaintenances($turns);
                    $chance = rand(0,99);
                    if ($chance >= $enchantment->getOwner()->getMagicDefense()) {
                        $player->removeEnchantmentsVictim($enchantment);
                        $enchantment->getOwner()->removeEnchantmentsOwner($enchantment);
                        $manager->persist($enchantment->getOwner());
                        $this->addFlash('success', 'Has roto el encantamiento <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'">'.$enchantment->getSpell()->getName().'</span> de <span class="label label-'.$enchantment->getOwner()->getFaction()->getClass().'">'.$enchantment->getOwner()->getNick().'</span>.');
                        $manager->remove($enchantment);
                    } else {
                        $this->addFlash('danger', 'No has conseguido romper el encantamiento.');
                    }
                    $manager->persist($player);
                    $manager->flush();
                } else {
                    $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
                }
            } else {
                $this->addFlash('danger', 'No tienes <span class="label label-extra">Turnos</span> suficientes para eso.');
            }
            return $this->redirect($this->generateUrl('archmage_game_magic_dispell'));
        }
        return array(
            'player' => $player,
        );
    }
}
