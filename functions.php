<?php 

function divi_changes() {
    if (!is_admin()) {
        wp_register_script( 'js-divi-changes', get_stylesheet_directory_uri().'/js/changes.js' , array('jquery'), '0.1', true );
        wp_enqueue_script( 'js-divi-changes' );
    }
}
add_action( 'wp_enqueue_scripts', 'divi_changes' );

// Replace link on WP logo
function put_my_url(){
	return "http://www.zdravinamiru.cz/"; // your URL here
}
add_filter('login_headerurl', 'put_my_url');

// Remove Jetpack OGD
add_filter( 'jetpack_enable_opengraph', '__return_false', 99 );

// Remove ET Google Fonts
function wpdocs_dequeue_style() {
    wp_dequeue_style( 'open-sans-css' );
}
add_action( 'wp_print_scripts', 'wpdocs_dequeue_style', 100 );

function dequeue_unused_styles() {
    wp_dequeue_style( 'et_monarch-open-sans' );
    wp_dequeue_style( 'et-open-sans-700' );   
    wp_dequeue_style( 'open-sans' );
    wp_dequeue_style( 'google_font_open_sans' );
    wp_dequeue_style( 'google_font_open_sans_condensed' );
}
add_action('wp_enqueue_scripts', 'dequeue_unused_styles', 100 );
add_action('wp_print_scripts', 'dequeue_unused_styles', 100 );

// Add Google Fonts as we need
function google_fonts(){
    wp_enqueue_style( 'google_font_1', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700,300&subset=latin,latin-ext' );
    wp_enqueue_style( 'google_font_2', 'http://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext');
	//wp_enqueue_style( 'google_font_2', 'http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700&subset=latin,latin-ext' );
}
add_action( 'wp_enqueue_scripts', 'google_fonts', 9 );

// Remove information about WP version
remove_action('wp_head', 'wp_generator');
function completely_remove_wp_version() {
	return '';
}
add_filter('the_generator', 'completely_remove_wp_version');

?>