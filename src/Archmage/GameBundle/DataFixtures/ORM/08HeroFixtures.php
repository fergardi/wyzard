<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Archmage\GameBundle\Entity\Hero;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class HeroFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //NIGROMANTE
        $hero = new Hero();
        $hero->setName('Nigromante');
        $hero->setImage('bundles/archmagegame/images/hero/darkness/necromancer.jpg');
        $hero->setDescription('Descripción');
        $hero->setGoldMaintenance(9999);
        $hero->setManaMaintenance(9999);
        $hero->setPeopleMaintenance(9999);
        $hero->setGoldAuction(99999999);
        $hero->setRarityAuction(99);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Oscuridad'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //MAGO NEGRO
        $hero = new Hero();
        $hero->setName('Mago Negro');
        $hero->setImage('bundles/archmagegame/images/hero/darkness/blackmage.jpg');
        $hero->setDescription('Descripción');
        $hero->setGoldMaintenance(9999);
        $hero->setManaMaintenance(9999);
        $hero->setPeopleMaintenance(9999);
        $hero->setGoldAuction(99999999);
        $hero->setRarityAuction(99);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Oscuridad'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //SEÑOR DE LOS DEMONIOS
        $hero = new Hero();
        $hero->setName('Señor de los Demonios');
        $hero->setImage('bundles/archmagegame/images/hero/doom/demonlord.jpg');
        $hero->setDescription('Descripción');
        $hero->setGoldMaintenance(9999);
        $hero->setManaMaintenance(9999);
        $hero->setPeopleMaintenance(9999);
        $hero->setGoldAuction(99999999);
        $hero->setRarityAuction(99);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Destrucción'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //JINETE DE DRAGONES
        $hero = new Hero();
        $hero->setName('Jinete de Dragones');
        $hero->setImage('bundles/archmagegame/images/hero/doom/dragonrider.jpg');
        $hero->setDescription('Descripción');
        $hero->setGoldMaintenance(9999);
        $hero->setManaMaintenance(9999);
        $hero->setPeopleMaintenance(9999);
        $hero->setGoldAuction(99999999);
        $hero->setRarityAuction(99);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Destrucción'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //ALQUIMISTA
        $hero = new Hero();
        $hero->setName('Alquimista');
        $hero->setImage('bundles/archmagegame/images/hero/ghost/alchemyst.jpg');
        $hero->setDescription('Descripción');
        $hero->setGoldMaintenance(9999);
        $hero->setManaMaintenance(9999);
        $hero->setPeopleMaintenance(9999);
        $hero->setGoldAuction(99999999);
        $hero->setRarityAuction(99);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Fantasmal'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //AVATAR DE ELEMENTALES
        $hero = new Hero();
        $hero->setName('Avatar de Elementales');
        $hero->setImage('bundles/archmagegame/images/hero/ghost/elementallord.jpg');
        $hero->setDescription('Descripción');
        $hero->setGoldMaintenance(9999);
        $hero->setManaMaintenance(9999);
        $hero->setPeopleMaintenance(9999);
        $hero->setGoldAuction(99999999);
        $hero->setRarityAuction(99);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Fantasmal'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //MAESTRO DE LAS BESTIAS
        $hero = new Hero();
        $hero->setName('Maestro de las Bestias');
        $hero->setImage('bundles/archmagegame/images/hero/nature/beastmaster.jpg');
        $hero->setDescription('Descripción');
        $hero->setGoldMaintenance(9999);
        $hero->setManaMaintenance(9999);
        $hero->setPeopleMaintenance(9999);
        $hero->setGoldAuction(99999999);
        $hero->setRarityAuction(99);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Naturaleza'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //LEPRECHAUNT
        $hero = new Hero();
        $hero->setName('Leprechaunt');
        $hero->setImage('bundles/archmagegame/images/hero/nature/leprechaunt.jpg');
        $hero->setDescription('Descripción');
        $hero->setGoldMaintenance(9999);
        $hero->setManaMaintenance(9999);
        $hero->setPeopleMaintenance(9999);
        $hero->setGoldAuction(99999999);
        $hero->setRarityAuction(99);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Naturaleza'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //COMANDANTE CELESTIAL
        $hero = new Hero();
        $hero->setName('Comandante Celestial');
        $hero->setImage('bundles/archmagegame/images/hero/holy/heavencommander.jpg');
        $hero->setDescription('Descripción');
        $hero->setGoldMaintenance(9999);
        $hero->setManaMaintenance(9999);
        $hero->setPeopleMaintenance(9999);
        $hero->setGoldAuction(99999999);
        $hero->setRarityAuction(99);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Sagrado'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //CRUZADO
        $hero = new Hero();
        $hero->setName('Cruzado');
        $hero->setImage('bundles/archmagegame/images/hero/holy/crusader.jpg');
        $hero->setDescription('Descripción');
        $hero->setGoldMaintenance(9999);
        $hero->setManaMaintenance(9999);
        $hero->setPeopleMaintenance(9999);
        $hero->setGoldAuction(99999999);
        $hero->setRarityAuction(99);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Sagrado'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 8; // the order in which fixtures will be loaded
    }
}