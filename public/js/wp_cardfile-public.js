
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

		var units =[];
        var branches =[];

        jQuery('.unit').each(function() {
        	var unit = jQuery(this).val();
			units.push(unit);
		});
        jQuery('.branch').each(function() {
            var branch = jQuery(this).val();
            branches.push(branch);
        });

		jQuery.ajax({
			type: 'POST',   // Adding Post method
			url: ajax_object.ajax_url, // Including ajax file
			data: {
				action: "cardfile_public",
				type: jQuery( 'input[name="type"]:checked' ).val(),
				first_name: jQuery("#first_name").val(),
				last_name: jQuery("#last_name").val(),
				email: jQuery("#email").val(),
				born: jQuery('#born').val(),
				phone_number: jQuery("#phone_number").val(),
				address_line_1: jQuery("#address_line_1").val(),
				address_line_2: jQuery('#address_line_2').val(),
				postal_code: jQuery('#postal_code').val(),
				city: jQuery('#city').val(),
				child_first_name: jQuery('#child_first_name').val(),
				child_last_name: jQuery('#child_last_name').val(),
                child_born: jQuery('#child_born').val(),
				child_email : jQuery("#child_email").val(),
				child_phone_number: jQuery("#child_phone_number").val(),
				unit: units,
				branch: branches
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
    jQuery('#update-parent').click( function (e) {
        e.preventDefault();
        var formData ={action: "cardfile_public",};
        var successMsg = "Ny oppføring er lagret";

        jQuery.each(jQuery(this).closest('form').serializeArray(),function(_, kv) {
            if (formData.hasOwnProperty(kv.name)) {
                formData[kv.name] = jQuery.makeArray(formData[kv.name]);
                formData[kv.name].push(kv.value);
            }
            else {
                formData[kv.name] = kv.value;
            }
        });
        submitFormData(formData, successMsg);
    });
	jQuery('.update-child').click( function (e) {
        e.preventDefault();
        var obj ={action: "cardfile_public",};
        var successMsg = "Ny oppføring er lagret";
        jQuery.each(jQuery(this).closest('form').serializeArray(),function(_, kv) {
            if (obj.hasOwnProperty(kv.name)) {
                obj[kv.name] = jQuery.makeArray(obj[kv.name]);
                obj[kv.name].push(kv.value);
            }
            else {
                obj[kv.name] = kv.value;
            }
        });
        submitFormData(obj, successMsg);
    });
    jQuery('#add-child').click( function (e) {
        e.preventDefault();
        var formData = {action: "cardfile_public",};
        var successMsg = "Ny oppføring er lagret";
        jQuery.each(jQuery(this).closest('form').serializeArray(),function(_, kv) {
            if (formData.hasOwnProperty(kv.name)) {
                formData[kv.name] = jQuery.makeArray(formData[kv.name]);
                formData[kv.name].push(kv.value);
            }
            else {
                formData[kv.name] = kv.value;
            }
        });
		submitFormData(formData, successMsg);
    });
    function submitFormData(formData, successMsg) {
        jQuery.ajax({
            type: 'POST',   // Adding Post method
            url: ajax_object.ajax_url, // Including ajax file
            data: formData, // Sending data dname to post_word_count function.
            success: function(data){ // Show returned data using the function.
                console.log(data);
                jQuery('.form-group').hide();
                jQuery('#submit').hide();
                jQuery('#cardfile').append('<div class="alert alert-success">'+ successMsg +'</div>');
            },
            error: function(errorThrown){
            	console.log(errorThrown);
                $('#info-group').addClass('has-error'); // add the error class to show red input
                $('#info-group').append('<div class="help-block">' + data.errors.info + '</div>'); // add the actual error message under our input
                //alert(errorThrown);
            }
        });
		/*
        setTimeout(function(){
            location.reload();
        }, 3000);
		*/
	}
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
function openPane(evt, panel, el) {
	// Declare all variables
	var i, tabcontent, type;
	type = document.getElementById('type').checked;

	if (type !== true && panel === 'tab4') {
		panel = (el.parentNode.id === 'tab3') ? 'tab5' : 'tab3';
	}


	// Get all elements with class="tabcontent" and hide them
	tabcontent = document.getElementsByClassName("tab-pane");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

	// Show the current tab, and add an "active" class to the button that opened the tab
	document.getElementById(panel).style.display = "block";
	evt.currentTarget.className += "active";
}
var _counter = 0;
function AddTemplate() {
    _counter++;
    var oClone = document.getElementById("template").cloneNode(true);
	console.log(oClone);
    oClone.id += (_counter + "");
	rButton = oClone.querySelector('span');
	rButton.classList.remove('hidden');
    rButton.id += (_counter + "");
    document.getElementById("placeholder").appendChild(oClone);
}
function Remove(btn) {
	btn.parentNode.remove();
}
function AddUnit() {
	console.log('add clicked');
    _counter++;
    var oClone = document.getElementById("template").cloneNode(true);
    console.log(oClone);
    oClone.id += (_counter + "");
    document.getElementById("placeholder").appendChild(oClone);
}
