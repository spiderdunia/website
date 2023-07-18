/**
 * All of the js for your public-facing functionality should be.
 * included in this file.
 *
 * @link              https://www.enweby.com/
 * @since             1.0.0
 * @package           Fullscreen_Background
 */

(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$(
		function() {
			// on load css.

			if ( $( ".fb_background_type" ).find( 'option:selected' ).val() == "image" ) {
				$( ".fb_bg_image, .fb_background_size, .fb_background_position, .fb_background_attachment" ).show();
			}
			if ( $( ".fb_background_type" ).find( 'option:selected' ).val() == "video" ) {
				$( ".fb_bg_video,.fb_video_background_position, .fb_video_background_fit" ).show();
			}
			if ( $( ".fb_background_type" ).find( 'option:selected' ).val() == "color" ) {
				$( ".fb_bg_color" ).show();
			}
			if ( $( ".fb_display_options" ).find( 'option:selected' ).val() == "page" ) {
				$( ".fb_page_field_id" ).show();
			}
			if ( $( ".fb_display_options" ).find( 'option:selected' ).val() == "post" ) {
				$( ".fb_post_field_id" ).show();
			}

			// On changing background type.
			$( ".fb_background_type" ).change(
				function(){
					if ( $( ".fb_background_type" ).find( 'option:selected' ).val() == "image" ) {
						$( ".fb_bg_image, .fb_background_size, .fb_background_position, .fb_background_attachment" ).show();
						$( ".fb_bg_color, .fb_bg_video,.fb_video_background_position, .fb_video_background_fit" ).hide();
					}
					if ( $( ".fb_background_type" ).find( 'option:selected' ).val() == "video" ) {
						$( ".fb_bg_video,.fb_video_background_position, .fb_video_background_fit" ).show();
						$( ".fb_bg_image, .fb_background_size, .fb_background_position, .fb_background_attachment,.fb_bg_color" ).hide();
					}
					if ( $( ".fb_background_type" ).find( 'option:selected' ).val() == "color" ) {
						$( ".fb_bg_color" ).show();
						$( ".fb_bg_image, .fb_background_size, .fb_background_position, .fb_background_attachment, .fb_bg_video,.fb_video_background_position, .fb_video_background_fit" ).hide();
					}
				}
			);
			// On changing background type.
			$( ".fb_display_options" ).change(
				function(){
					if ( $( ".fb_display_options" ).find( 'option:selected' ).val() == "home" ) {
						$( ".fb_post_field_id" ).hide();
						$( ".fb_page_field_id" ).hide();
					}
					if ( $( ".fb_display_options" ).find( 'option:selected' ).val() == "all" ) {
						$( ".fb_post_field_id" ).hide();
						$( ".fb_page_field_id" ).hide();
					}
					if ( $( ".fb_display_options" ).find( 'option:selected' ).val() == "page" ) {
						$( ".fb_page_field_id" ).show();
						$( ".fb_post_field_id" ).hide();
					}
					if ( $( ".fb_display_options" ).find( 'option:selected' ).val() == "post" ) {
						$( ".fb_post_field_id" ).show();
						$( ".fb_page_field_id" ).hide();
					}

				}
			);

		}
	);
})( jQuery );
