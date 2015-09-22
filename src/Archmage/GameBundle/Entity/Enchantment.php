<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enchantment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Repository\EnchantmentRepository")
 */
class Enchantment
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
     * @var integer
     *
     * @ORM\Column(name="expiration", type="smallint", nullable=false)
     */
    private $expiration = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="gameover", type="datetime", nullable=true)
     */
    private $gameover = null;

    /**
     * @var Spell
     *
     * @ORM\ManyToOne(targetEntity="Spell")
     * @ORM\JoinColumn(name="spell", referencedColumnName="id", nullable=false)
     */
    private $spell;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="enchantmentsOwner")
     * @ORM\JoinColumn(name="owner", referencedColumnName="id", nullable=false)
     **/
    private $owner;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="enchantmentsVictim")
     * @ORM\JoinColumn(name="victim", referencedColumnName="id", nullable=false)
     **/
    private $victim;


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
     * Set expiration
     *
     * @param integer $expiration
     * @return Enchantment
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;

        return $this;
    }

    /**
     * Get expiration
     *
     * @return integer 
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * Set gameover
     *
     * @param \DateTime $gameover
     * @return Enchantment
     */
    public function setGameover($gameover)
    {
        $this->gameover = $gameover;

        return $this;
    }

    /**
     * Get gameover
     *
     * @return \DateTime 
     */
    public function getGameover()
    {
        return $this->gameover;
    }

    /**
     * Set spell
     *
     * @param \Archmage\GameBundle\Entity\Spell $spell
     * @return Enchantment
     */
    public function setSpell(\Archmage\GameBundle\Entity\Spell $spell)
    {
        $this->spell = $spell;

        return $this;
    }

    /**
     * Get spell
     *
     * @return \Archmage\GameBundle\Entity\Spell 
     */
    public function getSpell()
    {
        return $this->spell;
    }

    /**
     * Set owner
     *
     * @param \Archmage\GameBundle\Entity\Player $owner
     * @return Enchantment
     */
    public function setOwner(\Archmage\GameBundle\Entity\Player $owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \Archmage\GameBundle\Entity\Player 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set victim
     *
     * @param \Archmage\GameBundle\Entity\Player $victim
     * @return Enchantment
     */
    public function setVictim(\Archmage\GameBundle\Entity\Player $victim)
    {
        $this->victim = $victim;

        return $this;
    }

    /**
     * Get victim
     *
     * @return \Archmage\GameBundle\Entity\Player 
     */
    public function getVictim()
    {
        return $this->victim;
    }
}
