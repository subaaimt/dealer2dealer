<table  class="table table-bordered">
    <thead><th>ID</th><th>Name</th><th>Email</th><th>Mobile No</th><th>&nbsp;</th></thead>
<h2>Users</h2>
    
        <?php 

foreach ($users as $user){
?>
    <tr>
        <td><?php echo $user['id']?></td>
        <td>
            <?php echo $user['first'].' '.$user['last']?>
        </td>
        <td>
            <?php echo $user['email']?>
        </td><td>
            <?php echo $user['mb_no']?>
        </td>
    <td>
        <?php if($user['status']==1){?>
        <a href="<?php echo BASE_URL?>manage/deactivate/id/<?php echo $user['id']?>">De-Activate</a>
        <?php }else{?>
        <a href="<?php echo BASE_URL?>manage/activate/id/<?php echo $user['id']?>">Activate</a>
        <?php }?>
        
        </td>
    </tr>


<?php }?>
</table>