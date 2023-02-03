<?php


	function wp_login_logo_change(){
		
		?>
		<style type="text/css"> 
		
			body.login div#login h1 a{background-image:url(<?php echo get_template_directory_uri() ?>/images/logo.png);background-size:170px;height:125px;width:160px;}
			
			body.login {background-image:url(<?php echo get_template_directory_uri() ?>/images/ddddcdd.jpg);background-repeat:no-repeat;background-size:cover;}
			
		</style>
		
	
		
		<?php
		
	}
	add_action('login_enqueue_scripts','wp_login_logo_change');
	


function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );