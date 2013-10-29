function validateuserform() {

    var updatename = $.trim($('#updatename').val());
    var updatemobileNo = $.trim($('#updatemobileNo').val());
    var updatephoneNo = $.trim($('#updatephoneNo').val());
    var updateemail = $.trim($('#updateemail').val());
    var dob = $('#dd').val() + '-' + $('#mm').val() + '-' + $('#yy').val();
    var updatecompanyname = $.trim($('#updatecompanyname').val());
    var updateaddress = $.trim($('#updateaddress').val());
    var updatecity = $.trim($('#updatecity').val());
    var updatearea = $.trim($('#updatearea').val());
    var otherArea = $.trim($('#otherAreain').val());

    var reg = /^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/;

    var strmsg = '';
    if (updatename == '') {
        strmsg = strmsg + 'Please enter your  name.' + "\n";
    }

    if (updateemail == '') {
        strmsg = strmsg + 'Please enter your email address.' + "\n";
    }
    if (!isValidDate(dob)) {
        // alert(dob);
        strmsg = strmsg + 'Please enter a valid date of birth.' + "\n";
    }
    if (reg.test(updateemail) == false && updateemail != '') {
        strmsg = strmsg + 'Please enter a vaild email address.' + "\n";
    }
    if (updatemobileNo == '') {
        strmsg = strmsg + 'Please enter the mobile number.' + "\n";
    }
    if (updatemobileNo != '' && isNaN(updatemobileNo)) {
        strmsg = strmsg + 'Please enter a numeric mobile number.' + "\n";
    }
    if (updatephoneNo != '' && isNaN(updatephoneNo)) {
        strmsg = strmsg + 'Please enter a numeric phone number.' + "\n";
    }

    if (updatecompanyname == '') {
        strmsg = strmsg + 'Please enter your company name.' + "\n";
    }
    if (updateaddress == '') {
        strmsg = strmsg + 'Please enter your address.' + "\n";
    }
    if (updatecity == '') {
        strmsg = strmsg + 'Please enter your city.' + "\n";
    }
    if (updatearea == '') {
        strmsg = strmsg + 'Please enter your area.' + "\n";
    }
    if (updatearea == 'otherarea' && otherArea == '') {
        strmsg = strmsg + 'Please enter the other area.' + "\n";
    }

    if ($.trim(strmsg) == '') {
        return true;
    }
    else {
        alert(strmsg);
        return false;
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


function validateunreguserform(uid) {

    var updatename = $.trim($('#updatename').val());
    var updatemobileNo = $.trim($('#updatemobileNo').val());
    var updatephoneNo = $.trim($('#updatephoneNo').val());
    var updateemail = $.trim($('#updateemail').val());
    var dob = $('#dd').val() + '-' + $('#mm').val() + '-' + $('#yy').val();
    var updatecompanyname = $.trim($('#updatecompanyname').val());
    var updateaddress = $.trim($('#updateaddress').val());
    var updatecity = $.trim($('#updatecity').val());
    var updatearea = $.trim($('#updatearea').val());
    var otherArea = $.trim($('#otherAreainRegis').val());

    var reg = /^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/;

    var strmsg = '';
    if (updatename == '') {
        strmsg = strmsg + 'Please enter your  name.' + "\n";
    }

    if (updateemail == '') {
        strmsg = strmsg + 'Please enter your email address.' + "\n";
    }
    if (!isValidDate(dob)) {
        // alert(dob);
        strmsg = strmsg + 'Please enter a valid date of birth.' + "\n";
    }
    if (reg.test(updateemail) == false && updateemail != '') {
        strmsg = strmsg + 'Please enter a vaild email address.' + "\n";
    }
    if (updatemobileNo == '') {
        strmsg = strmsg + 'Please enter the mobile number.' + "\n";
    }
    if (updatemobileNo != '' && isNaN(updatemobileNo)) {
        strmsg = strmsg + 'Please enter a numeric mobile number.' + "\n";
    }
    if (updatephoneNo != '' && isNaN(updatephoneNo)) {
        strmsg = strmsg + 'Please enter a numeric phone number.' + "\n";
    }

    if (updatecompanyname == '') {
        strmsg = strmsg + 'Please enter your company name.' + "\n";
    }
    if (updateaddress == '') {
        strmsg = strmsg + 'Please enter your address.' + "\n";
    }
    if (updatecity == '') {
        strmsg = strmsg + 'Please enter your city.' + "\n";
    }
    if (updatearea == '') {
        strmsg = strmsg + 'Please enter your area.' + "\n";
    }
    if (updatearea == 'otherarea' && otherArea == '') {
        strmsg = strmsg + 'Please enter the other area.' + "\n";
    }

    if ($.trim(strmsg) == '') {
        
        if(uid===''){
        $('#updateregisterbtn').attr('disabled', true).html('Processing..');
        $.ajax({
            url: baseurl + "user/checkmail",
            type: 'POST',
            data: {
                'email': updateemail
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 1) {
                    $('#updateregisterbtn').attr('disabled', false).html('Submit');
                    alert('The email used already registered');
                } else {
                 
                    $('#updateformregister').submit();
             
                }
            }
        });
        return false;
        }else{
            $('#updateformregister').submit();
        }
    }
    else {
        alert(strmsg);
        return false;
    }
}

function changeArea(this_) {

    if ($(this_).val() === 'otherarea') {

        $('#otherArea').show();
    } else {
        $('#otherArea').hide();
    }
}