
function getLocalityforRegister(this_){
    $.ajax({
        url: baseurl+"city",
        type: 'POST',
        data: {
            'cityid':$(this_).val()
        },
      
        success: function(response){
            $('#updatearea').html(response);
        }
    });
    
    $('#otherAreaRegis').hide();
    $('#otherArea').hide();
}

function changeArea(this_,cid){   
    if($(this_).val()==='otherarea'){
        if($('#updatecity').val()==cid && $('#otherAreaRegis').length){
            $('#otherAreaRegis').show();
            $('#otherArea').hide();
        }else{
            $('#otherAreaRegis').hide();
            $('#otherArea').show();
            $('#otherAreain').val('');
        }
    }else{
        $('#otherArea').hide();
        $('#otherAreaRegis').hide();
    }
}

function confirmation(){
    if(confirm('Are you sure you want to delete this user.')){
        return true;
    }else
        return false;
}

function validateadddays(){
    var days = $.trim($('#adddays').val());
   
    if(days=='' || isNaN(days)){
        alert('Please enter a valid numeric value');
        return false;
    }
    if(confirm('Are you sure you want to add days.')){
        return true;
    }else
        return false;
}

function validateaddpackage(){
    var package2 = $.trim($('#package').val());
   
    if(package2==''){
        alert('Please select a package');
        return false;
    }
    if(confirm('Are you sure you want to add this package.')){
        return true;
    }else
        return false;
}
function validateremovepackage(){
   
    if(confirm('Are you sure you want to remove this package.')){
        return true;
    }else
        return false;
}
function confirmationbanner(){
    if(confirm('Are you sure you want to delete this banner.')){
        return true;
    }else
        return false;
}
function validateBannerform(){
    var title = $.trim($('#title').val());
    var banner_path = $.trim($('#banner_path').val());
    var bannerposition = $.trim($('#bannerposition').val());
    
    var strmsg = '';
    
    if(title==''){
        strmsg = strmsg + 'Please enter the banner title.'+"\n";
        
    }
    if(banner_path==''){
        strmsg = strmsg + 'Please choose a file.'+"\n";
        
    }
    
    if(bannerposition==''){
        strmsg = strmsg + 'Please select the banner position.'+"\n";
    }
    
    if($.trim(strmsg)!=''){
        alert(strmsg);
        return false;
    }
    else
        return true;
    
}

function validateUpdateBannerform(){
    var title = $.trim($('#title').val());
    
    var bannerposition = $.trim($('#bannerposition').val());
    
    var strmsg = '';
    
    if(title==''){
        strmsg = strmsg + 'Please enter the banner title.'+"\n";
        
    }
   
    
    if(bannerposition==''){
        strmsg = strmsg + 'Please select the banner position.'+"\n";
    }
    
    if($.trim(strmsg)!=''){
        alert(strmsg);
        return false;
    }
    else
        return true;
    
}

function validatePackageform1(){
    var title = $.trim($('#title').val());
    var package_days = $.trim($('#package_days').val());
    var package_credits = $.trim($('#package_credits').val());
    var package_descriptions = $.trim($('#package_descriptions').val());
    var strmsg = '';
    
    if(title==''){
        strmsg = strmsg + 'Please enter the package title.'+"\n";
        
    }
    if(package_days=='' || isNaN(package_days)){
        strmsg = strmsg + 'Please enter a valid numeric  package days.'+"\n";
        
    }
    
    if(package_credits=='' || isNaN(package_days)){
        strmsg = strmsg + 'Please enter a valid numeric  package credits.'+"\n";
    }
    if(package_descriptions==''){
        strmsg = strmsg + 'Please select the package description.'+"\n";
    }
    if($.trim(strmsg)!=''){
        alert(strmsg);
        return false;
    }
    else
        return true;
    
}