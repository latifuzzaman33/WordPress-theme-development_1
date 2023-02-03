
<div class="s-content__pagenav">
<div class="s-content__nav">
    <?php 
    $photograph_prev_post = get_previous_post( );
    if($photograph_prev_post):
    ?>
    <div class="s-content__prev">
        <a href="<?php echo get_the_permalink( $photograph_prev_post );?>" rel="prev">
            <span><?php _e('Previous Post','photograph') ;?></span>
            <?php echo get_the_title($photograph_prev_post);?>
        </a>
    </div>
    <?php endif;?>

    <?php 
    $photograph_next_post = get_next_post();
    if($photograph_next_post):
    ?>
    <div class="s-content__next">
        <a href="<?php echo get_the_permalink( $photograph_next_post );?>" rel="next">
            <span><?php _e('Next Post','photograph') ;?></span>
            <?php echo get_the_title($photograph_next_post);?>
        </a>
    </div>
    <?php endif;?>
</div>
</div> <!-- end s-content__pagenav -->