<table  class="table table-bordered">
    <thead><th>Project Name</th><th>Type</th><th>Company</th><th>Description</th><th>&nbsp;</th></thead>
<?php 
foreach ($projects as $project){
?>
    <tr>
        <td>
            <?php echo $project['name']?>
        </td>
        <td>
            <?php echo $project['type']?>
        </td>
        <td>
            <?php echo $project['projectName']?>
        </td><td>
            <?php echo $project['description']?>
        </td>
    <td>
        <a href="<?php echo BASE_URL?>project/edit/id/<?php echo $project['id']?>">Edit</a>&nbsp;<a href="<?php echo BASE_URL?>project/delete/id/<?php echo $project['id']?>">Delete</a>
        </td>
    </tr>


<?php }?>
</table>