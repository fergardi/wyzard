<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Archmage\GameBundle\Entity\Item;
use Archmage\GameBundle\Entity\Spell;
use Archmage\GameBundle\Entity\Player;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Enchantment;
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
     * Number Format for Fixtures and Ranking
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
        $user = $this->getUser();
        $player = $user->getPlayer();
        $notices = $player->getMessages();
        foreach ($notices as $notice) {
            if (!$notice->getReaded()) {
                $notice->setReaded(true);
                $this->addFlash($notice->getClass(), '<a href='.$this->generateUrl('archmage_game_account_message', array('hash' => $notice->getHash()), true).'>'.$notice->getSubject().'</a>');
            }
        }
        $manager->persist($player);
        $manager->flush();
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
                if ($enchantment->getSpell()->getSkill()->getTerrainBonus() != 0) {
                    $constructions = $player->getConstructions()->toArray();
                    shuffle($constructions);
                    $construction = $constructions[0];
                    $quantity = round($construction->getQuantity() * $enchantment->getSpell()->getSkill()->getTerrainBonus() * $enchantment->getOwner()->getMagic() / (float)100);
                    $construction->setQuantity($construction->getQuantity() + $quantity);
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
                $this->addFlash('success', 'Has encontrado por casualidad el artefacto <span class="label label-'.$item->getArtifact()->getFaction()->getClass().'">'.$item->getArtifact()->getName().'</span>.');
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
                        $this->addFlash('danger', 'Se ha desbandado <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'">'.$troop->getUnit()->getName().'</span> por no pagar mantenimientos de <span class="label label-extra">Oro</span>.');
                    }
                }
            }
            foreach ($player->getContracts() as $contract) {
                $gold = $player->getGold() + $player->getGoldResourcePerTurn() - $player->getGoldMaintenancePerTurn();
                if ($gold < 0) {
                    if ($contract->getHero()->getGoldMaintenance() > 0) {
                        $player->removeContract($contract);
                        $manager->remove($contract);
                        $this->addFlash('danger', 'Se ha desbandado tu <span class="'.$contract->getHero()->getFaction()->getClass().'">'.$contract->getHero()->getName().'</span> por no pagar mantenimientos de <span class="label label-extra">Oro</span>.');
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
                        $this->addFlash('danger', 'Se ha roto el encantamiento <span class="'.$enchantment->getSpell()->getFaction()->getClass().'">'.$enchantment->getSpell()->getName().'</span> por no pagar mantenimientos de <span class="label label-extra">Oro</span>.');
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
                        $this->addFlash('danger', 'Se ha desbandado <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'">'.$troop->getUnit()->getName().'</span> por no pagar mantenimientos de <span class="label label-extra">Personas</span>.');
                    }
                }
            }
            foreach ($player->getContracts() as $contract) {
                $people = $player->getPeople() + $player->getPeopleResourcePerTurn() - $player->getPeopleMaintenancePerTurn();
                if ($people < 0) {
                    if ($contract->getHero()->getPeopleMaintenance() > 0) {
                        $player->removeContract($contract);
                        $manager->remove($contract);
                        $this->addFlash('danger', 'Se ha desbandado tu <span class="'.$contract->getHero()->getFaction()->getClass().'">'.$contract->getHero()->getName().'</span> por no pagar mantenimientos de <span class="label label-extra">Personas</span>.');
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
                        $this->addFlash('danger', 'Se ha roto el encantamiento <span class="'.$enchantment->getSpell()->getFaction()->getClass().'">'.$enchantment->getSpell()->getName().'</span> por no pagar mantenimientos de <span class="label label-extra">Personas</span>.');
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
                        $this->addFlash('danger', 'Se ha desbandado <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'">'.$troop->getUnit()->getName().'</span> por no pagar mantenimientos de <span class="label label-extra">Maná</span>.');
                    }
                }
            }
            foreach ($player->getContracts() as $contract) {
                $mana = $player->getMana() + $player->getManaResourcePerTurn() - $player->getManaMaintenancePerTurn();
                if ($mana < 0) {
                    if ($contract->getHero()->getManaMaintenance() > 0) {
                        $player->removeContract($contract);
                        $manager->remove($contract);
                        $this->addFlash('danger', 'Se ha desbandado tu <span class="'.$contract->getHero()->getFaction()->getClass().'">'.$contract->getHero()->getName().'</span> por no pagar mantenimientos de <span class="label label-extra">Maná</span>.');
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
                        $this->addFlash('danger', 'Se ha roto el encantamiento <span class="'.$enchantment->getSpell()->getFaction()->getClass().'">'.$enchantment->getSpell()->getName().'</span> por no pagar mantenimientos de <span class="label label-extra">Maná</span>.');
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
                    $manager->remove($enchantment);
                    $manager->persist($enchantment->getOwner());
                    $this->addFlash('success', 'Se ha terminado el encantamiento <span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'">'.$enchantment->getSpell()->getName().'</span>.');
                }
            }
        }
        //EXPERIENCE
        foreach ($player->getContracts() as $contract) {
            $contract->setExperience($contract->getExperience() + $turns);
            if ($contract->getExperience() >= $contract->getHero()->getExperience() * $contract->getLevel()) {
                $contract->setExperience($contract->getExperience() - $contract->getHero()->getExperience());
                $contract->setLevel($contract->getLevel() + 1);
                $this->addFlash('success', 'Tu héroe <span class="'.$contract->getHero()->getFaction()->getClass().'">'.$contract->getHero()->getName().'</span> ha subido de nivel.');
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
                $achievement->getLands() != null && $player->getLands() >= $achievement->getLands())
            ) {
                $player->addAchievement($achievement);
                $this->addFlash('success', 'Has desbloqueado el logro <span class="label label-'.$player->getFaction()->getClass().'">'.$achievement->getName().'</span>.');
            }
        }
    }
}
