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
                'constructions' => array(
                    'Tierras' => rand(500,1000),
                    'Granjas' => rand(500,1000),
                    'Pueblos' => rand(500,1000),
                    'Nodos' => rand(500,1000),
                    'Gremios' => rand(500,1000),
                    'Talleres' => rand(500,1000),
                    'Barracones' => rand(500,1000),
                    'Barreras' => rand(100,300),
                    'Fortalezas' => rand(100,300),
                ),
                'items' => array(
                    'Poción de Agilidad' => 99,
                ),
                'enchantments' => array (
                    'Brujería',
                    'Barrera Mental',
                    'Muro Ígneo',
                    'Favor de la Naturaleza',
                    'Protección Divina',
                ),
                'heroes' => array(
                    'Jinete de Dragones' => rand(5,20),
                    'Nigromante' => rand(5,20),
                ),
                'troops' => array(
                    'Dragones Rojos' => rand(10,20),
                    'Dragones Negros' => rand(10,20),
                    'Dragones Blancos' => rand(10,20),
                    'Dragones Azules' => rand(10,20),
                    'Dragones Verdes' => rand(10,20),
                ),
            ),
            array(
                'name' => 'Surm, Dios de la Muerte',
                'faction' => 'Oscuridad',
                'constructions' => array(
                    'Tierras' => rand(500,1000),
                    'Granjas' => rand(500,1000),
                    'Pueblos' => rand(500,1000),
                    'Nodos' => rand(500,1000),
                    'Gremios' => rand(500,1000),
                    'Talleres' => rand(500,1000),
                    'Barracones' => rand(500,1000),
                    'Barreras' => rand(100,300),
                    'Fortalezas' => rand(100,300),
                ),
                'items' => array(
                    'Poción de Agilidad' => 99,
                ),
                'enchantments' => array (
                    'Brujería',
                    'Barrera Mental',
                    'Muro Ígneo',
                    'Favor de la Naturaleza',
                    'Protección Divina',
                ),
                'heroes' => array(
                    'Jinete de Dragones' => rand(5,20),
                    'Nigromante' => rand(5,20),
                ),
                'troops' => array(
                    'Dragones Rojos' => rand(10,20),
                    'Dragones Negros' => rand(10,20),
                    'Dragones Blancos' => rand(10,20),
                    'Dragones Azules' => rand(10,20),
                    'Dragones Verdes' => rand(10,20),
                ),
            ),
            array(
                'name' => 'Jalazu, Diosa de la Luz',
                'faction' => 'Sagrado',
                'constructions' => array(
                    'Tierras' => rand(500,1000),
                    'Granjas' => rand(500,1000),
                    'Pueblos' => rand(500,1000),
                    'Nodos' => rand(500,1000),
                    'Gremios' => rand(500,1000),
                    'Talleres' => rand(500,1000),
                    'Barracones' => rand(500,1000),
                    'Barreras' => rand(100,300),
                    'Fortalezas' => rand(100,300),
                ),
                'items' => array(
                    'Poción de Agilidad' => 99,
                ),
                'enchantments' => array (
                    'Brujería',
                    'Barrera Mental',
                    'Muro Ígneo',
                    'Favor de la Naturaleza',
                    'Protección Divina',
                ),
                'heroes' => array(
                    'Jinete de Dragones' => rand(5,20),
                    'Nigromante' => rand(5,20),
                ),
                'troops' => array(
                    'Dragones Rojos' => rand(10,20),
                    'Dragones Negros' => rand(10,20),
                    'Dragones Blancos' => rand(10,20),
                    'Dragones Azules' => rand(10,20),
                    'Dragones Verdes' => rand(10,20),
                ),
            ),
            array(
                'name' => 'Swott, Dios de la Magia',
                'faction' => 'Fantasmal',
                'constructions' => array(
                    'Tierras' => rand(500,1000),
                    'Granjas' => rand(500,1000),
                    'Pueblos' => rand(500,1000),
                    'Nodos' => rand(500,1000),
                    'Gremios' => rand(500,1000),
                    'Talleres' => rand(500,1000),
                    'Barracones' => rand(500,1000),
                    'Barreras' => rand(100,300),
                    'Fortalezas' => rand(100,300),
                ),
                'items' => array(
                    'Poción de Agilidad' => 99,
                ),
                'enchantments' => array (
                    'Brujería',
                    'Barrera Mental',
                    'Muro Ígneo',
                    'Favor de la Naturaleza',
                    'Protección Divina',
                ),
                'heroes' => array(
                    'Jinete de Dragones' => rand(5,20),
                    'Nigromante' => rand(5,20),
                ),
                'troops' => array(
                    'Dragones Rojos' => rand(10,20),
                    'Dragones Negros' => rand(10,20),
                    'Dragones Blancos' => rand(10,20),
                    'Dragones Azules' => rand(10,20),
                    'Dragones Verdes' => rand(10,20),
                ),
            ),
            array(
                'name' => 'Elama, Diosa de la Vida',
                'faction' => 'Naturaleza',
                'constructions' => array(
                    'Tierras' => rand(500,1000),
                    'Granjas' => rand(500,1000),
                    'Pueblos' => rand(500,1000),
                    'Nodos' => rand(500,1000),
                    'Gremios' => rand(500,1000),
                    'Talleres' => rand(500,1000),
                    'Barracones' => rand(500,1000),
                    'Barreras' => rand(100,300),
                    'Fortalezas' => rand(100,300),
                ),
                'items' => array(
                    'Poción de Agilidad' => 99,
                ),
                'enchantments' => array (
                    'Brujería',
                    'Barrera Mental',
                    'Muro Ígneo',
                    'Favor de la Naturaleza',
                    'Protección Divina',
                ),
                'heroes' => array(
                    'Jinete de Dragones' => rand(5,20),
                    'Nigromante' => rand(5,20),
                ),
                'troops' => array(
                    'Dragones Rojos' => rand(10,20),
                    'Dragones Negros' => rand(10,20),
                    'Dragones Blancos' => rand(10,20),
                    'Dragones Azules' => rand(10,20),
                    'Dragones Verdes' => rand(10,20),
                ),
            ),
        );
        foreach ($gods as $god) {
            $player = new Player();
            $manager->persist($player);
            $player->setGod(true);
            $player->setWinner(false);
            $player->setNick($god['name']);
            $player->setFaction($this->getReference($god['faction']));
            $player->setItem(null);
            $player->setResearch(null);
            //constructions
            $constructions = $god['constructions'];
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
            $player->setGold(rand(50000000,100000000));
            $player->setPeople($player->getPeopleCap());
            $player->setMana($player->getManaCap());
            $player->setTurns(300);
            $player->setMagic(10);
            //achievements
            $achievements = $manager->getRepository('ArchmageGameBundle:Achievement')->findAll();
            foreach ($achievements as $achievement) {
                $player->addAchievement($achievement);
            }
        }

        /*
         * TEST PLAYER
         */

        //player
        $player = new Player();
        $manager->persist($player);
        $player->setFaction($this->getReference('Oscuridad'));
        $player->setGod(false);
        $player->setWinner(false);
        //constructions
        $constructions = array(
            'Tierras' => 500,
            'Granjas' => 10,
            'Pueblos' => 10,
            'Nodos' => 10,
            'Gremios' => 0,
            'Talleres' => 10,
            'Barracones' => 0,
            'Barreras' => 0,
            'Fortalezas' => 0,
        );
        foreach ($constructions as $name => $quantity) {
            $construction = new Construction();
            $construction->setBuilding($manager->getRepository('ArchmageGameBundle:Building')->findOneByName($name));
            $construction->setQuantity($quantity);
            $construction->setPlayer($player);
            $manager->persist($construction);
            $player->addConstruction($construction);
        }
        //resources
        $player->setNick('fergardi');
        $player->setGold(3000000);
        $player->setPeople(20000);
        $player->setMana(10000);
        $player->setTurns(300);
        $player->setMagic(1);

        //user credentials
        $userManager = $this->container->get('fos_user.user_manager');
        $user = new User();
        $user->setPlayer($player);
        $user->setEnabled(true);
        $user->setEmail('fergardi@email.com');
        $user->setUsername($player->getNick());
        $user->setPlainPassword('fergardi');
        $userManager->updateUser($user);

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