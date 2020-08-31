<?php
    $post = get_post(get_the_ID());
    $sectionShow = get_field('hide_or_show_section_work_process');
    if ($sectionShow):
        $sectionTitle = get_field('section_title_work_proces');
?>
<section class="work-proccess-section">
    <div class="work-proccess-div">
        <div class="container container-lg">          
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12 col-md-12">
                    <div class="heading-title-div">
                        <?php echo $sectionTitle; ?>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12 col-md-12">
                    <div class="work-proccess-root">
                        <!-- Timeline -->
                        <div class="timeline-custom-root">
                            <div class="timeline timeline-custom">
                                <div class="timeline__wrap">
                                    <div class="timeline__items">
                                    <?php 
                                    $count = 1;
                                        while ( have_rows( 'work_processes' ) ) : the_row(); 
                                            $image      = get_sub_field( 'work_icon' );
                                            $hourLabel  = get_sub_field( 'work_hours' );
                                            $title      = get_sub_field( 'work_title' );
                                            $content    = get_sub_field( 'work_content' );
                                    ?>
                                        <div class="timeline__item timeline__item<?php echo $count; ?>">
                                            <div class="timeline__content">                                            
                                                <div class="timeline-card">
                                                    <div class="timeline-card-icon">
                                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $sectionTitle; ?>" class="img-fluid img-icon" />
                                                    </div>  
                                                    <div class="content-text-div">
                                                        <?php echo $content; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline__text__top">
                                                <h2><?php echo $title; ?></h2>
                                            </div>
                                            <div class="timeline__text__bottom">
                                                <h4><?php echo $hourLabel; ?></h4>
                                            </div>
                                        </div>
                                        <?php 
                                            $count++;
                                            endwhile; 
                                        ?>

                                        <!-- <div class="timeline__item timeline__item2">
                                            <div class="timeline__content">
                                                <div class="timeline-card">
                                                    <div class="timeline-card-icon">
                                                        <img src="assets/images/icons/benefit-01-icon-color2.svg" alt="Benefit" class="img-fluid img-icon">
                                                    </div>  
                                                    <div class="content-text-div">
                                                        <p>Scale and deploy a tested CitrusbugMINDS application into production. Incorporate user feedback and optimize algorithms to drive maximum economic value.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline__text__top">
                                                <h2><span class="span-block">Technology</span> <span class="span-block">Assessment</span></h2>
                                            </div>
                                            <div class="timeline__text__bottom">
                                                <h4>2-3 days</h4>
                                            </div>
                                        </div>

                                        <div class="timeline__item timeline__item3">
                                            <div class="timeline__content">                                        
                                                <div class="timeline-card">
                                                    <div class="timeline-card-icon">
                                                        <img src="assets/images/icons/benefit-01-icon-color2.svg" alt="Benefit" class="img-fluid img-icon">
                                                    </div>  
                                                    <div class="content-text-div">
                                                        <p>Scale and deploy a tested CitrusbugMINDS application into production. Incorporate user feedback and optimize algorithms to drive maximum economic value.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline__text__top">
                                                <h2><span class="span-block">Production </span> <span class="span-block">Trial</span></h2>
                                            </div>
                                            <div class="timeline__text__bottom">
                                                <h4>8-12 weeks</h4>
                                            </div>
                                        </div>
                                        
                                        <div class="timeline__item timeline__item4">
                                            <div class="timeline__content">
                                                <div class="timeline-card">
                                                    <div class="timeline-card-icon">
                                                        <img src="assets/images/icons/benefit-01-icon-color2.svg" alt="Benefit" class="img-fluid img-icon">
                                                    </div>  
                                                    <div class="content-text-div">
                                                        <p>Scale and deploy a tested CitrusbugMINDS application into production. Incorporate user feedback and optimize algorithms to drive maximum economic value.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline__text__top">
                                                <h2><span class="span-block">AI Application </span> <span class="span-block">Deployment in production</span></h2>
                                            </div>
                                            <div class="timeline__text__bottom">
                                                <h4>3-6 months</h4>
                                            </div>
                                        </div> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Timeline  -->
                    </div>
                </div>          
            </div>
        </div>
    </div>
</section>
<?php
    endif;
?>