<?php

/**
 * Elementor Restan Service Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Service_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Service widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_service';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Service Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Service', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Service Nav Tab widget icon.
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
	 * Retrieve the list of categories the Service Nav Tab widget belongs to.
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
			'restan_service_style',
			[
				'label'		=> esc_html__('Service Style', 'restan-core'),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__('Service Style', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__('Style One', 'restan-core'),
				],
			]
		);


		$this->add_control(
			'section_title',
			[
				'label' 		=> esc_html__('Section Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('section title', 'restan-core'),
				'default' 		=> esc_html__('Default Section Title', 'restan-core'),
				'condition' => [
					'style' => ['1']
				]
			]

		);

		$this->add_control(
			'section_subtitle',
			[
				'label' 		=> esc_html__('Section Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('section subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default Section SubTitle', 'restan-core'),
				'condition' => [
					'style' => ['1']
				]

			]

		);

		$this->add_control(
		    'subtitle_shape',
		    [
		        'label' => esc_html__('Subtitle Shape', 'agrofa-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .sub-heading::before' => 'background-image:url({{URL}});',
		        ],
		        'condition' => [
					'style' => ['1']
				]
		    ]
		);

		$layout_one_service_list = new \Elementor\Repeater();

		$layout_one_service_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$layout_one_service_list->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Sub Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('sub-title', 'restan-core'),
				'default' 		=> esc_html__('Default Sub Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$layout_one_service_list->add_control(
			'info',
			[
				'label' 		=> esc_html__('Info', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('content', 'restan-core'),
				'default' 		=> esc_html__('Default Content', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$layout_one_service_list->add_control(
			'button_label',
			[
				'label' 		=> esc_html__('Button Label', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__('button label', 'restan-core'),
				'default' 		=> esc_html__('Button Label', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$layout_one_service_list->add_control(
			'url',
			[
				'label' 		=> esc_html__('URL', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__('https://your-link.com', 'restan-core'),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);


		$layout_one_service_list->add_control(
			'service_image',
			[
				'label'			=> esc_html__('Add Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'layout_one_service_list',
			[
				'label' 	=> esc_html__('Service', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $layout_one_service_list->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Service', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'prevent_empty' => false,
				'condition' => [
					'style' => '1'
				]
			]
		);

		$this->add_control(
			'service_shape_one',
			[
				'label'			=> esc_html__('Background Shape One', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'service-style.php';
	}

	// Output For User
	protected function render()
	{
		$restan_service_output = $this->get_settings_for_display();
		if ($restan_service_output['style'] == '1') :
	?>
	<!-- Start Services style one
	============================================= -->
	<div class="services-style-one-area default-padding bg-gray" style="background-image: url(<?php echo esc_url($restan_service_output['service_shape_one']['url']);?>);">
		<?php if (!empty($restan_service_output['section_subtitle'] || $restan_service_output['section_title'])) : ?>
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-6">
	                    <div class="site-heading">
	                        <h4 class="sub-heading"><?php echo wp_kses_post($restan_service_output['section_subtitle'], 'restan_kses_allowed_html'); ?></h4>
	                        <h2 class="title"><?php echo wp_kses_post($restan_service_output['section_title'], 'restan_kses_allowed_html'); ?></h2>
	                    </div>
	                </div>
	            </div>
	        </div>
        <?php endif; ?>
        <div class="services-style-one-items">
            <div class="container">
                <div class="relative">
                    <!-- Navigation -->
                    <div class="services-swiper-nav">
                        <div class="services-cat-prev"></div>
                        <div class="services-cat-next"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="services-style-one-carousel swiper">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                <?php
									$counter = 1;
									foreach ($restan_service_output['layout_one_service_list'] as $single_service) :
								?>	
                                    <!-- Single Item -->
                                    <div class="swiper-slide">
                                        <div class="services-style-one">
                                            <div class="thumb">
                                                <?php
												if (!empty($single_service['service_image']['url'])) :
													echo restan_img_tag(array(
														'url'   => esc_url($single_service['service_image']['url'])
													));
												endif;
												?>
                                                <h4>
                                                	<a href="<?php echo esc_url($single_service['url']['url']);?>"><?php echo wp_kses_post($single_service['title'], 'restan_kses_allowed_html'); ?>
                                                	</a>
                                                </h4>
                                            </div>
                                            <div class="info">
                                                <ul>
                                                    <?php echo wp_kses_post($single_service['info'], 'restan_kses_allowed_html'); ?>
                                                </ul>
                                                <p>
                                                   <?php echo wp_kses_post($single_service['subtitle'], 'restan_kses_allowed_html'); ?>
                                                </p>
                                                <?php if (!empty($single_service['button_label'])) : ?>
                                                	<a class="btn btn-light circle btn-md animation" href="<?php echo esc_url($single_service['url']['url']);?>"><?php echo wp_kses_post($single_service['button_label'], 'restan_kses_allowed_html'); ?></a>
                                            	<?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                <?php 
                                	$counter++;
									endforeach;
								?>    
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Services style one -->
	<?php
		endif;
	}
}
