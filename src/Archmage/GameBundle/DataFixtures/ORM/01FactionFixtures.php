<?php

namespace Archmage\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Archmage\GameBundle\Entity\Faction;

class FactionFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $faction = new Faction();
        $faction->setName('Caos');
        $faction->setImage('bundles/archmagegame/images/faction/doom.png');
        $faction->setDescription('Sedienta de gloria y sangre, esta facción masacra al adversario con destructivos hechizos y fuertes unidades, a veces sacrificando defensa en pos de más fuerza.');
        $faction->setClass('danger');
        $faction->setSlogan('Sangre y Fuego');
        $faction->setLore('Bárbaros, locos, y extremadamente peligrosos.');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $faction = new Faction();
        $faction->setName('Fantasmal');
        $faction->setImage('bundles/archmagegame/images/faction/ghost.png');
        $faction->setDescription('Siempre buscando adquirir mayor conocimiento de la magia, esta facción dependerá de sus trucos y habilidades innatas para tornar la situación en su favor.');
        $faction->setClass('info');
        $faction->setSlogan('Mente y Espíritu');
        $faction->setLore('Nunca te fíes de un Mago Azul.');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $faction = new Faction();
        $faction->setName('Naturaleza');
        $faction->setImage('bundles/archmagegame/images/faction/nature.png');
        $faction->setDescription('En comunión con bosques y criaturas que lo pueblan, esta facción tendrá el favor de la madre naturaleza y de sus creaciones, aunque puede ser traicionera.');
        $faction->setClass('success');
        $faction->setSlogan('Roca y Tierra');
        $faction->setLore('La naturaleza puede ser tan hermosa como despiadada.');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $faction = new Faction();
        $faction->setName('Oscuridad');
        $faction->setImage('bundles/archmagegame/images/faction/darkness.png');
        $faction->setDescription('Muy cercana a la noche y las criaturas que abraza, esta facción entiende e incluso saca partido a la muerte, convirtiéndola en una gran aliada.');
        $faction->setClass('warning');
        $faction->setSlogan('Polvo y Hueso');
        $faction->setLore('A veces me pregunto qué hay después de la muerte. Creo que más muerte.');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $faction = new Faction();
        $faction->setName('Sagrado');
        $faction->setImage('bundles/archmagegame/images/faction/holy.png');
        $faction->setDescription('Recta y justa, esta facción obtiene el favor de los cielos y sus seres, otorgándole escudo y defensa sin igual, siendo capaz de aguantar oleadas de enemigos sin vacilar.');
        $faction->setClass('primary');
        $faction->setSlogan('Luz y Gloria');
        $faction->setLore('El brillo cegador de mi pulido escudo será lo último que veas antes de morir.');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        $faction = new Faction();
        $faction->setName('Neutral');
        $faction->setImage('bundles/archmagegame/images/faction/neutral.png');
        $faction->setDescription('Alejada del resto, los neutrales no participan en esta contienda milenaria por el dominio de estas tierras, aunque ellos crearon los Artefactos y el Apocalipsis.');
        $faction->setClass('default');
        $faction->setSlogan('Paz y Armonía');
        $faction->setLore('El fin tiene que llegar, tarde o temprano.');
        $this->addReference($faction->getName(), $faction);
        $manager->persist($faction);

        //SELFREFERENCING
        $this->getReference('Caos')->setOpposite($this->getReference('Naturaleza'));
        $this->getReference('Naturaleza')->setOpposite($this->getReference('Sagrado'));
        $this->getReference('Sagrado')->setOpposite($this->getReference('Oscuridad'));
        $this->getReference('Oscuridad')->setOpposite($this->getReference('Fantasmal'));
        $this->getReference('Fantasmal')->setOpposite($this->getReference('Caos'));
        $this->getReference('Neutral')->setOpposite($this->getReference('Neutral'));

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}