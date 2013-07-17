<?php

$css = array();
$js = array();

function redirect($redirect) {
    header("Location:" . BASE_URL . $redirect);
    die;
}

function addJs($jsarray = array()) {
    global $js;
    $js = array_merge($js, $jsarray);
}

function addCss($cssarray = array()) {
    global $css;
    $css = array_merge($css, $cssarray);
}

function getJs($jsarray = array()) {
    global $js;
    foreach ($js as $jsfile) {
        echo '<script type="text/javascript" src="' . BASE_URL . $jsfile . '"></script>' . "\n";
    }
}

function getCss() {
    global $css;

    foreach ($css as $cssfile) {
        echo '<link href="' . BASE_URL . $cssfile . '" rel="stylesheet" />' . "\n";
    }
}

function __autoload($class_name) {
    if (file_exists(DIRECTORY_ROOT . '/controller/' . $class_name . '.php'))
        include(DIRECTORY_ROOT . '/controller/' . $class_name . '.php');
    else if (file_exists(DIRECTORY_ROOT . '/model/' . $class_name . '.php'))
        include(DIRECTORY_ROOT . '/model/' . $class_name . '.php');
     else if (file_exists(DIRECTORY_ROOT . '/component/' . $class_name . '.php'))
        include(DIRECTORY_ROOT . '/component/' . $class_name . '.php');
}

function remove_null_values($oldvalues) {
    $newarray = array();
    foreach ($oldvalues as $val) {
        if (empty($val)) {
            continue;
        }
        $newarray[] = $val;
    }
    return $newarray;
}

function getmessage($type = 'success') {
    $message = isset($_SESSION['message']) ? ($_SESSION['message']) : '';
    unset($_SESSION['message']);
    return $message;
}

function setmessage($msg) {
    $_SESSION['message'] = $msg;
}

function filerender($contentfile, $data) {
    if (is_array($data)) {
        extract($data);
    }

    ob_start();
    ob_implicit_flush(false);
    require($contentfile);
    return ob_get_clean();
}

function getrequesturi() {
    $requeturi = str_replace('?', '', strstr($_SERVER['REQUEST_URI'], '?'));

    $reqvalarry = explode('&', $requeturi);

    if ($reqvalarry[0] != '') {
        $request_keyval = array();
        foreach ($reqvalarry as $val) {
            $kv = explode('=', $val);
            $request_keyval[$kv[0]] = $kv[1];
        }


        return $request_keyval;
    }
}

