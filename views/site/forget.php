<div ><?php echo getmessage(); ?></div>
<h2>Forget Password</h2>
<div style="margin: 10px 0 10px 0;">Enter your email id below to retrieve password</div>
<form class="form-horizontal" method="post" id="formforget" >
    

    <div class="control-group">
        <label class="control-label" for="email">Email Id</label>
        <div class="controls">
            <input type="text" id="emailid" name="emailid" placeholder="Email address" autocomplete="off">
        </div>
    </div>
   
    <div class="control-group">

        <div class="controls">
            <button type="button" class="btn btn-primary" id="forgetbtn" onclick="validateforget();">Submit</button>
        </div>
    </div>
</form>
