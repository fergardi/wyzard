<?php

namespace Archmage\GameBundle\Twig;

class TwigExtension extends \Twig_Extension
{
    public function getFilters() {
        return array(
            new \Twig_SimpleFilter('nf', array($this, 'nf')),
            new \Twig_SimpleFilter('nff', array($this, 'nff')),
            new \Twig_SimpleFilter('slug', array($this, 'slug')),
        );
    }

    /**
     * Number Format, also in Controller/ServiceController.php
     */
    public function nf($number, $decimals = 0, $decPoint = ',', $thousandsSep = '.') {
        return
            ($number >= 1000 && $number % 100 == 0)?
                number_format((float)$number / 1000, 1, $decPoint, $thousandsSep).'K':
                number_format($number, $decimals, $decPoint, $thousandsSep);
    }

    /**
     * Number Format for Fixtures and Ranking
     */
    public function nff($number, $decimals = 0, $decPoint = ',', $thousandsSep = '.') {
        $price = number_format((float)$number, $decimals, $decPoint, $thousandsSep);
        return $price;
    }

    public function slug($string) {
        $search = explode(",","Á,É,Í,Ó,Ú,á,é,í,ó,ú, ");
        $replace = explode(",","a,e,i,o,u,a,e,i,o,u,-");
        $url = strtolower(str_replace($search, $replace, $string));
        return $url;
    }

    public function getName() {
        return 'twig_extension';
    }
}