<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TerritoryController extends Controller
{
    /**
     * @Route("/game/territory/summary")
     * @Template("ArchmageGameBundle:Territory:summary.html.twig")
     */
    public function summaryAction()
    {
        return array();
    }

    /**
     * @Route("/game/territory/explore")
     * @Template("ArchmageGameBundle:Territory:explore.html.twig")
     */
    public function exploreAction()
    {
        return array();
    }

    /**
     * @Route("/game/territory/build")
     * @Template("ArchmageGameBundle:Territory:build.html.twig")
     */
    public function buildAction()
    {
        return array();
    }

    /**
     * @Route("/game/territory/demolish")
     * @Template("ArchmageGameBundle:Territory:demolish.html.twig")
     */
    public function demolishAction()
    {
        return array();
    }
}
