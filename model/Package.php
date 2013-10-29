<?php

class Package {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'packages';
    }

    function addPackage($data) {
        $this->db->query_insert($this->tbl, $data);
    }

    function fetchPackage() {
        $query = 'SELECT * FROM ' . $this->tbl . '';
        return $this->db->fetch_all_array($query);
    }

    function fetchPackagedata($id) {
        $query = 'SELECT * FROM ' . $this->tbl . ' WHERE id=' . $id;
        
        return $this->db->query_first($query);
    }

    function updatePackage($data, $cond) {
        return $this->db->query_update($this->tbl, $data, $cond);
    }

}
