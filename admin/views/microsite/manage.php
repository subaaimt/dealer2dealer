<div><?php echo getmessage();?></div>
<h2>Manage Microsites</h2>
<?php addJs(array('js/admin.js')); ?>

<table  class="table table-bordered">
    <thead><th>ID</th><th>Title</th><th>Url</th><th>&nbsp;</th></thead>

        <?php 

foreach ($microsites as $microsite){
?>
    <tr>
        <td><?php echo $microsite['id']?></td>
        <td>
            <?php echo $microsite['title'];?>
        </td>
        <td>
            <?php echo $microsite['url']?>
        </td>
        
    <td>

       <a target="_blank" href="<?php echo $microsite['url']?>">Preview</a>

        | <a href="<?php echo BASE_URL?>microsite/edit/id/<?php echo $microsite['id']?>">Edit</a>
        | <a onclick="return confirmationmicrosite()" href="<?php echo BASE_URL?>microsite/delete/id/<?php echo $microsite['id']?>">Delete</a>
        </td>
       
    </tr>


<?php }?>
</table>
<?php echo $pagination['pagination']?>