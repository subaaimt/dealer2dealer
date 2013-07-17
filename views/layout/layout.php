<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo SITE_NAME . ' - ' . $title; ?></title>
         <link href="<?php echo BASE_URL ?>css/bootstrap_custom.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo BASE_URL ?>css/main.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL ?>css/bar/bar.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL ?>css/dark/dark.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL ?>css/default/default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL ?>css/light/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL ?>css/nivo-slider.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL ?>css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" media="screen, print, handheld" type="text/css" href="<?php echo BASE_URL ?>/css/calendar.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>css/jqueryslidemenu.css" />
         <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>asset/ajaxloader/ajaxloader.css" />

        <?php getCss(); ?>

        <script type="text/javascript" src="<?php echo BASE_URL ?>js/calendar.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL ?>js/jqueryslidemenu.js"></script>
        <script src="<?php echo BASE_URL ?>js/jquery.js"></script>
       <script src="<?php echo BASE_URL ?>asset/ajaxloader/jquery.ajaxloader.1.5.1.js"></script>
        <script src="<?php echo BASE_URL ?>js/site.js"></script>
        
        <?php getJs(); ?>
        <script type="text/javascript">
            var baseurl = '<?php echo BASE_URL; ?>';
        </script>
    </head>




    <!--[if lte IE 7]>
    <style type="text/css">
    html .jqueryslidemenu{height: 1%;} /*Holly Hack for IE7 and below*/
    </style>
    <![endif]-->




    <body>
        <div class="container">

            <?php include_once('views/layout/elements/header.php'); ?>


            <div class="main">
                <div id="myslidemenu" class="jqueryslidemenu">
                    <div>
                        <?php include_once('views/layout/elements/menu.php'); ?>
                    </div>
                </div>    



                <div class="maincontent"> 
                    <div class="sidebar_left">

                        <?php include_once('views/layout/elements/leftsidebar.php'); ?>
                    </div>



                    <div class="content">



                        <?php echo $viewcontent; ?>

                     

                    </div>

                    <div class="sidebar_right">


                        <?php include_once('views/layout/elements/rightsidebar.php'); ?>
                    </div>



                </div>

            </div>
            <?php include_once('views/layout/elements/footer.php'); ?>
            <div class="clear"></div>

            <div class="clear"></div>
            <div class="copyright">Copyright &copy; 2013 <a href=""> Deals 2 Dealers </a> - All Rights Reserved. </div>
        </div>
        <!--  Google Analitics -->

        <!--  Google Analitics -->        </div>



    <script type="text/javascript" src="<?php echo BASE_URL; ?>js/jquery.nivo.slider.pack.js"> </script>
    <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider();
        });
         
    </script>

</body>
</html>