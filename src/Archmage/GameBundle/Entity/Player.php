<?php

namespace Archmage\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Archmage\GameBundle\Repository\PlayerRepository")
 */
class Player
{
    /**
     * research cap
     */
    const RESEARCH_CAP = 75;

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
     * @ORM\JoinColumn(name="item", referencedColumnName="id", nullable=true)
     */
    private $item = null;

    /**
     * @var research
     *
     * @ORM\ManyToOne(targetEntity="Research")
     * @ORM\JoinColumn(name="research", referencedColumnName="id", nullable=true)
     */
    private $research = null;

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
     * @ORM\OneToMany(targetEntity="Enchantment", mappedBy="owner")
     **/
    private $enchantments;

    /**
     * @ORM\OneToMany(targetEntity="Enchantment", mappedBy="victim")
     **/
    private $curses;


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
        $this->enchantments = new ArrayCollection();
        $this->curses = new ArrayCollection();

        $this->item = null;
        $this->research = null;
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
        if ($gold < 0) $gold = 0;
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
        if ($mana > $this->getManaCap()) $mana = $this->getManaCap();
        if ($mana < 0) $mana = 0;
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
        if ($people > $this->getPeopleCap()) $people = $this->getPeopleCap();
        if ($people < 0) $people = 0;
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
        if ($magic < 1) $magic = 1;
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
        $this->turns = min($turns, $this->getTurnsCap());

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
     * Set item
     *
     * @param \Archmage\GameBundle\Entity\Item $item
     * @return Player
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
     * Set research
     *
     * @param \Archmage\GameBundle\Entity\Research $research
     * @return Player
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
    public function addConstruction(\Archmage\GameBundle\Entity\Construction $construction)
    {
        $this->constructions[] = $construction;

        return $this;
    }

