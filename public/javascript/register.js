
$(document).ready(function () {
    $("#submit-button").on("click", function (event) {
      event.preventDefault();
      $.ajax({
        type: "POST",
        url: "/register",
        data: {
          email: $("input[name='email']").val(),
          password: $("input[name='password']").val(),
          passwordconfirm: $("input[name='passwordconfirm']").val(),
          name: $("input[name='name']").val()

        },
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
              window.location.replace("/login");
          }, 800)
        }
      });
    });
  });
  
  
  