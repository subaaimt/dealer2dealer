<?php addJs(array('js/property.js')); ?>
<div class="alert alert-success"><?php echo getmessage(); ?></div>
<form class="form-horizontal" method="post" id="addproperty" enctype="multipart/form-data" onsubmit="return validatepopertyupdateform();">
    <div class="control-group">
        <label class="control-label" for="propertyfor">Property For</label>
        <div class="controls">
            <select name="propertyfor" id="propertyfor">
                <option value="">Select</option>
                <option <?php echo ('buy' == $properties['category']) ? 'selected' : '' ?> value="buy">Buy</option>
                <option  <?php echo ('sell' == $properties['category']) ? 'selected' : '' ?> value="sell">Sell</option>
                <option <?php echo ('rent' == $properties['category']) ? 'selected' : '' ?> value="rent">Rent</option>
            </select>
        </div>
    </div>
    <div class="control-group " >
        <label class="control-label"  for="propertytype">Property Type</label>
        <div class="controls ">
            <select name="propertytype" id="propertytype">
                <option value="">Select</option>
                <option value="1" <?php echo ('1' == $properties['type']) ? 'selected' : '' ?>>1 Bedroom</option>
                <option value="2" <?php echo ('2' == $properties['type']) ? 'selected' : '' ?>>2 Bedroom</option>
                <option value="3" <?php echo ('3' == $properties['type']) ? 'selected' : '' ?>>3 Bedroom</option>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="propertyprice">Price</label>
        <div class="controls">
            <input type="text"  value="<?php echo $properties['price'] ?>" id="propertyprice" name="propertyprice" placeholder="Price" autocomplete="off">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="propertydescription">Description</label>
        <div class="controls">
            <textarea   id="propertydescription" name="propertydescription" rows="5" cols="20"> <?php echo $properties['description'] ?></textarea>

        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="price">Property Title</label>
        <div class="controls">
            <input type="text" value="<?php echo $properties['title'] ?>" id="propertytitle" name="propertytitle" placeholder="Property Title" autocomplete="off">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="propertylocation">Location</label>
        <div class="controls">
            <input type="text" value="<?php echo $properties['location'] ?>" id="propertylocation" name="propertylocation" placeholder="Property Location" autocomplete="off">
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="propertycity">City</label>
        <div class="controls">
            <select id="propertycity" name="propertycity" onchange="getLocality(this)">
                <option value="" >--Select--</option>
                <?php foreach ($cities as $ct) { ?>
                    <option <?php echo ($ct['id'] == $properties['city']) ? 'selected' : '' ?> value="<?php echo $ct['id'] ?>"><?php echo $ct['city_name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="propertyarea">Area</label>
        <div class="controls">
            <select id="propertyarea" name="propertyarea">
                <option value="">--Select--</option>

                <?php foreach ($areas as $ar) { ?>
                    <option <?php echo ($ar['id'] == $properties['area']) ? 'selected' : '' ?> value="<?php echo $ar['id'] ?>"><?php echo $ar['localityName'] ?></option>
                <?php } ?>
            </select>

        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="propertyimage">Property Image</label>
        <div class="controls">
            <input type="file" id="propertyimage" name="propertyimage" placeholder="Property Image" autocomplete="off">
        </div>
    </div>
    <input type="hidden" id="pid" name="pid" value="<?php echo $properties['id']?>" />
    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="registerbtn" >Submit</button>
        </div>
    </div>
</form>