<?php
/********** TaskPHP ***********
 * -------- ElenorFreamwork -------
 * #/Code by Amin.sh - May 2022/#
 *****************************/

class Opration
{

    public function autoLoad($Method, $ClassName, $Data = array(), $Extensions = 'php')
    {
        //for Pass Data
        extract($Data);
        $Path = APP . $Method . DS . $ClassName . DOT . $Extensions;
        if (file_exists($Path)) {
            require_once $Path;
        } else {
            die("The file {$ClassName}.php could not be found!");
        }
    }

    public function loadView($FileName, $Data = array(), $Extensions = 'php')
    {
        //for Pass Data
        extract($Data);
        $Method = 'Resources' . DS . 'Views';
        $Path = APP . $Method . DS . $FileName . DOT . $Extensions;
        if (file_exists($Path)) {
            require_once $Path;
        } else {
            die("The file {$FileName}.php could not be found!");
        }
    }
}

$Opration = new Opration();
