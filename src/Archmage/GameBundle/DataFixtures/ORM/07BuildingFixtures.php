<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

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
        $building->setDescription('Otorgan espacio de construcción adicional a tu reino.');
        $building->setImage('bundles/archmagegame/images/building/land.jpg');
        $building->setGoldCost(999);
        $building->setManaCost(999);
        $building->setPeopleCost(999);
        $building->setGoldMaintenance(999);
        $building->setManaMaintenance(999);
        $building->setPeopleMaintenance(999);
        $building->setGoldResource(999);
        $building->setManaResource(999);
        $building->setPeopleResource(999);
        $building->setGoldCap(999);
        $building->setManaCap(999);
        $building->setPeopleCap(999);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //GRANJAS
        $building = new Building();
        $building->setName('Granjas');
        $building->setDescription('Otorgan gran cantidad de oro a tu reino.');
        $building->setImage('bundles/archmagegame/images/building/farm.jpg');
        $building->setGoldCost(999);
        $building->setManaCost(999);
        $building->setPeopleCost(999);
        $building->setGoldMaintenance(999);
        $building->setManaMaintenance(999);
        $building->setPeopleMaintenance(999);
        $building->setGoldResource(999);
        $building->setManaResource(999);
        $building->setPeopleResource(999);
        $building->setGoldCap(999);
        $building->setManaCap(999);
        $building->setPeopleCap(999);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //PUEBLOS
        $building = new Building();
        $building->setName('Pueblos');
        $building->setDescription('Otorgan e incrementan la población máxima de tu reino.');
        $building->setImage('bundles/archmagegame/images/building/village.jpg');
        $building->setGoldCost(999);
        $building->setManaCost(999);
        $building->setPeopleCost(999);
        $building->setGoldMaintenance(999);
        $building->setManaMaintenance(999);
        $building->setPeopleMaintenance(999);
        $building->setGoldResource(999);
        $building->setManaResource(999);
        $building->setPeopleResource(999);
        $building->setGoldCap(999);
        $building->setManaCap(999);
        $building->setPeopleCap(999);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //NODES
        $building = new Building();
        $building->setName('Nodos');
        $building->setDescription('Otorgan e incrementan el maná máximo de tu reino.');
        $building->setImage('bundles/archmagegame/images/building/node.jpg');
        $building->setGoldCost(999);
        $building->setManaCost(999);
        $building->setPeopleCost(999);
        $building->setGoldMaintenance(999);
        $building->setManaMaintenance(999);
        $building->setPeopleMaintenance(999);
        $building->setGoldResource(999);
        $building->setManaResource(999);
        $building->setPeopleResource(999);
        $building->setGoldCap(999);
        $building->setManaCap(999);
        $building->setPeopleCap(999);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //BARRERAS
        $building = new Building();
        $building->setName('Barreras');
        $building->setDescription('Protegen frente a hechizos y artefactos enemigos.');
        $building->setImage('bundles/archmagegame/images/building/barrier.jpg');
        $building->setGoldCost(999);
        $building->setManaCost(999);
        $building->setPeopleCost(999);
        $building->setGoldMaintenance(999);
        $building->setManaMaintenance(999);
        $building->setPeopleMaintenance(999);
        $building->setGoldResource(999);
        $building->setManaResource(999);
        $building->setPeopleResource(999);
        $building->setGoldCap(999);
        $building->setManaCap(999);
        $building->setPeopleCap(999);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //FORTALEZAS
        $building = new Building();
        $building->setName('Fortalezas');
        $building->setDescription('Si te quedas sin ninguna, tu reino es destruido.');
        $building->setImage('bundles/archmagegame/images/building/fortress.jpg');
        $building->setGoldCost(999);
        $building->setManaCost(999);
        $building->setPeopleCost(999);
        $building->setGoldMaintenance(999);
        $building->setManaMaintenance(999);
        $building->setPeopleMaintenance(999);
        $building->setGoldResource(999);
        $building->setManaResource(999);
        $building->setPeopleResource(999);
        $building->setGoldCap(999);
        $building->setManaCap(999);
        $building->setPeopleCap(999);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //TALLERES
        $building = new Building();
        $building->setName('Talleres');
        $building->setDescription('Aumentan la cantidad de edificios construidos por turno.');
        $building->setImage('bundles/archmagegame/images/building/workshop.jpg');
        $building->setGoldCost(999);
        $building->setManaCost(999);
        $building->setPeopleCost(999);
        $building->setGoldMaintenance(999);
        $building->setManaMaintenance(999);
        $building->setPeopleMaintenance(999);
        $building->setGoldResource(999);
        $building->setManaResource(999);
        $building->setPeopleResource(999);
        $building->setGoldCap(999);
        $building->setManaCap(999);
        $building->setPeopleCap(999);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //GREMIOS
        $building = new Building();
        $building->setName('Gremios');
        $building->setDescription('Reducen la cantidad de turnos necesarios al investigar.');
        $building->setImage('bundles/archmagegame/images/building/guild.jpg');
        $building->setGoldCost(999);
        $building->setManaCost(999);
        $building->setPeopleCost(999);
        $building->setGoldMaintenance(999);
        $building->setManaMaintenance(999);
        $building->setPeopleMaintenance(999);
        $building->setGoldResource(999);
        $building->setManaResource(999);
        $building->setPeopleResource(999);
        $building->setGoldCap(999);
        $building->setManaCap(999);
        $building->setPeopleCap(999);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //BARRACONES
        $building = new Building();
        $building->setName('Barracones');
        $building->setDescription('Aumentan la cantidad de tropas reclutadas al turno.');
        $building->setImage('bundles/archmagegame/images/building/barrack.jpg');
        $building->setGoldCost(999);
        $building->setManaCost(999);
        $building->setPeopleCost(999);
        $building->setGoldMaintenance(999);
        $building->setManaMaintenance(999);
        $building->setPeopleMaintenance(999);
        $building->setGoldResource(999);
        $building->setManaResource(999);
        $building->setPeopleResource(999);
        $building->setGoldCap(999);
        $building->setManaCap(999);
        $building->setPeopleCap(999);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 7; // the order in which fixtures will be loaded
    }
}