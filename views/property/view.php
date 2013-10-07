<?php
addCss(array('css/property.css'));
if (isset($propertyFieldRelation[$property['ptype']])) {
    $hidefields = array_flip($propertyFieldRelation[$property['ptype']]);

} else {
    $hidefields = array();
    
}
?>
<div id="contain" style="width:756px;">
    <div id="container" style="width:100%;">
        <?php echo $property['title']; ?>
    </div>
    <div style="float:left;margin-top:5px;" >
        <?php if ($property['mediapath'] == '') { ?>
            <img src="<?php echo BASE_URL ?>/img/prop.jpg"  width="230px" height="200px"/>
        <?php } else { ?>
            <img src="<?php echo BASE_URL ?>media/property/<?php echo $property['mediapath'] ?>"  width="200px" height="200px"/>
        <?php } ?>
    </div>

    <div style="float:left; margin-left:5px; margin-top:5px;">
        <div style="height:30px;width:100%; font-size:18px; font-weight:bold; padding-top:5px; color:#00b4e6;">
            <u>Dealer Details</u>
<!--            <img src="<?php echo BASE_URL ?>/img/image1.PNG" width="216px" />-->
        </div>
        <div>
            <table style="height:auto; font-size:13px;">
                <tr>
                    <td style="width:90px;">Name</td>
                    <td style="width:15px; font-weight:bold;">:</td>
                    <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['name']; ?></p></td>
                </tr>
                <tr>
                    <td>Company</td><td style="width:15px; font-weight:bold;">:</td>
                    <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['companyName']; ?></p></td>
                </tr>
                <tr>
                    <td>Phone</td><td style="width:15px; font-weight:bold;">:</td>
                    <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['mobileNo']; ?></p></td>
                </tr>
                <tr>
                    <td>Email</td><td style="width:15px; font-weight:bold;">:</td>
                    <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['email']; ?></p></td>
                </tr>
                <tr>
                    <td>Address</td><td style="width:15px; font-weight:bold;">:</td>
                    <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['address']; ?></p></td>
                </tr>
                <tr>
                    <td>City</td><td style="width:15px; font-weight:bold;">:</td>
                    <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['city_name']; ?></p></td>
                </tr>
                <tr>
                    <td>Area</td><td style="width:15px; font-weight:bold;">:</td>
                    <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['localityName']; ?></p></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="banner" style="width:100%; margin-top:15px; margin-bottom:10px;">
        Properties Details
    </div>

    <table style="width:756px; height:auto; font-size:12px;">
        <tr>
            <td>Property For</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['for'] ?></p></td>
            <td>Plot/Land Area</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['plotLandArea'] ?>  <?php echo $property['plotLandAreaUnit'] ?></p></td>
        </tr>
        <tr>
            <td>Property Type</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['type'] ?></p></td>
            <td>Location</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['location'] ?></p></td>
        </tr>
        <tr>
            <td>Transaction Type</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['transType'] ?></p></td>
            <td>Area</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['localityName'] ?></p></td>
        </tr>
        <tr>
            <?php if (!isset($hidefields['bedrooms'])) { ?>
                <td>Bedrooms</td>
                <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['bedroom'] ?></p></td>
            <?php
            }
            if (!isset($hidefields['coveredarea'])) {
                ?>
                <td>Covered Area</td>
                <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['coveredArea'] ?> <?php echo $property['coveredAreaUnit'] ?></p></td>
<?php } ?>
        </tr>
        <tr>
            <?php if (!isset($hidefields['bathrooms'])) { ?>
            <td>Bathrooms</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['bathroom'] ?></p></td>
           <?php
            }
            if (!isset($hidefields['floors'])) {?>
            <td>Floor No</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['floorNo'] ?></p></td>
        
        <?php } ?>
        </tr>
        <tr>
             <?php if (!isset($hidefields['bathrooms'])) { ?>
            <td>Furnished</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['furnished'] ?></p></td>
             <?php
            }
            if (!isset($hidefields['totalfloors'])) {?>
            <td>Total floors</td>
            <td><p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['totalFloor'] ?></p></td>
          <?php } ?>
        </tr>
    </table>


    <div class="banner" style=" margin-top:10px; margin-bottom:10px; width:100%;">
        Description
    </div>
    <div id="txt1">
        <p style="color:#1c558a; margin:0px; padding:0px; font-weight:bold;"><?php echo $property['description'] ?></p>
    </div>
</div>
