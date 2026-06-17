<?php

/**
 * Elementor restan About Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_About_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve About widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_about';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve About Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('About', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve About Nav Tab widget icon.
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
	 * Retrieve the list of categories the About Nav Tab widget belongs to.
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
			'about_content_style',
			[
				'label'		=> esc_html__('About Style', 'restan-core'),
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
					'3'  	=> esc_html__('Style Three', 'restan-core'),
					'4'  	=> esc_html__('Style Four', 'restan-core'),
					'5'  	=> esc_html__('Style FIve', 'restan-core'),
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
					'style' => ['1','2','3','4','5']
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
					'style' => ['1','2','3','5']
				]
			]
		);

		$this->add_control(
		    'subtitle_shape_after',
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
					'style' => ['5']
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
		            '{{WRAPPER}} .sub-title::before' => 'background-image:url({{URL}});',
		        ],
		        'condition' => [
					'style' => ['1','2','3','5']
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
					'style' => ['1','2','3','4','5']
				]
			]
		);

		$this->add_control(
			'summary_two',
			[
				'label' 		=> esc_html__('Summary Two', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows' 			=> '4',
				'placeholder' 	=> esc_html__('summary', 'restan-core'),
				'default' 		=> esc_html__('Default Summary', 'restan-core'),
				'condition' => [
					'style' => ['3']
				]
			]
		);

		$this->add_control(
			'rounded_text',
			[
				'label' 	=> __('Rounded Text', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Rounded Text', 'restan-core'),
				'condition' => [
					'style' => ['2']
				]
			]
		);

		$this->add_control(
			'signature_text',
			[
				'label' 	=> __('Signature Text', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Signature Text', 'restan-core'),
				'condition' => [
					'style' => ['2']
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
					'style' => ['1','2','3','4']
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
					'style' => ['1','2','3','4']
				]
			]
		);

		$this->add_control(
			'author_name',
			[
				'label' 	=> __('Name', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Name', 'restan-core'),
				'condition' => [
					'style' => ['3']
				]
			]
		);

		$this->add_control(
			'author_designation',
			[
				'label' 	=> __('Designation', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Designation', 'restan-core'),
				'condition' => [
					'style' => ['3']
				]
			]
		);

		$this->add_control(
			'about_bg_image_one',
			[
				'label'			=> esc_html__('Add Image One', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'style' => ['1','2','3','4','5']
				]
			]
		);

		$this->add_control(
			'about_bg_image_two',
			[
				'label'			=> esc_html__('Add Image Two', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'style' => ['1','2','3','4','5']
				]
			]
		);

		$this->add_control(
			'about_shape_one',
			[
				'label'			=> esc_html__('Add Shape One', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'style' => ['1','2','5']
				]
			]
		);

		$this->add_control(
			'about_shape_two',
			[
				'label'			=> esc_html__('Add Shape Two', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'style' => ['5']
				]
			]
		);

		$this->add_control(
			'about_signature_img',
			[
				'label'			=> esc_html__('Add Signature Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'style' => ['2']
				]
			]
		);

		$this->add_control(
			'about_rounded_img',
			[
				'label'			=> esc_html__('Add Rounded Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'style' => ['2']
				]
			]
		);

		$this->add_control(
			'author_image',
			[
				'label'			=> esc_html__('Add Author Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'style' => ['3']
				]
			]
		);

		$meal_time_list = new \Elementor\Repeater();

		$meal_time_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '1',
				'default'  	=> __('Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);
		$meal_time_list->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'			=> '2',
				'default'  	=> __('Sub Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'meal_time_list',
			[
				'label' 	=> esc_html__('Schedule List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $meal_time_list->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Meal Time List', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' => [
					'style' => '4'
				]
			]
		);


		$this->add_control(
			'layout_six_counter_title',
			[
				'label' 		=> esc_html__('Counter Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '1',
				'default'  	=> __('Title', 'restan-core'),
				'label_block' 	=> true,
				'condition' => [
					'style' => '5'
				]
			]
		);

		$this->add_control(
			'layout_six_counter_number',
			[
				'label' 		=> esc_html__('Number', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'rows' 			=> '1',
				'default'  	=> __('Number', 'restan-core'),
				'label_block' 	=> true,
				'condition' => [
					'style' => '5'
				]
			]
		);

		$this->add_control(
			'layout_six_counter_operator',
			[
				'label' 		=> esc_html__('Operator', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'rows' 			=> '1',
				'default'  	=> __('Operator', 'restan-core'),
				'label_block' 	=> true,
				'condition' => [
					'style' => '5'
				]
			]
		);


		$service_list = new \Elementor\Repeater();

		$service_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '1',
				'default'  	=> __('Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$service_list->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'			=> '2',
				'default'  	=> __('Sub Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$service_list->add_control(
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

		$service_list->add_control(
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

		$service_list->add_control(
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


		$service_list->add_control(
			'icon_image',
			[
				'label'			=> esc_html__('Add Image Icon', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'icon_style' => '3'
				]
			]
		);

		$this->add_control(
			'service_list',
			[
				'label' 	=> esc_html__('Service List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $service_list->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Service List', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' => [
					'style' => '5'
				]
			]
		);


		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'about-style.php';

	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
	?>

	<!-- Start About Style One
	============================================= -->
	<div class="about-style-one-area default-padding">
        <div class="about-thumb">
       	<?php if (!empty($settings['about_bg_image_one']['url'])) : ?>
            <div class="item" style="background-image: url(<?php echo esc_url($settings['about_bg_image_one']['url']); ?>);"></div>
        <?php endif;?>
        <?php if (!empty($settings['about_bg_image_two']['url'])) : ?>
            <div class="item" style="background-image: url(<?php echo esc_url($settings['about_bg_image_two']['url']); ?>);"></div>
  		<?php endif;?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="about-style-one-info">
                    	<?php if (!empty($settings['about_shape_one']['url'])) : ?>
                        	<img src="<?php echo esc_url($settings['about_shape_one']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        <?php endif;?>
                        <h4 class="sub-heading"><?php echo wp_kses_post($settings['subtitle'], 'restan_kses_allowed_html'); ?></h4>
                        <h2 class="title"><?php echo wp_kses_post($settings['title'], 'restan_kses_allowed_html'); ?></h2>
                        <p>
                           <?php echo wp_kses_post($settings['summary'], 'restan_kses_allowed_html'); ?>
                        </p>
                        <?php if(!empty($settings['button_label'])):?>
                       		 <a class="btn btn-theme btn-md animation mt-10" href="<?php echo esc_url($settings['url']['url']);?>"><?php echo wp_kses_post($settings['button_label'], 'restan_kses_allowed_html'); ?></a>
                    	<?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End  About Style One -->

	<?php elseif ($settings['style'] == '2'): ?>

	<!-- End  About Style Two -->
    <div class="about-style-two-area default-padding-bottom">

        <div class="shape-overlay">
           <?php
				if (!empty($settings['about_shape_one']['url'])) :
					echo restan_img_tag(array(
						'url'   => esc_url($settings['about_shape_one']['url'])
					));
				endif;
			?>
        </div>

        <div class="container">
            <div class="row align-center">

                <div class="col-lg-6 order-lg-last">
                    <div class="about-style-thumb-box">
                        <div class="about-style-two-thumb">
                            <?php
								if (!empty($settings['about_bg_image_one']['url'])) :
									echo restan_img_tag(array(
										'url'   => esc_url($settings['about_bg_image_one']['url'])
									));
								endif;
							?>
                        </div>
                        <?php
							if (!empty($settings['about_bg_image_two']['url'])) :
								echo restan_img_tag(array(
									'url'   => esc_url($settings['about_bg_image_two']['url'])
								));
							endif;
						?>
                        <div class="experience">
                            <div class="curve-text">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 150" version="1.1">
                                    <path id="textPath" d="M 0,75 a 75,75 0 1,1 0,1 z"></path>
                                    <text><textPath href="#textPath"><?php echo wp_kses_post($settings['rounded_text'], 'restan_kses_allowed_html'); ?></textPath></text>
                                </svg>
                                <div class="thumb">
                                   <?php
										if (!empty($settings['about_rounded_img']['url'])) :
											echo restan_img_tag(array(
												'url'   => esc_url($settings['about_rounded_img']['url'])
											));
										endif;
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 pr-80 pr-md-15 pr-xs-15">
                    <div class="about-style-two-info">
                        <h4 class="sub-heading"><?php echo wp_kses_post($settings['subtitle'], 'restan_kses_allowed_html'); ?></h4>
                        <h2 class="title"><?php echo wp_kses_post($settings['title'], 'restan_kses_allowed_html'); ?></h2>
                        <p>
                           <?php echo wp_kses_post($settings['summary'], 'restan_kses_allowed_html'); ?>
                        </p>
                        <div class="author-info">
                            <?php if(!empty($settings['button_label'])):?>
                       		 <a class="btn btn-md btn-theme animation" href="<?php echo esc_url($settings['url']['url']);?>"><?php echo wp_kses_post($settings['button_label'], 'restan_kses_allowed_html'); ?></a>
                    		<?php endif;?>
                            <div class="author-details">
                                <div class="author-content">
                                   <?php
										if (!empty($settings['about_signature_img']['url'])) :
											echo restan_img_tag(array(
												'url'   => esc_url($settings['about_signature_img']['url'])
											));
										endif;
									?>
                                    <p>
                                       <?php echo wp_kses_post($settings['signature_text'], 'restan_kses_allowed_html'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End  About Style Two -->

	<?php elseif ($settings['style'] == '3'): ?>

	<!-- Start  About Style Three -->
	<div class="about-style-three-area default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-5">
                    <div class="about-style-three-thumb">
                        <?php
							if (!empty($settings['about_bg_image_one']['url'])) :
								echo restan_img_tag(array(
									'url'   => esc_url($settings['about_bg_image_one']['url'])
								));
							endif;
			
							if (!empty($settings['about_bg_image_two']['url'])) :
								echo restan_img_tag(array(
									'url'   => esc_url($settings['about_bg_image_two']['url'])
								));
							endif;
						?>
                    </div>
                </div>
                <div class="col-lg-7 pl-80 pl-md-15 pl-xs-15">
                    <div class="about-style-three-info">
                        <h4 class="sub-heading"><?php echo wp_kses_post($settings['subtitle'], 'restan_kses_allowed_html'); ?></h4>
                        <h2 class="title"><?php echo wp_kses_post($settings['title'], 'restan_kses_allowed_html'); ?></h2>
                        <div class="item-grid-two-colum">
                            <div class="item">
                                <p>
                                   <?php echo wp_kses_post($settings['summary'], 'restan_kses_allowed_html'); ?>
                                </p>
                                <?php if(!empty($settings['button_label'])):?>
	                       		 	<a class="btn btn-theme btn-md animation" href="<?php echo esc_url($settings['url']['url']);?>"><?php echo wp_kses_post($settings['button_label'], 'restan_kses_allowed_html'); ?></a>
	                    		<?php endif;?>
                            </div>
                            <div class="item">
                                <div class="quote">
                                    <p>
                                      <?php echo wp_kses_post($settings['summary_two'], 'restan_kses_allowed_html'); ?>
                                    </p>
                                    <div class="site-owner">
                                        <div class="thumb">
                                        	<?php
                                           	if (!empty($settings['author_image']['url'])) :
													echo restan_img_tag(array(
														'url'   => esc_url($settings['author_image']['url'])
													));
												endif;
											?>
                                        </div>
                                        <div class="info">
                                            <h4>  <?php echo wp_kses_post($settings['author_name'], 'restan_kses_allowed_html'); ?></h4>
                                            <span>  <?php echo wp_kses_post($settings['author_designation'], 'restan_kses_allowed_html'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>	
    <!-- End  About Style Three -->

    <?php elseif ($settings['style'] == '4'): ?>

    <!-- Start About Four
    ============================================= -->
    <div class="about-style-five-area default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6">
                    <div class="thumb-style-two">
       
                        <?php
							if (!empty($settings['about_bg_image_one']['url'])) :
								echo restan_img_tag(array(
									'url'   => esc_url($settings['about_bg_image_one']['url'])
								));
							endif;
			
							if (!empty($settings['about_bg_image_two']['url'])) :
								echo restan_img_tag(array(
									'url'   => esc_url($settings['about_bg_image_two']['url']),
									'class' => 'animate',
									'data-animate' => 'zoomIn'
								));
							endif;
						?>
                    </div>
                </div>
                <div class="col-lg-6 pl-50 pl-md-15 pl-xs-15">
                    <h2 class="title"><?php echo wp_kses_post($settings['title'], 'restan_kses_allowed_html'); ?></h2>
                    <div class="item-grid-two-colum mt-40">
                        <div class="item">
                            <p>
                                <?php echo wp_kses_post($settings['summary'], 'restan_kses_allowed_html'); ?>
                            </p>
                            <?php if(!empty($settings['button_label'])):?>
                       		 	<a class="btn btn-theme btn-md animation" href="<?php echo esc_url($settings['url']['url']);?>"><?php echo wp_kses_post($settings['button_label'], 'restan_kses_allowed_html'); ?>
                       		 	</a>
                    		<?php endif;?>
                        </div>
                        <div class="item">
                            <div class="quote">
                                <ul class="card-info bg-dark text-light">
                                	<?php foreach ($settings['meal_time_list'] as $key => $item) : ?>
	                                    <li>
	                                        <h5><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></h5>
	                                        <p>
	                                           <?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?>	
	                                        </p>
	                                    </li>
                                    <?php  endforeach;?>  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Four -->

    <?php elseif ($settings['style'] == '5'): ?>

	<!-- Start About Five -->
	<div class="about-style-four-area default-padding">
        <div class="shape">
           	<?php 
	           	if (!empty($settings['about_shape_one']['url'])) :
					echo restan_img_tag(array(
						'url'   => esc_url($settings['about_shape_one']['url'])
					));
				endif;
			?>
        </div>
        <div class="upDownScrol animate-up-down">
        	<?php 
	           	if (!empty($settings['about_shape_two']['url'])) :
					echo restan_img_tag(array(
						'url'   => esc_url($settings['about_shape_two']['url'])
					));
				endif;
			?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="site-heading text-center">
                        <h4 class="sub-title"><?php echo wp_kses_post($settings['subtitle'], 'restan_kses_allowed_html'); ?></h4>
                        <h2 class="title"><?php echo wp_kses_post($settings['title'], 'restan_kses_allowed_html'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <div class="about-four-thumb">
                        <div class="left">
                           <?php 
					           	if (!empty($settings['about_bg_image_one']['url'])) :
									echo restan_img_tag(array(
										'url'   => esc_url($settings['about_bg_image_one']['url'])
									));
								endif;
							?>
                        </div>
                        <div class="right">
                        	<?php if(!empty($settings['layout_six_counter_number'] || $settings['layout_six_counter_operator'])):?>	
                            <div class="fun-fact">
                                <div class="counter">
                                    <div class="timer" data-to="<?php echo esc_attr($settings['layout_six_counter_number']); ?>" data-speed="2000"><?php echo wp_kses_post($settings['layout_six_counter_number'], 'restan_kses_allowed_html'); ?></div>
                                    <div class="operator"><?php echo wp_kses_post($settings['layout_six_counter_operator'], 'restan_kses_allowed_html'); ?></div>
                                </div>
                                <span class="medium"><?php echo wp_kses_post($settings['layout_six_counter_title'], 'restan_kses_allowed_html'); ?></span>
                            </div>
                            <?php endif;?>
                            <?php 
					           	if (!empty($settings['about_bg_image_two']['url'])) :
									echo restan_img_tag(array(
										'url'   => esc_url($settings['about_bg_image_two']['url'])
									));
								endif;
							?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 pl-60 pl-md-15 pl-xs-15">
                    <div class="about-four-info">
                        <p>
                           <?php echo wp_kses_post($settings['summary'], 'restan_kses_allowed_html'); ?>
                        </p>
                        <ul class="list-style-one mt-40">
							<?php foreach ($settings['service_list'] as $key => $item) : ?>
	                            <li>
	                                <div class="icon">
	                          			<?php if (!empty($item['flat_icon'])) : ?>
											<i class="<?php echo esc_attr($item['flat_icon']); ?>"></i>
										<?php endif; ?>
										<?php if (!empty($item['icon_image']['url'])) : ?>
											<img src="<?php echo esc_url($item['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
										<?php endif; ?>
										<?php
										if (!empty($item['custom_icon'])) : ?>
											<i class="<?php echo esc_attr($item['custom_icon']); ?>"></i>
										<?php endif; ?>
	                                </div>
	                                <div class="info">
	                                    <h4><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></h4>
	                                    <p>
	                                       <?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?>
	                                    </p>
	                                </div>
	                            </li>
                           	<?php  endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End About Five -->

	<?php
		endif;
	}
}
