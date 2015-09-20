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
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CARTA DEL OBISPO
        $artifact = new Artifact();
        $artifact->setName('Carta del Obispo');
        $artifact->setImage('bundles/archmagegame/images/artifact/bishopletter.jpg');
        $artifact->setSkill($this->getReference('Carta del Obispo'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //COFRE DEL TESORO
        $artifact = new Artifact();
        $artifact->setName('Cofre del Tesoro');
        $artifact->setImage('bundles/archmagegame/images/artifact/treasurechest.jpg');
        $artifact->setSkill($this->getReference('Cofre del Tesoro'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CARTA DEL REY
        $artifact = new Artifact();
        $artifact->setName('Carta del Rey');
        $artifact->setImage('bundles/archmagegame/images/artifact/kingletter.jpg');
        $artifact->setSkill($this->getReference('Carta del Rey'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //POCION DE MANA
        $artifact = new Artifact();
        $artifact->setName('Poción de Maná');
        $artifact->setImage('bundles/archmagegame/images/artifact/manapotion.jpg');
        $artifact->setSkill($this->getReference('Poción de Maná'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CARTA DEL MAGISTER
        $artifact = new Artifact();
        $artifact->setName('Carta del Magister');
        $artifact->setImage('bundles/archmagegame/images/artifact/magisterletter.jpg');
        $artifact->setSkill($this->getReference('Carta del Magister'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ELIXIR DE AMOR
        $artifact = new Artifact();
        $artifact->setName('Elixir de Amor');
        $artifact->setImage('bundles/archmagegame/images/artifact/loveelixir.jpg');
        $artifact->setSkill($this->getReference('Elixir de Amor'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //VIAL DE VENENO
        $artifact = new Artifact();
        $artifact->setName('Vial de Veneno');
        $artifact->setImage('bundles/archmagegame/images/artifact/poisonvial.jpg');
        $artifact->setSkill($this->getReference('Vial de Veneno'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //BOTAS DE VELOCIDAD
        $artifact = new Artifact();
        $artifact->setName('Botas de Velocidad');
        $artifact->setImage('bundles/archmagegame/images/artifact/speedshoes.jpg');
        $artifact->setSkill($this->getReference('Botas de Velocidad'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //TELA DE ARAÑA
        $artifact = new Artifact();
        $artifact->setName('Tela de Araña');
        $artifact->setImage('bundles/archmagegame/images/artifact/spiderweb.jpg');
        $artifact->setSkill($this->getReference('Tela de Araña'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //MANUAL DEL HEROE
        $artifact = new Artifact();
        $artifact->setName('Manual del Héroe');
        $artifact->setImage('bundles/archmagegame/images/artifact/herosmanual.jpg');
        $artifact->setSkill($this->getReference('Manual del Héroe'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CABEZA DE MEDUSA
        $artifact = new Artifact();
        $artifact->setName('Cabeza de Medusa');
        $artifact->setImage('bundles/archmagegame/images/artifact/medusahead.jpg');
        $artifact->setSkill($this->getReference('Cabeza de Medusa'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ENCICLOPEDIA ELEMENTAL
        $artifact = new Artifact();
        $artifact->setName('Enciclopedia Elemental');
        $artifact->setImage('bundles/archmagegame/images/artifact/elementalenciclopedia.jpg');
        $artifact->setSkill($this->getReference('Convocar Elementales'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //NECRONOMICRON
        $artifact = new Artifact();
        $artifact->setName('Necronomicrón');
        $artifact->setImage('bundles/archmagegame/images/artifact/necronomicron.jpg');
        $artifact->setSkill($this->getReference('Convocar NoMuertos'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //HUEVO DE DRAGON
        $artifact = new Artifact();
        $artifact->setName('Huevo de Dragón');
        $artifact->setImage('bundles/archmagegame/images/artifact/dragonegg.jpg');
        $artifact->setSkill($this->getReference('Convocar Dragones'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CODICE SAGRADO
        $artifact = new Artifact();
        $artifact->setName('Códice Sagrado');
        $artifact->setImage('bundles/archmagegame/images/artifact/holycodex.jpg');
        $artifact->setSkill($this->getReference('Convocar Celestiales'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //CALAVERA MALDITA
        $artifact = new Artifact();
        $artifact->setName('Calavera Maldita');
        $artifact->setImage('bundles/archmagegame/images/artifact/cursedskull.jpg');
        $artifact->setSkill($this->getReference('Convocar Demonios'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ESPADA LEGENDARIA
        $artifact = new Artifact();
        $artifact->setName('Espada Legendaria');
        $artifact->setImage('bundles/archmagegame/images/artifact/legendarysword.jpg');
        $artifact->setSkill($this->getReference('Espada Legendaria'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ESCUDO LEGENDARIO
        $artifact = new Artifact();
        $artifact->setName('Escudo Legendario');
        $artifact->setImage('bundles/archmagegame/images/artifact/legendaryshield.jpg');
        $artifact->setSkill($this->getReference('Escudo Legendario'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //RELOJ DE ARENA
        $artifact = new Artifact();
        $artifact->setName('Reloj de Arena');
        $artifact->setImage('bundles/archmagegame/images/artifact/hourglass.jpg');
        $artifact->setSkill($this->getReference('Reloj de Arena'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
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