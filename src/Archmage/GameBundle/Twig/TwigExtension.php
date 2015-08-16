<?php

namespace Archmage\GameBundle\Twig;

class TwigExtension extends \Twig_Extension
{
    public function getFilters() {
        return array(
            new \Twig_SimpleFilter('nf', array($this, 'nf')),
            new \Twig_SimpleFilter('slug', array($this, 'slug')),
        );
    }

    public function nf($number, $decimals = 0, $decPoint = ',', $thousandsSep = '.') {
        $price = number_format((float)$number, $decimals, $decPoint, $thousandsSep);
        return $price;
    }

    public function slug($url) {
        return str_replace(' ','-',strtolower($url));

    }

    public function getName() {
        return 'twig_extension';
    }
}