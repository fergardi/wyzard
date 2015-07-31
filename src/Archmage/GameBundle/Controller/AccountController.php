<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AccountController extends Controller
{
    /**
     * @Route("/account/summary")
     * @Template("ArchmageGameBundle:Account:summary.html.twig")
     */
    public function summaryAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }

    /**
     * @Route("/account/inbox")
     * @Template("ArchmageGameBundle:Account:inbox.html.twig")
     */
    public function inboxAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }
}
