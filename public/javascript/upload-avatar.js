$(document).ready(function () {
    $(".uniqueAvatar").on("change", function (event) {
      event.preventDefault();
      var formData = new FormData($('#imageForm')[0]);
      $.ajax({
        type: "POST",
        url: "/updateavatar",
        processData: false,
        contentType: false,
        data: formData,
        // {
        //   first_name: $("input[name='first_name']").val(),
        //   last_name: $("input[name='last_name']").val(),
        //   job_title: $("input[name='job_title']").val(),
        //   date_of_birth: $("input[name='date_of_birth']").val(),
        //   phone_number: $("input[name='phone_number']").val(),
        //   address: $("input[name='address']").val(),
        // },
         dataType: "",
        beforeSend: function () {
           $("#loading-wrap").show();
        },
        success: function (response) {
           
              window.location.replace("/profile");
        
        }
      });
    });
  });