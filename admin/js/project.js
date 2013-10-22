function validateprojectform(action) {
    var title = $.trim($('#title').val());
    var comptitle = $.trim($('#comptitle').val());
    var type = $.trim($('#type').val());

    var bedrooms = $.trim($('#bedrooms').val());
    var bathrooms = $.trim($('#bathrooms').val());
   
    var price = $.trim($('#price').val());
    var displayPriceUsers = $('input[name="displayPriceUsers"]:radio:checked').val();

    var floors = $.trim($('#floors').val());
    var totalfloors = $.trim($('#totalfloors').val());
    var description = $.trim($('#description').val());
    var location = $.trim($('#location').val());

    var city = $.trim($('#city').val());
    var area = $.trim($('#area').val());
    var image = $.trim($('#image').val());
    var possessionstatus = $('input[name="possessionstatus"]:radio:checked').val();
    if (projectFieldRelation[type] === undefined) {

        hidefields = new Array();
    } else {

        hidefields = array_flip(projectFieldRelation[type]);
    }

    var strmsg = '';

    if (title == '') {
        strmsg = strmsg + 'Please enter the  title.' + "\n";

    }
    if (comptitle == '') {
        strmsg = strmsg + 'Please enter the  company name.' + "\n";

    }

    if (type == '') {
        strmsg = strmsg + 'Please enter propety type.' + "\n";
    }
    if (bedrooms == '' && hidefields['bedrooms'] == undefined) {
        strmsg = strmsg + 'Please enter the number of bedrooms.' + "\n";
    }
    console.log(bathrooms);
    if (bathrooms == '' && hidefields['bathrooms'] == undefined) {
        strmsg = strmsg + 'Please enter the number of bathrooms.' + "\n";
    }

    if (floors == '' && hidefields['floors'] == undefined) {
        strmsg = strmsg + 'Please select the number of floors.' + "\n";
    }
    if (totalfloors == '' && hidefields['totalfloors'] == undefined) {
        strmsg = strmsg + 'Please select the number of total floors.' + "\n";
    }
    if (price == '') {
        strmsg = strmsg + 'Please enter the  price.' + "\n";
    }

    if (displayPriceUsers == undefined) {
        strmsg = strmsg + 'Please select to show the user .' + "\n";

    }
    
    if (location == '') {
        strmsg = strmsg + 'Please enter the  location.' + "\n";
    }
    if (description == '') {
        strmsg = strmsg + 'Please enter the description.' + "\n";
    }
    if (city == '') {
        strmsg = strmsg + 'Please select your  city.' + "\n";
    }
    if (area == '') {
        strmsg = strmsg + 'Please select  area.' + "\n";
    }
    

    if (possessionstatus == undefined) {
        strmsg = strmsg + 'Please select the possession state.' + "\n";
    }
    if ($.trim(strmsg) != '') {
        alert(strmsg);
        return false;
    }
    else
        return true;
}


function getLocality(this_) {
    $.ajax({
        url: baseurl + "city",
        type: 'POST',
        data: {
            'cityid': $(this_).val()
        },
        success: function(response) {
            $('#area').html(response);
        }
    });
}
function getLocalityComp(this_) {
    $.ajax({
        url: baseurl + "city",
        type: 'POST',
        data: {
            'cityid': $(this_).val()
        },
        success: function(response) {
            $('#companyarea').html(response);
        }
    });
}
function array_flip(trans) {
    var key, tmp_ar = {};
    for (key in trans) {
        if (trans.hasOwnProperty(key)) {
            tmp_ar[trans[key]] = key;
        }
    }
    return tmp_ar;
}

function confirmation(){
    if(confirm('Are you sure you want to delete this project.')){
        return true;
    }else
        return false;
}