<?php

namespace Archmage\GameBundle\Controller;

use Proxies\__CG__\Archmage\GameBundle\Entity\Enchantment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Archmage\GameBundle\Entity\Item;
use Archmage\GameBundle\Entity\Map;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Recipe;
use Doctrine\Common\Collections\Criteria;

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
        $runes = $manager->getRepository('ArchmageGameBundle:Rune')->findAll();
        if ($request->isMethod('POST')) {
            $rune = isset($_POST['rune']) ? $_POST['rune'] : null;
            $rune = $manager->getRepository('ArchmageGameBundle:Rune')->findOneById($rune);
            if ($rune && $rune->getCost() <= $player->getRunes()) {
                /*
                 * ACCION
                 */
                $player->setRunes($player->getRunes() - $rune->getCost());
                $skill = $rune->getSkill();
                if ($skill->getSpyBonus() > 0) {
                    $telegram = $player->getTelegram();
                    $this->addFlash('success', 'Has gastado '.$rune->getCost().' <span class="label label-rune">Runas</span> y generado un código para Telegram.');
                    $text = array();
                    $text[] = array('default', 12, 0, 'center', 'Conecta con Telegram agregando como amigo a <a href="http://telegram.me/archmagebot" class="link">@ArchmageBot</a>, mándale el código '.$telegram.' y después actualiza tu <a href="'.$this->generateUrl('archmage_game_account_profile').'">Perfil</a>.');
                    $this->get('service.controller')->sendMessage($player, $player, 'Conecta con Telegram', $text);
                }
                if ($skill->getGoldBonus() > 0) {
                    $gold = $skill->getGoldBonus();
                    $player->setGold($player->getGold() + $skill->getGoldBonus());
                    $this->addFlash('success', 'Has gastado '.$rune->getCost().' <span class="label label-rune">Runas</span> y generado '.$this->get('service.controller')->nff($gold).' <span class="label label-extra">Oro</span>.');
                }
                if ($skill->getPeopleBonus() > 0) {
                    $people = $skill->getPeopleBonus();
                    $player->setPeople($player->getPeople() + $skill->getPeopleBonus());
                    $this->addFlash('success', 'Has gastado '.$rune->getCost().' <span class="label label-rune">Runas</span> y generado '.$this->get('service.controller')->nff($people).' <span class="label label-extra">Personas</span>.');
                }
                if ($skill->getManaBonus() > 0) {
                    $mana = $skill->getManaBonus();
                    $player->setMana($player->getMana() + $skill->getManaBonus());
                    $this->addFlash('success', 'Has gastado '.$rune->getCost().' <span class="label label-rune">Runas</span> y generado '.$this->get('service.controller')->nff($mana).' <span class="label label-extra">Maná</span>.');
                }
                if ($skill->getTerrainBonus() > 0) {
                    $free = $skill->getTerrainBonus();
                    $player->setConstruction('Tierras', $player->getFree() + $skill->getTerrainBonus());
                    $this->addFlash('success', 'Has gastado '.$rune->getCost().' <span class="label label-rune">Runas</span> y generado '.$this->get('service.controller')->nff($free).' <span class="label label-extra">Tierras</span>.');
                }
                if ($skill->getMapBonus() > 0) {
                    $level = rand(1,3);
                    switch ($level) {
                        case 1:
                            $rarity = 0;
                            $max = 1;
                            $image = 'easy';
                            break;
                        case 2:
                            $rarity = 50;
                            $max = 3;
                            $image = 'medium';
                            break;
                        case 3:
                            $rarity = 99;
                            $max = 5;
                            $image = 'hard';
                            break;
                    }
                    $criteria = new Criteria();
                    $criteria->where($criteria->expr()->lte('rarity', $rarity));
                    $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->matching($criteria)->toArray();
                    shuffle($artifacts);
                    $artifact = $artifacts[0];
                    $map = new Map();
                    $manager->persist($map);
                    $map->setGold(rand(1000000,20000000));
                    $map->setArtifact($artifact);
                    $map->setImage($image);
                    $units = $manager->getRepository('ArchmageGameBundle:Unit')->findAll();
                    shuffle($units);
                    for ($i = 0; $i < $max; $i++) {
                        $unit = $units[$i];
                        $troop = new Troop();
                        $manager->persist($troop);
                        $troop->setUnit($unit);
                        $troop->setQuantity(500000 / $unit->getPower());
                        $troop->setMap($map);
                        $map->addTroop($troop);
                    }
                    $map->setPlayer($player);
                    $player->addMap($map);
                    $this->addFlash('success', 'Has encontrado un nuevo <span class="label label-map"><a href="'.$this->generateUrl('archmage_game_army_quest').'" class="link">Mapa</a></span>.');
                }
                if ($skill->getRecipeBonus() > 0) {
                    $criteria = new Criteria();
                    $criteria->where($criteria->expr()->lte('rarity', rand(0,99)));
                    $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->matching($criteria)->toArray();
                    $recipe = new Recipe();
                    $manager->persist($recipe);
                    shuffle($artifacts);
                    $recipe->setFirst($artifacts[0]);
                    shuffle($artifacts);
                    $recipe->setSecond($artifacts[0]);
                    shuffle($artifacts);
                    $recipe->setResult($artifacts[0]);
                    $recipe->setGold($recipe->getResult()->getGoldAuction() / 2);
                    $player->addRecipe($recipe);
                    $recipe->setPlayer($player);
                    $this->addFlash('success', 'Has encontrado una nueva <span class="label label-recipe"><a href="'.$this->generateUrl('archmage_game_magic_alchemy').'" class="link">Receta</a></span>.');
                }
                if ($skill->getArtifactBonus() > 0) {
                    $criteria = new Criteria();
                    $criteria->where($criteria->expr()->lte('rarity', rand(0,99)));
                    $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->matching($criteria)->toArray();
                    shuffle($artifacts);
                    $artifact = $artifacts[0];
                    $item = $player->hasArtifact($artifact);
                    if ($item) {
                        $item->setQuantity($item->getQuantity() + 1);
                    } else {
                        $item = new Item();
                        $manager->persist($item);
                        $item->setArtifact($artifact);
                        $item->setQuantity(1);
                        $item->setPlayer($player);
                        $player->addItem($item);
                    }
                    $this->addFlash('success', 'Has encontrado por casualidad el artefacto <span class="label label-'.$item->getArtifact()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($item->getArtifact()->getName()).'" class="link">'.$item->getArtifact()->getName().'</a></span>.');
                }
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
            'runes' => $runes,
        );
    }
}
