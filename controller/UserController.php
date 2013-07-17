<?php

class UserController {

    public function __construct($args) {
        new ACL($args, array(
                    'regis' => array('index', 'myaccount'),
                        )
        );
    }

    function actionIndex() {
        
    }

    function actionMyaccount() {
        
        if(!empty($_POST)){
               $data = array('first' => $_POST['firstname'],
                'last' => $_POST['lastname'],
                'cmp_name' => $_POST['companyname'],
                'address' => $_POST['address'],
                'city' => $_POST['city'],
                'area' => $_POST['area'],
                'modified' => time(),
            );
               
               $userobj = new User();
            $userobj->updateUser($data,$_SESSION['userdata']['id']);
            setmessage('Account updated successfully');
            redirect('user/myaccount');
        }
        $userobj = new User;
        $useresults = $userobj->getuserById($_SESSION['userdata']['id']);
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