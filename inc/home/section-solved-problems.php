<?php
    $post = get_post(get_the_ID());
    $sectionShow = get_field('hide_or_show_section_solved_problems');
    if ($sectionShow):
        $sectionTitle = get_field('section_title_problems');
?>
 <section class="video-card-section">
      <div class="video-card-div">
        <div class="container container-lg">          
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12 col-md-12">
                    <div class="heading-left-div">
                        <h2><?php echo $sectionTitle; ?></h2>
                    </div>
                </div>
            </div>

            <div class="row" data-aos="fade-up" data-aos-duration="2000">
            <?php
                $args = array(
                    'post_type' => 'solved_problems',
                );
                $query = new WP_Query( $args );
                while ( $query->have_posts() ) : $query->the_post();
                $contentOptions = get_field('video_options', get_the_ID());
            ?>
                <div class="col-lg-4 col-md-4">
                    <div class="video-white-box">
                        <div class="img-thumb">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="video" class="img-fluid img-responsive" />
                            <button class="btn btn-video btn-video-icon" data-toggle="modal" data-target="#video-player-modal" data-option="<?php echo $contentOptions; ?>"
                                <?php if ($contentOptions == 'Youtube link') { ?>
                                    data-src="https://www.youtube.com/embed/<?php echo explode("=", get_field("video_link"))[1].'?autoplay=1'; ?>"
                                <?php } else if ($contentOptions == 'Vimeo Link') {
                                    $C = explode("/", get_field("video_link"));
                                    ?>
                                    data-src="https://player.vimeo.com/video/<?php echo $C[count($C)-1]; ?>?badge=0"
                                <?php } else { ?>
                                    data-src="<?php echo get_field("video")['url']; ?>"
                                <?php } ?>                                
                            > <span class="video-play"></span> </button>
                        </div>  
                        <div class="content-div">
                            <h3><?php the_title(); ?></h3>
                        </div>
                    </div>
                </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            ?>
            </div>
        </div>
    </div>
</section>
<?php
    endif;
?>