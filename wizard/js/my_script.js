
var url = "./php/user_login_register.php";
var session_url = "./php/sessions.php";
var wishlist_url = "./php/wishlist.php";
var cart_url = "./php/cart.php";
var googleUser = {};
var billing_address_height=0;
var shipping_address_height=0;
var verify_otp = '$no_otp%';


$(document).ready(function() {

  $.post(session_url, {user:"check_session"}).done(function (session_data) {

    if (session_data != 'false') 
    {
      $(".login_home_button").text("Logout");
      $(".login_home_button").attr("id","logoff_btn");
      $(".login_home_button").data("toggle","");
      $(".login_home_button").data("target","");

    }
    else
    {

      $(".login_home_button").text("Login");
      $(".login_home_button").attr("id","");
      $(".login_home_button").attr("data-toggle","modal");
      $(".login_home_button").attr("data-target","#login-modal");

    }

  });

  $(".login_home_button")

  window.Parsley.on('field:error', function() {
    $(this.$element).focus();
  });

  window.Parsley.addValidator('fileextension', function (value, requirement) {
    // the value contains the file path, so we can pop the extension
    var fileExtension = value.split('.').pop();
    var extent = requirement.split(" ");

    return fileExtension === extent[0] || fileExtension === extent[1] || fileExtension === extent[2] || fileExtension === extent[3] || fileExtension === extent[4] || fileExtension === extent[5];
  }, 32).addMessage('en', 'fileextension', 'The extension doesn\'t match the required');

  var loc = window.location.pathname;

  $(window).scroll(function(){
    if (loc.includes("products")) 
    {
      var lastID = $('#store_last_id').data('id');
      var filter = $('#store_last_id').data('filter');
      
      if (($(window).scrollTop() == $(document).height() - $(window).height())  && (lastID != 0)) 
      {
        $.ajax({
          type:'POST',
          url:'./php/get_products.php',
          data:'id='+lastID+filter,
          beforeSend:function(html){
              $('#load-more').show();
          },
          success:function(html){
              $('#store_last_id').remove();
              $('#load-more').hide();
              $('#postList').append(html);

              $.post(session_url, {user:"check_session"}).done(function (session_data) {

                if (session_data != 'false') 
                {
                  
                  $.post(wishlist_url, {action:'getAll',user_email:session_data},function (data) {

                    var id;
                    for(var i=0;i<data.length;i++)
                    {
                      id = data[i].card_id;

                      $('.wishlist_btn').each(function(){

                        var span =$(this).children();
                        if ($(this).attr('data') == id)
                        {
                          span.removeClass('fa-heart-o');
                          span.addClass('fa-heart');
                        }

                      });
                    }

                  },'json');
                  
                }
              });

              $.post(session_url, {user:"check_session"}).done(function (session_data) {

                if (session_data != 'false') 
                {
                  
                  $.post(cart_url, {action:'getAll',user_email:session_data},function (data) {

                    var id;
                    for(var i=0;i<data.length;i++)
                    {
                      id = data[i].card_id;

                      $('.aa-add-card-btn').each(function(){

                        if ($(this).attr('id') == id)
                        {
                          $(this).text('Remove From Cart');
                        }

                      });
                    }
                  },'json');
                  
                }
              });
          }
        });
      }
    }
  });

  if (loc.includes("checkout")) {

    $.post(session_url, {user:"check_session"}).done(function (session_data) {

      if (session_data != 'false') 
      {
        $.post(cart_url, {action:'checkNumbers',user_email:$.trim(session_data)}).done(function (data) {

          if (data <= 0) 
          {
            new PNotify({
              title: 'Status',
              text: 'Cart is empty.',
              type: 'error',
              styling: 'bootstrap3'
            });
            setInterval(function(){ window.location.href = "index.php"; }, 1000);
          }

        });
      }
    });

    $('#wizard').smartWizard();

    $('.buttonNext').addClass('btn btn-success');
    $('.buttonPrevious').addClass('btn btn-primary');
    $('.buttonFinish').remove();
    $('#card_box').hide();


    setTimePicker();
    setDatePicker();


    $('#billing_addresses').children('.set_address').each(function(){

      if ($(this).height() > billing_address_height)
      {
        billing_address_height = $(this).height();
      }

    });

    $('#shipping_addresses').children('.set_address').each(function(){

      if ($(this).height() > shipping_address_height)
      {
        shipping_address_height = $(this).height();
      }

    });
  }

  if (loc.includes("wishlist")) 
  {
    $.post(session_url, {user:"check_session"}).done(function (session_data) {

      if (session_data != 'false') 
      {
        $.post(wishlist_url, {action:'checkNumbers',user_email:session_data}).done(function (data) {

          if (data <= 0) 
          {
            new PNotify({
              title: 'Status',
              text: 'Wishlist is empty.',
              type: 'error',
              styling: 'bootstrap3'
            });
            setInterval(function(){ window.location.href = "index.php"; }, 1000);
          }

        });
      }
    });
  }

  if (loc.includes("index") || loc == "/" || loc.includes("products")) { 

    $.post(session_url, {user:"check_session"}).done(function (session_data) {

      if (session_data != 'false') 
      {
        
        $.post(wishlist_url, {action:'getAll',user_email:session_data},function (data) {

          var id;
          for(var i=0;i<data.length;i++)
          {
            id = data[i].card_id;

            $('.wishlist_btn').each(function(){

              var span =$(this).children();
              if ($(this).attr('data') == id)
              {
                span.removeClass('fa-heart-o');
                span.addClass('fa-heart');
              }

            });
          }

        },'json');
        
      }
    });

    $.post(session_url, {user:"check_session"}).done(function (session_data) {

      if (session_data != 'false') 
      {
        
        $.post(cart_url, {action:'getAll',user_email:session_data},function (data) {

          var id;
          for(var i=0;i<data.length;i++)
          {
            id = data[i].card_id;

            $('.aa-add-card-btn').each(function(){

              if ($(this).attr('id') == id)
              {
                $(this).text('Remove From Cart');
              }

            });
          }
        },'json');
        
      }
    });
  }

  if (loc.includes('cart')) 
  {
    $.post(session_url, {user:"check_session"}).done(function (session_data) {

      if (session_data != 'false') 
      {
        $.post(cart_url, {action:'checkNumbers',user_email:session_data}).done(function (data) {

          if (data <= 0) 
          {
            new PNotify({
              title: 'Status',
              text: 'Cart is empty.',
              type: 'error',
              styling: 'bootstrap3'
            });
            setInterval(function(){ window.location.href = "index.php"; }, 1000);
          }

        });
      }
    });
    $('#card_box').hide();
  }

  if (loc.includes('account')) 
  {
    $('#completed-orders hr').last().remove();
    $('#all-orders hr').last().remove();
    $('#incomplete-orders hr').last().remove();
  }


  var auth2;

  gapi.load('auth2', function(){
    // Retrieve the singleton for the GoogleAuth library and set up the client.
    auth2 = gapi.auth2.init({
      client_id: '889653158766-6fhhgojvl9o9ccp21jj5pssgkugskvg8.apps.googleusercontent.com',
      cookiepolicy: 'single_host_origin',
    });
    // attachSignin(document.getElementById('gmail_btn'));
  });


  function attachSignin(element) {

    auth2.attachClickHandler(element, {},
        function(googleUser) {

          var profile = googleUser.getBasicProfile();
          var user_name = profile.getName();
          var user_email = profile.getEmail();
          

          $.post(url, {from:"gmail",fullname:user_name,email:user_email}).done(function (data) {

            

              if (data == 'success') 
              {
                $.post(session_url, {user:"gmail",email:user_email}).done(function (session_data) {

                  if (session_data == 'success') 
                  {
                    window.location.reload();
                  }
                  else
                  {
                    alert(session_data);
                  }
                });       
              }
              else
              {
               $("#error_message_login").text(data); 
               $("#error_message_login").slideDown();
              }

            });
          
        }, function(error) {
          alert(JSON.stringify(error, undefined, 2));
        });
  }
});


