<?php

class Imageresize {

    function __construct() {
        
    }

    function resize($path, $src, $w, $h) {
        include_once('component/resize/resize.class.php');
        try {
            $obj = new Resize(MEDIA_PATH . $path . DIRECTORY_SEPARATOR . $src);
            $obj->setNewImage(MEDIA_PATH . $path . DIRECTORY_SEPARATOR . 'resized' . DIRECTORY_SEPARATOR . $w . 'x' . $h . '-' . $src);
            $obj->setNewSize($w, $h);
            $obj->make();
        } catch (Exception $e) {
            die($e);
        }
    }

}
