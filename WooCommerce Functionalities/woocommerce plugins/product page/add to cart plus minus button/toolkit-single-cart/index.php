<?php 
/**
 * Plugin Name:  modifying add to cart
 * Description: This plugin modify the add to cart button.
 * Plugin URI:   https://latifmatubber22.com/
 * Version:     3.1.5
 * Author:     latifmatubber
 * Author URI:  https://latifmatubber.com
 * Text Domain:  custom-add-to-cart
 */


 function add_to_cart_activation_hook(){

 }
register_activation_hook( __FILE__ ,'add_to_cart_activation_hook');

function add_to_cart_deactivation_hook(){}

register_deactivation_hook( __FILE__ ,'add_to_cart_deactivation_hook' );


function add_to_cart_load_textdomain(){

   load_plugin_textdomain( 'custom-add-to-cart',false,dirname(__FILE__)."/languages" ) ;
}
add_action('plugin_loaded','add_to_cart_load_textdomain');





function the_family_display_quantity_plus(){

    echo ' <button type="button" class="plus">+</button> ';

}

add_action( 'woocommerce_after_quantity_input_field', 'the_family_display_quantity_plus' );


function the_family_display_quantity_minus(){

    echo '<button type="button" class="minus">-</button>' ;

}

add_action( 'woocommerce_before_quantity_input_field', 'the_family_display_quantity_minus' );






function the_family_custom_scripts(){

if ( ! is_product() && ! is_cart() ) return;wc_enqueue_js(
 "   


$(document).on( 'click', 'button.plus, button.minus', function() {
var qty = $( this ).parent( '.quantity' ).find( '.qty' );
var val = parseFloat(qty.val());
var max = parseFloat(qty.attr( 'max' ));
var min = parseFloat(qty.attr( 'min' ));
var step = parseFloat(qty.attr( 'step' ));

if ( $( this ).is( '.plus' ) ) {
if ( max && ( max <= val ) ) {
qty.val( max ).change();
} else {
qty.val( val + step ).change();
}
} else {
if ( min && ( min >= val ) ) {
qty.val( min ).change();
} else if ( val > 1 ) {
qty.val( val - step ).change();
}
}

});

" );
}


add_action( 'wp_footer', 'the_family_custom_scripts' );


function toolkit_add_to_cart_css_file(){

    wp_enqueue_style('TheFamily-rizvi', plugin_dir_url( __FILE__ ). '/css/rizvi.css', array(),'5.0.2','all');   

  

}
add_action('wp_enqueue_scripts','toolkit_add_to_cart_css_file');

