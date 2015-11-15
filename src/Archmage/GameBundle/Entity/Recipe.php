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
     * @ORM\ManyToOne(targetEntity="Artifact")
     * @ORM\JoinColumn(name="first", referencedColumnName="id", nullable=false)
     **/
    private $first;

    /**
     * @ORM\ManyToOne(targetEntity="Artifact")
     * @ORM\JoinColumn(name="second", referencedColumnName="id", nullable=false)
     **/
    private $second;

    /**
     * @var integer
     *
     * @ORM\Column(name="goldCost", type="bigint", nullable = false)
     */
    private $goldCost;


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
     * Set goldCost
     *
     * @param integer $goldCost
     * @return Recipe
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
}
