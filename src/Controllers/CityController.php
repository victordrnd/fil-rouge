<?php
namespace Controllers;

use Models\City;
use Renderer;

class CityController{

    public static function show($id){
        $city = City::find($id);
        //return $city;
        echo Renderer::render('city.php', compact("city"));
    }

    public static function showFromContinent($continent){
        $cities = City::findFromContinent($continent);
        echo Renderer::render('cities.php', compact("cities"));
    }

    public static function delete($id){

        //Recupérer la ville avec find

        $ville = ville::find($id);

       


        //Supprimer la ville

        $ville->remove(); 


        //Rediriger vers les pays du continent

         header('location: /public_html/');

    }


}
?>