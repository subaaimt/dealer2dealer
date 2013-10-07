<?php

class Category {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'categories';
    }
function getCategories(){
        return $this->db->fetch_all_array('SELECT * FROM '.$this->tbl.'');

    }
}