//jquery tab
jQuery(document).ready(function(){

	jQuery('#pqdfw_select_product').select2({
  	    ajax: {
    			url: ajaxurl,
    			dataType: 'json',
    			allowClear: true,
    			data: function (params) {
    				return {
        				q: params.term,
        				action: 'pqdfw_product_ajax'
      				};
      			},
    			processResults: function( data ) {
  					var options = [];
  					if ( data ) {
  	 					jQuery.each( data, function( index, text ) { 
  							options.push( { id: text[0], text: text[1], 'price': text[2]} );
  						});
  	 				}
  					return {
  						results: options
  					};
				},
				cache: true
		},
		minimumInputLength: 3
	});

	jQuery('#pqdfw_select_cats').select2({
        ajax: {
                url: ajaxurl,
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term,
                        action: 'pqdfw_cats_ajax'
                    };
                },
                processResults: function( data ) {
                var options = [];
                if ( data ) {
 
                    jQuery.each( data, function( index, text ) {
                        options.push( { id: text[0], text: text[1]  } );
                    });
 
                }
                return {
                    results: options
                };
            },
            cache: true
        },
        minimumInputLength: 3
    });

    if(PQDFW_DATA.quantity_product_rule == "specific_product"){
            jQuery('.product_specific').show();
    }else{
            jQuery('.product_specific').hide();
    }

    jQuery('#pqdfw_select_tags').select2({
        ajax: {
                url: ajaxurl,
                dataType: 'json',
                delay: true,
                data: function (params) {
                    return {
                        q: params.term,
                        action: 'pqdfw_tags_ajax'
                    };
                },
                processResults: function( data ) {
                var options = [];
                if ( data ) {
 
                    jQuery.each( data, function( index, text ) {
                        options.push( { id: text[0], text: text[1],'price': text[2]} );
                    });
 
                }
                return {
                    results: options
                };
            },
            cache: true
        },
        minimumInputLength: 0
    });

    jQuery("input[name='quantity_product_rule']").click(function() {

        var test =jQuery(this).val();
        if(test == "all_product"){
            jQuery('.product_specific').hide();
        }else{
            jQuery('.product_specific').show();
        }
    }); 

});