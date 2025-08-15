$(document).ready(function () {
  // getChildrenDT();

  $(".addChildren").on("click", function () {

    if($("#Image_hidden_tag").val() == 'F'){
      $("#modalErrorBody").text("Child image is required");
      $("#modalErrorBtn").trigger("click");		
      return false;
    }

    if (!$("#firstname").val()) {
      $("#modalErrorBody").text("Firstname field is required");
      $("#modalErrorBtn").trigger("click");
      return false;
    }

    if (!$("#lastname").val()) {
      $("#modalErrorBody").text("Lastname field is required");
      $("#modalErrorBtn").trigger("click");
      return false;
    }

    if (!$("#class").val()) {
      $("#modalErrorBody").text("Class field is required");
      $("#modalErrorBtn").trigger("click");
      return false;
    }

    if (!$("#gender").val()) {
      $("#modalErrorBody").text("Gender field is required");
      $("#modalErrorBtn").trigger("click");
      return false;
    }

    if (!$("#dob").val()) {
      $("#modalErrorBody").text("DOB field is required");
      $("#modalErrorBtn").trigger("click");
      return false;
    }

    $("#yesNoBtn").val("add child");
    $("#modalBody").text("Are you sure you want to add child?");
    $("#modalTriggerYesNoBtn").trigger("click");
  });

  $("#yesNoBtn").on("click", function () {
    $(".close").trigger("click");

    var formData = $("form#formChildren")[0]; 
    formData = new FormData(formData); 

    $.ajax({
      url: "processaddchild",
      type: 'POST',
      data: formData,
      async: false,
      cache: false,
      contentType: false,
      processData: false,
      success:function(data)
      {  
          data = $.parseJSON(data);
          $('input[name="csrf_test_name"]').val(data.newtoken);	                    
          if(data.status > 0){
            $("#Image_upload").attr('src', "<?= base_url(); ?>assets/images/noimage.jpg" + `?v=${new Date().getTime()}`)
            $('#modalTrigger').modal('show');
            $("#modalBody").text(data.message);		
            $("#resetform").trigger('click');
            getDepartmentDT();
          }else{
            $('#modalTrigger').modal('show');
            $("#modalBody").text(data.message);	
          }
      },
      error:function(data)
      {
        $('#modalTrigger').modal('show');
        $("#modalBody").text("Error occured, please try again later");						
      } 
    });  
  });
});

function getChildrenDT() {
  var url = "<?= base_url(); ?>getcoursesdt";
  $("#childrenTable").dataTable().fnDestroy();
  var dtable = $("#childrenTable").dataTable({
    //"aaSorting": [[1, 'asc']],
    aLengthMenu: [
      [10, 30, 45, -1],
      [10, 30, 45, "All"],
    ],
    // set the initial value
    iDisplayLength: 10,
    sAjaxSource: url,
    fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
      // Row click
      $(nRow).on("click", function () {
        // fetchrecord(aData[0]);
      });
    },
  });
  // $("#childrenTable").attr('width', '100%');
}

//to preview image
function preveiwImageGlobal(getImage){
    var getImageID = getImage.id;
    var fileType = document.getElementById(getImageID).files[0].type;
    var fileSize = document.getElementById(getImageID).files[0].size;
    /*******CONVERT IMAGE FILE TO KILOBYTE*******/
    var fileSize = Math.floor(fileSize/(1024));
    if (getImage.files && getImage.files[0]) 
    {
      if(fileType == 'image/jpg' || fileType == 'image/jpeg')
      {
        /******IMAGE SIZE MUST NOT BE MORE THAN 500 KB******/
        if(fileSize<501)    
        {
          var imgReader = new FileReader();
          imgReader.onload = function(e) 
          {
            $('#' + getImageID + '_upload').attr('src', e.target.result);
            $("#" + getImageID + "_hidden_tag").val("T");
          }
          imgReader.readAsDataURL(getImage.files[0]);       
        }
        else
        {
          $('#modalTrigger').modal('show');
          $("#modalBody").text("Image Size too large for Upload, Must not be more than 500KB!");							
          $("#" + getImageID).val('');
          $("#" + getImageID + "_hidden_tag").val("F");
        }
      }  
      else
      {
        $('#modalTrigger').modal('show');
        $("#modalBody").text("File format not Supported/Allowed for Upload!, Please Choose another ");												
        $("#" + getImageID).val('');
        $("#" + getImageID + "_hidden_tag").val("F");
      }
    }
}