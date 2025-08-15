$(document).ready(function () {
  //when everything in the body has already loaded
  $(".btnSubmit").on("click", function () {

    if(!$("#firstname").val()) {
      $("#firstname").focus();
      $("#msgWarningBody").text("Firstname field is required");
      $("#msgWarningBody").css("color", 'red');
      $("#modalWarningBtn").trigger("click");
      return false;
    }

    if(!$("#lastname").val()) {
      $("#lastname").focus();
      $("#msgWarningBody").text("Lastname field is required");
      $("#msgWarningBody").css("color", 'red');
      $("#modalWarningBtn").trigger("click");
      return false;
    }

    if(!$("#email").val()) {
      $("#email").focus();
      $("#msgWarningBody").text("Email field is required");
      $("#msgWarningBody").css("color", 'red');
      $("#modalWarningBtn").trigger("click");
      return false;
    }else{
      // validate email
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if(!($('#email').val().match(mailformat))) { 
          $("#msgWarningBody").text("Email format is required");          
          $("#msgWarningBody").css("color", 'red');
          $("#modalWarningBtn").trigger("click");          
          $('#email').focus();                
          return false;                       
      }
    }

    if(!$("#password-field").val()) {
      $("#password-field").focus();      
      $("#msgWarningBody").text("Password field is required");
      $("#msgWarningBody").css("color", 'red');
      $("#modalWarningBtn").trigger("click");
      return false;
    }

    if(!$("#password-field2").val()) {
      $("#password-field2").focus();      
      $("#msgWarningBody").text("Confirm password field is required");
      $("#msgWarningBody").css("color", 'red');
      $("#modalWarningBtn").trigger("click");
      return false;
    }

    if($("#password-field").val() !== $("#password-field2").val()){
      $("#msgWarningBody").text("Password mismatch field is required");
      $("#msgWarningBody").css("color", 'red');
      $("#modalWarningBtn").trigger("click");
      return false;
    }

    var formData = new FormData($("form#formSignUp")[0]);
    $.ajax({
      url: "processsignup",
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
          // setTimeout(redirect, 4000);
          // function redirect(){
          //   location.href = 'signin';
          // }
        } else {
          $("#msgWarningBody").text(data.message);
          $("#msgWarningBody").css("color", "red");
          $("#modalWarningBtn").trigger("click");
        }
      },
    });

  });
});
