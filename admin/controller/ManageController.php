<?php

class ManageController {

    function __construct() {
        if (!isset($_SESSION['admin'])) {
            redirect('');
        }
    }

//Manage User
    

    function actionBanner($arg) {
        $banner = new Banner();
        include 'component/Pagination.php';
        $page = isset($arg['page']) ? $arg['page'] : 1;
        $limit = 10;
        $pagination = pagination(BASE_URL . 'manage/banner', $page, $banner->BannerCount(), $limit);
        return array('title' => 'Banner Login', 'banners' => $banner->fetchBanner($pagination['start'], $limit), 'pagination' => $pagination);
    }

    function actionAddBanner() {
        if (!empty($_POST)) {
            $filename = mt_rand() . '__' . str_replace(" ", "_", clean($_FILES['banner_path']['name']));
            $banner = new Banner();
            $postdata = array('url'=>$_POST['url'], 'title' => $_POST['title'], 'banner_path' => $filename, 'position' => $_POST['position'], 'created' => time());
            $banner->addBanner($postdata);
            move_uploaded_file($_FILES['banner_path']['tmp_name'], MEDIA_PATH . 'banner/'.$filename);
            setmessage('Banner has been succesfully added');

            redirect('manage/banner');
        }

        return array('title' => 'Admin Login');
    }

    function actionChangeBannerStatus($arg) {
        $banner = new Banner();
        $postdata = array('status' => intval($arg['status']));
        $banner->updateBanner($postdata, 'id=' . $arg['id']);
        if ($arg['status'] == 0)
            setmessage('Banner has been successfully unpublished.');
        else
            setmessage('Banner has been successfully published.');
        redirect('manage/banner');
    }

    function actionEditBanner($arg) {
        $banner = new Banner();
        if (isset($arg['delete'])) {
            $banner->deleteBanner($arg['delete']);
            setmessage("Banner has been successfully deleted.");
            redirect('manage/banner');
        } else {

            $bd = $banner->fetchBannerdata($arg['id']);
            if (!empty($_POST)) {
                $filename = mt_rand() . '__' . str_replace(" ", "_", $_FILES['banner_path']['name']);
                $banner = new Banner();
                $postdata = array('url'=>$_POST['url'],'title' => $_POST['title'], 'position' => $_POST['position']);
                if (!empty($_FILES['banner_path']['tmp_name'])) {
                    move_uploaded_file($_FILES['banner_path']['tmp_name'], MEDIA_PATH .'banner/'. $filename);
                    $postdata['banner_path'] = $filename;
                }
                $banner->updateBanner($postdata, 'id=' . $_POST['bid']);
                setmessage('Banner is successfully updated');
                redirect('manage/editbanner/id/' . $arg['id']);
            }
        }
        return array('title' => 'Admin Login', 'bannerdata' => $bd);
    }

    

    function actionPackage($arg) {

        $package = new Package;
        if (!empty($_POST)) {
            $package->updatePackage(array('name' => $_POST['title'],
                'days' => $_POST['package_days'],
                'credits' => $_POST['package_credits'],
                'description' => $_POST['package_descriptions']), 'id=' . $_POST['package_id']);
            setmessage('Package has been successfully updated.');
         redirect('manage/package/edit/'.$_POST['package_id']);
            
        }
        if (isset($arg['edit'])) {
            
  
            return array('view' => 'packageform', 'package' => $package->fetchPackagedata($arg['edit']), 'title' => 'Edit Package');
        } else {
            $package->fetchPackage();
            return array('packages' => $package->fetchPackage(), 'title' => 'Package');
        }
    }

    function actionAddPackage() {
        if (!empty($_POST)) {
            $package = new Package;
            $package->addPackage(array('name' => $_POST['title'],
                'days' => $_POST['package_days'],
                'credits' => $_POST['package_credits'],
                'description' => $_POST['package_descriptions']));
            setmessage('Package has been successfully added.');
            redirect('manage/package');
        }

        return array('view' => 'packageform', 'title' => 'Package');
    }
    
    function actionNotfound(){
        return array( 'title' => 'Not Found');
    }

}
