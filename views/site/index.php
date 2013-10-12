<h2 style="padding-top:4px; background-color:#1c558a; height:30px; color: white; padding-left: 17px;">Property Update</h2>
<div class="slider-wrapper theme-default">
<div class="nivoSlider" id="slider">
<?php foreach ($_SESSION['banners'] as $center){if($center['position']=='center'){?>
<img width="470" height="250" src="<?php echo BASE_URL.'media/banner/'.$center['banner_path']; ?>" alt="<?php echo $center['title'] ?>" />  <?php }}?>
</div>
</div>

<table style="font-family:sans-serif; width:100%; border:1px solid #EFEFEF; border-radius:8px;" border="1px">
<?php if(!empty($properties)){
foreach ($properties as $property){
?>
    <tr>
        
        <td style="font-size:14px; text-transform: capitalize; padding-bottom:10px; ">
            <img src="<?php echo BASE_URL?>img/home_logo.png" style="height:20px; width:20px;"/> &nbsp;&nbsp;&nbsp;<?php echo $property['for']?>&nbsp;&nbsp;/&nbsp;&nbsp;
                <?php echo $property['type']?>&nbsp;&nbsp;/&nbsp;&nbsp;
                    <?php echo $property['city_name']?>&nbsp;&nbsp;/&nbsp;&nbsp;
                        <?php echo $property['localityName']?>&nbsp;&nbsp;/&nbsp;&nbsp;
                            <?php echo $property['plotLandArea']?>&nbsp;<?php echo $property['plotLandAreaUnit']?>&nbsp;&nbsp;/&nbsp;&nbsp;
                            price <?php echo $property['price']?> 
        </td>    
    </tr>


<?php }}else{
    ?><tr><td colspan="5" style="text-align: center;    ">No record found</td></tr><?php
}
?>
</table>
                        