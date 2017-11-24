/**
 * Created by Sugarfixx on 24/11/17.
 */

jQuery(document).ready(function(){

    jQuery("#cardfile").validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            first_name: {
                required: "Du må oppgi fornavnet ditt",
            },
            last_name: {
                required: "Du må oppgi etternavnet ditt",
            },
            email: {
                required: "Du må oppgi din e-post adresse",
                email: "Fyll inn en gyldig e-post adresse"
            },
            contact: {
                required: "Du må oppgi navn på kontaktperson"
            }
        },
        ignore: ".ignore",
        invalidHandler: function(e, validator){
            if(validator.errorList.length)
                console.log(validator.errorList);
        }
    });
    jQuery('#cardfile input').on('keyup blur', function () {
        if (jQuery('#cardfile').valid()) {
            jQuery('#submit').prop('disabled', false);
        } else {
            jQuery('#submit').prop('disabled', 'disabled');
        }
    });

    jQuery(".submit").click(function(e){
        e.preventDefault();
        jQuery.ajax({
            type: 'POST',   // Adding Post method
            url: ajax_object.ajax_url, // Including ajax file
            data: {
                action: "cardfile_public",
                type: jQuery( 'input[name="type"]:checked' ).val(),
                first_name: jQuery("#first_name").val(),
                last_name: jQuery("#last_name").val(),
                email: jQuery("#email").val(),
                phone_number: jQuery("#phone_number").val(),
                address_line_1: jQuery("#address_line_1").val(),
                address_line_2: jQuery('#address_line_2').val(),
                postal_code: jQuery('#postal_code').val(),
                city: jQuery('#city').val(),
                child_first_name: jQuery('#child_first_name').val(),
                child_last_name: jQuery('#child_last_name').val(),
                child_email : jQuery("#child_email").val(),
                child_phone_number: jQuery("#child_phone_number").val(),
                unit: jQuery('#unit').val(),
                branch: jQuery('#branch').val()
            }, // Sending data dname to post_word_count function.
            success: function(data){ // Show returned data using the function.
                console.log(data);
                jQuery('.form-group').hide();
                jQuery('#submit').hide();
                jQuery('#cardfile').append('<div class="alert alert-success">Foresprsl sent</div>');
            },
            error: function(errorThrown){
                $('#info-group').addClass('has-error'); // add the error class to show red input
                $('#info-group').append('<div class="help-block">' + data.errors.info + '</div>'); // add the actual error message under our input
                //alert(errorThrown);
            }
        });

    });
});


function initTabs() {
    var i, tabcontent;
    tabcontent = document.getElementsByClassName("tab-pane");
    for (i = 0; i < tabcontent.length; i++) {
        if (i > 0) {
            tabcontent[i].style.display = "none";
        }
    }
}
window.onload = initTabs();
function openPane(evt, panel) {
    // Declare all variables
    var i, tabcontent;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tab-pane");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(panel).style.display = "block";
    evt.currentTarget.className += "active";
}