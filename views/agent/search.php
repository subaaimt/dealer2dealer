
<div class="alert alert-success"><?php echo getmessage(); ?></div>
<form class="form-horizontal" method="get" id="updateformregister" action="<?php echo BASE_URL?>agent/searchresult" >
    <div class="control-group">
        <label class="control-label" for="firstname">KeyWord</label>
        <div class="controls">
            <input type="text" id="updatefirstname" name="q" placeholder="Keywords" >
        </div>
    </div>
    

    <div class="control-group">
        <label class="control-label" for="city">City</label>
        <div class="controls">
            <select id="updatecity" name="city" onchange="getLocalityforRegister(this)">
                <option value="">--Select--</option>
                <?php foreach ($cities as $ct) { ?>
                    <option  value="<?php echo $ct['id'] ?>"><?php echo $ct['city_name'] ?></option>
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