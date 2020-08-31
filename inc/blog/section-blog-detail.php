<?php
    $post = get_post();
    $categories = [];
    foreach (wp_get_post_categories($post->ID) as $key=>$val) {
        $categories[$key] = $val;
    }
    if (get_the_post_thumbnail_url( $post->ID )): 
        $post_image = get_the_post_thumbnail_url( $post->ID );
    else: 
        $post_image = wp_get_attachment_url(376);
    endif; 
?>
<section class="inner-banner-section blog-inner-banner-section" >
    <div class="inner-banner-div" style="background-image: url(<?php echo $post_image; ?>);">
        <div class="content-banner-root">
            <div class="container container-lg">
                <div class="row" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-lg-12 col-md-12 p0">        
                    
                        <div class="content-banner-center max-width-920">

                            <div class="title-content-banner-div">
                                <div class="text-content">
                                    <div class="back-row">
                                    <a class="back-link-btn" href="<?php echo get_permalink(70); ?>"> <i class="back-link-icon"></i> Blog / </a>
                                    <a class="back-link-btn" href="<?php echo get_category_link($categories[0]); ?>"> <i class="back-link-icon"></i> <?php echo get_cat_name($val); ?></a>
                                    </div>
                                    <h1><?php the_title(); ?></h1>
                                </div>
                            </div>

                            <div class="user-blog-banner-div">

                            <div class="user-blog-banner-top" data-aos="fade-up" data-aos-duration="2000">
                                <div class="user-details-div">
                                    <div class="user-info-div">
                                        <div class="image-thumb-box">
                                        <?php
                                            $uploads = wp_upload_dir();  
                                            $get_author_id = $post->post_author;
                                            $get_author_gravatar = get_field('author_photo', $post->ID)['url'];
                                            $place_img = esc_url( $uploads['baseurl']).'/2020/06/download.png';
                                        ?>
                                        <?php if($get_author_gravatar): ?>
                                            <img src="<?php echo $get_author_gravatar; ?>" alt="" class="img-fluid img-responsive img-user" alt="user">
                                        <?php else: ?>
                                            <img src="<?php echo $place_img; ?>" class="img-fluid img-responsive img-user">
                                        <?php endif; ?>
                                        </div>
                                        <div class="image-text-div">
                                            <h5 class="user-label-text"><?php echo get_field('author_name', $post->ID); ?></h5>
                                        </div>
                                    </div>
                                    <div class="time-details-div">
										<?php if(get_field('read_time')) : ?>
                                        <div class="time-text-div">
                                            <span class="time-icon"></span>
                                            <span class="span-text"><?php echo get_field('read_time'); ?></span>
                                        </div>
										<?php endif; ?>
                                    </div>
                                </div>
                                <div class="social-details-div">
                                    <div class="date-text-div">
                                        <span class="date-span-text"><?php echo get_the_date( 'j F Y' ); ?></span>
                                    </div>
                                    <div class="social-group-div">
                                        <?php echo do_shortcode('[Sassy_Social_Share]') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="blog-details-list-div">
                                <div class="labels-row"> 
                                    <?php foreach(wp_get_post_tags($post->ID) as $key=>$val) { ?>
                                        <div class="text-label-span"> <a class="text-label-link"><?php echo $val->name; ?></a></div>
                                    <?php } ?>
                                </div>
                            </div>

                            </div>
                            
                        </div>
                    
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section><!--  end of inner banner  -->

<section class="blog-details-section">
    <div class="blog-details-div">
        <div class="container container-lg">
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12 col-md-12">
                    <div class="blog-editor-root max-width-920">
                        <?php echo apply_filters('the_content', $post->post_content); ?>
                        <div class="user-blog-bottom-div">
  
                            <div class="blog-details-list-div">
                                <div class="labels-row"> 
                                    <?php foreach(wp_get_post_tags($post->ID) as $key=>$val) { ?>
                                        <div class="text-label-span"> <a class="text-label-link"><?php echo $val->name; ?></a></div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="social-details-div">
                                <div class="social-group-div">
                                    <?php echo do_shortcode('[Sassy_Social_Share]') ?>
                                </div>
                            </div>

                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>

<section class="related-articles-section">
    <div class="related-articles-div">
        <div class="container container-lg">
          
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12 col-md-12">
                <div class="heading-title-div">
                    <h4>Related</h4>
                    <h2>ARTICLES</h2>
                </div>
                </div>
            </div>

        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="related-articles-root">
                    <div class="owl-carousel owl-theme owl-custom owl-articles" id="owl-related-articles">

                        <?php get_template_part( 'inc/blog/section', 'blog-related'); ?>

                    </div>   
                </div>
            </div>
            
        </div>

    </div>
</section>