<?php

class SiteController {

    public function __construct($args) {

        new ACL($args, array(
            'anon' => array('login', 'register'),
                )
        );

        $banner = new Banner();
        $_SESSION['banners'] = $banner->fetchActiveBanner();
    }

    function actionIndex() {
        return array('title' => 'Home');
    }

    function actionPackages() {
        return array('title' => 'Packages');
    }

    function actionAdvertiseWithUs() {

        return array('title' => 'Advertise with us');
    }

    function actionContactUs() {

        return array('title' => 'Contact us');
    }

    function actionServices() {
        return array('title' => 'Services');
    }

    function actionLogin() {
        if (!empty($_POST)) {
            $user = new User;
            $userdata = $user->autheticate($_POST);
            if ($userdata) {
                //setmessage('You have successfully logined');
                $user->startusersession($userdata);

                echo json_encode(array('status' => 1));
            } else {
                // setmessage('Usename or password did not match.');
                echo json_encode(array('status' => 0));
            }
        }

        die;
    }

    function actionRegister() {

        if (!empty($_POST)) {
//            print ($_SESSION['captcha']);
//            die;
            if ($_POST['area'] == 'otherarea') {
                $area = new Area();
                $areaid = $area->addarea($_POST['city'], $_POST['otherArea']);
            }

            $filename = mt_rand() . '__' . clean($_FILES['pic']['name']);
            $data = array(
                'name' => $_POST['name'],
                'email' => $_POST['emailid'],
                'dob' => $_POST['yy'] . '-' . $_POST['mm'] . '-' . $_POST['dd'],
                'password' => md5($_POST['passwd']),
                'usertype' => $_POST['accnttype'],
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

            $mailer = new Mail;

            $body = filerender('views/site/newUserMailTemplate.php', array('userresult' => $userobj->getUserProfile($uid)));

            $mailer->sendMail(ADMIN_EMAIL, 'A new user has registered', $body);

            setmessage('Thanks for registering. We will contact you soon.');
            redirect('site/register');
        }

        $stateobj = new State;
        $state = $stateobj->getStates();

        $cityobj = new City;
        $cities = $cityobj->getCities();

        $areaobj = new Area;
        $areas = $areaobj->getAreas();

        return array('title' => 'Regsiter', 'state' => $state, 'cities' => $cities, 'areas' => $areas);
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

    function actionNotfound() {
        return array('title' => 'Not Found');
    }

    function actionLogout() {
        unset($_SESSION['userdata']);
    }

    function actionAccessdenied() {
        return array('title' => 'Access Denied');
    }

    function actionForget() {
        if (!empty($_POST)) {
            $emailid = $_POST['emailid'];
            $user = new User;
            $token = md5(mt_rand());
            $user->addTokenUser(array('token' => $token), $emailid);

            $mailer = new Mail;

            $body = filerender('views/site/forgetPassword.php', array('token' => $token));

            $mailer->sendMail($_POST['emailid'], 'Forget Password', $body);

            setmessage('A mail has been set with instructions to reset the password.');
            redirect('site/forget');
        }
        return array('title' => 'Forget Password');
    }

    function actionChangePassword($arg) {
        if(isset($arg['msg'])){

            return array('title' => 'Change Password', 'view' =>'pwdchanged');
        }
         $user = new User;
         $result = $user->checkToken($arg['token']);
                
        if (!empty($_POST)) {           
            $user->changePassword(array('token' => '', 'password' => md5($_POST['passwd'])), $arg['token']);
            setmessage('Password has been successfully changed.');
            redirect('site/changepassword/msg/changed');
        }
        return array('title' => 'Change Password', 'result' =>$result);
    }
    
    function actionCheckCaptcha(){
        if($_POST['captcha']==$_SESSION['captcha']){
            echo json_encode(array('status'=>1));
        }else{
            echo json_encode(array('status'=>0));
        }
        die;
    }

}