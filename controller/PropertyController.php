<?php

class PropertyController {

    public function __construct($args) {

        $acl = new ACL($args, array(
            'regis' => getActions($this),
                )
        );

        $acl->expirestatus();
    }

    function actionIndex($args) {
        $propertyobj = new Property();


        if (!empty($_POST)) {
            if ($_POST['propertyarea'] == 'otherarea') {
                $area = new Area();
                $areaid = $area->addarea($_POST['propertycity'], $_POST['otherArea']);
            }
            $filename = mt_rand() . '__' . clean($_FILES['propertyimage']['name']);
            $data = array(
                'for' => $_POST['propertyfor'],
                'type' => $_POST['propertytype'],
                'transType' => $_POST['transactiontype'],
                'bedroom' => $_POST['bedrooms'],
                'bathroom' => $_POST['bathrooms'],
                'furnished' => $_POST['furnished'],
                'coveredArea' => $_POST['coveredarea'],
                'plotLandArea' => $_POST['plotLandArea'],
                'coveredAreaUnit' => $_POST['coveredAreaUnit'],
                'plotLandAreaUnit' => $_POST['plotLandAreaUnit'],
                'price' => str_replace(',', '', $_POST['propertyprice']),
                'floorNo' => ($_POST['floors']),
                'totalFloor' => ($_POST['totalfloors']),
                'displayProperty' => ($_POST['displayPriceUsers']),
                'description' => $_POST['propertydescription'],
                'title' => $_POST['propertytitle'],
                'location' => $_POST['propertylocation'],
                'city' => $_POST['propertycity'],
                'area' => isset($areaid) ? $areaid : $_POST['propertyarea'],
                'user_id' => $_SESSION['userdata']['id'],
                'status' => 'moderator',
                'created' => time(),
                'modified' => time()
            );

            if (!empty($_FILES['propertyimage']['name'])) {
                $data['mediapath'] = $filename;
                move_uploaded_file($_FILES['propertyimage']['tmp_name'], 'media/property/' . $filename);
            }

            $propertyobj->addProperty($data);

            setmessage('Property has been successfully added');
            redirect('property/myproperty');
        }
        $cityobj = new City;
        $cities = $cityobj->getCities();

        $categoryobj = new PropertyCategory;
        $categories = $categoryobj->getCategories();
        $propertytypeyobj = new PropertyType;
        $propertytypes = $propertytypeyobj->getPropertyTypes();


        return array('title' => 'Dashboard', 'cities' => $cities,
            'layout' => 'dealerlayout', 'categories' => $categories,
            'propertytypes' => $propertytypes,
            'floors' => $propertyobj->floors(),
            'rooms' => $propertyobj->rooms(),
            'propertyFieldRelation' => json_encode($propertyobj->propertyFieldRelation()),
            'propertyVariableFields' => json_encode($propertyobj->propertyVariableFields()),
        );
    }

    function actionMyProperty($arg) {

        $user = new User;
        $useresults = $user->getuserById($_SESSION['userdata']['id']);
        $userpackage = new UserPackage;
        $status = $userpackage->checkMembershipStatus($_SESSION['userdata']['id'], $useresults['remainingCredits'], $useresults['memberExpiryDate']);
        $property = new Property;
        if (!$status) {
            $property->expireProperty($useresults['id']);
        }
        $cond = 'AND user_id = ' . $_SESSION['userdata']['id'] . ' AND properties.status = "moderator" ORDER BY properties.created DESC';

        $propertyType = new PropertyType;
        include 'component/Pagination.php';
        $page = isset($arg['page']) ? $arg['page'] : 1;
        $limit = 10;
        $pagination = pagination(BASE_URL . 'property/myproperty', $page, $property->fetchPropertiesCount($cond), $limit);

        $result = $property->fetchProperties($cond, $pagination['start']);
        return(array('layout' => 'dealerlayout',
            'propertyType' => $propertyType->getProperty(),
            'properties' => $result,
            'status' => $status,
            'pagination' => $pagination['pagination']));
    }

    function actionActiveProperty($arg) {

        $user = new User;
        $useresults = $user->getuserById($_SESSION['userdata']['id']);
        $userpackage = new UserPackage;
        $status = $userpackage->checkMembershipStatus($_SESSION['userdata']['id'], $useresults['remainingCredits'], $useresults['memberExpiryDate']);
        $property = new Property;

        $cond = 'AND user_id = ' . $_SESSION['userdata']['id'] . ' AND properties.status = "published" ORDER BY properties.created DESC';

        $propertyType = new PropertyType;
        include 'component/Pagination.php';
        $page = isset($arg['page']) ? $arg['page'] : 1;
        $limit = 10;
        $pagination = pagination(BASE_URL . 'property/myproperty', $page, $property->fetchPropertiesCount($cond), $limit);

        $result = $property->fetchProperties($cond, $pagination['start']);
        return(array('layout' => 'dealerlayout',
            'propertyType' => $propertyType->getProperty(),
            'properties' => $result,
            'pagination' => $pagination['pagination']));
    }

