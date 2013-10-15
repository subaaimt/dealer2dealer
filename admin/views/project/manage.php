<?php addJs(array('js/project.js')); ?>
<table  class="table table-bordered">
    <thead><th>Project Name</th><th>Type</th><th>Company</th><th>Description</th><th>&nbsp;</th></thead>
<?php
foreach ($projects as $project) {
    ?>
    <tr>
        <td>
            <?php echo $project['name'] ?>
        </td>
        <td>
            <?php echo $project['type'] ?>
        </td>
        <td>
            <?php echo $project['projectName'] ?>
        </td><td>
            <?php echo $project['description'] ?>
        </td>
        <td>
            <?php if($project['status']=='published'){ ?>      
            <a href="<?php echo BASE_URL ?>project/status/id/<?php echo $project['id'] ?>/status/0">Un-Publish</a>
<?php }else{ ?> 
            <a href="<?php echo BASE_URL ?>project/status/id/<?php echo $project['id'] ?>/status/1">Publish</a>
<?php }?> 
            | <a href="<?php echo BASE_URL ?>project/edit/id/<?php echo $project['id'] ?>">Edit</a> |
            <a onclick="return confirmation()" href="<?php echo BASE_URL ?>project/delete/id/<?php echo $project['id'] ?>">Delete</a>
        </td>
    </tr>


<?php } ?>
</table>

<?php echo $pagination?>
