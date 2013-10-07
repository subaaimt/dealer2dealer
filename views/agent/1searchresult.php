
<?php if(!empty($users)){ foreach($users as $usr){?>
<div class="pdiv1" >
      <div class="pdiv1inner1">
        <?php if(empty($usr['mediapath'])){?>
        <img src="<?php echo BASE_URL ?>img/noImageProp.png" height="100" width="130"/>
        <?php }else{?>
<img src="<?php echo BASE_URL ?>media/user/<?php echo $prop['mediapath']?>" height="100" width="130"/>
        <?php }?>
    </div>
    <div class="pdiv1inner2" style="width: 196px;">
        <p style="margin-top:5px; margin-left: 5px;"> <b>Name: </b> <?php echo $usr['name']?> <br/>
            <b>Email: </b> <?php echo $usr['email']?> <br/>
            <b>Mobile: </b> <?php echo $usr['mobileNo']?> <br/>
            <b>Comapany: </b> <?php echo $usr['companyName']?> <br/>
            </p>

    </div>
    <div class="pdiv1inner3" style="width: 181px;">

        <p style="margin-top:5px; margin-left: 5px;"><b>  Dealer Address</b> <br/>
            <?php echo $usr['address']?> <br/>            
            <?php echo $usr['city_name']?> <br/>
            <?php echo $usr['localityName']?></p>
    </div>

</div>   
<?php }}else{?>

<div class="alert">Result Not found</div>
<?php } ?>
