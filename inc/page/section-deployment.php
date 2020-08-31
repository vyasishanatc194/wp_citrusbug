<?php if ( get_field('hide_or_show_section_industries_configuration') ) : ?>
<section class="configurations-section">
    <div class="container container-lg">
        <div class="configurations-div">
            
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12 col-md-12">
                    <div class="heading-title-div">
                        <?php echo get_field('section_title_configuration'); ?>
                        <p><?php echo get_field('section_sub_title_configuration'); ?></p>
                    </div>
                </div>
            </div>

            <div class="configurations-root max-width-1220">
                <div class="row" data-aos="fade-up" data-aos-duration="2000">
                    <?php if (count(get_field('configuration_records')) > 0) :
                        foreach ( get_field('configuration_records') as $key=>$val ) : ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="configurations-white-card">
                            <div class="img-thumb">
                                <img src="<?php echo $val['configuration_image']['url']; ?>" alt="<?php echo $val['configuration_title']; ?>" class="img-fluid img-icon" />
                            </div>  
                            <div class="content-div">
                                <h5><?php echo $val['configuration_title']; ?></h5>
                                <p><?php echo $val['configuration_content']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                        endforeach;
                        endif;
                    ?>
                    <!-- <div class="col-lg-6 col-md-6">
                        <div class="configurations-white-card">
                            <div class="img-thumb">
                                <img src="assets/images/icons/benefit-02-icon-02.svg" alt="Benefit" class="img-fluid img-icon" />
                            </div>  
                            <div class="content-div">
                                <h5>Title</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>
                            </div>
                        </div>
                    </div> -->
                </div>            
            </div>
        </div>
    </div>
</section>
<?php endif; ?>