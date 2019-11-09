<?php
namespace Controllers;

use Models\Country;
use Models\City;
use Models\Language;
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


    public static function delete($id){
        //Recupérer le pays avec find

        $pays = Country::find($id);
        //Supprimer toutes les villes 
        

        // $villes = City::findFromCountry($pays);
        // print("<pre>".print_r($villes,true)."</pre>");
        
        // foreach ($villes as $ville) {
        //     $ville->remove();l
        // }
        //var_dump($ville);
        // //Supprimer tout les languages du pays
        // $langues = Language::findLanguagesFromPays($pays->Code);
        // foreach ($langues as  $langue) {
        //     $langue->remove();
        // }
        // //Supprimer le pays

        $pays->remove(); 


        //Rediriger vers les pays du continent

       header('location: /public_html/');
    }

}
?>