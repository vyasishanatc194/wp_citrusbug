<?php
/**
 * Template Name: Home Page
 * Template Post Type: post, page
 *
 */

get_header();
?>

<div class="main-middle-area">
    <?php
        get_template_part( 'inc/home/section', 'header-banner');
        get_template_part( 'inc/home/section', 'values');
        get_template_part( 'inc/home/section', 'our-solution');
        get_template_part( 'inc/home/section', 'solved-problems');
        get_template_part( 'inc/home/section', 'work-process');
        get_template_part( 'inc/home/section', 'our-clients');
        get_template_part( 'inc/global/section', 'footer-form' );
    ?>
</div>

<?php get_footer(); ?>