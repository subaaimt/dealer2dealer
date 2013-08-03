<h2 style="margin-bottom: 20px;">My Profile</h2>

<dl class="dl-horizontal profile">

    <tbody>
       <dt>
            <dt>Name</dt>
            <dd><?php echo $userresult['name']?></dd>
        <dt>
        <dt>
            <dt>Email Id</dt>
            <dd><?php echo $userresult['email']?></dd>
        <dt>
       <dt>
            <dt>Company Name</dt>
            <dd><?php echo $userresult['companyName']?></dd>
        <dt>
       <dt>
            <dt>Mobile No.</dt>
            <dd><?php echo $userresult['mobileNo']?></dd>
        <dt>
       <dt>
            <dt>Address</dt>
            <dd><?php echo $userresult['address']?></dd>
        <dt>
       <dt>
            <dt>City</dt>
            <dd><?php echo $userresult['city_name']?></dd>
        <dt>
        <dt>
            <dt>Area</dt>
            <dd><?php echo $userresult['localityName']?></dd>
        <dt>
        <dt>
            <dt>Last</dt>
            <dd><?php echo date('Y-m-d h:i:s a', $userresult['lastLogin'])?></dd>
       </dl>