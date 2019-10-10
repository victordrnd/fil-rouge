<?php
namespace Controllers;

use Models\Country;
use Models\City;
use Renderer;

class CountryController{

    public static function show($id){
        $country = Country::find($id);
        $capital = City::find($country->Capital);
        $cities = City::findFromCountry($country);
        echo Renderer::render('country.php', compact('country', 'cities', 'capital'));
    }

    public static function findFromContinent($continent){
        $countries = Country::findFromContinent($continent);
        $capital = [];
        foreach($countries as $country){
            $capital[] = City::find($country->Capital);
        }
        $nbrville = Country::count();
        echo Renderer::render('countries.php', compact("countries", "nbrville", "capital"));
    }


}
?>