function checkLoginState() {
  FB.getLoginStatus(function(response) {
    if (response.status === 'connected') {
      FB.api('/me?fields=id,name,email', function(response) {

        $.post(url, {from:"facebook",fullname:response.name,email:response.email}).done(function (data) {

            if (data == 'success') 
            {
              $.post(session_url, {user:"facebook",email:response.email}).done(function (session_data) {

                if (session_data == 'success') 
                {
                  window.location.reload();
                }
                else
                {
                  alert(session_data);
                }
              }); 
            }
            else
            {
             $("#error_message_login").text(data); 
             $("#error_message_login").slideDown();
            }

          });
      });

    }
  });
}

$('#switchToRegister').click(function(){
  $('#login_div').hide();
  $('#register_div').show();
  $('#reset_div').hide();
});


$('#switchToLogin').click(function(){
  $('#login_div').show();
  $('#register_div').hide();
  $('#reset_div').hide();
});

$('#switchToReset').click(function(){

  $('#reset_div').show();
  $('#login_div').hide();
  $('#register_div').hide();
});

$('#close_login_dialog').click(function(){

  $('#login_div').show();
  $('#register_div').hide();
  $('#reset_div').hide();
});    

$('#submit_login').click(function(){

  if ($('#login_form').parsley().validate())
  {

    $("#error_message_login").hide();

    var formData = $("#login_form").serializeArray();
    $.post(url, formData).done(function (data) {

      if (data == 'success') 
      {
        $.post(session_url, {user:"main",email:formData[1].value}).done(function (session_data) {

          if (session_data == 'success') 
          {
            window.location.reload();
          }
          else
          {
            alert(session_data);
          }
        }); 
      }
      else
      {
       $("#error_message_login").text(data); 
       $("#error_message_login").slideDown();
      }

    });
  }
});


$('#submit_register').click(function(){

  if ($('#register_form').parsley().validate())
  {

    $("#error_message_register").hide();

    var formData = $("#register_form").serializeArray();
    $.post(url, formData).done(function (data) {

      if (data == 'success') 
      {
        $.post(session_url, {user:"main",email:formData[1].value}).done(function (session_data) {

          if (session_data == 'success') 
          {
            window.location.reload();
          }
          else
          {
            alert(session_data);
          }
        });
      }
      else
      {
        $("#error_message_register").text(data); 
       $("#error_message_register").slideDown();
      }

    });
  }
});

$('#submit_reset').click(function(){

  if ($('#reset_form').parsley().validate())
  {

    $("#error_message_reset").hide();

    var formData = $("#reset_form").serializeArray();
    $.post(url, formData).done(function (data) {

      if (data == 'success') 
      {
        $.post(session_url, {user:"main",email:formData[1].value}).done(function (session_data) {

          if (session_data == 'success') 
          {
            window.location.reload();
          }
          else
          {
            alert(session_data);
          }
        });
      }
      else
      {
        $("#error_message_reset").text(data); 
        $("#error_message_reset").slideDown();
      }

    });
  }
});

$('#generateCode').click(function(){


  if ($('#reset_email').parsley().validate() == true)
  {

    $("#error_message_reset").hide();
    $('#code_sent_message').hide();

    var email = document.getElementById('reset_email').value;
    email = $.trim(email);

    if (email == "") 
    {
      $("#error_message_reset").text('please enter email first'); 
      $("#error_message_reset").slideDown();
    }
    else
    {
      $.post(url, {from:'generateCode',user_email:email}).done(function (data) {

        if (data == 'success') 
        {
          $("#code_sent_message").text('Code has been sent to '+email);
          $('#code_sent_message').slideDown();
          $('#submit_reset').prop('disabled', false);
          $('#generateCode').text('RESEND!');
        }
        else
        {
          $("#error_message_reset").text(data); 
          $("#error_message_reset").slideDown();
        }

      });
    }
  }
});


$('.quick_view').click(function(){

 var id = $(this).attr('id');

 $.post('php/get_cards_details.php', {from:'quick_view',card_id:id},function (data) {

  $('#dialog_card_name').text(data[0].card_name);
  $('#dialog_card_description').text(data[0].card_description);
  $('#dialog_card_price').text('Rs. '+data[0].card_price);
  $('#dialog_card_category').text(data[0].card_category);
  $('#dialog_card_color').text(data[0].color+'.');
  $('#dialog_card_paper_type').text(data[0].paper_type+'.');
  $('#dialog_card_size').text(data[0].height+'" * '+data[0].width+'".');
  $('#add_toCart').attr('data',id);
  $('#dialog_display_image').attr('src','./allow_me/images/cards/main_image/tiles/'+data[0].main_image);
  $('#dialog_zoom_image').attr('data-lens-image','./allow_me/images/cards/main_image/main/'+data[0].main_image);
  $('#card_link').attr('href','product_detail.php?cid='+id);

  $('#card_thumb_images_1').attr('data-lens-image','./allow_me/images/cards/main_image/main/'+data[0].main_image);
  $('#card_thumb_images_1').attr('data-big-image','./allow_me/images/cards/main_image/tiles/'+data[0].main_image);
  $('#card_thumb_images_1 img').attr('src','./allow_me/images/cards/main_image/thumbnails/'+data[0].main_image);

  $('#card_thumb_images_2').attr('data-lens-image','./allow_me/images/cards/front_image/main/'+data[0].front_image);
  $('#card_thumb_images_2').attr('data-big-image','./allow_me/images/cards/front_image/tiles/'+data[0].front_image);
  $('#card_thumb_images_2 img').attr('src','./allow_me/images/cards/front_image/thumbnails/'+data[0].front_image);

  $('#card_thumb_images_3').attr('data-lens-image','./allow_me/images/cards/content_image/main/'+data[0].content_image);
  $('#card_thumb_images_3').attr('data-big-image','./allow_me/images/cards/content_image/tiles/'+data[0].content_image);
  $('#card_thumb_images_3 img').attr('src','./allow_me/images/cards/content_image/thumbnails/'+data[0].content_image);

  $('#card_thumb_images_4').attr('data-lens-image','./allow_me/images/cards/back_image/main/'+data[0].back_image);
  $('#card_thumb_images_4').attr('data-big-image','./allow_me/images/cards/back_image/tiles/'+data[0].back_image);
  $('#card_thumb_images_4 img').attr('src','./allow_me/images/cards/back_image/thumbnails/'+data[0].back_image);

 },'json');
});

