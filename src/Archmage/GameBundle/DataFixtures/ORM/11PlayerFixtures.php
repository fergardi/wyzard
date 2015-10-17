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
                'research' => 'Quemar Alas defense', //nombre auxiliar porque el SpellFixture coincide con SkillFixture
                'item' => 'Tela de Araña',
                'heroes' => array(
                    'Jinete de Dragones',
                ),
                'troops' => array(
                    'Dragones Rojos' => 9999,
                ),
            ),
            array(
                'name' => 'Surm, Dios de la Muerte',
                'faction' => 'Oscuridad',
                'research' => 'Miedo defense', //nombre auxiliar porque el SpellFixture coincide con SkillFixture
                'item' => 'Tela de Araña',
                'heroes' => array(
                    'Jinete de Dragones',
                ),
                'troops' => array(
                    'Dragones Negros' => 9999,
                ),
            ),
            array(
                'name' => 'Lett, Diosa de la Luz',
                'faction' => 'Sagrado',
                'research' => 'Volar defense', //nombre auxiliar porque el SpellFixture coincide con SkillFixture
                'item' => 'Tela de Araña',
                'heroes' => array(
                    'Jinete de Dragones',
                ),
                'troops' => array(
                    'Dragones Blancos' => 9999,
                ),
            ),
            array(
                'name' => 'Sihir, Diosa de la Magia',
                'faction' => 'Fantasmal',
                'research' => 'Lentitud defense', //nombre auxiliar porque el SpellFixture coincide con SkillFixture
                'item' => 'Tela de Araña',
                'heroes' => array(
                    'Jinete de Dragones',
                ),
                'troops' => array(
                    'Dragones Azules' => 9999,
                ),
            ),
            array(
                'name' => 'Elama, Diosa de la Vida',
                'faction' => 'Naturaleza',
                'research' => 'Prisa defense', //nombre auxiliar porque el SpellFixture coincide con SkillFixture
                'item' => 'Tela de Araña',
                'heroes' => array(
                    'Jinete de Dragones',
                ),
                'troops' => array(
                    'Dragones Verdes' => 9999,
                ),
            ),
        );
        $constructions = array(
            'Tierras' => 1000,
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
            //spells
            $research = new Research();
            $research->setSpell($this->getReference($god['research']));
            $research->setTurns(0);
            $research->setPlayer($player);
            $research->setActive(true);
            $manager->persist($research);
            $player->addResearch($research);
            //items
            $item = new Item();
            $item->setArtifact($this->getReference($god['item']));
            $item->setQuantity(9999);
            $item->setPlayer($player);
            $manager->persist($item);
            $player->addItem($item);
            //defense
            $player->setResearch($research);
            $player->setItem($item);
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
            foreach ($contracts as $name) {
                $contract = new Contract();
                $contract->setHero($this->getReference($name));
                $contract->setLevel(25);
                $contract->setPlayer($player);
                $manager->persist($contract);
                $player->addContract($contract);
            }
            //resources
            $player->setGold(999999999);
            $player->setPeople(999999999);
            $player->setMana(999999999);
            $player->setTurns(999999999);
            $player->setMagic(10);
            //achievements
            $achievements = $manager->getRepository('ArchmageGameBundle:Achievement')->findAll();
            foreach ($achievements as $achievement) {
                $player->addAchievement($achievement);
            }
        }

        /*
        //TESTING PLAYER
        $player = new Player();
        $player->setFaction($this->getReference('Oscuridad'));
        $player->setGod(false);
        $player->setItem(null);
        $player->setResearch(null);
        //EDIFICIOS
        $constructions = array(
            'Tierras' => 600,
            'Granjas' => 1000,
            'Pueblos' => 1000,
            'Nodos' => 1000,
            'Gremios' => 10,
            'Talleres' => 10,
            'Barracones' => 10,
            'Barreras' => 3,
            'Fortalezas' => 3,
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
        //HEROES
        $contracts = array(
            'Mago Negro',
            'Chamán',
            'Mercader',
        );
        foreach ($contracts as $name) {
            $contract = new Contract();
            $contract->setHero($this->getReference($name));
            $contract->setLevel(1);
            $contract->setPlayer($player);
            $manager->persist($contract);
            $player->addContract($contract);
        }
        //ARTEFACTOS
        $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->findAll();
        foreach ($artifacts as $artifact) {
            $item = new Item();
            $item->setArtifact($artifact);
            $item->setQuantity(10);
            $item->setPlayer($player);
            $manager->persist($item);
            $player->addItem($item);
        }
        //MENSAJES
        $text = array();
        $text[] = array('default', 12, 0, 'center', 'Te damos la bienvenida, novicio! El Consejo de Sabios de tu Reino recomienda que leas la <i class="fa fa-fw fa-book"></i><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'" class="link">Sagrada Ayuda del Juego</a>.');
        $subject = 'Bienvenido!';
        $this->container->get('service.controller')->sendMessage($player, $player, $subject, $text);
        //RECURSOS
        $player->setGold(999999999);
        $player->setPeople(999999999);
        $player->setMana(999999999);
        $player->setTurns(999999999);
        $player->setMagic(5);
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

        //PERSIST
        $this->setReference($user->getUsername(), $player);
        $manager->persist($player);
        */

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