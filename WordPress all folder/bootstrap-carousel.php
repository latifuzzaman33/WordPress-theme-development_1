<?php
global $post;
$number = 0; 
$args = array( 'posts_per_page' => -1, 'post_type'=> 'posttype', 'orderby' => 'menu_order', 'order' => 'ASC' );
$myposts = get_posts( $args );
foreach( $myposts as $post ) : setup_postdata($post); ?>
 
<li data-target="#myCarousel" data-slide-to="<?php echo $number++; ?>"></li>
 
<?php endforeach; ?>