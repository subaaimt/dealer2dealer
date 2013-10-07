<?php $rq = getrequesturi(); ?>
<?php if (isset($rq['city']) && !empty($rq['city'])) { ?>
    <h3> <?php
        echo $cityarray[$rq['city']];
        $area = new Area;
       
        
            ?> </h3>
<ul>
<?php foreach ($area->getAreasByCity($rq['city']) as $value) {?>       

            <li> <a href="<?php echo BASE_URL?>property/searchresult?city=<?php echo $rq['city']?>&area=<?php echo $value['id']?>" > <img src="<?php echo BASE_URL ?>img/arrowr.gif"/> <?php echo $value['localityName']?> </a></li>

    <?php
    }
    ?>
</ul>  
            <?php
}?>