var initalized_slider,initalized_main_category,initalized_tiles,initalized_sub_category,initalized_category,initalized_orders,initalized_card,initalized_products,initalized_cancel_requests,initalized_user_order_details;

var main_category_options,category_options,sub_category_options,cardDatatable,sliderDatatable,tilesDatatable,mainCategoryDatatable,categoryDatatable,subCategoryDatatable,productsDatatable,cancel_requestDatatable,on_home,user_detailsDatatable;

$(document).ready(function() {

  window.ParsleyValidator
      .addValidator('fileextension', function (value, requirement) {
          // the value contains the file path, so we can pop the extension
          var fileExtension = value.split('.').pop();
          var extent = requirement.split(" ");

          return fileExtension === extent[0] || fileExtension === extent[1];
      }, 32)
      .addMessage('en', 'fileextension', 'The extension doesn\'t match the required');

  $("#card_form").parsley();
  $("#testimonial_form").parsley();

  window.ParsleyValidator
      .addValidator('dropdown', function (value, requirement) {
          // the value contains the file path, so we can pop the extension
          if (requirement) 
          {
            return value != -1;
          }

      }, 32)
      .addMessage('en', 'dropdown', 'Please select a valid option');

  $("#card_form").parsley();
  $("#testimonial_form").parsley();



  $.post("./php/getOptions.php",{action:"mainCategories"}).done(function(data){

    $("#main_category").html(data);

  });


});

$('#add_slider').click(function() {

    if (!initalized_slider) 
    {
      init_slider();
      initalized_slider = true;
    }
    else
    {
      sliderDatatable.ajax.reload();
    }
    $(".link").removeClass('active');
    $("#home_nav .link").addClass('active');

    $("#content_main").slideUp();

    if($("#content_add").is(':visible') && $("#slider_div").is(':visible'))
    {
      $("#content_add").slideUp();
    }
    else if($("#content_add").is(':visible') && $("#slider_div").is(':hidden'))
    {
      $("#slider_div").slideDown();
      $("#tiles_div").slideUp();
      $("#item_div").slideUp();
      $("#main_category_div").slideUp();
    }
    else
    {
      $("#content_add").slideDown();
      $("#slider_div").slideDown();
      $("#tiles_div").slideUp();
      $("#item_div").slideUp();
      $("#main_category_div").slideUp();
    }
});

$('#add_tile').click(function() {

    if (!initalized_tiles) 
    {
      init_tiles();
      initalized_tiles = true;
    }
    else
    {
      tilesDatatable.ajax.reload();
    }

    $(".link").removeClass('active');
    $("#home_nav .link").addClass('active');

    $("#content_main").slideUp();

    if($("#content_add").is(':visible') && $("#tiles_div").is(':visible'))
    {
      $("#content_add").slideUp();
    }
    else if($("#content_add").is(':visible') && $("#item_div").is(':hidden'))
    {
      $("#tiles_div").slideDown();
      $("#slider_div").slideUp();
      $("#item_div").slideUp();
      $("#main_category_div").slideUp();
    }
    else
    {
      $("#content_add").slideDown();
      $("#tiles_div").slideDown();
      $("#slider_div").slideUp();
      $("#item_div").slideUp();
      $("#main_category_div").slideUp();
    }
});

$('#add_item').click(function() {

    $(".link").removeClass('active');
    $("#home_nav .link").addClass('active');

    $("#content_main").slideUp();

    if($("#content_add").is(':visible') && $("#item_div").is(':visible'))
    {
      $("#content_add").slideUp();
    }
    else if($("#content_add").is(':visible') && $("#item_div").is(':hidden'))
    {
      $("#item_div").slideDown();
      $("#tiles_div").slideUp();
      $("#slider_div").slideUp();
      $("#main_category_div").slideUp();
    }
    else
    {
      $("#content_add").slideDown();
      $("#item_div").slideDown();
      $("#tiles_div").slideUp();
      $("#slider_div").slideUp();
      $("#main_category_div").slideUp();
    }
});

$('#add_main_category').click(function() {

    $(".link").removeClass('active');
    $("#home_nav .link").addClass('active');

    $("#content_main").slideUp();

    if($("#content_add").is(':visible') && $("#main_category_div").is(':visible'))
    {
      $("#content_add").slideUp();
    }
    else if($("#content_add").is(':visible') && $("#main_category_div").is(':hidden'))
    {
      $("#main_category_div").slideDown();
      $("#tiles_div").slideUp();
      $("#item_div").slideUp();
      $("#slider_div").slideUp();
    }
    else
    {
      $("#content_add").slideDown();
      $("#main_category_div").slideDown();
      $("#tiles_div").slideUp();
      $("#item_div").slideUp();
      $("#slider_div").slideUp();
    }
});

