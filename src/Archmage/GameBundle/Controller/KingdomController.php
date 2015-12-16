<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\Criteria;
use Archmage\GameBundle\Entity\Item;
use Archmage\GameBundle\Entity\Enchantment;
use Archmage\GameBundle\Entity\Quest;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Recipe;

class KingdomController extends Controller
{
    /**
     * @Route("/game/kingdom/summary")
     * @Template("ArchmageGameBundle:Kingdom:summary.html.twig")
     */
    public function summaryAction()
    {
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
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
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
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
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span> y recaudado '.$this->get('service.controller')->nff($gold).' <span class="label label-extra">Oro</span>.');
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
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $auctions = $manager->getRepository('ArchmageGameBundle:Auction')->findAll();
        if ($request->isMethod('POST')) {
            $turns = 1;
            $bid = isset($_POST['bid'])?$_POST['bid']:null;
            $auction = isset($_POST['auction'])?$_POST['auction']:null;
            $auction = $manager->getRepository('ArchmageGameBundle:Auction')->findOneById($auction);
            if ($auction && $bid && is_numeric($bid) && $auction->getPlayer() != $player) {
                if ($bid <= $player->getGold() && $player->getTurns() >= 1) {
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
                        if ($bid > $auction->getTop()) {
                            if ($auction->getPlayer()) {
                                $payback = floor($auction->getTop() * 0.95);
                                $auction->getPlayer()->setGold($auction->getPlayer()->getGold() + $payback);
                                $text = array();
                                $text[] = array('default', 12, 0, 'center', 'Se te ha devuelto ' . $this->get('service.controller')->nff($payback) . ' <span class="label label-extra">Oro</span>, tu puja máxima anterior menos el 5% de comisión, por haber sido sobrepujado en la subasta de <span class="label label-' . $auction->getClass() . '"><a href="' . $this->generateUrl('archmage_game_home_help') . '#' . $this->get('service.controller')->toSlug($auction->getName()) . '" class="link">' . $auction->getName() . '</a></span>.');
                                $this->get('service.controller')->sendMessage($auction->getPlayer(), $auction->getPlayer(), 'Te han sobrepujado', $text, 'auction');
                                $manager->persist($auction->getPlayer());
                            }
                            $auction->setBid($auction->getTop());
                            $auction->setTop($bid);
                            $auction->setPlayer($player);
                            $this->addFlash('success', 'Has gastado ' . $this->get('service.controller')->nff($turns) . ' <span class="label label-extra">Turnos</span> y pujado ' . $this->get('service.controller')->nff($bid) . ' <span class="label label-extra">Oro</span> por <span class="label label-' . $auction->getClass() . '"><a href="' . $this->generateUrl('archmage_game_home_help') . '#' . $this->get('service.controller')->toSlug($auction->getName()) . '" class="link">' . $auction->getName() . '</a></span>.');
                        } else {
                            $auction->setBid($bid);
                            $player->setGold($player->getGold() + $bid);
                            $this->addFlash('danger', 'Has gastado ' . $this->get('service.controller')->nff($turns) . ' <span class="label label-extra">Turnos</span> y pujado ' . $this->get('service.controller')->nff($bid) . ' <span class="label label-extra">Oro</span> por <span class="label label-' . $auction->getClass() . '"><a href="' . $this->generateUrl('archmage_game_home_help') . '#' . $this->get('service.controller')->toSlug($auction->getName()) . '" class="link">' . $auction->getName() . '</a></span>, pero otro tenía una puja máxima superior.');
                            $this->addFlash('success', 'Se te ha devuelto ' . $this->get('service.controller')->nff($bid) . ' <span class="label label-extra">Oro</span>.');
                        }
                        /*
                         * PERSISTENCIA
                         */
                        $manager->persist($auction);
                        $manager->persist($player);
                        $manager->flush();
                    } else {
                        $this->addFlash('danger', 'No puedes pujar por un héroe o hechizo que ya posees.');
                    }
                } else {
                    $this->addFlash('danger', 'No tienes el <span class="label label-extra">Oro</span> o los <span class="label label-extra">Turnos</span> suficientes para eso.');
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
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $gods = $manager->getRepository('ArchmageGameBundle:Player')->findByGod(true);
        if ($request->isMethod('POST')) {
            $turns = 5;
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
                    $player->setGold($player->getGold() * 0.90);
                    $this->addFlash('danger', 'Los Dioses han exigido un diezmo de tu <span class="label label-extra">Oro</span>.');
                }
                if ($sacrifice == 'people') {
                    $player->setPeople($player->getPeople() * 0.90);
                    $this->addFlash('danger', 'Los Dioses han exigido un diezmo de tu <span class="label label-extra">Población</span>.');
                }
                if ($sacrifice == 'mana') {
                    $player->setMana($player->getMana() * 0.90);
                    $this->addFlash('danger', 'Los Dioses han exigido un diezmo de tu <span class="label label-extra">Maná</span>.');
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
                    $troop->setQuantity($troop->getQuantity() * 0.90);
                    $this->addFlash('danger', 'Los Dioses han exigido un diezmo de tus <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
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
                    $this->addFlash('danger', 'Los Dioses han exigido un <span class="label label-'.$item->getArtifact()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($item->getArtifact()->getName()).'" class="link">'.$item->getArtifact()->getName().'</a></span>.');
                    if ($item->getQuantity() <= 0) {
                        if ($player->getItem() && $player->getItem()->getArtifact() == $item->getArtifact()) $player->setItem(null);
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
                /*
                 * PERSISTENCIA
                 */
                $manager->persist($player);
                $manager->flush();
            } else {
                $this->addFlash('danger', 'No tienes los <span class="label label-extra">Turnos</span> necesarios para eso.');
            }
            return $this->redirect($this->generateUrl('archmage_game_kingdom_temple'));
        }
        return array(
            'player' => $player,
            'gods' => $gods,
        );
    }

    /**
     * @Route("/game/kingdom/market")
     * @Template("ArchmageGameBundle:Kingdom:market.html.twig")
     */
    public function marketAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->findAll();
        $packs = $manager->getRepository('ArchmagePaymentBundle:Pack')->findAll();
        if ($request->isMethod('POST')) {
            $artifact = isset($_POST['artifact'])?$_POST['artifact']:null;
            $artifact = $manager->getRepository('ArchmageGameBundle:Artifact')->findOneById($artifact);
            if ($artifact && $artifact->getCost() > 0 && $artifact->getCost() <= $player->getRunes()) {
                /*
                 * ACCION
                 */
                $player->setRunes($player->getRunes() - $artifact->getCost());
                $item = $player->hasArtifact($artifact);
                if ($item) {
                    $item->setQuantity($item->getQuantity() + 1);
                } else {
                    $item = new Item();
                    $manager->persist($item);
                    $item->setQuantity(1);
                    $item->setArtifact($artifact);
                    $item->setPlayer($player);
                    $player->addItem($item);
                }
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nff($artifact->getCost()).' <span class="label label-artifact">Runas</span> comprando el Artefacto <span class="label label-'.$item->getArtifact()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($item->getArtifact()->getName()).'" class="link">'.$item->getArtifact()->getName().'</a></span>.');
                /*
                 * PERSISTENCIA
                 */
                $manager->persist($player);
                $manager->flush();
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_kingdom_market'));
        }
        return array(
            'player' => $player,
            'artifacts' => $artifacts,
            'pack1' => $packs[0],
            'pack2' => $packs[1],
            'pack3' => $packs[2],
        );
    }
}
