

$(document).ready(function() {
    var country_id = $("#country").val();
    var state_id = $("#sel_state_id").val();

    if (country_id != '' && country_id != undefined && country_id != 0) {
        get_states(country_id, state_id);
    }
    $('#country').on('change', function() {
        var country_id = $(this).val();
        get_states(country_id);
    });
});
$(document).ready(function() {
    var state_id = $("#sel_state_id").val();
    var city_id = $("#sel_city_id").val();
    // alert("Document is ready."); 
    if (state_id != '' && state_id != undefined && state_id != 0) {
        //alert("Document is ready."); 
        get_city(state_id, city_id);
    }
    $('#state').on('change', function() {
        var state_id = $(this).val();
        get_city(state_id);
    });

})

$(document).ready(function() {
    $('#state').on('change', function() {
        var state_id = $(this).val();
        $.ajax({
            url: "<?php echo base_url('Profile_c/get_city'); ?>",
            type: "post",
            data: {
                'state_id': state_id
            },
            success: function(res) {
                $("#city").html('');
                $("#city").html(res);
            }
        });
    });
});
$(document).ready(function() {
    $("#wizard-picture").change(function() {
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function get_states(country_id, state_id = '') {
    $.ajax({
        url: "<?php echo base_url('profile_c/get_states'); ?>",
        type: "post",
        data: {
            'country_id': country_id,
            'state_id': state_id
        },
        success: function(res) {
            // alert("Response from the server: " + res);
            $("#state").html('');
            $("#state").html(res);
        }
    });
}
function get_city(state_id, city_id = '') {
    // alert("Document is ready."); 
    $.ajax({
        url: "<?php echo base_url('Profile_c/get_city'); ?>",
        type: "post",
        data: {
            'state_id': state_id,
            'city_id': city_id
        },
        success: function(res) {
            // alert("Document is ready."); 
            // alert("Response from the server: " + res);
            $("#city").html('');
            //  alert("inside get_city"); 
            $("#city").html(res);
        }
    });
}