$('.rate_star').click(function(){

  $('.rate_star').removeClass('fa-star');
  $('.rate_star').removeClass('fa-star-o');


  var star = $(this).attr('id');

  if (star == 'one_star') 
  {
    $('#one_star').addClass('fa-star');
    $('#two_star').addClass('fa-star-o');
    $('#three_star').addClass('fa-star-o');
    $('#four_star').addClass('fa-star-o');
    $('#five_star').addClass('fa-star-o');
    $('#rating').val('1');
  }
  else if(star == 'two_star')
  {
    $('#one_star').addClass('fa-star');
    $('#two_star').addClass('fa-star');
    $('#three_star').addClass('fa-star-o');
    $('#four_star').addClass('fa-star-o');
    $('#five_star').addClass('fa-star-o');
    $('#rating').val('2');
  }
  else if(star == 'three_star')
  {
    $('#one_star').addClass('fa-star');
    $('#two_star').addClass('fa-star');
    $('#three_star').addClass('fa-star');
    $('#four_star').addClass('fa-star-o');
    $('#five_star').addClass('fa-star-o');
    $('#rating').val('3');
  }
  else if(star == 'four_star')
  {
    $('#one_star').addClass('fa-star');
    $('#two_star').addClass('fa-star');
    $('#three_star').addClass('fa-star');
    $('#four_star').addClass('fa-star');
    $('#five_star').addClass('fa-star-o');
    $('#rating').val('4');
  }
  else if(star == 'five_star')
  {
    $('#one_star').addClass('fa-star');
    $('#two_star').addClass('fa-star');
    $('#three_star').addClass('fa-star');
    $('#four_star').addClass('fa-star');
    $('#five_star').addClass('fa-star');
    $('#rating').val('5');
  }
});

$('body').on('click','#logoff_btn',function(){

  $.post(session_url, {user:"logout"}).done(function (session_data) {

    if (session_data == 'success') 
    {
      window.location.reload();
    }
    else
    {
      alert(session_data);
    }
  }); 
});


$('#main_page_content').on('click','.wishlist_btn',function(){

  var id = $(this).attr('data');

  var span = $(this).children();


  $.post(session_url, {user:"check_session"}).done(function (session_data) {

    if (session_data != 'false') 
    {
      if (span.hasClass('fa-heart-o')) 
      {
        $.post(wishlist_url, {action:'add',card_id:id,user_email:session_data}).done(function (data) {

          if (data == 'success') 
          {
            span.removeClass('fa-heart-o');
            span.addClass('fa-heart');
          }
          else
          {
            alert(data);
          }

        });
      }
      else if (span.hasClass('fa-heart'))
      {
        $.post(wishlist_url, {action:'remove',card_id:id,user_email:session_data}).done(function (data) {

          if (data == 'success') 
          {
            span.removeClass('fa-heart');
            span.addClass('fa-heart-o');
          }
          else
          {
            alert(data);
          }

        });
      }
    }
    else
    {
      $('#login-modal').modal('show');
    }
  });
});

$('#main_page_content').on('click','.aa-add-card-btn',function(){

  var id = $(this).attr('id');
  var button = $(this);

  $.post(session_url, {user:"check_session"}).done(function (session_data) {

    if (session_data != 'false') 
    {

      if (button.text() == "Add To Cart") 
      {
        $.post(cart_url, {action:'add',card_id:id,user_email:session_data}).done(function (data) {

          if (data == 'success') 
          {
            $('#card_box').load('./php/show_cart.php');
            button.text('Remove From Cart');
            new PNotify({
              title: 'Status',
              text: "Added to cart.",
              type: 'success',
              styling: 'bootstrap3'
            });
          }
          else
          {
            alert(data);
          }

        });
      }
      else if (button.text() == "Remove From Cart")
      {
          $.post(cart_url, {action:'remove',card_id:id,user_email:session_data}).done(function (data) {

            if (data == 'success') 
            {
              $('#card_box').load('./php/show_cart.php'); 
              button.text('Add To Cart'); 
              new PNotify({
                title: 'Status',
                text: "Removed from cart.",
                type: 'success',
                styling: 'bootstrap3'
              }); 
            }
            else
            {
              alert(data);
            }

          }); 
      }

      
    }
    else
    {
      $('#login-modal').modal('show');
    }
  });
});

$('.remove_wishlist').click(function(){

  var data = $(this).attr('data');
  var array = data.split(',')
  var card_id = array[1];
  var email = array[0];

  $.post(wishlist_url, {action:'remove',card_id:card_id,user_email:email}).done(function (data) {

    if (data == 'success') 
    {
      $('#'+card_id+'_tr').remove();
    }
    else
    {
      alert(data);
    }

  });  
});

$('#main_page_content').on('click','.remove_cart',function(){

  var data = $(this).attr('data');
  var array = data.split(',')
  var card_id = array[1];
  var email = array[0];

  $.post(cart_url, {action:'remove',card_id:card_id,user_email:email}).done(function (data) {

    if (data == 'success') 
    {
      $('#main_page_content').load('./php/main_cart.php');
    }
    else
    {
      alert(data);
    }

  });  
});

$('#card_box').on('click','.remove_cart_dialog',function(){

  var data = $(this).attr('data');
  var array = data.split(',')
  var card_id = array[1];
  var email = array[0];
  var old_price = $.trim($('#cart_total_price').text()).split(" ");
  old_price = old_price[1];
  var new_price = $('#li_'+card_id).data('price'); 
  new_price = old_price - new_price;
  $('#li_'+card_id).remove();
  $('#cart_total_price').text('RS '+new_price);
  $('#cart_total_cards').text($('#cart_total_cards').text()-1);
  $('.aa-add-card-btn').each(function(){

    if ($(this).attr('id') == card_id)
    {
      $(this).text('Add To Cart');
    }

  });

  $.post(cart_url, {action:'remove',card_id:card_id,user_email:email}).done(function (data) {

    if (data != 'success') 
    {
      alert(data);
    }

  });  
});

$('#main_page_content').on('change','.card_quantity',function(){
  
    card_quantity = $(this).val();
    var data = $(this).attr('data');
    var array = data.split(',')
    var card_id = array[1];
    var email = array[0];

    if ($.trim(card_quantity) == "" || card_quantity == 0) 
    {
      card_quantity = 1;
    }

    $.post(cart_url, {action:'update',card_id:card_id,user_email:email,total_quantity:card_quantity}).done(function (data) {

      if (data == 'success')
      {
        $('#main_page_content').load('./php/main_cart.php');
      } 
      else
      {
        alert(data);
      }

    });
});

