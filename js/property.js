
var property = {};
function getLocality(this_) {
    $.ajax({
        url: baseurl + "city",
        type: 'POST',
        data: {
            'cityid': $(this_).val()
        },
        success: function(response) {
            $('#propertyarea').html(response);
        }
    });
}



function validatepopertyform() {


    var propertyfor = $.trim($('#propertyfor').val());
    var propertytype = $.trim($('#propertytype').val());
    var propertyprice = $.trim($('#propertyprice').val());
    var propertydescription = $.trim($('#propertydescription').val());
    var propertytitle = $.trim($('#propertytitle').val());
    var propertycity = $.trim($('#propertycity').val());
    var propertyarea = $.trim($('#propertyarea').val());
    var transactiontype = $.trim($('input[name="transactiontype"]:checked').val());
    var bedrooms = $.trim($('#bedrooms').val());
    var bathrooms = $.trim($('#bathrooms').val());
    var furnished = $.trim($('#furnished').val());
    var displayPriceUsers = $.trim($('input[name="displayPriceUsers"]:checked').val());
    var floors = $.trim($('#floors').val());
    var totalfloors = $.trim($('#totalfloors').val());
    var plotLandArea = $.trim($('#plotLandArea').val());
    var propertylocation = $.trim($('#propertylocation').val());
    var otherAreain = $.trim($('#otherAreain').val());

    if (propertyFieldRelation[propertytype] === undefined) {

        hidefields = new Array();
    } else {

        hidefields = array_flip(propertyFieldRelation[propertytype]);
    }

    var strmsg = '';

    if (propertyfor == '') {
        strmsg = strmsg + 'Please select the propety.' + "\n";

    }
    if (propertytype == '') {
        strmsg = strmsg + 'Please enter propety type.' + "\n";
    }
    if (transactiontype == '') {
        strmsg = strmsg + 'Please select the transaction type.' + "\n";
    }
    if (plotLandArea == '') {
        strmsg = strmsg + 'Please enter the area for Plot land area.' + "\n";
    }
    if (propertyprice == '') {
        strmsg = strmsg + 'Please enter the property price.' + "\n";
    }



    if (bedrooms == '' && hidefields['bedrooms'] == undefined) {
        strmsg = strmsg + 'Please enter the number of bedrooms.' + "\n";
    }
    if (bathrooms == '' && hidefields['bathrooms'] == undefined) {
        strmsg = strmsg + 'Please enter the number of bathrooms.' + "\n";
    }
    if (furnished == '' && hidefields['furnished'] == undefined) {
        strmsg = strmsg + 'Please select option for furnished.' + "\n";
    }
    if (floors == '' && hidefields['floors'] == undefined) {
        strmsg = strmsg + 'Please select the number of floors.' + "\n";
    }
    if (totalfloors == '' && hidefields['totalfloors'] == undefined) {
        strmsg = strmsg + 'Please select the number of total floors.' + "\n";
    }

    if (displayPriceUsers == '') {
        strmsg = strmsg + 'Please select the display user option.' + "\n";
    }

    if (propertydescription == '') {
        strmsg = strmsg + 'Please enter the description.' + "\n";
    }

    if (propertytitle == '') {
        strmsg = strmsg + 'Please Enter the property title.' + "\n";
    }
    if (propertylocation == '') {
        strmsg = strmsg + 'Please Enter the property location.' + "\n";
    }
    if (propertycity == '') {
        strmsg = strmsg + 'Please select your property city.' + "\n";
    }
    if (propertyarea == '') {
        strmsg = strmsg + 'Please select property area.' + "\n";
    }

    if (propertyarea == 'otherarea' && otherAreain == '') {
        strmsg = strmsg + 'Please enter the other area.' + "\n";
    }

    if ($.trim(strmsg) != '') {
        alert(strmsg);
        return false;
    }
    else
        return true;
}

