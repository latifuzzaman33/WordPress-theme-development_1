		
		<?php
		global $post;
		$args = array( 'posts_per_page' => 3, 'post_type'=> 'portfolio','orderby'=>'menu_order','order'=>'ASC');
		$myposts = get_posts( $args );
		foreach( $myposts as $post ) : setup_postdata($post);
		
		?>
		
		
			<?php 
			$portfolio_cat = get_post_meta($post->ID, 'portfolio_cat', true);
		
			?>
			
				<?php
					the_post_thumbnail('blog-img', array( 'class' => 'img-fluid','alt'=> get_the_title() ));

					$portfolio_large = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-large' );
					
					$portfolio_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-thumb' );
				?>
		
		

			<div class="col-24 web">
				<article class="project">
					<figure class="project-thumb">
						<img src="<?php echo $portfolio_thumb[0] ;?>" alt="project-1">
						<figcaption class="middle">
							<div>

								<a href="<?php echo $portfolio_large[0] ;?>" class="icon circle medium lightbox" title="My Project 1"><i class="fa fa-search"></i></a>
								<a href="<?php the_permalink();?>" class="icon circle medium"><i class="fa fa-link"></i></a>
							</div>
						</figcaption>
					</figure>

					<header class="project-header">
						<h4 class="project-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
						<div class="project-meta"><?php echo $portfolio_cat ;?></div>
					</header>
				</article>
			</div>
	   

		<?php
		
	endforeach;
	wp_reset_postdata();
		
		?>
		
				
		<?php if(have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>	

			<!-- query here -->
					
					

		<?php 
		endwhile; 
		wp_reset_query();
		
		?>

		<?php else : ?>
			<h3><?php _e('404 Error&#58; Not Found', 'bilanti'); ?></h3>
		<?php endif; ?>

   <!-- menu query with fallback -->

	<?php
	if (function_exists('wp_nav_menu')) {
		wp_nav_menu(array('theme_location' => 'wpj-main-menu', 'menu_id' => 'nav', 'fallback_cb' => 'wpj_default_menu'));
	}
	else {
		wpj_default_menu();
	}
	?>
	
	
	 <!-- general menu query -->
	
	<?php wp_nav_menu( array( 'theme_location' => 'wpj-main-menu','menu_id=>mobile_menu') ); ?>	



 <!-- linking a php file that is page template -->
 
  <a href="<?php echo add_query_arg( array('id' => $id), home_url()."/fullpost/" ); ?>">Read More...</a> 

 
 
 