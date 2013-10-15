<div><?php echo getmessage(); ?></div>
<h2><?php echo isset($package['id'])?'Edit':'Add';?> Banner</h2>
<?php addJs(array('js/admin.js')); ?>

<form class="form-horizontal" method="post" id="adpackage" enctype="multipart/form-data" onsubmit="return validatePackageform1()" >
    <div class="control-group">
        <label class="control-label" for="title">Package Title</label>
        <div class="controls">
            <input type="text" id="title" name="title" placeholder="" value="<?php echo isset($package['name']) ? $package['name'] : ''; ?>">
        </div>
    </div>


    <div class="control-group ">
        <label class="control-label" for="lastname">Package Days</label>
        <div class="controls ">
            <input type="text" value="<?php echo isset($package['days']) ? $package['days'] : ''; ?>" id="package_days" name="package_days" >
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label" for="lastname">Package Credits</label>
        <div class="controls ">
            <input type="text" value="<?php echo isset($package['credits']) ? $package['credits'] : ''; ?>" id="package_credits" name="package_credits" >
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="companyname">Package Description</label>
        <div class="controls">
            <textarea id="package_descriptions" name="package_descriptions" ><?php echo isset($package['description']) ? $package['description'] : ''; ?></textarea>
        </div>
    </div>
    <input type="hidden" name="package_id" value="<?php echo isset($package['id']) ? $package['id'] : ''; ?>"/>

    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="updateregisterbtn" >Submit</button>
        </div>
    </div>
</form>