<div ><?php echo getmessage(); ?></div>
<h2>Update Microsite</h2>
<?php addJs(array('js/microsite.js')); ?>

<form class="form-horizontal" method="post" id="micrositeform" enctype="multipart/form-data" >
    <div class="control-group">
        <label class="control-label" for="title"> Microsite Directory</label>
        <div class="controls">
            <input type="text" id="title" name="title" placeholder="Title" value="<?php echo $micrositedata['title'] ?>">
            <input type="hidden" name="mid" value="<?php echo $micrositedata['id']; ?>" />
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label" for="lastname">Microsite File(Zip)</label>
        <div class="controls ">
            <input type="file" id="microsite_path" name="microsite_path" >
        </div>
    </div>
    <div class="control-group">

        <div class="controls">
            <button type="button"  onclick="return validateMicrositeform('<?php echo $micrositedata['id']; ?>')" class="btn btn-primary" id="updateregisterbtn" >Submit</button>
        </div>
    </div>
</form>