<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<meta content='initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width' name='viewport' />
		<meta name="theme-color" content="#fff">
		<meta name="msapplication-navbutton-color" content="#fff">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="#fff">

		<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/CodecPro/CodecPro-font.css" media="all" rel="stylesheet" type="text/css" />
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Upgrade/Upgrade-font.css" media="all" rel="stylesheet" type="text/css" />
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/MavenPro/MavenPro-font.css" media="all" rel="stylesheet" type="text/css" />
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/aos.css" media="all" rel="stylesheet" type="text/css" />
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/style.css" media="all" rel="stylesheet" type="text/css" />
                <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/main.css" media="all" rel="stylesheet" type="text/css" />
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/common.css" media="all" rel="stylesheet" type="text/css" />
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/modernizr.js"></script>
		<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
		<style>
			/* 29-07-2020 */

			.our-solutions-section .our-solutions-box .our-solutions-box-center .line-span { display: flex; }
			.our-solutions-section .our-solutions-box .our-solutions-box-center .line-span img.img-fluid.img-bme { z-index: 99; width: 85px; height: 70px; object-fit: contain; margin: -55px auto 0 auto; }
			.general-blog-card-box .general-blog-card-body .user-details-div .user-info-div h5 { white-space: normal; line-height:20px; }
			.core-tech-card-section .core-content-card-full .image-thumb-box-header h3 { margin: 0 0 0px 0;}				
			.general-blog-card-box .general-blog-card-body .user-details-div.no-time-add .user-info-div{ width:100%; }

			.owl-custom .clients-logo-box .logo-thumb img.client-img { -webkit-filter: grayscale(100%); filter: grayscale(100); transition:all 0.8s;  }
			.owl-custom .clients-logo-box .logo-thumb:hover img.client-img { -webkit-filter: grayscale(0%); filter: grayscale(0); }
			.our-solutions-section .our-solutions-box .icon-rows-div .icon-grid-box a { text-align: center; }
			/* End of 29-07-2020 */
			.general-blog-card-box .general-blog-card-body p { min-height: 120px; }
			
            header .header-div .nav-div ul.menu li.menu-item ul.sub-menu li.module-label > a { text-transform: none !important; }

			.nav-div ul.menu li.menu-item ul.sub-menu li.module-label .mega-menu-wrap ul.menu-terms li::before { top: 5px; left: 0; }
			.nav-div ul.menu li.menu-item ul.sub-menu li.module-label .mega-menu-wrap a span.entry-text { text-transform: none !important; }
			.nav-div ul.menu li.menu-item ul.sub-menu li.module-label .mega-menu-wrap a{ text-transform: none !important; }

			.get-in-touch-root .wpcf7-form div.wpcf7-response-output { color: #FFF; }
			.nav-div ul.menu li.menu-item ul.sub-menu li.module-label .mega-menu-wrap ul.menu-terms li { list-style: none; }
			


			@media (max-width: 1024px) and (min-width: 768px){
				.our-solutions-section .our-solutions-box .icon-rows-div .icon-grid-box { padding: 20px 10px; margin: 0 0 20px 0; max-width: 100%; width: 25%; }
			}
				
			@media (min-width: 1025px) and (max-height: 768px){
				.main-banner-section .banner-div .content-banner .text-content {
					padding: 0 25px 25px 25px;
				}
				.main-banner-section .banner-div .content-banner h1 {
					line-height: 60px;
					margin-bottom: 0;
				}
			}

		</style>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
	<div id="wrapper" class="wrapper home-wrapper modalview">
	<div class="wrapper-container">
	<header>
		<?php $blogPage = (get_the_ID() == 70 || is_archive()) ? 'header-white-div' : false; ?>
		<div class="header-div clearfix <?php echo $blogPage; ?>">
			<div class="inner-top-header-div clearfix">
				<div class="container-fluid container-fluid-max1920">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="header-container">
								<div class="logo-div">
									
									<?php
										if ($blogPage) {
									?>
									<a class="logo_link clearfix" href="<?php echo get_site_url(); ?>">
										<img src="<?php echo get_field('header_logo_2', 'option')['url']; ?>" class="img-fluid logo_img black-logo" alt="logo" />
									</a>
									<?php 
										} else {
									?>
									<a class="logo_link clearfix" href="<?php echo get_site_url(); ?>" rel="home">
										<?php if (get_field('header_logo_1', 'option')) { ?>
											<img src="<?php echo get_field('header_logo_1', 'option')['url']; ?>" class="img-fluid logo_img main-logo" alt="logo">
										<?php } ?>
										<?php if (get_field('header_logo_1', 'option')) { ?>
											<img src="<?php echo get_field('header_logo_2', 'option')['url']; ?>" class="img-fluid logo_img black-logo" alt="logo">
										<?php } ?>
									</a>
									<?php }	?>
								</div>

								<nav class="nav-center-div">
									<div class="top-nav1">
									<div class="cd-shadow-layer"></div>
									<div class="nav-m-bar"><a onclick="openNav()" class="opennav" data-placement="bottom" title="" data-original-title="Menu">
										<i class="menu-bars menu-icon"></i></a>
									</div>
									<div class="nav-div clearfix" id="mySidenav" >
										<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
										<?php
											if (!wp_is_mobile()) :
												wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => new Main_Menu_Walker() ) );
											else: 
												echo '<div class="mobile-navigation-root"> ';
												wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => new Main_Menu_Walker_Mobile() ) );
												echo '
												<div class="social-group-div">
													<ul>';
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
												echo '
													</ul>
												</div>';
												echo '</div>';
											endif;
										?>
									</div>
									</div>
								</nav>
							</div>						
						</div>
					</div>
				</div>
			</div>	
		</div><!--  End of header with navigation div  -->
	</header>
