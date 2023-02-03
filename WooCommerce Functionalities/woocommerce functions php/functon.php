<?php 



	function the_family_theme_wishlist_shop_page(){

	echo do_shortcode('[yith_wcwl_add_to_wishlist]');
	
	}
	add_action('woocommerce_after_shop_loop_item','the_family_theme_wishlist_shop_page', 10);
	
	
	
	function the_family_theme_compare_shop_page(){
	
		echo do_shortcode('[yith_compare_button]');
	
	}
	add_action('woocommerce_after_shop_loop_item','the_family_theme_compare_shop_page',110);



	
	function bbloomer_display_sold_out_loop_woocommerce() {
	global $product;
	$stock = $product->get_stock_quantity();
		if($product->is_in_stock() || $product->managing_stock()){
			echo '<p>In Stock : <span>'.$stock.'</span></p>';
	
		}elseif ( ! $product->is_in_stock() && ! $product->managing_stock()  ) {
		echo '<span class="soldout">Sold Out</span>';
		}
	} 

	add_action( 'woocommerce_before_shop_loop_item_title', 'bbloomer_display_sold_out_loop_woocommerce' );
	


	function add_percentage_to_sale_badge( $html, $post, $product ) {

		if( $product->is_type('variable')){
			$percentages = array();
	  
			// Get all variation prices
			$prices = $product->get_variation_prices();
	  
			// Loop through variation prices
			foreach( $prices['price'] as $key => $price ){
				// Only on sale variations
				if( $prices['regular_price'][$key] !== $price ){
					// Calculate and set in the array the percentage for each variation on sale
					$percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
				}
			}
			// We keep the highest value
			$percentage = max($percentages) . '%';
	  
		} elseif( $product->is_type('grouped') ){
			$percentages = array();
	  
			// Get all variation prices
			$children_ids = $product->get_children();
	  
			// Loop through variation prices
			foreach( $children_ids as $child_id ){
				$child_product = wc_get_product($child_id);
	  
				$regular_price = (float) $child_product->get_regular_price();
				$sale_price    = (float) $child_product->get_sale_price();
	  
				if ( $sale_price != 0 || ! empty($sale_price) ) {
					// Calculate and set in the array the percentage for each child on sale
					$percentages[] = round(100 - ($sale_price / $regular_price * 100));
				}
			}
			// We keep the highest value
			$percentage = max($percentages) . '%';
	  
		} else {
			$regular_price = (float) $product->get_regular_price();
			$sale_price    = (float) $product->get_sale_price();
	  
			if ( $sale_price != 0 || ! empty($sale_price) ) {
				$percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
			} else {
				return $html;
			}
		}
		return '<span class="onsale">' . esc_html__( 'SALE', 'woocommerce' ) . ' ' . $percentage . '</span>';
	  }
	  
	  
	  add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3 );
	  

//custom reviews functionalitiy start	  
function show_product_ratings(){
    
    global $product;
    $rating_count = $product->get_rating_counts();

   $average_rating = $product->get_average_rating();
   $review_count =  $product->get_review_count();
   if($review_count):
  echo '<div class="single-pro-review-wrapper">';
   echo '<span class="single-pro-review">'.wc_get_rating_html( $average_rating,$rating_count ).'</span><span single-pro-review-count>'.$review_count.'</span>';
   echo '</div>';
   endif;

}
add_action( 'woocommerce_single_product_summary', 'show_product_ratings', 15 );
//custom reviews functionalitiy end



















?>