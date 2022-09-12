<?php
/*Admin Menu Here*/
add_action('admin_menu','PQDFW_adminmenu',99);
function PQDFW_adminmenu() {
    add_submenu_page(
		'woocommerce',
		__('Product Quantity Dropdown ', 'product-quantity-dropdown'),
		__('Product Quantity Dropdown', 'product-quantity-dropdown'),
		'manage_woocommerce',
		'product-quantity-dropdown',
		'PQDFW_add_quantity_dropdown'
	);
}

/*Quantity Dropdown*/
function PQDFW_add_quantity_dropdown(){
	global $pqdfw_comman;
	?>
    <div class="wrap">
    	<div class="PQDFW_container">
    		<form method="post">
    			<h1><?php echo esc_html_e('Product Quantity Dropdown Settings' , 'product-quantity-dropdown-for-woocommerce')?></h1>
    			<table class="quantity_table">
    				<tr>
    					<th><h4><?php echo esc_html_e('Product Quantity Dropdown For Woocommerce' , 'product-quantity-dropdown-for-woocommerce')?></h4></th>
	    				<td>
	    					<input type="checkbox" name="pqdfw_comman[enable_plugin]" class="enable_plugin_check" value="yes" <?php if ($pqdfw_comman['enable_plugin'] == "yes" ) { echo 'checked="checked"'; } ?>>
							<label for="pqdfw_comman[enable_plugin]"><?php echo esc_html_e('Enable plugin'  , 'product-quantity-dropdown-for-woocommerce'); ?>  </label>
	    				</td>
    				</tr>
    			</table>
    			<div class="product_private select_quantity_rule">
    				<h2><?php echo esc_html_e('Select Quantity Rule' , 'product-quantity-dropdown-for-woocommerce'); ?></h2>
    			</div>
    			<table class="quantity_table">
    				<tr>
    					<th>
    						<?php echo esc_html_e('Quantity Product Type' , 'product-quantity-dropdown-for-woocommerce'); ?>    
    					</th>
    					<td>
    						<input type="radio" class="quantity_product_rule" name="quantity_product_rule" value="all_product" <?php if(get_option('quantity_product_rule', 'all_product') == 'all_product' ) { echo 'checked'; } ?>><?php echo esc_html_e('All Product' , 'product-quantity-dropdown-for-woocommerce'); ?> 
                     		<input type="radio" class="quantity_product_rule" name="quantity_product_rule" value="specific_product" <?php if(get_option('quantity_product_rule', 'all_product') == 'specific_product' ) { echo 'checked'; } ?>><?php echo esc_html_e('Specific Product' , 'product-quantity-dropdown-for-woocommerce'); ?> 
    					</td>
    				</tr>
    				<tr class="product_private product_specific">
                        <th>
                        	<label><?php echo esc_html_e('Select Product' , 'product-quantity-dropdown-for-woocommerce');?></label>
                        </th>
                        <td>
                        	<select id="pqdfw_select_product" name="pqdfw_select2[]" multiple="multiple" style="width:60%;">
	                           	<?php 
	                           		$productsa = get_option('pqdfw_select2');
	                           		foreach ($productsa as $value) {
                              		$productc = wc_get_product( $value );
                                 		$title = $productc->get_name();
                                 		$title = ( mb_strlen( $title ) > 50 ) ? mb_substr( $title, 0, 49 ) . '...' : $title; ?>
	                                 		<option value="<?php echo esc_attr($value);?>" selected="selected"><?php echo esc_attr($title);?></option>
	                                 	<?php   
	                           		}
	                           	?>
                           </select>
                        </td>
                    </tr>
    				<tr class="product_private product_specific">
                        <th>
                        	<label><?php echo esc_html_e('Select Product Categories',  'product-quantity-dropdown-for-woocommerce');?></label>
                        </th>
                        <td>
                        	<select id="pqdfw_select_cats" name="pqdfw_cats_select2[]" multiple="multiple" style="width:60%;">
	                           	<?php
	                           		$appended_terms = get_option('pqdfw_cats_select2');
	                           		if( $appended_terms ) {
						                foreach( $appended_terms as $term_id ) {
						                    $term_name = get_term( $term_id )->name;
						                    $term_name = ( mb_strlen( $term_name ) > 50 ) ? mb_substr( $term_name, 0, 49 ) . '...' : $term_name;
						                    echo '<option value="' . esc_attr($term_id) . '" selected="selected">' . esc_attr($term_name) . '</option>';
						                }
						            }
	                           	?>
                            </select>
                        </td>
                    </tr>
                    <tr class="product_private product_specific">
                        <th>
                        	<label><?php echo esc_html_e('Select Product Tags','product-quantity-dropdown-for-woocommerce');?></label>
                        </th>
                        <td>
                        	<select id="pqdfw_select_tags" name="pqdfw_tags_select2[]" multiple="multiple" style="width:60%;">
	                           	<?php
	                           		$appended_terms = get_option('pqdfw_tags_select2');
	                           		if( $appended_terms ) {
						                foreach( $appended_terms as $term_id ) {
						                    $term_name = get_term( $term_id )->name;
						                    $term_name = ( mb_strlen( $term_name ) > 50 ) ? mb_substr( $term_name, 0, 49 ) . '...' : $term_name;
						                    echo '<option value="' . esc_attr($term_id) . '" selected="selected">' . esc_attr($term_name) . '</option>';
						                }
						            }
	                           	?>
	                        </select>			                       
                        </td>
                    </tr>
    			</table>
    			<div class="product_private general_setting">
    				<h2><?php echo esc_html_e('General Settings' , 'product-quantity-dropdown-for-woocommerce'); ?></h2>
    			</div>		    				
    			<table class="quantity_table">		    				
                    <tr>
                    	<th>
                    		<?php echo esc_html_e('Quantity Position' , 'product-quantity-dropdown-for-woocommerce'); ?>    
                    	</th>
                    	<td>
	    					<select name="pqdfw_comman[quantity_position]">
                                <option value="after_addtocart" <?php if($pqdfw_comman['quantity_position'] == 'after_addtocart') { echo 'selected'; } ?>><?php echo esc_html_e('After Add To Cart' , 'product-quantity-dropdown-for-woocommerce'); ?></option>
                                <option value="before_addtocart" <?php if($pqdfw_comman['quantity_position'] == 'before_addtocart') { echo 'selected'; } ?>><?php echo esc_html_e('Before Add To Cart' , 'product-quantity-dropdown-for-woocommerce'); ?></option>
                            </select><br>
                            <label><i><?php echo esc_html_e('(Where the actual quantity should be displayed in Shop Page and Product Page)' , 'product-quantity-dropdown-for-woocommerce'); ?></i></label>
	    				</td>
                    </tr>
    				<tr class="product_private">
    					<th><?php echo esc_html_e('Minimum Quantity' , 'product-quantity-dropdown-for-woocommerce'); ?></th>
    					<td>
    						<input type="number" name="pqdfw_comman[pqdfw_min_quantity]" value="<?php echo esc_attr($pqdfw_comman['pqdfw_min_quantity']); ?>">
    					</td>
    				</tr>
    				<tr class="product_private">
    					<th><?php echo esc_html_e('Maximum Quantity' , 'product-quantity-dropdown-for-woocommerce'); ?></th>
    					<td>
    						<input type="number" name="pqdfw_comman[pqdfw_max_quantity]" value="<?php echo esc_attr($pqdfw_comman['pqdfw_max_quantity']); ?>">
    					</td>
    				</tr>
    				<tr class="product_private">
    					<th><?php echo esc_html_e('Step' , 'product-quantity-dropdown-for-woocommerce'); ?></th>
    					<td>
    						<input type="number" name="pqdfw_comman[pqdfw_step_quantity]" value="<?php echo esc_attr($pqdfw_comman['pqdfw_step_quantity']); ?>">
    					</td>
    				</tr>
    				<tr class="product_private">
    					<th><?php echo esc_html_e('Drop-Down Lable' , 'product-quantity-dropdown-for-woocommerce'); ?></th>
    					<td>
    						<input type="text" name="pqdfw_comman[pqdfw_dropdown_lable]" class="pqdfw_dropdown_lable" value="<?php echo esc_attr($pqdfw_comman['pqdfw_dropdown_lable']);?>"><br>
    						<label><i><?php echo esc_html_e('(Text to add Dropdown Label)' , 'product-quantity-dropdown-for-woocommerce'); ?></i></label>
    					</td>
    				</tr>
    			</table>	    			
    			<input type="hidden" name="pqdfw_form_submit" value="pqdfw_save_option">
                <input type="submit" value="Save changes" name="submit" class="button-primary" id="pqdfw-btn-space">
    		</form>
    	</div>
    </div>
    <?php
}

