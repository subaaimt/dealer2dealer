<?php

class CityController {

    public function __construct($args) {

    }

    function actionIndex() {
        $areaobj = new Area();
        return array('layout' => 'ajax', 'localities' => $areaobj->getAreasByCity($_POST['cityid']));
    }

}

