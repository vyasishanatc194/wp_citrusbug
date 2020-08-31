<?php
/**
 * Helpers functions for the theae
 *
 * @package WordPress
 * @subpackage Theme
 */

class QS {

	/**
	 * Debug
	 *
	 * @param array/object $var array or object to debug.
	 */
	static function debug( $var ) {
		echo "<pre style='direction:ltr; text-align:left'>";
		print_r( $var );
		echo '</pre>';
	}

	/**
	 * Theme Pagination
	 */
	static function theme_pagination() {
		global $wp_query;
		$big = 999999999;
		echo paginate_links(
			array(
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $wp_query->max_num_pages,
				'prev_text' => '&lt',
				'next_text' => '&gt',
				'type'      => 'plain',
				'add_args'  => false,
			)
		);
	}

	/**
	 * Output the post thumbnail or "no-thumbnail image"
	 *
	 * @param string $size image size.
	 */
	static function the_post_thumbnail( $size ) {
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( $size );
		} elseif ( get_field( 'no_thumbnail', 'option' ) ) {
			$image = get_field( 'no_thumbnail', 'option' );?>
			<img src="<?php echo $image['sizes'][ $size ]; ?>" alt="<?php echo $image['alt']; ?>" />
			<?php
		} else {
			?>
			<div class="no-thumbnail">
			<?php esc_attr_e( 'Please add thumbnail or "No Thumbnail Image" if you have no thumbnail (see theme options)', 'qstheme' ); ?>
			</div>
			<?php
		}
	}

	/**
	 * Retrieve the post thumbnail src or "no-thumbnail image"
	 *
	 * @param string $size image size.
	 */
	static function get_post_thumbnail( $size ) {
		global $post;
		if ( has_post_thumbnail() ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
			return $image[0];
		} elseif ( get_field( 'no_thumbnail', 'option' ) ) {
			$image = get_field( 'no_thumbnail', 'option' );
			return $image['sizes'][ $size ];
		}
	}

	/**
	 * Get post thumbnail data
	 * @param  str $post_id
	 * @param  str $size      Image size
	 * @return array          Array of image data
	 */
	static function get_post_thumbnail_data( $post_id ) {
		$image_id       = get_post_thumbnail_id( $post_id );
		$image_post     = get_post( $image_id );
		$images_sizes   = get_intermediate_image_sizes();
		foreach ( $images_sizes as $image_size ) {
			$image_sizes_urls[ $image_size ] = wp_get_attachment_image_src( $image_id, $image_size )[0];
		}

		return array(
			'sizes'         => $image_sizes_urls,
			'alt'           => get_post_meta( $image_id, '_wp_attachment_image_alt', true ),
			'title'         => $image_post->post_title,
			'caption'       => $image_post->post_excerpt,
			'description'   => $image_post->post_content,
		);
	}

	/**
	 * Output the page title
	 */
	static function the_title() {
		if ( is_tax( 'product_cat' ) ) {
			$object = get_queried_object();
			echo get_field( 'header_title', $object ) ? get_field( 'header_title', $object ) : single_term_title();
		} elseif ( is_tax( 'video_cat' ) ) {
			the_field( 'video_title', 'option' );
		} elseif ( is_post_type_archive( 'faq' ) || is_tax( 'faq_cat' ) ) {
			_e( 'FAQ', 'qstheme' );
		} elseif ( ( is_single() || is_page() ) && $title = get_field( 'title' ) ) {
			echo $title;
		} elseif ( is_post_type_archive( 'video' ) ) {
			echo QS::mega_get_field( 'title' );
		} elseif ( is_category() ) {
			single_cat_title();
		} elseif ( is_page() ) {
			echo get_the_title();
		} elseif ( is_archive() && ! is_tax() && ! is_tag() ) {
			post_type_archive_title();
		} elseif ( is_tax() ) {
			single_term_title();
		} elseif ( is_tag() ) {
			echo single_tag_title();
		} elseif ( is_singular() ) {
			single_post_title();
		} elseif ( is_post_type_archive() ) {
			echo post_type_archive_title();
		} elseif ( is_search() ) {
			esc_html_e( 'Search Results', 'qstheme' );
		} elseif ( is_404() ) {
			esc_html_e( '404 - Page Not Found', 'qstheme' );
		}
	}

	/**
	 * Output the page title
	 */
	static function the_post_title() {
		if ( is_post_type_archive( 'career' ) ) {
			the_title();
		} elseif ( $title = get_field( 'title' ) ) {
			echo $title;
		} else {
			the_title();
		}
	}

	/**
	 * Get field including default field, archive fields and tax\cat field
	 *
	 * @param  string $field_id ACF field id.
	 * @return ACF field
	 */
	static function mega_get_field( $field_id ) {
		if ( is_post_type_archive() ) {
			// acf archive fields must have a prefix with single post name, i.e: product-content.
			$obj   = get_queried_object();
			$name  = $obj->name;
			$field = get_field( "{$name}_{$field_id}", 'option' );
		} elseif ( is_tax() || is_category() ) {
			$term = get_queried_object();

			if ( get_field( $field_id, $term ) ) {
				$field = get_field( $field_id, $term );
			} elseif ( $term->parent && get_field( $field_id, $term->taxonomy . '_' . $term->parent ) ) {
				$field = get_field( $field_id, $term->taxonomy . '_' . $term->parent );
			}
		} elseif ( get_field( $field_id ) ) {
			$field = get_field( $field_id );
		}

		if ( ! isset( $field ) && get_field( $field_id, 'option' ) ) {
			$field = get_field( $field_id, 'option' );
		}

		if ( isset( $field ) ) {
			return $field;
		}
	}

	/**
	 * Print WPC7 Form
	 *
	 * @param  int $field_id   wpcf7 form id.
	 */
	static function do_wpcf7( $field_id ) {
		$form_id = get_field( $field_id ) ? get_field( $field_id ) : get_field( $field_id, 'option' );
		echo do_shortcode( '[contact-form-7 id="' . $form_id . '"]' );
	}

	/**
	 * Get post term (first only)
	 *
	 * @param  string $taxonomy taxonomy name.
	 * @return obj              term object.
	 */
	static function get_post_term( $taxonomy ) {
		global $post;
		$terms = get_the_terms( $post, $taxonomy );
		if ( ! empty( $terms ) ) {
			$term = reset( $terms );
		}
		$term = isset( $term ) ? $term : '';
		return $term;
	}

	/**
	 * Get post term title (first only)
	 *
	 * @param  string $taxonomy taxonomy name.
	 * @return string first term.
	 */
	static function get_post_term_title( $taxonomy ) {
		$term = QS::get_post_term( $taxonomy );
		return $term->name;
	}

	/**
	 * Generates Google Map - the_map($map_id, $zoom, $field_id, $multimarker)
	 *
	 * @param  string  $map_id      The ID of the map's wrapper. default: map-canvas.
	 * @param  integer $zoom        Zoom of the map. default: 13.
	 * @param  string  $field_id    ACF's map field id. default: map.
	 */
	static function the_map( $map_id = 'map-canvas', $zoom = 13, $field_id = 'map' ) {
		// variables.
		$key       = get_field( 'google_maps_key', 'option' );
		$map       = get_field( $field_id ) ? get_field( $field_id ) : get_field( $field_id, 'option' );
		$mapmarker = get_field( 'map_marker', 'option' ) ? get_field( 'map_marker', 'option' ) : '';
		$lang      = is_rtl() ? 'iw' : '';
		$lat       = $map['lat'] ? $map['lat'] : '';
		$lng       = $map['lng'] ? $map['lng'] : '';
		$address   = $map['address'] ? $map['address'] : '';

		// enqueue.
		wp_enqueue_script( 'googlemaps', "https://maps.googleapis.com/maps/api/js?key={$key}&language={$lang}", '', '', true );
		?>

		<div class="entry-map">
			<div id="<?php echo esc_attr( $map_id ); ?>" class="map-canvas" data-lat="<?php echo esc_attr( $lat ); ?>" data-lng="<?php echo esc_attr( $lng ); ?>" data-address="<?php echo esc_attr( $address ); ?>" data-zoom="<?php echo esc_attr( $zoom ); ?>" data-mapmarker="<?php echo esc_attr( $mapmarker ); ?>"></div>
		</div>

		<?php
	}

	/**
	 * Google Map - the_multimarker_map( $map_id, $zoom, $field_id )
	 *
	 * @param  string  $map_id The ID of the map's wrapper. default: map-canvas.
	 * @param  integer $zoom   Zoom of the map. default: 13.
	 */
	static function the_multimarker_map( $map_id = 'map-canvas', $zoom = 13 ) {
		// variables.
		$key       = get_field( 'google_maps_key', 'option' );
		$maps      = get_field( 'map-repeater' ); // Notice field ID MUST BE map-repeater.
		$mapmarker = get_field( 'map-marker', 'option' ) ? get_field( 'map-marker', 'option' ) : '';
		$lang      = is_rtl() ? 'iw' : '';

		// enqueue.
		wp_enqueue_script( 'googlemaps', "https://maps.googleapis.com/maps/api/js?key={$key}&language={$lang}", '', '', true );
		?>

		<script type="text/javascript">
			var maps = <?php echo wp_json_encode( $maps ); ?>
		</script>

		<div class="entry-map">
			<div id="<?php echo esc_attr( $map_id ); ?>" class="map-canvas" data-zoom="<?php echo esc_attr( $zoom ); ?>" data-mapmarker="<?php echo esc_attr( $mapmarker ); ?>"></div>
		</div>

		<?php
	}

	/**
	 * Highlight given words in a sting
	 *
	 * @param  string $text  String.
	 * @param  string $words Words to highlight.
	 * @return string        String with highlighted words
	 */
	static function highlight( $text, $words ) {
		$highlighted = preg_filter( '/' . preg_quote( $words ) . '/i', '<strong class="highlight">$0</strong>', $text );

		if ( ! empty( $highlighted ) ) {
			$text = $highlighted;
		}

		return $text;
	}

	/**
	 * Trim Words
	 *
	 * @param  integer $int        numbers of words to show.
	 */
	static function the_excerpt( $int = 10 ) {
		$content         = has_excerpt() ? get_the_excerpt() : get_the_content();
		$trimmed_content = wp_trim_words( $content, $int );
		echo esc_attr( $trimmed_content );
	}

	/**
	 * Get trim words
	 *
	 * @param  integer $int Number of words to trim out of string.
	 * @return string       Trimmed content
	 */
	static function get_the_excerpt( $int = 10 ) {
		if ( has_excerpt() ) {
			$content = get_the_excerpt();
		} else {
			$content = get_the_content();
		}

		return wp_trim_words( $content, $int );
	}

	/**
	 * Get first term name of current post
	 *
	 * @param  string   $taxonomy taxonomy name
	 * @return string   Term Name
	 */
	static function get_first_term_name( $taxonomy ) {
		global $post;

		$terms = get_the_terms( $post, $taxonomy );
		if ( ! empty( $terms ) ) {
			return $terms[0]->name;
		} else {
			return;
		}
	}

	/**
	 * Get all terms names of current post
	 *
	 * @param  string   $taxonomy taxonomy name
	 * @return string   Terms Names
	 */
	static function get_all_terms_names( $taxonomy ) {
		global $post;

		$terms = get_the_terms( $post, $taxonomy );
		if ( ! empty( $terms ) ) {
			$out = array();

			foreach ( $terms as $term ) {
				$out[] = $term->name;
			}

			return join( ', ', $out );
		}
	}

	/**
	 * Get post type title
	 * @param  string $post_type
	 * @return string Post type title
	 */
	static function get_post_type_title( $post_type ) {
		return get_post_type_object( $post_type )->label;
	}

	/**
	 * Get nav menu name
	 * @return string
	 */
	static function get_nav_menu_name( $location ) {
		$locations = get_nav_menu_locations();
		$menu_id = $locations[ $location ];

		$nav_menu = wp_get_nav_menu_object( $menu_id );
		return $nav_menu->name;
	}

	/**
	 * Displays a navigation menu if exists in location. If not - displays a message.
	 * @param  $location
	 * @return HTML|string
	 */
	static function nav_menu( $location ) {
		if ( has_nav_menu( $location ) ) {
			wp_nav_menu(
				array(
					'theme_location' => $location,
					'menu_class' => 'nav-menu',
				)
			);
		} else {
			_e( 'Please assign a menu to this location. See Admin Panel: Appearance > Menus ', 'qstheme' );
		}
	}

	/**
	 * Print ACF Link
	 * @param  string $field_id
	 * @param  string $button_class
	 * @param  string $icon_class
	 * @return HTML of button
	 */
	static function acf_link( $field_id, $button_class = '', $icon_class = '' ) {
		if ( get_field( $field_id ) ) {
			$link = get_field( $field_id );
		} elseif ( get_sub_field( $field_id ) ) {
			$link = get_sub_field( $field_id );
		} else {
			$link = get_field( $field_id, 'option' );
		}

		if ( $link ) :
			?>

			<a class="<?php echo $button_class; ?>" href="<?php echo $link['url']; ?>"
								 <?php
									if ( $link['target'] ) :
										?>
				 target="<?php echo $link['target']; ?>"<?php endif; ?>>
				<?php if ( $icon_class ) : ?>
					<span class="<?php echo $icon_class; ?>" aria-hidden="true"></span>
				<?php endif; ?>
				<?php echo $link['title'] ? $link['title'] : _x( 'Read More', 'Read More Button', 'qstheme' ); ?>
			</a>

			<?php
		endif;
	}

	/**
	 * ACF Image
	 * @param  string $field_id Field ID
	 * @param  string $class Container class
	 * @param  string $size Image size
	 */
	static function acf_image( $field_id, $class = '', $size = '' ) {
		if ( get_field( $field_id ) ) {
			$image = get_field( $field_id );
		} elseif ( get_sub_field( $field_id ) ) {
			$image = get_sub_field( $field_id );
		} else {
			$image = get_field( $field_id, 'option' );
		}

		if ( ! empty( $image ) ) {
			$image_url = $size ? $image['sizes'][ $size ] : $image['url'];
			?>

			<div class="entry-image
			<?php
			if ( $class ) {
				echo ' ' . $class;}
			?>
				">
				<img src="<?php echo $image_url; ?>" alt="<?php echo $image['alt']; ?>" />
			</div>

			<?php
		}
	}

	/**
	 * Get social link URL
	 * @param  string $network Network name
	 * @return string URL
	 */
	static function get_social_link( $network ) {
		$networks = get_field( 'social_networks', 'option' );

		foreach ( $networks as $n ) {
			if ( $n['network'] == $network ) {
				return $n['url'];
			}
		}
	}

	/**
	 * Implode terms
	 * @param  string $taxonomy
	 * @return string imploded terms, for example "term-31 term-32 term-33"
	 */
	static function implode_terms( $taxonomy ) {
		$terms = get_the_terms( get_the_ID(), $taxonomy );
		foreach ( $terms as $term ) {
			$termlist[] = 'term-' . $term->term_id;
		}
		return implode( ' ', $termlist );
	}

	static function has_search_params() {
		return isset( $_GET['tax_platform'] ) ? true : false;
	}

	/**
	 * Get second level terms only
	 * @param  string $taxonomy
	 * @return array of term objects
	 */
	static function get_second_level_terms( $taxonomy ) {
		$whole_tax = get_terms( $taxonomy, array( 'hide_empty' => 0 ) );

		$second_level = array_filter(
			$whole_tax,
			function( $term ) {
				return $term->parent != 0;
			}
		);

		return $second_level;
	}

	/**
	 * Get search query in search page
	 */
	static function get_search_results() {

		$post_ids = array();

		if ( ! empty( QS::get_request_taxonomy( 'platform' ) ) && QS::get_request_taxonomy( 'platform' ) == get_field( 'handgun_term' ) ) {
			$taxonomies = array( 'platform', 'brand', 'model', 'product_cat', 'sight_type' );
		} else {
			$taxonomies = array( 'platform', 'application', 'manification', 'day_night' );
		}

		foreach ( $taxonomies as $tax ) {
			if ( QS::get_request_taxonomy( $tax ) ) {
				$tax_query[] = array(
					'taxonomy' => $tax,
					'terms' => QS::get_request_taxonomy( $tax ),
				);
			}
		}

		do {
			wp_reset_query();

			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => -1,
				'tax_query'      => $tax_query,
				'fields'         => 'ids',
			);

			if ( count( $tax_query ) != 1 ) {
				unset( $tax_query[ count( $tax_query ) - 1 ] );
			}

			$query = new WP_Query( $args );

			$post_ids = array_merge( $post_ids, $query->posts );

		} while ( count( $post_ids ) < 8 && count( $tax_query ) >= 1 );

		$post_ids = array_slice( $post_ids, 0, 8 );

		return $post_ids;
	}

	static function get_request_taxonomy( $tax ) {
		if ( isset( $_GET[ 'tax_' . $tax ] ) ) {
			return $_GET[ 'tax_' . $tax ];
		}
	}

	static function product_loop( $args = '' ) {
		$defaults = array(
			'show_icons' => false,
		);

		$args = wp_parse_args( $args, $defaults );

		$fields = get_field( 'titles' );

		ob_start();
		?>

		<li <?php post_class(); ?>>
			<?php get_template_part( 'inc/global/edit-post-link' ); ?>
			
			<div class="item" data-mh="product">
				<a href="<?php the_permalink(); ?>">
					<div class="item-in">                        
						<div class="wrap header-wrap">
							<header class="entry-header">
								<h3 class="entry-title title-top">
									<?php echo $fields['middle_title']; ?>
								</h3>
								<h3 class="entry-title title-bottom">
									<?php echo $fields['bottom_title']; ?>
								</h3>
							</header>
						</div>

						<div class="wrap image-wrap">
							<?php if ( $args['show_icons'] && have_rows( 'product_icons' ) ) : ?>

								<ul class="product-icons">

									<?php
									$i = 0;
									while ( have_rows( 'product_icons' ) ) :
										the_row();
										if ( $i == 3 ) {
											break;
										}
										?>
										 
												
										<li>
											<div class="item">
												<?php QS::acf_image( 'icon' ); ?>
												
												<h4 class="entry-title">
													<?php the_sub_field( 'text' ); ?>
												</h4>
											</div>
										</li>
									
										<?php
										$i++;
									endwhile;
									?>
										

								</ul>
							<?php endif; ?>
							
							<div class="entry-image" data-postid="<?php echo get_the_ID(); ?>">
								<div class="image-optic">
									<?php
									$image          = get_field( 'slider_circle' );
									$image_hover    = get_field( 'slider_circle_hover' );
									$image_svg      = get_field( 'products_slider_circle_image', 'option' );
									// Optic image
									if ( $image && $image_hover ) :
										?>

										<div class="image">
											<img src="<?php echo $image['sizes']['products-slider-circle']; ?>" alt="<?php echo $image['alt']; ?>" />
										</div>

										<div class="image-hover">
											<img src="<?php echo $image_hover['sizes']['products-slider-circle']; ?>" alt="<?php echo $image_hover['alt']; ?>" />
										</div>

										<?php
									else :

										echo file_get_contents( $image_svg['url'] );

									endif;
									?>
								</div>

								<?php if ( has_post_thumbnail() ) : ?>

									<?php the_post_thumbnail( 'medium' ); ?>

									<?php
								else :
									$image = get_field( 'titles' )['product_image'];
									?>
									
									<img class="wp-post-image" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />

								<?php endif; ?>
							</div>
						</div>

						<div class="entry-text">
							<?php echo $fields['text']; ?>
						</div>
					</div>
				</a>
			</div>
		</li>

		<?php
		return ob_get_clean();
	}

	/**
	 * Format text (bold when using *text*)
	 */
	static function format_text( $text, $class = 'styled' ) {
		$pattern     = '/(.*)\*(.*)\*(.*)/';
		$replacement = '$1<span class="' . $class . '">$2</span class="styled">$3';

		return preg_replace( $pattern, $replacement, $text );
	}

	static function product_file_html( $file ) {
		ob_start();
		?>
		
		<?php if ( $file ) : ?>

			<a class="item item-file" href="<?php echo $file['url']; ?>" target="_blank" data-aos="fade-in">
				<span class="icomoon icomoon-download" aria-hidden="true"></span>
				<span class="entry-text">
					<?php echo $file['title'] ? $file['title'] : __( 'DOWNLOAD SPEC', 'qstheme' ); ?>
				</span>
			</a>

		<?php endif; ?>

		<?php
		echo ob_get_clean();
	}

	static function product_video_row_html( $field ) {
		if ( $field['youtube_id'] ) :
			?>

			<div class="row-video" data-aos="fade-up">
				<figure class="entry-figure">
					<a data-fancybox href="https://www.youtube.com/watch?v=<?php echo $field['youtube_id']; ?>">
						<span class="icon icon-play" aria-hidden="true"></span>
						<img src="<?php echo $field['image']['url']; ?>" alt="<?php echo $field['image']['alt']; ?>" />
					</a>
					
					<?php if ( isset( $field['title'] ) && $field['title'] ) : ?>

					<figcaption class="caption-text">
						<?php echo $field['title']; ?>
					</figcaption>

					<?php endif; ?>
				</figure>   
			</div>

			<?php
		endif;

		echo ob_get_clean();
	}

	static function featured_product( $args = '' ) {
		$defaults = array(
			'post_id'           => '',
			'wrapper'           => 'section',
			'class'             => '',
			'show_top_title'	=> false,
			'show_icons'        => true,
			'show_button'       => false,
			'show_badge'        => false,
			'show_text'			=> true,
			'show_optic'		=> true,
			'show_optic_hover'	=> true,
		);

		$args = wp_parse_args( $args, $defaults );

		$query_args = array(
			'post_type' => 'product',
			'p'         => $args['post_id'],
		);
		$query = new WP_Query( $query_args );

		if ( $query->have_posts() ) :

			while ( $query->have_posts() ) :
				$query->the_post();
				$circle_image = get_field( 'slider_circle' );
				$circle_image_hover = get_field( 'slider_circle_hover' );
				?>
		
				<<?php echo $args['wrapper']; ?> class="section-featured-product <?php echo $args['class']; ?>">
					<div class="container">
						<?php get_template_part( 'inc/global/edit-post-link' ); ?>
						
						<?php
						$fields = get_field( 'titles' );

						if ( $fields['top_title'] ) :
							?>

							<div class="row-titles">
								<a href="<?php the_permalink(); ?>">
									<div class="product-cols">
										<?php if ( $args['show_badge'] ) : ?>

										<span class="icon icon-badge" aria-hidden="true"></span>

										<?php endif; ?>

										<div class="col col-image">
											<div class="image-circle" data-aos="fade-in">
												<?php if ( $args['show_optic'] ) : ?>
													<img class="image-circle-img" src="<?php echo $circle_image['url']; ?>" alt="<?php echo $circle_image['alt']; ?>" data-aos data-deg="90"/>
												<?php endif; ?>
												
												<?php if ( $args['show_optic_hover'] ) : ?>
													<img class="image-circle-img-hover" src="<?php echo $circle_image_hover['url']; ?>" alt="<?php echo $circle_image_hover['alt']; ?>" />
												<?php endif; ?>

												<div class="entry-image">
													<img src="<?php echo $fields['product_image']['url']; ?>" alt="<?php echo $fields['product_image']['alt']; ?>" />
												</div>
											</div>
										</div>

										<div class="col col-content">
											<div class="product-titles">
												<?php if ( $args['show_top_title'] ) : ?>
													<h2 class="entry-title title-top" data-aos="fade-in">
														<?php echo $fields['top_title']; ?>
													</h2>
												<?php endif; ?>
												<h2 class="entry-title title-middle" data-aos="fade-in" data-aos-delay="200">
													<?php echo $fields['middle_title']; ?>
												</h2>
												<h2 class="entry-title title-bottom" data-aos="fade-in" data-aos-delay="400">
													<?php echo $fields['bottom_title']; ?>
												</h2>
											</div>
											
											<?php if ( $args['show_text'] ) : ?>

											<div class="entry-text product-description" data-aos="fade-in" data-aos-delay="600">
												<?php echo $fields['text']; ?>
											</div>

											<?php endif; ?>

											<?php
											if ( $args['show_icons'] ) {
												get_template_part( 'inc/global/product-icons' );
											}
											?>

											<?php if ( $args['show_button'] ) : ?>
												
												<div class="button-wrap">
													<span class="btn btn-orange"  data-aos="fade-in" data-aos-delay="800">
														<?php _e( 'See More', 'qstheme' ); ?>
													</span>
												</div>

											<?php endif; ?>
										</div>
									</div>
								</a>
							</div>

						<?php endif; ?>

					</div>
				</<?php echo $args['wrapper']; ?>>
		
				<?php
			endwhile;
			wp_reset_postdata();
		endif;
	}

	static function get_location_by_ip(){
	    $client  = @$_SERVER['HTTP_CLIENT_IP'];
	    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	    $remote  = @$_SERVER['REMOTE_ADDR'];
	    $result  = array( 'country'=>'', 'city'=>'' );
	    if ( filter_var( $client, FILTER_VALIDATE_IP ) ){
	        $ip = $client;
	    } elseif ( filter_var( $forward, FILTER_VALIDATE_IP ) ){
	        $ip = $forward;
	    } else {
	        $ip = $remote;
	    }

	    $data = json_decode( file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip) );

	    return $data;
	}


	static function posts_loop( $args = '' ) {
		ob_start();		
		$post = get_post($args->ID);
		?>
            <div class="col-lg-4 col-md-6 blog-grid-4" data-aos="fade-up" data-aos-duration="2000">
				<div class="general-blog-card-box">

					<div class="general-blog-card-top">
						<div class="image-thumb-box" data-postid="<?php echo $args->ID; ?>">
							<?php 	
								if (get_the_post_thumbnail_url( $args->ID )): 
									$post_image = get_the_post_thumbnail_url( $args->ID );
								else: 
									$post_image = wp_get_attachment_url(376);
								endif; 
							?>
							<img src="<?php echo $post_image; ?>" class="img-fluid img-responsive img-blog" alt="post" />
						</div>
						<div class="image-text-div">
							<div class="labels-row"> 
								<?php foreach(wp_get_post_tags($args->ID) as $key=>$val) { ?>
									<div class="text-label-span"><?php echo $val->name; ?></div>
								<?php } ?>
							</div>
							<div class="post-date-div"><span class="date-span-text"><?php echo get_the_date( 'j F Y' ); ?></span></div>
						</div>
					</div>

					<div class="general-blog-card-body">
						<a href="<?php the_permalink($args->ID); ?>">
							<div class="details-div">
								<?php $dots = (strlen($post->post_title) > 44) ? '...' : ''; ?>
								<h3><?php echo substr( $post->post_title, 0, 44 ).$dots; ?></h3>
								<?php
									$content = $post->post_content;
									$trimmed_content = wp_trim_words( $content, 20, NULL );
									echo '<p>'.$trimmed_content.'</p>';
								?>
							</div>
							<?php $noTime = '';
								if(get_field('read_time') == "") : 
									$noTime = 'no-time-add';
								endif;
							?>
							<div class="user-details-div <?php echo $noTime; ?>">
								<div class="user-info-div">
									<div class="image-thumb-box">
									<?php
										$uploads = wp_upload_dir();  
										$get_author_id = $post->post_author;
										$get_author_gravatar = get_field('author_photo', $args->ID)['url'];
										$place_img = esc_url( $uploads['baseurl']).'/2020/06/download.png';
									?>
									<?php if($get_author_gravatar): ?>
										<img src="<?php echo $get_author_gravatar; ?>" alt="" class="img-fluid img-responsive img-user" alt="user">
									<?php else: ?>
										<img src="<?php echo $place_img; ?>" class="img-fluid img-responsive img-user">
									<?php endif; ?>
									</div>
									<div class="image-text-div">
										
										<h5 class="user-label-text">
											<?php echo wp_trim_words( get_field('author_name', $post->ID), 8, NULL ); ?>
										</h5>
									</div>
								</div>
								<?php if(get_field('read_time')) : ?>
									<div class="time-details-div">									
										<div class="time-text-div">
											<span class="time-icon"></span>
											<span class="span-text"><?php echo get_field('read_time'); ?></span>
										</div>									
									</div>
								<?php endif; ?>
							</div>
						</a>
					</div>
				</div>
			</div>
		<?php
		return ob_get_clean();
	}

	static function get_post_categories() {
		$cats = get_categories(['post_type' => 'post']);
		if (count($cats) == 0) {
			return null;
		}
		$allCats[0] = 'All Posts';
		foreach ($cats as $key=>$val) {
			$allCats[$val->term_id] = $val->name;
		}
		return $allCats;
	}

	static function technig_the_content($content)
	{
		// Take the existing content and return a subset of characters it
		return substr($content, 0, 500);
	}


}


$qs = new QS();

