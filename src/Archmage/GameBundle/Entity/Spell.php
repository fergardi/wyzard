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
     * @ORM\Column(name="magic", type="smallint", nullable=false)
     */
    private $magic;

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
     * @ORM\Column(name="goldAuction", type="bigint", nullable=true)
     */
    private $goldAuction = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="rarityAuction", type="smallint", nullable=true)
     */
    private $rarityAuction = null;

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
