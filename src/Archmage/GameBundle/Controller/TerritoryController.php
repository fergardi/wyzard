<?php

namespace Archmage\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class TerritoryController extends Controller
{
    /**
     * @Route("/game/territory/explore")
     * @Template("ArchmageGameBundle:Territory:explore.html.twig")
     */
    public function exploreAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        if ($request->isMethod('POST')) {
            $turns = isset($_POST['turns'])?$_POST['turns']:null;
            if ($turns && is_numeric($turns) && $turns > 0 && $turns <= $player->getTurns()) {
                /*
                 * MANTENIMIENTOS
                 */
                $player->setTurns($player->getTurns() - $turns);
                $this->get('service.controller')->checkMaintenances($turns);
                /*
                 * ACCION
                 */
                $lands = 0;
                for ($i = 1; $i <= $turns; $i++) {
                    $lands += $player->getFreePerTurn();
                    $player->setConstruction('Tierras', $player->getConstruction('Tierras')->getQuantity() + $player->getFreePerTurn());
                }
                /*
                 * PERSISTENCIA
                 */
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span> y encontrado '.$this->get('service.controller')->nff($lands).' <span class="label label-extra">Tierras</span>.');
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_territory_explore'));
        }
        return array(
            'player' => $player,
        );
    }

    /**
     * @Route("/game/territory/build")
     * @Template("ArchmageGameBundle:Territory:build.html.twig")
     */
    public function buildAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        if ($request->isMethod('POST')) {
            $lands = isset($_POST['lands'])?$_POST['lands']:null;
            $construction = isset($_POST['construction'])?$_POST['construction']:null;
            $construction = $manager->getRepository('ArchmageGameBundle:Construction')->findOneById($construction);
            if ($lands && is_numeric($lands) && $construction && $player->getConstructions()->contains($construction) && $lands > 0 && $lands <= $player->getConstruction('Tierras')->getQuantity()) {
                $turns = ceil($lands / ceil(($player->getConstruction('Talleres')->getQuantity() + 1) / $construction->getBuilding()->getBuildingRatio()));
                $gold = $construction->getBuilding()->getGoldCost() * $lands;
                $people = $construction->getBuilding()->getPeopleCost() * $lands;
                $mana = $construction->getBuilding()->getManaCost() * $lands;
                if ($turns <= $player->getTurns() && $gold <= $player->getGold() && $people <= $player->getPeople() && $mana <= $player->getMana()) {
                    /*
                     * MANTENIMIENTOS
                     */
                    $player->setGold($player->getGold() - $gold);
                    $player->setPeople($player->getPeople() - $people);
                    $player->setMana($player->getMana() - $mana);
                    $player->setTurns($player->getTurns() - $turns);
                    $this->get('service.controller')->checkMaintenances($turns);
                    /*
                     * ACCION
                     */
                    $construction->setQuantity($construction->getQuantity() + $lands);
                    $player->setConstruction('Tierras', $player->getConstruction('Tierras')->getQuantity() - $lands);
                    /*
                     * PERSISTENCIA
                     */
                    $manager->persist($player);
                    $manager->flush();
                    $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span>, '.$this->get('service.controller')->nff($gold).' <span class="label label-extra">Oro</span>, '.$this->get('service.controller')->nff($people).' <span class="label label-extra">Personas</span> y '.$this->get('service.controller')->nff($mana).' <span class="label label-extra">Maná</span>, y construido '.$this->get('service.controller')->nff($lands).' <span class="label label-extra"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($construction->getBuilding()->getName()).'" class="link">'.$construction->getBuilding()->getName().'</a></span>.');
                } else {
                    $this->addFlash('danger', 'No tienes suficientes <span class="label label-extra">Recursos</span> para eso.');
                }
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_territory_build'));
        }
        return array(
            'player' => $player,
        );
    }

    /**
     * @Route("/game/territory/demolish")
     * @Template("ArchmageGameBundle:Territory:demolish.html.twig")
     */
    public function demolishAction(Request $request)
    {
        $this->get('service.controller')->addNews();
        if ($this->get('service.controller')->checkWinner()) return $this->redirect($this->generateUrl('archmage_game_account_legend'));
        $manager = $this->getDoctrine()->getManager();
        $player = $this->getUser()->getPlayer();
        if ($request->isMethod('POST')) {
            $turns = 0;
            $lands = isset($_POST['lands'])?$_POST['lands']:null;
            $construction = isset($_POST['construction'])?$_POST['construction']:null;
            $construction = $manager->getRepository('ArchmageGameBundle:Construction')->findOneById($construction);
            if ($lands && is_numeric($lands) && $construction && $player->getConstructions()->contains($construction) && $lands > 0 && $lands <= $construction->getQuantity() && $player->getTurns() > 0) {
                /*
                 * MANTENIMIENTOS
                 */
                $player->setTurns($player->getTurns() - $turns);
                $this->get('service.controller')->checkMaintenances($turns);
                /*
                 * ACCION
                 */
                $construction->setQuantity($construction->getQuantity() - $lands);
                $player->setConstruction('Tierras', $player->getConstruction('Tierras')->getQuantity() + $lands);
                /*
                 * PERSISTENCIA
                 */
                $manager->persist($player);
                $manager->flush();
                $this->addFlash('success', 'Has gastado '.$this->get('service.controller')->nff($turns).' <span class="label label-extra">Turnos</span> y derribado '.$this->get('service.controller')->nff($lands).' <span class="label label-extra"><a href="'.$this->generateUrl('archmage_game_home_help').'#'.$this->get('service.controller')->toSlug($construction->getBuilding()->getName()).'" class="link">'.$construction->getBuilding()->getName().'</a></span>.');
            } else {
                $this->addFlash('danger', 'Ha ocurrido un error, vuelve a intentarlo.');
            }
            return $this->redirect($this->generateUrl('archmage_game_territory_demolish'));
        }
        return array(
            'player' => $player,
        );
    }
}
