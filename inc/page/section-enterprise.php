<?php if ( get_field('hide_or_show_section_enterprise') ) : 
$postType = get_post_type(get_the_ID());
?>
 
	<div class="core-content-card-full">
		<div class="container container-lg max-width-1180">
			<div class="image-content-inner-row row" data-aos="fade-up" data-aos-duration="1000">
				<div class="col-lg-12 col-md-12 img-grid-12">
					<div class="core-content-card-full-root">

						<div class="image-thumb-box image-thumb-box-left">
							<div class="image-thumb-box-header">
								<h3><?php echo get_field('section_title_enterprise', get_the_ID()); ?></h3>
							</div>
							<div class="image-thumb-box-body">
								<div class="img-div">
									<img src="<?php echo get_field('enterprise_image_1', get_the_ID())['url']; ?>" class="img-fluid img-responsive mobile-desktop" alt="image" >
									<img src="<?php echo get_field('enterprise_mobile_image_1', get_the_ID())['url']; ?>" class="img-fluid img-responsive hidden-desktop" alt="image" >
								</div>
							</div>
						</div>

						<div class="image-thumb-box image-thumb-box-right">
							<div class="image-thumb-box-header">
								<img src="<?php echo get_field('section_title_image_enterprise', get_the_ID())['url']; ?>" class="img-fluid img-top" alt="image" >
							</div>
							<div class="image-thumb-box-body">
								<div class="img-div">
									<img src="<?php echo get_field('enterprise_image_2', get_the_ID())['url']; ?>" class="img-fluid img-responsive" alt="image" >
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>