


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

  //Enable Service search
  $(function() {
    $('#selectServiceName').selectize({
      sortField: 'text',
    });
  })

  //Function that auto select service duration and price
  $(function() {
    $("[id^=selectServiceName]").change(function() {
      $("[id^=selectServiceDuration]").val($(this).val());
      $("[id^=selectServicePrice]").val($(this).val());
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

    

//Enable Professional search for Client Appointment Add 
$(function() {
  $('#selectProfessionalForClient').selectize({
    sortField: 'text',
  });
})
  $( document ).ready(function() {
    $("#selectProfessionalForClient").change(function() {
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
