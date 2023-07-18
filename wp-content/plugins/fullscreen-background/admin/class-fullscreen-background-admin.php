<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.enweby.com/
 * @since      1.0.0
 *
 * @package    Fullscreen_Background
 * @subpackage Fullscreen_Background/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Fullscreen_Background
 * @subpackage Fullscreen_Background/admin
 * @author     Enweby <support@enweby.com>
 */
class Fullscreen_Background_Admin {

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
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fullscreen-background-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/fullscreen-background-admin.js', array( 'jquery' ), $this->version, false );

	}

		/**
		 * To add Plugin Menu and Settings page
		 */
	public function plugin_menu_settings() {
		// Main Menu Item.
		add_menu_page(
			'Enweby Full Screen Background Settings',
			'Full Screen Background',
			'manage_options',
			'fullscreen-background',
			array( $this, 'fullscreen_background_main_menu' ),
			'dashicons-format-image',
			60
		);
	}

	/**
	 * Admin Page Display
	 */
	public function fullscreen_background_main_menu() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/fb-main-menu.php';
	}

	/**
	 * Setting plugin menu element
	 */
	public function menu_settings_using_helper() {

		require_once FULLSCREEN_BACKGROUND_DIR . 'vendor/boo-settings-helper/class-boo-settings-helper.php';

		$fullscreen_background_settings = array(
			'tabs'     => true,
			'prefix'   => 'enweby_',
			'menu'     => array(
				'slug'       => $this->plugin_name,
				'page_title' => __( 'fullscreen-background', 'fullscreen-background' ),
				'menu_title' => __( 'Full Screen Background', 'fullscreen-background' ),
				'parent'     => 'admin.php?page=fullscreen-background',
				'submenu'    => true,
			),
			'sections' => array(
				// General Section.
				array(
					'id'    => 'fb_general_section',
					'title' => __( 'Fullscreen Background', 'fullscreen-background' ),
				),
			),
			'fields'   => array(
				// fields for General section.
				'fb_general_section' => array(
					array(
						'id'      => 'fb_display_options',
						'label'   => __( 'Display on', 'fullscreen-background' ),
						'type'    => 'select',
						'options' => array(
							'home' => __( 'Home Page Only', 'fullscreen-background' ),
							'all'  => __( 'All Pages', 'fullscreen-background' ),
							'page' => __( 'Specific Page', 'fullscreen-background' ),
							'post' => __( 'Specific post', 'fullscreen-background' ),
						),
					),
					array(
						'id'      => 'fb_page_field_id',
						'label'   => __( 'Select Page', 'fullscreen-background' ),
						// phpcs:disable
						/*'desc'    => __( 'List of Pages', 'fullscreen-background' ),*/
						// phpcs:enable
						'type'    => 'pages',
						'options' => array(
							'post_type' => 'page',
						),
					),
					array(
						'id'      => 'fb_post_field_id',
						'label'   => __( 'Select Post', 'fullscreen-background' ),
						// phpcs:disable
						/*'desc'    => __( 'List of Pages', 'fullscreen-background' ),*/
						// phpcs:enable
						'type'    => 'posts',
						'options' => array(
							'post_type' => 'post',
						),
					),
					array(
						'id'      => 'fb_background_type',
						'label'   => __( 'Set Full Screen Background as', 'fullscreen-background' ),
						'type'    => 'select',
						'options' => array(
							'image' => __( 'Image', 'fullscreen-background' ),
							'video' => __( 'Video', 'fullscreen-background' ),
							'color' => __( 'Color', 'fullscreen-background' ),
						),
					),
					array(
						'id'      => 'fb_bg_image',
						'label'   => __( 'Add/Edit Background Image', 'fullscreen-background' ),
						'desc'    => __( 'Add/Edit Background Image', 'fullscreen-background' ),
						'type'    => 'media',
						'default' => '',
						'options' => array(
							'btn'       => 'Add Media',
							'max_width' => 150,
						),
					),
					array(
						'id'      => 'fb_bg_video',
						'label'   => __( 'Add/Edit Background Video', 'fullscreen-background' ),
						'desc'    => __( 'Add/Edit Background Video here', 'fullscreen-background' ),
						'type'    => 'file',
						'default' => '',
						'options' => array(
							'btn' => 'Add Video',
						),
					),
					array(
						'id'    => 'fb_bg_color',
						'label' => __( 'Select Background Color', 'fullscreen-background' ),
						'type'  => 'color',
					),
					array(
						'id'      => 'fb_video_background_position',
						'label'   => __( 'Background Attachment', 'fullscreen-background' ),
						'type'    => 'select',
						'options' => array(
							'fixed'    => __( 'Fixed', 'fullscreen-background' ),
							'relative' => __( 'Relative', 'fullscreen-background' ),
							'inherit'  => __( 'Inherit', 'fullscreen-background' ),
						),
					),
					array(
						'id'      => 'fb_video_background_fit',
						'label'   => __( 'Video Object Fit', 'fullscreen-background' ),
						'type'    => 'select',
						'options' => array(
							'cover'   => __( 'Cover', 'fullscreen-background' ),
							'contain' => __( 'Contain', 'fullscreen-background' ),
							'inherit' => __( 'Inherit', 'fullscreen-background' ),
							'initial' => __( 'Initial', 'fullscreen-background' ),
						),
					),
					array(
						'id'      => 'fb_background_size',
						'label'   => __( 'Background Size', 'fullscreen-background' ),
						'type'    => 'select',
						'options' => array(
							'cover'   => __( 'Cover', 'fullscreen-background' ),
							'contain' => __( 'Contain', 'fullscreen-background' ),
							'inherit' => __( 'Inherit', 'fullscreen-background' ),
							'initial' => __( 'Initial', 'fullscreen-background' ),
						),
					),

					array(
						'id'      => 'fb_background_position',
						'label'   => __( 'Background Position', 'fullscreen-background' ),
						'type'    => 'select',
						'options' => array(
							'center center' => __( 'Center Center', 'fullscreen-background' ),
							'center top'    => __( 'Center Top', 'fullscreen-background' ),
							'center bottom' => __( 'Center Bottom', 'fullscreen-background' ),
							'left top'      => __( 'Left Top', 'fullscreen-background' ),
							'left center'   => __( 'Left Center', 'fullscreen-background' ),
							'left bottom'   => __( 'Left Bottom', 'fullscreen-background' ),
							'right top'     => __( 'Right Top', 'fullscreen-background' ),
							'right center'  => __( 'Right Center', 'fullscreen-background' ),
							'right bottom'  => __( 'Right Bottom', 'fullscreen-background' ),
						),
					),
					array(
						'id'      => 'fb_background_attachment',
						'label'   => __( 'Background Attachment', 'fullscreen-background' ),
						'type'    => 'select',
						'options' => array(
							'fixed'   => __( 'Fixed', 'fullscreen-background' ),
							'scroll'  => __( 'Scroll', 'fullscreen-background' ),
							'local'   => __( 'Local', 'fullscreen-background' ),
							'inherit' => __( 'Inherit', 'fullscreen-background' ),
							'initial' => __( 'Initial', 'fullscreen-background' ),
						),
					),
					// phpcs:disable
					/*
					//Overlay shadow
					array(
						'id'      => 'fb_overlay_shadow',
						'label'   => __( 'Enable Overlay Shadow', $this->plugin_name ),
						'type'    => 'select',
						'options' => array(
							'yes'   => __( 'Yes', $this->plugin_name ),
							'no' 	=> __( 'No', $this->plugin_name ),
						)
					),
					*/
					// phpcs:enable
				),
			),
		);
		new Boo_Settings_Helper( $fullscreen_background_settings );
	}

	/**
	 * Action links for admin.
	 *
	 * @param  array $links Array of action links.
	 * @return array
	 */
	public function plugin_action_links( $links ) {

		$settings_link = esc_url( add_query_arg( array( 'page' => 'fullscreen-background' ), admin_url( 'admin.php' ) ) );

		$new_links['settings'] = sprintf( '<a href="%1$s" title="%2$s">%2$s</a>', $settings_link, esc_attr__( 'Settings', 'fullscreen-background' ) );
		// phpcs:disable
		/*
		if ( ! class_exists( 'Fullscreen_Background_Pro' ) ){
			$pro_link = esc_url( add_query_arg( array( 'utm_source' => 'wp-admin-plugins', 'utm_medium' => 'go	-pro', 'utm_campaign' => 'fullscreen-background' ), 'https://www.enweby.com/shop/wordpress-plugins/fullscreen-background-pro/' ) );
			$new_links[ 'go-pro' ] = sprintf( '<a target="_blank" style="color: #45b450; font-weight: bold;" href="%1$s" title="%2$s">%2$s</a>', $pro_link, esc_attr__('Go Pro', 'fullscreen-background' ) );
		}*/
		// phpcs:enable
		return array_merge( $links, $new_links );
	}

	/**
	 * Plugin row meta.
	 *
	 * @param  array  $links array of row meta.
	 * @param  string $file  plugin base name.
	 * @return array
	 */
	public function plugin_row_meta( $links, $file ) {
		// phpcs:ignore
		if ( $file === FULLSCREEN_BACKGROUND_BASE_NAME ) {

			$report_url = add_query_arg(
				array(
					'utm_source'   => 'wp-admin-plugins',
					'utm_medium'   => 'row-meta-link',
					'utm_campaign' => 'fullscreen-background',
				),
				'https://www.enweby.com/shop/wordpress-plugins/fullscreen-background#support/'
			);

			$documentation_url = add_query_arg(
				array(
					'utm_source'   => 'wp-admin-plugins',
					'utm_medium'   => 'row-meta-link',
					'utm_campaign' => 'fullscreen-background',
				),
				'https://www.enweby.com/shop/wordpress-plugins/fullscreen-background#documentation/'
			);

			$row_meta['documentation'] = sprintf( '<a target="_blank" href="%1$s" title="%2$s">%2$s</a>', esc_url( $documentation_url ), esc_html__( 'Documentation', 'fullscreen-background' ) );
			// phpcs:ignore
			$row_meta['issues']        = sprintf( '%2$s <a target="_blank" href="%1$s">%3$s</a>', esc_url( $report_url ), esc_html__( '', 'fullscreen-background' ), '<span style="color: #45b450;font-weight:bold;">' . esc_html__( 'Get Support', 'fullscreen-background' ) . '</span>' );

			return array_merge( $links, $row_meta );
		}
		return (array) $links;
	}

}
