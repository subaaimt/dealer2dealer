
<style type="text/css">
a:hover{
text-decoration:none;
font-weight:normal;
style="color:#105698;"
}
</style>

<script>
    function confirmation(){
    if(confirm('Are you sure you want to delete this property.')){
        return true;
    }else
        return false;
}
    </script>
<h2 style="color:#FF3300">Expired Properties</h2>
<div><?php echo getmessage(); ?></div>
<table style="font-family:sans-serif; width:756px; border:1px solid #EFEFEF; border-radius:8px;" border="1px">
<tr style="height:26px; font-size:14px; background-color:#1c558a; color:white; text-shadow:1px 2px 1px #082b4c; border:1px solid #EFEFEF;">
	
    <td style="width:95px;padding-left:5px;">Property For</td>
    <td style="width:145px; padding-left:5px;">Type</td>
    <td style="width:245px; padding-left:5px;">Title</td>
    <td style="width:100px; margin:100px; padding-left:5px;">Manage</td>
    <td style="width:100px; margin:100px; padding-left:5px;">Action</td>
</tr>
<?php if(!empty($properties)){
foreach ($properties as $property){
?>
    <tr>
        <td style="font-size:12px; text-transform: capitalize;">
            <?php echo $property['for']?>
        </td>
        <td style="font-size:12px;">
            <?php echo $propertyType[$property['type']]?>
        </td>
        <td style="font-size:12px;">
            <?php echo $property['title']?>
        </td><td style="font-size:12px;">
            <?php echo $property['description']?>
        </td>
        <td style="font-size:12px;">
        
        <a href="<?php echo BASE_URL?>property/edit/id/<?php echo $property['pid']?>" style="color:#105698;">Edit</a>
        <?php if($status==1 || $status!=2){?>
       | <a href="<?php echo BASE_URL?>property/publish/id/<?php echo $property['pid']?>/ref/expired" style="color:#105698;">Publish</a>
        <?php }?>
       |         
     <a onclick="return confirmation()" href="<?php echo BASE_URL?>property/delete/pid/<?php echo $property['pid']?>/ref/expired" style="font-size:12px; color:#000066;"><u>Delete 
     </u></a> 


        </td>
    </tr>


<?php }}else{
    ?><tr><td colspan="5" style="text-align: center;    ">No record found</td></tr><?php
}
?>
</table>
<?php echo $pagination;?>