<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

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
                $mana = $turns * $player->getManaPerTurn();
                $player->setMana($player->getMana() + $mana);
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
            $research = $manager->getRepository('ArchmageGameBundle:Research')->findOneById($research);
            if ($research && $action) {
                if ($action == 'conjure' && $research->getSpell()->getTurnCost() <= $player->getTurns()) {
                    $turns = $research->getSpell()->getTurnCost();
                    $this->addFlash('success', 'Has gastado ' . $turns . ' turno(s) en conjurar ' . $research->getSpell()->getName() . '.');
                } elseif ($action == 'defense' && $player->getTurns() > 0) {
                    $turns = 1;
                    $player->setResearchDefense($research);
                    $this->addFlash('success', 'Has gastado ' . $turns . ' turno(s) en defender con ' . $research->getSpell()->getName() . '.');
                }
                $player->setTurns($player->getTurns() - $turns);
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
        if ($request->isMethod('POST')) {
            $turns = $_POST['turns'] or null;
            $research = $_POST['research'] or null;
            $research = $manager->getRepository('ArchmageGameBundle:Research')->findOneById($research);
            if ($research && $turns && is_numeric($turns) && $turns > 0 && $turns <= $player->getTurns()){
                $research->setTurns($research->getTurns() + $turns);
                $player->setTurns($player->getTurns() - $turns);
                if ($research->getTurns() >= $research->getSpell()->getTurnResearch()) {
                    $research->setActive(true);
                    $this->addFlash('success', 'Has investigado completamente el hechizo "'.$research->getSpell()->getName().'".');
                }
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$turns.' turno(s) en investigación.');
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_magic_research'));
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
