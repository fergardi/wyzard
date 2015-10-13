<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

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

        //SELFREFERENCING
        $this->getReference('Asedio')->setOpposite($this->getReference('Distancia'));
        $this->getReference('Distancia')->setOpposite($this->getReference('Volador'));
        $this->getReference('Volador')->setOpposite($this->getReference('Magia'));
        $this->getReference('Magia')->setOpposite($this->getReference('Melee'));
        $this->getReference('Melee')->setOpposite($this->getReference('Asedio'));

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