<?php

class UserController {

    function __construct() {
        if (!isset($_SESSION['admin'])) {
            redirect('');
        }
    }

    function actionIndex($arg) {
        $user = new User;
        if (isset($arg['id'])) {
            $useresults = $user->getuserById($arg['id']);
            if (!empty($_POST)) {
                $data = array(
                    'name' => $_POST['name'],
                    'optionalmobileNo' => $_POST['optionalmobileNo'],
                    'mobileNo' => $_POST['mobileNo'],
                    'phoneNo' => $_POST['phoneNo'],
                    'address' => $_POST['address'],
                    'dob' => $_POST['yy'] . '-' . $_POST['mm'] . '-' . $_POST['dd'],
                    'companyName' => $_POST['companyname'],
                    'city' => $_POST['city'],
                    'email'=>$_POST['email'],
                    'area' =>  $_POST['area'],
                    'modified' => time(),
                );              
                $userobj = new User();
                $userobj->updateUser($data, 'id=' . $_POST['uid']);

                setmessage('Account updated successfully');
                redirect('user/index/id/' . $_POST['uid']);
            }

            $cityobj = new City;
            $cities = $cityobj->getCities();

            $areaobj = new Area;
            $areas = $areaobj->getAreasByCity($useresults['city']);
            $otherareaname = $areaobj->getAreasNameBy($useresults['area'], 0);
            $package = new Package;
            $userPackage = new UserPackage;
            $status = $userPackage->checkMembershipStatus($useresults['id'], $useresults['remainingCredits'], $useresults['memberExpiryDate']);
            if ($useresults['registered'] == 'no') {
                $view = 'unreguser';
            } else {
                $view = 'userform';
            }
            return array('title' => 'My Account',
                'userresults' => $useresults,
                'cities' => $cities,
                'areas' => $areas,
                'view' => $view,
                'packages' => $package->fetchPackage(),
                'otherareaname' => $otherareaname,
                'status' => $status,
                'page' => 0);
        } elseif (isset($arg['delete'])) {
            $user->deleteUser($arg['delete']);
            setmessage('User has been successfully deleted.');
            // $propert
            redirect('user/index/page/' . $arg['page']);
        } else {

            include 'component/Pagination.php';
            $page = isset($arg['page']) ? $arg['page'] : 1;
            $limit = 10;
            $pagination = pagination(BASE_URL . 'user/user', $page, $user->UserCount(' AND registered="yes"'), $limit);


            return array('pagination' => $pagination, 'title' => 'Users', 'users' => $user->fetchUsers(' AND registered="yes"', $pagination['start'], $limit));
        }
    }

    function actionActivate($arg) {
        $user = new User;
        $user->updateUser(array('status' => 1), 'id=' . $arg['id']);

        setmessage('User has been successfully activated');
        redirect('user');
    }

    function actionDeActivate($arg) {
        $user = new User;
        $user->updateUser(array('status' => 0), 'id=' . $arg['id']);
        $property = new Property;
        $property->expireProperty($arg['id']);
        setmessage('User has been successfully deactivated');
        redirect('user');
    }

    function actionUserPackage() {
        if (!empty($_POST)) {
            $package = new Package();
            $result = $package->fetchPackagedata($_POST['package']);
            $userpackage = new UserPackage();
            $user = new User;
            $usresult = $user->getuserById($_POST['uid']);
            $user->updateUser(array(
                'currentPackId' => $_POST['package'],
                'activationDate' => time(),
                'remainingCredits' => ($usresult['remainingCredits'] + $result['credits']),
                'memberExpiryDate' => ($usresult['memberExpiryDate'] == 0) ? (strtotime(date('Y-m-d')) + 86399 * $result['days']) : ($usresult['memberExpiryDate'] + 86399 * $result['days']),
                    ), 'id=' . $_POST['uid']);

            $userpackage->addUserPackage(array(
                'packageId' => $_POST['package'],
                'credits' => $result['credits'],
                'days' => $result['days'],
                'uid' => $_POST['uid'],
                'activation' => time())
            );
            setmessage('Package has been succesfully added');
            redirect('user/index/id/' . $_POST['uid']);
        }
    }

    function actionRemovePackage() {
        $user = new User;
        $usresult = $user->getuserById($_POST['uid']);
        $user->updateUser(array(
            'currentPackId' => 0,
            'remainingCredits' => 0,
            'memberExpiryDate' => 0,
                ), 'id=' . $_POST['uid']);

        $property = new Property;
        $property->expireProperty($_POST['uid']);
        setmessage('Package has been succesfully removed.');
        redirect('user/index/id/' . $_POST['uid']);
    }

    function actionAddDaysPackage() {
        $user = new User;
        $usresult = $user->getuserById($_POST['uid']);
        $user->updateUser(array(
            'remainingCredits' => ($usresult['remainingCredits'] + $_POST['adddays'])
                ), 'id=' . $_POST['uid']);

        setmessage('Days has been succesfully added to the package.');
        redirect('user/index/id/' . $_POST['uid']);
    }

    function actionAddUser() {
        if (!empty($_POST)) {
            $filename = mt_rand() . '__' . clean($_FILES['pic']['name']);
            $data = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'dob' => $_POST['yy'] . '-' . $_POST['mm'] . '-' . $_POST['dd'],
                'registered' => 'no',
                'usertype' => 'agecon',
                'status' => 1,
                'companyName' => $_POST['companyname'],
                'address' => $_POST['address'],
                'city' => $_POST['city'],
                'area' => isset($areaid) ? $areaid : $_POST['area'],
                'mobileNo' => $_POST['mobileNo'],
                'phoneNo' => $_POST['phoneNo'],
                'created' => time(),
                'modified' => time(),
            );

            $userobj = new User();
            if (!empty($_FILES['pic']['name'])) {
                move_uploaded_file($_FILES['pic']['tmp_name'], 'media/user/' . $filename);
                $img = new Imageresize;
                $img->resize('user', $filename, 150, 150);
                $data['imagepath'] = $filename;
            }

            $uid = $userobj->addUser($data);
            redirect('user/unregistereduser');
        }

        $cityobj = new City;
        $cities = $cityobj->getCities();

        $areaobj = new Area;
        $areas = $areaobj->getAreas();
        //$otherareaname = $areaobj->getAreasNameBy($useresults['area'], 0);

        return array('view' => 'unreguser', 'title' => 'Add User',
            'cities' => $cities,
            'areas' => array());
    }

    function actionUnRegisteredUser() {
        include 'component/Pagination.php';
        $user = new User;
        $page = isset($arg['page']) ? $arg['page'] : 1;
        $limit = 10;
        $pagination = pagination(BASE_URL . 'user/user', $page, $user->UserCount(' AND registered="no"'), $limit);
        return array('view' => 'unreguserlist', 'pagination' => $pagination, 'title' => 'Users',
            'users' => $user->fetchUsers(' AND registered="no"', $pagination['start'], $limit));
    }
    
    
     function actionCheckmail($arg) {
        $usrobj = new User;
        if ($usrobj->checkemailid($_POST['email'], $arg)) {
            echo json_encode(array('status' => 1));
        } else {
            echo json_encode(array('status' => 0));
        }
        die;
    }

}
