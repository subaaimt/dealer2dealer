
<?php foreach($projects as $proj){?>
<div class="pdiv1" <?php echo $proj['projectName']?> >
    <div class="pdiv1inner1">
<img src="<?php echo BASE_URL ?>media/project/<?php echo $proj['mediapath']?>" height="100" width="130"/>
    </div>
    <div class="pdiv1inner2">
        <p> <b>  <?php echo $proj['name']?></b> <br/>
            <?php echo $proj['description']?> <br/>
            <a href="#">  Read more >> </a>  </p>

    </div>
    <div class="pdiv1inner3">

        <p><b> Contact Dealer </b> <br/>
            Pankoj Chawla <br/>
            chawlastate.com  <br/>
            9865467654 <br/>
            chawlastate1@gmail.com</p>
    </div>

</div>   
<?php }?>