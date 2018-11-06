<?php
/**
 * Page builder templates & functions
 *
 * @package generatepress-child
 * @subpackage GeneratePress
 * @since 1.0
 */



// removes the default header
function RBTM_rm_fnheader(){
  remove_action('generate_header','generate_construct_header', 10);
}
add_action('get_header', 'RBTM_rm_fnheader', 11);

// insert elementor template in header
function RBTM_AE_elementor_scode() {
   echo do_shortcode('[INSERT_ELEMENTOR id="2284"]');
//   echo "rbtm RBTM_AE_elementor_scode";
}
add_action('generate_before_header', 'RBTM_AE_elementor_scode', 10);


 ?>