    /**
     * Remove constructions
     *
     * @param \Archmage\GameBundle\Entity\Construction $constructions
     */
    public function removeConstruction(\Archmage\GameBundle\Entity\Construction $construction)
    {
        $this->constructions->removeElement($construction);
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
    public function addResearch(\Archmage\GameBundle\Entity\Research $research)
    {
        $this->researchs[] = $research;

        return $this;
    }

    /**
     * Remove researchs
     *
     * @param \Archmage\GameBundle\Entity\Research $researchs
     */
    public function removeResearch(\Archmage\GameBundle\Entity\Research $research)
    {
        $this->researchs->removeElement($research);
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
    public function addTroop(\Archmage\GameBundle\Entity\Troop $troop)
    {
        $this->troops[] = $troop;

        return $this;
    }

    /**
     * Remove troops
     *
     * @param \Archmage\GameBundle\Entity\Troop $troops
     */
    public function removeTroop(\Archmage\GameBundle\Entity\Troop $troop)
    {
        $this->troops->removeElement($troop);
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
    public function addItem(\Archmage\GameBundle\Entity\Item $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove items
     *
     * @param \Archmage\GameBundle\Entity\Item $items
     */
    public function removeItem(\Archmage\GameBundle\Entity\Item $item)
    {
        $this->items->removeElement($item);
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
    public function addContract(\Archmage\GameBundle\Entity\Contract $contract)
    {
        $this->contracts[] = $contract;

        return $this;
    }

    /**
     * Remove contracts
     *
     * @param \Archmage\GameBundle\Entity\Contract $contracts
     */
    public function removeContract(\Archmage\GameBundle\Entity\Contract $contract)
    {
        $this->contracts->removeElement($contract);
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
    public function addMessage(\Archmage\GameBundle\Entity\Message $message)
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * Remove messages
     *
     * @param \Archmage\GameBundle\Entity\Message $messages
     */
    public function removeMessage(\Archmage\GameBundle\Entity\Message $message)
    {
        $this->messages->removeElement($message);
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

    /**
     * Add enchantments
     *
     * @param \Archmage\GameBundle\Entity\Enchantment $enchantments
     * @return Player
     */
    public function addEnchantment(\Archmage\GameBundle\Entity\Enchantment $enchantment)
    {
        $this->enchantments[] = $enchantment;

        return $this;
    }

    /**
     * Remove enchantments
     *
     * @param \Archmage\GameBundle\Entity\Enchantment $enchantments
     */
    public function removeEnchantment(\Archmage\GameBundle\Entity\Enchantment $enchantment)
    {
        $this->enchantments->removeElement($enchantment);
    }

    /**
     * Get enchantments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEnchantments()
    {
        return $this->enchantments;
    }

    /**
     * Add curses
     *
     * @param \Archmage\GameBundle\Entity\Enchantment $curses
     * @return Player
     */
    public function addCurse(\Archmage\GameBundle\Entity\Enchantment $curse)
    {
        $this->curses[] = $curse;

        return $this;
    }

    /**
     * Remove curses
     *
     * @param \Archmage\GameBundle\Entity\Enchantment $curses
     */
    public function removeCurse(\Archmage\GameBundle\Entity\Enchantment $curse)
    {
        $this->curses->removeElement($curse);
    }

    /**
     * Get curses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCurses()
    {
        return $this->curses;
    }

    /*
     * BUILDINGS
     */

    /**
     * Get lands
     *
     * @return integer
     */
    public function getLands()
    {
        $lands = 0;
        foreach ($this->constructions as $construction) {
            $lands += $construction->getQuantity();
        }
        return $lands;
    }

    /**
     * Get building
     *
     * @return Construction
     */
    public function getConstruction($name)
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
    public function setConstruction($name, $quantity)
    {
        foreach ($this->constructions as $construction) {
            if ($construction->getBuilding()->getName() == $name) $construction->setQuantity($quantity);
        }
        return $this;
    }

    /**
     * Get research turns by ratio
     *
     * @return integer
     */
    public function getResearchRatio($turns)
    {
        $guilds = $this->getConstruction('Gremios')->getQuantity();
        $ratio = $this->getConstruction('Gremios')->getBuilding()->getResearchRatio();
        $percent = $guilds * $ratio / 1000;
        $turns = $turns - ceil($turns * $percent / 100);
        return $turns;
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

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        $level = 0;
        foreach ($this->researchs as $research) {
            if ($research->getActive()) {
                $level++;
            }
        }
        return 1 + floor($level / 4);
    }

    /*
     * RESOURCE CAPS
     */

    /**
     * Get turnsCap
     *
     * @return integer
     */
    public function getTurnsCap()
    {
        return 30000;
        return 300;
    }

    /**
     * Get manaCap
     *
     * @return integer
     */
    public function getManaCap()
    {
        $manacap = 0;
        foreach ($this->constructions as $construction) {
            $manacap += $construction->getQuantity() * $construction->getBuilding()->getManaCap();
        }
        return $manacap;
    }

    /**
     * Get peopleCap
     *
     * @return integer
     */
    public function getPeopleCap()
    {
        $peoplecap = 0;
        foreach ($this->constructions as $construction) {
            $peoplecap += $construction->getQuantity() * $construction->getBuilding()->getPeopleCap();
        }
        return $peoplecap;
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
        $gold = 0;
        foreach ($this->constructions as $construction) {
            $gold += $construction->getQuantity() * $construction->getBuilding()->getGoldResource();
        }
        return $gold;
    }

    /**
     * Get manaResourcePerTurn
     *
     * @return integer
     */
    public function getManaResourcePerTurn()
    {
        $mana = 0;
        foreach ($this->constructions as $construction) {
            $mana += $construction->getQuantity() * $construction->getBuilding()->getManaResource();
        }
        return $mana;
    }

    /**
     * Get peopleResourcePerTurn
     *
     * @return integer
     */
    public function getPeopleResourcePerTurn()
    {
        $people = 0;
        foreach ($this->constructions as $construction) {
            $people += $construction->getQuantity() * $construction->getBuilding()->getPeopleResource();
        }
        return $people;
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
            $gold += $contract->getHero()->getGoldMaintenance();
        }
        foreach ($this->constructions as $construction) {
            $gold += $construction->getBuilding()->getGoldMaintenance() * $construction->getQuantity();
        }
        foreach ($this->enchantments as $enchantment) {
            $gold += $enchantment->getSpell()->getGoldMaintenance();
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
            $mana += $contract->getHero()->getManaMaintenance();
        }
        foreach ($this->constructions as $construction) {
            $mana += $construction->getBuilding()->getManaMaintenance() * $construction->getQuantity();
        }
        foreach ($this->enchantments as $enchantment) {
            $mana += $enchantment->getSpell()->getManaMaintenance();
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
            $people += $contract->getHero()->getPeopleMaintenance();
        }
        foreach ($this->constructions as $construction) {
            $people += $construction->getBuilding()->getPeopleMaintenance() * $construction->getQuantity();
        }
        foreach ($this->enchantments as $enchantment) {
            $people += $enchantment->getSpell()->getPeopleMaintenance();
        }
        return $people;
    }

    /*
     * BUSCAR TROPAS, CONTRATOS Y HECHIZOS
     */

    /**
     * Get hasUnit
     *
     * @return boolean
     */
    public function hasUnit(Unit $search = null)
    {
        if ($search) {
            foreach ($this->troops as $troop) {
                if ($troop->getUnit()->getName() == $search->getName()) {
                    return $troop;
                }
            }
        }
        return false;
    }

    /**
     * Get hasTroop
     *
     * @return boolean
     */
    public function hasTroop(Troop $search = null)
    {
        if ($search) {
            foreach ($this->troops as $troop) {
                if ($troop->getUnit()->getName() == $search->getUnit()->getName()) {
                    return $troop;
                }
            }
        }
        return false;
    }

    /**
     * Get hasContract
     *
     * @return boolean
     */
    public function hasContract(Contract $search = null)
    {
        if ($search) {
            foreach ($this->contracts as $contract) {
                if ($contract->getHero()->getName() == $search->getHero()->getName()) {
                    return $contract;
                }
            }
        }
        return false;
    }

    /**
     * Get hasResearch
     *
     * @return boolean
     */
    public function hasResearch(Research $search = null)
    {
        if ($search) {
            foreach ($this->researchs as $research) {
                if ($research->getSpell()->getName() == $search->getSpell()->getName()) {
                    return $research;
                }
            }
        }
        return false;
    }
}
