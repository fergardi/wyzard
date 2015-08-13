<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class KingdomController extends Controller
{
    /**
     * @Route("/game/kingdom/summary")
     * @Template("ArchmageGameBundle:Kingdom:summary.html.twig")
     */
    public function summaryAction()
    {
        return array();
    }

    /**
     * @Route("/game/kingdom/tax")
     * @Template("ArchmageGameBundle:Kingdom:tax.html.twig")
     */
    public function taxAction()
    {
        return array();
    }

    /**
     * @Route("/game/kingdom/auction")
     * @Template("ArchmageGameBundle:Kingdom:auction.html.twig")
     */
    public function auctionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $units = $em->getRepository('ArchmageGameBundle:Unit')->findAll();
        shuffle($units);
        $units = array_slice($units, 0, 6);
        return $this->render('ArchmageGameBundle:Kingdom:auction.html.twig', array(
                'units' => $units,
            )
        );
    }
}
