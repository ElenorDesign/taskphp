<?php
/********** TaskPHP ***********
 * -------- ElenorFreamwork -------
 * #/Code by Amin.sh - May 2022/#
 *****************************/

//Get BaseUrl path
function baseUrl()
{
    $root = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    return $root;
}

function POST_DATA()
{
    $POST = array();
    foreach ($_POST as $KEY => $DATA) {
        $POST[$KEY] = htmlentities($DATA);
    }
    return $POST;
}

//Set empty to NULL
function is($data)
{
    if (!empty($data)) {
        return $data;
    } else {
        return NULL;
    }
}

//debug function
function dd($data, $type = 0)
{
    echo '<pre>';
    if ($type == 1) {
        die(print_r($data));
    } else {
        die(var_dump($data));
    }
    echo '</pre>';
}

//Validation Required (KEY)
function required($items)
{
    $keys = array();
    $result['keyError'] = null;
    $result['status'] = true;
    foreach ($items as $key => $item) {
        if (empty($item)) {
            $result['status'] = false;
            $result['keyError'] = $key;
        } else {
            $keys[$key] = $item;
        }
    }
    $result['keys'] = $keys;
    return $result;
}


function orderNumberGeneretor()
{
    $randNum = rand(10000, 99999);
    return time() . $randNum;
}

function Rial2Toman($Price)
{
    return $Price / 10;
}

function Extend($FileName, $Data = array(), $Extensions = 'php', $Method = 'Resources' . DS . 'Views')
{
    //for Pass Data
    extract($Data);
    $Path = APP . $Method . DS . $FileName . DOT . $Extensions;
    if (file_exists($Path)) {
        require_once $Path;
    } else {
        die("The file {$Path}.php could not be found!");
    }
}

function useController($Controller, $Method = 'Controllers')
{
    $Extensions = 'php';
    $isIndex = explode('@', $Controller);
    isset($isIndex[1]) ? $Index = $isIndex[1] : $Index = 'index';
    $Controller = $isIndex[0];
    $Path = APP . $Method . DS . $Controller . DOT . $Extensions;
    if (file_exists($Path)) {
        require_once $Path;
        $CL_Main->{$Index}();
    } else {
        die("The file {$Controller}.php could not be found in {$Path}");
    }
}

function useCore($Core, $Method = 'Core')
{
    $Extensions = 'php';
    $Path = APP . $Method . DS . $Core . DOT . $Extensions;
    if (file_exists($Path)) {
        require_once $Path;
    } else {
        die("The file {$Core}.php could not be found in {$Path}");
    }
}