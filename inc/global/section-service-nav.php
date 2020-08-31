<?php
    $args = [
        'post_type' => 'service',
        'posts_per_page' => -1,
    ];
    $query = new WP_Query($args);
?>

<?php if ( ! wp_is_mobile() ) { ?>
<div class="mega-menu-wrap mega-menu-products-wrap">
    <div class="wrapper">
        <div class="menus">
            <ul class="menu-terms">
                <?php
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                        <li class="<?php echo $class;?>">
                            <a href="<?php echo get_permalink( get_the_ID() ); ?>" data-term="<?php the_ID();?>">
                                <span class="entry-text"><?php the_title();?></span>
                                <span class="fa fa-chevron-right" aria-hidden="true"></span>
                            </a>
                        </li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                ?>
            </ul>
          
        </div>
    </div>
</div>
<?php } else { ?>
    <ul class="sub-collapse-list-root">
        <?php
            while ( $query->have_posts() ) : $query->the_post(); ?>
                <li class="<?php echo $class;?>">
                    <a href="<?php echo get_permalink( get_the_ID() ); ?>" data-term="<?php the_ID();?>">
                        <span class="entry-text"><?php the_title();?></span>
                        <span class="fa fa-chevron-right" aria-hidden="true"></span>
                    </a>
                </li>
        <?php
            endwhile;
            wp_reset_postdata();
        ?>
    </ul>
<?php } ?>