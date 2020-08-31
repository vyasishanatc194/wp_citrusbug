<?php if ( get_field('hide_or_show_section_approach') ) : ?>
<section class="general-illustration-section">
  <div class="general-illustration-div">
    <div class="container container-lg">
      <div class="general-illustration-root max-width-1220">
        <div class="row" data-aos="fade-up" data-aos-duration="2000">

          <div class="col-lg-12 col-md-12">
            <div class="heading-general-div">
                <h3><?php echo get_field('section_title_approach'); ?></h3>
                <p><?php echo get_field('section_sub_title_approach'); ?></p>
            </div>
          </div>

          <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-duration="2000">
            <div class="contant-general-div">
              <div class="thumb-banner-image">
                <img src="<?php echo get_field('ai_post')['url']; ?>" class="img-fluid img-responsive" alt="img" />
              </div>
            </div>
          </div>

          <div class="col-lg-12 col-md-12">
            <div class="button-row-div d-flex">
              <a href="<?php echo get_field('approach_link'); ?>" class="btn btn-primary-outline btn-primary-link btn-learn-more"> Learn More </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>