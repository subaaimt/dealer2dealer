<?php addJs(array('js/site.js'));?>
<div class="alert alert-success"><?php echo getmessage();?></div>
<form class="form-horizontal" method="post" action="<?php echo BASE_URL ?>/site/login" onsubmit="return validatelogin();">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" id="inputEmail" name="d2demail" placeholder="Email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" id="inputPassword" name="d2dpassword" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <label class="checkbox">
        <input type="checkbox"> Remember me
      </label>
      <button type="submit" class="btn">Sign in</button>
    </div>
  </div>
</form>