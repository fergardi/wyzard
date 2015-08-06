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
        $online = rand(5,20);
        $total = rand($online, 200);
        $this->addFlash('info', 'Bienvenido de nuevo! Hay '.$online.' jugador(es) online de <a href="#" class="alert-link">'.$total.' registrado(s)</a>.');
        return array();
    }
}
