<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller
{
    /**
     * @Route("/help")
     * @Template("ArchmageGameBundle:Home:help.html.twig")
     */
    public function helpAction()
    {
        $manager = $this->getDoctrine()->getManager();
        $units = $manager->getRepository('ArchmageGameBundle:Unit')->findBy(array(), array('name' => 'asc'));
        $heroes = $manager->getRepository('ArchmageGameBundle:Hero')->findBy(array(), array('name' => 'asc'));
        $factions = $manager->getRepository('ArchmageGameBundle:Faction')->findBy(array(), array('name' => 'asc'));
        $buildings = $manager->getRepository('ArchmageGameBundle:Building')->findBy(array(), array('name' => 'asc'));
        $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->findBy(array(), array('name' => 'asc'));
        $spells = $manager->getRepository('ArchmageGameBundle:Spell')->findBy(array(), array('name' => 'asc'));
        return array(
            'buildings' => $buildings,
            'factions' => $factions,
            'units' => $units,
            'heroes' => $heroes,
            'spells' => $spells,
            'artifacts' => $artifacts,
        );
    }
}
