<?Php


// Your title set in a variable
$title = "200x Slopupovací pleťová Rusk";

// Using our custom function to get an instance of the WC_Product object
$product_obj = get_wc_product_by_title( $title );

// Testing the output

print_r($product_obj);





// displaying product sold items

echo get_post_meta(get_the_ID(), 'total_sales', true); 

// displaying stock quantity

echo $product-> get_stock_quantity();


// displaying regular price and sale price together

 php echo $product-> get_price_html(); 


// displaying regular price and sale price separately

$price = get_post_meta( get_the_ID(), '_regular_price', true);

$price_sale = get_post_meta( get_the_ID(), '_sale_price', true);

if ($price_sale !== "") {
    echo $price_sale;
} else {
    echo $price;
}

function the_dramatist_price_show() {

    global $product;

    if( $product->is_on_sale() ) {

        return $product-> get_sale_price();
    }
    return $product-> get_regular_price();
}

    // variable product

    #1 Get product variations
    $product_variations = $product-> get_available_variations();

    #2 Get one variation id of a product
    $variation_product_id = $product_variations [0]['variation_id'];

    #3 Create the product object
    $variation_product = new WC_Product_Variation( $variation_product_id );

    #4 Use the variation product object to get the variation prices
    echo $variation_product -> regular_price;
    echo $variation_product -> sale_price;

 ?>