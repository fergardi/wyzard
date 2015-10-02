<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

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
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(8);
        $unit->setDefense(2);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/neutral/archer.jpg');
        $unit->setFaction($this->getReference('Neutral'));
        $unit->setFamily($this->getReference('Humanos'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(2500);
        $unit->setRarity(0);
        $unit->setGoldRecruit(1000);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //CABALLEROS
        $unit = new Unit();
        $unit->setName('Caballeros');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(5);
        $unit->setDefense(5);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/neutral/horseman.jpg');
        $unit->setFaction($this->getReference('Neutral'));
        $unit->setFamily($this->getReference('Humanos'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(2000);
        $unit->setRarity(0);
        $unit->setGoldRecruit(1000);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //PIQUEROS
        $unit = new Unit();
        $unit->setName('Piqueros');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(3);
        $unit->setDefense(7);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/neutral/pikeman.jpg');
        $unit->setFaction($this->getReference('Neutral'));
        $unit->setFamily($this->getReference('Humanos'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(5000);
        $unit->setRarity(0);
        $unit->setGoldRecruit(1000);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //MILICIA
        $unit = new Unit();
        $unit->setName('Milicias');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(6);
        $unit->setDefense(4);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/neutral/militia.jpg');
        $unit->setFaction($this->getReference('Neutral'));
        $unit->setFamily($this->getReference('Humanos'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(3335);
        $unit->setRarity(0);
        $unit->setGoldRecruit(1000);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //CATAPULTAS
        $unit = new Unit();
        $unit->setName('Catapultas');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(9);
        $unit->setDefense(1);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/neutral/catapult.jpg');
        $unit->setFaction($this->getReference('Neutral'));
        $unit->setFamily($this->getReference('Humanos'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(10000);
        $unit->setRarity(0);
        $unit->setGoldRecruit(1000);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        /*
         * OSCURIDAD
         */

        //ESQUELETOS
        $unit = new Unit();
        $unit->setName('Esqueletos');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(7);
        $unit->setDefense(3);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/skeleton.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuertos'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(10000);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ZOMBIS
        $unit = new Unit();
        $unit->setName('Zombis');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(8);
        $unit->setDefense(5);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/zombie.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuertos'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setPeopleMaintenance(1);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(3850);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ESPECTROS
        $unit = new Unit();
        $unit->setName('Espectros');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(50);
        $unit->setDefense(30);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/spectre.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuertos'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(6);
        $unit->setManaMaintenance(3);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(834);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //HOMBRES LOBO
        $unit = new Unit();
        $unit->setName('Hombres Lobo');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(75);
        $unit->setDefense(15);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/werewolf.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(2);
        $unit->setPeopleMaintenance(4);
        $unit->setManaMaintenance(4);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(445);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //LICHES
        $unit = new Unit();
        $unit->setName('Liches');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(300);
        $unit->setDefense(700);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/lich.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuertos'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(10);
        $unit->setPeopleMaintenance(30);
        $unit->setManaMaintenance(60);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(75);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //VAMPIROS
        $unit = new Unit();
        $unit->setName('Vampiros');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(500);
        $unit->setDefense(900);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/vampire.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuertos'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(30);
        $unit->setPeopleMaintenance(40);
        $unit->setManaMaintenance(30);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(108);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //CABALLEROS NEGROS
        $unit = new Unit();
        $unit->setName('Caballeros Negros');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(5500);
        $unit->setDefense(4500);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/darkknight.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuertos'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(350);
        $unit->setPeopleMaintenance(550);
        $unit->setManaMaintenance(100);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(8);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELEMENTALES DE SOMBRA
        $unit = new Unit();
        $unit->setName('Elementales de Sombra');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(6000);
        $unit->setDefense(2500);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/shadowelemental.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(200);
        $unit->setPeopleMaintenance(500);
        $unit->setManaMaintenance(300);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(12);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //GARGOLAS
        $unit = new Unit();
        $unit->setName('Gárgolas');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(62500);
        $unit->setDefense(21000);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/gargoile.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuertos'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(4000);
        $unit->setPeopleMaintenance(4500);
        $unit->setManaMaintenance(1500);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(2);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRAGONES NEGROS
        $unit = new Unit();
        $unit->setName('Dragones Negros');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(90000);
        $unit->setDefense(10000);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/blackdragon.jpg');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('Dragones'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(5000);
        $unit->setPeopleMaintenance(3000);
        $unit->setManaMaintenance(2000);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(5);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        /*
         * NATURALEZA
         */

        //GORILAS
        $unit = new Unit();
        $unit->setName('Gorilas');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(5);
        $unit->setDefense(5);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/nature/gorilla.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(1);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(2000);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELFOS
        $unit = new Unit();
        $unit->setName('Elfos');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(4);
        $unit->setDefense(7);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/nature/elf.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Humanos'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(1);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(1820);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRUIDAS
        $unit = new Unit();
        $unit->setName('Druidas');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(60);
        $unit->setDefense(55);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/nature/druid.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Humanos'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(2);
        $unit->setPeopleMaintenance(1);
        $unit->setManaMaintenance(7);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(435);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ENTS
        $unit = new Unit();
        $unit->setName('Ents');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(85);
        $unit->setDefense(35);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/nature/treant.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(5);
        $unit->setPeopleMaintenance(2);
        $unit->setManaMaintenance(3);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(1670);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //TROLLS
        $unit = new Unit();
        $unit->setName('Trolls');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(700);
        $unit->setDefense(600);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/nature/troll.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(35);
        $unit->setPeopleMaintenance(55);
        $unit->setManaMaintenance(10);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(77);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //BEHEMOTHS
        $unit = new Unit();
        $unit->setName('Behemoths');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(900);
        $unit->setDefense(400);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/nature/behemot.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(25);
        $unit->setPeopleMaintenance(15);
        $unit->setManaMaintenance(60);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(58);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //SIERPES COLOSALES
        $unit = new Unit();
        $unit->setName('Sierpes Colosales');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(9500);
        $unit->setDefense(1500);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/nature/wurm.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(300);
        $unit->setPeopleMaintenance(250);
        $unit->setManaMaintenance(450);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(12);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELEMENTALES DE TIERRA
        $unit = new Unit();
        $unit->setName('Elementales de Tierra');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(2000);
        $unit->setDefense(8000);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/nature/earthelemental.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(350);
        $unit->setPeopleMaintenance(100);
        $unit->setManaMaintenance(550);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(20);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //HIDRAS
        $unit = new Unit();
        $unit->setName('Hidras');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(53000);
        $unit->setDefense(72000);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/nature/hydra.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(6000);
        $unit->setPeopleMaintenance(2000);
        $unit->setManaMaintenance(2000);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(2);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRAGONES VERDES
        $unit = new Unit();
        $unit->setName('Dragones Verdes');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(58500);
        $unit->setDefense(41500);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/nature/greendragon.jpg');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Dragones'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(6000);
        $unit->setPeopleMaintenance(1000);
        $unit->setManaMaintenance(3000);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(5);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        /*
         * FANTASMAL
         */

        //RANAS
        $unit = new Unit();
        $unit->setName('Ranas');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(1);
        $unit->setDefense(1);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/frog.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(1);
        $unit->setManaMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(25000);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //TRITONES
        $unit = new Unit();
        $unit->setName('Tritones');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(4);
        $unit->setDefense(5);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/triton.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(3750);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //SIRENAS
        $unit = new Unit();
        $unit->setName('Sirenas');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(4);
        $unit->setDefense(2);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/mermaid.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(1);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(3350);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //NAGAS
        $unit = new Unit();
        $unit->setName('Nagas');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(30);
        $unit->setDefense(20);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/naga.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Demonios'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(3);
        $unit->setPeopleMaintenance(2);
        $unit->setManaMaintenance(5);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(1000);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //MAGOS
        $unit = new Unit();
        $unit->setName('Magos');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(45);
        $unit->setDefense(40);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/magician.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Humanos'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(3);
        $unit->setPeopleMaintenance(1);
        $unit->setManaMaintenance(6);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(785);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //HADAS
        $unit = new Unit();
        $unit->setName('Hadas');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(550);
        $unit->setDefense(450);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/fairy.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(30);
        $unit->setPeopleMaintenance(30);
        $unit->setManaMaintenance(40);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(75);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DJINNIS
        $unit = new Unit();
        $unit->setName('Djinnis');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(300);
        $unit->setDefense(700);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/djinn.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(40);
        $unit->setPeopleMaintenance(30);
        $unit->setManaMaintenance(30);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(75);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //TITANES
        $unit = new Unit();
        $unit->setName('Titanes');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(6500);
        $unit->setDefense(3500);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/titan.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(600);
        $unit->setPeopleMaintenance(200);
        $unit->setManaMaintenance(200);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(20);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELEMENTALES DE AGUA
        $unit = new Unit();
        $unit->setName('Elementales de Agua');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(2500);
        $unit->setDefense(4250);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/waterelemental.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(400);
        $unit->setPeopleMaintenance(150);
        $unit->setManaMaintenance(450);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(12);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //LEVIATANES
        $unit = new Unit();
        $unit->setName('Leviatanes');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(75500);
        $unit->setDefense(91500);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/levyathan.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(6000);
        $unit->setPeopleMaintenance(1500);
        $unit->setManaMaintenance(2500);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(3);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRAGONES AZULES
        $unit = new Unit();
        $unit->setName('Dragones Azules');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(50000);
        $unit->setDefense(50000);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/bluedragon.jpg');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Dragones'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(5000);
        $unit->setPeopleMaintenance(2500);
        $unit->setManaMaintenance(2500);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(5);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        /*
         * SAGRADO
         */

        //MONJES
        $unit = new Unit();
        $unit->setName('Monjes');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(5);
        $unit->setDefense(7);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/holy/priest.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Humanos'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(3575);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //PALADINES
        $unit = new Unit();
        $unit->setName('Paladines');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(6);
        $unit->setDefense(8);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/holy/paladin.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Humanos'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(4170);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //UNICORNIOS
        $unit = new Unit();
        $unit->setName('Unicornios');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(60);
        $unit->setDefense(70);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/holy/unicorn.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(5);
        $unit->setPeopleMaintenance(2);
        $unit->setManaMaintenance(3);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(515);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //PEGASOS
        $unit = new Unit();
        $unit->setName('Pegasos');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(80);
        $unit->setDefense(50);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/holy/pegasus.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(3);
        $unit->setManaMaintenance(6);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(515);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ANGELES
        $unit = new Unit();
        $unit->setName('Ángeles');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(500);
        $unit->setDefense(900);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/holy/angel.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Celestiales'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(60);
        $unit->setPeopleMaintenance(10);
        $unit->setManaMaintenance(30);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(54);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //GRIFOS
        $unit = new Unit();
        $unit->setName('Grifos');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(750);
        $unit->setDefense(500);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/holy/griffon.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(50);
        $unit->setPeopleMaintenance(30);
        $unit->setManaMaintenance(20);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(60);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ARCANGELES
        $unit = new Unit();
        $unit->setName('Arcángeles');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(3500);
        $unit->setDefense(6500);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/holy/archangel.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Celestiales'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(700);
        $unit->setPeopleMaintenance(100);
        $unit->setManaMaintenance(200);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(8);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELEMENTALES DE AIRE
        $unit = new Unit();
        $unit->setName('Elementales de Aire');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(5000);
        $unit->setDefense(1750);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/holy/airelemental.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(400);
        $unit->setPeopleMaintenance(100);
        $unit->setManaMaintenance(500);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(12);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DOMINIONS
        $unit = new Unit();
        $unit->setName('Dominions');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(80000);
        $unit->setDefense(87000);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/holy/dominion.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Celestiales'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(9000);
        $unit->setPeopleMaintenance(500);
        $unit->setManaMaintenance(500);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(3);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRAGONES BLANCOS
        $unit = new Unit();
        $unit->setName('Dragones Blancos');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(25000);
        $unit->setDefense(75000);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/holy/whitedragon.jpg');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Dragones'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(7500);
        $unit->setPeopleMaintenance(1500);
        $unit->setManaMaintenance(1000);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(5);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        /*
         * DESTRUCCION
         */

        //GOBLINS
        $unit = new Unit();
        $unit->setName('Goblins');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(9);
        $unit->setDefense(4);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/doom/goblin.jpg');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(0);
        $unit->setPeopleMaintenance(1);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(1540);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //CERBEROS
        $unit = new Unit();
        $unit->setName('Cerberos');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(9);
        $unit->setDefense(7);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/doom/cerverus.jpg');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Demonios'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(3130);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //MINOTAUROS
        $unit = new Unit();
        $unit->setName('Minotauros');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(60);
        $unit->setDefense(40);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/doom/minotaur.jpg');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(4);
        $unit->setPeopleMaintenance(3);
        $unit->setManaMaintenance(3);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(400);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //OGROS
        $unit = new Unit();
        $unit->setName('Ogros');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(70);
        $unit->setDefense(15);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/doom/ogre.jpg');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Demonios'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(3);
        $unit->setPeopleMaintenance(6);
        $unit->setManaMaintenance(1);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(785);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //QUIMERAS
        $unit = new Unit();
        $unit->setName('Quimeras');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(800);
        $unit->setDefense(450);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/doom/chimera.jpg');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(50);
        $unit->setPeopleMaintenance(30);
        $unit->setManaMaintenance(20);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(120);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //SALAMANDRAS
        $unit = new Unit();
        $unit->setName('Salamandras');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(575);
        $unit->setDefense(275);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/doom/salamander.jpg');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Demonios'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(40);
        $unit->setPeopleMaintenance(20);
        $unit->setManaMaintenance(40);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(120);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DIABLOS
        $unit = new Unit();
        $unit->setName('Diablos');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(6500);
        $unit->setDefense(1750);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/doom/diablo.jpg');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Demonios'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(200);
        $unit->setPeopleMaintenance(550);
        $unit->setManaMaintenance(250);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(12);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELEMENTAL DE LAVA
        $unit = new Unit();
        $unit->setName('Elementales de Lava');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(7000);
        $unit->setDefense(1250);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/doom/fireelemental.jpg');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(150);
        $unit->setPeopleMaintenance(350);
        $unit->setManaMaintenance(500);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(48);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //FENIX
        $unit = new Unit();
        $unit->setName('Fénix');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(40000);
        $unit->setDefense(85000);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/doom/phoenix.jpg');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(2500);
        $unit->setPeopleMaintenance(2500);
        $unit->setManaMaintenance(5000);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(1);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRAGON ROJO
        $unit = new Unit();
        $unit->setName('Dragones Rojos');
        $unit->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $unit->setAttack(80000);
        $unit->setDefense(20000);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/doom/reddragon.jpg');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Dragones'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(2500);
        $unit->setPeopleMaintenance(4000);
        $unit->setManaMaintenance(3500);
        $unit->setGoldAuction(0);
        $unit->setQuantityAuction(5);
        $unit->setRarity(0);
        $unit->setGoldRecruit(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
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