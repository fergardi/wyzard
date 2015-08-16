<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hero
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Entity\HeroRepository")
 */
class Hero
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
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

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
     * @ORM\JoinColumn(name="skill", referencedColumnName="id", nullable=true)
     */
    private $skill = null;


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
     * @return Hero
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
     * Set image
     *
     * @param string $image
     * @return Hero
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
     * Set description
     *
     * @param string $description
     * @return Hero
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
     * Set goldMaintenance
     *
     * @param integer $goldMaintenance
     * @return Hero
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
     * @return Hero
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
     * @return Hero
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
     * @return Hero
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
     * @return Hero
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
     * @return Hero
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
     * @return Hero
     */
    public function setSkill(\Archmage\GameBundle\Entity\Skill $skill = null)
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
