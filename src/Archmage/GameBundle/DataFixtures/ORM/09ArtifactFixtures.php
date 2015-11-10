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
        //BRUJULA MAGICA
        $artifact = new Artifact();
        $artifact->setName('Brújula Mágica');
        $artifact->setImage('bundles/archmagegame/images/artifact/magiccompass.jpg');
        $artifact->setSkill($this->getReference('Brújula Mágica'));
        $artifact->setLore('Cómo que nos hemos perdido?! Cómo que no señala al norte?!');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CARTA DEL GREMIO DE ASESINOS
        $artifact = new Artifact();
        $artifact->setName('Carta del Gremio de Asesinos');
        $artifact->setImage('bundles/archmagegame/images/artifact/assassinsguildletter.jpg');
        $artifact->setSkill($this->getReference('Carta del Gremio de Asesinos'));
        $artifact->setLore('Escribe los nombres y nosotros haremos el resto.');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //COFRE DEL TESORO
        $artifact = new Artifact();
        $artifact->setName('Cofre del Tesoro');
        $artifact->setImage('bundles/archmagegame/images/artifact/treasurechest.jpg');
        $artifact->setSkill($this->getReference('Cofre del Tesoro'));
        $artifact->setLore('Qué contendrá? Oro? Piedras preciosas? Caramelos?');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CARTA DEL GREMIO DE LADRONES
        $artifact = new Artifact();
        $artifact->setName('Carta del Gremio de Ladrones');
        $artifact->setImage('bundles/archmagegame/images/artifact/thievesguildletter.jpg');
        $artifact->setSkill($this->getReference('Carta del Gremio de Ladrones'));
        $artifact->setLore('Marca las casas y nosotros haremos el resto.');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //POCION DE MANA
        $artifact = new Artifact();
        $artifact->setName('Poción de Maná');
        $artifact->setImage('bundles/archmagegame/images/artifact/manapotion.jpg');
        $artifact->setSkill($this->getReference('Poción de Maná'));
        $artifact->setLore('Deliciosa y refrescante. Perfecta para resistir asedios enemigos!');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CARTA DEL GREMIO DE MAGOS
        $artifact = new Artifact();
        $artifact->setName('Carta del Gremio de Magos');
        $artifact->setImage('bundles/archmagegame/images/artifact/magesguildletter.jpg');
        $artifact->setSkill($this->getReference('Carta del Gremio de Magos'));
        $artifact->setLore('Delata al hereje y nosotros haremos el resto.');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //POCION DE AMOR
        $artifact = new Artifact();
        $artifact->setName('Elixir de Amor');
        $artifact->setImage('bundles/archmagegame/images/artifact/lovepotion.jpg');
        $artifact->setSkill($this->getReference('Poción de Amor'));
        $artifact->setLore('El amor es una fuerza muy poderosa, pero un poco de ayuda nunca viene mal.');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CARTA DEL GREMIO DE ESPIAS
        $artifact = new Artifact();
        $artifact->setName('Carta del Gremio de Espías');
        $artifact->setImage('bundles/archmagegame/images/artifact/spiesguildletter.jpg');
        $artifact->setSkill($this->getReference('Carta del Gremio de Espías'));
        $artifact->setLore('Susurra un objetivo y nosotros haremos el resto.');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //TELA DE ARAÑA
        $artifact = new Artifact();
        $artifact->setName('Tela de Araña');
        $artifact->setImage('bundles/archmagegame/images/artifact/spiderweb.jpg');
        $artifact->setSkill($this->getReference('Tela de Araña'));
        $artifact->setLore('Es sucia, es pegajosa y es asquerosa. Pero su tela es muy útil.');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //MANUAL DEL HEROE
        $artifact = new Artifact();
        $artifact->setName('Manual del Héroe');
        $artifact->setImage('bundles/archmagegame/images/artifact/herosmanual.jpg');
        $artifact->setSkill($this->getReference('Manual del Héroe'));
        $artifact->setLore('Regla #1: No olvides tu espada. Regla #2: No hay regla #2');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CABEZA DE MEDUSA
        $artifact = new Artifact();
        $artifact->setName('Cabeza de Medusa');
        $artifact->setImage('bundles/archmagegame/images/artifact/medusahead.jpg');
        $artifact->setSkill($this->getReference('Cabeza de Medusa'));
        $artifact->setLore('Mirarla directamente produce la misma sensación que leer faltas de hortojrafía!');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ENCICLOPEDIA ELEMENTAL
        $artifact = new Artifact();
        $artifact->setName('Enciclopedia Elemental');
        $artifact->setImage('bundles/archmagegame/images/artifact/elementalenciclopedia.jpg');
        $artifact->setSkill($this->getReference('Convocar Elementales'));
        $artifact->setLore('Puede salir cualquier cosa, incluso un árbol!');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //NECRONOMICRON
        $artifact = new Artifact();
        $artifact->setName('Necronomicrón');
        $artifact->setImage('bundles/archmagegame/images/artifact/necronomicron.jpg');
        $artifact->setSkill($this->getReference('Convocar NoMuertos'));
        $artifact->setLore('Puede salir cualquier cosa, incluso una calavera!');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CEBO VIVO
        $artifact = new Artifact();
        $artifact->setName('Cebo Vivo');
        $artifact->setImage('bundles/archmagegame/images/artifact/livebait.jpg');
        $artifact->setSkill($this->getReference('Convocar Bestias'));
        $artifact->setLore('Puede salir cualquier cosa, incluso un gato!');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //HUEVO DE DRAGON
        $artifact = new Artifact();
        $artifact->setName('Huevo de Dragón');
        $artifact->setImage('bundles/archmagegame/images/artifact/dragonegg.jpg');
        $artifact->setSkill($this->getReference('Convocar Dragones'));
        $artifact->setLore('Puede salir cualquier cosa, incluso una lagartija!');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CODICE SAGRADO
        $artifact = new Artifact();
        $artifact->setName('Códice Sagrado');
        $artifact->setImage('bundles/archmagegame/images/artifact/holycodex.jpg');
        $artifact->setSkill($this->getReference('Convocar Celestiales'));
        $artifact->setLore('Puede salir cualquier cosa, incluso un monaguillo!');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CALAVERA MALDITA
        $artifact = new Artifact();
        $artifact->setName('Calavera Maldita');
        $artifact->setImage('bundles/archmagegame/images/artifact/cursedskull.jpg');
        $artifact->setSkill($this->getReference('Convocar Demonios'));
        $artifact->setLore('Puede salir cualquier cosa, incluso un súcubo!');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //AGUA BENDITA
        $artifact = new Artifact();
        $artifact->setName('Agua Bendita');
        $artifact->setImage('bundles/archmagegame/images/artifact/holywater.jpg');
        $artifact->setSkill($this->getReference('Agua Bendita'));
        $artifact->setLore('Para cuando una ramita de romero no es suficiente.');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //BARRIL DE POLVORA
        $artifact = new Artifact();
        $artifact->setName('Barril de Pólvora');
        $artifact->setImage('bundles/archmagegame/images/artifact/powderbarrel.jpg');
        $artifact->setSkill($this->getReference('Barril de Pólvora'));
        $artifact->setLore('Creo que la mecha es demasiado co...');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ANILLO AVARICIOSO
        $artifact = new Artifact();
        $artifact->setName('Anillo Avaricioso');
        $artifact->setImage('bundles/archmagegame/images/artifact/greedyring.jpg');
        $artifact->setSkill($this->getReference('Anillo Avaricioso'));
        $artifact->setLore('Uno de los anillos legendarios, consigue Oro a raudales');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ANILLO HECHICERO
        $artifact = new Artifact();
        $artifact->setName('Anillo Hechicero');
        $artifact->setImage('bundles/archmagegame/images/artifact/wizardring.jpg');
        $artifact->setSkill($this->getReference('Anillo Hechicero'));
        $artifact->setLore('Uno de los anillos legendarios, consigue Maná a raudales');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ANILLO AMABLE
        $artifact = new Artifact();
        $artifact->setName('Anillo Amable');
        $artifact->setImage('bundles/archmagegame/images/artifact/kindring.jpg');
        $artifact->setSkill($this->getReference('Anillo Amable'));
        $artifact->setLore('Uno de los anillos legendarios, consigue Personas a raudales');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ANILLO GOLEM
        $artifact = new Artifact();
        $artifact->setName('Anillo Golem');
        $artifact->setImage('bundles/archmagegame/images/artifact/golemring.jpg');
        $artifact->setSkill($this->getReference('Anillo Golem'));
        $artifact->setLore('Uno de los anillos legendarios, consigue Defensa a raudales');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //POCION DE AGILIDAD
        $artifact = new Artifact();
        $artifact->setName('Poción de Agilidad');
        $artifact->setImage('bundles/archmagegame/images/artifact/agilitypotion.jpg');
        $artifact->setSkill($this->getReference('Poción de Agilidad'));
        $artifact->setLore('Si es mágico, no es dopaje!');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //POCION DE FUERZA
        $artifact = new Artifact();
        $artifact->setName('Lingote de Oro');
        $artifact->setImage('bundles/archmagegame/images/artifact/strengthpotion.jpg');
        $artifact->setSkill($this->getReference('Poción de Fuerza'));
        $artifact->setLore('Si es mágico, no es dopaje!');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //POCION DE VITALIDAD
        $artifact = new Artifact();
        $artifact->setName('Lingote de Oro');
        $artifact->setImage('bundles/archmagegame/images/artifact/vitalitypotion.jpg');
        $artifact->setSkill($this->getReference('Poción de Vitalidad'));
        $artifact->setLore('Si es mágico, no es dopaje!');
        $artifact->setGoldAuction(5000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
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