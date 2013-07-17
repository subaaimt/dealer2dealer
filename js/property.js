/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function getLocality(this_){
    $.ajax({
        url: baseurl+"city",
        type: 'POST',
        data: {
            'cityid':$(this_).val()
        },
      
        success: function(response){
            $('#propertyarea').html(response);
        }
    });
}


function validatepopertyform(){
    var propertyfor = $.trim($('#propertyfor').val());
    var propertytype = $.trim($('#propertytype').val());
    var propertyprice = $.trim($('#propertyprice').val());
    var propertydescription = $.trim($('#propertydescription').val());
    var propertytitle = $.trim($('#propertytitle').val()); 
    var propertycity = $.trim($('#propertycity').val());
    var propertyarea = $.trim($('#propertyarea').val());
    var propertyimage = $.trim($('#propertyimage').val());
    
    var strmsg = '';
    
    if(propertyfor==''){
        strmsg = strmsg + 'Please select the propety.'+"\n";
        
    }
    if(propertytype==''){
        strmsg = strmsg + 'Please enter propety type.'+"\n";
    }
    if(propertyprice==''){
        strmsg = strmsg + 'Please enter the property price.'+"\n";
    }
    if(propertyprice!='' && isNaN(propertyprice)){
        strmsg = strmsg + 'Please enter a vaild price.'+"\n";
    }
    if(propertydescription==''){
        strmsg = strmsg + 'Please enter the description.'+"\n";
    }
 
    if(propertytitle==''){
        strmsg = strmsg + 'Please Enter the property title.'+"\n";
    }
    if(propertycity==''){
        strmsg = strmsg + 'Please select your property city.'+"\n";
    }
    if(propertyarea==''){
        strmsg = strmsg + 'Please select property area.'+"\n";
    }
    if(propertyimage==''){
        strmsg = strmsg + 'Please select a propety image.'+"\n";
    }
    if($.trim(strmsg)!=''){
        alert(strmsg);
        return false;
    }
    else
        return true;
}

function validatepopertyupdateform(){
    var propertyfor = $.trim($('#propertyfor').val());
    var propertytype = $.trim($('#propertytype').val());
    var propertyprice = $.trim($('#propertyprice').val());
    var propertydescription = $.trim($('#propertydescription').val());
    var propertytitle = $.trim($('#propertytitle').val()); 
    var propertycity = $.trim($('#propertycity').val());
    var propertyarea = $.trim($('#propertyarea').val());
 
    
    var strmsg = '';
    
    if(propertyfor==''){
        strmsg = strmsg + 'Please select the propety.'+"\n";
        
    }
    if(propertytype==''){
        strmsg = strmsg + 'Please enter propety type.'+"\n";
    }
    if(propertyprice==''){
        strmsg = strmsg + 'Please enter the property price.'+"\n";
    }
    if(propertyprice!='' && isNaN(propertyprice)){
        strmsg = strmsg + 'Please enter a vaild price.'+"\n";
    }
    if(propertydescription==''){
        strmsg = strmsg + 'Please enter the description.'+"\n";
    }
 
    if(propertytitle==''){
        strmsg = strmsg + 'Please Enter the property title.'+"\n";
    }
    if(propertycity==''){
        strmsg = strmsg + 'Please select your property city.'+"\n";
    }
    if(propertyarea==''){
        strmsg = strmsg + 'Please select property area.'+"\n";
    }
   
    if($.trim(strmsg)!=''){
        alert(strmsg);
        return false;
    }
    else
        return true;
}
