<?php

class Admin {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'admin';
    }

    function authenticate($data) {
        
       $query =  'SELECT * FROM ' . $this->tbl . ' WHERE username="'.$data['admin_user'].'" AND password="'.md5($data['admin_pass']).'"';
        return $this->db->query_first($query);
    }

     
     

}
