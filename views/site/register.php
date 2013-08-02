<?php addJs(array('js/site.js'));?>
<div class="alert alert-success"><?php echo getmessage();?></div>
<form class="form-horizontal" method="post" id="formregister">
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
                <?php foreach($cities as $ct){?>
                <option value="<?php echo $ct['id']?>"><?php echo $ct['city_name']?></option>
                <?php }?>
            </select>
        </div>
    </div>
     <div class="control-group">
        <label class="control-label" for="area">Area</label>
        <div class="controls">
             <select id="area" name="area">
                <option value="">--Select--</option>
                 
             </select>
            
        </div>
    </div>
     <div class="control-group">
        
        <div class="controls">
           <button type="button" class="btn btn-primary" id="registerbtn" onclick="validatesignup();">Submit</button>
        </div>
    </div>
</form>