var url = "./php/user_login_register.php";
var session_url = "./php/sessions.php";
var wishlist_url = "./php/wishlist.php";
var cart_url = "./php/cart.php";


$(document).ready(function() {

  var loc = window.location.pathname;



  if (loc.includes("checkout")) {
    $('#wizard').smartWizard();

    $('.buttonNext').addClass('btn btn-success');
    $('.buttonPrevious').addClass('btn btn-primary');
    $('.buttonFinish').addClass('btn btn-success');
  }
  
  if (loc.includes("my_account")) {
    $('#wizard').smartWizard();

    $('.buttonNext').remove();
    $('.buttonPrevious').remove();
    $('.buttonFinish').remove();

    window.Parsley.on('field:error', function() {
      $(this.$element).focus();
    });
      window.Parsley.addValidator('fileextension', function (value, requirement) {
    // the value contains the file path, so we can pop the extension
    var fileExtension = value.split('.').pop();
    var extent = requirement.split(" ");

    return fileExtension === extent[0] || fileExtension === extent[1] || fileExtension === extent[2] || fileExtension === extent[3] || fileExtension === extent[4] || fileExtension === extent[5];
  }, 32).addMessage('en', 'fileextension', 'The extension doesn\'t match the required');

  }

    

  var auth2;

  gapi.load('auth2', function(){
    // Retrieve the singleton for the GoogleAuth library and set up the client.
    auth2 = gapi.auth2.init({
      client_id: '1011628870832-pqdk605vshh3ftsf1ifdli1nthiosmlp.apps.googleusercontent.com',
      cookiepolicy: 'single_host_origin',
    });

    if (loc.includes("register")) {
    attachSignin(document.getElementById('gmail_btn'));
  }
    
  });


  function attachSignin(element) {

    auth2.attachClickHandler(element, {},
        function(googleUser) {

          var profile = googleUser.getBasicProfile();
          var user_name = profile.getName();
          var user_email = profile.getEmail();
          

          $.post(url, {from:"gmail",fullname:user_name,email:user_email}).done(function (data) {

            

              if ($.trim(data) == 'success') 
              {
                $.post(session_url, {user:"gmail",email:user_email}).done(function (session_data) {

                  if ($.trim($.trim(session_data)) == 'success') 
                  {
                    window.location.herf = 'index.php';
                  }
                  else
                  {
                    alert($.trim(session_data));
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

            if ($.trim(data) == 'success') 
            {
              $.post(session_url, {user:"facebook",email:response.email}).done(function (session_data) {

                if ($.trim($.trim(session_data)) == 'success') 
                {
                  window.location.herf = 'index.php';
                }
                else
                {
                  alert($.trim(session_data));
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

$('.add_toCart').click(function() {

  var quan;
  var loc = window.location.pathname;

  if(loc.includes("SingleProductDetails"))
  {
    quan = $('#quantity').val();
  }
  else
  {
    quan = 1;
  }


  var id = $(this).data('id');

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

        if ($.trim($.trim(session_data)) != 'false') 
        {
            $.post(cart_url, {action:'add',item_id:id,quantity:quan,user_email:$.trim(session_data)}).done(function (data) {

              if (data.includes('success')) 
              {
                // $('#card_box').load('./php/show_cart.php');
                new PNotify({
                  title: 'Status',
                  text: "Added to cart.",
                  type: 'success',
                  styling: 'bootstrap3'
                });

                $('.number').text(data.split(',')[1])
              }
              else
              {
                alert(data);
              }

            });      
        }
        else
        {
          window.location.href = "register.php";
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

$('.add-to-wishlist').click(function() {

  var id = $(this).data('id');

  if ($.trim(id) != '' || id != null) {
    $.post(session_url, {user:"check_session"}).done(function (session_data) {

      if ($.trim(session_data) != 'false') 
      {

          $.post(wishlist_url, {action:'add',item_id:id,user_email:$.trim(session_data)}).done(function (data) {

            if ($.trim(data)) 
            {
              new PNotify({
                title: 'Status',
                text: $.trim(data),
                type: 'success',
                styling: 'bootstrap3'
              });
            }
            else
            {
              alert($.trim(data));
            }

          });      
      }
      else
      {
        window.location.href = "register.php";
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

});


$("#create_account").click(function(){


  var formData = $("#register-form").serializeArray();
  $.post(url, formData).done(function (data) {

    if ($.trim(data) == 'success') 
    {
      $.post(session_url, {user:"main",email:formData[1].value}).done(function (session_data) {

        if ($.trim($.trim(session_data)) == 'success') 
        {
          window.location.herf = 'index.php';
        }
        else
        {
          alert($.trim(session_data));
        }
      });
    }
    else
    {
      new PNotify({
        title: 'Status',
        text: data,
        type: 'error',
        styling: 'bootstrap3'
      });
    }

  });
});

$('#login_btn').click(function(){

    var formData = $("#login_form").serializeArray();
    console.log(formData);
    $.post(url, formData).done(function (data) {

      if ($.trim(data) == 'success') 
      {
        $.post(session_url, {user:"main",email:formData[1].value}).done(function (session_data) {

          if ($.trim($.trim(session_data)) == 'success') 
          {
            alert('hey');
            window.location.herf = 'index.php';
          }
          else
          {
            alert($.trim(session_data));
          }
        }); 
      }
      else
      {
        PNotify.removeAll();
        new PNotify({
          title: 'Status',
          text: data,
          type: 'error',
          styling: 'bootstrap3'
        });
      }

    });
});

$('#forgot_password').click(function(){

    var user_email = $.trim($("#customer_email").val());
    if(user_email === '' || user_email === null)
    {
      new PNotify({
        title: 'Status',
        text: 'Please fill in the email feild first!!',
        type: 'error',
        styling: 'bootstrap3'
      });
    }
    else
    {
      $.post(url, {user_email:user_email}).done(function (data) {

        if ($.trim(data) === 'success') 
        {
          new PNotify({
            title: 'Status',
            text: 'Your new password has been sent to your mail. Thank You',
            type: 'success',
            styling: 'bootstrap3'
          });
        }
        else
        {
          new PNotify({
            title: 'Status',
            text: data,
            type: 'error',
            styling: 'bootstrap3'
          });
        }

      });
    }
});


$("#qty-up").click(function (){
  var val = $("#quantity").val();
  val++;
  $("#quantity").val(val);
});

$("#qty-down").click(function (){
  var val = $("#quantity").val();
  val--;
  if(val<0)
    val = 0
  $("#quantity").val(val);
});


$(".qty-up-cart").click(function (){
  var id = $(this).data('id');
  var val = $("#quantity_"+id).val();
  val++;
  $.post(session_url, {user:"check_session"}).done(function (session_data) {

    if ($.trim(session_data) != 'false') 
    {

        $.post(cart_url, {action:'update',item_id:id,total_quantity:val,user_email:$.trim(session_data)}).done(function (data) {

          if ($.trim(data) == 'success') 
          {
            $("#quantity_"+id).val(val);
            var productPrice = $("#product_price_"+id).text().substring(1);
            var totalPrice = val * productPrice;
            $("#product_total_"+id).text(totalPrice);
            var subTotal = $("#subTotal").text();
            subTotal = parseInt(subTotal) + parseInt(productPrice);
            $("#subTotal").text(subTotal);
          }
          else
          {
            new PNotify({
              title: 'Status',
              text: "Something went wrong.",
              type: 'error',
              styling: 'bootstrap3'
            });
          }

        });      
    }
    else
    {
      window.location.href = "register.php";
    }
  });
  
});

$(".qty-down-cart").click(function (){
  var id = $(this).data('id');
  var val = $("#quantity_"+id).val();
  val--;
  if(val<0)
    val = 0
  $.post(session_url, {user:"check_session"}).done(function (session_data) {

    if ($.trim(session_data) != 'false') 
    {

        $.post(cart_url, {action:'update',item_id:id,total_quantity:val,user_email:$.trim(session_data)}).done(function (data) {

          if ($.trim(data) == 'success') 
          {
            $("#quantity_"+id).val(val);
            var productPrice = $("#product_price_"+id).text().substring(1);
            var totalPrice = val * productPrice;
            $("#product_total_"+id).text(totalPrice);
            var subTotal = $("#subTotal").text();
            subTotal = parseInt(subTotal) - parseInt(productPrice);
            if (subTotal < 0)
              subTotal = 0
            $("#subTotal").text(subTotal);
          }
          else
          {
            new PNotify({
              title: 'Status',
              text: "Something went wrong.",
              type: 'error',
              styling: 'bootstrap3'
            });
          }

        });      
    }
    else
    {
      window.location.href = "register.php";
    }
  }); 
  
});


$(".remove_from_cart").click(function (){
  var id = $(this).data('id');
  $.post(session_url, {user:"check_session"}).done(function (session_data) {

    if ($.trim(session_data) != 'false') 
    {

        $.post(cart_url, {action:'remove',item_id:id,user_email:$.trim(session_data)}).done(function (data) {

          if ($.trim(data) == 'success') 
          {
            var totalPrice = $("#product_total_"+id).text();
            var subTotal = $("#subTotal").text();
            subTotal = parseInt(subTotal) - parseInt(totalPrice);
            if (subTotal < 0)
              subTotal = 0
            $("#subTotal").text(subTotal);
            $("#cart_row_"+id).remove();
            if (subTotal = 0)
              window.location.href = "index.php"
          }
          else
          {
            new PNotify({
              title: 'Status',
              text: "Something went wrong.",
              type: 'error',
              styling: 'bootstrap3'
            });
          }

        });      
    }
    else
    {
      window.location.href = "register.php";
    }
  });
  
});


function validateForm(form) {

  var name = $('#'+form+'name');
  var email = $('#'+form+'email');
  var tel = $('#'+form+'tel');
  var address = $('#'+form+'address');
  var city = $('#'+form+'city');
  var landmark = $('#'+form+'landmark');
  var district = $('#'+form+'district');

  var check_name = name.parsley().validate() == true;
  var check_email = email.parsley().validate() == true;
  var check_tel = tel.parsley().validate() == true;
  var check_address = address.parsley().validate() == true;
  var check_landmark = landmark.parsley().validate() == true;
  var check_district = district.parsley().validate() == true;


  if (check_name && check_email && check_tel && check_address && check_landmark && check_district) 
  {
    $('#full_'+form+'address').val(name.val()+';'+email.val()+';'+tel.val()+';'+address.val()+','+landmark.val()+','+district.val());
    return true;
  }
  else
  {
    return false;
  }
}

$("#account_password_confirm").bind("keyup change", function(e) {
  if($.trim($(this).val()) === $.trim($("#account_password").val()))
  {
    $("#update_account_details").prop("disabled",false);
  }
  else
  {
    $("#update_account_details").prop("disabled",true);
  }
});

$("#update_account_details").on('click',function(){

  let account_email = $('#account_email').val();
  let account_password = $('#account_password').val();
  $.post(url, {from:'update',account_email:account_email,account_password:account_password}).done(function (data) {

    if (data == 'success') 
    {
      new PNotify({
        title: 'Status',
        text: 'Your password has been changed successfully.',
        type: 'success',
        styling: 'bootstrap3'
      });
    }
    else
    {
      new PNotify({
        title: 'Status',
        text: data,
        type: 'error',
        styling: 'bootstrap3'
      });
    }

  });

});

$("#open_cart_dialog").on("click", function () {
  alert('inside get item');
  var send_id = $(this).data('id'); 
     
  $.post('cartDialog.php',{prod_id:send_id},function(data){
      data = JSON.parse(data);
      console.log(data.item_name);
      $("#qs-product-title").text(data.item_name);
      $("#qs-product-image").attr('src','admin/images/' + data.item_ist_view);
      $("#qs-product-description").text(data.item_desc);
      $("#qs-product-type").text(data.item_main_category);
      $("#qs-product-price").text(data.item_price);

  });
});





