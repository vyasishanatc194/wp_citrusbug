<?php
    if (get_field('hide_or_show_section_differentiation')) : 
    $contentOptions = get_field('content_options');
?>
<section class="general-illustration-section">
    <div class="general-illustration-div">
        <div class="container container-lg">
            <div class="general-illustration-root max-width-1220">
                <div class="row"  data-aos="fade-up" data-aos-duration="2000">

                    <div class="col-lg-12 col-md-12">
                        <div class="heading-general-div">
                            <h3><?php echo get_field('section_title_differentiation'); ?></h3>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="contant-general-div">
                            <?php if (get_field('differentiation_image')) : ?>
                            <div class="thumb-banner-image">
                                <img src="<?php echo get_field('differentiation_image')['url']; ?>" class="img-fluid img-responsive" alt="img" />
                            </div>
                            <?php endif; ?>
                            <div class="text-div">
                                <p><?php echo get_field( 'differentiation_content' ); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="button-row-div d-flex">
                            <a href="/technology" class="btn btn-primary-common btn-primary-link btn-contact-us"> <?php echo get_field( 'contact_button_label' ); ?> </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>