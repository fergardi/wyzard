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
         * OSCURIDAD
         */

        //ESQUELETOS
        $spell = new Spell();
        $spell->setName('Esqueletos');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ZOMBIS
        $spell = new Spell();
        $spell->setName('Zombis');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //HOMBRES LOBO
        $spell = new Spell();
        $spell->setName('Hombres Lobo');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ESPECTROS
        $spell = new Spell();
        $spell->setName('Espectros');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //LICHES
        $spell = new Spell();
        $spell->setName('Liches');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //VAMPIROS
        $spell = new Spell();
        $spell->setName('Vampiros');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //CABALLEROS NEGROS
        $spell = new Spell();
        $spell->setName('Caballeros Negros');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ELEMENTAL DE SOMBRA
        $spell = new Spell();
        $spell->setName('Elementales de Sombra');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //GARGOLAS
        $spell = new Spell();
        $spell->setName('Gárgolas');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //DRAGONES NEGROS
        $spell = new Spell();
        $spell->setName('Dragones Negros');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * NATURALEZA
         */

        //GORILAS
        $spell = new Spell();
        $spell->setName('Gorilas');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ELFOS
        $spell = new Spell();
        $spell->setName('Elfos');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //DRUIDAS
        $spell = new Spell();
        $spell->setName('Druidas');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //TROLLS
        $spell = new Spell();
        $spell->setName('Trolls');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ENTS
        $spell = new Spell();
        $spell->setName('Ents');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //BEHEMOTHS
        $spell = new Spell();
        $spell->setName('Behemoths');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ELEMENTAL DE TIERRA
        $spell = new Spell();
        $spell->setName('Elementales de Tierra');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //SIERPES COLOSALES
        $spell = new Spell();
        $spell->setName('Sierpes Colosales');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //HIDRAS
        $spell = new Spell();
        $spell->setName('Hidras');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //DRAGONES VERDES
        $spell = new Spell();
        $spell->setName('Dragones Verdes');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * FANTASMAL
         */

        //HADAS
        $spell = new Spell();
        $spell->setName('Hadas');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //TRITONES
        $spell = new Spell();
        $spell->setName('Tritones');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //SIRENAS
        $spell = new Spell();
        $spell->setName('Sirenas');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //NAGAS
        $spell = new Spell();
        $spell->setName('Nagas');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //MAGOS
        $spell = new Spell();
        $spell->setName('Magos');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //DJINNIS
        $spell = new Spell();
        $spell->setName('Djinnis');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ELEMENTAL DE AGUA
        $spell = new Spell();
        $spell->setName('Elementales de Agua');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //TITANES
        $spell = new Spell();
        $spell->setName('Titanes');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //LEVIATANES
        $spell = new Spell();
        $spell->setName('Leviatanes');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //DRAGONES AZULES
        $spell = new Spell();
        $spell->setName('Dragones Azules');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * SAGRADO
         */

        //MONJES
        $spell = new Spell();
        $spell->setName('Monjes');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //PALADINES
        $spell = new Spell();
        $spell->setName('Paladines');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //UNICORNIOS
        $spell = new Spell();
        $spell->setName('Unicornios');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //PEGASOS
        $spell = new Spell();
        $spell->setName('Pegasos');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ANGELES
        $spell = new Spell();
        $spell->setName('Ángeles');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //GRIFOS
        $spell = new Spell();
        $spell->setName('Grifos');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ELEMENTALES DE AIRE
        $spell = new Spell();
        $spell->setName('Elementales de Aire');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ARCANGELES
        $spell = new Spell();
        $spell->setName('Arcángeles');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //DOMINIONS
        $spell = new Spell();
        $spell->setName('Dominions');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //DRAGONES BLANCOS
        $spell = new Spell();
        $spell->setName('Dragones Blancos');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        /*
         * DESTRUCCION
         */

        //GOBLINS
        $spell = new Spell();
        $spell->setName('Goblins');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //CERBEROS
        $spell = new Spell();
        $spell->setName('Cerberos');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //OGROS
        $spell = new Spell();
        $spell->setName('Ogros');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //QUIMERAS
        $spell = new Spell();
        $spell->setName('Quimeras');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //MINOTAUROS
        $spell = new Spell();
        $spell->setName('Minotauros');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //SALAMANDRAS
        $spell = new Spell();
        $spell->setName('Salamandras');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //ELEMENTAL DE LAVA
        $spell = new Spell();
        $spell->setName('Elementales de Lava');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //DEMONIOS
        $spell = new Spell();
        $spell->setName('Demonios');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //FENIX
        $spell = new Spell();
        $spell->setName('Fénix');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
        $this->setReference($spell->getName(), $spell);
        $manager->persist($spell);

        //DRAGON ROJO
        $spell = new Spell();
        $spell->setName('Dragones Rojos');
        $spell->setUnit($this->getReference($spell->getName()));
        $spell->setName('Invocar '.$spell->getName());
        $spell->setDescription('Descripción');
        $spell->setLevel(1);
        $spell->setAttackBonus(0);
        $spell->setDefenseBonus(0);
        $spell->setSpeedBonus(0);
        $spell->setImage($spell->getUnit()->getImage());
        $spell->setFaction($spell->getUnit()->getFaction());
        $spell->setGoldAuction(null);
        $spell->setManaCost(0);
        $spell->setTurnCost(0);
        $spell->setTurnResearch(0);
        $spell->setSelfOnly(false);
        $spell->setBattleOnly(true);
        $spell->setUnitCount(0);
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