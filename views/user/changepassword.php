<?php addJs(array('js/user.js')); ?>
<div class="alert alert-success"><?php echo getmessage(); ?></div>
<form class="form-horizontal" method="post" id="updatepassword" onsubmit="return updatepassword();">
    <div class="control-group">
        <label class="control-label" for="name">Current Password</label>
        <div class="controls">
            <input type="password" id="currentpassword" name="currentpassword"  value="<?php //echo $userresults['name'] ?>">
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label" for="newpassword">New Password</label>
        <div class="controls ">
            <input type="password" id="newpassword" name="newpassword" placeholder=""  maxlength="10" value="<?php //echo $userresults['mobileNo'] ?>">
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label" for="phoneNo">Confirm Password</label>
        <div class="controls ">
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="" maxlength="12" value="<?php //echo $userresults['phoneNo'] ?>">
        </div>
    </div>


    
    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="updateregisterbtn" >Submit</button>
        </div>
    </div>
</form>