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
        $jugadores = rand(0,10);
        $registrados = rand($jugadores, 100);
        $this->addFlash('info', 'Bienvenido de nuevo! Hay '.$jugadores.' jugador(es) online de '.$registrados.' registrado(s).');
        return array();
    }
}
