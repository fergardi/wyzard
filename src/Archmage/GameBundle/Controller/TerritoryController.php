<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TerritoryController extends Controller
{
    /**
     * @Route("/territory/summary")
     * @Template("ArchmageGameBundle:Territory:summary.html.twig")
     */
    public function summaryAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }

    /**
     * @Route("/territory/explore")
     * @Template("ArchmageGameBundle:Territory:explore.html.twig")
     */
    public function exploreAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }

    /**
     * @Route("/territory/build")
     * @Template("ArchmageGameBundle:Territory:build.html.twig")
     */
    public function buildAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }

    /**
     * @Route("/territory/demolish")
     * @Template("ArchmageGameBundle:Territory:demolish.html.twig")
     */
    public function demolishAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }
}
