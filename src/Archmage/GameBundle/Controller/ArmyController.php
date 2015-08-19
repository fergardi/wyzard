<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class ArmyController extends Controller
{
    /**
     * @Route("/game/army/recruit")
     * @Template("ArchmageGameBundle:Army:recruit.html.twig")
     */
    public function recruitAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        $faction = $em->getRepository('ArchmageGameBundle:Faction')->findOneBy(array('name' => 'Neutral'));
        $units = $em->getRepository('ArchmageGameBundle:Unit')->findBy(array('faction' => $faction->getId()), array('name' => 'asc'));
        return array(
            'player' => $player,
            'units' => $units,
        );
    }

    /**
     * @Route("/game/army/disband")
     * @Template("ArchmageGameBundle:Army:disband.html.twig")
     */
    public function disbandAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        if ($request->isMethod('POST')) {

        }
        return array(
            'player' => $player,
        );
    }

    /**
     * @Route("/game/army/attack")
     * @Template("ArchmageGameBundle:Army:attack.html.twig")
     */
    public function attackAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        if ($request->isMethod('POST')) {

        }
        return array(
            'player' => $player,
        );
    }
}
