<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AccountController extends Controller
{
    /**
     * @Route("/game/account/profile/{player}")
     * @Template("ArchmageGameBundle:Account:profile.html.twig")
     */
    public function profileAction($player = null)
    {
        $em = $this->getDoctrine()->getManager();
        if ($player == null) {
            $player = $em->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        } else {
            $player = $em->getRepository('ArchmageGameBundle:Player')->findOneByNick($player);
            if (!$player) {
                $this->addFlash('danger', 'No existe ningún jugador con ese nombre.');
                return $this->redirectToRoute('archmage_game_account_profile');
            }
        }
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
        $player = $em->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        return array(
            'players' => $players,
            'search' => $player->getNick(),
        );
    }

    /**
     * @Route("/game/account/message/{hash}")
     * @Template("ArchmageGameBundle:Account:message.html.twig")
     */
    public function messageAction($hash = null)
    {
        $em = $this->getDoctrine()->getManager();
        if (!$hash) {
            $player = $em->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
            return array(
                'player' => $player,
            );
        } else {
            $message = $em->getRepository('ArchmageGameBundle:Message')->findOneByHash($hash);
            if (!$message) {
                $this->addFlash('danger', 'No existe ningún mensaje con esa identificación.');
                return $this->redirectToRoute('archmage_game_account_message');
            } else {
                return array(
                    'message' => $message,
                );
            }
        }
    }
}
