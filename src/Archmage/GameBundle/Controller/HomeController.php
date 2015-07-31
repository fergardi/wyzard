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
        $online = rand(0,10);
        $total = rand($online, 100);
        $this->addFlash('info', 'Bienvenido de nuevo! Hay '.$online.' jugador(es) online de '.$total.' registrado(s).');
        return array();
    }
}
