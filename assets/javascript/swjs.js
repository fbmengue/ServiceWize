


$(function() {
    $('#inputServicePrice').maskMoney({thousands:',', decimal:'.'});
  })
  
  $(function() {
    $('#inputServiceDuration').mask('00:00',{reverse: true,placeholder: "00:00"});
  })
  
  //Enable Client Name search and Creation
  $(function() {
    $('#selectClientName').selectize({
      create: true,
      sortField: 'text',
    });
    $("#selectClientName").change(function() {
      var d = new Date();
      var now = d.getTime();
      var upd = localStorage.getItem('updating_date');
      if(!upd) {
        localStorage.setItem('updating_date', now);
      } 

      // Only trigger the change if we're on the initial call - one millisecond later we won't be, preventing the loop
      if(localStorage.getItem('updating_date') == d.getTime()) {
        $('#selectClientEmail').data('selectize').setValue($(this).val());
        $("#selectClientBirthDate").data('selectize').setValue($(this).val());
        $("#selectClientMobile").data('selectize').setValue($(this).val());
      }
      setTimeout(function() {
        localStorage.removeItem('updating_date');
      }, 1);
    });
  })
  
  //Enable Client Email creation
  $(function() {
    $('#selectClientEmail').selectize({
      create: true,
      sortField: 'text',
    });
    $("#selectClientEmail").change(function() {
      var d = new Date();
      var now = d.getTime();
      var upd = localStorage.getItem('updating_date');
      if(!upd) {
        localStorage.setItem('updating_date', now);
      } 

      // Only trigger the change if we're on the initial call - one millisecond later we won't be, preventing the loop
      if(localStorage.getItem('updating_date') == d.getTime()) {
        $('#selectClientName').data('selectize').setValue($(this).val());
        $("#selectClientBirthDate").data('selectize').setValue($(this).val());
        $("#selectClientMobile").data('selectize').setValue($(this).val());
      }
      setTimeout(function() {
        localStorage.removeItem('updating_date');
      }, 1);


    });
  
  })
   //Enable Client Birth Date creation
   $(function() {
    $('#selectClientBirthDate').selectize({
      create: true,
      
    });
  })
   //Enable Client Mobile creation
   $(function() {
    $('#selectClientMobile').selectize({
      create: true,
      sortField: 'text',
    });
    $("#selectClientMobile").change(function() {
      var d = new Date();
      var now = d.getTime();
      var upd = localStorage.getItem('updating_date');
      if(!upd) {
        localStorage.setItem('updating_date', now);
      } 

      // Only trigger the change if we're on the initial call - one millisecond later we won't be, preventing the loop
      if(localStorage.getItem('updating_date') == d.getTime()) {
        $('#selectClientName').data('selectize').setValue($(this).val());
        $("#selectClientBirthDate").data('selectize').setValue($(this).val());
        $("#selectClientEmail").data('selectize').setValue($(this).val());
      }
      setTimeout(function() {
        localStorage.removeItem('updating_date');
      }, 1);


    });
  })

  //Enable Client Name Search on Professioanl Appointment Edit
 
function selectizeClientAppointmentEdit() {
  
  
  $(function() {
    $('#selectClientNameEdit').selectize({
      sortField: 'text',
    });
    $("#selectClientNameEdit").change(function() {
      var d = new Date();
      var now = d.getTime();
      var upd = localStorage.getItem('updating_date');
      if(!upd) {
        localStorage.setItem('updating_date', now);
      } 

      // Only trigger the change if we're on the initial call - one millisecond later we won't be, preventing the loop
      if(localStorage.getItem('updating_date') == d.getTime()) {
        $('#selectClientEmailEdit').data('selectize').setValue($(this).val());
        $("#selectClientBirthDateEdit").data('selectize').setValue($(this).val());
        $("#selectClientMobileEdit").data('selectize').setValue($(this).val());
      }
      setTimeout(function() {
        localStorage.removeItem('updating_date');
      }, 1);
    });
  })


  //Enable Client Email Search on Professioanl Appointment Edit
  $(function() {
    $('#selectClientEmailEdit').selectize({
      sortField: 'text',
    });
    $("#selectClientEmailEdit").change(function() {
      var d = new Date();
      var now = d.getTime();
      var upd = localStorage.getItem('updating_date');
      if(!upd) {
        localStorage.setItem('updating_date', now);
      } 

      // Only trigger the change if we're on the initial call - one millisecond later we won't be, preventing the loop
      if(localStorage.getItem('updating_date') == d.getTime()) {
        $('#selectClientNameEdit').data('selectize').setValue($(this).val());
        $("#selectClientBirthDateEdit").data('selectize').setValue($(this).val());
        $("#selectClientMobileEdit").data('selectize').setValue($(this).val());
      }
      setTimeout(function() {
        localStorage.removeItem('updating_date');
      }, 1);
    });
  })
   //Enable Client Birth Date creation
   $(function() {
    $('#selectClientBirthDateEdit').selectize({
      
      
    });
  })

 //Enable Client Mobile Search on Professioanl Appointment Edit
  $(function() {
    $('#selectClientMobileEdit').selectize({
      sortField: 'text',
    });
    $("#selectClientMobileEdit").change(function() {
      var d = new Date();
      var now = d.getTime();
      var upd = localStorage.getItem('updating_date');
      if(!upd) {
        localStorage.setItem('updating_date', now);
      } 

      // Only trigger the change if we're on the initial call - one millisecond later we won't be, preventing the loop
      if(localStorage.getItem('updating_date') == d.getTime()) {
        $('#selectClientNameEdit').data('selectize').setValue($(this).val());
        $("#selectClientBirthDateEdit").data('selectize').setValue($(this).val());
        $("#selectClientEmailEdit").data('selectize').setValue($(this).val());
      }
      setTimeout(function() {
        localStorage.removeItem('updating_date');
      }, 1);


    });
  })
}

 












  //Enable Service search
  $(function() {
    $('#selectServiceName').selectize({
      sortField: 'text',
    });
  })

