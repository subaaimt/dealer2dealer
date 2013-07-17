<?php

class State {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'states';
    }

    function getStates(){
        return $states = $this->db->fetch_all_array('SELECT * FROM '.$this->tbl.'');

    }
  
}