function validateForm(form) {

  var first_name = $('#'+form+'first_name');
  var last_name = $('#'+form+'last_name');
  var company_name = $('#'+form+'company_name');
  var email = $('#'+form+'email');
  var tel = $('#'+form+'tel');
  var address = $('#'+form+'address');
  var city = $('#'+form+'city');
  var appartment = $('#'+form+'appartment');
  var district = $('#'+form+'district');
  var pincode = $('#'+form+'pincode');

  if ($.trim(company_name.val()) == ' ' || $.trim(company_name.val()) == 'undefined') 
  {
    company_name.val('');
  }


  var check_first_name = first_name.parsley().validate() == true;
  var check_last_name = last_name.parsley().validate() == true;
  var check_email = email.parsley().validate() == true;
  var check_tel = tel.parsley().validate() == true;
  var check_address = address.parsley().validate() == true;
  var check_city = city.parsley().validate() == true;
  var check_district = district.parsley().validate() == true;
  var check_pincode = pincode.parsley().validate() == true;


  if (check_first_name && check_last_name && check_email && check_tel && check_address && check_city && check_district && check_pincode) 
  {
    $('#full_'+form+'address').val(first_name.val()+' '+last_name.val()+','+company_name.val()+','+email.val()+','+tel.val()+','+address.val()+','+appartment.val()+','+city.val()+','+district.val()+','+pincode.val());
    return true;
  }
  else
  {
    return false;
  }
}

function populateShippingForm() {

  $('#shipping_first_name').val($('#billing_first_name').val());
  $('#shipping_last_name').val($('#billing_last_name').val());
  $('#shipping_company_name').val($('#billing_company_name').val());
  $('#shipping_email').val($('#billing_email').val());
  $('#shipping_tel').val($('#billing_tel').val());
  $('#shipping_address').val($('#billing_address').val());
  $('#shipping_city').val($('#billing_city').val());
  $('#shipping_appartment').val($('#billing_appartment').val());
  $('#shipping_district').val($('#billing_district').val());
  $('#shipping_pincode').val($('#billing_pincode').val());
}

$('#billing_addresses').on('click','.set_address',function(){

  billing_address = $(this).children('.copy_billing_address').text().split(',');
  names = billing_address[0].split(" ");

  $('#billing_first_name').val(names[0]);
  $('#billing_first_name').removeAttr('placeholder');
  $('#billing_last_name').val(names[1]);
  $('#billing_last_name').removeAttr('placeholder');
  $('#billing_company_name').val(billing_address[1]);
  $('#billing_company_name').removeAttr('placeholder');
  $('#billing_email').val(billing_address[2]);
  $('#billing_email').removeAttr('placeholder');
  $('#billing_tel').val(billing_address[3]);
  $('#billing_tel').removeAttr('placeholder');
  $('#billing_address').val(billing_address[4]);
  $('#billing_address').removeAttr('placeholder');
  $('#billing_appartment').val(billing_address[5]);
  $('#billing_appartment').removeAttr('placeholder');
  $('#billing_city').val(billing_address[6]);
  $('#billing_city').removeAttr('placeholder');
  $('#billing_district').val(billing_address[7]);
  $('#billing_district').removeAttr('placeholder');
  $('#billing_pincode').val(billing_address[8]);
  $('#billing_pincode').removeAttr('placeholder');
  validateForm('billing_');
  $('#change_billing_address_div').show();
  $('#change_billing_address').data('id',$(this).data('id'));
  $('#billing_form').slideDown();
  if ((window.location.pathname).includes('checkout')) 
  {
    $('#billing_addresses .set_address').css('color','black');
    $(this).css('color','#37c6f5');
  }
});

$('#billing_addresses').on('click','.add_address',function(){

  $('#billing_first_name').val('');
  $('#billing_first_name').attr('placeholder','First Name*');
  $('#billing_last_name').val('');
  $('#billing_last_name').attr('placeholder','Last Name*');
  $('#billing_company_name').val('');
  $('#billing_company_name').attr('placeholder','company Name*');
  $('#billing_email').val('');
  $('#billing_email').attr('placeholder','Email Address*');
  $('#billing_tel').val('');
  $('#billing_tel').attr('placeholder',"Phone(without '91')*");
  $('#billing_address').val('');
  $('#billing_address').attr('placeholder','Address*');
  $('#billing_appartment').val('');
  $('#billing_appartment').attr('placeholder','Appartment, Suite etc.');
  $('#billing_city').val('');
  $('#billing_city').attr('placeholder','City / Town*');
  $('#billing_district').val('');
  $('#billing_district').attr('placeholder','District*');
  $('#billing_pincode').val('');
  $('#billing_pincode').attr('placeholder','Pincode / ZIP*');
  $('#change_billing_address_div').show();
  $('#change_billing_address').data('id',$(this).data('id'));
  $('#billing_form').slideDown();
  if ((window.location.pathname).includes('checkout')) 
  {
   $('#billing_addresses .set_address').css('color','black');
  }
});

$('#shipping_addresses').on('click','.set_address',function(){

  shipping_address = $(this).children('.copy_shipping_address').text().split(',');
  names = shipping_address[0].split(" ");

  $('#shipping_first_name').val(names[0]);
  $('#shipping_first_name').removeAttr('placeholder');
  $('#shipping_last_name').val(names[1]);
  $('#shipping_last_name').removeAttr('placeholder');
  $('#shipping_company_name').val(shipping_address[1]);
  $('#shipping_company_name').removeAttr('placeholder');
  $('#shipping_email').val(shipping_address[2]);
  $('#shipping_email').removeAttr('placeholder');
  $('#shipping_tel').val(shipping_address[3]);
  $('#shipping_tel').removeAttr('placeholder');
  $('#shipping_address').val(shipping_address[4]);
  $('#shipping_address').removeAttr('placeholder');
  $('#shipping_appartment').val(shipping_address[5]);
  $('#shipping_appartment').removeAttr('placeholder');
  $('#shipping_city').val(shipping_address[6]);
  $('#shipping_city').removeAttr('placeholder');
  $('#shipping_district').val(shipping_address[7]);
  $('#shipping_district').removeAttr('placeholder');
  $('#shipping_pincode').val(shipping_address[8]);
  $('#shipping_pincode').removeAttr('placeholder');
  validateForm('shipping_');
  $('#change_shipping_address_div').show();
  $('#change_shipping_address').data('id',$(this).data('id'));
  $('#shipping_form').slideDown();
  if ((window.location.pathname).includes('checkout')) 
  {
    $('#shipping_addresses .set_address').css('color','black');
    $(this).css('color','#37c6f5');
    $('#sameAsBilling').attr('checked',false); 
  }
});

$('#shipping_addresses').on('click','.add_address',function(){

  $('#shipping_first_name').val('');
  $('#shipping_first_name').attr('placeholder','First Name*');
  $('#shipping_last_name').val('');
  $('#shipping_last_name').attr('placeholder','Last Name*');
  $('#shipping_company_name').val('');
  $('#shipping_company_name').attr('placeholder','company Name*');
  $('#shipping_email').val('');
  $('#shipping_email').attr('placeholder','Email Address*');
  $('#shipping_tel').val('');
  $('#shipping_tel').attr('placeholder',"Phone(without '91')*");
  $('#shipping_address').val('');
  $('#shipping_address').attr('placeholder','Address*');
  $('#shipping_appartment').val('');
  $('#shipping_appartment').attr('placeholder','Appartment, Suite etc.');
  $('#shipping_city').val('');
  $('#shipping_city').attr('placeholder','City / Town*');
  $('#shipping_district').val('');
  $('#shipping_district').attr('placeholder','District*');
  $('#shipping_pincode').val('');
  $('#shipping_pincode').attr('placeholder','Pincode / ZIP*');
  $('#change_shipping_address_div').show();
  $('#change_shipping_address').data('id',$(this).data('id'));
  $('#shipping_form').slideDown();
  if ((window.location.pathname).includes('checkout')) 
  {
    $('#shipping_addresses .set_address').css('color','black');
    $('#sameAsBilling').attr('checked',false);
  }
});

