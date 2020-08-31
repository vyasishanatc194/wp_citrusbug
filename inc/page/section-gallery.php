<?php if ( get_field('hide_or_show_section_gallery') ) : ?>
<section class="our-company-slider-section">
  <div class="our-company-slider-div">
    <div class="container container-lg">      
      <div class="row" data-aos="fade-up" data-aos-duration="2000">

        <div class="col-lg-12 col-md-12">
          <div class="heading-left-div">
              <?php
                $content = get_field('section_title_gallery');
                $trimmed_content = apply_filters("twentyseventeen_starter_content", $content);
                echo $trimmed_content;
              ?>
          </div>

          <div class="company-slider-root" data-aos="fade-up" data-aos-duration="2000">
            <div class="owl-carousel owl-theme owl-company-slider" id="owl-company-slider">
              <?php
                if (count(get_field('gallery_images')) > 0) :
                foreach ( get_field('gallery_images') as $key=>$val ) : 
              ?>
              <div class="item">
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="company-slider-box">
                      <div class="banner-thumb-div">
                        <img src="<?php echo $val['image']['url']; ?>" alt="" class="img-fluid img-company-slider" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                endforeach;
                endif;
              ?>
            </div>
          </div>          
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>