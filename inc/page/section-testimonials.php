<?php if ( get_field('hide_or_show_section_testimonials') ) : ?>
  <section class="testimonials-section">
      <div class="testimonials-div">
        <div class="container container-lg">
          <div class="testimonials-root max-width-1320">
            <div class="row" data-aos="fade-up" data-aos-duration="2000">

              <div class="col-lg-12 col-md-12">
                <div class="heading-general-div">
                  <h3><?php echo get_field('section_title_testimonials'); ?></h3>
                </div>
              </div>

              <?php if (get_field('testimonials_records', $post->ID)) : 
                $testinmonial = get_field('testimonials_records', $post->ID);
              ?>
              <div class="col-lg-12 col-md-12">
                <div class="testimonials-card-row" data-aos="fade-up" data-aos-duration="2000">
                  <div class="testimonials-card">
                    <div class="text-box">
                      <h3 style="font-size: <?php echo get_field( 'font_size_for_testimonials_content', $testinmonial->ID ).'px'; ?>;">
                        <?php
                          $content = $testinmonial->post_content;
                          $trimmed_content = wp_trim_words( $content, 50, NULL );
                          echo '<p>'.$trimmed_content.'</p>';
                        ?>
                      </h3>
                    </div>
                    <?php if (get_the_post_thumbnail_url( $testinmonial->ID )) : ?>
                    <div class="image-thumb">
                      <img src="<?php echo get_the_post_thumbnail_url( $testinmonial->ID ); ?>" class="img-fluid img-responsive" alt="client" />
                    </div>
                    <?php else : ?>
                      <h3 style="text-align: center;"><?php echo get_field( 'testimonials_by', $testinmonial->ID ); ?></h3>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </section>
<?php endif; ?>