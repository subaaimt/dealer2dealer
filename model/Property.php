<?php

class Property {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'properties';
    }

    function addProperty($data) {
        $this->db->query_insert($this->tbl, $data);
    }

    function fetchProperties($cond = '', $offset = 0, $limit = 10) {
        return $this->db->fetch_all_array('SELECT *,' . $this->tbl . '.id as pid,' . $this->tbl . '.created as postedon FROM ' . $this->tbl . ' 
            JOIN users ON users.id=' . $this->tbl . '.user_id
             WHERE 1 ' . $cond . ' LIMIT ' . $offset . ',' . $limit);
    }

    function fetchPropertiesCount($cond = '') {
        $count = $this->db->query_first('SELECT count(*) as count FROM ' . $this->tbl . ' WHERE 1 ' . $cond);

        return $count['count'];
    }

    function fetchProperty($cond) {
        return $this->db->query_first('SELECT *,' . $this->tbl . '.id as pid, ' . $this->tbl . '.type as ptype, 
            ' . $this->tbl . '.city as pcity, ' . $this->tbl . '.area as parea FROM ' . $this->tbl . ' 
            JOIN users ON users.id=' . $this->tbl . '.user_id JOIN cities on cities.id=users.city 
                JOIN areas ON areas.id=users.area  JOIN propertytypes on propertytypes.id=properties.type WHERE ' . $cond);
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
        $this->updateProperty(array('status' => 'expired'), 'user_id=' . $uid);
    }

    function propertyFieldRelation() {
        return array(
            5=>array('bedrooms', 'bathrooms', 'furnished', 'floors', 'totalfloors', 'coveredarea'),
            10=>array('bedrooms'),
            11=>array('bedrooms'),
            12=>array('bedrooms','bathrooms'),
            14=>array('bedrooms', 'bathrooms', 'furnished', 'floors', 'totalfloors', 'coveredarea'),
            15=>array('bedrooms'),
            18=>array('bedrooms', 'bathrooms', 'furnished', 'floors', 'totalfloors', 'coveredarea'),
            19=>array('bedrooms', 'bathrooms', 'furnished', 'floors', 'totalfloors', 'coveredarea'),
            20=>array('bedrooms'),
            21=>array('bedrooms', 'bathrooms', 'furnished', 'floors', 'totalfloors', 'coveredarea'),
            22=>array('bedrooms', 'bathrooms', 'furnished', 'floors', 'totalfloors', 'coveredarea'),
            23=>array('bedrooms', 'bathrooms', 'furnished', 'floors', 'totalfloors', 'coveredarea'),
        );
        
    }
    
     function propertyVariableFields() {
        return array('bedrooms', 'bathrooms', 'furnished', 'floors', 'totalfloors', 'coveredarea');
    
    }

}
