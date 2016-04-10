<?php

namespace Archmage\UserBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\UserEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Archmage\GameBundle\Entity\Player;
use Archmage\GameBundle\Entity\Construction;
use Archmage\GameBundle\Entity\Item;

class RegistrationController extends BaseController
{
    public function registerAction(Request $request)
    {
        $manager = $this->container->get('doctrine')->getManager();
        $factions = $manager->getRepository('ArchmageGameBundle:Faction')->findAll();
        $formFactory = $this->container->get('fos_user.registration.form.factory');
        $userManager = $this->container->get('fos_user.user_manager');
        $dispatcher = $this->container->get('event_dispatcher');
        $user = $userManager->createUser();
        $user->setEnabled(true);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, new UserEvent($user, $request));
        $form = $formFactory->createForm();
        $form->setData($user);
        if ('POST' === $request->getMethod()) {
            $form->bind($request);
            //ladybug_dump_die($form->getErrorsAsString());
            if ($form->isValid()) {
                $event = new FormEvent($form, $request);
                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);

                /*
                 * BEGIN OWN CODE
                 */

                //player
                $player = new Player();
                $player->setFaction($manager->getRepository('ArchmageGameBundle:Faction')->findOneById($_POST['faction']));
                $player->setGod(false);
                $player->setWinner(false);

                //constructions
                $constructions = array(
                    'Tierras' => 600,
                    'Granjas' => 30,
                    'Pueblos' => 20,
                    'Nodos' => 10,
                    'Gremios' => 0,
                    'Talleres' => 0,
                    'Barracones' => 0,
                    'Barreras' => 3,
                    'Fortalezas' => 3,
                );
                foreach ($constructions as $name => $quantity) {
                    $construction = new Construction();
                    $construction->setBuilding($manager->getRepository('ArchmageGameBundle:Building')->findOneByName($name));
                    $construction->setQuantity($quantity);
                    $construction->setPlayer($player);
                    $manager->persist($construction);
                    $player->addConstruction($construction);
                }

                //item
                $artifacts = $manager->getRepository('ArchmageGameBundle:Artifact')->findByLegendary(false);
                shuffle($artifacts);
                $artifact = $artifacts[0];//suponemos > 0
                $item = new Item();
                $manager->persist($item);
                $item->setPlayer($player);
                $item->setArtifact($artifact);
                $item->setQuantity(1);
                $player->addItem($item);

                //resources
                $player->setNick($user->getUsername());
                $player->setGold(3000000);
                $player->setPeople(10000);
                $player->setMana(10000);
                $player->setTurns(300);
                $player->setMagic(1);

                //message
                $text = array();
                $text[] = array('default', 12, 0, 'center', 'Te damos la bienvenida, <span class="label label-'.$player->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link">'.$player->getNick().'</a></span>. Tus consejeros recomiendan que leas la <span class="label label-extra"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'" class="link">Extensa Ayuda</a></span> o el <span class="label label-extra">Maravilloso Tutorial</span>.');
                $text[] = array('default', 12, 0, 'center', 'Los <span class="label label-extra">Dioses</span> te han concedido un <span class="label label-artifact"><a href="'.$this->container->get('router')->generate('archmage_game_magic_artifact').'" class="link">Artefacto</a></span> aleatorio como favor.');
                $subject = 'Bienvenido a Wyzard';
                $this->get('service.controller')->sendMessage($player, $player, $subject, $text);

                //persist
                $manager->persist($player);
                $user->setPlayer($player);
                $user->setIp($_SERVER['REMOTE_ADDR']);
                $manager->persist($user);

                //flush
                $manager->flush();

                //send email to admin
                $message = \Swift_Message::newInstance()
                    ->setSubject('Wyzard: Nuevo usuario')
                    ->setFrom('admin@wyzard.es')
                    ->setTo($this->container->getParameter('webmaster'))
                    ->setBody(
                        'Se ha registrado un nuevo usuario en Wyzard, "'.$player->getNick().'"',
                        'text/html'
                    )
                ;
                $this->container->get('mailer')->send($message);

                /*
                 * END OWN CODE
                 */
                $userManager->updateUser($user);
                if (null === $response = $event->getResponse()) {
                    $url = $this->container->get('router')->generate('fos_user_registration_confirmed');
                    $response = new RedirectResponse($url);
                }
                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));
                return $response;
            }
        }
        return $this->container->get('templating')->renderResponse('FOSUserBundle:Registration:register.html.twig', array(
                'form' => $form->createView(),
                'factions' => $factions,
            )
        );
    }

    public function confirmedAction()
    {
        $response = parent::confirmedAction();

        //CUSTOM REDIRECT
        return $this->redirectToRoute('archmage_game_kingdom_summary');
    }
}