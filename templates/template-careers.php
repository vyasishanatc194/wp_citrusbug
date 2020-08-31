<?php
/**
 * Template Name: Careers Template
 * Template Post Type: post, page
 *
 */

get_header();
?>

<div class="main-middle-area">
    <?php
        get_template_part( 'inc/global/section', 'header-banner');
        get_template_part( 'inc/page/section', 'culture');
        get_template_part( 'inc/page/section', 'gallery');
        get_template_part( 'inc/page/section', 'benefits-dark');
        get_template_part( 'inc/global/section', 'footer-form' );
    ?>
</div>

<?php get_footer(); ?>