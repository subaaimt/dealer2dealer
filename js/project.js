function validateprojectform(){
    var projecttitle = $.trim($('#projecttitle').val());
     var projectcomptitle = $.trim($('#projectcomptitle').val());
    var projecttype = $.trim($('#projecttype').val());
    
    var projectbedrooms = $.trim($('#projectbedrooms').val());
    var projectbathrooms = $.trim($('#projectbathrooms').val());
    var projectprice = $.trim($('#projectprice').val());
    var displayPriceUsers = $('input[name="displayPriceUsers"]').is(':checked').val();
    
    var projectfloors = $.trim($('#projectfloors').val());
    var projecttotalfloors = $.trim($('#projecttotalfloors').val());
    
    var projectlocation = $.trim($('#projectlocation').val());  
    
    var projectdescription = $.trim($('#projectdescription').val());
    
    var projectcity = $.trim($('#projectcity').val());
    var projectarea = $.trim($('#projectarea').val());
    var projectimage = $.trim($('#projectimage').val());
    var possessionstatus = $('input[name="possessionstatus"]').is(':checked').val();
    
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
    if(projectprice==''){
        strmsg = strmsg + 'Please enter the project price.'+"\n";
    }
    if(projectprice!='' && isNaN(projectprice)){
        strmsg = strmsg + 'Please enter a vaild price.'+"\n";
    }
    
       if(projectdescription==''){
        strmsg = strmsg + 'Please enter the description.'+"\n";
    }
       if(projectdescription==''){
        strmsg = strmsg + 'Please enter the description.'+"\n";
    }
       if(projectdescription==''){
        strmsg = strmsg + 'Please enter the description.'+"\n";
    }
       if(projectdescription==''){
        strmsg = strmsg + 'Please enter the description.'+"\n";
    }
    
    if(projectdescription==''){
        strmsg = strmsg + 'Please enter the description.'+"\n";
    }
 
    if(projecttitle==''){
        strmsg = strmsg + 'Please Enter the project title.'+"\n";
    }
    if(projectcity==''){
        strmsg = strmsg + 'Please select your project city.'+"\n";
    }
    if(projectarea==''){
        strmsg = strmsg + 'Please select project area.'+"\n";
    }
    if(projectimage==''){
        strmsg = strmsg + 'Please select a propety image.'+"\n";
    }
    if($.trim(strmsg)!=''){
        alert(strmsg);
        return false;
    }
    else
        return true;
}