<h2 style="color:#1c558a">Post Properties</h2><br  />


<?php if ($status && $status !== 2) { ?>   

    <div ><?php echo getmessage(); ?></div>

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
    </script>
    <script src="<?php echo BASE_URL?>js/property.js"></script>
    <form class="form-horizontal" method="post" id="addproperty" enctype="multipart/form-data" onsubmit="return validatepopertyform();">
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
        <div class="control-group " >
            <label class="control-label"  for="propertytype">Property Type</label>
            <div class="controls ">
                <select name="propertytype" id="propertytype" onchange="propertyType(this)" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                    <option value="">--Select--</option>
                    <?php
                    foreach ($categories as $cat) {
                        ?> <optgroup label="<?php echo $cat['category'] ?>"></optgroup>

                        <?php
                        foreach ($propertytypes[$cat['id']] as $key => $value) {
                            ?>
                            <option value="<?php echo $value['id'] ?>"><?php echo $value['type'] ?></option>
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
                    <input type="radio" id="newproperty" name="transactiontype" value="new"> New Property
                </label>
                <label class="radio-inline">
                    <input type="radio" id="relsale" name="transactiontype" value="resale"> Resale
                </label>
            </div>
        </div>
        <div class="control-group resi" >
            <label class="control-label"  for="bedrooms">Bedrooms</label>
            <div class="controls ">
                <select name="bedrooms" id="bedrooms" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                    <option value="">--Select--</option>
                    <?php
                    foreach ($rooms as $room) {
                        ?> 
                        <option value="<?php echo $room; ?>"><?php echo $room; ?></option>

                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="control-group resi" >
            <label class="control-label"  for="bathrooms">Bathrooms</label>
            <div class="controls ">
                <select name="bathrooms" id="bathrooms" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                    <option value="">--Select--</option>
                    <?php
                    foreach ($rooms as $room) {
                        ?> 
                        <option value="<?php echo $room; ?>"><?php echo $room; ?></option>

                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="control-group resi" >
            <label class="control-label"  for="furnished">Furnished</label>
            <div class="controls ">
                <select name="furnished" id="furnished" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                    <option value="">--Select--</option>
                    <option value="furnished">Furnished</option>
                    <option value="unfurnished">Unfurnished</option>
                    <option value="semi-furnished">Semi-Furnished</option>
                </select>
            </div>
        </div>
        <div class="control-group resi">
            <label class="control-label" for="coveredarea">Covered Area</label>
            <div class="controls">
                <input  type="text"  id="coveredarea" name="coveredarea" placeholder="Covered Area" autocomplete="off" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                <select name="coveredAreaUnit" id="coveredAreaUnit" style="height:35px; width:70px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">

                    <option selected="selected" value="Sq-ft">Sq-ft</option>
                    <option value="Sq-m">Sq-m</option>
                    <option value="Sq-yrd">Sq-yrd</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="plotLandArea">Plot/Land Area</label>
            <div class="controls">
                <input  type="text"  id="plotLandArea" name="plotLandArea" placeholder="Plot/Land Area" autocomplete="off" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                <select  name="plotLandAreaUnit" id="plotLandAreaUnit" style="height:35px; width:70px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">

                    <option selected="selected" value="Sq-ft">Sq-ft</option>
                    <option value="Sq-m">Sq-m</option>
                    <option value="Sq-yrd">Sq-yrd</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="propertyprice">Total Price</label>
            <div class="controls">
                <input type="text" id="propertyprice" name="propertyprice" placeholder="Price" autocomplete="off" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="displayPriceUsers">Display Price to Users</label>
            <div class="controls">
                <label class="radio-inline">
                    <input type="radio" id="newproperty" name="displayPriceUsers" value="Yes">Yes
                </label>
                <label class="radio-inline">
                    <input type="radio" id="relsale" name="displayPriceUsers" value="No">No
                </label>
            </div>
        </div>
        <div class="control-group resi" >
            <label class="control-label "  for="floors">Floor No</label>
            <div class="controls ">
                <select name="floors" id="floors" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                    <option value="">--Select--</option>
                    <?php
                    foreach ($floors as $floor) {
                        ?> 
                        <option value="<?php echo $floor; ?>"><?php echo $floor; ?></option>

                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label resi" for="totalfloors">Total floors</label>
            <div class="controls">
                <input type="text" id="totalfloors" name="totalfloors" placeholder="Total floors" autocomplete="off" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="propertydescription">Description</label>
            <div class="controls">
                <textarea id="propertydescription" name="propertydescription" rows="5" cols="20" style="height:70px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;"> </textarea>

            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="price">Property Title</label>
            <div class="controls">
                <input type="text" id="propertytitle" name="propertytitle" placeholder="Property Title" autocomplete="off" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="propertylocation">Location</label>
            <div class="controls">
                <input type="text" id="propertylocation" name="propertylocation" placeholder="Property Location" autocomplete="off" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="propertycity">City</label>
            <div class="controls">
                <select id="propertycity" name="propertycity" onchange="getLocality(this)" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                    <option value="" >--Select--</option>
                    <?php foreach ($cities as $ct) { ?>
                        <option value="<?php echo $ct['id'] ?>"><?php echo $ct['city_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="propertyarea">Area</label>
            <div class="controls">
                <select id="propertyarea" name="propertyarea" onchange="changeArea(this)" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                    <option value="">--Select--</option>

                </select>

            </div>
        </div>
        <div class="control-group" id="otherArea" style="display:none;">
            <label class="control-label" for="avtar">&nbsp;</label>
            <div class="controls">
                <input type="text" id="otherAreain" name="otherArea" placeholder="Other Area" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="propertyimage">Property Image</label>
            <div class="controls">
                <input type="file" id="propertyimage" name="propertyimage" placeholder="Property Image" autocomplete="off" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
            </div>
        </div>
        <div class="control-group">

            <div class="controls">
                <button type="submit" class="btn btn-primary" id="registerbtn" >Submit</button>
            </div>
        </div>
    </form>
<?php } elseif ($status === 2) { ?>

    <div style="text-align:center; color:red;">No more Credits</div>

<?php } else { ?>

    <div style="text-align:center; color:red;">Membership Expired or not taken</div>
<?php } ?>
