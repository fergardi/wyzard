<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Skill;

class SkillFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /*
         * OSCURIDAD
         */

        //INVOCAR ESQUELETOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Esqueletos'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ZOMBIS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Zombis'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR HOMBRES LOBO
        $skill = new Skill();
        $skill->setUnit($this->getReference('Hombres Lobo'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ESPECTROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Espectros'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR LICHES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Liches'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR VAMPIROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Vampiros'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR CABALLEROS NEGROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Caballeros Negros'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE SOMBRA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Sombra'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR GARGOLAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Gárgolas'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * NATURALEZA
         */

        //INVOCAR GORILAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Gorilas'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELFOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elfos'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DRUIDAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Druidas'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR TROLLS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Trolls'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ENTS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Ents'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR BEHEMOTHS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Behemoths'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR SIERPES COLOSALES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Sierpes Colosales'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE TIERRA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Tierra'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR HIDRAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Hidras'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * FANTASMAL
         */

        //INVOCAR HADAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Hadas'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR TRITONES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Tritones'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR SIRENAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Sirenas'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR NAGAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Nagas'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR MAGOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Magos'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DJINNIS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Djinnis'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE AGUA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Agua'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR TITANES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Titanes'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR LEVIATANES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Leviatanes'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * SAGRADO
         */

        //INVOCAR MONJES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Monjes'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR PALADINES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Paladines'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR UNICORNIOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Unicornios'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR PEGASOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Pegasos'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ANGELES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Ángeles'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR GRIFOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Grifos'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE AIRE
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Aire'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ARCANGELES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Arcángeles'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DOMINIONS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Dominions'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * DESTRUCCION
         */

        //INVOCAR GOBLINS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Goblins'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR CERBEROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Cerberos'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR OGROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Ogros'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR QUIMERAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Quimeras'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR MINOTAUROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Minotauros'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR SALAMANDRAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Salamandras'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE LAVA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Lava'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DEMONIOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Demonios'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR FENIX
        $skill = new Skill();
        $skill->setUnit($this->getReference('Fénix'));
        $skill->setName('Invocar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

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