<?php addJs(array('js/user.js')); ?>
<div class="alert alert-success"><?php echo getmessage(); ?></div>
<form class="form-horizontal" method="post" id="updateformregister" onsubmit="return validatemyaccount();">
    <div class="control-group">
        <label class="control-label" for="name">Name</label>
        <div class="controls">
            <input type="text" id="updatename" name="name" placeholder="Name" value="<?php echo $userresults['name'] ?>">
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label" for="mobileNo">Mobile No.</label>
        <div class="controls ">
            <input type="text" id="updatemobileNo" name="mobileNo" placeholder=""  maxlength="10" value="<?php echo $userresults['mobileNo'] ?>">
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label" for="phoneNo">Phone No.</label>
        <div class="controls ">
            <input type="text" id="updatephoneNo" name="phoneNo" placeholder="" maxlength="12" value="<?php echo $userresults['phoneNo'] ?>">
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="companyname">Company Name</label>
        <div class="controls">
            <input type="text" id="updatecompanyname" name="companyname" placeholder="Company Name" value="<?php echo $userresults['companyName'] ?>">
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
            <select id="updatearea" name="area">
                <option value="">--Select--</option>

                <?php foreach ($areas as $ar) { ?>
                    <option <?php echo ($ar['id'] == $userresults['area']) ? 'selected' : '' ?> value="<?php echo $ar['id'] ?>"><?php echo $ar['localityName'] ?></option>
                <?php } ?>
            </select>

        </div>
    </div>
    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="updateregisterbtn" >Submit</button>
        </div>
    </div>
</form>