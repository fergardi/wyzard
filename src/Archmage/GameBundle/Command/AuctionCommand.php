<?php

namespace Archmage\GameBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AuctionCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('auction:refresh')
            ->setDescription('Refresh the auctions, set winners and create new ones')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->getContainer()->get('doctrine')->getManager();
        $auctions = $manager->getRepository('ArchmageGameBundle:Auction')->findAll();
        foreach ($auctions as $auction) {

            $manager->persist($auction->getPlayer());
            $manager->remove($auction);
        }
        $manager->flush();
        $output->writeln('OK');
    }
}