<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Family;

class FamilyFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $family = new Family();
        $family->setName('NoMuertos');
        $this->addReference($family->getName(), $family);
        $manager->persist($family);

        $family = new Family();
        $family->setName('Humanos');
        $this->addReference($family->getName(), $family);
        $manager->persist($family);

        $family = new Family();
        $family->setName('Bestias');
        $this->addReference($family->getName(), $family);
        $manager->persist($family);

        $family = new Family();
        $family->setName('Elementales');
        $this->addReference($family->getName(), $family);
        $manager->persist($family);

        $family = new Family();
        $family->setName('Celestiales');
        $this->addReference($family->getName(), $family);
        $manager->persist($family);

        $family = new Family();
        $family->setName('Demonios');
        $this->addReference($family->getName(), $family);
        $manager->persist($family);

        $family = new Family();
        $family->setName('Dragones');
        $this->addReference($family->getName(), $family);
        $manager->persist($family);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}