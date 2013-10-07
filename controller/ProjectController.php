<?php

class ProjectController {

    public function __construct($args) {
        new ACL($args, array(
                    'regis' => getActions($this),
                        )
        );
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
        include 'component/Pagination.php';
        $page = isset($rq['page']) ? $rq['page'] : '/page/1';
        $page = str_replace('/page/', '', $page);
        $limit = 10;
        $cond = 'AND projects.status = "published"  ORDER BY projects.created DESC';

        $requeturi = str_replace('&page=/page/' . $page, '', strstr($_SERVER['REQUEST_URI'], '?'));
        $pagination = pagination(BASE_URL . 'project/searchresult' . $requeturi . '&page=', $page, $property->fetchProjectsCount($cond), $limit);

        $result = $property->fetchProjects($query . ' AND  status = "published"',$pagination['start'], $limit);
        return(array('layout' => 'dealerlayout', 'projects' => $result,'pagination'=>$pagination['pagination']));
    }

}