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
    }

    function getuserById($id) {
        return $this->db->query_first('SELECT * FROM ' . $this->tbl . ' WHERE id="' . $id . '"');
    }
    
     function updateUser($data,$uid){
         return $this->db->query_update($this->tbl,$data,'id='.$uid );
     }

}
