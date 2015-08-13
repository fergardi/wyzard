<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spell
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Entity\SpellRepository")
 */
class Spell
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
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="smallint", nullable=false)
     */
    private $level;

    /**
     * @var integer
     *
     * @ORM\Column(name="manaCost", type="bigint", nullable=false)
     */
    private $manaCost;

    /**
     * @var integer
     *
     * @ORM\Column(name="turnCost", type="smallint", nullable=false)
     */
    private $turnCost;

    /**
     * @var integer
     *
     * @ORM\Column(name="turnResearch", type="smallint", nullable=false)
     */
    private $turnResearch;

    /**
     * @var integer
     *
     * @ORM\Column(name="attackBonus", type="smallint", nullable=false)
     */
    private $attackBonus;

    /**
     * @var integer
     *
     * @ORM\Column(name="defenseBonus", type="smallint", nullable=false)
     */
    private $defenseBonus;

    /**
     * @var integer
     *
     * @ORM\Column(name="speedBonus", type="smallint", nullable=false)
     */
    private $speedBonus;

    /**
     * @var boolean
     *
     * @ORM\Column(name="battleOnly", type="boolean", nullable=false)
     */
    private $battleOnly = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="selfOnly", type="boolean", nullable=false)
     */
    private $selfOnly = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="goldAuction", type="bigint", nullable=true)
     */
    private $goldAuction = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="unitCount", type="smallint", nullable=false)
     */
    private $unitCount;

    /**
     * @var Unit
     *
     * @ORM\ManyToOne(targetEntity="Unit")
     * @ORM\JoinColumn(name="unit", referencedColumnName="id", nullable=true)
     */
    private $unit = null;

    /**
     * @var Type
     *
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumn(name="type", referencedColumnName="id", nullable=true)
     */
    private $type = null;

    /**
     * @var Family
     *
     * @ORM\ManyToOne(targetEntity="Family")
     * @ORM\JoinColumn(name="family", referencedColumnName="id", nullable=true)
     */
    private $family = null;

    /**
     * @var Faction
     *
     * @ORM\ManyToOne(targetEntity="Faction")
     * @ORM\JoinColumn(name="faction", referencedColumnName="id", nullable=false)
     */
    private $faction;


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
     * @return Spell
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
     * @return Spell
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
     * Set image
     *
     * @param string $image
     * @return Spell
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
     * Set level
     *
     * @param integer $level
     * @return Spell
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set turnCost
     *
     * @param integer $turnCost
     * @return Spell
     */
    public function setTurnCost($turnCost)
    {
        $this->turnCost = $turnCost;

        return $this;
    }

    /**
     * Get turnCost
     *
     * @return integer 
     */
    public function getTurnCost()
    {
        return $this->turnCost;
    }

    /**
     * Set turnResearch
     *
     * @param integer $turnResearch
     * @return Spell
     */
    public function setTurnResearch($turnResearch)
    {
        $this->turnResearch = $turnResearch;

        return $this;
    }

    /**
     * Get turnResearch
     *
     * @return integer 
     */
    public function getTurnResearch()
    {
        return $this->turnResearch;
    }

    /**
     * Set attackBonus
     *
     * @param integer $attackBonus
     * @return Spell
     */
    public function setAttackBonus($attackBonus)
    {
        $this->attackBonus = $attackBonus;

        return $this;
    }

    /**
     * Get attackBonus
     *
     * @return integer 
     */
    public function getAttackBonus()
    {
        return $this->attackBonus;
    }

    /**
     * Set defenseBonus
     *
     * @param integer $defenseBonus
     * @return Spell
     */
    public function setDefenseBonus($defenseBonus)
    {
        $this->defenseBonus = $defenseBonus;

        return $this;
    }

    /**
     * Get defenseBonus
     *
     * @return integer 
     */
    public function getDefenseBonus()
    {
        return $this->defenseBonus;
    }

    /**
     * Set speedBonus
     *
     * @param integer $speedBonus
     * @return Spell
     */
    public function setSpeedBonus($speedBonus)
    {
        $this->speedBonus = $speedBonus;

        return $this;
    }

    /**
     * Get speedBonus
     *
     * @return integer 
     */
    public function getSpeedBonus()
    {
        return $this->speedBonus;
    }

    /**
     * Set goldAuction
     *
     * @param integer $goldAuction
     * @return Spell
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
     * Set unitCount
     *
     * @param integer $unitCount
     * @return Spell
     */
    public function setUnitCount($unitCount)
    {
        $this->unitCount = $unitCount;

        return $this;
    }

    /**
     * Get unitCount
     *
     * @return integer 
     */
    public function getUnitCount()
    {
        return $this->unitCount;
    }

    /**
     * Set unit
     *
     * @param \Archmage\GameBundle\Entity\Unit $unit
     * @return Spell
     */
    public function setUnit(\Archmage\GameBundle\Entity\Unit $unit = null)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return \Archmage\GameBundle\Entity\Unit 
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set faction
     *
     * @param \Archmage\GameBundle\Entity\Faction $faction
     * @return Spell
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
     * Set battleOnly
     *
     * @param boolean $battleOnly
     * @return Spell
     */
    public function setBattleOnly($battleOnly)
    {
        $this->battleOnly = $battleOnly;

        return $this;
    }

    /**
     * Get battleOnly
     *
     * @return boolean 
     */
    public function getBattleOnly()
    {
        return $this->battleOnly;
    }

    /**
     * Set selfOnly
     *
     * @param boolean $selfOnly
     * @return Spell
     */
    public function setSelfOnly($selfOnly)
    {
        $this->selfOnly = $selfOnly;

        return $this;
    }

    /**
     * Get selfOnly
     *
     * @return boolean 
     */
    public function getSelfOnly()
    {
        return $this->selfOnly;
    }

    /**
     * Set type
     *
     * @param \Archmage\GameBundle\Entity\Type $type
     * @return Spell
     */
    public function setType(\Archmage\GameBundle\Entity\Type $type = null)
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

    /**
     * Set family
     *
     * @param \Archmage\GameBundle\Entity\Family $family
     * @return Spell
     */
    public function setFamily(\Archmage\GameBundle\Entity\Family $family = null)
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
     * Set manaCost
     *
     * @param integer $manaCost
     * @return Spell
     */
    public function setManaCost($manaCost)
    {
        $this->manaCost = $manaCost;

        return $this;
    }

    /**
     * Get manaCost
     *
     * @return integer 
     */
    public function getManaCost()
    {
        return $this->manaCost;
    }
}
