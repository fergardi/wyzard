<?php

namespace Archmage\GameBundle\Twig;

class TwigExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('nf', array($this, 'nf')),
        );
    }

    public function nf($number, $decimals = 0, $decPoint = ',', $thousandsSep = '.')
    {
        $price = number_format((float)$number, $decimals, $decPoint, $thousandsSep);
        return $price;
    }

    public function getName()
    {
        return 'twig_extension';
    }
}