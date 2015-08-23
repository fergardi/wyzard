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
     * @var item
     *
     * @ORM\ManyToOne(targetEntity="Item")
     * @ORM\JoinColumn(name="itemDefense", referencedColumnName="id", nullable=true)
     */
    private $itemDefense = null;

    /**
     * @var research
     *
     * @ORM\ManyToOne(targetEntity="Research")
     * @ORM\JoinColumn(name="researchDefense", referencedColumnName="id", nullable=true)
     */
    private $researchDefense = null;

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
     * Set itemDefense
     *
     * @param \Archmage\GameBundle\Entity\Item $itemDefense
     * @return Player
     */
    public function setItemDefense(\Archmage\GameBundle\Entity\Item $itemDefense = null)
    {
        $this->itemDefense = $itemDefense;

        return $this;
    }

    /**
     * Get itemDefense
     *
     * @return \Archmage\GameBundle\Entity\Item
     */
    public function getItemDefense()
    {
        return $this->itemDefense;
    }

    /**
     * Set researchDefense
     *
     * @param \Archmage\GameBundle\Entity\Research $researchDefense
     * @return Player
     */
    public function setResearchDefense(\Archmage\GameBundle\Entity\Research $researchDefense = null)
    {
        $this->researchDefense = $researchDefense;

        return $this;
    }

    /**
     * Get researchDefense
     *
     * @return \Archmage\GameBundle\Entity\Research
     */
    public function getResearchDefense()
    {
        return $this->researchDefense;
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
     * BUILDINGS
     */

    /**
     * Get building
     *
     * @return Construction
     */
    public function getBuilding($name)
    {
        foreach ($this->constructions as $construction) {
            if ($construction->getBuilding()->getName() == $name) return $construction;
        }
        return null;
    }

    /**
     * Set building
     *
     * @return Construction
     */
    public function setBuilding($name, $quantity)
    {
        foreach ($this->constructions as $construction) {
            if ($construction->getBuilding()->getName() == $name) return $construction->setQuantity($quantity);
        }
        return null;
    }

    /*
     * POWER AND RANKING
     */

    /**
     * Get power
     *
     * @return integer
     */
    public function getPower()
    {
        $power = 0;
        foreach ($this->troops as $troop) {
            $power += $troop->getQuantity() * $troop->getUnit()->getAttack();
        }
        return $power;
    }

    /*
     * RESOURCE CAPS
     */

    /**
     * Get manaCap
     *
     * @return integer
     */
    public function getManaCap()
    {
        foreach ($this->constructions as $construction) {
            if ($construction->getBuilding()->getName() == 'Nodos') return $construction->getQuantity() * $construction->getBuilding()->getManaCap();
        }
        return 0;
    }

    /**
     * Get peopleCap
     *
     * @return integer
     */
    public function getPeopleCap()
    {
        foreach ($this->constructions as $construction) {
            if ($construction->getBuilding()->getName() == 'Villages') return $construction->getQuantity() * $construction->getBuilding()->getPeopleCap();
        }
        return 0;
    }

    /*
     * RESOURCES AND MAINTENANCES
     */

    /**
     * Get goldResourcePerTurn
     *
     * @return integer
     */
    public function getGoldResourcePerTurn()
    {
        foreach ($this->constructions as $construction) {
            if ($construction->getBuilding()->getName() == 'Granjas') return $construction->getQuantity() * $construction->getBuilding()->getGoldResource();
        }
        return 0;
    }

    /**
     * Get manaResourcePerTurn
     *
     * @return integer
     */
    public function getManaResourcePerTurn()
    {
        foreach ($this->constructions as $construction) {
            if ($construction->getBuilding()->getName() == 'Nodos') return $construction->getQuantity() * $construction->getBuilding()->getManaResource();
        }
        return 0;
    }

    /**
     * Get peopleResourcePerTurn
     *
     * @return integer
     */
    public function getPeopleResourcePerTurn()
    {
        foreach ($this->constructions as $construction) {
            if ($construction->getBuilding()->getName() == 'Pueblos') return $construction->getQuantity() * $construction->getBuilding()->getPeopleResource();
        }
        return 0;
    }

    /**
     * Get goldMaintenancePerTurn
     *
     * @return integer
     */
    public function getGoldMaintenancePerTurn()
    {
        $gold = 0;
        foreach ($this->troops as $troop) {
            $gold += $troop->getUnit()->getGoldMaintenance() * $troop->getQuantity();
        }
        foreach ($this->contracts as $contract) {
            $gold += $contract->getBuilding()->getGoldMaintenance();
        }
        foreach ($this->constructions as $construction) {
            $gold += $construction->getBuilding()->getGoldMaintenance() * $construction->getQuantity();
        }
        return $gold;
    }

    /**
     * Get manaMaintenancePerTurn
     *
     * @return integer
     */
    public function getManaMaintenancePerTurn()
    {
        $mana = 0;
        foreach ($this->troops as $troop) {
            $mana += $troop->getUnit()->getManaMaintenance() * $troop->getQuantity();
        }
        foreach ($this->contracts as $contract) {
            $mana += $contract->getBuilding()->getManaMaintenance();
        }
        foreach ($this->constructions as $construction) {
            $mana += $construction->getBuilding()->getManaMaintenance() * $construction->getQuantity();
        }
        return $mana;
    }

    /**
     * Get peopleMaintenancePerTurn
     *
     * @return integer
     */
    public function getPeopleMaintenancePerTurn()
    {
        $people = 0;
        foreach ($this->troops as $troop) {
            $people += $troop->getUnit()->getPeopleMaintenance() * $troop->getQuantity();
        }
        foreach ($this->contracts as $contract) {
            $people += $contract->getBuilding()->getPeopleMaintenance();
        }
        foreach ($this->constructions as $construction) {
            $people += $construction->getBuilding()->getPeopleMaintenance() * $construction->getQuantity();
        }
        return $people;
    }
}
