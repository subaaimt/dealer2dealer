<div><?php echo getmessage(); ?></div>
<h2>Mange Package</h2>

<table  class="table table-bordered">
    <thead><th>Name</th><th>Description</th><th>Days</th><th>Credits</th><th>&nbsp;</th></thead>

    
        <?php 

foreach ($packages as $package){
?>
    <tr>
        <td><?php echo $package['name']?></td>
        <td>
            <?php echo $package['description'];?>
        </td>
        <td>
            <?php echo $package['days']?>
        </td>
        <td>
            <?php echo $package['credits']?>
        </td>
    <td>        
        <a href="<?php echo BASE_URL?>manage/package/edit/<?php echo $package['id']?>">Edit</a>               
    </tr>


<?php }?>
</table>