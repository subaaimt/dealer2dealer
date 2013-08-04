<?php

class AgentController {

    public function __construct($args) {
        
    }

    function actionIndex() {
        
    }

    
    function actionSearch($args) {
        $cityobj = new City;
        $cities = $cityobj->getCities();

        return(array('layout' => 'dealerlayout',  'cities' => $cities));
    }

    function actionSearchResult() {
        $users = new User;

        $rq = getrequesturi();
        $query = '';
        if (isset($rq['q']) && !empty($rq['q'])) {
            $query .= ' AND name LIKE "%' . $rq['q'] . '%" OR  name LIKE "%' . $rq['q'] . '%" OR name LIKE "%' . $rq['q'] . '%"';
        }
        if (isset($rq['city']) && !empty($rq['city'])) {
            $query .= ' AND city =' . $rq['city'];
        }
        

        $result = $users->fetchUsers($query . ' AND  status = 1');
       
        return(array('layout' => 'dealerlayout', 'users' => $result));
    }

}