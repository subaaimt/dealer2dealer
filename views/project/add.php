<?php addJs(array('js/project.js')); ?>
<div class="alert alert-success"><?php echo getmessage(); ?></div>
<form class="form-horizontal" method="post" id="addproject" enctype="multipart/form-data" onsubmit="return validateprojectform();">
    <div class="control-group">
        <label class="control-label" for="price">Project Name</label>
        <div class="controls">
            <input type="text" id="projecttitle" name="projecttitle" placeholder="Project Title" autocomplete="off">
        </div>
    </div>
     <div class="control-group">
        <label class="control-label" for="price">Company Name of Project</label>
        <div class="controls">
            <input type="text" id="projectcomptitle" name="projectcomptitle" placeholder="Company Name" autocomplete="off">
        </div>
    </div>
    <div class="control-group " >
        <label class="control-label"  for="projecttype">Project Type</label>
        <div class="controls ">
            <select name="projecttype" id="projecttype">
                <option>--Select--</option>
                <?php
                foreach ($categories as $cat) {
                    if($cat['id']==2 || $cat['id']==3)
                        continue;
                    ?> <optgroup label="<?php echo $cat['category'] ?>"></optgroup>

                    <?php
                    foreach ($projecttypes[$cat['id']] as $key => $value) {
                        ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['type'] ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
    </div>
    
    <div class="control-group " >
        <label class="control-label"  for="projectbedrooms">Bedrooms</label>
        <div class="controls ">
            <select name="bedrooms" id="projectbedrooms">
                <option>--Select--</option>
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
    <div class="control-group " >
        <label class="control-label"  for="projectbathrooms">Bathrooms</label>
        <div class="controls ">
            <select name="bathrooms" id="projectbathrooms">
                <option>--Select--</option>
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
    
    <div class="control-group">
        <label class="control-label" for="coveredarea">Covered Area</label>
        <div class="controls">
            <input  type="text"  id="projectcoveredarea" name="coveredarea" placeholder="Covered Area" autocomplete="off">
            <select  style="width:100px" name="coveredAreaUnit" id="coveredAreaUnit">
             
                <option selected="selected" value="Sq-ft">Sq-ft</option>
                <option value="Sq-m">Sq-m</option>
                <option value="Sq-yrd">Sq-yrd</option>
            </select>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="projectprice">Price Range</label>
        <div class="controls">
            <input type="text" id="projectprice" name="projectprice" placeholder="Price" autocomplete="off">&nbsp;Rs.
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="displayPriceUsers">Display Price to Users</label>
        <div class="controls">
            <label class="radio-inline">
                <input type="radio" id="newproject" name="displayPriceUsers" value="Yes">Yes
            </label>
            <label class="radio-inline">
                <input type="radio" id="relsale" name="displayPriceUsers" value="No">No
            </label>
        </div>
    </div>
    <div class="control-group " >
        <label class="control-label"  for="floors">Floor No</label>
        <div class="controls ">
            <select name="floors" id="projectfloors">
                <option>--Select--</option>
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
        <label class="control-label" for="totalfloors">Total floors</label>
        <div class="controls">
            <input type="text" id="projecttotalfloors" name="totalfloors" placeholder="Total floors" autocomplete="off">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="projectdescription">Description</label>
        <div class="controls">
            <textarea id="projectdescription" name="projectdescription" rows="5" cols="20"> </textarea>

        </div>
    </div>
    

    <div class="control-group">
        <label class="control-label" for="projectlocation">Location</label>
        <div class="controls">
            <input type="text" id="projectlocation" name="projectlocation" placeholder="Project Location" autocomplete="off">
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="projectcity">City</label>
        <div class="controls">
            <select id="projectcity" name="projectcity" onchange="getLocality(this)">
                <option value="" >--Select--</option>
                <?php foreach ($cities as $ct) { ?>
                    <option value="<?php echo $ct['id'] ?>"><?php echo $ct['city_name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="projectarea">Area</label>
        <div class="controls">
            <select id="projectarea" name="projectarea">
                <option value="">--Select--</option>

            </select>

        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="projectimage">Project Image</label>
        <div class="controls">
            <input type="file" id="projectimage" name="projectimage" placeholder="Project Image" autocomplete="off">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="displayPriceUsers">Possession Status</label>
        <div class="controls">
            <label class="radio-inline">
                <input type="radio" id="newproject" name="possessionstatus" value="undCons">Under Construction
            </label>
            <label class="radio-inline">
                <input type="radio" id="relsale" name="possessionstatus" value="readyMove">Ready to Move
            </label>
        </div>
    </div>
    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="registerbtn" >Submit</button>
        </div>
    </div>
</form>