    function actionExpiredProperty($arg) {
        $user = new User;
        $useresults = $user->getuserById($_SESSION['userdata']['id']);
        $userpackage = new UserPackage;
        $status = $userpackage->checkMembershipStatus($_SESSION['userdata']['id'], $useresults['remainingCredits'], $useresults['memberExpiryDate']);

        $property = new Property;
        if (!$status) {
            $property->expireProperty($useresults['id']);
        }
        $propertyType = new PropertyType;

        include 'component/Pagination.php';
        $page = isset($arg['page']) ? $arg['page'] : 1;
        $limit = 10;
        $cond = 'AND user_id = ' . $_SESSION['userdata']['id'] . ' AND properties.status = "expired"  ORDER BY properties.created DESC';
        $pagination = pagination(BASE_URL . 'property/expiredproperty', $page, $property->fetchPropertiesCount($cond), $limit);

        $result = $property->fetchProperties('AND user_id = ' . $_SESSION['userdata']['id'] . ' AND properties.status = "expired"', $pagination['start']);
        return(array('layout' => 'dealerlayout',
            'propertyType' => $propertyType->getProperty(),
            'properties' => $result, 'status' => $status,
            'pagination' => $pagination['pagination']
        ));
    }

    function actionDelete($args) {

        $property = new Property;
        $result = $property->fetchProperties('AND properties.id = ' . $args['pid'] . ' AND user_id = ' . $_SESSION['userdata']['id']);

        if (!$result) {
            redirect('site/notfound');
        } else {
            $property->deleteProperty('properties.id = ' . $args['pid'] . ' AND user_id = ' . $_SESSION['userdata']['id']);
        }
        setmessage('Property has been successfully deleted.');
        if ($args['ref'] == 'myproperty')
            redirect('property/myproperty');
        else if ($args['ref'] == 'expired')
            redirect('property/expiredproperty');
        elseif ($args['ref'] == 'activeproperty') {
            redirect('property/activeproperty');
        }

        return(array('layout' => 'dealerlayout', 'properties' => $result));
    }

    function actionPublish($args) {


        $property = new Property;
        $result = $property->fetchProperties('AND properties.id = ' . $args['id'] . ' AND user_id = ' . $_SESSION['userdata']['id']);

        if (!$result) {
            redirect('site/notfound');
        } else {
            $user = new User;
            $useresults = $user->getuserById($_SESSION['userdata']['id']);
            $userpackage = new UserPackage;
            $status = $userpackage->checkMembershipStatus($_SESSION['userdata']['id'], $useresults['remainingCredits'], $useresults['memberExpiryDate']);
            if ($status==1 || $status!=2) {
                $property->updateProperty(array('created' => time(), 'status' => 'published'), 'id = ' . $args['id'] . ' AND user_id = ' . $_SESSION['userdata']['id']);
                $user->updateUser(array('remainingCredits' => $useresults['remainingCredits'] - 1), $_SESSION['userdata']['id']);
            }
            setmessage('Property has been successfully updated');
            if ($args['ref'] == 'myproperty')
                redirect('property/myproperty');
            else if ($args['ref'] == 'expired')
                redirect('property/expiredproperty');
        }

        return(array('layout' => 'dealerlayout', 'properties' => $result));
    }

    function actionEdit($args) {

        $property = new Property;
        $result = $property->fetchProperty('user_id = ' . $_SESSION['userdata']['id'] . ' AND properties.id = ' . $args['id']);

        if (!empty($_POST)) {
            if ($_POST['propertyarea'] == 'otherarea') {
                $area = new Area();
                if (isset($_POST['othaid'])) {
                    if ($result['city'] == $_POST['propertycity']) {
                        echo"created";
                        $areaid = $result['area'];
                        $area->updatearea($result['area'], $_POST['otherAreaRegis']);
                    }
                } else {

                    $areaid = $area->addarea($_POST['propertycity'], $_POST['otherArea']);
                }
            }

            $data = array(
                'price' => str_replace(',', '', $_POST['propertyprice']),
                'displayProperty' => ($_POST['displayPriceUsers']),
                'description' => $_POST['propertydescription'],
                'title' => $_POST['propertytitle'],
                'location' => $_POST['propertylocation'],
                'modified' => time()
            );

            if ($result['pstatus'] == 'expired') {
                $expireddata = array(
                    'for' => $_POST['propertyfor'],
                    'type' => $_POST['propertytype'],
                    'transType' => $_POST['transactiontype'],
                    'bedroom' => $_POST['bedrooms'],
                    'bathroom' => $_POST['bathrooms'],
                    'furnished' => $_POST['furnished'],
                    'coveredArea' => $_POST['coveredarea'],
                    'plotLandArea' => $_POST['plotLandArea'],
                    'coveredAreaUnit' => $_POST['coveredAreaUnit'],
                    'plotLandAreaUnit' => $_POST['plotLandAreaUnit'],
                    'floorNo' => ($_POST['floors']),
                    'totalFloor' => ($_POST['totalfloors']),
                    'city' => $_POST['propertycity'],
                    'area' => isset($areaid) ? $areaid : $_POST['propertyarea'],
                );
                $data = array_merge($data, $expireddata);
            }
            if (!empty($_FILES['propertyimage']['tmp_name'])) {
                $filename = mt_rand() . '__' . clean($_FILES['propertyimage']['name']);
                move_uploaded_file($_FILES['propertyimage']['tmp_name'], 'media/property/' . $filename);
                $data['mediapath'] = $filename;
            }
            $propertyobj = new Property();
            $propertyobj->updateProperty($data, 'id = ' . $_POST['pid'] . ' AND user_id = ' . $_SESSION['userdata']['id']);
            setmessage("Property successfully updated");

            //print_r($data);
            redirect('property/edit/id/' . $_POST['pid']);
        }


        if (!$result) {
            redirect('site/notfound');
        }
        $cityobj = new City;
        $cities = $cityobj->getCities();

        $areaobj = new Area;
        $areas = $areaobj->getAreas();
        $otherareaname = $areaobj->getAreasNameBy($result['area'], 0);
        $categoryobj = new PropertyCategory;
        $categories = $categoryobj->getCategories();
        $propertytypeyobj = new PropertyType;
        $propertytypes = $propertytypeyobj->getPropertyTypes();
        // print_r($otherareaname);

        return array('layout' => 'dealerlayout',
            'properties' => $result,
            'areas' => $areas,
            'cities' => $cities,
            'categories' => $categories,
            'propertytypes' => $propertytypes,
            'floors' => $property->floors(),
            'rooms' => $property->rooms(),
            'otherareaname' => $otherareaname,
            'propertyFieldRelation' => json_encode($property->propertyFieldRelation()),
            'propertyVariableFields' => json_encode($property->propertyVariableFields()),
        );
    }

