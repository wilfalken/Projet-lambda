<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lambda\LambdaBundle\Twig;

use Symfony\Component\Intl\Intl;

class CountryExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('countryName', array($this, 'countryName')),
        );
    }

    public function countryName($countryCode){
        return Intl::getRegionBundle()->getCountryName($countryCode);
    }

    public function getName()
    {
        return 'country_extension';
    }
}
?>