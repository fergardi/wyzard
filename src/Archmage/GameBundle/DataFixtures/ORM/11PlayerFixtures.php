<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Archmage\GameBundle\Entity\Achievement;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
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

class PlayerFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /*
         * GODS
         */
        $gods = array(
            array(
                'name' => 'Dwaleen, Dios de la Sangre',
                'faction' => 'Caos',
                'items' => array(
                    'Poción de Agilidad' => 99,
                ),
                'heroes' => array(
                    'Jinete de Dragones' => rand(5,30),
                ),
                'troops' => array(
                    'Dragones Rojos' => rand(30,60),
                ),
            ),
            array(
                'name' => 'Surm, Dios de la Muerte',
                'faction' => 'Oscuridad',
                'items' => array(
                    'Poción de Agilidad' => 99,
                ),
                'heroes' => array(
                    'Jinete de Dragones' => rand(5,30),
                ),
                'troops' => array(
                    'Dragones Negros' => rand(30,60),
                ),
            ),
            array(
                'name' => 'Jalazu, Diosa de la Luz',
                'faction' => 'Sagrado',
                'items' => array(
                    'Poción de Agilidad' => 99,
                ),
                'heroes' => array(
                    'Jinete de Dragones' => rand(5,30),
                ),
                'troops' => array(
                    'Dragones Blancos' => rand(30,60),
                ),
            ),
            array(
                'name' => 'Swott, Dios de la Magia',
                'faction' => 'Fantasmal',
                'items' => array(
                    'Poción de Agilidad' => 99,
                ),
                'heroes' => array(
                    'Jinete de Dragones' => rand(5,30),
                ),
                'troops' => array(
                    'Dragones Azules' => rand(30,60),
                ),
            ),
            array(
                'name' => 'Elama, Diosa de la Vida',
                'faction' => 'Naturaleza',
                'items' => array(
                    'Poción de Agilidad' => 99,
                ),
                'heroes' => array(
                    'Jinete de Dragones' => rand(5,30),
                ),
                'troops' => array(
                    'Dragones Verdes' => rand(30,60),
                ),
            ),
        );
        foreach ($gods as $god) {
            $constructions = array(
                'Tierras' => rand(3000,9000),
                'Granjas' => 0,
                'Pueblos' => 0,
                'Nodos' => 0,
                'Gremios' => 0,
                'Talleres' => 0,
                'Barracones' => 0,
                'Barreras' => 500,
                'Fortalezas' => 500,
            );
            $player = new Player();
            $manager->persist($player);
            $player->setGod(true);
            $player->setWinner(false);
            $player->setNick($god['name']);
            $player->setFaction($this->getReference($god['faction']));
            $player->setItem(null);
            $player->setResearch(null);
            //constructions
            foreach ($constructions as $name => $quantity) {
                $construction = new Construction();
                $construction->setBuilding($this->getReference($name));
                $construction->setQuantity($quantity);
                $construction->setPlayer($player);
                $manager->persist($construction);
                $player->addConstruction($construction);
            }
            //items
            $items = $god['items'];
            foreach ($items as $name => $quantity) {
                $item = new Item();
                $item->setArtifact($this->getReference($name));
                $item->setQuantity($quantity);
                $item->setPlayer($player);
                $manager->persist($item);
                $player->addItem($item);
                //defense
                $player->setItem($item);
            }
            //troops
            $troops = $god['troops'];
            foreach ($troops as $name => $quantity) {
                $troop = new Troop();
                $troop->setUnit($this->getReference($name));
                $troop->setQuantity($quantity);
                $troop->setPlayer($player);
                $manager->persist($troop);
                $player->addTroop($troop);
            }
            //heroes
            $contracts = $god['heroes'];
            foreach ($contracts as $name => $level) {
                $contract = new Contract();
                $contract->setHero($this->getReference($name));
                $contract->setLevel($level);
                $contract->setPlayer($player);
                $manager->persist($contract);
                $player->addContract($contract);
            }
            //resources
            $player->setGold(99999999);
            $player->setPeople(0);
            $player->setMana(0);
            $player->setTurns(0);
            $player->setMagic(10);
            //achievements
            $achievements = $manager->getRepository('ArchmageGameBundle:Achievement')->findAll();
            foreach ($achievements as $achievement) {
                $player->addAchievement($achievement);
            }
        }
        //FLUSH
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 11; // the order in which fixtures will be loaded
    }
}