////////////////////////////////////////////
///	Author: Jake Chapman				 ///
///	Tabel of Contents:					 ///
///	I: Modal Functions					 ///
///	II: Form Validation					 ///
///	III: Other Functions      			 ///
///	IV: $(document).ready(function(){})  ///
///										 ///
///										 ///
///										 ///
///										 ///										 
////////////////////////////////////////////


////////////////////////////////////////////
/// I: Modal Functions					 ///
function launchModal(targetModal){
	var modal = targetModal;
	$.ajax({
	    type: "GET",
	    url: "../xml/modals.xml",
	    dataType: "xml",
	    success: function (modalXml) {
	    	var xml = modalXml;
			// XML variables
		    var $selectedModal = $(xml).find('modals '+ modal);

		    var $id = $selectedModal.find('modal-id').text();
		    var $h1 = $selectedModal.find('h1').text();
		    var $formAction = $selectedModal.find('form-action').text();
		    var $formMethod = $selectedModal.find('form-method').text();
		    var $validationFunction = $selectedModal.find('validation-function').text();
		    var $formRequirements = $selectedModal.find('form-requirements').text();
		    var $submitButtonValue = $selectedModal.find('submit-button-value').text();
		    var $linkTo = $selectedModal.find('link-to').text();
		    var $inputs = [];

		    var modalCheck = document.getElementById($id);
		    if(modalCheck !== null){
				return false;
			}

			 var $modalType = $selectedModal.attr('type');

		    if($modalType === 'delete'){
		    	var $htmlOpenDelete = '<div class="modal hide" id="'+$id+'" class="mCustomScrollbar" data-mcs-theme="minimal-dark"><div class="modal-header"><img src="img/alt-logo.png" alt="Total Gig" /><span class="modal-close">X</span></div><h1>'+$h1+'</h1>';

		    	var $htmlBodyDelete = '<a href="'+$linkTo+'" class="button delete-link" data-original-href="'+$linkTo+'">Delete</a><span class="modal-close button">Cancel</span>';

		    	var $htmlCloseDelete = '</div>';

		    	var $htmlDelete = $htmlOpenDelete + $htmlBodyDelete + $htmlCloseDelete;
		    	// Output HTML
			    $('body').append($htmlDelete);
		    }else {
			    // Populate inputs array
			    $selectedModal.find('inputs>*').each(function(){
			    	var $iconImg = $(this).find('>icon-img').text();
			    	var $iconAlt = $(this).find('icon-alt').text();
			    	var $type = $(this).find('type').text();
			    	var $name = $(this).find('name').text();
			    	var $id = $(this).find('id').text();
			    	var $placeholder = $(this).find('placeholder').text();
			    	var $required = $(this).find('required').text();
			    	var $onblur = $(this).find('onblur').text();
			    	var $fieldRequirements = $(this).find('field-requirements').text();
			    	if($fieldRequirements.length < 1){
			    		$fieldRequirements = '<br>';
			    	}

			    	if($(this).attr('type') === 'select'){
			    		$selectOpen = '<div class="form-row"><div class="form-icon"><img src="img/'+$iconImg+'.png" alt="'+$iconAlt+'" /></div><select name="'+$name+'" id="'+$id+'" onblur="'+$onblur+'" '+$required+'><optgroup>';

			    		$selectClose = '</optgroup></select></div>';

			    		$selectOptions = '';

				    	$(this).find('options>*').each(function(){
				    		var $disable = $(this).find('disable').text();
				    		var $value = $(this).find('value').text();
				    		var $text = $(this).find('text').text();

				    		var $option = '<option value="'+$value+'" '+$disable+'>'+$text+'</option>';

				    		$selectOptions += $option;
				    	});

				    	$inputs.push($selectOpen+$selectOptions+$selectClose);
				    }else if($(this).attr('type') === 'double-1'){
                        $inputs.push('<div class="form-row"><div class="form-icon"><img src="img/'+$iconImg+'.png" alt="'+$iconAlt+'" /></div><input type="'+$type+'" class="double-1" name="'+$name+'" id="'+$id+'" placeholder="'+$placeholder+'" onblur="'+$onblur+'"' +$required+' />');
                    } else if($(this).attr('type') === 'double-2'){
                        $inputs.push('<input type="'+$type+'" class="double-2" name="'+$name+'" id="'+$id+'" placeholder="'+$placeholder+'" onblur="'+$onblur+'"' +$required+' /><p class="field-requirements highlight">'+$fieldRequirements+'</p></div>');
                    }else if($type === 'textarea'){
				    	$inputs.push('<div class="form-row"><div class="form-icon"><img src="img/'+$iconImg+'.png" alt="'+$iconAlt+'" /></div><textarea name="'+$name+'" placeholder="'+$placeholder+'" onblur="'+$onblur+'" '+$required+'></textarea><p class="field-requirements highlight">'+$fieldRequirements+'</p></div>');
				 	}else if($type === 'hidden' && $name !== '_method'){
				 		$inputs.push('<input type="'+$type+'" value=" " name="'+$name+'" id="'+$id+'" '+$required+'>');
					}else if($type === 'hidden' && $name === '_method'){
						$inputs.push('<input type="'+$type+'" value="PUT" name="'+$name+'" id="'+$id+'" '+$required+'>');
					}else {
				    	$inputs.push('<div class="form-row"><div class="form-icon"><img src="img/'+$iconImg+'.png" alt="'+$iconAlt+'" /></div><input type="'+$type+'" name="'+$name+'" id="'+$id+'" placeholder="'+$placeholder+'" onblur="'+$onblur+'"' +$required+' /><p class="field-requirements highlight">'+$fieldRequirements+'</p></div>');
				    }
			    });

				if($id === 'add-package-modal' || $id === 'edit-package-modal'){
					var $packageUnique = '<div class="form-row"><h3>Services</h3></div><div class="form row form-services mCustomScrollbar" data-mcs-theme="dark-thick">';
					if($id === 'add-package-modal'){
						for(var i = 0; i < 10; i++){
							$packageUnique += '<div class="form-row"><input placeholder="Quantity" name="service-quantity'+i+'" type="number"><input placeholder="Service Name" name="service-name'+i+'" type="text"><input placeholder="Price" name="service-price'+i+'" type="number" step="0.01"></div>';
						}
					}else {
						for(var k = 0; k < 10; k++){
							$packageUnique += '<div class="form-row"><input type="hidden" name="service-id-edit'+k+'" id="service-id-edit'+k+'" value=" "><input placeholder="Quantity" name="service-quantity-edit'+k+'" type="number"><input placeholder="Service Name" name="service-name-edit'+k+'" type="text"><input placeholder="Price" name="service-price-edit'+k+'" type="number" step="0.01"></div>';
						}
					}
					$packageUnique += '</div>';
					$inputs.push($packageUnique);
				}

			    // Compile Form html
			    var $formOpen = '<form action="'+$formAction+'" data-action="'+$formAction+'" method="'+$formMethod+'" onsubmit="return '+$validationFunction+'">';

			    var	$formInputs = '<input type="hidden" class="csrf-token" name="csrf-token" value=" ">';

			    for(var j=0;j < $inputs.length; j++){
			    	$formInputs += $inputs[j]; 
			    }

			    var $formClose = '<input type="submit" value="'+$submitButtonValue+'" /></form>';

			    // Compile modal html
			    var $htmlOpen = '<div class="modal hide" id="'+$id+'" class="mCustomScrollbar" data-mcs-theme="minimal-dark"><div class="modal-header"><img src="img/alt-logo.png" alt="Total Gig" /><span class="modal-close">X</span></div><h1>'+$h1+'</h1><p class="form-requirements">'+$formRequirements+'</p>';

			    var $htmlForm = $formOpen + $formInputs + $formClose;

			    var $htmlClose = '</div>';
			    
			    var $html = $htmlOpen + $htmlForm + $htmlClose;
				
				// Output HTML
			    $('body').append($html);
			}

			$(".modal").mCustomScrollbar({scrollInertia:75});
		    $(".form-services").mCustomScrollbar({scrollInertia: 50});
		}   
	});
}

