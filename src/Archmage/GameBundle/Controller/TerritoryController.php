<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TerritoryController extends Controller
{
    /**
     * @Route("/game/territory/explore")
     * @Template("ArchmageGameBundle:Territory:explore.html.twig")
     */
    public function exploreAction()
    {
        return array();
    }

    /**
     * @Route("/game/territory/build")
     * @Template("ArchmageGameBundle:Territory:build.html.twig")
     */
    public function buildAction()
    {
        $em = $this->getDoctrine()->getManager();
        $constructions = $em->getRepository('ArchmageGameBundle:Building')->findAll();
        return array(
            'constructions' => $constructions,
        );
    }

    /**
     * @Route("/game/territory/demolish")
     * @Template("ArchmageGameBundle:Territory:demolish.html.twig")
     */
    public function demolishAction()
    {
        $em = $this->getDoctrine()->getManager();
        $constructions = $em->getRepository('ArchmageGameBundle:Building')->findAll();
        return array(
            'constructions' => $constructions,
        );
    }
}
