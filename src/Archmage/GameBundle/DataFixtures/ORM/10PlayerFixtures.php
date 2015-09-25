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
use Archmage\GameBundle\Entity\Contract;
use Archmage\GameBundle\Entity\Message;
use Archmage\GameBundle\Entity\Enchantment;
use Archmage\UserBundle\Entity\User;

class PlayerFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /*
         * GODS
         */
        $gods = array(
            array('name' => 'Duggo, Dios de la Sangre', 'faction' => 'Caos', 'unit' => 'Dragones Rojos', 'enchantment' => 'Muro Ígneo enchant'),
            array('name' => 'Surm, Dios de la Muerte', 'faction' => 'Oscuridad', 'unit' => 'Dragones Negros', 'enchantment' => 'Brujería enchant'),
            array('name' => 'Lett, Diosa de la Luz', 'faction' => 'Sagrado', 'unit' => 'Dragones Blancos', 'enchantment' => 'Protección Divina enchant'),
            array('name' => 'Sihir, Diosa de la Magia', 'faction' => 'Fantasmal', 'unit' => 'Dragones Azules', 'enchantment' => 'Barrera Mental enchant'),
            array('name' => 'Elama, Diosa de la Vida', 'faction' => 'Naturaleza', 'unit' => 'Dragones Verdes', 'enchantment' => 'Favor de la Naturaleza enchant'),
        );
        foreach ($gods as $god) {
            $player = new Player();
            $manager->persist($player);
            $player->setGod(true);
            $player->setNick($god['name']);
            $player->setFaction($this->getReference($god['faction']));
            $player->setItem(null);
            $player->setResearch(null);
            $constructions = array(
                'Tierras' => 0,
                'Granjas' => 0,
                'Pueblos' => 0,
                'Nodos' => 0,
                'Gremios' => 0,
                'Talleres' => 0,
                'Barracones' => 0,
                'Barreras' => 9999,
                'Fortalezas' => 0,
            );
            foreach ($constructions as $name => $quantity) {
                $construction = new Construction();
                $construction->setBuilding($this->getReference($name));
                $construction->setQuantity($quantity);
                $construction->setPlayer($player);
                $manager->persist($construction);
                $player->addConstruction($construction);
            }
            $spells = $manager->getRepository('ArchmageGameBundle:Spell')->findAll();
            foreach ($spells as $spell) {
                $research = new Research();
                $research->setSpell($spell);
                $research->setTurns(0);
                $research->setPlayer($player);
                $research->setActive(true);
                $manager->persist($research);
                $player->addResearch($research);
            }
            $enchantments = array(
                $god['enchantment'],
            );
            foreach ($enchantments as $name) {
                $enchantment = new Enchantment();
                $enchantment->setSpell($this->getReference($name));
                $enchantment->setVictim($player);
                $enchantment->setOwner($player);
                $manager->persist($enchantment);
                $player->addEnchantmentsOwner($enchantment);
                $player->addEnchantmentsVictim($enchantment);
            }
            $troops = array(
                $god['unit'] => 666,
            );
            foreach ($troops as $name => $quantity) {
                $troop = new Troop();
                $troop->setUnit($this->getReference($name));
                $troop->setQuantity($quantity);
                $troop->setPlayer($player);
                $manager->persist($troop);
                $player->addTroop($troop);
            }
            $player->setGold(0);
            $player->setPeople(0);
            $player->setMana(0);
            $player->setTurns(0);
            $player->setMagic(5);
        }

        //PLAYER
        $player = new Player();
        $player->setFaction($this->getReference('Oscuridad'));
        $player->setGod(false);
        $player->setItem(null);
        $player->setResearch(null);
        //EDIFICIOS
        $constructions = array(
            'Tierras' => 600,
            'Granjas' => 20,
            'Pueblos' => 20,
            'Nodos' => 20,
            'Gremios' => 0,
            'Talleres' => 5,
            'Barracones' => 0,
            'Barreras' => 0,
            'Fortalezas' => 1,
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
            'Oráculo spell',
            'Encontrar Artefacto spell',
        );
        foreach ($researchs as $name) {
            $research = new Research();
            $research->setSpell($this->getReference($name));
            $research->setTurns(0);
            $research->setPlayer($player);
            $research->setActive(true);
            $manager->persist($research);
            $player->addResearch($research);
        }
        //UNIDADES
        $troops = array(
            'Arqueros' => 100,
            'Caballeros' => 100,
            'Catapultas' => 100,
            'Milicias' => 100,
            'Piqueros' => 100,
        );
        foreach ($troops as $name => $quantity) {
            $troop = new Troop();
            $troop->setUnit($this->getReference($name));
            $troop->setQuantity($quantity);
            $troop->setPlayer($player);
            $manager->persist($troop);
            $player->addTroop($troop);
        }
        /*
        //HEROES
        $contracts = array(
            'Jinete de Dragones',
        );
        foreach ($contracts as $name) {
            $contract = new Contract();
            $contract->setHero($this->getReference($name));
            $contract->setPlayer($player);
            $manager->persist($contract);
            $player->addContract($contract);
        }
        */
        /*
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
        */
        /*
        //ENCANTAMIENTOS
        $enchantment = new Enchantment();
        $enchantment->setSpell($this->getReference('Plaga enchant'));
        $enchantment->setVictim($player);
        $enchantment->setOwner($player);
        $manager->persist($enchantment);
        $player->addEnchantmentsOwner($enchantment);
        $player->addEnchantmentsVictim($enchantment);
        $enchantment = new Enchantment();
        $enchantment->setSpell($this->getReference('Paz enchant'));
        $enchantment->setVictim($player);
        $enchantment->setOwner($player);
        $manager->persist($enchantment);
        $player->addEnchantmentsOwner($enchantment);
        $player->addEnchantmentsVictim($enchantment);
        $enchantment = new Enchantment();
        $enchantment->setSpell($this->getReference('Volcano enchant'));
        $enchantment->setVictim($player);
        $enchantment->setOwner($player);
        $manager->persist($enchantment);
        $player->addEnchantmentsOwner($enchantment);
        $player->addEnchantmentsVictim($enchantment);
        */
        //MENSAJES
        $message = new Message();
        $message->setPlayer($player);
        $message->setSubject('Bienvenido');
        $text = array(
            array('info', 12, 0, 'center', 'Te doy la bienvenida a mi juego. Te recomiendo encarecidamente que te des un paseo por la Ayuda del juego.'),
        );
        $message->setText($text);
        $message->setClass('info');
        $message->setOwner(null);
        $message->setReaded(false);
        $manager->persist($message);
        $player->addMessage($message);
        //RECURSOS
        $player->setGold(3000000);
        $player->setPeople(20000);
        $player->setMana(10000);
        $player->setTurns(30000);
        $player->setMagic(1);
        //FOSUSERBUNDLE
        $user = new User();
        $user->setPlayer($player);
        $user->setUsername('Fergardi');
        $player->setNick($user->getUsername());
        $user->setEmail('fergardi@email.com');
        $user->setPlainPassword('fernando');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));
        $manager->persist($user);

        //PERSIST && FLUSH
        $this->setReference($user->getUsername(), $player);
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