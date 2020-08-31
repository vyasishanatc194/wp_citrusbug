<?php if ( get_field('hide_or_show_section_feature') ) : 
$postType = get_post_type(get_the_ID());
?>
<section class="features-card-section <?php echo ($postType == 'use_cases') ? 'features-white-card-section' : ''; ?>">
  <div class="features-card-div">
    <div class="container container-lg">
      
      <div class="row" data-aos="fade-up" data-aos-duration="2000">
        <div class="col-lg-12 col-md-12">
          <div class="heading-title-div">
            <h2><?php echo get_field('section_title_feature'); ?></h2>
          </div>
        </div>
      </div>

      <div class="row" data-aos="fade-up" data-aos-duration="2000">
        <div class="col-lg-12 col-md-12">
          <div class="features-card-root">
          <?php
              foreach ( get_field('feature_records') as $key=>$val ) :
                $alignClass = get_field('first_feature_record_class');
                if ($key % 2 == 0) {
                  if ($alignClass == 'features-card-box-right') {
                    $alignClass = 'features-card-box-left';
                  } else {
                    $alignClass = 'features-card-box-right';
                  }
                }
            ?>
            <div class="features-card-box <?php echo $alignClass; ?>">
              <div class="feature-inner-row">
                <div class="image-thumb-box">
                  <img src="<?php echo get_the_post_thumbnail_url( $val->ID ); ?>" class="img-fluid img-features" alt="features" >
                </div>
                <div class="desc-content-div">
                  <h3><?php echo $val->post_title; ?></h3>
                  <?php
                    $content = $val->post_content;
                    $trimmed_content = wp_trim_words( $content, 50, NULL );
                    echo '<p>'.$trimmed_content.'</p>';
                  ?>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>  
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="button-row-div d-flex">
            <a href="#form-get-in-touch" class="btn btn-primary-common btn-primary-link btn-contact-us"> <?php echo get_field('contact_button_label'); ?> </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<?php endif; ?>