$("#home_nav").click(function(){

    $(".link").removeClass('active');
    $("#home_nav .link").addClass('active');
    $("#content_main").slideUp();
    $("#content_add").slideUp();
});

$("#main_category_nav").click(function(){

    if (!initalized_main_category) 
    {
      init_main_category();
      initalized_main_category = true;
    }
    else
    {
      mainCategoryDatatable.ajax.reload();
    }

    $(".link").removeClass('active');
    $("#main_category_nav .link").addClass('active');
    $("#content_main").slideDown();
    $("#orders_div").slideUp();
    $("#user_order_details_div").slideUp();
    $("#category_div").slideDown();
    $("#edit_item_div").slideUp();
    $("#products_div").slideUp();
    $("#testimonials_div").slideUp();
    $("#content_add").slideUp();
    $("#cancel_requests_div").slideUp();
});

$("#category_nav").click(function(){

    if (!initalized_category) 
    {
      init_category();
      initalized_category = true;
    }
    else
    {
      categoryDatatable.ajax.reload();
    }

    $(".link").removeClass('active');
    $("#category_nav .link").addClass('active');
    $("#content_main").slideDown();
    $("#user_order_details_div").slideUp();
    $("#orders_div").slideUp();
    $("#products_div").slideUp();
    $("#category_div").slideUp();
    $("#cancel_requests_div").slideUp();
    $("#edit_item_div").slideDown();
    $("#testimonials_div").slideUp();
    $("#content_add").slideUp();
});

$("#sub_category_nav").click(function(){

    if (!initalized_sub_category) 
    {
      init_sub_category();
      initalized_sub_category = true;
    }
    else
    {
      subCategoryDatatable.ajax.reload();
    }

    $(".link").removeClass('active');
    $("#sub_category_nav .link").addClass('active');
    $("#content_main").slideDown();
    $("#products_div").slideUp();
    $("#user_order_details_div").slideUp();
    $("#orders_div").slideUp();
    $("#category_div").slideUp();
    $("#cancel_requests_div").slideUp();
    $("#edit_item_div").slideUp();
    $("#testimonials_div").slideDown();
    $("#content_add").slideUp();
}); 

$("#products_nav").click(function(){

    if (!initalized_products) 
    {
      init_products();
      initalized_products = true;
    }
    else
    {
      productsDatatable.ajax.reload();
    }

    $(".link").removeClass('active');
    $("#products_nav .link").addClass('active');
    $("#products_div").slideDown();
    $("#user_order_details_div").slideUp();
    $("#cancel_requests_div").slideUp();
    $("#orders_div").slideUp();
    $("#content_main").slideDown();
    $("#category_div").slideUp();
    $("#edit_item_div").slideUp();
    $("#testimonials_div").slideUp();
    $("#content_add").slideUp();
});

$("#edit_orders_nav").click(function(){

    if (!initalized_orders) 
    {
      init_orders();
      initalized_orders = true;
    }
    else
    {
      ordersDatatable.ajax.reload();
    }

    $(".link").removeClass('active');
    $("#edit_orders_nav .link").addClass('active');
    $("#orders_div").slideDown();
    $("#products_div").slideUp();
    $("#user_order_details_div").slideUp();
    $("#cancel_requests_div").slideUp();
    $("#content_main").slideDown();
    $("#category_div").slideUp();
    $("#edit_card_div").slideUp();
    $("#testimonials_div").slideUp();
    $("#content_add").slideUp();
});
 

$("#logout_button").click(function(){
    $.post('./php/admin_sessions.php',{admin:'logout'}).done(function(data){

      if (data == 'success') 
      {
        window.location.href = "index.php";
      }
      else
      {
        alert(data);
      }

    });
});

$(document).ready(function() {

    autosize($('.resizable_textarea'));
    getCategoryOptions();
    getMainCategoryOptions();
    getSubCategoryOptions();
    initalized_slider = false;
    initalized_products = false;
    initalized_sub_category = false;
    initalized_card = false;
    initalized_main_category = false;
    initalized_cancel_requests = false;
    initalized_products = false;
    initalized_user_order_details = false;
});

function getMainCategoryOptions() {

    $.post("./php/getOptions.php",{action:"mainCategoriesOptions"},function(data){

      main_category_options = data;

    },"json");
}

function getCategoryOptions() {

    $.post("./php/getOptions.php",{action:"itemCategoriesOptions"},function(data){

      category_options = data;

    },"json");
}

