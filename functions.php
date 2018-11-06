<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

function generatepress_child_enqueue_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'generatepress-rtl', trailingslashit( get_template_directory_uri() ) . 'rtl.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'generatepress_child_enqueue_scripts', 100 );

// insert scripts and styles hook
function rbtm_generate_scripts() {
    if (is_child_theme()) {
				//CDN
				wp_enqueue_style('gen-sty-b4css', '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', array(), '20171225', 'all');
				// wp_enqueue_script('gen-sc-tether', '//cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js', array('jquery'), '20171225', true);
		    wp_enqueue_script('gen-sc-popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), '20171225', true);
		    wp_enqueue_script('gen-sc-bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), '20171225', true);
				//vendor
				wp_enqueue_script('gen-sc-easing', get_stylesheet_directory_uri()."/js/jquery-easing/jquery.easing.min.js", array('jquery'), '10082018', true);
				//custom script
        wp_enqueue_script('gen-sc-myfunc', get_stylesheet_directory_uri()."/js/myfunctions.js", array('jquery'), '10082018', true);
    }
}
add_action('wp_enqueue_scripts', 'rbtm_generate_scripts');




// removes the default header
function RBTM_rm_fmeta(){
  remove_action('generate_after_entry_content','generate_footer_meta', 10);
}
//add_action('the_post', 'RBTM_rm_fmeta', 11);

//override parent functions
require_once( get_stylesheet_directory() . '/inc/structure/post-meta.php' );

//my custom functions
require_once( get_stylesheet_directory() . '/inc/inc_custom/tpl-func.php' );
require_once( get_stylesheet_directory() . '/inc/inc_custom/tpl-tags.php' );
require_once( get_stylesheet_directory() . '/inc/inc_custom/page-builder.php' );
