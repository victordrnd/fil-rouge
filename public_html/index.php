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

    use Controllers\CityController;
    use Controllers\CountryController;
    use Controllers\PageController;

    require_once '../src/autoload.php';

    Autoloader::register();

    $router = new Router();

    $router->get('/', function () {
        PageController::index();
    });

    $router->mount('/city', function () use ($router) {

        $router->get('/show/{id}', function ($id) {
            CityController::show($id);
        });

        $router->post('/update/{id}', function ($id) {
            CityController::update($id);
        });

        $router->get('/delete/{id}', function ($id) {
            CityController::delete($id);
        });

        $router->post('/search', function () {
            CityController::search($_POST['keyword']);
        });
    });

    $router->mount('/country', function () use ($router) {
        $router->get('/show/{id}', function ($id) {
            CountryController::show($id);
        });

        $router->post('/update/{id}', function($id){
            CountryController::update($id);
        });

        $router->get('/delete/{id}', function($id){
            CountryController::delete($id);
        });



    });

    $router->get('/continent/{cont}', function ($continent) {
        CountryController::findFromContinent($continent);
    });


    $router->set404(function () {
        echo "la page page n'a pas été trouvé";
    });

    $router->run();
    ?>
</body>

</html>