<div ><?php echo getmessage(); ?></div>

<?php addJs(array('js/user.js')); ?>
<h2><?php  echo isset($userresults['id'])?'Update':'Add' ?> Unregistered  User</h2>
<?php addJs(array('js/admin.js')); ?>

    <form class="form-horizontal" method="post" id="updateformregister" >
        <div class="control-group">
            <label class="control-label" for="name">Name</label>
            <div class="controls">
                <input type="text" id="updatename" name="name" placeholder="Name" value="<?php echo isset($userresults['name'])?$userresults['name']:'' ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Email</label>
            <div class="controls">
                <input type="text" id="updateemail" name="email" placeholder="Email Id" value="<?php echo isset($userresults['email'])?$userresults['email']:'' ?>">
            </div>
        </div>
        <div class="control-group ">
            <label class="control-label" for="mobileNo">Mobile No.</label>
            <div class="controls ">
                <input type="text" id="updatemobileNo" name="mobileNo" placeholder=""  maxlength="10" value="<?php echo isset($userresults['mobileNo'])?$userresults['mobileNo']:'' ?>">
            </div>
        </div>
        <input type="hidden" value="<?php echo isset($userresults['id'])?$userresults['id']:'' ?>" name="uid" />
        <div class="control-group ">
            <label class="control-label" for="mobileNo">Optional Mobile No.</label>
            <div class="controls ">
                <input type="text" id="optionalmobileNo" name="optionalmobileNo" placeholder=""  maxlength="10" value="<?php echo isset($userresults['optionalmobileNo'])?$userresults['optionalmobileNo']:'' ?>">
            </div>
        </div>
        <div class="control-group ">
            <label class="control-label" for="phoneNo">Phone No.</label>
            <div class="controls ">
                <input type="text" id="updatephoneNo" name="phoneNo" placeholder="" maxlength="12" value="<?php echo isset($userresults['phoneNo'])?$userresults['phoneNo']:'' ?>">
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="email">Date of Birth</label>
            <div class="controls" >
                <?php 
                if(isset($userresults['dob']))
                $dob = explode("-", $userresults['dob']);
// print_r($dob);
                ?>
                 <select id="dd" name="dd" style="width:64px; height:30px;">
                    <option>DD</option>
                    <?php for ($d = 1; $d <= 31; $d++) { ?>

                        <option <?php echo isset($dob[2]) && $dob[2]==$d?'selected':''; ?> value="<?php echo $d ?>"><?php echo $d; ?></option>
                    <?php } ?>
                </select>

                <select id="mm" name="mm" style="width:64px;  height:30px;">
                    <option>MM</option>
                    <?php for ($m = 1; $m <= 12; $m++) { ?>

                        <option <?php echo isset($dob[1]) && $dob[1]==$m?'selected':''; ?> value="<?php echo $m ?>"><?php echo $m; ?></option>
                    <?php } ?>
                </select>

                <select id="yy" name="yy" style="width:70px;  height:30px;">
                    <option>YYYY</option>
                    <?php
                    $year = date('Y');
                    for ($y = $year - 10; $y >= $year - 60; $y--) {
                        ?>

                        <option <?php echo isset($dob[0]) && $dob[0]==$y?'selected':''; ?> value="<?php echo $y ?>"><?php echo $y; ?></option>
                    <?php } ?>
                </select>
            </div>

        </div>
        <div class="control-group">
            <label class="control-label" for="companyname">Company Name</label>
            <div class="controls">
                <input type="text" id="updatecompanyname" name="companyname" placeholder="Company Name" value="<?php echo isset($userresults['companyName'])?$userresults['companyName']:'' ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="address">Address</label>
            <div class="controls">
                <textarea  id="updateaddress" name="address" placeholder="Address" ><?php echo isset($userresults['address'])?$userresults['address']:'' ?></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="city">City</label>
            <div class="controls">
                <select id="updatecity" name="city" onchange="getLocalityforRegister(this)">
                    <option value="">--Select--</option>
                    <?php foreach ($cities as $ct) { ?>
                        <option <?php echo (isset($userresults['city']) && $ct['id'] == $userresults['city']) ? 'selected' : '' ?> value="<?php echo $ct['id'] ?>"><?php echo $ct['city_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="area">Area</label>
            <div class="controls">
                <select id="updatearea" name="area" onchange="changeArea(this,'<?php echo isset($userresults['city'])?$userresults['city']:'' ?>')">
                    <option value="">--Select--</option>

                    <?php
                    $otherflag = TRUE;
                    foreach ($areas as $ar) {
                        ?>
                        <option <?php
                    if (isset($userresults['area']) && $ar['id'] == $userresults['area']) {
                        echo 'selected';
                       
                    } else {
                        echo '';
                    }
                    
                        ?> value="<?php echo $ar['id'] ?>"><?php echo $ar['localityName'] ?></option>
                        <?php } ?>
                 
                </select>

            </div>
        </div>

     
        
        <div class="control-group">
            <label class="control-label" for="address">Profile/Company Logo</label>
            <div class="controls">
                <input type="file" id="pic" name="pic" >
            </div>
        </div>
        
        <div class="control-group">

            <div class="controls">
                <button type="submit" class="btn btn-primary" id="updateregisterbtn" onclick="return validateunreguserform('<?php echo isset($userresults['id'])?$userresults['id']:'' ?>');" >Submit</button>
            </div>
        </div>
    </form>