//Function that auto select service, duration and price for ADD
$(function() {
  $("[id^=addSelectServiceName]").change(function() {
    $("[id^=addSelectServiceDuration]").val($(this).val());
    $("[id^=addSelectServicePrice]").val($(this).val());
  });
})

  //Function that auto select service duration and price for Edit
  $(function() {
    $("[id^=selectServiceName]").change(function() {
      $("[id^=selectServiceDuration]").val($(this).val());
      $("[id^=selectServicePrice]").val($(this).val());
      $("#inputAppointmentDateProfessionalAdd").val('');
      $("#inputAppointmentTimeProfessionalAdd").empty();
    });
  })


  //Enable Professional search for Appointment
  $(function() {
      $('#selectProfessionalName').selectize({
        sortField: 'text',
      });
    })

  //Enable Professional search for Service
  $(function() {
    $('#inputServiceProfessional').selectize({
      sortField: 'text',
    });
  })
//Enable User Email search for Professional ADD
  $(function() {
    $('#inputProfessionalEmail').selectize({
      sortField: 'text',
    });
  })

  
//Enable Professional search for Client Appointment EDIT 
$(function() {
  $('.professional-client-edit').selectize({
    sortField: 'text',
  });
})

// $(function() {
//   $("#addSelectProfessionalForClient").change(function() {
//     $("[id^=addSelectServiceName]").val("");
//     $("[id^=addSelectServiceDuration]").val("");
//     $("[id^=addSelectServicePrice]").val("");
//   });
// })

$(function() {
  $(".professional-client-edit").change(function() {
    $("[id^=selectServiceName]").val("");
    $("[id^=selectServiceDuration]").val("");
    $("[id^=selectServicePrice]").val("");
  });
})

$(function() {
  $( "button" ).click(function() {
    // var appointmentID = event.target.id;
    // var arrayID = appointmentID.split('-',3);
    
    $( ".offcanvas-backdrop" ).click(function() {
      //$("#offcanvas-body-"+arrayID[2]).load(location.href+" #offcanvas-body-"+arrayID[2]+">*","");
      // $("[id^=selectProfessionalForClient]").val("");
      // console.log($("[id^=selectProfessionalForClient]").val(""));
      //$("#selectProfessionalForClient25")[0].reset();
      //location.reload(true);
      form_element = document.getElementsByTagName('form');
      for(var count = 0; count < form_element.length; count++)
	    {
		    form_element[count].reset();
        
	    }
      $('form').find('.selectized').each(function(index, element) {
         element.selectize && element.selectize.clear() 
        });
        $('form').find('.invalid_field').each(function(index, element) {
          element.innerHTML= ""; 
         });
         $('form').find('.invalid-form-data').each(function(index, element) {
          element.classList.remove('invalid-form-data'); 
         });
         $('.offcanvas-body').find('span').each(function(index, element) {
          element.innerHTML = "";
          
         });
         
        
         

       

  
      $("#form-edit-appointment").html("");
    });  
  });  
})

$(function() {
  $( ".btn-close" ).click(function() {
    form_element = document.getElementsByTagName('form');
      for(var count = 0; count < form_element.length; count++)
	    {
		    form_element[count].reset();
	    }
      $('form').find('.selectized').each(function(index, element) {
        element.selectize && element.selectize.clear() 
       })
       $('form').find('.invalid_field').each(function(index, element) {
        element.innerHTML= ""; 
       })
       $('form').find('.invalid-form-data').each(function(index, element) {
        element.classList.remove('invalid-form-data'); 
       })
      $("#form-edit-appointment").html("");
  });  
})




 $( document ).ready(function() {
    $("#addSelectProfessionalForClient").change(function() {
      var professionalID = this.value;
      const elements1 = document.querySelectorAll('[data-add]');

      
      for (const item of elements1) {
        if (item.dataset.add == professionalID) {
          item.classList.remove("hide");
        }else{
          item.classList.add("hide");
        }
      }
    
    });

    $("[id^=selectProfessionalForClient]").change(function() {
      var professionalID = this.value;
      const elements1 = document.querySelectorAll('[data-edit]');

      
      for (const item of elements1) {
        if (item.dataset.edit == professionalID) {
          item.classList.remove("hide");
        }else{
          item.classList.add("hide");
        }
      }
    
    });
});




function showServiceDurationPrice(){
  debugger;
  var serviceValue = document.getElementById('selectServiceNameForClientAdd').value;
  document.getElementById('selectServiceDurationForClientAdd').value = serviceValue;
  document.getElementById('selectServicePriceForClientAdd').value = serviceValue;

  document.getElementById('inputAppointmentDate').value = "";
  $('#inputAppointmentTime').empty();
  
}
function showServiceDurationPriceEdit(){
  var serviceValue = document.getElementById('selectServiceNameForClientEdit').value;
  document.getElementById('selectServiceDurationForClientEdit').value = serviceValue;
  document.getElementById('selectServicePriceForClientEdit').value = serviceValue;

  $('#inputAppointmentTimeEdit').empty();
  document.getElementById('inputAppointmentDateEdit').value = "";

  
}

