<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Archmage\GameBundle\Entity\Item;
use Archmage\GameBundle\Entity\Spell;
use Archmage\GameBundle\Entity\Player;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Enchantment;
use Archmage\GameBundle\Entity\Achievement;
use Archmage\GameBundle\Entity\Message;

class ServiceController extends Controller
{
    /**
     * @param $string
     * @return string
     */
    public function toSlug($string) {
        $search = explode(",","Á,É,Í,Ó,Ú,á,é,í,ó,ú, ");
        $replace = explode(",","a,e,i,o,u,a,e,i,o,u,-");
        $slug = strtolower(str_replace($search, $replace, $string));
        return $slug;
    }

    /**
     * Number Format, also in Twig/TwigExtension.php
     */
    public function nf($number, $decimals = 0, $decPoint = ',', $thousandsSep = '.') {
        return
            ($number >= 1000 && $number % 100 == 0)?
                number_format((float)$number / 1000, 1, $decPoint, $thousandsSep).'K':
                number_format($number, $decimals, $decPoint, $thousandsSep);
    }

    /**
     * Number Format for Fixtures and Ranking (without adding a K)
     */
    public function nff($number, $decimals = 0, $decPoint = ',', $thousandsSep = '.') {
        $price = number_format((float)$number, $decimals, $decPoint, $thousandsSep);
        return $price;
    }

    /**
     * Flashbags notices
     */
    public function addNews()
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $notices = $player->getMessages();
        //NOTICIA PERMANENTE
        $this->addFlash('info', 'Reset del servidor programado para Sábado 24 de Octubre 10:00AM.');
        foreach ($player->getEnchantmentsVictim() as $enchantment) {
            $skill = $enchantment->getSpell()->getSkill();
            if ($skill->getTerrainBonus() < 0 || $skill->getPeopleBonus() < 0 || $skill->getManaBonus() < 0) {
                $this->addFlash('danger', 'Recuerda que sobre tu Reino pesa el encantamiento <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->toSlug($enchantment->getSpell()->getName()).'" class="link">'.$enchantment->getSpell()->getName().'</a></span>, deberías <i class="fa fa-fw fa-chain-broken"></i><a href="'.$this->generateUrl('archmage_game_magic_dispell').'" class="link">Desencantarlo</a>.');
            }
        }
        foreach ($notices as $notice) {
            if (!$notice->getReaded()) {
                $notice->setReaded(true);
                $this->addFlash($notice->getClass(), 'Tienes un nuevo mensaje, <span class="label label-extra"><a href='.$this->generateUrl('archmage_game_account_message', array('hash' => $notice->getHash()), true).'>'.$notice->getSubject().'</a></span>.');
            }
        }
        /*
         * PERSISTENCIA
         */
        $manager->persist($player);
        $manager->flush();
    }

    /**
     * Message wrapper & telegram bot
     */
    public function sendMessage($sender, $receiver, $subject, $text, $type = null)
    {
        //NEW MESSAGE
        $manager = $this->getDoctrine()->getManager();
        $message = new Message();
        $message->setOwner($sender);
        $message->setPlayer($receiver);
        $message->setSubject($subject);
        $message->setText($text);
        $message->setClass('default');
        $manager->persist($message);
        $receiver->addMessage($message);
        //TELEGRAM BOT https://core.telegram.org/bots & https://unnikked.ga/getting-started-with-telegram-bots/
        $api = $this->container->get('shaygan.telegram_bot_api');
        if ($receiver->getChat()) {
            try {
                $telegram = $subject.":\n".$this->generateUrl('archmage_game_account_message', array('hash' => $message->getHash()), true);
                $connection = "BQADBAADRQADyIsGAAHtBskMy6GoLAI";
                $auction = "BQADBAADPAADyIsGAAHHj-tPF_0RGAI";
                $battle = "BQADBAADOgADyIsGAAFRwAYXeDzUugI";
                $magic = "BQADBAADLQADyIsGAAE_-arlvGeRjgI";
                $espionage = "BQADBAADFAADyIsGAAGkx4rtY09EtwI";
                $stickers = array('auction' => $auction, 'battle' => $battle, 'magic' => $magic, 'espionage' => $espionage, 'connection' => $connection);
                if ($type) $api->sendSticker($receiver->getChat(), $stickers[$type]);
                $api->sendMessage($receiver->getChat(), $telegram);
            } catch (Exception $e) {
                //si por alguna razon $receiver->getChat() es incorrecto, la API de Telegram lanzara una excepcion
                //TODO EXCEPTION TELEGRAM BOT API
            }
        }
        return $message;
    }

