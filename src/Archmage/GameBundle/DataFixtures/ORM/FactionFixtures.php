<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Faction;

class FactionFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $faction = new Faction();
        $faction->setName('Destrucción');
        $faction->setImage('bundles/archmagegame/images/faction/doom.jpg');
        $faction->setClass('danger');
        $faction->setDescription('Texto de prueba');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $faction = new Faction();
        $faction->setName('Fantasmal');
        $faction->setImage('bundles/archmagegame/images/faction/ghost.jpg');
        $faction->setClass('info');
        $faction->setDescription('Texto de prueba');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $faction = new Faction();
        $faction->setName('Naturaleza');
        $faction->setImage('bundles/archmagegame/images/faction/nature.jpg');
        $faction->setClass('success');
        $faction->setDescription('Texto de prueba');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $faction = new Faction();
        $faction->setName('Oscuridad');
        $faction->setImage('bundles/archmagegame/images/faction/darkness.jpg');
        $faction->setClass('warning');
        $faction->setDescription('Texto de prueba');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $faction = new Faction();
        $faction->setName('Sagrado');
        $faction->setImage('bundles/archmagegame/images/faction/holy.jpg');
        $faction->setClass('primary');
        $faction->setDescription('Texto de prueba');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $faction = new Faction();
        $faction->setName('Neutral');
        $faction->setImage('bundles/archmagegame/images/faction/neutral.jpg');
        $faction->setClass('default');
        $faction->setDescription('Texto de prueba');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}