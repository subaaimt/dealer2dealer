<?php

class UserPackage {

    function __construct() {
        $this->db = new Database();
        $this->tbl = 'userpackage';
    }

    function addUserPackage($data) {
        $this->db->query_insert($this->tbl, $data);
    }

    function fetchUserPackage() {
        $query = 'SELECT * FROM ' . $this->tbl . '';
        return $this->db->fetch_all_array($query);
    }

    function fetchUserPackageById($id) {
        $query = 'SELECT * FROM ' . $this->tbl . ' WHERE id=' . $id;
        return $this->db->query_first($query);
    }

    function updateUserPackage($data, $cond) {
        return $this->db->query_update($this->tbl, $data, $cond);
    }

    function checkMembershipStatus($uid, $credits, $activation) {
        $user = new User;       
        if ($activation == 0) {            
            return false;
        } else if ($activation <= time() && $activation != 0) {
            $user->updateUser(array('remainingCredits'=>0, 'currentPackId' => 0,  'memberExpiryDate' => 0), $uid);
            return false;
        } else if ($credits == 0) {            
            return 2;
        } else {
            return true;
        }
    }

}
