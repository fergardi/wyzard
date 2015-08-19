<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class TerritoryController extends Controller
{
    /**
     * @Route("/game/territory/explore")
     * @Template("ArchmageGameBundle:Territory:explore.html.twig")
     */
    public function exploreAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        if ($request->isMethod('POST')) {
            $turns = $_POST['turns'];
            if (is_numeric($turns) && $turns > 0 && $turns <= $player->getTurns()) {
                $lands = $turns * 1;
                $player->setBuilding('Tierras', $player->getBuilding('Tierras')->getQuantity() + $lands);
                $player->setTurns($player->getTurns() - $turns);
                $em->persist($player);
                $em->flush();
                $this->addFlash('success', 'Has gastado '.$turns.' turnos y encontrado '.$lands.' tierras.');
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_territory_explore'));
        }
        return array(
            'player' => $player,
        );
    }

    /**
     * @Route("/game/territory/build")
     * @Template("ArchmageGameBundle:Territory:build.html.twig")
     */
    public function buildAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        if ($request->isMethod('POST')) {

        }
        return array(
            'player' => $player,
        );
    }

    /**
     * @Route("/game/territory/demolish")
     * @Template("ArchmageGameBundle:Territory:demolish.html.twig")
     */
    public function demolishAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        if ($request->isMethod('POST')) {

        }
        return array(
            'player' => $player,
        );
    }
}
