<?php

/**
 * Elementor restan offer Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Offer_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve offer widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_offer';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve offer Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Offer', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve offer Nav Tab widget icon.
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
	 * Retrieve the list of categories the offer Nav Tab widget belongs to.
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
			'offer_content_style',
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
					'1'  	=> esc_html__('Style One', 'restan-core'),
					'2'  	=> esc_html__('Style Two', 'restan-core'),
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'condition' => [
					'style' => ['1','2']
				]
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Sub-Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default Sub-Title', 'restan-core'),
				'condition' => [
					'style' => ['1','2']
				]
			]
		);

		$this->add_control(
		    'subtitle_shape_before',
		    [
		        'label' => esc_html__('SubTitle Before Shape', 'agrofa-addon'),
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

		$this->add_control(
			'summary',
			[
				'label' 		=> esc_html__('Summary', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows' 			=> '4',
				'placeholder' 	=> esc_html__('summary', 'restan-core'),
				'default' 		=> esc_html__('Default Summary', 'restan-core'),
				'condition' => [
					'style' => ['1','2']
				]
			]
		);

		$this->add_control(
			'button_label',
			[
				'label' 	=> __('Button Label', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Button Label', 'restan-core'),
				'condition' => [
					'style' => ['1','2']
				]
			]
		);

		$this->add_control(
			'url',
			[
				'label' 		=> __('URL', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> __('https://your-link.com', 'restan-core'),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition' => [
					'style' => ['1','2']
				]
			]
		);

		$this->add_control(
			'offer_title',
			[
				'label' 	=> __('Offer Title', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Offer Titl', 'restan-core'),
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'offer_url',
			[
				'label' 		=> __('Offer URL', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> __('https://your-link.com', 'restan-core'),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'offer_item',
			[
				'label' 	=> __('Offer Item', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Offer Item', 'restan-core'),
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'offer_price',
			[
				'label' 	=> __('Offer Price', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Offer Price', 'restan-core'),
				'condition' => [
					'style' => ['1','2']
				]
			]
		);

		$this->add_control(
		    'rating',
		    [
		        'label' => __('Average Rating', 'floens-addon'),
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
		        'condition' => [
					'style' => ['1']
				]
		    ]
		);

		$this->add_control(
			'bg_image_one',
			[
				'label'			=> esc_html__('Image One', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'bg_shape_one',
			[
				'label'			=> esc_html__('Shape One', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'bg_shape_two',
			[
				'label'			=> esc_html__('Shape Two', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'style' => ['2']
				]
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'offer-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
	?>

	<!-- Start Offer Product
    ============================================= -->
    <div class="offer-product-area default-padding" style="background-image: url(<?php echo esc_url($settings['bg_shape_one']['url']);?>);">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6">
                    <div class="offer-product-thumb">
                       <?php
                       		if (!empty($settings['bg_image_one']['url'])) :
								echo restan_img_tag(array(
									'url'   => esc_url($settings['bg_image_one']['url'])
								));
							endif;
						?>
                        <div class="food-quick-info">
                            <h4>
                            	<a href="<?php echo esc_url($settings['offer_url']['url']);?>"> <?php echo wp_kses($settings['offer_title'], 'restan_allowed_tags'); ?></a>
                            </h4>
                            <div class="rating">
                                 <?php for ($i = 0; $i < $settings['rating']['size']; $i++) : ?>
                                    <i class="fas fa-star"></i>
                                <?php endfor; ?>
                            </div>
                            <ul>
                              <?php echo wp_kses($settings['offer_item'], 'restan_allowed_tags'); ?>
                            </ul>
                            <div class="price">
                                <span><?php echo wp_kses($settings['offer_price'], 'restan_allowed_tags'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="offer-product-info">
                        <h4 class="sub-heading"><?php echo wp_kses($settings['subtitle'], 'restan_allowed_tags'); ?></h4>
                        <h2 class="title"><?php echo wp_kses($settings['title'], 'restan_allowed_tags'); ?></h2>
                        <p>
                            <?php echo wp_kses($settings['summary'], 'restan_allowed_tags'); ?>
                        </p>

	                    <?php if(!empty($settings['button_label'])):?>
                        	<a class="btn circle btn-theme btn-md animation" href="<?php echo esc_url($settings['url']['url']);?>"><i class="fas fa-shopping-cart"></i><?php echo wp_kses_post($settings['button_label'], 'restan_kses_allowed_html'); ?></a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Offer Product -->

    <?php elseif($settings['style'] == '2'):?>

      <!-- Start Compo Offer 
    ============================================= -->
    <div class="combo-offer-area default-padding bg-theme text-light bg-cover" style="background-image: url(<?php echo esc_url($settings['bg_image_one']['url']);?>);">
        <div class="container">
            <div class="row align-center">
                <div class="col-xl-5 col-lg-6">
                    <h4><?php echo wp_kses($settings['subtitle'], 'restan_allowed_tags'); ?></h4>
                    <h2 class="title"><?php echo wp_kses($settings['title'], 'restan_allowed_tags'); ?></h2>
                    <p>
                       <?php echo wp_kses($settings['summary'], 'restan_allowed_tags'); ?>
                    </p>
 					<?php if(!empty($settings['button_label'])):?>
                    	<a class="btn btn-md circle btn-theme animation mt-10" href="<?php echo esc_url($settings['url']['url']);?>"><?php echo wp_kses_post($settings['button_label'], 'restan_kses_allowed_html'); ?></a>
                    <?php endif;?>	
                </div>
                <div class="col-xl-6 offset-xl-1 col-lg-6">
                    <div class="comob-thumb">
                        <?php
                       		if (!empty($settings['bg_shape_one']['url'])) :
								echo restan_img_tag(array(
									'url'   => esc_url($settings['bg_shape_one']['url'])
								));
							endif;

                       		if (!empty($settings['bg_shape_two']['url'])) :
								echo restan_img_tag(array(
									'url'   => esc_url($settings['bg_shape_two']['url'])
								));
							endif;
						?>
                        <div class="item-price">
                            <h1><?php echo wp_kses($settings['offer_price'], 'restan_allowed_tags'); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Combo Offer -->

<?php
		endif;
	}
}
