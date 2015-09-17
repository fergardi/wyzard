<?php

namespace Archmage\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="`User`")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Archmage\GameBundle\Entity\Player")
     * @ORM\JoinColumn(name="player", referencedColumnName="id", nullable=false)
     */
    protected $player;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set player
     *
     * @param \Archmage\GameBundle\Entity\Player $player
     * @return User
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
