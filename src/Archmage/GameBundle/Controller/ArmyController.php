<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;
use Archmage\GameBundle\Entity\Troop;
use Archmage\GameBundle\Entity\Message;

class ArmyController extends Controller
{
    /**
     * @Route("/game/army/recruit")
     * @Template("ArchmageGameBundle:Army:recruit.html.twig")
     */
    public function recruitAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $neutral = $manager->getRepository('ArchmageGameBundle:Faction')->findOneByName('Neutral');
        $units = $manager->getRepository('ArchmageGameBundle:Unit')->findByFaction($neutral);
        if ($request->isMethod('POST')) {
            $turns = 1;
            $quantity = isset($_POST['quantity'])?$_POST['quantity']:null;
            $unit = isset($_POST['unit'])?$_POST['unit']:null;
            $unit = $manager->getRepository('ArchmageGameBundle:Unit')->findOneById($unit);
            if ($unit && $quantity && is_numeric($quantity) && $turns <= $player->getTurns() && $quantity > 0) {
                $troop = $player->hasUnit($unit);
                if ($troop) {
                    $troop->setQuantity($troop->getQuantity() + $quantity);
                } else {
                    if ($player->getTroops()->count() < $player::TROOPS_CAP) {
                        $troop = new Troop();
                        $manager->persist($troop);
                        $troop->setUnit($unit);
                        $troop->setQuantity($quantity);
                        $troop->setPlayer($player);
                        $player->addTroop($troop);
                    } else {
                        $this->addFlash('danger', 'No puedes tener más de '.$player::TROOPS_CAP.' tropas distintas al mismo tiempo, debes <i class="fa fa-fw fa-user-times"></i><a href='.$this->generateUrl('archmage_game_army_disband').'>Desbandar</a> alguna.');
                        return $this->redirect($this->generateUrl('archmage_game_army_recruit'));
                    }
                }
                $player->setTurns($player->getTurns() - $turns);
                $this->get('service.controller')->checkMaintenances($turns);
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' turnos y reclutado '.$this->get('service.controller')->nf($quantity).' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            //return $this->redirect($this->generateUrl('archmage_game_army_recruit'));
        }
        return array(
            'player' => $player,
            'units' => $units,
        );
    }

