<h2> Feature Builders </h2> <br/>

<div class="left_image leftslider">
    <ul>
        <?php foreach ($_SESSION['banners'] as $center) {
            if ($center['position'] == 'left') { ?>
                <li style="height: 108px;">    <img  src="<?php echo BASE_URL . 'media/banner/' . $center['banner_path']; ?>" alt="<?php echo $center['title'] ?>" />                                    

                    <p> <?php echo $center['title'] ?>
                    </p> <br/></li>
    <?php }
} ?>

    </ul>
</div> 
