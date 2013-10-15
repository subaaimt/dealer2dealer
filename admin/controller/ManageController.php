<?php

class ManageController {

    function __construct() {
        if (!isset($_SESSION['admin'])) {
            redirect('');
        }
    }

//Manage User
    function actionUser($arg) {
        $user = new User;
        if (isset($arg['id'])) {
            $useresults = $user->getuserById($arg['id']);
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
                    'name' => $_POST['name'],
                    'optionalmobileNo' => $_POST['optionalmobileNo'],
                    'mobileNo' => $_POST['mobileNo'],
                    'phoneNo' => $_POST['phoneNo'],
                    'address' => $_POST['address'],
                    'companyName' => $_POST['companyname'],
                    'city' => $_POST['city'],
                    'area' => isset($areaid) ? $areaid : $_POST['area'],
                    'modified' => time(),
                );

                $userobj = new User();
                $userobj->updateUser($data, 'id=' . $_POST['uid']);

                setmessage('Account updated successfully');
                redirect('manage/user/id/' . $_POST['uid']);
            }

            $cityobj = new City;
            $cities = $cityobj->getCities();

            $areaobj = new Area;
            $areas = $areaobj->getAreas();
            $otherareaname = $areaobj->getAreasNameBy($useresults['area'], 0);
            $package = new Package;
            $userPackage = new UserPackage;
            $status = $userPackage->checkMembershipStatus($useresults['id'], $useresults['remainingCredits'], $useresults['memberExpiryDate']);

            return array('title' => 'My Account',
                'userresults' => $useresults,
                'cities' => $cities,
                'areas' => $areas,
                'view' => 'userform',
                'packages' => $package->fetchPackage(),
                'otherareaname' => $otherareaname,
                'status' => $status,
                'page'=>0);
        } elseif (isset($arg['delete'])) {
            $user->deleteUser($arg['delete']);
            setmessage('User has been successfully deleted.');
           // $propert
            redirect('manage/user/page/'.$arg['page']);
        } else {

            include 'component/Pagination.php';
            $page = isset($arg['page']) ? $arg['page'] : 1;
            $limit = 10;
            $pagination = pagination(BASE_URL . 'manage/user', $page, $user->UserCount(), $limit);
            
            
            return array('pagination' => $pagination, 'title' => 'Users', 'users' => $user->fetchUsers($pagination['start'], $limit));
        }
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
                'activationDate'=> time(),
                'remainingCredits' => ($usresult['remainingCredits'] + $result['credits']),
                'memberExpiryDate' => ($usresult['memberExpiryDate'] == 0) ? (strtotime(date('Y-m-d')) + 86400 * $result['days']) : ($usresult['memberExpiryDate'] + 86400 * $result['days']),
                    ), 'id=' . $_POST['uid']);

            $userpackage->addUserPackage(array(
                'packageId' => $_POST['package'],
                'credits' => $result['credits'],
                'days' => $result['days'],
                'uid' => $_POST['uid'],
                'activation' => time())
            );
            setmessage('Package has been succesfully added');
            redirect('manage/user/id/' . $_POST['uid']);
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
        setmessage('Package has been succesfully removed.');
        redirect('manage/user/id/' . $_POST['uid']);
    }

    function actionAddDaysPackage() {
        $user = new User;
        $usresult = $user->getuserById($_POST['uid']);
        $user->updateUser(array(
            'remainingCredits' => ($usresult['remainingCredits'] + $_POST['adddays'])
                ), 'id=' . $_POST['uid']);

        setmessage('Days has been succesfully added to the package.');
        redirect('manage/user/id/' . $_POST['uid']);
    }

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
            move_uploaded_file($_FILES['banner_path']['tmp_name'], MEDIA_PATH . $filename);
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
                    move_uploaded_file($_FILES['banner_path']['tmp_name'], MEDIA_PATH . $filename);
                    $postdata['banner_path'] = $filename;
                }
                $banner->updateBanner($postdata, 'id=' . $_POST['bid']);
                setmessage('Banner is successfully updated');
                redirect('manage/editbanner/id/' . $arg['id']);
            }
        }
        return array('title' => 'Admin Login', 'bannerdata' => $bd);
    }

    function actionActivate($arg) {
        $user = new User;
        $user->updateUser(array('status' => 1), 'id=' . $arg['id']);
        
        setmessage('User has been successfully activated');
        redirect('manage/user/page/'.$arg['page']);
    }

    function actionDeActivate($arg) {
        $user = new User;
        $user->updateUser(array('status' => 0), 'id=' . $arg['id']);
        $property = new Property;
        $property->expireProperty($arg['id']);
        setmessage('User has been successfully deactivated');
        redirect('manage/user/page/'.$arg['page']);
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
