<?php

class User {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'users';
    }

    function checkemailid($email) {
        return $this->db->query_first('SELECT name,email,imagepath FROM ' . $this->tbl . ' WHERE email="' . $email . '"');
    }

    function addUser($data) {
        $this->db->query_insert($this->tbl, $data);
    }

    function autheticate($postdata) {
        return $this->db->query_first('SELECT * FROM ' . $this->tbl . ' WHERE email="' . $postdata['d2demail'] . '" AND password="' . md5($postdata['d2dpassword']) . '" AND status =1');
    }

    function startusersession($userdata) {
        $_SESSION['userdata'] = $userdata;
        $this->updateLogin($userdata['id']);
    }

    function getuserById($id) {
        return $this->db->query_first('SELECT * FROM ' . $this->tbl . ' WHERE id="' . $id . '"');
    }

    function getUserProfile($id) {

        return $this->db->query_first('SELECT optionalmobileNo,currentPackId,memberExpiryDate,remainingCredits,imagepath,name,mobileNo,phoneNo,address,city,area,email,companyName,lastLogin,localityName, city_name FROM `users` JOIN `areas` ON `users`.area=`areas`.id JOIN cities ON 
`users`.city=`cities`.id WHERE `users`.id=' . $id);
    }

    function updateUser($data, $uid) {
        return $this->db->query_update($this->tbl, $data, 'id=' . $uid);
    }

    function updateLogin($uid) {
        return $this->db->query_update($this->tbl, array('lastLogin' => time()), 'id=' . $uid);
    }

    function fetchUsers($cond = 1) {

        return $this->db->fetch_all_array('SELECT * FROM ' . $this->tbl . ' WHERE 1 ' . $cond);
    }

}
