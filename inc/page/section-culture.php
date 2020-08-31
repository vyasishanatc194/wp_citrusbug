<?php if (get_field('hide_or_show_section_culture')) : ?>
<section class="general-two-column-section our-culture-column-section">
    <div class="container container-lg">
        <div class="general-two-column">
            <div class="general-two-column-root max-width-1220">
                <div class="row" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-lg-12 col-md-12">
                        <div class="heading-general-div heading-general-div2">
                            <?php echo get_field( 'culture_section_content' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>