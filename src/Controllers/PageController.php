<?php
namespace Controllers;

use Renderer;

class PageController extends Controller{

    public function index(){
        echo  Renderer::render('home.php');
    }

    public function notFound(){
        echo Renderer::render('404.php');
    }
    
}
?>