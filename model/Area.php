<?php

class Area {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'areas';
    }

    function getAreas() {
        
        return $this->db->fetch_all_array('SELECT * FROM ' . $this->tbl . ' WHERE status=1');
    }

     function getAreasByCity($cityid) {
        return $this->db->fetch_all_array('SELECT * FROM ' . $this->tbl . ' WHERE cityId = "'.$cityid.'" AND  status=1');
    }
    
    function getAreasNameBy($areaid, $status=1) {
        return ( $this->db->query_first('SELECT * FROM ' . $this->tbl . ' WHERE id = "'.$areaid.'" AND status="'.$status.'"'));
      
    }
    
    function addBulkarea($citydata, $areaid) {
        foreach ($citydata as $c) {
            $this->db->query_insert($this->tbl, array('localityName' => $c, 'cityId' => $areaid));
        }
    }
    function addarea($cityid, $area) {
                return $this->db->query_insert($this->tbl, array('localityName' => $area, 'cityId' => $cityid));
        
    }
     function updatearea($id, $area) {
                return $this->db->query_update($this->tbl, array('localityName' => $area), ' id='.$id);
        
    }

}
