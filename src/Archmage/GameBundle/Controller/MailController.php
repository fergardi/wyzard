<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MailController extends Controller
{
    /**
     * @Route("/mail")
     * @Template("ArchmageGameBundle:Mail:index.html.twig")
     */
    public function indexAction()
    {
        return array();
    }
}