$('#sameAsBilling').on('change',function(){

  if($(this).is(':checked'))
  {
    populateShippingForm();
    $('#shipping_addresses .set_address').css('color','black');
  }

});

$('.account_page').click(function() {

 $.post(session_url, {user:"check_session"}).done(function (session_data) {

  if (session_data != 'false') 
  {
    window.location.href = 'account.php';
  }
  else
  {
    $('#login-modal').modal('show');
  }

 });
});

$('.cart_page').click(function() {
 $.post(session_url, {user:"check_session"}).done(function (session_data) {

  if (session_data != 'false') 
  {
    if ($('.aa-cart-notify').text() > 0) 
    {
      window.location.href = 'cart.php';
    }
    else
    {
      new PNotify({
        title: 'Status',
        text: 'Your cart is empty.',
        type: 'error',
        styling: 'bootstrap3'
      });
    }
  }
  else
  {
    $('#login-modal').modal('show');
  }

 });
});

$('.wishlist_page').click(function() {
 $.post(session_url, {user:"check_session"}).done(function (session_data) {

  if (session_data != 'false') 
  {

    $.post(wishlist_url, {action:'checkNumbers',user_email:session_data}).done(function (data) {

      if (data > 0) 
      {
       window.location.href = 'wishlist.php'; 
      }
      else
      {
        new PNotify({
          title: 'Status',
          text: 'Wishlist is empty.',
          type: 'error',
          styling: 'bootstrap3'
        });
      }

    });

    
  }
  else
  {
    $('#login-modal').modal('show');
  }

 });
});

$('#add_toCart').click(function() {

  var id = $(this).attr('data');
  var quan = $('#choose_quantity').val();

  if (isNaN(quan) || $.trim(quan) == '' || $.trim(quan) < 1) 
  {
      new PNotify({
        title: 'Status',
        text: 'Quantity should be a valid number.',
        type: 'error',
        styling: 'bootstrap3'
      });
  }
  else
  {
    if ($.trim(id) != '' || id != null) {
      $.post(session_url, {user:"check_session"}).done(function (session_data) {

        if (session_data != 'false') 
        {

            $.post(cart_url, {action:'add_bulk',card_id:id,quantity:quan,user_email:session_data}).done(function (data) {

              if (data == 'success') 
              {
                $('#card_box').load('./php/show_cart.php');
                new PNotify({
                  title: 'Status',
                  text: "Added to cart.",
                  type: 'success',
                  styling: 'bootstrap3'
                });
              }
              else
              {
                alert(data);
              }

            });      
        }
        else
        {
          $('#login-modal').modal('show');
        }
      }); 
    }
    else
    {
      new PNotify({
        title: 'Status',
        text: 'Slow connection! Retrieving data, Please wait...',
        type: 'success',
        styling: 'bootstrap3'
      });
    }
  }

});


$('#add_toWishlist').click(function() {



  var id = $(this).attr('data');
  button = $(this);

  $.post(session_url, {user:"check_session"}).done(function (session_data) {

    if (session_data != 'false') 
    {
      if ($.trim(button.text()) == 'Wishlist') 
      {
        $.post(wishlist_url, {action:'add',card_id:id,user_email:session_data}).done(function (data) {

          if (data == 'success') 
          {
            button.text('Remove From Wishlist');
          }
          else
          {
            alert(data);
          }

        });
      }
      else if ($.trim(button.text()) == 'Remove From Wishlist')
      {
        $.post(wishlist_url, {action:'remove',card_id:id,user_email:session_data}).done(function (data) {

          if (data == 'success') 
          {
            button.text('Wishlist');
          }
          else
          {
            alert(data);
          }

        });
      }
    }
    else
    {
      $('#login-modal').modal('show');
    }
  });
});

function initiateCcavenue() {

  var first_name = $('#billing_first_name').val();
  var last_name = $('#billing_last_name').val();
  var billing_name = first_name+' '+last_name;
  var billing_email = $('#billing_email').val();
  var billing_tel = $('#billing_tel').val();
  var billing_address = $('#billing_address').val();
  var billing_city = $('#billing_city').val();
  var billing_zip = $('#billing_pincode').val();
  var billing_amount = $('#cc_billing_amount').val();
  $('#user_phn_number').text(billing_tel.substring(6));

  $.post('../php/generate_production_url.php',{billing_name:billing_name,billing_email:billing_email,
    billing_city:billing_city,billing_address:billing_address,billing_amount:billing_amount,billing_tel:billing_tel,billing_zip:billing_zip},function(data){

      $('#ccPayment').html('<iframe src="'+data+'" id="paymentFrame" width="100%" height="600" frameborder="0" scrolling="No" ></iframe>');
      $('#ccPayment').height('600');

  });
}

$('#ccAvenue_radio').on('change',function() {

  $('#cod_div').hide();
  $('#ccPayment').show();

});

$('#cashOndelivery_radio').on('change',function() {

  $('#cod_div').show();
  $('#ccPayment').hide();

});

function send_otp()
{
  var mobile = $('#billing_tel').val();
  $.post('./php/sendSms.php',{action:'sendOTP',mobile:mobile},function(data){
    if (isNaN(data)) 
    {
      alert(data);
    }
    else
    {
      verify_otp = data;
      new PNotify({
        title: 'Status',
        text: 'OTP has been sent to your number!',
        type: 'success',
        styling: 'bootstrap3'
      });
    }

  });
}

$('#resend_otp_btn').click(function() {

  send_otp();
  $('#otp_timer_div').show();
  $('#resend_otp_btn').hide();
  $('#otp_timer').timer({
    countdown: true,
    duration: '3m30s',      // This will start the countdown from 3 mins 40 seconds
    callback: function() {  // This will execute after the duration has elapsed
      $('#otp_timer').timer('reset');
      $('#otp_timer_div').hide();
      $('#resend_otp_btn').show();
    }
  });


});

$('#cod_button').click(function() {

  send_otp();
  $('#cod_button').hide();
  $('#otp_div').show();
  $('#otp_timer_div').show();
  $('#resend_otp_btn').hide();
  $('#otp_timer').timer({
    countdown: true,
    duration: '3m30s',      // This will start the countdown from 3 mins 40 seconds
    callback: function() {  // This will execute after the duration has elapsed
      $('#otp_timer').timer('reset');
      $('#otp_timer_div').hide();
      $('#resend_otp_btn').show();
    }
  });

});

