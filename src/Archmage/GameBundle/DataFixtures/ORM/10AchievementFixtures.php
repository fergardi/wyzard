<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Achievement;

class AchievementFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $achievement = new Achievement();
        $achievement->setName('Acomodado');
        $achievement->setDescription('Atesora más de 1000 de Oro');
        $achievement->setGold(1000);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Adicto');
        $achievement->setDescription('Almacena más de 1000 de Maná');
        $achievement->setGold(null);
        $achievement->setMana(1000);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Popular');
        $achievement->setDescription('Refugia más de 1000 Personas');
        $achievement->setGold(null);
        $achievement->setMana(null);
        $achievement->setPeople(1000);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Conquistador');
        $achievement->setDescription('Controla más de 999 Tierras');
        $achievement->setGold(null);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(999);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Coleccionista');
        $achievement->setDescription('Encuentra más de 5 Artefactos');
        $achievement->setGold(null);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(5);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Aventurero');
        $achievement->setDescription('Contrata más de 2 Héroes');
        $achievement->setGold(null);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(2);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Erudito');
        $achievement->setDescription('Investiga más de 2 Hechizos');
        $achievement->setGold(null);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(2);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Poderoso');
        $achievement->setDescription('Concentra más de 10000 Poder');
        $achievement->setGold(null);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(10000);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Mariscal');
        $achievement->setDescription('Comanda más de 5000 Unidades');
        $achievement->setGold(null);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(5000);
        $achievement->setDefense(null);
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Seguro');
        $achievement->setDescription('Acumula más de 50% Defensa Mágica');
        $achievement->setGold(1000);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(20);
        $manager->persist($achievement);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 10; // the order in which fixtures will be loaded
    }
}