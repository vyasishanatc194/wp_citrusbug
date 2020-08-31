<?php if (get_field('hide_or_show_section_industries_solution', $post->ID)) : ?>
<section class="solution-architecture-section">
    <div class="solution-architecture-div">
        <div class="container container-lg">        
            <div class="solution-architecture-root">            
                <div class="row" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-lg-12 col-md-12">
                    <div class="heading-general-div">
                        <h3><?php echo get_field( 'section_title_solution' ); ?></h3>
                        <p><?php echo get_field( 'section_sub_title_solution' ); ?></p>
                    </div>
                    </div>
                </div>

                <div class="row mlr-40" data-aos="fade-up" data-aos-duration="2000">
                <?php 
                    $count = 1;
                    while ( have_rows( 'solutions_industries' ) ) : the_row();
                        $image  = get_sub_field( 'solution_image' );
                        $content = get_sub_field( 'solution_text' );
                    ?>
                        <div class="col-lg-4 col-md-4 plr-40">
                            <div class="info-graphic-general-card">
                                <div class="img-thumb-div">
                                    <?php if(isset($image['url'])) : ?>
                                        <img src="<?php echo $image['url']; ?>" class="img-fluid img-responsive" alt="Infographic" />
                                    <?php endif; ?>
                                </div>
                                <div class="info-desc-text">
                                <p><?php echo $content; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php 
                        $count++;
                        endwhile; 
                    ?>
                </div>
				<?php if (get_field('contact_button_label')) : ?>
                <div class="row" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-lg-12 col-md-12">
                        <div class="button-row-div d-flex">
                            <a href="#form-get-in-touch" class="btn btn-primary-common btn-primary-link btn-contact-us"> <?php echo get_field('contact_button_label'); ?></a>
                        </div>
                    </div>
                </div> 
				<?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>