$('#verify_otp_btn').click(function() {

  if ($('#otp_code').val() == verify_otp) 
  {
    if (validateForm('billing_') && validateForm('shipping_')){

      var formData = $('#hidden_form').serializeArray();
      console.log(formData);

      $.post('./php/checkout.php',formData).done(function(data){

          if (data.includes('success')) 
          {
            data = data.split(",");
            var mobile = $('#billing_tel').val();
            var message = "Your order with order id '" + data[1] + "' has been successfully placed on 'cardpine.com'. Thank you!";
            $.post('./php/sendSms.php',{action:'sendDetails',mobile:mobile,message:message},function(data){});
            $('#prompt_order_id').text(data[1]);
            $('#prompt-success-modal').modal('show');
          }
          else
          {
            alert(data);
          }

      });
    }
  }
  else
  {
    new PNotify({
      title: 'Status',
      text: "OTP doesn't match!",
      type: 'error',
      styling: 'bootstrap3'
    });
  }



});

function handleRequest(responce) {

  $.post('./php/ccavResponseHandler.php',{encResp:responce},function(data){

    if ($.trim(data) == '-1') 
    {
      new PNotify({
        title: 'Status',
        text: 'Sorry! There was some technical error!',
        type: 'error',
        styling: 'bootstrap3'
      });
    }
    else if ($.trim(data) == '1') 
    {
      new PNotify({
        title: 'Status',
        text: 'Sorry! Your transaction has failed!',
        type: 'error',
        styling: 'bootstrap3'
      });
    }
    else if ($.trim(data) == '0') 
    {
      new PNotify({
        title: 'Status',
        text: 'Your order is canceled successfully!',
        type: 'success',
        styling: 'bootstrap3'
      });
    }
    else
    {

        var order_id = JSON.parse(data).order_id;
        var billing_email = JSON.parse(data).billing_email;
        var mobile = JSON.parse(data).billing_tel;
        var message = "Your order with order id '" + order_id + "' has been successfully placed on 'cardpine.com'. Thank you!";
        $.post('./php/checkout.php',{data:data}).done(function(data){
          if (data.includes('success')) 
          {
            $.post('./allow_me/invoice_generator/invoice_bill/bill.php',{order_id:order_id,user_email:billing_email});
            $.post('./php/sendSms.php',{action:'sendDetails',mobile:mobile,message:message},function(data){});
            $('#prompt_order_id').text(order_id);
            $('#prompt-success-modal').modal('show');
          }
          else
          {
            alert(data);
          }

        });

    }
  });
}

$('.generate_invoice_button').click(function(){
  window.open('./allow_me/pdf/invoices/invoice_'+$(this).data('order_id')+'.pdf','_blank');
});

$('.cancel_order_button').click(function(){
  var order_id = $(this).data('order_id');

  $.post('./allow_me/php/get_cancel_requests_data.php',{action:'initiate_cancel',order_id:order_id},function(data){
    if (data == 'success') 
    {
      new PNotify({
        title: 'Status',
        text: 'Your cancel request has been initiated! We will get back to you soon!',
        type: 'success',
        styling: 'bootstrap3'
      });
    }
    else
    {
      alert(data);
    }

  });
});

$('.track_order_button').click(function(){
  // alert($(this).data('order_id'));
});

function setTimePicker() {
    $('.time-picker').timepicker({
      timeFormat: 'h:mm p',
      interval: 30,
      defaultTime: '12',
      dynamic: false,
      dropdown: true,
      scrollbar: true
  });
}
  
function setDatePicker()
  {
    $('.date-picker').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    locale: {
        format: 'MMMM D, YYYY'
      },
    drops: 'down',
    calender_style: "picker_3"
  });
}
  

$('.card_details_marriage_of').on('change',function(){

  var val = $(this).val();
  if (val == 'other') 
  {
    $('#card_details_marriage_of_value').show();
    $('#card_details_marriage_of_value').val("");
  }
  else
  {
    $('#card_details_marriage_of_value').hide();
    $('#card_details_marriage_of_value').val(val);
    $('#card_details_marriage_of_value').trigger('change');
  }

});

$('#card_details_marriage_of_value').on('change',function() {
  
  var val = $(this).val();
  if (val == 'sons') 
  {
    $('.card_details_marriage_of_name').attr('placeholder','Your Son');
    $('.card_details_marriage_with_name').attr('placeholder','Your Daughter-in-law');
    $('#card_details_marriage_with').text('Daughter(s) ');
  }
  else if (val == 'daughters') 
  {
    $('.card_details_marriage_of_name').attr('placeholder','Your Daughter');
    $('.card_details_marriage_with_name').attr('placeholder','Your Son-in-law');
    $('#card_details_marriage_with').text('Son(s) ');
  }
  else if (val == 'both') 
  {
    $('.card_details_marriage_of_name').attr('placeholder','Your Son/Daughter');
    $('.card_details_marriage_with_name').attr('placeholder','Your Son/Daughter-in-law');
    $('#card_details_marriage_with').text('Son(s)/Daughter(s) ');
  }
  else
  {
    $('.card_details_marriage_of_name').attr('placeholder','Your '+val);
    $('.card_details_marriage_with_name').attr('placeholder','Your in-law');
    $('#card_details_marriage_with').text('Son(s)/Daughter(s) ');
  }

});

$('#card_details_add_couple').click(function(){

  val = $(this).data('count')+1;
  if (val <= 10) 
  {
    $('#card_details_couples_div').append('<div><div class="couples_div_inline"><input type="text" placeholder="Your Son" class="card_details_marriage_of_name" id="card_details_marriage_of_name_'+val+'" required="" class="parsley-success" data-parsley-id="302'+val+'" /><ul class="parsley-errors-list" id="parsley-id-302'+val+'"></ul></div><div class="couples_div_inline"> with </div><div class="couples_div_inline"><input type="text" class="card_details_marriage_with_name" placeholder="Your daughter-in-law" id="card_details_marriage_with_name_'+val+'" required="" class="parsley-success" data-parsley-id="303'+val+'" /><ul class="parsley-errors-list" id="parsley-id-303'+val+'"></ul></div><div class="couples_div_inline"><a class="remove remove_cart"><fa class="fa fa-close"></fa></a></div></div>');
    $(this).data('count',val);
  }
  
});

$('#card_details_add_event').click(function(){

  val = $(this).data('count')+1;
  if (val <= 4) 
  {
    $('#card_details_function_table tbody').append('<tr><td><a class="remove remove_cart"><fa class="fa fa-close"></fa></a></td><td><select id="card_details_function_name_'+val+'" ><option value="MEHENDIRAAT" >MEHENDIRAAT</option><option value="WALIMA" >WALIMA</option><option value="WITH BARAAT" >WITH BARAAT</option><option value="MASNANDNISHINI" >MASNANDNISHINI</option></td><td><input id="card_details_function_date_'+val+'" class="date-picker" type="text" required="" class="parsley-success" data-parsley-id="305'+val+'" ></td><td><div>gents : <input class="time-picker" type="text" id="card_details_function_gents_'+val+'" required="" class="parsley-success" data-parsley-id="306'+val+'" ></div><div>ladies : <input class="time-picker" type="text" id="card_details_function_ladies_'+val+'" required="" class="parsley-success" data-parsley-id="307'+val+'"></div></td><td>---</td><td>---</td></tr>');
    $(this).data('count',val);
    setTimePicker();
    setDatePicker();
  }
  
});


