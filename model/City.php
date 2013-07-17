<?php

class City {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'cities';
    }

    function getCities(){
        return $states = $this->db->fetch_all_array('SELECT * FROM '.$this->tbl.'');

    }
  
}
