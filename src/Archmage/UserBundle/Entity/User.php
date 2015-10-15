<?php

namespace Archmage\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="`User`")
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /*
     * must be nullable because we handle the user created by fosuserbundle and then we add all the player stuff
     * see Archmage/UserBundle/Controller/RegistrationController.php
     */

    /**
     * @ORM\OneToOne(targetEntity="Archmage\GameBundle\Entity\Player")
     * @ORM\JoinColumn(name="player", referencedColumnName="id", nullable=true)
     */
    protected $player;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set telegram
     *
     * @param integer $telegram
     * @return User
     */
    public function setTelegram($telegram)
    {
        $this->telegram = $telegram;

        return $this;
    }

    /**
     * Get telegram
     *
     * @return integer
     */
    public function getTelegram()
    {
        return $this->telegram;
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
