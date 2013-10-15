<?php

class SiteController {

    function __construct() {
        
    }

    function actionIndex() {
        if ($_POST) {
            $admin = new Admin();
            $result = $admin->authenticate($_POST);
            if ($result) {
                $_SESSION['admin']=true;
                 redirect('manage/user');
            } else {
                 redirect('');
            }
        }

        return array('layout' => 'adminlogin', 'title' => 'Admin Login');
    }

    function actionLogout() {
        unset($_SESSION['admin']);
        redirect('');
    }

}
