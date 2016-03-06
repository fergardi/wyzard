<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Spell;

class SpellFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Const
     */
    const MANA_COST = 25000;
    const TURNS_RESEARCH = 100;
    const TURNS_EXPIRATION = 100;
    const TURNS_BATTLE = 0;
    const TURNS_SUMMON = 2;
    const TURNS_UTILITY = 5;
    const TURNS_ENCHANTMENT = 10;

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
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR ZOMBIS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Zombis'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR HOMBRES LOBO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Hombres Lobo'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR ESPECTROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Espectros'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR LICHES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Liches'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR VAMPIROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Vampiros'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR CABALLEROS NEGROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Caballeros Negros'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE SOMBRA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elementales de Sombra'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR GARGOLAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Gárgolas'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(200);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR DRAGONES NEGROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dragones Negros'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(200);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        /*
         * HECHIZOS OSCURIDAD
         */

        //AQUELARRE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Aquelarre'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Qué fiesta tan divertida! Espera, por qué os estais cortando las venas?!');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/coven.png');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //MALDICION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Maldición'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('No la podrás disipar ni comprando ramitas de romero a una zíngara.');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/curse.png');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //FUERZA IMPIA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Fuerza Impía'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('La mala leche no es sólo cosa de vivos...');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/unholystrength.png');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //TERROR
        $spell = new Spell();
        $spell->setSkill($this->getReference('Terror'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Estarán tan aterrorizados que no podrán vernos venir.');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/fear.png');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(300);
        $spell->setPeopleMaintenance(200);
        $spell->setManaMaintenance(100);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName().' defense', $spell); //gods
        $spell->setPower(100000);
        $manager->persist($spell);

        //PLAGA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Plaga'));
        $spell->setName('Plaga');
        $spell->setLore('La guerra bacteriológica lleva siglos existiendo.');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/plague.png');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(300);
        $spell->setPeopleMaintenance(200);
        $spell->setManaMaintenance(100);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //VOODOO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Voodoo'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Cuando odias a alguien pero no quieres decírselo directamente.');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/voodoo.png');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_UTILITY);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //CORRUPCION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Corrupción'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Quemar los campos y echar sal es cosa de niños.');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/corruption.png');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(300);
        $spell->setPeopleMaintenance(200);
        $spell->setManaMaintenance(100);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //BRUJERIA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Brujería'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('El poder del mal puede dar fuerza, pero también fortaleza.');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/witchcraft.png');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(1500);
        $spell->setPeopleMaintenance(1000);
        $spell->setManaMaintenance(500);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //NOCHE DE LOS MUERTOS VIVIENTES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Convocar NoMuertos'));
        $spell->setName('Noche de los Muertos Vivientes');
        $spell->setLore('Las sombras se ciernen sobre nosotros.');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/nightlivingdead.png');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic() / 2);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic() / 2);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //ECLIPSE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Eclipse'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Que la ausencia de luz encoja el corazón de tus enemigos.');
        $spell->setImage('bundles/archmagegame/images/spell/darkness/eclipse.png');
        $spell->setFaction($this->getReference('Oscuridad'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        /*
         * INVOCAR NATURALEZA
         */

        //INVOCAR GORILAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Gorilas'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR ELFOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elfos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR DRUIDAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Druidas'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR TROLLS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Trolls'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR ENTS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Ents'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR BEHEMOTHS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Behemoths'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR SIERPES COLOSALES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Sierpes Colosales'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE TIERRA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elementales de Tierra'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR HIDRAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Hidras'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(200);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR DRAGONES VERDES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dragones Verdes'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(200);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        /*
         * HECHIZOS NATURALEZA
         */

        //OXIDAR ARMADURA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Oxidar Armadura'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Es lo que pasa cuando compras productos de mala calidad.');
        $spell->setImage('bundles/archmagegame/images/spell/nature/rustarmor.png');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //HURACAN
        $spell = new Spell();
        $spell->setSkill($this->getReference('Huracán'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('De qué te sirven tus alas ahora, eh?!');
        $spell->setImage('bundles/archmagegame/images/spell/nature/hurricane.png');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //AGRANDAR ANIMAL
        $spell = new Spell();
        $spell->setSkill($this->getReference('Agrandar Animales'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Un oso del tamaño de un dragón!');
        $spell->setImage('bundles/archmagegame/images/spell/nature/enlargeanimals.png');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //CURACION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Curación'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Tiritas y vendajes para todos!');
        $spell->setImage('bundles/archmagegame/images/spell/nature/curation.png');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //IRA DEL BOSQUE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Ira del Bosque'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Has hecho enfadar a los árboles equivocados.');
        $spell->setImage('bundles/archmagegame/images/spell/nature/forestwrath.png');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //DRUIDISMO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Druidismo'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Viejos secretos del los ancianos del bosque...');
        $spell->setImage('bundles/archmagegame/images/spell/nature/druidism.png');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_UTILITY);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName().' defense', $spell); //gods
        $spell->setPower(100000);
        $manager->persist($spell);

        //CONTROL DEL CLIMA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Control del Clima'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('La madre naturaleza puede ser muy generosa.');
        $spell->setImage('bundles/archmagegame/images/spell/nature/climatecontrol.png');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(1500);
        $spell->setPeopleMaintenance(1000);
        $spell->setManaMaintenance(500);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //FAVOR DE LA NATURALEZA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Favor de la Naturaleza'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Nada traspasará esta vegetación.');
        $spell->setImage('bundles/archmagegame/images/spell/nature/naturefavor.png');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(1500);
        $spell->setPeopleMaintenance(1000);
        $spell->setManaMaintenance(500);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //CONCILIO DE LAS BESTIAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Convocar Bestias'));
        $spell->setName('Concilio de las Bestias');
        $spell->setLore('Los animales atenderán a la llamada.');
        $spell->setImage('bundles/archmagegame/images/spell/nature/council.png');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic() / 2);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic() / 2);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //RAYO DE SOL
        $spell = new Spell();
        $spell->setSkill($this->getReference('Rayo de Sol'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Que la pureza de la luz ciegue a tus enemigos.');
        $spell->setImage('bundles/archmagegame/images/spell/nature/sunray.png');
        $spell->setFaction($this->getReference('Naturaleza'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        /*
         * INVOCAR FANTASMAL
         */

        //INVOCAR TRITONES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Tritones'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR SIRENAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Sirenas'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR HADAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Hadas'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR MAGOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Magos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR NAGAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Nagas'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR DJINNIS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Djinnis'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE AGUA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elementales de Agua'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR TITANES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Titanes'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR LEVIATANES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Leviatanes'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(200);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR DRAGONES AZULES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dragones Azules'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(200);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        /*
         * HECHIZOS FANTASMAL
         */

        //ORO FALSO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Oro Falso'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('No hay nada más divertido que hacer desaparecer el Oro ajeno.');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/fakegold.png');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_UTILITY);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //ORACULO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Oráculo'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Veamos el futuro de tus enemigos...');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/oracle.png');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_UTILITY);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //SABIDURIA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Sabiduría'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('La paciencia es una virtud de la que yo carezco.');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/wisdom.png');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(1500);
        $spell->setPeopleMaintenance(1000);
        $spell->setManaMaintenance(500);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName().' defense', $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //CHAMANISMO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Chamanismo'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Cabezas reducidas, conversiones en rana, cualquier cosa que necesites!');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/shamanism.png');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(300);
        $spell->setPeopleMaintenance(200);
        $spell->setManaMaintenance(100);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //ENCONTRAR ARTEFACTO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Encontrar Artefacto'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Conozco un arqueólogo que lleva sombrero y látigo...');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/findartifact.png');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_UTILITY);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //DESENCANTAR
        $spell = new Spell();
        $spell->setSkill($this->getReference('Desencantar'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Para cuando un ataque directo no es suficiente.');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/dispel.png');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_UTILITY);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //CONCENTRACION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Concentración'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Nuevos métodos para la extracción del Maná.');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/focus.png');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(300);
        $spell->setPeopleMaintenance(200);
        $spell->setManaMaintenance(100);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //BARRERA MENTAL
        $spell = new Spell();
        $spell->setSkill($this->getReference('Barrera Mental'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Podemos controlarlo todo con el poder de la mente.');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/mentalbarrier.png');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(1500);
        $spell->setPeopleMaintenance(1000);
        $spell->setManaMaintenance(500);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //REUNION ELEMENTAL
        $spell = new Spell();
        $spell->setSkill($this->getReference('Convocar Elementales'));
        $spell->setName('Reunión Elemental');
        $spell->setLore('Invocarlos es fácil, controlarlos es otra historia.');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/elementalgathering.png');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic() / 2);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic() / 2);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //TSUNAMI
        $spell = new Spell();
        $spell->setSkill($this->getReference('Tsunami'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Que las aguas ahoguen el fuego de tus enemigos.');
        $spell->setImage('bundles/archmagegame/images/spell/ghost/tsunami.png');
        $spell->setFaction($this->getReference('Fantasmal'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        /*
         * INVOCAR SAGRADO
         */

        //INVOCAR MONJES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Monjes'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR PALADINES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Paladines'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR UNICORNIOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Unicornios'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR PEGASOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Pegasos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR ANGELES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Ángeles'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR GRIFOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Grifos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE AIRE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elementales de Aire'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR ARCANGELES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Arcángeles'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR DOMINIONS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dominions'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(200);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR DRAGONES BLANCOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dragones Blancos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(200);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        /*
         * HECHIZOS SAGRADO
         */

        //SANACION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Sanación'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Sana, sana, culito de rana...');
        $spell->setImage('bundles/archmagegame/images/spell/holy/healing.png');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //CALMA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Calma'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Aquí paz y después gloria!');
        $spell->setImage('bundles/archmagegame/images/spell/holy/pacifism.png');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //DESTRUIR ARTEFACTO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Destruir Artefacto'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Es una pena que algo tan bonito deba ser destruido.');
        $spell->setImage('bundles/archmagegame/images/spell/holy/destroyartifact.png');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_UTILITY);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //FERVOR
        $spell = new Spell();
        $spell->setSkill($this->getReference('Fervor'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Gloria eterna, hermanos!');
        $spell->setImage('bundles/archmagegame/images/spell/holy/fervor.png');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //PAZ
        $spell = new Spell();
        $spell->setSkill($this->getReference('Paz'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('La paz es el estado intermedio entre dos guerras.');
        $spell->setImage('bundles/archmagegame/images/spell/holy/peace.png');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(300);
        $spell->setPeopleMaintenance(200);
        $spell->setManaMaintenance(100);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //PROSPERIDAD
        $spell = new Spell();
        $spell->setSkill($this->getReference('Prosperidad'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Han bajado los impuestos!');
        $spell->setImage('bundles/archmagegame/images/spell/holy/prosperity.png');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(300);
        $spell->setPeopleMaintenance(200);
        $spell->setManaMaintenance(100);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //OASIS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Oasis'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Agua fresca y descanso para nuestras exhaustas tropas. Ah, una araña!');
        $spell->setImage('bundles/archmagegame/images/spell/holy/oasis.png');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(1500);
        $spell->setPeopleMaintenance(1000);
        $spell->setManaMaintenance(500);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //PROTECCION DIVINA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Protección Divina'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Nada malo traspasará nuestro escudo.');
        $spell->setImage('bundles/archmagegame/images/spell/holy/divineprotection.png');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(1500);
        $spell->setPeopleMaintenance(1000);
        $spell->setManaMaintenance(500);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //PUERTA DE LOS CIELOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Convocar Celestiales'));
        $spell->setName('Puerta de los Cielos');
        $spell->setLore('Hemos venido a luchar contra el mal.');
        $spell->setImage('bundles/archmagegame/images/spell/holy/heavensdoor.png');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic() / 2);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic() / 2);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //PALABA SANTA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Palabra Santa'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Que nuestras oraciones derroten el mal de nuestros enemigos.');
        $spell->setImage('bundles/archmagegame/images/spell/holy/holyword.png');
        $spell->setFaction($this->getReference('Sagrado'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        /*
         * INVOCAR DESTRUCCION
         */

        //INVOCAR GOBLINS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Goblins'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR CERBEROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Cerberos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR MINOTAUROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Minotauros'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR OGROS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Ogros'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR QUIMERAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Quimeras'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR SALAMANDRAS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Salamandras'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR ELEMENTALES DE LAVA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Elementales de Lava'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR DIABLOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Diablos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR FENIX
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Fénix'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(200);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INVOCAR DRAGONES ROJOS
        $spell = new Spell();
        $spell->setSkill($this->getReference('Generar Dragones Rojos'));
        $spell->setName('Invocar '.$spell->getSkill()->getUnit()->getName());
        $spell->setLore($spell->getSkill()->getUnit()->getLore());
        $spell->setImage($spell->getSkill()->getUnit()->getImage());
        $spell->setFaction($spell->getSkill()->getUnit()->getFaction());
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic());
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(200);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        /*
         * HECHIZOS DESTRUCCION
         */

        //BOLA DE FUEGO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Bola de Fuego'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('No hay nada que no se pueda solucionar con una enorme bola de fuego.');
        $spell->setImage('bundles/archmagegame/images/spell/doom/fireball.png');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_UTILITY);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //TAMBORES DE GUERRA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Tambores de Guerra'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Infunden valor en los aliados y temor en los enemigos.');
        $spell->setImage('bundles/archmagegame/images/spell/doom/wardrums.png');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(1);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //FLECHAS ARDIENTES
        $spell = new Spell();
        $spell->setSkill($this->getReference('Flechas Ardientes'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Para darle un poco más de chispa al asunto.');
        $spell->setImage('bundles/archmagegame/images/spell/doom/burningarrow.png');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //FURIA DEMONIACA
        $spell = new Spell();
        $spell->setSkill($this->getReference('Furia Demoníaca'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Los demonios no necesitan una excusa para estar furiosos.');
        $spell->setImage('bundles/archmagegame/images/spell/doom/demonwrath.png');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(2);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //COMBUSTION
        $spell = new Spell();
        $spell->setSkill($this->getReference('Combustión'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Me encanta el olor a Maná quemado por la mañana, huele a victoria!');
        $spell->setImage('bundles/archmagegame/images/spell/doom/combustion.png');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_UTILITY);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //VOLCANO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Volcano'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Que no quede piedra sobre piedra.');
        $spell->setImage('bundles/archmagegame/images/spell/doom/volcano.png');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(3);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(300);
        $spell->setPeopleMaintenance(200);
        $spell->setManaMaintenance(100);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //SAQUEAR
        $spell = new Spell();
        $spell->setSkill($this->getReference('Saquear'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('La sed de sangre nunca se sacia.');
        $spell->setImage('bundles/archmagegame/images/spell/doom/loot.png');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_UTILITY);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName().' defense', $spell); //gods
        $spell->setPower(100000);
        $manager->persist($spell);

        //MURO IGNEO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Muro Ígneo'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Solo un loco intentaría atravesar estos muros.');
        $spell->setImage('bundles/archmagegame/images/spell/doom/igneouswall.png');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(4);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(1500);
        $spell->setPeopleMaintenance(1000);
        $spell->setManaMaintenance(500);
        $spell->setTurnsCost(self::TURNS_ENCHANTMENT);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(self::TURNS_EXPIRATION);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(true);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //PACTO DE SANGRE
        $spell = new Spell();
        $spell->setSkill($this->getReference('Convocar Demonios'));
        $spell->setName('Pacto de Sangre');
        $spell->setLore('Una vez que haces un pacto con el diablo, no hay vuelta atrás.');
        $spell->setImage('bundles/archmagegame/images/spell/doom/bloodpact.png');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic() / 2);
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_SUMMON * $spell->getMagic() / 2);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(0);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //INFIERNO
        $spell = new Spell();
        $spell->setSkill($this->getReference('Infierno'));
        $spell->setName($spell->getSkill()->getName());
        $spell->setLore('Que el fuego consuma el alma del enemigo.');
        $spell->setImage('bundles/archmagegame/images/spell/doom/inferno.png');
        $spell->setFaction($this->getReference('Caos'));
        $spell->setMagic(5);
        $spell->setGoldCost(0);
        $spell->setManaCost(self::MANA_COST * $spell->getMagic());
        $spell->setPeopleCost(0);
        $spell->setGoldMaintenance(0);
        $spell->setPeopleMaintenance(0);
        $spell->setManaMaintenance(0);
        $spell->setTurnsCost(self::TURNS_BATTLE);
        $spell->setTurnsResearch(self::TURNS_RESEARCH * $spell->getMagic());
        $spell->setTurnsExpiration(0);
        $spell->setGoldAuction(10000000);
        $spell->setRarity(90);
        $spell->setEnchantment(false);
        //$this->setReference($spell->getName(), $spell);
        $spell->setPower(100000);
        $manager->persist($spell);

        //FLUSH
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