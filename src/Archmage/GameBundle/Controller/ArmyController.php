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
        $troops = $em->getRepository('ArchmageGameBundle:Unit')->findBy(array('faction' => $faction->getId()), array('name' => 'asc'));
        return array(
            'troops' => $troops,
        );
    }

    /**
     * @Route("/game/army/disband")
     * @Template("ArchmageGameBundle:Army:disband.html.twig")
     */
    public function disbandAction()
    {
        $em = $this->getDoctrine()->getManager();
        $troops = $em->getRepository('ArchmageGameBundle:Unit')->findBy(array(), array('name' => 'asc'));
        shuffle($troops);
        $troops = array_slice($troops, 0, 4);
        return array(
            'troops' => $troops,
        );
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
