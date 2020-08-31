<?php if ( get_field('hide_or_show_section_use_cases') ) : ?>
<section class="use-cases-section">
  <div class="use-cases-div">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 p-0">
          <div class="use-cases-root">
            <div class="owl-thumb-cases-slider">
              <div class="bs-thumb-cases-slider">
                <div id="cases-slider-carousel" class="carousel slide">
                  <div class="container container-lg">
                    <div class="row" >
                      <div class="col-lg-12 col-md-12">
                        <div class="heading-title-div" data-aos="fade-up" data-aos-duration="1000">
                          <?php echo get_field('section_title_use_cases'); ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="button-group-list-center" data-aos="fade-up" data-aos-duration="2000">
                    <div class="button-group-list-center-root">
                    <?php
                        foreach ( get_field('use_case_records') as $key=>$val ) :
                          $activeClass = '';
                          if ($key == 0) {
                            $activeClass = 'active-button';
                          }
                          $key = $key + 1;
                      ?>
                      <button type="button" class="btn btn-outline-custom <?php echo $activeClass; ?> <?php echo 'slide'.$key; ?>" value="<?php echo $val->post_title; ?>"><?php echo $val->post_title; ?></button>
                      <?php endforeach; ?>
                    </div>
                  </div>

                  <ol class="carousel-indicators">
                    <?php
                        foreach ( get_field('use_case_records') as $key=>$val ) :
                          $activeImageClass = '';
                          if ($key == 0) {
                            $activeImageClass = 'active';
                          }
                          $key = $key + 1;
                      ?>
                    <li data-target="#cases-slider-carousel" data-slide-to="<?php echo $key; ?>" class="<?php echo $activeImageClass; ?>">
                      <img src="<?php echo get_the_post_thumbnail_url( $val->ID ); ?>" class="img-fluid img-use-case-banner" alt="use-cases1">
                    </li>
                    <?php endforeach; ?>
                  </ol>

                  <div class="carousel-inner">
                    <?php
                        foreach ( get_field('use_case_records') as $key=>$val ) :
                          $activeSlideClass = '';
                          if ($key == 0) {
                            $activeSlideClass = 'active';
                          }
                      ?>
                      <div class="carousel-item <?php echo $activeSlideClass; ?>">
                        <div class="carousel-caption">
                          <div class="content-text-div">
                            <h5><?php echo $val->post_title; ?></h5>
                            <?php
                              $content = get_field('short_description', $val->ID);
							  $showlink = get_field('want_to_show_read_more', $val->ID);
                              $trimmed_content =  apply_filters( 'twentyseventeen_starter_content', $content );
                              echo '<p>'.$trimmed_content.'</p>';
                            ?>
                            <div class="learmore-div">
								<?php if ( $showlink ) : ?>
                              		<a href="<?php echo get_permalink($val->ID); ?>" class="btn btn-link btn-learn-more">Learn More  >></a>
								<?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php endforeach; ?>
                  </div>
                </div>                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>