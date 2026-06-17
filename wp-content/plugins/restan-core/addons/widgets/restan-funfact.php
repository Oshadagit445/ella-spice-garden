<?php

/**
 * Elementor Funfactor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Funfactor_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Funfactor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_funfactor';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Funfactor widget title.
	 *
	 * @since 1.0.0
	 * @access public 
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Funfactor', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Funfactor widget icon.
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
	 * Retrieve the list of categories the Funfactor widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories()
	{
		return ['restan_elements'];
	}

	public function get_script_depends()
	{
		return array('main');
	}

	// Add The Input For User
	protected function register_controls()
	{


		$this->start_controls_section(
			'funfactor_content',
			[
				'label'		=> esc_html__('Set Content', 'restan-core'),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__('Style', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__('Style One', 'restan-core'),
				],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'number',
			[
				'label' 		=> esc_html__('Number', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'operator',
			[
				'label' 		=> esc_html__('Operator', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'funfact_list',
			[
				'label' 	=> esc_html__('Funfact List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Funfact', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'funfact-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
	?>
	<!-- Start Fun Factor Area
    ============================================= -->
    <div class="fun-facts-area text-center bg-dark text-light default-padding">
        <div class="container">
            <div class="item-inner">
                <div class="row">
                	<?php
						foreach ($settings['funfact_list'] as $single_funfact) :
					?>
	                    <div class="col-lg-3 col-md-6 item">
	                        <div class="fun-fact">
	                            <div class="counter">
	                                <div class="timer" data-to="<?php echo esc_attr($single_funfact['number']); ?>" data-speed="2000"><?php echo esc_html($single_funfact['number']); ?></div>
	                                <div class="operator"><?php echo wp_kses_post($single_funfact['operator'], 'restan_kses_allowed_html'); ?></div>
	                            </div>
	                            <span class="medium"><?php echo wp_kses_post($single_funfact['title'], 'restan_kses_allowed_html'); ?></span>
	                        </div>
	                    </div>
                    <?php
						endforeach;
					?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Fun Factor Area -->

<?php
		endif;
	}
}
