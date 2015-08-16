<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

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
        $family->setName('NoMuerto');
        $this->addReference($family->getName(), $family);
        $manager->persist($family);

        $family = new Family();
        $family->setName('Humano');
        $this->addReference($family->getName(), $family);
        $manager->persist($family);

        $family = new Family();
        $family->setName('Elfo');
        $this->addReference($family->getName(), $family);
        $manager->persist($family);

        $family = new Family();
        $family->setName('Bestia');
        $this->addReference($family->getName(), $family);
        $manager->persist($family);

        $family = new Family();
        $family->setName('Elemental');
        $this->addReference($family->getName(), $family);
        $manager->persist($family);

        $family = new Family();
        $family->setName('Celestial');
        $this->addReference($family->getName(), $family);
        $manager->persist($family);

        $family = new Family();
        $family->setName('Demonio');
        $this->addReference($family->getName(), $family);
        $manager->persist($family);

        $family = new Family();
        $family->setName('Dragón');
        $this->addReference($family->getName(), $family);
        $manager->persist($family);

        $family = new Family();
        $family->setName('Marino');
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