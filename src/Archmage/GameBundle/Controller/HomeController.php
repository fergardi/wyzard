<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller
{
    /**
     * @Route("/")
     * @Route("/home")
     * @Route("/index")
     * @Route("/login")
     * @Template("ArchmageGameBundle:Home:login.html.twig")
     */
    public function loginAction()
    {
        $online = rand(5,20);
        $total = rand($online, 200);
        $url = $this->generateUrl('archmage_game_account_ranking');
        $this->addFlash('info', 'Bienvenido de nuevo! Hay '.$online.' jugador(es) online de <a href="'.$url.'" class="alert-link">'.$total.' registrado(s)</a>.');
        $manager = $this->getDoctrine()->getManager();
        $criteria = new \Doctrine\Common\Collections\Criteria();
        $criteria->where($criteria->expr()->neq('name', 'Neutral'));
        $factions = $manager->getRepository('ArchmageGameBundle:Faction')->matching($criteria);
        return array(
            'factions' => $factions,
        );
    }

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
