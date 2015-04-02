<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MagicController extends Controller
{
    /**
     * @Route("/magic")
     * @Template("ArchmageGameBundle:Magic:index.html.twig")
     */
    public function indexAction()
    {
        return array();
    }
}
