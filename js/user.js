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
    var firstname = $.trim($('#updatefirstname').val());
    var lastname = $.trim($('#updatelastname').val());

    var companyname = $.trim($('#updatecompanyname').val());
    var address = $.trim($('#updateaddress').val());
    var city = $.trim($('#updatecity').val());
    var area = $.trim($('#updatearea').val()); 
    //alert(accounttype);
    
    
    var strmsg = '';
    if(firstname==''){
        strmsg = strmsg + 'Please enter your first name.'+"\n";
        
    }
    if(lastname==''){
        strmsg = strmsg + 'Please enter your last name.'+"\n";
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
