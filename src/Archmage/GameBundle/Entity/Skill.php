<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skill
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Entity\SkillRepository")
 */
class Skill
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
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

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
     * @var integer
     *
     * @ORM\Column(name="goldBonus", type="smallint", nullable=false)
     */
    private $goldBonus;

    /**
     * @var integer
     *
     * @ORM\Column(name="manaBonus", type="smallint", nullable=false)
     */
    private $manaBonus;

    /**
     * @var integer
     *
     * @ORM\Column(name="peopleBonus", type="smallint", nullable=false)
     */
    private $peopleBonus;

    /**
     * @var integer
     *
     * @ORM\Column(name="terrainBonus", type="smallint", nullable=false)
     */
    private $terrainBonus;

    /**
     * @var integer
     *
     * @ORM\Column(name="damageBonus", type="smallint", nullable=false)
     */
    private $damageBonus;

    /**
     * @var integer
     *
     * @ORM\Column(name="magicBonus", type="smallint", nullable=false)
     */
    private $magicBonus;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var boolean
     *
     * @ORM\Column(name="battle", type="boolean", nullable=false)
     */
    private $battle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="self", type="boolean", nullable=false)
     */
    private $self;

    /**
     * @var Family
     *
     * @ORM\ManyToOne(targetEntity="Family")
     * @ORM\JoinColumn(name="family", referencedColumnName="id", nullable=true)
     */
    private $family;

    /**
     * @var Unit
     *
     * @ORM\ManyToOne(targetEntity="Unit")
     * @ORM\JoinColumn(name="unit", referencedColumnName="id", nullable=true)
     */
    private $unit;

    /**
     * @var Type
     *
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumn(name="type", referencedColumnName="id", nullable=true)
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
     * @return Skill
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
     * @return Skill
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
     * Set attackBonus
     *
     * @param integer $attackBonus
     * @return Skill
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
     * @return Skill
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
     * @return Skill
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
     * Set goldBonus
     *
     * @param integer $goldBonus
     * @return Skill
     */
    public function setGoldBonus($goldBonus)
    {
        $this->goldBonus = $goldBonus;

        return $this;
    }

    /**
     * Get goldBonus
     *
     * @return integer 
     */
    public function getGoldBonus()
    {
        return $this->goldBonus;
    }

    /**
     * Set manaBonus
     *
     * @param integer $manaBonus
     * @return Skill
     */
    public function setManaBonus($manaBonus)
    {
        $this->manaBonus = $manaBonus;

        return $this;
    }

    /**
     * Get manaBonus
     *
     * @return integer 
     */
    public function getManaBonus()
    {
        return $this->manaBonus;
    }

    /**
     * Set peopleBonus
     *
     * @param integer $peopleBonus
     * @return Skill
     */
    public function setPeopleBonus($peopleBonus)
    {
        $this->peopleBonus = $peopleBonus;

        return $this;
    }

    /**
     * Get peopleBonus
     *
     * @return integer 
     */
    public function getPeopleBonus()
    {
        return $this->peopleBonus;
    }

    /**
     * Set terrainBonus
     *
     * @param integer $terrainBonus
     * @return Skill
     */
    public function setTerrainBonus($terrainBonus)
    {
        $this->terrainBonus = $terrainBonus;

        return $this;
    }

    /**
     * Get terrainBonus
     *
     * @return integer 
     */
    public function getTerrainBonus()
    {
        return $this->terrainBonus;
    }

    /**
     * Set damageBonus
     *
     * @param integer $damageBonus
     * @return Skill
     */
    public function setDamageBonus($damageBonus)
    {
        $this->damageBonus = $damageBonus;

        return $this;
    }

    /**
     * Get damageBonus
     *
     * @return integer 
     */
    public function getDamageBonus()
    {
        return $this->damageBonus;
    }

    /**
     * Set magicBonus
     *
     * @param integer $magicBonus
     * @return Skill
     */
    public function setMagicBonus($magicBonus)
    {
        $this->magicBonus = $magicBonus;

        return $this;
    }

    /**
     * Get magicBonus
     *
     * @return integer 
     */
    public function getMagicBonus()
    {
        return $this->magicBonus;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Skill
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set battle
     *
     * @param boolean $battle
     * @return Skill
     */
    public function setBattle($battle)
    {
        $this->battle = $battle;

        return $this;
    }

    /**
     * Get battle
     *
     * @return boolean 
     */
    public function getBattle()
    {
        return $this->battle;
    }

    /**
     * Set self
     *
     * @param boolean $self
     * @return Skill
     */
    public function setSelf($self)
    {
        $this->self = $self;

        return $this;
    }

    /**
     * Get self
     *
     * @return boolean 
     */
    public function getSelf()
    {
        return $this->self;
    }

    /**
     * Set family
     *
     * @param \Archmage\GameBundle\Entity\Family $family
     * @return Skill
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
     * Set unit
     *
     * @param \Archmage\GameBundle\Entity\Unit $unit
     * @return Skill
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
     * Set type
     *
     * @param \Archmage\GameBundle\Entity\Type $type
     * @return Skill
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
}
