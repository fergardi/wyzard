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
        $manager = $this->getDoctrine()->getManager();
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        if ($request->isMethod('POST')) {
            $turns = $_POST['turns'];
            if (is_numeric($turns) && $turns > 0 && $turns <= $player->getTurns()) {
                $lands = $turns * 1;
                $player->setBuilding('Tierras', $player->getBuilding('Tierras')->getQuantity() + $lands);
                $player->setTurns($player->getTurns() - $turns);
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$turns.' turno(s) y encontrado '.$lands.' tierra(s).');
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
        $manager = $this->getDoctrine()->getManager();
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        if ($request->isMethod('POST')) {
            $turns = 1;
            $lands = $_POST['lands'] or null;
            $construction = $_POST['construction'] or null;
            $construction = $manager->getRepository('ArchmageGameBundle:Construction')->findOneById($construction);
            if ($lands && $construction && $player->getConstructions()->contains($construction) && $lands > 0 && $lands <= $player->getBuilding('Tierras')->getQuantity() && $turns <= $player->getTurns()) {
                $construction->setQuantity($construction->getQuantity() + $lands);
                $player->getBuilding('Tierras')->setQuantity($player->getBuilding('Tierras')->getQuantity() - $lands);
                $player->setTurns($player->getTurns() - $turns);
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$turns.' turno(s) y X oro y construido '.$lands.' '.$construction->getBuilding()->getName().'.');
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_territory_build'));
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
        $manager = $this->getDoctrine()->getManager();
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        if ($request->isMethod('POST')) {
            $turns = 1;
            $lands = $_POST['lands'] or null;
            $construction = $_POST['construction'] or null;
            $construction = $manager->getRepository('ArchmageGameBundle:Construction')->findOneById($construction);
            if ($lands && $construction && $player->getConstructions()->contains($construction) && $lands > 0 && $lands <= $construction->getQuantity() && $turns <= $player->getTurns()) {
                $construction->setQuantity($construction->getQuantity() - $lands);
                $player->getBuilding('Tierras')->setQuantity($player->getBuilding('Tierras')->getQuantity() + $lands);
                $player->setTurns($player->getTurns() - $turns);
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$turns.' turno(s) y derribado '.$lands.' edificio(s).');
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_territory_demolish'));
        }
        return array(
            'player' => $player,
        );
    }
}
