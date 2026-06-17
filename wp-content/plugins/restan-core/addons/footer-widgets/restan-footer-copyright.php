<?php

/**
 * Elementor restan Footer  Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_restan_Footer_Copyright_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Footer Copyright widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_footer_copyright';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Footer Copyright Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Footer Copyright', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Footer_Copyright Nav Tab widget icon.
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
	 * Retrieve the list of categories the Footer_Copyright Nav Tab widget belongs to.
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
			'footer_Copyright_content_style',
			[
				'label'		=> esc_html__('Content Style', 'restan-core'),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'copyright_text',
			[
				'label' 		=> esc_html__('Copyright Text', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('copyright text', 'restan-core'),
				'default' 		=> esc_html__('Copyright Text', 'restan-core'),
				'rows'   		=> '3',
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
			'footer_Copyright_style_option',
			[
				'label'			=> esc_html__('Footer Copyright Style', 'restan-core'),
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
					'{{WRAPPER}} .footer-bottom p' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> esc_html__('Title Typography', 'restan-core'),
				'selector' 		=> '{{WRAPPER}} .footer-bottom p',
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
					'{{WRAPPER}} .menu-copyright-menu-container ul li a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'menu_title_typography',
				'label' 		=> esc_html__('Title Typography', 'restan-core'),
				'selector' 		=> '{{WRAPPER}} .menu-copyright-menu-container ul li a',
			]
		);
		$this->end_controls_section();
	}

	// Output For User
	protected function render()
	{
		$restan_footer_copyright_output = $this->get_settings_for_display();
?>

		<!-- Start Footer Copyright 
    ============================================= -->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<p><?php echo wp_kses($restan_footer_copyright_output['copyright_text'], 'restan_allowed_tags'); ?></p>
					</div>
					<div class="col-lg-6 text-end">
						<?php
						foreach ($restan_footer_copyright_output['nav_menus'] as $footer_nav_menu) : ?>
							<?php wp_nav_menu(array(
								'menu' => $footer_nav_menu['nav_menu'],
							));
							?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Copyright 
    ============================================= -->

<?php
	}
}
