



<head>
<style type="text/css">
a:hover{
text-decoration:none;
font-weight:normal;
}
</style>
</head>

<h2 style="color:#1c558a;">Dashboard</h2><br  />

<script>
    function confirmation(){
    if(confirm('Are you sure you want to delete this property.')){
        return true;
    }else
        return false;
}
    </script>
<table style="font-family:sans-serif; width:100%; border:1px solid #EFEFEF; border-radius:8px; width: 752px;" border="1px">
<?php if(!empty($properties)){
foreach ($properties as $property){
?>
    <tr>
        
        <td style="font-size:14px;  padding-bottom:10px; ">
            <img src="<?php echo BASE_URL?>img/home_logo.png" style="height:20px; width:20px;"/> 
            
                <?php echo $property['type']?> for <?php echo $property['for']?> in 
                   
                        <?php echo $property['localityName']?> at  <?php echo $property['city_name']?> 

with area of   <?php echo $property['plotLandArea']?><?php echo $property['plotLandAreaUnit']?> and  value of <?php echo $property['price']?> Rs
        <a href="<?php echo BASE_URL?>property/view/id/<?php echo $property['pid']?>" style="background-color:#5db2ff; color:white; border:20px; ">Readmore</a></td>    
    </tr>


<?php }}else{
    ?><tr><td  style="text-align: center;    ">No record found</td></tr><?php
}
?>
</table>
 