<?php

/**
 * Elementor restan Testimonial Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Testomonial_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Testimonial widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_testimoanial';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Testimonial Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Testimoanial', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Testimonial Nav Tab widget icon.
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
	 * Retrieve the list of categories the Testimonial Nav Tab widget belongs to.
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
			'restan_testimoanial_carousel_style',
			[
				'label'		=> esc_html__('Testimonial Content Style', 'restan-core'),
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
			'sec_title',
			[
				'label' 		=> esc_html__('Section Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('section title', 'restan-core'),
				'default' 		=> esc_html__('Default Section Title', 'restan-core'),
				'rows'          => '2',
				'condition'		=> ['style'	=>	'1'],
			]

		);

		$this->add_control(
			'sec_subtitle',
			[
				'label' 		=> esc_html__('Section Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('section subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default Section Sub Title', 'restan-core'),
				'rows'          => '2',
				'condition'		=> ['style'	=>	'1'],
			]

		);

		$this->add_control(
		    'subtitle_before_shape',
		    [
		        'label' => esc_html__('Subtitle Before Shape', 'agrofa-addon'),
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
		    'subtitle_after_shape',
		    [
		        'label' => esc_html__('Subtitle After Shape', 'agrofa-addon'),
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


		$testimonail_list_one = new \Elementor\Repeater();

		$testimonail_list_one->add_control(
			'name',
			[
				'label' 		=> esc_html__('Name', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('name', 'restan-core'),
				'default' 		=> esc_html__('Default Name', 'restan-core'),
				'rows' 			=> '1',
				'label_block' 	=> true,
			]
		);

		$testimonail_list_one->add_control(
			'designation',
			[
				'label' 		=> esc_html__('Designation', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('designation', 'restan-core'),
				'default' 		=> esc_html__('Default designation', 'restan-core'),
				'rows' 			=> '1',
				'label_block' 	=> true,
			]
		);

		$testimonail_list_one->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'rows' 			=> '1',
				'label_block' 	=> true,
			]
		);

		$testimonail_list_one->add_control(
			'content',
			[
				'label' 		=> esc_html__('Content', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('content', 'restan-core'),
				'rows' 			=> '2',
				'default' 		=> esc_html__('Default Content', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$testimonail_list_one->add_control(
			'rating',
			[
				'label' => __('Rating', 'apsro-addon'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['count'],
				'range' => [
					'count' => [
						'min' => 1,
						'max' => 5,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'count',
					'size' => 5,
				],
			]
		);


		$testimonail_list_one->add_control(
			'rating_text',
			[
				'label' 		=> esc_html__('Rating Text', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('rating text', 'restan-core'),
				'rows' 			=> '2',
				'default' 		=> esc_html__('Default Rating Text', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'testimonail_list',
			[
				'label' 	=> esc_html__('Testimonial', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $testimonail_list_one->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Testimonial', 'restan-core'),
					],
				],
				'condition'		=> ['style'	=>	'1'],
				'title_field' => '{{{ name }}}',
			]
		);

		$this->add_control(
			'image_one',
			[
				'label'			=> esc_html__('Image One', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition'		=> ['style'	=>	'1'],
			]
		);

		$this->add_control(
			'image_two',
			[
				'label'			=> esc_html__('Image Two', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition'		=> ['style'	=>	'1'],
			]
		);

		$this->add_control(
			'image_three',
			[
				'label'			=> esc_html__('Image Three', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition'		=> ['style'	=>	'1'],
			]
		);

		$this->add_control(
			'image_four',
			[
				'label'			=> esc_html__('Image Four', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition'		=> ['style'	=>	'1'],
			]
		);

		$this->add_control(
			'shape_one',
			[
				'label'			=> esc_html__('Shape One', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition'		=> ['style'	=>	'1'],
			]
		);

		$this->add_control(
			'shape_two',
			[
				'label'			=> esc_html__('Shape Two', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition'		=> ['style'	=>	'1'],
			]
		);


		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'testimonial-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
	?>
	<!-- Start Testimonials Style One
	============================================= -->
	<div class="testimonial-area bg-gray default-padding">

        <div class="testimonial-shape">
           <?php
				if (!empty($settings['shape_one']['url'])) :
					echo restan_img_tag(array(
						'url'   => esc_url($settings['shape_one']['url'])
					));
				endif;

				if (!empty($settings['shape_two']['url'])) :
					echo restan_img_tag(array(
						'url'   => esc_url($settings['shape_two']['url'])
					));
				endif;
			?>
        </div>

        <div class="container">
			<?php if (!empty($settings['sec_subtitle'] || $settings['sec_title'])) : ?>
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                        <h4 class="sub-title"><?php echo wp_kses_post($settings['sec_subtitle'], 'restan_kses_allowed_html'); ?></h4>
		                    <h2 class="title"><?php echo wp_kses_post($settings['sec_title'], 'restan_kses_allowed_html'); ?></h2>
	                    </div>
	                </div>
	            </div>
			<?php endif; ?>
            <div class="row align-center ">
                <div class="col-lg-5">
                    <div class="testimonial-thumb">
                       <?php
							if (!empty($settings['image_one']['url'])) :
								echo restan_img_tag(array(
									'url'   => esc_url($settings['image_one']['url'])
								));
							endif;

							if (!empty($settings['image_two']['url'])) :
								echo restan_img_tag(array(
									'url'   => esc_url($settings['image_two']['url'])
								));
							endif;

							if (!empty($settings['image_three']['url'])) :
								echo restan_img_tag(array(
									'url'   => esc_url($settings['image_three']['url'])
								));
							endif;

							if (!empty($settings['image_four']['url'])) :
								echo restan_img_tag(array(
									'url'   => esc_url($settings['image_four']['url'])
								));
							endif;
						?>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="testimonial-carousel swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                        	<?php foreach ($settings['testimonail_list'] as $item) : ?>

	                            <!-- Single item -->
	                            <div class="swiper-slide">
	                                <div class="testimonial-style-one">
	                                    
	                                    <div class="item">
	                                        <div class="content">
	                                            <div class="rating">
	                                                <div class="icon">
	                                                    <?php for ($i = 0; $i < $item['rating']['size']; $i++) : ?>
																<i class="fas fa-star"></i>
														<?php endfor; ?>
	                                                </div>
	                                                <span><?php echo wp_kses_post($item['rating_text'], 'restan_kses_allowed_html'); ?></span>
	                                            </div>
	                                            <h2> <?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></h2>
	                                            <p>
	                                                <?php echo wp_kses_post($item['content'], 'restan_kses_allowed_html'); ?>
	                                            </p>
	                                        </div>
	                                        <div class="provider">
	                                            <i class="flaticon-quote"></i>
	                                            <div class="info">
	                                                <h4><?php echo wp_kses_post($item['name'], 'restan_kses_allowed_html'); ?></h4>
	                                                <span><?php echo wp_kses_post($item['designation'], 'restan_kses_allowed_html'); ?></span>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- End Single item -->
                          	<?php endforeach; ?>
                        </div>

                        <!-- Pagination -->
                        <div class="swiper-pagination"></div>

                    </div>

                </div>
            </div>
        </div>
    </div>
	<!-- End Testimonails Style One  -->
	<?php
	endif;
	}
}
