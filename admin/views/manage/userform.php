<div ><?php echo getmessage(); ?></div>
<?php addJs(array('js/admin.js')); ?>
<fieldset style="float: left;">
    <legend>User:</legend>
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
        <input type="hidden" value="<?php echo $userresults['id'] ?>" name="uid" />
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
                <input value="<?php echo $userresults['dob'] ?>" type="text" id="dob" name="dob" data-format="yyyy-MM-dd"  autocomplete="off" class="input-append date"><span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-calendar">
                    </i>
                </span>
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
                <select id="updatearea" name="area" onchange="changeArea(this, <?php echo $userresults['city'] ?>)">
                    <option value="">--Select--</option>

                    <?php
                    $otherflag = TRUE;
                    foreach ($areas as $ar) {
                        ?>
                        <option <?php
                    if ($ar['id'] == $userresults['area']) {
                        echo 'selected';
                        $otherflag = FALSE;
                    } else {
                        echo '';
                    }
                        ?> value="<?php echo $ar['id'] ?>"><?php echo $ar['localityName'] ?></option>
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

            <div class="controls">
                <button type="submit" class="btn btn-primary" id="updateregisterbtn" >Submit</button>
            </div>
        </div>
    </form>
</fieldset>
<fieldset style=" margin-left: 12px; float:left;">
    <legend>Package:</legend>

    <?php if ($status == 1) {
        ?>
        <form class="form-horizontal" method="post" id="addpackage" action="<?php echo BASE_URL ?>manage/userpackage" >
            <div class="control-group"  >
                <label class="control-label" for="avtar">Current Package:</label>
                <div class="controls"  style="margin-top:5px;color:red; ">                                  
                    <?php
                    foreach ($packages as $pk) {
                        if ($userresults['currentPackId'] == $pk['id']) {
                            echo $pk['name'];
                        }
                    }
                    ?>         </div>
            </div>
            <div class="control-group"  >
                <label class="control-label" for="avtar">Remaining Credits:</label>
                <div class="controls"  style="margin-top:5px;color:red; ">                                  
                    <?php echo $userresults['remainingCredits']; ?>     </div>
            </div>
            <div class="control-group"  >
                <label class="control-label" for="avtar">Days of Expiry:</label>
                <div class="controls"  style="margin-top:5px;color:red; ">                                  
                    <?php echo date('d-F-Y', $userresults['memberExpiryDate']); ?>     </div>
            </div>
        </form>
     <form  class="form-horizontal" method="post"  action="<?php echo BASE_URL ?>manage/adddayspackage" onsubmit="return validateadddays()">
        <div class="control-group">
            <label class="control-label" for="city">Add Days</label>
            <div class="controls">
                <input style="width:30px;" type="text" value="" id="adddays" name="adddays" />
                <input type="hidden" value="<?php echo $userresults['id'] ?>" name="uid" />
                <button type="submit" class="btn btn-primary"  >Submit</button>
            </div>
        </div>
    </form>
        <form class="form-horizontal" method="post"  action="<?php echo BASE_URL ?>manage/removepackage" onsubmit="return validateremovepackage()" >
            <div class="control-group">
                <label class="control-label" for="city">Remove Package</label>
                <div class="controls">
                    
                    <input type="hidden" value="<?php echo $userresults['id'] ?>" name="uid" />
                    <button type="submit" class="btn btn-danger"  >Remove</button>
                </div>
            </div>
        </form>
   
    <br>
    <br>
        <?php
    }
    ?> 
    
    

    <form class="form-horizontal" method="post" id="addpackage" action="<?php echo BASE_URL ?>manage/userpackage" onsubmit="return validateaddpackage()">
        <div class="control-group">
            <label class="control-label" for="city">Add Package</label>
            <div class="controls">
                <select id="package" name="package" >
                    <option value="">--Select--</option>
                    <?php foreach ($packages as $pk) { ?>
                        <option  value="<?php echo $pk['id'] ?>"><?php echo $pk['name'] ?></option>
                    <?php } ?>
                </select>
                <input type="hidden" value="<?php echo $userresults['id'] ?>" name="uid" />
                <button type="submit" class="btn btn-primary" id="package" >Submit</button>
            </div>
        </div>
    </form>



</fieldset>