<?php
/********** TaskPHP ***********
-------- ElenorFreamwork -------
#/Code by Amin.sh - May 2022/#
 *****************************/

$router->respond('GET', '/', function () {
    useController('Main@index');
});

$router->respond('GET', '/payment', function () {
    useController('Main@payment');
});

$router->respond(['POST','GET'], '/verify', function () {
    //Middleware
    isSession('OrderNum') ? useController('Main@verify') : useController('Main@verifyError');
});