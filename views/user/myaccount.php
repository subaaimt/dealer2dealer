<?php addJs(array('js/user.js')); ?>
<div class="alert alert-success"><?php echo getmessage(); ?></div>
<form class="form-horizontal" method="post" id="updateformregister" onsubmit="return validatemyaccount();">
    <div class="control-group">
        <label class="control-label" for="firstname">First Name</label>
        <div class="controls">
            <input type="text" id="updatefirstname" name="firstname" placeholder="First Name" value="<?php echo $userresults['first'] ?>">
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label" for="lastname">Last  Name</label>
        <div class="controls ">
            <input type="text" id="updatelastname" name="lastname" placeholder="Last Name" value="<?php echo $userresults['last'] ?>">
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="companyname">Company Name</label>
        <div class="controls">
            <input type="text" id="updatecompanyname" name="companyname" placeholder="Company Name" value="<?php echo $userresults['cmp_name'] ?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="address">Address</label>
        <div class="controls">
            <input type="text" id="updateaddress" name="address" placeholder="Address" value="<?php echo $userresults['address'] ?>">
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