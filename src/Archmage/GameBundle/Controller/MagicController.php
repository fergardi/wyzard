<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Archmage\GameBundle\Entity\Research;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Spell;
use Archmage\GameBundle\Entity\Player;
use Archmage\GameBundle\Entity\Enchantment;
use Archmage\GameBundle\Entity\Item;
use Archmage\GameBundle\Entity\Unit;
use Archmage\GameBundle\Entity\Artifact;
use Archmage\GameBundle\Entity\Message;
use Archmage\GameBundle\Entity\Contract;

class MagicController extends Controller
{
    /**
     * @Route("/game/magic/charge")
     * @Template("ArchmageGameBundle:Magic:charge.html.twig")
     */
    public function chargeAction(Request $request)
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
                $mana = $turns * $player->getManaResourcePerTurn() * 2;
                if ($player->getMana() + $mana >= $player->getManaCap()) $player->setMana($player->getManaCap()); else $player->setMana($player->getMana() + $mana);
                /*
                 * PERSISTENCIA
                 */
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> y recargado '.$this->get('service.controller')->nf($mana).' <span class="label label-extra">Maná</span>.');
            } else {
                $this->addFlash('danger', 'No tienes suficientes <span class="label label-extra">Turnos</span> para eso.');
            }
            //return $this->redirect($this->generateUrl('archmage_game_magic_charge'));
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
        $this->get('service.controller')->addNews();
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $targets = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
        if ($request->isMethod('POST')) {
            $research = isset($_POST['research'])?$_POST['research']:null;
            $action = isset($_POST['action'])?$_POST['action']:null;
            $research = $manager->getRepository('ArchmageGameBundle:Research')->findOneById($research);
            if ($action && $research) {
                if ($action == 'defense') {
                    $turns = 1;
                    if ($turns <= $player->getTurns()) {
                        /*
                         * MANTENIMIENTOS
                         */
                        $player->setTurns($player->getTurns() - $turns);
                        $this->get('service.controller')->checkMaintenances($turns);
                        /*
                         * ACCION
                         */
                        $player->setResearch($research);
                        $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> en defender con <span class="label label-'.$research->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($research->getSpell()->getName()).'" class="link">'.$research->getSpell()->getName().'</a></span>.');
                    } else {
                        $this->addFlash('danger', 'No tienes los <span class="label label-extra">Turnos</span> necesarios.');
                    }
                } else {
                    $research->getSpell()->getFaction() == $player->getFaction() ? $bonus = 1 : $bonus = 2;
                    $turns = $research->getSpell()->getTurnsCost();
                    $mana = $research->getSpell()->getManaCost() * $bonus;
                    if ($turns <= $player->getTurns() && $mana <= $player->getMana()) {
                        /*
                         * MANTENIMIENTOS
                         */
                        $player->setTurns($player->getTurns() - $turns);
                        $player->setMana($player->getMana() - $mana);
                        $this->get('service.controller')->checkMaintenances($turns);
                        /*
                         * ACCION
                         */
                        if ($research->getSpell()->getSkill()->getSelf()) {
                            $this->conjureSelf($research->getSpell());
                            $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> y '.$this->get('service.controller')->nf($mana).' <span class="label label-extra">Maná</span> en conjurar <span class="label label-'.$research->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($research->getSpell()->getName()).'" class="link">'.$research->getSpell()->getName().'</a></span>.');
                        } else {
                            $target = isset($_POST['target'])?$_POST['target']:null;
                            $target = $manager->getRepository('ArchmageGameBundle:Player')->findOneById($target);
                            if ($target) {
                                $chance = rand(0,99);
                                $chance = 100; //TODO
                                if ($chance >= $target->getMagicDefense()) {
                                    $this->conjureTarget($research->getSpell(), $target);
                                    $manager->persist($target);
                                    $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> y '.$this->get('service.controller')->nf($mana).' <span class="label label-extra">Maná</span> en conjurar <span class="label label-'.$research->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($research->getSpell()->getName()).'" class="link">'.$research->getSpell()->getName().'</a></span> sobre <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                                } else {
                                    $this->addFlash('danger', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> y '.$this->get('service.controller')->nf($mana).' <span class="label label-extra">Maná</span> en conjurar <span class="label label-'.$research->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($research->getSpell()->getName()).'" class="link">'.$research->getSpell()->getName().'</a></span> sobre <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>, pero no has superado su <span class="label label-extra">Defesa Mágica</span>.');
                                }
                            } else {
                                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
                            }
                        }
                    } else {
                        $this->addFlash('danger', 'No tienes los recursos necesarios para conjurar ese hechizo.');
                    }
                }
                /*
                 * PERSISTENCIA
                 */
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
        $this->get('service.controller')->addNews();
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $spells = $manager->getRepository('ArchmageGameBundle:Spell')->findAllSpellsResearchablesByPlayer($player);
        if ($request->isMethod('POST')) {
            //recibe datos del form post y busca en database sus ids
            $turns = isset($_POST['turns'])?$_POST['turns']:null;
            $research = isset($_POST['research'])?$_POST['research']:null;
            $research = $manager->getRepository('ArchmageGameBundle:Research')->findOneById($research);
            $spell = isset($_POST['spell'])?$_POST['spell']:null;
            $spell = $manager->getRepository('ArchmageGameBundle:Spell')->findOneById($spell);
            if (($research || $spell) && $turns && is_numeric($turns) && $turns > 0 && $turns <= $player->getTurns()){
                /*
                 * MANTENIMIENTOS
                 */
                $player->setTurns($player->getTurns() - $turns);
                $this->get('service.controller')->checkMaintenances($turns);
                /*
                 * ACCION
                 */
                //si quiere investigar un spell que no tenia, se crea un nuevo research
                if ($spell) {
                    $research = new Research();
                    $research->setSpell($spell);
                    $research->setTurns(0);
                    $research->setPlayer($player);
                    $research->setActive(false);
                    $manager->persist($research);
                    $player->addResearch($research);
                }
                //tanto si ya tenia anteriormente un research como ha creado uno nuevo se suman los turnos
                if ($research) {
                    $research->setTurns($research->getTurns() + $turns);
                    //si ha terminado de investigarlo se activa
                    if ($research->getTurns() >= $player->getResearchRatio($research->getSpell()->getTurnsResearch())) {
                        $research->setActive(true);
                        //subir nivel de magia
                        if ($player->getLevel() > $player->getMagic()){
                            $player->setMagic($player->getLevel());
                            $this->addFlash('success', 'Has aumentado 1 punto tu nivel de <span class="label label-extra">Magia</span>.');
                        }
                        $this->addFlash('success', 'Has investigado completamente el hechizo <span class="label label-'.$research->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($research->getSpell()->getName()).'" class="link">'.$research->getSpell()->getName().'</a></span>.');
                    }
                }
                /*
                 * PERSISTENCIA
                 */
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> investigando el hechizo <span class="label label-'.$research->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($research->getSpell()->getName()).'" class="link">'.$research->getSpell()->getName().'</a></span>.');
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
        $this->get('service.controller')->addNews();
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $targets = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
        if ($request->isMethod('POST')) {
            $turns = 1;
            $item = isset($_POST['item'])?$_POST['item']:null;
            $action = isset($_POST['action'])?$_POST['action']:null;
            if ($turns <= $player->getTurns()) {
                $item = $manager->getRepository('ArchmageGameBundle:Item')->findOneById($item);
                $item = $player->hasArtifact($item->getArtifact());
                if ($item && $action) {
                    /*
                     * MANTENIMIENTO
                     */
                    $player->setTurns($player->getTurns() - $turns);
                    $this->get('service.controller')->checkMaintenances($turns);
                    /*
                     * ACCION
                     */
                    if ($action == 'activate') {
                        $target = isset($_POST['target'])?$_POST['target']:null;
                        $target = $manager->getRepository('ArchmageGameBundle:Player')->findOneById($target);
                        if (!$target) {
                            $this->activateSelf($item->getArtifact());
                            $this->addFlash('success', 'Has gastado '. $this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> en activar <span class="label label-'.$item->getArtifact()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($item->getArtifact()->getName()).'" class="link">'.$item->getArtifact()->getName().'</a></span>.');
                        } else {
                            $chance = rand(0,99);
                            $chance = 100; //TODO
                            if ($chance >= $target->getMagicDefense()) {
                                $this->activateTarget($item->getArtifact(), $target);
                                $manager->persist($target);
                                $this->addFlash('success', 'Has gastado ' . $this->get('service.controller')->nf($turns) . ' <span class="label label-extra">Turnos</span> en activar <span class="label label-'.$item->getArtifact()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($item->getArtifact()->getName()).'" class="link">'.$item->getArtifact()->getName().'</a></span> sobre <span class="label label-' . $target->getFaction()->getClass() . '"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">' . $target->getNick() . '</a></span>.');
                            } else {
                                $this->addFlash('danger', 'Has gastado ' . $this->get('service.controller')->nf($turns) . ' <span class="label label-extra">Turnos</span> en activar <span class="label label-'.$item->getArtifact()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($item->getArtifact()->getName()).'" class="link">'.$item->getArtifact()->getName().'</a></span> sobre <span class="label label-' . $target->getFaction()->getClass() . '"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">' . $target->getNick() . '</a></span>, pero no has superado su <span class="label label-extra">Defesa Mágica</span>.');
                            }
                        }
                        $item->setQuantity($item->getQuantity() - 1);
                        if ($item->getQuantity() <= 0) {
                            $player->removeItem($item);
                            $manager->remove($item);
                        }
                    } elseif ($action == 'defense') {
                        $player->setItem($item);
                        $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span> en defender con <span class="label label-'.$item->getArtifact()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($item->getArtifact()->getName()).'" class="link">'.$item->getArtifact()->getName().'</a></span>.');
                    }
                    /*
                     * PERSISTENCIA
                     */
                    $manager->persist($player);
                    $manager->flush();
                } else {
                    $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
                }
            } else {
                $this->addFlash('danger', 'No tienes <span class="label label-extra">Turnos</span> suficientes para eso.');
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
        $this->get('service.controller')->addNews();
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        if ($request->isMethod('POST')) {
            $turns = 5;
            $enchantment = isset($_POST['enchantment'])?$_POST['enchantment']:null;
            if ($turns <= $player->getTurns()) {
                $enchantment = $manager->getRepository('ArchmageGameBundle:Enchantment')->findOneById($enchantment);
                if ($enchantment) {
                    /*
                     * MANTENIMIENTO
                     */
                    $player->setTurns($player->getTurns() - $turns);
                    $this->get('service.controller')->checkMaintenances($turns);
                    /*
                     * ACCION
                     */
                    $chance = rand(0,99);
                    if ($chance >= $enchantment->getOwner()->getMagicDefense()) {
                        $player->removeEnchantmentsVictim($enchantment);
                        $enchantment->getOwner()->removeEnchantmentsOwner($enchantment);
                        $manager->persist($enchantment->getOwner());
                        $this->addFlash('success', 'Has gastado '.$turns.' <span class="label label-extra">Turnos</span> y roto el encantamiento <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($enchantment->getSpell()->getName()).'" class="link">'.$enchantment->getSpell()->getName().'</a></span> de <span class="label label-'.$enchantment->getOwner()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $enchantment->getOwner()->getId())).'" class="link">'.$enchantment->getOwner()->getNick().'</a></span>.');
                        $manager->remove($enchantment);
                    } else {
                        $this->addFlash('danger', 'Has gastado '.$turns.' <span class="label label-extra">Turnos</span>, pero no has conseguido romper el encantamiento <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($enchantment->getSpell()->getName()).'" class="link">'.$enchantment->getSpell()->getName().'</a></span> de <span class="label label-'.$enchantment->getOwner()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $enchantment->getOwner()->getId())).'" class="link">'.$enchantment->getOwner()->getNick().'</a></span>.');
                    }
                    /*
                     * PERSISTENCIA
                     */
                    $manager->persist($player);
                    $manager->flush();
                } else {
                    $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
                }
            } else {
                $this->addFlash('danger', 'No tienes <span class="label label-extra">Turnos</span> suficientes para eso.');
            }
            return $this->redirect($this->generateUrl('archmage_game_magic_dispell'));
        }
        return array(
            'player' => $player,
        );
    }

    /**
     * Spionage report message
     */
    public function createEspionage(Player $target)
    {
        $player = $this->getUser()->getPlayer();
        $subject = 'Reporte de Espionaje';
        $text = array(
            array('default', 12, 0, 'center', 'Reporte de Espionaje de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>'),
            array('default', 5, 0, 'center', 'Oro: '.$this->get('service.controller')->nf($target->getGold())),
            array('default', 5, 2, 'center', 'Maná: '.$this->get('service.controller')->nf($target->getMana())),
            array('default', 5, 0, 'center', 'Personas: '.$this->get('service.controller')->nf($target->getPeople())),
            array('default', 5, 2, 'center', 'Tierras: '.$this->get('service.controller')->nf($target->getLands())),
            array('default', 5, 0, 'center', 'Tierras libres: '.$this->get('service.controller')->nf($target->getFree())),
            array('default', 5, 2, 'center', 'Unidades: '.$this->get('service.controller')->nf($target->getUnits())),
            array('default', 5, 0, 'center', 'Héroes: '.$this->get('service.controller')->nf($target->getContracts()->count())),
            array('default', 5, 2, 'center', 'Artefactos: '.$this->get('service.controller')->nf($target->getArtifacts())),
            array('default', 5, 0, 'center', 'Encantamientos: '.$this->get('service.controller')->nf($target->getEnchantmentsVictim()->count())),
            array('default', 5, 2, 'center', 'Poder: '.$this->get('service.controller')->nf($target->getPower())),
        );
        $this->get('service.controller')->sendMessage($target, $player, $subject, $text, 'espionage');
        return false;
    }

    /**
     * Conjure a spell on myself, can be used from conjure/attack/temple
     */
    public function conjureSelf(Spell $spell)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        //SUMMON
        if ($spell->getSkill()->getSummon()) {
            if ($spell->getSkill()->getUnit()) {
                $unit = $spell->getSkill()->getUnit();
            } else {
                $units = $manager->getRepository('ArchmageGameBundle:Unit')->findByFamily($spell->getSkill()->getFamily());
                shuffle($units);
                $unit = $units[0];
            }
            $troop = $player->hasUnit($unit);
            $quantity = $spell->getSkill()->getQuantityBonus();
            if ($troop) {
                $troop->setQuantity($troop->getQuantity() + $quantity);
                $this->addFlash('success', 'Has invocado '.$this->get('service.controller')->nf($quantity).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
            } else {
                if ($player->getTroops()->count() < $player::TROOPS_CAP) {
                    $troop = new Troop();
                    $manager->persist($troop);
                    $troop->setUnit($unit);
                    $troop->setQuantity($quantity);
                    $troop->setPlayer($player);
                    $player->addTroop($troop);
                    $this->addFlash('success', 'Has invocado '.$this->get('service.controller')->nf($quantity).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
                } else {
                    $this->addFlash('danger', 'No puedes tener más de '.$player::TROOPS_CAP.' tropas distintas al mismo tiempo, debes <i class="fa fa-fw fa-user-times"></i><a href='.$this->generateUrl('archmage_game_army_disband').'>Desbandar</a> alguna.');
                }
            }
            //ENCHANTMENT
        } elseif ($spell->getEnchantment()) {
            $enchantment = $player->hasEnchantmentVictim($spell);
            if ($enchantment) {
                $player->removeEnchantmentVictim($enchantment);
                $player->removeEnchantmentOwner($enchantment);
                $manager->remove($enchantment);
            }
            $enchantment = new Enchantment();
            $manager->persist($enchantment);
            $enchantment->setSpell($spell);
            $enchantment->setVictim($player);
            $player->addEnchantmentsVictim($enchantment);
            $enchantment->setOwner($player);
            $player->addEnchantmentsOwner($enchantment);
            $this->addFlash('success', 'Has lanzado el encantamiento <span class="label label-' . $enchantment->getSpell()->getFaction()->getClass() . '"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($enchantment->getSpell()->getName()).'" class="link">' . $enchantment->getSpell()->getName() . '</a></span> en tu Reino.');
            //TERRAIN
        } elseif ($spell->getSkill()->getTerrainBonus() > 0) {
            $free = $player->getLands() * $spell->getSkill()->getTerrainBonus() * $player->getMagic() / (float)100;
            $player->setConstruction('Tierras', $player->getFree() + $free);
            $this->addFlash('success', 'Has encontrado ' . $this->get('service.controller')->nf($free) . ' <span class="label label-extra">Tierras</span>.');
            //ARTIFACT
        } elseif ($spell->getSkill()->getArtifactBonus() > 0) {
            $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->findAll();
            $number = $spell->getSkill()->getArtifactBonus() * $player->getMagic();
            for ($i = 0; $i < $number; $i++) {
                shuffle($artifacts);
                $artifact = $artifacts[0]; //suponemos length > 0
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
                $this->addFlash('success', 'Has encontrado el artefacto <span class="label label-'.$item->getArtifact()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($item->getArtifact()->getName()).'" class="link">'.$item->getArtifact()->getName().'</a></span>.');
            }
            //HERO LEVEL
        } elseif ($spell->getSkill()->getHeroBonus() > 0) {
            if ($player->getHeroes() > 0) {
                $contracts = $player->getContracts()->toArray();
                shuffle($contracts);
                $contract = $contracts[0]; //suponemos > 0
                $contract->setLevel($contract->getLevel() + $spell->getSkill()->getHeroBonus());
                $this->addFlash('success', 'Tu <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span>.');
            } else {
                $this->addFlash('danger', 'No tienes héroes en tu Reino.');
            }
        }
        return false;
    }

    /**
     * Conjure a spell on target nonbattle only
     */
    public function conjureTarget(Spell $spell, Player $target)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        //ESPIONAGE
        if ($spell->getSkill()->getSpy()) {
            $this->createEspionage($target);
        //DISPELL
        } elseif ($spell->getSkill()->getDispell()) {
            if ($player->getEnchantmentsVictim()->count() > 0) {
                $enchantments = $player->getEnchantmentsVictim()->toArray();
                shuffle($enchantments);
                $enchantment = $enchantments[0];
                $player->removeEnchantmentsVictim($enchantment);
                $enchantment->getOwner()->removeEnchantmentsOwner($enchantment);
                $manager->persist($enchantment->getOwner());
                $manager->remove($enchantment);
            } else {
                $this->addFlash('danger', 'El mago <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span> no tiene ningún encantamiento que romper sobre su Reino.');
            }
        //ENCHANTMENT
        } elseif ($spell->getEnchantment()) {
            if (!$target->hasEnchantmentVictim($spell) || ($target->hasEnchantmentVictim($spell) && $target->hasEnchantmentVictim($spell)->getOwner()->getMagic() <= $player->getMagic())) {
                $this->addFlash('success', 'Se ha encantado al mago <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span> con <span class="label label-'.$spell->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($spell->getName()).'" class="link">'.$spell->getName().'</a></span>.');
            } else {
                $this->addFlash('danger', 'El mago <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span> ya tenía ese encantamiento y tu <span class="label label-extra">Magia</span> no lo supera.');
            }
        //ARTIFACT
        } elseif ($spell->getSkill()->getArtifactBonus() < 0) {
            $number = $spell->getSkill()->getArtifactBonus() * $player->getMagic();
            for ($i = 0; $i < $number; $i++) {
                if ($target->getArtifacts() > 0) {
                    $items = $target->getItems()->toArray();
                    shuffle($items);
                    $item = $items[0];
                    $item->setQuantity($item->getQuantity() - 1);
                    if ($item->getQuantity() <= 0) {
                        $target->removeItem($item);
                        $manager->remove($item);
                    }
                }
            }
            $this->addFlash('success', 'Has destruido ' . $number . ' artefactos de <a href="' . $this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())) . '" class="link"><span class="label label-' . $target->getFaction()->getClass() . '">' . $target->getNick() . '</span></a>.');
        //DAMAGE
        } elseif ($spell->getSkill()->getDamageBonus() < 0) {
            if ($target->getUnits() > 0) {
                $troops = $target->getTroops()->toArray();
                shuffle($troops);
                $troop = $troops[0]; //suponemos > 0
                $casualties = floor($spell->getSkill()->getDamageBonus() * $player->getMagic() * $troop->getQuantity() / (float)100);
                $troop->setQuantity($troop->getQuantity() + $casualties);
                $this->addFlash('success', 'Has matado '.$this->get('service.controller')->nf($casualties).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
            } else {
                $this->addFlash('danger', 'No hay más tropas que matar.');
            }
        //GOLD
        } elseif ($spell->getSkill()->getGoldBonus() < 0) {
            $gold = $target->getGold() * $spell->getSkill()->getGoldBonus() * $player->getMagic() / (float)100;
            $target->setGold($target->getGold() + $gold);
            $this->addFlash('success', 'Has eliminado '.$this->get('service.controller')->nf($gold).' <span class="label label-extra">Oro</span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
        //PEOPLE
        } elseif ($spell->getSkill()->getPeopleBonus() < 0) {
            $people = $target->getPeople() * $spell->getSkill()->getPeopleBonus() * $player->getMagic() / (float)100;
            $target->setPeople($target->getPeople() + $people);
            $this->addFlash('success', 'Has eliminado '.$this->get('service.controller')->nf($people).' <span class="label label-extra">Personas</span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
        //MANA
        } elseif ($spell->getSkill()->getManaBonus() < 0) {
            $mana = $target->getMana() * $spell->getSkill()->getManaBonus() * $player->getMagic() / (float)100;
            $target->setMana($target->getMana() + $mana);
            $this->addFlash('success', 'Has eliminado '.$this->get('service.controller')->nf($mana).' <span class="label label-extra">Maná</span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
        }
        //MESSAGE
        $text = array();
        $text[] = array('default', 12, 0, 'center', 'Nosotros, el Consejo del Reino de <span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span> hemos decidido lanzar el hechizo <span class="label label-'.$spell->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($spell->getName()).'" class="link">'.$spell->getName().'</a></span> sobre su Reino.');
        $this->get('service.controller')->sendMessage($target, $player, 'Reporte de Hechizo', $text, 'magic');
        return false;
    }

    /**
     * Activate an artifact on myself nonbattle only
     */
    public function activateSelf(Artifact $artifact)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        //SUMMON
        if ($artifact->getSkill()->getSummon()) {
            if ($artifact->getSkill()->getUnit()) {
                $unit = $artifact->getSkill()->getUnit();
            } else {
                $units = $manager->getRepository('ArchmageGameBundle:Unit')->findByFamily($artifact->getSkill()->getFamily());
                shuffle($units);
                $unit = $units[0];
            }
            $troop = $player->hasUnit($unit);
            $quantity = rand(1, $artifact->getSkill()->getQuantityBonus());
            if ($troop) {
                $troop->setQuantity($troop->getQuantity() + $quantity);
                $this->addFlash('success', 'Has invocado '.$this->get('service.controller')->nf($quantity).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
            } else {
                if ($player->getTroops()->count() < $player::TROOPS_CAP) {
                    $troop = new Troop();
                    $manager->persist($troop);
                    $troop->setUnit($unit);
                    $troop->setQuantity($quantity);
                    $troop->setPlayer($player);
                    $player->addTroop($troop);
                    $this->addFlash('success', 'Has invocado '.$this->get('service.controller')->nf($quantity).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
                } else {
                    $this->addFlash('danger', 'No puedes tener más de '.$player::TROOPS_CAP.' tropas distintas al mismo tiempo, debes <i class="fa fa-fw fa-user-times"></i><a href='.$this->generateUrl('archmage_game_army_disband').'>Desbandar</a> alguna.');
                }
            }
            //TERRAIN
        } elseif ($artifact->getSkill()->getTerrainBonus() > 0) {
            $free = $player->getLands() * $artifact->getSkill()->getTerrainBonus() / (float)100;
            $player->setConstruction('Tierras', $player->getFree() + $free);
            $this->addFlash('success', 'Has encontrado '.$this->get('service.controller')->nf($free).' <span class="label label-extra">Tierras</span>.');
            //HERO LEVEL
        } elseif ($artifact->getSkill()->getHeroBonus() > 0) {
            if ($player->getHeroes() > 0) {
                $contracts = $player->getContracts()->toArray();
                shuffle($contracts);
                $contract = $contracts[0]; //suponemos > 0
                $contract->setLevel($contract->getLevel() + $artifact->getSkill()->getHeroBonus());
                $this->addFlash('success', 'Tu <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> ha subido de nivel.');
            } else {
                $this->addFlash('danger', 'No tienes héroes en tu Reino.');
            }
            //GOLD
        } elseif ($artifact->getSkill()->getGoldBonus() > 0) {
            $gold = $player->getGold() * $artifact->getSkill()->getGoldBonus() / (float)100;
            $player->setGold($player->getGold() + $gold);
            $this->addFlash('success', 'Has generado '.$this->get('service.controller')->nf($gold).' <span class="label label-extra">Oro</span>.');
            //PEOPLE
        } elseif ($artifact->getSkill()->getPeopleBonus() > 0) {
            $people = $player->getPeopleCap() * $artifact->getSkill()->getPeopleBonus() / (float)100;
            $player->setPeople($player->getPeople() + $people);
            $this->addFlash('success', 'Has generado '.$this->get('service.controller')->nf($people).' <span class="label label-extra">Personas</span>.');
            //MANA
        } elseif ($artifact->getSkill()->getManaBonus() > 0) {
            $mana = $player->getManaCap() * $artifact->getSkill()->getManaBonus() / (float)100;
            $player->setMana($player->getMana() + $mana);
            $this->addFlash('success', 'Has generado '.$this->get('service.controller')->nf($mana).' <span class="label label-extra">Maná</span>.');
            //TURNS
        } elseif ($artifact->getSkill()->getTurnsBonus() > 0) {
            $turns = $artifact->getSkill()->getTurnsBonus();
            $player->setTurns($player->getTurns() + $turns);
            $this->addFlash('success', 'Has generado '.$this->get('service.controller')->nf($turns).' <span class="label label-extra">Turnos</span>.');
        }
        return false;
    }

    /**
     * Activate an artifact on target nonbattle only
     */
    public function activateTarget(Artifact $artifact, Player $target)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        //SPIONAGE
        if ($artifact->getSkill()->getSpy()) {
            $this->createEspionage($target);
            //HERO LEVEL
        } elseif ($artifact->getSkill()->getHeroBonus() > 0) {
            if ($target->getHeroes() > 0) {
                $contracts = $target->getContracts()->toArray();
                shuffle($contracts);
                $contract = $contracts[0]; //suponemos > 0
                $contract->setLevel($contract->getLevel() + $artifact->getSkill()->getHeroBonus());
                if ($contract->getLevel() <= 0) {
                    $target->removeContract($contract);
                    $manager->remove($contract);
                    $this->addFlash('success', '<span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span> ha muerto.');
                } else {
                    $this->addFlash('success', '<span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span> ha bajado de nivel.');
                }
            } else {
                $this->addFlash('danger', '<span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span> no tiene héroes en su Reino.');
            }
            //TERRAIN
        } elseif ($artifact->getSkill()->getTerrainBonus() < 0) {
            $constructions = $target->getConstructions()->toArray();
            shuffle($constructions);
            $construction = $constructions[0]; //suponemos > 0
            $destroyed = floor($artifact->getSkill()->getTerrainBonus() * $construction->getQuantity() / (float)100);
            $construction->setQuantity($construction->getQuantity() + $destroyed);
            $this->addFlash('success', 'Has eliminado '.$this->get('service.controller')->nf($destroyed).' <span class="label label-extra">'.$construction->getBuilding()->getName().'</span> de <a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link"><span class="label label-'.$target->getFaction()->getClass().'">'.$target->getNick().'</span></a>.');
            //GOLD
        } elseif ($artifact->getSkill()->getGoldBonus() < 0) {
            $gold = $target->getGold() * $artifact->getSkill()->getGoldBonus() / (float)100;
            $target->setGold($target->getGold() + $gold);
            $this->addFlash('success', 'Has eliminado '.$this->get('service.controller')->nf($gold).' <span class="label label-extra">Oro</span> de <a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link"><span class="label label-'.$target->getFaction()->getClass().'">'.$target->getNick().'</span></a>.');
            //PEOPLE
        } elseif ($artifact->getSkill()->getPeopleBonus() < 0) {
            $people = $target->getPeople() * $artifact->getSkill()->getPeopleBonus() / (float)100;
            $target->setPeople($target->getPeople() + $people);
            $this->addFlash('success', 'Has eliminado '.$this->get('service.controller')->nf($people).' <span class="label label-extra">Personas</span> de <a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link"><span class="label label-'.$target->getFaction()->getClass().'">'.$target->getNick().'</span></a>.');
            //MANA
        } elseif ($artifact->getSkill()->getManaBonus() < 0) {
            $mana = $target->getMana() * $artifact->getSkill()->getManaBonus() / (float)100;
            $target->setMana($target->getMana() + $mana);
            $this->addFlash('success', 'Has eliminado '.$this->get('service.controller')->nf($mana).' <span class="label label-extra">Maná</span> de <span class="label label-' . $target->getFaction()->getClass() . '">' . $target->getNick() . '</span>.');
        }
        //MESSAGE
        $text = array();
        $text[] = array('default', 12, 0, 'center', 'Nosotros, el Consejo del Reino de <a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link"><span class="label label-'.$player->getFaction()->getClass().'">'.$player->getNick().'</span></a> hemos decidido lanzar el hechizo <span class="label label-'.$artifact->getFaction()->getClass().'">'.$artifact->getName().'</span> sobre su Reino.');
        $this->get('service.controller')->sendMessage($target, $player, 'Reporte de Artefacto', $text, 'magic');
        return false;
    }
}
