<?php
require_once '../autoload.php';

use Models\City;

assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_QUIET_EVAL, 1);
Autoloader::register();
function my_assert_handler($file, $line, $code)
{
    echo "<hr>Échec de l'assertion :
        File '$file'<br />
        Line '$line'<br />
        Code '$code'<br /><hr />";
}

// Configuration de la méthode de callback
assert_options(ASSERT_CALLBACK, 'my_assert_handler');


$City = new City();
$City->setName("Lyon");
assert("$City->getName() == 'Lyon'");

//



?>
