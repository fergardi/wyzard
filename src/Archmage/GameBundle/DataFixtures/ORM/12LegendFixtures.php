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

        //SEASON3
        $legend = new Legend();
        $legend->setNick('<span class="label label-info">Tecknor</span>');
        $legend->setDatetime(new \DateTime("12/05/2015 01:14:39")); //mm/dd/yyyy hh:ii:ss
        $legend->setLands(5468);
        $legend->setPower(8437580);
        $manager->persist($legend);

        //SEASON4
        $legend = new Legend();
        $legend->setNick('<span class="label label-warning">Sombra</span>');
        $legend->setDatetime(new \DateTime("12/18/2015 14:00:04")); //mm/dd/yyyy hh:ii:ss
        $legend->setLands(6319);
        $legend->setPower(22406400);
        $manager->persist($legend);

        //SEASON5
        $legend = new Legend();
        $legend->setNick('<span class="label label-info">Pitufina</span>');
        $legend->setDatetime(new \DateTime("01/16/2016 05:00:04")); //mm/dd/yyyy hh:ii:ss
        $legend->setLands(6001);
        $legend->setPower(17524580);
        $manager->persist($legend);

        //SEASON6
        $legend = new Legend();
        $legend->setNick('<span class="label label-primary">MiriTx</span>');
        $legend->setDatetime(new \DateTime("03/02/2016 14:00:04")); //mm/dd/yyyy hh:ii:ss
        $legend->setLands(7040);
        $legend->setPower(27124845);
        $manager->persist($legend);

        //SEASON7
        $legend = new Legend();
        $legend->setNick('<span class="label label-danger">Flokki</span>');
        $legend->setDatetime(new \DateTime("04/03/2016 10:00:04")); //mm/dd/yyyy hh:ii:ss
        $legend->setLands(3471);
        $legend->setPower(25460168);
        $manager->persist($legend);

        //FLUSH
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 12; // the order in which fixtures will be loaded
    }
}