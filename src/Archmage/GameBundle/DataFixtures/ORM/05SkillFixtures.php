<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Skill;

class SkillFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param $string
     * @return string
     */
    public function toSlug($string) {
        $search = explode(",","Á,É,Í,Ó,Ú,á,é,í,ó,ú, ");
        $replace = explode(",","a,e,i,o,u,a,e,i,o,u,-");
        $slug = strtolower(str_replace($search, $replace, $string));
        return $slug;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /*
         * OSCURIDAD
         */

        //INVOCAR ESQUELETOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Esqueletos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ZOMBIS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Zombis'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR HOMBRES LOBO
        $skill = new Skill();
        $skill->setUnit($this->getReference('Hombres Lobo'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ESPECTROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Espectros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR LICHES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Liches'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR VAMPIROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Vampiros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR CABALLEROS NEGROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Caballeros Negros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE SOMBRA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Sombra'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR GARGOLAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Gárgolas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DRAGONES NEGROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Dragones Negros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * HABILIDADES NEGRO
         */

        //CONVOCAR NOMUERTOS
        $skill = new Skill();
        $skill->setName('Convocar NoMuertos');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(20);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setType(null);
        $skill->setFamily($this->getReference('NoMuertos'));
        $skill->setDescription('Invoca aleatoriamente <span class="label label-extra">'.$skill->getFamily()->getName().'</span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //PLAGA
        $skill = new Skill();
        $skill->setName('Plaga');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(-1);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setType(null);
        $skill->setFamily(null);
        $skill->setDescription($skill->getPeopleBonus().'% <span class="label label-extra">Población</span> enemiga por turno.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //AQUELARRE
        $skill = new Skill();
        $skill->setName('Aquelarre');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(1);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setType(null);
        $skill->setFamily(null);
        $skill->setDescription('+'.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de tus tropas.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //FUERZA IMPIA
        $skill = new Skill();
        $skill->setName('Fuerza Impía');
        $skill->setAttackBonus(10);
        $skill->setDefenseBonus(-10);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setType(null);
        $skill->setFamily($this->getReference('NoMuertos'));
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y '.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de tus tropas <span class="label label-extra">'.$skill->getFamily()->getName().'</span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //VOODOO
        $skill = new Skill();
        $skill->setName('Voodoo');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(-1);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(true);
        $skill->setSelf(false);
        $skill->setType(null);
        $skill->setFamily(null);
        $skill->setDescription('<span class="label label-extra">Destruye</span> '.$skill->getDamageBonus().'% de una tropa enemiga al azar.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CORRUPCION
        $skill = new Skill();
        $skill->setName('Corrupción');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(-1);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setType(null);
        $skill->setFamily(null);
        $skill->setDescription($skill->getTerrainBonus().'% <span class="label label-extra">Tierras</span> libres enemigas.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //BRUJERIA
        $skill = new Skill();
        $skill->setName('Brujería');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(2);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(true);
        $skill->setSelf(false);
        $skill->setType(null);
        $skill->setFamily(null);
        $skill->setDescription('+'.$skill->getBarrierBonus().'% <span class="label label-extra">Defensa</span> mágica.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ECLIPSE
        $skill = new Skill();
        $skill->setName('Eclipse');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(-5);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(true);
        $skill->setSelf(false);
        $skill->setType(null);
        $skill->setFamily(null);
        $skill->setFaction($this->getReference('Fantasmal'));
        $skill->setDescription($skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de las tropas <span class="label label-'.$skill->getFaction()->getClass().'">'.$skill->getFaction()->getName().'</span> enemigas.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //MALDICION
        $skill = new Skill();
        $skill->setName('Maldición');
        $skill->setAttackBonus(-2);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(true);
        $skill->setSelf(false);
        $skill->setType(null);
        $skill->setFamily(null);
        $skill->setDescription($skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> de una tropa enemiga al azar.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //MIEDO
        $skill = new Skill();
        $skill->setName('Miedo');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(-1);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(true);
        $skill->setSelf(false);
        $skill->setType(null);
        $skill->setFamily(null);
        $skill->setDescription($skill->getSpeedBonus().' <span class="label label-extra">Velocidad</span> de una tropa enemiga al azar.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * NATURALEZA
         */

        //INVOCAR GORILAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Gorilas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELFOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elfos de los Bosques'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DRUIDAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Druidas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR TROLLS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Trolls'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ENTS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Ents'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR BEHEMOTHS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Behemoths'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR SIERPES COLOSALES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Sierpes Colosales'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE TIERRA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Tierra'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR HIDRAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Hidras'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DRAGONES VERDES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Dragones Verdes'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * HECHIZOS NATURALEZA
         */

        //HURACAN
        $skill = new Skill();
        $skill->setName('Huracán');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(-2);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setUnit(null);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(true);
        $skill->setSelf(false);
        $skill->setFamily(null);
        $skill->setType($this->getReference('Volador'));
        $skill->setFaction(null);
        $skill->setDescription($skill->getQuantityBonus().' <span class="label label-extra">Velocidad</span> de las tropas <span class="label label-extra">'.$skill->getType()->getName().'</span> enemigas.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CONCILIO DE LAS BESTIAS
        $skill = new Skill();
        $skill->setName('Concilio de las Bestias');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(100);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setUnit(null);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(true);
        $skill->setSelf(false);
        $skill->setFamily($this->getReference('Bestias'));
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('Invoca aleatoriamente <span class="label label-extra">'.$skill->getFamily()->getName().'</span>.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //AGRANDAR ANIMAL
        $skill = new Skill();
        $skill->setName('Agrandar Animales');
        $skill->setAttackBonus(5);
        $skill->setDefenseBonus(-5);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setUnit(null);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Bestias'));
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y '.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de tus tropas <span class="label label-extra">'.$skill->getFamily()->getName().'</span>.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CURACION
        $skill = new Skill();
        $skill->setName('Curación');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(2);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setUnit(null);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('+'.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de tus tropas.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //FAVOR DE LA NATURALEZA
        $skill = new Skill();
        $skill->setName('Favor de la Naturaleza');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(1);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setUnit(null);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('+'.$skill->getTerrainBonus().'% <span class="label label-extra">Tierras</span> libres por turno.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //OXIDAR ARMADURA
        $skill = new Skill();
        $skill->setName('Oxidar Armadura');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(-3);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setUnit(null);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(true);
        $skill->setSelf(false);
        $skill->setFamily(null);
        $skill->setType($this->getReference('Melee'));
        $skill->setFaction(null);
        $skill->setDescription($skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de las tropas <span class="label label-extra">'.$skill->getType()->getName().'</span> enemigas.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //IRA DEL BOSQUE
        $skill = new Skill();
        $skill->setName('Ira del Bosque');
        $skill->setAttackBonus(5);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setUnit(null);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType($this->getReference('Asedio'));
        $skill->setFaction(null);
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> de tus tropas <span class="label label-extra">'.$skill->getType()->getName().'</span>.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CONTROL DEL CLIMA
        $skill = new Skill();
        $skill->setName('Control del Clima');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(2);
        $skill->setArtifactBonus(0);
        $skill->setUnit(null);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('+'.$skill->getBarrierBonus().'% <span class="label label-extra">Defensa</span> mágica.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //RAYO DE SOL
        $skill = new Skill();
        $skill->setName('Rayo de Sol');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(-5);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setUnit(null);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(true);
        $skill->setSelf(false);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction($this->getReference('Sagrado'));
        $skill->setDescription($skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de las tropas <span class="label label-'.$skill->getFaction()->getClass().'">'.$skill->getFaction()->getName().'</span> enemigas.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //PRISA
        $skill = new Skill();
        $skill->setName('Prisa');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(1);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setUnit(null);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('+'.$skill->getSpeedBonus().' <span class="label label-extra">Velocidad</span> de una tropa aliada.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * FANTASMAL
         */

        //INVOCAR HADAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Hadas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR TRITONES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Tritones'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR SIRENAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Sirenas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR NAGAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Nagas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR MAGOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Magos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DJINNIS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Djinnis'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE AGUA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Agua'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR TITANES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Titanes'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR LEVIATANES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Leviatanes'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DRAGONES AZULES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Dragones Azules'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * HECHIZOS FANTASMAL
         */

        //ORO FALSO
        $skill = new Skill();
        $skill->setName('Oro Falso');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(-5);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription($skill->getGoldBonus().'% <span class="label label-extra">Oro</span> enemigo.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //REUNION ELEMENTAL
        $skill = new Skill();
        $skill->setName('Reunión Elemental');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(100);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Elementales'));
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('Invoca aleatoriamente <span class="label label-extra">'.$skill->getFamily()->getName().'</span>.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ORACULO
        $skill = new Skill();
        $skill->setName('Oráculo');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(true);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('Obtiene <span class="label label-extra">Información</span> importante del mago objetivo.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //TSUNAMI
        $skill = new Skill();
        $skill->setName('Tsunami');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(-5);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction($this->getReference('Caos'));
        $skill->setDescription($skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de las tropas <span class="label label-'.$skill->getFaction()->getClass().'">'.$skill->getFaction()->getName().'</span> enemigas.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CONCENTRACION
        $skill = new Skill();
        $skill->setName('Concentración');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(1);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('+'.$skill->getManaBonus().'% <span class="label label-extra">Maná</span> máximo por turno.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //SABIDURIA
        $skill = new Skill();
        $skill->setName('Sabiduría');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(1);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('Aumenta tu nivel de <span class="label label-extra">Magia</span>.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //NIEBLA
        $skill = new Skill();
        $skill->setName('Niebla');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(-1);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription($skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de las tropas enemigas.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //BARRERA MENTAL
        $skill = new Skill();
        $skill->setName('Barrera Mental');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(5);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('+'.$skill->getBarrierBonus().'% <span class="label label-extra">Defensa</span> mágica.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ENCONTRAR ARTEFACTO
        $skill = new Skill();
        $skill->setName('Encontrar Artefacto');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(20);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('Genera un <span class="label label-extra">Artefacto</span> aleatorio.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //DESENCANTAR
        $skill = new Skill();
        $skill->setName('Desencantar');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(true);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('Rompe un <span class="label label-extra">Encantamiento</span> aleatorio de tu reino.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * SAGRADO
         */

        //INVOCAR MONJES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Monjes'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR PALADINES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Paladines'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR UNICORNIOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Unicornios'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR PEGASOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Pegasos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ANGELES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Ángeles'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR GRIFOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Grifos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE AIRE
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Aire'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ARCANGELES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Arcángeles'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DOMINIONS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Dominions'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DRAGONES BLANCOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Dragones Blancos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * HECHIZOS SAGRADO
         */

        //DESTRUIR ARTEFACTO
        $skill = new Skill();
        $skill->setName('Destruir Artefacto');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(20);
        $skill->setDispell(true);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('Destruye un <span class="label label-extra">Artefacto</span> enemigo al azar.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //PUERTA DE LOS CIELOS
        $skill = new Skill();
        $skill->setName('Puerta de los Cielos');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(100);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(true);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Celestiales'));
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('Invoca aleatoriamente <span class="label label-extra">'.$skill->getFamily()->getName().'</span>.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CALMA
        $skill = new Skill();
        $skill->setName('Calma');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(-1);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(true);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(true);
        $skill->setSelf(false);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription($skill->getDefenseBonus().'% <span class="label label-extra">Ataque</span> de las tropas enemigas.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //PALABRA SANTA
        $skill = new Skill();
        $skill->setName('Palabra Santa');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(-5);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(true);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction($this->getReference('Oscuridad'));
        $skill->setDescription($skill->getDefenseBonus().'% la <span class="label label-extra">Defensa</span> de las tropas <span class="label label-'.$skill->getFaction()->getClass().'">'.$skill->getFaction()->getName().'</span> enemigas.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //PROTECCION DIVINA
        $skill = new Skill();
        $skill->setName('Protección Divina');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(2);
        $skill->setArtifactBonus(0);
        $skill->setDispell(true);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('+'.$skill->getBarrierBonus().'% <span class="label label-extra">Defensa</span> mágica.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //VALOR
        $skill = new Skill();
        $skill->setName('Valor');
        $skill->setAttackBonus(3);
        $skill->setDefenseBonus(3);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(true);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Celestiales'));
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y '.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de tus tropas <span class="label label-extra">'.$skill->getFamily()->getName().'</span>.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //SANACION
        $skill = new Skill();
        $skill->setName('Sanación');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(2);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(true);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('+'.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de tus tropas.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //PAZ
        $skill = new Skill();
        $skill->setName('Paz');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(1);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(true);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('+'.$skill->getPeopleBonus().'% <span class="label label-extra">Población</span> por turno.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //VOLAR
        $skill = new Skill();
        $skill->setName('Volar');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(2);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(true);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('+'.$skill->getSpeedBonus().' <span class="label label-extra">Velocidad</span> de una tropa aliada al azar.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //PROSPERIDAD
        $skill = new Skill();
        $skill->setName('Prosperidad');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(1);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(true);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setFaction(null);
        $skill->setDescription('+'.$skill->getGoldBonus().'% <span class="label label-extra">Oro</span> por turno.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * DESTRUCCION
         */

        //INVOCAR GOBLINS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Goblins'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR CERBEROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Cerberos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR OGROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Ogros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR QUIMERAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Quimeras'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR MINOTAUROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Minotauros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR SALAMANDRAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Salamandras'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE LAVA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Lava'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DIABLOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Diablos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR FENIX
        $skill = new Skill();
        $skill->setUnit($this->getReference('Fénix'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DRAGONES ROJOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Dragones Rojos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Recluta <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->toSlug($skill->getUnit()->getName()).'">'.$skill->getUnit()->getName().'</a></span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * HECHIZOS DESTRUCCION
         */

        //CONVOCAR DEMONIOS
        $skill = new Skill();
        $skill->setName('Convocar Demonios');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(100);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setType(null);
        $skill->setFamily($this->getReference('Demonios'));
        $skill->setDescription('Invoca aleatoriamente <span class="label label-extra">'.$skill->getFamily()->getName().'</span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //VOLCANO
        $skill = new Skill();
        $skill->setName('Volcano');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(-1);
        $skill->setTerrainBonus(-1);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setType(null);
        $skill->setFamily(null);
        $skill->setDescription($skill->getPeopleBonus().'% <span class="label label-extra">Población</span> y '.$skill->getTerrainBonus().'% <span class="label label-extra">Tierras</span> enemigas por turno.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //FLECHAS ARDIENTES
        $skill = new Skill();
        $skill->setName('Flechas Ardientes');
        $skill->setAttackBonus(3);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setType($this->getReference('Distancia'));
        $skill->setFamily(null);
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> de tus tropas <span class="label label-extra">'.$skill->getType()->getName().'</span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //COMBUSTION
        $skill = new Skill();
        $skill->setName('Combustión');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(-10);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setType(null);
        $skill->setFamily(null);
        $skill->setDescription($skill->getManaBonus().'% del <span class="label label-extra">Maná</span> enemigo actual.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INFIERNO
        $skill = new Skill();
        $skill->setName('Inferno');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(-5);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setType(null);
        $skill->setFamily(null);
        $skill->setFaction($this->getReference('Naturaleza'));
        $skill->setDescription($skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de las tropas <span class="label label-'.$skill->getFaction()->getClass().'">'.$skill->getFaction()->getName().'</span> enemigas.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //TAMBORES DE GUERRA
        $skill = new Skill();
        $skill->setName('Tambores de Guerra');
        $skill->setAttackBonus(1);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setType(null);
        $skill->setFamily(null);
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> de tus tropas.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //BOLA DE FUEGO
        $skill = new Skill();
        $skill->setName('Bola de Fuego');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(-2);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setType(null);
        $skill->setFamily(null);
        $skill->setDescription('<span class="label label-extra">Destruye</span> '.$skill->getDamageBonus().'% de una tropa enemiga al azar.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //MURO IGNEO
        $skill = new Skill();
        $skill->setName('Muro Ígneo');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(2);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setType(null);
        $skill->setFamily(null);
        $skill->setDescription('+'.$skill->getBarrierBonus().'% <span class="label label-extra">Defensa</span> mágica.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ALAS FLAMIGUERAS
        $skill = new Skill();
        $skill->setName('Alas Flamígueras');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(1);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setType(null);
        $skill->setFamily(null);
        $skill->setDescription('+'.$skill->getPeopleBonus().' <span class="label label-extra">Velocidad</span> de una tropa aliada.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //FURIA DEMONIACA
        $skill = new Skill();
        $skill->setName('Furia Demoníaca');
        $skill->setAttackBonus(2);
        $skill->setDefenseBonus(2);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setUnit(null);
        $skill->setBattle(true);
        $skill->setSelf(false);
        $skill->setType(null);
        $skill->setFamily($this->getReference('Demonios'));
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y +'.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de tus tropas <span class="label label-extra">'.$skill->getFamily()->getName().'</span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * ARTEFACTOS
         */

        //CONVOCAR DRAGONES
        $skill = new Skill();
        $skill->setName('Convocar Dragones');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setQuantityBonus(20);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily($this->getReference('Dragones'));
        $skill->setType(null);
        $skill->setDescription('Invoca aleatoriamente <span class="label label-extra">'.$skill->getFamily()->getName().'</span>.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * RECURSOS
         */

        //GENERAR TIERRAS
        $skill = new Skill();
        $skill->setName('Generar Tierras');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(10);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //DESTRUIR TIERRAS
        $skill = new Skill();
        $skill->setName('Destruir Tierras');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(-10);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //GENERAR MANA
        $skill = new Skill();
        $skill->setName('Generar Maná');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(50);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //DESTRUIR MANA
        $skill = new Skill();
        $skill->setName('Destruir Maná');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(-50);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //GENERAR POBLACION
        $skill = new Skill();
        $skill->setName('Generar Población');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(20);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //DESTRUIR POBLACION
        $skill = new Skill();
        $skill->setName('Destruir Población');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(-20);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //GENERAR ORO
        $skill = new Skill();
        $skill->setName('Generar Oro');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(20);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //DESTRUIR ORO
        $skill = new Skill();
        $skill->setName('Destruir Oro');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(-20);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(false);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //AUMENTAR VELOCIDAD
        $skill = new Skill();
        $skill->setName('Aumentar Velocidad');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(10);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //REDUCIR VELOCIDAD
        $skill = new Skill();
        $skill->setName('Reducir Velocidad');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(-10);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(true);
        $skill->setSelf(false);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription(null);
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * APOCALIPSIS
         */

        //APOCALIPSIS
        $skill = new Skill();
        $skill->setName('Fin del juego');
        $skill->setAttackBonus(0);
        $skill->setDefenseBonus(0);
        $skill->setSpeedBonus(0);
        $skill->setGoldBonus(0);
        $skill->setManaBonus(0);
        $skill->setPeopleBonus(0);
        $skill->setTerrainBonus(0);
        $skill->setDamageBonus(0);
        $skill->setMagicBonus(0);
        $skill->setQuantityBonus(0);
        $skill->setBarrierBonus(0);
        $skill->setArtifactBonus(0);
        $skill->setDispell(false);
        $skill->setSpy(false);
        $skill->setBattle(false);
        $skill->setSelf(true);
        $skill->setUnit(null);
        $skill->setFamily(null);
        $skill->setType(null);
        $skill->setDescription('Si mantienes 7 dias este encantamiento, <span class="label label-extra">Ganas</span> el juego.');
        $skill->setFaction(null);
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 5; // the order in which fixtures will be loaded
    }
}