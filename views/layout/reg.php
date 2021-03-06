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
        <script type="text/javascript" src="<?php echo BASE_URL ?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL ?>js/jqueryslidemenu.js"></script>
        <script src="<?php echo BASE_URL ?>js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL ?>js/jcarousellite_1.0.1.js"></script>
        <script src="<?php echo BASE_URL ?>asset/ajaxloader/jquery.ajaxloader.1.5.1.js"></script>
        <script src="<?php echo BASE_URL ?>js/site.js"></script>
        <?php getJs(); ?>
        <script type="text/javascript">
            var baseurl = '<?php echo BASE_URL; ?>';
        </script>
        <script language=JavaScript>                
                var message="Right Click Function Disabled!";
                
                function clickIE4(){
                if (event.button==2){
                alert(message);
                return false;
                }
                }

                function clickNS4(e){
                if (document.layers||document.getElementById&&!document.all){
                if (e.which==2||e.which==3){
                alert(message);
                return false;
                }
                }
                }
                if (document.layers){
                document.captureEvents(Event.MOUSEDOWN);
                document.onmousedown=clickNS4;
                }
                else if (document.all&&!document.getElementById){
                document.onmousedown=clickIE4;
                }
                document.oncontextmenu=new Function("alert(message);return false")
        </script>    
    </head>
    <!--[if lte IE 7]>
    <style type="text/css">
    html .jqueryslidemenu{height: 1%;} /*Holly Hack for IE7 and below*/
    </style>
    <![endif]-->
    <body>
<!-- top head-->
    <div style="width:100%; height:30px; background-color:#1c558a;">
    <div style="width:960px; height:30px; margin:auto; color:#FFFFFF;">
    <table style="float:right; color:#FFFFFF;">
    <tr>
    <td style="width:100px;">facebook</td>
    <td style="width:100px;">
    <a href="" style="font-size:12px; color:#FFFFFF; margin-top:-3px; float:right;">Register Now &nbsp;&nbsp;</a></td>
    <td style="width:100px;">
    <table>
    <form action="" method="">
    <tr>
    <td>
    <input type="email" name="d2demail" placeholder="Username" style="height:22px; float:right; margin-right:5px; margin-top:2px;"/>
    </td>
    <td>
    <input type="password" type="password" name="d2dpassword" placeholder="Password"  style="height:22px;float:left; margin-top:2px; margin-right:5px;" />
    </td>
    <td>
    <input type="submit" name="submit" value="Sign In" style="height:25px; width:60px;  margin-top:2px; background-color:#008bcd; color:#FFFFFF; border:none;"/>
    </td>
    </tr>
    </form>
    </table>
    </td>
    </tr>
    </table>
    </div>
    </div>
<!-- logo-->
    <div style="height:auto; width:960px; margin:auto;">
    <div style="height:auto; width:auto;">
                <?php include_once('views/layout/elements/header.php'); ?>
    </div>
<!-- main-->
<div style="height:auto; width:960px; margin:auto; background-color:#1c558a;"><?php include_once('views/layout/elements/menu.php'); ?></div>
    <div style="margin:auto; width:960px; margin-top:10px;">
    <div style="height:auto; width:795px; float:left; margin-bottom:10px;">
<!-- gallery-->
    <div style="height:300px; width:795px;">
<div class="slider">
<div class="slider-wrapper theme-default">
<div class="nivoSlider" id="slider">
<?php foreach ($_SESSION['banners'] as $center){if($center['position']=='center'){?>
<img width="470" height="250" src="<?php echo BASE_URL.'media/banner/'.$center['banner_path']; ?>" alt="<?php echo $center['title'] ?>" />  <?php }}?>
</div>
</div>
</div>


    </div>
    <div style="height:400px; width:795px; margin-top:5px;">
    <div style="height:auto; width:150px; float:left;">
    
    <div style="height:300px; width:150px; border:1px solid #1c558a;">
    <p style="margin-bottom:10px; background-color:#1c558a; height:25px; color: white; padding-left: 17px;	margin-bottom: 15px;"> <b>Featured Builders</b> </p>
    <?php include_once('views/layout/elements/leftsidebar.php'); ?>
    </div>
    
    <div style="height:200px; width:150px; border:1px solid #1c558a; margin-top:5px;">
    <p style="margin-bottom:10px; background-color:#1c558a; height:25px; color: white; padding-left: 17px;	margin-bottom: 15px;"> <b>
    Property News</b> </p>
    
    </div>
    
    </div>
    <div style="height:400px; width:635px; float:left; margin-left:5px; border:1px solid #1c558a;">
    <p style="margin-bottom:10px; background-color:#1c558a; height:25px; color: white; padding-left: 17px;	margin-bottom: 15px;"> <b>Latest Property </b> </p>
  
