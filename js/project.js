function validateprojectform(action){
    var projecttitle = $.trim($('#projecttitle').val());
    var projectcomptitle = $.trim($('#projectcomptitle').val());
    var projecttype = $.trim($('#projecttype').val());
    
    var projectbedrooms = $.trim($('#projectbedrooms').val());
    var projectbathrooms = $.trim($('#projectbathrooms').val());
    var projectcoveredarea  = $.trim($('#projectcoveredarea').val());
    var projectprice = $.trim($('#projectprice').val());
    var displayPriceUsers = $('input[name="displayPriceUsers"]:radio:checked').val();
    
    var projectfloors = $.trim($('#projectfloors').val());
    var projecttotalfloors = $.trim($('#projecttotalfloors').val());
    var projectdescription = $.trim($('#projectdescription').val());
    var projectlocation = $.trim($('#projectlocation').val());  
      
    var projectcity = $.trim($('#projectcity').val());
    var projectarea = $.trim($('#projectarea').val());
    var projectimage = $.trim($('#projectimage').val());
    var possessionstatus = $('input[name="possessionstatus"]:radio:checked').val();
    
    var strmsg = '';
    
    if(projecttitle==''){
        strmsg = strmsg + 'Please enter the project title.'+"\n";
        
    }
    if(projectcomptitle==''){
        strmsg = strmsg + 'Please enter the project company name.'+"\n";
        
    }
    
    if(projecttype==''){
        strmsg = strmsg + 'Please enter propety type.'+"\n";
    }
    if(projectbedrooms==''){
        strmsg = strmsg + 'Please select number of bedroom.'+"\n";
        
    }
    if(projectbathrooms==''){
        strmsg = strmsg + 'Please select number of bathroom.'+"\n";
        
    }
    if(projectcoveredarea==''){
        strmsg = strmsg + 'Please enter the project covered area.'+"\n";
        
    }
    if(projectbedrooms==''){
        strmsg = strmsg + 'Please select number of bedroom.'+"\n";
        
    }
    if(projectbedrooms==''){
        strmsg = strmsg + 'Please select number of bedroom.'+"\n";
        
    }
    if(projectprice==''){
        strmsg = strmsg + 'Please enter the project price.'+"\n";
    }
    if(projectprice!='' && isNaN(projectprice)){
        strmsg = strmsg + 'Please enter a vaild price.'+"\n";
    }
    if(displayPriceUsers==undefined){
        strmsg = strmsg + 'Please select to show the user .'+"\n";
        
    }
    if(projectfloors==''){
        strmsg = strmsg + 'Please select the number of floors.'+"\n";
    }
    if(projecttotalfloors==''){
        strmsg = strmsg + 'Please enter the number of floors.'+"\n";
    }  
    
    if(projectlocation==''){
        strmsg = strmsg + 'Please enter the project location.'+"\n";
    } 
    if(projectdescription==''){
        strmsg = strmsg + 'Please enter the description.'+"\n";
    }
    if(projectcity==''){
        strmsg = strmsg + 'Please select your project city.'+"\n";
    }
    if(projectarea==''){
        strmsg = strmsg + 'Please select project area.'+"\n";
    }
    if(projectimage=='' && action!='update'){
        strmsg = strmsg + 'Please select a propety image.'+"\n";
    }
    
    if(possessionstatus==undefined){
        strmsg = strmsg + 'Please select the possession state.'+"\n";
    } 
    if($.trim(strmsg)!=''){
        alert(strmsg);
        return false;
    }
    else
        return true;
}


function getLocality(this_){
    $.ajax({
        url: baseurl+"city",
        type: 'POST',
        data: {
            'cityid':$(this_).val()
        },
      
        success: function(response){
            $('#projectarea').html(response);
        }
    });
}