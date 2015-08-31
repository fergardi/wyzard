<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Player;
use Archmage\GameBundle\Entity\Construction;
use Archmage\GameBundle\Entity\Research;
use Archmage\GameBundle\Entity\Item;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Message;
use Archmage\GameBundle\Entity\Enchantment;

class PlayerFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //PLAYER
        $player = new Player();
        $player->setNick('Fergardi');
        $player->setFaction($this->getReference('Oscuridad'));
        $player->setGold(3000000);
        $player->setMana(1000);
        $player->setPeople(20000);
        $player->setMagic(1);
        $player->setTurns(3000);
        $player->setItemDefense(null);
        $player->setResearchDefense(null);
        //EDIFICIOS
        $constructions = array(
            'Tierras' => 1000,
            'Barreras' => 10,
            'Fortalezas' => 10,
            'Gremios' => 10,
            'Talleres' => 10,
            'Nodos' => 10,
            'Pueblos' => 10,
            'Granjas' => 10,
            'Barracones' => 10,
        );
        foreach ($constructions as $name => $quantity) {
            $construction = new Construction();
            $construction->setBuilding($this->getReference($name));
            $construction->setQuantity($quantity);
            $construction->setPlayer($player);
            $manager->persist($construction);
            $player->addConstruction($construction);
        }
        //HECHIZOS
        $researchs = array(
            'Invocar Esqueletos' => 10,
            'Invocar Zombis' => 0,
        );
        foreach ($researchs as $name => $quantity) {
            $research = new Research();
            $research->setSpell($this->getReference($name));
            $research->setTurns($quantity);
            $research->setPlayer($player);
            $research->setActive(false);
            $manager->persist($research);
            $player->addResearch($research);
        }
        //UNIDADES
        $troops = array(
            'Arqueros' => 10,
            'Caballeros' => 10,
            'Catapultas' => 10,
            'Milicias' => 10,
            'Piqueros' => 10,
        );
        foreach ($troops as $name => $quantity) {
            $troop = new Troop();
            $troop->setUnit($this->getReference($name));
            $troop->setQuantity($quantity);
            $troop->setPlayer($player);
            $manager->persist($troop);
            $player->addTroop($troop);
        }
        //ARTEFACTOS
        $items = array(
            'Huevo de Dragón' => 1,
            'Poción de Maná' => 3,
        );
        foreach ($items as $name => $quantity) {
            $item = new Item();
            $item->setArtifact($this->getReference($name));
            $item->setQuantity($quantity);
            $item->setPlayer($player);
            $manager->persist($item);
            $player->addItem($item);
        }
        //ENCANTAMIENTOS
        $enchantment = new Enchantment();
        $enchantment->setSpell($this->getReference('Apocalipsis'));
        $enchantment->setVictim($player);
        $enchantment->setOwner($player);
        $manager->persist($enchantment);
        $player->addEnchantment($enchantment);
        $player->addCurse($enchantment);
        //MENSAJES
        $message = new Message();
        $message->setPlayer($player);
        $message->setSubject('Prueba');
        $message->setText('Prueba');
        $message->setOwner(null);
        $manager->persist($message);
        $player->addMessage($message);

        //PERSIST && FLUSH
        $this->setReference($player->getNick(), $player);
        $manager->persist($player);
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 10; // the order in which fixtures will be loaded
    }
}