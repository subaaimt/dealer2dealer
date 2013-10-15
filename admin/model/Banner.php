<?php

class Banner {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'banners';
    }

    function addBanner($data) {
      $this->db->query_insert($this->tbl, $data);
       
    }
    
     function fetchActiveBanner() {
        $query = 'SELECT * FROM ' . $this->tbl . ' WHERE status=1';
        return $this->db->fetch_all_array($query);
       
    }
    
     function fetchBanner($offset=0, $limit=10) {
        $query = 'SELECT * FROM ' . $this->tbl . ' LIMIT '.$offset.','.$limit;
        return $this->db->fetch_all_array($query);
       
    }
    function deleteBanner($id){
         return $this->db->query("DELETE FROM ".$this->tbl." WHERE id=".$id);
    }
    
     function BannerCount() {
        $query = 'SELECT COUNT(*) as count FROM ' . $this->tbl;
        $cnt = $this->db->query_first($query);
        return $cnt['count'];
    }
    
    function fetchBannerdata($id) {
       $query =  'SELECT * FROM ' . $this->tbl . ' WHERE id='.$id;
        return $this->db->query_first($query);
       
    }
    
     function updateBanner($data,$cond) {
      return $this->db->query_update($this->tbl, $data, $cond);
    }
}
