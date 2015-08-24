<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spell
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Repository\SpellRepository")
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
     * @ORM\Column(name="magic", type="smallint", nullable=false)
     */
    private $magic;

    /**
     * @var integer
     *
     * @ORM\Column(name="goldCost", type="bigint", nullable=false)
     */
    private $goldCost;

    /**
     * @var integer
     *
     * @ORM\Column(name="manaCost", type="bigint", nullable=false)
     */
    private $manaCost;

    /**
     * @var integer
     *
     * @ORM\Column(name="peopleCost", type="bigint", nullable=false)
     */
    private $peopleCost;

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
     * @ORM\Column(name="goldMaintenance", type="bigint", nullable=false)
     */
    private $goldMaintenance;

    /**
     * @var integer
     *
     * @ORM\Column(name="manaMaintenance", type="bigint", nullable=false)
     */
    private $manaMaintenance;

    /**
     * @var integer
     *
     * @ORM\Column(name="peopleMaintenance", type="bigint", nullable=false)
     */
    private $peopleMaintenance;

    /**
     * @var integer
     *
     * @ORM\Column(name="goldAuction", type="bigint", nullable=false)
     */
    private $goldAuction;

    /**
     * @var integer
     *
     * @ORM\Column(name="rarityAuction", type="smallint", nullable=false)
     */
    private $rarityAuction;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enchant", type="boolean", nullable=false)
     */
    private $enchant;

    /**
     * @var Faction
     *
     * @ORM\ManyToOne(targetEntity="Faction")
     * @ORM\JoinColumn(name="faction", referencedColumnName="id", nullable=false)
     */
    private $faction;

    /**
     * @var Skill
     *
     * @ORM\ManyToOne(targetEntity="Skill")
     * @ORM\JoinColumn(name="skill", referencedColumnName="id", nullable=false)
     */
    private $skill;


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
     * Set magic
     *
     * @param integer $magic
     * @return Spell
     */
    public function setMagic($magic)
    {
        $this->magic = $magic;

        return $this;
    }

    /**
     * Get magic
     *
     * @return integer 
     */
    public function getMagic()
    {
        return $this->magic;
    }

    /**
     * Set goldCost
     *
     * @param integer $goldCost
     * @return Spell
     */
    public function setGoldCost($goldCost)
    {
        $this->goldCost = $goldCost;

        return $this;
    }

    /**
     * Get goldCost
     *
     * @return integer 
     */
    public function getGoldCost()
    {
        return $this->goldCost;
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

    /**
     * Set peopleCost
     *
     * @param integer $peopleCost
     * @return Spell
     */
    public function setPeopleCost($peopleCost)
    {
        $this->peopleCost = $peopleCost;

        return $this;
    }

    /**
     * Get peopleCost
     *
     * @return integer 
     */
    public function getPeopleCost()
    {
        return $this->peopleCost;
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
     * Set goldMaintenance
     *
     * @param integer $goldMaintenance
     * @return Spell
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
     * @return Spell
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
     * @return Spell
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
     * Set rarityAuction
     *
     * @param integer $rarityAuction
     * @return Spell
     */
    public function setRarityAuction($rarityAuction)
    {
        $this->rarityAuction = $rarityAuction;

        return $this;
    }

    /**
     * Get rarityAuction
     *
     * @return integer 
     */
    public function getRarityAuction()
    {
        return $this->rarityAuction;
    }

    /**
     * Set enchant
     *
     * @param boolean $enchant
     * @return Spell
     */
    public function setEnchant($enchant)
    {
        $this->enchant = $enchant;

        return $this;
    }

    /**
     * Get enchant
     *
     * @return boolean 
     */
    public function getEnchant()
    {
        return $this->enchant;
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
     * Set skill
     *
     * @param \Archmage\GameBundle\Entity\Skill $skill
     * @return Spell
     */
    public function setSkill(\Archmage\GameBundle\Entity\Skill $skill)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get skill
     *
     * @return \Archmage\GameBundle\Entity\Skill 
     */
    public function getSkill()
    {
        return $this->skill;
    }
}
