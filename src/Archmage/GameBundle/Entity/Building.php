<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Building
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Entity\BuildingRepository")
 */
class Building
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
     * @ORM\Column(name="goldCost", type="smallint", nullable=false)
     */
    private $goldCost;

    /**
     * @var integer
     *
     * @ORM\Column(name="manaCost", type="smallint", nullable=false)
     */
    private $manaCost;

    /**
     * @var integer
     *
     * @ORM\Column(name="peopleCost", type="smallint", nullable=false)
     */
    private $peopleCost;

    /**
     * @var integer
     *
     * @ORM\Column(name="goldMaintenance", type="smallint", nullable=false)
     */
    private $goldMaintenance;

    /**
     * @var integer
     *
     * @ORM\Column(name="manaMaintenance", type="smallint", nullable=false)
     */
    private $manaMaintenance;

    /**
     * @var integer
     *
     * @ORM\Column(name="peopleMaintenance", type="smallint", nullable=false)
     */
    private $peopleMaintenance;

    /**
     * @var integer
     *
     * @ORM\Column(name="goldResource", type="smallint", nullable=false)
     */
    private $goldResource;

    /**
     * @var integer
     *
     * @ORM\Column(name="manaResource", type="smallint", nullable=false)
     */
    private $manaResource;

    /**
     * @var integer
     *
     * @ORM\Column(name="peopleResource", type="smallint", nullable=false)
     */
    private $peopleResource;

    /**
     * @var integer
     *
     * @ORM\Column(name="goldCap", type="bigint", nullable=false)
     */
    private $goldCap;

    /**
     * @var integer
     *
     * @ORM\Column(name="manaCap", type="bigint", nullable=false)
     */
    private $manaCap;

    /**
     * @var integer
     *
     * @ORM\Column(name="peopleCap", type="bigint", nullable=false)
     */
    private $peopleCap;


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
     * @return Building
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
     * @return Building
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
     * @return Building
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
     * Set goldCost
     *
     * @param integer $goldCost
     * @return Building
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
     * @return Building
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
     * @return Building
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
     * Set goldMaintenance
     *
     * @param integer $goldMaintenance
     * @return Building
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
     * @return Building
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
     * @return Building
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
     * Set goldResource
     *
     * @param integer $goldResource
     * @return Building
     */
    public function setGoldResource($goldResource)
    {
        $this->goldResource = $goldResource;

        return $this;
    }

    /**
     * Get goldResource
     *
     * @return integer 
     */
    public function getGoldResource()
    {
        return $this->goldResource;
    }

    /**
     * Set manaResource
     *
     * @param integer $manaResource
     * @return Building
     */
    public function setManaResource($manaResource)
    {
        $this->manaResource = $manaResource;

        return $this;
    }

    /**
     * Get manaResource
     *
     * @return integer 
     */
    public function getManaResource()
    {
        return $this->manaResource;
    }

    /**
     * Set peopleResource
     *
     * @param integer $peopleResource
     * @return Building
     */
    public function setPeopleResource($peopleResource)
    {
        $this->peopleResource = $peopleResource;

        return $this;
    }

    /**
     * Get peopleResource
     *
     * @return integer 
     */
    public function getPeopleResource()
    {
        return $this->peopleResource;
    }

    /**
     * Set goldCap
     *
     * @param integer $goldCap
     * @return Building
     */
    public function setGoldCap($goldCap)
    {
        $this->goldCap = $goldCap;

        return $this;
    }

    /**
     * Get goldCap
     *
     * @return integer 
     */
    public function getGoldCap()
    {
        return $this->goldCap;
    }

    /**
     * Set manaCap
     *
     * @param integer $manaCap
     * @return Building
     */
    public function setManaCap($manaCap)
    {
        $this->manaCap = $manaCap;

        return $this;
    }

    /**
     * Get manaCap
     *
     * @return integer 
     */
    public function getManaCap()
    {
        return $this->manaCap;
    }

    /**
     * Set peopleCap
     *
     * @param integer $peopleCap
     * @return Building
     */
    public function setPeopleCap($peopleCap)
    {
        $this->peopleCap = $peopleCap;

        return $this;
    }

    /**
     * Get peopleCap
     *
     * @return integer 
     */
    public function getPeopleCap()
    {
        return $this->peopleCap;
    }
}