<?php if($result){?>
<div ><?php echo getmessage(); ?></div>
<form class="form-horizontal" method="post" id="changepassword" >
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
    

        <div class="controls">
            <button type="button" class="btn btn-primary" id="changepassword" onclick="validatechangepwd();">Submit</button>
        </div>
  
</form>
<?php }else{?>

<div class="alert alert-error">Invalid Token</div>
<?php }?>