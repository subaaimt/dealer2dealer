<?php
addCss(array('asset/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'));
addJs(array('asset/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js', 'js/user.js'));
?>
<div ><?php echo getmessage(); ?></div>
<form class="form-horizontal" method="post" id="updateformregister" onsubmit="return validatemyaccount();" enctype="multipart/form-data">

    <div class="control-group ">
        <label class="control-label" for="mobileNo">Mobile No.</label>
        <div class="controls ">
            <input type="text" id="updatemobileNo" name="mobileNo" placeholder=""  maxlength="10" value="<?php echo $userresults['mobileNo'] ?>">
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label" for="mobileNo">Optional Mobile No.</label>
        <div class="controls ">
            <input type="text" id="optionalmobileNo" name="optionalmobileNo" placeholder=""  maxlength="10" value="<?php echo $userresults['optionalmobileNo'] ?>">
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label" for="phoneNo">Phone No.</label>
        <div class="controls ">
            <input type="text" id="updatephoneNo" name="phoneNo" placeholder="" maxlength="12" value="<?php echo $userresults['phoneNo'] ?>">
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="email">Date of Birth</label>
        <div class="controls" id="datetimepicker1">           
            <select id="dd" name="dd" style="width:64px;">
                <option>DD</option>
                <?php 
                $dob = explode('-', $userresults['dob']);
                //print_r($dob);
                for ($d = 1; $d <= 31; $d++) { ?>

                    <option <?php echo ($d == $dob[2]) ? 'selected' : '' ?> value="<?php echo $d ?>"><?php echo $d; ?></option>
                <?php } ?>
            </select>

            <select id="mm" name="mm" style="width:64px;">
                <option>MM</option>
                <?php for ($m = 1; $m <= 12; $m++) { ?>

                    <option <?php echo ($m == $dob[1]) ? 'selected' : '' ?> value="<?php echo $m ?>"><?php echo $m; ?></option>
                <?php } ?>
            </select>

            <select id="yy" name="yy" style="width:70px;">
                <option>YYYY</option>
                <?php
                $year = date('Y');
                for ($y = $year - 10; $y >= $year - 60; $y--) {
                    ?>
                    <option <?php echo ($y == $dob[0]) ? 'selected' : '' ?> <?php echo ($y == $userresults['city']) ? 'selected' : '' ?> value="<?php echo $y ?>"><?php echo $y; ?></option>
                <?php } ?>
            </select>        
        </div>

    </div>
    <div class="control-group">
        <label class="control-label" for="address">Address</label>
        <div class="controls">
            <textarea  id="updateaddress" name="address" placeholder="Address" ><?php echo $userresults['address'] ?></textarea>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="city">City</label>
        <div class="controls">
            <select id="updatecity" name="city" onchange="getLocalityforRegister(this)">
                <option value="">--Select--</option>
                <?php foreach ($cities as $ct) { ?>
                    <option <?php echo ($ct['id'] == $userresults['city']) ? 'selected' : '' ?> value="<?php echo $ct['id'] ?>"><?php echo $ct['city_name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="area">Area</label>
        <div class="controls">
            <select id="updatearea" name="area" onchange="changeArea(this, <?php echo $userresults['city'] ?>)">
                <option value="">--Select--</option>

                <?php $otherflag = TRUE;
                foreach ($areas as $ar) {
                    ?>
                    <option <?php if ($ar['id'] == $userresults['area']) {
                    echo 'selected';
                    $otherflag = FALSE;
                } else {
                    echo '';
                } ?> value="<?php echo $ar['id'] ?>"><?php echo $ar['localityName'] ?></option>
<?php } ?>
                <option value="otherarea" <?php echo ($otherflag) ? 'selected' : '' ?>>Other</option>
            </select>

        </div>
    </div>

    <div class="control-group" id="otherArea" style="display:none">
        <label class="control-label" for="avtar">&nbsp;</label>
        <div class="controls">
            <input type="text" id="otherAreain" name="otherArea" placeholder="Other Area" value="<?php echo isset($otherareaname['localityName']) ? $otherareaname['localityName'] : '' ?>" >            

        </div>
    </div>
<?php if ($otherareaname) { ?>

        <div class="control-group" id="otherAreaRegis" style="display:<?php echo ($otherflag) ? '' : 'none' ?>;">
            <label class="control-label" for="avtar">&nbsp;</label>
            <div class="controls">
                <input type="text" id="otherAreainRegis" name="otherAreaRegis" placeholder="Other Area" value="<?php echo isset($otherareaname['localityName']) ? $otherareaname['localityName'] : '' ?>" >            
                <input type="hidden" value="<?php echo $userresults['area'] ?>"  name="othaid" />
            </div>
        </div>
<?php } ?>
       <div class="control-group">
        <label class="control-label" for="avtar">Profile Pic/ Logo</label>
        <div class="controls">
            <input type="file" id="pic" name="pic" >
        </div>
    </div>
    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="updateregisterbtn" >Submit</button>
        </div>
    </div>
</form>
