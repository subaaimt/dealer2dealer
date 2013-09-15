<h2 style="margin-bottom: 20px; margin-left: 20px;">My Profile</h2>

<dl class="dl-horizontal profile">


    <dt>

    <dd><img src="<?php echo BASE_URL . 'media/user/resized/150x150-' . $userresult["imagepath"] ?>"></dd>
    <dt>
    <dt>
    <dt>Name:</dt>
    <dd><?php echo $userresult['name'] ?></dd>
    <dt>
    <dt>
    <dt>Email Id:</dt>
    <dd><?php echo $userresult['email'] ?></dd>
    <dt>
    <dt>
    <dt>Company Name:</dt>
    <dd><?php echo $userresult['companyName'] ?></dd>
    <dt>
    <dt>
    <dt>Mobile No.:</dt>
    <dd><?php echo $userresult['mobileNo'] ?></dd>
    <dt>
      <dt>Optional Mobile No.:</dt>
    <dd><?php echo $userresult['optionalmobileNo'] ?></dd>
    <dt>
    <dt>
    <dt>Address:</dt>
    <dd><?php echo $userresult['address'] ?></dd>
    <dt>
    <dt>
    <dt>City:</dt>
    <dd><?php echo $userresult['city_name'] ?></dd>
    <dt>
    <dt>
    <dt>Area:</dt>
    <dd><?php echo $userresult['localityName'] ?></dd>
    <dt>
    <dt>
    <dt>Last Login:</dt>
    <dd><?php echo date('Y-m-d h:i:s a', $userresult['lastLogin']) ?></dd>
</dl>

<h2 style="margin-bottom: 20px;margin-left: 20px;">Membership Details</h2>

<?php if ($status) { ?>
    <dl class="dl-horizontal">
        <dt>

        <dt>Credits Pending:</dt>
        <dd><?php echo $userresult['remainingCredits'] ?></dd>
        <dt>
        <dt>
        <dt>Current Package:</dt>
        <dd><?php echo $pkdata['name'] ?></dd>
        <dt>
        <dt>
        <dt>Expiry Date:</dt>
        <dd><?php echo date('d-F-Y', $userresult['memberExpiryDate']) ?></dd>
    </dl>
<?php } else { ?>
 <dl class="dl-horizontal">
     <dd style="color:red;">
Membership Expired
</dd>
 </dl>
<?php } ?>
