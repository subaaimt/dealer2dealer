<?php //addJs(array('js/searchprop.js'));  ?> 
<script>
    var propertyFieldRelation = <?php echo ($propertyFieldRelation); ?>
</script>
<script src="<?php echo BASE_URL ?>js/searchprop.js">

</script>
<div><h2 style="color:#0088cc;">Search Property</h2><br /></div>
<form class="form-horizontal" method="get" id="updateformregister" action="<?php echo BASE_URL ?>property/searchresult" >
    <div class="control-group">

        <label class="control-label" for="firstname">KeyWord</label>
        <div class="controls">
            <input type="text" id="updatefirstname" name="q" placeholder="Keywords" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;" />
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="propertyfor">Property For</label>
        <div class="controls">
            <select onchange="changeBudget(this)" name="propertyfor" id="propertyfor" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                
                <option value="sale">Sale</option>
                <option value="rent">Rent</option>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="propertyfor">Property Type</label>
        <div class="controls">
            <div id="wrappercat" style="width:254px;">
                <div title="" id="propertcat" style="border:1px solid grey;min-height:35px; width:200px; color:#000066; font-size:14px; font-family:'Times New Roman', Times, serif;">  </div>

                <ul id="propertycat" style="height:150px; overflow: auto; width: 250px; border: 1px solid grey; display: none; position: absolute; background: white;">
                    <?php
                    foreach ($categories as $cat) {
                        ?> 
                        <li><span style="font-weight: bold;"><?php echo $cat['category'] ?></span>
                            <ul>
                                <?php
                                foreach ($propertytypes[$cat['id']] as $key => $value) {
                                    ?>
                                    <li  value="<?php echo $value['id'] ?>"> 
                                        <label style="font-weight: normal; margin-left:12px"> 
                                            <input class="proprtycat" type="checkbox" data-val="<?php echo $value['type'] ?>" value="<?php echo $value['id'] ?>"  />&nbsp;<?php echo $value['type'] ?></label>
                                    </li>
                                    <?php
                                }
                                ?>
                        </li></ul>
                    <?php
                }
                ?>
                </ul>
                <input name="proprtycat" id="proprtycatval" type="hidden" value="" />
            </div>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="budget">Budget</label>
        <div class="controls">
            <select id="minbudget" name="minbudget" style="height:35px; width:100px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                <option value="">Min</option>
                <option value="100000">1 lac</option>
                <option value="500000">5 lacs</option>
                <option value="1000000">10 lacs</option>
                <option value="2000000">20 lacs</option>
                <option value="3000000">30 lacs</option>
                <option value="4000000">40 lacs</option>
                <option value="5000000">50 lacs</option>
                <option value="6000000">60 lacs</option>
                <option value="7000000">70 lacs</option>
                <option value="8000000">80 lacs</option>
                <option value="9000000">90 lacs</option>
                <option value="10000000">1crore</option>
                <option value="12000000">1.2 crores</option>
                <option value="14000000">1.4 crores</option>
                <option value="16000000">1.6 crores</option>
                <option value="18000000">1.8 crores</option>
                <option value="20000000">2 crores</option>
                <option value="2300000">2.3 crores</option>
                <option value="26000000">2.6 crores</option>
                <option value="30000000">3 crores</option>
                <option value="35000000">3.5 crores</option>
                <option value="40000000">4 crores</option>
                <option value="45000000">4.5 crores</option>
                <option value="50000000">5 crores</option>
                <option value=">50000000">&gt; 5 crores</option>
            </select>

            <select id="maxbudget" name="maxbudget" style="height:35px; width:100px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                <option value="">Max</option>
                <option value="100000">1 lac</option>
                <option value="500000">5 lacs</option>
                <option value="1000000">10 lacs</option>
                <option value="2000000">20 lacs</option>
                <option value="3000000">30 lacs</option>
                <option value="4000000">40 lacs</option>
                <option value="5000000">50 lacs</option>
                <option value="6000000">60 lacs</option>
                <option value="7000000">70 lacs</option>
                <option value="8000000">80 lacs</option>
                <option value="9000000">90 lacs</option>
                <option value="10000000">1crore</option>
                <option value="12000000">1.2 crores</option>
                <option value="14000000">1.4 crores</option>
                <option value="16000000">1.6 crores</option>
                <option value="18000000">1.8 crores</option>
                <option value="20000000">2 crores</option>
                <option value="2300000">2.3 crores</option>
                <option value="26000000">2.6 crores</option>
                <option value="30000000">3 crores</option>
                <option value="35000000">3.5 crores</option>
                <option value="40000000">4 crores</option>
                <option value="45000000">4.5 crores</option>
                <option value="50000000">5 crores</option>
                <option value=">50000000">&gt; 5 crores</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="propertyfor">Bedrooms</label>
        <div class="controls">
            <div id="wrapperbedroom" style="width:254px;">
                <div title="" id="propertbedroom" style="border:1px solid grey;min-height:35px; width:200px; color:#000066; font-size:14px; font-family:'Times New Roman', Times, serif;">  </div>

                <ul id="propertybedroom" style="height:150px; overflow: auto; width: 200px; border: 1px solid grey; display: none; position: absolute; background: white;">
                    <?php
                    foreach ($rooms as $room) {
                        ?>
                        <li  > 
                            <label style="font-weight: normal; margin-left:12px"> 
                                <input class="proprtybedroom" type="checkbox" data-val="<?php echo $room ?>" value="<?php echo $room ?>"  />&nbsp;<?php echo $room ?></label>
                        </li>
                        <?php
                    }
                    ?>


                </ul>
                <input name="proprtybedroom" id="proprtybedroomval" type="hidden" value="" />
            </div>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="city">City</label>
        <div class="controls">
            <select id="updatecity" name="city" onchange="getLocalityforRegister(this)" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                <option value="">--Select--</option>
                <?php foreach ($cities as $ct) { ?>
                    <option  value="<?php echo $ct['id'] ?>"><?php echo $ct['city_name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="area">Area</label>
        <div class="controls">
            <select id="updatearea" name="area" style="height:35px; width:200px; color:#000066; font-size:16px; font-family:'Times New Roman', Times, serif;">
                <option value="">--Select--</option>


            </select>

        </div>
    </div>
    <div class="control-group">

        <div class="controls">
            <button onclick="return validatebudget();" type="submit" class="btn btn-primary" id="updateregisterbtn" >Submit</button>

        </div>
    </div>
</form>