<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AccountController extends Controller
{
    /**
     * @Route("/game/account/profile/{id}", requirements={"id" = "\d+"})
     * @Template("ArchmageGameBundle:Account:profile.html.twig")
     */
    public function profileAction($id = null)
    {
        $this->get('service.controller')->addNews();
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        if (!$id) {
            $profile = $player;
        } else {
            $profile = $manager->getRepository('ArchmageGameBundle:Player')->findOneById($id);
            if (!$profile) {
                $this->addFlash('danger', 'Ese jugador no existe.');
                return $this->redirectToRoute('archmage_game_account_profile');
            }
        }
        return array(
            'player' => $player,
            'profile' => $profile,
        );
    }

    /**
     * @Route("/game/account/ranking")
     * @Template("ArchmageGameBundle:Account:ranking.html.twig")
     */
    public function rankingAction()
    {
        $this->get('service.controller')->addNews();
        $manager = $this->getDoctrine()->getManager();
        $players = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
        $player = $this->getUser()->getPlayer();
        return array(
            'players' => $players,
            'player' => $player,
        );
    }

    /**
     * @Route("/game/account/message/{hash}")
     * @Template("ArchmageGameBundle:Account:message.html.twig")
     */
    public function messageAction($hash = null)
    {
        $this->get('service.controller')->addNews();
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
            $player = $this->getUser()->getPlayer();
            return array(
                'message' => $message,
                'text' => $text,
                'player' => $player,
            );
        }
    }
}