function openModal(targetModal){
	var modal = '#'+targetModal;
	var csrf = $('#csrf-token').val();

	$('.csrf-token').val(csrf);

    // Assign max-height
    var $maxHeight =  window.innerHeight;
    $(modal).css('max-height', $maxHeight);

    // Vertically center
    var $margin = 0 - ($(modal).height()+34)/2; // `modal height` + 44(vertical padding+border) /2 for half of modal height, minus 0 for negative
    $(modal).css('margin-top', $margin);

    //Display
    $(".fill-background").show(300);
    $(modal).show(100);
}

function closeModal(){
    $(".modal-close").click(function(){
		$(".modal").hide();
		$(".fill-background").hide();
	});

	$(".fill-background").click(function(){
		$(".modal").hide();
		$(".fill-background").hide();
	});
}

////////////////////////////////////////////
/// II: Form Validation					 ///
function validateSignUp(){
	var $pass1 = $('#reg-password').val();
	var $pass2 = $('#confirm-password').val();

	if ($pass1.length < 6) {
		$('#reg-password').next().text('Password must be at least 6 characters. Please try again.');
		$('#reg-password').next().addClass('error');

        return false;
	}else if($pass1 !== $pass2){
		$('#confirm-password').next().text('Passwords do not match. Please try again.');
		$('#confirm-password').next().addClass('error');

		return false;
	}
}

