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
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CARTA DEL GREMIO DE ASESINOS
        $artifact = new Artifact();
        $artifact->setName('Carta del Gremio de Asesinos');
        $artifact->setImage('bundles/archmagegame/images/artifact/assassinsguildletter.jpg');
        $artifact->setSkill($this->getReference('Carta del Gremio de Asesinos'));
        $artifact->setLore('Escribe los nombres y nosotros haremos el resto');
        $artifact->setGoldAuction(1000000);
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
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CARTA DEL GREMIO DE LADRONES
        $artifact = new Artifact();
        $artifact->setName('Carta del Gremio de Ladrones');
        $artifact->setImage('bundles/archmagegame/images/artifact/thievesguildletter.jpg');
        $artifact->setSkill($this->getReference('Carta del Gremio de Ladrones'));
        $artifact->setLore('Marca las casas y nosotros haremos el resto');
        $artifact->setGoldAuction(1000000);
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
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CARTA DEL GREMIO DE MAGOS
        $artifact = new Artifact();
        $artifact->setName('Carta del Gremio de Magos');
        $artifact->setImage('bundles/archmagegame/images/artifact/magesguildletter.jpg');
        $artifact->setSkill($this->getReference('Carta del Gremio de Magos'));
        $artifact->setLore('Delata al hereje y nosotros haremos el resto');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ELIXIR DE AMOR
        $artifact = new Artifact();
        $artifact->setName('Elixir de Amor');
        $artifact->setImage('bundles/archmagegame/images/artifact/loveelixir.jpg');
        $artifact->setSkill($this->getReference('Elixir de Amor'));
        $artifact->setLore('El amor es una fuerza muy poderosa, pero un poco de ayuda nunca viene mal');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CARTA DEL GREMIO DE ESPIAS
        $artifact = new Artifact();
        $artifact->setName('Carta del Gremio de Espías');
        $artifact->setImage('bundles/archmagegame/images/artifact/spiesguildletter.jpg');
        $artifact->setSkill($this->getReference('Carta del Gremio de Espías'));
        $artifact->setLore('Susurra un objetivo y nosotros haremos el resto');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //BOTAS DE VELOCIDAD
        $artifact = new Artifact();
        $artifact->setName('Botas de Velocidad');
        $artifact->setImage('bundles/archmagegame/images/artifact/speedshoes.jpg');
        $artifact->setSkill($this->getReference('Botas de Velocidad'));
        $artifact->setLore('Es absurdo ver un Dragón con las botas puestas, pero nadie es perfecto');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //TELA DE ARAÑA
        $artifact = new Artifact();
        $artifact->setName('Tela de Araña');
        $artifact->setImage('bundles/archmagegame/images/artifact/spiderweb.jpg');
        $artifact->setSkill($this->getReference('Tela de Araña'));
        $artifact->setLore('Es sucia, es pegajosa y es asquerosa. Pero su tela es muy útil');
        $artifact->setGoldAuction(1000000);
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
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CABEZA DE MEDUSA
        $artifact = new Artifact();
        $artifact->setName('Cabeza de Medusa');
        $artifact->setImage('bundles/archmagegame/images/artifact/medusahead.jpg');
        $artifact->setSkill($this->getReference('Cabeza de Medusa'));
        $artifact->setLore('Mirarla directamente produce la misma sensación que leer faltas de hortojrafía');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ENCICLOPEDIA ELEMENTAL
        $artifact = new Artifact();
        $artifact->setName('Enciclopedia Elemental');
        $artifact->setImage('bundles/archmagegame/images/artifact/elementalenciclopedia.jpg');
        $artifact->setSkill($this->getReference('Convocar Elementales'));
        $artifact->setLore('Puede salir cualquier cosa, incluso un tronco de árbol!');
        $artifact->setGoldAuction(1000000);
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
        $artifact->setGoldAuction(1000000);
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
        $artifact->setGoldAuction(1000000);
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
        $artifact->setGoldAuction(1000000);
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
        $artifact->setGoldAuction(1000000);
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
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //RELOJ DE ARENA
        $artifact = new Artifact();
        $artifact->setName('Reloj de Arena');
        $artifact->setImage('bundles/archmagegame/images/artifact/hourglass.jpg');
        $artifact->setSkill($this->getReference('Reloj de Arena'));
        $artifact->setLore('Para los que no tienen tiempo que perder');
        $artifact->setGoldAuction(1000000);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //BARRIL DE POLVORA
        $artifact = new Artifact();
        $artifact->setName('Barril de Pólvora');
        $artifact->setImage('bundles/archmagegame/images/artifact/powderbarrel.jpg');
        $artifact->setSkill($this->getReference('Barril de Pólvora'));
        $artifact->setLore('Creo que la mecha es demasiado co..');
        $artifact->setGoldAuction(1000000);
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