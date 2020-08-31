<?php
get_header();
?>

<div class="main-middle-area">
    <?php
        get_template_part( 'inc/global/section', 'header-banner');
        get_template_part( 'inc/page/section', 'one-post');
        get_template_part( 'inc/page/section', 'work-process');
        get_template_part( 'inc/page/section', 'our-benefit');
//         get_template_part( 'inc/page/section', 'use-cases');
        get_template_part( 'inc/page/section', 'approch');
        get_template_part( 'inc/page/section', 'our-clients');
        get_template_part( 'inc/page/section', 'testimonials');
        get_template_part( 'inc/global/section', 'footer-form' );
    ?>
</div>

<?php get_footer(); ?>