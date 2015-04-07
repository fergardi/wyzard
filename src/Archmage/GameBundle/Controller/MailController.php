<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MailController extends Controller
{
    /**
     * @Route("/mail/inbox")
     * @Template("ArchmageGameBundle:Mail:inbox.html.twig")
     */
    public function inboxAction()
    {
        $this->addFlash('info', 'Faltan cosas!');
        return array();
    }
}
