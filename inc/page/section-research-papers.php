<?php if (get_field('hide_or_show_section_research_papers', $post->ID)) : ?>
<section class="research-papers-section">
    <div class="research-papers-div">
        <div class="container container-lg plr-20">
            
            <div class="row mlr-20" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12 col-md-12 plr-20">
                    <div class="heading-title-div">
                        <?php echo get_field( 'section_title_research_papers' ); ?>
                    </div>
                </div>
            </div>

            <div class="research-papers-listing-row row mlr-20" data-aos="fade-up" data-aos-duration="2000">
            <?php 
                $count = 1;
                while ( have_rows( 'research_papers_records' ) ) : the_row(); 
                    $title  = get_sub_field( 'title' );
                    $image  = get_sub_field( 'image' );
                    $content = get_sub_field( 'content' );
                    $user_name = get_sub_field( 'user_name' );
                    $pdf = get_sub_field( 'pdf' );
                ?>
                <div class="col-lg-4 col-md-6 papers-grid-4 plr-20">
                    <div class="general-papers-card-box">
                        <div class="general-papers-card-body">
                            <div class="details-div">
                                <a href="#"><h3><?php echo $title; ?></h3></a>
                                <p><?php echo $content; ?></p>
                            </div>
                            <div class="user-details-div">
                                <div class="user-info-div">
                                    <div class="image-thumb-box">
                                        <img src="<?php echo $image['url']; ?>" class="img-fluid img-responsive img-user" alt="user" />
                                    </div>
                                    <div class="image-text-div">
                                        <h5 class="user-label-text"><?php echo $user_name; ?></h5>
                                    </div>
                                </div>
                                <?php if (isset($pdf['url'])) : ?>
                                    <div class="download-details-div">
                                        <div class="download-text-div">
                                            <a href="<?php echo $pdf['url']; ?>" class="download-link" target="_blank" download>
                                                <span class="download-icon"></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    $count++;
                    endwhile; 
                ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>