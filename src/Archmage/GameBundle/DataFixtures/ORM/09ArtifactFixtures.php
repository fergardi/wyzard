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
        $artifact->setSkill($this->getReference('Generar Tierras'));
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
        $artifact->setSkill($this->getReference('Generar Oro'));
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
        $artifact->setSkill($this->getReference('Generar Maná'));
        $artifact->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $artifact->setGoldAuction(0);
        $artifact->setRarity(0);
        $artifact->setFaction($this->getReference('Neutral'));
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //VORTICE DE MANA
        $artifact = new Artifact();
        $artifact->setName('Vórtice de Maná');
        $artifact->setImage('bundles/archmagegame/images/artifact/manavortex.jpg');
        $artifact->setSkill($this->getReference('Destruir Maná'));
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
        $artifact->setSkill($this->getReference('Generar Población'));
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
        $artifact->setSkill($this->getReference('Destruir Población'));
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

        //TELA DE ARAÑA
        $artifact = new Artifact();
        $artifact->setName('Tela de Araña');
        $artifact->setImage('bundles/archmagegame/images/artifact/spiderweb.jpg');
        $artifact->setSkill($this->getReference('Reducir Velocidad'));
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