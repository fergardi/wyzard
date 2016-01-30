<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faction
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Repository\FactionRepository")
 */
class Faction
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
     * @ORM\Column(name="background", type="string", length=255, nullable=false)
     */
    private $background;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", length=255, nullable=false)
     */
    private $class;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="lore", type="string", length=255, nullable=false)
     */
    private $lore = 'Lore';

    /**
     * @var string
     *
     * @ORM\Column(name="slogan", type="string", length=255, nullable=false)
     */
    private $slogan;

    /**
     * @var Faction
     *
     * @ORM\OneToOne(targetEntity="Faction")
     * @ORM\JoinColumn(name="opposite", referencedColumnName="id", nullable=true)
     */
    private $opposite = null; //nullable true por el selfreferencing, se modifican despues de persistirlo y da error


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
     * @return Faction
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
     * @return Faction
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
     * Set background
     *
     * @param string $background
     * @return Faction
     */
    public function setBackground($background)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Get background
     *
     * @return string
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set class
     *
     * @param string $class
     * @return Faction
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
     * Set description
     *
     * @param string $description
     * @return Faction
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
     * Set lore
     *
     * @param string $lore
     * @return Faction
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
     * Set slogan
     *
     * @param string $slogan
     * @return Faction
     */
    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;

        return $this;
    }

    /**
     * Get slogan
     *
     * @return string 
     */
    public function getSlogan()
    {
        return $this->slogan;
    }

    /**
     * Set opposite
     *
     * @param \Archmage\GameBundle\Entity\Faction $opposite
     * @return Faction
     */
    public function setOpposite(\Archmage\GameBundle\Entity\Faction $opposite)
    {
        $this->opposite = $opposite;

        return $this;
    }

    /**
     * Get opposite
     *
     * @return \Archmage\GameBundle\Entity\Faction
     */
    public function getOpposite()
    {
        return $this->opposite;
    }
}
