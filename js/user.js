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
}


function validatemyaccount(){
   var name = $.trim($('#updatename').val());
    var mobileNo = $.trim($('#updatemobileNo').val());
    var phoneNo = $.trim($('#updatephoneNo').val());
    var companyname = $.trim($('#updatecompanyname').val());
    var address = $.trim($('#updateaddress').val());
    var city = $.trim($('#updatecity').val());
    var area = $.trim($('#updatearea').val()); 
    //alert(accounttype);
    
    
    var strmsg = '';
    if(name==''){
        strmsg = strmsg + 'Please enter your  name.'+"\n";        
    }
    if(mobileNo=='' && phoneNo==''){
         strmsg = strmsg + 'Please enter atleast one contact number.'+"\n";
    }
    if(mobileNo!='' && isNaN(mobileNo)){
         strmsg = strmsg + 'Please enter a numeric mobile number.'+"\n";
    }
    if(phoneNo!='' && isNaN(phoneNo)){
         strmsg = strmsg + 'Please enter a numeric phone number.'+"\n";
    }
    
    if(companyname==''){
        strmsg = strmsg + 'Please enter your company name.'+"\n";
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
