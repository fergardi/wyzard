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
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ZOMBIS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Zombis'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR HOMBRES LOBO
        $skill = new Skill();
        $skill->setUnit($this->getReference('Hombres Lobo'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ESPECTROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Espectros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR LICHES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Liches'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR VAMPIROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Vampiros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR CABALLEROS NEGROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Caballeros Negros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE SOMBRA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Sombra'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR GARGOLAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Gárgolas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * NATURALEZA
         */

        //INVOCAR GORILAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Gorilas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELFOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elfos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DRUIDAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Druidas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR TROLLS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Trolls'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ENTS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Ents'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR BEHEMOTHS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Behemoths'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR SIERPES COLOSALES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Sierpes Colosales'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE TIERRA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Tierra'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR HIDRAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Hidras'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * FANTASMAL
         */

        //INVOCAR HADAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Hadas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR TRITONES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Tritones'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR SIRENAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Sirenas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR NAGAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Nagas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR MAGOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Magos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DJINNIS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Djinnis'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE AGUA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Agua'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR TITANES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Titanes'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR LEVIATANES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Leviatanes'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * SAGRADO
         */

        //INVOCAR MONJES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Monjes'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR PALADINES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Paladines'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR UNICORNIOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Unicornios'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR PEGASOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Pegasos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ANGELES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Ángeles'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR GRIFOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Grifos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE AIRE
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Aire'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ARCANGELES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Arcángeles'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DOMINIONS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Dominions'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * DESTRUCCION
         */

        //INVOCAR GOBLINS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Goblins'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR CERBEROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Cerberos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR OGROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Ogros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR QUIMERAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Quimeras'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR MINOTAUROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Minotauros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR SALAMANDRAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Salamandras'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE LAVA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Lava'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DIABLOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Diablos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR FENIX
        $skill = new Skill();
        $skill->setUnit($this->getReference('Fénix'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
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
        $skill->setDescription('Añade '.$skill->getQuantity().' '.$skill->getUnit()->getName().' a tu ejército.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * HECHIZOS DE CONVOCACION
         */

        //CONVOCAR DEMONIOS
        $skill = new Skill();
        $skill->setName('Convocar Demonios');
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
        $skill->setUnit(null);
        $skill->setFamily($this->getReference('Demonio'));
        $skill->setType(null);
        $skill->setDescription('Añade '.$skill->getQuantity().' unidades '.$skill->getFamily()->getName().' a tu ejército');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CONVOCAR CELESTIALES
        $skill = new Skill();
        $skill->setName('Convocar Celestiales');
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
        $skill->setUnit(null);
        $skill->setFamily($this->getReference('Celestial'));
        $skill->setType(null);
        $skill->setDescription('Añade '.$skill->getQuantity().' unidades '.$skill->getFamily()->getName().' a tu ejército');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CONVOCAR ELEMENTALES
        $skill = new Skill();
        $skill->setName('Convocar Elementales');
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
        $skill->setUnit(null);
        $skill->setFamily($this->getReference('Elemental'));
        $skill->setType(null);
        $skill->setDescription('Añade '.$skill->getQuantity().' unidades '.$skill->getFamily()->getName().' a tu ejército');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CONVOCAR NOMUERTOS
        $skill = new Skill();
        $skill->setName('Convocar NoMuertos');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(100);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily($this->getReference('NoMuerto'));
        $skill->setType(null);
        $skill->setDescription('Añade '.$skill->getQuantity().' unidades '.$skill->getFamily()->getName().' a tu ejército');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CONVOCAR DRAGONES
        $skill = new Skill();
        $skill->setName('Convocar Dragones');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(20);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily($this->getReference('Dragón'));
        $skill->setType(null);
        $skill->setDescription('Añade '.$skill->getQuantity().' unidades '.$skill->getFamily()->getName().' a tu ejército');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CONVOCAR BESTIAS
        $skill = new Skill();
        $skill->setName('Convocar Bestias');
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
        $skill->setUnit(null);
        $skill->setFamily($this->getReference('Bestia'));
        $skill->setType(null);
        $skill->setDescription('Añade '.$skill->getQuantity().' unidades '.$skill->getFamily()->getName().' a tu ejército');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * BONUS DE BATALLA
         */

        //NOMUERTOS MELEE BONUS
        $skill = new Skill();
        $skill->setName('NoMuertos Bonus Ataque Melee');
        $skill->setAttackBonus(5);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily($this->getReference('NoMuerto'));
        $skill->setType($this->getReference('Melee'));
        $skill->setDescription('Aumenta el daño de Melee de tus unidades NoMuertas un '.$skill->getAttackBonus().'%');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //NOMUERTOS DEFENSA
        $skill = new Skill();
        $skill->setName('NoMuertos Bonus Defensa');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(5);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily($this->getReference('NoMuerto'));
        $skill->setType(null);
        $skill->setDescription('Aumenta la defensa de tus unidades NoMuertas un '.$skill->getDefenseBonus().'%');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * RECURSOS
         */

        //GENERAR TIERRAS
        $skill = new Skill();
        $skill->setName('Generar Tierras');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(10);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //DESTRUIR TIERRAS
        $skill = new Skill();
        $skill->setName('Destruir Tierras');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(-10);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //GENERAR MANA
        $skill = new Skill();
        $skill->setName('Generar Maná');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(50);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //DESTRUIR MANA
        $skill = new Skill();
        $skill->setName('Destruir Maná');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(-50);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //GENERAR POBLACION
        $skill = new Skill();
        $skill->setName('Generar Población');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(20);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //DESTRUIR POBLACION
        $skill = new Skill();
        $skill->setName('Destruir Población');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(-20);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //GENERAR ORO
        $skill = new Skill();
        $skill->setName('Generar Oro');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(20);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //DESTRUIR ORO
        $skill = new Skill();
        $skill->setName('Destruir Oro');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(-20);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //AUMENTAR VELOCIDAD
        $skill = new Skill();
        $skill->setName('Aumentar Velocidad');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(10);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //REDUCIR VELOCIDAD
        $skill = new Skill();
        $skill->setName('Reducir Velocidad');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(-10);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantity(0);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
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