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
        <?php echo $project['name']; ?>
    </div>
    <div style="float:left;margin-top:5px;" >
        <?php if ($project['mediapath'] == '') { ?>
            <img src="<?php echo BASE_URL ?>/img/prop.jpg"  width="230px" height="200px"/>
        <?php } else { ?>
            <img src="<?php echo BASE_URL ?>media/project/<?php echo $project['mediapath'] ?>"  width="200px" height="200px"/>
        <?php } ?>



    </div>
    <div style="float:left; margin-left:5px; margin-top:5px;">
        <div style="height:30px;width:100%; font-size:18px; font-weight:bold; padding-top:5px; color:#00b4e6;">
            <u>Company Details</u>
<!--            <img src="<?php echo BASE_URL ?>/img/image1.PNG" width="216px" />-->
        </div>
        <div>
            <table style="height:auto; font-size:13px;">
                <tr>
                    <td style="width:90px;">Email Id</td>
                    <td style="width:15px; font-weight:bold;">:</td>
                    <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['emailid']; ?></p></td>
                </tr>
                <tr>
                    <td>Company</td><td style="width:15px; font-weight:bold;">:</td>
                    <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['projectName']; ?></p></td>
                </tr>
                <tr>
                    <td>Phone</td><td style="width:15px; font-weight:bold;">:</td>
                    <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['phoneNumber']; ?></p></td>
                </tr>

                <tr>
                    <td>Address</td><td style="width:15px; font-weight:bold;">:</td>
                    <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['address']; ?></p></td>
                </tr>
                <tr>
                    <td>City</td><td style="width:15px; font-weight:bold;">:</td>
                    <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['cacity_name'];   ?></p></td>
                </tr>
                <tr>
                    <td>Area</td><td style="width:15px; font-weight:bold;">:</td>
                    <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['calocalityName'];   ?></p></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="banner" style="width:100%; margin-top:15px; margin-bottom:10px;">
        Project Details
    </div>

    <table style="width:756px; height:auto; font-size:12px;">
        <tr>
            <?php if ($project['displayPrice']=='yes') { ?>
            <td>Price</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo moneyFormatIndia($project['price']) ?></p></td>
            <?php } ?>
            <td>Location</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['location'] ?></p></td>
        </tr>
        <tr>
            <td>Property Type</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['type'] ?></p></td>
            <td>Area</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['localityName'] ?></p></td>
            
        </tr>

        <tr>
            <?php if (!isset($hidefields['bedrooms'])) { ?>
                <td>Bedrooms</td>
                <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['bedroom'] ?></p></td>
                <?php
            }?>
                 <?php //if (!isset($hidefields['totalfloors'])) { ?>
                <td>City</td>
                <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['city_name'] ?></p></td>
            <?php //} ?>
                
        </tr>
        <tr>
            <?php if (!isset($hidefields['bathrooms'])) { ?>
                <td>Bathrooms</td>
                <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['bathroom'] ?></p></td>
                <?php
            } ?>
                <?php
            if (!isset($hidefields['coveredarea'])) {
                ?>
                <td>Covered Area</td>
                <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['coveredArea'] ?> <?php echo $project['coveredAreaUnit'] ?></p></td>
            <?php } ?>
                
        </tr>
        <tr>
           
                <?php
            if (!isset($hidefields['floors'])) {
                ?>
                <td>Floor No</td>
                <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['floorNo'] ?></p></td>
            <?php } ?>
            <td>Plot/Land Area</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['plotLandArea'] ?> <?php echo $project['plotLandAreaUnit'] ?></p></td>
        </tr>
        <tr>
            <td>Total Floors</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['totalFloor'] ?></p></td>
            <td>Possession Status</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['possession']=='undCons'?'Under Construction':'Ready to Move' ?></p></td>
        </tr>
    </table>


    <div class="banner" style=" margin-top:10px; margin-bottom:10px; width:100%;">
        Description
    </div>
    <div id="txt1">
        <p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $project['description'] ?></p>
    </div>
</div>