function validateInput(id){
	if($(id).is(":invalid")){
		$(id).prev().removeClass('valid');
		$(id).prev().addClass('invalid');
	}else {
		$(id).prev().removeClass('invalid');
		$(id).prev().addClass('valid');
	}
}

function validatePassword(){
	var $pass = $('#reg-password').val();

	if ($pass.length < 6) {
		$('#reg-password').prev().addClass('invalid');
		$('#reg-password').prev().removeClass('valid');

		$('#reg-password').next().text('Password must be at least 6 characters. Please try again.');
		$('#reg-password').next().addClass('error');
	}else {
		$('#reg-password').prev().addClass('valid');
		$('#reg-password').prev().removeClass('invalid');

		$('#reg-password').next().text('Password must be at least 6 characters.');
		$('#reg-password').next().removeClass('error');
	}
}

function matchPasswords(){
	var $pass1 = $('#reg-password').val();
	var $pass2 = $('#confirm-password').val();

	if($pass1 !== $pass2){
		$('#confirm-password').prev().addClass('invalid');
		$('#confirm-password').prev().removeClass('valid');

		$('#confirm-password').next().text('Passwords do not match. Please try again.');
		$('#confirm-password').next().addClass('error');
	}else {
		$('#confirm-password').prev().addClass('valid');
		$('#confirm-password').prev().removeClass('invalid');

		$('#confirm-password').next().text('');
		$('#confirm-password').next().removeClass('error');	
	}
}

////////////////////////////////////////////
/// III: Other Functions				 ///
function toggleSort(){
	if($('.sort').attr('data-status') === 'open'){
		$('.sort').width(160);
		$('.sort-options').toggleClass('hide');
		$('.sort').attr('data-status', 'closed');
		$('.sort .arrow-down').css({'-ms-transform': 'rotate(0deg)', '-webkit-transform': 'rotate(0deg)', 'transition': 'rotate(0deg)'});
	}else if($('.sort').attr('data-status') === 'closed'){
		$('.sort').width(760);
		$('.sort-options').toggleClass('hide');
		$('.sort').attr('data-status', 'open');
		$('.sort .arrow-down').css({'-ms-transform': 'rotate(-90deg)', '-webkit-transform': 'rotate(-90deg)', 'transition': 'rotate(-90deg)'});
	}
}




