<?php

/**
 * Elementor restan Footer About Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Footer_Contact_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Footer About widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_footer_contact';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Footer_About Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Footer Contact', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Footer_About Nav Tab widget icon.
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
	 * Retrieve the list of categories the Footer_About Nav Tab widget belongs to.
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
			'footer_contact_style',
			[
				'label'		=> esc_html__('Content Style', 'restan-core'),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' 		=> esc_html__('Section Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('section Title', 'restan-core'),
				'default' 		=> esc_html__('Default Section Title', 'restan-core'),
				'rows'   		=> '4',
				'label_block' 	=> true,
			]
		);

		$contact_info_list = new \Elementor\Repeater();

		$contact_info_list->add_control(
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

		$contact_info_list->add_control(
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

		$contact_info_list->add_control(
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


		$contact_info_list->add_control(
			'icon_image',
			[
				'label'			=> esc_html__('Add Image Icon', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'icon_style' => '3'
				]
			]
		);

		$contact_info_list->add_control(
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
				'show_label' => true,
			]
		);


		$contact_info_list->add_control(
			'contact_info',
			[
				'label' 		=> esc_html__('Contact Info', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('Contact Info', 'restan-core'),
				'default' 		=> esc_html__('Default Contact Info', 'restan-core'),
				'rows'   		=> '4',
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'contact_info_list',
			[
				'label' => __('Contact Info List', 'apsro-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $contact_info_list->get_controls(),
				'prevent_empty' => false,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'footer_about_style_option',
			[
				'label'			=> esc_html__('Footer About Style', 'restan-core'),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'open_hours_title_option',
			[
				'label' 		=> esc_html__('Open Hours Options', 'restan-core'),
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
					'{{WRAPPER}} .opening-hours h5' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'open_hours_title_typography',
				'label' 		=> esc_html__('Title Typography', 'restan-core'),
				'selector' 		=> '{{WRAPPER}} .opening-hours h5',
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
					'{{WRAPPER}} .about p' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_subtitle_typography',
				'label' 		=> esc_html__('Subtitle Typography', 'restan-core'),
				'selector' 		=> '{{WRAPPER}} .about p',
			]
		);

		$this->add_control(
			'day_option',
			[
				'label' 		=> esc_html__('Day Options', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'day_color',
			[
				'label' 		=> esc_html__('Day Color', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .opening-hours .working-day' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'day_typography',
				'label' 		=> esc_html__('Day Typography', 'restan-core'),
				'selector' 		=> '{{WRAPPER}} .opening-hours .working-day',
			]
		);

		$this->add_control(
			'time_option',
			[
				'label' 		=> esc_html__('Time Options', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'time_color',
			[
				'label' 		=> esc_html__('Time Color', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .opening-hours .working-hour' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'time_typography',
				'label' 		=> esc_html__('Time Typography', 'restan-core'),
				'selector' 		=> '{{WRAPPER}} .opening-hours .working-hour',
			]
		);




		$this->end_controls_section();
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
?>

	<!-- Start Footer_About  -->
   <div class="footer-item">
      <div class="f-item contact">
          <h4 class="widget-title"><?php echo wp_kses($settings['section_title'], 'restan_allowed_tags'); ?></h4>
          <ul>
          		<?php
						foreach ($settings['contact_info_list'] as $single_item) :
					?>
               <li>
                  <div class="icon">
                      <?php if (!empty($single_item['flat_icon'])) : ?>
								<i class="<?php echo esc_attr($single_item['flat_icon']); ?>"></i>
							<?php endif; ?>
							<?php if (!empty($single_item['icon_image']['url'])) : ?>
								<img src="<?php echo esc_url($single_item['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
							<?php endif; ?>
							<?php
							if (!empty($single_item['custom_icon'])) : ?>
								<i class="<?php echo esc_attr($single_item['custom_icon']); ?>"></i>
							<?php endif; ?>
                  </div>
                  <div class="content">
                    <?php echo wp_kses($single_item['contact_info'], 'restan_allowed_tags'); ?>
                  </div>
              </li>
              <?php endforeach; ?>
          </ul>
      </div>
   </div>
   <!-- End Singel Item -->
	<!-- End Footer_About  -->
<?php
	}
}
