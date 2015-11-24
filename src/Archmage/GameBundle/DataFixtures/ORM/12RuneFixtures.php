<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Rune;

class RuneFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //RUNA DE TELEGRAM
        $rune = new Rune();
        $rune->setName('Runa de Telegram');
        $rune->setImage('bundles/archmagegame/images/rune/telegram.jpg');
        $rune->setSkill($this->getReference($rune->getName()));
        $rune->setLore('Muy antigüas y podersosas, otorgan cierta ventaja sobre el resto de jugadores.');
        $rune->setCost(20);
        $manager->persist($rune);

        //RUNA DE ORO
        $rune = new Rune();
        $rune->setName('Runa de Oro');
        $rune->setImage('bundles/archmagegame/images/rune/gold.jpg');
        $rune->setSkill($this->getReference($rune->getName()));
        $rune->setLore('Muy antigüas y podersosas, otorgan cierta ventaja sobre el resto de jugadores.');
        $rune->setCost(5);
        $manager->persist($rune);

        //RUNA DE POBLACION
        $rune = new Rune();
        $rune->setName('Runa de Población');
        $rune->setImage('bundles/archmagegame/images/rune/people.jpg');
        $rune->setSkill($this->getReference($rune->getName()));
        $rune->setLore('Muy antigüas y podersosas, otorgan cierta ventaja sobre el resto de jugadores.');
        $rune->setCost(5);
        $manager->persist($rune);

        //RUNA DE MANA
        $rune = new Rune();
        $rune->setName('Runa de Maná');
        $rune->setImage('bundles/archmagegame/images/rune/mana.jpg');
        $rune->setSkill($this->getReference($rune->getName()));
        $rune->setLore('Muy antigüas y podersosas, otorgan cierta ventaja sobre el resto de jugadores.');
        $rune->setCost(5);
        $manager->persist($rune);

        //RUNA DE TIERRAS
        $rune = new Rune();
        $rune->setName('Runa de Tierras');
        $rune->setImage('bundles/archmagegame/images/rune/terrain.jpg');
        $rune->setSkill($this->getReference($rune->getName()));
        $rune->setLore('Muy antigüas y podersosas, otorgan cierta ventaja sobre el resto de jugadores.');
        $rune->setCost(15);
        $manager->persist($rune);

        //RUNA DE ARTEFACTOS
        $rune = new Rune();
        $rune->setName('Runa de Artefactos');
        $rune->setImage('bundles/archmagegame/images/rune/artifact.jpg');
        $rune->setSkill($this->getReference($rune->getName()));
        $rune->setLore('Muy antigüas y podersosas, otorgan cierta ventaja sobre el resto de jugadores.');
        $rune->setCost(5);
        $manager->persist($rune);

        //RUNA DE MAPAS
        $rune = new Rune();
        $rune->setName('Runa de Mapas');
        $rune->setImage('bundles/archmagegame/images/rune/map.jpg');
        $rune->setSkill($this->getReference($rune->getName()));
        $rune->setLore('Muy antigüas y podersosas, otorgan cierta ventaja sobre el resto de jugadores.');
        $rune->setCost(5);
        $manager->persist($rune);

        //RUNA DE RECETAS
        $rune = new Rune();
        $rune->setName('Runa de Recetas');
        $rune->setImage('bundles/archmagegame/images/rune/recipe.jpg');
        $rune->setSkill($this->getReference($rune->getName()));
        $rune->setLore('Muy antigüas y podersosas, otorgan cierta ventaja sobre el resto de jugadores.');
        $rune->setCost(5);
        $manager->persist($rune);

        //FLUSH
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 12; // the order in which fixtures will be loaded
    }
}