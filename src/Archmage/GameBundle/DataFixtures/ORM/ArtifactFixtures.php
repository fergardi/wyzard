<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Artifact;

class ArtifactFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //BRUJULA MAGICA
        $artifact = new Artifact();
        $artifact->setName('Brújula Mágica');
        $artifact->setImage('bundles/archmagegame/images/artifact/magiccompass.jpg');
        $artifact->setSkill($this->getReference('Generar Tierras'));
        $artifact->setDescription('Este artefacto encontrará nuevos territorios y te otorgará un <b>'.$artifact->getSkill()->getTerrainBonus().'%</b> de <b>tierras libres</b> adicionales.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $manager->persist($artifact);

        //COFRE DEL TESORO
        $artifact = new Artifact();
        $artifact->setName('Cofre del Tesoro');
        $artifact->setImage('bundles/archmagegame/images/artifact/treasurechest.jpg');
        $artifact->setSkill($this->getReference('Generar Oro'));
        $artifact->setDescription('Este artefacto contiene grandes riquezas y te otorgará un <b>'.$artifact->getSkill()->getGoldBonus().'%</b> más de <b>oro</b>, basado en tu oro actual.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $manager->persist($artifact);

        //POCION DE MANA
        $artifact = new Artifact();
        $artifact->setName('Poción de Maná');
        $artifact->setImage('bundles/archmagegame/images/artifact/manapotion.jpg');
        $artifact->setSkill($this->getReference('Generar Maná'));
        $artifact->setDescription('Este artefacto recargará tus reservas de magia, otorgando un aumento del <b>'.$artifact->getSkill()->getManaBonus().'%</b> de tu <b>maná</b> máximo.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $manager->persist($artifact);

        //VORTICE DE MANA
        $artifact = new Artifact();
        $artifact->setName('Vórtice de Maná');
        $artifact->setImage('bundles/archmagegame/images/artifact/manavortex.jpg');
        $artifact->setSkill($this->getReference('Destruir Maná'));
        $artifact->setDescription('Este artefacto descargará, absorverá y destruirá un <b>'.$artifact->getSkill()->getManaBonus().'%</b> del <b>maná</b> máximo enemigo.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $manager->persist($artifact);

        //POCION DE AMOR
        $artifact = new Artifact();
        $artifact->setName('Poción de Amor');
        $artifact->setImage('bundles/archmagegame/images/artifact/lovepotion.jpg');
        $artifact->setSkill($this->getReference('Generar Población'));
        $artifact->setDescription('Este artefacto aumentará la tasa de natalidad de tu reino, otorgando un aumento del <b>'.$artifact->getSkill()->getPeopleBonus().'%</b> de tu <b>población</b> máxima.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $manager->persist($artifact);

        //VENENO
        $artifact = new Artifact();
        $artifact->setName('Veneno');
        $artifact->setImage('bundles/archmagegame/images/artifact/poison.jpg');
        $artifact->setSkill($this->getReference('Destruir Población'));
        $artifact->setDescription('Este artefacto envenenará y matará un <b>'.$artifact->getSkill()->getPeopleBonus().'%</b> de la <b>población</b> máxima enemiga.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $manager->persist($artifact);

        //HUEVO DE DRAGON
        $artifact = new Artifact();
        $artifact->setName('Huevo de Dragón');
        $artifact->setImage('bundles/archmagegame/images/artifact/dragonegg.jpg');
        $artifact->setSkill($this->getReference('Convocar Dragones'));
        $artifact->setDescription('Este artefacto eclosionará y convocará alrededor de <b>'.$artifact->getSkill()->getQuantity().'</b> unidades <b>'.$artifact->getSkill()->getFamily()->getName().'</b> al azar.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $manager->persist($artifact);

        //TELA DE ARAÑA
        $artifact = new Artifact();
        $artifact->setName('Tela de Araña');
        $artifact->setImage('bundles/archmagegame/images/artifact/spiderweb.jpg');
        $artifact->setSkill($this->getReference('Disminuir Velocidad'));
        $artifact->setDescription('Este artefacto disminuirá <b>'.$artifact->getSkill()->getSpeedBonus().'</b> puntos la <b>velocidad</b> de una <b>tropa</b> enemiga al azar en combate.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $manager->persist($artifact);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 9; // the order in which fixtures will be loaded
    }
}