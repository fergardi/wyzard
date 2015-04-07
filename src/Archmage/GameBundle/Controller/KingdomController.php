<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class KingdomController extends Controller
{
    /**
     * @Route("/kingdom/summary")
     * @Template("ArchmageGameBundle:Kingdom:summary.html.twig")
     */
    public function summaryAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }

    /**
     * @Route("/kingdom/tax")
     * @Template("ArchmageGameBundle:Kingdom:tax.html.twig")
     */
    public function taxAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }

    /**
     * @Route("/kingdom/hire")
     * @Template("ArchmageGameBundle:Kingdom:hire.html.twig")
     */
    public function hireAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }

    /**
     * @Route("/kingdom/auction")
     * @Template("ArchmageGameBundle:Kingdom:auction.html.twig")
     */
    public function auctionAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }
}
