<?php 



function woocommerce_product_custom_fields()
{
  $args = array(
      'id' => 'woocommerce_custom_fields',
      'label' => __('Add WooCommerce Custom Fields', 'cwoa'),
  );
  woocommerce_wp_text_input($args);
}
 
add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields');

function save_woocommerce_product_custom_fields($post_id)
{
    $product = wc_get_product($post_id);
    $custom_fields_woocommerce_title = isset($_POST['woocommerce_custom_fields']) ? $_POST['woocommerce_custom_fields'] : '';
    $product->update_meta_data('woocommerce_custom_fields', sanitize_text_field($custom_fields_woocommerce_title));
    $product->save();
}
add_action('woocommerce_process_product_meta', 'save_woocommerce_product_custom_fields');

function woocommerce_custom_fields_display()
{
  global $post;
  $product = wc_get_product($post->ID);
    $custom_fields_woocommerce_title = $product->get_meta('woocommerce_custom_fields');

 echo '<div class="">'. $custom_fields_woocommerce_title.'</div>';

}
 
add_action('woocommerce_before_add_to_cart_button', 'woocommerce_custom_fields_display');




function misha_product_settings_tabs( $tabs ){
 
	//unset( $tabs['inventory'] );
 
	$tabs['misha'] = array(
		'label'    => 'Misha',
		'target'   => 'misha_product_data',
		'priority' => 90,
	);
	return $tabs;
 
}
add_filter('woocommerce_product_data_tabs', 'misha_product_settings_tabs' );



function misha_product_panels(){
 
	echo '<div id="misha_product_data" class="panel woocommerce_options_panel hidden">';
 
	woocommerce_wp_text_input( array(
		'id'                => 'misha_plugin_version',
		'value'             => get_post_meta( get_the_ID(), 'misha_plugin_version', true ),
		'label'             => 'Plugin version',
		'description'       => 'Description when desc_tip param is not true'
	) );
 
	woocommerce_wp_textarea_input( array(
		'id'          => 'misha_changelog',
		'value'       => get_post_meta( get_the_ID(), 'misha_changelog', true ),
		'label'       => 'Changelog',
		'desc_tip'    => true,
		'description' => 'Prove the plugin changelog here',
	) );
 
	woocommerce_wp_select( array(
		'id'          => 'misha_ext',
		'value'       => get_post_meta( get_the_ID(), 'misha_ext', true ),
		'label'       => 'File extension',
		'options'     => array( '' => 'Please select', 'zip' => 'Zip', 'gzip' => 'Gzip'),
	) );
 
	echo '</div>';
 
}

add_action( 'woocommerce_product_data_panels', 'misha_product_panels' );

function save_woocommerce_product_custom_fields_list($post_id)
{
    $product = wc_get_product($post_id);
    // This code for text field
    $custom_fields_woocommerce_title_text = isset($_POST['misha_plugin_version']) ? $_POST['misha_plugin_version'] : '';
    $product->update_meta_data('misha_plugin_version', sanitize_text_field($custom_fields_woocommerce_title_text));

    // This code for textarea
    $custom_fields_woocommerce_title_textarea = isset($_POST['misha_changelog']) ? $_POST['misha_changelog'] : '';
    $product->update_meta_data('misha_changelog', sanitize_text_field($custom_fields_woocommerce_title_textarea));

    // This code for select field
    $custom_fields_woocommerce_title_field = isset($_POST['misha_ext']) ? $_POST['misha_ext'] : '';
    $product->update_meta_data('misha_ext', sanitize_text_field($custom_fields_woocommerce_title_field));


    $product->save();
}
add_action('woocommerce_process_product_meta', 'save_woocommerce_product_custom_fields_list');


function woocommerce_custom_fields_display_codes()
{
  global $post;
  $product = wc_get_product($post->ID);

    $custom_fields_woocommerce_text = $product->get_meta('misha_plugin_version');

    $custom_fields_woocommerce_textarea = $product->get_meta('misha_changelog');

    $custom_fields_woocommerce_text_select = $product->get_meta('misha_ext');

 echo '<div class="">'. $custom_fields_woocommerce_text.'</div><br/>';
 echo '<div class="">'. $custom_fields_woocommerce_textarea.'</div><br/>';
 echo '<div class="">'. $custom_fields_woocommerce_text_select.'</div><br/>';

}
 
add_action('woocommerce_before_add_to_cart_button', 'woocommerce_custom_fields_display_codes');
 
