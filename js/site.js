function validatesignup(){
    var name = $.trim($('#name').val());
    var mobileNo = $.trim($('#mobileNo').val());
    var phoneNo = $.trim($('#phoneNo').val());
    var emailid = $.trim($('#emailid').val());
    var password = $.trim($('#password').val());
    var confirmPassword = $.trim($('#confirmPassword').val()); 
    var accounttype = $.trim($('input[name="accnttype"]:checked').val());
    var companyname = $.trim($('#companyname').val());
    var address = $.trim($('#address').val());
    var city = $.trim($('#city').val());
    var area = $.trim($('#area').val()); 
    //alert(accounttype);
    var reg = /^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/;
    
    var strmsg = '';
    if(name==''){
        strmsg = strmsg + 'Please enter your  name.'+"\n";        
    }
   
    if(emailid==''){
        strmsg = strmsg + 'Please enter your email address.'+"\n";
    }
    if(reg.test(emailid) == false && emailid!=''){
        strmsg = strmsg + 'Please enter a vaild email address.'+"\n";
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
    if(password==''){
        strmsg = strmsg + 'Please enter your password.'+"\n";
    }
    if(confirmPassword==''){
        strmsg = strmsg + 'Please re-enter your password.'+"\n";
    }
    if(confirmPassword!=password && password!='' && confirmPassword!=''){
        strmsg = strmsg + 'Please enter the same password.'+"\n";
    }
    if(accounttype==''){
        strmsg = strmsg + 'Please select your account type.'+"\n";
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
        $('#registerbtn').attr('disabled', true).html('Processing..');
        $.ajax({
            url: baseurl+"site/checkmail",
            type: 'POST',
            data: {
                'email':emailid
            },
            dataType:'json',
            success: function(response){
                if(response.status==1){
                    $('#registerbtn').attr('disabled', false).html('Submit');                
                    alert('The email used already registered');
                }else{
                    $('#formregister').submit();
                }
            }
        });
        return false;
    }
    else{
        alert(strmsg);
        return false;
    }
}

function addError(object){
    $(object).parents('.control-group').addClass('error');
}

function validatelogin(){
    var emailid = $.trim($('#inputEmail').val());
    var password = $.trim($('#inputPassword').val());
    var reg = /^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/;
    var strmsg = '';
    if(emailid==''){
        strmsg = strmsg + 'Please enter your email address.'+"\n";
    }
    if(reg.test(emailid) == false && emailid!=''){
        strmsg = strmsg + 'Please enter a vaild email address.'+"\n";
    }
    if(password==''){
        strmsg = strmsg + 'Please enter your password.'+"\n";
    }
    if($.trim(strmsg)==''){
         $('#signinform').ajaxloader();
            $.ajax({
        url: baseurl+"site/login",
        type: 'POST',
        data: $('#signinform').serialize(),
        dataType:'json',
        success: function(response){
            $('#signinform').ajaxloader('hide');
            if(response.status=='0'){
                alert('Username and Password did not match');
            }else if(response.status=='1')
                location.href=baseurl+'user/myaccount';
            
            $('#area').html(response);
        }
    });
        
        return false;
    }else{
        alert(strmsg);
        return false;
    }
}

function getLocalityforRegister(this_){
    $.ajax({
        url: baseurl+"city",
        type: 'POST',
        data: {
            'cityid':$(this_).val()
        },
      
        success: function(response){
            $('#area').html(response);
        }
    });
}
