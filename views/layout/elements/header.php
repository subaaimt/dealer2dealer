 <div class="header" style="height:110px; background-color:#FFFFFF; ">
                <div class="hed" style="height:110px; background-color:#FFFFFF;">

                    <div style="float:left;">
                        
                            <img src="<?php echo BASE_URL;?>img/logo2.png" />
                    </div>                     
                            <!--<div class="social_button">
                                <a href=""> <img src="img/social_icon/twitter.png"/> </a>
                                <a href=""> <img src="img/social_icon/fb.png"/> </a>
                                <a href=""> <img src="img/social_icon/rss.png"/> </a>
                                <a href=""> <img src="img/social_icon/linkedin.png"/> </a>
                            </div>-->
                            <div style="float:right; width:380px;">
                            
                                
                                <?php  if(isset($_SESSION['userdata'])){
?>
                                <a href="<?php echo BASE_URL?>user">Logined as <?php echo $_SESSION['userdata']['name']?></a>
                                <?php }else{?>
                                
                              <form id="signinform" method="post" action="<?php echo BASE_URL ?>site/login" onsubmit="return validatelogin();">
                              <table style="float:right; margin-top:15px;">
                              <tr>
                              <td><input type="text" id="inputEmail" name="d2demail" placeholder="Username" style="height:25px; float:right; margin-right:5px;"/></td>
                              <td><input type="password" id="inputPassword" type="password" name="d2dpassword" placeholder="Password"  style="height:25px;float:left; margin-right:5px;" /></td>
                              <td><input type="submit" name="submit" value="Sign In" style="height:27px; width:60px; background-color:#008bcd; color:#FFFFFF; border:none;"/></td>
                              </tr>
                              <tr>
                              <td>&nbsp;<input type="checkbox" name="keep" value="login" style="border:1px solid red;"/>&nbsp; <a href="#" style="font-size:12px;">Keep me login</a></td>
                              <td><a href="<?php echo BASE_URL?>site/forget" style="float:left; font-size:12px;">Forgot your password?</a></td>
                              </tr>
                              </table>                                    
                                </form>
                                <?php }?>
                            </div>
                        </div>                       
                    </div>

                </div>
            </div>