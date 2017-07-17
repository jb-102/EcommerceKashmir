var url = "./php/user_login_register.php";
var session_url = "./php/sessions.php";
var wishlist_url = "./php/wishlist.php";
var cart_url = "./php/cart.php";


$(document).ready(function() {

  function get_item_id(productid){
        
        var send_id = productid ; 
           
        $.post('cartDialog.php',{prod_id:send_id},function(data){
            data = JSON.parse(data);
            console.log(data.item_name);
            $("#qs-product-title").text(data.item_name);
            $("#qs-product-image").attr('src','admin/images/' + data.item_ist_view);
            $("#qs-product-description").text(data.item_desc);
            $("#qs-product-type").text(data.item_main_category);
            $("#qs-product-price").text(data.item_price);

        });

  }

  var auth2;

  gapi.load('auth2', function(){
    // Retrieve the singleton for the GoogleAuth library and set up the client.
    auth2 = gapi.auth2.init({
      client_id: '1011628870832-pqdk605vshh3ftsf1ifdli1nthiosmlp.apps.googleusercontent.com',
      cookiepolicy: 'single_host_origin',
    });
    attachSignin(document.getElementById('gmail_btn'));
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

        if (session_data != 'false') 
        {

            $.post(cart_url, {action:'add',item_id:id,quantity:quan,user_email:session_data}).done(function (data) {

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

      if (session_data != 'false') 
      {

          $.post(wishlist_url, {action:'add',item_id:id,user_email:session_data}).done(function (data) {

            if (data) 
            {
              new PNotify({
                title: 'Status',
                text: data,
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
<<<<<<< HEAD
=======

$(".qty-up-cart").click(function (){
  var id = $(this).data('id');
  var val = $("#quantity_"+id).val();
  val++;
  $.post(session_url, {user:"check_session"}).done(function (session_data) {

    if (session_data != 'false') 
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

    if (session_data != 'false') 
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

    if (session_data != 'false') 
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

