<?Php

// displaying regular price and sale price separately

$price = get_post_meta(get_the_ID(), '_regular_price', true);

$price_sale = get_post_meta(get_the_ID(), '_sale_price', true);

if ($price_sale !== "") {

    echo $price_sale;

} else {

    echo $price;
}

function the_dramatist_price_show() {

    global $product;


    if( $product->is_on_sale() ) {

        return $product->get_sale_price();

    }

    return $product->get_regular_price();
}

#1 Get product variations
$product_variations = $product->get_available_variations();


#2 Get one variation id of a product
$variation_product_id = $product_variations [0]['variation_id'];


#3 Create the product object
$variation_product = new WC_Product_Variation( $variation_product_id );


#4 Use the variation product object to get the variation prices

echo $variation_product ->regular_price ;

echo $variation_product ->sale_price ;

 ?>