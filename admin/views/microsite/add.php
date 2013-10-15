<div ><?php echo getmessage(); ?></div>
<h2>Add Microsite</h2>
<?php addJs(array('js/admin.js')); ?>

<form class="form-horizontal" method="post" id="admicrosite" enctype="multipart/form-data" onsubmit="return validateMicrositeform()">
    <div class="control-group">
        <label class="control-label" for="title">Microsite Title</label>
        <div class="controls">
            <input type="text" id="title" name="title" placeholder="Title" value="<?php //echo $userresults['first']   ?>">
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
            <button type="submit" class="btn btn-primary" id="updateregisterbtn" >Submit</button>
        </div>
    </div>
</form>