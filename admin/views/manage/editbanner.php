

<div class="alert alert-success"><?php echo getmessage(); ?></div>
<form class="form-horizontal" method="post" id="adbanner" enctype="multipart/form-data" >
    <div class="control-group">
        <label class="control-label" for="title">Banner Title</label>
        <div class="controls">
            <input type="text" id="title" name="title" placeholder="Title" value="<?php echo $bannerdata['title']  ?>">
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
                <option value="left" <?php echo ($bannerdata['position']=='left')?'selected':''?>>Left</option>
                <option value="right" <?php echo ($bannerdata['position']=='right')?'selected':''?>>Right</option>  
            </select>
        </div>
    </div>

    <div class="control-group">

        <div class="controls">
            <button type="submit" class="btn btn-primary" id="updateregisterbtn" >Submit</button>
        </div>
    </div>
</form>