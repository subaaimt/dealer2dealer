<table  class="table table-bordered">
    <thead><th>ID</th><th>Title</th><th>Position</th><th>&nbsp;</th></thead>
<h2>Banners</h2>
    
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
        
        </td>
        <td>
           <a href="<?php echo BASE_URL?>manage/editbanner/id/<?php echo $banner['id']?>">Edit</a>
        </td>
    </tr>


<?php }?>
</table>