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
        $building->setDescription('Otorgan <span class="label label-extra">Espacio</span> de construcción adicional.');
        $building->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $building->setImage('bundles/archmagegame/images/building/land.jpg');
        $building->setGoldCost(0);
        $building->setPeopleCost(0);
        $building->setManaCost(0);
        $building->setGoldMaintenance(0);
        $building->setPeopleMaintenance(0);
        $building->setManaMaintenance(0);
        $building->setGoldResource(1);
        $building->setPeopleResource(1);
        $building->setManaResource(1);
        $building->setGoldCap(0);
        $building->setPeopleCap(10);
        $building->setManaCap(10);
        $building->setBuildingRatio(0);
        $building->setResearchRatio(0);
        $building->setMagicDefenseRatio(0);
        $building->setArmyDefenseRatio(0);
        $building->setPower(1000);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //GRANJAS
        $building = new Building();
        $building->setName('Granjas');
        $building->setDescription('Otorgan gran cantidad de <span class="label label-extra">Oro</span>.');
        $building->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $building->setImage('bundles/archmagegame/images/building/farm.jpg');
        $building->setGoldCost(500);
        $building->setPeopleCost(100);
        $building->setManaCost(0);
        $building->setGoldMaintenance(0);
        $building->setPeopleMaintenance(2);
        $building->setManaMaintenance(1);
        $building->setGoldResource(60);
        $building->setPeopleResource(0);
        $building->setManaResource(0);
        $building->setGoldCap(0);
        $building->setPeopleCap(100);
        $building->setManaCap(0);
        $building->setBuildingRatio(10);
        $building->setResearchRatio(0);
        $building->setMagicDefenseRatio(0);
        $building->setArmyDefenseRatio(0);
        $building->setPower(1000);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //PUEBLOS
        $building = new Building();
        $building->setName('Pueblos');
        $building->setDescription('Otorgan e incrementan <span class="label label-extra">Población</span> máxima.');
        $building->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $building->setImage('bundles/archmagegame/images/building/village.jpg');
        $building->setGoldCost(1000);
        $building->setPeopleCost(100);
        $building->setManaCost(0);
        $building->setGoldMaintenance(3);
        $building->setPeopleMaintenance(0);
        $building->setManaMaintenance(1);
        $building->setGoldResource(0);
        $building->setPeopleResource(40);
        $building->setManaResource(0);
        $building->setGoldCap(0);
        $building->setPeopleCap(1000);
        $building->setManaCap(0);
        $building->setBuildingRatio(20);
        $building->setResearchRatio(0);
        $building->setMagicDefenseRatio(0);
        $building->setArmyDefenseRatio(0);
        $building->setPower(1000);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //NODOS
        $building = new Building();
        $building->setName('Nodos');
        $building->setDescription('Otorgan e incrementan <span class="label label-extra">Maná</span> máximo.');
        $building->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $building->setImage('bundles/archmagegame/images/building/node.jpg');
        $building->setGoldCost(1500);
        $building->setPeopleCost(100);
        $building->setManaCost(0);
        $building->setGoldMaintenance(3);
        $building->setPeopleMaintenance(2);
        $building->setManaMaintenance(0);
        $building->setGoldResource(0);
        $building->setPeopleResource(0);
        $building->setManaResource(20);
        $building->setGoldCap(0);
        $building->setPeopleCap(0);
        $building->setManaCap(1000);
        $building->setBuildingRatio(30);
        $building->setResearchRatio(0);
        $building->setMagicDefenseRatio(0);
        $building->setArmyDefenseRatio(0);
        $building->setPower(1000);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //BARRERAS
        $building = new Building();
        $building->setName('Barreras');
        $building->setDescription('Aumentan la <span class="label label-extra">Defensa Mágica</span> de tu reino.');
        $building->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $building->setImage('bundles/archmagegame/images/building/barrier.jpg');
        $building->setGoldCost(1000);
        $building->setPeopleCost(100);
        $building->setManaCost(2500);
        $building->setGoldMaintenance(10);
        $building->setPeopleMaintenance(20);
        $building->setManaMaintenance(30);
        $building->setGoldResource(0);
        $building->setPeopleResource(0);
        $building->setManaResource(0);
        $building->setGoldCap(0);
        $building->setPeopleCap(0);
        $building->setManaCap(0);
        $building->setBuildingRatio(200);
        $building->setResearchRatio(0);
        $building->setMagicDefenseRatio(10);
        $building->setArmyDefenseRatio(0);
        $building->setPower(5000);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //FORTALEZAS
        $building = new Building();
        $building->setName('Fortalezas');
        $building->setDescription('Aumentan la <span class="label label-extra">Defensa Física</span> de tu reino.');
        $building->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $building->setImage('bundles/archmagegame/images/building/fortress.jpg');
        $building->setGoldCost(2500);
        $building->setPeopleCost(100);
        $building->setManaCost(1000);
        $building->setGoldMaintenance(30);
        $building->setPeopleMaintenance(20);
        $building->setManaMaintenance(10);
        $building->setGoldResource(0);
        $building->setPeopleResource(0);
        $building->setManaResource(0);
        $building->setGoldCap(0);
        $building->setPeopleCap(0);
        $building->setManaCap(0);
        $building->setBuildingRatio(200);
        $building->setResearchRatio(0);
        $building->setMagicDefenseRatio(0);
        $building->setArmyDefenseRatio(10);
        $building->setPower(5000);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //TALLERES
        $building = new Building();
        $building->setName('Talleres');
        $building->setDescription('Reducen la cantidad de <span class="label label-extra">Turnos</span> para construir.');
        $building->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $building->setImage('bundles/archmagegame/images/building/workshop.jpg');
        $building->setGoldCost(1500);
        $building->setPeopleCost(100);
        $building->setManaCost(0);
        $building->setGoldMaintenance(3);
        $building->setPeopleMaintenance(2);
        $building->setManaMaintenance(1);
        $building->setGoldResource(0);
        $building->setPeopleResource(0);
        $building->setManaResource(0);
        $building->setGoldCap(0);
        $building->setPeopleCap(0);
        $building->setManaCap(0);
        $building->setBuildingRatio(5);
        $building->setResearchRatio(0);
        $building->setMagicDefenseRatio(0);
        $building->setArmyDefenseRatio(0);
        $building->setPower(1000);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //GREMIOS
        $building = new Building();
        $building->setName('Gremios');
        $building->setDescription('Reducen la cantidad de <span class="label label-extra">Turnos</span> para investigar.');
        $building->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $building->setImage('bundles/archmagegame/images/building/guild.jpg');
        $building->setGoldCost(0);
        $building->setPeopleCost(100);
        $building->setManaCost(500);
        $building->setGoldMaintenance(3);
        $building->setPeopleMaintenance(2);
        $building->setManaMaintenance(1);
        $building->setGoldResource(0);
        $building->setPeopleResource(0);
        $building->setManaResource(0);
        $building->setGoldCap(0);
        $building->setPeopleCap(0);
        $building->setManaCap(0);
        $building->setBuildingRatio(30);
        $building->setResearchRatio(30);
        $building->setMagicDefenseRatio(0);
        $building->setArmyDefenseRatio(0);
        $building->setPower(1000);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //BARRACONES
        $building = new Building();
        $building->setName('Barracones');
        $building->setDescription('Reducen la cantidad de <span class="label label-extra">Turnos</span> para reclutar.');
        $building->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $building->setImage('bundles/archmagegame/images/building/barrack.jpg');
        $building->setGoldCost(0);
        $building->setPeopleCost(500);
        $building->setManaCost(0);
        $building->setGoldMaintenance(3);
        $building->setPeopleMaintenance(2);
        $building->setManaMaintenance(1);
        $building->setGoldResource(0);
        $building->setPeopleResource(0);
        $building->setManaResource(0);
        $building->setGoldCap(0);
        $building->setPeopleCap(10);
        $building->setManaCap(0);
        $building->setBuildingRatio(20);
        $building->setResearchRatio(0);
        $building->setMagicDefenseRatio(0);
        $building->setArmyDefenseRatio(0);
        $building->setPower(1000);
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