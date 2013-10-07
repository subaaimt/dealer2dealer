<div><h2 style="color:#0088cc;">Search Project</h2><br /></div>
<div><?php echo getmessage(); ?></div>
<form class="form-horizontal" method="get" id="updateformregister" action="<?php echo BASE_URL?>project/searchresult" >
    <div class="control-group">
        <label class="control-label" for="firstname">KeyWord</label>
        <div class="controls">
            <input type="text" id="updatefirstname" name="q" placeholder="Keywords" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;"/>
        </div>
    </div>
    

    <div class="control-group">
        <label class="control-label" for="city">City</label>
        <div class="controls">
            <select id="updatecity" name="city" onchange="getLocalityforRegister(this)" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                <option value="">--Select--</option>
                <?php foreach ($cities as $ct) { ?>
                    <option  value="<?php echo $ct['id'] ?>"><?php echo $ct['city_name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="area">Area</label>
        <div class="controls">
            <select id="updatearea" name="area" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                <option value="">--Select--</option>

                <?php foreach ($areas as $ar) { ?>
                    <option  value="<?php echo $ar['id'] ?>"><?php echo $ar['localityName'] ?></option>
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