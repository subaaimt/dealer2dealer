<?php

class Microsite {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'microsites';
    }

    function addMicrosite($data) {
        $this->db->query_insert($this->tbl, $data);
    }

    function deleteMicrosite($id) {
        return $this->db->query("DELETE FROM " . $this->tbl . " WHERE id=" . $id);
    }

    function fetchMicrositedata($id) {
        $query = 'SELECT * FROM ' . $this->tbl . ' WHERE id=' . $id;
        return $this->db->query_first($query);
    }

    function updateMicrosite($data, $cond) {
        return $this->db->query_update($this->tbl, $data, $cond);
    }

    function MicrositeCount($status = 1) {
        $query = 'SELECT COUNT(*) as count FROM ' . $this->tbl;
        $cnt = $this->db->query_first($query);
        return $cnt['count'];
    }

    function fetchMicrosite($offset = 0, $limit = 10) {
        $query = 'SELECT * FROM ' . $this->tbl . ' LIMIT ' . $offset . ',' . $limit;
        return $this->db->fetch_all_array($query);
    }

}
