<?php 
    // Get the global `$wp_query` object...
    global $wp_query;
     
    // ...and use it to get post author's id.
    $post_author_id = $wp_query->post->post_author;
     
    // Setup arguments.
    $args = array (
        'user_id' => $post_author_id,
        'orderby' => 'comment_ID'
    );
     
    // Custom comment query.
    $my_comment_query = new WP_Comment_Query;
    $comments = $my_comment_query->query( $args );
     
    // Check for comments.
    if ( $comments ) {
     
        // Start listing comments.
        echo '<ul class="author-comments">';
     
            // Loop over comments.
            foreach( $comments as $comment ) {
         
                echo '<li>' . $comment->comment_content . '</li>';
                echo '<span>'.$comment->comment_author.' </span>';         
         
            }
     
        // Stop listing comments.
        echo '</ul>';
     
    } else {
     
        // Display message if no comments are found.
        echo '<p class="no-author-comments">' . __( 'The post author didn\'t post any comments.', 'tutsplus' ) . '</p>';
     
    }
     
?>