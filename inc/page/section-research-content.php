<?php
    if (get_field('hide_or_show_section_content')) : 
    $contentOptions = get_field('content_options');
?>
<section class="ceo-video-section">
    <div class="ceo-video-div">
        <div class="container container-lg">            
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12 col-md-12">
                    <div class="heading-left-div">
                        <h2><?php echo get_field( 'section_title__content' ); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12 col-md-12">
                    <div class="video-cover-box">
                        <div class="img-thumb">
                            <img src="<?php echo get_field( 'content_poster' )['url']; ?>" alt="video" class="img-fluid img-responsive" />
                            <button class="btn btn-video btn-video-icon"
                                <?php if ($contentOptions == 'Youtube link') { ?>
                                    data-src="https://www.youtube.com/embed/<?php echo explode("=", get_field("content_video_link"))[1]; ?>"
                                <?php } else if ($contentOptions == 'Vimeo Link') {
                                    $C = explode("/", get_field("content_video_link"));
                                    ?>
                                    data-src="https://player.vimeo.com/video/<?php echo $C[count($C)-1]; ?>?badge=0"
                                <?php } else { ?>
                                    data-src="<?php echo get_field("content_video")['url']; ?>"
                                <?php } ?>
                             data-toggle="modal" data-target="#video-player-modal"> <span class="video-play"></span> </button>
                        </div>  
                        <div class="content-left-bottom-div">
                            <div class="content-div">
                                <h3><?php echo get_field( 'content_poster_title' ); ?></h3>
                                <p><?php echo get_field( 'content_poster_text' ); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>