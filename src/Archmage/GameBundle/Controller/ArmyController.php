<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ArmyController extends Controller
{
    /**
     * @Route("/game/army/recruit")
     * @Template("ArchmageGameBundle:Army:recruit.html.twig")
     */
    public function recruitAction()
    {
        $em = $this->getDoctrine()->getManager();
        $faction = $em->getRepository('ArchmageGameBundle:Faction')->findOneBy(array('name' => 'Neutral'));
        $units = $em->getRepository('ArchmageGameBundle:Unit')->findBy(array('faction' => $faction->getId()), array('name' => 'asc'));
        return $this->render('ArchmageGameBundle:Army:recruit.html.twig', array(
                'units' => $units,
            )
        );
    }

    /**
     * @Route("/game/army/disband")
     * @Template("ArchmageGameBundle:Army:disband.html.twig")
     */
    public function disbandAction()
    {
        return array();
    }

    /**
     * @Route("/game/army/attack")
     * @Template("ArchmageGameBundle:Army:attack.html.twig")
     */
    public function attackAction()
    {
        return array();
    }
}
