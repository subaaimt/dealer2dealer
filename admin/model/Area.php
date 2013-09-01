<?php

class Area {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'areas';
        $this->parent = 'cities';
    }

    function getAreas() {

        return $this->db->fetch_all_array('SELECT * FROM ' . $this->tbl . ' WHERE status=1');
    }

    function getCities() {
        return $states = $this->db->fetch_all_array('SELECT * FROM ' . $this->tbl . '');
    }
function getAreasNameBy($areaid, $status=1) {
        return ( $this->db->query_first('SELECT * FROM ' . $this->tbl . ' WHERE id = "'.$areaid.'" AND status="'.$status.'"'));
}
    function addArea($data) {
        $this->db->query_insert($this->tbl, $data);
    }

    function deleteArea($id) {
        return $this->db->query("DELETE FROM " . $this->tbl . " WHERE id=" . $id);
    }

    function fetchAreas($offset = 0, $limit = 10,$status=1) {
        $query = 'SELECT *,'.$this->tbl.'.id as aid FROM ' . $this->tbl . '   LEFT JOIN '.$this->parent.' ON cityId='.$this->parent.'.id WHERE status='.$status.' LIMIT ' . $offset . ',' . $limit;
        return $this->db->fetch_all_array($query);
    }

    function fetchAreadata($id) {
        $query = 'SELECT * FROM ' . $this->tbl . ' WHERE id=' . $id;
        return $this->db->query_first($query);
    }

    function updateArea($data, $cond) {
        return $this->db->query_update($this->tbl, $data, $cond);
    }

    function AreaCount($status=1) {
        $query = 'SELECT COUNT(*) as count FROM ' . $this->tbl.' where status='.$status;
        $cnt = $this->db->query_first($query);
        return $cnt['count'];
    }

}
