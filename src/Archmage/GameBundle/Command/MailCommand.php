<?php

namespace Archmage\GameBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MailCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('mail:send')
            ->setDescription('Envia un email de prueba.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('admin@wyzard.es')
            ->setTo('fergardi@gmail.com')
            ->setBody(
                $this->getContainer()->get('templating')->render(
                    'ArchmageGameBundle::email.html.twig',
                    array()
                ),
                'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;
        $this->getContainer()->get('mailer')->send($message);
    }
}