<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Repository\TypeRepository")
 */
class Type
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
     * @var Type
     *
     * @ORM\OneToOne(targetEntity="Type")
     * @ORM\JoinColumn(name="opposite", referencedColumnName="id", nullable=true)
     */
    private $opposite; //nullable true por el selfreferencing, se modifican despues de persistirlo y da error


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
     * @return Type
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
     * Set opposite
     *
     * @param \Archmage\GameBundle\Entity\Type $opposite
     * @return Type
     */
    public function setOpposite(\Archmage\GameBundle\Entity\Type $opposite)
    {
        $this->opposite = $opposite;

        return $this;
    }

    /**
     * Get opposite
     *
     * @return \Archmage\GameBundle\Entity\Type
     */
    public function getOpposite()
    {
        return $this->opposite;
    }
}