<form class="form-horizontal" method="post" id="formregister" enctype="multipart/form-data">
    <div class="control-group">
        <label class="control-label" for="name">Name</label>
        <div class="controls">
            <input type="text" id="name" name="name" placeholder="Name">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="email">Email Id</label>
        <div class="controls">
            <input type="text" id="emailid" name="emailid" placeholder="Email address" autocomplete="off">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="email">Date of Birth</label>
        <div class="controls" id="datetimepicker1">
            <select id="dd" name="dd" style="width:64px;">
                <option>DD</option>
                <?php for ($d = 1; $d <= 31; $d++) { ?>
                    
                    <option value="<?php echo $d ?>"><?php echo $d; ?></option>
                <?php } ?>
            </select>

            <select id="mm" name="mm" style="width:64px;">
                 <option>MM</option>
                <?php for ($m = 1; $m <= 12; $m++) { ?>
                   
                    <option value="<?php echo $m ?>"><?php echo $m; ?></option>
                <?php } ?>
            </select>

            <select id="yy" name="yy" style="width:70px;">
                <option>YYYY</option>
                <?php
                $year = date('Y');
                for ($y = $year-10; $y >= $year-60; $y--) {
                    ?>
                    
                    <option value="<?php echo $y ?>"><?php echo $y; ?></option>
<?php } ?>
            </select>
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label" for="mobileNo">Mobile No.</label>
        <div class="controls ">
            <input type="text" id="mobileNo" name="mobileNo" placeholder=""  maxlength="10">
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label" for="phoneNo">Phone No.</label>
        <div class="controls ">
            <input type="text" id="phoneNo" name="phoneNo" placeholder="" maxlength="12">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="password">Password</label>
        <div class="controls">
            <input type="password" id="password" name="passwd" placeholder="Password" autocomplete="off">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="confirmPassword">Confirm Password</label>
        <div class="controls">
            <input type="password" id="confirmPassword" name="confirmpwd" placeholder="Confirm Password" autocomplete="off">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Account Type</label>
        <div class="controls">
            <label class="radio inline">
                <input type="radio" name="accnttype" value="builder">Builder
            </label>
            <label class="radio inline">
                <input type="radio" name="accnttype" value="agecon">Agent/Consultant
            </label>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="companyname">Company Name</label>
        <div class="controls">
            <input type="text" id="companyname" name="companyname" placeholder="Company Name">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="address">Address</label>
        <div class="controls">
            <textarea type="text" id="address" name="address" placeholder="Address"></textarea>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="city">City</label>
        <div class="controls">
            <select id="city" name="city" onchange="getLocalityforRegister(this)">
                <option value="">--Select--</option>
                <?php foreach ($cities as $ct) { ?>
                    <option value="<?php echo $ct['id'] ?>"><?php echo $ct['city_name'] ?></option>
<?php } ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="area">Area</label>
        <div class="controls">
            <select id="area" name="area" onchange="changeArea(this)">
                <option value="">--Select--</option>

            </select>

        </div>
    </div>
    <div class="control-group" id="otherArea" style="display:none;">
        <label class="control-label" for="avtar">&nbsp;</label>
        <div class="controls">
            <input type="text" id="otherAreain" name="otherArea" placeholder="Other Area" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="avtar">Profile Pic/ Logo</label>
        <div class="controls">
            <input type="file" id="pic" name="pic" >
        </div>
    </div>
    <div class="control-group">

        <div class="controls">
            <button type="button" class="btn btn-primary" id="registerbtn" onclick="validatesignup();">Submit</button>
        </div>
    </div>
</form>
<script type="text/javascript">
                $(function() {
                    $('#datetimepicker1').datetimepicker({
                        pickTime: false
                    });
                });
</script>
<!-- contant Box ---------------------------------- ----------------- -->
       
    </div>
    </div>
    </div>
    <div style="height:auto; width:150px; float:right; border:1px solid #1c558a;">
    <p style="margin-bottom:10px; background-color:#1c558a;height: 25px; color: white;padding-left: 17px;	margin-bottom: 15px;"><b> Featured Projects </b></p> 
        <?php include_once('views/layout/elements/rightsidebar.php'); ?>
    </div>
    </div>
    
    </div>
            <?php include_once('views/layout/elements/footer.php'); ?>
            <div class="clear"></div>
            <div class="clear"></div>
            <div style="width:100%; background-color:#1c558a; color:#CCCCCC; height:40px; text-align:center; border-top:1px solid #FFFFFF;">
            <br />Copyright &copy; 2013 <a href="" style="color:#FFFFFF;"> Deals 2 Dealers </a> - All Rights Reserved. </div>
        </div>
        <!--  Google Analitics -->
        <!--  Google Analitics -->        </div>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>js/jquery.nivo.slider.pack.js"> </script>
    <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider();
        });
        $(function() {
            $(".right_image").jCarouselLite({
                vertical: true,
               auto:2000
            
            });
             $(".leftslider").jCarouselLite({
                vertical: true,
               auto:2000
            
            });
        });
    </script>
</body>
</html>