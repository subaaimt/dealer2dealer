function validatesignup() {
    var name = $.trim($('#name').val());
    var mobileNo = $.trim($('#mobileNo').val());
    var phoneNo = $.trim($('#phoneNo').val());
    var emailid = $.trim($('#emailid').val());
    var dob = $('#dd').val() + '-' + $('#mm').val() + '-' + $('#yy').val();
    var password = $.trim($('#password').val());
    var confirmPassword = $.trim($('#confirmPassword').val());
    var accounttype = $.trim($('input[name="accnttype"]:checked').val());
    var companyname = $.trim($('#companyname').val());
    var address = $.trim($('#address').val());
    var city = $.trim($('#city').val());
    var area = $.trim($('#area').val());
    var otherAreain = $.trim($('#otherAreain').val());
    var captcha = $.trim($('#captcha').val());
    //alert(accounttype);
    var reg = /^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/;

    var strmsg = '';
    if (name == '') {
        strmsg = strmsg + 'Please enter your  name.' + "\n";
    }

    if (emailid == '') {
        strmsg = strmsg + 'Please enter your email address.' + "\n";
    }
    if (!isValidDate(dob)) {
        // alert(dob);
        strmsg = strmsg + 'Please enter a valid date of birth.' + "\n";
    }
    if (reg.test(emailid) == false && emailid != '') {
        strmsg = strmsg + 'Please enter a vaild email address.' + "\n";
    }
    if (mobileNo == '') {
        strmsg = strmsg + 'Please enter the mobile number.' + "\n";
    }
    if (mobileNo != '' && isNaN(mobileNo)) {
        strmsg = strmsg + 'Please enter a numeric mobile number.' + "\n";
    }
    if (phoneNo != '' && isNaN(phoneNo)) {
        strmsg = strmsg + 'Please enter a numeric phone number.' + "\n";
    }
    if (password == '') {
        strmsg = strmsg + 'Please enter your password.' + "\n";
    }
    if (confirmPassword == '') {
        strmsg = strmsg + 'Please re-enter your password.' + "\n";
    }
    if (confirmPassword != password && password != '' && confirmPassword != '') {
        strmsg = strmsg + 'Please enter the same password.' + "\n";
    }
    if (accounttype == '') {
        strmsg = strmsg + 'Please select your account type.' + "\n";
    }
    if (companyname == '') {
        strmsg = strmsg + 'Please enter your company name.' + "\n";
    }
    if (address == '') {
        strmsg = strmsg + 'Please enter your address.' + "\n";
    }
    if (city == '') {
        strmsg = strmsg + 'Please enter your city.' + "\n";
    }
    if (area == '') {
        strmsg = strmsg + 'Please enter your area.' + "\n";
    }
    if (area == 'otherarea' && otherAreain == '') {
        strmsg = strmsg + 'Please enter the other area.' + "\n";
    }
     if (captcha == '') {
        strmsg = strmsg + 'Please enter the captcha.' + "\n";
    }
    

    if ($.trim(strmsg) == '') {
        $('#registerbtn').attr('disabled', true).html('Processing..');
        $.ajax({
            url: baseurl + "site/checkmail",
            type: 'POST',
            data: {
                'email': emailid
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 1) {
                    $('#registerbtn').attr('disabled', false).html('Submit');
                    alert('The email used already registered');
                } else {
                    $.ajax({
                        url: baseurl + "site/checkcaptcha",
                        type: 'POST',
                        data: {
                            'captcha': captcha
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 0) {
                                
                                alert('Captcha did not match');
                                refreshCaptcha();
                                // false;
                            } else {
                      $('#formregister').submit();          

                               
                            }
                        }
                    });
                    //$('#formregister').submit();
                }
            }
        });
        return false;
    }
    else {
        refreshCaptcha();
        alert(strmsg);
        return false;
    }

}

function addError(object) {
    $(object).parents('.control-group').addClass('error');
}

function validatelogin() {
    var emailid = $.trim($('#inputEmail').val());
    var password = $.trim($('#inputPassword').val());
    var reg = /^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/;
    var strmsg = '';
    if (emailid == '') {
        strmsg = strmsg + 'Please enter your email address.' + "\n";
    }
    if (reg.test(emailid) == false && emailid != '') {
        strmsg = strmsg + 'Please enter a vaild email address.' + "\n";
    }
    if (password == '') {
        strmsg = strmsg + 'Please enter your password.' + "\n";
    }
    if ($.trim(strmsg) == '') {
        //$('#signinform').ajaxloader();
        $.ajax({
            url: baseurl + "site/login",
            type: 'POST',
            data: $('#signinform').serialize(),
            dataType: 'json',
            success: function(response) {
                $('#signinform').ajaxloader('hide');
                if (response.status == '0') {
                    alert('Username and Password did not match');
                } else if (response.status == '1')
                    location.href = baseurl + 'user/dashboard';

                $('#area').html(response);
            }
        });

        return false;
    } else {
        alert(strmsg);
        return false;
    }
}

function getLocalityforRegister(this_) {
    $(this_).attr('disabled', true);
    $.ajax({
        url: baseurl + "city",
        type: 'POST',
        data: {
            'cityid': $(this_).val()
        },
        success: function(response) {
            $(this_).attr('disabled', false);
            $('#area').html(response);
        }
    });
}
function changeArea(this_) {

    if ($(this_).val() === 'otherarea') {

        $('#otherArea').show();
    } else {
        $('#otherArea').hide();
    }
}
function isValidDate(date)
{
    var matches = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/.exec(date);
    if (matches == null)
        return false;
    var d = matches[1];
    var m = matches[2] - 1;
    var y = matches[3];
    var composedDate = new Date(y, m, d);
    return composedDate.getDate() == d &&
            composedDate.getMonth() == m &&
            composedDate.getFullYear() == y;
}

function validateforget() {

    var emailid = $.trim($('#emailid').val());

    //alert(accounttype);
    var reg = /^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/;

    var strmsg = '';

    if (emailid == '') {
        strmsg = strmsg + 'Please enter your email address.' + "\n";
    }


    if ($.trim(strmsg) == '') {
        $('#registerbtn').attr('disabled', true).html('Processing..');
        $.ajax({
            url: baseurl + "site/checkmail/forget/password",
            type: 'POST',
            data: {
                'email': emailid
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 1) {
                    $('#forgetbtn').attr('disabled', false).html('Submit');
                    $('#formforget').submit();
                } else {
                    alert('Email not found in our records.');

                }
            }
        });
        return false;
    }
    else {
        alert(strmsg);
        return false;
    }
}

function validatechangepwd() {


    var password = $.trim($('#password').val());
    var confirmPassword = $.trim($('#confirmPassword').val());
    var strmsg = '';
    if (password == '') {
        strmsg = strmsg + 'Please enter your password.' + "\n";
    }
    if (confirmPassword == '') {
        strmsg = strmsg + 'Please re-enter your password.' + "\n";
    }
    if (confirmPassword != password && password != '' && confirmPassword != '') {
        strmsg = strmsg + 'Please enter the same password.' + "\n";
    }


    if ($.trim(strmsg) == '') {
        $('#changepassword').submit();
    }
    else {
        alert(strmsg);
        return false;
    }
}

function refreshCaptcha() {

    document.getElementById('captchaimg').src = baseurl + 'component/cool-php-captcha/captcha.php?' + Math.random();
    //document.getElementById('captcha').focus();
}