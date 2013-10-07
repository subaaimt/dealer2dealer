
<?php if(!empty($users)){ foreach($users as $usr){     ?>
<div class="pdiv1" style="border:1px solid #F5F5F5; width:756px; height:auto; margin-top:5px; margin-bottom:5px;">
      <div class="pdiv1inner1">
        <?php  if(empty($usr['imagepath'])){?>
        <img src="<?php echo BASE_URL ?>img/profile.png" height="100" width="130"/>
        <?php }else{?>
<img src="<?php echo BASE_URL ?>media/user/resized/<?php echo $usr['imagepath']?>" height="100" width="130"/>
        <?php }?>
    </div><br />
    <table style="font-size:13px;"> 
    <tr>
    <td style="width:110px;"><b>Name: </b></td>
    <td style="width:200px;"><?php echo $usr['name']?></td>
    <td>Dealer Address</td>
    </tr>
    <tr>
    <td><b>Email: </b></td>
    <td><?php echo $usr['email']?></td>
    <td><?php echo $usr['address']?></td>
    </tr>
    <tr>
    <td><b>Mobile: </b></td>
    <td><?php echo $usr['mobileNo']?></td>
    <td><?php echo $usr['city_name']?></td>
    </tr>
    <tr>
    <td><b>Company: </b></td>
    <td><?php echo $usr['companyName']?></td>
    <td><?php echo $usr['localityName']?></td>
    </tr>
    </table>
</div>   
<?php }

 echo $pagination;
        }else{?>

<div class="alert">Result Not found</div>
<?php } ?>
