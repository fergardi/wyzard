<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skill
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Repository\SkillRepository")
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
    private $attackBonus = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="defenseBonus", type="smallint", nullable=false)
     */
    private $defenseBonus = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="speedBonus", type="smallint", nullable=false)
     */
    private $speedBonus = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="goldBonus", type="integer", nullable=false)
     */
    private $goldBonus = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="manaBonus", type="smallint", nullable=false)
     */
    private $manaBonus = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="peopleBonus", type="smallint", nullable=false)
     */
    private $peopleBonus = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="turnsBonus", type="smallint", nullable=false)
     */
    private $turnsBonus = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="terrainBonus", type="smallint", nullable=false)
     */
    private $terrainBonus = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="damageBonus", type="smallint", nullable=false)
     */
    private $damageBonus = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="magicBonus", type="smallint", nullable=false)
     */
    private $magicBonus = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="magicDefenseBonus", type="smallint", nullable=false)
     */
    private $magicDefenseBonus = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="armyDefenseBonus", type="smallint", nullable=false)
     */
    private $armyDefenseBonus = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="artifactBonus", type="smallint", nullable=false)
     */
    private $artifactBonus = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantityBonus", type="integer", nullable=false)
     */
    private $quantityBonus = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="heroBonus", type="smallint", nullable=false)
     */
    private $heroBonus = 0;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dispell", type="boolean", nullable=false)
     */
    private $dispell = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="spy", type="boolean", nullable=false)
     */
    private $spy = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="battle", type="boolean", nullable=false)
     */
    private $battle = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="self", type="boolean", nullable=false)
     */
    private $self = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="summon", type="boolean", nullable=false)
     */
    private $summon = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="random", type="boolean", nullable=false)
     */
    private $random = false;

    /**
     * @var Family
     *
     * @ORM\ManyToOne(targetEntity="Family")
     * @ORM\JoinColumn(name="family", referencedColumnName="id", nullable=true)
     */
    private $family = null;

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
     * @var Faction
     *
     * @ORM\ManyToOne(targetEntity="Faction")
     * @ORM\JoinColumn(name="faction", referencedColumnName="id", nullable=true)
     */
    private $faction = null;


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
     * Set turnsBonus
     *
     * @param integer $turnsBonus
     * @return Skill
     */
    public function setTurnsBonus($turnsBonus)
    {
        $this->turnsBonus = $turnsBonus;

        return $this;
    }

    /**
     * Get turnsBonus
     *
     * @return integer 
     */
    public function getTurnsBonus()
    {
        return $this->turnsBonus;
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
     * Set magicDefenseBonus
     *
     * @param integer $magicDefenseBonus
     * @return Skill
     */
    public function setMagicDefenseBonus($magicDefenseBonus)
    {
        $this->magicDefenseBonus = $magicDefenseBonus;

        return $this;
    }

    /**
     * Get magicDefenseBonus
     *
     * @return integer 
     */
    public function getMagicDefenseBonus()
    {
        return $this->magicDefenseBonus;
    }

    /**
     * Set armyDefenseBonus
     *
     * @param integer $armyDefenseBonus
     * @return Skill
     */
    public function setArmyDefenseBonus($armyDefenseBonus)
    {
        $this->armyDefenseBonus = $armyDefenseBonus;

        return $this;
    }

    /**
     * Get armyDefenseBonus
     *
     * @return integer 
     */
    public function getArmyDefenseBonus()
    {
        return $this->armyDefenseBonus;
    }

    /**
     * Set artifactBonus
     *
     * @param integer $artifactBonus
     * @return Skill
     */
    public function setArtifactBonus($artifactBonus)
    {
        $this->artifactBonus = $artifactBonus;

        return $this;
    }

    /**
     * Get artifactBonus
     *
     * @return integer 
     */
    public function getArtifactBonus()
    {
        return $this->artifactBonus;
    }

    /**
     * Set quantityBonus
     *
     * @param integer $quantityBonus
     * @return Skill
     */
    public function setQuantityBonus($quantityBonus)
    {
        $this->quantityBonus = $quantityBonus;

        return $this;
    }

    /**
     * Get quantityBonus
     *
     * @return integer 
     */
    public function getQuantityBonus()
    {
        return $this->quantityBonus;
    }

    /**
     * Set heroBonus
     *
     * @param integer $heroBonus
     * @return Skill
     */
    public function setHeroBonus($heroBonus)
    {
        $this->heroBonus = $heroBonus;

        return $this;
    }

    /**
     * Get heroBonus
     *
     * @return integer 
     */
    public function getHeroBonus()
    {
        return $this->heroBonus;
    }

    /**
     * Set dispell
     *
     * @param boolean $dispell
     * @return Skill
     */
    public function setDispell($dispell)
    {
        $this->dispell = $dispell;

        return $this;
    }

    /**
     * Get dispell
     *
     * @return boolean 
     */
    public function getDispell()
    {
        return $this->dispell;
    }

    /**
     * Set spy
     *
     * @param boolean $spy
     * @return Skill
     */
    public function setSpy($spy)
    {
        $this->spy = $spy;

        return $this;
    }

    /**
     * Get spy
     *
     * @return boolean 
     */
    public function getSpy()
    {
        return $this->spy;
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
     * Set summon
     *
     * @param boolean $summon
     * @return Skill
     */
    public function setSummon($summon)
    {
        $this->summon = $summon;

        return $this;
    }

    /**
     * Get summon
     *
     * @return boolean 
     */
    public function getSummon()
    {
        return $this->summon;
    }

    /**
     * Set random
     *
     * @param boolean $random
     * @return Skill
     */
    public function setRandom($random)
    {
        $this->random = $random;

        return $this;
    }

    /**
     * Get random
     *
     * @return boolean 
     */
    public function getRandom()
    {
        return $this->random;
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

    /**
     * Set faction
     *
     * @param \Archmage\GameBundle\Entity\Faction $faction
     * @return Skill
     */
    public function setFaction(\Archmage\GameBundle\Entity\Faction $faction = null)
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
}
