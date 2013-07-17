<?php

include("includes/config.php");
include("includes/functions.php");
include("lib/Db.class.php");

//default Controller and method
$query = isset($_GET['q']) ? $_GET['q'] : 'site/index';
$keyval_pair = array();
//Split Query
$queryparam = explode('/', $query);

//Search in Seo Url
if (!file_exists('controller/' . ucfirst($queryparam[0]) . 'Controller.php')) {
    //Seo Code
}

//redirect if Controller  not found
if (!file_exists('controller/' . ucfirst($queryparam[0]) . 'Controller.php')) {
    redirect('site/notfound');
}

//Router Code to extract Controller Class, method and arguments
$mastercntrl = ucfirst($queryparam[0]) . 'Controller';


$reflection = new ReflectionClass($mastercntrl);

$invokemodelfunc =  ucfirst(isset($queryparam[1]) ? $queryparam[1] : 'Index');
$mastercntrlobj = $reflection->newInstanceArgs(array(strtolower($invokemodelfunc)));

$invokemodelfunc = 'action'.$invokemodelfunc;
if (count($queryparam) > 2) {
    for ($key = 2; $key <= (count($queryparam) - 2); $key+=2) {
        $key_ = $queryparam[$key];
        $val_ = $queryparam[$key + 1];
        $keyval_pair[$key_] = $val_;
    }
}

//Redirect if Controller method not found
$method_exist = (int) method_exists($mastercntrlobj, $invokemodelfunc);
if (!$method_exist) {
    redirect('site/notfound');
}

//Invoke Controller method 
$arguments = call_user_func(array($mastercntrlobj, $invokemodelfunc), $keyval_pair);

if (is_array($arguments)) {
    extract($arguments);
}

$viewfile = isset($queryparam[1]) ? $queryparam[1] : 'index';
//Prepare view file path
if (isset($view))
    $contentfile = 'views/' . strtolower($queryparam[0]) . '/' . $view . '.php';
else
    $contentfile = 'views/' . strtolower($queryparam[0]) . '/' . $viewfile . '.php';


if (file_exists($contentfile)) {

    ob_start();
    ob_implicit_flush(false);
    require($contentfile);

//Convert view data to string
    $viewcontent = ob_get_clean();

//Check for ajax call
    if (isset($layout) && $layout == 'ajax')
        echo $viewcontent;
    else
        include "views/layout/" . (isset($layout) ? $layout : 'layout') . ".php";
}else {
    die('ss');
}