<?php

class PropertyController {

    public function __construct($args) {
//        new ACL($args, array(
//                    'regis' => array('index'),
//                        )
//        );
    }

    function actionIndex($args) {
        $propertyobj = new Property();
        $user = new User;
        $useresults = $user->getuserById($_SESSION['userdata']['id']);
        if (!empty($_POST)) {
            if ($_POST['propertyarea'] == 'otherarea') {
                $area = new Area();
                $areaid = $area->addarea($_POST['propertycity'], $_POST['otherArea']);
            }
            $filename = mt_rand() . '__' . $_FILES['propertyimage']['name'];
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
                'price' => ($_POST['propertyprice']),
                'floorNo' => ($_POST['floors']),
                'totalFloor' => ($_POST['totalfloors']),
                'displayProperty' => ($_POST['displayPriceUsers']),
                'description' => $_POST['propertydescription'],
                'title' => $_POST['propertytitle'],
                'location' => $_POST['propertylocation'],
                'city' => $_POST['propertycity'],
                'area' => isset($areaid) ? $areaid : $_POST['propertyarea'],
                'user_id' => $_SESSION['userdata']['id'],
                'created' => time(),
                'modified' => time()
            );

            if (!empty($_FILES['propertyimage']['name'])) {
                $data['mediapath'] = $filename;
                move_uploaded_file($_FILES['propertyimage']['tmp_name'], 'media/property/' . $filename);
            }

            $propertyobj->addProperty($data);
            $user->updateUser(array('remainingCredits' => $useresults['remainingCredits'] - 1), $_SESSION['userdata']['id']);

            redirect('property');
        }
        $cityobj = new City;
        $cities = $cityobj->getCities();

        $categoryobj = new PropertyCategory;
        $categories = $categoryobj->getCategories();
        $propertytypeyobj = new PropertyType;
        $propertytypes = $propertytypeyobj->getPropertyTypes();
        $userpackage = new UserPackage;
        $status = $userpackage->checkMembershipStatus($_SESSION['userdata']['id'], $useresults['remainingCredits'], $useresults['memberExpiryDate']);

        return array('title' => 'Dashboard', 'cities' => $cities,
            'layout' => 'dealerlayout', 'categories' => $categories,
            'propertytypes' => $propertytypes,
            'floors' => $propertyobj->floors(),
            'rooms' => $propertyobj->rooms(),
            'status' => $status);
    }

    function actionMyProperty() {

        $user = new User;
        $useresults = $user->getuserById($_SESSION['userdata']['id']);
        $userpackage = new UserPackage;
        $status = $userpackage->checkMembershipStatus($_SESSION['userdata']['id'], $useresults['remainingCredits'], $useresults['memberExpiryDate']);
        $property = new Property;
        if (!$status) {
            $property->expireProperty($useresults['id']);
        }

        $result = $property->fetchProperties('AND user_id = ' . $_SESSION['userdata']['id'] . ' AND status = "published"');

        return(array('layout' => 'dealerlayout', 'properties' => $result));
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

        $result = $property->fetchProperties('AND user_id = ' . $_SESSION['userdata']['id'] . ' AND status = "expired"');

        return(array('layout' => 'dealerlayout', 'properties' => $result, 'status' => $status));
    }

    function actionDelete($args) {

        $property = new Property;
        $result = $property->fetchProperties('AND id = ' . $args['id'] . ' AND user_id = ' . $_SESSION['userdata']['id']);
        if (!$result) {
            redirect('site/notfound');
        } else {
            $property->deleteProperty('id = ' . $args['id'] . ' AND user_id = ' . $_SESSION['userdata']['id']);
            redirect('property/myproperty');
        }

        return(array('layout' => 'dealerlayout', 'properties' => $result));
    }

    function actionPublish($args) {

        $property = new Property;
        $result = $property->fetchProperties('AND id = ' . $args['id'] . ' AND user_id = ' . $_SESSION['userdata']['id']);
        if (!$result) {
            redirect('site/notfound');
        } else {
            $user = new User;
            $useresults = $user->getuserById($_SESSION['userdata']['id']);
            $userpackage = new UserPackage;
            $status = $userpackage->checkMembershipStatus($_SESSION['userdata']['id'], $useresults['remainingCredits'], $useresults['memberExpiryDate']);
            if ($status){
                $property->updateProperty(array('status' => 'published'), 'id = ' . $args['id'] . ' AND user_id = ' . $_SESSION['userdata']['id']);
                $user->updateUser(array('remainingCredits' => $useresults['remainingCredits'] - 1), $_SESSION['userdata']['id']);
            }
            redirect('property/myproperty');
        }

        return(array('layout' => 'dealerlayout', 'properties' => $result));
    }

    function actionEdit($args) {
        $property = new Property;
        $result = $property->fetchProperty('user_id = ' . $_SESSION['userdata']['id'] . ' AND id = ' . $args['id']);

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
                    echo"poatsed";
                    $areaid = $area->addarea($_POST['propertycity'], $_POST['otherArea']);
                }
            }

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
                'price' => ($_POST['propertyprice']),
                'floorNo' => ($_POST['floors']),
                'totalFloor' => ($_POST['totalfloors']),
                'displayProperty' => ($_POST['displayPriceUsers']),
                'description' => $_POST['propertydescription'],
                'title' => $_POST['propertytitle'],
                'location' => $_POST['propertylocation'],
                'city' => $_POST['propertycity'],
                'area' => isset($areaid) ? $areaid : $_POST['propertyarea'],
                'user_id' => $_SESSION['userdata']['id'],
                'modified' => time()
            );

            if (!empty($_FILES['propertyimage']['tmp_name'])) {
                $filename = mt_rand() . '__' . $_FILES['propertyimage']['name'];
                move_uploaded_file($_FILES['propertyimage']['tmp_name'], 'media/property/' . $filename);
                $data['mediapath'] = $filename;
            }
            $propertyobj = new Property();
            $propertyobj->updateProperty($data, 'id = ' . $_POST['pid'] . ' AND user_id = ' . $_SESSION['userdata']['id']);



            redirect('property/myproperty');
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
        print_r($otherareaname);

        return array('layout' => 'dealerlayout',
            'properties' => $result,
            'areas' => $areas,
            'cities' => $cities,
            'categories' => $categories,
            'propertytypes' => $propertytypes,
            'floors' => $property->floors(),
            'rooms' => $property->rooms(),
            'otherareaname' => $otherareaname);
    }

    function actionSearch($args) {
        $cityobj = new City;
        $cities = $cityobj->getCities();

        $areaobj = new Area;
        $areas = $areaobj->getAreas();
        return(array('layout' => 'dealerlayout', 'areas' => $areas, 'cities' => $cities));
    }

    function actionSearchResult() {
        $property = new Property;

        $rq = getrequesturi();
        $query = '';
        if (isset($rq['q']) && !empty($rq['q'])) {
            $query .= ' AND title LIKE "%' . $rq['q'] . '%" OR title LIKE "%' . $rq['q'] . '%" OR title LIKE "%' . $rq['q'] . '%"';
        }
        if (isset($rq['city']) && !empty($rq['city'])) {
            $query .= ' AND city =' . $rq['city'];
        }
        if (isset($rq['area']) && !empty($rq['area'])) {
            $query .= ' AND area =' . $rq['area'];
        }

        $result = $property->fetchProperties($query . ' AND  status = "published"');
        return(array('layout' => 'dealerlayout', 'properties' => $result));
    }

}