$('#card_details_couples_div').on('click','.remove',function(){

  $(this).parent().parent().remove();
  val = $('#card_details_add_couple').data('count')-1;
  $('#card_details_add_couple').data('count',val);

});

$('#card_details_function_table').on('click','.remove',function(){

  $(this).parent().parent().remove();
  val = $('#card_details_add_event').data('count')-1;
  val = $('#card_details_add_event').data('count',val);
});


function validateCardData() {
  
  
  var card_details_mr_mrs = $('#card_details_mr_mrs');
  var card_details_marriage_of_value = $('#card_details_marriage_of_value');
  var no_of_couples = $('#card_details_add_couple').data('count');
  var marriage_of_names = [];
  var marriage_with_names = [];
  var marriage_couples = '';

  for(var i = 1; i<= no_of_couples; i++)
  {
    marriage_of_names[i] = $('#card_details_marriage_of_name_'+i);
    marriage_with_names[i] = $('#card_details_marriage_with_name_'+i);
    marriage_couples = marriage_couples + marriage_of_names[i].val()+' with '+marriage_with_names[i].val()+' , ';
  }

  marriage_couples = marriage_couples.slice(0,-3);
  var card_details_marraige_with_fathers_name = $('#card_details_marraige_with_fathers_name');
  var card_details_residence = $('#card_details_residence');
  var no_of_events = $('#card_details_add_event').data('count');
  var function_data = ''; 

  for(var i = 1; i<= no_of_events; i++)
  {
    var function_name = $('#card_details_function_name_'+i);
    var function_date = $('#card_details_function_date_'+i);
    var function_gents = $('#card_details_function_gents_'+i);
    var function_ladies = $('#card_details_function_ladies_'+i);
    function_data = function_data + function_name.val()+' on Date = '+function_date.val()+' at gents time = '+function_gents.val()+' and ladies time = '+function_ladies.val()+' , ';
  }

  function_data = function_data.slice(0,-3);
  var card_details_rsvp = $('#card_details_rsvp');
  var card_details_best_compliments = $('#card_details_best_compliments');

  var check_marriage_of_name = true;
  var check_marriage_with_name = true;
  var check_function_date = true;
  var check_function_gents = true;
  var check_function_ladies = true;
  var check_labels_file = true;

  if($('#labels_checkbox').is(':checked'))
  {
    check_labels_file = $('#labels_file').parsley().validate() == true;
  }

  var check_best_compliments = card_details_best_compliments.parsley().validate() == true;
  var check_details_rsvp = card_details_rsvp.parsley().validate() == true;

  for(var i = 1; i<= no_of_events; i++)
  {
    check_function_ladies = check_function_ladies && ($('#card_details_function_ladies_'+i).parsley().validate() == true);
    check_function_gents = check_function_gents && ($('#card_details_function_gents_'+i).parsley().validate() == true);
    check_function_date = check_function_date && ($('#card_details_function_date_'+i).parsley().validate() == true);
    if (!check_function_date || !check_function_gents || !check_function_ladies) 
      break;
  }

  var check_residence = card_details_residence.parsley().validate() == true;
  var check_marraige_with_fathers_name = card_details_marraige_with_fathers_name.parsley().validate() == true;

  for(var i = 1; i<= no_of_couples; i++)
  {
    check_marriage_with_name = check_marriage_with_name && (marriage_with_names[i].parsley().validate() == true);
    check_marriage_of_name = check_marriage_of_name && (marriage_of_names[i].parsley().validate() == true);
    if (!check_marriage_of_name || !check_marriage_with_name) 
      break;
  }

  var check_marriage_of_value = card_details_marriage_of_value.parsley().validate() == true;
  var check_mr_mrs = card_details_mr_mrs.parsley().validate() == true;

  if (check_mr_mrs && check_function_date && check_function_gents && check_function_ladies && check_labels_file && check_marriage_of_value && check_marraige_with_fathers_name && check_residence && check_details_rsvp && check_best_compliments && check_marriage_of_name && check_marriage_with_name) 
  {
    $('#check_card_details_couples_div').html('');
    $('#check_card_details_function_table tbody').html('');
    $('#full_card_details').val(card_details_mr_mrs.val()+' :: '+card_details_marriage_of_value.val()+' :: '+marriage_couples+' :: '+card_details_marraige_with_fathers_name.val()+' ::  '+card_details_residence.val()+' :: '+function_data+' :: '+card_details_rsvp.val()+' :: '+card_details_best_compliments.val());
    $('#check_mr_mrs').text(card_details_mr_mrs.val());
    $('#check_mairrage_of_relation').text(card_details_marriage_of_value.val());

    for(var i = 1; i<= no_of_couples; i++)
    {
      $('#check_card_details_couples_div').append('<div><div class="couples_div_inline">'+$('#card_details_marriage_of_name_'+i).val()+'</div><div class="couples_div_inline"> with </div><div class="couples_div_inline">'+$('#card_details_marriage_with_name_'+i).val()+'</div>');
    }

    $('#check_marriage_with_mr_mrs').text('Son(s)/Daughter(s) of '+card_details_marraige_with_fathers_name.val()+' respectively');
    $('#check_residence').text(card_details_residence.val());

    for(var i = 1; i<= no_of_events; i++)
    {
      $('#check_card_details_function_table tbody').append('<tr><td>'+$('#card_details_function_name_'+i).val()+'</td><td>'+$('#card_details_function_date_'+i).val()+'</td><td><div>gents : '+$('#card_details_function_gents_'+i).val()+'</div><div>ladies : '+$('#card_details_function_ladies_'+i).val()+'</div></td><td>---</td><td>---</td></tr>');
    }

    $('#check_rsvp').html('R.S.V.P<br/><div>'+card_details_rsvp.val()+'</div>');
    $('#check_compliments').html('With best compliments<br/><div>'+card_details_best_compliments.val()+'</div>');
    $('#check_labels_file').text('');



    if($('#labels_checkbox').is(':checked'))
    {
      $('#check_labels_file').text($("#labels_file").val())
      var formData = new FormData();
      formData.append('labels_file', $("#labels_file")[0].files[0]);

      $.ajax({
        url: "./php/sessions.php",
        type : "POST",
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
      });

    }
    var formData = $('#hidden_form').serializeArray();
    $.post('./php/sessions.php',formData);
    console.log(formData);
    return true;
  }
  else
  {
    return false;
  }

}

$('body').on('click','.cart_box_checkout',function(){ 


 $.post(session_url, {user:"check_session"}).done(function (session_data) {

  if (session_data != 'false') 
  {
    if ($('.aa-cart-notify').text() > 0) 
    {
      window.location.href = 'checkout.php';
    }
    else
    {
      new PNotify({
        title: 'Status',
        text: 'Your cart is empty.',
        type: 'error',
        styling: 'bootstrap3'
      });
    }
  }
  else
  {
    $('#login-modal').modal('show');
  }

 });

});

