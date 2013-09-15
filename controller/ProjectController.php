<?php

class ProjectController {

    public function __construct($args) {
        
    }

    function actionIndex() {
        
    }

    function actionAdd() {

        if (!empty($_POST)) {
            $filename = mt_rand() . '__' . clean($_FILES['projectimage']['name']);
            $data = array(
                'name' => $_POST['projecttitle'],
                'type' => $_POST['projecttype'],
                'projectName' => $_POST['projectcomptitle'],
                'bedroom' => $_POST['bedrooms'],
                'bathroom' => $_POST['bathrooms'],
                'coveredArea' => $_POST['coveredarea'],
                'coveredAreaUnit' => $_POST['coveredAreaUnit'],
                'price' => ($_POST['projectprice']),
                'floorNo' => ($_POST['floors']),
                'totalFloor' => ($_POST['totalfloors']),
                'displayPrice' => ($_POST['displayPriceUsers']),
                'description' => $_POST['projectdescription'],
                'location' => $_POST['projectlocation'],
                'city' => $_POST['projectcity'],
                'area' => $_POST['projectarea'],
                'user_id' => $_SESSION['userdata']['id'],
                'possession' => $_POST['possessionstatus'],
                'mediapath' => $filename,
                'created' => time(),
                'modified' => time()
            );
            $projectyobj = new Project;
            $projectyobj->addProject($data);
            move_uploaded_file($_FILES['projectimage']['tmp_name'], 'media/project/' . $filename);
        }

        $projectobj = new Property();
        $cityobj = new City;
        $cities = $cityobj->getCities();

        $categoryobj = new PropertyCategory;
        $categories = $categoryobj->getCategories();
        $projecttypeyobj = new PropertyType;
        $projecttypes = $projecttypeyobj->getPropertyTypes();

        return array('title' => 'Add Project', 'cities' => $cities,
            'layout' => 'dealerlayout', 'categories' => $categories,
            'projecttypes' => $projecttypes,
            'floors' => $projectobj->floors(),
            'view' => 'form',
            'rooms' => $projectobj->rooms());
    }

    function actionEdit($args) {
        if (!empty($_POST)) {

            $data = array(
                'name' => $_POST['projecttitle'],
                'type' => $_POST['projecttype'],
                'projectName' => $_POST['projectcomptitle'],
                'bedroom' => $_POST['bedrooms'],
                'bathroom' => $_POST['bathrooms'],
                'coveredArea' => $_POST['coveredarea'],
                'coveredAreaUnit' => $_POST['coveredAreaUnit'],
                'price' => ($_POST['projectprice']),
                'floorNo' => ($_POST['floors']),
                'totalFloor' => ($_POST['totalfloors']),
                'displayPrice' => ($_POST['displayPriceUsers']),
                'description' => $_POST['projectdescription'],
                'location' => $_POST['projectlocation'],
                'city' => $_POST['projectcity'],
                'area' => $_POST['projectarea'],
                'user_id' => $_SESSION['userdata']['id'],
                'possession' => $_POST['possessionstatus'],
                'modified' => time()
            );

            if (!empty($_FILES['projectimage']['tmp_name'])) {
                $filename = mt_rand() . '__' . clean($_FILES['projectimage']['name']);
                move_uploaded_file($_FILES['projectimage']['tmp_name'], 'media/project/' . $filename);
                $data['mediapath'] = $filename;
            }
            $projectyobj = new Project;
            $projectyobj->updateProject($data, 'id = ' . $_POST['pid'] . ' AND user_id = ' . $_SESSION['userdata']['id']);
            redirect('project/manage');
        }

        $projectobj = new Property();
        $cityobj = new City;
        $cities = $cityobj->getCities();

        $categoryobj = new PropertyCategory;
        $categories = $categoryobj->getCategories();
        $projecttypeyobj = new PropertyType;
        $projecttypes = $projecttypeyobj->getPropertyTypes();

        $property = new Project;
        $result = $property->fetchProject('user_id = ' . $_SESSION['userdata']['id'] . ' AND id = ' . $args['id']);

        $areaobj = new Area;
        $areas = $areaobj->getAreas();

        return array('title' => 'Edit Project', 'cities' => $cities,
            'layout' => 'dealerlayout', 'categories' => $categories,
            'projecttypes' => $projecttypes,
            'floors' => $projectobj->floors(),
            'view' => 'form',
            'rooms' => $projectobj->rooms(),
            'project' => $result,
            'areas' => $areas);
    }

    function actionManage() {

        $property = new Project;
        $result = $property->fetchProjects('AND user_id = ' . $_SESSION['userdata']['id'] . ' AND status = "published"');

        return(array('layout' => 'dealerlayout', 'projects' => $result));
    }

    function actionDelete($args) {
        $property = new Project;
        $result = $property->fetchProject(' id = ' . $args['id'] . ' AND user_id = ' . $_SESSION['userdata']['id']);
//        print_r($result);
//        die;
        if (!$result) {
            redirect('site/notfound');
        } else {
            $property->deleteProject('id = ' . $args['id'] . ' AND user_id = ' . $_SESSION['userdata']['id']);
            redirect('project/manage');
        }

        return(array('layout' => 'dealerlayout', 'properties' => $result));
    }

    function actionSearch($args) {
        $cityobj = new City;
        $cities = $cityobj->getCities();

        $areaobj = new Area;
        $areas = $areaobj->getAreas();
        return(array('layout' => 'dealerlayout', 'areas' => $areas, 'cities' => $cities));
    }

    function actionSearchResult() {
        $property = new Project;

        $rq = getrequesturi();
        $query = '';
        if (isset($rq['q']) && !empty($rq['q'])) {
            $query .= ' AND name LIKE "%' . $rq['q'] . '%" OR  name LIKE "%' . $rq['q'] . '%" OR name LIKE "%' . $rq['q'] . '%"';
        }
        if (isset($rq['city']) && !empty($rq['city'])) {
            $query .= ' AND city =' . $rq['city'];
        }
        if (isset($rq['area']) && !empty($rq['area'])) {
            $query .= ' AND area =' . $rq['area'];
        }

        $result = $property->fetchProjects($query . ' AND  status = "published"');
        return(array('layout' => 'dealerlayout', 'projects' => $result));
    }

}