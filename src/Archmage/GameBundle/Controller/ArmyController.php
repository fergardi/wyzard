<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ArmyController extends Controller
{
    /**
     * @Route("/army/summary")
     * @Template("ArchmageGameBundle:Army:summary.html.twig")
     */
    public function summaryAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }

    /**
     * @Route("/army/recruit")
     * @Template("ArchmageGameBundle:Army:recruit.html.twig")
     */
    public function recruitAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }

    /**
     * @Route("/army/disband")
     * @Template("ArchmageGameBundle:Army:disband.html.twig")
     */
    public function disbandAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }

    /**
     * @Route("/army/attack")
     * @Template("ArchmageGameBundle:Army:attack.html.twig")
     */
    public function attackAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }
}
