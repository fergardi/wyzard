<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Legend
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Repository\LegendRepository")
 */
class Legend
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
     * @var string
     *
     * @ORM\Column(name="nick", type="string", length=255)
     */
    private $nick;

    /**
     * @var integer
     *
     * @ORM\Column(name="lands", type="integer")
     */
    private $lands;

    /**
     * @var integer
     *
     * @ORM\Column(name="power", type="bigint")
     */
    private $power;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;


    /**
     * Constructor
     **/
    public function __construct()
    {
        $this->datetime = new \DateTime('now');
    }

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
     * Set nick
     *
     * @param string $nick
     * @return Legend
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Get nick
     *
     * @return string 
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set lands
     *
     * @param integer $lands
     * @return Legend
     */
    public function setLands($lands)
    {
        $this->lands = $lands;

        return $this;
    }

    /**
     * Get lands
     *
     * @return integer 
     */
    public function getLands()
    {
        return $this->lands;
    }

    /**
     * Set power
     *
     * @param integer $power
     * @return Legend
     */
    public function setPower($power)
    {
        $this->power = $power;

        return $this;
    }

    /**
     * Get power
     *
     * @return integer 
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return Legend
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
}
