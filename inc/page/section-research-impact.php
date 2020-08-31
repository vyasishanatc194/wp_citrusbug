<?php if (get_field('hide_or_show_section_impact_research', $post->ID)) : ?>
<section class="image-content-card-section">
    <div class="image-content-card-div">
        <div class="container container-lg">            
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12 col-md-12">
                    <div class="image-content-card-root">
                        <div class="image-content-card-box image-content-card-right">
                            <div class="image-content-inner-row row">
                                <div class="col-lg-6 col-md-6 img-grid-6">
                                    <div class="image-thumb-box">
                                        <div class="research-view-root">
                                        <?php 
                                        $count = 1;
                                        $class = 'top-right-view-box';
                                        while ( have_rows( 'research_impact_records' ) ) : the_row(); 
                                            $number= get_sub_field( 'research_impact_number' );
                                            $icon  = get_sub_field( 'research_impact_icon' );
                                            $title = get_sub_field( 'research_impact_title' );
                                            if ($count == 1) { $class1 = 'top-right-round'; }
                                            if ($count == 2) { $class = 'bottom-right-view-box'; $class1 = 'top-right-round'; }
                                            if ($count == 3) { $class = 'bottom-left-view-box'; $class1 = 'bottom-left-round'; }
                                        ?>
                                            <div class="research-view-box <?php echo $class; ?>">
                                                <div class="research-view-round-big">
                                                    <div class="icon-view-div">
                                                        <img src="<?php echo $icon['url']; ?>" class="research-icon" alt="research" />
                                                    </div>
                                                    <div class="text-div">
                                                        <h4><?php echo $title; ?></h4>
                                                    </div>
                                                </div>
                                                <div class="research-view-round-small <?php echo $class1; ?>">
                                                    <span class="text-span"><?php echo $number; ?></span>
                                                </div>
                                            </div>
                                        <?php 
                                            $count++;
                                            endwhile; 
                                        ?>

                                            <!-- <div class="research-view-box bottom-right-view-box">
                                                <div class="research-view-round-big">
                                                    <div class="icon-view-div">
                                                        <img src="assets/images/icons/research-icon03.svg" class="research-icon" alt="research" />
                                                    </div>
                                                    <div class="text-div">
                                                        <h4>Applied research to come up with suitable solution</h4>
                                                    </div>
                                                </div>
                                                <div class="research-view-round-small bottom-right-round">
                                                    <span class="text-span">02</span>
                                                </div>
                                            </div>                                            
                                            <div class="research-view-box bottom-left-view-box">
                                                <div class="research-view-round-big">
                                                    <div class="icon-view-div">
                                                        <img src="assets/images/icons/research-icon02.svg" class="research-icon" alt="research" />
                                                    </div>
                                                    <div class="text-div">
                                                        <h4>Technology update with the new algorithm</h4>
                                                    </div>
                                                </div>
                                                <div class="research-view-round-small bottom-left-round">
                                                    <span class="text-span">03</span>
                                                </div>
                                            </div> -->

                                        </div>                                    
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 content-grid-6">
                                    <div class="right-content-desc">
                                        <div class="desc-content-div">
                                            <h3><?php echo get_field( 'section_title_impact_research' ); ?></h3>
                                            <p><?php echo get_field( 'section_content_impact_research' ); ?></p>
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