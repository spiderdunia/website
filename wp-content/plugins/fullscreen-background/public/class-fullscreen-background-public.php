<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.enweby.com/
 * @since      1.0.0
 *
 * @package    Fullscreen_Background
 * @subpackage Fullscreen_Background/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Fullscreen_Background
 * @subpackage Fullscreen_Background/public
 * @author     Enweby <support@enweby.com>
 */
class Fullscreen_Background_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fullscreen_Background_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fullscreen_Background_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fullscreen-background-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fullscreen_Background_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fullscreen_Background_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/fullscreen-background-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Setting up fullscreen background image or color
	 */
	public function enweby_setup_fullscreen_background_styles() {
		// Getting all the admin options values.
		$enweby_fb_display_options       = get_option( 'enweby_fb_display_options', 'home' );
		$enweby_fb_background_type       = get_option( 'enweby_fb_background_type', 'image' );
		$enweby_fb_bg_image              = get_option( 'enweby_fb_bg_image', '' );
		$enweby_fb_bg_video              = get_option( 'enweby_fb_bg_video', '' );
		$enweby_fb_bg_color              = get_option( 'enweby_fb_bg_color', '#f8f8f8' );
		$enweby_fb_background_size       = get_option( 'enweby_fb_background_size', 'cover' );
		$enweby_fb_background_position   = get_option( 'enweby_fb_background_position', 'center center' );
		$enweby_fb_background_attachment = get_option( 'enweby_fb_background_attachment', 'fixed' );
		$enweby_fb_overlay_shadow        = get_option( 'enweby_fb_overlay_shadow', 'yes' );

		// Getting background image.
		$background_image = ( '' !== $enweby_fb_bg_image ) ? wp_get_attachment_image_src( $enweby_fb_bg_image, $size = 'full' ) : '';

		// Generating background type for css.
		switch ( $enweby_fb_background_type ) {
			case 'image':
				$bg_fullscreen = "background-image: url( ' " . $background_image[0] . " ' );";
				break;
			case 'color':
				$bg_fullscreen = 'background-color: ' . $enweby_fb_bg_color . ';';
				break;
			case 'video':
				$bg_fullscreen = '';
				break;
			default:
				$bg_fullscreen = 'background-color: ' . $enweby_fb_bg_color . ';';
		}

		?>
		<style>
		<?php
		$fullscreen_background_styles  = '.enweby-fullscreen-background { ';
		$fullscreen_background_styles .= $bg_fullscreen;
		if ( 'image' === $enweby_fb_background_type ) {
			$fullscreen_background_styles .= ' background-size: ' . $enweby_fb_background_size . ';';
			$fullscreen_background_styles .= ' background-position: ' . $enweby_fb_background_position . ';';
			$fullscreen_background_styles .= ' background-attachment: ' . $enweby_fb_background_attachment . ';';
		}

		$fullscreen_background_styles .= ' }';
		echo wp_kses_post( $fullscreen_background_styles );
		?>
		</style>
		<?php
	}

	/**
	 * Setting up fullscreen background video.
	 */
	public function enweby_setup_fullscreen_background_video() {
		// Getting all the admin options values.
		$enweby_fb_display_options           = get_option( 'enweby_fb_display_options', 'home' );
		$enweby_fb_background_type           = get_option( 'enweby_fb_background_type', '' );
		$enweby_fb_bg_video                  = get_option( 'enweby_fb_bg_video', '' );
		$enweby_fb_video_background_position = get_option( 'enweby_fb_video_background_position', 'fixed' );
		$enweby_fb_video_background_fit      = get_option( 'enweby_fb_video_background_fit', 'cover' );

		// Getting background video.
		$background_video = ( '' !== $enweby_fb_bg_video ) ? $enweby_fb_bg_video : '';
		$bg_video_html    = '';
		if ( 'video' === $enweby_fb_background_type ) {
			if ( '' !== $enweby_fb_bg_video ) {
				if ( is_front_page() && 'home' === $enweby_fb_display_options ) {
					?>
						<style> 
							.enweby-fullscreen-video-background-wrapper video {object-fit: <?php echo esc_attr( $enweby_fb_video_background_fit ); ?>; position: <?php echo esc_attr( $enweby_fb_video_background_position ); ?> ; }
							#page{position:relative;z-index:99999;}
						</style>
						<div class='enweby-fullscreen-video-background-wrapper'>
							<video playsinline autoplay muted loop poster=''>
								<source src='<?php echo esc_url( $background_video ); ?>' type='video/webm'>
								<source src='<?php echo esc_url( $background_video ); ?>' type='video/mp4'>
								Your browser does not support the video tag.
							</video>
						</div>
					<?php
				}
				if ( 'all' === $enweby_fb_display_options ) {
					?>
						<style> 
							.enweby-fullscreen-video-background-wrapper video {object-fit: <?php echo esc_attr( $enweby_fb_video_background_fit ); ?>; position: <?php echo esc_attr( $enweby_fb_video_background_position ); ?> ; }
							#page{position:relative;z-index:99999;}
						</style>
						<div class='enweby-fullscreen-video-background-wrapper'>
							<video playsinline autoplay muted loop poster=''>
								<source src='<?php echo esc_url( $background_video ); ?>' type='video/webm'>
								<source src='<?php echo esc_url( $background_video ); ?>' type='video/mp4'>
								Your browser does not support the video tag.
							</video>
						</div>
					<?php
				}
				if ( 'post' === $enweby_fb_display_options ) {
					if ( get_the_id() === (int) get_option( 'enweby_fb_post_field_id', '' ) ) {
						?>
						<style> 
							.enweby-fullscreen-video-background-wrapper video {object-fit: <?php echo esc_attr( $enweby_fb_video_background_fit ); ?>; position: <?php echo esc_attr( $enweby_fb_video_background_position ); ?> ; }
							#page{position:relative;z-index:99999;}
						</style>
						<div class='enweby-fullscreen-video-background-wrapper'>
							<video playsinline autoplay muted loop poster=''>
								<source src='<?php echo esc_url( $background_video ); ?>' type='video/webm'>
								<source src='<?php echo esc_url( $background_video ); ?>' type='video/mp4'>
								Your browser does not support the video tag.
							</video>
						</div>
						<?php
					}
				}
				if ( 'page' === $enweby_fb_display_options ) {
					if ( get_the_id() === (int) get_option( 'enweby_fb_page_field_id', '' ) ) {
						?>
						<style> 
							.enweby-fullscreen-video-background-wrapper video {object-fit: <?php echo esc_attr( $enweby_fb_video_background_fit ); ?>; position: <?php echo esc_attr( $enweby_fb_video_background_position ); ?> ; }
							#page{position:relative;z-index:99999;}
						</style>
						<div class='enweby-fullscreen-video-background-wrapper'>
							<video playsinline autoplay muted loop poster=''>
								<source src='<?php echo esc_url( $background_video ); ?>' type='video/webm'>
								<source src='<?php echo esc_url( $background_video ); ?>' type='video/mp4'>
								Your browser does not support the video tag.
							</video>
							</div>
						<?php
					}
				}
			}
		}

	}

	/**
	 * Setting up fullscreen background.
	 *
	 * @param  array $classes body classes in array.
	 * @return array
	 */
	public function fullscreen_background_body_classes( $classes ) {
		$enweby_fb_display_options = get_option( 'enweby_fb_display_options', 'home' );

		if ( is_front_page() && 'home' === $enweby_fb_display_options ) {
				$classes[] = 'enweby-fullscreen-background';
		}

		if ( 'all' === $enweby_fb_display_options ) {
				$classes[] = 'enweby-fullscreen-background';
		}

		if ( 'post' === $enweby_fb_display_options ) {
			if ( get_the_id() === (int) get_option( 'enweby_fb_post_field_id', '' ) ) {
				$classes[] = 'enweby-fullscreen-background';
			}
		}

		if ( 'page' === $enweby_fb_display_options ) {
			if ( get_the_id() === (int) get_option( 'enweby_fb_page_field_id', '' ) ) {
				$classes[] = 'enweby-fullscreen-background';
			}
		}

		return $classes;

	}

}
