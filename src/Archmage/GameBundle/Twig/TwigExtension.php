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

    public function slug($string) {
        setlocale(LC_CTYPE, "en_US.utf8");
        return iconv("utf-8", "ascii//TRANSLIT", str_replace(' ','-',strtolower($string)));

    }

    public function getName() {
        return 'twig_extension';
    }
}