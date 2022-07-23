<?php 
	add_action( 'wp_enqueue_scripts', 'botiga_child_theme_enqueue_styles' );
	function botiga_child_theme_enqueue_styles() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
	}


require  dirname( __FILE__ ) . '/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/guillermoscript/botiga-child-theme',
	__FILE__, //Full path to the main plugin file or functions.php.
	'botiga-child-theme'
);