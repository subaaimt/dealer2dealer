 <div class="header">
                <div class="hed">

                    <div header_logo>
                        <div class="header_logo">
                            <img src="<?php echo BASE_URL;?>img/logo1.png" />
                        </div>

                        <div id="box">
                            <div class="social_button">
                                <a href=""> <img src="<?php echo BASE_URL;?>img/social_icon/twitter.png"/> </a>
                                <a href=""> <img src="<?php echo BASE_URL;?>img/social_icon/fb.png"/> </a>
                                <a href=""> <img src="<?php echo BASE_URL;?>img/social_icon/rss.png"/> </a>
                                <a href=""> <img src="<?php echo BASE_URL;?>img/social_icon/linkedin.png"/> </a>

                            </div>
                            <div class="elements">
                                
                                <?php  if(isset($_SESSION['userdata'])){
?>
                                <a href="<?php echo BASE_URL?>user">Logined as <?php echo $_SESSION['userdata']['name']?></a>
                                <?php }else{?>
                                <b color="blue"> DEALERS MEMBER LOGIN HERE </b>
                              <form id="signinform" method="post" action="<?php echo BASE_URL ?>site/login" onsubmit="return validatelogin();">
                                    <input type="text" id="inputEmail" name="d2demail" class="username" placeholder="Username" />
                                    <input type="password" id="inputPassword" type="password" name="d2dpassword" class="password" placeholder="Password" />
                                    <div class="forget"><a href="#">Forgot your password?</a></div>
                                    <input type="submit" name="submit" class="submit" value="Sign In" />
                                </form>
                                <?php }?>
                            </div>
                        </div>
                        <?php  if(!isset($_SESSION['userdata'])){ ?>
                        <div class="signup">Not a registered user yet?  <a href="#">Sign up now!</a></div><?php }?>
                    </div>

                </div>
            </div>