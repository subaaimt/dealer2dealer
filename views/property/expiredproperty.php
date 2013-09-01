<h2>Expired Properties</h2>
<div>&nbsp;</div>
<table  class="table table-bordered">
    <thead><th>Property for</th><th>Type</th><th>Title</th><th>Description</th><th>&nbsp;</th></thead>
<?php if(!empty($properties)){
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
        
        <a href="<?php echo BASE_URL?>property/edit/id/<?php echo $property['id']?>">Edit</a>&nbsp;
        <?php if($status){?>
        <a href="<?php echo BASE_URL?>property/publish/id/<?php echo $property['id']?>">Publish</a>
        <?php }?>
        </td>
    </tr>


<?php }}else{
    ?><tr><td colspan="5" style="text-align: center;    ">No record found</td></tr><?php
}
?>
</table>