function showServiceDurationPriceEditForProfessional(){
  var serviceValue = document.getElementById('selectServiceNameForProfessionalEdit').value;
  document.getElementById('selectServiceDurationForProfessionalEdit').value = serviceValue;
  document.getElementById('selectServicePriceForProfessionalEdit').value = serviceValue;

  $('#inputAppointmentTimeEdit').empty();
  document.getElementById('inputAppointmentDateEdit').value = "";

  
}





// ########################## CLIENT FUNCTIONS #################################################################
// ########################## CLIENT FUNCTIONS #################################################################
// ########################## CLIENT FUNCTIONS #################################################################
function showServicesAvailableForClient()
{
	var form_element = document.getElementsByClassName('form_data');

	var form_data = new FormData();

	for(var count = 0; count < form_element.length; count++)
	{
		form_data.append(form_element[count].name, form_element[count].value);
	}

	//document.getElementById('submit').disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/service/serviceListForClient.inc.php');

	ajax_request.send(form_data);
  

	ajax_request.onreadystatechange = function()
	{
    
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			//document.getElementById('submit').disabled = false;

      
			//var response = JSON.parse(ajax_request.responseText);

				//document.getElementById('form-add-appointment').reset();
        //document.getElementById('addSelectProfessionalForClient').reset();
        
        
				document.getElementById('divInputAppointmentService').innerHTML = ajax_request.responseText;

        document.getElementById('inputAppointmentDate').value = "";
        $('#inputAppointmentTime').empty();

				// setTimeout(function(){

				// 	document.getElementById('message').innerHTML = '';

				// }, 5000);

				//document.getElementById('name_error').innerHTML = '';

				// document.getElementById('email_error').innerHTML = '';

				// document.getElementById('website_error').innerHTML = '';
				// document.getElementById('comment_error').innerHTML = '';
				// document.getElementById('gender_error').innerHTML = '';
			
		

			
		}
	}
}

function showServicesAvailableEditForClient()
{
	var form_element = document.getElementsByClassName('form_data_edit');

	var form_data = new FormData();

	for(var count = 0; count < form_element.length; count++)
	{
		form_data.append(form_element[count].name, form_element[count].value);
	}

	//document.getElementById('submit').disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/service/serviceListForClientEdit.inc.php');

	ajax_request.send(form_data);
  

	ajax_request.onreadystatechange = function()
	{
    
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			//document.getElementById('submit').disabled = false;

      
			//var response = JSON.parse(ajax_request.responseText);

				//document.getElementById('form-add-appointment').reset();
        //document.getElementById('addSelectProfessionalForClient').reset();
        
        
				document.getElementById('divInputAppointmentServiceEdit').innerHTML = ajax_request.responseText;
        document.getElementById('inputAppointmentDateEdit').value = "";
        $('#inputAppointmentTimeEdit').empty();
        
        
				// setTimeout(function(){

				// 	document.getElementById('message').innerHTML = '';

				// }, 5000);

				//document.getElementById('name_error').innerHTML = '';

				// document.getElementById('email_error').innerHTML = '';

				// document.getElementById('website_error').innerHTML = '';
				// document.getElementById('comment_error').innerHTML = '';
				// document.getElementById('gender_error').innerHTML = '';
			
		

			
		}
	}
}

/**
 * Method for Display Hours available on appointment add for Client user
 * @returns success or error msg
 */
function showHoursAvailableForClient()
{
	var form_element = document.getElementsByClassName('form_data');

	var form_data = new FormData();

	for(var count = 0; count < form_element.length; count++)
	{
		form_data.append(form_element[count].name, form_element[count].value);
	}

	//document.getElementById('submit').disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/client/appointmentTimeSelect.inc.php');

	ajax_request.send(form_data);
  

	ajax_request.onreadystatechange = function()
	{
    
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			//document.getElementById('submit').disabled = false;

      
			//var response = JSON.parse(ajax_request.responseText);

				//document.getElementById('form-add-appointment').reset();
        //document.getElementById('addSelectProfessionalForClient').reset();
        
        
				document.getElementById('divInputAppointmentTime').innerHTML = ajax_request.responseText;
			
		}
	}
}
/**
 * Method for Display Hours available on appointment edit for Client user
 * @returns success or error msg
 */
function showHoursAvailableEditForClient()
{
	var form_element = document.getElementsByClassName('form_data_edit');

	var form_data = new FormData();

	for(var count = 0; count < form_element.length; count++)
	{
		form_data.append(form_element[count].name, form_element[count].value);
	}

	//document.getElementById('submit').disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/client/appointmentTimeSelectEdit.inc.php');

	ajax_request.send(form_data);
  

	ajax_request.onreadystatechange = function()
	{
    
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			//document.getElementById('submit').disabled = false;

      
			//var response = JSON.parse(ajax_request.responseText);

				//document.getElementById('form-add-appointment').reset();
        //document.getElementById('addSelectProfessionalForClient').reset();
        
        
				document.getElementById('divInputAppointmentTimeEdit').innerHTML = ajax_request.responseText;
			
		}
	}
}
/**
 * Method for save Appointment data for Client user
 * @returns success or error msg
 */
