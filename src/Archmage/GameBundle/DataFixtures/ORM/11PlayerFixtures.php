<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Archmage\GameBundle\Entity\Player;
use Archmage\GameBundle\Entity\Construction;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Contract;
use Archmage\GameBundle\Entity\Research;
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
                'god' => true,
                'constructions' => array(
                    'Tierras' => rand(500,750),
                    'Granjas' => rand(500,750),
                    'Pueblos' => rand(500,750),
                    'Nodos' => rand(500,750),
                    'Gremios' => rand(500,750),
                    'Talleres' => rand(500,750),
                    'Barracones' => rand(500,750),
                    'Barreras' => rand(200,300),
                    'Fortalezas' => rand(200,300),
                ),
                'heroes' => array(
                    'Jinete de Dragones' => rand(10,50),
                    'Dríada' => rand(10,50),
                    'Campeón' => rand(10,50),
                ),
                'troops' => array(
                    'Dragones Rojos' => 50,
                    'Dragones Verdes' => 50,
                    'Dragones Negros' => 50,
                    'Dragones Azules' => 50,
                    'Dragones Blancos' => 50,
                ),
            ),
            array(
                'name' => 'Surm, Dios de la Muerte',
                'faction' => 'Oscuridad',
                'god' => true,
                'constructions' => array(
                    'Tierras' => rand(500,750),
                    'Granjas' => rand(500,750),
                    'Pueblos' => rand(500,750),
                    'Nodos' => rand(500,750),
                    'Gremios' => rand(500,750),
                    'Talleres' => rand(500,750),
                    'Barracones' => rand(500,750),
                    'Barreras' => rand(200,300),
                    'Fortalezas' => rand(200,300),
                ),
                'heroes' => array(
                    'Jinete de Dragones' => rand(10,50),
                    'Dríada' => rand(10,50),
                    'Campeón' => rand(10,50),
                ),
                'troops' => array(
                    'Dragones Rojos' => 50,
                    'Dragones Verdes' => 50,
                    'Dragones Negros' => 50,
                    'Dragones Azules' => 50,
                    'Dragones Blancos' => 50,
                ),
            ),
            array(
                'name' => 'Jalazu, Diosa de la Luz',
                'faction' => 'Sagrado',
                'god' => true,
                'constructions' => array(
                    'Tierras' => rand(500,750),
                    'Granjas' => rand(500,750),
                    'Pueblos' => rand(500,750),
                    'Nodos' => rand(500,750),
                    'Gremios' => rand(500,750),
                    'Talleres' => rand(500,750),
                    'Barracones' => rand(500,750),
                    'Barreras' => rand(200,300),
                    'Fortalezas' => rand(200,300),
                ),
                'heroes' => array(
                    'Jinete de Dragones' => rand(10,50),
                    'Dríada' => rand(10,50),
                    'Campeón' => rand(10,50),
                ),
                'troops' => array(
                    'Dragones Rojos' => 50,
                    'Dragones Verdes' => 50,
                    'Dragones Negros' => 50,
                    'Dragones Azules' => 50,
                    'Dragones Blancos' => 50,
                ),
            ),
            array(
                'name' => 'Swott, Dios de la Magia',
                'faction' => 'Fantasmal',
                'god' => true,
                'constructions' => array(
                    'Tierras' => rand(500,750),
                    'Granjas' => rand(500,750),
                    'Pueblos' => rand(500,750),
                    'Nodos' => rand(500,750),
                    'Gremios' => rand(500,750),
                    'Talleres' => rand(500,750),
                    'Barracones' => rand(500,750),
                    'Barreras' => rand(200,300),
                    'Fortalezas' => rand(200,300),
                ),
                'heroes' => array(
                    'Jinete de Dragones' => rand(10,50),
                    'Dríada' => rand(10,50),
                    'Campeón' => rand(10,50),
                ),
                'troops' => array(
                    'Dragones Rojos' => 50,
                    'Dragones Verdes' => 50,
                    'Dragones Negros' => 50,
                    'Dragones Azules' => 50,
                    'Dragones Blancos' => 50,
                ),
            ),
            array(
                'name' => 'Elama, Diosa de la Vida',
                'faction' => 'Naturaleza',
                'god' => true,
                'constructions' => array(
                    'Tierras' => rand(500,750),
                    'Granjas' => rand(500,750),
                    'Pueblos' => rand(500,750),
                    'Nodos' => rand(500,750),
                    'Gremios' => rand(500,750),
                    'Talleres' => rand(500,750),
                    'Barracones' => rand(500,750),
                    'Barreras' => rand(200,300),
                    'Fortalezas' => rand(200,300),
                ),
                'heroes' => array(
                    'Jinete de Dragones' => rand(10,50),
                    'Dríada' => rand(10,50),
                    'Campeón' => rand(10,50),
                ),
                'troops' => array(
                    'Dragones Rojos' => 50,
                    'Dragones Verdes' => 50,
                    'Dragones Negros' => 50,
                    'Dragones Azules' => 50,
                    'Dragones Blancos' => 50,
                ),
            ),
        );
        foreach ($gods as $god) {
            $player = new Player();
            $manager->persist($player);
            $player->setGod($god['god']);
            $player->setWinner(false);
            $player->setBot(false);
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
            //achievements
            $achievements = $manager->getRepository('ArchmageGameBundle:Achievement')->findAll();
            foreach ($achievements as $achievement) {
                $player->addAchievement($achievement);
            }
            //researchs
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
            //resources
            $player->setGold(rand(100000000,500000000));
            $player->setRunes(rand(50,100));
            $player->setPeople($player->getPeopleCap());
            $player->setMana($player->getManaCap());
            $player->setTurns(300);
            $player->setMagic(10);
        }

        //ADMIN
        $player = new Player();
        $manager->persist($player);
        $player->setFaction($this->getReference('Oscuridad'));
        $player->setGod(false);
        $player->setWinner(false);
        //constructions
        $constructions = array(
            'Tierras' => 600,
            'Granjas' => 10,
            'Pueblos' => 10,
            'Nodos' => 10,
            'Gremios' => 10,
            'Talleres' => 10,
            'Barracones' => 10,
            'Barreras' => 3,
            'Fortalezas' => 3,
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
        $player->setNick('Wyzard');
        $player->setGold(3000000);
        $player->setPeople(20000);
        $player->setMana(10000);
        $player->setTurns(300);
        $player->setRunes(10);
        $player->setMagic(1);

        //user credentials
        $userManager = $this->container->get('fos_user.user_manager');
        $user = new User();
        $user->setPlayer($player);
        $user->setEnabled(true);
        $user->setEmail('fergardi@email.com');
        $user->setUsername($player->getNick());
        $user->setPlainPassword('123321'); //to be changed after start
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