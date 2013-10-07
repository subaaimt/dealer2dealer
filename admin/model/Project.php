<?php

class Project {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'projects';
    }

    function addProject($data) {
        $this->db->query_insert($this->tbl, $data);
    }

    function fetchProjects($cond = '', $offset=0, $limit=10) {

        return $this->db->fetch_all_array('SELECT * FROM ' . $this->tbl . ' WHERE 1 ' . $cond.' LIMIT ' . $offset . ',' . $limit);
    }
     function fetchProjectsCount($cond = '') {
        $count = $this->db->query_first('SELECT count(*) as count FROM ' . $this->tbl . ' WHERE 1 ' . $cond);

        return $count['count'];
    }

    function fetchProject($cond) {
        return $this->db->query_first('SELECT * FROM ' . $this->tbl . ' WHERE ' . $cond);
    }

    function deleteProject($cond) {
        return $this->db->query('DELETE FROM ' . $this->tbl . ' WHERE '.$cond);
    }

    function updateProject($data, $cond) {
        return $this->db->query_update($this->tbl, $data, $cond);
    }

    function projectFieldRelation() {
        return array(
            5=>array('bedrooms', 'bathrooms', 'floors', 'totalfloors', 'coveredarea'),
            10=>array('bedrooms'),
            11=>array('bedrooms'),
            12=>array('bedrooms','bathrooms'),
            14=>array('bedrooms', 'bathrooms', 'floors', 'totalfloors', 'coveredarea'),
            15=>array('bedrooms'),
            18=>array('bedrooms', 'bathrooms', 'floors', 'totalfloors', 'coveredarea'),
            19=>array('bedrooms', 'bathrooms', 'floors', 'totalfloors', 'coveredarea'),
            20=>array('bedrooms'),
            21=>array('bedrooms', 'bathrooms', 'floors', 'totalfloors', 'coveredarea'),
            22=>array('bedrooms', 'bathrooms', 'floors', 'totalfloors', 'coveredarea'),
            23=>array('bedrooms', 'bathrooms', 'floors', 'totalfloors', 'coveredarea'),
        );
        
    }
    
     function projectVariableFields() {
        return array('bedrooms', 'bathrooms', 'furnished', 'floors', 'totalfloors', 'coveredarea');
    
    }


}
