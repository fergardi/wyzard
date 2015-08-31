<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

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
         * HECHIZOS OSCURIDAD
         */

        //NOCHE DE LOS MUERTOS VIVIENTES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Noche de los Muertos Vivientes'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
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
        $spell->setEnchant(true);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //PESTE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Peste'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/darkness/plague.jpg');
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

        //AQUELARRE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Aquelarre'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/darkness/coven.jpg');
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

        //FUERZA IMPIA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Fuerza Impía'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/darkness/unholystrength.jpg');
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

        //VOODOO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Voodoo'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/darkness/voodoo.jpg');
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

        //CORRUPCION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Corrupción'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/darkness/corruption.jpg');
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

        //BRUJERIA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Brujería'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/darkness/witchcraft.jpg');
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
        $spell->setEnchant(true);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //OSCURIDAD TOTAL
        $spell = new Spell();
        $spell->setSkill($this->getReference('Oscuridad Total'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/darkness/pitchblack.jpg');
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

        //MALDICION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Maldición'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/darkness/curse.jpg');
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

        //MIEDO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Miedo'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/darkness/fear.jpg');
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
        $spell->setSkill($this->getReference('Generar Elfos de los Bosques'));
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
         * HECHIZOS NATURALEZA
         */

        //HURACAN
        $spell = new Spell();
        $spell->setSkill($this->getReference('Huracán'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/nature/hurricane.jpg');
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

        //CONCILIO DE LAS BESTIAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Concilio de las Bestias'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
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

        //AGRANDAR ANIMAL
        $spell = new Spell();
        $spell->setSkill($this->getReference('Agrandar Animales'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/nature/enlargeanimals.jpg');
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

        //CURACION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Curación'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/nature/curation.jpg');
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

        //FAVOR DE LA NATURALEZA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Favor de la Naturaleza'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/nature/naturefavor.jpg');
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
        $spell->setEnchant(true);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //OXIDAR ARMADURA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Oxidar Armadura'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/nature/rustarmor.jpg');
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

        //IRA DEL BOSQUE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Ira del Bosque'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/nature/forestwrath.jpg');
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

        //CONTROL DEL CLIMA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Control del Clima'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/nature/climatecontrol.jpg');
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
        $spell->setEnchant(true);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //RAYO DE SOL
        $spell = new Spell();
        $spell->setSkill($this->getReference('Rayo de Sol'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/nature/sunray.jpg');
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

        //PRISA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Prisa'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/nature/haste.jpg');
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
         * HECHIZOS FANTASMAL
         */

        //ORO FALSO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Oro Falso'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/ghost/fakegold.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
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

        //REUNION ELEMENTAL
        $spell = new Spell();
        $spell->setSkill($this->getReference('Reunión Elemental'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/ghost/elementalgathering.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
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

        //ORACULO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Oráculo'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/ghost/oracle.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
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

        //TSUNAMI
        $spell = new Spell();
        $spell->setSkill($this->getReference('Tsunami'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/ghost/tsunami.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
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

        //CONCENTRACION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Concentración'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/ghost/focus.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
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

        //SABIDURIA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Sabiduría'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/ghost/wisdom.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
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

        //NIEBLA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Niebla'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/ghost/fog.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
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

        //BARRERA MENTAL
        $spell = new Spell();
        $spell->setSkill($this->getReference('Barrera Mental'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/ghost/mentalbarrier.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
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

        //ENCONTRAR ARTEFACTO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Encontrar Artefacto'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/ghost/findartifact.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
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

        //DESENCANTAR
        $spell = new Spell();
        $spell->setSkill($this->getReference('Desencantar'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/ghost/dispell.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
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
         * HECHIZOS SAGRADO
         */

        //DESTRUIR ARTEFACTO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Destruir Artefacto'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/holy/destroyartifact.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
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

        //PUERTA DE LOS CIELOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Puerta de los Cielos'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/holy/heavensdoor.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
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

        //PACIFISMO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Pacifismo'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/holy/pacifism.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
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

        //PALABA SANTA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Palabra Santa'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/holy/holyword.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
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

        //PROTECCION DIVINA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Protección Divina'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/holy/divineprotection.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
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
        $spell->setEnchant(true);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //VALOR
        $spell = new Spell();
        $spell->setSkill($this->getReference('Valor'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/holy/valor.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
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

        //SANACION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Sanación'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/holy/healing.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
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

        //PROSPERIDAD
        $spell = new Spell();
        $spell->setSkill($this->getReference('Prosperidad'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/holy/prosperity.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
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
        $spell->setEnchant(true);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //VOLAR
        $spell = new Spell();
        $spell->setSkill($this->getReference('Volar'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/holy/fly.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
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

        //PAZ
        $spell = new Spell();
        $spell->setSkill($this->getReference('Paz'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/holy/peace.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
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
        $spell->setEnchant(true);
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
         * HECHIZOS DESTRUCCION
         */

        //PACO DE SANGRE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Pacto de Sangre'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/doom/bloodpact.jpg');
        $spell->setFaction($this->getReference('Destrucción'));
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

        //VOLCANO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Volcano'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/doom/volcano.jpg');
        $spell->setFaction($this->getReference('Destrucción'));
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
        $spell->setEnchant(true);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //FLECHAS DE FUEGO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Flechas de Fuego'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/doom/firearrows.jpg');
        $spell->setFaction($this->getReference('Destrucción'));
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

        //DRENAR MANA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Drenar Maná'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/doom/drainmana.jpg');
        $spell->setFaction($this->getReference('Destrucción'));
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

        //INFERNO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Inferno'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/doom/inferno.jpg');
        $spell->setFaction($this->getReference('Destrucción'));
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
        $spell->setEnchant(true);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //TAMBORES DE GUERRA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Tambores de Guerra'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/doom/wardrums.jpg');
        $spell->setFaction($this->getReference('Destrucción'));
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

        //BOLA DE FUEGO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Bola de Fuego'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/doom/fireball.jpg');
        $spell->setFaction($this->getReference('Destrucción'));
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

        //MURO DE FUEGO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Muro de Fuego'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/doom/firewall.jpg');
        $spell->setFaction($this->getReference('Destrucción'));
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
        $spell->setEnchant(true);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ALAS IGNEAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Alas Ígneas'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/doom/firewings.jpg');
        $spell->setFaction($this->getReference('Destrucción'));
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

        //FURIA DEMONIACA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Furia Demoníaca'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setDescription($spell->getSkill()->getDescription());
        $spell->setImage('bundles/archmagegame/images/spell/doom/demonwrath.jpg');
        $spell->setFaction($this->getReference('Destrucción'));
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
        $spell->setEnchant(true);
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