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

});



$('.add_toCart').click(function() {

  var quan;
  var loc = window.location.pathname;

  if(loc.includes("SingleProductDetails"))
  {
    quan = $('#choose_quantity').val();
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
    alert(id);
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

});


$("#create_account").click(function(){


  alert('hey');
  var formData = $("#register-form").serializeArray();
  $.post(url, formData).done(function (data) {

    if ($.trim(data) == 'success') 
    {
      $.post(session_url, {user:"main",email:formData[1].value}).done(function (session_data) {

        if ($.trim(session_data) == 'success') 
        {
          window.location.reload();
        }
        else
        {
          new PNotify({
            title: 'Status Sessions',
            text: session_data,
            type: 'error',
            styling: 'bootstrap3'
          });
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


$("#loginBtn").click(function(){


  alert('hey');
  var formData = $("#customer_login-form").serializeArray();
  $.post(url, formData).done(function (data) {

    if ($.trim(data) == 'success') 
    {
      $.post(session_url, {user:"main",email:formData[1].value}).done(function (session_data) {

        if ($.trim(session_data) == 'success') 
        {
          window.location.reload();
        }
        else
        {
          new PNotify({
            title: 'Status Sessions',
            text: session_data,
            type: 'error',
            styling: 'bootstrap3'
          });
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

