
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