function getSubCategoryOptions() {

    $.post("./php/getOptions.php",{action:"subCategoriesOptions"},function(data){

      sub_category_options = data;

    },"json");
}

function init_slider(){

    sliderDatatable = $('#slider_datatable-responsive').DataTable({
        dom: "Bfrtip",
        ajax: "./php/get_slider_data.php",
        columns: [
            { 
              title: "SLIDER ID",
              data: "slider_id",
              type: "readonly"
              
            },
            { 
              title: "SLIDER TEXT",
              data: "slider_text",
              type: "text"
            },
            { 
              title: "SLIDER IMAGE",
              data: "slider_image",
              type: "file"
            },
            { 
              title: "STATUS",
              data: "slider_status",
              type:  "select",
              options: [
                  { label: "Select", value: "-1" },
                  { label: "published", value: "published" },
                  { label: "unpublished", value: "unpublished" } 
                ]
            }
        ],
        order: [ 0, 'asc' ],
        altEditor: true,
        responsive: true,
        select: {
          style: 'os',
          blurable: true
        },
         buttons: [
            {
              text: 'Add',
              name: 'add'        // do not change name
            },
            {
              extend: 'selected', // Bind to Selected row
              text: 'Edit',
              name: 'edit'        // do not change name
            }
          ]
    });
}

function init_main_category(){

    mainCategoryDatatable = $('#main_category_datatable-responsive').DataTable({
        dom: "Bfrtip",
        ajax: "./php/get_main_category_data.php",
        columns: [
            { 
              title: "CATEGORY ID",
              data: "main_cat_id", 
              type: "readonly"
            },
            { 
              title: "CATEGORY NAME",
              data: "main_cat_name",
              type: "text"
            },
            { 
              title: "CATEGORY DESCRIPTION",
              data: "main_cat_desc", 
              type: "txtarea"
            },
            { 
              title: "STOCK",
              data: "main_cat_stock",
              type: "readonly"
            }
        ],
        order: [ 0, 'asc' ],
        altEditor: true,
        responsive: true,
        select: {
          style: 'os',
          blurable: true
        },
        buttons: [
          {
            text: 'Add',
            name: 'add'        // do not change name
          },
          {
            extend: 'selected', // Bind to Selected row
            text: 'Edit',
            name: 'edit'        // do not change name
          }
          
        ]
    });
}

function init_tiles(){

    tilesDatatable = $('#tiles_datatable-responsive').DataTable({
        dom: "Bfrtip",
        ajax: "./php/get_tiles_data.php",
        columns: [
            { 
              title: "TILE ID",
              data: "tile_id", 
              type: "readonly"
              
            },
            { 
              title: "TILE IMAGE",
              data: "tile_image", 
              type: "file"
            },
            { 
              title: "TILE URL",
              data: "tile_url",
              type: "text"
            },

        ],
        order: [ 0, 'asc' ],
        altEditor: true,
        responsive: true,
        select: {
          style: 'os',
          blurable: true
        },
         buttons: [
            {
              extend: 'selected', // Bind to Selected row
              text: 'Edit',
              name: 'edit'        // do not change name
            }
          ]
    });
}

function init_orders(){

    ordersDatatable = $('#orders_datatable-responsive').DataTable({
        dom: "Bfrtip",
        ajax: "./php/get_orders_data.php",
        columns: [
            { 
              title: "ORDER ID",
              data: "order_id", 
              type: "readonly"
              
            },
            { 
              title: "CUSTOMER NAME",
              data: "user_name",
              type: "readonly"
            },
            { 
              title: "CUSTOMER EMAIL",
              data: "user_email", 
              type: "readonly"
            },  
            { 
              title: "BILLING ADDRESS",
              data: "billing_address",
              type: "readonly"
            },
            { 
              title: "SHIPPING ADDRESS",
              data: "shipping_address",
              type: "readonly"
            },
            { 
              title: "ORDER DATE",
              data: "order_date",
              type: "readonly"
            }
        ],
        order: [ 0, 'asc' ],
        altEditor: true,
        responsive: true,
        select: {
          style: 'os',
          blurable: true
        },
        buttons: []
    });
}

