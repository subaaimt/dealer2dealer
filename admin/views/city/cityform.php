<div><?php echo getmessage(); ?></div>
<h3><?php echo isset($city['id']) ? 'Edit' : 'Add' ?> City</h3>
<?php addJs(array('js/cityarea.js')); ?>

<form class="form-horizontal" method="post" id="adpackage" enctype="multipart/form-data" onsubmit="return validateCityform1()" >
    <div class="control-group">
        <label class="control-label" for="title">City Title</label>
        <div class="controls">
            <input type="text" id="title" name="title" placeholder="Title" value="<?php echo isset($city['city_name']) ? $city['city_name'] : ''; ?>">
        </div>
    </div>

    <input type="hidden" name="city_id" value="<?php echo isset($city['id']) ? $city['id'] : ''; ?>"/>

    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="updateregisterbtn" >Submit</button>
        </div>
    </div>
</form>