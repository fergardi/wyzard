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
        $this->get('service.controller')->addNews();
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
                $gold = $turns * $player->getGoldResourcePerTurn() * 2;
                $player->setGold($player->getGold() + $gold);
                /*
                 * PERSISTENCIA
                 */
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> y recaudado '.$this->get('service.controller')->nf($gold).' <span class="label label-extra">Oro</span>.');
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            //return $this->redirect($this->generateUrl('archmage_game_kingdom_tax'));
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
        $this->get('service.controller')->addNews();
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $auctions = $manager->getRepository('ArchmageGameBundle:Auction')->findAll();
        if ($request->isMethod('POST')) {
            $turns = 1;
            $bid = isset($_POST['bid'])?$_POST['bid']:null;
            $auction = isset($_POST['auction'])?$_POST['auction']:null;
            $auction = $manager->getRepository('ArchmageGameBundle:Auction')->findOneById($auction);
            if ($auction && $bid && is_numeric($bid) && $auction->getPlayer() != $player && $bid >= $auction->getBid() && $bid <= $player->getGold() && $player->getTurns() >= 1) {
                //el jugador no puede tener mas de una instancia del heroe o de la research, pero si de tropas o de artefactos
                if (!$player->hasContract($auction->getContract()) && !$player->hasResearch($auction->getResearch())) {
                    /*
                     * MANTENIMIENTOS
                     */
                    $player->setGold($player->getGold() - $bid);
                    $player->setTurns($player->getTurns() - $turns);
                    $this->get('service.controller')->checkMaintenances($turns);
                    /*
                     * ACCION
                     */
                    //si existia antes un pujante se le devuelve el dinero de la puja menos la comision y se le manda un mensaje
                    if ($auction->getPlayer()) {
                        $payback = floor($auction->getBid() * 0.95);
                        $auction->getPlayer()->setGold($auction->getPlayer()->getGold() + $payback);
                        $subject = 'Te han sobrepujado';
                        $text = array();
                        $text[] = array('danger', 12, 0, 'center', 'Se te ha devuelto '.$this->get('service.controller')->nf($payback).' Oro, tu puja anterior menos el 5% de comisión, por haber sido sobrepujado en la subasta de <span class="label label-'.$auction->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($auction->getName()).'" class="link">'.$auction->getName().'</a></span>.');
                        $this->get('service.controller')->sendMessage($auction->getPlayer(), $auction->getPlayer(), $subject, $text, 'auction');
                    }
                    //actualizamos el dinero de la puja y el actual pujante
                    $auction->setPlayer($player);
                    $auction->setBid($bid);
                    /*
                     * PERSISTENCIA
                     */
                    $manager->persist($auction);
                    $manager->persist($player);
                    $manager->flush();
                    $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> y pujado '.$this->get('service.controller')->nf($bid).' <span class="label label-extra">Oro</span> por <span class="label label-'.$auction->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($auction->getName()).'" class="link">'.$auction->getName().'</a></span>.');
                } else {
                    $this->addFlash('danger', 'No puedes pujar por un héroe o hechizo que ya posees.');
                }
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            //return $this->redirect($this->generateUrl('archmage_game_kingdom_auction'));
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
        $this->get('service.controller')->addNews();
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $gods = $manager->getRepository('ArchmageGameBundle:Player')->findByGod(true);
        if ($request->isMethod('POST')) {
            $turns = 10;
            if ($turns <= $player->getTurns()) {
                /*
                 * MANTENIMIENTOS
                 */
                $player->setTurns($player->getTurns() - $turns);
                $this->get('service.controller')->checkMaintenances($turns);
                /*
                 * ACCION
                 */
                $sacrifice = array('gold','mana','people');
                if ($player->getContracts()->count() > 0) $sacrifice[] = 'contract';
                if ($player->getTroops()->count() > 0) $sacrifice[] = 'troop';
                if ($player->getItems()->count() > 0) $sacrifice[] = 'item';
                $sacrifice = $sacrifice[rand(0, count($sacrifice) - 1)];
                if ($sacrifice == 'gold') {
                    $player->setGold($player->getGold() / 2);
                    $this->addFlash('danger', 'Los Dioses han exigido la mitad de tu <span class="label label-extra">Oro</span>.');
                }
                if ($sacrifice == 'people') {
                    $player->setPeople($player->getPeople() / 2);
                    $this->addFlash('danger', 'Los Dioses han exigido la mitad de tu <span class="label label-extra">Población</span>.');
                }
                if ($sacrifice == 'mana') {
                    $player->setMana($player->getMana() / 2);
                    $this->addFlash('danger', 'Los Dioses han exigido la mitad de tu <span class="label label-extra">Maná</span>.');
                }
                if ($sacrifice == 'contract') {
                    $contracts = $player->getContracts()->toArray(); //for shuffling
                    shuffle($contracts);
                    $contract = $contracts[0]; //suponemos > 0 por entrar en el array
                    $contract->setLevel($contract->getLevel() - 1);
                    $this->addFlash('danger', 'Los Dioses han exigido un nivel de tu <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span>.');
                    if ($contract->getLevel() <= 0) {
                        $this->addFlash('danger', 'Tu <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> ha muerto.');
                        $player->removeContract($contract);
                        $manager->remove($contract);
                    }
                }
                if ($sacrifice == 'troop') {
                    $troops = $player->getTroops()->toArray(); //for shuffling
                    shuffle($troops);
                    $troop = $troops[0]; //suponemos > 0 por entrar en el array
                    $troop->setQuantity($troop->getQuantity() / 2);
                    $this->addFlash('danger', 'Los Dioses han exigido la mitad de tus <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
                    if ($troop->getQuantity() <= 0) {
                        $player->removeTroop($troop);
                        $manager->remove($troop);
                    }
                }
                if ($sacrifice == 'item') {
                    $items = $player->getItems()->toArray(); //for shuffling
                    shuffle($items);
                    $item = $items[0]; //suponemos > 0 por entrar en el array
                    $item->setQuantity($item->getQuantity() - 1);
                    $this->addFlash('danger', 'Los Dioses han exigido el artefacto <span class="label label-'.$item->getArtifact()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($item->getArtifact()->getName()).'" class="link">'.$item->getArtifact()->getName().'</a></span>.');
                    if ($item->getQuantity() <= 0) {
                        $player->removeItem($item);
                        $manager->remove($item);
                    }
                }
                $spells = $manager->getRepository('ArchmageGameBundle:Spell')->findByEnchantment(true);
                shuffle($spells);
                $spell = $spells[0];
                $god = $manager->getRepository('ArchmageGameBundle:Player')->findOneBy(array('god' => true, 'faction' => $spell->getFaction()));
                //APOCALIPSIS ES UN ENCHANTMENT PERO NO SALE PORQUE NO TIENE GOD DE SU FACCION ASOCIADO
                if ($spell && $god && !$player->hasEnchantmentVictim($spell)) {
                    $enchantment = new Enchantment();
                    $manager->persist($enchantment);
                    $enchantment->setSpell($spell);
                    $enchantment->setVictim($player);
                    $player->addEnchantmentsVictim($enchantment);
                    $enchantment->setOwner($god);
                    $god->addEnchantmentsOwner($enchantment);
                    $manager->persist($god);
                    $this->addFlash('success', '<span class="label label-'.$god->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $god->getId())).'" class="link">'.$god->getNick().'</a></span> ha lanzado el encantamiento <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($enchantment->getSpell()->getName()).'" class="link">'.$enchantment->getSpell()->getName().'</a></span> en tu Reino.');
                } else {
                    $this->addFlash('danger', 'Los Dioses no están satisfechos con tu sacrificio y no moverán un dedo por tu Reino.');
                }
                $manager->persist($player);
                $manager->flush();
            } else {
                $this->addFlash('danger', 'No tienes los <span class="label label-extra">Turnos</span> necesarios para eso.');
            }
            //return $this->redirect($this->generateUrl('archmage_game_kingdom_temple'));
        }
        return array(
            'player' => $player,
            'gods' => $gods,
        );
    }
}
