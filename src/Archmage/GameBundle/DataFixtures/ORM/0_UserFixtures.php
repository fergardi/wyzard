<?php

namespace Archmage\WipiBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Archmage\UserBundle\Entity\User;

class UserFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('fgard');
        $user->setPlainPassword('admin');
        $user->setNick('Darkmaster');
        $user->setEmail('fgard@unileon.es');
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setEnabled(true);
        $manager->persist($user);

        $manager->flush();
    }

    public function getOrder()
    {
        return 0;
    }
}