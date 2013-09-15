
<?php if(!empty($properties)){
    foreach($properties as $prop){?>
<div class="pdiv1" <?php echo $prop['title']?> >
    <div class="pdiv1inner1">
        <?php if(empty($prop['mediapath'])){?>
        <img src="<?php echo BASE_URL ?>img/noImageProp.png" height="100" width="130"/>
        <?php }else{?>
<img src="<?php echo BASE_URL ?>media/property/<?php echo $prop['mediapath']?>" height="100" width="130"/>
        <?php }?>
    </div>
    <div class="pdiv1inner2">
        <p> <b>  <?php echo $prop['title']?></b> 
           <p style="height: 36px; overflow: hidden; padding-right: 10px;"> <?php echo $prop['description']?></p>
            <p style="float: right;"><a href="<?php echo BASE_URL?>property/view/id/<?php echo $prop['pid'];  ?>">Read more </a>  </p>

    </div>
    <div class="pdiv1inner3">

        <p><b> Contact Dealer </b> <br/>
            <?php echo $prop['name']?> <br/>           
            <?php echo $prop['mobileNo']?> <br/>
             <?php echo $prop['email']?> </p>
    </div>

</div>   
<?php }}else{?>

<div class="alert">Result Not found</div>
<?php } ?>
