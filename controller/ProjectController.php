<?php

class ProjectController {

    public function __construct($args) {
        
    }

    function actionIndex() {
        
    }

    function actionAdd() {
        $propertyobj = new Property();
        $cityobj = new City;
        $cities = $cityobj->getCities();

        $categoryobj = new PropertyCategory;
        $categories = $categoryobj->getCategories();
        $propertytypeyobj = new PropertyType;
        $propertytypes = $propertytypeyobj->getPropertyTypes();



        return array('title' => 'Dashboard', 'cities' => $cities,
            'layout' => 'dealerlayout', 'categories' => $categories,
            'projecttypes' => $propertytypes,
            'floors' => $propertyobj->floors(),
            'rooms' => $propertyobj->rooms());
    }

    function actionEdit() {
        $areaobj = new Area();
        return array('layout' => 'ajax', 'localities' => $areaobj->getAreasByCity($_POST['cityid']));
    }

}

