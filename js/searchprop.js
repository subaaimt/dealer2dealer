var sale = {100000: '1 lac',
    500000: '5 lacs',
    1000000: '10 lacs',
    2000000: '20 lacs',
    3000000: '30 lacs',
    4000000: '40 lacs',
    5000000: '50 lacs',
    6000000: '60 lacs',
    7000000: '70 lacs',
    8000000: '80 lacs',
    9000000: '90 lacs',
    10000000: '1crore',
    12000000: '1.2 crores',
    14000000: '1.4 crores',
    16000000: '1.6 crores',
    18000000: '1.8 crores',
    20000000: '2 crores',
    2300000: '2.3 crores',
    26000000: '2.6 crores',
    30000000: '3 crores',
    35000000: '3.5 crores',
    40000000: '4 crores',
    45000000: '4.5 crores',
    50000000: '5 crores',
    50000000:'> 5 crores'};

var rent = {1000: '1,000',
    5000: '5,000',
    10000: '10,000',
    15000: '15,000',
    20000: '20,000',
    25000: '25,000',
    40000: '40,000',
    70000: '70,000',
    100000: '1 lac',
    150000: '1.5 lacs',
    200000: '2 lacs',
    400000: '4 lacs',
    700000: '7 lacs',
    1000000: '10 lacs',
    1100000: '> 10 lacs'}
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
            $('#updatearea').html(response);
        }
    });
}

$(function() {

    var flagbedroom = false;

    $(document).click(function(e) {
        //alert('ss');
        // console.log($(e.target).parents('#wrappercat').length);
        if ($(e.target).parents('#wrappercat').length === 0) {
            $('#propertycat').hide();
        } else {
            $('#propertycat').show();
        }
        if (flagbedroom === false) {
            if ($(e.target).parents('#wrapperbedroom').length === 0) {
                $('#propertybedroom').hide();
            } else {
                $('#propertybedroom').show();
            }
        }
    });

    $('.proprtycat').change(function() {
        var propetycat = [];
        var propetycatval = [];

        $('.proprtycat').each(function(key, val) {
            if ($(val).is(':checked')) {
                if (propertyFieldRelation[$(val).val()] !== undefined && flagbedroom === false) {
                    flagbedroom = true;
                } else {
                    flagbedroom = false;
                }
                propetycat.push($(val).val());
                propetycatval.push($(val).attr('data-val'));
            }
        });
        $('#propertcat').html(propetycatval.join());
        $('#proprtycatval').val(propetycat.join());

        if (flagbedroom) {
            $('#propertbedroom').css('background', '#eee').html('');
            // $("body").off("click", "#wrapperbedroom");
            $('#proprtybedroomval').val('');
            $('.proprtybedroom').each(function(key, val) {
                if ($(val).is(':checked')) {
                    $(val).attr('checked', false);

                }
            });
        } else {
            $('#propertbedroom').css('background', '#fff');
        }

    });

    $('.proprtybedroom').change(function() {
        var propetycat = [];
        var propetycatval = [];
        $('.proprtybedroom').each(function(key, val) {
            if ($(val).is(':checked')) {

                propetycat.push($(val).val());
                propetycatval.push($(val).attr('data-val'));
            }
        });
        $('#propertbedroom').html(propetycatval.join());
        $('#proprtybedroomval').val(propetycat.join());



    });



});
function changeBudget(this_) {
    $('#minbudget').html('').append($("<option />").val('').text('Min'));
    $('#maxbudget').html('').append($("<option />").val('').text('Max'));
    if ($(this_).val() == 'sale') {
        $.each(sale, function(key, value) {
            $('#minbudget').append($("<option />").val(key).text(value));
            $('#maxbudget').append($("<option />").val(key).text(value));
        });

    } else {
        $.each(rent, function(key, value) {
            $('#minbudget').append($("<option />").val(key).text(value));
            $('#maxbudget').append($("<option />").val(key).text(value));
        });

    }
}

   function validatebudget(){
       if(parseInt($('#minbudget').val())>parseInt($('#maxbudget').val())){
           alert('Minimum Budget cannot be greater than Maximum Budget');
           return false;
       }else{
           return true;
       }
   }