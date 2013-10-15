<div><?php echo getmessage();?></div>
<h2>Manage Banner</h2>
<?php addJs(array('js/admin.js')); ?>

<table  class="table table-bordered">
    <thead><th>ID</th><th>Title</th><th>Position</th><th>&nbsp;</th></thead>

        <?php 

foreach ($banners as $banner){
?>
    <tr>
        <td><?php echo $banner['id']?></td>
        <td>
            <?php echo $banner['title'];?>
        </td>
        <td>
            <?php echo $banner['position']?>
        </td>
        
    <td>
        <?php if($banner['status']==0){?>
        <a href="<?php echo BASE_URL?>manage/changebannerstatus/id/<?php echo $banner['id']?>/status/1">Activate</a>
        <?php }else{?>
       <a href="<?php echo BASE_URL?>manage/changebannerstatus/id/<?php echo $banner['id']?>/status/0">De-Activate</a>
        <?php }?>
        | <a href="<?php echo BASE_URL?>manage/editbanner/id/<?php echo $banner['id']?>">Edit</a>
        | <a onclick="return confirmationbanner()" href="<?php echo BASE_URL?>manage/editbanner/delete/<?php echo $banner['id']?>">Delete</a>
        </td>
       
    </tr>


<?php }?>
</table>
<?php echo $pagination['pagination']?>