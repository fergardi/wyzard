<?php

namespace Archmage\GameBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Archmage\GameBundle\Entity\Item;
use Archmage\GameBundle\Entity\Contract;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Research;
use Archmage\GameBundle\Entity\Auction;

class AuctionCommand extends ContainerAwareCommand
{
    /**
     * Constants
     */
    const AUCTION_PRICE = 5000000;
    const AUCTION_TROOPS = 1;
    const AUCTION_ITEMS = 1;
    const AUCTION_CONTRACTS = 1;
    const AUCTION_RESEARCHS = 1;

    /**
     * configure
     */
    protected function configure()
    {
        $this
            ->setName('auction:refresh')
            ->setDescription('Acaba las subastas actuales y comienza otras nuevas')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->getContainer()->get('doctrine')->getManager();
        //CONTEXT OVERRIDE FOR GENERATEURL IN COMMANDS BUG
        //see http://symfony.com/doc/current/cookbook/console/sending_emails.html#configuring-the-request-context-per-command
        //https://github.com/symfony/symfony-docs/issues/1112#issuecomment-4240333
        $context = $this->getContainer()->get('router')->getContext();
        $context->setHost('archmage.servegame.com');
        $context->setScheme('http');
        $this->getContainer()->get('router')->setContext($context);
        //OLD AUCTIONS
        $auctions = $manager->getRepository('ArchmageGameBundle:Auction')->findAll();
        foreach ($auctions as $auction) {
            $winner = $auction->getPlayer();
            $item = $auction->getItem();
            $troop = $auction->getTroop();
            $contract = $auction->getContract();
            $research = $auction->getResearch();
            $text = array();
            if ($winner) {
                if ($item) {
                    if ($winner->hasItem($item)) {
                        $winner->hasItem($item)->setQuantity($winner->hasItem($item)->getQuantity() + $item->getQuantity());
                        $manager->remove($item);
                    } else {
                        $item->setPlayer($winner);
                        $winner->addItem($item);
                    }
                } elseif ($troop) {
                    if ($winner->hasTroop($troop)) {
                        $winner->hasTroop($troop)->setQuantity($winner->hasTroop($troop)->getQuantity() + $troop->getQuantity());
                        $manager->remove($troop);
                    } else {
                        if ($winner->getTroops()->count() < $winner::TROOPS_CAP) {
                            $troop->setPlayer($winner);
                            $winner->addTroop($troop);
                        } else {
                            $text[] = array('default', 12, 0, 'center', 'No tienes espacio suficiente en tu ejército, por lo que se han desbandado las nuevas tropas automáticamente.');
                            $manager->remove($troop);
                        }
                    }
                } elseif ($contract) {
                    if (!$winner->hasContract($contract)) {
                        $contract->setPlayer($winner);
                        $winner->addContract($contract);
                    } else {
                        $text[] = array('default', 12, 0, 'center', 'Ya tienes ese héroe, pero no puedes tener duplicados, por lo que se ha desbandado el héroe automáticamente.');
                        $manager->remove($contract);
                    }
                } elseif ($research) {
                    if (!$winner->hasResearch($research)) {
                        $research->setPlayer($winner);
                        $winner->addResearch($research);
                    } else {
                        $text[] = array('default', 12, 0, 'center', 'Ya tienes ese hechizo, pero no puedes tener duplicados, por lo que se ha perdido automáticamente.');
                        $manager->remove($research);
                    }
                }
                $text[] = array('default', 12, 0, 'center', 'Has ganado la subasta de <span class="label label-'.$auction->getClass().'"><a href="'.$this->getContainer()->get('router')->generate('archmage_game_home_help').'#'.$this->getContainer()->get('service.controller')->toSlug($auction->getName()).'" class="link">'.$auction->getName().'</a></span> por '.$this->getContainer()->get('service.controller')->nff($auction->getBid()).' <span class="label label-extra">Oro</span>.');
                if ($auction->getTop() > $auction->getBid()) {
                    $rest = floor(($auction->getTop() - $auction->getBid()) * 0.90);
                    $winner->setGold($winner->getGold() + $rest);
                    $text[] = array('default', 12, 0, 'center', 'Se te ha devuelto el sobrante de tu puja máxima, menos un 10% de comisión, '.$this->getContainer()->get('service.controller')->nff($rest).' <span class="label label-extra">Oro</span>.');
                }
                $this->getContainer()->get('service.controller')->sendMessage($winner, $winner, 'Subasta ganada', $text, 'auction');
                $manager->persist($winner);
            } else {
                if ($auction->getItem()) $manager->remove($auction->getItem());
                if ($auction->getResearch()) $manager->remove($auction->getResearch());
                if ($auction->getTroop()) $manager->remove($auction->getTroop());
                if ($auction->getContract()) $manager->remove($auction->getContract());
            }
            $manager->remove($auction);
        }
        //NEW AUCTIONS
        //ITEM
        $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->findAll();
        for ($i = 0; $i < self::AUCTION_ITEMS; $i++) {
            shuffle($artifacts);
            $artifact = $artifacts[0]; // suponemos > 0
            $auction = new Auction();
            $item = new Item();
            $manager->persist($item);
            $item->setArtifact($artifact);
            $item->setQuantity(rand(1,3));
            $item->setPlayer(null);
            $auction->setPlayer(null);
            $auction->setItem($item);
            $auction->setBid(self::AUCTION_PRICE);
            $auction->setTop(self::AUCTION_PRICE);
            $manager->persist($auction);
        }
        //TROOP
        $units = $manager->getRepository('ArchmageGameBundle:Unit')->findAll();
        for ($i = 0; $i < self::AUCTION_TROOPS; $i++) {
            shuffle($units);
            $unit = $units[0]; // suponemos > 0
            $auction = new Auction();
            $troop = new Troop();
            $manager->persist($troop);
            $troop->setUnit($unit);
            $troop->setQuantity(rand(ceil($troop->getUnit()->getQuantityAuction() / 2), $troop->getUnit()->getQuantityAuction() * 2));
            $troop->setPlayer(null);
            $auction->setPlayer(null);
            $auction->setTroop($troop);
            $auction->setBid(self::AUCTION_PRICE);
            $auction->setTop(self::AUCTION_PRICE);
            $manager->persist($auction);
        }
        //CONTRACT
        $heroes = $manager->getRepository('ArchmageGameBundle:Hero')->findAll();
        for ($i = 0; $i < self::AUCTION_CONTRACTS; $i++) {
            shuffle($heroes);
            $hero = $heroes[0]; // suponemos > 0
            $auction = new Auction();
            $contract = new Contract();
            $manager->persist($contract);
            $contract->setHero($hero);
            $contract->setExperience(0);
            $contract->setLevel(rand(1,5));
            $contract->setPlayer(null);
            $auction->setPlayer(null);
            $auction->setContract($contract);
            $auction->setBid(self::AUCTION_PRICE);
            $auction->setTop(self::AUCTION_PRICE);
            $manager->persist($auction);
        }
        //RESEARCH
        $spells = $manager->getRepository('ArchmageGameBundle:Spell')->findAll();
        for ($i = 0; $i < self::AUCTION_RESEARCHS; $i++) {
            shuffle($spells);
            $spell = $spells[0]; // suponemos > 0
            if (!$spell->getSkill()->getWin()) { //no puede salir apocalipsis en subasta
                $auction = new Auction();
                $research = new Research();
                $manager->persist($research);
                $research->setSpell($spell);
                $research->setTurns(0);
                $research->setPlayer(null);
                $research->setActive(true);
                $auction->setPlayer(null);
                $auction->setResearch($research);
                $auction->setBid(self::AUCTION_PRICE);
                $auction->setTop(self::AUCTION_PRICE);
                $manager->persist($auction);
            }
        }
        $manager->flush();
        return true;
    }
}