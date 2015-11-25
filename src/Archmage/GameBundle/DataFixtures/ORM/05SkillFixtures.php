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
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ZOMBIS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Zombis'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ESPECTROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Espectros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR HOMBRES LOBO
        $skill = new Skill();
        $skill->setUnit($this->getReference('Hombres Lobo'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR LICHES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Liches'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR VAMPIROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Vampiros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR CABALLEROS NEGROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Caballeros Negros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE SOMBRA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Sombra'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR GARGOLAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Gárgolas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DRAGONES NEGROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Dragones Negros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * HABILIDADES NEGRO
         */

        //AQUELARRE
        $skill = new Skill();
        $skill->setName('Aquelarre');
        $skill->setDefenseBonus(5);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de tus tropas por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //MALDICION
        $skill = new Skill();
        $skill->setName('Maldición');
        $skill->setAttackBonus(-5);
        $skill->setBattle(true);
        $skill->setDescription($skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> a las tropas enemigas por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //FUERZA IMPIA
        $skill = new Skill();
        $skill->setName('Fuerza Impía');
        $skill->setAttackBonus(10);
        $skill->setDefenseBonus(-10);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('NoMuertos'));
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y '.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de tus <span class="label label-extra">'.$skill->getFamily()->getName().'</span> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //TERROR
        $skill = new Skill();
        $skill->setName('Terror');
        $skill->setMagicDefenseBonus(-3);
        $skill->setArmyDefenseBonus(-3);
        $skill->setDescription($skill->getMagicDefenseBonus().'% <span class="label label-extra">Defensa Mágica</span> y '.$skill->getArmyDefenseBonus().'% <span class="label label-extra">Defensa Física</span> enemiga por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //PLAGA
        $skill = new Skill();
        $skill->setName('Plaga');
        $skill->setPeopleBonus(-5);
        $skill->setDescription($skill->getPeopleBonus().'% <span class="label label-extra">Población</span> producida al <i class="fa fa-fw fa-hourglass-half"></i> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //VOODOO
        $skill = new Skill();
        $skill->setName('Voodoo');
        $skill->setPeopleBonus(-1);
        $skill->setDescription($skill->getPeopleBonus().'% <span class="label label-extra">Población</span> al Reino enemigo por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CORRUPCION
        $skill = new Skill();
        $skill->setName('Corrupción');
        $skill->setTerrainBonus(-1);
        $skill->setManaBonus(-5);
        $skill->setDescription($skill->getTerrainBonus().' <span class="label label-extra">Tierras</span> y '.$skill->getManaBonus().'% <span class="label label-extra">Maná</span> enemigo al <i class="fa fa-fw fa-hourglass-half"></i> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //BRUJERIA
        $skill = new Skill();
        $skill->setName('Brujería');
        $skill->setMagicDefenseBonus(3);
        $skill->setArmyDefenseBonus(1);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getMagicDefenseBonus().'% <span class="label label-extra">Defensa Mágica</span> y +'.$skill->getArmyDefenseBonus().'% <span class="label label-extra">Defensa Física</span> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //NOCHE DE LOS MUERTOS VIVIENTES
        $skill = new Skill();
        $skill->setName('Convocar NoMuertos'); //para usarlo como artifact tambien
        $skill->setQuantityBonus(240000); //media de poder de muertos vivientes
        $skill->setRandom(true);
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('NoMuertos'));
        $skill->setDescription('Invoca aleatoriamente <span class="label label-extra">'.$skill->getFamily()->getName().'</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ECLIPSE
        $skill = new Skill();
        $skill->setName('Eclipse');
        $skill->setDefenseBonus(-10);
        $skill->setBattle(true);
        $skill->setFaction($this->getReference('Fantasmal'));
        $skill->setDescription($skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de los <span class="label label-'.$skill->getFaction()->getClass().'">'.$skill->getFaction()->getName().'</span> enemigos por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * NATURALEZA
         */

        //INVOCAR GORILAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Gorilas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELFOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elfos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DRUIDAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Druidas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ENTS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Ents'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR TROLLS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Trolls'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR BEHEMOTHS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Behemoths'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE TIERRA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Tierra'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR SIERPES COLOSALES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Sierpes Colosales'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR HIDRAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Hidras'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DRAGONES VERDES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Dragones Verdes'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * HECHIZOS NATURALEZA
         */

        //OXIDAR ARMADURA
        $skill = new Skill();
        $skill->setName('Oxidar Armadura');
        $skill->setDefenseBonus(-5);
        $skill->setBattle(true);
        $skill->setDescription($skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de las tropas enemigas por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //HURACAN
        $skill = new Skill();
        $skill->setName('Huracán');
        $skill->setAttackBonus(-10);
        $skill->setDefenseBonus(-10);
        $skill->setBattle(true);
        $skill->setType($this->getReference('Volador'));
        $skill->setDescription($skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y '.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> a <span class="label label-extra">'.$skill->getType()->getName().'</span> enemigos por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //AGRANDAR ANIMALES
        $skill = new Skill();
        $skill->setName('Agrandar Animales');
        $skill->setAttackBonus(10);
        $skill->setDefenseBonus(-10);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Bestias'));
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y '.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de tus <span class="label label-extra">'.$skill->getFamily()->getName().'</span> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CURACION
        $skill = new Skill();
        $skill->setName('Curación');
        $skill->setDefenseBonus(5);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de tus tropas por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //IRA DEL BOSQUE
        $skill = new Skill();
        $skill->setName('Ira del Bosque');
        $skill->setAttackBonus(10);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Elementales'));
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> de tus <span class="label label-extra">'.$skill->getFamily()->getName().'</span> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //DRUIDISMO
        $skill = new Skill();
        $skill->setName('Druidismo');
        $skill->setRecipeBonus(15);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getRecipeBonus().'% por <i class="fa fa-fw fa-magic"></i> de descubrir una nueva <span class="label label-recipe">Receta</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CONTROL DEL CLIMA
        $skill = new Skill();
        $skill->setName('Control del Clima');
        $skill->setTerrainBonus(1);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getTerrainBonus().' <span class="label label-extra">Tierra</span> al <i class="fa fa-fw fa-hourglass-half"></i>, independientemente del <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //FAVOR DE LA NATURALEZA
        $skill = new Skill();
        $skill->setName('Favor de la Naturaleza');
        $skill->setMagicDefenseBonus(3);
        $skill->setArmyDefenseBonus(1);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getMagicDefenseBonus().'% <span class="label label-extra">Defensa Mágica</span> y +'.$skill->getArmyDefenseBonus().'% <span class="label label-extra">Defensa Física</span> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CONCILIO DE LAS BESTIAS
        $skill = new Skill();
        $skill->setName('Convocar Bestias');
        $skill->setQuantityBonus(300000); // media de bestias
        $skill->setRandom(true);
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Bestias'));
        $skill->setDescription('Invoca aleatoriamente <span class="label label-extra">'.$skill->getFamily()->getName().'</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //RAYO DE SOL
        $skill = new Skill();
        $skill->setName('Rayo de Sol');
        $skill->setDefenseBonus(-10);
        $skill->setBattle(true);
        $skill->setFaction($this->getReference('Sagrado'));
        $skill->setDescription($skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de los <span class="label label-'.$skill->getFaction()->getClass().'">'.$skill->getFaction()->getName().'</span> enemigos por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * FANTASMAL
         */

        //INVOCAR TRITONES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Tritones'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR SIRENAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Sirenas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR NAGAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Nagas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR MAGOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Magos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR HADAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Hadas'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DJINNIS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Djinnis'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE AGUA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Agua'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR TITANES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Titanes'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR LEVIATANES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Leviatanes'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DRAGONES AZULES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Dragones Azules'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * HECHIZOS FANTASMAL
         */

        //ORO FALSO
        $skill = new Skill();
        $skill->setName('Oro Falso');
        $skill->setGoldBonus(-1);
        $skill->setDescription($skill->getGoldBonus().'% <span class="label label-extra">Oro</span> enemigo por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ORACULO
        $skill = new Skill();
        $skill->setName('Oráculo');
        $skill->setSpyBonus(15);
        $skill->setDescription('+'.$skill->getSpyBonus().'% por <i class="fa fa-fw fa-magic"></i> de obtener <span class="label label-extra">Información</span> del objetivo');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //SABIDURIA
        $skill = new Skill();
        $skill->setName('Sabiduría');
        $skill->setResearchBonus(5);
        $skill->setSelf(true);
        $skill->setDescription('Aumenta el bonus de <span class="label label-extra">Investigación</span> +'.$skill->getResearchBonus().'% por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CHAMANISMO
        $skill = new Skill();
        $skill->setName('Chamanismo');
        $skill->setPeopleBonus(-2);
        $skill->setManaBonus(-3);
        $skill->setDescription($skill->getPeopleBonus().'% <span class="label label-extra">Población</span> y '.$skill->getManaBonus().'% <span class="label label-extra">Maná</span> al Reino enemigo por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ENCONTRAR ARTEFACTO
        $skill = new Skill();
        $skill->setName('Encontrar Artefacto');
        $skill->setArtifactBonus(15);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getArtifactBonus().'% por <i class="fa fa-fw fa-magic"></i> de encontrar un <span class="label label-extra">Artefacto</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //DESENCANTAR
        $skill = new Skill();
        $skill->setName('Desencantar');
        $skill->setRandom(true);
        $skill->setDispellBonus(15);
        $skill->setDescription('+'.$skill->getDispellBonus().'% por <i class="fa fa-fw fa-magic"></i> de romper un <span class="label label-extra">Encantamiento</span> de otro Reino');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CONCENTRACION
        $skill = new Skill();
        $skill->setName('Concentración');
        $skill->setManaBonus(5);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getManaBonus().'% <span class="label label-extra">Maná</span> producido al <i class="fa fa-fw fa-hourglass-half"></i> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //BARRERA MENTAL
        $skill = new Skill();
        $skill->setName('Barrera Mental');
        $skill->setMagicDefenseBonus(2);
        $skill->setArmyDefenseBonus(2);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getMagicDefenseBonus().'% <span class="label label-extra">Defensa Mágica</span> y +'.$skill->getArmyDefenseBonus().'% <span class="label label-extra">Defensa Física</span> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //REUNION ELEMENTAL
        $skill = new Skill();
        $skill->setName('Convocar Elementales'); //para usarlo como artifact tambien
        $skill->setQuantityBonus(330000); //media de elementales
        $skill->setRandom(true);
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Elementales'));
        $skill->setDescription('Invoca aleatoriamente <span class="label label-extra">'.$skill->getFamily()->getName().'</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //TSUNAMI
        $skill = new Skill();
        $skill->setName('Tsunami');
        $skill->setDefenseBonus(-10);
        $skill->setBattle(true);
        $skill->setFaction($this->getReference('Caos'));
        $skill->setDescription($skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de los <span class="label label-'.$skill->getFaction()->getClass().'">'.$skill->getFaction()->getName().'</span> enemigos por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * SAGRADO
         */

        //INVOCAR PALADINES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Paladines'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR MONJES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Monjes'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR UNICORNIOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Unicornios'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR PEGASOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Pegasos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ANGELES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Ángeles'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR GRIFOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Grifos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE AIRE
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Aire'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ARCANGELES
        $skill = new Skill();
        $skill->setUnit($this->getReference('Arcángeles'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DOMINIONS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Dominions'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DRAGONES BLANCOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Dragones Blancos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * HECHIZOS SAGRADO
         */

        //SANACION
        $skill = new Skill();
        $skill->setName('Sanación');
        $skill->setDefenseBonus(5);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de tus tropas por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CALMA
        $skill = new Skill();
        $skill->setName('Calma');
        $skill->setDefenseBonus(-5);
        $skill->setBattle(true);
        $skill->setDescription($skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de las tropas enemigas por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //DESTRUIR ARTEFACTO
        $skill = new Skill();
        $skill->setName('Destruir Artefacto');
        $skill->setArtifactBonus(-15);
        $skill->setRandom(true);
        $skill->setDescription('+'.abs($skill->getArtifactBonus()).'% por <i class="fa fa-fw fa-magic"></i> de eliminar un <span class="label label-extra">Artefacto</span> enemigo');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //FERVOR
        $skill = new Skill();
        $skill->setName('Fervor');
        $skill->setAttackBonus(-10);
        $skill->setDefenseBonus(10);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Celestiales'));
        $skill->setDescription($skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y +'.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de tus <span class="label label-extra">'.$skill->getFamily()->getName().'</span> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //PAZ
        $skill = new Skill();
        $skill->setName('Paz');
        $skill->setPeopleBonus(5);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getPeopleBonus().'% <span class="label label-extra">Población</span> producida al <i class="fa fa-fw fa-hourglass-half"></i> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //PROSPERIDAD
        $skill = new Skill();
        $skill->setName('Prosperidad');
        $skill->setGoldBonus(5);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getGoldBonus().'% <span class="label label-extra">Oro</span> producido al <i class="fa fa-fw fa-hourglass-half"></i> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //OASIS
        $skill = new Skill();
        $skill->setName('Oasis');
        $skill->setSummonBonus(5);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getSummonBonus().'% <span class="label label-extra">Tropas</span> invocadas por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //PROTECCION DIVINA
        $skill = new Skill();
        $skill->setName('Protección Divina');
        $skill->setMagicDefenseBonus(1);
        $skill->setArmyDefenseBonus(3);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getMagicDefenseBonus().'% <span class="label label-extra">Defensa Mágica</span> y +'.$skill->getArmyDefenseBonus().'% <span class="label label-extra">Defensa Física</span> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //PUERTA DE LOS CIELOS
        $skill = new Skill();
        $skill->setName('Convocar Celestiales'); //para usarlo como artifact tambien
        $skill->setQuantityBonus(320000); //media de poder de celestiales
        $skill->setRandom(true);
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Celestiales'));
        $skill->setDescription('Invoca aleatoriamente <span class="label label-extra">'.$skill->getFamily()->getName().'</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //PALABRA SANTA
        $skill = new Skill();
        $skill->setName('Palabra Santa');
        $skill->setDefenseBonus(-10);
        $skill->setBattle(true);
        $skill->setFaction($this->getReference('Oscuridad'));
        $skill->setDescription($skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de los <span class="label label-'.$skill->getFaction()->getClass().'">'.$skill->getFaction()->getName().'</span> enemigos por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * DESTRUCCION
         */

        //INVOCAR GOBLINS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Goblins'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR CERBEROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Cerberos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR MINOTAUROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Minotauros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR OGROS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Ogros'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR QUIMERAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Quimeras'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR SALAMANDRAS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Salamandras'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR ELEMENTALES DE LAVA
        $skill = new Skill();
        $skill->setUnit($this->getReference('Elementales de Lava'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DIABLOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Diablos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR FENIX
        $skill = new Skill();
        $skill->setUnit($this->getReference('Fénix'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INVOCAR DRAGONES ROJOS
        $skill = new Skill();
        $skill->setUnit($this->getReference('Dragones Rojos'));
        $skill->setName('Generar '.$skill->getUnit()->getName());
        $skill->setQuantityBonus($skill->getUnit()->getQuantityAuction());
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('Recluta '.$this->container->get('service.controller')->nff($skill->getQuantityBonus()).' <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * HECHIZOS DESTRUCCION
         */

        //BOLA DE FUEGO
        $skill = new Skill();
        $skill->setName('Bola de Fuego');
        $skill->setDamageBonus(-2);
        $skill->setRandom(true);
        $skill->setDescription('<span class="label label-extra">Destruye</span> '.$skill->getDamageBonus().'% de una tropa enemiga al azar por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //TAMBORES DE GUERRA
        $skill = new Skill();
        $skill->setName('Tambores de Guerra');
        $skill->setAttackBonus(3);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> de tus tropas por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //FLECHAS ARDIENTES
        $skill = new Skill();
        $skill->setName('Flechas Ardientes');
        $skill->setAttackBonus(10);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setType($this->getReference('Distancia'));
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y '.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de tus <span class="label label-extra">'.$skill->getType()->getName().'</span> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //FURIA DEMONIACA
        $skill = new Skill();
        $skill->setName('Furia Demoníaca');
        $skill->setAttackBonus(10);
        $skill->setDefenseBonus(-10);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Demonios'));
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y '.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de tus <span class="label label-extra">'.$skill->getFamily()->getName().'</span> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //COMBUSTION
        $skill = new Skill();
        $skill->setName('Combustión');
        $skill->setManaBonus(-1);
        $skill->setDescription($skill->getManaBonus().'% <span class="label label-extra">Maná</span> enemigo actual por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //VOLCANO
        $skill = new Skill();
        $skill->setName('Volcano');
        $skill->setTerrainBonus(-1);
        $skill->setPeopleBonus(-5);
        $skill->setDescription($skill->getTerrainBonus().' <span class="label label-extra">Tierras</span> y '.$skill->getPeopleBonus().'% <span class="label label-extra">Población</span> producida al <i class="fa fa-fw fa-hourglass-half"></i> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //SAQUEAR
        $skill = new Skill();
        $skill->setName('Saquear');
        $skill->setQuestBonus(15);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getQuestBonus().'% por <i class="fa fa-fw fa-magic"></i> de descubrir un nuevo <span class="label label-map">Mapa</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //MURO IGNEO
        $skill = new Skill();
        $skill->setName('Muro Ígneo');
        $skill->setMagicDefenseBonus(1);
        $skill->setArmyDefenseBonus(3);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getMagicDefenseBonus().'% <span class="label label-extra">Defensa Mágica</span> y +'.$skill->getArmyDefenseBonus().'% <span class="label label-extra">Defensa Física</span> por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //PACTO DE SANGRE
        $skill = new Skill();
        $skill->setName('Convocar Demonios'); //para usarlo como artifact tambien
        $skill->setQuantityBonus(270000); //media de demonios
        $skill->setRandom(true);
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Demonios'));
        $skill->setDescription('Invoca aleatoriamente <span class="label label-extra">'.$skill->getFamily()->getName().'</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //INFIERNO
        $skill = new Skill();
        $skill->setName('Inferno');
        $skill->setDefenseBonus(-10);
        $skill->setBattle(true);
        $skill->setFaction($this->getReference('Naturaleza'));
        $skill->setDescription($skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> de los <span class="label label-'.$skill->getFaction()->getClass().'">'.$skill->getFaction()->getName().'</span> enemigos por <i class="fa fa-fw fa-magic"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * ARTEFACTOS
         */

        //BRUJULA MAGICA
        $skill = new Skill();
        $skill->setName('Brújula Mágica');
        $skill->setTerrainBonus(150);
        $skill->setSelf(true);
        $skill->setDescription('Hasta +'.$skill->getTerrainBonus().' <span class="label label-extra">Tierras</span> libres a tu Reino');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CARTA DEL GREMIO DE ASESINOS
        $skill = new Skill();
        $skill->setName('Carta del Gremio de Asesinos');
        $skill->setPeopleBonus(-15);
        $skill->setDescription($skill->getPeopleBonus().'% <span class="label label-extra">Población</span> al Reino enemigo');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //POCION DE MANA
        $skill = new Skill();
        $skill->setName('Poción de Maná');
        $skill->setManaBonus(30);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getManaBonus().'% del <span class="label label-extra">Maná</span> máximo a tu Reino');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CARTA DEL GREMIO DE MAGOS
        $skill = new Skill();
        $skill->setName('Carta del Gremio de Magos');
        $skill->setManaBonus(-15);
        $skill->setDescription($skill->getManaBonus().'% <span class="label label-extra">Maná</span> al Reino enemigo');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //POCION DE AMOR
        $skill = new Skill();
        $skill->setName('Poción de Amor');
        $skill->setPeopleBonus(30);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getPeopleBonus().'% de la <span class="label label-extra">Población</span> máxima a tu Reino');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //BARRIL DE POLVORA
        $skill = new Skill();
        $skill->setName('Barril de Pólvora');
        $skill->setTerrainBonus(-3);
        $skill->setDescription($skill->getTerrainBonus().'% <span class="label label-extra">Edificios</span> al Reino enemigo');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //COFRE DEL TESORO
        $skill = new Skill();
        $skill->setName('Cofre del Tesoro');
        $skill->setGoldBonus(20000000);
        $skill->setSelf(true);
        $skill->setDescription('Hasta +'.$this->container->get('service.controller')->nff($skill->getGoldBonus()).' <span class="label label-extra">Oro</span> a tu Reino');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CARTA DEL GREMIO DE LADRONES
        $skill = new Skill();
        $skill->setName('Carta del Gremio de Ladrones');
        $skill->setGoldBonus(-15);
        $skill->setDescription($skill->getGoldBonus().'% <span class="label label-extra">Oro</span> al Reino enemigo');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //TELA DE ARAÑA
        $skill = new Skill();
        $skill->setName('Tela de Araña');
        $skill->setSpeedBonus(-1);
        $skill->setBattle(true);
        $skill->setDescription($skill->getSpeedBonus().' <span class="label label-extra">Velocidad</span> a las tropas enemigas');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //MANUAL DEL HEROE
        $skill = new Skill();
        $skill->setName('Manual del Héroe');
        $skill->setHeroBonus(3);
        $skill->setRandom(true);
        $skill->setSelf(true);
        $skill->setDescription('Hasta +'.$skill->getHeroBonus().' <span class="label label-extra">Niveles</span> a un <span class="label label-extra">Héroe</span> al azar');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CABEZA DE MEDUSA
        $skill = new Skill();
        $skill->setName('Cabeza de Medusa');
        $skill->setHeroBonus(-3);
        $skill->setRandom(true);
        $skill->setDescription('Hasta '.$skill->getHeroBonus().' <span class="label label-extra">Niveles</span> a un <span class="label label-extra">Héroe</span> enemigo al azar');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CARTA DEL GREMIO DE ESPIAS
        $skill = new Skill();
        $skill->setName('Carta del Gremio de Espías');
        $skill->setSpyBonus(100);
        $skill->setDescription('Obtiene <span class="label label-extra">Información</span> importante del Reino objetivo');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //MUÑECA VOODOO
        $skill = new Skill();
        $skill->setName('Muñeca Voodoo');
        $skill->setTurnsBonus(-25);
        $skill->setDescription('Hasta '.$this->container->get('service.controller')->nff($skill->getTurnsBonus()).' <span class="label label-extra">Turnos</span> al Reino enemigo');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //RELOJ DE ARENA
        $skill = new Skill();
        $skill->setName('Reloj de Arena');
        $skill->setSelf(true);
        $skill->setTurnsBonus(-100);
        $skill->setDescription('Hasta '.$this->container->get('service.controller')->nff($skill->getTurnsBonus()).' <span class="label label-extra">Turnos</span> a los Encantamientos de tu Reino.');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //POCION DE PUREZA
        $skill = new Skill();
        $skill->setName('Poción de Pureza');
        $skill->setRandom(true);
        $skill->setDispellBonus(100);
        $skill->setSelf(true);
        $skill->setDescription('Elimina un <span class="label label-extra">Encantamiento</span> aleatorio de tu Reino');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //POCION DE FUERZA
        $skill = new Skill();
        $skill->setName('Poción de Fuerza');
        $skill->setAttackBonus(30);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> a tus tropas');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //POCION DE VITALIDAD
        $skill = new Skill();
        $skill->setName('Poción de Vitalidad');
        $skill->setDefenseBonus(30);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> a tus tropas');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //POCION DE AGILIDAD
        $skill = new Skill();
        $skill->setName('Poción de Agilidad');
        $skill->setSpeedBonus(1);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getSpeedBonus().' <span class="label label-extra">Velocidad</span> a tus tropas');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ANILLO AVARICIOSO
        $skill = new Skill();
        $skill->setName('Anillo Avaricioso');
        $skill->setGoldBonus(10);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getGoldBonus().'% <span class="label label-extra">Oro</span> a tu Reino al <i class="fa fa-fw fa-hourglass-half"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ANILLO ENCANTADOR
        $skill = new Skill();
        $skill->setName('Anillo Encantador');
        $skill->setPeopleBonus(10);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getPeopleBonus().'% <span class="label label-extra">Población</span> a tu Reino al <i class="fa fa-fw fa-hourglass-half"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ANILLO PODEROSO
        $skill = new Skill();
        $skill->setName('Anillo Poderoso');
        $skill->setManaBonus(10);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getManaBonus().'% <span class="label label-extra">Maná</span> a tu Reino al <i class="fa fa-fw fa-hourglass-half"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ANILLO DURO
        $skill = new Skill();
        $skill->setName('Anillo Duro');
        $skill->setMagicDefenseBonus(10);
        $skill->setArmyDefenseBonus(10);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getArmyDefenseBonus().'% <span class="label label-extra">Defensa Física</span> y +'.$skill->getMagicDefenseBonus().'% <span class="label label-extra">Defensa Mágica</span> a tu Reino');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ANILLO INVOCADOR
        $skill = new Skill();
        $skill->setName('Anillo Invocador');
        $skill->setQuantityBonus(10);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getQuantityBonus().'% <span class="label label-extra">Cantidad</span> de tropas invocadas');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * CONVOCAR
         */

        //CONVOCAR DRAGONES
        $skill = new Skill();
        $skill->setName('Convocar Dragones'); //para usarlo como artifact tambien
        $skill->setQuantityBonus(500000); //media de poder de dragones
        $skill->setRandom(true);
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Dragones'));
        $skill->setDescription('Invoca aleatoriamente <span class="label label-extra">'.$skill->getFamily()->getName().'</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CONVOCAR HUMANOS
        $skill = new Skill();
        $skill->setName('Convocar Humanos'); //para usarlo como artifact tambien
        $skill->setQuantityBonus(140000); //media de poder de humanos
        $skill->setRandom(true);
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Humanos'));
        $skill->setDescription('Invoca aleatoriamente <span class="label label-extra">'.$skill->getFamily()->getName().'</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * HEROES
         */

        //ZAPADOR GOBLIN
        $skill = new Skill();
        $skill->setName('Zapador Goblin');
        $skill->setTerrainBonus(-1);
        $skill->setBattle(true);
        $skill->setDescription($skill->getTerrainBonus().'% <span class="label label-extra">Edificios</span> al Reino enemigo por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CHAMAN
        $skill = new Skill();
        $skill->setName('Chamán');
        $skill->setManaBonus(2);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getManaBonus().'% <span class="label label-extra">Maná</span> a tu Reino al <i class="fa fa-fw fa-hourglass-half"></i> por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //PARCA
        $skill = new Skill();
        $skill->setName('Parca');
        $skill->setPeopleBonus(-1);
        $skill->setBattle(true);
        $skill->setDescription($skill->getPeopleBonus().'% <span class="label label-extra">Población</span> al Reino enemigo por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //LADRONA ELFA
        $skill = new Skill();
        $skill->setName('Ladrona Elfa');
        $skill->setTurnsBonus(-1);
        $skill->setBattle(true);
        $skill->setDescription($skill->getTurnsBonus().' <span class="label label-extra">Turnos</span> al Reino enemigo por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //MERCADER
        $skill = new Skill();
        $skill->setName('Mercader');
        $skill->setGoldBonus(2);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getGoldBonus().'% <span class="label label-extra">Oro</span> a tu Reino al <i class="fa fa-fw fa-hourglass-half"></i> por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ALQUIMISTA
        $skill = new Skill();
        $skill->setName('Alquimista');
        $skill->setManaBonus(-1);
        $skill->setBattle(true);
        $skill->setDescription($skill->getManaBonus().'% <span class="label label-extra">Maná</span> al Reino enemigo por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //LEPRECHAUNT
        $skill = new Skill();
        $skill->setName('Leprechaunt');
        $skill->setGoldBonus(-1);
        $skill->setBattle(true);
        $skill->setDescription($skill->getGoldBonus().'% <span class="label label-extra">Oro</span> al Reino enemigo por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //MAGO NEGRO
        $skill = new Skill();
        $skill->setName('Mago Negro');
        $skill->setPeopleBonus(2);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getPeopleBonus().'% <span class="label label-extra">Población</span> a tu Reino al <i class="fa fa-fw fa-hourglass-half"></i> por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //JINETE SIN CABEZA
        $skill = new Skill();
        $skill->setName('Jinete sin Cabeza');
        $skill->setAttackBonus(3);
        $skill->setDefenseBonus(-1);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('NoMuertos'));
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y '.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> a tus <span class="label label-extra">'.$skill->getFamily()->getName().'</span> por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //DRIADA
        $skill = new Skill();
        $skill->setName('Dríada');
        $skill->setMagicDefenseBonus(1);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getMagicDefenseBonus().'% <span class="label label-extra">Defensa Mágica</span> por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CAMPEON
        $skill = new Skill();
        $skill->setName('Campeón');
        $skill->setArmyDefenseBonus(1);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getArmyDefenseBonus().'% <span class="label label-extra">Defensa Física</span> por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //SUCUBO
        $skill = new Skill();
        $skill->setName('Súcubo');
        $skill->setSummonBonus(1);
        $skill->setSummon(true);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getSummonBonus().'% <span class="label label-extra">Tropas</span> invocadas por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ESPIRITISTA
        $skill = new Skill();
        $skill->setName('Espiritista');
        $skill->setResearchBonus(1);
        $skill->setSelf(true);
        $skill->setDescription('+'.$skill->getResearchBonus().'% bonus <span class="label label-extra">Investigación</span> por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //JINETE DE DRAGONES
        $skill = new Skill();
        $skill->setName('Jinete de Dragones');
        $skill->setAttackBonus(4);
        $skill->setDefenseBonus(-2);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Dragones'));
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y '.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> a tus <span class="label label-extra">'.$skill->getFamily()->getName().'</span> por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //REY DEMONIO
        $skill = new Skill();
        $skill->setName('Rey Demonio');
        $skill->setAttackBonus(6);
        $skill->setDefenseBonus(-4);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Demonios'));
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y '.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> a tus <span class="label label-extra">'.$skill->getFamily()->getName().'</span> por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ELEMENTALISTA
        $skill = new Skill();
        $skill->setName('Elementalista');
        $skill->setAttackBonus(-2);
        $skill->setDefenseBonus(4);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Elementales'));
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y +'.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> a tus <span class="label label-extra">'.$skill->getFamily()->getName().'</span> por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CRUZADO
        $skill = new Skill();
        $skill->setName('Cruzado');
        $skill->setAttackBonus(1);
        $skill->setDefenseBonus(1);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Humanos'));
        $skill->setDescription('+'.$skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y +'.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> a tus <span class="label label-extra">'.$skill->getFamily()->getName().'</span> por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //SERAFIN
        $skill = new Skill();
        $skill->setName('Serafín');
        $skill->setAttackBonus(-2);
        $skill->setDefenseBonus(4);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Celestiales'));
        $skill->setDescription($skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y +'.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> a tus <span class="label label-extra">'.$skill->getFamily()->getName().'</span> por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //CAZADOR
        $skill = new Skill();
        $skill->setName('Cazador');
        $skill->setAttackBonus(-1);
        $skill->setDefenseBonus(3);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setFamily($this->getReference('Bestias'));
        $skill->setDescription($skill->getAttackBonus().'% <span class="label label-extra">Ataque</span> y +'.$skill->getDefenseBonus().'% <span class="label label-extra">Defensa</span> a tus <span class="label label-extra">'.$skill->getFamily()->getName().'</span> por <i class="fa fa-fw fa-star"></i>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //NIGROMANTE
        $skill = new Skill();
        $skill->setName('Nigromante');
        $skill->setResurrectionBonus(2);
        $skill->setBattle(true);
        $skill->setSelf(true);
        $skill->setUnit($this->getReference('Esqueletos'));
        $skill->setDescription('+'.$skill->getResurrectionBonus().'% de tropas por <i class="fa fa-fw fa-star"></i> resucitan como <span class="label label-'.$skill->getUnit()->getFaction()->getClass().'"><a href="'.$this->container->get('router')->generate('archmage_game_home_help').'#'.$this->container->get('service.controller')->toSlug($skill->getUnit()->getName()).'" class="link">'.$skill->getUnit()->getName().'</a></span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * APOCALIPSIS
         */

        //APOCALIPSIS
        $skill = new Skill();
        $skill->setName('Apocalipsis');
        $skill->setWin(true);
        $skill->setSelf(true);
        $skill->setDescription('Si lo mantienes hasta que se gaste, <span class="label label-extra">Ganas el Juego</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        /*
         * RUNAS
         */

        //TELEGRAM
        $skill = new Skill();
        $skill->setName('Runa de Telegram');
        $skill->setSpyBonus(100);
        $skill->setDescription('Genera un código para recibir avisos por <span class="label label-extra">Telegram</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ORO
        $skill = new Skill();
        $skill->setName('Runa de Oro');
        $skill->setGoldBonus(5000000);
        $skill->setDescription('Genera '.$this->container->get('service.controller')->nff($skill->getGoldBonus()).' <span class="label label-extra">Oro</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //POBLACION
        $skill = new Skill();
        $skill->setName('Runa de Población');
        $skill->setPeopleBonus(1000000);
        $skill->setDescription('Genera '.$this->container->get('service.controller')->nff($skill->getPeopleBonus()).' <span class="label label-extra">Población</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //MANA
        $skill = new Skill();
        $skill->setName('Runa de Maná');
        $skill->setManaBonus(1000000);
        $skill->setDescription('Genera '.$this->container->get('service.controller')->nff($skill->getManaBonus()).' <span class="label label-extra">Maná</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //TIERRAS
        $skill = new Skill();
        $skill->setName('Runa de Tierras');
        $skill->setTerrainBonus(200);
        $skill->setDescription('Genera '.$this->container->get('service.controller')->nff($skill->getTerrainBonus()).' <span class="label label-extra">Tierras</span>');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //RECETAS
        $skill = new Skill();
        $skill->setName('Runa de Recetas');
        $skill->setRecipeBonus(1);
        $skill->setDescription('Genera '.$this->container->get('service.controller')->nff($skill->getRecipeBonus()).' <span class="label label-recipe">Receta</span> al azar');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //ARTEFACTOS
        $skill = new Skill();
        $skill->setName('Runa de Artefactos');
        $skill->setArtifactBonus(1);
        $skill->setDescription('Genera '.$this->container->get('service.controller')->nff($skill->getArtifactBonus()).' <span class="label label-extra">Artefacto</span> al azar');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //MAPAS
        $skill = new Skill();
        $skill->setName('Runa de Mapas');
        $skill->setQuestBonus(1);
        $skill->setDescription('Genera '.$this->container->get('service.controller')->nff($skill->getQuestBonus()).' <span class="label label-quest">Mapa</span> al azar');
        $this->setReference($skill->getName(), $skill);
        $manager->persist($skill);

        //FLUSH
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