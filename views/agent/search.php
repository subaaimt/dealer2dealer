<script>
    function getLocalityforRegister(this_){
    $(this_).attr('disabled', true);
    $.ajax({
        url: baseurl+"city",
        type: 'POST',
        data: {
            'cityid':$(this_).val()
        },
      
        success: function(response){
            $(this_).attr('disabled', false);
            $('#updatearea').html(response);
        }
    });
}
    </script>
    <div><h2 style="color:#0088cc;">Search Agents</h2><br /></div>
<div style="height:auto;"><?php echo getmessage(); ?></div>
<form class="form-horizontal" method="get" id="updateformregister" action="<?php echo BASE_URL?>agent/searchresult" >
    <div class="control-group">
        <label class="control-label" for="firstname">KeyWord</label>
        <div class="controls">
            <input type="text" id="updatefirstname" name="q" placeholder="Keywords" >
        </div>
    </div>
    

    <div class="control-group">
        <label class="control-label" for="agentcity">City</label>
        <div class="controls">
            <select id="updatecity" name="agentcity" onchange="getLocalityforRegister(this)">
                <option value="">--Select--</option>
                <?php foreach ($cities as $ct) { ?>
                    <option  value="<?php echo $ct['id'] ?>"><?php echo $ct['city_name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="agentarea">Area</label>
        <div class="controls">
            <select id="updatearea" name="agentarea">
                <option value="">--Select--</option>

                
            </select>

        </div>
    </div>
    
    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="updateregisterbtn" >Submit</button>
        </div>
    </div>
</form>