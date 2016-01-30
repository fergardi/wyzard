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
        $building->setLore('Antes, todo esto era campo.');
        $building->setImage('bundles/archmagegame/images/building/land.png');
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
        $building->setSummonRatio(0);
        $building->setProductionRatio(0);
        $building->setMaintenanceRatio(0);
        $building->setPower(1000);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //GRANJAS
        $building = new Building();
        $building->setName('Granjas');
        $building->setDescription('Otorgan gran cantidad de <span class="label label-extra">Oro</span>.');
        $building->setLore('La leche fresca se vende bien.');
        $building->setImage('bundles/archmagegame/images/building/farm.png');
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
        $building->setSummonRatio(0);
        $building->setProductionRatio(0);
        $building->setMaintenanceRatio(0);
        $building->setPower(1500);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //PUEBLOS
        $building = new Building();
        $building->setName('Pueblos');
        $building->setDescription('Otorgan e incrementan <span class="label label-extra">Población</span> máxima.');
        $building->setLore('Todo el mundo debería tener un hogar.');
        $building->setImage('bundles/archmagegame/images/building/village.png');
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
        $building->setSummonRatio(0);
        $building->setProductionRatio(0);
        $building->setMaintenanceRatio(0);
        $building->setPower(1500);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //NODOS
        $building = new Building();
        $building->setName('Nodos');
        $building->setDescription('Otorgan e incrementan <span class="label label-extra">Maná</span> máximo.');
        $building->setLore('Es como una piscina municipal. Pero de magia.');
        $building->setImage('bundles/archmagegame/images/building/node.png');
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
        $building->setSummonRatio(0);
        $building->setProductionRatio(0);
        $building->setMaintenanceRatio(0);
        $building->setPower(1500);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //BARRERAS
        $building = new Building();
        $building->setName('Barreras');
        $building->setDescription('Aumentan la <span class="label label-extra">Defensa Mágica</span> de tu reino.');
        $building->setLore('Caras pero efectivas, al menos contra la magia.');
        $building->setImage('bundles/archmagegame/images/building/barrier.png');
        $building->setGoldCost(5000);
        $building->setPeopleCost(100);
        $building->setManaCost(2500);
        $building->setGoldMaintenance(60);
        $building->setPeopleMaintenance(40);
        $building->setManaMaintenance(20);
        $building->setGoldResource(0);
        $building->setPeopleResource(0);
        $building->setManaResource(0);
        $building->setGoldCap(0);
        $building->setPeopleCap(0);
        $building->setManaCap(0);
        $building->setBuildingRatio(200);
        $building->setResearchRatio(0);
        $building->setMagicDefenseRatio(5);
        $building->setArmyDefenseRatio(0);
        $building->setSummonRatio(0);
        $building->setProductionRatio(0);
        $building->setMaintenanceRatio(0);
        $building->setPower(2500);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //FORTALEZAS
        $building = new Building();
        $building->setName('Fortalezas');
        $building->setDescription('Aumentan la <span class="label label-extra">Defensa Física</span> de tu reino.');
        $building->setLore('Caras pero efectivas, al menos contra los ataques.');
        $building->setImage('bundles/archmagegame/images/building/fortress.png');
        $building->setGoldCost(5000);
        $building->setPeopleCost(2500);
        $building->setManaCost(100);
        $building->setGoldMaintenance(60);
        $building->setPeopleMaintenance(40);
        $building->setManaMaintenance(20);
        $building->setGoldResource(0);
        $building->setPeopleResource(0);
        $building->setManaResource(0);
        $building->setGoldCap(0);
        $building->setPeopleCap(0);
        $building->setManaCap(0);
        $building->setBuildingRatio(200);
        $building->setResearchRatio(0);
        $building->setMagicDefenseRatio(0);
        $building->setArmyDefenseRatio(5);
        $building->setSummonRatio(0);
        $building->setProductionRatio(0);
        $building->setMaintenanceRatio(0);
        $building->setPower(2500);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //TALLERES
        $building = new Building();
        $building->setName('Talleres');
        $building->setDescription('Reducen la cantidad de <span class="label label-extra">Turnos</span> para construir.');
        $building->setLore('Alguien tiene que poner la mano de obra.');
        $building->setImage('bundles/archmagegame/images/building/workshop.png');
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
        $building->setSummonRatio(0);
        $building->setProductionRatio(0);
        $building->setMaintenanceRatio(0);
        $building->setPower(500);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //GREMIOS
        $building = new Building();
        $building->setName('Gremios');
        $building->setDescription('Reducen la cantidad de <span class="label label-extra">Turnos</span> para investigar.');
        $building->setLore('Donde nace la magia. O al menos, donde se investiga.');
        $building->setImage('bundles/archmagegame/images/building/guild.png');
        $building->setGoldCost(1000);
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
        $building->setSummonRatio(0);
        $building->setProductionRatio(0);
        $building->setMaintenanceRatio(0);
        $building->setPower(500);
        $this->addReference($building->getName(), $building);
        $manager->persist($building);

        //BARRACONES
        $building = new Building();
        $building->setName('Barracones');
        $building->setDescription('Aumentan la cantidad de <span class="label label-extra">Tropas</span> invocadas.');
        $building->setLore('Unas instalaciones cómodas favorecen el reclutamiento de tropas...');
        $building->setImage('bundles/archmagegame/images/building/barrack.png');
        $building->setGoldCost(1000);
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
        $building->setSummonRatio(10);
        $building->setProductionRatio(0);
        $building->setMaintenanceRatio(0);
        $building->setPower(500);
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