<?php

class City {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'cities';
    }

    function getCities() {
        return $states = $this->db->fetch_all_array('SELECT * FROM ' . $this->tbl . '');
    }

    function addCity($data) {
        $this->db->query_insert($this->tbl, $data);
    }

    function deleteCity($id) {
        return $this->db->query("DELETE FROM " . $this->tbl . " WHERE id=" . $id);
    }

    function fetchCities($offset = 0, $limit = 10) {
        $query = 'SELECT * FROM ' . $this->tbl . ' LIMIT ' . $offset . ',' . $limit;
        return $this->db->fetch_all_array($query);
    }

    function fetchCitydata($id) {
        $query = 'SELECT * FROM ' . $this->tbl . ' WHERE id=' . $id;
        return $this->db->query_first($query);
    }

    function updateCity($data, $cond) {
        return $this->db->query_update($this->tbl, $data, $cond);
    }

    function CityCount() {
        $query = 'SELECT COUNT(*) as count FROM ' . $this->tbl;
        $cnt = $this->db->query_first($query);
        return $cnt['count'];
    }

}
