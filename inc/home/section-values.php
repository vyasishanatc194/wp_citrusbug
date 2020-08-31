<?php
    $post = get_post(get_the_ID());
    $sectionShow = get_field('hide_or_show_section_values');
    if ($sectionShow):
?>
<section class="value-card-section" id="value-box-link">
    <div class="container container-lg">
        <div class="value-card-div">
        <div class="value-card-root max-width-1220" data-aos="fade-up" data-aos-duration="2000">
            <div class="row">

            <?php 
                while ( have_rows( 'values' ) ) : the_row(); 
                    $image    = get_sub_field( 'image' );
                    $title    = get_sub_field( 'title' );
                    $content    = get_sub_field( 'content' );
            ?>
            <div class="col-lg-4 col-md-4">
                <div class="value-white-box">
                <div class="img-thumb">
                    <img src="<?php echo $image['url']; ?>" alt="value01" class="img-fluid img-icon" />
                </div>  
                <div class="content-div">
                    <h2><?php echo $title; ?></h2>
                    <p><?php echo $content; ?></p>
                </div>
                </div>
            </div>
            <?php 
                endwhile; 
            ?>

            </div>
        </div>
        </div>
    </div>
</section>
<?php
    endif;
?>