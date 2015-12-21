<?php

namespace Archmage\GameBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Common\Collections\ArrayCollection;

use Archmage\GameBundle\Entity\Apocalypse;
use Archmage\GameBundle\Entity\Legend;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Enchantment;
use Archmage\GameBundle\Entity\Player;
use Archmage\GameBundle\Entity\Contract;
use Archmage\GameBundle\Entity\Construction;

class ApocalypseCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('apocalypse:check')
            ->setDescription('Comprueba el estado del apocalipsis. Crontab cada 60 minutos.')
        ;
    }

    /**
     * usort sorting function
     */
    private function sortByPower($row1, $row2)
    {
        return ($row1[1] >= $row2[1]) ? -1 : 1;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->getContainer()->get('doctrine')->getManager();
        $apocalypse = $manager->getRepository('ArchmageGameBundle:Apocalypse')->findAll();
        if ($apocalypse) {
            $apocalypse = $apocalypse[0];
            $now = new \DateTime('now');
            $limit = $apocalypse->getDatetime();
            if ($now >= $limit) {
                $players = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
                $array = array();
                foreach ($players as $player) {
                    $array[] = array($player, $player->getPower());
                }
                usort($array, array($this, "sortByPower"));
                $players = new ArrayCollection();
                foreach ($array as $row) {
                    $players[] = $row[0];
                }
                $winner = $players[0];
                $legend = new Legend();
                $legend->setNick('<span class="label label-'.$winner->getFaction()->getClass().'">'.$winner->getNick().'</span>');
                $legend->setLands($winner->getLands());
                $legend->setPower($winner->getPower());
                $manager->persist($legend);
                $winner->setWinner(true);
                $receivers = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
                $text = array();
                $text[] = array('default', 12, 0, 'center', 'Alguien ha salido victorioso del <span class="label label-extra">Apocalipsis</span>!');
                foreach ($receivers as $receiver) {
                    $this->getContainer()->get('service.controller')->sendMessage($winner, $receiver, 'Fin del Juego', $text, 'apocalypse');
                }
                $manager->remove($apocalypse);
            }
        } else {
            $winner = $manager->getRepository('ArchmageGameBundle:Player')->findByWinner(true);
            if (!$winner) {
                $gods = $manager->getRepository('ArchmageGameBundle:Player')->findByGod(true);
                $total = 0;
                foreach ($gods as $god) {
                    $total += $god->getUnits();
                }
                if ($total <= 0) {
                    $apocalypse = new Apocalypse();
                    $manager->persist($apocalypse);
                    $horsemen = array(
                        array(
                            'name' => 'Muerte, Jinete del Apocalipsis',
                            'faction' => 'Oscuridad',
                            'god' => false,
                            'constructions' => array(
                                'Tierras' => rand(750,1250),
                                'Granjas' => rand(750,1250),
                                'Pueblos' => rand(750,1250),
                                'Nodos' => rand(750,1250),
                                'Gremios' => rand(750,1250),
                                'Talleres' => rand(750,1250),
                                'Barracones' => rand(750,1250),
                                'Barreras' => rand(100,300),
                                'Fortalezas' => rand(100,300),
                            ),
                            'heroes' => array(
                                'Nigromante' => rand(10,30),
                                'Jinete sin Cabeza' => rand(10,30),
                                'Dríada' => rand(10,30),
                                'Campeón' => rand(10,30),
                            ),
                            'troops' => array(
                                'Liches' => rand(400,500),
                                'Hombres Lobo' => rand(4000,5000),
                                'Esqueletos' => rand(200000,300000),
                                'Caballeros Negros' => rand(100,125),
                                'Vampiros' => rand(700,1000),
                            ),
                        ),
                        array(
                            'name' => 'Conquista, Jinete del Apocalipsis',
                            'faction' => 'Sagrado',
                            'god' => false,
                            'constructions' => array(
                                'Tierras' => rand(750,1250),
                                'Granjas' => rand(750,1250),
                                'Pueblos' => rand(750,1250),
                                'Nodos' => rand(750,1250),
                                'Gremios' => rand(750,1250),
                                'Talleres' => rand(750,1250),
                                'Barracones' => rand(750,1250),
                                'Barreras' => rand(100,300),
                                'Fortalezas' => rand(100,300),
                            ),
                            'heroes' => array(
                                'Serafín' => rand(10,30),
                                'Campeón' => rand(10,30),
                                'Dríada' => rand(10,30),
                            ),
                            'troops' => array(
                                'Dominions' => rand(20,30),
                                'Ángeles' => rand(250,300),
                                'Arcángeles' => rand(60,80),
                                'Pegasos' => rand(4000,5000),
                                'Unicornios' => rand(7000,8000),
                            ),
                        ),
                        array(
                            'name' => 'Guerra, Jinete del Apocalipsis',
                            'faction' => 'Caos',
                            'god' => false,
                            'constructions' => array(
                                'Tierras' => rand(750,1250),
                                'Granjas' => rand(750,1250),
                                'Pueblos' => rand(750,1250),
                                'Nodos' => rand(750,1250),
                                'Gremios' => rand(750,1250),
                                'Talleres' => rand(750,1250),
                                'Barracones' => rand(750,1250),
                                'Barreras' => rand(100,300),
                                'Fortalezas' => rand(100,300),
                            ),
                            'heroes' => array(
                                'Rey Demonio' => rand(10,30),
                                'Dríada' => rand(10,30),
                                'Campeón' => rand(10,30),
                            ),
                            'troops' => array(
                                'Diablos' => rand(60,80),
                                'Fénix' => rand(10,15),
                                'Cerberos' => rand(40000,45000),
                                'Ogros' => rand(4000,5000),
                                'Minotauros' => rand(3000,4000),
                            ),
                        ),
                        array(
                            'name' => 'Hambre, Jinete del Apocalipsis',
                            'faction' => 'Fantasmal',
                            'god' => false,
                            'constructions' => array(
                                'Tierras' => rand(750,1250),
                                'Granjas' => rand(750,1250),
                                'Pueblos' => rand(750,1250),
                                'Nodos' => rand(750,1250),
                                'Gremios' => rand(750,1250),
                                'Talleres' => rand(750,1250),
                                'Barracones' => rand(750,1250),
                                'Barreras' => rand(100,300),
                                'Fortalezas' => rand(100,300),
                            ),
                            'heroes' => array(
                                'Elementalista' => rand(10,30),
                                'Dríada' => rand(10,30),
                                'Campeón' => rand(10,30),
                            ),
                            'troops' => array(
                                'Elementales de Sombra' => rand(75,85),
                                'Elementales de Lava' => rand(340,360),
                                'Elementales de Aire' => rand(75,85),
                                'Elementales de Agua' => rand(75,85),
                                'Elementales de Tierra' => rand(150,175),
                            ),
                        ),
                        array(
                            'name' => 'Peste, Jinete del Apocalipsis',
                            'faction' => 'Naturaleza',
                            'god' => false,
                            'constructions' => array(
                                'Tierras' => rand(750,1250),
                                'Granjas' => rand(750,1250),
                                'Pueblos' => rand(750,1250),
                                'Nodos' => rand(750,1250),
                                'Gremios' => rand(750,1250),
                                'Talleres' => rand(750,1250),
                                'Barracones' => rand(750,1250),
                                'Barreras' => rand(100,300),
                                'Fortalezas' => rand(100,300),
                            ),
                            'heroes' => array(
                                'Cazador' => rand(10,30),
                                'Dríada' => rand(10,30),
                                'Campeón' => rand(10,30),
                            ),
                            'troops' => array(
                                'Behemoths' => rand(300,400),
                                'Gorilas' => rand(40000,45000),
                                'Sierpes Colosales' => rand(60,80),
                                'Hidras' => rand(20,30),
                                'Trolls' => rand(500,600),
                            ),
                        ),
                    );

                    foreach ($horsemen as $horseman) {
                        $player = new Player();
                        $manager->persist($player);
                        $player->setGod($horseman['god']);
                        $player->setWinner(false);
                        $player->setBot(false);
                        $player->setNick($horseman['name']);
                        $player->setFaction($manager->getRepository('ArchmageGameBundle:Faction')->findOneByName($horseman['faction']));
                        $player->setItem(null);
                        $player->setResearch(null);
                        //constructions
                        $constructions = $horseman['constructions'];
                        foreach ($constructions as $name => $quantity) {
                            $construction = new Construction();
                            $construction->setBuilding($manager->getRepository('ArchmageGameBundle:Building')->findOneByName($name));
                            $construction->setQuantity($quantity);
                            $construction->setPlayer($player);
                            $manager->persist($construction);
                            $player->addConstruction($construction);
                        }
                        //troops
                        $troops = $horseman['troops'];
                        foreach ($troops as $name => $quantity) {
                            $troop = new Troop();
                            $troop->setUnit($manager->getRepository('ArchmageGameBundle:Unit')->findOneByName($name));
                            $troop->setQuantity($quantity);
                            $troop->setPlayer($player);
                            $manager->persist($troop);
                            $player->addTroop($troop);
                        }
                        //heroes
                        $contracts = $horseman['heroes'];
                        foreach ($contracts as $name => $level) {
                            $contract = new Contract();
                            $contract->setHero($manager->getRepository('ArchmageGameBundle:Hero')->findOneByName($name));
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
                        $player->setMagic(5);
                        //achievements
                        $achievements = $manager->getRepository('ArchmageGameBundle:Achievement')->findAll();
                        foreach ($achievements as $achievement) {
                            $player->addAchievement($achievement);
                        }
                    }
                }
            }
        }
        $manager->flush();
    }
}