<?php if ( get_field('hide_or_show_section_benefit') ) : ?>
<section class="our-benefits-general-section">
    <div class="our-benefits-general-div">
        <div class="container container-lg">
            <div class="our-benefits-general-root">
                <div class="row" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-lg-6 col-md-12">
                    <div class="heading-left-general-div">
                        <h2><?php echo get_field('section_title_benefit'); ?></h2>
                        <p><?php echo get_field('section_sub_title_benefits'); ?></p>
                        <div class="button-row-div d-flex">
                            <a href="#form-get-in-touch" class="btn btn-primary-common btn-primary-link btn-contact-us"><?php echo get_field('contact_button_label_benefits'); ?></a>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="row" data-aos="fade-up" data-aos-duration="2000">
                        <?php if (count(get_field('benefit_records')) > 0) :
                            foreach ( get_field('benefit_records') as $key=>$val ) : ?>
                            <div class="col-lg-6 col-md-6 center-card-justify-content">
                                <div class="card-icon-white-box">
                                    <div class="img-thumb">
                                        <img src="<?php echo get_the_post_thumbnail_url( $val->ID ); ?>" alt="icon" class="img-fluid img-icon" />
                                    </div>  
                                    <div class="content-div">
                                    <?php
                                        $content = $val->post_content;
                                        $trimmed_content = wp_trim_words( $content, 50, NULL );
                                        echo '<p>'.$trimmed_content.'</p>';
                                    ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                            endforeach;
                            endif;
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>