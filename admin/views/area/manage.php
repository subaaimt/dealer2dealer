<h2>Manage Areas</h2>
<?php addJs(array('js/area.js')); ?>
<div><?php echo getmessage(); ?></div>
<table  class="table table-bordered">
    <thead><th>Locality Name</th><th>City</th><th>&nbsp;</th></thead>


<?php
foreach ($areas as $area) {
    ?>
    <tr>
        <td><?php echo $area['localityName'] ?></td>
<td><?php echo $area['city_name'] ?></td>
        <td>        
            <a href="<?php echo BASE_URL ?>area/manage/edit/<?php echo $area['aid'] ?>">Edit</a>
            | <a onclick="return areadelete()" href="<?php echo BASE_URL ?>area/manage/delete/<?php echo $area['aid'] ?>">Delete</a>      
    </tr>


<?php } ?>
</table>
<?php echo $pagination;?>