<?php
    $post = get_post(get_the_ID());
	if ($post->ID == 3) {
?>
<section class="inner-banner-section">
	<div class="inner-banner-div" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post->ID ); ?>);">
		<div class="content-banner-root">
			<div class="container container-lg">
				<div class="row" data-aos="fade-up" data-aos-duration="2000">
					<div class="col-lg-12 col-md-12 p0">        

						<div class="content-banner content-banner-center-text">
							<div class="text-content">
								<h1 class="h1-main"><?php the_title(); ?></h1>
							</div>
						</div>

					</div>  
				</div>        
			</div>
		</div>
	</div>
</section><!--  end of inner banner  -->
<?php
	} else {
?>
<section class="inner-banner-section">
    <div class="inner-banner-div" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post->ID ); ?>);">
		<div class="content-banner-root">
			<div class="container container-lg">
				<div class="row" data-aos="fade-up" data-aos-duration="2000">
					<div class="col-lg-12 col-md-12 p0">
						<div class="content-banner <?php echo get_field('banner_text_align') ?>">
							<div class="text-content">
								<?php echo apply_filters("the_content", $post->post_content); ?>
							</div>
						</div>
					</div>  
				</div>        
			</div>
		</div>
    </div>
</section><!--  end of inner banner  -->
<?php } ?>