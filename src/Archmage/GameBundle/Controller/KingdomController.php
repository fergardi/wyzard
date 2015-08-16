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
        $units = array_slice($units, 0, 3);
        $artifacts = $em->getRepository('ArchmageGameBundle:Artifact')->findAll();
        shuffle($artifacts);
        $artifacts = array_slice($artifacts, 0, 2);
        $heroes = $em->getRepository('ArchmageGameBundle:Hero')->findAll();
        shuffle($heroes);
        $heroes = array_slice($heroes, 0, 1);
        return array(
            'heroes' => $heroes,
            'units' => $units,
            'artifacts' => $artifacts,
        );
    }
}
