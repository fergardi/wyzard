<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Entity\UnitRepository")
 */
class Unit
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="attack", type="integer", nullable=false)
     */
    private $attack;

    /**
     * @var integer
     *
     * @ORM\Column(name="defense", type="integer", nullable=false)
     */
    private $defense;

    /**
     * @var integer
     *
     * @ORM\Column(name="speed", type="integer", nullable=false)
     */
    private $speed;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="goldMaintenance", type="integer", nullable=false)
     */
    private $goldMaintenance;

    /**
     * @var integer
     *
     * @ORM\Column(name="manaMaintenance", type="integer", nullable=false)
     */
    private $manaMaintenance;

    /**
     * @var integer
     *
     * @ORM\Column(name="peopleMaintenance", type="integer", nullable=false)
     */
    private $peopleMaintenance;

    /**
     * @var integer
     *
     * @ORM\Column(name="goldAuction", type="integer", nullable=true)
     */
    private $goldAuction = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rarityAuction", type="boolean", nullable=true)
     */
    private $rarityAuction = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="goldRecruit", type="integer", nullable=true)
     */
    private $goldRecruit = null;

    /**
     * @var Faction
     *
     * @ORM\ManyToOne(targetEntity="Faction")
     * @ORM\JoinColumn(name="faction", referencedColumnName="id", nullable=false)
     */
    private $faction;

    /**
     * @var Family
     *
     * @ORM\ManyToOne(targetEntity="Family")
     * @ORM\JoinColumn(name="family", referencedColumnName="id", nullable=false)
     */
    private $family;

    /**
     * @var Type
     *
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumn(name="type", referencedColumnName="id", nullable=false)
     */
    private $type;


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
     * Set name
     *
     * @param string $name
     * @return Unit
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
     * Set description
     *
     * @param string $description
     * @return Unit
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set attack
     *
     * @param integer $attack
     * @return Unit
     */
    public function setAttack($attack)
    {
        $this->attack = $attack;

        return $this;
    }

    /**
     * Get attack
     *
     * @return integer 
     */
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * Set defense
     *
     * @param integer $defense
     * @return Unit
     */
    public function setDefense($defense)
    {
        $this->defense = $defense;

        return $this;
    }

    /**
     * Get defense
     *
     * @return integer 
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Set speed
     *
     * @param integer $speed
     * @return Unit
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Get speed
     *
     * @return integer 
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Unit
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set goldMaintenance
     *
     * @param integer $goldMaintenance
     * @return Unit
     */
    public function setGoldMaintenance($goldMaintenance)
    {
        $this->goldMaintenance = $goldMaintenance;

        return $this;
    }

    /**
     * Get goldMaintenance
     *
     * @return integer 
     */
    public function getGoldMaintenance()
    {
        return $this->goldMaintenance;
    }

    /**
     * Set manaMaintenance
     *
     * @param integer $manaMaintenance
     * @return Unit
     */
    public function setManaMaintenance($manaMaintenance)
    {
        $this->manaMaintenance = $manaMaintenance;

        return $this;
    }

    /**
     * Get manaMaintenance
     *
     * @return integer 
     */
    public function getManaMaintenance()
    {
        return $this->manaMaintenance;
    }

    /**
     * Set peopleMaintenance
     *
     * @param integer $peopleMaintenance
     * @return Unit
     */
    public function setPeopleMaintenance($peopleMaintenance)
    {
        $this->peopleMaintenance = $peopleMaintenance;

        return $this;
    }

    /**
     * Get peopleMaintenance
     *
     * @return integer 
     */
    public function getPeopleMaintenance()
    {
        return $this->peopleMaintenance;
    }

    /**
     * Set goldAuction
     *
     * @param integer $goldAuction
     * @return Unit
     */
    public function setGoldAuction($goldAuction)
    {
        $this->goldAuction = $goldAuction;

        return $this;
    }

    /**
     * Get goldAuction
     *
     * @return integer 
     */
    public function getGoldAuction()
    {
        return $this->goldAuction;
    }

    /**
     * Set rarityAuction
     *
     * @param boolean $rarityAuction
     * @return Unit
     */
    public function setRarityAuction($rarityAuction)
    {
        $this->rarityAuction = $rarityAuction;

        return $this;
    }

    /**
     * Get rarityAuction
     *
     * @return boolean 
     */
    public function getRarityAuction()
    {
        return $this->rarityAuction;
    }

    /**
     * Set goldRecruit
     *
     * @param integer $goldRecruit
     * @return Unit
     */
    public function setGoldRecruit($goldRecruit)
    {
        $this->goldRecruit = $goldRecruit;

        return $this;
    }

    /**
     * Get goldRecruit
     *
     * @return integer 
     */
    public function getGoldRecruit()
    {
        return $this->goldRecruit;
    }

    /**
     * Set faction
     *
     * @param \Archmage\GameBundle\Entity\Faction $faction
     * @return Unit
     */
    public function setFaction(\Archmage\GameBundle\Entity\Faction $faction)
    {
        $this->faction = $faction;

        return $this;
    }

    /**
     * Get faction
     *
     * @return \Archmage\GameBundle\Entity\Faction 
     */
    public function getFaction()
    {
        return $this->faction;
    }

    /**
     * Set family
     *
     * @param \Archmage\GameBundle\Entity\Family $family
     * @return Unit
     */
    public function setFamily(\Archmage\GameBundle\Entity\Family $family)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Get family
     *
     * @return \Archmage\GameBundle\Entity\Family 
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Set type
     *
     * @param \Archmage\GameBundle\Entity\Type $type
     * @return Unit
     */
    public function setType(\Archmage\GameBundle\Entity\Type $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Archmage\GameBundle\Entity\Type 
     */
    public function getType()
    {
        return $this->type;
    }
}
