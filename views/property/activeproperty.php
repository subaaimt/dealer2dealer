



<head>
<style type="text/css">
a:hover{
text-decoration:none;
font-weight:normal;
}
</style>
</head>

<h2 style="color:#1c558a;">Active Properties</h2><br  />

<script>
    function confirmation(){
    if(confirm('Are you sure you want to delete this property.')){
        return true;
    }else
        return false;
}
    </script>
    <div><?php echo getmessage(); ?></div>
<table style="font-family:sans-serif; width:756px; border:1px solid #EFEFEF; border-radius:8px;" border="1px">
<tr style="height:26px; font-size:14px; background-color:#1c558a; color:white; text-shadow:1px 2px 1px #082b4c; border:1px solid #EFEFEF;">
	<td style="width:75px; width:70px;">Post On</td>
    <td style="width:95px;padding-left:5px;">Property For</td>
    <td style="width:145px; padding-left:5px;">Type</td>
    <td style="width:245px; padding-left:5px;">Title</td>
    <td style="width:100px; margin:100px; padding-left:5px;">Manage</td>
</tr>
<?php if(!empty($properties)){
foreach ($properties as $property){
?>
    <tr>
    <td style="font-size:12px;">
        <?php echo date('Y-m-d', $property['postedon']) ?>
    </td>
        <td style="font-size:12px;">
            <?php echo $property['for']?>
        </td>
        <td style="font-size:12px;">
            <?php echo $propertyType[$property['type']]?>
        </td>
        <td style="font-size:12px; margin:auto;">
            <?php echo $property['title']?>
        </td>
    <td style="margin:auto;">
     <a href="<?php echo BASE_URL?>property/edit/id/<?php echo $property['pid']?>" style="font-size:12px; color:#000066;"><u>Edit</u></a>|  
     <a  href="<?php echo BASE_URL?>property/view/id/<?php echo $property['pid']?>" style="font-size:12px; color:#000066;"><u>View
     </u></a>     
     |         
     <a onclick="return confirmation()" href="<?php echo BASE_URL?>property/delete/pid/<?php echo $property['pid']?>/ref/activeproperty" style="font-size:12px; color:#000066;"><u>Delete 
     </u></a>  
     
    </td>
    </tr>


<?php }}else{
    ?><tr><td colspan="5" style="text-align: center;    ">No record found</td></tr><?php
}
?>
</table>
    <?php echo $pagination;?>