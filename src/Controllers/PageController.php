<?php
namespace Controllers;

use Renderer;

class PageController{

    public static function index(){
        echo  Renderer::render('home.php');
    }

    
}
?>