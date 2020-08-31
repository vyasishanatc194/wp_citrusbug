<?php
get_header();
?>

<div class="main-middle-area">
    <?php
        get_template_part( 'inc/global/section', 'header-banner');
        get_template_part( 'inc/page/section', 'one-post');
		get_template_part( 'inc/page/section', 'solution');
        get_template_part( 'inc/page/section', 'features');
        get_template_part( 'inc/page/section', 'benefit-dark');
        get_template_part( 'inc/page/section', 'testimonials');
        get_template_part( 'inc/page/section', 'deployment');
        get_template_part( 'inc/global/section', 'footer-form' );
    ?>
</div>

<?php get_footer(); ?>