<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Building;

class BuildingFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //TIERRAS
        $building = new Building();
        $building->setName('Tierras');
        $building->setDescription('Texto de prueba');
        $building->setImage('bundles/archmagegame/images/building/land.jpg');
        $building->setGoldCost(0);
        $building->setManaCost(0);
        $building->setPeopleCost(0);
        $building->setGoldMaintenance(0);
        $building->setManaMaintenance(0);
        $building->setPeopleMaintenance(0);
        $building->setGoldResource(0);
        $building->setManaResource(0);
        $building->setPeopleResource(0);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //GRANJAS
        $building = new Building();
        $building->setName('Granjas');
        $building->setDescription('Texto de prueba');
        $building->setImage('bundles/archmagegame/images/building/farm.jpg');
        $building->setGoldCost(0);
        $building->setManaCost(0);
        $building->setPeopleCost(0);
        $building->setGoldMaintenance(0);
        $building->setManaMaintenance(0);
        $building->setPeopleMaintenance(0);
        $building->setGoldResource(0);
        $building->setManaResource(0);
        $building->setPeopleResource(0);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //PUEBLOS
        $building = new Building();
        $building->setName('Pueblos');
        $building->setDescription('Texto de prueba');
        $building->setImage('bundles/archmagegame/images/building/village.jpg');
        $building->setGoldCost(0);
        $building->setManaCost(0);
        $building->setPeopleCost(0);
        $building->setGoldMaintenance(0);
        $building->setManaMaintenance(0);
        $building->setPeopleMaintenance(0);
        $building->setGoldResource(0);
        $building->setManaResource(0);
        $building->setPeopleResource(0);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //NODES
        $building = new Building();
        $building->setName('Nodos');
        $building->setDescription('Texto de prueba');
        $building->setImage('bundles/archmagegame/images/building/node.jpg');
        $building->setGoldCost(0);
        $building->setManaCost(0);
        $building->setPeopleCost(0);
        $building->setGoldMaintenance(0);
        $building->setManaMaintenance(0);
        $building->setPeopleMaintenance(0);
        $building->setGoldResource(0);
        $building->setManaResource(0);
        $building->setPeopleResource(0);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //BARRERAS
        $building = new Building();
        $building->setName('Barreras');
        $building->setDescription('Texto de prueba');
        $building->setImage('bundles/archmagegame/images/building/barrier.jpg');
        $building->setGoldCost(0);
        $building->setManaCost(0);
        $building->setPeopleCost(0);
        $building->setGoldMaintenance(0);
        $building->setManaMaintenance(0);
        $building->setPeopleMaintenance(0);
        $building->setGoldResource(0);
        $building->setManaResource(0);
        $building->setPeopleResource(0);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //FORTALEZAS
        $building = new Building();
        $building->setName('Fortalezas');
        $building->setDescription('Texto de prueba');
        $building->setImage('bundles/archmagegame/images/building/fortress.jpg');
        $building->setGoldCost(0);
        $building->setManaCost(0);
        $building->setPeopleCost(0);
        $building->setGoldMaintenance(0);
        $building->setManaMaintenance(0);
        $building->setPeopleMaintenance(0);
        $building->setGoldResource(0);
        $building->setManaResource(0);
        $building->setPeopleResource(0);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //TALLERES
        $building = new Building();
        $building->setName('Talleres');
        $building->setDescription('Texto de prueba');
        $building->setImage('bundles/archmagegame/images/building/workshop.jpg');
        $building->setGoldCost(0);
        $building->setManaCost(0);
        $building->setPeopleCost(0);
        $building->setGoldMaintenance(0);
        $building->setManaMaintenance(0);
        $building->setPeopleMaintenance(0);
        $building->setGoldResource(0);
        $building->setManaResource(0);
        $building->setPeopleResource(0);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //GREMIOS
        $building = new Building();
        $building->setName('Gremios');
        $building->setDescription('Texto de prueba');
        $building->setImage('bundles/archmagegame/images/building/guild.jpg');
        $building->setGoldCost(0);
        $building->setManaCost(0);
        $building->setPeopleCost(0);
        $building->setGoldMaintenance(0);
        $building->setManaMaintenance(0);
        $building->setPeopleMaintenance(0);
        $building->setGoldResource(0);
        $building->setManaResource(0);
        $building->setPeopleResource(0);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 5; // the order in which fixtures will be loaded
    }
}