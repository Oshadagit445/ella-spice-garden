<?php

/**
 * Elementor Restan Download App Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Download_App_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve download appwidget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_download_app';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve download appNav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Download App', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve download appNav Tab widget icon.
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
	 * Retrieve the list of categories the download appNav Tab widget belongs to.
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
			'download_app_content_style',
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
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'      	=> '2',
        		'default' => __('Default Title', 'sifoxen-addon'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' 		=> esc_html__('Sub Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'      	=> '3',
        		'default' => __('Default Sub Title', 'sifoxen-addon'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'button_one_label',
			[
				'label' 	=> __('Button One Label', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Button One Label', 'restan-core'),
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'button_one_url',
			[
				'label' 		=> __('Button One URL', 'restan-core'),
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
			'button_two_label',
			[
				'label' 	=> __('Button Two Label', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Button Two Label', 'restan-core'),
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'button_two_url',
			[
				'label' 		=> __('Button Two URL', 'restan-core'),
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
		    'front_image',
		    [
		        'label' => __('Front Image', 'sifoxen-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		    ]
		);

		$this->add_control(
		    'bg_image_one',
		    [
		        'label' => __('Background Image', 'sifoxen-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		    ]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'download-app-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
	?>

    <!-- Start Download App
    ============================================= -->
    <div class="download-app-area default-padding-top">
        <div class="container">
            <div class="download-app-items bg-dark text-light" style="background-image: url(<?php echo esc_url($settings['bg_image_one']['url'])?>);">
                <div class="row align-center">
                    
                    <div class="col-lg-5">
                        <div class="download-app-thumb animate" data-animate="fadeInUp">
                           <?php if (!empty($settings['front_image']['url'])) : ?>
								<img src="<?php echo esc_url($settings['front_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
							<?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <h2 class="title"><?php echo wp_kses($settings['title'], 'restan_allowed_tags'); ?></h2>
                        <p>
                           <?php echo wp_kses($settings['sub_title'], 'restan_allowed_tags'); ?>
                        </p>
                        <div class="d-flex">
                        	<?php if(!empty($settings['button_one_label'])):?>
                            	<a class="btn btn-light circle btn-md animation" href="<?php echo esc_url($settings['button_one_url']['url']);?>"><i class="fab fa-app-store"></i> <?php echo wp_kses($settings['button_one_label'], 'restan_allowed_tags'); ?></a>
                            <?php endif;?>
                            <?php if(!empty($settings['button_two_label'])):?>
                            	<a class="btn btn-theme circle btn-md animation" href="<?php echo esc_url($settings['button_two_url']['url']);?>"><i class="fab fa-google-play"></i> <?php echo wp_kses($settings['button_two_label'], 'restan_allowed_tags'); ?></a>
                            <?php endif;?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Download App -->

	<?php
		endif;
	}
}
