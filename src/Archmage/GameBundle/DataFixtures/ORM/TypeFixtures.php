<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Type;

class TypeFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $type = new Type();
        $type->setName('Melee');
        $this->addReference($type->getName(), $type);
        $manager->persist($type);

        $type = new Type();
        $type->setName('Distancia');
        $this->addReference($type->getName(), $type);
        $manager->persist($type);

        $type = new Type();
        $type->setName('Volador');
        $this->addReference($type->getName(), $type);
        $manager->persist($type);

        $type = new Type();
        $type->setName('Magia');
        $this->addReference($type->getName(), $type);
        $manager->persist($type);

        $type = new Type();
        $type->setName('Asedio');
        $this->addReference($type->getName(), $type);
        $manager->persist($type);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}