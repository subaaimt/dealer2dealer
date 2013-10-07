<?php

class User {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'users';
    }

    function checkemailid($email, $option = array()) {
        if (isset($option['forget'])) {
            $cond = ' AND status=1';
        } else {
            $cond = '';
        }
        return $this->db->query_first('SELECT name,email,imagepath FROM ' . $this->tbl . ' WHERE email="' . $email . '" ' . $cond);
    }

    function addUser($data) {
        return $this->db->query_insert($this->tbl, $data);
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

        return $this->db->query_first('SELECT users.id as id,activationDate,created,optionalmobileNo,currentPackId,memberExpiryDate,remainingCredits,imagepath,name,mobileNo,phoneNo,address,city,area,email,companyName,lastLogin,localityName, city_name FROM `users` JOIN `areas` ON `users`.area=`areas`.id JOIN cities ON 
`users`.city=`cities`.id WHERE `users`.id=' . $id);
    }

    function updateUser($data, $uid) {
        return $this->db->query_update($this->tbl, $data, 'id=' . $uid);
    }

    function addTokenUser($data, $email) {
        return $this->db->query_update($this->tbl, $data, 'email="' . $email.'"');
    }
    
    function checkToken($token) {       
        return $this->db->query_first('SELECT id FROM ' . $this->tbl . ' WHERE token="' . $token . '"');    
    }
    
    function changePassword($data, $token) {
        return $this->db->query_update($this->tbl, $data, 'token="' . $token.'"');
    }
    
    function updateLogin($uid) {
        return $this->db->query_update($this->tbl, array('lastLogin' => time()), 'id=' . $uid);
    }

    function fetchUsers($cond = '',$offset=0, $limit=10) {

        return $this->db->fetch_all_array('SELECT * FROM ' . $this->tbl . ' JOIN `areas` ON `users`.area=`areas`.id JOIN cities ON 
`users`.city=`cities`.id  WHERE 1 AND ' . $this->tbl . '.status=1' . $cond. ' LIMIT ' . $offset . ',' . $limit);
    }
function UserCount($cond = '') {

       $count = $this->db->query_first('SELECT count(*) as count FROM ' . $this->tbl . ' WHERE 1 AND status=1' . $cond);

        return $count['count'];
    }
}
