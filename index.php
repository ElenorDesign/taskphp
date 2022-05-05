<?php
/********** TaskPHP ***********
-------- ElenorFreamwork -------
#/Code by Amin.sh - May 2022/#
 *****************************/

//Return '/'
define('DS', DIRECTORY_SEPARATOR);
//Return '.'
define('DOT', '.');
//Return 'ROOT Directory'
define('ROOT', dirname(__FILE__));
//Return 'app Directory'
define('APP', ROOT . DS . 'app' . DS);

// include Core Required
require_once APP . 'Core' . DS .'Required.php';

// use Core Opration
useCore('Opration');

// Run Routing
$router->dispatch();