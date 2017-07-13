var AT_Slider ={
  
  	owlSlider : function(){
      
        jQuery(".featured-product").length && jQuery('.featured-product').owlCarousel({
          	nav			: true
          	,dots 		: false
      		,items		: 4
			,responsive : {
                0:{
                	items: 1
                }
            	,480:{
              		items: 2
            	}
            	,768:{
              		items: 3
            	}
            	,1180:{
              		items: 4
            	}
          	}
          	,navText	: ['<i class="fa fa-angle-left" title="previous"></i>', '<i class="fa fa-angle-right" title="Next"></i>']
        });
      
      	jQuery(".best-selling-product").length && jQuery('.best-selling-product').owlCarousel({
          	nav			: true
          	,dots 		: false
      		,items		: 4
			,responsive : {
                0:{
                	items: 1
                }
            	,480:{
              		items: 2
            	}
            	,768:{
              		items: 3
            	}
            	,1180:{
              		items: 4
            	}
          	}
          	,navText	: ['<i class="fa fa-angle-left" title="previous"></i>', '<i class="fa fa-angle-right" title="Next"></i>']
        });
      
      	jQuery(".new-product").length && jQuery('.new-product').owlCarousel({
          	nav			: true
          	,dots 		: false
      		,items		: 4
			,responsive : {
                0:{
                	items: 1
                }
            	,480:{
              		items: 2
            	}
            	,768:{
              		items: 3
            	}
            	,1180:{
              		items: 4
            	}
          	}
          	,navText	: ['<i class="fa fa-angle-left" title="previous"></i>', '<i class="fa fa-angle-right" title="Next"></i>']
        });
      
      	jQuery(".trending-now").length && jQuery('.trending-now').owlCarousel({
          	nav			: true
          	,dots 		: false
      		,items		: 4
			,responsive : {
                0:{
                	items: 1
                }
            	,480:{
              		items: 2
            	}
            	,768:{
              		items: 3
            	}
            	,1180:{
              		items: 4
            	}
          	}
          	,navText	: ['<i class="fa fa-angle-left" title="previous"></i>', '<i class="fa fa-angle-right" title="Next"></i>']
        });
      
      	jQuery(".home-accessories").length && jQuery('.home-accessories').owlCarousel({
          	nav			: true
          	,dots 		: false
      		,items		: 4
			,responsive : {
                0:{
                	items: 1
                }
            	,480:{
              		items: 2
            	}
            	,768:{
              		items: 3
            	}
            	,1180:{
              		items: 4
            	}
          	}
          	,navText	: ['<i class="fa fa-angle-left" title="previous"></i>', '<i class="fa fa-angle-right" title="Next"></i>']
        });
      
      	jQuery(".latest-blog").length && jQuery('.latest-blog').owlCarousel({
          	nav			: true
          	,dots 		: false
      		,items		: 3
			,responsive : {
            	0:{
              		items: 1
            	}
                ,480:{
                  items: 2
                }
            	,974:{
              		items: 2
            	}
            	,1180:{
              		items: 3
            	}
          	}
          	,navText	: ['<i class="fa fa-angle-left" title="previous"></i>', '<i class="fa fa-angle-right" title="Next"></i>']
        });
      
      	jQuery(".related-items").length && jQuery('.related-items').owlCarousel({
          	nav			: true
          	,dots 		: false
      		,items		: 4
			,responsive : {
                0:{
                	items: 1
                }
            	,480:{
              		items: 2
            	}
            	,768:{
              		items: 3
            	}
            	,1180:{
              		items: 4
            	}
          	}
          	,navText	: ['<i class="fa fa-angle-left" title="previous"></i>', '<i class="fa fa-angle-right" title="Next"></i>']
        });
      
        jQuery(".wear-with-items").length && jQuery('.wear-with-items').owlCarousel({
          	nav			: true
          	,dots 		: false
      		,items		: 4
			,responsive : {
                0:{
                	items: 1
                }
            	,480:{
              		items: 2
            	}
            	,768:{
              		items: 3
            	}
            	,1180:{
              		items: 4
            	}
          	}
          	,navText	: ['<i class="fa fa-angle-left" title="previous"></i>', '<i class="fa fa-angle-right" title="Next"></i>']
        });

        jQuery("#gallery-image").length && jQuery('#gallery-image').owlCarousel({
            nav			: true
          	,dots 		: false
          	,mouseDrag	: false
          	,margin: 25
			,responsive : {
                0:{
                	items: 3
                }
            	,1199:{
              		items: 3
            	}
          	}
          	,navText	: ['<i class="fa fa-angle-left" title="Previous"></i>', '<i class="fa fa-angle-right" title="Next"></i>']
			
        });
    	
	}
  
  	,init : function(){
      this.owlSlider();
    }
  
}

/* Check IE */
var bcMsieVersion = {

  MsieVersion: function() {

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer, return version number
      return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)));
    else                 // If another browser, return 0
      {
      return 0;
    }
  }

  ,init : function(){
    this.MsieVersion();
  }
}

jQuery(document).ready(function($) {
	
	AT_Slider.init();
      
});