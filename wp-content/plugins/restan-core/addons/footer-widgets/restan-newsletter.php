<?php

/**
 * Elementor restan Footer Newsletter Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Footer_Newsletter_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Footer Newsletter widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_footer_newsletter';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Footer_Newsletter Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Footer Newsletter', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Footer_Newsletter Nav Tab widget icon.
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
	 * Retrieve the list of categories the Footer_Newsletter Nav Tab widget belongs to.
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
			'footer_newsletter_content_style',
			[
				'label'		=> esc_html__('Content Style', 'restan-core'),
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
					'1'  	=> esc_html__('Style One', 'restan-core')
				],
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

		$this->add_control(
			'section_subtitle',
			[
				'label' 		=> esc_html__('SubTitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Section SubTitle', 'restan-core'),
				'rows'   		=> '2',
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'newsletter_placeholder',
			[
				'label'     => __('Newsletter Placeholder Text', 'restan-core'),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'default'   => __('Newsletter Placeholder Text', 'restan-core'),
			]
		);

		$this->add_control(
			'privacy_text',
			[
				'label'     => __('Privacy Text', 'restan-core'),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'default'   => __('Privacy Text', 'restan-core')
			]
		);

		$social = new \Elementor\Repeater();

		$social->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__('Icon Style', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__('Flaticon', 'restan-core'),
					'3' 	=> esc_html__('Icon Image', 'restan-core'),
					'2'  	=> esc_html__('Custom Icon', 'restan-core'),
				],
			]
		);

		$social->add_control(
			'flat_icon',
			[
				'label'      => esc_html__('Icon One', 'cleanu-core'),
				'type'       => \Elementor\Controls_Manager::ICON,
				'options'    => restan_flaticons(),
				'include'    => restan_include_flaticons(),
				'default'    => 'flaticon-budget',
				'condition' => [
					'icon_style' => '1'
				]
			]
		);

		$social->add_control(
			'custom_icon',
			[
				'label' 		=> esc_html__('Custom Icon', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' => [
					'icon_style' => '2'
				]
			]
		);


		$social->add_control(
			'icon_image',
			[
				'label'			=> esc_html__('Add Image Icon', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'icon_style' => '3'
				]
			]
		);

		$social->add_control(
			'url',
			[
				'label' => __('Add Url', 'apsro-addon'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('#', 'apsro-addon'),
				'show_external' => false,
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
				'show_label' => false,
			]
		);

		$this->add_control(
			'social_list',
			[
				'label' => __('Social List', 'apsro-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $social->get_controls(),
				'prevent_empty' => false,
				'default' => [
					[
						'social_url' => [
							'url' => '#',
							'is_external' => false,
							'nofollow' => false,
						],
					],
				],

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'footer_Newsletter_style_option',
			[
				'label'			=> esc_html__('Footer Newsletter Style', 'restan-core'),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'open_hours_title_option',
			[
				'label' 		=> esc_html__('Title Options', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'open_hours_title_color',
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
				'name' 			=> 'open_hours_title_typography',
				'label' 		=> esc_html__('Title Typography', 'restan-core'),
				'selector' 		=> '{{WRAPPER}} .widget-title',
			]
		);

		$this->add_control(
			'section_subtitle_option',
			[
				'label' 		=> esc_html__('Sub-Title Options', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'section_sub_title_color',
			[
				'label' 		=> esc_html__('Sub Title Color', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .footer-item-subscribe p' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_subtitle_typography',
				'label' 		=> esc_html__('Subtitle Typography', 'restan-core'),
				'selector' 		=> '{{WRAPPER}} .footer-item-subscribe p',
			]
		);

		$this->end_controls_section();
	}

	// Output For User
	protected function render()
	{
		$restan_footer_newsletter_output = $this->get_settings_for_display();
		if ($restan_footer_newsletter_output['style'] == '1') :
	?>

	<!-- Start Footer_Newsletter 
	 ============================================= -->
	<div class="footer-item">
        <h4 class="widget-title"><?php echo wp_kses($restan_footer_newsletter_output['section_title'], 'restan_allowed_tags'); ?></h4>
        <p>
           <?php echo wp_kses($restan_footer_newsletter_output['section_subtitle'], 'restan_allowed_tags'); ?>
        </p>
        <div class="f-item newsletter">
            <form class="newsletter-form">
                <input type="email" placeholder="<?php echo esc_attr($restan_footer_newsletter_output['newsletter_placeholder']); ?>" class="form-control" name="email">
                <button type="submit"> <i class="fas fa-arrow-right"></i></button>  
            </form>
        </div>
        <fieldset>
            <input type="checkbox" id="privacy" name="privacy">
            <label for="privacy"><?php echo wp_kses($restan_footer_newsletter_output['privacy_text'], 'restan_allowed_tags'); ?></label>
        </fieldset>
    </div>
    <!-- End Singel Item -->

	<?php
		endif;
	}
}
