<?php

namespace Archmage\GameBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Archmage\GameBundle\Entity\Wrath;
use Archmage\GameBundle\Entity\Legend;

class GodCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('god:wrath')
            ->setDescription('Comprueba la furia de los dioses. Crontab cada 60 minutos.')
        ;
    }

    /**
     * usort sorting function
     */
    function sortByPower($row1, $row2)
    {
        return ($row1[1] >= $row2[1]) ? -1 : 1;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->getContainer()->get('doctrine')->getManager();
        $wrath = $manager->getRepository('ArchmageGameBundle:Wrath')->findAll();
        if ($wrath) {
            $wrath = $wrath[0];
            $now = new \DateTime('now');
            $limit = $wrath->getDatetime();
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
                $text[] = array('default', 12, 0, 'center', 'Alguien ha ganado el juego!');
                foreach ($receivers as $receiver) {
                    $this->getContainer()->get('service.controller')->sendMessage($winner, $receiver, 'Fin del Juego', $text, 'apocalypse');
                }
                $manager->remove($wrath);
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
                    $wrath = new Wrath();
                    $manager->persist($wrath);
                }
            }
        }
        $manager->flush();
    }
}