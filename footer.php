<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
	<footer>    
		<div class="footer-div">
			<div class="container-fluid container-fluid-max1920">
				<div class="row">
				
				<div class="col-lg-3">
					<div class="footer-logo">
						<a class="logo_link clearfix" href="<?php echo get_site_url(); ?>">
							<img src="<?php echo get_field( 'footer_logo', 'option' )['url']; ?>" class="img-fluid img-footer-logo" alt="footer logo" />
						</a>
					</div>
				</div>

				<div class="col-lg-9 justify-content-end d-flex">            
					<div class="footer-right-side">
					<div class="listing-link-div">
						<div class="list-ul-div">
						<?php   
							$defaults = array(
								'theme_location'  	=> 'primary',
								'menu'            	=> 'Footer Left Menu',
								'container'       	=> 'ul',
								'menu_class'      	=> '',
								'menu_id'         	=> '',
								'echo'            	=> true,
								'fallback_cb'     	=> 'wp_page_menu',
								'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           	=> 0,
								'walker' 			=> new wp_bootstrap_navwalker
							);
							wp_nav_menu( $defaults ); 
						?>
						</div>
						<div class="list-ul-div">
						<?php   
							$defaults = array(
								'theme_location'  	=> 'primary',
								'menu'            	=> 'Footer Right Menu',
								'container'       	=> 'ul',
								'menu_class'      	=> '',
								'menu_id'         	=> '',
								'echo'            	=> true,
								'fallback_cb'     	=> 'wp_page_menu',
								'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           	=> 0,
								'walker' 			=> new wp_bootstrap_navwalker
							);
							wp_nav_menu( $defaults ); 
						?>
						</div>
					</div>  

					<div class="news-and-social-div">
						<?php 
							$blogPage = (get_the_ID() == 70 || is_archive()) ? 'header-white-div' : false; 
							if (!$blogPage) :
						?>
						<div class="subscribe-news-div">
							<div class="title-div">
								<label for="">Subscribe <span class="mobile-block">to our newsletter</span></label>
							</div>
							<div class="subscribe-input-box">
								<div class="form-group">
									<?php echo do_shortcode('[contact-form-7 id="344" title="Subscribe form"]'); ?>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<div class="social-group-div">
						<ul>
							<?php
								while ( have_rows( 'social_media_section', 'option' ) ) : the_row();
									if(get_sub_field('facebook_link', 'option' ) != '') {
										echo '<li><a target="_blank" href="'.get_sub_field('facebook_link', 'option' ).'" class="btn btn-social-round"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>';
									}
									if(get_sub_field('linkedin_link', 'option' ) != '') {
										echo '<li><a target="_blank" href="'.get_sub_field('linkedin_link', 'option' ).'" class="btn btn-social-round"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>';
									}
									if(get_sub_field('twitter_link', 'option' ) != '') {
										echo '<li><a target="_blank" href="'.get_sub_field('twitter_link', 'option' ).'" class="btn btn-social-round"><i class="fab fa-medium-m" aria-hidden="true"></i></a></li>';
									}
								endwhile;
							?>
						</ul>
						</div>
					</div>              
					</div>
				</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom-div">
			<div class="container-fluid container-fluid-max1920">
				<div class="row">          
					<div class="col-lg-12">
						<?php echo get_field( 'footer_copyright_section', 'option' ); ?>
					</div>
				</div>
			</div>
		</div>
  	</footer>
  	<!-- Contact popup  -->
	  </div>

<div class="mobile-nav-logo-div hidden-desktop-logo d-none">
  <div class="logo-div">
    <a class="logo_link clearfix" href="index.html">
      	<?php if (get_field('header_logo_1', 'option')) { ?>
			<img src="<?php echo get_field('header_logo_1', 'option')['url']; ?>" class="img-fluid logo_img main-logo" alt="logo">
		<?php } ?>
		<?php if (get_field('header_logo_1', 'option')) { ?>
			<img src="<?php echo get_field('header_logo_2', 'option')['url']; ?>" class="img-fluid logo_img black-logo" alt="logo">
		<?php } ?>
    </a>
  </div>
