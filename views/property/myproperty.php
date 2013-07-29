<table  class="table table-bordered">
    <thead><th>Property for</th><th>Type</th><th>Title</th><th>Description</th><th>&nbsp;</th></thead>
<?php 
foreach ($properties as $property){
?>
    <tr>
        <td>
            <?php echo $property['for']?>
        </td>
        <td>
            <?php echo $property['type']?>
        </td>
        <td>
            <?php echo $property['title']?>
        </td><td>
            <?php echo $property['description']?>
        </td>
    <td>
        <a href="<?php echo BASE_URL?>property/edit/id/<?php echo $property['id']?>">Edit</a>&nbsp;<a href="<?php echo BASE_URL?>property/delete/id/<?php echo $property['id']?>">Delete</a>
        </td>
    </tr>


<?php }?>
</table>