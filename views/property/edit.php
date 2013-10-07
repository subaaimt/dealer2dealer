
<div class=""><?php echo getmessage(); ?></div>
<script type="text/javascript">
        var propertyFieldRelation = <?php echo $propertyFieldRelation ?>;
        var propertyVariableFields = <?php echo $propertyVariableFields ?>;

        function propertyType(this_) {
            $.each(propertyVariableFields, function(key, val) {
                $('#' + val).parents('.control-group').show();

            });
            if (propertyFieldRelation[$(this_).val()] !== undefined) {
                $.each(propertyFieldRelation[$(this_).val()], function(key, val) {
                    $('#' + val).parents('.control-group').hide();

                });
            }
        }
        $(function(){
        propertyType(($('#propertytype')));
        });
    </script>
     <script src="<?php echo BASE_URL?>js/property.js"></script>
<form class="form-horizontal" method="post" id="addproperty" enctype="multipart/form-data" onsubmit="return validatepopertyupdateform();">
    <div class="control-group">
        <label class="control-label" for="propertyfor">Property For</label>
        <div class="controls">
            <select name="propertyfor" id="propertyfor">
                <option value="">Select</option>

                <option  <?php echo ('sell' == $properties['for']) ? 'selected' : '' ?> value="sell">Sell</option>
                <option <?php echo ('rent' == $properties['for']) ? 'selected' : '' ?> value="rent">Rent</option>
            </select>
        </div>
    </div>

    <div class="control-group " >
        <label class="control-label"  for="propertytype">Property Type</label>
        <div class="controls ">
            <select name="propertytype" id="propertytype" onchange="propertyType(this)">
                <option value="">--Select--</option>
                <?php
                foreach ($categories as $cat) {
                    ?> <optgroup label="<?php echo $cat['category'] ?>"></optgroup>

                    <?php
                    foreach ($propertytypes[$cat['id']] as $key => $value) {
                        ?>
                        <option <?php echo ($properties['ptype'] == $value['id']) ? 'selected' : '' ?> value="<?php echo $value['id'] ?>"><?php echo $value['type'] ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="transactiontype">Transaction Type</label>
        <div class="controls">
            <label class="radio-inline">
                <input <?php echo ('new' == $properties['transType']) ? 'checked' : '' ?> type="radio" id="newproperty" name="transactiontype" value="new"> New Property
            </label>
            <label class="radio-inline">
                <input  <?php echo ('resale' == $properties['transType']) ? 'checked' : '' ?> type="radio" id="relsale" name="transactiontype" value="resale"> Resale
            </label>
        </div>
    </div>
    <div class="control-group resi" >
        <label class="control-label"  for="bedrooms">Bedrooms</label>
        <div class="controls ">
            <select name="bedrooms" id="bedrooms">
                <option value="">--Select--</option>
                <?php
                foreach ($rooms as $room) {
                    ?> 
                    <option <?php echo ($room == $properties['bedroom']) ? 'selected' : '' ?> value="<?php echo $room; ?>"><?php echo $room; ?></option>

                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="control-group resi" >
        <label class="control-label"  for="bathrooms">Bathrooms</label>
        <div class="controls ">
            <select name="bathrooms" id="bathrooms">
                <option value="">--Select--</option>
                <?php
                foreach ($rooms as $room) {
                    ?> 
                    <option <?php echo ($room == $properties['bathroom']) ? 'selected' : '' ?> value="<?php echo $room; ?>"><?php echo $room; ?></option>

                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="control-group resi" >
        <label class="control-label"  for="furnished">Furnished</label>
        <div class="controls ">
            <select name="furnished" id="furnished">
                <option value="">--Select--</option>
                <option <?php echo ('furnished' == $properties['furnished']) ? 'selected' : '' ?> value="furnished">Furnished</option>
                <option <?php echo ('unfurnished' == $properties['furnished']) ? 'selected' : '' ?> value="unfurnished">Unfurnished</option>
                <option <?php echo ('semi-furnished' == $properties['furnished']) ? 'selected' : '' ?> value="semi-furnished">Semi-Furnished</option>
            </select>
        </div>
    </div>
    <div class="control-group resi">
        <label class="control-label" for="coveredarea">Covered Area</label>
        <div class="controls">
            <input value="<?php echo $properties['coveredArea'] ?>"  type="text"  id="coveredarea" name="coveredarea" placeholder="Covered Area" autocomplete="off">
            <select  style="width:100px" name="coveredAreaUnit" id="coveredAreaUnit">

                <option selected="selected" value="Sq-ft">Sq-ft</option>
                <option  <?php echo ('Sq-m' == $properties['coveredAreaUnit']) ? 'selected' : '' ?> value="Sq-m">Sq-m</option>
                <option <?php echo ('Sq-yrd' == $properties['coveredAreaUnit']) ? 'selected' : '' ?> value="Sq-yrd">Sq-yrd</option>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="plotLandArea">Plot/Land Area</label>
        <div class="controls">
            <input  value="<?php echo $properties['plotLandArea'] ?>" type="text"  id="plotLandArea" name="plotLandArea" placeholder="Plot/Land Area" autocomplete="off">
            <select  style="width:100px" name="plotLandAreaUnit" id="plotLandAreaUnit">

                <option <?php echo ('Sq-ft' == $properties['plotLandAreaUnit']) ? 'selected' : '' ?>  value="Sq-ft">Sq-ft</option>
                <option <?php echo ('Sq-m' == $properties['plotLandAreaUnit']) ? 'selected' : '' ?> value="Sq-m">Sq-m</option>
                <option <?php echo ('Sq-yrd' == $properties['plotLandAreaUnit']) ? 'selected' : '' ?> value="Sq-yrd">Sq-yrd</option>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="propertyprice">Total Price</label>
        <div class="controls">
            <input value="<?php echo $properties['price'] ?>" type="text" id="propertyprice" name="propertyprice" placeholder="Price" autocomplete="off">&nbsp;Rs.
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="displayPriceUsers">Display Price to Users</label>
        <div class="controls">
            <label class="radio-inline">
                <input type="radio" <?php echo ('yes' == $properties['displayProperty']) ? 'checked' : '' ?> id="displayyes" name="displayPriceUsers" value="yes">Yes
            </label>
            <label class="radio-inline">
                <input type="radio"  <?php echo ('no' == $properties['displayProperty']) ? 'checked' : '' ?> id="displayno" name="displayPriceUsers" value="no">No
            </label>
        </div>
    </div>
    <div class="control-group " >
        <label class="control-label resi"  for="floors">Floor No</label>
        <div class="controls ">
            <select name="floors" id="floors">
                <option value="">--Select--</option>
                <?php
                foreach ($floors as $floor) {
                    ?> 
                    <option <?php echo ($floor == $properties['floorNo']) ? 'selected' : '' ?>  value="<?php echo $floor; ?>"><?php echo $floor; ?></option>

                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="control-group resi">
        <label class="control-label" for="totalfloors">Total floors</label>
        <div class="controls">
            <input type="text" value="<?php echo $properties['totalFloor'] ?>" id="totalfloors" name="totalfloors" placeholder="Total floors" autocomplete="off">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="propertydescription">Description</label>
        <div class="controls">
            <textarea   id="propertydescription" name="propertydescription" rows="5" cols="20"><?php echo $properties['description'] ?></textarea>
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
            <select id="propertyarea" name="propertyarea" onchange="changeAreUpdate(this)">
                <option value="">--Select--</option>

                <?php $otherflag = TRUE;
                foreach ($areas as $ar) { ?>
                    <option <?php if ($ar['id'] == $properties['area']) {
                        echo 'selected';
                        $otherflag = FALSE;
                    } else {
                        echo '';
                    } ?> value="<?php echo $ar['id'] ?>"><?php echo $ar['localityName'] ?></option>
<?php } ?>
                <option value="otherarea" <?php echo ($otherflag) ? 'selected' : '' ?>>Other</option>
            </select>

        </div>
    </div>
    <div class="control-group" id="otherArea" style="display:none">
        <label class="control-label" for="avtar">&nbsp;</label>
        <div class="controls">
            <input type="text" id="otherAreain" name="otherArea" placeholder="Other Area" value="" >            

        </div>
    </div>
<?php if ($otherareaname) { ?>

        <div class="control-group" id="otherAreaRegis" style="display:<?php echo ($otherflag) ? '' : 'none' ?>;">
            <label class="control-label" for="avtar">&nbsp;</label>
            <div class="controls">
                <input type="text" id="otherAreainRegis" name="otherAreaRegis" placeholder="Other Area" value="<?php echo isset($otherareaname['localityName']) ? $otherareaname['localityName'] : '' ?>" >            
                <input type="hidden" value="<?php echo $properties['area'] ?>"  name="othaid" />
            </div>
        </div>
<?php } ?>
    <div class="control-group">
        <label class="control-label" for="propertyimage">Property Image</label>
        <div class="controls">
            <input type="file" id="propertyimage" name="propertyimage" placeholder="Property Image" autocomplete="off">
        </div>
    </div>
    <input type="hidden" id="pid" name="pid" value="<?php echo $properties['pid'] ?>" />
    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="registerbtn" >Submit</button>
        </div>
    </div>
</form>