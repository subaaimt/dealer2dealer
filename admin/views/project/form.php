

<script type="text/javascript">
    var projectFieldRelation = <?php echo $projectFieldRelation ?>;
    var projectVariableFields = <?php echo $projectVariableFields ?>;

    function projectType(this_) {

        $.each(projectVariableFields, function(key, val) {
            $('#' + val).parents('.control-group').show();

        });
        if (projectFieldRelation[$(this_).val()] !== undefined) {
            $.each(projectFieldRelation[$(this_).val()], function(key, val) {
                $('#' + val).parents('.control-group').hide();

            });
        }
    }

<?php if (isset($project['id'])) { ?>
        $(function() {
            projectType(($('#type')));
        });
<?php } ?>
</script>
<script src="<?php echo BASE_URL ?>js/project.js"></script>
<div ><?php echo getmessage(); ?></div>
<form class="form-horizontal" method="post" id="addproject" enctype="multipart/form-data" onsubmit="return validateprojectform('<?php echo isset($project) ? 'update' : '' ?>');">
    <div class="control-group">
        <label class="control-label" for="price">Project Name</label>
        <div class="controls">
            <input type="text" value="<?php echo isset($project['name']) ? $project['name'] : '' ?>" id="title" name="projecttitle" placeholder="Project Title" autocomplete="off">
        </div>
    </div>
    <?php if (isset($project['id'])) { ?>
        <input type="hidden" name="pid" value="<?php echo $project['id']; ?>"/>
    <?php } ?>
    <div class="control-group">
        <label class="control-label" for="price">Company Name of Project</label>
        <div class="controls">
            <input type="text"  value="<?php echo isset($project['projectName']) ? $project['projectName'] : '' ?>" id="comptitle" name="projectcomptitle" placeholder="Company Name" autocomplete="off">
        </div>
    </div>
    <div class="control-group " >
        <label class="control-label"  for="projecttype">Project Type</label>
        <div class="controls ">
            <select name="projecttype" id="type" onchange="projectType(this)">
                <option>--Select--</option>
                <?php
                foreach ($categories as $cat) {
                    if ($cat['id'] == 2 || $cat['id'] == 3)
                        continue;
                    ?> <optgroup label="<?php echo $cat['category'] ?>"></optgroup>

                    <?php
                    foreach ($projecttypes[$cat['id']] as $key => $value) {
                        ?>
                        <option <?php echo isset($project['type']) ? (($project['type'] == $value['id']) ? 'selected' : '') : '' ?> value="<?php echo $value['id'] ?>"><?php echo $value['type'] ?></option>
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
            <select name="bedrooms" id="bedrooms">
                <option value="">--Select--</option>
                <?php
                foreach ($rooms as $room) {
                    ?> 
                    <option <?php echo isset($project['bedroom']) ? (($room == $project['bedroom']) ? 'selected' : '') : '' ?> value="<?php echo $room; ?>"><?php echo $room; ?></option>

                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="control-group " >
        <label class="control-label"  for="projectbathrooms">Bathrooms</label>
        <div class="controls ">
            <select  name="bathrooms" id="bathrooms">
                <option value="">--Select--</option>
                <?php
                foreach ($rooms as $room) {
                    ?> 
                    <option <?php echo isset($project['bathroom']) ? (($room == $project['bathroom']) ? 'selected' : '') : '' ?> value="<?php echo $room; ?>"><?php echo $room; ?></option>

                    <?php
                }
                ?>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="coveredarea">Covered Area</label>
        <div class="controls">
            <input  value="<?php echo isset($project['coveredArea']) ? $project['coveredArea'] : '' ?>" type="text"  id="coveredarea" name="coveredarea" placeholder="Covered Area" autocomplete="off">
            <select  style="width:100px" name="coveredAreaUnit" id="coveredAreaUnit">

                <option <?php echo isset($project['coveredAreaUnit']) ? (('Sq-ft' == $project['coveredAreaUnit']) ? 'selected' : '') : 'selected' ?> value="Sq-ft">Sq-ft</option>
                <option <?php echo isset($project['coveredAreaUnit']) ? (('Sq-m' == $project['coveredAreaUnit']) ? 'selected' : '') : '' ?> value="Sq-m">Sq-m</option>
                <option <?php echo isset($project['coveredAreaUnit']) ? (('Sq-yrd' == $project['coveredAreaUnit']) ? 'selected' : '') : '' ?> value="Sq-yrd">Sq-yrd</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="projectprice">Price Range</label>
        <div class="controls">
            <input value="<?php echo isset($project['price']) ? $project['price'] : '' ?>" type="text" id="price" name="projectprice" placeholder="Price" autocomplete="off">&nbsp;Rs.
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="displayPriceUsers">Display Price to Users</label>
        <div class="controls">
            <label class="radio-inline">
                <input type="radio" <?php echo isset($project['displayPrice']) ? (('yes' == $project['displayPrice']) ? 'checked' : '') : '' ?> id="newproject" name="displayPriceUsers" value="Yes">Yes
            </label>
            <label class="radio-inline">
                <input type="radio" <?php echo isset($project['displayPrice']) ? (('no' == $project['displayPrice']) ? 'checked' : '') : '' ?> id="relsale" name="displayPriceUsers" value="No">No
            </label>
        </div>
    </div>
    <div class="control-group " >
        <label class="control-label"  for="floors">Floor No</label>
        <div class="controls ">
            <select  name="floors" id="floors">
                <option value="">--Select--</option>
                <?php
                foreach ($floors as $floor) {
                    ?> 
                    <option <?php echo isset($project['floorNo']) ? (($floor == $project['floorNo']) ? 'selected' : '') : '' ?> value="<?php echo $floor; ?>"><?php echo $floor; ?></option>

                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="totalfloors">Total floors</label>
        <div class="controls">
            <input type="text" value="<?php echo isset($project['totalFloor']) ? $project['totalFloor'] : '' ?>" id="totalfloors" name="totalfloors" placeholder="Total floors" autocomplete="off">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="projectdescription">Description</label>
        <div class="controls">
            <textarea id="description" name="projectdescription" rows="5" cols="20"><?php echo isset($project['description']) ? $project['description'] : '' ?></textarea>

        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="projectlocation">Location</label>
        <div class="controls">
            <input type="text" value="<?php echo isset($project['description']) ? $project['location'] : '' ?>" id="location" name="projectlocation" placeholder="Project Location" autocomplete="off">
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="projectcity">City</label>
        <div class="controls">
            <select id="city" name="projectcity" onchange="getLocality(this)">
                <option value="" >--Select--</option>
<?php foreach ($cities as $ct) { ?>
                    <option <?php echo isset($project['floorNo']) ? (($ct['id'] == $project['city']) ? 'selected' : '') : '' ?> value="<?php echo $ct['id'] ?>"><?php echo $ct['city_name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="projectarea">Area</label>
        <div class="controls">

            <select id="area" name="projectarea">
                <option value="">--Select--</option>
<?php foreach ($areas as $ar) { ?>
                    <option <?php echo ($ar['id'] == $project['area']) ? 'selected' : '' ?> value="<?php echo $ar['id'] ?>"><?php echo $ar['localityName'] ?></option>
                <?php } ?>
            </select>

        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="projectimage">Project Image</label>
        <div class="controls">
            <input type="file" id="image" name="projectimage" placeholder="Project Image" autocomplete="off">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="displayPriceUsers">Possession Status</label>
        <div class="controls">
            <label class="radio-inline">
                <input type="radio" <?php echo isset($project['possession']) ? (('undCons' == $project['possession']) ? 'checked' : '') : '' ?> id="newproject" name="possessionstatus" value="undCons">Under Construction
            </label>
            <label class="radio-inline">
                <input type="radio" <?php echo isset($project['possession']) ? (('readyMove' == $project['possession']) ? 'checked' : '') : '' ?> id="relsale" name="possessionstatus" value="readyMove">Ready to Move
            </label>
        </div>
    </div>
    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="registerbtn" >Submit</button>
        </div>
    </div>
</form>