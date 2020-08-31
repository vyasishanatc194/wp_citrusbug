<?php
/**
 * Enqueue theme styles and scripts
 */
// //ajax localise
// function pw1_load_scripts() {
// 	wp_enqueue_script('pw1-script', 'https://makitweb.com/demo/jquery.js', array('jquery'));
// 	wp_localize_script('pw1-script', 'pw1_script_vars', array(
// 	  'ajaxurl' => admin_url('admin-ajax.php'),
// 	  'siteurl' => get_stylesheet_directory_uri(),
// 	  'security' => wp_create_nonce('Citrusbug'),
// 	)); 
//   }
// add_action('wp_enqueue_scripts', 'pw1_load_scripts');