<?php

class ManageController {

    function __construct() {
        if(!isset($_SESSION['admin'])){
            redirect('');
        }
        
    }

    function actionUser() {
        $user = new User;

        return array('title' => 'Users', 'users' => $user->fetchUsers());
    }

    function actionBanner() {
        $banner = new Banner();
        return array('title' => 'Banner Login', 'banners' => $banner->fetchBanner());
    }

    function actionAddBanner() {
        if (!empty($_POST)) {
            $filename = mt_rand() . '__' . $_FILES['banner_path']['name'];
            $banner = new Banner();
            $postdata = array('title' => $_POST['title'], 'banner_path' => $filename, 'position' => $_POST['position'], 'created' => time());
            $banner->addBanner($postdata);
            move_uploaded_file($_FILES['banner_path']['tmp_name'], MEDIA_PATH . $filename);
            redirect('manage/banner');
        }

        return array('title' => 'Admin Login');
    }

    function actionChangeBannerStatus($arg) {
        $banner = new Banner();
        $postdata = array('status' => intval($arg['status']));
        
        $banner->updateBanner($postdata, 'id=' . $arg['id']);
        redirect('manage/banner');
    }

    function actionEditBanner($arg) {
        $banner = new Banner();
        $bd = $banner->fetchBannerdata($arg['id']);

        if (!empty($_POST)) {
            $filename = mt_rand() . '__' . $_FILES['banner_path']['name'];
            $banner = new Banner();
            $postdata = array('title' => $_POST['title'], 'position' => $_POST['position']);
            if (!empty($_FILES['banner_path']['tmp_name'])) {
                move_uploaded_file($_FILES['banner_path']['tmp_name'], MEDIA_PATH . $filename);
                $postdata['banner_path'] = $filename;
            }
            $banner->updateBanner($postdata, 'id=' . $_POST['bid']);
            redirect('manage/banner');
        }

        return array('title' => 'Admin Login', 'bannerdata' => $bd);
    }

    function actionActivate($arg) {
        $user = new User;
        $user->updateUser(array('status' => 1), 'id=' . $arg['id']);
        //  redirect('manage/user');
    }

    function actionDeActivate($arg) {
        $user = new User;
        $user->updateUser(array('status' => 0), 'id=' . $arg['id']);
        redirect('manage/user');
    }

}
