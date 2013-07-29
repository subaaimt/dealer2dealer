<?php

class Banner {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'banners';
    }

    function addBanner($data) {
      $this->db->query_insert($this->tbl, $data);
       
    }
    
     function fetchBanner() {
       $query =  'SELECT * FROM ' . $this->tbl . '';
        return $this->db->fetch_all_array($query);
       
    }
    function fetchBannerdata($id) {
       $query =  'SELECT * FROM ' . $this->tbl . ' WHERE id='.$id;
        return $this->db->query_first($query);
       
    }
    
     function updateBanner($data,$cond) {
      return $this->db->query_update($this->tbl, $data, $cond);
    }
}
