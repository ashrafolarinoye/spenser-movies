
'use strict';
$(".my-select").chosen({width:"100%"});

$(document).ready(function() {
  'use strict';
      // Init preview 4
      $.uploadPreview({
        input_field: "#image-upload",
        preview_box: "#image-preview",
        label_field: "#image-label"
      });

});


$(".toggle-password").on('click', function() { 
'use strict';

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

/* SETTINGS */

$(document).ready(function(){
  'use strict';

 $('#formSettings').on("submit", function(event){  
  event.preventDefault();  

   $.ajax({  
    url:"../controller/update_settings.php",  
    method:"POST",  
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    success:function(data){
     $('#save').val("Save Options"); 
      document.getElementById('saved').style.display = "inline-block";
     setTimeout(function(){
      document.getElementById('saved').style.display = "none";
      }, 3000);
    }  
   });  
  });  
 });

/* SMTP */

$(document).ready(function(){
  'use strict';

 $('#formSmtp').on("submit", function(event){  
  event.preventDefault();  

   $.ajax({  
    url:"../controller/update_smtp.php",  
    method:"POST",  
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    success:function(data){
     $('#save').val("Save Options"); 
      document.getElementById('saved').style.display = "inline-block";
     setTimeout(function(){
      document.getElementById('saved').style.display = "none";
      }, 3000);
    }  
   });  
  });  
 });
