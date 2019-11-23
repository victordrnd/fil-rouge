<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php

    use Controllers\CityController;
    use Controllers\CountryController;
    use Controllers\PageController;
    require_once '../src/autoload.php';
    Autoloader::register();
    $router = new Router();

    $router->set404(function(){
        echo "la page page n'a pas été trouvé";
    });

    $router->get('/' , function(){
        echo PageController::index();
    });

    $router->get('/city/show/{id}', function($id){
        CityController::show($id);
    });

    $router->get('/city/delete/{id}', function($id){
        CityController::delete($id);
    });

    $router->get('/country/show/{id}', function($id){
        CountryController::show($id);
    });
    
    $router->get('/country/delete/{id}' , function($id){
        CountryController::delete($id);
    });

    $router->get('/continent/{cont}', function($continent){
        CountryController::findFromContinent($continent);
    });


    
    $router->run();
    ?>
</body>

</html>