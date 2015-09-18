<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AccountController extends Controller
{
    /**
     * @Route("/game/account/profile/{username}")
     * @Template("ArchmageGameBundle:Account:profile.html.twig")
     */
    public function profileAction($username = null)
    {
        $manager = $this->getDoctrine()->getManager();
        if (!$username) {
            $player = $this->getUser()->getPlayer();
        } else {
            $user = $manager->getRepository('ArchmageUserBundle:User')->findOneByUsername($username);
            if (!$user) {
                $this->addFlash('danger', 'No existe ningún jugador con ese nombre.');
                return $this->redirectToRoute('archmage_game_account_profile');
            }
            $player = $user->getPlayer();
        }
        $progresses = $manager->getRepository('ArchmageGameBundle:Spell')->findProgressByPlayer($player);
        return array(
            'player' => $player,
            'progresses' => $progresses,
        );
    }

    /**
     * @Route("/game/account/ranking")
     * @Template("ArchmageGameBundle:Account:ranking.html.twig")
     */
    public function rankingAction()
    {
        $manager = $this->getDoctrine()->getManager();
        $players = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
        $player = $this->getUser()->getPlayer();
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
        $manager = $this->getDoctrine()->getManager();
        if (!$hash) {
            $player = $this->getUser()->getPlayer();
            return array(
                'player' => $player,
            );
        } else {
            $message = $manager->getRepository('ArchmageGameBundle:Message')->findOneByHash($hash);
            if (!$message) {
                $this->addFlash('danger', 'No existe ningún mensaje con esa identificación.');
                return $this->redirectToRoute('archmage_game_account_message');
            }
            $text = json_decode($message->getText(), true);
            return array(
                'message' => $message,
                'text' => $text,
            );
        }
    }
}
