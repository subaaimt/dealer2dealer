<?php addJs(array('js/city.js')); ?>
<div><?php echo getmessage(); ?></div>
<table  class="table table-bordered">
    <thead><th>Name</th><th>&nbsp;</th></thead>
<h2>Package</h2>

<?php
foreach ($cities as $city) {
    ?>
    <tr>
        <td><?php echo $city['city_name'] ?></td>

        <td>        
            <a href="<?php echo BASE_URL ?>city/manage/edit/<?php echo $city['id'] ?>">Edit</a>
            | <a onclick="return citydelete()" href="<?php echo BASE_URL ?>city/manage/delete/<?php echo $city['id'] ?>">Delete</a>      
    </tr>


<?php } ?>
</table>
<?php echo $pagination;?>