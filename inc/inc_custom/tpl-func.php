<?php
/**
 * General Template Functions
 *
 * @package generatepress-child
 * @subpackage GeneratePress
 * @since 1.0
 */

// Change Navigation Menu Links when switching to pages

function rbtm_add_specific_menu_location_atts( $atts, $item, $args, $depth ) {
    // add class for each nav link & change href when pages switch from frontpage to any
    if( $args->theme_location == 'primary' ) {
      // add the desired attributes:
      $atts['class'] = 'menu-link-class';
    }
      // change menu links when NOT in frontpage for smooth scrolling
      // Primary Links or Footer Links || ($args->theme_location == '' && $args->menu->term_id == 271)
    if(!is_front_page() && ($args->theme_location == 'primary'  )) {
      switch ($atts['href']) {
          case '#top':
              $atts['href'] = get_home_url();
              break;
          case '#services':
              $atts['href'] = get_home_url().'#services';
              break;
          case '#team':
              $atts['href'] = get_home_url().'#team';
              break;
          default:
              break;
      }
//
    }

    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'rbtm_add_specific_menu_location_atts', 10, 4 );


// filter widget recent post argument


/**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

	function widget($args, $instance) {

		extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
				
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 5;
					
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if( $r->have_posts() ) :
			
			echo $before_widget;
			if( $title ) echo $before_title . $title . $after_title; ?>
			<ul>
				<?php while( $r->have_posts() ) : $r->the_post(); ?>				
				<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><span class="post-date"><?php the_time( 'F d'); ?></span>
                                <span class="my-post-author"><?php the_author_link(); ?></span></li>
				<?php endwhile; ?>
			</ul>
			 
			<?php
			echo $after_widget;
		
		wp_reset_postdata();
		
		endif;
//                echo '<pre> rbtm';
//                echo ' args: ';var_dump($args);
//                echo ' instance: ';var_dump($instance);
//            //    echo ' lvar3: '; var_dump($lvar3);
//                echo '</pre>';
	}
}
function rbtm_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'rbtm_recent_widget_registration');

add_filter('widget_posts_args', function($query_args) {
    $query_args['posts_per_page'] = 3;
    return $query_args;
});





?>
