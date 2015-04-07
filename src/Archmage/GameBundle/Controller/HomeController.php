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
     * @Template("ArchmageGameBundle:Home:index.html.twig")
     */
    public function indexAction()
    {
        $this->addFlash('info', 'Tenemos X jugadores online ahora mismo!');
        return array();
    }
}
