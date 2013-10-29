<?php

class MicrositeController {

    public function __construct($args) {
        
    }

    function actionAdd() {
        if (!empty($_POST)) {
            $filename = mt_rand() . '__' . str_replace(" ", "_", clean($_FILES['microsite_path']['name']));
            $microsite = new Microsite();
            $postdata = array('title' => $_POST['title'],
                'url' => SITE_URL . 'realstate/' . strtolower(clean($_POST['title'])) . '/index.html',
                'modified' => time(), 'created' => time());
            $microsite->addMicrosite($postdata);


            move_uploaded_file($_FILES['microsite_path']['tmp_name'], MICROSITE_PATH . $filename);
            $dir = MICROSITE_PATH . strtolower(clean($_POST['title']));
            mkdir($dir);
            $zip = new ZipArchive;
            $res = $zip->open(MICROSITE_PATH . $filename);
            if ($res === TRUE) {
                $zip->extractTo($dir . '/');

                $zip->close();
            }
            unlink(MICROSITE_PATH . $filename);
            setmessage('Microsite has been succesfully added');

            redirect('microsite/manage');
        }
        return array('title' => 'Add Microsite');
    }

    function actionDelete($arg) {
        $microsite = new Microsite();
        $bd = $microsite->fetchMicrositedata($arg['id']);
        $microsite->deleteMicrosite($arg['id']);
        $this->deleteDirectory(MICROSITE_PATH . strtolower(clean($bd['title'])));
        setmessage("Microsite has been successfully deleted.");
        redirect('microsite/manage');
    }

    function actionEdit($arg) {
        $microsite = new Microsite();
        $bd = $microsite->fetchMicrositedata($arg['id']);
        if (!empty($_POST)) {
            $filename = mt_rand() . '__' . str_replace(" ", "_", $_FILES['microsite_path']['name']);
            $microsite = new Microsite();
            $postdata = array('title' => $_POST['title'],
                'url' => SITE_URL . 'realstate/' . strtolower(clean($_POST['title'])) . '/index.html',
                'modified' => time());


            $dir = MICROSITE_PATH . strtolower(clean($_POST['title']));
            if (!empty($_FILES['microsite_path']['tmp_name'])) {
                $this->deleteDirectory(MICROSITE_PATH . strtolower(clean($bd['title'])));
                move_uploaded_file($_FILES['microsite_path']['tmp_name'], MICROSITE_PATH . $filename);

                $zip = new ZipArchive;
                $res = $zip->open(MICROSITE_PATH . $filename);
                if ($res === TRUE) {
                    $zip->extractTo($dir . '/');

                    $zip->close();
                }
                unlink(MICROSITE_PATH . $filename);
            } else if ($bd['title'] != $_POST['title']) {

                rename(MICROSITE_PATH . strtolower(clean($bd['title'])), MICROSITE_PATH . strtolower(clean($_POST['title'])));
            }

            $microsite->updateMicrosite($postdata, 'id=' . $_POST['mid']);
            setmessage('Microsite is successfully updated');
            redirect('microsite/edit/id/' . $arg['id']);
        }

        return array('title' => 'Admin Login', 'micrositedata' => $bd);
    }

    function actionManage($arg) {

        $microsite = new Microsite();
        include 'component/Pagination.php';
        $page = isset($arg['page']) ? $arg['page'] : 1;
        $limit = 10;
        $pagination = pagination(BASE_URL . 'manage/microsite', $page, $microsite->MicrositeCount(), $limit);
        return array('title' => 'Microsite Login', 'microsites' => $microsite->fetchMicrosite($pagination['start'], $limit), 'pagination' => $pagination);
    }

    function deleteDirectory($dir) {
        if (!file_exists($dir))
            return true;
        if (!is_dir($dir))
            return unlink($dir);
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..')
                continue;
            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item))
                return false;
        }
        return rmdir($dir);
    }

    function actionCheckMicroSiteTitle() {
        $microobj = new Microsite;
        if ($microobj->checkMicrositeDirectory($_POST['title'], $arg)) {
            echo json_encode(array('status' => 1));
        } else {
            echo json_encode(array('status' => 0));
        }
        die;
    }

}

