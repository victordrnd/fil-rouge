<?php

namespace Controllers;

use Renderer;
use Controllers\Controller;


class AdminController extends Controller
{

    public function index(){
        echo Renderer::render('auth/panel/index');
    }

    

}
