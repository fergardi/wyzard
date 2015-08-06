<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AccountController extends Controller
{
    /**
     * @Route("/account/profile")
     * @Template("ArchmageGameBundle:Account:profile.html.twig")
     */
    public function profileAction()
    {
        return array();
    }

    /**
     * @Route("/account/ranking")
     * @Template("ArchmageGameBundle:Account:ranking.html.twig")
     */
    public function rankingAction()
    {
        return array();
    }

    /**
     * @Route("/account/inbox")
     * @Template("ArchmageGameBundle:Account:inbox.html.twig")
     */
    public function inboxAction()
    {
        return array();
    }
}
