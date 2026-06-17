<?php

/**
 * Elementor restan gallery Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Gallery_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve gallery widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_gallery';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve gallery Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Gallery', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve gallery Nav Tab widget icon.
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
	 * Retrieve the list of categories the gallery Nav Tab widget belongs to.
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
			'restan_team_style',
			[
				'label'		=> esc_html__('Gallery Style', 'restan-core'),
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
					'2'  	=> esc_html__('Style Two', 'restan-core')
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
			'sec_subtitle',
			[
				'label' 		=> esc_html__('Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default SubTitle', 'restan-core'),
				'rows' => 	'2',
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
					'style' => ['1','2']
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
					'style' => ['1','2']
				]
		    ]
		);

		$gallery_one = new \Elementor\Repeater();

		$gallery_one->add_control(
			'title',
			[
				'label' 		=> esc_html__('Name', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('name', 'restan-core'),
				'default' 		=> esc_html__('Default Name', 'restan-core'),
				'rows' => 	'2',
			]
		);
		$gallery_one->add_control(
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

		$gallery_one->add_control(
			'image',
			[
				'label'			=> esc_html__('Add Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$gallery_one->add_control(
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
				]
			]
		);

		$this->add_control(
			'gallery_list_one',
			[
				'label' 	=> esc_html__('Gallery List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $gallery_one->get_controls(),
				'prevent_empty' => 'false',
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'gallery-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
	?>

	<!-- Start Gallery 
    ============================================= -->
    <div class="gallery-style-one-area overflow-hidden default-padding">
		<?php if (!empty($settings['sec_subtitle'] || $settings['sec_title'])) : ?>
	        <div class="row">
	            <div class="col-lg-8 offset-lg-2">
	                <div class="site-heading text-center">
	                    <h4 class="sub-title"><?php echo wp_kses_post($settings['sec_subtitle'], 'restan_kses_allowed_html'); ?></h4>
	                    <h2 class="title"><?php echo wp_kses_post($settings['sec_title'], 'restan_kses_allowed_html'); ?></h2>
	                </div>
	            </div>
	        </div>
		<?php endif;?>
        <div class="container-full">
            <div class="row">
                <div class="col-lg-12">
                    <div class="gallery-style-one-carousel swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
   						<?php
							foreach ($settings['gallery_list_one'] as $item) : 
						?>
                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <div class="gallery-style-one">
                                    <div class="item">
                                        <?php
										if (!empty($item['image']['url'])) :
											echo restan_img_tag(array(
												'url'   => esc_url($item['image']['url'])
											));
										endif;
										?>
                                        <div class="overlay">
                                            <span><?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?></span>
                                            <h4>
                                            	<a href="<?php echo esc_url($item['url']['url']); ?>" <?php esc_attr(!empty($item['url']['is_external']) ? "target=_blank" : ' '); ?> ><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
    						<?php 
						endforeach; ?>
                        </div>
                        <!-- Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Gallery -->

	<?php elseif($settings['style'] == '2'):?>

	<!-- Start Food Gallery Two
    ============================================= -->
    <div class="gallery-style-two-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                       <h4 class="sub-title"><?php echo wp_kses_post($settings['sec_subtitle'], 'restan_kses_allowed_html'); ?></h4>
	                    <h2 class="title"><?php echo wp_kses_post($settings['sec_title'], 'restan_kses_allowed_html'); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="gallery-content-items">
                    <div id="gallery-masonary" class="gallery-items gallery-style-two colums-3">
                        <?php
							foreach ($settings['gallery_list_one'] as $item) : 
						?>
                        <!-- Single Item -->
                        <div class="gallery-item">
                            <div class="gallery-style-one">
                                <div class="item">
                                    <a href="<?php echo esc_url($item['image']['url']);?>" class="popup-gallery">
                                       <?php
										if (!empty($item['image']['url'])) :
											echo restan_img_tag(array(
												'url'   => esc_url($item['image']['url'])
											));
										endif;
										?>
                                        <div class="overlay">
                                            <span><?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?></span>
                                            <h4><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                       <?php 
						endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Food Gallery Two -->
	<?php
		endif;
	}
}