function saveAppointmentForClient()
{
	var form_element = document.getElementsByClassName('form_data');

	var form_data = new FormData();

	for(var count = 0; count < form_element.length; count++)
	{
		form_data.append(form_element[count].name, form_element[count].value);
	}

	document.getElementById('appointmentButtonForClientAdd').disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/client/appointment.inc.php');

	ajax_request.send(form_data);
  

	ajax_request.onreadystatechange = function()
	{
    
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			document.getElementById('appointmentButtonForClientAdd').disabled = false;

      
			//var response = JSON.parse(ajax_request.responseText);

				document.getElementById('form-add-appointment').reset();
        $('#inputAppointmentTime').empty();
        //document.getElementById('addSelectProfessionalForClient').reset();
        
        
				document.getElementById('message').innerHTML = ajax_request.responseText;

				setTimeout(function(){

					document.getElementById('message').innerHTML = '';
          

				}, 5000);

        $("#clientContent").load(location.href+" #clientContent>*","");

        
			
		}
	}
}
/**
 * Method for Display Appointment edit form for Client user
 * @returns success or error msg
 */
function loadAppointmentEditForClient(objButton)
{
  //debugger;
  buttonID = objButton.id;
  
  appointmentID = buttonID.split('-');
  console.log(appointmentID[2]);
  appointmentDate = appointmentID[3]+"-"+appointmentID[4]+"-"+appointmentID[5]
  console.log(appointmentDate);
	//var form_element = document.getElementById('form_data_cancel_'+appointmentID[1]);
	var form_data = new FormData();

	
	form_data.append('appointmentID', appointmentID[2]);
  form_data.append('appointmentDate', appointmentDate);

	 objButton.disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/appointment/clientAppointmentListData.inc.php');

	ajax_request.send(form_data);
  

	ajax_request.onreadystatechange = function()
	{
    
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			objButton.disabled = false;

      
			//var response = JSON.parse(ajax_request.responseText);

				//document.getElementById('form-add-appointment').reset();
        //document.getElementById('addSelectProfessionalForClient').reset();
        
        
				document.getElementById('form-edit-appointment').innerHTML = ajax_request.responseText;

				// setTimeout(function(){

				// 	document.getElementById('messageCancel').innerHTML = '';
          

				// }, 4000);

        //$("#clientContent").load(location.href+" #clientContent>*","");

        
			
		}
    
	}
}

/**
 * Method for Display Appointment cancelation form for Client user
 * @returns success or error msg
 */
function loadAppointmentCancelForClient(objButton){
  buttonID = objButton.id;
  
  appointmentID = buttonID.split('-');
  document.getElementById("form-cancel-appointment").innerHTML+='<input type="number" id="appointmentCancelNumber" value="'+appointmentID[2]+'"  hidden>';
}


/**
 * Method for Cancel Appointment for Client user
 * @returns success or error msg
 */
function cancelAppointmentForClient(objButton)
{
  appointmentID =  document.getElementById("appointmentCancelNumber").value;
  
	//var form_element = document.getElementById('form_data_cancel_'+appointmentID[1]);
	var form_data = new FormData();

	
	form_data.append('appointmentID', appointmentID);

	 objButton.disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/appointment/appointmentCancelForClient.inc.php');

	ajax_request.send(form_data);
  

	ajax_request.onreadystatechange = function()
	{
    
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			objButton.disabled = false;

      
			//var response = JSON.parse(ajax_request.responseText);

				//document.getElementById('form-add-appointment').reset();
        //document.getElementById('addSelectProfessionalForClient').reset();
        
        
				document.getElementById('messageCancel').innerHTML = ajax_request.responseText;

				setTimeout(function(){

					document.getElementById('messageCancel').innerHTML = '';
          

				}, 4000);

        $("#clientContent").load(location.href+" #clientContent>*","");

        
			
		}
	}
}


// ########################## USERS FUNCTIONS #################################################################
// ########################## USERS FUNCTIONS #################################################################
// ########################## USERS FUNCTIONS #################################################################

/**
 * Method for Update profile to all type of users
 * @returns success or error msg
 */
function updateUseProfile()
{
	var form_element = document.getElementsByClassName('form_data_profile');

	var form_data = new FormData();

	for(var count = 0; count < form_element.length; count++)
	{
		form_data.append(form_element[count].name, form_element[count].value);
	}

	document.getElementById('edit-my-profile').disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/user/userProfileEdit.inc.php');

	ajax_request.send(form_data);
  

	ajax_request.onreadystatechange = function()
	{
    
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			document.getElementById('edit-my-profile').disabled = false;

      
			//var response = JSON.parse(ajax_request.responseText);

				//document.getElementById('form-add-appointment').reset();
        //document.getElementById('addSelectProfessionalForClient').reset();
        
        
				document.getElementById('messageAccount').innerHTML = ajax_request.responseText;

				setTimeout(function(){

					document.getElementById('messageAccount').innerHTML = '';
          

				}, 3000);

        $("#accountContent").load(location.href+" #accountContent>*","");

        
			
		}
	}
}







// ########################## PROFESSIONAL FUNCTIONS #################################################################
// ########################## PROFESSIONAL FUNCTIONS #################################################################
// ########################## PROFESSIONAL FUNCTIONS #################################################################

/**
 * Method for Display hour available base on date and service duration for professional user
 * @returns success or error msg
 */
