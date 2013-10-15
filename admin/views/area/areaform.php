<div><?php echo getmessage(); ?></div>
<h3><?php echo isset($area['id']) ? 'Edit' : 'Add' ?> Area</h3>
<?php addJs(array('js/area.js')); ?>

<form class="form-horizontal" method="post" id="adpackage" enctype="multipart/form-data" onsubmit="return validateAreaform()" >
    <div class="control-group">
        <label class="control-label" for="title">Area Title</label>
        <div class="controls">
            <input type="text" id="title" name="title" placeholder="Title" value="<?php echo isset($area['localityName']) ? $area['localityName'] : ''; ?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="city">City</label>
        <div class="controls">
            <select id="city" name="city" onchange="getLocalityforRegister(this)">
                
                <?php foreach ($cities as $ct) { ?>
                    <option <?php echo (isset($area['cityId']) && $ct['id'] == $area['cityId']) ? 'selected' : '' ?>  value="<?php echo $ct['id'] ?>"><?php echo $ct['city_name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="city">Approve</label>
        <div class="controls">
            <select id="status" name="status" onchange="getLocalityforRegister(this)">                                
                    <option <?php echo (isset($area['status']) && 1 == $area['status']) ? 'selected' : '' ?> value="1">Publish</option>    
                     <option <?php echo (isset($area['status']) && 0 == $area['status']) ? 'selected' : '' ?> value="0">UnPublish</option>    
            </select>
        </div>
    </div>
    
    <input type="hidden" name="area_id" value="<?php echo isset($area['id']) ? $area['id'] : ''; ?>"/>

    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="updateregisterbtn" >Submit</button>
        </div>
    </div>
</form>