<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Achievement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Repository\AchievementRepository")
 */
class Achievement
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="gold", type="bigint", nullable=true)
     */
    private $gold = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="mana", type="bigint", nullable=true)
     */
    private $mana = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="people", type="bigint", nullable=true)
     */
    private $people = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="lands", type="integer", nullable=true)
     */
    private $lands = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="power", type="bigint", nullable=true)
     */
    private $power = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="artifacts", type="smallint", nullable=true)
     */
    private $artifacts = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="heroes", type="smallint", nullable=true)
     */
    private $heroes = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="units", type="bigint", nullable=true)
     */
    private $units = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="spells", type="smallint", nullable=true)
     */
    private $spells = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="defense", type="smallint", nullable=true)
     */
    private $defense = null;


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
     * @return Achievement
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
     * @return Achievement
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
     * Set gold
     *
     * @param integer $gold
     * @return Achievement
     */
    public function setGold($gold)
    {
        $this->gold = $gold;

        return $this;
    }

    /**
     * Get gold
     *
     * @return integer 
     */
    public function getGold()
    {
        return $this->gold;
    }

    /**
     * Set mana
     *
     * @param integer $mana
     * @return Achievement
     */
    public function setMana($mana)
    {
        $this->mana = $mana;

        return $this;
    }

    /**
     * Get mana
     *
     * @return integer 
     */
    public function getMana()
    {
        return $this->mana;
    }

    /**
     * Set people
     *
     * @param integer $people
     * @return Achievement
     */
    public function setPeople($people)
    {
        $this->people = $people;

        return $this;
    }

    /**
     * Get people
     *
     * @return integer 
     */
    public function getPeople()
    {
        return $this->people;
    }

    /**
     * Set lands
     *
     * @param integer $lands
     * @return Achievement
     */
    public function setLands($lands)
    {
        $this->lands = $lands;

        return $this;
    }

    /**
     * Get lands
     *
     * @return integer 
     */
    public function getLands()
    {
        return $this->lands;
    }

    /**
     * Set power
     *
     * @param integer $power
     * @return Achievement
     */
    public function setPower($power)
    {
        $this->power = $power;

        return $this;
    }

    /**
     * Get power
     *
     * @return integer 
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Set artifacts
     *
     * @param integer $artifacts
     * @return Achievement
     */
    public function setArtifacts($artifacts)
    {
        $this->artifacts = $artifacts;

        return $this;
    }

    /**
     * Get artifacts
     *
     * @return integer 
     */
    public function getArtifacts()
    {
        return $this->artifacts;
    }

    /**
     * Set heroes
     *
     * @param integer $heroes
     * @return Achievement
     */
    public function setHeroes($heroes)
    {
        $this->heroes = $heroes;

        return $this;
    }

    /**
     * Get heroes
     *
     * @return integer 
     */
    public function getHeroes()
    {
        return $this->heroes;
    }

    /**
     * Set units
     *
     * @param integer $units
     * @return Achievement
     */
    public function setUnits($units)
    {
        $this->units = $units;

        return $this;
    }

    /**
     * Get units
     *
     * @return integer 
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Set spells
     *
     * @param integer $spells
     * @return Achievement
     */
    public function setSpells($spells)
    {
        $this->spells = $spells;

        return $this;
    }

    /**
     * Get spells
     *
     * @return integer 
     */
    public function getSpells()
    {
        return $this->spells;
    }

    /**
     * Set defense
     *
     * @param integer $defense
     * @return Achievement
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
}
