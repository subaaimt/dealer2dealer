
<div class="headmenu"> 
    <div class="headermenu">
        <ul>
            <?php
            $getcities = new City();
            $cityarray = array();
            foreach ($getcities->getCities() as $city) {
                $cityarray[$city['id']]=$city['city_name'];
                ?>
                <li> <a href="<?php echo BASE_URL?>property/searchresult?q=&city=<?php echo $city['id']?>"> <?php echo $city['city_name']?> </a> </li>

<?php } ?>
        </ul>
    </div>
</div>
<div style="clear: both;"></div>
<div class="header">
    <div class="hed">

        <div class="header_logo">

            <img src="<?php echo BASE_URL ?>img/logo2.png"/>							
        </div>						
        <div class="box">
            <!--<div class= " qsearch">
                <h2> Quick Search </h2>
            </div>-->
            <div class="welcome">
                <p><b> WELCOME: <font color="green"><?php echo $_SESSION['userdata']['name'] ?> </font></b> &nbsp &nbsp &nbsp &nbsp <a href="<?php echo BASE_URL ?>user/logout"> Logout </a> </p>
            </div>
            <!--<div class="buttons">
                <div class="button1">
                    <a href="<?php echo BASE_URL ?>property/search"> <img src="<?php echo BASE_URL ?>img/button7.png"/> </a>
                </div>
                <div class="button2">
                    <a href="<?php echo BASE_URL ?>project/search"> <img src="<?php echo BASE_URL ?>img/button8.png"/> </a>
                </div>
                <div class="button3">
                    <a href="<?php echo BASE_URL ?>agent/search"> <img src="<?php echo BASE_URL ?>img/button9.png"/> </a>
                </div>
                                          <div class="button4">
                                                <a href=""> <img src="<?php echo BASE_URL ?>img/button10.png"/> </a>
                                            </div>
            </div>-->

        </div>

    </div>
</div>
