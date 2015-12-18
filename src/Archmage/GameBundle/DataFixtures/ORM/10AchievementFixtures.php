<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Achievement;

class AchievementFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $achievement = new Achievement();
        $achievement->setName('Acomodado');
        $achievement->setGold(100000000);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $achievement->setDescription('Atesora '.$this->container->get('service.controller')->nff($achievement->getGold()).' de Oro');
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Adicto');
        $achievement->setGold(null);
        $achievement->setMana(2000000);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $achievement->setDescription('Almacena '.$this->container->get('service.controller')->nff($achievement->getMana()).' de Maná');
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Popular');
        $achievement->setGold(null);
        $achievement->setMana(null);
        $achievement->setPeople(2000000);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $achievement->setDescription('Refugia '.$this->container->get('service.controller')->nff($achievement->getPeople()).' Personas');
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Conquistador');
        $achievement->setGold(null);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(6000);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $achievement->setDescription('Controla '.$this->container->get('service.controller')->nff($achievement->getLands()).' Tierras');
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Coleccionista');
        $achievement->setGold(null);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(100);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $achievement->setDescription('Encuentra '.$this->container->get('service.controller')->nff($achievement->getArtifacts()).' Artefactos');
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Aventurero');
        $achievement->setGold(null);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(5);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $achievement->setDescription('Contrata '.$this->container->get('service.controller')->nff($achievement->getHeroes()).' Héroes');
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Erudito');
        $achievement->setGold(null);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(30);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $achievement->setDescription('Investiga '.$this->container->get('service.controller')->nff($achievement->getSpells()).' Hechizos');
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Poderoso');
        $achievement->setGold(null);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(20000000);
        $achievement->setUnits(null);
        $achievement->setDefense(null);
        $achievement->setDescription('Concentra '.$this->container->get('service.controller')->nff($achievement->getPower()).' Poder');
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Líder');
        $achievement->setGold(null);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(100000);
        $achievement->setDefense(null);
        $achievement->setDescription('Comanda '.$this->container->get('service.controller')->nff($achievement->getUnits()).' Unidades');
        $manager->persist($achievement);

        $achievement = new Achievement();
        $achievement->setName('Protegido');
        $achievement->setGold(null);
        $achievement->setMana(null);
        $achievement->setPeople(null);
        $achievement->setLands(null);
        $achievement->setArtifacts(null);
        $achievement->setHeroes(null);
        $achievement->setSpells(null);
        $achievement->setPower(null);
        $achievement->setUnits(null);
        $achievement->setDefense(75);
        $achievement->setDescription('Acumula '.$this->container->get('service.controller')->nff($achievement->getDefense()).'% Defensa');
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