    /**
     * Turn maintenances and consequences
     */
    public function checkMaintenances($turns)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->findAll();
        $achievements = $manager->getRepository('ArchmageGameBundle:Achievement')->findAll();
        for ($i = 1; $i <= $turns; $i++) {
            //BUILDINGS ENCHANTMENTS
            foreach ($player->getEnchantmentsVictim() as $enchantment) {
                //enemigos, aleatorio
                if ($enchantment->getSpell()->getSkill()->getTerrainBonus() < 0) {
                    $constructions = $player->getConstructions()->toArray();
                    shuffle($constructions);
                    $construction = $constructions[0];
                    $quantity = $enchantment->getSpell()->getSkill()->getTerrainBonus() * $enchantment->getOwner()->getMagic();
                    $construction->setQuantity(max(0,$construction->getQuantity() + $quantity));
                }
                //aliados, positivos (+1 tierra maximo, sin importar el nivel de magia)
                if ($enchantment->getSpell()->getSkill()->getTerrainBonus() > 0) {
                    $player->setBuilding('Tierras', $player->getFree() + $enchantment->getSpell()->getSkill()->getTerrainBonus());
                }
            }
            //ARTIFACTS
            $chance = rand(0,99);
            if ($chance < $player->getArtifactRatio()) {
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
                $this->addFlash('success', 'Has encontrado por casualidad el artefacto <span class="label label-'.$item->getArtifact()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->toSlug($item->getArtifact()->getName()).'" class="link">'.$item->getArtifact()->getName().'</a></span>.');
            }
            //GOLD
            $gold = $player->getGold() + $player->getGoldResourcePerTurn() - $player->getGoldMaintenancePerTurn();
            foreach ($player->getTroops() as $troop) {
                $gold = $player->getGold() + $player->getGoldResourcePerTurn() - $player->getGoldMaintenancePerTurn();
                if ($gold < 0) {
                    if ($troop->getUnit()->getGoldMaintenance() > 0) {
                        $troop->setQuantity($troop->getQuantity() - ceil(abs($gold) / (float)$troop->getUnit()->getGoldMaintenance()));
                        if ($troop->getQuantity() <= 0) {
                            $player->removeTroop($troop);
                            $manager->remove($troop);
                        }
                        $this->addFlash('danger', 'Se ha desbandado <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span> por no pagar mantenimientos de <span class="label label-extra">Oro</span>.');
                    }
                }
            }
            foreach ($player->getContracts() as $contract) {
                $gold = $player->getGold() + $player->getGoldResourcePerTurn() - $player->getGoldMaintenancePerTurn();
                if ($gold < 0) {
                    if ($contract->getHero()->getGoldMaintenance() > 0) {
                        $player->removeContract($contract);
                        $manager->remove($contract);
                        $this->addFlash('danger', 'Se ha desbandado tu <san class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> por no pagar mantenimientos de <span class="label label-extra">Oro</span>.');
                    }
                }
            }
            foreach ($player->getEnchantmentsOwner() as $enchantment) {
                $gold = $player->getGold() + $player->getGoldResourcePerTurn() - $player->getGoldMaintenancePerTurn();
                if ($gold < 0) {
                    if ($enchantment->getSpell()->getGoldMaintenance() > 0) {
                        $victim = $enchantment->getVictim();
                        $player->removeEnchantmentsOwner($enchantment);
                        $victim->removeEnchantmentsVictim($enchantment);
                        $manager->persist($victim);
                        $manager->remove($enchantment);
                        $this->addFlash('danger', 'Se ha roto el encantamiento <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->toSlug($enchantment->getSpell()->getName()).'" class="link">'.$enchantment->getSpell()->getName().'</a></span> por no pagar mantenimientos de <span class="label label-extra">Oro</span>.');
                    }
                }
            }
            $player->setGold($gold);
            //PEOPLE
            $people = $player->getPeople() + $player->getPeopleResourcePerTurn() - $player->getPeopleMaintenancePerTurn();
            foreach ($player->getTroops() as $troop) {
                $people = $player->getPeople() + $player->getPeopleResourcePerTurn() - $player->getPeopleMaintenancePerTurn();
                if ($people < 0) {
                    if ($troop->getUnit()->getPeopleMaintenance() > 0) {
                        $troop->setQuantity($troop->getQuantity() - ceil(abs($people) / (float)$troop->getUnit()->getPeopleMaintenance()));
                        if ($troop->getQuantity() <= 0) {
                            $player->removeTroop($troop);
                            $manager->remove($troop);
                        }
                        $this->addFlash('danger', 'Se ha desbandado <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span> por no pagar mantenimientos de <span class="label label-extra">Personas</span>.');
                    }
                }
            }
            foreach ($player->getContracts() as $contract) {
                $people = $player->getPeople() + $player->getPeopleResourcePerTurn() - $player->getPeopleMaintenancePerTurn();
                if ($people < 0) {
                    if ($contract->getHero()->getPeopleMaintenance() > 0) {
                        $player->removeContract($contract);
                        $manager->remove($contract);
                        $this->addFlash('danger', 'Se ha desbandado tu <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> por no pagar mantenimientos de <span class="label label-extra">Personas</span>.');
                    }
                }
            }
            foreach ($player->getEnchantmentsOwner() as $enchantment) {
                $people = $player->getPeople() + $player->getPeopleResourcePerTurn() - $player->getPeopleMaintenancePerTurn();
                if ($people < 0) {
                    if ($enchantment->getSpell()->getPeopleMaintenance() > 0) {
                        $victim = $enchantment->getVictim();
                        $player->removeEnchantmentsOwner($enchantment);
                        $victim->removeEnchantmentsVictim($enchantment);
                        $manager->persist($victim);
                        $manager->remove($enchantment);
                        $this->addFlash('danger', 'Se ha roto el encantamiento <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->toSlug($enchantment->getSpell()->getName()).'" class="link">'.$enchantment->getSpell()->getName().'</a></span> por no pagar mantenimientos de <span class="label label-extra">Personas</span>.');
                    }
                }
            }
            $player->setPeople($people);
            //MANA
            $mana = $player->getMana() + $player->getManaResourcePerTurn() - $player->getManaMaintenancePerTurn();
            foreach ($player->getTroops() as $troop) {
                $mana = $player->getMana() + $player->getManaResourcePerTurn() - $player->getManaMaintenancePerTurn();
                if ($mana < 0) {
                    if ($troop->getUnit()->getManaMaintenance() > 0) {
                        $troop->setQuantity($troop->getQuantity() - ceil(abs($mana) / (float)$troop->getUnit()->getManaMaintenance()));
                        if ($troop->getQuantity() <= 0) {
                            $player->removeTroop($troop);
                            $manager->remove($troop);
                        }
                        $this->addFlash('danger', 'Se ha desbandado <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span> por no pagar mantenimientos de <span class="label label-extra">Maná</span>.');
                    }
                }
            }
            foreach ($player->getContracts() as $contract) {
                $mana = $player->getMana() + $player->getManaResourcePerTurn() - $player->getManaMaintenancePerTurn();
                if ($mana < 0) {
                    if ($contract->getHero()->getManaMaintenance() > 0) {
                        $player->removeContract($contract);
                        $manager->remove($contract);
                        $this->addFlash('danger', 'Se ha desbandado tu <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> por no pagar mantenimientos de <span class="label label-extra">Maná</span>.');
                    }
                }
            }
            foreach ($player->getEnchantmentsOwner() as $enchantment) {
                $mana = $player->getMana() + $player->getManaResourcePerTurn() - $player->getManaMaintenancePerTurn();
                if ($mana < 0) {
                    if ($enchantment->getSpell()->getManaMaintenance() > 0) {
                        $victim = $enchantment->getVictim();
                        $player->removeEnchantmentsOwner($enchantment);
                        $victim->removeEnchantmentsVictim($enchantment);
                        $manager->persist($victim);
                        $manager->remove($enchantment);
                        $this->addFlash('danger', 'Se ha roto el encantamiento <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->toSlug($enchantment->getSpell()->getName()).'" class="link">'.$enchantment->getSpell()->getName().'</a></span> por no pagar mantenimientos de <span class="label label-extra">Maná</span>.');
                    }
                }
            }
            $player->setMana($mana);
            //ENCHANTMENTS
            foreach ($player->getEnchantmentsVictim() as $enchantment) {
                $enchantment->setExpiration($enchantment->getExpiration() + 1);
                if ($enchantment->getExpiration() >= $enchantment->getSpell()->getTurnsExpiration() * $enchantment->getOwner()->getMagic()) {
                    $player->removeEnchantmentsVictim($enchantment);
                    $enchantment->getOwner()->removeEnchantmentsOwner($enchantment);
                    $manager->persist($enchantment->getOwner());
                    $manager->remove($enchantment);
                    $this->addFlash('success', 'Se ha terminado el encantamiento <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->toSlug($enchantment->getSpell()->getName()).'" class="link">'.$enchantment->getSpell()->getName().'</a></span>.');
                }
            }
            //EXPERIENCE
            foreach ($player->getContracts() as $contract) {
                $contract->setExperience($contract->getExperience() + 1);
                if ($contract->getExperience() >= $contract->getHero()->getExperience() * $contract->getLevel()) {
                    $contract->setLevel($contract->getLevel() + 1);
                    $contract->setExperience(0);
                    $this->addFlash('success', 'Tu héroe <span class="label label-'.$contract->getHero()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->toSlug($contract->getHero()->getName()).'" class="link">'.$contract->getHero()->getName().'</a></span> ha subido de nivel.');
                }
            }
        }
        //ACHIEVEMENTS
        foreach ($achievements as $achievement) {
            if (!$player->hasAchievement($achievement) && (
                $achievement->getGold() != null && $player->getGold() >= $achievement->getGold() ||
                $achievement->getPeople() != null && $player->getPeople() >= $achievement->getPeople() ||
                $achievement->getMana() != null && $player->getMana() >= $achievement->getMana() ||
                $achievement->getArtifacts() != null && $player->getArtifacts() >= $achievement->getArtifacts() ||
                $achievement->getHeroes() != null && $player->getHeroes() >= $achievement->getHeroes() ||
                $achievement->getUnits() != null && $player->getUnits() >= $achievement->getUnits() ||
                $achievement->getSpells() != null && $player->getSpells() >= $achievement->getSpells() ||
                $achievement->getPower() != null && $player->getPower() >= $achievement->getPower() ||
                $achievement->getLands() != null && $player->getLands() >= $achievement->getLands() ||
                $achievement->getDefense() != null && ($player->getMagicDefense() >= $achievement->getDefense() || $player->getArmyDefense() >= $achievement->getDefense())
                )
            ) {
                $player->addAchievement($achievement);
                $this->addFlash('success', 'Has desbloqueado el logro <span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile').'" class="link">'.$achievement->getName().'</a></span>.');
            }
        }
    }
}