////////////////////////////////////////////
/// IV: $(document.ready(function(){})   ///
$(document).ready(function(){

	// Launch every necessary modal for the page
	$(".modal-trigger").each(function(){
		var targetModal = $(this);
		var dataModal = $(targetModal).attr('data-modal');

		launchModal(dataModal);
	});

	// Open modal on click
	$(".modal-trigger").click(function(){
		var targetModal = $(this);
		var dataModal = $(targetModal).attr('data-modal');
		var modalId = dataModal+'-modal';

		if($(this).hasClass('delete')){
            if($(this).attr('data-modal') === 'delete-gear' || $(this).attr('data-modal') === 'delete-package'){
                var itemName1 = $(this).prevUntil('.content').text();

                var fullTarget1 = '#'+modalId+' h1 .delete-value';
                $(fullTarget1).html(itemName1);
            }else if($(this).attr('data-modal') === 'delete-employee' || $(this).attr('data-modal') === 'delete-client'){
                var itemName2 = $(this).parent().parent().find('.name').text();

                var fullTarget2 = '#'+modalId+' h1 .delete-value';
                $(fullTarget2).html(itemName2);
            }
			var itemId = $(this).parents('.content').attr('data-id');

			openModal(modalId);
			closeModal();

			var linkTarget = '#'+modalId+' .delete-link';
			$(linkTarget).attr('href', $(linkTarget).attr('data-original-href') + itemId);

		}else if($(this).hasClass('edit')){
			openModal(modalId);
			closeModal();

			// Exclusives to edit-package modal
			if(dataModal === 'edit-package'){
				// Collect package data
				var packageId = $(this).parent().prev().parent().attr('data-package-id');
				var packageName = $(this).prevUntil('.content').text();
				var packageCategory = $(this).parent().prev().attr('data-category-id');
				var services = [];

				var eachTarget = '.package[data-package-id="'+packageId+'"] tr';
				$(eachTarget).each(function(){
					var service = {};
					$(this).children().each(function(){
						var key = $(this).attr('class');
						var value = $(this).text();

						service[key] = value;
					});
					services.push(service);
				});
				services.pop(); // No need for sum

				// Populate package data
				$('input[name="edit_package_id"]').val(packageId);
				$('input[name="edit_package_name"]').val(packageName);
				$('select[name="edit_gig_category"]').val(packageCategory);

				var packageFormAction = $('#edit-package-modal form').attr('data-action');
				$('#edit-package-modal form').attr('action', packageFormAction+packageId);
				for(var l = 0;l < 10;l++){
					var idTarget = 'input[name="service-id-edit'+l+'"]';
					var quantityTarget = 'input[name="service-quantity-edit'+l+'"]';
					var nameTarget = 'input[name="service-name-edit'+l+'"]';
					var priceTarget = 'input[name="service-price-edit'+l+'"]';

					$(idTarget).val('');
					$(quantityTarget).val('');
					$(nameTarget).val('');
					$(priceTarget).val('');
				}
				for(var m = 0; m < services.length; m++){
					var idTargetNew = 'input[name="service-id-edit'+m+'"]';
					var quantityTargetNew = 'input[name="service-quantity-edit'+m+'"]';
					var nameTargetNew = 'input[name="service-name-edit'+m+'"]';
					var priceTargetNew = 'input[name="service-price-edit'+m+'"]';

					var idValue = services[m]['service-id'];

					var quantityValue = parseInt(services[m]['service-quantity']);
					var nameValue = services[m]['service-name'];
					var priceValue = parseFloat(services[m]['service-price'].slice(1));
					
					$(idTargetNew).val(idValue);
					$(quantityTargetNew).val(quantityValue);
					$(nameTargetNew).val(nameValue);
					$(priceTargetNew).val(priceValue);
				}
			}else if(dataModal === 'edit-gear'){  // Exclusive to edit-gear-modal
				// Collect gear data
				var gearId = $(this).parent().prev().parent().attr('data-gear-id');
				var gearName = $(this).prevUntil('.content').text();
				var gearCategory = $(this).parent().prev().attr('data-category-id');
				var gearDescription = $(this).next().next().text();

				// Populate package data
				$('input[name="edit_gear_id"]').val(gearId);
				$('input[name="edit_gear_name"]').val(gearName);
				$('select[name="edit_gig_category"]').val(gearCategory);
				$('textarea[name="edit_gear_description"]').val(gearDescription);

				var gearFormAction = $('#edit-gear-modal form').attr('data-action');
				$('#edit-gear-modal form').attr('action', gearFormAction+gearId);
			}else if(dataModal === 'edit-employee') {  // Exclusive to edit-employee-modal
                // Collect employee data
                var employeeId = $(this).parent().parent().attr('data-id');
                var employeeTarget = 'tr[data-id=' + employeeId + ']';
                var employeeName = $(employeeTarget).find('.name').text();
                var employeeJobTitle = $(employeeTarget).find('.job-title').text();
                var employeePay = parseFloat($(employeeTarget).find('.pay').text());
                var employeePhone = $(employeeTarget).find('.phone').text();
                var employeeEmail = $(employeeTarget).find('.email').text();

                // Populate employee data
                $('input[name="edit_employee_name"]').val(employeeName);
                $('input[name="edit_employee_job_title"]').val(employeeJobTitle);
                $('input[name="edit_employee_pay"]').val(employeePay);
                $('input[name="edit_employee_phone"]').val(employeePhone);
                $('input[name="edit_employee_email"]').val(employeeEmail);

                var employeeFormAction = $('#edit-employee-modal form').attr('data-action');
                $('#edit-employee-modal form').attr('action', employeeFormAction + employeeId);
            }else if(dataModal === 'edit-client') { //Exclusive to edit-client modal
            	// Collect client data
                var clientId = $(this).parent().parent().attr('data-id');
                var clientTarget = 'tr[data-id=' + clientId + ']';
                var clientName = $(clientTarget).find('.name').text();
                var clientPhone = $(clientTarget).find('.phone').text();
                var clientLocation = $(clientTarget).find('.location').text();
                var clientEmail = $(clientTarget).find('.email').text();

                // Populate client data
                $('input[name="edit_client_name"]').val(clientName);
                $('input[name="edit_client_phone"]').val(clientPhone);
                $('input[name="edit_client_location').val(clientLocation);
                $('input[name="edit_client_email"]').val(clientEmail);

                var clientFormAction = $('#edit-client-modal form').attr('data-action');
                $('#edit-client-modal form').attr('action', clientFormAction + clientId);

                console.log(clientId);
            }
			}else {
			openModal(modalId);
			closeModal();

			// Nested in order to go directly from one modal to another
			$(".inside-modal-trigger").click(function(){
				var targetModal = $(this);
				var dataModal = $(targetModal).attr('data-modal');
				var modalId = dataModal+'-modal';

				$(".modal").hide();
				$(".fill-background").hide();

				openModal(modalId);
			});
		}
	});
});