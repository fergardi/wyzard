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
     * @ORM\Column(name="lore", type="string", length=255, nullable=false)
     */
    private $lore = 'Lore';

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
    private $magic = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="goldCost", type="bigint", nullable=false)
     */
    private $goldCost = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="manaCost", type="bigint", nullable=false)
     */
    private $manaCost = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="peopleCost", type="bigint", nullable=false)
     */
    private $peopleCost = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="turnsCost", type="smallint", nullable=false)
     */
    private $turnsCost = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="turnsResearch", type="smallint", nullable=false)
     */
    private $turnsResearch = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="turnsExpiration", type="bigint", nullable=false)
     */
    private $turnsExpiration = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="goldMaintenance", type="bigint", nullable=false)
     */
    private $goldMaintenance = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="manaMaintenance", type="bigint", nullable=false)
     */
    private $manaMaintenance = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="peopleMaintenance", type="bigint", nullable=false)
     */
    private $peopleMaintenance = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="goldAuction", type="bigint", nullable=false)
     */
    private $goldAuction = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="rarity", type="smallint", nullable=false)
     */
    private $rarity = 0;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enchantment", type="boolean", nullable=false)
     */
    private $enchantment = false;

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
     * Set lore
     *
     * @param string $lore
     * @return Spell
     */
    public function setLore($lore)
    {
        $this->lore = $lore;

        return $this;
    }

    /**
     * Get lore
     *
     * @return string 
     */
    public function getLore()
    {
        return $this->lore;
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
     * Set turnsCost
     *
     * @param integer $turnsCost
     * @return Spell
     */
    public function setTurnsCost($turnsCost)
    {
        $this->turnsCost = $turnsCost;

        return $this;
    }

    /**
     * Get turnsCost
     *
     * @return integer 
     */
    public function getTurnsCost()
    {
        return $this->turnsCost;
    }

    /**
     * Set turnsResearch
     *
     * @param integer $turnsResearch
     * @return Spell
     */
    public function setTurnsResearch($turnsResearch)
    {
        $this->turnsResearch = $turnsResearch;

        return $this;
    }

    /**
     * Get turnsResearch
     *
     * @return integer 
     */
    public function getTurnsResearch()
    {
        return $this->turnsResearch;
    }

    /**
     * Set turnsExpiration
     *
     * @param integer $turnsExpiration
     * @return Spell
     */
    public function setTurnsExpiration($turnsExpiration)
    {
        $this->turnsExpiration = $turnsExpiration;

        return $this;
    }

    /**
     * Get turnsExpiration
     *
     * @return integer 
     */
    public function getTurnsExpiration()
    {
        return $this->turnsExpiration;
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
     * Set rarity
     *
     * @param integer $rarity
     * @return Spell
     */
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;

        return $this;
    }

    /**
     * Get rarity
     *
     * @return integer 
     */
    public function getRarity()
    {
        return $this->rarity;
    }

    /**
     * Set enchantment
     *
     * @param boolean $enchantment
     * @return Spell
     */
    public function setEnchantment($enchantment)
    {
        $this->enchantment = $enchantment;

        return $this;
    }

    /**
     * Get enchantment
     *
     * @return boolean 
     */
    public function getEnchantment()
    {
        return $this->enchantment;
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
