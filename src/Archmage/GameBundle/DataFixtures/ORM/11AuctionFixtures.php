<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Auction;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Item;
use Archmage\GameBundle\Entity\Contract;

class AuctionFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //TROOP
        $auction = new Auction();
        $troop = new Troop();
        $manager->persist($troop);
        $troop->setUnit($this->getReference('Esqueletos'));
        $troop->setQuantity(10000);
        $troop->setPlayer(null);
        $auction->setPlayer(null);
        $auction->setTroop($troop);
        $auction->setBid($troop->getUnit()->getGoldAuction());
        $manager->persist($auction);

        //ITEM
        $auction = new Auction();
        $item = new Item();
        $manager->persist($item);
        $item->setArtifact($this->getReference('Huevo de Dragón'));
        $item->setQuantity(1);
        $item->setPlayer(null);
        $auction->setPlayer(null);
        $auction->setItem($item);
        $auction->setBid($item->getArtifact()->getGoldAuction());
        $manager->persist($auction);

        //ITEM
        $auction = new Auction();
        $item = new Item();
        $manager->persist($item);
        $item->setArtifact($this->getReference('Tela de Araña'));
        $item->setQuantity(1);
        $item->setPlayer(null);
        $auction->setPlayer(null);
        $auction->setItem($item);
        $auction->setBid($item->getArtifact()->getGoldAuction());
        $manager->persist($auction);

        //CONTRACT
        $auction = new Auction();
        $contract = new Contract();
        $manager->persist($contract);
        $contract->setHero($this->getReference('Jinete de Dragones'));
        $contract->setPlayer(null);
        $auction->setPlayer(null);
        $auction->setContract($contract);
        $auction->setBid($contract->getHero()->getGoldAuction());
        $manager->persist($auction);

        //CONTRACT
        $auction = new Auction();
        $contract = new Contract();
        $manager->persist($contract);
        $contract->setHero($this->getReference('Leprechaunt'));
        $contract->setPlayer(null);
        $auction->setPlayer(null);
        $auction->setContract($contract);
        $auction->setBid($contract->getHero()->getGoldAuction());
        $manager->persist($auction);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 11; // the order in which fixtures will be loaded
    }
}