    function actionSearch($args) {
        $cityobj = new City;
        $cities = $cityobj->getCities();
        $propertytypeyobj = new PropertyType;
        $propertytypes = $propertytypeyobj->getPropertyTypes();
        $areaobj = new Area;
        $areas = $areaobj->getAreas();
        $categoryobj = new PropertyCategory;
        $categories = $categoryobj->getCategories();
        $propertyobj = new Property;

        return(array('rooms' => $propertyobj->rooms(),
            'categories' => $categories,
            'propertytypes' => $propertytypes,
            'layout' => 'dealerlayout',
            'areas' => $areas,
            'cities' => $cities,
            'propertyFieldRelation' => json_encode($propertyobj->propertyFieldRelation())));
    }

    function actionSearchResult() {
        $property = new Property;

        $rq = getrequesturi();

        $query = '';
        if (isset($rq['q']) && !empty($rq['q'])) {
            $query .= ' AND title LIKE "%' . $rq['q'] . '%" OR description LIKE "%' . $rq['q'] . '%" OR location LIKE "%' . $rq['q'] . '%"';
        }
        if (isset($rq['propertyfor']) && !empty($rq['propertyfor'])) {
            $query .= ' AND properties.for ="' . $rq['propertyfor'] . '"';
        }
        if (isset($rq['proprtycat']) && !empty($rq['proprtycat'])) {
            $query .= ' AND properties.type IN (' . urldecode($rq['proprtycat']) . ')';
        }
        if (isset($rq['minbudget']) && !empty($rq['minbudget'])) {
            $query .= ' AND properties.price >="' . $rq['minbudget'] . '"';
        }
        if (isset($rq['maxbudget']) && !empty($rq['maxbudget'])) {
            $query .= ' AND properties.price <="' . $rq['maxbudget'] . '"';
        }
        if (isset($rq['proprtybedroom']) && !empty($rq['proprtybedroom'])) {

            $urldecoded = urldecode($rq['proprtybedroom']);
            $urldecoded = str_replace('>10', '">10"', $urldecoded);
            $query .= ' AND properties.bedroom IN (' . $urldecoded . ')';
        }
        if (isset($rq['city']) && !empty($rq['city'])) {
            $query .= ' AND properties.city =' . $rq['city'];
        }
        if (isset($rq['area']) && !empty($rq['area'])) {
            $query .= ' AND properties.area =' . $rq['area'];
        }

        $query .= '  AND properties.status = "published" ';
        include 'component/Pagination.php';
        $page = isset($rq['page']) ? $rq['page'] : '/page/1';
        $page = str_replace('/page/', '', $page);
        $limit = 10;
        // $cond = 'AND properties.status = "published"  ORDER BY properties.created DESC';

        $requeturi = str_replace('&page=/page/' . $page, '', strstr($_SERVER['REQUEST_URI'], '?'));
        $pagination = pagination(BASE_URL . 'property/searchresult' . $requeturi . '&page=', $page, $property->fetchPropertiesCount($query), $limit);

        $result = $property->fetchProperties($query, $pagination['start'], $limit);

        return(array('layout' => 'dealerlayout', 'properties' => $result, 'pagination' => $pagination['pagination']));
    }

    function actionView($arg) {
        $property = new Property();
        return array(
            'layout' => 'dealerlayout',
            'propertyFieldRelation' => ($property->propertyFieldRelation()),
            'property' =>
            $property->fetchProperty('properties.id=' . $arg['id']));
    }

}