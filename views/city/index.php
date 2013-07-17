 <option value="">--Select--</option>
<?php foreach ($localities as $localvalue) { ?>
    <option value="<?php echo $localvalue['id']; ?>"><?php echo $localvalue['localityName']; ?></option>
<?php } ?>
