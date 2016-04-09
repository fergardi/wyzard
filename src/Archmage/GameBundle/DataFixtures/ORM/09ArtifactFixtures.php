<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Artifact;

class ArtifactFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /*
         * NORMALES
         */

        //COFRE DEL TESORO
        $artifact = new Artifact();
        $artifact->setName('Cofre del Tesoro');
        $artifact->setImage('bundles/archmagegame/images/artifact/treasurechest.png');
        $artifact->setSkill($this->getReference('Cofre del Tesoro'));
        $artifact->setLore('Qué contendrá? Oro? Piedras preciosas? Caramelos?');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(5);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CARTA DEL GREMIO DE ASESINOS
        $artifact = new Artifact();
        $artifact->setName('Carta del Gremio de Asesinos');
        $artifact->setImage('bundles/archmagegame/images/artifact/assassinsguildletter.png');
        $artifact->setSkill($this->getReference('Carta del Gremio de Asesinos'));
        $artifact->setLore('Escribe los nombres y nosotros haremos el resto...');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CARTA DEL GREMIO DE LADRONES
        $artifact = new Artifact();
        $artifact->setName('Carta del Gremio de Ladrones');
        $artifact->setImage('bundles/archmagegame/images/artifact/thievesguildletter.png');
        $artifact->setSkill($this->getReference('Carta del Gremio de Ladrones'));
        $artifact->setLore('Marca las casas y nosotros haremos el resto...');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CARTA DEL GREMIO DE MAGOS
        $artifact = new Artifact();
        $artifact->setName('Carta del Gremio de Magos');
        $artifact->setImage('bundles/archmagegame/images/artifact/magesguildletter.png');
        $artifact->setSkill($this->getReference('Carta del Gremio de Magos'));
        $artifact->setLore('Señala los herejes y nosotros haremos el resto...');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CARTA DEL GREMIO DE ESPIAS
        $artifact = new Artifact();
        $artifact->setName('Carta del Gremio de Espías');
        $artifact->setImage('bundles/archmagegame/images/artifact/spiesguildletter.png');
        $artifact->setSkill($this->getReference('Carta del Gremio de Espías'));
        $artifact->setLore('Susurra un Reino y nosotros haremos el resto...');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //TELA DE ARAÑA
        $artifact = new Artifact();
        $artifact->setName('Tela de Araña');
        $artifact->setImage('bundles/archmagegame/images/artifact/spiderweb.png');
        $artifact->setSkill($this->getReference('Tela de Araña'));
        $artifact->setLore('Es sucia, es pegajosa y es asquerosa. Pero su tela es muy útil...');
        $artifact->setGoldAuction(2000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //MANUAL DEL HEROE
        $artifact = new Artifact();
        $artifact->setName('Manual del Héroe');
        $artifact->setImage('bundles/archmagegame/images/artifact/herosmanual.png');
        $artifact->setSkill($this->getReference('Manual del Héroe'));
        $artifact->setLore('Regla #1: No olvides tu espada. Regla #2: No hay regla #2!');
        $artifact->setGoldAuction(3000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(5);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CABEZA DE MEDUSA
        $artifact = new Artifact();
        $artifact->setName('Cabeza de Medusa');
        $artifact->setImage('bundles/archmagegame/images/artifact/medusahead.png');
        $artifact->setSkill($this->getReference('Cabeza de Medusa'));
        $artifact->setLore('Mirarla directamente produce la misma sensación que leer faltas de hortojrafía!');
        $artifact->setGoldAuction(3000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ENCICLOPEDIA ELEMENTAL
        $artifact = new Artifact();
        $artifact->setName('Enciclopedia Elemental');
        $artifact->setImage('bundles/archmagegame/images/artifact/elementalencyclopedia.png');
        $artifact->setSkill($this->getReference('Convocar Elementales'));
        $artifact->setLore('Puede salir cualquier cosa, incluso un árbol!');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //NECRONOMICRON
        $artifact = new Artifact();
        $artifact->setName('Necronomicrón');
        $artifact->setImage('bundles/archmagegame/images/artifact/necronomicron.png');
        $artifact->setSkill($this->getReference('Convocar NoMuertos'));
        $artifact->setLore('Puede salir cualquier cosa, incluso una calavera!');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CEBO VIVO
        $artifact = new Artifact();
        $artifact->setName('Cebo Vivo');
        $artifact->setImage('bundles/archmagegame/images/artifact/livebait.png');
        $artifact->setSkill($this->getReference('Convocar Bestias'));
        $artifact->setLore('Puede salir cualquier cosa, incluso un gato!');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CUERNO DE GUERRA
        $artifact = new Artifact();
        $artifact->setName('Cuerno de Guerra');
        $artifact->setImage('bundles/archmagegame/images/artifact/battlehorn.png');
        $artifact->setSkill($this->getReference('Convocar Humanos'));
        $artifact->setLore('Puede salir cualquier cosa, incluso un señor!');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CODICE SAGRADO
        $artifact = new Artifact();
        $artifact->setName('Códice Sagrado');
        $artifact->setImage('bundles/archmagegame/images/artifact/holycodex.png');
        $artifact->setSkill($this->getReference('Convocar Celestiales'));
        $artifact->setLore('Puede salir cualquier cosa, incluso un monaguillo!');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //DEMONIO EMBOTELLADO
        $artifact = new Artifact();
        $artifact->setName('Demonio Embotellado');
        $artifact->setImage('bundles/archmagegame/images/artifact/bottleddemon.png');
        $artifact->setSkill($this->getReference('Convocar Demonios'));
        $artifact->setLore('Puede salir cualquier cosa, incluso un diablillo!');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //HUEVO DE DRAGON
        $artifact = new Artifact();
        $artifact->setName('Huevo de Dragón');
        $artifact->setImage('bundles/archmagegame/images/artifact/dragonegg.png');
        $artifact->setSkill($this->getReference('Convocar Dragones'));
        $artifact->setLore('Puede salir cualquier cosa, incluso una lagartija!');
        $artifact->setGoldAuction(3000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(5);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //BARRIL DE POLVORA
        $artifact = new Artifact();
        $artifact->setName('Barril de Pólvora');
        $artifact->setImage('bundles/archmagegame/images/artifact/powderbarrel.png');
        $artifact->setSkill($this->getReference('Barril de Pólvora'));
        $artifact->setLore('Creo que la mecha es demasiado co...');
        $artifact->setGoldAuction(2000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //MUÑECA VOODOO
        $artifact = new Artifact();
        $artifact->setName('Muñeca Voodoo');
        $artifact->setImage('bundles/archmagegame/images/artifact/voodoodoll.png');
        $artifact->setSkill($this->getReference('Muñeca Voodoo'));
        $artifact->setLore('Alguien ha sido muy malo!');
        $artifact->setGoldAuction(3000000);
        $artifact->setRarity(50);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //RELOJ DE ARENA
        $artifact = new Artifact();
        $artifact->setName('Reloj de Arena');
        $artifact->setImage('bundles/archmagegame/images/artifact/hourglass.png');
        $artifact->setSkill($this->getReference('Reloj de Arena'));
        $artifact->setLore('Tiempo embotellado. Tempus fugit!');
        $artifact->setGoldAuction(3000000);
        $artifact->setRarity(50);
        $artifact->setPower(25000);
        $artifact->setCost(5);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //POCION DE PUREZA
        $artifact = new Artifact();
        $artifact->setName('Poción de Pureza');
        $artifact->setImage('bundles/archmagegame/images/artifact/holypotion.png');
        $artifact->setSkill($this->getReference('Poción de Pureza'));
        $artifact->setLore('Para cuando una ramita de romero no es suficiente.');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(5);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //POCION DE AGILIDAD
        $artifact = new Artifact();
        $artifact->setName('Poción de Agilidad');
        $artifact->setImage('bundles/archmagegame/images/artifact/agilitypotion.png');
        $artifact->setSkill($this->getReference('Poción de Agilidad'));
        $artifact->setLore('Para darle un empujoncito a tus tropas. Si es mágico, no es dopaje!');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //POCION DE FUERZA
        $artifact = new Artifact();
        $artifact->setName('Poción de Fuerza');
        $artifact->setImage('bundles/archmagegame/images/artifact/strengthpotion.png');
        $artifact->setSkill($this->getReference('Poción de Fuerza'));
        $artifact->setLore('Para darle un empujoncito a tus tropas. Si es mágico, no es dopaje!');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //POCION DE VITALIDAD
        $artifact = new Artifact();
        $artifact->setName('Poción de Vitalidad');
        $artifact->setImage('bundles/archmagegame/images/artifact/vitalitypotion.png');
        $artifact->setSkill($this->getReference('Poción de Vitalidad'));
        $artifact->setLore('Para darle un empujoncito a tus tropas. Si es mágico, no es dopaje!');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //POCION DE MANA
        $artifact = new Artifact();
        $artifact->setName('Poción de Maná');
        $artifact->setImage('bundles/archmagegame/images/artifact/manapotion.png');
        $artifact->setSkill($this->getReference('Poción de Maná'));
        $artifact->setLore('Deliciosa y refrescante. Perfecta para resistir asedios enemigos!');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //POCION DE AMOR
        $artifact = new Artifact();
        $artifact->setName('Poción de Amor');
        $artifact->setImage('bundles/archmagegame/images/artifact/lovepotion.png');
        $artifact->setSkill($this->getReference('Poción de Amor'));
        $artifact->setLore('El amor es una fuerza muy poderosa, pero un poco de ayuda nunca viene mal.');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setPower(25000);
        $artifact->setCost(5);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //BRUJULA MAGICA
        $artifact = new Artifact();
        $artifact->setName('Brújula Mágica');
        $artifact->setImage('bundles/archmagegame/images/artifact/magiccompass.png');
        $artifact->setSkill($this->getReference('Brújula Mágica'));
        $artifact->setLore('Cómo que nos hemos perdido?! Cómo que no señala al norte?! Cómo que es un aletiómetro?!');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(50);
        $artifact->setPower(25000);
        $artifact->setCost(5);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ESPEJO ROTO
        $artifact = new Artifact();
        $artifact->setName('Espejo Roto');
        $artifact->setImage('bundles/archmagegame/images/artifact/brokenmirror.png');
        $artifact->setSkill($this->getReference('Espejo Roto'));
        $artifact->setLore('Siete años de mala suerte me parecen pocos!');
        $artifact->setGoldAuction(3000000);
        $artifact->setRarity(50);
        $artifact->setPower(25000);
        $artifact->setCost(5);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //POLVO DE HADA
        $artifact = new Artifact();
        $artifact->setName('Polvo de Hada');
        $artifact->setImage('bundles/archmagegame/images/artifact/fairypowder.png');
        $artifact->setSkill($this->getReference('Polvo de Hada'));
        $artifact->setLore('En bolsitas para una fácil distribución entre adolescentes.');
        $artifact->setGoldAuction(3000000);
        $artifact->setRarity(50);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //SANTA GRANADA
        $artifact = new Artifact();
        $artifact->setName('Santa Granada');
        $artifact->setImage('bundles/archmagegame/images/artifact/holygrenade.png');
        $artifact->setSkill($this->getReference('Santa Granada'));
        $artifact->setLore('Armamentos. Capítulo dos. Párrafo 9 a 21.');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(50);
        $artifact->setPower(25000);
        $artifact->setCost(5);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //LIBRO PROHIBIDO
        $artifact = new Artifact();
        $artifact->setName('Libro Prohibido');
        $artifact->setImage('bundles/archmagegame/images/artifact/forbiddenbook.png');
        $artifact->setSkill($this->getReference('Libro Prohibido'));
        $artifact->setLore('Los secretos de todos las facciones, guardados en un solo libro.');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(90);
        $artifact->setPower(25000);
        $artifact->setCost(5);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //RECETARIO DE POCIONES
        $artifact = new Artifact();
        $artifact->setName('Recetario de Pociones');
        $artifact->setImage('bundles/archmagegame/images/artifact/alchemybook.png');
        $artifact->setSkill($this->getReference('Recetario de Pociones'));
        $artifact->setLore('Este libro pertenece al Príncipe Mestizo.');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(90);
        $artifact->setPower(25000);
        $artifact->setCost(0);
        $artifact->setClass('artifact');
        $artifact->setLegendary(false);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        /*
         * LEGENDARIOS
         */

        //ANILLO AVARICIOSO
        $artifact = new Artifact();
        $artifact->setName('Anillo Avaricioso');
        $artifact->setImage('bundles/archmagegame/images/artifact/greedyring.png');
        $artifact->setSkill($this->getReference('Anillo Avaricioso'));
        $artifact->setLore('Uno de los cinco Anillos Legendarios, llevado una vez por un gran Dios de la Magia Blanca.');
        $artifact->setGoldAuction(10000000);
        $artifact->setRarity(90);
        $artifact->setPower(250000);
        $artifact->setCost(33);
        $artifact->setClass('legendary');
        $artifact->setLegendary(true);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ANILLO PODEROSO
        $artifact = new Artifact();
        $artifact->setName('Anillo Poderoso');
        $artifact->setImage('bundles/archmagegame/images/artifact/powerring.png');
        $artifact->setSkill($this->getReference('Anillo Poderoso'));
        $artifact->setLore('Uno de los cinco Anillos Legendarios, llevado una vez por un gran Dios de la Magia Azul.');
        $artifact->setGoldAuction(10000000);
        $artifact->setRarity(90);
        $artifact->setPower(250000);
        $artifact->setCost(33);
        $artifact->setClass('legendary');
        $artifact->setLegendary(true);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ANILLO ENCANTADOR
        $artifact = new Artifact();
        $artifact->setName('Anillo Encantador');
        $artifact->setImage('bundles/archmagegame/images/artifact/charmingring.png');
        $artifact->setSkill($this->getReference('Anillo Encantador'));
        $artifact->setLore('Uno de los cinco Anillos Legendarios, llevado una vez por un gran Dios de la Magia Morada.');
        $artifact->setGoldAuction(10000000);
        $artifact->setRarity(90);
        $artifact->setPower(250000);
        $artifact->setCost(33);
        $artifact->setClass('legendary');
        $artifact->setLegendary(true);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ANILLO DURO
        $artifact = new Artifact();
        $artifact->setName('Anillo Duro');
        $artifact->setImage('bundles/archmagegame/images/artifact/hardring.png');
        $artifact->setSkill($this->getReference('Anillo Duro'));
        $artifact->setLore('Uno de los cinco Anillos Legendarios, llevado una vez por un gran Dios de la Magia Roja.');
        $artifact->setGoldAuction(10000000);
        $artifact->setRarity(90);
        $artifact->setPower(250000);
        $artifact->setCost(33);
        $artifact->setClass('legendary');
        $artifact->setLegendary(true);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ANILLO INVOCADOR
        $artifact = new Artifact();
        $artifact->setName('Anillo Invocador');
        $artifact->setImage('bundles/archmagegame/images/artifact/summonerring.png');
        $artifact->setSkill($this->getReference('Anillo Invocador'));
        $artifact->setLore('Uno de los cinco Anillos Legendarios, llevado una vez por un gran Dios de la Magia Verde.');
        $artifact->setGoldAuction(10000000);
        $artifact->setRarity(90);
        $artifact->setPower(250000);
        $artifact->setCost(33);
        $artifact->setClass('legendary');
        $artifact->setLegendary(true);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //AMULETO ERUDITO
        $artifact = new Artifact();
        $artifact->setName('Amuleto Erudito');
        $artifact->setImage('bundles/archmagegame/images/artifact/scholarpendant.png');
        $artifact->setSkill($this->getReference('Amuleto Erudito'));
        $artifact->setLore('Uno de los cinco Amuletos Legendarios, llevado una vez por un gran Dios de la Magia Azul.');
        $artifact->setGoldAuction(10000000);
        $artifact->setRarity(90);
        $artifact->setPower(250000);
        $artifact->setCost(33);
        $artifact->setClass('legendary');
        $artifact->setLegendary(true);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //AMULETO MALDITO
        $artifact = new Artifact();
        $artifact->setName('Amuleto Maldito');
        $artifact->setImage('bundles/archmagegame/images/artifact/cursedpendant.png');
        $artifact->setSkill($this->getReference('Amuleto Maldito'));
        $artifact->setLore('Uno de los cinco Amuletos Legendarios, llevado una vez por un gran Dios de la Magia Morada (más que nada, porque no se lo podía quitar).');
        $artifact->setGoldAuction(10000000);
        $artifact->setRarity(90);
        $artifact->setPower(250000);
        $artifact->setCost(1);
        $artifact->setClass('legendary');
        $artifact->setLegendary(true);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //AMULETO GUERRERO
        $artifact = new Artifact();
        $artifact->setName('Amuleto Guerrero');
        $artifact->setImage('bundles/archmagegame/images/artifact/warriorpendant.png');
        $artifact->setSkill($this->getReference('Amuleto Guerrero'));
        $artifact->setLore('Uno de los cinco Amuletos Legendarios, llevado una vez por un gran Dios de la Magia Roja.');
        $artifact->setGoldAuction(10000000);
        $artifact->setRarity(90);
        $artifact->setPower(250000);
        $artifact->setCost(33);
        $artifact->setClass('legendary');
        $artifact->setLegendary(true);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //AMULETO AFORTUNADO
        $artifact = new Artifact();
        $artifact->setName('Amuleto Afortunado');
        $artifact->setImage('bundles/archmagegame/images/artifact/luckypendant.png');
        $artifact->setSkill($this->getReference('Amuleto Afortunado'));
        $artifact->setLore('Uno de los cinco Amuletos Legendarios, llevado una vez por un gran Dios de la Magia Blanca.');
        $artifact->setGoldAuction(10000000);
        $artifact->setRarity(90);
        $artifact->setPower(250000);
        $artifact->setCost(33);
        $artifact->setClass('legendary');
        $artifact->setLegendary(true);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //AMULETO EXOTICO
        $artifact = new Artifact();
        $artifact->setName('Amuleto Exótico');
        $artifact->setImage('bundles/archmagegame/images/artifact/exoticpendant.png');
        $artifact->setSkill($this->getReference('Amuleto Exótico'));
        $artifact->setLore('Uno de los cinco Amuletos Legendarios, llevado una vez por un gran Dios de la Magia Verde.');
        $artifact->setGoldAuction(10000000);
        $artifact->setRarity(90);
        $artifact->setPower(250000);
        $artifact->setCost(33);
        $artifact->setClass('legendary');
        $artifact->setLegendary(true);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 9; // the order in which fixtures will be loaded
    }
}