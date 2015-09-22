<?php

namespace Archmage\GameBundle\Controller;

use Proxies\__CG__\Archmage\GameBundle\Entity\Enchantment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Archmage\GameBundle\Entity\Message;

class KingdomController extends Controller
{
    /**
     * @Route("/game/kingdom/summary")
     * @Template("ArchmageGameBundle:Kingdom:summary.html.twig")
     */
    public function summaryAction()
    {
        //cargar noticias
        $this->get('service.controller')->addNews();
        $player = $this->getUser()->getPlayer();
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
        $player = $this->getUser()->getPlayer();
        if ($request->isMethod('POST')) {
            $turns = isset($_POST['turns'])?$_POST['turns']:null;
            if ($turns && is_numeric($turns) && $turns > 0 && $turns <= $player->getTurns()) {
                $gold = $turns * $player->getGoldResourcePerTurn() * 2;
                $player->setGold($player->getGold() + $gold);
                $player->setTurns($player->getTurns() - $turns);
                $this->get('service.controller')->checkMaintenances($turns);
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' turnos y recaudado '.$this->get('service.controller')->nf($gold).' oro.');
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
        $player = $this->getUser()->getPlayer();
        $auctions = $manager->getRepository('ArchmageGameBundle:Auction')->findAll();
        if ($request->isMethod('POST')) {
            $turns = 1;
            $bid = isset($_POST['bid'])?$_POST['bid']:null;
            $auction = isset($_POST['auction'])?$_POST['auction']:null;
            $auction = $manager->getRepository('ArchmageGameBundle:Auction')->findOneById($auction);
            if ($auction && $bid && is_numeric($bid) && $auction->getPlayer() != $player && $bid >= $auction->getBid() && $bid <= $player->getGold() && $player->getTurns() >= 1) {
                //el jugador no puede tener mas de una instancia del heroe o de la research
                if (!$player->hasContract($auction->getContract()) && !$player->hasResearch($auction->getResearch())) {
                    //si existia antes un pujante se le devuelve el dinero de la puja y se le manda un mensaje
                    if ($auction->getPlayer()) {
                        $auction->getPlayer()->setGold($auction->getPlayer()->getGold() + $auction->getBid());
                        $message = new Message();
                        $message->setPlayer($auction->getPlayer());
                        $message->setSubject('Te han sobrepujado en la subasta');
                        $text = array(
                            array('danger', 12, 0, 'center', 'Se te ha devuelto '.$this->get('service.controller')->nf($auction->getBid()).' oro. No dejes que te arrebaten lo que deseas, vuelve a pujar en la subasta!'),
                        );
                        $message->setText($text);
                        $message->setClass('danger');
                        $message->setOwner(null);
                        $message->setReaded(false);
                        $manager->persist($message);
                        $auction->getPlayer()->addMessage($message);
                    }
                    //actualizamos el dinero de la puja y el actual pujante
                    $auction->setPlayer($player);
                    $auction->setBid($bid);
                    $player->setGold($player->getGold() - $bid);
                    $player->setTurns($player->getTurns() - $turns);
                    $this->get('service.controller')->checkMaintenances($turns);
                    $manager->persist($auction);
                    $manager->persist($player);
                    $manager->flush();
                    $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' turnos y pujado '.$this->get('service.controller')->nf($bid).' oro en la subasta por "'.$auction->getName().'".');
                } else {
                    $this->addFlash('danger', 'No puedes pujar por un héroe o hechizo que ya posees.');
                }
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

    /**
     * @Route("/game/kingdom/temple")
     * @Template("ArchmageGameBundle:Kingdom:temple.html.twig")
     */
    public function templeAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        if ($request->isMethod('POST')) {
            $turns = 10;
            $gold = isset($_POST['gold'])?$_POST['gold']:null;
            if ($gold && is_numeric($gold) && $gold > 0 && $gold <= $player->getGold() && $turns <= $player->getTurns()) {
                $spells = $manager->getRepository('ArchmageGameBundle:Spell')->findByEnchantment(true);
                shuffle($spells);
                $spell = $spells[0];
                if ($spell && !$player->hasEnchantmentVictim($spell)) {
                    $enchantment = new Enchantment();
                    $enchantment->setSpell($spell);
                    $enchantment->setVictim($player);
                    $enchantment->setOwner($player);
                    $manager->persist($enchantment);
                    $player->addEnchantmentsVictim($enchantment);
                    $this->addFlash('success', 'Los Dioses han lanzado el encantamiento '.$enchantment->getSpell()->getName().' en tu reino.');
                } else {
                    $this->addFlash('danger', 'Los Dioses no están satisfechos con tu reino y no moverán un dedo.');
                }
                $player->setGold($player->getGold() - $gold);
                $player->setGold($player->getTurns() - $turns);
                $this->get('service.controller')->checkMaintenances($turns);
                $manager->persist($player);
                $manager->flush();
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_kingdom_temple'));
        }
        return array(
            'player' => $player,
        );
    }
}
