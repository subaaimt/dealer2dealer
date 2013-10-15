<?php

class Property {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'properties';
    }

    function addProperty($data) {
        $this->db->query_insert($this->tbl, $data);
    }

    function fetchProperties($cond = 1) {

        return $this->db->fetch_all_array('SELECT * FROM ' . $this->tbl . ' WHERE 1 ' . $cond);
    }

    function fetchProperty($cond) {
        return $this->db->query_first('SELECT * FROM ' . $this->tbl . ' WHERE ' . $cond);
    }

    function deleteProperty($cond) {

        return $this->db->query('DELETE FROM ' . $this->tbl . ' WHERE  ' . $cond);
    }

    function updateProperty($data, $cond) {
        return $this->db->query_update($this->tbl, $data, $cond);
    }

    function rooms() {
        $range = range(1, 10);
        array_push($range, '>10');
        return $range;
    }

    function floors() {
        $range = range(1, 100);

        return array_merge(array('Lower Basement', 'Upper Basement', 'Ground'), $range);
    }

    function expireProperty($uid) {
        $this->updateProperty(array('status'=>'expired'), 'user_id='.$uid);
     
    }

}
