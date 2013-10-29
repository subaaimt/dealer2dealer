function validateMicrositeform(mid) {
    var title = $.trim($('#title').val());
    var microsite_path = $.trim($('#microsite_path').val());

    var strmsg = '';
    if (title == '') {
        strmsg = strmsg + 'Please enter the title.' + "\n";
    }

    if (microsite_path == '' && mid==undefined) {
        strmsg = strmsg + 'Please select the template to upload.' + "\n";
    }

    if ($.trim(strmsg) == '') {
        if(mid==undefined){
        $('#updatemicrositebtn').attr('disabled', true).html('Processing..');
        $.ajax({
            url: baseurl + "microsite/checkmicrositetitle",
            type: 'POST',
            data: {
                'title': title
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 1) {
                    $('#updatemicrositebtn').attr('disabled', false).html('Submit');
                    alert('The microsite  already exists.');
                } else {
                    $('#micrositeform').submit();

                }
            }
        });

        return false;
        }
        else{
              $('#micrositeform').submit();
        }
    }
    else {
        alert(strmsg);
        return false;
    }
}