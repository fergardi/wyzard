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
        $hero->setLore('¿Cómo que es ilegal profanar tumbas?');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Comandar NoMuertos'));
        $hero->setFaction($this->getReference('Oscuridad'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //PARCA
        $hero = new Hero();
        $hero->setName('Parca');
        $hero->setImage('bundles/archmagegame/images/hero/darkness/death.jpg');
        $hero->setLore('Nada puede escapar de la muerte');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Parca'));
        $hero->setFaction($this->getReference('Oscuridad'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //MAGO NEGRO
        $hero = new Hero();
        $hero->setName('Mago Negro');
        $hero->setImage('bundles/archmagegame/images/hero/darkness/blackmage.jpg');
        $hero->setLore('Un pulmón por aquí, una pierna por allá, y como nuevo');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Mago Negro'));
        $hero->setFaction($this->getReference('Oscuridad'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //REY DE LOS DEMONIOS
        $hero = new Hero();
        $hero->setName('Rey Demonio');
        $hero->setImage('bundles/archmagegame/images/hero/doom/demonking.jpg');
        $hero->setLore('Uno no llega a Rey sin hacer algunos enemigos');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Comandar Demonios'));
        $hero->setFaction($this->getReference('Caos'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //JINETE DE DRAGONES
        $hero = new Hero();
        $hero->setName('Jinete de Dragones');
        $hero->setImage('bundles/archmagegame/images/hero/doom/dragonrider.jpg');
        $hero->setLore('');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setManaMaintenance(200);
        $hero->setPeopleMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
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
        $hero->setSkill($this->getReference('Zapador Goblin'));
        $hero->setFaction($this->getReference('Caos'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //CHAMAN
        $hero = new Hero();
        $hero->setName('Chamán');
        $hero->setImage('bundles/archmagegame/images/hero/ghost/shaman.jpg');
        $hero->setLore('Ejemplo de lore extenso en un par de frases cortas para ver si cabe en el chisme');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Chamán'));
        $hero->setFaction($this->getReference('Fantasmal'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //ALQUIMISTA
        $hero = new Hero();
        $hero->setName('Alquimista');
        $hero->setImage('bundles/archmagegame/images/hero/ghost/alchemist.jpg');
        $hero->setLore('Jesse, tenemos que cocinar...');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
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
        $hero->setSkill($this->getReference('Comandar Elementales'));
        $hero->setFaction($this->getReference('Fantasmal'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //SEÑOR DE LAS BESTIAS
        $hero = new Hero();
        $hero->setName('Cazador');
        $hero->setImage('bundles/archmagegame/images/hero/nature/hunter.jpg');
        $hero->setLore('Cuchi, cuchi, cuchi...');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Comandar Bestias'));
        $hero->setFaction($this->getReference('Naturaleza'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //LADRONA ELFA
        $hero = new Hero();
        $hero->setName('Ladrona Elfa');
        $hero->setImage('bundles/archmagegame/images/hero/nature/elfrogue.jpg');
        $hero->setLore('No te haré perder el tiempo, al menos no demasiado...');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Ladrona Elfa'));
        $hero->setFaction($this->getReference('Naturaleza'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //LEPRECHAUNT
        $hero = new Hero();
        $hero->setName('Leprechaunt');
        $hero->setImage('bundles/archmagegame/images/hero/nature/leprechaunt.jpg');
        $hero->setLore('Ves todo este oro? Ha desaparecido! Tachaaan!');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Leprechaunt'));
        $hero->setFaction($this->getReference('Naturaleza'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //MERCADER
        $hero = new Hero();
        $hero->setName('Mercader');
        $hero->setImage('bundles/archmagegame/images/hero/holy/merchant.jpg');
        $hero->setLore('No preguntes de dónde sale el dinero...');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Mercader'));
        $hero->setFaction($this->getReference('Sagrado'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //COMANDANTE
        $hero = new Hero();
        $hero->setName('Serafín');
        $hero->setImage('bundles/archmagegame/images/hero/holy/seraph.jpg');
        $hero->setLore('Me envía el de arriba.');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Comandar Celestiales'));
        $hero->setFaction($this->getReference('Sagrado'));
        $this->setReference($hero->getName(), $hero);
        $manager->persist($hero);

        //CRUZADO
        $hero = new Hero();
        $hero->setName('Cruzado');
        $hero->setImage('bundles/archmagegame/images/hero/holy/crusader.jpg');
        $hero->setLore('Por la gloria!');
        $hero->setExperience(self::EXPERIENCE_LEVEL);
        $hero->setGoldMaintenance(300);
        $hero->setPeopleMaintenance(200);
        $hero->setManaMaintenance(100);
        $hero->setGoldAuction(5000000);
        $hero->setRarity(0);
        $hero->setSkill($this->getReference('Comandar Humanos'));
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