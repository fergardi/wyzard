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
        $artifact->setDescription('Esclarece zonas oscuras del mapa, sumando a tus tierras libres actuales un '.$artifact->getSkill()->getTerrainBonus().'% adicional.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //COFRE DEL TESORO
        $artifact = new Artifact();
        $artifact->setName('Cofre del Tesoro');
        $artifact->setImage('bundles/archmagegame/images/artifact/treasurechest.jpg');
        $artifact->setSkill($this->getReference('Generar Oro'));
        $artifact->setDescription('Contiene grandes riquezas, aumentando tus reservas actuales de oro un '.$artifact->getSkill()->getGoldBonus().'%.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //POCION DE MANA
        $artifact = new Artifact();
        $artifact->setName('Poción de Maná');
        $artifact->setImage('bundles/archmagegame/images/artifact/manapotion.jpg');
        $artifact->setSkill($this->getReference('Generar Maná'));
        $artifact->setDescription('Recarga tus almacenamientos de magia, aumentando tus reservas actuales de maná un '.$artifact->getSkill()->getManaBonus().'%.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //VORTICE DE MANA
        $artifact = new Artifact();
        $artifact->setName('Vórtice de Maná');
        $artifact->setImage('bundles/archmagegame/images/artifact/manavortex.jpg');
        $artifact->setSkill($this->getReference('Destruir Maná'));
        $artifact->setDescription('Absorbe y destruye un las reservas enemigas actuales de maná un '.$artifact->getSkill()->getManaBonus().'%.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //ELIXIR DE AMOR
        $artifact = new Artifact();
        $artifact->setName('Elixir de Amor');
        $artifact->setImage('bundles/archmagegame/images/artifact/loveelixir.jpg');
        $artifact->setSkill($this->getReference('Generar Población'));
        $artifact->setDescription('Incrementa la tasa de natalidad de tu reino, aumentando tu población actual un '.$artifact->getSkill()->getPeopleBonus().'%.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //VIAL DE VENENO
        $artifact = new Artifact();
        $artifact->setName('Vial de Veneno');
        $artifact->setImage('bundles/archmagegame/images/artifact/poisonvial.jpg');
        $artifact->setSkill($this->getReference('Destruir Población'));
        $artifact->setDescription('Envenena el agua y disminuye la población actual enemiga un '.$artifact->getSkill()->getPeopleBonus().'%.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //HUEVO DE DRAGON
        $artifact = new Artifact();
        $artifact->setName('Huevo de Dragón');
        $artifact->setImage('bundles/archmagegame/images/artifact/dragonegg.jpg');
        $artifact->setSkill($this->getReference('Convocar Dragones'));
        $artifact->setDescription('Al eclosionar, convocará alrededor de '.$artifact->getSkill()->getQuantity().' '.$artifact->getSkill()->getFamily()->getName().'(s/es) al azar a tu ejército.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $this->setReference($artifact->getName(), $artifact);
        $manager->persist($artifact);

        //TELA DE ARAÑA
        $artifact = new Artifact();
        $artifact->setName('Tela de Araña');
        $artifact->setImage('bundles/archmagegame/images/artifact/spiderweb.jpg');
        $artifact->setSkill($this->getReference('Reducir Velocidad'));
        $artifact->setDescription('Reduce la velocidad de una tropa enemiga al azar en combate '.$artifact->getSkill()->getSpeedBonus().' puntos.');
        $artifact->setGoldAuction(0);
        $artifact->setRarityAuction(0);
        $this->setReference($artifact->getName(), $artifact);
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