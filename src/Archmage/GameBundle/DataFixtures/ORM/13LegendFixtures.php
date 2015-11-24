<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Legend;

class LegendFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //SEASON1
        $legend = new Legend();
        $legend->setNick('<span class="label label-danger">Zanguayin</span>');
        $legend->setDatetime(new \DateTime("11/07/2015 21:02:02")); //mm/dd/yyyy hh:ii:ss
        $legend->setLands(3368);
        $legend->setPower(3368000);
        $manager->persist($legend);

        //SEASON2
        $legend = new Legend();
        $legend->setNick('<span class="label label-warning">Fergardi</span>');
        $legend->setDatetime(new \DateTime("11/24/2015 16:52:27")); //mm/dd/yyyy hh:ii:ss
        $legend->setLands(4218);
        $legend->setPower(7197000);
        $manager->persist($legend);

        //FLUSH
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 13; // the order in which fixtures will be loaded
    }
}