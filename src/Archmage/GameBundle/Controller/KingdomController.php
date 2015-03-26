<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class KingdomController extends Controller
{
    /**
     * @Route("/kingdom")
     * @Template("ArchmageGameBundle:Kingdom:index.html.twig")
     */
    public function indexAction()
    {
        return array();
    }
}
