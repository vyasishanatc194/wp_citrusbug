<?php if ( get_field('hide_or_show_section_our_values', $post->ID) ) : ?>
<section class="core-values-benefits-section">
    <div class="core-values-benefits-div">
        <div class="container container-lg">
            <div class="core-values-benefits-root">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-duration="2000">
                        <div class="heading-left-general-div">
                            <?php echo get_field('section_content_our_values', $post->ID); ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row" data-aos="fade-up" data-aos-duration="2000">
                        <?php if (count(get_field('our_values_records', $post->ID)) > 0) :
                            foreach ( get_field('our_values_records', $post->ID) as $key=>$val ) : ?>
                            <div class="col-lg-12 col-md-12">
                                <div class="card-icon-white-box-number">
                                    <div class="number-thumb">
                                        <span class="number-big"><?php echo $val['counter_our_values_record']; ?></span>
                                    </div>  
                                    <div class="content-div">
                                        <h3><?php echo $val['title_of_our_values_record']; ?></h3>
                                        <?php
                                            $content =  $val['content_of_our_values_record'];
                                            $trimmed_content = wp_trim_words( $content, 15, NULL );
                                            echo '<p>'.$trimmed_content.'</p>';
                                        ?>
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