<?php
    get_header();
?>
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/blog-details.css" media="all" rel="stylesheet" type="text/css" />
<div class="main-middle-area">
    <?php
        get_template_part( 'inc/blog/section', 'blog-detail');
        get_template_part( 'inc/global/section', 'footer-form' );
    ?>
</div>

<?php get_footer(); ?>