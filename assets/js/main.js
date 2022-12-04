
 /* SELECT LANGUAGE */

 function changeLang(){
  document.getElementById('form_lang').submit();
 }

 /* PLYR */


 $(document).ready(function() {
  'use strict';

    const player = new Plyr('#player',{
      hideControls:true,
      controls:['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'airplay', 'fullscreen']
    });
});

/* SUBMIT NO EMPTY FIELD */

$(document).ready(function($){
  'use strict';
  
    $("#searchform").submit(function() {
        $(this).find(":input").filter(function(){ return !this.value; }).attr("disabled", "disabled");
        return true;
    });
    
    $( "#searchform" ).find( ":input" ).prop( "disabled", false );
    
});

 /* VALIDATION SIGN IN FORM */

jQuery.validator.setDefaults({
        errorPlacement: function (error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate").css('display', 'block'));
        },
});

$(function() {
  'use strict';

  $("form[name='signin']").validate({

    rules: {
      user_email: {
        required: true,
        email: true
      },
      user_password: {
        required: true,
        minlength: 6,
        maxlength: 60,
      }
    },

    submitHandler: function(form) {
      form.submit();
    }
  });
});

 /* VALIDATION SIGN UP FORM */

$(function() {
  'use strict';

  $("form[name='signup']").validate({

    rules: {
      user_name: {
        required: true,
        minlength: 3
      },
      user_email: {
        required: true,
        email: true
      },
      user_password: {
        required: true,
        minlength: 6,
        maxlength: 60
      },
      terms: {
        required: true,
      },
    },
    
    submitHandler: function(form) {
      form.submit();
    }
  });
});

/* VALIDATE FORGOT FORM */

$(function() {
  'use strict';

  $("form[name='forgot']").validate({

    rules: {
      user_email: {
        required: true,
        email: true
      }
    },

    submitHandler: function(form) {
      form.submit();
    }
  });
});


/* CUSTOM SCROLL */

    $(document).ready(function($){
        $(window).on("load",function(){
            $(".customscroll").mCustomScrollbar({
                theme:"minimal",
                scrollInertia:100
            });
        });
    });


/* REMOVE FROM FAVORITES (Movie) */

    $(document).ready(function(){
  'use strict';

        $('.removemovie').on('click', function(){
            var itemId = $(this).data('item');
                $post = $(this);
            $.ajax({
                url: './remove-favorite.php?type=movie',
                type: 'post',
                data: {
                    'item': itemId
                },
                success: function(response){
                    location.reload();
                },
            });
        });
    });

/* REMOVE FROM FAVORITES (Serie) */

    $(document).ready(function(){
  'use strict';

        $('.removeserie').on('click', function(){
            var itemId = $(this).data('item');
                $post = $(this);
            $.ajax({
                url: './remove-favorite.php?type=serie',
                type: 'post',
                data: {
                    'item': itemId
                },
                success: function(response){
                    location.reload();
                },
            });
        });
    });

/* ADD TO FAVORITES (Movie) */
  'use strict';
    $(document).ready(function(){
        $('.favmovie').on('click', function(){
            var itemId = $(this).data('item');
                $post = $(this);
            $.ajax({
                url: '../../save-favorite.php?type=movie',
                type: 'post',
                data: {
                    'favmovie': 1,
                    'item': itemId
                },
                success: function(response){
                    $post.addClass('uk-hidden uk-animation-fade');
                    $post.siblings().removeClass('uk-hidden');
                },
            });
        });

        $('.unfavmovie').on('click', function(){
            var itemId = $(this).data('item');
            $post = $(this);
            $.ajax({
                url: '../../save-favorite.php?type=movie',
                type: 'post',
                data: {
                    'unfavmovie': 1,
                    'item': itemId
                },
                success: function(response){
                    $post.addClass('uk-hidden uk-animation-fade');
                    $post.siblings().removeClass('uk-hidden');
                }
            });
        });
    });

/* ADD TO FAVORITES (Serie) */

    $(document).ready(function(){
  'use strict';

        $('.favserie').on('click', function(){
            var itemId = $(this).data('item');
                $post = $(this);
            $.ajax({
                url: '../../save-favorite.php?type=serie',
                type: 'post',
                data: {
                    'favserie': 1,
                    'item': itemId
                },
                success: function(response){
                    $post.addClass('uk-hidden uk-animation-fade');
                    $post.siblings().removeClass('uk-hidden');
                },
            });
        });

        $('.unfavserie').on('click', function(){
            var itemId = $(this).data('item');
            $post = $(this);
            $.ajax({
                url: '../../save-favorite.php?type=serie',
                type: 'post',
                data: {
                    'unfavserie': 1,
                    'item': itemId
                },
                success: function(response){
                    $post.addClass('uk-hidden uk-animation-fade');
                    $post.siblings().removeClass('uk-hidden');
                }
            });
        });
    });


/* SUBMIT NEW REVIEW FOR MOVIE */

$(document).ready(function(){
  'use strict';

 $('#formRateMovie').on("submit", function(event){  
  event.preventDefault();  

   $.ajax({  
    url:"../../save-review.php?type=movie",  
    method:"POST",  
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    success:function(data){
     location.reload();
    }  
   });  
  });  
 });

/* SUBMIT NEW REVIEW FOR MOVIE */

$(document).ready(function(){
  'use strict';
  
 $('#formRateSerie').on("submit", function(event){  
  event.preventDefault();  

   $.ajax({  
    url:"../../save-review.php?type=serie",  
    method:"POST",  
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    success:function(data){
     location.reload();
    }  
   });  
  });  
 });
