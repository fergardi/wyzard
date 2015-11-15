<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Map
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Repository\MapRepository")
 */
class Map
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
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private $name = 'Mapa del Tesoro';

    /**
     * @var integer
     *
     * @ORM\Column(name="gold", type="bigint", nullable=false)
     */
    private $gold = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", nullable=false)
     */
    private $class = 'map';

    /**
     * @ORM\ManyToOne(targetEntity="Artifact")
     * @ORM\JoinColumn(name="artifact", referencedColumnName="id", nullable=false)
     **/
    private $artifact;

    /**
     * @ORM\OneToMany(targetEntity="Troop", mappedBy="map", cascade={"remove"})
     **/
    private $troops;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="maps")
     * @ORM\JoinColumn(name="player", referencedColumnName="id", nullable=true)
     **/
    private $player = null;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->troops = new ArrayCollection();
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
     * Set gold
     *
     * @param integer $gold
     * @return Map
     */
    public function setGold($gold)
    {
        $this->gold = $gold;

        return $this;
    }

    /**
     * Get gold
     *
     * @return integer 
     */
    public function getGold()
    {
        return $this->gold;
    }

    /**
     * Set artifact
     *
     * @param \Archmage\GameBundle\Entity\Artifact $artifact
     * @return Map
     */
    public function setArtifact(\Archmage\GameBundle\Entity\Artifact $artifact)
    {
        $this->artifact = $artifact;

        return $this;
    }

    /**
     * Get artifact
     *
     * @return \Archmage\GameBundle\Entity\Artifact 
     */
    public function getArtifact()
    {
        return $this->artifact;
    }

    /**
     * Add troops
     *
     * @param \Archmage\GameBundle\Entity\Troop $troops
     * @return Map
     */
    public function addTroop(\Archmage\GameBundle\Entity\Troop $troops)
    {
        $this->troops[] = $troops;

        return $this;
    }

    /**
     * Remove troops
     *
     * @param \Archmage\GameBundle\Entity\Troop $troops
     */
    public function removeTroop(\Archmage\GameBundle\Entity\Troop $troops)
    {
        $this->troops->removeElement($troops);
    }

    /**
     * Get troops
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTroops()
    {
        return $this->troops;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Map
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set class
     *
     * @param string $class
     * @return Map
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set player
     *
     * @param \Archmage\GameBundle\Entity\Player $player
     * @return Map
     */
    public function setPlayer(\Archmage\GameBundle\Entity\Player $player = null)
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
