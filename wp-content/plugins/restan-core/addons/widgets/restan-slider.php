<?php

use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Widget_Base;

/**
 *
 * Banner Widget .
 *
 */
class Elementor_Restan_Slider_Widget extends Widget_Base {

	public function get_name() {
		return 'restan_slider';
	}

	public function get_title() {
		return __('Slider', 'restan-core');
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return ['restan_elements'];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'slider_section',
			[
				'label' => __('Slider', 'restan-core'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'slider_style',
			[
				'label' => __('Slider Style', 'restan-core'),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => __('Style One', 'restan-core'),
					'2' => __('Style Two', 'restan-core'),
					'3' => __('Style Three', 'restan-core'),
					'4' => __('Style Four', 'restan-core'),
					'5' => __('Style Five', 'restan-core'),
					'6' => __('Style Six', 'restan-core'),
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label' => __('Title', 'evona'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 2,
				'placeholder' => __('Awesome Title', 'restan-core'),
				'default' => __('Default Title', 'restan-core'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'subtitle',
			[
				'label' => __('Subtitle', 'restan-core'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'label_block' => true,
				'placeholder' => __('Awesome Subtitle', 'restan-core'),
				'default' => __('Default Subtitle', 'restan-core'),
			]
		);

		$repeater->add_control(
			'summary',
			[
				'label' => __('Summary', 'restan-core'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'label_block' => true,
				'placeholder' => __('Awesome Summary', 'restan-core'),
				'default' => __('Default Summary', 'restan-core'),
			]
		);

		$repeater->add_control(
			'slider_image',
			[
				'label' => __('Slider Image', 'restan-core'),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'video_url',
			[
				'label' => __('Video URL', 'restan-core'),
				'type' => Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'restan-core'),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);

		$repeater->add_control(
			'button_label',
			[
				'label' => __('Button Label', 'restan-core'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 2,
				'default' => __('Button Label', 'restan-core'),
			]
		);

		$repeater->add_control(
			'url',
			[
				'label' => __('URL', 'restan-core'),
				'type' => Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'restan-core'),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);

		$this->add_control(
			'sliders',
			[
				'label' => __('Sliders', 'restan-core'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
				'prevent_empty' => false,
				'condition' => [
					'slider_style' => '1',
				],
			]
		);

		$slider_two = new Repeater();

		$slider_two->add_control(
			'title',
			[
				'label' => __('Title', 'evona'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 2,
				'placeholder' => __('Awesome Title', 'restan-core'),
				'default' => __('Default Title', 'restan-core'),
				'label_block' => true,
			]
		);

		$slider_two->add_control(
			'subtitle',
			[
				'label' => __('Subtitle', 'restan-core'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'label_block' => true,
				'placeholder' => __('Awesome Subtitle', 'restan-core'),
				'default' => __('Default Subtitle', 'restan-core'),
			]
		);

		$slider_two->add_control(
			'summary',
			[
				'label' => __('Summary', 'restan-core'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'label_block' => true,
				'placeholder' => __('Awesome Summary', 'restan-core'),
				'default' => __('Default Summary', 'restan-core'),
			]
		);

		$slider_two->add_control(
			'slider_image',
			[
				'label' => __('Slider Image', 'restan-core'),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$slider_two->add_control(
			'shape_one',
			[
				'label' => __('Shape One', 'restan-core'),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$slider_two->add_control(
			'shape_two',
			[
				'label' => __('Slider Two', 'restan-core'),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$slider_two->add_control(
			'shape_three',
			[
				'label' => __('Shape Three', 'restan-core'),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$slider_two->add_control(
			'shape_four',
			[
				'label' => __('Shape Four', 'restan-core'),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$slider_two->add_control(
			'button_label',
			[
				'label' => __('Button Label', 'restan-core'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 2,
				'default' => __('Button Label', 'restan-core'),
			]
		);

		$slider_two->add_control(
			'url',
			[
				'label' => __('URL', 'restan-core'),
				'type' => Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'restan-core'),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);

		$slider_two->add_control(
		    'subtitle_after_shape',
		    [
		        'label' => esc_html__('Subtitle After Shape', 'agrofa-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .banner-style-two h4::after' => 'background-image:url({{URL}});',
		        ],
		    ]
		);

		$slider_two->add_control(
		    'subtitle_before_shape',
		    [
		        'label' => esc_html__('Subtitle Before Shape', 'agrofa-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .banner-style-two h4::before' => 'background-image:url({{URL}});',
		        ],
		    ]
		);

		

		$this->add_control(
			'sliders_two',
			[
				'label' => __('Sliders', 'restan-core'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $slider_two->get_controls(),
				'title_field' => '{{{ title }}}',
				'prevent_empty' => false,
				'condition' => [
					'slider_style' => '2',
				],
			]
		);

		$this->add_control(
			'layout_three_title',
			[
				'label' => __('Title', 'evona'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 2,
				'placeholder' => __('Awesome Title', 'restan-core'),
				'default' => __('Default Title', 'restan-core'),
				'label_block' => true,
				'condition' => [
					'slider_style' => ['3'],
				],
			]
		);

		$this->add_control(
			'layout_three_subtitle',
			[
				'label' => __('Subtitle', 'restan-core'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'label_block' => true,
				'placeholder' => __('Awesome Subtitle', 'restan-core'),
				'default' => __('Default Subtitle', 'restan-core'),
				'condition' => [
					'slider_style' => ['3'],
				],
			]
		);

		$this->add_control(
			'layout_three_image',
			[
				'label' => __('Banner Image', 'restan-core'),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'slider_style' => ['3'],
				],
			]
		);

		$this->add_control(
			'layout_four_title',
			[
				'label' => __('Title', 'evona'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 2,
				'placeholder' => __('Awesome Title', 'restan-core'),
				'default' => __('Default Title', 'restan-core'),
				'label_block' => true,
				'condition' => [
					'slider_style' => ['4'],
				],
			]
		);

		$this->add_control(
			'layout_four_rounded_text',
			[
				'label' => __('Rounded Text', 'restan-core'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'label_block' => true,
				'placeholder' => __('Awesome Rounded Text', 'restan-core'),
				'default' => __('Default Rounded Text', 'restan-core'),
				'condition' => [
					'slider_style' => ['4'],
				],
			]
		);

		$this->add_control(
			'layout_four_image',
			[
				'label' => __('Banner Image', 'restan-core'),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'slider_style' => ['4'],
				],
			]
		);

		$this->add_control(
			'layout_four_video_url',
			[
				'label' => __('Video URL', 'restan-core'),
				'type' => Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'restan-core'),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
				'condition' => [
					'slider_style' => ['4'],
				],
			]
		);


		$this->add_control(
			'layout_five_title',
			[
				'label' => __('Title', 'evona'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 2,
				'placeholder' => __('Awesome Title', 'restan-core'),
				'default' => __('Default Title', 'restan-core'),
				'label_block' => true,
				'condition' => [
					'slider_style' => ['5'],
				],
			]
		);

		$this->add_control(
			'layout_five_subtitle',
			[
				'label' => __('Subtitle', 'restan-core'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'label_block' => true,
				'placeholder' => __('Awesome Subtitle', 'restan-core'),
				'default' => __('Default Subtitle', 'restan-core'),
				'condition' => [
					'slider_style' => ['5'],
				],
			]
		);

		$this->add_control(
			'layout_five_bottom_text',
			[
				'label' => __('Bottom Text', 'restan-core'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'label_block' => true,
				'placeholder' => __('Awesome Subtitle', 'restan-core'),
				'default' => __('Default Subtitle', 'restan-core'),
				'condition' => [
					'slider_style' => ['5'],
				],
			]
		);

		$sliders_five = new Repeater();

		$sliders_five->add_control(
			'image',
			[
				'label' => __('Slider Image', 'restan-core'),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'sliders_five',
			[
				'label' => __('Slider Five', 'restan-core'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $sliders_five->get_controls(),
				'prevent_empty' => false,
				'condition' => [
					'slider_style' => '5',
				],
			]
		);


		$sliders_six = new Repeater();

		$sliders_six->add_control(
			'image_one',
			[
				'label' => __('Image One', 'restan-core'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$sliders_six->add_control(
			'image_two',
			[
				'label' => __('Image Two', 'restan-core'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);


		$sliders_six->add_control(
			'image_three',
			[
				'label' => __('Image Three', 'restan-core'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$this->add_control(
			'sliders_six',
			[
				'label' => __('Slider Six', 'restan-core'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $sliders_six->get_controls(),
				'prevent_empty' => false,
				'condition' => [
					'slider_style' => '6',
				],
			]
		);

		$this->add_control(
			'layout_six_bg_image',
			[
				'label' => __('Background Image', 'restan-core'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'slider_style' => '6',
				],
			]
		);


		$this->add_control(
			'nav_show',
			[
				'label' => __('Show/Hide Nav Icon', 'restan-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'restan-core'),
				'label_off' => __('Hide', 'restan-core'),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'slider_style' => ['1', '2','5','6'],
				],
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'slider-style.php';
	}

	protected function render() {

		$restan_banner = $this->get_settings_for_display();

		if ($restan_banner['slider_style'] == '1') {?>

		<!-- Start Banner Area
			============================================= -->
			<div class="banner-area banner-style-one navigation-circle overflow-hidden text-light">
				<!-- Slider main container -->
				<div class="banner-fade">
					<!-- Additional required wrapper -->
					<div class="swiper-wrapper">
						<?php foreach ($restan_banner['sliders'] as $item): ?>
							<!-- Single Item -->
							<div class="swiper-slide bg-cover shadow dark" style="background: url(<?php echo esc_url($item['slider_image']['url']); ?>);">
								<div class="container">
									<div class="content">
										<div class="row align-center">
											<div class="col-xl-7 col-lg-9">
												<h4><?php echo wp_kses($item['subtitle'], 'restan_allowed_tags'); ?></h4>
												<h2><?php echo wp_kses($item['title'], 'restan_allowed_tags'); ?></h2>
												<p>
													<?php echo wp_kses($item['summary'], 'restan_allowed_tags'); ?>
												</p>
												<?php if (!empty($item['button_label'])): ?>
													<div class="button mt-40">
														<a class="btn btn-theme btn-md animation" <?php esc_attr(!empty($item['url']['is_external']) ? "target=_blank" : ' ');?> href="<?php echo esc_url($item['url']['url']); ?>"><?php echo wp_kses($item['button_label'], 'restan_allowed_tags'); ?></a>
													</div>
												<?php endif;?>
											</div>
											<?php if (!empty($item['video_url']['url'])): ?>
												<div class="col-xl-5 col-lg-3">
													<a href="<?php echo esc_url($item['video_url']['url']); ?>" class="popup-youtube video-play-button">
														<i class="fas fa-play"></i>
														<div class="effect"></div>
													</a>
												</div>
											<?php endif;?>
										</div>
									</div>
								</div>
							</div>
							<!-- End Single Item -->
						<?php endforeach;?>
					</div>
					<?php if ($restan_banner['nav_show'] == 'yes'): ?>
						<!-- Navigation -->
						<div class="swiper-nav-left">
							<div class="swiper-button-prev"></div>
							<div class="swiper-button-next"></div>
						</div>
					<?php endif;?>
				</div>
			</div>
			<!-- End Slider Area One -->

		<?php } elseif ($restan_banner['slider_style'] == '2') {
			?>

		<!-- Start Banner Area Style Two
			============================================= -->
			<div class="banner-area banner-style-two navigation-circle text-center zoom-effect text-light">

				<!-- Slider main container -->
				<div class="banner-fade">
					<!-- Additional required wrapper -->
					<div class="swiper-wrapper">
						<?php foreach ($restan_banner['sliders_two'] as $item): ?>
							<!-- Single Item -->
							<div class="swiper-slide">
								<div class="banner-thumb bg-cover shadow dark" style="background: url(<?php echo esc_url($item['slider_image']['url']); ?>);"></div>
								<div class="container">
									<div class="content">

										<div class="row align-center">
											<div class="col-lg-10 offset-lg-1">
												<div class="info">
													<h4><?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?></h4>
													<h2><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></h2>
													<p>
														<?php echo wp_kses_post($item['summary'], 'restan_kses_allowed_html'); ?>
													</p>
													<?php if (!empty($item['url']['url'])): ?>
														<div class="button mt-30">
															<a class="btn btn-md btn-theme animation" href="<?php echo esc_url($item['url']['url']); ?>"><?php echo wp_kses($item['button_label'], 'restan_allowed_tags'); ?></a>
														</div>
													<?php endif;?>
												</div>
											</div>

										</div>
									</div>
								</div>
								<div class="banner-shap">
								<?php
									if (!empty($item['shape_one']['url'])):
										echo restan_img_tag(array(
											'url' => esc_url($item['shape_one']['url']),
										));
									endif;
									?>
																		<?php
									if (!empty($item['shape_two']['url'])):
										echo restan_img_tag(array(
											'url' => esc_url($item['shape_two']['url']),
										));
									endif;
									?>
																		<?php
									if (!empty($item['shape_three']['url'])):
										echo restan_img_tag(array(
											'url' => esc_url($item['shape_three']['url']),
										));
									endif;
									?>
																		<?php
									if (!empty($item['shape_four']['url'])):
										echo restan_img_tag(array(
											'url' => esc_url($item['shape_four']['url']),
										));
									endif;
								?>
								</div>
							</div>
							<!-- End Single Item -->
						<?php endforeach;?>
					</div>
					<?php if ($restan_banner['nav_show'] == 'yes'): ?>
						<!-- Navigation -->
						<div class="swiper-nav-left">
							<div class="swiper-button-prev"></div>
							<div class="swiper-button-next"></div>
						</div>
					<?php endif;?>
				</div>

			</div>
			<!-- End Banner Style Two-->

			<?php

		} elseif ($restan_banner['slider_style'] == '3') {
			?>

		<!-- Start Banner Area Three
			============================================= -->
			<div class="banner-style-three-area text-light text-center video-bg-live bg-cover" style="background-image: url(<?php echo esc_url($restan_banner['layout_three_image']['url']); ?>);">
				<div class="player" data-property="{videoURL:'uMAbWsMnKYk',containment:'.video-bg-live', showControls:false, autoPlay:true, zoom:0, loop:true, mute:true, startAt:103, opacity:1, quality:'default'}"></div>
				<div class="banner-style-three-content shadow dark">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 offset-lg-2">
								<h2><?php echo wp_kses_post($restan_banner['layout_three_title'], 'restan_kses_allowed_html'); ?></h2>
								<ul class="list-quality">
									<?php echo wp_kses_post($restan_banner['layout_three_subtitle'], 'restan_kses_allowed_html'); ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Banner Three -->

			<?php

		} elseif ($restan_banner['slider_style'] == '4') {?>
		<!-- Start Banner Area Four
			============================================= -->
			<div class="banner-style-four-area text-light text-center bg-cover" style="background-image: url(<?php echo esc_url($restan_banner['layout_four_image']['url']); ?>);">
				<div class="banner-style-four-content shadow dark">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 offset-lg-2">
								<h2><?php echo wp_kses_post($restan_banner['layout_four_title'], 'restan_kses_allowed_html'); ?></h2>
								<div class="curve-text">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 150" version="1.1">
										<path id="textPath" d="M 0,75 a 75,75 0 1,1 0,1 z"></path>
										<text><textPath href="#textPath"><?php echo wp_kses_post($restan_banner['layout_four_rounded_text'], 'restan_kses_allowed_html'); ?></textPath></text>
									</svg>
									<?php if (!empty($restan_banner['layout_four_video_url']['url'])): ?>
									<a href="<?php echo esc_url($restan_banner['layout_four_video_url']['url']); ?>" class="popup-youtube"><i class="fas fa-arrow-right"></i></a>
									<?php endif;?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Banner Four -->
		<?php } elseif ($restan_banner['slider_style'] == '5') {?>
			<!-- Start Banner 
	   		 ============================================= -->
		    <div class="banner-area banner-style-five text-center zoom-effect text-light">
		        <div class="banner-style-five-content">
		            <div class="container">
		                <div class="row">
		                    <div class="col-lg-10 offset-lg-1">
		                        <div class="info">
		                            <div class="text-end">
		                                <h1><?php echo wp_kses_post($restan_banner['layout_five_title'], 'restan_kses_allowed_html'); ?></h1>
		                                <h3><?php echo wp_kses_post($restan_banner['layout_five_subtitle'], 'restan_kses_allowed_html'); ?></h3>
		                            </div>
		                            <div class="bottom">
		                                <p>
		                                    <?php echo wp_kses_post($restan_banner['layout_five_bottom_text'], 'restan_kses_allowed_html'); ?>
		                                </p> 
		                                <span class="marker"></span>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>

		        <!-- Slider main container -->
		        <div class="banner-fade">
		            <!-- Additional required wrapper -->
		            <div class="swiper-wrapper">
		            	<?php foreach ($restan_banner['sliders_five'] as $item): ?>
			                <!-- Single Item -->
			                <div class="swiper-slide">
			                    <div class="banner-thumb bg-cover" style="background: url(<?php echo esc_url($item['image']['url']);?>);"></div>
			                </div>
			                <!-- End Single Item -->
		                <?php endforeach;?>
		            </div>
		            <?php if ($restan_banner['nav_show'] == 'yes'): ?>
			            <!-- Navigation -->
			            <div class="swiper-nav-left">
			                <div class="swiper-button-prev"></div>
			                <div class="swiper-button-next"></div>
			            </div>
		        	<?php endif;?>
		        </div>
		    </div>
		    <!-- End Banner -->

		<?php } elseif ($restan_banner['slider_style'] == '6') {?>

			  <!-- Start Banner Area 
		    ============================================= -->
		    <div class="banner-area banner-style-six bg-dark navigation-circle overflow-hidden text-light bg-cover" style="background-image: url(<?php echo esc_url($restan_banner['layout_six_bg_image']['url']);?>);">
		        <!-- Slider main container -->
		        <div class="banner-fade">
		            <!-- Additional required wrapper -->
		            <div class="swiper-wrapper">
						<?php foreach ($restan_banner['sliders_six'] as $item): ?>
			                <!-- Single Item -->
			                <div class="swiper-slide">
			                    <div class="banner-bg">
			                    	<?php 
				                       	if (!empty($item['image_one']['url'])):
											echo restan_img_tag(array(
												'url' => esc_url($item['image_one']['url']),
											));
										endif;
									?>
			                    </div>
			                    <div class="container">
			                        <div class="content">
			                            <div class="row align-center">
			                                <div class="col-lg-7">
			                                    <div class="info-text">
			                                       <?php 
								                       	if (!empty($item['image_two']['url'])):
															echo restan_img_tag(array(
																'url' => esc_url($item['image_two']['url']),
															));
														endif;
													?>
			                                    </div>
			                                </div>
			                                <div class="col-lg-5">
			                                    <div class="item-discount">
			                                       <?php 
								                       	if (!empty($item['image_three']['url'])):
															echo restan_img_tag(array(
																'url' => esc_url($item['image_three']['url']),
															));
														endif;
													?>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			                <!-- End Single Item -->
			            <?php endforeach;?>    
		            </div>
 					<?php if ($restan_banner['nav_show'] == 'yes'): ?>
			            <!-- Navigation -->
			            <div class="swiper-nav-left">
			                <div class="swiper-button-prev"></div>
			                <div class="swiper-button-next"></div>
			            </div>
			        <?php endif; ?>    
		        </div>  
		    </div>
		    <!-- End Banner -->

		<?php
		}
	}
}
