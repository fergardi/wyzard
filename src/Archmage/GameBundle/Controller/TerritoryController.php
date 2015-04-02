<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TerritoryController extends Controller
{
    /**
     * @Route("/territory")
     * @Template("ArchmageGameBundle:Territory:index.html.twig")
     */
    public function indexAction()
    {
        return array();
    }
}
