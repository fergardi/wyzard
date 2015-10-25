<?php

namespace Archmage\GameBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TurnsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('turns:add')
            ->setDescription('Suma 1 turno a cada jugador, crontab cada 3 minutos')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->getContainer()->get('doctrine')->getManager();
        $players = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
        foreach ($players as $player) {
            $player->setTurns($player->getTurns() + 1);
            $manager->persist($player);
        }
        $manager->flush();
    }
}