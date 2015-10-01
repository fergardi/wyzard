<?php

namespace Archmage\GameBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Archmage\GameBundle\Entity\Item;
use Archmage\GameBundle\Entity\Contract;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Research;
use Archmage\GameBundle\Entity\Auction;

class AuctionCommand extends ContainerAwareCommand
{
    /**
     * Constants
     */
    const AUCTION_PRICE = 1000000;
    const AUCTION_TROOPS = 2;
    const AUCTION_ITEMS = 2;
    const AUCTION_CONTRACTS = 1;
    const AUCTION_RESEARCHS = 1;

    /**
     * configure
     */
    protected function configure()
    {
        $this
            ->setName('auction:refresh')
            ->setDescription('Refresh the auctions, set winners and create new ones')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->getContainer()->get('doctrine')->getManager();
        //OLD AUCTIONS
        $auctions = $manager->getRepository('ArchmageGameBundle:Auction')->findAll();
        foreach ($auctions as $auction) {
            $winner = $auction->getPlayer();
            $item = $auction->getItem();
            $troop = $auction->getTroop();
            $contract = $auction->getContract();
            $research = $auction->getResearch();
            if ($winner) {
                if ($item) {
                    if ($winner->hasItem($item)) {
                        $winner->hasItem($item)->setQuantity($winner->hasItem($item)->getQuantity() + $item->getQuantity());
                        $manager->remove($item);
                    } else {
                        $item->setPlayer($winner);
                        $winner->addItem($item);
                    }
                } elseif ($troop) {
                    if ($winner->hasTroop($troop)) {
                        $winner->hasTroop($troop)->setQuantity($winner->hasTroop($troop)->getQuantity() + $troop->getQuantity());
                        $manager->remove($troop);
                    } else {
                        if ($winner->getTroops()->count() < $winner::TROOPS_CAP) {
                            $troop->setPlayer($winner);
                            $winner->addTroop($troop);
                        } else {
                            //TODO MANDAR MENSAJE NEGATIVO
                            $manager->remove($troop);
                        }
                    }
                } elseif ($contract) {
                    if (!$winner->hasContract($contract)) {
                        $contract->setPlayer($winner);
                        $winner->addContract($contract);
                    } else {
                        //TODO MANDAR MENSAJE NEGATIVO
                        $manager->remove($contract);
                    }
                } elseif ($research) {
                    if (!$winner->hasResearch($research)) {
                        $research->setPlayer($winner);
                        $winner->addResearch($research);
                    } else {
                        //TODO MANDAR MENSAJE NEGATIVO
                        $manager->remove($research);
                    }
                }
                //TODO MANDAR MENSAJE POSITIVO
                $manager->persist($winner);
            }
            $manager->remove($auction);
        }
        //NEW AUCTIONS
        //ITEM
        $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->findAll();
        for ($i = 0; $i < self::AUCTION_ITEMS; $i++) {
            shuffle($artifacts);
            $artifact = $artifacts[0]; // suponemos > 0
            $auction = new Auction();
            $item = new Item();
            $manager->persist($item);
            $item->setArtifact($artifact);
            $item->setQuantity(rand(1,3));
            $item->setPlayer(null);
            $auction->setPlayer(null);
            $auction->setItem($item);
            $auction->setBid(self::AUCTION_PRICE);
            $manager->persist($auction);
        }
        //TROOP
        $units = $manager->getRepository('ArchmageGameBundle:Unit')->findAll();
        for ($i = 0; $i < self::AUCTION_TROOPS; $i++) {
            shuffle($units);
            $unit = $units[0]; // suponemos > 0
            $auction = new Auction();
            $troop = new Troop();
            $manager->persist($troop);
            $troop->setUnit($unit);
            $troop->setQuantity(rand(1, $unit->getQuantityAuction() - 1));
            $troop->setPlayer(null);
            $auction->setPlayer(null);
            $auction->setTroop($troop);
            $auction->setBid(self::AUCTION_PRICE);
            $manager->persist($auction);
        }
        //CONTRACT
        $heroes = $manager->getRepository('ArchmageGameBundle:Hero')->findAll();
        for ($i = 0; $i < self::AUCTION_CONTRACTS; $i++) {
            shuffle($heroes);
            $hero = $heroes[0]; // suponemos > 0
            $auction = new Auction();
            $contract = new Contract();
            $manager->persist($contract);
            $contract->setHero($hero);
            $contract->setExperience(0);
            $contract->setLevel(rand(1,10));
            $contract->setPlayer(null);
            $auction->setPlayer(null);
            $auction->setContract($contract);
            $auction->setBid(self::AUCTION_PRICE);
            $manager->persist($auction);
        }
        //RESEARCH
        $spells = $manager->getRepository('ArchmageGameBundle:Spell')->findAll();
        for ($i = 0; $i < self::AUCTION_RESEARCHS; $i++) {
            shuffle($spells);
            $spell = $spells[0]; // suponemos > 0
            $auction = new Auction();
            $research = new Research();
            $manager->persist($research);
            $research->setSpell($spell);
            $research->setTurns(0);
            $research->setPlayer(null);
            $research->setActive(true);
            $auction->setPlayer(null);
            $auction->setResearch($research);
            $auction->setBid(self::AUCTION_PRICE);
            $manager->persist($auction);
        }
        $manager->flush();
        return true;
    }
}