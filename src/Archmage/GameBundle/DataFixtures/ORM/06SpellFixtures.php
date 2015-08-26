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
        $spell->setSkill($this->getReference('Generar Esqueletos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ZOMBIS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Zombis'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR HOMBRES LOBO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Hombres Lobo'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ESPECTROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Espectros'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR LICHES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Liches'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR VAMPIROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Vampiros'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR CABALLEROS NEGROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Caballeros Negros'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE SOMBRA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elementales de Sombra'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR GARGOLAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Gárgolas'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DRAGONES NEGROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dragones Negros'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * INVOCAR NATURALEZA
         */

        //INVOCAR GORILAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Gorilas'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ELFOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elfos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DRUIDAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Druidas'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR TROLLS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Trolls'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ENTS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Ents'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR BEHEMOTHS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Behemoths'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR SIERPES COLOSALES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Sierpes Colosales'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE TIERRA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elementales de Tierra'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR HIDRAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Hidras'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DRAGONES VERDES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dragones Verdes'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * INVOCAR FANTASMAL
         */

        //INVOCAR HADAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Hadas'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR TRITONES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Tritones'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR SIRENAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Sirenas'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR NAGAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Nagas'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR MAGOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Magos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DJINNIS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Djinnis'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE AGUA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elementales de Agua'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR TITANES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Titanes'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR LEVIATANES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Leviatanes'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DRAGONES AZULES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dragones Azules'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * INVOCAR SAGRADO
         */

        //INVOCAR MONJES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Monjes'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR PALADINES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Paladines'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR UNICORNIOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Unicornios'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR PEGASOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Pegasos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ANGELES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Ángeles'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR GRIFOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Grifos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE AIRE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elementales de Aire'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ARCANGELES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Arcángeles'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DOMINIONS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dominions'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DRAGONES BLANCOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dragones Blancos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * INVOCAR DESTRUCCION
         */

        //INVOCAR GOBLINS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Goblins'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR CERBEROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Cerberos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR OGROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Ogros'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR QUIMERAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Quimeras'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR MINOTAUROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Minotauros'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR SALAMANDRAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Salamandras'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE LAVA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elementales de Lava'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DIABLOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Diablos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR FENIX
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Fénix'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DRAGONES ROJOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dragones Rojos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setDescription('Descripción');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * HECHIZOS NEGRO
         */

        //NOCHE DE LOS MUERTOS VIVIENTES
        $spell = new Spell();
        $spell->setName('Noche de los Muertos Vivientes');
        $spell->setSkill($this->getReference('Convocar NoMuertos'));
        $spell->setDescription('Descripción');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/nightofthelivingdead.jpg');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * HECHIZOS VERDE
         */

        //CONCILIO DE LAS BESTIAS
        $spell = new Spell();
        $spell->setName('Concilio de las Bestias');
        $spell->setSkill($this->getReference('Convocar Bestias'));
        $spell->setDescription('Descripción');
        $spell->setImage('bundles/archmagegame/images/spell/nature/council.jpg');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * HECHIZOS NEUTRAL
         */

        //APOCALIPSIS
        $spell = new Spell();
        $spell->setName('Apocalipsis');
        $spell->setSkill($this->getReference('Fin del juego'));
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/neutral/apocalipse.jpg');
        $spell->setFaction($this->getReference('Neutral'));
        $spell->setMagic(9);
        $spell->setGoldCost(999999);
        $spell->setManaCost(999999);
        $spell->setPeopleCost(999999);
        $spell->setGoldMaintenance(999999);
        $spell->setManaMaintenance(999999);
        $spell->setPeopleMaintenance(999999);
        $spell->setTurnCost(999);
        $spell->setTurnResearch(9999);
        $spell->setGoldAuction(0);
        $spell->setRarityAuction(0);
        $spell->setEnchant(false);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        $manager->flush();

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 6; // the order in which fixtures will be loaded
    }
}