function showHoursAvailableForProfessional()
{
  var appointmentDate = document.getElementById('inputAppointmentDateProfessionalAdd').value;

  if(isFutureDateConsulta(appointmentDate)){
    var appointmentService = document.getElementById('selectServiceName').value;
    
    if(!(appointmentService == "")){
      document.getElementById('messageProfessionalAppAdd').innerHTML = "";
      var appointmentDate = document.getElementById('inputAppointmentDateProfessionalAdd').value;
      var appointmentService = document.getElementById('selectServiceName').value;

      var form_data = new FormData();

      
      form_data.append('appointmentDate', appointmentDate);
      form_data.append('appointmentService', appointmentService);
      

      //document.getElementById('submit').disabled = true;

      var ajax_request = new XMLHttpRequest();

      ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/professional/appointmentTimeSelect.inc.php');

      ajax_request.send(form_data);
      

      ajax_request.onreadystatechange = function()
      {
        
        if(ajax_request.readyState == 4 && ajax_request.status == 200)
        {
          //document.getElementById('submit').disabled = false;

          
          //var response = JSON.parse(ajax_request.responseText);

            //document.getElementById('form-add-appointment').reset();
            //document.getElementById('addSelectProfessionalForClient').reset();
            
            
            document.getElementById('divInputAppointmentTimeProfessional').innerHTML = ajax_request.responseText;
        }
      }
    }else{
      document.getElementById('messageProfessionalAppAdd').innerHTML = '<div class="alert alert-danger">Choose a Service</div>';
      $('#inputAppointmentTimeProfessionalAdd').empty();
    }
  }else{
    document.getElementById('messageProfessionalAppAdd').innerHTML = '<div class="alert alert-danger">Date Must be future</div>';
    $('#inputAppointmentTimeProfessionalAdd').empty();
  }
}

/**
 * Method for Display hour available base on date and service duration for professional user edit appointment
 * @returns success or error msg
 */
 function showHoursAvailableEditForProfessional()
 {
   var appointmentDate = document.getElementById('inputAppointmentDateEdit').value;
 
   if(isFutureDateConsulta(appointmentDate)){
     var appointmentService = document.getElementById('selectServiceNameForProfessionalEdit').value;
     
     if(!(appointmentService == "")){
       document.getElementById('messageProfessionalAppEdit').innerHTML = "";
       var appointmentDate = document.getElementById('inputAppointmentDateEdit').value;
       var appointmentService = document.getElementById('selectServiceNameForProfessionalEdit').value;
 
       var form_data = new FormData();
 
       
       form_data.append('appointmentDate', appointmentDate);
       form_data.append('appointmentService', appointmentService);
       
 
       //document.getElementById('submit').disabled = true;
 
       var ajax_request = new XMLHttpRequest();
 
       ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/professional/appointmentTimeSelectEdit.inc.php');
 
       ajax_request.send(form_data);
       
 
       ajax_request.onreadystatechange = function()
       {
         
         if(ajax_request.readyState == 4 && ajax_request.status == 200)
         {
           //document.getElementById('submit').disabled = false;
 
           
           //var response = JSON.parse(ajax_request.responseText);
 
             //document.getElementById('form-add-appointment').reset();
             //document.getElementById('addSelectProfessionalForClient').reset();
             
             
             document.getElementById('divInputAppointmentTimeProfessionalEdit').innerHTML = ajax_request.responseText;
         }
       }
     }else{
       document.getElementById('messageProfessionalAppEdit').innerHTML = '<div class="alert alert-danger">Choose a Service</div>';
       $('#inputAppointmentTimeEdit').empty();
     }
   }else{
     document.getElementById('messageProfessionalAppEdit').innerHTML = '<div class="alert alert-danger">Date Must be future</div>';
     $('#inputAppointmentTimeEdit').empty();
   }
 }


/**
 * Method for save Appointment data for professional user
 * @returns success or error msg
 */
function saveAppointmentForProfessional()
{
	var form_element = document.getElementById('form-add-appointment').getElementsByClassName('form_data_professional');

	var form_data = new FormData();

	for(var count = 0; count < form_element.length; count++)
	{
    if(form_element[count].value == ""){
      document.getElementById('messageProfessionalAppAdd').innerHTML = '<div class="alert alert-danger">Complete All Fields</div>';
      return false; 
    }else{
      form_data.append(form_element[count].name, form_element[count].value);
    }
  }

	document.getElementById('appointmentButtonForProfessionalAdd').disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/appointment/clientAndAppointmentForProf.inc.php');

	ajax_request.send(form_data);
  

	ajax_request.onreadystatechange = function()
	{
    
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			document.getElementById('appointmentButtonForProfessionalAdd').disabled = false;

      
			//var response = JSON.parse(ajax_request.responseText);

      $('form').find('.selectized').each(function(index, element) {
        element.selectize && element.selectize.clear() 
       })
        
        
        
				document.getElementById('messageProfessionalAppAdd').innerHTML = ajax_request.responseText;

				setTimeout(function(){

					document.getElementById('messageProfessionalAppAdd').innerHTML = '';
          

				}, 5000);

        $("#professionalContents").load(location.href+" #professionalContents>*","");
        $("#professionalCalendarHome").load(location.href+" #professionalCalendarHome>*","");

        
			
		}
    // if(ajax_request.readyState == 1 && ajax_request.status == 500)
		// {
    //   document.getElementById('messageProfessionalAppAdd').innerHTML = ajax_request.responseText;
    // }
	}
}

