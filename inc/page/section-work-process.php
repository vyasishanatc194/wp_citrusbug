<?php if ( get_field('hide_or_show_section_work_process') ) : ?>
  <section class="work-proccess2-section">
    <div class="container container-lg">
      <div class="work-proccess2-div">
        <div class="work-proccess2-root max-width-1220"> 
          <div class="row" data-aos="fade-up" data-aos-duration="2000">

            <div class="col-lg-12 col-md-12">
              <div class="heading-general-div">
                <h3><?php echo get_field('section_title_work'); ?></h3>
                <p><?php echo get_field('section_sub_title_work'); ?></p>
              </div>
            </div>
            <?php if(get_field('word_process_steps')[0]['top_label'] != '') : ?>
            <div class="col-lg-12 col-md-12">
              <div class="contant-general-div" >                
                <!-- Timeline -->
                <div class="timeline-process-custom-root" data-aos="fade-up" data-aos-duration="2000">
                  <div class="timeline-process">
                    <div class="timeline__wrap">
                      <div class="timeline__items">
                        <?php 
                          $count = 1;
                          while ( have_rows( 'word_process_steps' ) ) : the_row(); 
                              $topLabel     = get_sub_field( 'top_label' );
                              $bottomLabel  = get_sub_field( 'bottom_label' );
                              $selectedClass = ($count == 4) ? 'selected' : '';
                        ?>
                        <div class="timeline__item timeline__item--top timeline__item1 timeline000 <?php echo $selectedClass; ?>">
                          <div class="timeline__text__top">
                            <h2><?php echo $topLabel; ?></h2>
                          </div>
                          <div class="timeline__text__bottom">
                            <p><?php echo $bottomLabel; ?></p>
                          </div>
                        </div>
                        <?php 
                          $count++;
                          endwhile; 
                        ?>
                      </div>
                    </div>
                    <span class="timeline-divider"></span>
                  </div>                  
                </div>                
                <!-- End of Timeline  -->
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>