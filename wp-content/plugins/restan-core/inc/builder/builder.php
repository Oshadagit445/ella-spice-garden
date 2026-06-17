<?php

/**
 * Class For Builder
 */
class restanBuilder
{

	function __construct()
	{
		// register admin menus
		add_action('admin_menu', [$this, 'register_settings_menus']);

		// Custom Footer Builder With Post Type
		add_action('init', [$this, 'post_type'], 0);

		add_action('elementor/frontend/after_enqueue_scripts', [$this, 'widget_scripts']);

		add_filter('single_template', [$this, 'load_canvas_template']);

		add_action('elementor/element/wp-page/document_settings/after_section_end', [$this, 'restan_add_elementor_page_settings_controls'], 10, 2);
	}

	public function widget_scripts()
	{
		wp_enqueue_script('restan-core', RESTAN_PLUGDIRURI . 'assets/js/restan-core.js', array('jquery'), '1.0', true);
	}


	public function restan_add_elementor_page_settings_controls(\Elementor\Core\DocumentTypes\Page $page)
	{

		$page->start_controls_section(
			'restan_header_option',
			[
				'label'     => __('Header Option', 'restan'),
				'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
			]
		);


		$page->add_control(
			'restan_header_style',
			[
				'label'     => __('Header Option', 'restan'),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => [
					'prebuilt'             => __('Pre Built', 'restan'),
					'header_builder'       => __('Header Builder', 'restan'),
				],
				'default'   => 'prebuilt',
			]
		);

		$page->add_control(
			'restan_header_builder_option',
			[
				'label'     => __('Header Name', 'restan'),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => $this->restan_header_choose_option(),
				'condition' => ['restan_header_style' => 'header_builder'],
				'default'	=> ''
			]
		);

		$page->end_controls_section();

		$page->start_controls_section(
			'restan_footer_option',
			[
				'label'     => __('Footer Option', 'restan'),
				'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
			]
		);
		$page->add_control(
			'restan_footer_choice',
			[
				'label'         => __('Enable Footer?', 'restan'),
				'type'          => \Elementor\Controls_Manager::SWITCHER,
				'label_on'      => __('Yes', 'restan'),
				'label_off'     => __('No', 'restan'),
				'return_value'  => 'yes',
				'default'       => 'yes',
			]
		);
		$page->add_control(
			'restan_footer_style',
			[
				'label'     => __('Footer Style', 'restan'),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => [
					'prebuilt'             => __('Pre Built', 'restan'),
					'footer_builder'       => __('Footer Builder', 'restan'),
				],
				'default'   => 'prebuilt',
				'condition' => ['restan_footer_choice' => 'yes'],
			]
		);
		$page->add_control(
			'restan_footer_builder_option',
			[
				'label'     => __('Footer Name', 'restan'),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => $this->restan_footer_choose_option(),
				'condition' => ['restan_footer_style' => 'footer_builder', 'restan_footer_choice' => 'yes'],
				'default'	=> ''
			]
		);

		$page->end_controls_section();
	}

	public function register_settings_menus()
	{
		add_menu_page(
			esc_html__('Restan Builder', 'restan'),
			esc_html__('Restan Builder', 'restan'),
			'manage_options',
			'restan',
			[$this, 'register_settings_contents__settings'],
			'dashicons-admin-site',
			2
		);

		add_submenu_page('restan', esc_html__('Footer Builder', 'restan'), esc_html__('Footer Builder', 'restan'), 'manage_options', 'edit.php?post_type=restan_footer');
		add_submenu_page('restan', esc_html__('Header Builder', 'restan'), esc_html__('Header Builder', 'restan'), 'manage_options', 'edit.php?post_type=restan_header');
		add_submenu_page('restan', esc_html__('Tab Builder', 'restan'), esc_html__('Tab Builder', 'restan'), 'manage_options', 'edit.php?post_type=restan_tab_builder');
		add_submenu_page('restan', esc_html__('Megamenu', 'restan'), esc_html__('Megamenu', 'restan'), 'manage_options', 'edit.php?post_type=restan_megamenu');
	}

	// Callback Function
	public function register_settings_contents__settings()
	{
		echo '<h2>';
		echo esc_html__('Welcome To Header And Footer Builder Of This Theme', 'restan');
		echo '</h2>';
	}