/**
 * Method for edit Appointment data for professional user
 * @returns success or error msg
 */
 function saveAppointmentEditForProfessional(objButton)
 {
    buttonID = objButton.id;
    
    appointmentID = buttonID.split('-');
   var form_element = document.getElementById('form-professional-edit-appointment').getElementsByClassName('form_data_edit');
 
   var form_data = new FormData();
 
   for(var count = 0; count < form_element.length; count++)
   {
     if(form_element[count].value == ""){
       document.getElementById('messageProfessionalAppEdit').innerHTML = '<div class="alert alert-danger">Complete All Fields</div>';
       return false; 
     }else{
       form_data.append(form_element[count].name, form_element[count].value);
     }
   }
   form_data.append('appointmentID', appointmentID[1]);
 
   document.getElementById(buttonID).disabled = true;
 
   var ajax_request = new XMLHttpRequest();
 
   ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/appointment/appointmentEditForProf.inc.php');
 
   ajax_request.send(form_data);
   
 
   ajax_request.onreadystatechange = function()
   {
     
     if(ajax_request.readyState == 4 && ajax_request.status == 200)
     {
       document.getElementById(buttonID).disabled = false;
 
       
         
         document.getElementById('messageProfessionalAppEdit').innerHTML = ajax_request.responseText;
 
         setTimeout(function(){
 
           document.getElementById('messageProfessionalAppEdit').innerHTML = '';
           
 
         }, 5000);
 
         $("#professionalContents").load(location.href+" #professionalContents>*","");
         $("#professionalCalendarHome").load(location.href+" #professionalCalendarHome>*","");
 
         
       
     }
   
   }
 }


/**
 * Method for save Service data for professional user
 * @returns success or error msg
 */
function saveServiceForProfessional()
{
	var form_element = document.getElementById('form-add-service').getElementsByClassName('form_data_professional');

	var form_data = new FormData();

	for(var count = 0; count < form_element.length; count++)
	{
    if(form_element[count].value == ""){
      document.getElementById('messageProfessionalServiceAdd').innerHTML = '<div class="alert alert-danger">Complete All Fields</div>';
      return false; 
    }else{
      form_data.append(form_element[count].name, form_element[count].value);
    }
  }

	document.getElementById('serviceButtonForProfessionalAdd').disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/service/service.inc.php');

	ajax_request.send(form_data);
  

	ajax_request.onreadystatechange = function()
	{
    
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			document.getElementById('serviceButtonForProfessionalAdd').disabled = false;

      
			//var response = JSON.parse(ajax_request.responseText);

      form_element = document.getElementsByTagName('form');
      for(var count = 0; count < form_element.length; count++)
	    {
		    form_element[count].reset();
        
	    }
        
        
        
				document.getElementById('messageProfessionalServiceAdd').innerHTML = ajax_request.responseText;

				setTimeout(function(){

					document.getElementById('messageProfessionalServiceAdd').innerHTML = '';
          

				}, 4000);

        $("#professionalContents").load(location.href+" #professionalContents>*","");
        $("#professionalCalendarHome").load(location.href+" #professionalCalendarHome>*","");

        
			
		}
    // if(ajax_request.readyState == 1 && ajax_request.status == 500)
		// {
    //   document.getElementById('messageProfessionalAppAdd').innerHTML = ajax_request.responseText;
    // }
	}
}

/**
 * Method for save Clients data for professional user
 * @returns success or error msg
 */
function saveClientForProfessional()
{
  
	var form_element = document.getElementById('form-add-client').getElementsByClassName('form_data_professional');

	var form_data = new FormData();

	for(var count = 0; count < form_element.length; count++)
	{
    if(form_element[count].value == ""){
      document.getElementById('messageProfessionalClientAdd').innerHTML = '<div class="alert alert-danger">Complete All Fields</div>';
      form_element[count].classList.add('invalid-form-data');
      return false;
    }else{
      form_data.append(form_element[count].name, form_element[count].value);
    }
    
  }
  var email = document.getElementById('inputClientEmail');
  if (!emailCheck(email)) {
    document.getElementById('messageProfessionalClientAdd').innerHTML = '<div class="alert alert-danger">Invalid Email</div>';
    email.classList.add('invalid-form-data');
    return false;
  }
  var mobile = document.getElementById('inputClientEmail');
  if (!mobileCheck(mobile)) {
    document.getElementById('messageProfessionalClientAdd').innerHTML = '<div class="alert alert-danger">Invalid Mobile</div>';
    mobile.classList.add('invalid-form-data');
    return false;
  }
  

	document.getElementById('clientButtonForProfessionalAdd').disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/client/client.inc.php');

	ajax_request.send(form_data);
  

	ajax_request.onreadystatechange = function()
	{
    
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			document.getElementById('clientButtonForProfessionalAdd').disabled = false;

      
			//var response = JSON.parse(ajax_request.responseText);

      form_element = document.getElementsByTagName('form');
      for(var count = 0; count < form_element.length; count++)
	    {
		    form_element[count].reset();
        
	    }
        
        
        
				document.getElementById('messageProfessionalClientAdd').innerHTML = ajax_request.responseText;

				setTimeout(function(){

					document.getElementById('messageProfessionalClientAdd').innerHTML = '';
          

				}, 4000);

        $("#professionalContents").load(location.href+" #professionalContents>*","");
        $("#professionalCalendarHome").load(location.href+" #professionalCalendarHome>*","");

        
			
		}
    // if(ajax_request.readyState == 1 && ajax_request.status == 500)
		// {
    //   document.getElementById('messageProfessionalAppAdd').innerHTML = ajax_request.responseText;
    // }
	}
}