</div><!-- End of mobile nav logo -->
<div class="right-side-modal">
  <div class="contact-popup">

    <div class="contact-container">

      <div class="cancel-btn-group">
        <button class="btn-close close-popup-right"> <i class="cancel-round-icon"></i> </button>
		<div class="logo-view hidden-desktop">
          <a class="logo_link clearfix" href="<?php echo get_site_url(); ?>"> 
		  	<?php if (get_field('header_logo_1', 'option')) { ?>
				<img src="<?php echo get_field('header_logo_2', 'option')['url']; ?>" class="img-fluid logo_img black-logo" alt="logo">
			<?php } ?>
          </a>
        </div>
      </div>

      <div class="contact-header-div">
		<?php 
		$content_post = get_post(72);
		$content = $content_post->post_content;
		$content = apply_filters('the_content', $content);
		echo $content;  ?>
      </div>

      <div class="contact-body-div">
        <div class="form-div-root form-modal-div max-width-750">
			<?php echo do_shortcode(get_field('form_shortcode_footer', 72)); ?>
        </div>
      </div>

    </div>

  </div>  
  <div class="backdrop-overlay"></div>
</div>
	<div class="return-to-top" id='goTop'></div>	
</div><!-- end of wrapper -->

<!-- The Video Modal -->
<div class="modal modal-custom modal-custom-video fade" id="video-player-modal">
	<button type="button" class="close close-outside-btn" data-dismiss="modal"><i class="cancel-white-icon"></i></button>
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">   
		<!-- Modal body -->
			<div class="modal-body p-0">        
				<div class="video-root-box">
					<iframe class="video-banner" id="youtubeVideo" style="width: 100% !important; min-height: 450px;" src=""
						frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture">
					</iframe>
				</div>
			</div>      
		</div>
	</div>
</div>

<?php wp_footer(); ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.min.js" ></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/popper.min.js" ></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/select2.full.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/get-owlslider.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/get-thumb-owlslider.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/timeline.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/aos.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.gotop.js"></script> 
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/custom.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/script.js"></script>

<script>
	$(".get-in-touch-success").hide();

  	timeline(document.querySelectorAll('.timeline'), {
		forceVerticalMode: 1023,
		mode: 'horizontal',
		verticalStartPosition: 'left',
		visibleItems: 4,
	  });

	$(".timeline .timeline__item").on("click", function() {
		var selectedItem = $(this);
		$(".timeline .timeline__item").removeClass('selected');
		selectedItem.addClass('selected');
	  });

	  $(".timeline .timeline__item").hover(
		function() {
		  var selectedItem = $(this);
		  $(".timeline .timeline__item").removeClass('selected');
		  selectedItem.addClass('selected');
		},
		function() {
		  var selectedItem = $(this);
		  $(".timeline .timeline__item").removeClass('selected');
		  selectedItem.removeClass('selected');
		},
	  );

	var $btnValue = $(".btn-video-icon").data('value');
	var $videoSrc = $(".btn-video-icon").data('src');

	$(".btn-video-icon").on('click', function() {
		$videoSrc = $(this).data('src');
		// when the modal is opened autoplay it
		$("#video-player-modal").on("shown.bs.modal", function(e) {
			if ($videoSrc) {
				$("iframe#youtubeVideo").attr(
					"src",
					$videoSrc + "?amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1&amp;rel=0"
				);	
			}
		});
	});

	$('#video-player-modal').on('hidden.bs.modal', function (e) {
		var $videoSrc = $(".btn-video-icon").data('src');
		$("iframe#youtubeVideo").attr( "src", '' );
    });

	$(document).ready(function() {    
		/* select 2 */
		$("#recent-by-select-blog").select2({
			placeholder: "Recent By",
			minimumResultsForSearch: -1,
			dropdownPosition: 'below',
		});
		/* End of select 2 */
  	});
</script>


<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />	
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


	</body>
</html>
