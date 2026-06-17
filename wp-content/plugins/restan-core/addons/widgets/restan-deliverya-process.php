<?php

/**
 * Elementor Restan Delivery Process Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Delivery_Process_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Delivery Process name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_delivery_process';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Delivery Process title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Delivery Process', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Delivery Process icon.
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
			'content_style',
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
		    'bg_image_one',
		    [
		        'label' => __('Background Image', 'sifoxen-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		    ]
		);

		$this->add_control(
		    'shape_one',
		    [
		        'label' => __('Shape Image', 'sifoxen-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		    ]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'deliverya-process-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
	?>
    <!-- Start Delivery Process
    ============================================= -->
    <div class="deliverya-process-area shadow dark default-padding bg-dark text-light bg-cover" style="background-image: url(<?php echo esc_url($settings['bg_image_one']['url'])?>);">
        <?php if (!empty($settings['shape_one']['url'])) : ?>
			<div class="shape">
	            <img src="<?php echo esc_url($settings['shape_one']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
	        </div>
		<?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-8">
                    <div class="delivary-projcess">
                        <h2><?php echo wp_kses($settings['title'], 'restan_allowed_tags'); ?></h2>
                        <p>
                            <?php echo wp_kses($settings['sub_title'], 'restan_allowed_tags'); ?>
                        </p>
						<?php if(!empty($settings['button_one_label'])):?>
                        	<a class="btn btn-theme btn-md animation mt-10" href="<?php echo esc_url($settings['button_one_url']['url']);?>">
                        		<?php echo esc_html($settings['button_one_label']);?>
                        		<i class="far fa-shopping-cart"></i>
                        	</a>
                        <?php endif;?>	
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delivery Process -->
	<?php
		endif;
	}
}
