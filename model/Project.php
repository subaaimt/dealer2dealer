<?php

class Project {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'projects';
    }

    function addProject($data) {
        $this->db->query_insert($this->tbl, $data);
    }

    function fetchProjects($cond = 1) {

        return $this->db->fetch_all_array('SELECT * FROM ' . $this->tbl . ' WHERE 1 ' . $cond);
    }

    function fetchProject($cond) {
        return $this->db->query_first('SELECT * FROM ' . $this->tbl . ' WHERE ' . $cond);
    }

    function deleteProject($cond) {
        return $this->db->query_update($this->tbl, array('status' => 'deleted'), $cond);
    }

    function updateProject($data, $cond) {
        return $this->db->query_update($this->tbl, $data, $cond);
    }

   

}
