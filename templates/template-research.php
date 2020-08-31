<?php
/**
 * Template Name: Research Template
 * Template Post Type: post, page
 *
 */

get_header();
?>

<div class="main-middle-area">
    <?php
        get_template_part( 'inc/global/section', 'header-banner');
        get_template_part( 'inc/page/section', 'research-impact');
        get_template_part( 'inc/page/section', 'research-papers');
        get_template_part( 'inc/page/section', 'research-content');
        get_template_part( 'inc/global/section', 'footer-form' );
    ?>
</div>

<?php get_footer(); ?>