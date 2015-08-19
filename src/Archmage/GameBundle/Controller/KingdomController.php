<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Constraints;

class KingdomController extends Controller
{
    /**
     * @Route("/game/kingdom/summary")
     * @Template("ArchmageGameBundle:Kingdom:summary.html.twig")
     */
    public function summaryAction()
    {
        return array();
    }

    /**
     * @Route("/game/kingdom/tax")
     * @Template("ArchmageGameBundle:Kingdom:tax.html.twig")
     */
    public function taxAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        if ($request->isMethod('POST')) {
            $turns = $_POST['turns'];
            if (is_numeric($turns) && $turns > 0 && $turns <= $player->getTurns()) {
                $gold = $turns * $player->getGoldPerTurn();
                $this->addFlash('success', 'Has recaudado '.$gold.' oro.');
                $player->setGold($player->getGold() + $gold);
                $player->setTurns($player->getTurns() - $turns);
                $em->persist($player);
                $em->flush();
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error en el formulario, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_kingdom_tax'));
        }
        return array(
            'player' => $player,
        );
    }

    /**
     * @Route("/game/kingdom/auction")
     * @Template("ArchmageGameBundle:Kingdom:auction.html.twig")
     */
    public function auctionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        $units = $em->getRepository('ArchmageGameBundle:Unit')->findAll();
        shuffle($units);
        $units = array_slice($units, 0, 3);
        $artifacts = $em->getRepository('ArchmageGameBundle:Artifact')->findAll();
        shuffle($artifacts);
        $artifacts = array_slice($artifacts, 0, 2);
        $heroes = $em->getRepository('ArchmageGameBundle:Hero')->findAll();
        shuffle($heroes);
        $heroes = array_slice($heroes, 0, 1);
        return array(
            'player' => $player,
            'heroes' => $heroes,
            'units' => $units,
            'artifacts' => $artifacts,
        );
    }
}
