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
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
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
    public function addTurns($turns)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
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
        }
    }
}
