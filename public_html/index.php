<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public_html/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/public_html/css/global.css">
    <script src="https://kit.fontawesome.com/2115a683fb.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require_once '../src/autoload.php';

    Autoloader::register();
    use Models\Facades\Auth;
    use Models\Permission;

    $router = new Router();
    $router->setNamespace('\Controllers');

    $router->get('/', 'PageController@index');

    //Auth
    $router->group('/auth', function() use ($router){
        $router->get('/signin', 'AuthController@signIn');
        $router->post('/signin', 'AuthController@verifySignIn');
        $router->get('/register', 'AuthController@register');
        $router->post('/register', 'AuthController@verifyRegister');
    });

    $router->group('/city', function () use ($router) {
        $router->get('/show/{id}', 'CityController@show');
        $router->get('/add/{countryCode}', 'CityController@createCityView');
        $router->post('/add', 'CityController@create');
        $router->post('/update/{id}', 'CityController@update');
        $router->get('/delete/{id}', 'CityController@delete');
        $router->post('/search', 'CityController@search');
    });

    $router->group('/country', function () use ($router) {
        $router->get('/', 'CountryController@showAll');
        $router->get('/show/{id}', 'CountryController@show');
        $router->get('/add', 'CountryController@createCountryView');
        $router->post('/add', 'CountryController@create');
        $router->post('/update/{id}', 'CountryController@update');
        $router->get('/delete/{id}', 'CountryController@delete');
    });
    $router->get('/continent/{cont}', 'CountryController@findFromContinent');


    $router->group('/admin/panel', function() use ($router){
        $router->get('/', 'AdminController@index');
    });

    
    $router->set404('PageController@notFound');



    //MiddleWares
    $router->before('GET|POST', '/admin/panel/.*', function() {
        if (!Auth::has(Permission::CANMANAGEUSERS)) {
            header('location: /public_html/');
            exit();
        }
    });

    $router->run();
    ?>
</body>

</html>