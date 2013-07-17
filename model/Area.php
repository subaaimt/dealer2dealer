<?php

class Area {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'areas';
    }

    function getAreas() {
        return $this->db->fetch_all_array('SELECT * FROM ' . $this->tbl . '');
    }

     function getAreasByCity($cityid) {
        return $this->db->fetch_all_array('SELECT * FROM ' . $this->tbl . ' WHERE cityId = "'.$cityid.'"');
    }
    
    function addarea($citydata, $areaid) {
        foreach ($citydata as $c) {
            $this->db->query_insert($this->tbl, array('localityName' => $c, 'cityId' => $areaid));
        }
    }

}
