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
        $spell->setSkill($this->getReference('Generar Esqueletos_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ZOMBIS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Zombis_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR HOMBRES LOBO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Hombres Lobo_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ESPECTROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Espectros_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR LICHES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Liches_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR VAMPIROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Vampiros_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR CABALLEROS NEGROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Caballeros Negros_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE SOMBRA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elementales de Sombra_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR GARGOLAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Gárgolas_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DRAGONES NEGROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dragones Negros_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * HECHIZOS OSCURIDAD
         */

        //MALDICION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Maldición_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/curse.jpg');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //MIEDO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Miedo_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/fear.jpg');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //AQUELARRE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Aquelarre_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/coven.jpg');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //FUERZA IMPIA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Fuerza Impía_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/unholystrength.jpg');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //PLAGA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Plaga_skill'));
        $spell->setName('Plaga');
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/plague.jpg');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(true);
        $spell->setTurnsExpiration(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //VOODOO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Voodoo_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/voodoo.jpg');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //CORRUPCION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Corrupción_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/corruption.jpg');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(true);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //BRUJERIA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Brujería_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/witchcraft.jpg');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ECLIPSE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Eclipse_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/eclipse.jpg');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //NOCHE DE LOS MUERTOS VIVIENTES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Convocar NoMuertos_skill'));
        $spell->setName('Noche de los Muertos Vivientes');
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/nightlivingdead.jpg');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * INVOCAR NATURALEZA
         */

        //INVOCAR GORILAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Gorilas_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ELFOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elfos_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DRUIDAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Druidas_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR TROLLS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Trolls_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ENTS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Ents_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR BEHEMOTHS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Behemoths_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR SIERPES COLOSALES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Sierpes Colosales_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE TIERRA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elementales de Tierra_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR HIDRAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Hidras_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DRAGONES VERDES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dragones Verdes_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * HECHIZOS NATURALEZA
         */

        //OXIDAR ARMADURA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Oxidar Armadura_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/nature/rustarmor.jpg');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //PRISA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Prisa_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/nature/haste.jpg');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //AGRANDAR ANIMAL
        $spell = new Spell();
        $spell->setSkill($this->getReference('Agrandar Animales_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/nature/enlargeanimals.jpg');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //CURACION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Curación_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/nature/curation.jpg');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //HURACAN
        $spell = new Spell();
        $spell->setSkill($this->getReference('Huracán_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/nature/hurricane.jpg');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //IRA DEL BOSQUE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Ira del Bosque_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/nature/forestwrath.jpg');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //FAVOR DE LA NATURALEZA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Favor de la Naturaleza_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/nature/naturefavor.jpg');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //CONTROL DEL CLIMA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Control del Clima_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/nature/climatecontrol.jpg');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(true);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //CONCILIO DE LAS BESTIAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Concilio de las Bestias_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/nature/council.jpg');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //RAYO DE SOL
        $spell = new Spell();
        $spell->setSkill($this->getReference('Rayo de Sol_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/nature/sunray.jpg');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * INVOCAR FANTASMAL
         */

        //INVOCAR TRITONES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Tritones_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR SIRENAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Sirenas_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR HADAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Hadas_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR MAGOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Magos_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR NAGAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Nagas_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DJINNIS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Djinnis_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE AGUA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elementales de Agua_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR TITANES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Titanes_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR LEVIATANES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Leviatanes_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DRAGONES AZULES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dragones Azules_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * HECHIZOS FANTASMAL
         */

        //ORO FALSO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Oro Falso_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/fakegold.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ORACULO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Oráculo_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/oracle.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //CHAMANISMO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Chamanismo_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/shamanism.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //SABIDURIA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Sabiduría_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/wisdom.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(true);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ENCONTRAR ARTEFACTO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Encontrar Artefacto_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/findartifact.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //DESENCANTAR
        $spell = new Spell();
        $spell->setSkill($this->getReference('Desencantar_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/dispell.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //CONCENTRACION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Concentración_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/focus.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(true);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //BARRERA MENTAL
        $spell = new Spell();
        $spell->setSkill($this->getReference('Barrera Mental_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/mentalbarrier.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(true);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //REUNION ELEMENTAL
        $spell = new Spell();
        $spell->setSkill($this->getReference('Reunión Elemental_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/elementalgathering.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //TSUNAMI
        $spell = new Spell();
        $spell->setSkill($this->getReference('Tsunami_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/tsunami.jpg');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * INVOCAR SAGRADO
         */

        //INVOCAR MONJES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Monjes_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR PALADINES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Paladines_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR UNICORNIOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Unicornios_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR PEGASOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Pegasos_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ANGELES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Ángeles_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR GRIFOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Grifos_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE AIRE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elementales de Aire_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ARCANGELES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Arcángeles_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DOMINIONS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dominions_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DRAGONES BLANCOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dragones Blancos_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * HECHIZOS SAGRADO
         */

        //SANACION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Sanación_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/holy/healing.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //VOLAR
        $spell = new Spell();
        $spell->setSkill($this->getReference('Volar_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/holy/fly.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //DESTRUIR ARTEFACTO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Destruir Artefacto_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/holy/destroyartifact.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //VALOR
        $spell = new Spell();
        $spell->setSkill($this->getReference('Valor_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/holy/valor.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //PROSPERIDAD
        $spell = new Spell();
        $spell->setSkill($this->getReference('Prosperidad_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/holy/prosperity.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(true);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //PAZ
        $spell = new Spell();
        $spell->setSkill($this->getReference('Paz_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/holy/peace.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(true);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //CALMA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Calma_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/holy/pacifism.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //PROTECCION DIVINA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Protección Divina_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/holy/divineprotection.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(true);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //PUERTA DE LOS CIELOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Puerta de los Cielos_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/holy/heavensdoor.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //PALABA SANTA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Palabra Santa_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/holy/holyword.jpg');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * INVOCAR DESTRUCCION
         */

        //INVOCAR GOBLINS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Goblins_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR CERBEROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Cerberos_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR MINOTAUROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Minotauros_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR OGROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Ogros_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR QUIMERAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Quimeras_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR SALAMANDRAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Salamandras_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE LAVA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elementales de Lava_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DIABLOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Diablos_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR FENIX
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Fénix_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INVOCAR DRAGONES ROJOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dragones Rojos_skill'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * HECHIZOS DESTRUCCION
         */

        //BOLA DE FUEGO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Bola de Fuego_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/doom/fireball.jpg');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ALAS FLAMIGUERAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Alas Flamígueras_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/doom/flamingwings.jpg');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //FLECHAS ARDIENTES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Flechas Ardientes_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/doom/burningarrow.jpg');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //FURIA DEMONIACA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Furia Demoníaca_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/doom/demonwrath.jpg');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //VOLCANO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Volcano_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/doom/volcano.jpg');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(true);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //COMBUSTION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Combustión_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/doom/combustion.jpg');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //TAMBORES DE GUERRA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Tambores de Guerra_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/doom/wardrums.jpg');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //MURO IGNEO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Muro Ígneo_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/doom/igneouswall.jpg');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(true);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //PACTO DE SANGRE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Convocar Demonios_skill'));
        $spell->setName('Pacto de Sangre');
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/doom/bloodpact.jpg');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //INFERNO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Inferno_skill'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/doom/inferno.jpg');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(100000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setTurnsCost(100);
        $spell->setTurnsResearch(100);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(false);
        $spell->setTurnsExpiration(0);
        //$this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * HECHIZOS NEUTRAL
         */

        //APOCALIPSIS
        $spell = new Spell();
        $spell->setName('Apocalipsis');
        $spell->setSkill($this->getReference($spell->getName().'_skill'));
        $spell->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $spell->setImage('bundles/archmagegame/images/spell/neutral/apocalipse.jpg');
        $spell->setFaction($this->getReference('Neutral'));
        $spell->setMagic(6);
        $spell->setGoldCost(0);
        $spell->setManaCost(300000);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(30000);
        $spell->setPeopleMaintenance(20000);
        $spell->setManaMaintenance(10000);
        $spell->setTurnsCost(300);
        $spell->setTurnsResearch(3000);
        $spell->setGoldAuction(0);
        $spell->setRarity(0);
        $spell->setEnchant(true);
        $spell->setTurnsExpiration(50000);
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