<table  class="table table-bordered">
    <thead><th >Property for</th><th>Type</th><th>Title</th><th>&nbsp;</th></thead>
<?php if(!empty($properties)){
foreach ($properties as $property){
?>
    <tr>
        <td >
            <?php echo $property['for']?>
        </td>
        <td >
            <?php echo $propertyType[$property['type']]?>
        </td>
        <td>
            <?php echo $property['title']?>
        </td>
    <td>
        <a href="<?php echo BASE_URL?>property/edit/id/<?php echo $property['pid']?>">Edit</a> | <a href="<?php echo BASE_URL?>property/delete/pid/<?php echo $property['id']?>">Delete</a>
        </td>
    </tr>


<?php }}else{
    ?><tr><td colspan="5" style="text-align: center;    ">No record found</td></tr><?php
}
?>
</table>