<?php
/**
 * Template Name: Industries Template
 * Template Post Type: post, page
 *
 */

get_header();
?>

<div class="main-middle-area">
    <?php
        get_template_part( 'inc/blog/section', 'blog-listing');
        get_template_part( 'inc/global/section', 'footer-form' );
    ?>
</div>

<?php get_footer(); ?>