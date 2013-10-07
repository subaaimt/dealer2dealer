
<?php if(!empty($properties)){
    foreach($properties as $prop){?>
<div style="height:auto; font-family:sans-serif; width:756px; border:1px solid #EFEFEF; border-radius:8px;" border="1px" class="pdiv1" <?php echo $prop['title']?> >
    <p style="margin-bottom:-9px; color:#1c558a;"> <b><u><a href="<?php echo BASE_URL?>property/view/id/<?php echo $prop['pid'];  ?>" ">  <?php echo $prop['title']?></b></u> </a></p>
    <div class="pdiv1inner1">
    
        <?php if(empty($prop['mediapath'])){?>
        <img src="<?php echo BASE_URL ?>img/noImageProp.png" height="100" width="130"/>
        <?php }else{?>
<img src="<?php echo BASE_URL ?>media/property/<?php echo $prop['mediapath']?>" height="100" width="130"/>
        <?php }?>
    </div>
    <div class="pdiv1inner2" style="height:auto;">
           <p style="height: 36px; overflow: hidden; padding-right: 10px;"> <?php echo $prop['description']?></p>
            <p style="float: right;"><a href="<?php echo BASE_URL?>property/view/id/<?php echo $prop['pid'];  ?>" style="background-color:#5db2ff; color:white; border:20px;">Read more </a>  </p>

    </div>
    <div class="pdiv1inner3">

        <p><b> Contact Dealer </b> <br/>
            <?php echo $prop['name']?> <br/>           
            <?php echo $prop['mobileNo']?> <br/>
             <?php echo $prop['email']?> </p>
    </div>

</div> 

<?php }

 echo $pagination;
        }else{?>

<div class="alert">Result Not found</div>
<?php } ?>
