<?php

class PropertyController {

    public function __construct($args) {
//        new ACL($args, array(
//                    'regis' => array('index'),
//                        )
//        );
    }

    function actionIndex($args) {

        if (!empty($_POST)) {
            $filename = mt_rand() . '__' . $_FILES['propertyimage']['name'];
            $data = array(
                'category' => $_POST['propertyfor'],
                'type' => $_POST['propertytype'],
                'price' => ($_POST['propertyprice']),
                'description' => $_POST['propertydescription'],
                'title' => $_POST['propertytitle'],
                'location' => $_POST['propertylocation'],
                'city' => $_POST['propertycity'],
                'area' => $_POST['propertyarea'],
                'user_id' => $_SESSION['userdata']['id'],
                'mediapath' => $filename,
                'created' => time(),
                'modified' => time()
            );
            $propertyobj = new Property();
            $propertyobj->addProperty($data);

            move_uploaded_file($_FILES['propertyimage']['tmp_name'], 'media/property/' . $filename);

            redirect('property');
        }
        $cityobj = new City;
        $cities = $cityobj->getCities();

        $categoryobj = new Category;
        $categories = $categoryobj->getCategories();
        return array('title' => 'Dashboard', 'cities' => $cities, 'layout' => 'dealerlayout', 'categories' => $categories);
    }

    function actionMyProperty() {
        $property = new Property;
        $result = $property->fetchProperties('AND user_id = ' . $_SESSION['userdata']['id'] . ' AND status = "published"');
        return(array('layout' => 'dealerlayout', 'properties' => $result));
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

    function actionEdit($args) {

        if (!empty($_POST)) {

            $data = array(
                'category' => $_POST['propertyfor'],
                'type' => $_POST['propertytype'],
                'price' => ($_POST['propertyprice']),
                'description' => $_POST['propertydescription'],
                'title' => $_POST['propertytitle'],
                'location' => $_POST['propertylocation'],
                'city' => $_POST['propertycity'],
                'area' => $_POST['propertyarea'],
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
        $property = new Property;
        $result = $property->fetchProperty('user_id = ' . $_SESSION['userdata']['id'] . ' AND id = ' . $args['id']);


        if (!$result) {
            redirect('site/notfound');
        }
        $cityobj = new City;
        $cities = $cityobj->getCities();

        $areaobj = new Area;
        $areas = $areaobj->getAreas();

        return(array('layout' => 'dealerlayout', 'properties' => $result, 'areas' => $areas, 'cities' => $cities));
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
            $query .= ' AND title LIKE "%' . $rq['q'] . '%" OR title LIKE "%' . $rq['q'] . '%" OR title LIKE "%' . $rq['q'].'%"';
        }
        if (isset($rq['city']) && !empty($rq['city'])) {
            $query .= ' AND city =' . $rq['city'];
        }
        if (isset($rq['area']) && !empty($rq['area'])) {
            $query .= ' AND city =' . $rq['city'];
        }

        $result = $property->fetchProperties($query . ' AND  status = "published"');
        return(array('layout' => 'dealerlayout', 'properties' => $result));
    }

}