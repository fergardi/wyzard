<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contract
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Entity\ContractRepository")
 */
class Contract
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Hero")
     * @ORM\JoinColumn(name="hero", referencedColumnName="id", nullable=false)
     **/
    private $hero;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="contracts")
     * @ORM\JoinColumn(name="player", referencedColumnName="id", nullable=false)
     **/
    private $player;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set hero
     *
     * @param \Archmage\GameBundle\Entity\Hero $hero
     * @return Contract
     */
    public function setHero(\Archmage\GameBundle\Entity\Hero $hero)
    {
        $this->hero = $hero;

        return $this;
    }

    /**
     * Get hero
     *
     * @return \Archmage\GameBundle\Entity\Hero 
     */
    public function getHero()
    {
        return $this->hero;
    }

    /**
     * Set player
     *
     * @param \Archmage\GameBundle\Entity\Player $player
     * @return Contract
     */
    public function setPlayer(\Archmage\GameBundle\Entity\Player $player)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \Archmage\GameBundle\Entity\Player 
     */
    public function getPlayer()
    {
        return $this->player;
    }
}
