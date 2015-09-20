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
        $hero->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $hero->setExperience(300);
        $hero->setGoldMaintenance(3000);
        $hero->setPeopleMaintenance(6000);
        $hero->setManaMaintenance(1000);
        $hero->setGoldAuction(50000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Comandar NoMuertos_skill'));
        $hero->setFaction($this->getReference('Oscuridad'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //MAGO NEGRO
        $hero = new Hero();
        $hero->setName('Mago Negro');
        $hero->setImage('bundles/archmagegame/images/hero/darkness/blackmage.jpg');
        $hero->setLore('Un pulmón por aquí, un ojo por allá...');
        $hero->setExperience(300);
        $hero->setGoldMaintenance(8000);
        $hero->setPeopleMaintenance(0);
        $hero->setManaMaintenance(2000);
        $hero->setGoldAuction(50000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Paz_skill'));
        $hero->setFaction($this->getReference('Oscuridad'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //REY DE LOS DEMONIOS
        $hero = new Hero();
        $hero->setName('Rey de los Demonios');
        $hero->setImage('bundles/archmagegame/images/hero/doom/demonking.jpg');
        $hero->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $hero->setExperience(300);
        $hero->setGoldMaintenance(4000);
        $hero->setPeopleMaintenance(2500);
        $hero->setManaMaintenance(3500);
        $hero->setGoldAuction(50000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Comandar Demonios_skill'));
        $hero->setFaction($this->getReference('Caos'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //JINETE DE DRAGONES
        $hero = new Hero();
        $hero->setName('Jinete de Dragones');
        $hero->setImage('bundles/archmagegame/images/hero/doom/dragonrider.jpg');
        $hero->setLore('Valar Morghulis');
        $hero->setExperience(300);
        $hero->setGoldMaintenance(4000);
        $hero->setManaMaintenance(4500);
        $hero->setPeopleMaintenance(1500);
        $hero->setGoldAuction(50000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Comandar Dragones_skill'));
        $hero->setFaction($this->getReference('Caos'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //CHAMAN
        $hero = new Hero();
        $hero->setName('Chamán');
        $hero->setImage('bundles/archmagegame/images/hero/ghost/shaman.jpg');
        $hero->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $hero->setExperience(300);
        $hero->setGoldMaintenance(8500);
        $hero->setPeopleMaintenance(1500);
        $hero->setManaMaintenance(0);
        $hero->setGoldAuction(50000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Concentración_skill'));
        $hero->setFaction($this->getReference('Fantasmal'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //MAESTRO DE ELEMENTALES
        $hero = new Hero();
        $hero->setName('Maestro de los Elementos');
        $hero->setImage('bundles/archmagegame/images/hero/ghost/elementsmaster.jpg');
        $hero->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $hero->setExperience(300);
        $hero->setGoldMaintenance(7000);
        $hero->setPeopleMaintenance(2000);
        $hero->setManaMaintenance(1000);
        $hero->setGoldAuction(50000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Comandar Elementales_skill'));
        $hero->setFaction($this->getReference('Fantasmal'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //SEÑOR DE LAS BESTIAS
        $hero = new Hero();
        $hero->setName('Maestro de las Bestias');
        $hero->setImage('bundles/archmagegame/images/hero/nature/beastlord.jpg');
        $hero->setLore('Cuchi, cuchi, cuchi...');
        $hero->setExperience(300);
        $hero->setGoldMaintenance(6000);
        $hero->setPeopleMaintenance(1500);
        $hero->setManaMaintenance(2500);
        $hero->setGoldAuction(50000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Comandar Bestias_skill'));
        $hero->setFaction($this->getReference('Naturaleza'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //LEPRECHAUNT
        $hero = new Hero();
        $hero->setName('Leprechaunt');
        $hero->setImage('bundles/archmagegame/images/hero/nature/leprechaunt.jpg');
        $hero->setLore('No preguntes de dónde sale el dinero');
        $hero->setExperience(300);
        $hero->setGoldMaintenance(0);
        $hero->setPeopleMaintenance(5500);
        $hero->setManaMaintenance(4500);
        $hero->setGoldAuction(50000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Prosperidad_skill'));
        $hero->setFaction($this->getReference('Naturaleza'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //COMANDANTE DE LOS CIELOS
        $hero = new Hero();
        $hero->setName('Comandante de los Cielos');
        $hero->setImage('bundles/archmagegame/images/hero/holy/heavencommander.jpg');
        $hero->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $hero->setExperience(300);
        $hero->setGoldMaintenance(8500);
        $hero->setPeopleMaintenance(500);
        $hero->setManaMaintenance(1000);
        $hero->setGoldAuction(50000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Comandar Celestiales_skill'));
        $hero->setFaction($this->getReference('Sagrado'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //CRUZADO
        $hero = new Hero();
        $hero->setName('Cruzado');
        $hero->setImage('bundles/archmagegame/images/hero/holy/crusader.jpg');
        $hero->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $hero->setExperience(300);
        $hero->setGoldMaintenance(7500);
        $hero->setPeopleMaintenance(500);
        $hero->setManaMaintenance(2000);
        $hero->setGoldAuction(50000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Comandar Humanos_skill'));
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