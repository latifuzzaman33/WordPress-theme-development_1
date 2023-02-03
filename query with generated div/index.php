			
			
			<section class="aboutArea"> 
				<div class="container"> 						
					<div class="accordionSection">
					
						<div class="accordon-item"> 
						
						<?php
						global $post;
						$count = 2; // It will be less than "if" condition value
						$args = array( 'posts_per_page' =>-1, 'post_type'=> 'team','orderby'=>'menu_order','order'=>'ASC');
						
						$myposts = get_posts( $args );

							
							foreach ($myposts as $post) : setup_postdata($post);  
								$count ++ ;
								?>
								<?php
									// It will be greater than  initial variable value
									if($count % 3 == 0){
										
										echo'</div><div class="rowwwww">';
									}
								?>
								
								
							<div class="accordon  ">
							
								
								<div class="accordon-img "> 
								<?php the_post_thumbnail('team-img',array('class'=>'img-responsive','alt'=>''));?>
									<h3><?php the_title();?></h3>
									<span>Global Chief Operating Officer</span>
								</div>
								
								<div class="accordon-content "> 
									<div class="accordon-header"> 
										<h3>Henry Tajer</h3>
									</div>
									<div class="accordon-subtitle"> 
										<div class="accordon-subtitle-1"> 
											<span>Global Chief Operating Officer</span>
										</div>
										<div class="accordon-social-links"> 
											<a href="#"><i class="fa fa-facebook"></i></a>
											<a href="#"><i class="fa fa-twitter"></i></a>
											<a href="#"><i class="fa fa-linkedin"></i></a>
										</div>
									</div>
									<div class="accordon-paragraph"> 
										<?php the_content();?>
									</div>
								</div>
								
							</div>
								
								<?php
							endforeach;
							
						
						
						
						?>
						
						
						
						
						</div>
						
						
					</div>
				</div>
				
				
					
			</section>