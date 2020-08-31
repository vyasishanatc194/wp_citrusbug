<?php
/**
 * Template Name: Core Tech Template
 * Template Post Type: post, page
 *
 */

get_header();
?>

<div class="main-middle-area">
    <?php
        get_template_part( 'inc/global/section', 'header-banner');
        get_template_part( 'inc/page/section', 'engine');
        get_template_part( 'inc/page/section', 'benefit-white');
        get_template_part( 'inc/global/section', 'footer-form' );
    ?>
</div>

<?php get_footer(); ?>