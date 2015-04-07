<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MagicController extends Controller
{
    /**
     * @Route("/magic/summary")
     * @Template("ArchmageGameBundle:Magic:summary.html.twig")
     */
    public function summaryAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }

    /**
     * @Route("/magic/charge")
     * @Template("ArchmageGameBundle:Magic:charge.html.twig")
     */
    public function chargeAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }

    /**
     * @Route("/magic/conjure")
     * @Template("ArchmageGameBundle:Magic:conjure.html.twig")
     */
    public function conjureAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }

    /**
     * @Route("/magic/research")
     * @Template("ArchmageGameBundle:Magic:research.html.twig")
     */
    public function researchAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }

    /**
     * @Route("/magic/artifact")
     * @Template("ArchmageGameBundle:Magic:artifact.html.twig")
     */
    public function artifactAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }
}
