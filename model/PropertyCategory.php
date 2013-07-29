<?php

class PropertyCategory {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'propertycategories';
    }
function getCategories(){
        return $this->db->fetch_all_array('SELECT * FROM '.$this->tbl.'');

    }
}