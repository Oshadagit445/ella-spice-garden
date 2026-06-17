<?php

/**
 * Elementor restan copyright Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Copyright_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve copyright widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_copyright';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve copyright Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Copyright', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve copyright Nav Tab widget icon.
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
	 * Retrieve the list of categories the copyright Nav Tab widget belongs to.
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
			'copyright_content_style',
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
					'2'  	=> esc_html__('Style Two', 'restan-core')
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
			'logo_image',
			[
				'label'			=> esc_html__('Logo Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'shape',
			[
				'label'			=> esc_html__('Shape', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'condition' => [
					'style' => ['1']
				]
			]
		);

		$footer_nav_menu = new \Elementor\Repeater();

		$footer_nav_menu->add_control(
		    'nav_menu',
		    [
		        'label' => __('Select Nav Menu', 'ploming-addon'),
		        'type' => \Elementor\Controls_Manager::SELECT2,
		        'options' => restan_get_nav_menu(),
		        'label_block' => true,
		    ]
		);

		$this->add_control(
		    'footer_nav_menu',
		    [
		        'label' => __('Nav Menus', 'ploming-addon'),
		        'type' => \Elementor\Controls_Manager::REPEATER,
		        'fields' => $footer_nav_menu->get_controls(),
		        'prevent_empty' => false,
		        'condition' => [
					'style' => ['2']
				]
		    ]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'copyright-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
	?>

	<!-- Start copyright  -->
    <div class="footer-bottom text-light">
        <div class="footer-bottom-shape">
           <?php
           		if (!empty($settings['shape']['url'])) :
					echo restan_img_tag(array(
						'url'   => esc_url($settings['shape']['url'])
					));
				endif;
			?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer-logo">
                       <?php
                       		if (!empty($settings['logo_image']['url'])) :
								echo restan_img_tag(array(
									'url'   => esc_url($settings['logo_image']['url'])
								));
							endif;
						?>
                    </div>
                </div>
                <div class="col-lg-6 text-end">
                    <p>
                        <?php echo wp_kses($settings['title'], 'restan_allowed_tags'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->

    <?php elseif($settings['style'] == '2'):?>

    <!-- Start Footer Bottom -->
    <div class="footer-bottom-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <?php echo wp_kses($settings['title'], 'restan_allowed_tags'); ?>
                </div>
                <div class="col-lg-6 text-end">
                    <?php
		            foreach ($settings['footer_nav_menu'] as $nav_menu) : ?>
		                <?php wp_nav_menu(array(
		                    'menu' => $nav_menu['nav_menu'],
		                ));
		                ?>
		            <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->


	<?php
		endif;
	}
}
