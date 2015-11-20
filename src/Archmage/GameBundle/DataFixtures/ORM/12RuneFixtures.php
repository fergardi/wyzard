<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Rune;

class RuneFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //RUNA DE ORO
        $rune = new Rune();
        $rune->setName('Runa de Oro');
        $rune->setSkill($this->getReference($rune->getName()));
        $rune->setCost(5);
        $manager->persist($rune);

        //RUNA DE POBLACION
        $rune = new Rune();
        $rune->setName('Runa de Población');
        $rune->setSkill($this->getReference($rune->getName()));
        $rune->setCost(5);
        $manager->persist($rune);

        //RUNA DE MANA
        $rune = new Rune();
        $rune->setName('Runa de Maná');
        $rune->setSkill($this->getReference($rune->getName()));
        $rune->setCost(5);
        $manager->persist($rune);

        //RUNA DE TIERRAS
        $rune = new Rune();
        $rune->setName('Runa de Tierra');
        $rune->setSkill($this->getReference($rune->getName()));
        $rune->setCost(5);
        $manager->persist($rune);

        //RUNA DE ARTEFACTOS
        $rune = new Rune();
        $rune->setName('Runa de Artefacto');
        $rune->setSkill($this->getReference($rune->getName()));
        $rune->setCost(5);
        $manager->persist($rune);

        //RUNA DE MAPAS
        $rune = new Rune();
        $rune->setName('Runa de Mapa');
        $rune->setSkill($this->getReference($rune->getName()));
        $rune->setCost(5);
        $manager->persist($rune);

        //RUNA DE RECETAS
        $rune = new Rune();
        $rune->setName('Runa de Receta');
        $rune->setSkill($this->getReference($rune->getName()));
        $rune->setCost(5);
        $manager->persist($rune);

        //FLUSH
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 12; // the order in which fixtures will be loaded
    }
}