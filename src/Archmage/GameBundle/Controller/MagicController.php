<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Archmage\GameBundle\Entity\Research;

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
            $turns = $_POST['turns'] or null;
            if ($turns && is_numeric($turns) && $turns > 0 && $turns <= $player->getTurns()) {
                $mana = $turns * $player->getManaResourcePerTurn();
                if ($player->getMana() + $mana >= $player->getManaCap()) $player->setMana($player->getManaCap()); else $player->setMana($player->getMana() + $mana);
                $player->setTurns($player->getTurns() - $turns);
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$turns.' turnos y recargado '.$mana.' maná.');
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
            $research = $_POST['research'] or null;
            $action = $_POST['action'] or null;
            $target = $_POST['target'] or null;
            $research = $manager->getRepository('ArchmageGameBundle:Research')->findOneById($research);
            if ($research && $action) {
                if ($action == 'conjure') {
                    $turns = $research->getSpell()->getTurnCost();
                    $mana = $research->getSpell->getManaCost();
                    if ($turns <= $player->getTurns() && $mana <= $player->getMana()) {
                        $player->setTurns($player->getTurns() - $turns);
                        $player->setMana($player->getMana() - $mana);
                        $this->addFlash('success', 'Has gastado ' . $turns . ' turnos y ' . $mana . ' maná en conjurar ' . $research->getSpell()->getName() . '.');
                    } else {
                        $this->addFlash('danger', 'No tienes los recursos necesarios para conjurar ese hechizo.');
                    }
                }
                if ($action == 'defense') {
                    $turns = 1;
                    if ($player->getTurns() > 0) {
                        $player->setResearchDefense($research);
                        $player->setTurns($player->getTurns() - $turns);
                        $this->addFlash('success', 'Has gastado ' . $turns . ' turno(s) en defender con ' . $research->getSpell()->getName() . '.');
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
            $turns = isset($_POST['turns'])?$_POST['turns']:null;
            $spell = isset($_POST['spell'])?$_POST['spell']:null;
            $research = isset($_POST['research'])?$_POST['research']:null;
            $research = $manager->getRepository('ArchmageGameBundle:Research')->findOneById($research);
            $spell = $manager->getRepository('ArchmageGameBundle:Spell')->findOneById($spell);
            if (($research || $spell) && $turns && is_numeric($turns) && $turns > 0 && $turns <= $player->getTurns()){
                //si quiere investigar un hechizo que no tenia, o sea un spell de su raza, se crea un nuevo research
                if ($spell) {
                    $research = new Research();
                    $research->setSpell($spell);
                    $research->setTurns(0);
                    $research->setPlayer($player);
                    $research->setActive(false);
                    $manager->persist($research);
                    $player->addResearch($research);
                }
                //haya creado anteriormente un nuevo research o siga investigando otro, se comprueba si lo ha terminado y se suman los turnos
                if ($research) {
                    $research->setTurns($research->getTurns() + $turns);
                    if ($research->getTurns() >= $research->getSpell()->getTurnsResearch()) {
                        $research->setActive(true);
                        $this->addFlash('success', 'Has investigado completamente el hechizo "' . $research->getSpell()->getName() . '".');
                    }
                }
                $player->setTurns($player->getTurns() - $turns);
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$turns.' turnos durante la investigación.');
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
            $turns = 1;
            $item = $_POST['item'] or null;
            $action = $_POST['action'] or null;
            $item = $manager->getRepository('ArchmageGameBundle:Item')->findOneById($item);
            if ($item && $action && $turns <= $player->getTurns()) {
                $player->setTurns($player->getTurns() - $turns);
                if ($action == 'activate') {
                    $this->addFlash('success', 'Has gastado ' . $turns . ' turno(s) en activar ' . $item->getArtifact()->getName() . '.');
                } elseif ($action == 'defense') {
                    $player->setItemDefense($item);
                    $this->addFlash('success', 'Has gastado ' . $turns . ' turno(s) en defender con ' . $item->getArtifact()->getName() . '.');
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
        }
        return array(
            'player' => $player,
        );
    }
}
