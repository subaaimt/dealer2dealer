
<?php 
if(!empty($projects)){
foreach($projects as $proj){?>
<div class="pdiv1" <?php echo $proj['projectName']?> style="height:150px; width:756px;">
<div style="height:auto; font-family:sans-serif;">
<p style=" margin:0px;color:#1c558a;"> <b><u><?php echo $proj['name']?></b></u></p>
</div>

    <div class="pdiv1inner1">
<img src="<?php echo BASE_URL ?>media/project/<?php echo $proj['mediapath']?>" height="100" width="130"/>
    </div>
    <div class="pdiv1inner2">
        <p> 
            <?php echo $proj['description']?> <br/>
            

    </div>
    <div class="pdiv1inner3">
<p>
        <a href="<?php echo BASE_URL?>project/view/id/<?php echo $proj['id']?>"style="background-color:#5db2ff; color:white; border:20px;">  Read more >> </a>  </p>

    </div>

</div>   

<?php }echo $pagination;}else{?>

<div class="alert">Result Not found</div>
<?php } ?>