	public function post_type()
	{

		$labels = array(
			'name'               => __('Footer', 'restan'),
			'singular_name'      => __('Footer', 'restan'),
			'menu_name'          => __('restan Footer Builder', 'restan'),
			'name_admin_bar'     => __('Footer', 'restan'),
			'add_new'            => __('Add New', 'restan'),
			'add_new_item'       => __('Add New Footer', 'restan'),
			'new_item'           => __('New Footer', 'restan'),
			'edit_item'          => __('Edit Footer', 'restan'),
			'view_item'          => __('View Footer', 'restan'),
			'all_items'          => __('All Footer', 'restan'),
			'search_items'       => __('Search Footer', 'restan'),
			'parent_item_colon'  => __('Parent Footer:', 'restan'),
			'not_found'          => __('No Footer found.', 'restan'),
			'not_found_in_trash' => __('No Footer found in Trash.', 'restan'),
		);

		$args = array(
			'labels'              => $labels,
			'public'              => true,
			'rewrite'             => false,
			'show_ui'             => true,
			'show_in_menu'        => false,
			'show_in_nav_menus'   => false,
			'exclude_from_search' => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'supports'            => array('title', 'elementor'),
		);

		register_post_type('restan_footer', $args);

		$labels = array(
			'name'               => __('Header', 'restan'),
			'singular_name'      => __('Header', 'restan'),
			'menu_name'          => __('restan Header Builder', 'restan'),
			'name_admin_bar'     => __('Header', 'restan'),
			'add_new'            => __('Add New', 'restan'),
			'add_new_item'       => __('Add New Header', 'restan'),
			'new_item'           => __('New Header', 'restan'),
			'edit_item'          => __('Edit Header', 'restan'),
			'view_item'          => __('View Header', 'restan'),
			'all_items'          => __('All Header', 'restan'),
			'search_items'       => __('Search Header', 'restan'),
			'parent_item_colon'  => __('Parent Header:', 'restan'),
			'not_found'          => __('No Header found.', 'restan'),
			'not_found_in_trash' => __('No Header found in Trash.', 'restan'),
		);

		$args = array(
			'labels'              => $labels,
			'public'              => true,
			'rewrite'             => false,
			'show_ui'             => true,
			'show_in_menu'        => false,
			'show_in_nav_menus'   => false,
			'exclude_from_search' => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'supports'            => array('title', 'elementor'),
		);

		register_post_type('restan_header', $args);

		$labels = array(
			'name'               => __('Tab Builder', 'restan'),
			'singular_name'      => __('Tab Builder', 'restan'),
			'menu_name'          => __('restan Tab Builder', 'restan'),
			'name_admin_bar'     => __('Tab Builder', 'restan'),
			'add_new'            => __('Add New', 'restan'),
			'add_new_item'       => __('Add New Tab Builder', 'restan'),
			'new_item'           => __('New Tab Builder', 'restan'),
			'edit_item'          => __('Edit Tab Builder', 'restan'),
			'view_item'          => __('View Tab Builder', 'restan'),
			'all_items'          => __('All Tab Builder', 'restan'),
			'search_items'       => __('Search Tab Builder', 'restan'),
			'parent_item_colon'  => __('Parent Tab Builder:', 'restan'),
			'not_found'          => __('No Tab Builder found.', 'restan'),
			'not_found_in_trash' => __('No Tab Builder found in Trash.', 'restan'),
		);

		$args = array(
			'labels'              => $labels,
			'public'              => true,
			'rewrite'             => false,
			'show_ui'             => true,
			'show_in_menu'        => false,
			'show_in_nav_menus'   => false,
			'exclude_from_search' => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'supports'            => array('title', 'elementor'),
		);

		register_post_type('restan_tab_builder', $args);

		$labels = array(
			'name'               => __( 'Megamenu', 'restan' ),
			'singular_name'      => __( 'Megamenu', 'restan' ),
			'menu_name'          => __( 'restan Megamenu', 'restan' ),
			'name_admin_bar'     => __( 'Megamenu', 'restan' ),
			'add_new'            => __( 'Add New', 'restan' ),
			'add_new_item'       => __( 'Add New Megamenu', 'restan' ),
			'new_item'           => __( 'New Megamenu', 'restan' ),
			'edit_item'          => __( 'Edit Megamenu', 'restan' ),
			'view_item'          => __( 'View Megamenu', 'restan' ),
			'all_items'          => __( 'All Megamenu', 'restan' ),
			'search_items'       => __( 'Search Megamenu', 'restan' ),
			'parent_item_colon'  => __( 'Parent Megamenu:', 'restan' ),
			'not_found'          => __( 'No Megamenu found.', 'restan' ),
			'not_found_in_trash' => __( 'No Megamenu found in Trash.', 'restan' ),
		);

		$args = array(
			'labels'              => $labels,
			'public'              => true,
			'rewrite'             => false,
			'show_ui'             => true,
			'show_in_menu'        => false,
			'show_in_nav_menus'   => false,
			'exclude_from_search' => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'supports'            => array( 'title', 'elementor' ),
		);

		register_post_type( 'restan_megamenu', $args );
	}

	function load_canvas_template($single_template)
	{

		global $post;

		if ('restan_footer' == $post->post_type || 'restan_header' == $post->post_type || 'restan_tab_builder' == $post->post_type ) {

			$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

			if (file_exists($elementor_2_0_canvas)) {
				return $elementor_2_0_canvas;
			} else {
				return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
			}
		}

		return $single_template;
	}

	public function restan_footer_choose_option()
	{

		$restan_post_query = new WP_Query(array(
			'post_type'			=> 'restan_footer',
			'posts_per_page'	    => -1,
		));

		$restan_builder_post_title = array();
		$restan_builder_post_title[''] = __('Select a Footer', 'restan');

		while ($restan_post_query->have_posts()) {
			$restan_post_query->the_post();
			$restan_builder_post_title[get_the_ID()] =  get_the_title();
		}
		wp_reset_postdata();

		return $restan_builder_post_title;
	}

	public function restan_header_choose_option()
	{

		$restan_post_query = new WP_Query(array(
			'post_type'			=> 'restan_header',
			'posts_per_page'	    => -1,
		));

		$restan_builder_post_title = array();
		$restan_builder_post_title[''] = __('Select a Header', 'restan');

		while ($restan_post_query->have_posts()) {
			$restan_post_query->the_post();
			$restan_builder_post_title[get_the_ID()] =  get_the_title();
		}
		wp_reset_postdata();

		return $restan_builder_post_title;
	}
}

$builder_execute = new restanBuilder();
