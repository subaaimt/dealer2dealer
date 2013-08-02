<?php

class SiteController {

    public function __construct($args) {

        new ACL($args, array(
                    'anon' => array('login', 'register'),
                        )
        );
    }

    function actionIndex() {
        return array('title' => 'Home', 'var' => 'Hello World');
    }

    function actionLogin() {
        if (!empty($_POST)) {
            $user = new User;
            $userdata = $user->autheticate($_POST);
            if ($userdata) {
                //setmessage('You have successfully logined');
                $user->startusersession($userdata);
             
                echo json_encode(array('status'=>1));
                
            } else {
               // setmessage('Usename or password did not match.');
                 echo json_encode(array('status'=>0));
               
            }
        }

      die;
    }

    function actionRegister() {

        if (!empty($_POST)) {
            $data = array(
                'name' => $_POST['name'],
                'email' => $_POST['emailid'],
                'password' => md5($_POST['passwd']),
                'usertype' => $_POST['accnttype'],
                'companyName' => $_POST['companyname'],
                'address' => $_POST['address'],
                'city' => $_POST['city'],
                'area' => $_POST['area'],
                'mobileNo' => $_POST['mobileNo'],
                'phoneNo' => $_POST['phoneNo'],
                'created' => time(),
                'modified' => time(),
            );
            $userobj = new User();
            $userobj->addUser($data);
            setmessage('Thanks for registering. We will contact you soon.');
            //redirect('site/register');
        }

        $stateobj = new State;
        $state = $stateobj->getStates();

        $cityobj = new City;
        $cities = $cityobj->getCities();

        $areaobj = new Area;
        $areas = $areaobj->getAreas();

        return array('title' => 'Regsiter', 'state' => $state, 'cities' => $cities, 'areas' => $areas);
    }

    function actionCheckmail() {
        $usrobj = new User;
        if ($usrobj->checkemailid($_POST['email'])) {
            echo json_encode(array('status' => 1));
        } else {
            echo json_encode(array('status' => 0));
        }
        die;
    }

    function actionNotfound() {

        return array('title' => 'Not Found');
    }

    function actionLogout() {

        unset($_SESSION['userdata']);
    }

    function actionAccessdenied() {

        return array('title' => 'Access Denied');
    }

}

