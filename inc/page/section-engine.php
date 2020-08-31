<?php if ( get_field('hide_or_show_section_engine') ) : ?>
<section class="general-two-column-section the-engine-column-section">
    <div class="container container-lg">
        <div class="general-two-column">
            <div class="general-two-column-root max-width-1220">
                <div class="row" data-aos="fade-up" data-aos-duration="2000">

                    <div class="col-lg-12 col-md-12">
                        <div class="heading-general-div">
                            <h3><?php echo get_field('section_title_engine'); ?></h3>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-duration="2000">
                        <div class="image-general-div">
                            <div class="thumb-banner-image">
                                <img src="<?php echo get_field('engine_poster')['url']; ?>" class="img-fluid img-responsive" alt="img">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>