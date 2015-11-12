<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Archmage\GameBundle\Entity\Hero;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class HeroFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Constants
     */
    const EXPERIENCE_LEVEL = 50;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //NIGROMANTE
        $hero = new Hero();
        $hero->setName('Nigromante');
        $hero->setImage('bundles/archmagegame/images/hero/darkness/necromancer.jpg');
        $hero->setLore('Cómo que es ilegal profanar tumbas?');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Comandar NoMuertos'));
        $hero->setFaction($this->getReference('Oscuridad'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //PARCA
        $hero = new Hero();
        $hero->setName('Parca');
        $hero->setImage('bundles/archmagegame/images/hero/darkness/death.jpg');
        $hero->setLore('Nada puede escapar de la muerte.');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Parca'));
        $hero->setFaction($this->getReference('Oscuridad'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //MAGO NEGRO
        $hero = new Hero();
        $hero->setName('Mago Negro');
        $hero->setImage('bundles/archmagegame/images/hero/darkness/blackmage.jpg');
        $hero->setLore('Frankenstein no me llega ni a la suela del hueso.');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(50);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Mago Negro'));
        $hero->setFaction($this->getReference('Oscuridad'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //REY DE LOS DEMONIOS
        $hero = new Hero();
        $hero->setName('Rey Demonio');
        $hero->setImage('bundles/archmagegame/images/hero/doom/demonking.jpg');
        $hero->setLore('Uno no llega a Rey sin hacer algunos enemigos. Y matarlos a todos.');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Comandar Demonios'));
        $hero->setFaction($this->getReference('Caos'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //JINETE DE DRAGONES
        $hero = new Hero();
        $hero->setName('Jinete de Dragones');
        $hero->setImage('bundles/archmagegame/images/hero/doom/dragonrider.jpg');
        $hero->setLore('No tengo muy claro cómo he llegado hasta aquí.');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setManaMaintenance(200);
        $hero->setPeopleMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(90);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Comandar Dragones'));
        $hero->setFaction($this->getReference('Caos'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //ZAPADOR GOBLIN
        $hero = new Hero();
        $hero->setName('Zapador Goblin');
        $hero->setImage('bundles/archmagegame/images/hero/doom/goblinsapper.jpg');
        $hero->setLore('Inflamable significa flamable?!');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Zapador Goblin'));
        $hero->setFaction($this->getReference('Caos'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //CHAMAN
        $hero = new Hero();
        $hero->setName('Chamán');
        $hero->setImage('bundles/archmagegame/images/hero/ghost/shaman.jpg');
        $hero->setLore('Mi tribu me tiene en alta estima por la calidad de mi maná.');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(50);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Chamán'));
        $hero->setFaction($this->getReference('Fantasmal'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //ALQUIMISTA
        $hero = new Hero();
        $hero->setName('Alquimista');
        $hero->setImage('bundles/archmagegame/images/hero/ghost/alchemist.jpg');
        $hero->setLore('Esta poción parece caducada...');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Alquimista'));
        $hero->setFaction($this->getReference('Fantasmal'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //MAESTRO DE ELEMENTALES
        $hero = new Hero();
        $hero->setName('Elementalista');
        $hero->setImage('bundles/archmagegame/images/hero/ghost/elementalist.jpg');
        $hero->setLore('Ahora tengo frío, ahora tengo calor...');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Comandar Elementales'));
        $hero->setFaction($this->getReference('Fantasmal'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //SEÑOR DE LAS BESTIAS
        $hero = new Hero();
        $hero->setName('Cazador');
        $hero->setImage('bundles/archmagegame/images/hero/nature/hunter.jpg');
        $hero->setLore('Cuchi, cuchi, cuchi... NO ME MUERDAS!');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Comandar Bestias'));
        $hero->setFaction($this->getReference('Naturaleza'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //LADRONA ELFA
        $hero = new Hero();
        $hero->setName('Ladrona Elfa');
        $hero->setImage('bundles/archmagegame/images/hero/nature/elfrogue.jpg');
        $hero->setLore('Odio perder el tiempo, pero adoro hacérselo perder a los demás.');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Ladrona Elfa'));
        $hero->setFaction($this->getReference('Naturaleza'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //LEPRECHAUNT
        $hero = new Hero();
        $hero->setName('Leprechaunt');
        $hero->setImage('bundles/archmagegame/images/hero/nature/leprechaunt.jpg');
        $hero->setLore('Ves todo tu oro? Ha desaparecido! Tachaaan!');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Leprechaunt'));
        $hero->setFaction($this->getReference('Naturaleza'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //MERCADER
        $hero = new Hero();
        $hero->setName('Mercader');
        $hero->setImage('bundles/archmagegame/images/hero/holy/merchant.jpg');
        $hero->setLore('Me gustan las matemáticas.');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(50);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Mercader'));
        $hero->setFaction($this->getReference('Sagrado'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //SERAFIN
        $hero = new Hero();
        $hero->setName('Serafín');
        $hero->setImage('bundles/archmagegame/images/hero/holy/seraph.jpg');
        $hero->setLore('Me envía el de arriba para arreglar tus chapuzas.');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Comandar Celestiales'));
        $hero->setFaction($this->getReference('Sagrado'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //CRUZADO
        $hero = new Hero();
        $hero->setName('Cruzado');
        $hero->setImage('bundles/archmagegame/images/hero/holy/crusader.jpg');
        $hero->setLore('Mi escudo será lo último que veas!');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Comandar Humanos'));
        $hero->setFaction($this->getReference('Sagrado'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //DRIADA
        $hero = new Hero();
        $hero->setName('Dríada');
        $hero->setImage('bundles/archmagegame/images/hero/nature/dryad.jpg');
        $hero->setLore('Sé como hacer que vengan más Bestias...');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Dríada'));
        $hero->setFaction($this->getReference('Naturaleza'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //JINETE SIN CABEZA
        $hero = new Hero();
        $hero->setName('Jinete sin Cabeza');
        $hero->setImage('bundles/archmagegame/images/hero/darkness/headlesshorseman.jpg');
        $hero->setLore('Sé como hacer que vengan más NoMuertos...');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Jinete sin Cabeza'));
        $hero->setFaction($this->getReference('Oscuridad'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //ESPIRITUALISTA
        $hero = new Hero();
        $hero->setName('Espiritualista');
        $hero->setImage('bundles/archmagegame/images/hero/ghost/spiritualist.jpg');
        $hero->setLore('Sé como hacer que vengan más Elementales...');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Espiritualista'));
        $hero->setFaction($this->getReference('Fantasmal'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //SUCUBO
        $hero = new Hero();
        $hero->setName('Súcubo');
        $hero->setImage('bundles/archmagegame/images/hero/doom/succubus.jpg');
        $hero->setLore('Sé como hacer que vengan más Demonios...');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Súcubo'));
        $hero->setFaction($this->getReference('Caos'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //CAMPEON
        $hero = new Hero();
        $hero->setName('Campeón');
        $hero->setImage('bundles/archmagegame/images/hero/holy/champion.jpg');
        $hero->setLore('Sé como hacer que vengan más Celestiales...');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setPower(10000);
        $hero->setSkill($this->getReference('Campeón'));
        $hero->setFaction($this->getReference('Sagrado'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 8; // the order in which fixtures will be loaded
    }
}