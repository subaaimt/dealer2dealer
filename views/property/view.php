<?php
addCss(array('css/property.css'));
?>
<div id="contain">
    <div id="container">
        <?php echo $property['title']; ?>

    </div>
    <div id="leftbar">
        <?php if ($property['mediapath'] == '') { ?>
            <img src="<?php echo BASE_URL ?>/img/prop.jpg"  width="290px" height="200px"/>
        <?php } else { ?>
            <img src="<?php echo BASE_URL ?>media/property/<?php echo $property['mediapath'] ?>"  width="290px" height="200px"/>
        <?php } ?>
    </div>
    <div id="right_bar">
        <div id="rightbar">
            Dealer Details
<!--            <img src="<?php echo BASE_URL ?>/img/image1.PNG" width="216px" />-->
        </div>
        <div id="rightbar1">
            Name<br />
            Company<br />
            Phone<br />
            Email<br />           
            Address<br />
            City<br />
            Area<br />
        </div>
        <div id="rightbar2">
            <?php echo $property['name']; ?><br />
            <?php echo $property['companyName']; ?><br />
            <?php echo $property['mobileNo']; ?><br />
            <?php echo $property['email']; ?><br />           
            <?php echo $property['address']; ?><br />

            <?php echo $property['city_name']; ?><br />
            <?php echo $property['localityName']; ?>
        </div>
    </div>
    <div class="banner">
        Description
    </div>
    <div class="leftbar1">
        Property For<br /><br>
        Property Type<br /><br />
        Transaction Type
    </div>
    <div class="leftbar2txt">
        <?php echo $property['for'] ?><br /><br />
        <?php echo $property['type'] ?><br /><br />
        <?php echo $property['transType'] ?>
    </div>
    <div class="leftbar2">
        Plot/Land Area<br /><br />
        Location<br /><br />
        Area
    </div>
    <div class="right_bar1">
        <?php echo $property['plotLandArea'] ?>  <?php echo $property['plotLandAreaUnit'] ?><br /><br />
        <?php echo $property['location'] ?><br /><br />
        <?php echo $property['localityName'] ?>
    </div>

    <div style="clear: both;"></div>
    <!-------------------------------------------------->
    <?php if ($property['ptype'] == 1) { ?>
        <div class="leftbar1">
            Bedrooms<br /><br>
            Bathrooms<br /><br />
            Furnished
        </div>
        <div class="leftbar2txt">
            <?php echo $property['bedroom'] ?><br /><br />
            <?php echo $property['bathroom'] ?><br /><br />
            <?php echo $property['furnished'] ?>
        </div>
        <div class="leftbar2">
            Covered Area<br /><br />
            Floor No<br /><br />
            Total floors
        </div>
        <div class="right_bar1">
            <?php echo $property['coveredArea'] ?> <?php echo $property['coveredAreaUnit'] ?><br /><br />
            <?php echo $property['floorNo'] ?><br /><br />
            <?php echo $property['totalFloor'] ?>
        </div>
    <?php } ?>
    <div class="banner">
        Details
    </div>
    <div id="txt1">
        <?php echo $property['description'] ?>
    </div>
</div>