function loadAppointmentEditForProfessional(objButton)
{
  
  buttonID = objButton.id;
  
  appointmentID = buttonID.split('-');
  appointmentDate = appointmentID[3]+"-"+appointmentID[4]+"-"+appointmentID[5];
	//var form_element = document.getElementById('form_data_cancel_'+appointmentID[1]);
	var form_data = new FormData();

	
	form_data.append('appointmentID', appointmentID[2]);
  form_data.append('appointmentDate', appointmentDate);

	 objButton.disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/appointment/professionalAppointmentListData.inc.php');

	ajax_request.send(form_data);
  

	ajax_request.onreadystatechange = function()
	{
    
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			objButton.disabled = false;

      
			//var response = JSON.parse(ajax_request.responseText);

				//document.getElementById('form-add-appointment').reset();
        //document.getElementById('addSelectProfessionalForClient').reset();
        
        
				document.getElementById('form-professional-edit-appointment').innerHTML = ajax_request.responseText;

        selectizeClientAppointmentEdit();

				// setTimeout(function(){

				// 	document.getElementById('messageCancel').innerHTML = '';
          

				// }, 4000);

        //$("#clientContent").load(location.href+" #clientContent>*","");

        
			
		}
    
	}
}

function loadAppointmentCancelForProfessional(objButton){
  buttonID = objButton.id;
  
  appointmentID = buttonID.split('-');
  document.getElementById("form-professional-cancel-appointment").innerHTML+='<input type="number" id="appointmentCancelNumber" value="'+appointmentID[2]+'"  hidden>';
}



function cancelAppointmentForProfessional(objButton)
{
  appointmentID =  document.getElementById("appointmentCancelNumber").value;
  
	//var form_element = document.getElementById('form_data_cancel_'+appointmentID[1]);
	var form_data = new FormData();

	
	form_data.append('appointmentID', appointmentID);

	 objButton.disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', 'http://localhost/servicewise/ServiceWize/view/includes/appointment/appointmentCancelForProf.inc.php');

	ajax_request.send(form_data);
  

	ajax_request.onreadystatechange = function()
	{
    
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			objButton.disabled = false;

      
			//var response = JSON.parse(ajax_request.responseText);

				//document.getElementById('form-add-appointment').reset();
        //document.getElementById('addSelectProfessionalForClient').reset();
        
        
				document.getElementById('messageCancel').innerHTML = ajax_request.responseText;

				setTimeout(function(){

					document.getElementById('messageCancel').innerHTML = '';
          

				}, 4000);

        $("#professionalContents").load(location.href+" #professionalContents>*","");
        $("#professionalCalendarHome").load(location.href+" #professionalCalendarHome>*","");

        
			
		}
	}
}

function nextWeekHomeProfessional()
{
 
  var today = new Date().toISOString().slice(0, 10);
	//document.getElementById('appointmentButtonForProfessionalAdd').disabled = true;
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  var next = 0;
  if(queryString == "" || urlParams.get('texto') == ""){
    next = 7; 
  }else{next = parseInt(urlParams.get('texto'))+ 7;}
  
  var t = next;

	var ajax_request = new XMLHttpRequest();

  history.pushState({}, null, 'http://localhost/servicewise/ServiceWize/?page=home&date='+today+'&texto='+next);
  $("#professionalCalendarHome").load(location.href+" #professionalCalendarHome>*","");

	
}

function prevWeekHomeProfessional()
{
 //debugger;
  var today = new Date().toISOString().slice(0, 10);
	//document.getElementById('appointmentButtonForProfessionalAdd').disabled = true;
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  var next = 0;
  if(queryString == "" || urlParams.get('texto') == ""){
    next = -7; 
  }else{next = parseInt(urlParams.get('texto'))+ -7;}
  
  var t = next;

	var ajax_request = new XMLHttpRequest();

  history.pushState({}, null, 'http://localhost/servicewise/ServiceWize/?page=home&date='+today+'&texto='+next);
  $("#professionalCalendarHome").load(location.href+" #professionalCalendarHome>*","");

	
}
function todayWeekHomeProfessional()
{
	var ajax_request = new XMLHttpRequest();

  history.pushState({}, null, 'http://localhost/servicewise/ServiceWize/');
  $("#professionalCalendarHome").load(location.href+" #professionalCalendarHome>*","");
}






  
function isFutureDateConsulta(idate) {
  var today = new Date().getTime();
  idate = idate.split("-");

  idate = new Date(idate[0], idate[1] - 1, idate[2]).getTime();
  return (today - idate) < 0 ? true : false;
}

function emailChangeCheck(e) {
  var email = e.value;
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!re.test(String(email).toLowerCase())) {
    
      e.classList.add('invalid-form-data');
      if(e.nextElementSibling == null){
        e.insertAdjacentHTML("afterend",
        "<span style='display: block;color: #cc323f;margin-top: 10px;' class='invalid_field'>Invalid Email</span>");
      }else{
        e.nextElementSibling.innerHTML = "Invalid Email";
      }
      return false;
  }
  e.classList.remove('invalid-form-data');
  if(!(e.nextElementSibling == null)){
    e.nextElementSibling.innerHTML = "";
  }
  return true;
}

function clientNameChangeCheck(e) {
  var name = e.value;

  if (name.length < 6) {    
      e.classList.add('invalid-form-data');
      if(e.nextElementSibling == null){
        e.insertAdjacentHTML("afterend",
        "<span style='display: block;color: #cc323f;margin-top: 10px;' class='invalid_field'>Invalid Full Name</span>");
      }else{
        e.nextElementSibling.innerHTML = "Invalid Full Name";
      }
      return false;
  }
  e.classList.remove('invalid-form-data');
  if(!(e.nextElementSibling == null)){
    e.nextElementSibling.innerHTML = "";
  }
  return true;
}

