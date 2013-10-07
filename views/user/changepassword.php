<h2 style="color:#1c558a;">Change Password</h2><br  />


<?php addJs(array('js/user.js')); ?>
<div ><?php echo getmessage(); ?></div>
<form class="form-horizontal" method="post" id="updatepassword" onsubmit="return updatepassword();">
    <div class="control-group">
        <label class="control-label" for="name">Current Password</label>
        <div class="controls">
            <input type="password" id="currentpassword" name="currentpassword"  value="<?php //echo $userresults['name'] ?>" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label" for="newpassword">New Password</label>
        <div class="controls ">
            <input type="password" id="newpassword" name="newpassword" placeholder=""  maxlength="10" value="<?php //echo $userresults['mobileNo'] ?>" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label" for="phoneNo">Confirm Password</label>
        <div class="controls ">
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="" maxlength="12" value="<?php //echo $userresults['phoneNo'] ?>" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
        </div>
    </div>


    
    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="updateregisterbtn" >Submit</button>
        </div>
    </div>
</form>