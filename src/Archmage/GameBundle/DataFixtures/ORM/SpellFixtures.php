<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Spell;

class SpellFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /*
         * INVOCAR OSCURIDAD
         */

        //INVOCAR ESQUELETOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Esqueletos'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR ZOMBIS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Zombis'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR HOMBRES LOBO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Hombres Lobo'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR ESPECTROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Espectros'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR LICHES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Liches'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR VAMPIROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Vampiros'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR CABALLEROS NEGROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Caballeros Negros'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE SOMBRA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Elementales de Sombra'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR GARGOLAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Gárgolas'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //AQUELARRE
        $spell = new Spell();
        $spell->setName('Aquelarre');
        $spell->setDescription('Descripción');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/coven.jpg');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $spell->setSkill($this->getReference('Convocar NoMuertos'));
        $manager->persist($spell);

        /*
         * INVOCAR NATURALEZA
         */

        //INVOCAR GORILAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Gorilas'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR ELFOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Elfos'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR DRUIDAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Druidas'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR TROLLS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Trolls'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR ENTS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Ents'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR BEHEMOTHS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Behemoths'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR SIERPES COLOSALES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Sierpes Colosales'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE TIERRA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Elementales de Tierra'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR HIDRAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Hidras'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //CONCILIO DE LAS BESTIAS
        $spell = new Spell();
        $spell->setName('Concilio de las Bestias');
        $spell->setDescription('Descripción');
        $spell->setImage('bundles/archmagegame/images/spell/nature/council.jpg');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $spell->setSkill($this->getReference('Convocar Bestias'));
        $manager->persist($spell);

        /*
         * INVOCAR FANTASMAL
         */

        //INVOCAR HADAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Hadas'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR TRITONES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Tritones'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR SIRENAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Sirenas'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR NAGAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Nagas'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR MAGOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Magos'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR DJINNIS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Djinnis'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE AGUA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Elementales de Agua'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR TITANES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Titanes'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR LEVIATANES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Leviatanes'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        /*
         * INVOCAR SAGRADO
         */

        //INVOCAR MONJES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Monjes'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR PALADINES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Paladines'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR UNICORNIOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Unicornios'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR PEGASOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Pegasos'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR ANGELES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Ángeles'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR GRIFOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Grifos'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE AIRE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Elementales de Aire'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR ARCANGELES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Arcángeles'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR DOMINIONS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Dominions'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        /*
         * INVOCAR DESTRUCCION
         */

        //INVOCAR GOBLINS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Goblins'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR CERBEROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Cerberos'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR OGROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Ogros'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR QUIMERAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Quimeras'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR MINOTAUROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Minotauros'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR SALAMANDRAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Salamandras'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE LAVA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Elementales de Lava'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR DEMONIOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Demonios'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        //INVOCAR FENIX
        $spell = new Spell();
        $spell->setSkill($this->getReference('Invocar Fénix'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setGoldAuction(null);
        $spell->setRarityAuction(null);
        $manager->persist($spell);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 7; // the order in which fixtures will be loaded
    }
}