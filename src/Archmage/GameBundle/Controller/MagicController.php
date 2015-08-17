<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MagicController extends Controller
{
    /**
     * @Route("/game/magic/charge")
     * @Template("ArchmageGameBundle:Magic:charge.html.twig")
     */
    public function chargeAction()
    {
        return array();
    }

    /**
     * @Route("/game/magic/conjure")
     * @Template("ArchmageGameBundle:Magic:conjure.html.twig")
     */
    public function conjureAction()
    {
        $em = $this->getDoctrine()->getManager();
        $researchs = $em->getRepository('ArchmageGameBundle:Spell')->findBy(array(), array('name' => 'asc'));
        shuffle($researchs);
        $researchs = array_slice($researchs, 0, 4);
        return array(
            'researchs' => $researchs,
        );
    }

    /**
     * @Route("/game/magic/research")
     * @Template("ArchmageGameBundle:Magic:research.html.twig")
     */
    public function researchAction()
    {
        $em = $this->getDoctrine()->getManager();
        $researchs = $em->getRepository('ArchmageGameBundle:Spell')->findBy(array(), array('name' => 'asc'));
        shuffle($researchs);
        $researchs = array_slice($researchs, 0, 4);
        return array(
            'researchs' => $researchs,
        );
    }

    /**
     * @Route("/game/magic/artifact")
     * @Template("ArchmageGameBundle:Magic:artifact.html.twig")
     */
    public function artifactAction()
    {
        $em = $this->getDoctrine()->getManager();
        $items = $em->getRepository('ArchmageGameBundle:Artifact')->findBy(array(), array('name' => 'asc'));
        shuffle($items);
        $items = array_slice($items, 0, 4);
        return array(
            'items' => $items,
        );
    }
}
