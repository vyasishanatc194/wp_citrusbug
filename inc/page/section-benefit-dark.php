<?php if ( get_field('hide_or_show_section_benefits') ) : ?>
<section class="benefits-color-section">
    <div class="benefits-color-div">
        <div class="container container-lg">
            <div class="benefits-color-root">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="row" data-aos="fade-up" data-aos-duration="2000">

                            <?php foreach ( get_field('benefit_records') as $key=>$val ) : ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="benefits-white-box-card">
                                        <div class="img-thumb">
                                            <img src="<?php echo get_the_post_thumbnail_url( $val->ID ); ?>" alt="<?php echo $val->post_title; ?>" class="img-fluid img-icon" />
                                        </div>  
                                        <div class="content-div">
                                            <h2><?php echo $val->post_title; ?></h2>
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
        </div>
    </div>
</section>
<?php endif; ?>