<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artifact
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Repository\ArtifactRepository")
 */
class Artifact
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
     * @ORM\Column(name="goldAuction", type="bigint", nullable=false)
     */
    private $goldAuction;

    /**
     * @var integer
     *
     * @ORM\Column(name="rarity", type="smallint", nullable=false)
     */
    private $rarity;

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
     * @return Artifact
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
     * @return Artifact
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
     * @return Artifact
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
     * Set goldAuction
     *
     * @param integer $goldAuction
     * @return Artifact
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
     * @return Artifact
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
     * Set faction
     *
     * @param \Archmage\GameBundle\Entity\Faction $faction
     * @return Artifact
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
     * @return Artifact
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
