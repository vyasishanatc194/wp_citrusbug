<?php if ( get_field('hide_or_show_section_records_tech') ) : 
$postType = get_post_type(get_the_ID());
$rightSide = 'core-content-card-right';
$leftSide = 'core-content-card-left';
$count = 1;
while ( have_rows( 'tech_records' ) ) : the_row(); 
	$text  = get_sub_field( 'text' );
	$image = get_sub_field( 'image' );
	if ($count % 2) {
		$class = $rightSide;
	} else {
		$class = $leftSide;
	}
?>
<div class="core-content-card-box <?php echo $class; ?>" >
	<div class="container container-lg">
		<div class="image-content-inner-row row" data-aos="fade-up" data-aos-duration="1000">
			<div class="col-lg-6 col-md-6 img-grid-6">
				<div class="image-thumb-box">
					<?php if ($image) : ?>
						<img src="<?php echo $image['url']; ?>" class="img-fluid img-responsive" alt="image" >
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 content-grid-6">
				<div class="right-content-desc">
					<div class="desc-content-div">
						<?php echo $text; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	$count++;
	endwhile; 
?>
<?php endif; ?>