/* SELECT box product ajax */
add_action( 'wp_ajax_nopriv_pqdfw_product_ajax', 'PQDFW_product_ajax' );
add_action( 'wp_ajax_pqdfw_product_ajax', 'PQDFW_product_ajax' );
function PQDFW_product_ajax(){
	$return = array();
    $post_types = array( 'product');

    $search_results = new WP_Query( array( 
        's'=> sanitize_text_field($_GET['q']),
        'post_status' => 'publish',
        'post_type' => $post_types,
        'posts_per_page' => -1,
        'meta_query' => array(
                            array(
                                'key' => '_stock_status',
                                'value' => 'instock',
                                'compare' => '=',
                            )
                        )
    ) );
    if( $search_results->have_posts() ) :
       while( $search_results->have_posts() ) : $search_results->the_post();   
          $productc = wc_get_product( $search_results->post->ID );
          if ( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
             $title = $search_results->post->post_title;
             $price = $productc->get_price_html();
             $return[] = array( $search_results->post->ID, $title, $price);   
          }
       endwhile;
    endif;

    echo json_encode( $return );
    die;
}

/* Category Select ajax */
add_action( 'wp_ajax_nopriv_pqdfw_cats_ajax', 'PQDFW_cats_ajax' );
add_action( 'wp_ajax_pqdfw_cats_ajax',  'PQDFW_cats_ajax' );
function PQDFW_cats_ajax() {

    $return = array();

    $product_categories = get_terms( 'product_cat', $cat_args );

    if( !empty($product_categories) ){
        foreach ($product_categories as $key => $category) {
            $category->term_id;
            $title = ( mb_strlen( $category->name ) > 50 ) ? mb_substr( $category->name, 0, 49 ) . '...' : $category->name;
            $return[] = array( $category->term_id, $title );
        }
    }

    echo json_encode( $return );
    die;
}

