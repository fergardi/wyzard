<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Auction
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Repository\AuctionRepository")
 */
class Auction
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
     * @ORM\Column(name="bid", type="bigint", nullable=false)
     */
    private $bid;

    /**
     * @var integer
     *
     * @ORM\Column(name="top", type="bigint", nullable=false)
     */
    private $top;

    /**
     * @ORM\OneToOne(targetEntity="Troop")
     * @ORM\JoinColumn(name="troop", referencedColumnName="id", nullable=true)
     **/
    private $troop = null;

    /**
     * @ORM\OneToOne(targetEntity="Item")
     * @ORM\JoinColumn(name="item", referencedColumnName="id", nullable=true)
     **/
    private $item = null;

    /**
     * @ORM\OneToOne(targetEntity="Contract")
     * @ORM\JoinColumn(name="contract", referencedColumnName="id", nullable=true)
     **/
    private $contract = null;

    /**
     * @ORM\OneToOne(targetEntity="Research")
     * @ORM\JoinColumn(name="research", referencedColumnName="id", nullable=true)
     **/
    private $research = null;

    /**
     * @ORM\ManyToOne(targetEntity="Player")
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
     * Set bid
     *
     * @param integer $bid
     * @return Auction
     */
    public function setBid($bid)
    {
        $this->bid = $bid;

        return $this;
    }

    /**
     * Get bid
     *
     * @return integer 
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * Set top
     *
     * @param integer $top
     * @return Auction
     */
    public function setTop($top)
    {
        $this->top = $top;

        return $this;
    }

    /**
     * Get top
     *
     * @return integer
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * Set troop
     *
     * @param \Archmage\GameBundle\Entity\Troop $troop
     * @return Auction
     */
    public function setTroop(\Archmage\GameBundle\Entity\Troop $troop = null)
    {
        $this->troop = $troop;

        return $this;
    }

    /**
     * Get troop
     *
     * @return \Archmage\GameBundle\Entity\Troop 
     */
    public function getTroop()
    {
        return $this->troop;
    }

    /**
     * Set item
     *
     * @param \Archmage\GameBundle\Entity\Item $item
     * @return Auction
     */
    public function setItem(\Archmage\GameBundle\Entity\Item $item = null)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return \Archmage\GameBundle\Entity\Item 
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set contract
     *
     * @param \Archmage\GameBundle\Entity\Contract $contract
     * @return Auction
     */
    public function setContract(\Archmage\GameBundle\Entity\Contract $contract = null)
    {
        $this->contract = $contract;

        return $this;
    }

    /**
     * Get contract
     *
     * @return \Archmage\GameBundle\Entity\Contract 
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * Set research
     *
     * @param \Archmage\GameBundle\Entity\Research $research
     * @return Auction
     */
    public function setResearch(\Archmage\GameBundle\Entity\Research $research = null)
    {
        $this->research = $research;

        return $this;
    }

    /**
     * Get research
     *
     * @return \Archmage\GameBundle\Entity\Research 
     */
    public function getResearch()
    {
        return $this->research;
    }

    /**
     * Set player
     *
     * @param \Archmage\GameBundle\Entity\Player $player
     * @return Auction
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

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        if ($this->getTroop()) return $this->getTroop()->getUnit()->getName();
        if ($this->getItem()) return $this->getItem()->getArtifact()->getName();
        if ($this->getContract()) return $this->getContract()->getHero()->getName();
        if ($this->getResearch()) return $this->getResearch()->getSpell()->getName();
        return '';
    }

    /**
     * Get class
     *
     * @return string
     */
    public function getClass()
    {
        if ($this->getTroop()) return $this->getTroop()->getUnit()->getFaction()->getClass();
        if ($this->getItem()) return $this->getItem()->getArtifact()->getClass();
        if ($this->getContract()) return $this->getContract()->getHero()->getFaction()->getClass();
        if ($this->getResearch()) return $this->getResearch()->getSpell()->getFaction()->getClass();
        return '';
    }
}
