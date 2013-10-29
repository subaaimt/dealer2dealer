<h1 style="padding-top:4px; background-color:#1c558a; height:30px; color: white; padding-left: 17px;">Dealer Registration</h1>
<div><?php echo getmessage(); ?></div>
<table style="color:#1c558a; margin-top:30px; margin-left:60px; margin-bottom:40px;">
    <form class="form-horizontal" method="post" id="formregister" enctype="multipart/form-data">
        <tr>
            <td style="width:200px; height:35px;">Name</td>
            <td style="width:300px;"><input type="text" id="name" name="name" placeholder="Name" style="height:30px; width:200px; color:#000066;"></td>
        </tr>
        <tr>
            <td style="height:35px;">Email Id</td>
            <td><input type="text" id="emailid" name="emailid" placeholder="Email address" autocomplete="off" style="height:30px; width:200px; color:#000066;"></td>
        </tr>
        <tr>
            <td style="height:35px;">Date of Birth</td>
            <td>
                <select id="dd" name="dd" style="width:64px; height:30px;">
                    <option>DD</option>
                    <?php for ($d = 1; $d <= 31; $d++) { ?>

                        <option value="<?php echo $d ?>"><?php echo $d; ?></option>
                    <?php } ?>
                </select>

                <select id="mm" name="mm" style="width:64px;  height:30px;">
                    <option>MM</option>
                    <?php for ($m = 1; $m <= 12; $m++) { ?>

                        <option value="<?php echo $m ?>"><?php echo $m; ?></option>
                    <?php } ?>
                </select>

                <select id="yy" name="yy" style="width:70px;  height:30px;">
                    <option>YYYY</option>
                    <?php
                    $year = date('Y');
                    for ($y = $year - 10; $y >= $year - 60; $y--) {
                        ?>

                        <option value="<?php echo $y ?>"><?php echo $y; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td style="height:35px;">Mobile No.</td>
            <td><input type="text" id="mobileNo" name="mobileNo" placeholder=""  maxlength="10" style="height:30px; width:200px; color:#000066;"></td>
        </tr>        
        <tr>
            <td style="height:35px;">Phone No.</td>
            <td><input type="text" id="phoneNo" name="phoneNo" placeholder="" maxlength="12" style="height:30px; width:200px; color:#000066;"></td>
        </tr>
        <tr>
            <td style="height:35px;">Password</td>
            <td><input type="password" id="password" name="passwd" placeholder="Password" autocomplete="off" style="height:30px; width:200px; color:#000066;"></td>
        </tr>
        <tr>
            <td style="height:35px;">Confirm Password</td>
            <td><input type="password" id="confirmPassword" name="confirmpwd" placeholder="Confirm Password" autocomplete="off" style="height:30px; width:200px; color:#000066;"></td>
        </tr>
        <tr>
            <td style="height:35px;">Account Type</td>
            <td><input type="radio" name="accnttype" value="builder">Builder
                <input type="radio" name="accnttype" value="agecon">Agent/Consultant
            </td>
        </tr>
        <tr>
            <td style="height:35px;">Company Name</td>
            <td><input type="text" id="companyname" name="companyname" placeholder="Company Name" style="height:30px; width:200px; color:#000066;"></td>
        </tr>
        <tr>
            <td style="height:35px;">Address</td>
            <td><textarea type="text" id="address" name="address" placeholder="Address" style="margin-left:-0px;  height:60px; width:200px; color:#000066;"></textarea></td>
        </tr>
        <tr>
            <td style="height:35px;">City</td>
            <td><select id="city" name="city" onchange="getLocalityforRegister(this)" style="height:30px; width:200px; color:#000066;">
                    <option value="">--Select--</option>
                    <?php foreach ($cities as $ct) { ?>
                        <option value="<?php echo $ct['id'] ?>"><?php echo $ct['city_name'] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td style="height:35px;">Area</td>
            <td><select id="area" name="area" onchange="changeArea(this)" style="height:30px; width:200px; color:#000066;">
                    <option value="">--Select--</option>

                </select></td>
        </tr>
        <tr id="otherArea" style="display:none;">
            <td style="height:35px;"><label class="control-label" for="avtar">&nbsp;</label></td>
            <td><input type="text" id="otherAreain" name="otherArea" placeholder="Other Area" style="height:30px; width:200px; color:#000066;"/></td>
        </tr>
        <tr>
            <td style="height:35px;">Profile Pic/ Logo</td>
            <td><input type="file" id="pic" name="pic" style="height:30px; width:200px; color:#000066;"></td>
        </tr>
        <tr>
            <td style="height:35px;">Captha</td>
            <td>

                <img src="<?php echo BASE_URL; ?>component/cool-php-captcha/captcha.php" id="captchaimg" /><br/>

                <a style="cursor: pointer;" onclick="refreshCaptcha()"
                   id="change-image">Not readable? Change text.</a><br/><br/>
                <input type="text" style="height:30px; width:200px; color:#000066;" name="captcha" value="<?php //echo $_SESSION['captcha'] ?>" id="captcha" autocomplete="off" /><br/>
        </tr>
        <tr>
            <td><button type="button" onclick="validatesignup();" style="float:right; height:30px; width:100px; background-color:#1c558a; border:none; color:#FFFFFF; font-size:14px;">Submit</button></td>
            <td>&nbsp;&nbsp;&nbsp;
                <button type="reset" value="Reset" onclick="validatesignup();" style="height:30px; width:100px; background-color:#1c558a; border:none; color:#FFFFFF; font-size:14px;">Reset</button></td>
        </tr>
    </form>
</table>

