
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