function init_sub_category(){

    subCategoryDatatable = $('#sub_category_datatable-responsive').DataTable({
        dom: "Bfrtip",
        ajax: "./php/get_sub_category_data.php",
        columns: [
            { 
              title: "CATEGORY ID",
              data: "sub_cat_id", 
              type: "readonly"
            },
            { 
              title: "CATEGORY NAME",
              data: "sub_cat_name",
              type: "text"
            },
            { 
              title: "CATEGORY DESCRIPTION",
              data: "sub_cat_desc", 
              type: "txtarea"
            },
            { 
              title: "PARENT CATEGORY",
              data: "sub_cat_parent", 
              type: "select",
              options: category_options
            },
            { 
              title: "STOCK",
              data: "sub_cat_stock",
              type: "readonly"
            }
        ],
        order: [ 0, 'asc' ],
        altEditor: true,
        responsive: true,
        select: {
          style: 'os',
          blurable: true
        },
        buttons: [
          {
            text: 'Add',
            name: 'add'        // do not change name
          },
          {
            extend: 'selected', // Bind to Selected row
            text: 'Edit',
            name: 'edit'        // do not change name
          }
          
        ]
    });
}

function init_category(){

    categoryDatatable = $('#category_datatable-responsive').DataTable({
        dom: "Bfrtip",
        ajax: "./php/get_category_data.php",
        columns: [
            { 
              title: "CATEGORY ID",
              data: "cat_id", 
              type: "readonly"
            },
            { 
              title: "CATEGORY NAME",
              data: "cat_name",
              type: "text"
            },
            { 
              title: "CATEGORY DESCRIPTION",
              data: "cat_desc", 
              type: "txtarea"
            },
            { 
              title: "MAIN CATEGORY",
              data: "main_category", 
              type: "select",
              options: main_category_options
            },
            { 
              title: "STOCK",
              data: "cat_stock",
              type: "readonly"
            }
        ],
        order: [ 0, 'asc' ],
        altEditor: true,
        responsive: true,
        select: {
          style: 'os',
          blurable: true
        },
        buttons: [
          {
            text: 'Add',
            name: 'add'        // do not change name
          },
          {
            extend: 'selected', // Bind to Selected row
            text: 'Edit',
            name: 'edit'        // do not change name
          }
          
        ]
    });
}

function init_products(){

    productsDatatable = $('#products_datatable-responsive').DataTable({
        dom: "Bfrtip",
        ajax: "./php/get_product_data.php",
        columns: [  
            {
              title: "PRODUCT ID",
              data: "item_id",
              type: "readonly"
            },
            { 
              title: "PRODUCT NAME",
              data: "item_name",
              type: "text"
            },
            { 
              title: "PRODUCT DESCRIPTION",
              data: "item_desc", 
              type: "txtarea"
            },
            { 
              title: "PRODUCT PRICE",
              data: "item_price",
              type: "text"
            },
            { 
              title: "PRODUCT MAIN CATEGORY",
              data: "item_main_category",
              type: "select",
              options: main_category_options
            },
            { 
              title: "PRODUCT CATEGORY",
              data: "item_category",
              type: "select",
              options: category_options
            },
            { 
              title: "PRODUCT SUB CATEGORY",
              data: "item_sub_category",
              type: "select",
              options: sub_category_options
            },
            { 
              title: "IST IMAGE",
              data: "item_ist_view", 
              type: "file"
            },
            { 
              title: "2ND IMAGE",
              data: "item_2nd_view", 
              type: "file"
            },
            { 
              title: "3RD IMAGE",
              data: "item_3rd_view", 
              type: "file"
            },
            { 
              title: "4TH IMAGE",
              data: "item_4th_view", 
              type: "file"
            },
            { 
              title: "PRODUCT COLOR",
              data: "item_color", 
              type: "text",
            },
            { 
              title: "PRODUCT SIZE",
              data: "item_size", 
              type: "text",
            },
            { 
              title: "VIEWS",
              data: "views", 
              type: "readonly"
            },
            { 
              title: "IS POPUlAR",
              data: "is_popular", 
              type: "select",
              options: [
                  { label: "Select", value: "-1" },
                  { label: "yes", value: "yes" },
                  { label: "no", value: "no" } 
                ]
            }
        ],
        order: [ 0, 'asc' ],
        altEditor: true,
        responsive: true,
        select: {
          style: 'os',
          blurable: true
        },
         buttons: [
          {
            extend: 'selected', // Bind to Selected row
            text: 'Edit',
            name: 'edit'        // do not change name
          },
          {
            extend: 'selected', // Bind to Selected row
            text: 'Delete',
            name: 'delete'        // do not change name
          }
        ]
    });
}


$("#main_category").on("change",function(){

  var value = $(this).val();

  $.post("./php/getOptions.php",{action:"itemCategories",value:value}).done(function(data){

      $("#item_category").html(data);
      $("#item_sub_category").html("<option value = '-1' >Select Sub Category</option>");      

  });


});



$("#item_category").on("change",function(){

  var value = $(this).val();

  $.post("./php/getOptions.php",{action:"itemSubCategories",value:value}).done(function(data){

      $("#item_sub_category").html(data);

  });


});





