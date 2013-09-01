/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


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


function validatemyaccount(){
    
    var mobileNo = $.trim($('#updatemobileNo').val());
    var phoneNo = $.trim($('#updatephoneNo').val());
    
    var address = $.trim($('#updateaddress').val());
    var city = $.trim($('#updatecity').val());
    var area = $.trim($('#updatearea').val()); 
    //alert(accounttype);
    
    
    var strmsg = '';
   
    if(mobileNo=='' && phoneNo==''){
        strmsg = strmsg + 'Please enter atleast one contact number.'+"\n";
    }
    if(mobileNo!='' && isNaN(mobileNo)){
        strmsg = strmsg + 'Please enter a numeric mobile number.'+"\n";
    }
    if(phoneNo!='' && isNaN(phoneNo)){
        strmsg = strmsg + 'Please enter a numeric phone number.'+"\n";
    }
   
    if(address==''){
        strmsg = strmsg + 'Please enter your address.'+"\n";
    }
    if(city==''){
        strmsg = strmsg + 'Please enter your city.'+"\n";
    }
    if(area==''){
        strmsg = strmsg + 'Please enter your area.'+"\n";
    }
    
    if($.trim(strmsg)==''){

        return true;
    }
    else{
        alert(strmsg);
        return false;
    }

}

function updatepassword(){
    var currentpassword = $.trim($('#currentpassword').val());
    var newpassword = $.trim($('#newpassword').val());
    var confirmPassword = $.trim($('#confirmPassword').val());
   
    var strmsg = '';
    if(currentpassword==''){
        strmsg = strmsg + 'Please enter your  current Password.'+"\n";        
    }
   
    if(newpassword==''){
        strmsg = strmsg + 'Please enter your  new Password.'+"\n";
    }
    if(confirmPassword!=newpassword){
        strmsg = strmsg + 'Confirm Password do not match.'+"\n";
    }
    
    if($.trim(strmsg)==''){
        return true;
    }else{
        alert(strmsg);
        return false;
    }
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