    /**
     * @Route("/game/army/disband")
     * @Template("ArchmageGameBundle:Army:disband.html.twig")
     */
    public function disbandAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        if ($request->isMethod('POST')) {
            $turns = 0;
            $quantity = isset($_POST['quantity'])?$_POST['quantity']:null;
            $troop = isset($_POST['troop'])?$_POST['troop']:null;
            $troop = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop);
            if ($turns <= $player->getTurns()) {
                if ($troop && $quantity && is_numeric($quantity) && $quantity > 0 && $quantity <= $troop->getQuantity()) {
                    $troop->setQuantity($troop->getQuantity() - $quantity);
                    if ($troop->getQuantity() <= 0) {
                        $player->removeTroop($troop);
                        $manager->remove($troop);
                    }
                    $player->setTurns($player->getTurns() - $turns);
                    $this->get('service.controller')->checkMaintenances($turns);
                    $manager->persist($player);
                    $manager->flush();
                    $this->addFlash('success', 'Has gastado ' . $this->get('service.controller')->nf($turns) . ' turnos y desbandado ' . $this->get('service.controller')->nf($quantity) . ' <span class="label label-'.$troop->getUnit()->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($troop->getUnit()->getName()).'" class="link">'.$troop->getUnit()->getName().'</a></span>.');
                } else {
                    $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
                }
            }
            else{
                $this->addFlash('danger', 'No tienes los <span class="label label-extra">Turnos</span> suficientes para eso.');
            }
            //return $this->redirect($this->generateUrl('archmage_game_army_disband'));
        }
        return array(
            'player' => $player,
        );
    }

    /**
     * @Route("/game/army/attack")
     * @Template("ArchmageGameBundle:Army:attack.html.twig")
     */
    public function attackAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        $targets = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
        if ($request->isMethod('POST')) {
            $turns = 2;
            $target = isset($_POST['target'])?$_POST['target']:null;
            $target = $manager->getRepository('ArchmageGameBundle:Player')->findOneById($target);
            $attackerResearch = isset($_POST['research'])?$_POST['research']:null;
            $attackerResearch = $manager->getRepository('ArchmageGameBundle:Research')->findOneById($attackerResearch);
            $mana = 0;
            if ($attackerResearch) {
                $attackerResearch->getSpell()->getFaction() == $player->getFaction() ? $bonus = 1 : $bonus = 2;
                $mana = $attackerResearch->getSpell()->getManaCost() * $bonus;
            }
            $attackerItem = isset($_POST['item'])?$_POST['item']:null;
            $attackerItem = $manager->getRepository('ArchmageGameBundle:Item')->findOneById($attackerItem);
            if ($turns <= $player->getTurns() && $mana <= $player->getMana()) {
                $attackerArmy = array();
                //tropa1
                $troop1 = isset($_POST['troop1'])?$_POST['troop1']:null;
                $troop1 = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop1);
                $quantity1 = isset($_POST['quantity1'])?$_POST['quantity1']:null;
                if ($troop1 && $quantity1 > 0) $attackerArmy[] = array($troop1, $quantity1);
                //tropa2
                $troop2 = isset($_POST['troop2'])?$_POST['troop2']:null;
                $troop2 = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop2);
                $quantity2 = isset($_POST['quantity2'])?$_POST['quantity2']:null;
                if ($troop1 && $quantity1 > 0) $attackerArmy[] = array($troop2, $quantity2);
                //tropa3
                $troop3 = isset($_POST['troop3'])?$_POST['troop3']:null;
                $troop3 = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop3);
                $quantity3 = isset($_POST['quantity3'])?$_POST['quantity3']:null;
                if ($troop1 && $quantity1 > 0) $attackerArmy[] = array($troop3, $quantity3);
                //tropa4
                $troop4 = isset($_POST['troop4'])?$_POST['troop4']:null;
                $troop4 = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop4);
                $quantity4 = isset($_POST['quantity4'])?$_POST['quantity4']:null;
                if ($troop1 && $quantity1 > 0) $attackerArmy[] = array($troop4, $quantity4);
                //tropa5
                $troop5 = isset($_POST['troop5'])?$_POST['troop5']:null;
                $troop5 = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop5);
                $quantity5 = isset($_POST['quantity5'])?$_POST['quantity5']:null;
                if ($troop1 && $quantity1 > 0) $attackerArmy[] = array($troop5, $quantity5);
                //quantity > 0
                if (!empty($attackerArmy) && $target) {
                    $chance = 100;
                    if ($chance >= $target->getArmyDefense()) {
                        $this->attackTarget($attackerArmy, $attackerResearch, $attackerItem, $target);
                        $this->addFlash('danger', 'Has gastado '.$turns.' <span class="label label-extra">Turnos</span> en atacar al mago <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                    } else {
                        $this->addFlash('danger', 'Has gastado '.$turns.' <span class="label label-extra">Turnos</span> en atacar, pero no has conseguido traspasar las defensas de <span class="label label-'.$target->getFaction()->getClass().'"><a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $target->getId())).'" class="link">'.$target->getNick().'</a></span>.');
                    }
                    $manager->persist($player);
                    $manager->persist($target);
                    $manager->flush();
                } else {
                    $this->addFlash('danger', 'Debes atacar con al menos 1 unidad.');
                }
            } else {
                $this->addFlash('danger', 'No tienes los <span class="label label-extra">Recursos</span> necesarios para eso.');
            }
        }
        return array(
            'player' => $player,
            'targets' => $targets,
        );
    }

    /**
     * attackTarget, battle only
     */
    public function attackTarget($attackerArmy, $attackerResearch, $attackerItem, $target)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        //DEFENDER
        $defenderArmy = array();
        foreach ($target->getTroops() as $troop) {
            $defenderArmy[] = array($troop, $troop->getQuantity());
        }
        $defenderResearch = $target->getResearch();
        $defenderItem = $target->getItem();
        if ($target->getTroops()->count() > 0) {
            $rounds = max(count($attackerArmy), count($defenderArmy));
            for ($i = 0; $i < $rounds; $i++) {

            }
            ladybug_dump_die($attackerArmy, $defenderArmy);
        }
        //MESSAGE
        $message = new Message();
        $message->setPlayer($player); //TODO CAMBIAR POR TARGET
        $message->setSubject('Reporte de Batalla');
        $text = array(
            array('default', 12, 0, 'center', 'Consejo del Reino de <a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link"><span class="label label-'.$player->getFaction()->getClass().'">'.$player->getNick().'</span></a> hemos decidido atacar tu Reino.'),
            array('success', 8, 0, 'center', 'Consejo del Reino de <a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link"><span class="label label-'.$player->getFaction()->getClass().'">'.$player->getNick().'</span></a> hemos decidido atacar tu Reino.'),
            array('danger', 8, 4, 'center', 'Consejo del Reino de <a href="'.$this->generateUrl('archmage_game_account_profile', array('id' => $player->getId())).'" class="link"><span class="label label-'.$player->getFaction()->getClass().'">'.$player->getNick().'</span></a> hemos decidido atacar tu Reino.'),
            array('default', 12, 0, 'center', 'Resultado'),
        );
        $message->setText($text);
        $message->setClass('danger');
        $message->setOwner($player);
        $message->setReaded(false);
        $manager->persist($message);
        $player->addMessage($message); //TODO CAMBIAR POR TARGET
    }
}
