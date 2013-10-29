<?php

class UserController {

    public function __construct($args) {
        $this->acl = new ACL($args, array(
            'regis' => array('index', 'myaccount', 'changepassword'),
                )
        );
    }

    function actionIndex() {

        $userobj = new User;
        $useresults = $userobj->getUserProfile($_SESSION['userdata']['id']);

        $package = new Package;
        $userPackage = new UserPackage;
        $status = $userPackage->checkMembershipStatus($_SESSION['userdata']['id'], $useresults['remainingCredits'], $useresults['memberExpiryDate']);

        return array('title' => 'My Account',
            'userresult' => $useresults,
            'layout' => 'dealerlayout',
            'pkdata' => $package->fetchPackagedata($useresults['currentPackId']),
            'status' => $status);
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
        $userobj = new User;
        $useresults = $userobj->getuserById($_SESSION['userdata']['id']);
        if (!empty($_POST)) {

            if ($_POST['area'] == 'otherarea') {
                $area = new Area();
                if (isset($_POST['othaid'])) {
                    if ($useresults['city'] == $_POST['city']) {

                        $areaid = $useresults['area'];
                        $area->updatearea($useresults['area'], $_POST['otherAreaRegis']);
                    }
                } else {
                    $areaid = $area->addarea($_POST['city'], $_POST['otherArea']);
                }
            }

            $data = array(
                'optionalmobileNo' => $_POST['optionalmobileNo'],
                'mobileNo' => $_POST['mobileNo'],
                'phoneNo' => $_POST['phoneNo'],
                'address' => $_POST['address'],
                'dob' => $_POST['yy'] . '-' . $_POST['mm'] . '-' . $_POST['dd'],
                'city' => $_POST['city'],
                'area' => isset($areaid) ? $areaid : $_POST['area'],
                'modified' => time(),
            );
            $filename = mt_rand() . '__' . clean($_FILES['pic']['name']);
            if (!empty($_FILES['pic']['name'])) {
                move_uploaded_file($_FILES['pic']['tmp_name'], 'media/user/' . $filename);
                $img = new Imageresize;
                $img->resize('user', $filename, 150, 150);
                $data['imagepath'] = $filename;
            }
            $userobj = new User();
            $userobj->updateUser($data, $_SESSION['userdata']['id']);

            setmessage('Account updated successfully');
            redirect('user/myaccount');
        }

        $_SESSION['userdata']['name'] = $useresults['name'];
        $stateobj = new State;
        $state = $stateobj->getStates();

        $cityobj = new City;
        $cities = $cityobj->getCities();

        $areaobj = new Area;
        $areas = $areaobj->getAreasByCity($useresults['city']);
        $otherareaname = $areaobj->getAreasNameBy($useresults['area'], 0);


        return array('title' => 'My Account', 'layout' => 'dealerlayout',
            'userresults' => $useresults,
            'state' => $state,
            'cities' => $cities,
            'areas' => $areas,
            'otherareaname' => $otherareaname);
    }

    function actionLogout() {
        unset($_SESSION['userdata']);
        redirect('site');
    }

    function actionDashBoard() {
        $this->acl->expirestatus();
        $property = new Property;
        $result = $property->fetchDashBoardProperties(' AND  properties.status = "published"');        
        return(array('layout' => 'dealerlayout', 'properties' => $result));
    }
    function actionExpired() {
       $user = new User;
        $userresult = $user->getUserProfile($_SESSION['userdata']['id']);
        if($userresult['memberExpiryDate'] <= time()){
        $property = new Property;
       
            $property->expireProperty($_SESSION['userdata']['id']);
        
        }else{
            redirect('user');
            
        }
        return(array('layout' => 'dealerlayout'));
    }
}