<?php
/**
 * Template Name: About Us Page
 * Template Post Type: post, page
 *
 */

get_header();
?>

<div class="main-middle-area">
    <?php
        get_template_part( 'inc/global/section', 'header-banner');
        get_template_part( 'inc/page/section', 'first-section');
        get_template_part( 'inc/page/section', 'core-values');
        get_template_part( 'inc/page/section', 'one-post');
        get_template_part( 'inc/global/section', 'footer-form' );
    ?>
</div>

<?php get_footer(); ?>