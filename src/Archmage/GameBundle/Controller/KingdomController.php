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
        return array();
    }

    /**
     * @Route("/kingdom/tax")
     * @Template("ArchmageGameBundle:Kingdom:tax.html.twig")
     */
    public function taxAction()
    {
        return array();
    }

    /**
     * @Route("/kingdom/hire")
     * @Template("ArchmageGameBundle:Kingdom:hire.html.twig")
     */
    public function hireAction()
    {
        return array();
    }

    /**
     * @Route("/kingdom/auction")
     * @Template("ArchmageGameBundle:Kingdom:auction.html.twig")
     */
    public function auctionAction()
    {
        return array();
    }
}
