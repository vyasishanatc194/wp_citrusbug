<?php
    $categories = [];
    foreach (wp_get_post_categories($post->ID) as $key=>$val) {
        $categories[$key] = $val;
    }
    $cat = $categories[0];
    $args = [
        'post_type' => 'post',
        'posts_per_page' => -1,
        'order_by' => 'ID',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'terms' => $cat,
                'field' => 'IDs'
            )
        ),
    ];
    $query = new WP_Query($args);
    while ( $query->have_posts() ) : $query->the_post();
        if (get_the_post_thumbnail_url( $post->ID )): 
            $post_image = get_the_post_thumbnail_url( $post->ID );
        else: 
            $post_image = wp_get_attachment_url(376);
        endif;
?>
<div class="item">  
    <div class="col-lg-12 col-md-12">
        <div class="slider-articles-box">
            <div class="general-blog-card-box">
                <div class="general-blog-card-top">
                    <div class="image-thumb-box">
                        <img src="<?php echo $post_image; ?>" class="img-fluid img-responsive img-blog" alt="post" />
                    </div>
                    <div class="image-text-div">
                        <div class="labels-row"> 
                            <?php foreach(wp_get_post_tags($post->ID) as $key=>$val) { ?>
									<div class="text-label-span"><?php echo $val->name; ?></div>
                            <?php } ?>
                        </div>
                        <div class="post-date-div"><span class="date-span-text"><?php echo get_the_date( 'j F Y' ); ?></span></div>
                    </div>
                </div>
                <div class="general-blog-card-body">
                    <div class="details-div">
                        <a href="<?php the_permalink($post->ID); ?>">
							<?php $dots = (strlen($post->post_title) > 44) ? '...' : ''; ?>
							<h3><?php echo substr( $post->post_title, 0, 44 ).$dots; ?></h3>
						</a>
                        <?php
                            $content = $post->post_content;
                            $trimmed_content = wp_trim_words( $content, 19, NULL );
                            echo '<p>'.$trimmed_content.'</p>';
                        ?>
                    </div>
                    <div class="user-details-div">
                        <div class="user-info-div">
                            <div class="image-thumb-box">
							<?php
								$uploads = wp_upload_dir();  
								$get_author_id = $post->post_author;
								$get_author_gravatar = get_field('author_photo', $args->ID)['url'];
								$place_img = esc_url( $uploads['baseurl']).'/2020/06/download.png';
							?>
							<?php if($get_author_gravatar): ?>
								<img src="<?php echo $get_author_gravatar; ?>" alt="" class="img-fluid img-responsive img-user" alt="user">
							<?php else: ?>
								<img src="<?php echo $place_img; ?>" class="img-fluid img-responsive img-user">
							<?php endif; ?>
							</div>
                            <div class="image-text-div">
                                <h5 class="user-label-text">
									<?php echo wp_trim_words( get_field('author_name', $post->ID), 8, NULL ); ?>
								</h5>
                            </div>
                        </div>
                        <div class="time-details-div">
                            <div class="time-text-div">
                                <!-- <span class="time-icon"></span>
                                <span class="span-text">3 Min Read</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    endwhile;
    wp_reset_postdata();
?>