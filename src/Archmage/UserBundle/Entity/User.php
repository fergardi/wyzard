<?php

namespace Archmage\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="User")
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
   * @var string $nick
   *
   * @ORM\Column(name="name", type="string", length=255, nullable=false)
   */
  protected $nick;


  public function __construct()
  {
      parent::__construct();
  }

  /**
   * Set name
   *
   * @param  string $nick
   * @return User
   */
  public function setNick($nick)
  {
    $this->name = $nick;

    return $this;
  }

  /**
   * Get name
   *
   * @return string
   */
  public function getNick()
  {
    return $this->name;
  }
}