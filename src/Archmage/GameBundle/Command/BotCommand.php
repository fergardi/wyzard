<?php

namespace Archmage\GameBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Common\Collections\Criteria;

use Archmage\GameBundle\Entity\Player;
use Archmage\GameBundle\Entity\Construction;
use Archmage\GameBundle\Entity\Item;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Contract;

class BotCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('bot:add')
            ->setDescription('Agrega bots al juego como si fueran jugadores normales.')
        ;
    }

    /**
     * Funcion que crea un nick aleatorio
     *
     * @return string
     */
    private function randonickze()
    {
        $prefix = array('Ca','Ke','Se','Mi','Ea','Tho','Zia','No','Wu','Xy');
        $mix = array('ba','la','ra','gas','ni','be','din','vy','to','fu');
        $suffix = array('ne','des','oss','wyzz','xol','uff','on','iin','rekk','uxx');
        return $prefix[array_rand($prefix)].$mix[array_rand($mix)].$suffix[array_rand($suffix)];
    }

    /**
     * Funcion que crea un bot aleatorio
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //manager
        $manager = $this->getContainer()->get('doctrine')->getManager();
        //entities
        $criteria = new Criteria();
        $criteria->where($criteria->expr()->neq('id', 6)); //no neutral
        $factions = $manager->getRepository('ArchmageGameBundle:Faction')->matching($criteria)->toArray();
        $buildings = $manager->getRepository('ArchmageGameBundle:Building')->findAll();
        $units = $manager->getRepository('ArchmageGameBundle:Unit')->findAll();
        $heroes = $manager->getRepository('ArchmageGameBundle:Hero')->findAll();
        $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->findAll();
        $achievements = $manager->getRepository('ArchmageGameBundle:Achievement')->findAll();
        //bot
        $bot = new Player();
        $manager->persist($bot);
        $bot->setBot(true);
        $bot->setNick($this->randonickze());
        $bot->setFaction($factions[rand(0, count($factions)-1)]);
        $level = rand(1,3);
        //constructions
        foreach ($buildings as $building) {
            $construction = new Construction();
            $manager->persist($construction);
            $construction->setBuilding($building);
            $construction->setQuantity(rand(50, 300 * $level));
            $construction->setPlayer($bot);
            $bot->addConstruction($construction);
        }
        //troops
        shuffle($units);
        for ($i = 0; $i < $level; $i++) {
            $troop = new Troop();
            $unit = $units[$i];
            $manager->persist($troop);
            $troop->setUnit($unit);
            $troop->setQuantity(750000 / $unit->getPower());
            $troop->setPlayer($bot);
            $bot->addTroop($troop);
        }
        //items
        shuffle($artifacts);
        for ($i = 0; $i < rand(2,5); $i++) {
            $item = new Item();
            $artifact = $artifacts[$i];
            $manager->persist($item);
            $item->setArtifact($artifact);
            $item->setQuantity(rand(2,5));
            $item->setPlayer($bot);
            $bot->addItem($item);
        }
        //contracts
        shuffle($heroes);
        for ($i = 0; $i < $level + 1; $i++) {
            $contract = new Contract();
            $hero = $heroes[$i];
            $manager->persist($contract);
            $contract->setHero($hero);
            $contract->setLevel(rand(2,15));
            $contract->setPlayer($bot);
            $bot->addContract($contract);
        }
        //resources
        $bot->setGold(rand(1000000,20000000));
        $bot->setPeople(rand(1,$bot->getPeopleCap()));
        $bot->setMana(rand(1,$bot->getManaCap()));
        $bot->setTurns(rand(1,$bot->getTurnsCap()));
        $bot->setMagic(rand(1,6));
        //achievements
        shuffle($achievements);
        for ($i = 0; $i < rand(1,5); $i++) {
            $achievement = $achievements[$i];
            $bot->addAchievement($achievement);
        }
        //flush
        $manager->flush();
    }
}