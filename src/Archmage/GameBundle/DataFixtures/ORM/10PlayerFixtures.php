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
        //PLAYER
        $player = new Player();
        $player->setFaction($this->getReference('Oscuridad'));
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
        /*
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
        */
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
        /*
        //ENCANTAMIENTOS
        $enchantment = new Enchantment();
        $enchantment->setSpell($this->getReference('Apocalipsis'));
        $enchantment->setVictim($player);
        $enchantment->setOwner($player);
        $manager->persist($enchantment);
        $player->addEnchantment($enchantment);
        */
        //MENSAJES
        $message = new Message();
        $message->setPlayer($player);
        $message->setSubject('Mensaje directo');
        $text = array(
            'content' => array(
                '0' => array(
                    'class' => 'info',
                    'length' => '12',
                    'offset' => '0',
                    'align' => 'center',
                    'text' => 'Este es un mensaje de bienvenida generado automaticamente por el servidor.',
                ),
            ),
        );
        $message->setText(json_encode($text));
        $message->setClass('info');
        $message->setOwner(null);
        $message->setReaded(false);
        $manager->persist($message);
        $player->addMessage($message);

        //MENSAJES
        $message = new Message();
        $message->setPlayer($player);
        $message->setSubject('Mercado Negro');
        $text = array(
            'content' => array(
                '0' => array(
                    'class' => 'success',
                    'length' => '12',
                    'offset' => '0',
                    'align' => 'center',
                    'text' => 'Has ganado una subasta.',
                ),
            ),
        );
        $message->setText(json_encode($text));
        $message->setClass('success');
        $message->setOwner(null);
        $message->setReaded(false);
        $manager->persist($message);
        $player->addMessage($message);

        //MENSAJES
        $message = new Message();
        $message->setPlayer($player);
        $message->setSubject('Reporte de Batalla');
        $text = array(
            'content' => array(
                '0' => array(
                    'class' => 'default',
                    'length' => '12',
                    'align' => 'center',
                    'offset' => '0',
                    'text' => 'Inicio de la batalla',
                ),
                '1' => array(
                    'class' => 'warning',
                    'length' => '9',
                    'align' => 'left',
                    'offset' => '0',
                    'text' => 'Cosas del jugador izquierdo',
                ),
                '2' => array(
                    'class' => 'info',
                    'length' => '9',
                    'offset' => '3',
                    'align' => 'right',
                    'text' => 'Cosas del jugador derecho',
                ),
                '3' => array(
                    'class' => 'warning',
                    'length' => '9',
                    'align' => 'left',
                    'offset' => '0',
                    'text' => 'Cosas del jugador izquierdo',
                ),
                '4' => array(
                    'class' => 'info',
                    'length' => '9',
                    'offset' => '3',
                    'align' => 'right',
                    'text' => 'Cosas del jugador derecho',
                ),
                '5' => array(
                    'class' => 'warning',
                    'length' => '9',
                    'align' => 'left',
                    'offset' => '0',
                    'text' => 'Cosas del jugador izquierdo',
                ),
                '6' => array(
                    'class' => 'info',
                    'length' => '9',
                    'offset' => '3',
                    'align' => 'right',
                    'text' => 'Cosas del jugador derecho',
                ),
                '7' => array(
                    'class' => 'default',
                    'length' => '12',
                    'offset' => '0',
                    'align' => 'center',
                    'text' => 'Resultado final',
                ),
            ),
        );
        $message->setText(json_encode($text));
        $message->setClass('danger');
        $message->setOwner(null);
        $message->setReaded(false);
        $manager->persist($message);
        $player->addMessage($message);

        //gold, people, player, based on constructions should be last
        $player->setGold(3000000);
        $player->setPeople(20000);
        $player->setMana(1000);
        $player->setTurns(30000);
        $player->setMagic(1);

        //user
        $user = new User();
        $user->setPlayer($player);
        $user->setUsername('fergardi');
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