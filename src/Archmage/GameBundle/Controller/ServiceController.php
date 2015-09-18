<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ServiceController extends Controller
{
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
                //$notice->setReaded(true);
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
        $user = $manager->getRepository('ArchmageUserBundle:User')->findOneByUsername($this->getUser()->getUsername());
        $player = $user->getPlayer();
        for ($i = 1; $i <= $turns; $i++) {
            //GOLD
            foreach ($player->getTroops() as $troop) {
                $gold = $player->getGold() + $player->getGoldResourcePerTurn() - $player->getGoldMaintenancePerTurn();
                if ($gold < 0) {
                    if ($troop->getUnit()->getGoldMaintenance() > 0) {
                        $troop->setQuantity($troop->getQuantity() - ceil(abs($gold) / $troop->getUnit()->getGoldMaintenance()));
                        if ($troop->getQuantity() <= 0) {
                            $player->removeTroop($troop);
                            $manager->remove($troop);
                        }
                        $this->addFlash('danger', 'Se ha desbandado una tropa por no pagar mantenimientos de Oro.');
                    }
                }
            }
            foreach ($player->getContracts() as $contract) {
                $gold = $player->getGold() + $player->getGoldResourcePerTurn() - $player->getGoldMaintenancePerTurn();
                if ($gold < 0) {
                    if ($contract->getHero()->getGoldMaintenance() > 0) {
                        $player->removeContract($contract);
                        $manager->remove($contract);
                        $this->addFlash('danger', 'Se ha desbandado un héroe por no pagar mantenimientos de Oro.');
                    }
                }
            }
            foreach ($player->getEnchantments() as $enchantment) {
                $gold = $player->getGold() + $player->getGoldResourcePerTurn() - $player->getGoldMaintenancePerTurn();
                if ($gold < 0) {
                    if ($enchantment->getSpell()->getGoldMaintenance() > 0) {
                        $player->removeEnchantment($enchantment);
                        $manager->remove($enchantment);
                        $this->addFlash('danger', 'Se ha roto un encantamiento por no pagar mantenimientos de Oro.');
                    }
                }
            }
            $player->setGold($gold);
            //PEOPLE
            foreach ($player->getTroops() as $troop) {
                $people = $player->getPeople() + $player->getPeopleResourcePerTurn() - $player->getPeopleMaintenancePerTurn();
                if ($people < 0) {
                    if ($troop->getUnit()->getPeopleMaintenance() > 0) {
                        $troop->setQuantity($troop->getQuantity() - ceil(abs($people) / $troop->getUnit()->getPeopleMaintenance()));
                        if ($troop->getQuantity() <= 0) {
                            $player->removeTroop($troop);
                            $manager->remove($troop);
                        }
                        $this->addFlash('danger', 'Se ha desbandado una tropa por no pagar mantenimientos de Personas.');
                    }
                }
            }
            foreach ($player->getContracts() as $contract) {
                $people = $player->getPeople() + $player->getPeopleResourcePerTurn() - $player->getPeopleMaintenancePerTurn();
                if ($people < 0) {
                    if ($contract->getHero()->getPeopleMaintenance() > 0) {
                        $player->removeContract($contract);
                        $manager->remove($contract);
                        $this->addFlash('danger', 'Se ha desbandado un héroe por no pagar mantenimientos de Personas.');
                    }
                }
            }
            foreach ($player->getEnchantments() as $enchantment) {
                $people = $player->getPeople() + $player->getPeopleResourcePerTurn() - $player->getPeopleMaintenancePerTurn();
                if ($people < 0) {
                    if ($enchantment->getSpell()->getPeopleMaintenance() > 0) {
                        $player->removeEnchantment($enchantment);
                        $manager->remove($enchantment);
                        $this->addFlash('danger', 'Se ha roto un encantamiento por no pagar mantenimientos de Personas.');
                    }
                }
            }
            $player->setPeople($people);
            //MANA
            foreach ($player->getTroops() as $troop) {
                $mana = $player->getMana() + $player->getManaResourcePerTurn() - $player->getManaMaintenancePerTurn();
                if ($mana < 0) {
                    if ($troop->getUnit()->getManaMaintenance() > 0) {
                        $troop->setQuantity($troop->getQuantity() - ceil(abs($mana) / $troop->getUnit()->getManaMaintenance()));
                        if ($troop->getQuantity() <= 0) {
                            $player->removeTroop($troop);
                            $manager->remove($troop);
                        }
                        $this->addFlash('danger', 'Se ha desbandado una tropa por no pagar mantenimientos de Maná.');
                    }
                }
            }
            foreach ($player->getContracts() as $contract) {
                $mana = $player->getMana() + $player->getManaResourcePerTurn() - $player->getManaMaintenancePerTurn();
                if ($mana < 0) {
                    if ($contract->getHero()->getManaMaintenance() > 0) {
                        $player->removeContract($contract);
                        $manager->remove($contract);
                        $this->addFlash('danger', 'Se ha desbandado un héroe por no pagar mantenimientos de Maná.');
                    }
                }
            }
            foreach ($player->getEnchantments() as $enchantment) {
                $mana = $player->getMana() + $player->getManaResourcePerTurn() - $player->getManaMaintenancePerTurn();
                if ($mana < 0) {
                    if ($enchantment->getSpell()->getManaMaintenance() > 0) {
                        $player->removeEnchantment($enchantment);
                        $manager->remove($enchantment);
                        $this->addFlash('danger', 'Se ha roto un encantamiento por no pagar mantenimientos de Maná.');
                    }
                }
            }
            $player->setMana($mana);
        }
    }
}
