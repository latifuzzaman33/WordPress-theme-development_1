<?php
// This shortcode for mix it up


function the_desk_shortcode($atts){
	extract( shortcode_atts( array(
	), $atts));
	
		
	$list = '<section id="main-content" class="section light"><div class="container"><div class="section-content row"><div id="primary" class="col-1">';
	
		ob_start();
		
		?>
		
				<nav class="project-filter nav horizontal">
				<?php
		          //Dynamic portfolio menu
		            $terms = get_terms('portfolio_cat');

			            if( !empty ($terms) && !is_wp_error($terms) ){
							

			                echo '<ul>';
			                echo '<li class="active"><a href="#" data-filter="*">All</a></li>';
			                foreach($terms as $term){
								  echo '<li><a href="#" data-filter=".'.$term->slug.'"> '.$term->name.' </a></li>';
			                }
			                echo '</ul>';
			            }

					?>
				</nav>
	                   <div class="projects row">
					   
					   
							<?php

							global $post;
							$args = array(
								'post_type' => 'portfolio',
								'posts_per_page' => 12,
								'orderby' => 'menu_order',
								'order' => 'ASC'
							);
							$myposts = get_posts($args);
							foreach($myposts as $post) : setup_postdata($post);

							?>


							<?php
								$portolio_detail = get_post_meta($post->ID, '_portolio_detail', true);
								
								$portolio_large = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
							?>

							<?php

							$terms = get_the_terms( $post->ID, 'portfolio_cat');
							if($terms && !is_wp_error($terms)):
							$portfolio_cat_slug = array();
							foreach( $terms as $term ){
								$portfolio_cat_slug[] = $term->slug;
							}
							$portfolio_cat_array = join(", ", $portfolio_cat_slug);
							$portfolio_class_array = join(" ", $portfolio_cat_slug);
							endif;
							

							?>

							
                                <div class="col-27 <?php echo $portfolio_class_array; ?>">
                                    <article class="project">
                                        <figure class="project-thumb">
											<?php the_post_thumbnail('portfolio-thumb', array( 'class' => 'img-responsive','alt'=>'project-1' )); ?>

                                            <figcaption class="middle">
                                                <div>
                                                    <a href="<?php echo $portolio_large[0];?>" class="icon circle medium lightbox"  title="My Project 1"><i class="fa fa-search"></i></a>
                                                    <a href="project.html" class="icon circle medium"><i class="fa fa-link"></i></a>
                                                </div>
                                            </figcaption>
                                        </figure>

                                        <header class="project-header">
                                            <h4 class="project-title"><a href="project.html"><?php the_title();?></a></h4>
                                            <div class="project-meta"><?php echo $portfolio_class_array; ?></div>
                                        </header>
                                    </article>
                                </div>
								
							<?php endforeach;?>

							</div>
		
		<?php 
		
		$list.=ob_get_clean();
			
	$list.= '</div></div></div></section>';
	wp_reset_query();
	return $list;
}
add_shortcode('portfolio', 'the_desk_shortcode');




function the_desk_shortcode($atts){
	extract( shortcode_atts( array(
		'title' => '',
		'link' => '',
		'category' => '',
	), $atts) );
	
    $q = new WP_Query(
        array('posts_per_page' =>3, 'post_type' => 'post', 'category_name' => $category)
        );		
		
		
	$list = '	<div class="the_desk"><h1 class="the_desk_title">'.$title.'</h1>';
	
	while($q->have_posts()) : $q->the_post();
	
	$idd = get_the_ID();
	$excerpt = get_the_excerpt();//wordpress atuo p function
	
	$portfolio_cat = get_post_meta($idd, 'portfolio_cat', true);

	
	$portfolio_thumb=get_the_post_thumbnail($post->ID,'portfolio-thumb');
	
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-image' ); 

		$list .= '
		
				<div class="single_the_desk non_padding">
					<h2>'.get_the_title().'</h2>
					<p>'.wpautop($excerpt).'</p>
					<p class="post_meta"><a href="'.get_permalink().'">Read More</a>'.get_the_time().'</p>
				</div>

		';        
	endwhile;
	$list.= '</div>';
	wp_reset_query();
	return $list;
}
add_shortcode('the_desk', 'the_desk_shortcode');






//short shortcodes 


function middle_content_shortcode( $atts, $content = null) {

	extract( shortcode_atts( array(
		'title' => '',
		'category' => '',
	), $atts ) );
	


	return'<div class="middle_content floatleft">'.do_shortcode($content).'</div>';
}
add_shortcode('middle_content', 'middle_content_shortcode');


// short new version shortcode

function boxed_single_styled_paragraph( $atts, $content = null) {

	$a = shortcode_atts( array(
		'id' => '',
		'text' => '',
		'color' => '',
	), $atts );


	return'
	<style type="text/css">
		div#box_color' . esc_attr($a['id']) . ' {box-shadow:5px 5px 5px ' . esc_attr($a['color']) . ';border-color:' . esc_attr($a['color']) . '}
	</style>
	<div id="box_color' . esc_attr($a['id']) . '" class="boxed_style">' . esc_attr($a['text']) . '</div>
	
	';
}
add_shortcode('boxed', 'boxed_single_styled_paragraph');


// enable theme supports

 add_theme_support( 'post-formats', array('aside','image', 'video','quote','link','gallery','status','audio','chat') );


add_theme_support( 'post-thumbnails');
add_image_size( 'portfolio-large', 1050, 650, true );






/* Adding Latest jQuery from Wordpress */
function casonova_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'casonova_latest_jquery');


// including filesize
include_once('inc/custom-posts.php');

// enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');



// add menu support and fallback menu if menu doesn't exist

	add_action('init', 'wpj_register_menu');
	
	function wpj_register_menu() {
		if (function_exists('register_nav_menu')) {
			register_nav_menu( 'wpj-main-menu', __( 'Main Menu', '' ) );
		}
	}
	register_nav_menu( 'top-menu', __( 'top menu', '' ) );
	register_nav_menu( 'footer-menu', __( 'footer menu', '' ) );
	function wpj_default_menu() {
		echo '<ul id="nav">';
		if ('page' != get_option('show_on_front')) {
			echo '<li><a href="'. home_url() . '/">Home</a></li>';
		}
		wp_list_pages('title_li=');
		echo '</ul>';
	}


/* This code for dynamic menu creation */




function wpj_register_menu() {

    if (function_exists('register_nav_menu')) {

        register_nav_menu( 'main-menu', __( 'Main Menu') );

    }

}
add_action('init', 'wpj_register_menu');






//enable comments replay



function comment_scripts(){

   if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

}

add_action( 'wp_enqueue_scripts', 'comment_scripts' );


global $wpdb;
/* Get post IDs of all pages using "template-faq.php" */
$faq_pages = $wpdb->get_results("SELECT `post_id` FROM $wpdb->postmeta WHERE `meta_key` ='_wp_page_template' AND `meta_value` = 'custom.php' ", ARRAY_A);
/* Get permalink using post ID of first page in the results */
$faq_permalink = get_permalink($faq_pages[0]['post_id']);

?>