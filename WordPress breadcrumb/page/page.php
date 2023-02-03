            <?php 
               $obj_id = get_queried_object_id();
               $portfolio_large = wp_get_attachment_image_src( get_post_thumbnail_id($obj_id) ,'full');
            ?>
          
          <div class="breadcrumb-area " style="background-image:url(<?php echo $portfolio_large[0]?>)">
                <div class="breadcrumb-overlay"></div>
                    <div class="container wrapper-inner">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="breadcrumb-text text-center">
                                    <div class="breadcrumb-menu">

                                        <?php 
                                        if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
        