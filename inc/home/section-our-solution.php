<?php
    $post = get_post(get_the_ID());
    $sectionShow = get_field('hide_or_show_section_solutions');
    if ($sectionShow):
        $sectionTitle = get_field('section_title_solutions');
        if (!wp_is_mobile()) {
            $industriesSectionTitle = get_field('industries_section_title');
            $capabilitiesSectionTitle = get_field('capabilities_section_title');
            $bmeTitle = get_field('bme_title');
        } else {
            $industriesSectionTitle = get_field('industries_section_mobile_title');
            $capabilitiesSectionTitle = get_field('capabilities_section_mobile_title');
            $bmeTitle = get_field('bme_mobile_title');
        }
		$bmeImage = get_field('bme_image');
?>
<section class="our-solutions-section">
    <div class="our-solutions-div">
        <div class="container container-lg">
        <div class="max-width-1220" data-aos="fade-up" data-aos-duration="2000">
            <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="heading-div">
                    <h2><?php echo $sectionTitle; ?></h2>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="our-solutions-root">
                <div class="our-solutions-box">
                    <div class="our-solutions-box-top">
                    <p><?php echo $industriesSectionTitle; ?></p>
                    </div>

                    <div class="our-solutions-box-middle">
                    <div class="icon-rows-div icon-rows-div01">
                        
                    <?php while ( have_rows( 'industries_icons' ) ) : the_row(); ?>
						
							<div class="icon-grid-box">
								<a href="<?php echo get_sub_field('link'); ?>"  title="<?php echo get_sub_field('title'); ?>">
									<div class="icon-thumb">
										<img src="<?php echo get_sub_field('image')['url']; ?>" class="img-fluid img-icon" alt="Logistics" />
									</div>
									<div class="title-div">
										<h4><?php echo get_sub_field('title'); ?></h4>
									</div>
								</a>
							</div>
						
                    <?php endwhile; ?>

                    </div>
                    <div class="our-solutions-box-center">
                        <span class="line-span">
							<?php if ($bmeImage) : ?>
								<img src="<?php echo $bmeImage['url']; ?>" class="img-fluid img-bme" alt="bme" />
							<?php endif; ?>
						</span>
                        <h4><?php echo $bmeTitle; ?></h4>
                    </div>
                    <div class="icon-rows-div icon-rows-div02">

                    <?php while ( have_rows( 'capabilities_icons' ) ) : the_row(); ?>
						
							<div class="icon-grid-box">
								<a href="<?php echo get_sub_field('link'); ?>" title="<?php echo get_sub_field('title'); ?>">
									<div class="icon-thumb">
										<img src="<?php echo get_sub_field('image')['url']; ?>" class="img-fluid img-icon" alt="Logistics" />
									</div>
									<div class="title-div">
										<h4><?php echo get_sub_field('title'); ?></h4>
									</div>
								</a>
							</div>
						
                    <?php endwhile; ?>

                    </div>                      
                    </div>
                    <div class="our-solutions-box-bottom">
                    <p><?php echo $capabilitiesSectionTitle; ?></p>
                    </div>
                </div>
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