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
     * CAPS
     */
    const RESEARCH_CAP = 75;
    const TURNS_CAP = 300;
    const MAGICDEFENSE_BASE = 5;
    const MAGICDEFENSE_CAP = 50;
    const ARMYDEFENSE_BASE = 5;
    const ARMYDEFENSE_CAP = 75;
    const LANDS_CAP = 3500;
    const TROOPS_CAP = 5;
    const ARTIFACT_RATIO = 1;
    const MAGICLEVEL_RATIO = 4;
    const MAGICLEVEL_CAP = 10;
    const HERO_EXPERIENCE = 50;

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
     * @ORM\Column(name="runes", type="smallint", nullable=false)
     */
    private $runes = 10;

    /**
     * @var integer
     *
     * @ORM\Column(name="gold", type="bigint", nullable=false)
     */
    private $gold = 3000000;

    /**
     * @var integer
     *
     * @ORM\Column(name="people", type="bigint", nullable=false)
     */
    private $people = 20000;

    /**
     * @var integer
     *
     * @ORM\Column(name="mana", type="bigint", nullable=false)
     */
    private $mana = 10000;

    /**
     * @var integer
     *
     * @ORM\Column(name="magic", type="smallint", nullable=false)
     */
    private $magic = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="turns", type="smallint", nullable=false)
     */
    private $turns = 300;

    /**
     * @var boolean
     *
     * @ORM\Column(name="god", type="boolean", nullable=false)
     */
    private $god = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bot", type="boolean", nullable=false)
     */
    private $bot = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="winner", type="boolean", nullable=false)
     */
    private $winner = false;

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
    private $enchantmentsOwner;

    /**
     * @ORM\OneToMany(targetEntity="Enchantment", mappedBy="victim")
     **/
    private $enchantmentsVictim;

    /**
     * @ORM\ManyToMany(targetEntity="Quest")
     * @ORM\JoinTable(name="PlayerQuest",
     *      joinColumns={@ORM\JoinColumn(name="player_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="quest_id", referencedColumnName="id")}
     *      )
     **/
    private $quests;

    /**
     * @ORM\ManyToMany(targetEntity="Recipe")
     * @ORM\JoinTable(name="PlayerRecipe",
     *      joinColumns={@ORM\JoinColumn(name="player_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="recipe_id", referencedColumnName="id")}
     *      )
     **/
    private $recipes;

    /**
     * @ORM\ManyToMany(targetEntity="Achievement")
     * @ORM\JoinTable(name="PlayerAchievement",
     *      joinColumns={@ORM\JoinColumn(name="player_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="achievement_id", referencedColumnName="id")}
     *      )
     **/
    private $achievements;


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
        $this->enchantmentsOwner = new ArrayCollection();
        $this->enchantmentsVictim = new ArrayCollection();
        $this->achievements = new ArrayCollection();
        $this->recipes = new ArrayCollection();
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
     * Set runes
     *
     * @param integer $runes
     * @return Player
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
     * Set gold
     *
     * @param integer $gold
     * @return Player
     */
    public function setGold($gold)
    {
        $this->gold = max(0, $gold);

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
        $this->mana = max(0, min($this->getManaCap(), $mana));

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
        $this->people = max(0, min($this->getPeopleCap(), $people));

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
        $this->turns = min(self::TURNS_CAP, $turns);

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
     * Set god
     *
     * @param boolean $god
     * @return Player
     */
    public function setGod($god)
    {
        $this->god = $god;

        return $this;
    }

    /**
     * Get god
     *
     * @return boolean
     */
    public function getGod()
    {
        return $this->god;
    }

    /**
     * Set bot
     *
     * @param boolean $bot
     * @return Player
     */
    public function setBot($bot)
    {
        $this->bot = $bot;

        return $this;
    }

    /**
     * Get bot
     *
     * @return boolean
     */
    public function getBot()
    {
        return $this->bot;
    }

    /**
     * Set winner
     *
     * @param boolean $winner
     * @return Player
     */
    public function setWinner($winner)
    {
        $this->winner = $winner;

        return $this;
    }

    /**
     * Get winner
     *
     * @return boolean
     */
    public function getWinner()
    {
        return $this->winner;
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
     * Add achievements
     *
     * @param \Archmage\GameBundle\Entity\Achievement $achievement
     * @return Player
     */
    public function addAchievement(\Archmage\GameBundle\Entity\Achievement $achievement)
    {
        $this->achievements[] = $achievement;

        return $this;
    }

    /**
     * Remove achievements
     *
     * @param \Archmage\GameBundle\Entity\Achievement $achievements
     */
    public function removeAchievement(\Archmage\GameBundle\Entity\Achievement $achievement)
    {
        $this->achievements->removeElement($achievement);
    }

    /**
     * Get achievements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAchievements()
    {
        return $this->achievements;
    }

    /**
     * Add recipe
     *
     * @param \Archmage\GameBundle\Entity\Recipe $recipe
     * @return Player
     */
    public function addRecipe(\Archmage\GameBundle\Entity\Recipe $recipe)
    {
        $this->recipes[] = $recipe;

        return $this;
    }

    /**
     * Remove recipe
     *
     * @param \Archmage\GameBundle\Entity\Recipe $recipe
     */
    public function removeRecipe(\Archmage\GameBundle\Entity\Recipe $recipe)
    {
        $this->recipes->removeElement($recipe);
    }

    /**
     * Get recipes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRecipes()
    {
        return $this->recipes;
    }

    /**
     * Add quest
     *
     * @param \Archmage\GameBundle\Entity\Recipe $quest
     * @return Player
     */
    public function addQuest(\Archmage\GameBundle\Entity\Quest $quest)
    {
        $this->quests[] = $quest;

        return $this;
    }

    /**
     * Remove quest
     *
     * @param \Archmage\GameBundle\Entity\Quest $quest
     */
    public function removeQuest(\Archmage\GameBundle\Entity\Quest $quest)
    {
        $this->quests->removeElement($quest);
    }

    /**
     * Get quests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuests()
    {
        return $this->quests;
    }

    /**
     * Add enchantmentsOwner
     *
     * @param \Archmage\GameBundle\Entity\Enchantment $enchantmentOwner
     * @return Player
     */
    public function addEnchantmentsOwner(\Archmage\GameBundle\Entity\Enchantment $enchantment)
    {
        $this->enchantmentsOwner[] = $enchantment;

        return $this;
    }

    /**
     * Remove enchantmentsOwner
     *
     * @param \Archmage\GameBundle\Entity\Enchantment $enchantment
     */
    public function removeEnchantmentsOwner(\Archmage\GameBundle\Entity\Enchantment $enchantment)
    {
        $this->enchantmentsOwner->removeElement($enchantment);
    }

    /**
     * Get enchantmentsOwner
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnchantmentsOwner()
    {
        return $this->enchantmentsOwner;
    }

    /**
     * Add enchantmentsVictim
     *
     * @param \Archmage\GameBundle\Entity\Enchantment $enchantmentVictim
     * @return Player
     */
    public function addEnchantmentsVictim(\Archmage\GameBundle\Entity\Enchantment $enchantment)
    {
        $this->enchantmentsVictim[] = $enchantment;

        return $this;
    }

    /**
     * Remove enchantmentsVictim
     *
     * @param \Archmage\GameBundle\Entity\Enchantment $enchantment
     */
    public function removeEnchantmentsVictim(\Archmage\GameBundle\Entity\Enchantment $enchantment)
    {
        $this->enchantmentsVictim->removeElement($enchantment);
    }

    /**
     * Get enchantmentsVictim
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnchantmentsVictim()
    {
        return $this->enchantmentsVictim;
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
     * Get freePerTurn
     *
     * @return integer
     */
    public function getFreePerTurn()
    {
        return max(0, ceil((self::LANDS_CAP - $this->getLands()) / (float)100));
    }

    /**
     * Get free lands
     *
     * @return integer
     */
    public function getFree()
    {
        return $this->getConstruction('Tierras')->getQuantity();
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
            if ($construction->getBuilding()->getName() == $name) $construction->setQuantity(max(0,$quantity));
        }
        return $this;
    }

    /**
     * Get research bonus
     *
     * @return integer
     */
    public function getResearchBonus()
    {
        $guilds = $this->getConstruction('Gremios');
        $researchRatio = floor($guilds->getQuantity() / (float)$guilds->getBuilding()->getResearchRatio());
        foreach ($this->enchantmentsVictim as $enchantment) {
            $researchRatio += $enchantment->getSpell()->getSkill()->getResearchBonus() * $enchantment->getOwner()->getMagic();
        }
        foreach ($this->contracts as $contract) {
            $researchRatio += $contract->getHero()->getSkill()->getResearchBonus() * $contract->getLevel();
        }
        foreach ($this->items as $item) {
            $researchRatio += $item->getArtifact()->getSkill()->getResearchBonus();
        }
        $percent = min(self::RESEARCH_CAP, $researchRatio);
        return max(0, $percent);
    }

    /**
     * Get research turns by ratio
     *
     * @return integer
     */
    public function getResearchRatio($turns)
    {
        return $turns - floor($turns * $this->getResearchBonus() / (float)100);
    }

    /**
     * Get artifact find ratio
     *
     * @return integer
     */
    public function getArtifactRatio()
    {
        $ratio = self::ARTIFACT_RATIO;
        foreach ($this->items as $item) {
            if ($item->getArtifact()->getSkill()->getArtifactRatioBonus() > 0) $ratio += $item->getArtifact()->getSkill()->getArtifactRatioBonus();
        }
        return $ratio;
    }

    /**
     * Get hero experience
     *
     * @return integer
     */
    public function getHeroExperience()
    {
        $experience = self::HERO_EXPERIENCE;
        foreach ($this->items as $item) {
            if ($item->getArtifact()->getSkill()->getExperienceBonus() > 0) $experience += $item->getArtifact()->getSkill()->getExperienceBonus();
        }
        return $experience;
    }

    /*
     * POWER RANKING MAGICDEFENSE ARMYDEFENSE
     */

    /**
     * Get magicDefense
     *
     * @return integer
     */
    public function getMagicDefense()
    {
        $magicDefense = self::MAGICDEFENSE_BASE;
        $barriers = $this->getConstruction('Barreras');
        $magicDefense += floor($barriers->getQuantity() / (float)$barriers->getBuilding()->getMagicDefenseRatio());
        foreach ($this->enchantmentsVictim as $enchantment) {
            $magicDefense += $enchantment->getSpell()->getSkill()->getMagicDefenseBonus() * $enchantment->getOwner()->getMagic();
        }
        foreach ($this->items as $item) {
            $magicDefense += $item->getArtifact()->getSkill()->getMagicDefenseBonus();
        }
        foreach ($this->contracts as $contract) {
            $magicDefense += $contract->getHero()->getSkill()->getMagicDefenseBonus() * $contract->getLevel();
        }
        return max(self::MAGICDEFENSE_BASE, min(self::MAGICDEFENSE_CAP, $magicDefense));
    }

    /**
     * Get armyDefense
     *
     * @return integer
     */
    public function getArmyDefense()
    {
        $armyDefense = self::ARMYDEFENSE_BASE;
        $fortresses = $this->getConstruction('Fortalezas');
        $armyDefense += floor($fortresses->getQuantity() / (float)$fortresses->getBuilding()->getArmyDefenseRatio());
        foreach ($this->enchantmentsVictim as $enchantment) {
            $armyDefense += $enchantment->getSpell()->getSkill()->getArmyDefenseBonus() * $enchantment->getOwner()->getMagic();
        }
        foreach ($this->items as $item) {
            $armyDefense += $item->getArtifact()->getSkill()->getArmyDefenseBonus();
        }
        foreach ($this->contracts as $contract) {
            $armyDefense += $contract->getHero()->getSkill()->getArmyDefenseBonus() * $contract->getLevel();
        }
        return max(self::ARMYDEFENSE_BASE, min(self::ARMYDEFENSE_CAP, $armyDefense));
    }

    /**
     * Get summonBonus
     *
     * @return integer
     */
    public function getSummonBonus()
    {
        $summon = 0;
        $barracks = $this->getConstruction('Barracones');
        $summon += floor($barracks->getQuantity() / (float)$barracks->getBuilding()->getSummonRatio());
        foreach ($this->enchantmentsVictim as $enchantment) {
            $summon += $enchantment->getSpell()->getSkill()->getSummonBonus() * $enchantment->getOwner()->getMagic();
        }
        foreach ($this->items as $item) {
            $summon += $item->getArtifact()->getSkill()->getSummonBonus();
        }
        foreach ($this->contracts as $contract) {
            $summon += $contract->getHero()->getSkill()->getSummonBonus() * $contract->getLevel();
        }
        return max(0, $summon);
    }

    /**
     * Get power
     *
     * @return integer
     */
    public function getPower()
    {
        $power = 0;
        foreach ($this->constructions as $construction) {
            $power += $construction->getQuantity() * $construction->getBuilding()->getPower();
        }
        foreach ($this->troops as $troop) {
            $power += $troop->getQuantity() * $troop->getUnit()->getPower();
        }
        foreach ($this->contracts as $contract) {
            $power += $contract->getLevel() * $contract->getHero()->getPower();
        }
        foreach ($this->items as $item) {
            $power += $item->getQuantity() * $item->getArtifact()->getPower();
        }
        foreach ($this->researchs as $research) {
            if ($research->getActive()) $power += $research->getSpell()->getPower();
        }
        foreach ($this->enchantmentsVictim as $enchantment) {
            if ($enchantment->getSpell()->getSkill()->getSelf()) $power += $enchantment->getSpell()->getPower() * $enchantment->getOwner()->getMagic();
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
                // && $research->getSpell()->getFaction() == $this->getFaction()
                $level++;
            }
        }
        return min(self::MAGICLEVEL_CAP, 1 + floor($level / self::MAGICLEVEL_RATIO));
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
        return self::TURNS_CAP;
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
     * Get terrainResourcePerTurn
     *
     * @return integer
     */
    public function getTerrainResourcePerTurn()
    {
        $terrain = 0;
        foreach ($this->enchantmentsVictim as $enchantment) {
            if ($enchantment->getSpell()->getSkill()->getTerrainBonus() > 0) $terrain += $enchantment->getSpell()->getSkill()->getTerrainBonus();
        }
        foreach ($this->items as $item) {
            if ($item->getArtifact()->getLegendary() && $item->getArtifact()->getSkill()->getTerrainBonus() > 0) $terrain += $item->getArtifact()->getSkill()->getTerrainBonus();
        }
        return $terrain;
    }

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
        foreach ($this->contracts as $contract) {
            $bonus = $contract->getHero()->getSkill()->getGoldBonus();
            if ($contract->getHero()->getSkill()->getGoldBonus() > 0) $gold += floor($gold * $bonus * $contract->getLevel() / (float)100);
        }
        foreach ($this->enchantmentsVictim as $enchantment) {
            $gold += floor($gold * $enchantment->getSpell()->getSkill()->getGoldBonus() * $enchantment->getOwner()->getMagic() / (float)100);
        }
        foreach ($this->items as $item) {
            if ($item->getArtifact()->getLegendary()) $gold += floor($gold * $item->getArtifact()->getSkill()->getGoldBonus() / (float)100);
        }
        return $gold;
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
        foreach ($this->contracts as $contract) {
            $bonus = $contract->getHero()->getSkill()->getPeopleBonus();
            if ($contract->getHero()->getSkill()->getPeopleBonus() > 0) $people += floor($people * $bonus * $contract->getLevel() / (float)100);
        }
        foreach ($this->enchantmentsVictim as $enchantment) {
            $people += floor($people * $enchantment->getSpell()->getSkill()->getPeopleBonus() * $enchantment->getOwner()->getMagic() / (float)100);
        }
        foreach ($this->items as $item) {
            if ($item->getArtifact()->getLegendary()) $people += floor($people * $item->getArtifact()->getSkill()->getPeopleBonus() / (float)100);
        }
        return $people;
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
        foreach ($this->contracts as $contract) {
            $bonus = $contract->getHero()->getSkill()->getManaBonus();
            if ($contract->getHero()->getSkill()->getManaBonus() > 0) $mana += floor($mana * $bonus * $contract->getLevel() / (float)100);
        }
        foreach ($this->enchantmentsVictim as $enchantment) {
            $mana += floor($mana * $enchantment->getSpell()->getSkill()->getManaBonus() * $enchantment->getOwner()->getMagic() / (float)100);
        }
        foreach ($this->items as $item) {
            if ($item->getArtifact()->getLegendary()) $mana += floor($mana * $item->getArtifact()->getSkill()->getManaBonus() / (float)100);
        }
        return $mana;
    }

    /**
     * Get terrainMaintenancePerTurn
     *
     * @return integer
     */
    public function getTerrainMaintenancePerTurn()
    {
        $terrain = 0;
        foreach ($this->enchantmentsVictim as $enchantment) {
            if ($enchantment->getSpell()->getSkill()->getTerrainBonus () < 0) $terrain += $enchantment->getSpell()->getSkill()->getTerrainBonus() * $enchantment->getOwner()->getMagic();
        }
        return abs($terrain);
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
            $gold += $contract->getHero()->getGoldMaintenance() * $contract->getLevel();
        }
        foreach ($this->constructions as $construction) {
            $gold += $construction->getBuilding()->getGoldMaintenance() * $construction->getQuantity();
        }
        foreach ($this->enchantmentsOwner as $enchantment) {
            $gold += $enchantment->getSpell()->getGoldMaintenance() * $enchantment->getOwner()->getMagic();
        }
        return $gold;
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
            $people += $contract->getHero()->getPeopleMaintenance() * $contract->getLevel();
        }
        foreach ($this->constructions as $construction) {
            $people += $construction->getBuilding()->getPeopleMaintenance() * $construction->getQuantity();
        }
        foreach ($this->enchantmentsOwner as $enchantment) {
            $people += $enchantment->getSpell()->getPeopleMaintenance() * $enchantment->getOwner()->getMagic();
        }
        return $people;
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
            $mana += $contract->getHero()->getManaMaintenance() * $contract->getLevel();
        }
        foreach ($this->constructions as $construction) {
            $mana += $construction->getBuilding()->getManaMaintenance() * $construction->getQuantity();
        }
        foreach ($this->enchantmentsOwner as $enchantment) {
            $mana += $enchantment->getSpell()->getManaMaintenance() * $enchantment->getOwner()->getMagic();
        }
        return $mana;
    }

    /**
     * Get artifacts
     *
     * @return integer
     */
    public function getArtifacts()
    {
        $artifacts = 0;
        foreach ($this->items as $item) {
            $artifacts += $item->getQuantity();
        }
        return $artifacts;
    }

    /**
     * Get heroes
     *
     * @return integer
     */
    public function getHeroes()
    {
        return $this->contracts->count();
    }

    /**
     * Get units
     *
     * @return integer
     */
    public function getUnits()
    {
        $units = 0;
        foreach ($this->troops as $troop) {
            $units += $troop->getQuantity();
        }
        return $units;
    }

    /**
     * Get army
     *
     * @return string
     */
    public function getArmyToString()
    {
        $units = array();
        foreach ($this->troops as $troop) {
            $units[] = '<span class="label label-'.$troop->getUnit()->getFaction()->getClass().'">'.$troop->getUnit()->getName().'</span>';
        }
        return implode(', ', $units);
    }

    /**
     * Get enchantments
     *
     * @return string
     */
    public function getEnchantmentsVictimToString()
    {
        $enchantments = array();
        foreach ($this->enchantmentsVictim as $enchantment) {
            $enchantments[] = '<span class="label label-'.$enchantment->getSpell()->getFaction()->getClass().'">'.$enchantment->getSpell()->getName().'</span>';
        }
        return implode(', ', $enchantments);
    }

    /**
     * Get spells
     *
     * @return integer
     */
    public function getSpells()
    {
        $spells = 0;
        foreach ($this->researchs as $research) {
            if ($research->getActive()) $spells++;
        }
        return $spells;
    }

    /*
     * BUSCAR TROPAS, CONTRATOS, HECHIZOS Y LOGROS
     */

    /**
     * Has achievement
     *
     * @return boolean
     */
    public function hasAchievement(Achievement $search = null)
    {
        if ($search) {
            foreach ($this->achievements as $achievement) {
                if ($achievement == $search) {
                    return $achievement;
                }
            }
        }
        return false;
    }

    /**
     * Has artifact
     *
     * @return boolean
     */
    public function hasArtifact(Artifact $search = null)
    {
        if ($search) {
            foreach ($this->items as $item) {
                if ($item->getArtifact()->getName() == $search->getName()) {
                    return $item;
                }
            }
        }
        return false;
    }

    /**
     * Has item
     *
     * @return boolean
     */
    public function hasItem(Item $search = null)
    {
        if ($search) {
            foreach ($this->items as $item) {
                if ($item->getArtifact() == $search->getArtifact()) {
                    return $item;
                }
            }
        }
        return false;
    }

    /**
     * Has unit
     *
     * @return boolean
     */
    public function hasUnit(Unit $search = null)
    {
        if ($search) {
            foreach ($this->troops as $troop) {
                if ($troop->getUnit() == $search) {
                    return $troop;
                }
            }
        }
        return false;
    }

    /**
     * Has troop
     *
     * @return boolean
     */
    public function hasTroop(Troop $search = null)
    {
        if ($search) {
            foreach ($this->troops as $troop) {
                if ($troop->getUnit() == $search->getUnit()) {
                    return $troop;
                }
            }
        }
        return false;
    }

    /**
     * Has contract
     *
     * @return boolean
     */
    public function hasContract(Contract $search = null)
    {
        if ($search) {
            foreach ($this->contracts as $contract) {
                if ($contract->getHero() == $search->getHero()) {
                    return $contract;
                }
            }
        }
        return false;
    }

    /**
     * Has research
     *
     * @return boolean
     */
    public function hasResearch(Research $search = null)
    {
        if ($search) {
            foreach ($this->researchs as $research) {
                if ($research->getSpell() == $search->getSpell()) {
                    return $research;
                }
            }
        }
        return false;
    }

    /**
     * Has spell
     *
     * @return boolean
     */
    public function hasSpell(Spell $search = null)
    {
        if ($search) {
            foreach ($this->researchs as $research) {
                if ($research->getSpell() == $search) {
                    return $research;
                }
            }
        }
        return false;
    }

    /**
     * Has enchantment
     *
     * @return boolean
     */
    public function hasEnchantmentVictim(Spell $search = null)
    {
        if ($search) {
            foreach ($this->enchantmentsVictim as $enchantment) {
                if ($enchantment->getSpell() == $search) {
                    return $enchantment;
                }
            }
        }
        return false;
    }

    /**
     * Get marked
     *
     * @return boolean
     */
    public function getMarked() {
        foreach ($this->enchantmentsVictim as $enchantment) {
            if ($enchantment->getSpell()->getSkill()->getMarkBonus()) return true;
        }
        return false;
    }
}
