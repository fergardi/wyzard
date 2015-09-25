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
     * @var integer
     *
     * @ORM\Column(name="gold", type="bigint")
     */
    private $gold;

    /**
     * @var integer
     *
     * @ORM\Column(name="mana", type="bigint")
     */
    private $mana;

    /**
     * @var integer
     *
     * @ORM\Column(name="people", type="bigint")
     */
    private $people;

    /**
     * @var integer
     *
     * @ORM\Column(name="turns", type="bigint")
     */
    private $turns;

    /**
     * @var integer
     *
     * @ORM\Column(name="artifacts", type="smallint")
     */
    private $artifacts;

    /**
     * @var integer
     *
     * @ORM\Column(name="heroes", type="smallint")
     */
    private $heroes;

    /**
     * @var integer
     *
     * @ORM\Column(name="units", type="bigint")
     */
    private $units;


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
     * Set turns
     *
     * @param integer $turns
     * @return Achievement
     */
    public function setTurns($turns)
    {
        $this->turns = $turns;

        return $this;
    }

    /**
     * Get turns
     *
     * @return integer 
     */
    public function getTurns()
    {
        return $this->turns;
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
}
