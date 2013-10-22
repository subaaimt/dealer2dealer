<div style="width:100%; height:200px;">
<div style="float:left;">
    <?php if(!empty($userresult["imagepath"])){?>
    <img src="<?php echo BASE_URL . 'media/user/resized/' . $userresult["imagepath"] ?>"></div>
    
    <?php }else{?>
    <img src="<?php echo BASE_URL . 'img/profile.png'; ?>"></div>
<?php }?>
<div style="float:right; width:390px; height:100px;color:#0066cc;">
<br />
<p style="font-size:25px; color:#0033FF; font-family:sans-serif; text-align:left;">
Welcome,&nbsp;<?php echo $userresult['name'] ?> !</p><br />
<img src="img/edit.png" style="" />
<a href="<?php echo BASE_URL?>user/myaccount" style="color:#0066cc;">Edit Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/pasword.png" style="" />
<a href="<?php echo BASE_URL?>user/changepassword" style="color:#0066cc;">Change Password</a><br /><br />
<table style="font-size:15px;">
    <tr>
    <td><p style="color:#0033FF; font-size:15px;">Membership Details</p></td>
    <td></td>
    </tr>
<?php if ($status) { ?>
    <tr>
    <td style="width:200px; font-weight:bold;">Credits Pending:</td>
    <td style="width:300px;"><?php echo $userresult['remainingCredits'] ?></td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Current Package:</td>
    <td><?php echo $pkdata['name'] ?></td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Activation Date:</td>
    <td><?php echo date('d-F-Y h:i a', $userresult['activationDate']) ?></td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Expiry Date:</td>
    <td><?php echo date('d-F-Y h:i a', $userresult['memberExpiryDate']) ?></td>
    </tr>
    </table>
<?php } else { ?>
 <table class="dl-horizontal">
 <tr>
 <td style="color:red;">Your Membership Expired. Please Renew Your Membership</td>
</tr>
 </table>
<?php } ?>

</div>
</div>
<hr style="border:1px dashed #999999;"/>
<table class="dl-horizontal profile" style="width:100%; font-family:sans-serif; text-shadow:1px 1px 1px 1px #CCCCCC;">
	<tr>
    <td style="width:200px; font-weight:bold;">Name:</td>
    <td style="width:300px;"><?php echo $userresult['name'] ?></td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Email Id:</td>
    <td><?php echo $userresult['email'] ?></td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Company Name:</td>
    <td><?php echo $userresult['companyName'] ?></td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Mobile No.:</td>
    <td><?php echo $userresult['mobileNo'] ?></td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Optional Mobile No.:</td>
    <td><b><?php echo $userresult['optionalmobileNo'] ?></b></td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Address:</td>
    <td><?php echo $userresult['address'] ?></td>
    </tr>
    <tr>
    <td style="font-weight:bold;">City:</td>
    <td><?php echo $userresult['city_name'] ?></td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Area:</td>
    <td><?php echo $userresult['localityName'] ?></td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Last Login:</td>
    <td><?php echo date('Y-m-d h:i:s a', $userresult['lastLogin']) ?></td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Joining Date:</td>
    <td><?php echo date('Y-m-d h:i:s a', $userresult['created']) ?></td>
    </tr>
    </table>
    