<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ArmyController extends Controller
{
    /**
     * @Route("/army")
     * @Template("ArchmageGameBundle:Army:index.html.twig")
     */
    public function indexAction()
    {
        return array();
    }
}
