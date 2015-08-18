<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Entity\PlayerRepository")
 */
class Player
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
     * @ORM\Column(name="nick", type="string", length=255, nullable=false)
     */
    private $nick;

    /**
     * @var integer
     *
     * @ORM\Column(name="gold", type="bigint", nullable=false)
     */
    private $gold;

    /**
     * @var integer
     *
     * @ORM\Column(name="mana", type="bigint", nullable=false)
     */
    private $mana;

    /**
     * @var integer
     *
     * @ORM\Column(name="people", type="bigint", nullable=false)
     */
    private $people;

    /**
     * @var integer
     *
     * @ORM\Column(name="magic", type="smallint", nullable=false)
     */
    private $magic;

    /**
     * @var integer
     *
     * @ORM\Column(name="turns", type="smallint", nullable=false)
     */
    private $turns;

    /**
     * @var Faction
     *
     * @ORM\ManyToOne(targetEntity="Faction")
     * @ORM\JoinColumn(name="faction", referencedColumnName="id", nullable=false)
     */
    private $faction;

    /**
     * @ORM\OneToMany(targetEntity="Construction", mappedBy="player")
     **/
    private $constructions;

    /**
     * @ORM\OneToMany(targetEntity="Research", mappedBy="player")
     **/
    private $researchs;

    /**
     * @ORM\OneToMany(targetEntity="Troop", mappedBy="player")
     **/
    private $troops;

    /**
     * @ORM\OneToMany(targetEntity="Item", mappedBy="player")
     **/
    private $items;

    /**
     * @ORM\OneToMany(targetEntity="Contract", mappedBy="player")
     **/
    private $contracts;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="player")
     **/
    private $messages;


    /**
     * Constructor
     **/
    public function __construct()
    {
        $this->constructions = new ArrayCollection();
        $this->researchs = new ArrayCollection();
        $this->troops = new ArrayCollection();
        $this->items = new ArrayCollection();
        $this->contracts = new ArrayCollection();
        $this->messages = new ArrayCollection();
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
     * Set nick
     *
     * @param string $nick
     * @return Player
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Get nick
     *
     * @return string 
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set gold
     *
     * @param integer $gold
     * @return Player
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
     * @return Player
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
     * @return Player
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
     * Set magic
     *
     * @param integer $magic
     * @return Player
     */
    public function setMagic($magic)
    {
        $this->magic = $magic;

        return $this;
    }

    /**
     * Get magic
     *
     * @return integer 
     */
    public function getMagic()
    {
        return $this->magic;
    }

    /**
     * Set turns
     *
     * @param integer $turns
     * @return Player
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
     * Set faction
     *
     * @param \Archmage\GameBundle\Entity\Faction $faction
     * @return Player
     */
    public function setFaction(\Archmage\GameBundle\Entity\Faction $faction)
    {
        $this->faction = $faction;

        return $this;
    }

    /**
     * Get faction
     *
     * @return \Archmage\GameBundle\Entity\Faction 
     */
    public function getFaction()
    {
        return $this->faction;
    }

    /**
     * Add constructions
     *
     * @param \Archmage\GameBundle\Entity\Construction $constructions
     * @return Player
     */
    public function addConstruction(\Archmage\GameBundle\Entity\Construction $constructions)
    {
        $this->constructions[] = $constructions;

        return $this;
    }

    /**
     * Remove constructions
     *
     * @param \Archmage\GameBundle\Entity\Construction $constructions
     */
    public function removeConstruction(\Archmage\GameBundle\Entity\Construction $constructions)
    {
        $this->constructions->removeElement($constructions);
    }

    /**
     * Get constructions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConstructions()
    {
        return $this->constructions;
    }

    /**
     * Add researchs
     *
     * @param \Archmage\GameBundle\Entity\Research $researchs
     * @return Player
     */
    public function addResearch(\Archmage\GameBundle\Entity\Research $researchs)
    {
        $this->researchs[] = $researchs;

        return $this;
    }

    /**
     * Remove researchs
     *
     * @param \Archmage\GameBundle\Entity\Research $researchs
     */
    public function removeResearch(\Archmage\GameBundle\Entity\Research $researchs)
    {
        $this->researchs->removeElement($researchs);
    }

    /**
     * Get researchs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResearchs()
    {
        return $this->researchs;
    }

    /**
     * Add troops
     *
     * @param \Archmage\GameBundle\Entity\Troop $troops
     * @return Player
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
     * Add items
     *
     * @param \Archmage\GameBundle\Entity\Item $items
     * @return Player
     */
    public function addItem(\Archmage\GameBundle\Entity\Item $items)
    {
        $this->items[] = $items;

        return $this;
    }

    /**
     * Remove items
     *
     * @param \Archmage\GameBundle\Entity\Item $items
     */
    public function removeItem(\Archmage\GameBundle\Entity\Item $items)
    {
        $this->items->removeElement($items);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Add contracts
     *
     * @param \Archmage\GameBundle\Entity\Contract $contracts
     * @return Player
     */
    public function addContract(\Archmage\GameBundle\Entity\Contract $contracts)
    {
        $this->contracts[] = $contracts;

        return $this;
    }

    /**
     * Remove contracts
     *
     * @param \Archmage\GameBundle\Entity\Contract $contracts
     */
    public function removeContract(\Archmage\GameBundle\Entity\Contract $contracts)
    {
        $this->contracts->removeElement($contracts);
    }

    /**
     * Get contracts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContracts()
    {
        return $this->contracts;
    }

    /**
     * Add messages
     *
     * @param \Archmage\GameBundle\Entity\Message $messages
     * @return Player
     */
    public function addMessage(\Archmage\GameBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;

        return $this;
    }

    /**
     * Remove messages
     *
     * @param \Archmage\GameBundle\Entity\Message $messages
     */
    public function removeMessage(\Archmage\GameBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /*
     * AUX FUNCTIONS
     */

    /**
     * Get lands
     *
     * @return integer
     */
    public function getLands()
    {
        foreach ($this->constructions as $construction) {
            if ($construction->getBuilding()->getName() == 'Tierras') return $construction->getQuantity();
        }
        return 0;
    }

    /**
     * Get power
     *
     * @return integer
     */
    public function getPower()
    {
        $power = 0;
        foreach ($this->troops as $troop) {
            $power += $troop->getQuantity();
        }
        return $power;
    }
    /**
     * Get fortresses
     *
     * @return integer
     */
    public function getFortresses()
    {
        foreach ($this->constructions as $construction) {
            if ($construction->getBuilding()->getName() == 'Fortalezas') return $construction->getQuantity();
        }
        return 0;
    }
}
