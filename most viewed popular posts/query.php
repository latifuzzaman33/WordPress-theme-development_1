									
									
									
									<?php 
										$popularpost = new WP_Query( array(
										'post_type' =>'post',
										'posts_per_page' => 4, 
										'meta_key' => 'wpb_post_views_count', 
										'orderby' => 'meta_value_num', 
										'order' => 'DESC' 
										) );
										while ( $popularpost->have_posts() ) : $popularpost->the_post();
										
										$count = get_post_meta( $post->ID, 'wpb_post_views_count', true ); // counting the viewed number for meta
										
										?>
											<div class="single_popular_post">
												<p class="post_date">Sept 24th 2011</p> 
												
												
												<h2><?php the_title();?></h2>
												
												<p><?php echo $count ;?></p> <!-- counting the viewed number  -->
												
												<p class="popular_read_more"><a href="<?php the_permalink();?>">Read More</a>  </p> 
											</div>
										<?php

										

										endwhile;

										?>
										