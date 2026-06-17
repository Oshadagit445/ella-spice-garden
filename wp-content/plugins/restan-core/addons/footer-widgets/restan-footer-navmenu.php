<?php

/**
 * Elementor restan Footer  Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Footer_Navmenu_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Footer Navmenu widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_footer_navmenu';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Footer_Navmenu Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Footer Navmenu', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Footer_Navmenu Nav Tab widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-code';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Footer_Navmenu Nav Tab widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories()
	{
		return ['restan_footer_elements'];
	}

	// Add The Input For User
	protected function register_controls()
	{
		$this->start_controls_section(
			'footer_Navmenu_content_style',
			[
				'label'		=> esc_html__('Content Style', 'restan-core'),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Section Title', 'restan-core'),
				'rows'   		=> '1',
				'label_block' 	=> true,
			]
		);

		$nav_menus = new \Elementor\Repeater();

		$nav_menus->add_control(
			'nav_menu',
			[
				'label' => __('Select Nav Menu', 'apsro-addon'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => restan_get_nav_menu(),
				'label_block' => true,
			]
		);


		$this->add_control(
			'nav_menus',
			[
				'label' => __('Nav Menus', 'apsro-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $nav_menus->get_controls(),
				'prevent_empty' => false,
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'footer_navmenu_style_option',
			[
				'label'			=> esc_html__('Footer Navmenu Style', 'restan-core'),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_option',
			[
				'label' 		=> esc_html__('Title Options', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' 		=> esc_html__('Title Color', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .widget-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> esc_html__('Title Typography', 'restan-core'),
				'selector' 		=> '{{WRAPPER}} .widget-title',
			]
		);

		$this->add_control(
			'menu_title_option',
			[
				'label' 		=> esc_html__('Menu Title Options', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'menu_title_color',
			[
				'label' 		=> esc_html__('Title Color', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .f-item ul li a' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'menu_title_typography',
				'label' 		=> esc_html__('Title Typography', 'restan-core'),
				'selector' 		=> '{{WRAPPER}} .f-item ul li a',
			]
		);
		$this->end_controls_section();
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
?>

	<!-- Start Footer_Navmenu  -->
    <div class="footer-item">
        <div class="f-item link">
         	<?php if (!empty($settings['section_title'])) : ?>
				<h4 class="widget-title"><?php echo wp_kses($settings['section_title'], 'restan_allowed_tags'); ?></h4>
			<?php endif; ?>
            <?php
				foreach ($settings['nav_menus'] as $footer_nav_menu) : ?>
					<?php wp_nav_menu(array(
						'menu' => $footer_nav_menu['nav_menu'],
					));
					?>
			<?php endforeach; ?>
        </div>
    </div>
	<!-- End Footer_Navmenu  -->
<?php
	}
}
