<?php

class AreaController {

    public function __construct($args) {
        
    }

    function actionAddArea() {
        $areas = new Area();
        if (!empty($_POST)) {
            $areas->addArea(array('localityName' => $_POST['title'], 'cityId' => $_POST['city'], 'status' => $_POST['status']));
            die;
            setmessage('Area has been successfully add');
            redirect('area/manage');
        }
        $city = new City;
        return array('view' => 'areaform', 'title' => 'Add Area', 'cities' => $city->getCities());
    }

    function actionApprove() {
        $areas = new Area;
        include 'component/Pagination.php';
        $page = isset($arg['page']) ? $arg['page'] : 1;
        $limit = 10;

        $pagination = pagination(BASE_URL . 'area/manage', $page, $areas->AreaCount(0), $limit);
        return array('view' => 'manage', 'areas' => $areas->fetchAreas($pagination['start'], $limit,0), 'pagination' => $pagination['pagination']);
    }

    function actionManage($arg) {
        $areas = new Area();
        if (isset($arg['edit'])) {
            if (!empty($_POST)) {
                $areas->updateArea(array('localityName' => $_POST['title'],'cityId' => $_POST['city'], 'status' => $_POST['status']), 'id=' . $_POST['area_id']);

                setmessage('Area has been successfully updated');
                redirect('area/manage/edit/' . $_POST['area_id']);
            }
            $area = $areas->fetchAreadata($arg['edit']);
            $city = new City;

            return array('view' => 'areaform', 'area' => $area, 'cities' => $city->getCities(), 'title' => 'Manage area');
        } else if (isset($arg['delete'])) {
            $areas->deleteArea($arg['delete']);
            setmessage('Area has been successfully deleted');
            redirect('area/manage');
        } else {
            include 'component/Pagination.php';
            $page = isset($arg['page']) ? $arg['page'] : 1;
            $limit = 10;

            $pagination = pagination(BASE_URL . 'area/manage', $page, $areas->AreaCount(), $limit);
            return array('areas' => $areas->fetchAreas($pagination['start'], $limit), 'pagination' => $pagination['pagination']);
        }
    }

}

