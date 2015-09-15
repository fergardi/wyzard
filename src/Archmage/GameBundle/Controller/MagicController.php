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
    /**
     * @Route("/game/magic/charge")
     * @Template("ArchmageGameBundle:Magic:charge.html.twig")
     */
    public function chargeAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        if ($request->isMethod('POST')) {
            $turns = isset($_POST['turns'])?$_POST['turns']:null;
            if ($turns && is_numeric($turns) && $turns > 0 && $turns <= $player->getTurns()) {
                $mana = $turns * $player->getManaResourcePerTurn() * 2;
                if ($player->getMana() + $mana >= $player->getManaCap()) $player->setMana($player->getManaCap()); else $player->setMana($player->getMana() + $mana);
                $player->setTurns($player->getTurns() - $turns);
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' turnos y recargado '.$this->get('service.controller')->nf($mana).' maná.');
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
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        $targets = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
        if ($request->isMethod('POST')) {
            $research = isset($_POST['research'])?$_POST['research']:null;
            $action = isset($_POST['action'])?$_POST['action']:null;
            $target = isset($_POST['target'])?$_POST['target']:null;
            $research = $manager->getRepository('ArchmageGameBundle:Research')->findOneById($research);
            if ($research && $action) {
                if ($action == 'conjure') {
                    $turns = $research->getSpell()->getTurnsCost();
                    $mana = $research->getSpell()->getManaCost() * $player->getMagic();
                    if ($turns <= $player->getTurns() && $mana <= $player->getMana()) {
                        $player->setTurns($player->getTurns() - $turns);
                        $this->get('service.controller')->checkMaintenance($turns);
                        $player->setMana($player->getMana() - $mana);
                        //self
                        if ($research->getSpell()->getSkill()->getSelf()) {
                            if ($research->getSpell()->getEnchant()) {
                            //TODO
                            } else {
                                if ($research->getSpell()->getSkill()->getSummon()) {
                                    //TODO
                                    if ($player->getTroops()->count() >= 5) {
                                        $quantity = ceil($research->getSpell()->getSkill()->getQuantityBonus() * $player->getMagic() * rand(95,105) / 100);
                                        $troop = $player->hasUnit($research->getSpell()->getSkill()->getUnit());
                                        if ($troop) {
                                            $troop->setQuantity($troop->getQuantity() + $quantity);
                                        } else {
                                            $troop = new Troop();
                                            $manager->persist($troop);
                                            $troop->setUnit($research->getSpell()->getSkill()->getUnit());
                                            $troop->setQuantity($quantity);
                                            $troop->setPlayer($player);
                                            $player->addTroop($troop);
                                        }
                                        $this->addFlash('success', 'Has invocado '.$this->get('service.controller')->nf($quantity).' unidades '.$research->getSpell()->getSkill()->getUnit()->getName().'.');
                                    } else {
                                        $this->addFlash('danger', 'No puedes tener más de 5 tropas distintas al mismo tiempo, desbanda algunas.');
                                    }
                                }
                            }
                            $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' turnos y '.$this->get('service.controller')->nf($mana).' maná en conjurar '.$research->getSpell()->getName().'.');
                        } else {
                            //TODO
                        }
                    } else {
                        $this->addFlash('danger', 'No tienes los recursos necesarios para conjurar ese hechizo.');
                    }
                }
                if ($action == 'defense') {
                    $turns = 1;
                    if ($player->getTurns() > 0) {
                        $player->setResearchDefense($research);
                        $player->setTurns($player->getTurns() - $turns);
                        $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' turno(s) en defender con '.$research->getSpell()->getName().'.');
                    } else {
                        $this->addFlash('danger', 'No tienes los recursos necesarios para conjurar ese hechizo.');
                    }
                }
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
        );
    }

    /**
     * @Route("/game/magic/research")
     * @Template("ArchmageGameBundle:Magic:research.html.twig")
     */
    public function researchAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        $spells = $manager->getRepository('ArchmageGameBundle:Spell')->findAllSpellsResearchablesByPlayer($player);
        if ($request->isMethod('POST')) {
            //recibe datos del form post y busca en database sus ids
            $turns = isset($_POST['turns'])?$_POST['turns']:null;
            $research = isset($_POST['research'])?$_POST['research']:null;
            $research = $manager->getRepository('ArchmageGameBundle:Research')->findOneById($research);
            $spell = isset($_POST['spell'])?$_POST['spell']:null;
            $spell = $manager->getRepository('ArchmageGameBundle:Spell')->findOneById($spell);
            if (($research || $spell) && $turns && is_numeric($turns) && $turns > 0 && $turns <= $player->getTurns()){
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
                            $this->addFlash('success', 'Has aumentado 1 punto tu nivel de magia.');
                        }
                        $this->addFlash('success', 'Has investigado completamente el hechizo "' . $research->getSpell()->getName() . '".');
                    }
                }
                //resta turnos al jugador y flush
                $player->setTurns($player->getTurns() - $turns);
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' turnos durante la investigación.');
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
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        $targets = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
        if ($request->isMethod('POST')) {
            //recibe datos del form post y busca en databases sus ids
            $turns = 1;
            $item = isset($_POST['item'])?$_POST['item']:null;
            $action = isset($_POST['action'])?$_POST['action']:null;
            $item = $manager->getRepository('ArchmageGameBundle:Item')->findOneById($item);
            if ($item && $action && $turns <= $player->getTurns()) {
                //resta turnos al usarlo
                $player->setTurns($player->getTurns() - $turns);
                if ($action == 'activate') {
                    //TODO
                    $this->addFlash('success', 'Has gastado '. $this->get('service.controller')->nf($turns).' turnos en activar '.$item->getArtifact()->getName().'.');
                } elseif ($action == 'defense') {
                    $player->setItemDefense($item);
                    $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' turnos en defender con '.$item->getArtifact()->getName().'.');
                }
                $manager->persist($player);
                $manager->flush();
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
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
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        if ($request->isMethod('POST')) {
            //TODO
        }
        return array(
            'player' => $player,
        );
    }
}
