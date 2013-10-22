<?php

class ProjectController {

    public function __construct($args) {
        
    }

    function actionIndex() {
        
    }

    function actionAdd() {
        $projectobj = new Project;
        if (!empty($_POST)) {
            $filename = mt_rand() . '__' . clean($_FILES['projectimage']['name']);
            $data = array(
                'name' => $_POST['projecttitle'],
                'type' => $_POST['projecttype'],
                'projectName' => $_POST['projectcomptitle'],
                 'emailid' => $_POST['companyemailid'],
                'phoneNumber' => $_POST['copmanyphoneNo'],
                'address' => $_POST['companyaddress'],
                'projectArea' => $_POST['companyarea'],
                'projectCity' => $_POST['companycity'],
                'plotLandArea' => $_POST['plotLandArea'],
                'plotLandAreaUnit' => $_POST['plotLandAreaUnit'],
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
                'possession' => $_POST['possessionstatus'],
                'mediapath' => $filename,
                'created' => time(),
                'modified' => time()
            );

            $projectobj->addProject($data);
            move_uploaded_file($_FILES['projectimage']['tmp_name'], PROJECT_MEDIA_PATH . $filename);
        }

        $property = new Property();
        $cityobj = new City;
        $cities = $cityobj->getCities();

        $categoryobj = new PropertyCategory;
        $categories = $categoryobj->getCategories();
        $projecttypeyobj = new PropertyType;
        $projecttypes = $projecttypeyobj->getPropertyTypes();

        return array('title' => 'Add Project', 'cities' => $cities,
            'categories' => $categories,
            'projecttypes' => $projecttypes,
            'floors' => $property->floors(),
            'view' => 'form',
            'rooms' => $property->rooms(),
            'projectFieldRelation' => json_encode($projectobj->projectFieldRelation()),
            'projectVariableFields' => json_encode($projectobj->projectVariableFields()),
        );
    }

    function actionEdit($args) {
        if (!empty($_POST)) {


            $data = array(
                'name' => $_POST['projecttitle'],
                'type' => $_POST['projecttype'],
                'projectName' => $_POST['projectcomptitle'],
                'emailid' => $_POST['companyemailid'],
                'phoneNumber' => $_POST['copmanyphoneNo'],
                'address' => $_POST['companyaddress'],
                'projectArea' => $_POST['companyarea'],
                'projectCity' => $_POST['companycity'],
                'plotLandArea' => $_POST['plotLandArea'],
                'plotLandAreaUnit' => $_POST['plotLandAreaUnit'],
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
                move_uploaded_file($_FILES['projectimage']['tmp_name'], PROJECT_MEDIA_PATH . $filename);
                $data['mediapath'] = $filename;
            }
            $projectyobj = new Project;
            $projectyobj->updateProject($data, 'id = ' . $_POST['pid']);
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
        $result = $property->fetchProject('id = ' . $args['id']);

        $areaobj = new Area;
        $areas = $areaobj->getAreas();

        return array('title' => 'Edit Project', 'cities' => $cities,
            'layout' => 'layout', 'categories' => $categories,
            'projecttypes' => $projecttypes,
            'floors' => $projectobj->floors(),
            'view' => 'form',
            'rooms' => $projectobj->rooms(),
            'project' => $result,
            'projectFieldRelation' => json_encode($property->projectFieldRelation()),
            'projectVariableFields' => json_encode($property->projectVariableFields()),
            'areas' => $areas);
    }

    function actionManage($arg) {

        $property = new Project;
        //$result = $property->fetchProjects();
        include 'component/Pagination.php';
        $page = isset($arg['page']) ? $arg['page'] : 1;
        $limit = 10;
        $pagination = pagination(BASE_URL . 'project/manage', $page, $property->fetchProjectsCount(), $limit);
        return(array(
            'layout' => 'layout',
            'projects' => $property->fetchProjects('', $pagination['start'], $limit),
            'pagination' => $pagination['pagination']
        ));
    }

    function actionStatus($arg) {
        if ($arg['status'] == 1)
            $status = 'published';
        else
            $status = 'unpublished';

        $property = new Project;
        $property->updateProject(array('status' => $status), 'id = ' . $arg['id']);
       
        redirect('project/manage');
    }

    function actionDelete($args) {
        $property = new Project;
        $result = $property->fetchProject(' id = ' . $args['id']);

        if (!$result) {
            redirect('site/notfound');
        } else {
            $property->deleteProject('id = ' . $args['id']);
            redirect('project/manage');
        }

        return(array('layout' => 'layout', 'properties' => $result));
    }

    function actionSearch($args) {
        $cityobj = new City;
        $cities = $cityobj->getCities();

        $areaobj = new Area;
        $areas = $areaobj->getAreas();
        return(array('layout' => 'layout', 'areas' => $areas, 'cities' => $cities));
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
        return(array('layout' => 'layout', 'projects' => $result));
    }

}