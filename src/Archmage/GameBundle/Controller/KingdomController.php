<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class KingdomController extends Controller
{
    /**
     * @Route("/game/kingdom/summary")
     * @Template("ArchmageGameBundle:Kingdom:summary.html.twig")
     */
    public function summaryAction()
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        return array(
            'player' => $player,
        );
    }

    /**
     * @Route("/game/kingdom/tax")
     * @Template("ArchmageGameBundle:Kingdom:tax.html.twig")
     */
    public function taxAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        if ($request->isMethod('POST')) {
            $turns = $_POST['turns'];
            if (is_numeric($turns) && $turns > 0 && $turns <= $player->getTurns()) {
                $gold = $turns * $player->getGoldPerTurn();
                $player->setGold($player->getGold() + $gold);
                $player->setTurns($player->getTurns() - $turns);
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$turns.' turnos y recaudado '.$gold.' oro.');
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
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
    public function auctionAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        $auctions = $manager->getRepository('ArchmageGameBundle:Auction')->findAll();
        if ($request->isMethod('POST')) {
            //variables
            $auction = $_POST['auction'];
            $bid = $_POST['bid'];
            $turns = 1;
            $auction = $manager->getRepository('ArchmageGameBundle:Auction')->findOneById($auction);
            //validacion
            if ($auction && $auction->getPlayer() != $player && $bid >= $auction->getBid() && $bid <= $player->getGold() && $player->getTurns() >= 1) {
                //si existia antes un pujante se le devuelve el dinero de la puja
                if ($auction->getPlayer()) {
                    $auction->getPlayer()->setGold($auction->getPlayer()->getGold() + $auction->getBid());
                }
                //actualizamos el dinero de la puja y el actual pujante
                $auction->setPlayer($player);
                $auction->setBid($bid);
                $player->setGold($player->getGold() - $bid);
                $player->setTurns($player->getTurns() - $turns);
                $manager->persist($auction);
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$turns.' turno(s) y pujado '.$bid.' oro en la subasta por '.$auction->getName().'.');
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_kingdom_auction'));
        }
        return array(
            'player' => $player,
            'auctions' => $auctions,
        );
    }
}
