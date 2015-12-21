<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recipe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Repository\RecipeRepository")
 */
class Recipe
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
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private $name = 'Receta de Alquimia';

    /**
     * @ORM\ManyToOne(targetEntity="Artifact")
     * @ORM\JoinColumn(name="artifact", referencedColumnName="id", nullable=false)
     **/
    private $artifact;

    /**
     * @ORM\ManyToOne(targetEntity="Artifact")
     * @ORM\JoinColumn(name="result", referencedColumnName="id", nullable=false)
     **/
    private $result;

    /**
     * @var integer
     *
     * @ORM\Column(name="gold", type="bigint", nullable=false)
     */
    private $gold;

    /**
     * @var integer
     *
     * @ORM\Column(name="runes", type="smallint", nullable=false)
     */
    private $runes;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", nullable=false)
     */
    private $class = 'recipe';

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="recipes")
     * @ORM\JoinColumn(name="player", referencedColumnName="id", nullable=true)
     **/
    private $player = null;


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
     * @return Recipe
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
     * @return Recipe
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
     * Set runes
     *
     * @param integer $runes
     * @return Recipe
     */
    public function setRunes($runes)
    {
        $this->runes = $runes;

        return $this;
    }

    /**
     * Get runes
     *
     * @return integer 
     */
    public function getRunes()
    {
        return $this->runes;
    }

    /**
     * Set class
     *
     * @param string $class
     * @return Recipe
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set artifact
     *
     * @param \Archmage\GameBundle\Entity\Artifact $artifact
     * @return Recipe
     */
    public function setArtifact(\Archmage\GameBundle\Entity\Artifact $artifact)
    {
        $this->artifact = $artifact;

        return $this;
    }

    /**
     * Get artifact
     *
     * @return \Archmage\GameBundle\Entity\Artifact 
     */
    public function getArtifact()
    {
        return $this->artifact;
    }

    /**
     * Set result
     *
     * @param \Archmage\GameBundle\Entity\Artifact $result
     * @return Recipe
     */
    public function setResult(\Archmage\GameBundle\Entity\Artifact $result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return \Archmage\GameBundle\Entity\Artifact 
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set player
     *
     * @param \Archmage\GameBundle\Entity\Player $player
     * @return Recipe
     */
    public function setPlayer(\Archmage\GameBundle\Entity\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \Archmage\GameBundle\Entity\Player 
     */
    public function getPlayer()
    {
        return $this->player;
    }
}
