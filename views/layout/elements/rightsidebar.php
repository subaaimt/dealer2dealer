<div class="right_image">
    <ul>
        <?php foreach ($_SESSION['banners'] as $center) {
            if ($center['position'] == 'right') { ?>
                <li style="height: 160px; background-color:#FFFFFF;">   
                    
                     <?php
                    if (!empty($center['url'])) {
                                                ?>

                                                <a target='_blank' href='<?php echo $center['url'] ?>'>
                                                <?php } ?>
<img src="<?php echo BASE_URL . 'media/banner/' . $center['banner_path']; ?>" alt="<?php echo $center['title'] ?>" style="margin-top:10px; padding:0px; background-color:#FFFFFF;"/>                                    


<?php
                                                if (!empty($center['url'])) {
                                                    ?>
                                                </a> 
                                            <?php } ?> 
<h3 style="background-color:#FFFFFF; color:#999999; margin:0px; padding:0px;"> <?php echo $center['title'] ?>
                    </h3></li>
    <?php }
} ?></ul>
</div>







