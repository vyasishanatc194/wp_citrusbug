<?php if (get_field('hide_or_show_section_first_section')) : ?>
<section class="image-content-card-section2">
    <div class="image-content-card-div2">
        <div class="container container-lg">            
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12 col-md-12">
                    <div class="image-content-card-root2">
                        <div class="image-content-card-box2 image-content-card-right2">
                            <div class="image-content-inner-row row">
                                <div class="col-lg-6 col-md-6 img-grid-6">
                                    <div class="image-thumb-box">
                                        <img src="<?php echo get_field('first_section_image')['url']; ?>" class="img-fluid img-responsive img-auto" alt="image" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 content-grid-6">
                                    <div class="right-content-desc">
                                        <div class="desc-content-div">
                                            <?php echo get_field('first_section_content'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End of first row -->
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section> 
<?php endif; ?>