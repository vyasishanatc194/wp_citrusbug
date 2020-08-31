<?php
/**
 * Template Name: Core Tech 2 Template
 * Template Post Type: post, page
 *
 */

get_header();
?>

<div class="main-middle-area">
    <?php
        get_template_part( 'inc/global/section', 'header-banner');
		echo '<section class="core-tech-card-section"><div class="core-tech-card-div">  ';
		get_template_part( 'inc/page/section', 'enterprise');
		get_template_part( 'inc/page/section', 'tech-records');
		echo '</div></section>';
        get_template_part( 'inc/page/section', 'benefit-white');
        get_template_part( 'inc/global/section', 'footer-form' );
    ?>
</div>

<?php get_footer(); ?>