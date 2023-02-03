		
	<ul class="blog_category">
			
	<?php
	
	$args = array(
		'orderby' => 'name',
		'order' => 'ASC'
	);
	$categories = get_categories($args);
		foreach($categories as $category):?>
		
		<li><a href=""><?php echo $category -> name ;?></a></li>
		
	<?php endforeach;?>
	
	
	</ul>
	
	<!--category counting shortcode -->
	
	
	
	<?php
	
	
	
	function category_post_section_shortcode($atts){
		extract( shortcode_atts( array(
			'title' => '',
			'category' => '',
		), $atts, 'category_post' ) );
		
		$list = '<ul>';
		$args = array(
			'orderby' => 'name',
			'order' => 'ASC'
		);
		$categories = get_categories($args);
			foreach($categories as $category):

		
			$list .= '
					<li><a href="'.get_category_link($category->term_id).'">'.$category -> name.'</a></li>
			';        
		endforeach;
		$list.= ' </ul>';
		wp_reset_query();
		return $list;
	}
	add_shortcode('category_post', 'category_post_section_shortcode');
	
	?>