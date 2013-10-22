<?php

class User {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'users';
    }

    function fetchUsers($offset=0, $limit=10) {
         $query = 'SELECT * FROM ' . $this->tbl . ' ORDER BY modified DESC LIMIT '.$offset.','.$limit;
        return $this->db->fetch_all_array($query);
    }
    
    function deleteUser($uid) {
          $query = 'DELETE FROM '.$this->tbl.' WHERE id='.$uid;
      
        return $this->db->query($query);
    }
    
   function UserCount() {
        $query = 'SELECT COUNT(*) as count FROM ' . $this->tbl;
        $cnt = $this->db->query_first($query);
        return $cnt['count'];
    }

    function updateUser($data, $cond) {
        return $this->db->query_update($this->tbl, $data, $cond);
    }

    function getuserById($id) {
        return $this->db->query_first('SELECT * FROM ' . $this->tbl . ' WHERE id="' . $id . '"');
    }
    
    

    function getUserProfile($id) {
        return $this->db->query_first('SELECT imagepath,name,mobileNo,phoneNo,address,city,area,email,companyName,lastLogin,localityName, city_name FROM `users` JOIN `areas` ON `users`.area=`areas`.id JOIN cities ON 
`users`.city=`cities`.id WHERE `users`.id=' . $id);
    }

}
