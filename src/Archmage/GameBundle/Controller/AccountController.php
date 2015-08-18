<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AccountController extends Controller
{
    /**
     * @Route("/game/account/profile/{player}", requirements={"player" = "\s+"})
     * @Template("ArchmageGameBundle:Account:profile.html.twig")
     */
    public function profileAction($player)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('ArchmageGameBundle:Player')->findOneByNick($player);
        return array(
            'player' => $player,
        );
    }

    /**
     * @Route("/game/account/ranking")
     * @Template("ArchmageGameBundle:Account:ranking.html.twig")
     */
    public function rankingAction()
    {
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository('ArchmageGameBundle:Player')->findAll();
        return array(
            'players' => $players,
        );
    }

    /**
     * @Route("/game/account/inbox")
     * @Template("ArchmageGameBundle:Account:inbox.html.twig")
     */
    public function inboxAction()
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        return array(
            'player' => $player,
        );
    }

    /**
     * @Route("/game/account/outbox")
     * @Template("ArchmageGameBundle:Account:outbox.html.twig")
     */
    public function outboxAction()
    {
        return array();
    }
}
