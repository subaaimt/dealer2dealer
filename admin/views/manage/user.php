<div><?php echo getmessage();?></div>
<h2>Manage Users</h2>
<?php addJs(array('js/admin.js')); ?>
<table  class="table table-bordered">
    <thead><th>Dealer ID</th><th>Name</th><th>Email</th><th>Mobile No</th><th>&nbsp;</th></thead>

    
        <?php 

foreach ($users as $user){
?>
    <tr>
        <td>D2D<?php echo $user['id']?></td>
        <td>
            <?php echo $user['name']?>
        </td>
        <td>
            <?php echo $user['email']?>
        </td><td>
            <?php echo $user['mobileNo']?>
        </td>
    <td>
        <?php if($user['status']==1){?>
        <a href="<?php echo BASE_URL?>manage/deactivate/id/<?php echo $user['id']?>">De-activate</a>
        <?php }else{?>
        <a href="<?php echo BASE_URL?>manage/activate/id/<?php echo $user['id']?>">Activate</a>
        <?php }?>
        | <a href="<?php echo BASE_URL?>manage/user/id/<?php echo $user['id']?>">Edit</a>
        | <a onclick="return confirmation()" href="<?php echo BASE_URL?>manage/user/delete/<?php echo $user['id']?>">Delete</a>
        </td>
    </tr>


<?php }?>
</table>
<?php echo $pagination['pagination'];?>