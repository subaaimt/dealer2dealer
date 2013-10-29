<div><?php echo getmessage(); ?></div>
<h2>Manage Users</h2>
<?php addJs(array('js/admin.js')); ?>
<table  class="table table-bordered">
    <thead><th>Dealer ID</th><th>Name</th><th>Email</th><th>Mobile No</th><th>Remaining Time</th><th>&nbsp;</th></thead>   
<?php
foreach ($users as $user) {
    ?>
    <tr>
        <td>D2D<?php echo $user['id'] ?></td>
        <td>
            <?php echo $user['name'] ?>
        </td>
        <td>
            <?php echo $user['email'] ?>
        </td><td>
            <?php echo $user['mobileNo'] ?>
        </td>
        <td>
            <?php
            if ($user['memberExpiryDate'] - time() > 0) {
                
                $remaining = intval(($user['memberExpiryDate'] - time()) / 86400);
               
                 $remaininghour = intval((($user['memberExpiryDate'] - time()) % 86400)/3600);
                 
                 $remainingmin = intval((((($user['memberExpiryDate'] - time()) % 86400))%3600)/60);
                 
                if ($remaining <= 7) {
                    echo '<span style="color:red; font-weight:bold;">'.$remaining.' days '.$remaininghour.' hours '.$remainingmin.' mins</span>';
                } else {
                    echo '<span style="color:green; font-weight:bold;">'.$remaining.' days '.$remaininghour.' hours '.$remainingmin.' mins</span>';
                }
            }
            else
                echo '<span style="color:red; font-weight:bold;">Expired</span>';
            ?>
        </td>
        <td>
            <?php if ($user['status'] == 1) { ?>
                <a href="<?php echo BASE_URL ?>user/deactivate/id/<?php echo $user['id'] ?>">De-activate</a>
            <?php } else { ?>
                <a href="<?php echo BASE_URL ?>user/activate/id/<?php echo $user['id'] ?>">Activate</a>
            <?php } ?>
            | <a href="<?php echo BASE_URL ?>user/index/id/<?php echo $user['id'] ?>">Edit</a>
            | <a onclick="return confirmation()" href="<?php echo BASE_URL ?>user/index/delete/<?php echo $user['id'] ?>">Delete</a>
        </td>
    </tr>


<?php } ?>
</table>
<?php echo $pagination['pagination']; ?>