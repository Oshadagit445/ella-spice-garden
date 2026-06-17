<?php

/**
 * Elementor restan Header Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Header_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Header widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_header';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Header Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Restan Header', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Farmer Info Nav Tab widget icon.
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
	 * Retrieve the list of categories the Farmers Nav Tab widget belongs to.
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
			'ag_header_style',
			[
				'label'		=> esc_html__('Header Style', 'restan-core'),
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
					'2' 	=> esc_html__('Style Two', 'restan-core'),
					'3' 	=> esc_html__('Style Three', 'restan-core'),
					'4' 	=> esc_html__('Style Four', 'restan-core'),
					'5' 	=> esc_html__('Style Five', 'restan-core'),
					'6' 	=> esc_html__('Style Six', 'restan-core'),
				],
			]
		);

		$this->add_control(
			'header_logo_desktop',
			[
				'label'			=> esc_html__('Header Logo Desktop', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'header_logo_scroll',
			[
				'label'			=> esc_html__('Header Logo Scroll', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'style' => ['1','4','3']
				]
			]
		);

		$this->add_control(
			'header_logo_mobile',
			[
				'label'			=> esc_html__('Header Logo Mobile', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'nav_menu',
			[
				'label' => __('Select Nav Menu', 'restan-addon'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => restan_get_nav_menu(),
				'label_block' => true,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'info',
			[
				'label' 		=> esc_html__('Info', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'      	=> '2',
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'number',
			[
				'label' 		=> esc_html__('Number', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'      	=> '2',
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
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

		$repeater->add_control(
			'flat_icon',
			[
				'label'      => esc_html__('Icon One', 'cleanu-core'),
				'type'       => \Elementor\Controls_Manager::ICON,
				'options'    => restan_flaticons(),
				'include'    => restan_include_flaticons(),
				'condition' => [
					'icon_style' => '1'
				]
			]
		);

		$repeater->add_control(
			'custom_icon',
			[
				'label' 		=> esc_html__('Custom Icon', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows'  		=> '2',
				'condition' => [
					'icon_style' => '2'
				]
			]
		);


		$repeater->add_control(
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
			'topbar_contact_info_list',
			[
				'label' 	=> esc_html__('Contact Info List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'prevent_empty' => false,
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Contact Info', 'restan-core'),
					],
				],
				'title_field' => '{{{ info }}}',
				'condition' => [
					'style' => ['1', '2', '3','4']
				]
			]
		);

		$this->add_control(
			'wishlist_enable',
			[
				'label' => __('Enable Wishlist?', 'restan-addon'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'restan-addon'),
				'label_off' => __('No', 'restan-addon'),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'cart_enable',
			[
				'label' => __('Enable Cart?', 'restan-addon'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'restan-addon'),
				'label_off' => __('No', 'restan-addon'),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'search_enable',
			[
				'label' => __('Enable Search?', 'restan-addon'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'restan-addon'),
				'label_off' => __('No', 'restan-addon'),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'style' => ['5']
				]
			]
		);


		$social = new \Elementor\Repeater();

		$social->add_control(
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

		$social->add_control(
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

		$social->add_control(
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


		$social->add_control(
			'icon_image',
			[
				'label'			=> esc_html__('Add Image Icon', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'icon_style' => '3'
				]
			]
		);

		$social->add_control(
			'url',
			[
				'label' => __('Add Url', 'restan-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('#', 'restan-core'),
				'show_external' => false,
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
				'show_label' => false,
			]
		);

		$this->add_control(
			'social_list',
			[
				'label' => __('Social List', 'restan-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $social->get_controls(),
				'prevent_empty' => false,
				'default' => [
					[
						'social_url' => [
							'url' => '#',
							'is_external' => false,
							'nofollow' => false,
						],
					],
				],
				'condition' => [
					'style' => ['1']
				]

			]
		);

		$this->add_control(
			'button_label',
			[
				'label' 	=> __('Button Label', 'restan'),
				'type' 		=>  \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Button Label', 'restan'),
				'condition' => [
					'style' => ['1','6']
				]
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' 		=> __('Link', 'restan'),
				'type' 			=>  \Elementor\Controls_Manager::URL,
				'placeholder' 	=> __('https://your-link.com', 'restan'),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition' => [
					'style' => ['1','6']
				]
			]
		);

		$this->add_control(
			'google_translate_shortcode',
			[
				'label' 	=> __('Translate Shortcode', 'restan-core'),
				'type' 		=>  \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('[gtranslate]', 'restan-core'),
				'condition' => [
					'style' => ['1']
				]
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'restan_side_menu_style',
			[
				'label'		=> esc_html__('Sidemenu Style', 'restan-core'),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'style' => ['2','5']
				]
			]
		);

		$this->add_control(
			'sidemenu_position',
			[
				'label' => __('Sidemenu Show/Hide', 'restan-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'restan-core'),
				'label_off' => __('Hide', 'restan-core'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'sidemenu_logo',
			[
				'label'			=> esc_html__('Sidemenu Logo', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'sidemenu_position' => 'yes'
				]
			]
		);
		$this->add_control(
			'sidemenu_content',
			[
				'label' 		=> esc_html__('Content', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' => [
					'sidemenu_position' => 'yes'
				]
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows' 			=> '2'
			]
		);

		$repeater->add_control(
			'content',
			[
				'label' 		=> esc_html__('Content', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows' 			=> '3'
			]
		);


		$this->add_control(
			'sidemenu_info_list',
			[
				'label' 	=> esc_html__('Sidemanu Info List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Sidemanu Info', 'restan-core'),
					],
				],
				'prevent_empty' => false,
				'title_field' => '{{{ title }}}',
				'condition' => [
					'sidemenu_position' => 'yes'
				]
			]
		);

		$this->add_control(
			'newsletter_title',
			[
				'label'     => __('Newsletter Title', 'restan-core'),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => __('Title', 'restan-core')
			]
		);

		$this->add_control(
			'newsletter_placeholder',
			[
				'label'     => __('Newsletter Placeholder Text', 'restan-core'),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => __('Newsletter Placeholder Text', 'restan-core'),
			]
		);

		$social = new \Elementor\Repeater();

		$social->add_control(
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

		$social->add_control(
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

		$social->add_control(
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


		$social->add_control(
			'icon_image',
			[
				'label'			=> esc_html__('Add Image Icon', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'icon_style' => '3'
				]
			]
		);

		$social->add_control(
			'url',
			[
				'label' => __('Add Url', 'restan-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('#', 'restan-core'),
				'show_external' => false,
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
				'show_label' => false,
			]
		);

		$this->add_control(
			'sidemenu_social_list',
			[
				'label' => __('Social List', 'restan-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $social->get_controls(),
				'prevent_empty' => false,
				'default' => [
					[
						'social_url' => [
							'url' => '#',
							'is_external' => false,
							'nofollow' => false,
						],
					],
				],

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'restan_header_style_section',
			[
				'label' 	=> __('Header Style', 'restan-core'),
				'tab' 		=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'ag_header_icon_color',
			[
				'label' 		=> __('Header Menu Icon Color', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .navbar.validnavs.navbar-common .attr-right .attr-nav li .call i' => 'color: {{VALUE}}!important;',
				],
			]
		);

		$this->add_control(
			'header_menu_color',
			[
				'label' 		=> __('Header Menu Color', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} nav.navbar.validnavs.no-background.white ul.nav>li>a,{{WRAPPER}} nav.navbar ul.nav>li>a ' => 'color: {{VALUE}}!important;',
				],
			]
		);

		$this->add_control(
			'header_contact_info_color',
			[
				'label' 		=> __('Contact Info Title Color', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .navbar .attr-right .attr-nav li .call p,{{WRAPPER}} .top-bar-area li,{{WRAPPER}} .top-bar-area li a' => 'color: {{VALUE}}!important;',
				],
				'condition' => [
					'style' => ['2', '5']
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'header_contact_info_color_typogrphy',
				'label' 		=> esc_html__('Contact Info Title Typography', 'restan-core'),
				'selector' 		=> '{{WRAPPER}} .navbar .attr-right .attr-nav li .call p,{{WRAPPER}} .top-bar-area li a',
				'condition' => [
					'style' => ['2', '5']
				]
			]
		);

		$this->add_control(
			'header_contact_color',
			[
				'label' 		=> __('Contact Color', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .top-bar-area .item-flex li,{{WRAPPER}} .top-bar-area .item-flex li a,{{WRAPPER}} .navbar .attr-right .attr-nav li .call h5 a' => 'color: {{VALUE}}!important;',
				],
				'condition' => [
					'style' => ['1', '2']
				]
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'header_contact_color_typogrphy',
				'label' 		=> esc_html__('Contact Typography', 'restan-core'),
				'selector' 		=> '{{WRAPPER}} .top-bar-area .item-flex li,{{WRAPPER}} .top-bar-area .item-flex li a,{{WRAPPER}} .navbar .attr-right .attr-nav li .call h5 a',
				'condition' => [
					'style' => ['1', '2']
				]
			]
		);

		$this->add_control(
			'header_button_color',
			[
				'label' 		=> __('Button Color', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .navbar .attr-right .attr-nav li.button a,{{WRAPPER}}  .navbar .attr-right .attr-nav li.button a::after,{{WRAPPER}} nav.navbar.validnavs.navbar-fixed.navbar-style-three.no-background .attr-right .attr-nav li.button a' => 'color: {{VALUE}}!important;',
				],
				'condition' => [
					'style' => ['1', '3', '5', '6']
				]
			]
		);

		$this->add_control(
			'header_button_bg_color',
			[
				'label' 		=> __('Button Background Color', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .navbar .attr-right .attr-nav li.button a,{{WRAPPER}}  .navbar .attr-right .attr-nav li.button a::after' => 'background-color: {{VALUE}}!important;',
				],
				'condition' => [
					'style' => ['1', '3', '6']
				]
			]
		);

		$this->add_control(
			'header_button_bg_hover_color',
			[
				'label' 		=> __('Button Hover Background Color', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .navbar.navbar-style-one.no-background .attr-right .attr-nav li.button a::after,{{WRAPPER}} .navbar.no-background .attr-right .attr-nav li.button.light a::after' => 'background-color: {{VALUE}}!important;',
				],
				'condition' => [
					'style' => ['1', '3', '6']
				]
			]
		);

		$this->add_control(
			'header_button_bg_hover_text_color',
			[
				'label' 		=> __('Button Hover Text Color', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .navbar.navbar-style-one.no-background .attr-right .attr-nav li.button a:hover,{{WRAPPER}} .navbar.no-background .attr-right .attr-nav li.button.light a::after' => 'color: {{VALUE}}!important;',
				],
				'condition' => [
					'style' => ['1', '3', '6']
				]
			]
		);

		$this->end_controls_section();
	}
	// Output For User
	protected function render()
	{
		$restan_header_output = $this->get_settings_for_display();
		if ($restan_header_output['style'] == '1') :
	?>
	<!-- Header Style One -->
    <div class="top-bar-area top-bar-style-one bg-theme text-light">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-7">
                    <ul class="item-flex">
                    	<?php foreach ($restan_header_output['topbar_contact_info_list'] as $single_header_con_info) : ?>
	                        <li>
	                            <a href="<?php echo wp_kses($single_header_con_info['number'], 'restan_allowed_tags'); ?>"> 
	                                	<?php if (!empty($single_header_con_info['flat_icon'])) : ?>
											<i class="<?php echo esc_attr($single_header_con_info['flat_icon']); ?>"></i>
										<?php endif; ?>
										<?php if (!empty($single_header_con_info['icon_image'])) : ?>
											<img src="<?php echo esc_url($single_header_con_info['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
										<?php endif; ?>
										<?php
										if (!empty($single_header_con_info['custom_icon'])) : ?>
											<i class="<?php echo esc_attr($single_header_con_info['custom_icon']); ?>"></i><?php endif; ?> <?php echo wp_kses($single_header_con_info['info'], 'restan_allowed_tags'); ?>
	                            </a>
	                        </li>
                       	<?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-lg-5 text-end">
                    <div class="item-flex">
                        <?php echo do_shortcode($restan_header_output['google_translate_shortcode']); ?>
                        <div class="social">
                            <ul>
								<?php
									foreach ($restan_header_output['social_list'] as $single_item) :
								?>
	                                <li>
	                                   <a href="<?php echo esc_url($single_item['url']['url']); ?>">
											<?php if (!empty($single_item['flat_icon'])) : ?>
												<i class="<?php echo esc_attr($single_item['flat_icon']); ?>"></i>
											<?php endif; ?>
											<?php if (!empty($single_item['icon_image']['url'])) : ?>
												<img src="<?php echo esc_url($single_item['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
											<?php endif; ?>
											<?php
											if (!empty($single_item['custom_icon'])) : ?>
												<i class="<?php echo esc_attr($single_item['custom_icon']); ?>"></i>
											<?php endif; ?>
										</a>
	                                </li>
                               	<?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Header 
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav nav-top-margin navbar-sticky navbar-default validnavs navbar-fixed white no-background nav-border">


            <div class="container d-flex justify-content-between align-items-center">            

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <?php if (!empty($restan_header_output['header_logo_desktop']['url'])) : ?>
	                    <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
	                        <img src="<?php echo esc_url($restan_header_output['header_logo_desktop']['url']); ?>" class="logo logo-display" alt="<?php echo get_bloginfo('name'); ?>">
	                        <img src="<?php echo esc_url($restan_header_output['header_logo_scroll']['url']); ?>" class="logo logo-scrolled" alt="<?php echo get_bloginfo('name'); ?>">
	                    </a>
	                <?php endif; ?>
                </div>
                <!-- End Header Navigation -->

                <div class="nav-item-box d-flex justify-content-between align-items-center">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">

                        <?php if (!empty($restan_header_output['header_logo_mobile']['url'])) : ?>
							<img src="<?php echo esc_url($restan_header_output['header_logo_mobile']['url']); ?>" alt="?php echo get_bloginfo( 'name' ); ?>">
						<?php endif; ?>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-times"></i>
                        </button>
                      
                        <?php
							wp_nav_menu(
								array(
									'menu' => $restan_header_output['nav_menu'],
									'menu_class'      => 'nav navbar-nav navbar-right',
									'fallback_cb'     => 'restan_Bootstrap_Navwalker::fallback',
									'walker'          => new restan_Bootstrap_Navwalker(),
									'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
								)
							);
						?>

                    </div><!-- /.navbar-collapse -->

                    <div class="attr-right">
	                    <!-- Start Atribute Navigation -->
	                    <div class="attr-nav">
	                        <ul>
	                            <?php if($restan_header_output['wishlist_enable'] == 'yes'): ?>
	                               	<li class="wishlist">
	                                	<?php
	                                    	if( class_exists( 'TInvWL_Admin_TInvWL' ) ){
	    	                                    echo do_shortcode( '[ti_wishlist_products_counter]' );
	    	                                }
	                                	?>
	                                </li>
	                            <?php endif;?>
	                            <?php if($restan_header_output['cart_enable'] == 'yes'): ?>
	                            	<li class="dropdown">
	                            	    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                                        <div class="basket-item-count">
	    	                                    <span class="cart-items-count"> 
	    	                                        <?php
	    	                                        	if (is_admin()) return false;
	    	                                         	WC()->cart->get_cart_contents_count(); 
	    	                                        ?>
	    	                                    </span>
	                                        </div>
	                                    </a>
	                                    <!-- End Atribute Navigation -->
	                                    <div class="widget_shopping_cart_content">
	                                       	<?php 
	                                       		if (is_admin()) return false;
	                                       		echo woocommerce_mini_cart();
	                                       	?>
	                                    </div>
	                                </li>
	                            <?php endif;?>
	                        </ul>
	                    </div>
	                    <!-- End Atribute Navigation -->

	                </div>

                    <?php if(!empty($restan_header_output['button_label'])):?>
	                    <div class="attr-right">
	                        <!-- Start Atribute Navigation -->
	                        <div class="attr-nav">
	                            <ul>
	                                <li class="button"><a href="<?php echo esc_url($restan_header_output['button_link']['url']); ?>"><?php echo esc_html($restan_header_output['button_label']); ?></a></li>
	                            </ul>
	                        </div>
	                        <!-- End Atribute Navigation -->
	                    </div>
                	<?php endif;?>
                </div>

                <!-- Main Nav -->
            </div>   
            <!-- Overlay screen for menu -->
            <div class="overlay-screen"></div>
            <!-- End Overlay screen for menu -->
        </nav>
        <!-- End Navigation -->
    </header>
	<!-- End Header Style One -->

	<?php elseif ($restan_header_output['style'] == '2') : ?>

	<!-- Header Style Two  -->
    <div class="bg-theme text-light top-bar-style-two">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="topbar-two-items">
                    	<?php foreach ($restan_header_output['topbar_contact_info_list'] as $single_header_con_info) : ?>
	                        <div class="topbar-info">
	                            <div class="icon">
	                                <?php if (!empty($single_header_con_info['flat_icon'])) : ?>
											<i class="<?php echo esc_attr($single_header_con_info['flat_icon']); ?>"></i>
										<?php endif; ?>
										<?php if (!empty($single_header_con_info['icon_image']['url']['0'])) : ?>
											<img src="<?php echo esc_url($single_header_con_info['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
										<?php endif; ?>
										<?php
										if (!empty($single_header_con_info['custom_icon'])) : ?>
											<i class="<?php echo esc_attr($single_header_con_info['custom_icon']); ?>"></i><?php endif; ?>
	                            </div>
	                            <?php if(!empty($single_header_con_info['info'])):?>
		                            <div class="info">
		                                <h5><?php echo wp_kses($single_header_con_info['info'], 'restan_allowed_tags'); ?></h5>
		                                <a href="tel:<?php echo esc_attr($single_header_con_info['number'], 'restan_allowed_tags'); ?>"><?php echo wp_kses($single_header_con_info['number'], 'restan_allowed_tags'); ?></a>
		                            </div>
		                        <?php endif; ?>    
	                        </div>
	                    <?php  break; endforeach;?>    
                        <?php if (!empty($restan_header_output['header_logo_desktop']['url'])) : ?>
	                       	<div class="logo">
			                    <a href="<?php echo esc_url(home_url()); ?>">
			                        <img src="<?php echo esc_url($restan_header_output['header_logo_desktop']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
			                    </a>
		                	</div>
	                	<?php endif; ?>
                        <?php foreach ($restan_header_output['topbar_contact_info_list'] as $key => $single_header_con_info) :
                        	if($key === 1):
                        	$phone_number = (int)filter_var($single_header_con_info['number'], FILTER_SANITIZE_NUMBER_INT); 	
                         ?>
	                        <div class="topbar-info">
	                            <div class="icon">
	                                <?php if (!empty($single_header_con_info['flat_icon'])) : ?>
											<i class="<?php echo esc_attr($single_header_con_info['flat_icon']); ?>"></i>
									<?php endif; ?>
									<?php if (!empty($single_header_con_info['icon_image']['url'])) : ?>
										<img src="<?php echo esc_url($single_header_con_info['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
									<?php endif; ?>
									<?php
									if (!empty($single_header_con_info['custom_icon'])) : ?>
										<i class="<?php echo esc_attr($single_header_con_info['custom_icon']); ?>"></i>
									<?php endif; ?>
	                            </div>
	                            <?php if(!empty($single_header_con_info['info'])):?>
		                            <div class="info">
		                                <h5><?php echo wp_kses($single_header_con_info['info'], 'restan_allowed_tags'); ?></h5>
		                                <a href="tel:<?php echo esc_attr($phone_number);?>"><?php echo wp_kses($single_header_con_info['number'], 'restan_allowed_tags'); ?></a>
		                            </div>
	                        	<?php endif; ?>
	                        </div>
	                    <?php endif; endforeach;?>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Header 
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav navbar-box logo-less navbar-default validnavs">

            <!-- Start Top Search -->
            <div class="top-search">
                <div class="container-xl">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                    </div>
                </div>
            </div>
            <!-- End Top Search -->


            <div class="container nav-box d-flex justify-content-between align-items-center">            

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <?php if (!empty($restan_header_output['header_logo_mobile']['url'])) : ?>
                    	<a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
                        <img src="<?php echo esc_url($restan_header_output['header_logo_mobile']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                   		 </a>
                	<?php endif;?>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">

                    <?php if (!empty($restan_header_output['header_logo_mobile']['url'])) : ?>
	                    <img src="<?php echo esc_url($restan_header_output['header_logo_mobile']['url']); ?>" class="logo logo-display" alt="<?php echo get_bloginfo('name'); ?>">
	                <?php endif; ?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                    
                    <?php
						wp_nav_menu(
							array(
								'menu' => $restan_header_output['nav_menu'],
								'menu_class'      => 'nav navbar-nav navbar-right',
								'fallback_cb'     => 'restan_Bootstrap_Navwalker::fallback',
								'walker'          => new restan_Bootstrap_Navwalker(),
								'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
							)
						);
					?>

                </div><!-- /.navbar-collapse -->

                <div class="attr-right">
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav attr-box">
                        <ul>
                            <li class="search"><a href="#"><i class="far fa-search"></i></a></li>
                            <?php
							if ('yes' == $restan_header_output['sidemenu_position']) : ?>
	                            <li class="side-menu">
		                            <a href="#">
		                                <span class="bar-1"></span>
		                                <span class="bar-2"></span>
		                                <span class="bar-3"></span>
		                            </a>
		                        </li>
	                    	<?php endif;?>
                        </ul>
                    </div>
                    <!-- End Atribute Navigation -->
                </div>

                <?php
				if ('yes' == $restan_header_output['sidemenu_position']) : ?>
	                <!-- Start Side Menu -->
	                <div class="side">
	                    <a href="#" class="close-side"><i class="fas fa-times"></i></a>
	                    <div class="widget">
	                    	<?php if (!empty($restan_header_output['sidemenu_logo']['url'])) : ?>
		                        <div class="logo">
		                           <img src="<?php echo esc_url($restan_header_output['sidemenu_logo']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
		                        </div>
		                    <?php endif;?>
	                        <?php if (!empty($restan_header_output['sidemenu_content'])) : ?>
								<p>
									<?php echo wp_kses($restan_header_output['sidemenu_content'], 'restan_allowed_tags'); ?>
								</p>

							<?php endif; ?>
	                    </div>
	                    <?php if (!empty($restan_header_output['sidemenu_info_list'])) : ?>
		                    <div class="widget address">
		                        <div>
		                            <ul>
		                            	<?php
											foreach ($restan_header_output['sidemenu_info_list'] as $single_item) :
											?>
			                                <li>
			                                    <div class="content">
			                                        <p><?php echo wp_kses($single_item['title'], 'restan_allowed_tags'); ?></p> 
			                                        <strong><?php echo wp_kses($single_item['content'], 'restan_allowed_tags'); ?></strong>
			                                    </div>
			                                </li>
		                                <?php endforeach; ?>
		                            </ul>
		                        </div>
		                    </div>
	                    <?php endif; ?>
	                    <div class="widget newsletter">
	                        <h4 class="title"><?php echo esc_html($restan_header_output['newsletter_title']); ?></h4>
	                        <form class="newsletter-form">
								<div class="input-group stylish-input-group">
									<input type="email" placeholder="<?php echo esc_attr($restan_header_output['newsletter_placeholder']); ?>" class="form-control" name="email">
									<span class="input-group-addon">
										<button type="submit">
											<i class="fas fa-arrow-right"></i>
										</button>
									</span>
								</div>
							</form>
	                    </div>
	                    <?php if (!empty($restan_header_output['sidemenu_social_list'])) : ?>
		                    <div class="widget social">
		                        <ul class="link">
		                           <?php if (!empty($restan_header_output['sidemenu_social_list'])) : ?>
										<div class="widget social">
											<ul class="link">
												<?php
												foreach ($restan_header_output['sidemenu_social_list'] as $single_item) :
												?>
													<li>
														<a href="<?php echo esc_url($single_item['url']['url']); ?>">
															<?php if (!empty($single_item['flat_icon'])) : ?>
																<i class="<?php echo esc_attr($single_item['flat_icon']); ?>"></i>
															<?php endif; ?>
															<?php if (!empty($single_item['icon_image']['url'])) : ?>
																<img src="<?php echo esc_url($single_item['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
															<?php endif; ?>
															<?php
															if (!empty($single_item['custom_icon'])) : ?>
																<i class="<?php echo esc_attr($single_item['custom_icon']); ?>"></i>
															<?php endif; ?>
														</a>
													</li>
												<?php endforeach; ?>
											</ul>
										</div>
									<?php endif; ?>
		                        </ul>
		                    </div>
	                    <?php endif; ?>

	                </div>
	                <!-- End Side Menu -->
	            <?php endif; ?>    
            </div>

            <!-- Overlay screen for menu -->
            <div class="overlay-screen"></div>
            <!-- End Overlay screen for menu -->

        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header Style Two -->

	<?php elseif ($restan_header_output['style'] == '3') : ?>

	<!-- Header Style Three == -->
    <div class="top-bar-area top-bar-style-one bg-theme text-light bg-transparent">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-7">
                    <ul class="item-flex">
						<?php 
						$counter = 1;
						foreach ($restan_header_output['topbar_contact_info_list'] as $key => $single_header_con_info) :
						 ?>
	                        <li>
	                             <a href="<?php echo wp_kses($single_header_con_info['number'], 'restan_allowed_tags'); ?>"> 
	                                <?php if (!empty($single_header_con_info['flat_icon'])) : ?>
											<i class="<?php echo esc_attr($single_header_con_info['flat_icon']); ?>"></i>
										<?php endif; ?>
										<?php if (!empty($single_header_con_info['icon_image']['url']['0'])) : ?>
											<img src="<?php echo esc_url($single_header_con_info['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
										<?php endif; ?>
										<?php
										if (!empty($single_header_con_info['custom_icon'])) : ?>
										<i class="<?php echo esc_attr($single_header_con_info['custom_icon']); ?>"></i><?php endif; ?> <?php echo wp_kses($single_header_con_info['info'], 'restan_allowed_tags'); ?>
	                            </a>
	                        </li>
                       	<?php  if($counter == '2'){break;} $counter ++; endforeach;?> 
                    </ul>
                </div>
                <div class="col-lg-5 text-end">
                	<?php foreach ($restan_header_output['topbar_contact_info_list'] as $key => $single_header_con_info) :
                        	if($key === 2):
                         ?>
                    <p>
                        <?php if (!empty($single_header_con_info['flat_icon'])) : ?>
							<i class="<?php echo esc_attr($single_header_con_info['flat_icon']); ?>"></i>
						<?php endif; ?>
						<?php if (!empty($single_header_con_info['icon_image']['url']['0'])) : ?>
							<img src="<?php echo esc_url($single_header_con_info['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
						<?php endif; ?>
						<?php
						if (!empty($single_header_con_info['custom_icon'])) : ?>
						<i class="<?php echo esc_attr($single_header_con_info['custom_icon']); ?>"></i><?php endif; ?>  <?php echo wp_kses($single_header_con_info['info'], 'restan_allowed_tags'); ?>
                    </p>
                    <?php endif; endforeach;?>   
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Header 
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav dark-layout brand-center navbar-default validnavs">


            <div class="container">            
                

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <?php if (!empty($restan_header_output['header_logo_desktop']['url'])) : ?>
	                    <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
	                        <img src="<?php echo esc_url($restan_header_output['header_logo_desktop']['url']); ?>" class="logo logo-display" alt="<?php echo get_bloginfo('name'); ?>">
                        	<img src="<?php echo esc_url($restan_header_output['header_logo_scroll']['url']); ?>" class="logo logo-scrolled" alt="<?php echo get_bloginfo('name'); ?>">
                    </a>
	                <?php endif; ?>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">

                    <?php if (!empty($restan_header_output['header_logo_mobile']['url'])) : ?>
						<img src="<?php echo esc_url($restan_header_output['header_logo_mobile']['url']); ?>" alt="?php echo get_bloginfo( 'name' ); ?>">
					<?php endif; ?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                    
                    <?php
						wp_nav_menu(
							array(
								'menu' => $restan_header_output['nav_menu'],
								'menu_class'      => 'nav navbar-nav navbar-center',
								'fallback_cb'     => 'restan_Bootstrap_Navwalker::fallback',
								'walker'          => new restan_Bootstrap_Navwalker(),
								'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
							)
						);
					?>
                </div><!-- /.navbar-collapse -->

                

                <!-- Overlay screen for menu -->
                <div class="overlay-screen"></div>
                <!-- End Overlay screen for menu -->

            </div>   
            
        </nav>
        <!-- End Navigation -->

    </header>
	<!-- End Header Style Three -->

	<?php elseif ($restan_header_output['style'] == '4') : ?>
	<!-- Start Header Top 
    ============================================= -->
    <div class="top-bar-area top-bar-style-one bg-theme text-light bg-transparent">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-7">
                    <ul class="item-flex">
                        <?php 
						$counter = 1;
						foreach ($restan_header_output['topbar_contact_info_list'] as $key => $single_header_con_info) :
						 ?>
	                        <li>
	                             <a href="<?php echo wp_kses($single_header_con_info['number'], 'restan_allowed_tags'); ?>"> 
	                                <?php if (!empty($single_header_con_info['flat_icon'])) : ?>
										<i class="<?php echo esc_attr($single_header_con_info['flat_icon']); ?>"></i>
									<?php endif; ?>
									<?php if (!empty($single_header_con_info['icon_image']['url']['0'])) : ?>
										<img src="<?php echo esc_url($single_header_con_info['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
									<?php endif; ?>
									<?php
									if (!empty($single_header_con_info['custom_icon'])) : ?>
									<i class="<?php echo esc_attr($single_header_con_info['custom_icon']); ?>"></i><?php endif; ?> <?php echo wp_kses($single_header_con_info['info'], 'restan_allowed_tags'); ?>
	                            </a>
	                        </li>
                       	<?php  if($counter == '2'){break;} $counter ++; endforeach;?> 
                    </ul>
                </div>
                <div class="col-lg-5 text-end">
                	<?php foreach ($restan_header_output['topbar_contact_info_list'] as $key => $single_header_con_info) :
                       	if($key === 2):
                    ?>
	                    <p>
	                        <?php if (!empty($single_header_con_info['flat_icon'])) : ?>
							<i class="<?php echo esc_attr($single_header_con_info['flat_icon']); ?>"></i>
							<?php endif; ?>
							<?php if (!empty($single_header_con_info['icon_image']['url']['0'])) : ?>
								<img src="<?php echo esc_url($single_header_con_info['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
							<?php endif; ?>
							<?php
							if (!empty($single_header_con_info['custom_icon'])) : ?>
							<i class="<?php echo esc_attr($single_header_con_info['custom_icon']); ?>"></i><?php endif; ?>  <?php echo wp_kses($single_header_con_info['info'], 'restan_allowed_tags'); ?>
	                    </p>
            		<?php endif; endforeach;?>  
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Header 
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav brand-center-style-two dark-layout brand-center navbar-default validnavs">
            <div class="container">            
                
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php if (!empty($restan_header_output['header_logo_desktop']['url'])) : ?>
		                        <img src="<?php echo esc_url($restan_header_output['header_logo_desktop']['url']); ?>" class="logo logo-display" alt="<?php echo get_bloginfo('name'); ?>">
		                <?php endif; ?>
		                <?php if (!empty($restan_header_output['header_logo_scroll']['url'])) : ?>
		                        <img src="<?php echo esc_url($restan_header_output['header_logo_scroll']['url']); ?>" class="logo logo-scrolled" alt="<?php echo get_bloginfo('name'); ?>">
		                <?php endif; ?>
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">

                   	<?php if (!empty($restan_header_output['header_logo_mobile']['url'])) : ?>
						<img src="<?php echo esc_url($restan_header_output['header_logo_mobile']['url']); ?>" alt="?php echo get_bloginfo( 'name' ); ?>">
					<?php endif; ?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                    
                    <?php
						wp_nav_menu(
							array(
								'menu' => $restan_header_output['nav_menu'],
								'menu_class'      => 'nav navbar-nav navbar-center',
								'fallback_cb'     => 'restan_Bootstrap_Navwalker::fallback',
								'walker'          => new restan_Bootstrap_Navwalker(),
								'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
							)
						);
					?>
                </div><!-- /.navbar-collapse -->

                <!-- Overlay screen for menu -->
                <div class="overlay-screen"></div>
                <!-- End Overlay screen for menu -->

            </div>   
            
        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header Four -->

    <?php elseif ($restan_header_output['style'] == '5') : ?>

     <!-- Header Five
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav navbar-box navbar-default validnavs">

            <!-- Start Top Search -->
            <div class="top-search">
                <div class="container-xl">
			        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
	                    <div class="input-group">
	                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
	                        <input type="text" id="search" name="s" class="form-control" placeholder="<?php echo esc_html__("Search Here...", 'restan-core'); ?>">
	                        <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
	                    </div>
                	</form>
                </div>
            </div>
            <!-- End Top Search -->


            <div class="container nav-box d-flex justify-content-between align-items-center">    
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>

                    <?php if (!empty($restan_header_output['header_logo_desktop']['url'])) : ?>
                    	<a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
                        <img src="<?php echo esc_url($restan_header_output['header_logo_desktop']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>" class="logo">
                   		 </a>
                	<?php endif;?>
           
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">

                    <?php if (!empty($restan_header_output['header_logo_mobile']['url'])) : ?>
	                    <img src="<?php echo esc_url($restan_header_output['header_logo_mobile']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
	                <?php endif; ?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                    <?php
						wp_nav_menu(
							array(
								'menu' => $restan_header_output['nav_menu'],
								'menu_class'      => 'nav navbar-nav navbar-righ',
								'fallback_cb'     => 'restan_Bootstrap_Navwalker::fallback',
								'walker'          => new restan_Bootstrap_Navwalker(),
								'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
							)
						);
					?>
                </div><!-- /.navbar-collapse -->
				
                <div class="attr-right">
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav attr-box">
                        <ul>
                        	<?php
								if ('yes' == $restan_header_output['search_enable']) : 
							?>
                           		 <li class="search"><a href="#"><i class="far fa-search"></i></a></li>
                            <?php endif; ?>
	                        <?php
								if ('yes' == $restan_header_output['sidemenu_position']) : 
							?>
		                        <li class="side-menu">
		                            <a href="#">
		                                <span class="bar-1"></span>
		                                <span class="bar-2"></span>
		                                <span class="bar-3"></span>
		                            </a>
		                        </li>
	                        <?php endif; ?>
                        </ul>
                    </div>
                    <!-- End Atribute Navigation -->
                </div>  
               	<?php
				if ('yes' == $restan_header_output['sidemenu_position']) : ?>
	                <!-- Start Side Menu -->
	                <div class="side">
	                    <a href="#" class="close-side"><i class="fas fa-times"></i></a>
	                    <div class="widget">
	                    	<?php if (!empty($restan_header_output['sidemenu_logo']['url'])) : ?>
		                        <div class="logo">
		                           <img src="<?php echo esc_url($restan_header_output['sidemenu_logo']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
		                        </div>
		                    <?php endif;?>
	                        <?php if (!empty($restan_header_output['sidemenu_content'])) : ?>
								<p>
									<?php echo wp_kses($restan_header_output['sidemenu_content'], 'restan_allowed_tags'); ?>
								</p>

							<?php endif; ?>
	                    </div>
	                    <?php if (!empty($restan_header_output['sidemenu_info_list'])) : ?>
		                    <div class="widget address">
		                        <div>
		                            <ul>
		                            	<?php
											foreach ($restan_header_output['sidemenu_info_list'] as $single_item) :
											?>
			                                <li>
			                                    <div class="content">
			                                        <p><?php echo wp_kses($single_item['title'], 'restan_allowed_tags'); ?></p> 
			                                        <strong><?php echo wp_kses($single_item['content'], 'restan_allowed_tags'); ?></strong>
			                                    </div>
			                                </li>
		                                <?php endforeach; ?>
		                            </ul>
		                        </div>
		                    </div>
	                    <?php endif; ?>
	                    <div class="widget newsletter">
	                        <h4 class="title"><?php echo esc_html($restan_header_output['newsletter_title']); ?></h4>
	                        <form class="newsletter-form">
								<div class="input-group stylish-input-group">
									<input type="email" placeholder="<?php echo esc_attr($restan_header_output['newsletter_placeholder']); ?>" class="form-control" name="email">
									<span class="input-group-addon">
										<button type="submit">
											<i class="fas fa-arrow-right"></i>
										</button>
									</span>
								</div>
							</form>
	                    </div>
	                    <?php if (!empty($restan_header_output['sidemenu_social_list'])) : ?>
		                    <div class="widget social">
		                        <ul class="link">
		                           <?php if (!empty($restan_header_output['sidemenu_social_list'])) : ?>
										<?php
										foreach ($restan_header_output['sidemenu_social_list'] as $single_item) :
										?>
											<li>
												<a href="<?php echo esc_url($single_item['url']['url']); ?>">
													<?php if (!empty($single_item['flat_icon'])) : ?>
														<i class="<?php echo esc_attr($single_item['flat_icon']); ?>"></i>
													<?php endif; ?>
													<?php if (!empty($single_item['icon_image']['url'])) : ?>
														<img src="<?php echo esc_url($single_item['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
													<?php endif; ?>
													<?php
													if (!empty($single_item['custom_icon'])) : ?>
														<i class="<?php echo esc_attr($single_item['custom_icon']); ?>"></i>
													<?php endif; ?>
												</a>
											</li>
										<?php endforeach; ?>
									<?php endif; ?>
		                        </ul>
		                    </div>
	                    <?php endif; ?>

	                </div>
	                <!-- End Side Menu -->
	            <?php endif; ?>  

            </div>   
            <!-- Overlay screen for menu -->
            <div class="overlay-screen"></div>
            <!-- End Overlay screen for menu -->

        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header Five -->

    <?php elseif ($restan_header_output['style'] == '6') : ?>

    <!-- Header 
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav navbar-sticky navbar-default validnavs">


            <div class="container d-flex justify-content-between align-items-center">            

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>

                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php if (!empty($restan_header_output['header_logo_desktop']['url'])) : ?>
		                    <img src="<?php echo esc_url($restan_header_output['header_logo_desktop']['url']); ?>" class="logo" alt="<?php echo get_bloginfo('name'); ?>">
		                <?php endif; ?>
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">

                    <?php if (!empty($restan_header_output['header_logo_mobile']['url'])) : ?>
						<img src="<?php echo esc_url($restan_header_output['header_logo_mobile']['url']); ?>" alt="?php echo get_bloginfo( 'name' ); ?>">
					<?php endif; ?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                    
                    <?php
						wp_nav_menu(
							array(
								'menu' => $restan_header_output['nav_menu'],
								'menu_class'      => 'nav navbar-nav navbar-right',
								'fallback_cb'     => 'restan_Bootstrap_Navwalker::fallback',
								'walker'          => new restan_Bootstrap_Navwalker(),
								'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
							)
						);
					?>
                </div><!-- /.navbar-collapse -->

                <div class="attr-right">
					<?php if(!empty($restan_header_output['button_label'])):?>
	                    <!-- Start Atribute Navigation -->
	                    <div class="attr-nav">
	                        <ul>
	                            <li class="button"><a href="<?php echo esc_url($restan_header_output['button_link']['url']); ?>"><?php echo esc_html($restan_header_output['button_label']); ?></a></li>
	                        </ul>
	                    </div>
	                    <!-- End Atribute Navigation -->
	                <?php endif;?>
                </div>

                <!-- Main Nav -->
            </div>   
            <!-- Overlay screen for menu -->
            <div class="overlay-screen"></div>
            <!-- End Overlay screen for menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header -->	
	<?php
		endif;
	}
}
