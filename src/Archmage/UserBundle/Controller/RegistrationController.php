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
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Message;

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
            if ($form->isValid()) {
                $event = new FormEvent($form, $request);
                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);
                /*
                 * BEGIN OWN CODE
                 */
                //player
                $player = new Player();
                $player->setFaction($manager->getRepository('ArchmageGameBundle:Faction')->findOneById($_POST['faction']));
                //constructions
                $constructions = array(
                    'Tierras' => 600,
                    'Granjas' => 11,
                    'Pueblos' => 11,
                    'Nodos' => 11,
                    'Gremios' => 11,
                    'Talleres' => 11,
                    'Barracones' => 11,
                    'Barreras' => 0,
                    'Fortalezas' => 0,
                );
                foreach ($constructions as $name => $quantity) {
                    $construction = new Construction();
                    $construction->setBuilding($manager->getRepository('ArchmageGameBundle:Building')->findOneByName($name));
                    $construction->setQuantity($quantity);
                    $construction->setPlayer($player);
                    $manager->persist($construction);
                    $player->addConstruction($construction);
                }
                //troops
                $troops = array(
                    'Arqueros' => 100,
                    'Caballeros' => 100,
                    'Catapultas' => 100,
                    'Milicias' => 100,
                    'Piqueros' => 100,
                );
                foreach ($troops as $name => $quantity) {
                    $troop = new Troop();
                    $troop->setUnit($manager->getRepository('ArchmageGameBundle:Unit')->findOneByName($name));
                    $troop->setQuantity($quantity);
                    $troop->setPlayer($player);
                    $manager->persist($troop);
                    $player->addTroop($troop);
                }
                //resources
                $player->setNick($user->getUsername());
                $player->setGold(3000000);
                $player->setPeople(10000);
                $player->setMana(1000);
                $player->setTurns(300);
                $player->setMagic(1);
                //messages
                $text = array();
                $text[] = array('default', 12, 0, 'center', '¡Te damos la bienvenida, Novicio! El Concilio recomienda que leas la <i class="fa fa-fw fa-book"></i><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'" class="link">Sagrada Ayuda del Juego</a>.');
                $subject = 'Bienvenido!';
                $this->get('service.controller')->sendMessage($player, $player, $subject, $text);
                //persist && flush
                $manager->persist($player);
                $user->setPlayer($player);
                $manager->persist($user);
                $manager->flush();
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