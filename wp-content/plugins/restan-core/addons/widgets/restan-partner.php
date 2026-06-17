<?php

/**
 * Elementor restan Partner Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Partner_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve restan Partner widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_partner';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve restan Partner widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Partner', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve restan Brand widget icon.
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
	 * Retrieve the list of categories the restan Partner widget belongs to.
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

	// Add The Input For User
	protected function register_controls()
	{

		$this->start_controls_section(
			'restan_partner_content',
			[
				'label'		=> esc_html__('Set Partner Content', 'restan-core'),
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

		$this->add_control(
			'partner_title',
			[
				'label' 		=> esc_html__('Partner Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'          => '2',
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
		    'title_shape_before',
		    [
		        'label' => esc_html__('Title Before Shape', 'agrofa-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .sub-title::before' => 'background-image:url({{URL}});',
		        ],
		        'condition' => [
					'style' => ['1']
				]
		    ]
		);

		$this->add_control(
		    'title_shape_after',
		    [
		        'label' => esc_html__('Title After Shape', 'agrofa-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .sub-title::after' => 'background-image:url({{URL}});',
		        ],
		        'condition' => [
					'style' => ['1']
				]
		    ]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'brand_image',
			[
				'label'			=> esc_html__('Add Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'brand_image_list',
			[
				'label' 	=> esc_html__('Partner List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'prevent_empty' => 'false',
			]
		);

		$this->add_control(
			'background_image',
			[
				'label'			=> esc_html__('Add Background Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'partner-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$restan_brand_list = $settings['brand_image_list'];
		if ($settings['style'] == '1') :
	?>
	<!-- Start Brand 
    ============================================= -->
    <div class="brand-area overflow-hidden default-padding bg-cover text-center bg-gray" style="background-image: url(<?php echo esc_url($settings['background_image']['url']);?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                	<?php if (!empty($settings['partner_title'])) : ?>
                    	<h4 class="sub-title"><?php echo wp_kses($settings['partner_title'], 'restan_allowed_tags'); ?>
                    	</h4>
                    <?php endif; ?>
                    <div class="brand-style-one-carousel swiper mt-40">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Single Item -->
                            <?php foreach ($restan_brand_list as $single_brand) :
								?>
	                            <div class="swiper-slide">
	                                <img src="<?php echo esc_url($single_brand['brand_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
	                            </div>
                            <!-- End Single Item -->
                           	<?php 
							endforeach; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Brand -->

	<?php
		endif;
	}
}
