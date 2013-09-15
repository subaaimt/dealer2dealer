 			



<h2 style=""> Feature Projects </h2> 

<div class="right_image">

    <ul>
        <?php foreach ($_SESSION['banners'] as $center) {
            if ($center['position'] == 'right') { ?>
                <li>     <img  src="<?php echo BASE_URL . 'media/banner/' . $center['banner_path']; ?>" alt="<?php echo $center['title'] ?>" />                                    

                    <p> <?php echo $center['title'] ?>
                    </p> <br/></li>
    <?php }
} ?></ul>
</div>







