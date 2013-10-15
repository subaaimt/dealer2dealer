<?php

class AgentController {

    public function __construct($args) {
        $acl = new ACL($args, array(
                    'regis' => getActions($this),
                        )
        );
          $acl->expirestatus();
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
            $query .= ' AND name LIKE "%' . $rq['q'] . '%" OR  companyName LIKE "%' . $rq['q'] . '%"';
        }
        if (isset($rq['agentcity']) && !empty($rq['agentcity'])) {
            $query .= ' AND city =' . $rq['agentcity'];
        }
        if (isset($rq['agentarea']) && !empty($rq['agentarea'])) {
            $query .= ' AND area =' . $rq['agentarea'];
        }
        $query .= '  AND  users.status = 1';
        include 'component/Pagination.php';
         $page = isset($rq['page']) ? $rq['page'] : '/page/1';
       $page = str_replace('/page/', '', $page);
        $limit = 10;
       
        
        $requeturi = str_replace('&page=/page/'.$page, '', strstr($_SERVER['REQUEST_URI'], '?'));
        $pagination = pagination(BASE_URL . 'agent/searchresult'.$requeturi.'&page=', $page, $users->UserCount($query), $limit);
        

        $result = $users->fetchUsers($query,$pagination['start'], $limit);
       
        return(array('layout' => 'dealerlayout', 'users' => $result,'pagination'=>$pagination['pagination']));
    }

}