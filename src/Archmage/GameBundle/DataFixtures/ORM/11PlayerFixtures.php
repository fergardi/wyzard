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
                'name' => 'Duggo, Dios de la Sangre',
                'faction' => 'Caos',
                'items' => array(
                    'Botas de Velocidad' => 9999,
                ),
                'heroes' => array(
                    'Jinete de Dragones' => 25,
                ),
                'troops' => array(
                    'Dragones Rojos' => 999,
                ),
            ),
            array(
                'name' => 'Surm, Dios de la Muerte',
                'faction' => 'Oscuridad',
                'items' => array(
                    'Botas de Velocidad' => 9999,
                ),
                'heroes' => array(
                    'Jinete de Dragones' => 25,
                ),
                'troops' => array(
                    'Dragones Negros' => 999,
                ),
            ),
            array(
                'name' => 'Lett, Diosa de la Luz',
                'faction' => 'Sagrado',
                'items' => array(
                    'Botas de Velocidad' => 9999,
                ),
                'heroes' => array(
                    'Jinete de Dragones' => 25,
                ),
                'troops' => array(
                    'Dragones Blancos' => 999,
                ),
            ),
            array(
                'name' => 'Sihir, Diosa de la Magia',
                'faction' => 'Fantasmal',
                'items' => array(
                    'Botas de Velocidad' => 9999,
                ),
                'heroes' => array(
                    'Jinete de Dragones' => 25,
                ),
                'troops' => array(
                    'Dragones Azules' => 999,
                ),
            ),
            array(
                'name' => 'Elama, Diosa de la Vida',
                'faction' => 'Naturaleza',
                'items' => array(
                    'Botas de Velocidad' => 9999,
                ),
                'heroes' => array(
                    'Jinete de Dragones' => 25,
                ),
                'troops' => array(
                    'Dragones Verdes' => 999,
                ),
            ),
        );
        $constructions = array(
            'Tierras' => 1999,
            'Granjas' => 1000,
            'Pueblos' => 1000,
            'Nodos' => 1000,
            'Gremios' => 1000,
            'Talleres' => 1000,
            'Barracones' => 1000,
            'Barreras' => 1000,
            'Fortalezas' => 1000,
        );
        foreach ($gods as $god) {
            $player = new Player();
            $manager->persist($player);
            $player->setGod(true);
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
            $player->setGold(999999999);
            $player->setPeople(9999999);
            $player->setMana(9999999);
            $player->setTurns(300);
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