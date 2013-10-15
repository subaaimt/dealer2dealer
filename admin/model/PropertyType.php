<?php

class PropertyType {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'propertytypes';
    }

    function getPropertyTypes() {
        $proptytype = array();
        foreach ($this->db->fetch_all_array('SELECT * FROM ' . $this->tbl . '') as $data) {
            if (!isset($proptytype[$data['category_id']])) {
                $proptytype[$data['category_id']] = array();
            }
            array_push($proptytype[$data['category_id']], $data);
        }
        return $proptytype;
    }

    function getProperty() {
        $proptytype = array();
        foreach ($this->db->fetch_all_array('SELECT * FROM ' . $this->tbl . '') as $data) {
            $proptytype[$data['id']]=$data['type'];
        }
        return $proptytype;
    }

}