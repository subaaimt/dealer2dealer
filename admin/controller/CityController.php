<?php

class CityController {

    public function __construct($args) {
        
    }

    function actionIndex() {
        $areaobj = new Area();
        return array('layout' => 'ajax', 'localities' => $areaobj->getAreasByCity($_POST['cityid']));
    }

    function actionAddCity() {
        $cities = new City();
        if (!empty($_POST)) {
            $cities->addCity(array('city_name' => $_POST['title']));
            setmessage('City has been successfully add');
            redirect('city/manage');
        }
        return array('view' => 'cityform', 'title' => 'Add City');
    }

    function actionManage($arg) {
        $cities = new City();
        if (isset($arg['edit'])) {
            if (!empty($_POST)) {
                $cities->updateCity(array('city_name' => $_POST['title']), 'id=' . $_POST['city_id']);

                setmessage('City has been successfully updated');
                redirect('city/manage/edit/' . $_POST['city_id']);
            }
            $city = $cities->fetchCitydata($arg['edit']);
            return array('view' => 'cityform', 'city' => $city, 'title' => 'Manage city');
        } else if (isset($arg['delete'])) {
            $cities->deleteCity($arg['delete']);
            setmessage('City has been successfully deleted');
            redirect('city/manage');
        } else {
            include 'component/Pagination.php';
            $page = isset($arg['page']) ? $arg['page'] : 1;
            $limit = 10;
            $pagination = pagination(BASE_URL . 'city/manage', $page, $cities->CityCount(), $limit);
            return array('cities' => $cities->fetchCities($pagination['start'], $limit), 'pagination' => $pagination['pagination']);
        }
    }

}

