<?php
/********** TaskPHP ***********
-------- ElenorFreamwork -------
#/Code by Amin.sh - May 2022/#
 *****************************/

function isSession($Name)
{
    !isset($_SESSION) AND session_start();
    return isset($_SESSION[$Name]) ? true : false;
}