/*Select Tag Dropdown Here*/
add_action( 'wp_ajax_nopriv_pqdfw_tags_ajax','PQDFW_tags_ajax' );
add_action( 'wp_ajax_pqdfw_tags_ajax',  'PQDFW_tags_ajax' );
function PQDFW_tags_ajax(){
	$return = array();
 	$args = array(
	    'number'     => '',
	    'orderby'    => '',
	    'order'      => '',
	    'hide_empty' => '',
	    'include'    => ''
	);
	$product_tags = get_terms( 'product_tag', $args );
    if( !empty($product_tags) ){
        foreach ($product_tags as $key => $tag) {
            $tag->term_id;
            $title = ( mb_strlen( $tag->name ) > 50 ) ? mb_substr( $tag->name, 0, 49 ) . '...' : $tag->name;
            $return[] = array( $tag->term_id, $title );
        }
    }
    echo json_encode( $return );
    die;
}

/*Sanitized array*/
function PQDFW_recursive_sanitize_text_field($array) {
    foreach ( $array as $key => $value ) {
        if ( is_array( $value ) ) {
            $value = $this->PQDFW_recursive_sanitize_text_field($value);
        }else{
            $value = sanitize_text_field( $value );
        }
    }
    return $array;
}

/*Page Option Save Here*/
add_action( 'init',  'PQDFW_save_option');

function PQDFW_save_option(){
	if( current_user_can('administrator') ) { 
        if(isset($_REQUEST['pqdfw_form_submit']) && $_REQUEST['pqdfw_form_submit'] == 'pqdfw_save_option'){
    	 	$isecheckbox = array(
            	'enable_plugin',
            );
            foreach ($isecheckbox as $key_isecheckbox => $value_isecheckbox) {

                if(!isset($_REQUEST['pqdfw_comman'][$value_isecheckbox])){                        	
                    $_REQUEST['pqdfw_comman'][$value_isecheckbox] ='no';
                }
            }
            
	        $pqdfw_select2 = PQDFW_recursive_sanitize_text_field( $_REQUEST['pqdfw_select2'] );
    			update_option('pqdfw_select2', $pqdfw_select2, 'yes');

    		$pqdfw_cats_select2 =PQDFW_recursive_sanitize_text_field( $_REQUEST['pqdfw_cats_select2'] );	        		
    			update_option('pqdfw_cats_select2', $pqdfw_cats_select2, 'yes');

    		$pqdfw_tags_select2 =PQDFW_recursive_sanitize_text_field( $_REQUEST['pqdfw_tags_select2'] );
    			update_option('pqdfw_tags_select2', $pqdfw_tags_select2, 'yes');

    		$quantity_product_rule = sanitize_text_field( $_REQUEST['quantity_product_rule'] );
    		update_option('quantity_product_rule', $quantity_product_rule, 'yes');

            foreach ($_REQUEST['pqdfw_comman'] as $key_wfwc_comman => $value_wfwc_comman) {
              	update_option($key_wfwc_comman, sanitize_text_field($value_wfwc_comman), 'yes');
            }

        wp_redirect( admin_url( '/admin.php?page=product-quantity-dropdown' ) );
        exit;
        }
    }
}