<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Quest
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Repository\QuestRepository")
 */
class Quest
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
    private $name = 'Mapa de Aventuras';

    /**
     * @var integer
     *
     * @ORM\Column(name="gold", type="bigint", nullable=false)
     */
    private $gold = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="runes", type="smallint", nullable=false)
     */
    private $runes = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", nullable=false)
     */
    private $class = 'quest';

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", nullable=false)
     */
    private $image = '';

    /**
     * @ORM\ManyToOne(targetEntity="Artifact")
     * @ORM\JoinColumn(name="artifact", referencedColumnName="id", nullable=false)
     **/
    private $artifact;

    /**
     * @ORM\OneToMany(targetEntity="Troop", mappedBy="quest", cascade={"remove"})
     **/
    private $troops;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="maps")
     * @ORM\JoinColumn(name="player", referencedColumnName="id", nullable=true)
     **/
    private $player = null;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->image = 'bundles/archmagegame/images/kingdom/quest.png';
        $this->troops = new ArrayCollection();
        $this->gold = rand(1, 10000000);
    }

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
     * @return Quest
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
     * @return Quest
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
     * @return Quest
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
     * @return Quest
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
     * Set image
     *
     * @param string $image
     * @return Quest
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
     * Set artifact
     *
     * @param \Archmage\GameBundle\Entity\Artifact $artifact
     * @return Quest
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
     * Add troops
     *
     * @param \Archmage\GameBundle\Entity\Troop $troops
     * @return Quest
     */
    public function addTroop(\Archmage\GameBundle\Entity\Troop $troops)
    {
        $this->troops[] = $troops;

        return $this;
    }

    /**
     * Remove troops
     *
     * @param \Archmage\GameBundle\Entity\Troop $troops
     */
    public function removeTroop(\Archmage\GameBundle\Entity\Troop $troops)
    {
        $this->troops->removeElement($troops);
    }

    /**
     * Get troops
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTroops()
    {
        return $this->troops;
    }

    /**
     * Set player
     *
     * @param \Archmage\GameBundle\Entity\Player $player
     * @return Quest
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
