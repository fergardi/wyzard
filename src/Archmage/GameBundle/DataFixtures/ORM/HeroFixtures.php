<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Hero;

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
        $hero->setGoldMaintenance(0);
        $hero->setManaMaintenance(0);
        $hero->setPeopleMaintenance(0);
        $hero->setGoldAuction(0);
        $hero->setRarityAuction(0);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Oscuridad'));
        $manager->persist($hero);

        //SEÑOR DE LOS DEMONIOS
        $hero = new Hero();
        $hero->setName('Señor de los Demonios');
        $hero->setImage('bundles/archmagegame/images/hero/doom/demonlord.jpg');
        $hero->setDescription('Descripción');
        $hero->setGoldMaintenance(0);
        $hero->setManaMaintenance(0);
        $hero->setPeopleMaintenance(0);
        $hero->setGoldAuction(0);
        $hero->setRarityAuction(0);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Destrucción'));
        $manager->persist($hero);

        //JINETE DE DRAGONES
        $hero = new Hero();
        $hero->setName('Jinete de Dragones');
        $hero->setImage('bundles/archmagegame/images/hero/doom/dragonrider.jpg');
        $hero->setDescription('Descripción');
        $hero->setGoldMaintenance(0);
        $hero->setManaMaintenance(0);
        $hero->setPeopleMaintenance(0);
        $hero->setGoldAuction(0);
        $hero->setRarityAuction(0);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Destrucción'));
        $manager->persist($hero);

        //ALQUIMISTA
        $hero = new Hero();
        $hero->setName('Alquimista');
        $hero->setImage('bundles/archmagegame/images/hero/ghost/alchemyst.jpg');
        $hero->setDescription('Descripción');
        $hero->setGoldMaintenance(0);
        $hero->setManaMaintenance(0);
        $hero->setPeopleMaintenance(0);
        $hero->setGoldAuction(0);
        $hero->setRarityAuction(0);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Fantasmal'));
        $manager->persist($hero);

        //MAESTRO DE LAS BESTIAS
        $hero = new Hero();
        $hero->setName('Maestro de las Bestias');
        $hero->setImage('bundles/archmagegame/images/hero/nature/beastmaster.jpg');
        $hero->setDescription('Descripción');
        $hero->setGoldMaintenance(0);
        $hero->setManaMaintenance(0);
        $hero->setPeopleMaintenance(0);
        $hero->setGoldAuction(0);
        $hero->setRarityAuction(0);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Naturaleza'));
        $manager->persist($hero);

        //LEPRECHAUNT
        $hero = new Hero();
        $hero->setName('Leprechaunt');
        $hero->setImage('bundles/archmagegame/images/hero/nature/leprechaunt.jpg');
        $hero->setDescription('Descripción');
        $hero->setGoldMaintenance(0);
        $hero->setManaMaintenance(0);
        $hero->setPeopleMaintenance(0);
        $hero->setGoldAuction(0);
        $hero->setRarityAuction(0);
        $hero->setSkill(null);
        $hero->setFaction($this->getReference('Nature'));
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