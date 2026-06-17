<?php

/**
 * Elementor Reservation Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Reservation_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Reservation widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_reservation_widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Reservation widget title.
	 *
	 * @since 1.0.0
	 * @access public 
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Reservation', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Reservation widget icon.
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
	 * Retrieve the list of categories the Shape widget belongs to.
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
			'reservation_content',
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
					'2'  	=> esc_html__('Style Two', 'restan-core'),
				],
			]
		);

		$this->add_control(
			'sec_title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'rows' => 	'2',
			]
		);

		$this->add_control(
			'background_title',
			[
				'label' 		=> esc_html__('Background Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('Background Title', 'restan-core'),
				'default' 		=> esc_html__('Default Background Title', 'restan-core'),
				'rows' => 	'2',
				'condition'		=> ['style'	=>	['2']],
			]
		);

		$this->add_control(
			'sec_subtitle',
			[
				'label' 		=> esc_html__('Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default SubTitle', 'restan-core'),
				'rows' => 	'2',
				'condition'		=> ['style'	=>	['1']],
			]
		);

		$this->add_control(
			'sec_summary',
			[
				'label' 		=> esc_html__('Summary', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('summary', 'restan-core'),
				'default' 		=> esc_html__('Default Summary', 'restan-core'),
				'rows' => 	'2',
				'condition'		=> ['style'	=>	['1']],
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
		            '{{WRAPPER}} .sub-heading::before' => 'background-image:url({{URL}});',
		        ],
		        'condition' => [
					'style' => ['1','2']
				]
		    ]
		);

		$menu_list = new \Elementor\Repeater();

		$menu_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('name', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'rows' => 	'2',
			]
		);
		$menu_list->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default Subtitle', 'restan-core'),
				'label_block' 	=> true,
				'rows' => 	'2',
			]
		);

		$this->add_control(
			'menu_list',
			[
				'label' 	=> esc_html__('Menu List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $menu_list->get_controls(),
				'prevent_empty' => 'false',
				'title_field' => '{{{ title }}}',
				'condition'		=> ['style'	=>	['1']],
			]
		);

		$this->add_control(
			'contact_shortcode',
			[
				'label' 		=> esc_html__('Contact Form Shortcode', 'cleanu-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'placeholder' 	=> esc_html__('Put your shortcode Here', 'cleanu-core'),
			]
		);

		$this->add_control(
			'bac_image',
			[
				'label'			=> esc_html__('Background Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'shape_image',
			[
				'label'			=> esc_html__('Shape Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition'		=> ['style'	=>	['2']],
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'reservation-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
	?>
	 <!-- Start Reservation Area 
    ============================================= -->
    <div class="reservation-area default-padding-top bg-cover shadow dark" style="background-image: url(<?php echo esc_url($settings['bac_image']['url']);?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="reservation-info text-light">
                        <h4 class="sub-heading"><?php echo wp_kses_post($settings['sec_subtitle'], 'restan_kses_allowed_html'); ?></h4>
	                    <h2 class="title"><?php echo wp_kses_post($settings['sec_title'], 'restan_kses_allowed_html'); ?></h2>
                        <p>
                            <?php echo wp_kses_post($settings['sec_summary'], 'restan_kses_allowed_html'); ?>
                        </p>

                        <div class="reservation-time">
                            <ul>
								<?php
									foreach ($settings['menu_list'] as $item) : 
								?>
	                                <li>
	                                    <h4><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></h4>
	                                    <p>
	                                       <?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?>
	                                    </p>
	                                </li>
                                <?php 
									endforeach;
								?>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="reservation-form">
                        <?php 
                        if (!empty($settings['contact_shortcode'])) : 
							 echo do_shortcode($settings['contact_shortcode']); 
						endif; 
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Reservation Area -->
	
	<?php elseif($settings['style'] == '2'): ?>

	<!-- Start Reservation 
    ============================================= -->
    <div class="reservation-area default-padding overflow-hidden">
        <div class="container">
            <div class="opening-hour-items">
                <h2 class="text-fixed"> <?php echo wp_kses_post($settings['background_title'], 'restan_kses_allowed_html'); ?></h2>
                <div class="shape">
                  <?php
						if (!empty($settings['shape_image']['url'])) :
							echo restan_img_tag(array(
								'url'   => esc_url($settings['shape_image']['url'])
							));
						endif;
					?>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-5">
                        <div class="opening-hours-thumb video-bg-live">
                            <?php
								if (!empty($settings['bac_image']['url'])) :
									echo restan_img_tag(array(
										'url'   => esc_url($settings['bac_image']['url'])
									));
								endif;
							?>
                            <div class="player" data-property="{videoURL:'0Fs-4GiNxQ8',containment:'.video-bg-live', showControls:false, autoPlay:true, zoom:0, loop:true, mute:true, startAt:654, opacity:1, quality:'default'}"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="opening-hours-info">
                            <div class="reservation-form">
                                <h2 class="title mb-30"> <?php echo wp_kses_post($settings['sec_title'], 'restan_kses_allowed_html'); ?></h2>
                                <?php 
			                        if (!empty($settings['contact_shortcode'])) : 
										 echo do_shortcode($settings['contact_shortcode']); 
									endif; 
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Reservation -->	
	<?php
	endif;

	}
}
