<?php
    $post = get_post(get_the_ID());
    $sectionShow = get_field('hide_or_show_section_our_client');
    if ($sectionShow):
        $sectionTitle = get_field('section_title_our_client');
?>
<section class="our-clients-section <?php echo get_field('bg_color_client_section'); ?>">
    <div class="our-clients-div">
        <div class="container container-lg">        
        <div class="row" data-aos="fade-up" data-aos-duration="2000">
            <div class="col-lg-12 col-md-12">
                <div class="heading-left-div">
                    <h2><?php echo $sectionTitle; ?></h2>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="2000">
            <div class="col-lg-12 col-md-12">
                <div class="slider-white-box">
                    <div class="owl-carousel owl-theme owl-custom owl-clients" id="owl-clients">
                        <?php
                            foreach ( get_field('our_client_records') as $key=>$val ) :
                        ?>
                        <div class="item">  
                            <div class="col-lg-12 col-md-12">
                                <div class="clients-logo-box">
                                    <div class="logo-thumb">
                                        <img src="<?php echo get_the_post_thumbnail_url( $val->ID ); ?>" class="client-img" alt="client" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            endforeach;
                        ?>
                    </div>
                </div>
            </div>          
        </div>
        </div>
    </div>
</section>
<?php
    endif;
?>