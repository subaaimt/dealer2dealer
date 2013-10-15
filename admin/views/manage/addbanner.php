<div ><?php echo getmessage(); ?></div>
<h2>Add Banner</h2>
<?php addJs(array('js/admin.js')); ?>

<form class="form-horizontal" method="post" id="adbanner" enctype="multipart/form-data" onsubmit="return validateBannerform()">
    <div class="control-group">
        <label class="control-label" for="title">Banner Title</label>
        <div class="controls">
            <input type="text" id="title" name="title" placeholder="Title" value="<?php //echo $userresults['first']   ?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="title">Banner Url</label>
        <div class="controls">
            <input type="text" id="url" name="url" placeholder="Url" value="<?php //echo $userresults['first']   ?>">
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label" for="lastname">Banner Image</label>
        <div class="controls ">
            <input type="file" id="banner_path" name="banner_path" >
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="companyname">Banner Position</label>
        <div class="controls">
            <select id="bannerposition" name="position" onchange="getLocalityforRegister(this)">
                <option value="">--Select--</option>
                <option value="left">Left 200x58 </option>
                <option value="center">Center 470x250</option>
                <option value="right">Right 200x142</option>  
            </select>
        </div>
    </div>

    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="updateregisterbtn" >Submit</button>
        </div>
    </div>
</form>