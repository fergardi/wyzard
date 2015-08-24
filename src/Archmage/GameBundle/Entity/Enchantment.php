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
     * @var \DateTime
     *
     * @ORM\Column(name="expiration", type="datetime", nullable=true)
     */
    private $expiration = null;

    /**
     * @var Spell
     *
     * @ORM\ManyToOne(targetEntity="Spell")
     * @ORM\JoinColumn(name="spell", referencedColumnName="id", nullable=false)
     */
    private $spell;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="enchantments")
     * @ORM\JoinColumn(name="player", referencedColumnName="id", nullable=false)
     **/
    private $player;

    /**
     * @var Player
     *
     * @ORM\ManyToOne(targetEntity="Player")
     * @ORM\JoinColumn(name="owner", referencedColumnName="id", nullable=false)
     */
    private $owner;


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
     * @param \DateTime $expiration
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
     * @return \DateTime 
     */
    public function getExpiration()
    {
        return $this->expiration;
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
     * Set player
     *
     * @param \Archmage\GameBundle\Entity\Player $player
     * @return Enchantment
     */
    public function setPlayer(\Archmage\GameBundle\Entity\Player $player)
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
}
