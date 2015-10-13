<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

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
        $faction->setName('Caos');
        $faction->setImage('bundles/archmagegame/images/faction/doom.jpg');
        $faction->setDescription('Descripción de la facción');
        $faction->setClass('danger');
        $faction->setSlogan('Sangre y Fuego');
        $faction->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $faction = new Faction();
        $faction->setName('Fantasmal');
        $faction->setImage('bundles/archmagegame/images/faction/ghost.jpg');
        $faction->setDescription('Descripción de la facción');
        $faction->setClass('info');
        $faction->setSlogan('Mente y Espíritu');
        $faction->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $faction = new Faction();
        $faction->setName('Naturaleza');
        $faction->setImage('bundles/archmagegame/images/faction/nature.jpg');
        $faction->setDescription('Descripción de la facción');
        $faction->setClass('success');
        $faction->setSlogan('Roca y Tierra');
        $faction->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $faction = new Faction();
        $faction->setName('Oscuridad');
        $faction->setImage('bundles/archmagegame/images/faction/darkness.jpg');
        $faction->setDescription('Descripción de la facción');
        $faction->setClass('warning');
        $faction->setSlogan('Polvo y Hueso');
        $faction->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $faction = new Faction();
        $faction->setName('Sagrado');
        $faction->setImage('bundles/archmagegame/images/faction/holy.jpg');
        $faction->setDescription('Descripción de la facción');
        $faction->setClass('primary');
        $faction->setSlogan('Luz y Gloria');
        $faction->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $faction = new Faction();
        $faction->setName('Neutral');
        $faction->setImage('bundles/archmagegame/images/faction/neutral.jpg');
        $faction->setDescription('Descripción de la facción');
        $faction->setClass('default');
        $faction->setSlogan('Paz y Armonía');
        $faction->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        //SELFREFERENCING
        $this->getReference('Caos')->setOpposite($this->getReference('Naturaleza'));
        $this->getReference('Naturaleza')->setOpposite($this->getReference('Sagrado'));
        $this->getReference('Sagrado')->setOpposite($this->getReference('Oscuridad'));
        $this->getReference('Oscuridad')->setOpposite($this->getReference('Fantasmal'));
        $this->getReference('Fantasmal')->setOpposite($this->getReference('Caos'));
        $this->getReference('Neutral')->setOpposite($this->getReference('Neutral'));

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