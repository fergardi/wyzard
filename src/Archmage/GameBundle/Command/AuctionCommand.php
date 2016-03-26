<?php

namespace Archmage\GameBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Common\Collections\Criteria;

use Archmage\GameBundle\Entity\Item;
use Archmage\GameBundle\Entity\Contract;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Research;
use Archmage\GameBundle\Entity\Auction;
use Archmage\GameBundle\Entity\Quest;
use Archmage\GameBundle\Entity\Recipe;

class AuctionCommand extends ContainerAwareCommand
{
    /**
     * const
     */
    const MAX_TROOPS = 1;
    const MAX_ITEMS = 2;
    const MAX_QUESTS = 1;
    const MAX_CONTRACTS = 1;
    const MAX_RECIPES = 1;
    const MAX_RESEARCH = 2;

    /**
     * configure
     */
    protected function configure()
    {
        $this
            ->setName('auction:refresh')
            ->setDescription('Acaba las subastas actuales y comienza otras nuevas. Crontab cada 60 minutos.')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->getContainer()->get('doctrine')->getManager();
        //OLD AUCTIONS
        $auctions = $manager->getRepository('ArchmageGameBundle:Auction')->findAll();
        foreach ($auctions as $auction) {
            $winner = $auction->getPlayer();
            $item = $auction->getItem();
            $troop = $auction->getTroop();
            $contract = $auction->getContract();
            $research = $auction->getResearch();
            $quest = $auction->getQuest();
            $recipe = $auction->getRecipe();
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
                } elseif ($quest) {
                    $quest->setPlayer($winner);
                    $winner->addQuest($quest);
                } elseif ($recipe) {
                    $recipe->setPlayer($winner);
                    $winner->addRecipe($recipe);
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
                if ($auction->getQuest()) $manager->remove($auction->getQuest());
                if ($auction->getRecipe()) $manager->remove($auction->getRecipe());
            }
            $manager->remove($auction);
        }
        //NEW AUCTIONS

        //ITEM
        $criteria = new Criteria();
        $criteria->where($criteria->expr()->lte('rarity', rand(0,99)));
        $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->matching($criteria)->toArray();
        shuffle($artifacts);
        for ($i = 0; $i < self::MAX_ITEMS; $i++) {
            $artifact = $artifacts[$i];
            $auction = new Auction();
            $item = new Item();
            $manager->persist($item);
            $item->setArtifact($artifact);
            $item->setQuantity(1);
            $item->setPlayer(null);
            $auction->setPlayer(null);
            $auction->setItem($item);
            $auction->setBid($artifact->getGoldAuction());
            $auction->setTop($artifact->getGoldAuction());
            $manager->persist($auction);
        }

        //RECIPE
        $criteria = new Criteria();
        $criteria->where($criteria->expr()->lte('rarity', rand(0,99)));
        $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->matching($criteria)->toArray();
        for ($i = 0; $i < self::MAX_RECIPES; $i++) {
            shuffle($artifacts);
            $auction = new Auction();
            $manager->persist($auction);
            $recipe = new Recipe();
            $manager->persist($recipe);
            $recipe->setArtifact($artifacts[0]);
            $recipe->setResult($artifacts[1]);
            if ($recipe->getResult()->getLegendary()) $runes = 15; else $runes = 2;
            $recipe->setRunes($runes);
            $recipe->setGold($recipe->getResult()->getGoldAuction() / 2);
            $auction->setPlayer(null);
            $auction->setRecipe($recipe);
            $auction->setBid($recipe->getResult()->getGoldAuction() / 2);
            $auction->setTop($recipe->getResult()->getGoldAuction() / 2);
        }

        //TROOP
        $criteria = new Criteria();
        $criteria->where($criteria->expr()->lte('rarity', rand(0,99)));
        $units = $manager->getRepository('ArchmageGameBundle:Unit')->matching($criteria)->toArray();
        shuffle($units);
        for ($i = 0; $i < self::MAX_TROOPS; $i++) {
            $unit = $units[$i];
            $auction = new Auction();
            $troop = new Troop();
            $manager->persist($troop);
            $troop->setUnit($unit);
            $troop->setQuantity(rand(ceil($troop->getUnit()->getQuantityAuction() * 3), $troop->getUnit()->getQuantityAuction() * 6));
            $troop->setPlayer(null);
            $auction->setPlayer(null);
            $auction->setTroop($troop);
            $auction->setBid($unit->getGoldAuction());
            $auction->setTop($unit->getGoldAuction());
            $manager->persist($auction);
        }

        //QUEST
        $level = rand(1,3);
        $criteria = new Criteria();
        $criteria->where($criteria->expr()->lte('rarity', $level * 33));
        $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->matching($criteria)->toArray();
        shuffle($artifacts);
        for ($i = 0; $i < self::MAX_QUESTS; $i++) {
            $artifact = $artifacts[$i];
            $auction = new Auction();
            $manager->persist($auction);
            $quest = new Quest();
            $quest->setGold(rand(1, 2000000));
            $quest->setRunes($level);
            $manager->persist($quest);
            $quest->setArtifact($artifact);
            $units = $manager->getRepository('ArchmageGameBundle:Unit')->findAll();
            shuffle($units);
            for ($j = 0; $j < $level + 1; $j++) {
                $unit = $units[$j];
                $troop = new Troop();
                $manager->persist($troop);
                $troop->setUnit($unit);
                $troop->setQuantity(750000 / $unit->getPower());
                $troop->setQuest($quest);
                $quest->addTroop($troop);
            }
            $auction->setPlayer(null);
            $auction->setQuest($quest);
            $auction->setBid(1000000 * $level);
            $auction->setTop(1000000 * $level);
        }

        //CONTRACT
        $criteria = new Criteria();
        $criteria->where($criteria->expr()->lte('rarity', rand(0,99)));
        $heroes = $manager->getRepository('ArchmageGameBundle:Hero')->matching($criteria)->toArray();
        shuffle($heroes);
        for ($i = 0; $i < self::MAX_CONTRACTS; $i++) {
            $hero = $heroes[$i];
            $auction = new Auction();
            $contract = new Contract();
            $manager->persist($contract);
            $contract->setHero($hero);
            $contract->setExperience(0);
            $contract->setLevel(rand(1,5));
            $contract->setPlayer(null);
            $auction->setPlayer(null);
            $auction->setContract($contract);
            $auction->setBid($hero->getGoldAuction());
            $auction->setTop($hero->getGoldAuction());
            $manager->persist($auction);
        }

        //RESEARCH
        $criteria = new Criteria();
        $criteria->where($criteria->expr()->lte('rarity', rand(0,99)));
        $spells = $manager->getRepository('ArchmageGameBundle:Spell')->matching($criteria)->toArray();
        shuffle($spells);
        for ($i = 0; $i < self::MAX_RESEARCH; $i++) {
            $spell = $spells[$i];
            $auction = new Auction();
            $manager->persist($auction);
            $research = new Research();
            $manager->persist($research);
            $research->setSpell($spell);
            $research->setTurns(0);
            $research->setPlayer(null);
            $research->setActive(false);
            $auction->setPlayer(null);
            $auction->setResearch($research);
            $auction->setBid($spell->getGoldAuction() / 2);
            $auction->setTop($spell->getGoldAuction() / 2);
        }

        //FLUSH
        $manager->flush();
    }
}