<?php 
if (get_field('hide_or_show_custom_post_section', $post->ID)) :
?>
<section class="image-content-card-section2">
  <div class="image-content-card-div2">
    <div class="container container-lg">      
      <div class="row" data-aos="fade-up" data-aos-duration="2000">
        <div class="col-lg-12 col-md-12">
          <div class="image-content-card-root2">

            <div class="image-content-card-box2 image-content-card-right2">
              <div class="image-content-inner-row row" data-aos="fade-up" data-aos-duration="2000">

              <?php if (get_field('set_custom_post', $post->ID)) : 
                  $customPost = get_field('set_custom_post', $post->ID);
                ?>
                <div class="col-lg-6 col-md-6 img-grid-6">
                  <div class="image-thumb-box">
                    <img src="<?php echo get_the_post_thumbnail_url( $customPost->ID ); ?>" class="img-fluid img-responsive" alt="image" >
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 content-grid-6">
                  <div class="right-content-desc">
                    <div class="desc-content-div">
						<?php if ($customPost->post_title) : ?>
					  		<h3><?php echo $customPost->post_title; ?></h3>
						<?php endif; ?>
                      <?php
                        $content = $customPost->post_content;
                        $trimmed_content = apply_filters("the_content", $content);
                        // $trimmed_content = wp_trim_words( $content, 50, NULL );
                        echo $trimmed_content;
                      ?>
						<?php if (get_field('hide_or_show_button', $customPost->ID)) : ?>
						<div class="button-row-div d-flex">
							<a href="<?php echo get_field('button_link', $customPost->ID); ?>" 
							   class="btn btn-primary-outline btn-primary-link btn-see-positions">
								<?php echo get_field('button_label', $customPost->ID); ?></a>
						</div>
						<?php endif; ?>
                    </div>
                  </div>
                </div>
                <?php endif; ?>

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