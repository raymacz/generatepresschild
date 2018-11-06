<?php
/**
 * Custom template tags for the child theme (usually found in blog post)
 *
 *
 * @package generatepress-child
 * @subpackage GeneratePress
 * @since 1.0
 */

 /**
  * Post navigation (previous / next post) for single posts.
  */
 function rbtm_post_navigation() {
 	the_post_navigation( array(
 		'next_text' => '<span class="next" aria-hidden="true">' . __( 'Next', 'generatepress' ) . '</span> ' .
 			'<span class="screen-reader-text">' . __( 'Next post:', 'generatepress' ) . '</span> ' .
 			'<span class="post-title">%title</span>',
 		'prev_text' => '<span class="prev" aria-hidden="true">' . __( 'Previous', 'generatepress' ) . '</span> ' .
 			'<span class="screen-reader-text">' . __( 'Previous post:', 'generatepress' ) . '</span> ' .
 			'<span class="post-title">%title</span>',
 	) );
 }



  /**
   * Change the excerpt more string
   */
   function rbtm_excerpt_more( $more ) {
       return ' [&hellip;]';
       // return ' >>';
   }
   add_filter( 'excerpt_more', 'rbtm_excerpt_more' );

   function rbtm_continue_read() {
       if (!is_single() && !is_front_page() && !is_tax()) {
            $read_more = sprintf(  wp_kses( __('%1$s<span class="screen-reader-text">"%2$s"</span>', 'generatepress'),
                 array( 'span' => array( 'class' => array(), ), )),'Continue reading', get_the_title() );

            $frag='';
            $frag .='<div class="cont-read">';
            $frag .= sprintf(wp_kses( __('<a href="'.esc_url(get_permalink()).'" rel="bookmark"> %s</a>', 'generatepress'),
                 array( 'a' => array( 'href' => array(), 'rel' => array() ),)), $read_more);
            $frag .='</div>';
            echo $frag;
       }
   }
   add_action( 'generate_after_entry_content', 'rbtm_continue_read' );


   /**
    * Filter excerpt length to 100 words.
    */
   function rbtm_excerpt_length( $length ) {
   	return 80;
   }
   add_filter( 'excerpt_length', 'rbtm_excerpt_length');
 ?>
