<?php
include_once('resize.class.php');

try {
    $obj = new Resize("Chrysanthemum.jpg");
    $obj->setNewImage("Chrysanthemum1.jpg");
    $obj->setNewSize(500, 500);
    $obj->make();
}
catch (Exception $e) {
    die($e);
}
?>