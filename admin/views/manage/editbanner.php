<div class=""><?php echo getmessage(); ?></div>
<h2>Edit Banner</h2>

<?php addJs(array('js/admin.js')); ?>

<form class="form-horizontal" method="post" id="adbanner" enctype="multipart/form-data" onsubmit="return validateUpdateBannerform()">
    <div class="control-group">
        <label class="control-label" for="title">Banner Title</label>
        <div class="controls">
            <input type="text" id="title" name="title" placeholder="Title" value="<?php echo $bannerdata['title']  ?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="title">Banner Url</label>
        <div class="controls">
            <input type="text" id="url" name="url" placeholder="Url" value="<?php echo $bannerdata['url']   ?>">
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label" for="lastname">Banner Image</label>
        <div class="controls ">
            <input type="file" id="banner_path" name="banner_path" >
            
            <input type="hidden" id="bid" name="bid" value="<?php echo $bannerdata['id']?>" >
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="companyname">Banner Position</label>
        <div class="controls">
             <select id="bannerposition" name="position" onchange="getLocalityforRegister(this)">
                <option value="">--Select--</option>                
                <option value="left" <?php echo ($bannerdata['position']=='left')?'selected':''?>>Left 200x58</option>
                 <option value="center" <?php echo ($bannerdata['position']=='center')?'selected':''?>>Center 470x250</option>
                <option value="right" <?php echo ($bannerdata['position']=='right')?'selected':''?>>Right 200x142</option>  
            </select>
        </div>
    </div>

    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="updateregisterbtn" >Submit</button>
        </div>
    </div>
</form>