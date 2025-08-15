var baseUrl = $("#baseUrl").val();

$(document).ready(function () {
    //when everything in the body has already loaded
    $("#homePage").click(function () {
      let url = new URL(window.location.href);
      url.href = baseUrl;
      window.history.replaceState(null, '', url.toString());// Update the browser's URL without reloading
      location.href = 'home';
    });

    $("#coursePage").click(function () {
      location.href = 'course';
    });

    $("#aboutUsPage").click(function () {
      location.href = 'aboutus';
    });

    $("#contactPage").click(function () {
      location.href = 'contact';
    });
    
  });

  