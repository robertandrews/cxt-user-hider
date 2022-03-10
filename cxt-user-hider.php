<?php

/*
Plugin Name:    Context User Options Hider
Description:    Removes 'Personal Options' settings box from Edit User forms.
Text-Domain:    cxt-user-hider
Version:        1.1
Author:         Robert Andrews
Author URI:     http://www.robertandrews.co.uk
License:        GPL v2 or later
License URI:    https://www.gnu.org/licenses/gpl-2.0.html
*/



 /**
  * Remove 'Personal Options'
  * @jason-vasilev, StackExchange:  http://wordpress.stackexchange.com/a/229014/39300 for WordPress 4.5.2
  * @enshrined, ACF (alternative):  https://support.advancedcustomfields.com/forums/topic/hide-on-screen-when-page-is-user-edit/#post-52009
  */
 if ( ! function_exists( 'cor_remove_personal_options' ) ) {
     /**
     * Removes the leftover 'Visual Editor', 'Keyboard Shortcuts' and 'Toolbar' options.
     */
     function cor_remove_personal_options( $subject ) {
         $subject = preg_replace( '#<h2>Personal Options</h2>.+?/table>#s', '', $subject, 1 );
         return $subject;
     }

     function cor_profile_subject_start() {
         ob_start( 'cor_remove_personal_options' );
     }

     function cor_profile_subject_end() {
         ob_end_flush();
     }
 }
add_action( 'admin_head', 'cor_profile_subject_start' );
add_action( 'admin_footer', 'cor_profile_subject_end' );


/*
  * Remove only the admin colour picker.
  * This is part of Personal Options, so is only optional if Personal Options is not yet disabled.
  */
  // remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

?>