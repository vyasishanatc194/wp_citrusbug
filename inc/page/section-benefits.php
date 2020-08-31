<?php if ( get_field('hide_or_show_section_benefit') ) : ?>
<section class="general-two-column-section">
    <div class="container container-lg">
        <div class="general-two-column">
            <div class="general-two-column-root max-width-1220">
                <div class="row" data-aos="fade-up" data-aos-duration="2000">

                    <div class="col-lg-12 col-md-12">
                        <div class="heading-general-div">
                            <h3><?php echo get_field('section_title_benefit'); ?></h3>
                        </div>
                    </div>
                    <?php foreach ( get_field('benefit_records') as $key=>$val ) : ?>
                    <div class="col-lg-6 col-md-6 center-card-justify-content" data-aos="fade-up" data-aos-duration="2000">
                        <div class="card-icon-white-box">
                            <div class="img-thumb">
                                <img src="<?php echo get_the_post_thumbnail_url( $val->ID ); ?>" alt="icon" class="img-fluid img-icon" />
                            </div>  
                            <div class="content-div">
                            <h5><?php echo $val->post_title; ?></h5>
                            <?php
                              $content = $val->post_content;
                              $trimmed_content = wp_trim_words( $content, 50, NULL );
                              echo '<p>'.$trimmed_content.'</p>';
                            ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>