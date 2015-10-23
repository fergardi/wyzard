<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attack
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Repository\AttackRepository")
 */
class Attack
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
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;

    /**
     * @var Player
     *
     * @ORM\ManyToOne(targetEntity="Player")
     * @ORM\JoinColumn(name="attacker", referencedColumnName="id", nullable=false)
     */
    private $attacker;

    /**
     * @var Player
     *
     * @ORM\ManyToOne(targetEntity="Player")
     * @ORM\JoinColumn(name="defender", referencedColumnName="id", nullable=false)
     */
    private $defender;


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
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return Attack
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime 
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set attacker
     *
     * @param \Archmage\GameBundle\Entity\Player $attacker
     * @return Attack
     */
    public function setAttacker(\Archmage\GameBundle\Entity\Player $attacker)
    {
        $this->attacker = $attacker;

        return $this;
    }

    /**
     * Get attacker
     *
     * @return \Archmage\GameBundle\Entity\Player 
     */
    public function getAttacker()
    {
        return $this->attacker;
    }

    /**
     * Set defender
     *
     * @param \Archmage\GameBundle\Entity\Player $defender
     * @return Attack
     */
    public function setDefender(\Archmage\GameBundle\Entity\Player $defender)
    {
        $this->defender = $defender;

        return $this;
    }

    /**
     * Get defender
     *
     * @return \Archmage\GameBundle\Entity\Player 
     */
    public function getDefender()
    {
        return $this->defender;
    }
}