function validatepopertyupdateform() {
    var propertyfor = $.trim($('#propertyfor').val());
    var propertytype = $.trim($('#propertytype').val());
    var transactiontype = $.trim($('input[name="transactiontype"]:checked').val());
    var bedrooms = $.trim($('#bedrooms').val());
    var bathrooms = $.trim($('#bathrooms').val());
    var furnished = $.trim($('#furnished').val());
    var plotLandArea = $.trim($('#plotLandArea').val());
    var propertyprice = $.trim($('#propertyprice').val());
    var displayPriceUsers = $.trim($('input[name="displayPriceUsers"]:checked').val());
    var floors = $.trim($('#floors').val());
    var totalfloors = $.trim($('#totalfloors').val());

    var propertydescription = $.trim($('#propertydescription').val());
    var propertytitle = $.trim($('#propertytitle').val());
    var propertycity = $.trim($('#propertycity').val());
    var propertyarea = $.trim($('#propertyarea').val());
    var propertylocation = $.trim($('#propertylocation').val());

    if (propertyFieldRelation[propertytype] === undefined) {

        hidefields = new Array();
    } else {

        hidefields = array_flip(propertyFieldRelation[propertytype]);
    }

    var strmsg = '';

//    if (propertyfor == '') {
//        strmsg = strmsg + 'Please select the propety.' + "\n";
//
//    }
//    if (propertytype == '') {
//        strmsg = strmsg + 'Please enter propety type.' + "\n";
//    }
//
//    if (transactiontype == '') {
//        strmsg = strmsg + 'Please select the transaction type.' + "\n";
//    }

//    if(plotLandArea==''){
//        strmsg = strmsg + 'Please enter the area for Plot land area.' + "\n";
//    }
    if (propertyprice == '') {
        strmsg = strmsg + 'Please enter the property price.' + "\n";
    }
    if (displayPriceUsers == '') {
        strmsg = strmsg + 'Please select the display user option.' + "\n";
    }
    if (propertydescription == '') {
        strmsg = strmsg + 'Please enter the description.' + "\n";
    }
//        
//        if (bedrooms == '' && hidefields['bedrooms']==undefined) {
//            strmsg = strmsg + 'Please enter the number of bedrooms.' + "\n";
//        }
//        if (bathrooms == '' && hidefields['bathrooms']==undefined) {
//            strmsg = strmsg + 'Please enter the number of bathrooms.' + "\n";
//        }
//        if (furnished == ''  && hidefields['furnished']==undefined) {
//            strmsg = strmsg + 'Please select option for furnished.' + "\n";
//        }
//        if (floors == ''  && hidefields['floors']==undefined) {
//            strmsg = strmsg + 'Please select the number of floors.' + "\n";
//        }
//        if (totalfloors == ''  && hidefields['totalfloors']==undefined) {
//            strmsg = strmsg + 'Please select the number of total floors.' + "\n";
//        }

    if (propertydescription == '') {
        strmsg = strmsg + 'Please enter the description.' + "\n";
    }

    if (propertytitle == '') {
        strmsg = strmsg + 'Please Enter the property title.' + "\n";
    }
    if (propertylocation == '') {
        strmsg = strmsg + 'Please Enter the property description.' + "\n";
    }


    if (propertycity == '') {
        strmsg = strmsg + 'Please select your property city.' + "\n";
    }
    if (propertyarea == '') {
        strmsg = strmsg + 'Please select property area.' + "\n";
    }

    if ($.trim(strmsg) != '') {
        alert(strmsg);
        return false;
    }
    else
        return true;
}

function changeArea(this_) {
    if ($(this_).val() === 'otherarea') {
        $('#otherArea').show();
    } else {
        $('#otherArea').hide();
    }
}

function changeAreUpdate(this_, cid) {
    if ($(this_).val() === 'otherarea') {
        if ($('#updatecity').val() == cid && $('#otherAreaRegis').length) {
            $('#otherAreaRegis').show();
            $('#otherArea').hide();
        } else {
            $('#otherAreaRegis').hide();
            $('#otherArea').show();
            $('#otherAreain').val('');
        }
    } else {
        $('#otherArea').hide();
        $('#otherAreaRegis').hide();
    }
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