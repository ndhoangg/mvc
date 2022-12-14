
$(document).ready(function () {
    $("#logout-button").on("click", function (event) {
      event.preventDefault();
      $.ajax({
        type: "POST",
        url: "/logout",
        data: {
            action:'logout'
        },
         dataType: "",
        beforeSend: function () {
           $("#loading-wrap").show();
        },
        success: function (response) {
            setTimeout(function() {
                window.location.replace("/login");
            }, 800)
        }
      });
    });
  });

