<?php
/********** TaskPHP ***********
 * -------- ElenorFreamwork -------
 * #/Code by Amin.sh - May 2022/#
 *****************************/

//Composer Packages
require_once ROOT . DS . 'vendor' . DS . 'autoload.php';

//Core Methods
require_once APP . 'Core' . DS . 'Functions.php';

//Libraries
require_once APP . 'Libraries' . DS . 'jdf.php';

//Config
require_once APP . 'Config' . DS . 'Config.php';

//Middleware
require_once APP . 'Middleware' . DS . 'Middleware.php';

//Routing
$router = new \Klein\Klein();
require_once APP . 'Config' . DS . 'Routing.php';
