<?php

namespace Archmage\GameBundle\Twig;

class TwigExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('format', array($this, 'format')),
        );
    }

    public function format($number, $decimals = 0, $decPoint = ',', $thousandsSep = '.')
    {
        $price = number_format((float)$number, $decimals, $decPoint, $thousandsSep);
        return $price;
    }

    public function getName()
    {
        return 'twig_extension';
    }
}