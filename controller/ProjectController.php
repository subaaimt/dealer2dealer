<?php

class ProjectController {

    public function __construct($args) {
       $acl = new ACL($args, array(
                    'regis' => getActions($this),
                        )
        );
        $acl->expirestatus();
    }

    function actionView($args) {
        $project = new Project();

        return array(
            'layout' => 'dealerlayout',
            'projectFieldRelation' => ($project->projectFieldRelation()),
            'project' =>
            $project->fetchProject('projects.id=' . $args['id']));
    }

    function actionSearch($args) {
        $cityobj = new City;
        $cities = $cityobj->getCities();

        $areaobj = new Area;
        $areas = $areaobj->getAreas();
        return(array('layout' => 'dealerlayout', 'areas' => $areas, 'cities' => $cities));
    }

    function actionSearchResult() {
        $property = new Project;

        $rq = getrequesturi();
        $query = '';
        if (isset($rq['q']) && !empty($rq['q'])) {
            $query .= ' AND name LIKE "%' . $rq['q'] . '%" OR  name LIKE "%' . $rq['q'] . '%" OR name LIKE "%' . $rq['q'] . '%"';
        }
        if (isset($rq['city']) && !empty($rq['city'])) {
            $query .= ' AND city =' . $rq['city'];
        }
        if (isset($rq['area']) && !empty($rq['area'])) {
            $query .= ' AND area =' . $rq['area'];
        }
        
       $query .= ' AND  status = "published"';
        include 'component/Pagination.php';
        $page = isset($rq['page']) ? $rq['page'] : '/page/1';
        $page = str_replace('/page/', '', $page);
        $limit = 10;
       

        $requeturi = str_replace('&page=/page/' . $page, '', strstr($_SERVER['REQUEST_URI'], '?'));
        $pagination = pagination(BASE_URL . 'project/searchresult' . $requeturi . '&page=', $page, $property->fetchProjectsCount($query), $limit);

        $result = $property->fetchProjects($query ,$pagination['start'], $limit);
        return(array('layout' => 'dealerlayout', 'projects' => $result,'pagination'=>$pagination['pagination']));
    }

}