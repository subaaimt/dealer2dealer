<?php
addCss(array('css/property.css'));

if (isset($projectFieldRelation[$project['ptype']])) {
    $hidefields = array_flip($projectFieldRelation[$project['ptype']]);

} else {
    $hidefields = array();
    
}


?>
<div id="contain" style="width:756px;">
    <div id="container" style="width:100%;">
        <?php echo $project['projectName']; ?>
    </div>
    <div style="float:left;margin-top:5px;" >
        <?php if ($project['mediapath'] == '') { ?>
            <img src="<?php echo BASE_URL ?>/img/prop.jpg"  width="230px" height="200px"/>
        <?php } else { ?>
            <img src="<?php echo BASE_URL ?>media/project/<?php echo $project['mediapath'] ?>"  width="200px" height="200px"/>
        <?php } ?>
    </div>

    
    <div class="banner" style="width:100%; margin-top:15px; margin-bottom:10px;">
        Properties Details
    </div>

    <table style="width:756px; height:auto; font-size:12px;">
        <tr>
            <td>Project Name</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['name'] ?></p></td>
            <td>Area</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['localityName'] ?></p></td>
        </tr>
        <tr>
            <td>Property Type</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['type'] ?></p></td>
            <td>Location</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['location'] ?></p></td>
        </tr>

        <tr>
            <?php if (!isset($hidefields['bedrooms'])) { ?>
                <td>Bedrooms</td>
                <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['bedroom'] ?></p></td>
            <?php
            }
            if (!isset($hidefields['coveredarea'])) {
                ?>
                <td>Covered Area</td>
                <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['coveredArea'] ?> <?php echo $project['coveredAreaUnit'] ?></p></td>
<?php } ?>
        </tr>
        <tr>
            <?php if (!isset($hidefields['bathrooms'])) { ?>
            <td>Bathrooms</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['bathroom'] ?></p></td>
           <?php
            }
            if (!isset($hidefields['floors'])) {?>
            <td>Floor No</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['floorNo'] ?></p></td>
        
        <?php } ?>
        </tr>
        <tr>
            
             <?php
            
            if (!isset($hidefields['totalfloors'])) {?>
            <td>Total floors</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['totalFloor'] ?></p></td>
          <?php } ?>
        </tr>
    </table>


    <div class="banner" style=" margin-top:10px; margin-bottom:10px; width:100%;">
        Description
    </div>
    <div id="txt1">
        <p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['description'] ?></p>
    </div>
</div>
