$(document).ready(function () {

  let url = new URL(window.location.href);
  url.href = $("#baseUrl").val() + "signin";
  // Update the browser's URL without reloading
  window.history.replaceState(null, "", url.toString());

  //when everything in the body has already loaded
  $(".btnSubmit").on("click", function () {

    if(!$("#email").val()) {
      $("#email").focus();
      $("#msgWarningBody").text("Email field is required");
      $("#msgWarningBody").css("color", 'red');
      $("#modalWarningBtn").trigger("click");
      return false;
    }

    if(!$("#password-field").val()) {
      $("#password-field").focus();      
      $("#msgWarningBody").text("Password field is required");
      $("#msgWarningBody").css("color", 'red');
      $("#modalWarningBtn").trigger("click");
      return false;
    }

    var formData = new FormData($("form#formSignIn")[0]);
    $.ajax({
      url: "processsignin",
      type: "POST",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        console.log(data);
        data = $.parseJSON(data);
        $('input[name="csrf_test_name"]').val(data.newtoken);
        if (data.status > 0) {
          $("#msgSuccessBody").text(data.message);
          $("#modalSuccessBtn").trigger("click");
          setTimeout(redirect, 4000);
          function redirect(){
            location.href = data.redirect_url;
          }
        } else {
          $("#msgWarningBody").text(data.message);
          $("#msgWarningBody").css("color", "red");
          $("#modalWarningBtn").trigger("click");
        }
      },
    });

  });
});
