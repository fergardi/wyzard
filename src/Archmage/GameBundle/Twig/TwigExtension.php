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
        if ((float)$number >= 1000) {
            if ((float)$number % 1000 == 0) {
                return number_format((float)$number/1000, 0, $decPoint, $thousandsSep).'K';
            }
            return number_format((float)$number/1000, 1, $decPoint, $thousandsSep).'K';
        }
        return number_format((float)$number, $decimals, $decPoint, $thousandsSep);
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