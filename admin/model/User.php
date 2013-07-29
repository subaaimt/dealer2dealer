<?php

class User {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'users';
    }

    function fetchUsers() {
       $query =  'SELECT * FROM ' . $this->tbl . '';
        return $this->db->fetch_all_array($query);
    }
    
     function updateUser($data,$cond) {
      return $this->db->query_update($this->tbl, $data, $cond);
    }
}
