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
         * OSCURIDAD
         */

        //ESQUELETOS
        $unit = new Unit();
        $unit->setName('Esqueletos');
        $unit->setLore('Sacos de huesos sin alma, pero perfectos como soldados rasos.');
        $unit->setAttack(7);
        $unit->setDefense(3);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/skeleton.png');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuertos'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(10000);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ZOMBIS
        $unit = new Unit();
        $unit->setName('Zombis');
        $unit->setLore('Los esqueletos al menos tienen cerebro. Éstos idiotas no.');
        $unit->setAttack(8);
        $unit->setDefense(5);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/zombie.png');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuertos'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setPeopleMaintenance(1);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(3850);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ESPECTROS
        $unit = new Unit();
        $unit->setName('Espectros');
        $unit->setLore('Almas atrapadas sin descanso. Pueden servir para aterrorizar a los enemigos.');
        $unit->setAttack(50);
        $unit->setDefense(30);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/spectre.png');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuertos'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(6);
        $unit->setManaMaintenance(3);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(834);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //HOMBRES LOBO
        $unit = new Unit();
        $unit->setName('Hombres Lobo');
        $unit->setLore('Son muy rápidos y están hambrientos, aunque huelen a perro mojado.');
        $unit->setAttack(75);
        $unit->setDefense(15);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/werewolf.png');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(2);
        $unit->setPeopleMaintenance(4);
        $unit->setManaMaintenance(4);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(445);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //LICHES
        $unit = new Unit();
        $unit->setName('Liches');
        $unit->setLore('Nada como unos expertos en nigromancia para animar a las tropas.');
        $unit->setAttack(300);
        $unit->setDefense(700);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/lich.png');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuertos'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(10);
        $unit->setPeopleMaintenance(30);
        $unit->setManaMaintenance(60);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(75);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //VAMPIROS
        $unit = new Unit();
        $unit->setName('Vampiros');
        $unit->setLore('Su sed infinita los hace temibles, y sus alas baten rápidas antes de moderte.');
        $unit->setAttack(500);
        $unit->setDefense(900);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/vampire.png');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuertos'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(30);
        $unit->setPeopleMaintenance(40);
        $unit->setManaMaintenance(30);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(108);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //CABALLEROS NEGROS
        $unit = new Unit();
        $unit->setName('Caballeros Negros');
        $unit->setLore('Ninguna víctima pued escapar de estos caballeros y sus oscuros corceles.');
        $unit->setAttack(5500);
        $unit->setDefense(4500);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/darkknight.png');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuertos'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(350);
        $unit->setPeopleMaintenance(550);
        $unit->setManaMaintenance(100);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(8);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELEMENTALES DE SOMBRA
        $unit = new Unit();
        $unit->setName('Elementales de Sombra');
        $unit->setLore('Cuando la magia atrapa a la oscuridad, nacen los elementales de sombra.');
        $unit->setAttack(6000);
        $unit->setDefense(2500);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/shadowelemental.png');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(200);
        $unit->setPeopleMaintenance(500);
        $unit->setManaMaintenance(300);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(12);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //GARGOLAS
        $unit = new Unit();
        $unit->setName('Gárgolas');
        $unit->setLore('Su piel de piedra puede resultar imposible de traspasar.');
        $unit->setAttack(21000);
        $unit->setDefense(62500);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/gargoyle.png');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('NoMuertos'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(5000);
        $unit->setPeopleMaintenance(2500);
        $unit->setManaMaintenance(2500);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(2);
        $unit->setRarity(90);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRAGONES NEGROS
        $unit = new Unit();
        $unit->setName('Dragones Negros');
        $unit->setLore('Se alimentan de personas y desesperación, y su apetito no conoce límites.');
        $unit->setAttack(75000);
        $unit->setDefense(25000);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/darkness/blackdragon.png');
        $unit->setFaction($this->getReference('Oscuridad'));
        $unit->setFamily($this->getReference('Dragones'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(6500);
        $unit->setPeopleMaintenance(2000);
        $unit->setManaMaintenance(1500);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(5);
        $unit->setRarity(90);
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
        $unit->setLore('Son muy agresivos, pero te servirán bien si les pagas en comida.');
        $unit->setAttack(5);
        $unit->setDefense(5);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/nature/gorilla.png');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(1);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(2000);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELFOS
        $unit = new Unit();
        $unit->setName('Elfos');
        $unit->setLore('Huidizos y desconfiados, los elfos de los bosques siempre defienden sus fronteras.');
        $unit->setAttack(4);
        $unit->setDefense(7);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/nature/elf.png');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Humanos'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(1);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(1820);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRUIDAS
        $unit = new Unit();
        $unit->setName('Druidas');
        $unit->setLore('Conocedores de secretos ancestrales, siempre encuentran la manera de proteger al bosque.');
        $unit->setAttack(60);
        $unit->setDefense(55);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/nature/druid.png');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Humanos'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(2);
        $unit->setPeopleMaintenance(1);
        $unit->setManaMaintenance(7);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(435);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ENTS
        $unit = new Unit();
        $unit->setName('Ents');
        $unit->setLore('Árboles andantes, estas criaturas de dura corteza no dudarán en descargar su furia.');
        $unit->setAttack(85);
        $unit->setDefense(35);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/nature/treant.png');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(5);
        $unit->setPeopleMaintenance(2);
        $unit->setManaMaintenance(3);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(1670);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //TROLLS
        $unit = new Unit();
        $unit->setName('Trolls');
        $unit->setLore('Criaturas simples y estúpidas, pero podrían matarte con un solo golpe de su maza.');
        $unit->setAttack(700);
        $unit->setDefense(600);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/nature/troll.png');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(35);
        $unit->setPeopleMaintenance(55);
        $unit->setManaMaintenance(10);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(77);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //BEHEMOTHS
        $unit = new Unit();
        $unit->setName('Behemoths');
        $unit->setLore('Los terrores de los bosques. Si ves uno, huye, aunque corre más que tú.');
        $unit->setAttack(900);
        $unit->setDefense(400);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/nature/behemoth.png');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(25);
        $unit->setPeopleMaintenance(15);
        $unit->setManaMaintenance(60);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(58);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //SIERPES COLOSALES
        $unit = new Unit();
        $unit->setName('Sierpes Colosales');
        $unit->setLore('Incluso siendo enormes, son sigilosas, y solo las oirás cuando estén a punto de comerte.');
        $unit->setAttack(9500);
        $unit->setDefense(1500);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/nature/wurm.png');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(300);
        $unit->setPeopleMaintenance(250);
        $unit->setManaMaintenance(450);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(12);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELEMENTALES DE TIERRA
        $unit = new Unit();
        $unit->setName('Elementales de Tierra');
        $unit->setLore('Cuando magia toca la piedra, nacen los elementales de tierra.');
        $unit->setAttack(2000);
        $unit->setDefense(8000);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/nature/earthelemental.png');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(350);
        $unit->setPeopleMaintenance(100);
        $unit->setManaMaintenance(550);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(20);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //HIDRAS
        $unit = new Unit();
        $unit->setName('Hidras');
        $unit->setLore('Si cortas una de sus muchas cabezas, crecerán dos más en su lugar.');
        $unit->setAttack(53000);
        $unit->setDefense(72000);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/nature/hydra.png');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(6000);
        $unit->setPeopleMaintenance(2000);
        $unit->setManaMaintenance(2000);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(2);
        $unit->setRarity(90);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRAGONES VERDES
        $unit = new Unit();
        $unit->setName('Dragones Verdes');
        $unit->setLore('No confundas su naturaleza amistosa con debilidad. Siguen siendo dragones.');
        $unit->setAttack(59000);
        $unit->setDefense(41000);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/nature/greendragon.png');
        $unit->setFaction($this->getReference('Naturaleza'));
        $unit->setFamily($this->getReference('Dragones'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(7000);
        $unit->setPeopleMaintenance(1000);
        $unit->setManaMaintenance(2000);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(5);
        $unit->setRarity(90);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        /*
         * FANTASMAL
         */

        //TRITONES
        $unit = new Unit();
        $unit->setName('Tritones');
        $unit->setLore('Viven en el mar pacíficamente, pero en grupos grandes son como pirañas.');
        $unit->setAttack(4);
        $unit->setDefense(5);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/triton.png');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(3750);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //SIRENAS
        $unit = new Unit();
        $unit->setName('Sirenas');
        $unit->setLore('Sus melosos cánticos te llevarán a la locura.');
        $unit->setAttack(4);
        $unit->setDefense(2);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/mermaid.png');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(0);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(1);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(3350);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //NAGAS
        $unit = new Unit();
        $unit->setName('Nagas');
        $unit->setLore('Nacidas de las medusas, las nagas nada tienen que envidiar a sus progenitoras.');
        $unit->setAttack(30);
        $unit->setDefense(20);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/naga.png');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Demonios'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(3);
        $unit->setPeopleMaintenance(2);
        $unit->setManaMaintenance(5);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(1000);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //MAGOS
        $unit = new Unit();
        $unit->setName('Magos');
        $unit->setLore('Sedientos de reconocimiento y admiración, su ego no conoce límites.');
        $unit->setAttack(45);
        $unit->setDefense(40);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/magician.png');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Humanos'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(3);
        $unit->setPeopleMaintenance(1);
        $unit->setManaMaintenance(6);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(785);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //HADAS
        $unit = new Unit();
        $unit->setName('Hadas');
        $unit->setLore('Pueden parecer hermosas por fuera, pero sus dientecillos afilados resultan letales.');
        $unit->setAttack(550);
        $unit->setDefense(450);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/fairy.png');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(30);
        $unit->setPeopleMaintenance(30);
        $unit->setManaMaintenance(40);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(75);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DJINNIS
        $unit = new Unit();
        $unit->setName('Djinnis');
        $unit->setLore('No son como los genios de los cuentos. No cumpirán tus deseos, sino tus pesadillas.');
        $unit->setAttack(300);
        $unit->setDefense(700);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/djinni.png');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(40);
        $unit->setPeopleMaintenance(30);
        $unit->setManaMaintenance(30);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(75);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //TITANES
        $unit = new Unit();
        $unit->setName('Titanes');
        $unit->setLore('Estos colosos llevan largo tiempo encerrados en las profundidades submarinas.');
        $unit->setAttack(6500);
        $unit->setDefense(3500);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/titan.png');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(600);
        $unit->setPeopleMaintenance(200);
        $unit->setManaMaintenance(200);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(20);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELEMENTALES DE AGUA
        $unit = new Unit();
        $unit->setName('Elementales de Agua');
        $unit->setLore('Cuando la magia adopta la forma de las olas, nacen los elementales de agua.');
        $unit->setAttack(2500);
        $unit->setDefense(4250);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/waterelemental.png');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(400);
        $unit->setPeopleMaintenance(150);
        $unit->setManaMaintenance(450);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(12);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //LEVIATANES
        $unit = new Unit();
        $unit->setName('Leviatanes');
        $unit->setLore('Estas monstruosas criaturas marinas despedazan barcos como si fueran maquetas de madera.');
        $unit->setAttack(76000);
        $unit->setDefense(92000);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/levyathan.png');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(3500);
        $unit->setPeopleMaintenance(3000);
        $unit->setManaMaintenance(3500);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(3);
        $unit->setRarity(90);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRAGONES AZULES
        $unit = new Unit();
        $unit->setName('Dragones Azules');
        $unit->setLore('Estas criaturas fantásticas viven en las nubes y nunca olvidan el sabor del maná.');
        $unit->setAttack(50000);
        $unit->setDefense(50000);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/ghost/bluedragon.png');
        $unit->setFaction($this->getReference('Fantasmal'));
        $unit->setFamily($this->getReference('Dragones'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(6000);
        $unit->setPeopleMaintenance(2500);
        $unit->setManaMaintenance(1500);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(5);
        $unit->setRarity(90);
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
        $unit->setLore('No te matarán precisamente con sus sermones, eso te lo aseguro.');
        $unit->setAttack(5);
        $unit->setDefense(7);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/holy/priest.png');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Humanos'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(3575);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //PALADINES
        $unit = new Unit();
        $unit->setName('Paladines');
        $unit->setLore('Siempre dispuestos a defender la luz de la oscuridad.');
        $unit->setAttack(6);
        $unit->setDefense(8);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/holy/paladin.png');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Humanos'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(4170);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //UNICORNIOS
        $unit = new Unit();
        $unit->setName('Unicornios');
        $unit->setLore('Como te descuides te meten el cuerno por el c...');
        $unit->setAttack(60);
        $unit->setDefense(70);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/holy/unicorn.png');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Celestiales'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(5);
        $unit->setPeopleMaintenance(2);
        $unit->setManaMaintenance(3);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(515);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //PEGASOS
        $unit = new Unit();
        $unit->setName('Pegasos');
        $unit->setLore('Sacados de los cuentos, nada detiene a un caballo alado en la batalla.');
        $unit->setAttack(80);
        $unit->setDefense(50);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/holy/pegasus.png');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Celestiales'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(3);
        $unit->setManaMaintenance(6);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(515);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ANGELES
        $unit = new Unit();
        $unit->setName('Ángeles');
        $unit->setLore('Su pureza sólo es igualada por su agilidad y destreza con la espada.');
        $unit->setAttack(500);
        $unit->setDefense(900);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/holy/angel.png');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Celestiales'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(60);
        $unit->setPeopleMaintenance(10);
        $unit->setManaMaintenance(30);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(54);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //GRIFOS
        $unit = new Unit();
        $unit->setName('Grifos');
        $unit->setLore('Ésta mezcla de águila y león puede destrozar a un hombre en segundos.');
        $unit->setAttack(750);
        $unit->setDefense(500);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/holy/griffon.png');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(50);
        $unit->setPeopleMaintenance(30);
        $unit->setManaMaintenance(20);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(60);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ARCANGELES
        $unit = new Unit();
        $unit->setName('Arcángeles');
        $unit->setLore('Solo los ángeles más poderosos ascienden en el escalafón celestial.');
        $unit->setAttack(3500);
        $unit->setDefense(6500);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/holy/archangel.png');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Celestiales'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(700);
        $unit->setPeopleMaintenance(100);
        $unit->setManaMaintenance(200);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(8);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELEMENTALES DE AIRE
        $unit = new Unit();
        $unit->setName('Elementales de Aire');
        $unit->setLore('Cuando la magia abraza el viento, nacen los elementales de aire.');
        $unit->setAttack(5000);
        $unit->setDefense(1750);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/holy/airelemental.png');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(400);
        $unit->setPeopleMaintenance(100);
        $unit->setManaMaintenance(500);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(12);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DOMINIONS
        $unit = new Unit();
        $unit->setName('Dominions');
        $unit->setLore('Éstos colosos generados mediante huracanes y tornados, arrasan con todo a su paso.');
        $unit->setAttack(80000);
        $unit->setDefense(87000);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/holy/dominion.png');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Celestiales'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(4500);
        $unit->setPeopleMaintenance(3000);
        $unit->setManaMaintenance(2500);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(3);
        $unit->setRarity(90);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRAGONES BLANCOS
        $unit = new Unit();
        $unit->setName('Dragones Blancos');
        $unit->setLore('Los más puros de los dragones, y también los más indestructibles.');
        $unit->setAttack(35000);
        $unit->setDefense(65000);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/holy/whitedragon.png');
        $unit->setFaction($this->getReference('Sagrado'));
        $unit->setFamily($this->getReference('Dragones'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(7500);
        $unit->setPeopleMaintenance(1500);
        $unit->setManaMaintenance(1000);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(5);
        $unit->setRarity(90);
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
        $unit->setLore('Éstas criaturitas molestas atacan en manadas.');
        $unit->setAttack(9);
        $unit->setDefense(4);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/doom/goblin.png');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(0);
        $unit->setPeopleMaintenance(1);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(1540);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //CERBEROS
        $unit = new Unit();
        $unit->setName('Cerberos');
        $unit->setLore('Los perros de tres cabezas son los compañeros ideales. Pueden recoger 3 pelotas a la vez!');
        $unit->setAttack(9);
        $unit->setDefense(7);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/doom/cerberus.png');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Demonios'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(1);
        $unit->setPeopleMaintenance(0);
        $unit->setManaMaintenance(0);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(3130);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //MINOTAUROS
        $unit = new Unit();
        $unit->setName('Minotauros');
        $unit->setLore('Mezcla de hombre y toro, su fuerza solo es igualada por su furia descontrolada.');
        $unit->setAttack(60);
        $unit->setDefense(40);
        $unit->setSpeed(5);
        $unit->setImage('bundles/archmagegame/images/unit/doom/minotaur.png');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Asedio'));
        $unit->setGoldMaintenance(4);
        $unit->setPeopleMaintenance(3);
        $unit->setManaMaintenance(3);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(400);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //OGROS
        $unit = new Unit();
        $unit->setName('Ogros');
        $unit->setLore('Tontos como piedras, pero duros como rocas.');
        $unit->setAttack(70);
        $unit->setDefense(15);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/doom/ogre.png');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Demonios'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(3);
        $unit->setPeopleMaintenance(6);
        $unit->setManaMaintenance(1);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(785);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //QUIMERAS
        $unit = new Unit();
        $unit->setName('Quimeras');
        $unit->setLore('Esta mezcla de león con escorpión y serpiente es tan aterradora como letal.');
        $unit->setAttack(800);
        $unit->setDefense(450);
        $unit->setSpeed(2);
        $unit->setImage('bundles/archmagegame/images/unit/doom/chimera.png');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(50);
        $unit->setPeopleMaintenance(30);
        $unit->setManaMaintenance(20);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(120);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //SALAMANDRAS
        $unit = new Unit();
        $unit->setName('Salamandras');
        $unit->setLore('Aunque son de sangre fría, escupen fuego y destrozan huesos con sus mandíbulas.');
        $unit->setAttack(575);
        $unit->setDefense(275);
        $unit->setSpeed(3);
        $unit->setImage('bundles/archmagegame/images/unit/doom/salamander.png');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Demonios'));
        $unit->setType($this->getReference('Melee'));
        $unit->setGoldMaintenance(40);
        $unit->setPeopleMaintenance(20);
        $unit->setManaMaintenance(40);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(120);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DIABLOS
        $unit = new Unit();
        $unit->setName('Diablos');
        $unit->setLore('Sacados de tus peores pesadillas, estos engendros de sombra y fuego consumen todo lo que tocan.');
        $unit->setAttack(6500);
        $unit->setDefense(1750);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/doom/diablo.png');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Demonios'));
        $unit->setType($this->getReference('Distancia'));
        $unit->setGoldMaintenance(200);
        $unit->setPeopleMaintenance(550);
        $unit->setManaMaintenance(250);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(12);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //ELEMENTAL DE LAVA
        $unit = new Unit();
        $unit->setName('Elementales de Lava');
        $unit->setLore('Cuando la magia conquista al fuego, nacen los elementales de lava.');
        $unit->setAttack(7000);
        $unit->setDefense(1250);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/doom/fireelemental.png');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Elementales'));
        $unit->setType($this->getReference('Magia'));
        $unit->setGoldMaintenance(150);
        $unit->setPeopleMaintenance(350);
        $unit->setManaMaintenance(500);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(48);
        $unit->setRarity(0);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //FENIX
        $unit = new Unit();
        $unit->setName('Fénix');
        $unit->setLore('Resurgen de sus cenizas al morir, lo que los convierte en prácticamente inmortales.');
        $unit->setAttack(50000);
        $unit->setDefense(75000);
        $unit->setSpeed(4);
        $unit->setImage('bundles/archmagegame/images/unit/doom/phoenix.png');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Bestias'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(7000);
        $unit->setPeopleMaintenance(1500);
        $unit->setManaMaintenance(1500);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(1);
        $unit->setRarity(90);
        $unit->setSkill(null);
        $unit->setPower(($unit->getAttack()+$unit->getDefense())*$unit->getSpeed());
        $this->setReference($unit->getName(), $unit);
        $manager->persist($unit);

        //DRAGON ROJO
        $unit = new Unit();
        $unit->setName('Dragones Rojos');
        $unit->setLore('Se alimentan de cenizas y fuego. Son ideales para destruir y erradicar toda esperanza. Están calentitos!');
        $unit->setAttack(70000);
        $unit->setDefense(30000);
        $unit->setSpeed(1);
        $unit->setImage('bundles/archmagegame/images/unit/doom/reddragon.png');
        $unit->setFaction($this->getReference('Caos'));
        $unit->setFamily($this->getReference('Dragones'));
        $unit->setType($this->getReference('Volador'));
        $unit->setGoldMaintenance(5000);
        $unit->setPeopleMaintenance(2500);
        $unit->setManaMaintenance(2500);
        $unit->setGoldAuction(5000000);
        $unit->setQuantityAuction(5);
        $unit->setRarity(90);
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