$('body').on('click','#cart_box_btn',function(){ 


 $.post(session_url, {user:"check_session"}).done(function (session_data) {

  if (session_data != 'false') 
  {
    if ($('.aa-cart-notify').text() > 0) 
    {
      window.location.href = 'cart.php';
    }
    else
    {
      new PNotify({
        title: 'Status',
        text: 'Your cart is empty.',
        type: 'error',
        styling: 'bootstrap3'
      });
    }
  }
  else
  {
    $('#login-modal').modal('show');
  }

 });

});


$('#change_profile_details').click(function(){

  $('#profile_update_error').hide();

  if ($('#username_input').parsley().validate() == true) 
  {
    if ($.trim($('#new_password_input').val()) != "")
    {
      if ($('#old_password_input').parsley().validate() == true)
      {

        var oldPassword = $('#old_password_input').val();
        var newPassword = $('#new_password_input').val();
        var user_email = $('#useremail_input').val();
        var user_name = $('#username_input').val();

        $.post('./php/manage_account.php',{action:'changePassword',oldPassword:oldPassword,user_email:user_email,user_name:user_name,newPassword:newPassword}).done(function(data){
          if (data == 'success') 
          {
             window.location.reload();
          }
          else
          {
            $('#profile_update_error').text(data);
            $('#profile_update_error').slideDown();
          }
        });
        
      }
    }
    else
    {

      var user_email = $('#useremail_input').val();
      var user_name = $('#username_input').val();

      $.post('./php/manage_account.php',{action:'changeUsername',user_email:user_email,user_name:user_name}).done(function(data){
        if (data == 'success') 
        {
           window.location.reload();
        }
        else
        {
          alert(data);
        }
      });

    }
  }
});


$('#order_history_btn').click(function(){

  $('#order_history_div').show();
  $('#my_profile_div').hide();
  $('.sub_menu_account').removeClass('active');
  $(this).addClass('active');

});

$('#my_profile_btn').click(function(){

  $('#order_history_div').hide();
  $('#my_profile_div').show();
  $('.sub_menu_account').removeClass('active');
  $(this).addClass('active');
  
});

$('#change_shipping_address').click(function(){

  if(validateForm('shipping_'))
  {
    var shipping_address = $('#full_shipping_address').val();
    var user_email = $('#userEmail').val();
    var id = $(this).data('id');
    $.post('./php/manage_account.php',{action:'editShipping',SAddress:shipping_address,user_email:user_email,id:id}).done(function(data){
      if (data == 'success') 
      {
         window.location.reload();
      }
      else
      {
        alert(data);
      }
    });
  }

});

$('#change_billing_address').click(function(){

  if(validateForm('billing_'))
  {
    var billing_address = $('#full_billing_address').val();
    var user_email = $('#userEmail').val();
    var id = $(this).data('id');
    $.post('./php/manage_account.php',{action:'editBilling',BAddress:billing_address,user_email:user_email,id:id}).done(function(data){
      if (data == 'success') 
      {
         window.location.reload();
      }
      else
      {
        alert(data);
      }
    });
  }

});

$('.set_default_shipping_address').click(function(){

  var user_email = $('#userEmail').val();
  var id = $(this).data('id');
  $.post('./php/manage_account.php',{action:'default',user_email:user_email,id:id,column:'shipping'}).done(function(data){
      if (data == 'success') 
      {
         window.location.reload();
      }
      else
      {
        alert(data);
      }
  });

});

$('.delete_shipping_address').click(function(){

  var user_email = $('#userEmail').val();
  var id = $(this).data('id');
  var default_id = $('.shipping_default_btn').data('id');
  if (id == default_id) 
  {
    new PNotify({
      title: 'Status',
      text: 'Please set another address as default first.',
      type: 'error',
      styling: 'bootstrap3'
    });
  }
  else
  {
    $.post('./php/manage_account.php',{action:'delete',user_email:user_email,id:id,column:'shipping'}).done(function(data){
      if (data == 'success') 
      {
         window.location.reload();
      }
      else
      {
        alert(data);
      }
    });
  }

});

$('.set_default_billing_address').click(function(){

  var user_email = $('#userEmail').val();
  var id = $(this).data('id');
  $.post('./php/manage_account.php',{action:'default',user_email:user_email,id:id,column:'billing'}).done(function(data){
      if (data == 'success') 
      {
         window.location.reload();
      }
      else
      {
        alert(data);
      }
  });

});

$('.delete_billing_address').click(function(){

  var user_email = $('#userEmail').val();
  var id = $(this).data('id');
  var default_id = $('.billing_default_btn').data('id');
  if (id == default_id) 
  {
    new PNotify({
      title: 'Status',
      text: 'Please set another address as default first.',
      type: 'error',
      styling: 'bootstrap3'
    });
  }
  else
  {
    $.post('./php/manage_account.php',{action:'delete',user_email:user_email,id:id,column:'billing'}).done(function(data){
      if (data == 'success') 
      {
         window.location.reload();
      }
      else
      {
        alert(data);
      }
    });
  }

});

$('#labels_checkbox').on('change',function(){

  if($(this).is(':checked'))
  {
    $('#upload_labels_div').show();
  }
  else
  {
    $('#upload_labels_div').hide();
  }

});

$(".filter_products").click(function(){

  var filterData = $(this).data('filter_data');
  var filterType = $(this).data('filter_type');

  window.location.href = "?"+filterType+"="+filterData;

});


$("#search_btn").click(function(){

  var loc = window.location.pathname;

    if ($.trim($('#search_text').val()) == '') 
    {
      new PNotify({
        title: 'Status',
        text: "Search field can't be empty",
        type: 'error',
        styling: 'bootstrap3'
      });
    }
    else
    {
      $('#search_form').submit();
    }


});

$("#send_contact_details").click(function(){

  if ($('#contact_us_form').parsley().validate()) 
  {
    var formData = $('#contact_us_form').serializeArray();

    $.post('./php/contact_us.php',formData).done(function(data){

      if (data == 'success') 
      {
        $('#contact_us_form')[0].reset();
        new PNotify({
          title: 'Status',
          text: "Thank you. We will get to you soon.",
          type: 'success',
          styling: 'bootstrap3'
        });
      }
      else
      {
        alert(data);
      }

    });

  }

});


$("#prompt-success-modal").on("hidden.bs.modal", function () {
  window.location.href = 'index.php';
});

$("#submit_review").on("click", function () {
  
  $.post(session_url, {user:"check_session"}).done(function (session_data) {

    if (session_data != 'false') 
    {
      if ($('#review_form').parsley().validate()) 
      {
        var formData = $('#review_form').serializeArray();

        $.post('./php/review_card.php',formData).done(function(data){

          if (data == 'success') 
          {
            new PNotify({
              title: 'Status',
              text: "Your review was submitted successfully.",
              type: 'success',
              styling: 'bootstrap3'
            });
            setInterval(function(){ window.location.reload(); }, 1000);
          }
          else
          {
            alert(data);
          }

        });
      }
    }
    else
    {
      $('#login-modal').modal('show');
    }
  });

});




