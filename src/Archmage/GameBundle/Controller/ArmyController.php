<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;
use Archmage\GameBundle\Entity\Troop;

class ArmyController extends Controller
{
    /**
     * @Route("/game/army/recruit")
     * @Template("ArchmageGameBundle:Army:recruit.html.twig")
     */
    public function recruitAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
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
                    $troop = new Troop();
                    $manager->persist($troop);
                    $troop->setUnit($unit);
                    $troop->setQuantity($quantity);
                    $troop->setPlayer($player);
                    $player->addTroop($troop);
                }
                $player->setTurns($player->getTurns() - $turns);
                $this->get('service.controller')->checkMaintenances($turns);
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' turnos y reclutado '.$this->get('service.controller')->nf($quantity).' unidades.');
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_army_recruit'));
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
        $manager = $this->getDoctrine()->getManager();
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        if ($request->isMethod('POST')) {
            $turns = 1;
            $quantity = isset($_POST['quantity'])?$_POST['quantity']:null;
            $troop = isset($_POST['troop'])?$_POST['troop']:null;
            $troop = $manager->getRepository('ArchmageGameBundle:Troop')->findOneById($troop);
            if ($troop && $quantity && is_numeric($quantity) && $turns <= $player->getTurns() && $quantity > 0 && $quantity <= $troop->getQuantity()) {
                $troop->setQuantity($troop->getQuantity() - $quantity);
                if ($troop->getQuantity() <= 0) {
                    $player->removeTroop($troop);
                    $manager->remove($troop);
                }
                $player->setTurns($player->getTurns() - $turns);
                $this->get('service.controller')->checkMaintenances($turns);
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nf($turns).' turnos y desbandado '.$this->get('service.controller')->nf($quantity).' unidades.');
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_army_disband'));
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
        $manager = $this->getDoctrine()->getManager();
        $player = $manager->getRepository('ArchmageGameBundle:Player')->findOneByNick('Fergardi');
        $targets = $manager->getRepository('ArchmageGameBundle:Player')->findAll();
        if ($request->isMethod('POST')) {

        }
        return array(
            'player' => $player,
            'targets' => $targets,
        );
    }
}
