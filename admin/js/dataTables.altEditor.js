/*! Datatables altEditor 1.0
*/

/**
 * @summary     altEditor
 * @description Lightweight editor for DataTables
 * @version     1.0
 * @file        dataTables.editor.lite.js
 * @author      kingkode (www.kingkode.com)
 * @contact     www.kingkode.com/contact
 * @copyright   Copyright 2016 Kingkode
 *
 * This source file is free software, available under the following license:
 *   MIT license - http://datatables.net/license/mit
 *
 * This source file is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.
 *
 * For details please refer to: http://www.kingkode.com
 */

 /* Reworked edition
 This is a modified version of the altEditor 1.0

 New functionality:
  - Input validation.
  - Server communication with AJAX calls.

 Reworked:
  - Modal windows.
  - table rendering.
  - Add/Edit/Delete functions.
*/

var ajaxUrl;

(function( factory ){
  if ( typeof define === 'function' && define.amd ) {
        // AMD
        define( ['jquery', 'datatables.net'], function ( $ ) {
          return factory( $, window, document );
        } );
      }
      else if ( typeof exports === 'object' ) {
        // CommonJS
        module.exports = function (root, $) {
          if ( ! root ) {
            root = window;
          }

          if ( ! $ || ! $.fn.dataTable ) {
            $ = require('datatables.net')(root, $).$;
          }

          return factory( $, root, root.document );
        };
      }
      else {
        // Browser
        factory( jQuery, window, document );
      }
    }(function( $, window, document, undefined ) {
     'use strict';
     var DataTable = $.fn.dataTable;


     var _instance = 0;

   /** 
    * altEditor provides modal editing of records for Datatables
    *
    * @class altEditor
    * @constructor
    * @param {object} oTD DataTables settings object
    * @param {object} oConfig Configuration object for altEditor
    */
    var altEditor = function( dt, opts )
    {
     if ( ! DataTable.versionCheck || ! DataTable.versionCheck( '1.10.8' ) ) {
       throw( "Warning: altEditor requires DataTables 1.10.8 or greater");
     }

       // User and defaults configuration object
       this.c = $.extend( true, {},
         DataTable.defaults.altEditor,
         altEditor.defaults,
         opts
         );

       /**
        * @namespace Settings object which contains customisable information for altEditor instance
        */
        this.s = {
         /** @type {DataTable.Api} DataTables' API instance */
         dt: new DataTable.Api( dt ),

         /** @type {String} Unique namespace for events attached to the document */
         namespace: '.altEditor'+(_instance++)
       };


       /**
        * @namespace Common and useful DOM elements for the class instance
        */
        this.dom = {
         /** @type {jQuery} altEditor handle */
         modal: $('<div class="dt-altEditor-handle"/>'),
       };


       /* Constructor logic */
       this._constructor();
     }



     $.extend( altEditor.prototype, {
       /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        * Constructor
        * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

       /**
        * Initialise the RowReorder instance
        *
        * @private
        */
        _constructor: function ()
        {
           // console.log('altEditor Enabled')
           var that = this;
           var dt = this.s.dt;
           
           this._setup();

           dt.on( 'destroy.altEditor', function () {
             dt.off( '.altEditor' );
             $(dt.table().body()).off( that.s.namespace );
             $(document.body).off( that.s.namespace );
           } );
         },

       /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        * Private methods
        * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

       /**
        * Setup dom and bind button actions
        *
        * @private
        */
        _setup: function()
        {
         // console.log('Setup');

         var that = this;
         var dt = this.s.dt;

         // add modal
         $('body').append('\
          <div class="modal fade" id="altEditor-modal" tabindex="-1" role="dialog">\
          <div class="modal-dialog">\
          <div class="modal-content">\
          <div class="modal-header">\
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>\
          <h4 class="modal-title"></h4>\
          </div>\
          <div class="modal-body">\
          <p></p>\
          </div>\
          <div class="modal-footer">\
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>\
          <input type="submit" form="altEditor-form" class="btn btn-primary"></input>\
          </div>\
          </div>\
          </div>\
          </div>' 
          );


         // generateInvoice Button
         if( this.s.dt.button('cancelOrder:name') )
         {
          this.s.dt.button('cancelOrder:name').action( function(e, dt, node, config) {

            var rows = dt.rows({
              selected: true
            });

            var order_id = rows.data()[0]['order_id'];
            var billing_address = rows.data()[0]['billing_address'];
            var billing_addresses = billing_address.split(",");
            var mobile = $.trim(billing_addresses[3]);
            $.post('./php/get_cancel_requests_data.php',{action:'confirm_cancel',order_id:order_id},function(data){
              if (data == 'success') 
              {
                new PNotify({
                  title: 'Status',
                  text: 'Order has been cancelled successfully!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
                var message = "Your order with order id '" + order_id + "' has been cancelled successfully on 'cardpine.com'. Thank you!";
                $.post('../php/sendSms.php',{action:'sendDetails',message:message,mobile:mobile},function(data){});
                dt.ajax.reload();
              }
              else
              {
                alert(data);
              }

            });
            
          });
        }

        // generateInvoice Button
        if( this.s.dt.button('generateInvoice:name') )
        {
          this.s.dt.button('generateInvoice:name').action( function(e, dt, node, config) {

            var rows = dt.rows({
              selected: true
            });

            var order_id = rows.data()[0]['order_id'];
            $.post('./invoice_generator/invoice_bill/invoice.php',{order_id:order_id},function(data){
              if (data == 'success') 
              {
                new PNotify({
                  title: 'Status',
                  text: 'Invoice has been generated!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
                dt.ajax.reload();
              }
              else
              {
                alert(data);
              }

            });
            
          });
        }

        // generate full order details Button
        if( this.s.dt.button('generateFullDetails:name') )
        {
          this.s.dt.button('generateFullDetails:name').action( function(e, dt, node, config) {

            var rows = dt.rows({
              selected: true
            });

            var order_id = rows.data()[0]['order_id'];
            $.post('./invoice_generator/invoice_bill/full_order_detials.php',{order_id:order_id},function(data){
              if (data == 'success') 
              {
                new PNotify({
                  title: 'Status',
                  text: 'Full details file has been generated!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
                dt.ajax.reload();
              }
              else
              {
                alert(data);
              }

            });
            
          });
        }

        // generate card details Button
        if( this.s.dt.button('generateCardDetails:name') )
        {
          this.s.dt.button('generateCardDetails:name').action( function(e, dt, node, config) {

            var rows = dt.rows({
              selected: true
            });

            var order_id = rows.data()[0]['order_id'];
            $.post('./invoice_generator/invoice_bill/card_details.php',{order_id:order_id},function(data){
              if (data == 'success') 
              {
                new PNotify({
                  title: 'Status',
                  text: 'Card details file has been generated!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
                dt.ajax.reload();
              }
              else
              {
                alert(data);
              }

            });
            
          });
        }

         // add Edit Button
         if( this.s.dt.button('edit:name') )
         {
          this.s.dt.button('edit:name').action( function(e, dt, node, config) {

            var rows = dt.rows({
              selected: true
            }).count();

            ajaxUrl = dt.context[0].ajax;

            that._openEditModal();
          });

          $(document).on('click', '#editRowBtn', function(e)
          {
            if(initValidation()){
              e.preventDefault();
              e.stopPropagation();
              that._editRowData();            
            }
          });

        }

         // add Delete Button
         if( this.s.dt.button('delete:name') )
         {
          this.s.dt.button('delete:name').action( function(e, dt, node, config) {
            var rows = dt.rows({
              selected: true
            }).count();

            ajaxUrl = dt.context[0].ajax;

            that._openDeleteModal();
          });

          $(document).on('click', '#deleteRowBtn', function(e)
          {
            e.preventDefault();
            e.stopPropagation();
            that._deleteRow();
            $(this).prop('disabled', true);
          });
        }

         // add Add Button
         if( this.s.dt.button('add:name') )
         {
          this.s.dt.button('add:name').action( function(e, dt, node, config) {
            var rows = dt.rows({
              selected: true
            }).count();

            ajaxUrl = dt.context[0].ajax;

            that._openAddModal();
          });

          $(document).on('click', '#addRowBtn', function(e)
          {
            if(initValidation()){
              e.preventDefault();
              e.stopPropagation();
              that._addRowData();               
            }
          });
        }

         // add Refresh button
         if( this.s.dt.button('refresh:name') )
         {
          this.s.dt.button('refresh:name').action( function(e, dt, node, config) {
            $.post('php/dhcp.php', {'act': 'get'})
              .done(function(res) {
                dt.ajax.reload();
                console.log("Datatable reloaded.")
               });
          });
        }
      },

       /**
        * Emit an event on the DataTable for listeners
        *
        * @param  {string} name Event name
        * @param  {array} args Event arguments
        * @private
        */
        _emitEvent: function ( name, args )
        {
         this.s.dt.iterator( 'table', function ( ctx, i ) {
           $(ctx.nTable).triggerHandler( name+'.dt', args );
         } );
       },

       /**
        * Open Edit Modal for selected row
        * 
        * @private
        */
        _openEditModal: function ( )
        {
         var that = this;
         var dt = this.s.dt;
         var columnDefs = [];

    //Adding column attributes to object.
    //Assuming that the first defined column is ID - Therefore skipping that
    //and starting at index 1, because we dont wanna be able to change the ID.
   for( var i = 0; i < dt.context[0].aoColumns.length; i++ )
   {
    columnDefs.push({ title: dt.context[0].aoColumns[i].sTitle,
      name: dt.context[0].aoColumns[i].data,
      type: dt.context[0].aoColumns[i].type,
      options: dt.context[0].aoColumns[i].options,
      optionsUrl: dt.context[0].aoColumns[i].optionsUrl,
      msg: dt.context[0].aoColumns[i].errorMsg,
      hoverMsg: dt.context[0].aoColumns[i].hoverMsg,
      pattern: dt.context[0].aoColumns[i].pattern,
      special: dt.context[0].aoColumns[i].special
    });
  }
  var adata = dt.rows({
    selected: true
  });

          //Building edit-form
          var data = "";

          data += '<form id="altEditor-form-edit" enctype="multipart/form-data" name="altEditor-form" role="form">';

          for(var j = 0; j < columnDefs.length; j++){

            data += "<div class='form-group'>"

            if (!columnDefs[j].type.includes("readonly")) {
            data += "<div class='col-sm-5 col-md-5 col-lg-5 text-right' style='padding-top:4px;'>"
            
            data += "<label for='" + columnDefs[j].name + "'>" + columnDefs[j].title + ":</label></div>"
             }
         
            data += "<div class='col-sm-6 col-md-6 col-lg-6'>";


            //Adding text-inputs and errorlabels
            if(columnDefs[j].type.includes("text")){
              data += "<input type='" + columnDefs[j].type + "' id='" + columnDefs[j].name + "'  pattern='" + columnDefs[j].pattern + "'  title='" + columnDefs[j].hoverMsg + "' name='" + columnDefs[j].name + "' placeholder='" + columnDefs[j].title + "' data-special='" + columnDefs[j].special + "' data-errorMsg='" + columnDefs[j].msg + "' style='overflow:hidden'  class='form-control  form-control-sm' value='" + adata.data()[0][columnDefs[j].name] + "'>";
              data += "<label style=' color: red;' id='" + columnDefs[j].name + "label" + "' class='errorLabel'></label>";
            }

            //Adding text-area and errorlabels
            if(columnDefs[j].type.includes("txtarea")){
              data += "<textarea id='" + columnDefs[j].name + "'  pattern='" + columnDefs[j].pattern + "'  title='" + columnDefs[j].hoverMsg + "' name='" + columnDefs[j].name + "' placeholder='" + columnDefs[j].title + "' data-special='" + columnDefs[j].special + "' data-errorMsg='" + columnDefs[j].msg + "' style='overflow:hidden'  class='form-control  form-control-sm' >" + adata.data()[0][columnDefs[j].name] + "</textarea>";
              data += "<label style=' color: red;' id='" + columnDefs[j].name + "label" + "' class='errorLabel'></label>";
            }

            //Adding readonly-fields
            if(columnDefs[j].type.includes("readonly")){
              data += "<input type='hidden'  id='" + columnDefs[j].title + "' name='" + columnDefs[j].name + "' placeholder='" + columnDefs[j].title + "' style='overflow:hidden'  class='form-control  form-control-sm' value='" + adata.data()[0][columnDefs[j].name] + "'>";
            }

            //Adding select-fields
            if(columnDefs[j].type.includes("select")){

              var options = "";

	              for (var i = 0; i < columnDefs[j].options.length; i++) {


	              	if(columnDefs[j].options[i].category)
                  {
                    if (adata.data()[0]['card_category'] == columnDefs[j].options[i].category || columnDefs[j].options[i].category == 'null')
                    {
                      options += "<option value='" + columnDefs[j].options[i].value + "'>" + columnDefs[j].options[i].label + "</option>";
                    }
                  }
                  else
                  {
                    //Assigning the selected value of the <selected> option
                    if(adata.data()[0][columnDefs[j].name].includes(columnDefs[j].options[i].label)){
                      options += "<option value='" + columnDefs[j].options[i].value + "' selected >" + columnDefs[j].options[i].label + "</option>";
                    }else{
                      options += "<option value='" + columnDefs[j].options[i].value + "'>" + columnDefs[j].options[i].label + "</option>";
                    } 
                  }
	              }

              	data += "<select id='" + columnDefs[j].name + "' name='" + columnDefs[j].name + "' class='form-control'>" + options + "</select>";
              	data += "<label style=' color: red;' id='" + columnDefs[j].name + "label" + "' class='errorLabel'></label>";

	          
            } 

             //Adding file-inputs and errorlabels
            if(columnDefs[j].type.includes("file")){
              data += "<input type='" + columnDefs[j].type + "' id='" + columnDefs[j].name + "'  pattern='" + columnDefs[j].pattern + "'  title='" + columnDefs[j].hoverMsg + "' name='" + columnDefs[j].name + "' placeholder='" + columnDefs[j].title + "' data-special='" + columnDefs[j].special + "' data-errorMsg='" + columnDefs[j].msg + "' style='overflow:hidden'  class='form-control  form-control-sm' value='" + adata.data()[0][columnDefs[j].name] + "'>";
              data += "<label id='" + columnDefs[j].name + "label" + "' class=''>leave empty for no change!</label>";
            }

            data +="</div><div style='clear:both;'></div></div>";
          }

          data += "</form>";


          $('#altEditor-modal').on('show.bs.modal', function() {
            $('#altEditor-modal').find('.modal-title').html('Edit Record');
            $('#altEditor-modal').find('.modal-body').html(data);
            $('#altEditor-modal').find('.modal-footer').html("<button type='button' data-content='remove' class='btn btn-default' data-dismiss='modal'>Close</button>\
             <button type='button' data-content='remove' class='btn btn-primary' id='editRowBtn'>Submit</button>");

          });


          $('#altEditor-modal').modal('show');
          $('#altEditor-modal input[0]').focus();
        },

        _editRowData: function()
        {
          	var that = this;

	        var form = $('form#altEditor-form-edit')[0];
	        var formData = new FormData(form);
	        formData.append('action','edit');

	        //Calling AJAX with data, tableObject, command.
	        updateJSON(formData, that, "editRow");   
  		},


       /**
        * Open Delete Modal for selected row
        *
        * @private
        */
        _openDeleteModal: function ()
        {
         var that = this;
         var dt = this.s.dt;
         var columnDefs = [];

         //Adding attribute IDs and values to object
         for( var i = 0; i < dt.context[0].aoColumns.length; i++ )
         {
          columnDefs.push({ title: dt.context[0].aoColumns[i].sTitle,
            name: dt.context[0].aoColumns[i].data
          });
        }
        var adata = dt.rows({
          selected: true
        });

        //Building delete-modal
        var data = "";

        data += "<form id='altEditor-form-delete' name='altEditor-form' role='form'>";
        for(var j = 0; j < columnDefs.length; j++){
          data += "<div class='form-group'><label for='" + columnDefs[j].name + "'>" + columnDefs[j].title + " : </label><input  type='hidden'  id='" + columnDefs[j].title + "' name='" + columnDefs[j].name + "' placeholder='" + columnDefs[j].title + "' style='overflow:hidden'  class='form-control' value='" + adata.data()[0][columnDefs[j].name] + "' >" + adata.data()[0][columnDefs[j].name] + "</input></div>";
        }
        data += "</form>";

        $('#altEditor-modal').on('show.bs.modal', function() {
          $('#altEditor-modal').find('.modal-title').html('Delete Record');
          $('#altEditor-modal').find('.modal-body').html(data);
          $('#altEditor-modal').find('.modal-footer').html("<button type='button' data-content='remove' class='btn btn-default' data-dismiss='modal'>Close</button>\
           <button type='button'  data-content='remove' class='btn btn-danger' id='deleteRowBtn'>Delete</button>");
        });

        $('#altEditor-modal').modal('show');
        $('#altEditor-modal input[0]').focus();

      },

      _deleteRow: function( )
      {
       		var that = this;

	        var form = $('form#altEditor-form-delete')[0];
	        var formData = new FormData(form);
	        formData.append('action','delete');

	        //Calling AJAX with data, tableObject, command.
	        updateJSON(formData, that, "deleteRow");

 },


       /**
        * Open Add Modal for selected row
        * 
        * @private
        */
        _openAddModal: function ( )
        {
         var that = this;
         var dt = this.s.dt;
         var columnDefs = [];

         //Adding column attributes to object.
         for( var i = 0; i < dt.context[0].aoColumns.length; i++ )
         {
          columnDefs.push({ title: dt.context[0].aoColumns[i].sTitle,
            name: dt.context[0].aoColumns[i].data,
            type: dt.context[0].aoColumns[i].type,
            options: dt.context[0].aoColumns[i].options,
            msg: dt.context[0].aoColumns[i].errorMsg,
            hoverMsg: dt.context[0].aoColumns[i].hoverMsg,
            pattern: dt.context[0].aoColumns[i].pattern,
            special: dt.context[0].aoColumns[i].special
          }); 
        }

        //Building add-form
        var data = "";
        data += "<form id='altEditor-form-add' enctype='multipart/form-data' name='altEditor-form' role='form'>";

        for(var j = 0; j < columnDefs.length; j++){

            data += "<div class='form-group'>"

            if (!columnDefs[j].type.includes("readonly") && !(columnDefs[j].name.includes('is_latest')) && !(columnDefs[j].name.includes('on_home')) ) {
            data += "<div class='col-sm-5 col-md-5 col-lg-5 text-right' style='padding-top:4px;'>"
            
            data += "<label for='" + columnDefs[j].name + "'>" + columnDefs[j].title + ":</label></div>"
             }
         
            data += "<div class='col-sm-6 col-md-6 col-lg-6'>";


            //Adding text-inputs and errorlabels
            if(columnDefs[j].type.includes("text")){
              data += "<input type='" + columnDefs[j].type + "' id='" + columnDefs[j].name + "'  pattern='" + columnDefs[j].pattern + "'  title='" + columnDefs[j].hoverMsg + "' name='" + columnDefs[j].name + "' placeholder='" + columnDefs[j].title + "' data-special='" + columnDefs[j].special + "' data-errorMsg='" + columnDefs[j].msg + "' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";
              data += "<label style=' color: red;' id='" + columnDefs[j].name + "label" + "' class='errorLabel'></label>";
            }

            //Adding text-area and errorlabels
            if(columnDefs[j].type.includes("txtarea")){
              data += "<textarea id='" + columnDefs[j].name + "'  pattern='" + columnDefs[j].pattern + "'  title='" + columnDefs[j].hoverMsg + "' name='" + columnDefs[j].name + "' placeholder='" + columnDefs[j].title + "' data-special='" + columnDefs[j].special + "' data-errorMsg='" + columnDefs[j].msg + "' style='overflow:hidden'  class='form-control  form-control-sm' ></textarea>";
              data += "<label style=' color: red;' id='" + columnDefs[j].name + "label" + "' class='errorLabel'></label>";
            }

            //Adding readonly-fields
            if(columnDefs[j].type.includes("readonly")){
              data += "<input type='hidden'  id='" + columnDefs[j].title + "' name='" + columnDefs[j].name + "' placeholder='" + columnDefs[j].title + "' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";
            }

            //Adding select-fields)
            if(columnDefs[j].type.includes("select")){

              var options = "";

	              for (var i = 0; i < columnDefs[j].options.length; i++) {
	                //Assigning the selected value of the <selected> optio
	                  options += "<option value='" + columnDefs[j].options[i].value + "' >" + columnDefs[j].options[i].label + "</option>";
	              }

              	data += "<select id='" + columnDefs[j].name + "' name='" + columnDefs[j].name + "' class='form-control'>" + options + "</select>";
              	data += "<label style=' color: red;' id='" + columnDefs[j].name + "label" + "' class='errorLabel'></label>";

	          
            } 

             //Adding file-inputs and errorlabels
            if(columnDefs[j].type.includes("file")){
              data += "<input type='" + columnDefs[j].type + "' id='" + columnDefs[j].name + "'  pattern='" + columnDefs[j].pattern + "'  title='" + columnDefs[j].hoverMsg + "' name='" + columnDefs[j].name + "' placeholder='" + columnDefs[j].title + "' data-special='" + columnDefs[j].special + "' data-errorMsg='" + columnDefs[j].msg + "' style='overflow:hidden'  class='form-control  form-control-sm' value=''>";
              data += "<label id='" + columnDefs[j].name + "label" + "' class=''>leave empty for no change!</label>";
            }

            data +="</div><div style='clear:both;'></div></div>";
          }

          data += "</form>";

        $('#altEditor-modal').on('show.bs.modal', function() {
          $('#altEditor-modal').find('.modal-title').html('Add Record');
          $('#altEditor-modal').find('.modal-body').html(data);
          $('#altEditor-modal').find('.modal-footer').html("<button type='button' data-content='remove' class='btn btn-default' data-dismiss='modal'>Close</button>\
           <input type='submit'  data-content='remove' class='btn btn-primary' id='addRowBtn'></input>");
        });

        $('#altEditor-modal').modal('show');
        $('#altEditor-modal input[0]').focus();
      },

      _addRowData: function()
      {
        var that = this;

	        var form = $('form#altEditor-form-add')[0];
	        var formData = new FormData(form);
	        formData.append('action','add');

	        //Calling AJAX with data, tableObject, command.
	        updateJSON(formData, that, "addRow"); 

},

_getExecutionLocationFolder: function() {
 var fileName = "dataTables.altEditor.js";
 var scriptList = $("script[src]");
 var jsFileObject = $.grep(scriptList, function(el) {

  if(el.src.indexOf(fileName) !== -1 )
  {
   return el;
 }
});
 var jsFilePath = jsFileObject[0].src;
 var jsFileDirectory = jsFilePath.substring(0, jsFilePath.lastIndexOf("/") + 1);
 return jsFileDirectory;
}
} );



   /**
    * altEditor version
    * 
    * @static
    * @type      String
    */
    altEditor.version = '1.0';


   /**
    * altEditor defaults
    * 
    * @namespace
    */
    altEditor.defaults = {
     /** @type {Boolean} Ask user what they want to do, even for a single option */
     alwaysAsk: false,

     /** @type {string|null} What will trigger a focus */
       focus: null, // focus, click, hover

       /** @type {column-selector} Columns to provide auto fill for */
       columns: '', // all

       /** @type {boolean|null} Update the cells after a drag */
       update: null, // false is editor given, true otherwise

       /** @type {DataTable.Editor} Editor instance for automatic submission */
       editor: null
     };


   /**
    * Classes used by altEditor that are configurable
    * 
    * @namespace
    */
    altEditor.classes = {
     /** @type {String} Class used by the selection button */
     btn: 'btn'
   };


   // Attach a listener to the document which listens for DataTables initialisation
   // events so we can automatically initialise
   $(document).on( 'preInit.dt.altEditor', function (e, settings, json) {
     if ( e.namespace !== 'dt' ) {
       return;
     }

     var init = settings.oInit.altEditor;
     var defaults = DataTable.defaults.altEditor;

     if ( init || defaults ) {
       var opts = $.extend( {}, init, defaults );

       if ( init !== false ) {
         new altEditor( settings, opts  );
       }
     }
   } );


   // Alias for access
   DataTable.altEditor = altEditor;
   return altEditor;
 }));

//Input validation for text-fields
var initValidation = function(){
  var isValid = false;
  var errorcount = 0;

  //Looping through all text fields
  $('form[name="altEditor-form"] *').filter(':text').each(function( i ){
    var errorLabel = "#"+ $(this).attr("id") + "label";

    	// alert($(this).attr("id"));

      if ($.trim($(this).val()) == "") 
      {

      	$(errorLabel).html('Required Feild');
        $(errorLabel).show();
        errorcount++;

      //If no error
      }else{
        $(errorLabel).hide();
        $(errorLabel).empty();

      }
    });


  //Looping through all file fields
  $('form[name="altEditor-form"] select').each(function( i ){
    var errorLabel = "#"+ $(this).attr("id") + "label";

    	// alert($(this).attr("id"));

      if ($(this).val() == -1) 
      {
      	$(errorLabel).html('Please chose correct option!');
        $(errorLabel).show();
        errorcount++;

      //If no error
      }else{
        $(errorLabel).hide();
        $(errorLabel).empty();

      }
    });

  //Looping through all textarea fields
  $('form[name="altEditor-form"] textarea').each(function( i ){
    var errorLabel = "#"+ $(this).attr("id") + "label";

    	// alert($(this).val());

      if ($.trim($(this).val()) == "") 
      {
      	$(errorLabel).html('Required Feild');
        $(errorLabel).show();
        errorcount++;

      //If no error
      }else{
        $(errorLabel).hide();
        $(errorLabel).empty();

      }
    });

if(errorcount == 0){
  isValid = true;
}

return isValid;
}

//AJAX function - will reload table if succesfull
var updateJSON = function(data, tableObj, act){
  
  var dt = tableObj.s.dt;

  console.log(ajaxUrl);

  if (dt.context[0].ajax == ajaxUrl) 
  {


  	  $.ajax({
	    url: dt.context[0].ajax,
	    type : "POST",
	    processData: false,
	    contentType: false,
	    cache: false,
	    data: data,
	    
	  })
	  	.done (function(data) { 

	  	// alert(data);
	    //If data = false, then data is already present
	    //Server doesn't allow duplicate data.
	    if(data !== "success"){
	      $('#altEditor-modal .modal-body .alert').remove();

	      var message = '<div class="alert alert-danger" role="alert">\
	      <strong>' + data + '</strong>\
	      </div>';
	      $('#altEditor-modal .modal-body').append(message); 
	    }else{
	      $('#altEditor-modal .modal-body .alert').remove();

	      var message = '<div class="alert alert-success" role="alert">\
	      <strong>Success!</strong>\
	      </div>';
	      $('#altEditor-modal .modal-body').append(message); 
	    
	      //Reload data from server to table
	      dt.ajax.reload();

	      //refresh option values after
	      getMainCategoryOptions();
	      getCategoryOptions();

	      //Disabling submit button
	       $("#"+act+"Btn").prop('disabled', true);
	       $('#altEditor-modal').modal('hide');

	  
	    }
	   })
	   .fail (function(error)  { 

	   $('#altEditor-modal .modal-body .alert').remove();

	   var message = '<div class="alert alert-danger" role="alert">\
	   <strong>Error!</strong> Reponse code: ' + error.status + '\
	   </div>';

	   $('#altEditor-modal .modal-body').append(message); });

  }


}

  