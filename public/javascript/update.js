
$(document).ready(function () {
    $("#update-button").on("click", function (event) {
      event.preventDefault();
      var formData = new FormData($('#formData')[0]);
      $.ajax({
        type: "POST",
        url: "/update",
        processData: false,
        contentType: false,
        data:  formData,
        
        // {
        //   first_name: $("input[name='first_name']").val(),
        //   last_name: $("input[name='last_name']").val(),
        //   job_title: $("input[name='job_title']").val(),
        //   date_of_birth: $("input[name='date_of_birth']").val(),
        //   phone_number: $("input[name='phone_number']").val(),
        //   address: $("input[name='address']").val(),
        // },
        dataType: "json",
        beforeSend: function () {
           $("#loading-wrap").show();
        },
        success: function (response) {
          $("#loading-wrap").fadeOut("slow");
         if (!response.success)
         {
           $("#alert-content").text(response.message);
           $("#alert-wrap").show();
         }
         else setTimeout(function() {
             window.location.replace("/profile");
         }, 500)
       }
      });
    });
  });
  
  
  