<?php
namespace Controllers;

use Models\City;
use Renderer;

class CityController{

    public static function show($id){
        $city = City::find($id);
        //return $city;
        return Renderer::render('city.php', compact("city"));
    }

    
}
?>