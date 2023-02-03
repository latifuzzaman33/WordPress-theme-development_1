<?php 
/*
template name:double img template
*/
get_header();?>
    
    
    <section class="maincontent">
	
        <div class="container">
            <div class="row">
			
                <div class="col-sm-8">
				
					<div class="double-featured-img"> 
					
					
					
						<?php
						global $post;
						$args = array( 'posts_per_page' => 3, 'post_type'=> 'post');
						$myposts = get_posts( $args );
						foreach( $myposts as $post ) : setup_postdata($post); ?>
						
						
					
							
								<?php

									$portfolio_large = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-large' );
									
									
								?>
								
								
								
						
									<div class="row"> 
										<div class="col-md-6">
											<img src="<?php echo $portfolio_large[0] ;?>" alt="drfr" />
										</div>
										
										
										<?php 
										

										 $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'post','secondary-image', $post->ID );
										 
										  $image_thumb_url = wp_get_attachment_image_src( $image_id,'small-thumb');
										  
										  if (MultiPostThumbnails::has_post_thumbnail('post','secondary-image')):
										?>
										
									
										
										
										<div class="col-md-6">
											<img src="<?php echo $image_thumb_url[0] ;?>" alt="gbfgfb" />
										</div>
										
										<?php endif; ?>
										
									</div>

					   

						<?php endforeach; ?>
						
						
					</div>
				

					
                </div>
                
                <div class="col-sm-4">
				
		<?php get_sidebar();?>
				
				
				
                </div>
            </div>
        </div>
    </section>
    
   <?php get_footer(); ?>