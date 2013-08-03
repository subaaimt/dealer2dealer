<?php

class UserController {

    public function __construct($args) {
        new ACL($args, array(
                    'regis' => array('index', 'myaccount'),
                        )
        );
    }

    function actionIndex() {

        $userobj = new User;
        $useresults = $userobj->getUserProfile($_SESSION['userdata']['id']);
        return array('title' => 'My Account', 'userresult' => $useresults, 'layout' => 'dealerlayout');
    }

    function actionChangePassword() {
        if (!empty($_POST)) {
            $userobj = new User;
            $useresults = $userobj->getuserById($_SESSION['userdata']['id']);
            if (($useresults['password']) != md5($_POST['currentpassword'])) {
                setmessage('Your current password did not match');
            } else {
                $data = array(
                    'password' => md5($_POST['newpassword']),
                    'modified' => time(),
                );

                $userobj = new User();
                $userobj->updateUser($data, $_SESSION['userdata']['id']);
                setmessage('Your current password changed successfully');
            }
        }

        return array('title' => 'Change Password', 'layout' => 'dealerlayout');
    }

    function actionMyaccount() {

        if (!empty($_POST)) {
            $data = array(
                'name' => $_POST['name'],
                'companyName' => $_POST['companyname'],
                'mobileNo' => $_POST['mobileNo'],
                'phoneNo' => $_POST['phoneNo'],
                'address' => $_POST['address'],
                'city' => $_POST['city'],
                'area' => $_POST['area'],
                'modified' => time(),
            );

            $userobj = new User();
            $userobj->updateUser($data, $_SESSION['userdata']['id']);

            setmessage('Account updated successfully');
            redirect('user/myaccount');
        }
        $userobj = new User;
        $useresults = $userobj->getuserById($_SESSION['userdata']['id']);
        $_SESSION['userdata']['name'] = $useresults['name'];
        $stateobj = new State;
        $state = $stateobj->getStates();

        $cityobj = new City;
        $cities = $cityobj->getCities();

        $areaobj = new Area;
        $areas = $areaobj->getAreas();
        return array('title' => 'My Account', 'layout' => 'dealerlayout', 'userresults' => $useresults, 'state' => $state, 'cities' => $cities, 'areas' => $areas);
    }

    function actionLogout() {
        unset($_SESSION['userdata']);
        redirect('site');
    }

}