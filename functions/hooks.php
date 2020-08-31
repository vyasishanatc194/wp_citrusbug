<?php


/**
 * Customize TinyMCE editor font size
 */
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
    function wpex_mce_text_sizes( $initArray ) {
        $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 19px 20px 21px 24px 28px 32px 36px";
        return $initArray;
    }
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );

/**
 * Post Thumbnail in admin columns
 */
if ( function_exists( 'add_theme_support' ) ) {
    add_filter( 'manage_posts_columns', 'posts_columns', 5 );
    add_action( 'manage_posts_custom_column', 'posts_custom_columns', 5, 2 );
    add_filter( 'manage_pages_columns', 'posts_columns', 5 );
    add_action( 'manage_pages_custom_column', 'posts_custom_columns', 5, 2 );
}
function posts_columns( $defaults ) {
    $defaults['wps_post_thumbs'] = __( 'Featured Image', 'qstheme' );
    return $defaults;
}
function posts_custom_columns( $column_name, $id ) {
    if ( $column_name === 'wps_post_thumbs' ) {
        echo the_post_thumbnail( array( 40, 40 ) );
    }
}



/**
 * Main Menu Walker - Change sub-menu item
 */
class Main_Menu_Walker extends Walker_Nav_Menu {
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        if ( is_singular('capability') && in_array( 'capability-nav', $classes ) ) {
            $classes[] = 'current-menu-item';
        }

        if ( is_singular('service') && in_array( 'service-nav', $classes ) ) {
            $classes[] = 'current-menu-item';
        }

        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
        
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        
        
        if ( in_array( 'capability-nav', $classes ) ) {
            ob_start();
            if ( ! wp_is_mobile() ) {
                get_template_part( 'inc/global/section', 'capability-nav' );
            }  else {
                // mobile nav
               get_template_part( 'inc/global/section', 'capability-nav' );
            }
            $output .= ob_get_clean();
        }

        if ( in_array( 'service-nav', $classes ) ) {
            ob_start();
            if ( ! wp_is_mobile() ) {
                get_template_part( 'inc/global/section', 'service-nav' );
            } else {
                // mobile nav
                get_template_part( 'inc/global/section', 'service-nav' );
            }

            $output .= ob_get_clean();
        }

        if ( in_array( 'indusries-nav', $classes ) ) {
            ob_start();
            if ( ! wp_is_mobile() ) {
                get_template_part( 'inc/global/section', 'indusries-nav' );
            } else {
                // mobile nav
                get_template_part( 'inc/global/section', 'indusries-nav' );
            }

            $output .= ob_get_clean();
        }

    }
}

/**
 * Main Menu Walker - Change sub-menu item
 */
class Main_Menu_Walker_Mobile extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $count = 1;
        $output .= "\n<div class=\"collapse\" id=\"solutions\">\n";
        $output .= "\n<ul class=\"collapse-list-root ".$depth." \">\n";
    }
    
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
        
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        // print_r($item);
        if ( is_singular('capability') && in_array( 'capability-nav', $classes ) ) {
            $classes[] = 'current-menu-item';
        }

        if ( is_singular('service') && in_array( 'service-nav', $classes ) ) {
            $classes[] = 'current-menu-item';
        }

        if (  is_singular('indusries') && in_array( 'indusries-nav', $classes ) ) {
            $classes[] = 'current-menu-item';
        }

        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
        
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';
        
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
        
        $attributes = '';
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $downArrow = ( '#' === $value && $item->menu_item_parent == 0 ) ? '<span class="menu-arrow-icon-color01"></span>' : '';
                $subdownArrow = ($item->menu_item_parent != 0) ? '<span class="menu-arrow-icon-color02"></span>' : '';
                $extraAttr = ( '#' === $value && $item->menu_item_parent == 0 ) ? 'data-toggle="collapse" class="nav-link collapsed"' : '';  
                $subextraAttr = ($item->menu_item_parent != 0) ? 'data-toggle="collapse" class="sub-title-top collapsed"' : '';
                $value = ( '#' === $value ) ? esc_attr('#'.str_replace(" ", "-", strtolower($title))) : esc_url( $value );
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .' '. $extraAttr . $subextraAttr . '>';
        $item_output .= $args->link_before . $downArrow . $subdownArrow . $title . $args->link_after;
        $item_output .= '</a>';        
        $item_output .= $args->after;
        // print_r($item);
        

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        
        
        if ( in_array( 'capability-nav', $classes ) ) {
            ob_start();
            
            if ( ! wp_is_mobile() ) {
                get_template_part( 'inc/global/section', 'capability-nav' );
            }  else {
                // mobile nav
               echo '<div class="collapse" data-toggle="collapse" id="'. esc_attr(str_replace(" ", "-", strtolower($title))) .'">';
                get_template_part( 'inc/global/section', 'capability-nav' );
               echo '</div>';
            }
            $output .= ob_get_clean();
        }

        if ( in_array( 'service-nav', $classes ) ) {
            ob_start();
            if ( ! wp_is_mobile() ) {
                get_template_part( 'inc/global/section', 'service-nav' );
            } else {
                // mobile nav
                echo '<div class="collapse" data-toggle="collapse" id="'. esc_attr(str_replace(" ", "-", strtolower($title))) .'">';
                    get_template_part( 'inc/global/section', 'service-nav' );
                echo '</div>';
            }

            $output .= ob_get_clean();
        }

        if ( in_array( 'indusries-nav', $classes ) ) {
            ob_start();
            if ( ! wp_is_mobile() ) {
                get_template_part( 'inc/global/section', 'indusries-nav' );
            } else {
                // mobile nav
                echo '<div class="collapse" data-toggle="collapse" id="'. esc_attr(str_replace(" ", "-", strtolower($title))) .'" >';
                    get_template_part( 'inc/global/section', 'indusries-nav' );
                echo '</div>';
            }

            $output .= ob_get_clean();
        }

    }
}

add_action( 'wp_footer', 'redirect_cf7' );
 
function redirect_cf7() { ?>
<script type="text/javascript">
//     document.addEventListener( 'wpcf7mailsent', function( event ) {
//         if ( '81' == event.detail.contactFormId ) {
//             jQuery("#wpcf7-f81-o1, .heading-title-div").hide();
//             jQuery('.get-in-touch-success').show();
//             jQuery('.get-in-touch-success').delay(15000).fadeOut(500);
//             jQuery("#wpcf7-f81-o1, .heading-title-div").delay(15000).fadeIn(500);
//         }
//     }, false );
</script>
<?php
}


