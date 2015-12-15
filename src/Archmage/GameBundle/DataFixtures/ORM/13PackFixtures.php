<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\PaymentBundle\Entity\Pack;

class PackFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //PACK1
        $pack = new Pack();
        $pack->setName('Pack del Aprendiz');
        $pack->setClass('success');
        $pack->setRunes(10);
        $pack->setPrice(0.99);
        $manager->persist($pack);

        //PACK2
        $pack = new Pack();
        $pack->setName('Pack del Veterano');
        $pack->setClass('quest');
        $pack->setRunes(50);
        $pack->setPrice(2.99);
        $manager->persist($pack);

        //PACK3
        $pack = new Pack();
        $pack->setName('Pack del Archimago');
        $pack->setClass('danger');
        $pack->setRunes(100);
        $pack->setPrice(4.99);
        $manager->persist($pack);

        //FLUSH
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 13; // the order in which fixtures will be loaded
    }
}