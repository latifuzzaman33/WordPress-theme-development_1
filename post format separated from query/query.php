				<div class="row   kkkkk "> 
								<?php
								
									
						$args = array(
							'post_type' => 'post',
							'posts_per_page'=> 2,
							'tax_query' => array(
								array(
									'taxonomy' => 'post_format',
									'field' => 'slug',
									'terms' => array('post-format-quote','post-format-audio','post-format-gallery','post-format-image','post-format-link','post-format-video','post-format-aside'),
									'operator' => 'NOT IN'
									)
							),
						
						);
						$query = new WP_Query( $args );
						
						
						
								?>
							
								<?php if( $query-> have_posts()) : ?>
								<?php while ( $query-> have_posts()) :  $query-> the_post();
								
	$custom_two_column = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'custom_two_column' );
							
							
								
								
									
								?>	
								
								
								<div class="col-md-6">
									<h2><?php the_title();?></h2>
									<img src="<?php echo $custom_two_column[0]; ?>" alt="" />
									
									
								</div>
									
																			   
								<?php 
								
								endwhile; 
								wp_reset_postdata();
								?>

								<?php else : ?>
									<h3><?php _e('404 Error&#58; Not Found', 'bilanti'); ?></h3>
								<?php endif; ?>
															
								
								
							</div>