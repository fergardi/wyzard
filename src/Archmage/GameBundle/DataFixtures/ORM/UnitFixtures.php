<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Unit;

class UnitFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /*
         * NEUTRAL
         */

        //ARQUEROS
        $unit = new Unit();
        $unit->setName('Arqueros');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/neutral/archer.jpg');
        $unit->setFaction($this->getReference('Neutral'));
        $unit->setFamily($this->getReference('Humano'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //CABALLEROS
        $unit = new Unit();
        $unit->setName('Caballeros');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/neutral/horseman.jpg');
        $unit->setFaction($this->getReference('Neutral'));
        $unit->setFamily($this->getReference('Humano'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //PIQUEROS
        $unit = new Unit();
        $unit->setName('Piqueros');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/neutral/pikeman.jpg');
        $unit->setFaction($this->getReference('Neutral'));
        $unit->setFamily($this->getReference('Humano'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //MILICIA
        $unit = new Unit();
        $unit->setName('Milicias');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/neutral/militia.jpg');
        $unit->setFaction($this->getReference('Neutral'));
        $unit->setFamily($this->getReference('Humano'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //CATAPULTAS
        $unit = new Unit();
        $unit->setName('Catapultas');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/neutral/catapult.jpg');
        $unit->setFaction($this->getReference('Neutral'));
        $unit->setFamily($this->getReference('Humano'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        /*
         * OSCURIDAD
         */

        //ESQUELETOS
        $unit = new Unit();
        $unit->setName('Esqueletos');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/skeleton.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuerto'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ZOMBIS
        $unit = new Unit();
        $unit->setName('Zombis');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/zombie.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuerto'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //HOMBRES LOBO
        $unit = new Unit();
        $unit->setName('Hombres Lobo');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/werewolf.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('Bestia'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ESPECTROS
        $unit = new Unit();
        $unit->setName('Espectros');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/spectre.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuerto'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //LICHES
        $unit = new Unit();
        $unit->setName('Liches');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/lich.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuerto'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //VAMPIROS
        $unit = new Unit();
        $unit->setName('Vampiros');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/vampire.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuerto'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //CABALLEROS NEGROS
        $unit = new Unit();
        $unit->setName('Caballeros Negros');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/darkknight.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuerto'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELEMENTALES DE SOMBRA
        $unit = new Unit();
        $unit->setName('Elementales de Sombra');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/shadowelemental.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('Elemental'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //GARGOLAS
        $unit = new Unit();
        $unit->setName('Gárgolas');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/gargoile.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuerto'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRAGONES NEGROS
        $unit = new Unit();
        $unit->setName('Dragones Negros');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/blackdragon.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('Dragón'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        /*
         * NATURALEZA
         */

        //GORILAS
        $unit = new Unit();
        $unit->setName('Gorilas');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/nature/gorilla.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Bestia'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELFOS
        $unit = new Unit();
        $unit->setName('Elfos');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/nature/elf.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Elfo'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRUIDAS
        $unit = new Unit();
        $unit->setName('Druidas');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/nature/druid.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Elfo'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //TROLLS
        $unit = new Unit();
        $unit->setName('Trolls');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/nature/troll.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Bestia'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ENTS
        $unit = new Unit();
        $unit->setName('Ents');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/nature/treant.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Elemental'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //BEHEMOTHS
        $unit = new Unit();
        $unit->setName('Behemoths');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/nature/behemot.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Bestia'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //SIERPES COLOSALES
        $unit = new Unit();
        $unit->setName('Sierpes Colosales');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/nature/wurm.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Bestia'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELEMENTALES DE TIERRA
        $unit = new Unit();
        $unit->setName('Elementales de Tierra');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/nature/earthelemental.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Elemental'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //HIDRAS
        $unit = new Unit();
        $unit->setName('Hidras');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/nature/hydra.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Bestia'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRAGONES VERDES
        $unit = new Unit();
        $unit->setName('Dragones Verdes');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/nature/greendragon.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Dragón'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        /*
         * FANTASMAL
         */

        //HADAS
        $unit = new Unit();
        $unit->setName('Hadas');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/fairy.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Humano'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //TRITONES
        $unit = new Unit();
        $unit->setName('Tritones');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/triton.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Marino'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //SIRENAS
        $unit = new Unit();
        $unit->setName('Sirenas');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/mermaid.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Marino'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //NAGAS
        $unit = new Unit();
        $unit->setName('Nagas');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/naga.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Demonio'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //MAGOS
        $unit = new Unit();
        $unit->setName('Magos');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/magician.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Humano'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DJINNIS
        $unit = new Unit();
        $unit->setName('Djinnis');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/djinn.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Elemental'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELEMENTALES DE AGUA
        $unit = new Unit();
        $unit->setName('Elementales de Agua');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/waterelemental.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Elemental'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //TITANES
        $unit = new Unit();
        $unit->setName('Titanes');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/titan.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Elemental'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //LEVIATANES
        $unit = new Unit();
        $unit->setName('Leviatanes');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/levyathan.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Marino'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRAGONES AZULES
        $unit = new Unit();
        $unit->setName('Dragones Azules');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/bluedragon.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Dragón'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        /*
         * SAGRADO
         */

        //MONJES
        $unit = new Unit();
        $unit->setName('Monjes');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/holy/priest.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Humano'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //PALADINES
        $unit = new Unit();
        $unit->setName('Paladines');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/holy/paladin.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Humano'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //UNICORNIOS
        $unit = new Unit();
        $unit->setName('Unicornios');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/holy/unicorn.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Bestia'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //PEGASOS
        $unit = new Unit();
        $unit->setName('Pegasos');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/holy/pegasus.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Bestia'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ANGELES
        $unit = new Unit();
        $unit->setName('Ángeles');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/holy/angel.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Celestial'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //GRIFOS
        $unit = new Unit();
        $unit->setName('Grifos');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/holy/griffon.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Bestia'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELEMENTALES DE AIRE
        $unit = new Unit();
        $unit->setName('Elementales de Aire');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/holy/airelemental.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Elemental'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ARCANGELES
        $unit = new Unit();
        $unit->setName('Arcángeles');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/holy/archangel.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Celestial'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DOMINIONS
        $unit = new Unit();
        $unit->setName('Dominions');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/holy/dominion.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Celestial'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRAGONES BLANCOS
        $unit = new Unit();
        $unit->setName('Dragones Blancos');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/holy/whitedragon.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Dragón'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        /*
         * DESTRUCCION
         */

        //GOBLINS
        $unit = new Unit();
        $unit->setName('Goblins');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/doom/goblin.jpg');
        $unit->setFaction($this->getReference('Destrucción'));
        $unit->setFamily($this->getReference('Bestia'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //CERBEROS
        $unit = new Unit();
        $unit->setName('Cerberos');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/doom/cerverus.jpg');
        $unit->setFaction($this->getReference('Destrucción'));
        $unit->setFamily($this->getReference('Demonio'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //OGROS
        $unit = new Unit();
        $unit->setName('Ogros');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/doom/ogre.jpg');
        $unit->setFaction($this->getReference('Destrucción'));
        $unit->setFamily($this->getReference('Demonio'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //QUIMERAS
        $unit = new Unit();
        $unit->setName('Quimeras');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/doom/chimera.jpg');
        $unit->setFaction($this->getReference('Destrucción'));
        $unit->setFamily($this->getReference('Bestia'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //MINOTAUROS
        $unit = new Unit();
        $unit->setName('Minotauros');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/doom/minotaur.jpg');
        $unit->setFaction($this->getReference('Destrucción'));
        $unit->setFamily($this->getReference('Bestia'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //SALAMANDRAS
        $unit = new Unit();
        $unit->setName('Salamandras');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/doom/salamander.jpg');
        $unit->setFaction($this->getReference('Destrucción'));
        $unit->setFamily($this->getReference('Demonio'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELEMENTAL DE LAVA
        $unit = new Unit();
        $unit->setName('Elementales de Lava');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/doom/fireelemental.jpg');
        $unit->setFaction($this->getReference('Destrucción'));
        $unit->setFamily($this->getReference('Elemental'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DEMONIOS
        $unit = new Unit();
        $unit->setName('Demonios');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/doom/demon.jpg');
        $unit->setFaction($this->getReference('Destrucción'));
        $unit->setFamily($this->getReference('Demonio'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //FENIX
        $unit = new Unit();
        $unit->setName('Fénix');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/doom/phoenix.jpg');
        $unit->setFaction($this->getReference('Destrucción'));
        $unit->setFamily($this->getReference('Bestia'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRAGON ROJO
        $unit = new Unit();
        $unit->setName('Dragones Rojos');
        $unit->setDescription('Descripción');
        $unit->setAttack(0);
        $unit->setDefense(0);
        $unit->setSpeed(0);
        $unit->setImage('bundles/archmagegame/images/unit/doom/reddragon.jpg');
        $unit->setFaction($this->getReference('Destrucción'));
        $unit->setFamily($this->getReference('Dragón'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(null);
        $unit->setGoldRecruit(null);
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}