<?php
function listPopularPosts() {
    global $wpdb;
    $strBuidler = '';
      
    $result = $wpdb->get_results("SELECT comment_count, ID, post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , 5");
      
    foreach ($result as $post) {
    setup_postdata($post);
    $postId = $post->ID;
    $title = $post->post_title;
    $commentCount = $post->comment_count;
          
    if ($commentCount != 0) {
        $strBuidler .= '<li>';
        $strBuidler .= '<a href="' . get_permalink($postId) . '" title="' . $title . '">' . $title . '</a> ';
        $strBuidler .= '(' . $commentCount . ')';
        $strBuidler .= '</li>';
    }
    }   
      
    return $strBuidler;
}
?>
// to useage

<h2><?php _e('Popular Posts'); ?></h2>
<ul>
    <?php echo(listPopularPosts()); ?>
</ul>