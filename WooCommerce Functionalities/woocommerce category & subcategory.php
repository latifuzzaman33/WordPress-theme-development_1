<?php



$taxonomyName = "product_cat";
//This gets top layer terms only.  This is done by setting parent to 0.  
    $parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => true));

    echo '<ul>';
    foreach ($parent_terms as $pterm) {

        //show parent categories
        echo '<li><a href="' . get_term_link($pterm->term_id) . '">' . $pterm->name . '</a></li>';

        $meta = get_term_meta( $pterm->term_id );

        $thumb_id = $meta['thumbnail_id'][0];

      

        // get the image URL for parent category
        $image = wp_get_attachment_url($thumb_id);
        // print the IMG HTML for parent category
        echo "<img src='{$image}' alt='' width ='400' height ='400' />";

        //Get the Child terms
        $terms = get_terms($taxonomyName, array('parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => true));
        foreach ($terms as $term) {

            echo '<li><a href="' . get_term_link($term->term_id) . '">' . $term->name . '</a></li>';
            $thumbnail_id = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true);
            // get the image URL for child category

           
            // print the IMG HTML for child category
           
                $image = wp_get_attachment_url($thumbnail_id);
                echo "<img src='{$image}' alt='' width='400' height='400' />";
           
            
        }
    }
    echo '</ul>';

?>