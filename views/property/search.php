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
<div><h2 style="color:#0088cc;">Search Property</h2><br /></div>
<form class="form-horizontal" method="get" id="updateformregister" action="<?php echo BASE_URL?>property/searchresult" >
    <div class="control-group">
        
        <label class="control-label" for="firstname">KeyWord</label>
        <div class="controls">
            <input type="text" id="updatefirstname" name="q" placeholder="Keywords" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;" />
        </div>
    </div>
    
<div class="control-group">
        <label class="control-label" for="propertyfor">Property For</label>
        <div class="controls">
            <select name="propertyfor" id="propertyfor" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                <option value="">Select</option>

                <option value="sell">Sell</option>
                <option value="rent">Rent</option>
            </select>
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

                
            </select>

        </div>
    </div>
    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="updateregisterbtn" >Submit</button>
        </div>
    </div>
</form>