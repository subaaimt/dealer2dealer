
<div class="slider-wrapper theme-default">
<div class="nivoSlider" id="slider">
<?php foreach ($_SESSION['banners'] as $center){if($center['position']=='center'){?>
<img width="470" height="250" src="<?php echo BASE_URL.'media/banner/'.$center['banner_path']; ?>" alt="<?php echo $center['title'] ?>" />  <?php }}?>
</div>
</div>

<table style="font-family:sans-serif; width:756px; border:1px solid #EFEFEF; border-radius:8px;" border="1px">
<tr style="height:26px; font-size:14px; background-color:#1c558a; color:white; text-shadow:1px 2px 1px #082b4c; border:1px solid #EFEFEF;">
<!--	<td style="width:75px; width:70px;">Post On</td>-->
    <td style="width:95px;padding-left:5px;">Property For</td>
    <td style="width:145px; padding-left:5px;">Type</td>
    <td style="width:245px; padding-left:5px;">Title</td>
    <td style="width:145px; padding-left:5px;">City</td>
    <td style="width:145px; padding-left:5px;">Area</td>
    <td style="width:145px; padding-left:5px;">Plot/Land Area</td>
    
</tr>
<?php if(!empty($properties)){
foreach ($properties as $property){
?>
    <tr>
<!--    <td style="font-size:12px;">
        <?php echo date('Y-m-d', $property['postedon']) ?>
    </td>-->
        <td style="font-size:12px; text-transform: capitalize">
            <?php echo $property['for']?>
        </td>
        <td style="font-size:12px;">
            <?php echo $property['type']?>
        </td>
        <td style="font-size:12px; margin:auto;">
            <?php echo $property['title']?>
        </td>
        <td style="font-size:12px; margin:auto;">
            <?php echo $property['city_name']?>
        </td>
        <td style="font-size:12px; margin:auto;">
            <?php echo $property['localityName']?>
        </td>
        <td style="font-size:12px; margin:auto;">
            <?php echo $property['plotLandArea']?> <?php echo $property['plotLandAreaUnit']?>
        </td>
    
    </tr>


<?php }}else{
    ?><tr><td colspan="5" style="text-align: center;    ">No record found</td></tr><?php
}
?>
</table>
                        