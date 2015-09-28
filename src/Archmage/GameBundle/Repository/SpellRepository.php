<?php

namespace Archmage\GameBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Archmage\GameBundle\Entity\Player;


/**
 * SpellRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SpellRepository extends EntityRepository
{
    public function findAllSpellsResearchablesByPlayer(Player $player)
    {
        //buscar todas las ids de spells de researchs actuales
        $qb = $this->_em->createQueryBuilder();
        $qb->select('r')
            ->from('ArchmageGameBundle:Research', 'r')
            ->andWhere('r.player = :id')
            ->setParameter('id', $player);
        $researchs = $qb->getQuery()->getResult();
        foreach ($researchs as $research) {
            $ids[] = $research->getSpell()->getId();
        }
        //buscar todos los spells que no tengan ids de las researchs actuales
        $qb = $this->_em->createQueryBuilder();
        $qb->select('s')
            ->from('ArchmageGameBundle:Spell', 's')
            ->andWhere('s.faction = :faction')
            ->orWhere('s.name = :name');
        if(!empty($ids)) {
            $qb->andWhere('s.id NOT IN (:ids)');
            $qb->setParameter('ids', $ids);
        }
        $qb->setParameter('name', 'Apocalipsis');
        $qb->setParameter('faction', $player->getFaction());

        return $qb->getQuery()->getResult();
    }
}
