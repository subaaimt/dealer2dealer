<html>
    <head>
        <title> DEALS 2 DEALERS </title>
        <link href="<?php echo BASE_URL ?>css/bootstrap_custom.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo BASE_URL ?>css/dealer.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="css/jqueryslidemenu.css" />

        <?php getCss(); ?>

        <link rel="stylesheet" type="text/css" href="css/elastislide.css" />
        
        <script type="text/javascript" src="<?php echo BASE_URL ?>js/jquery.js"></script>
 <script src="<?php echo BASE_URL ?>js/bootstrap.js"></script>
       
        <?php getJs(); ?>
        <script type="text/javascript">
            var baseurl = '<?php echo BASE_URL; ?>';
        </script>
    </head>

    <body>
        <div class="container">

            <?php include_once('views/layout/elements/header_dealer.php'); ?>

            <div class="main">

                <div>
                    <?php include_once('views/layout/elements/dealer_menu.php'); ?>
                </div>




                <div class="maincontent"> 
                    <div class="sidebar_left">

                        <div>
                            <?php include_once('views/layout/elements/regions.php'); ?>
                        </div>
                    </div>



                    <div class="content">


                        <?php echo $viewcontent; ?>


                    </div>

                    <div class="sidebar_right">  
                        <div class="column">
                            <!-- Elastislide Carousel -->
                            <ul id="carousel" class="elastislide-list">
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/4.jpg" alt="image04" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/5.jpg" alt="image05" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/6.jpg" alt="image06" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/7.jpg" alt="image07" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/11.jpg" alt="image11" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/12.jpg" alt="image12" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/13.jpg" alt="image13" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/14.jpg" alt="image14" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/15.jpg" alt="image15" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/16.jpg" alt="image16" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/17.jpg" alt="image17" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/18.jpg" alt="image18" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/19.jpg" alt="image19" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/20.jpg" alt="image20" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/1.jpg" alt="image01" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/2.jpg" alt="image02" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/3.jpg" alt="image03" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/8.jpg" alt="image08" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/9.jpg" alt="image09" /></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL ?>img/small/10.jpg" alt="image10" /></a></li>
                            </ul>
                            <!-- End Elastislide Carousel -->
                        </div>



                    </div>



                </div>

            </div>

            <div class="footer_container">
                <?php include_once('views/layout/elements/footer_dealer.php'); ?>
            </div>

            <div class="copyright">Copyright &copy; 2013 <a href=""> Deals 2 Dealers </a> - All Rights Reserved. </div>
        </div>


       

    </body>
</html>