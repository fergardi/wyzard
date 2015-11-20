<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rune
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Repository\RuneRepository")
 */
class Rune
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
     * @ORM\Column(name="cost", type="smallint")
     */
    private $cost;

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
     * @return Rune
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
     * Set cost
     *
     * @param integer $cost
     * @return Rune
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return integer 
     */
    public function getCost()
    {
        return $this->cost;
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
