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
}else{?>

<div class="left_image leftslider" style="background-color:#FFFFFF;">
    <ul>
        <?php foreach ($_SESSION['banners'] as $center) {
            if ($center['position'] == 'left') { ?>
                <li style="height: 80px; background-color:#FFFFFF;">    
                <img  src="<?php echo BASE_URL . 'media/banner/' . $center['banner_path']; ?>" alt="<?php echo $center['title'] ?>" style="margin:0px; padding:0px; background-color:#FFFFFF;" height="20px"/>                                    

                    <h3 style="background-color:#FFFFFF;color:#999999; margin:0px; margin-bottom:-50px; padding:0px;"> <?php echo $center['title'] ?>
                    </h3></li>
    <?php }
} ?>

    </ul>
</div> 
<?php } ?>