function emailCheck(e) {
  var email = e.value;
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!re.test(String(email).toLowerCase())) {
      return false;
  }
  return true;

}

function mobileChangeCheck(e) {

  var cel = e.value;
  if (isNaN(cel)) {
      e.classList.add('invalid-form-data');
      if(e.nextElementSibling == null){
        e.insertAdjacentHTML("afterend",
        "<span style='display: block;color: #cc323f;margin-top: 10px;' class='invalid_field'>Invalid Number!</span>");
      }else{
        e.nextElementSibling.innerHTML = "Invalid Number";
      }
      return false;
  }
  //valida 9 digitos
  if (cel.length != 9) {
      e.classList.add('invalid-form-data');
      if(e.nextElementSibling == null){
        e.insertAdjacentHTML("afterend",
        "<span style='display: block;color: #cc323f;margin-top: 10px;' class='invalid_field'>Mobile must have 9 digits!</span>");
      }else{
        e.nextElementSibling.innerHTML = "Mobile must have 9 digits!";
      }
      return false;
  }
  if (!cel.startsWith(9)) {
      e.classList.add('invalid-form-data');
      if(e.nextElementSibling == null){
        e.insertAdjacentHTML("afterend",
        "<span style='display: block;color: #cc323f;margin-top: 10px;' class='invalid_field'>Mobile needs to start with 9!</span>");
      }else{
        e.nextElementSibling.innerHTML = "Mobile needs to start with 9!";
      }
      return false;
  }
  e.classList.remove('invalid-form-data');
  if(!(e.nextElementSibling == null)){
    e.nextElementSibling.innerHTML = "";
  }
  return true;


}


function mobileCheck(e) {

  var cel = e.value;
  if (isNaN(cel)) {
      return false;
  }
  //valida 9 digitos
  if (cel.length != 9) {
      return false;
  }
  if (!cel.startsWith(9)) {
      return false;
  }
  return true;


}

















  //Animation for bottom menu mobile
  $( document ).ready(function() {
      let list = document.getElementsByTagName("li");

      function makeActive(e) {
        for (const item of list) {
          item.classList.remove("active");
        }
        e.currentTarget.classList.add("active");
      }
      
      for (const item of list) {
        item.addEventListener("click", makeActive);
    }
  });

  // $( document ).ready(function() {


  //   "use strict"; 
    
  //   const body = document.body;
  //   //const bgColorsBody = ["#ffb457", "#ff96bd", "#9999fb", "#ffe797", "#cffff1"];
  //   const menu = body.querySelector(".menu");
  //   const menuItems = menu.querySelectorAll(".menu__item");
  //   const menuBorder = menu.querySelector(".menu__border");
  //   let activeItem = menu.querySelector(".active");
    
  //   function clickItem(item, index) {
    
  //       menu.style.removeProperty("--timeOut");
        
  //       if (activeItem == item) return;
        
  //       if (activeItem) {
  //           activeItem.classList.remove("active");
  //       }
    
        
  //       item.classList.add("active");
  //      // body.style.backgroundColor = bgColorsBody[index];
  //       activeItem = item;
  //       offsetMenuBorder(activeItem, menuBorder);
        
        
  //   }
    
  //   function offsetMenuBorder(element, menuBorder) {
    
  //       const offsetActiveItem = element.getBoundingClientRect();
  //       const left = Math.floor(offsetActiveItem.left - menu.offsetLeft - (menuBorder.offsetWidth  - offsetActiveItem.width) / 2) +  "px";
  //       menuBorder.style.transform = `translate3d(${left}, 0 , 0)`;
    
  //   }
    
  //   offsetMenuBorder(activeItem, menuBorder);
    
  //   menuItems.forEach((item, index) => {
    
  //       item.addEventListener("click", () => clickItem(item, index));
        
  //   })
    
  //   window.addEventListener("resize", () => {
  //       offsetMenuBorder(activeItem, menuBorder);
  //       menu.style.setProperty("--timeOut", "none");
  //   });
    
    
  //   });


// // no need to specify document ready
// $(function(){
    
//   // optional: don't cache ajax to force the content to be fresh
//   $.ajaxSetup ({
//       cache: false
//   });

//   // specify loading spinner
//   var spinner = "<img src='http://i.imgur.com/pKopwXp.gif' alt='loading...' />";
  
//   // specify the server/url you want to load data from
//   var url = "?page=calendar/dayView&date=2022-09-28&texto=0";
  
//   // on click, load the data dynamically into the #result div
//   $("#loadbasic").click(function(){
//       $("html").load(url);
//   });

// });






  // const listItem = document.querySelectorAll('.list');

  // function activateLink() {
  //   listItem.forEach( item => {
  //     item.classList.remove('active');
  //   });
  //   this.classList.add('active');
  // }
  
  // listItem.forEach( item => {
  //   item.addEventListener('click', activateLink);
  // });
  


//   $("#text-id").click( function () {
//     $.ajax({
//         type: 'post',
//         url: 'r.php',
//         data: {
//             source1: "some text",
//             source2: "some text 2"
//         },
//         function(data) {
//             $("#text-id").after("<p>" + data + "</p>");
//         }        
// });
