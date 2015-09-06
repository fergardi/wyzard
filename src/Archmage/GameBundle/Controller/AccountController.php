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
        $manager = $this->getDoctrine()->getManager();
        if (!$player) {
            $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        } else {
            $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick($player);
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
        $manager = $this->getDoctrine()->getManager();
        $players = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
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
            $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
            return array(
                'player' => $player,
            );
        } else {
            $message = $manager->getRepository('ArchmageGameBundle:Message')->findOneByHash($hash);
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

    /**
     * Flashbags notices controller as a service app/config/services.yml
     */
    public function news()
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        $notices = $player->getMessages();
        foreach ($notices as $notice) {
            if (!$notice->getReaded()) {
                $notice->setReaded(true);
                $this->addFlash($notice->getClass(), $notice->getSubject());
            }
        }
        $manager->persist($player);
        $manager->flush();
    }
}
