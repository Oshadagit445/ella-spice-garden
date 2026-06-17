<?php

/**
 * Elementor Restan Food Menu Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Food_Menu_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Restan Food Menu widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_food_menu';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Restan Food Menu Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Food Menu', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Restan Food Menu Nav Tab widget icon.
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
	 * Retrieve the list of categories the Restan Food Menu Nav Tab widget belongs to.
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
			'restan_food_menu_style',
			[
				'label'		=> esc_html__('Food Menu Style', 'restan-core'),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style',
			[
				'label' 		=> __('Style', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __('Style One', 'restan-core'),
					'2'  		=> __('Style Two', 'restan-core'),
					'3'  		=> __('Style Three', 'restan-core'),
					'4'  		=> __('Style Four', 'restan-core'),
					'5'  		=> __('Style Five', 'restan-core'),
					'6'  		=> __('Style Six', 'restan-core'),
					'7'  		=> __('Style Seven', 'restan-core'),
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
				'condition'		=> ['style'	=>	['7']],
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
				'condition'		=> ['style'	=>	['7']],
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
					'style' => ['7']
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
					'style' => ['7']
				]
		    ]
		);


		$this->add_control(
			'meal_type',
			[
				'label' 		=> esc_html__('Meal Type', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '3',
				'placeholder' 	=> esc_html__('Meal Type', 'restan-core'),
				'default' 		=> esc_html__('Default Meal Type', 'restan-core'),
				'label_block' 	=> true,
				'condition'		=> ['style'	=>	['1','2']],
			]
		);

		$menu_list = new \Elementor\Repeater();

		$menu_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$menu_list->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default subitle', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$menu_list->add_control(
			'subtitle_two',
			[
				'label' 		=> esc_html__('Subtitle Two', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle two', 'restan-core'),
				'default' 		=> esc_html__('Default subitle two', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$menu_list->add_control(
			'price',
			[
				'label' 		=> esc_html__('Price', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('price', 'restan-core'),
				'default' 		=> esc_html__('Default Price', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$menu_list->add_control(
			'image',
			[
				'label'			=> esc_html__('Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$menu_list->add_control(
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
			'food_menu_list',
			[
				'label' 	=> esc_html__('Food Menu List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $menu_list->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Food Menu', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition'		=> ['style'	=>	['1','2']],
				'prevent_empty' => false
			]
		);


		$layput_four_left_food_menu_list = new \Elementor\Repeater();

		$layput_four_left_food_menu_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$layput_four_left_food_menu_list->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default subitle', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$layput_four_left_food_menu_list->add_control(
			'subtitle_two',
			[
				'label' 		=> esc_html__('Subtitle Two', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle two', 'restan-core'),
				'default' 		=> esc_html__('Default subitle two', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$layput_four_left_food_menu_list->add_control(
			'price',
			[
				'label' 		=> esc_html__('Price', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('price', 'restan-core'),
				'default' 		=> esc_html__('Default Price', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$layput_four_left_food_menu_list->add_control(
			'image',
			[
				'label'			=> esc_html__('Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$layput_four_left_food_menu_list->add_control(
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
			'layput_four_left_food_menu_list',
			[
				'label' 	=> esc_html__('Food Menu Left List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $layput_four_left_food_menu_list->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Food Menu', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition'		=> ['style'	=>	['4']],
				'prevent_empty' => false
			]
		);

		$layout_four_right_food_menu_list = new \Elementor\Repeater();

		$layout_four_right_food_menu_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$layout_four_right_food_menu_list->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default subitle', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$layout_four_right_food_menu_list->add_control(
			'subtitle_two',
			[
				'label' 		=> esc_html__('Subtitle Two', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle two', 'restan-core'),
				'default' 		=> esc_html__('Default subitle two', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$layout_four_right_food_menu_list->add_control(
			'price',
			[
				'label' 		=> esc_html__('Price', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('price', 'restan-core'),
				'default' 		=> esc_html__('Default Price', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$layout_four_right_food_menu_list->add_control(
			'image',
			[
				'label'			=> esc_html__('Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$layout_four_right_food_menu_list->add_control(
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
			'layout_four_right_food_menu_list',
			[
				'label' 	=> esc_html__('Food Menu Right List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $layout_four_right_food_menu_list->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Food Menu', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition'		=> ['style'	=>	['4']],
				'prevent_empty' => false
			]
		);


		$food_menu_list_three = new \Elementor\Repeater();

		$food_menu_list_three->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$food_menu_list_three->add_control(
			'menu_item',
			[
				'label' 		=> esc_html__('Menu Item', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('menu item', 'restan-core'),
				'default' 		=> esc_html__('Default Menu Item', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$food_menu_list_three->add_control(
			'button_label',
			[
				'label' 	=> __('Button Label', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Button Label', 'restan-core'),
			]
		);

		$food_menu_list_three->add_control(
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
			]
		);

		$food_menu_list_three->add_control(
			'image',
			[
				'label'			=> esc_html__('Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'food_menu_list_three',
			[
				'label' 	=> esc_html__('Food Menu List Three', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $food_menu_list_three->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Food Menu', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition'		=> ['style'	=>	['3']],
				'prevent_empty' => false
			]
		);

		$this->add_control(
			'background_image',
			[
				'label'			=> esc_html__('Background Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition'		=> ['style'	=>	['1','3']],
			]
		);

		$this->add_control(
			'discount',
			[
				'label' 		=> esc_html__('Discount', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('discount', 'restan-core'),
				'default' 		=> esc_html__('Default Discount Price', 'restan-core'),
				'label_block' 	=> true,
				'condition'		=> ['style'	=>	['1']],
			]
		);

				$restan_food_menu_seven_left_list = new \Elementor\Repeater();

		$restan_food_menu_seven_left_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_seven_left_list->add_control(
			'badge',
			[
				'label' 		=> esc_html__('Badge', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('Badge', 'restan-core'),
				'default' 		=> esc_html__('Badge', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_seven_left_list->add_control(
			'menu_list',
			[
				'label' 		=> esc_html__('Menu List', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('Menu List', 'restan-core'),
				'default' 		=> esc_html__('Default Menu List', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_seven_left_list->add_control(
			'price',
			[
				'label' 		=> esc_html__('Price', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('price', 'restan-core'),
				'default' 		=> esc_html__('Default Price', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_seven_left_list->add_control(
			'image',
			[
				'label'			=> esc_html__('Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$restan_food_menu_seven_left_list->add_control(
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
			'restan_food_menu_seven_left_list',
			[
				'label' 	=> esc_html__('Left Food Menu List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $restan_food_menu_seven_left_list->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Food Menu', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'prevent_empty' => false,
				'condition'		=> ['style'	=>	['7']],
			]
		);


		$restan_food_menu_seven_right_list = new \Elementor\Repeater();

		$restan_food_menu_seven_right_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_seven_right_list->add_control(
			'badge',
			[
				'label' 		=> esc_html__('Badge', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('Badge', 'restan-core'),
				'default' 		=> esc_html__('Badge', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_seven_right_list->add_control(
			'menu_list',
			[
				'label' 		=> esc_html__('Menu List', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('Menu List', 'restan-core'),
				'default' 		=> esc_html__('Default Menu List', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_seven_right_list->add_control(
			'price',
			[
				'label' 		=> esc_html__('Price', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('price', 'restan-core'),
				'default' 		=> esc_html__('Default Price', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_seven_right_list->add_control(
			'image',
			[
				'label'			=> esc_html__('Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$restan_food_menu_seven_right_list->add_control(
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
			'restan_food_menu_seven_right_list',
			[
				'label' 	=> esc_html__('Right Food Menu List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $restan_food_menu_seven_right_list->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Food Menu', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'prevent_empty' => false,
				'condition'		=> ['style'	=>	['7']],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'restan_food_menu_five_top',
			[
				'label'		=> esc_html__('Food Menu List Top', 'restan-core'),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'style' => ['5']
				]
			]
		);

		$this->add_control(
			'food_menu_five_top_image',
			[
				'label'			=> esc_html__('Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
			]
		);

		$this->add_control(
			'food_menu_five_top_image_title',
			[
				'label' 		=> esc_html__('Image Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('Image Title', 'restan-core'),
				'default' 		=> esc_html__('Default Image Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'food_menu_five_meal_type_top',
			[
				'label' 		=> esc_html__('Meal Type', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '3',
				'placeholder' 	=> esc_html__('Meal Type', 'restan-core'),
				'default' 		=> esc_html__('Default Meal Type', 'restan-core'),
				'label_block' 	=> true,
				'condition'		=> ['style'	=>	['5']],
			]
		);

		$restan_food_menu_five_top_list = new \Elementor\Repeater();

		$restan_food_menu_five_top_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_five_top_list->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default subitle', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_five_top_list->add_control(
			'subtitle_two',
			[
				'label' 		=> esc_html__('Subtitle Two', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle two', 'restan-core'),
				'default' 		=> esc_html__('Default subitle two', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_five_top_list->add_control(
			'price',
			[
				'label' 		=> esc_html__('Price', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('price', 'restan-core'),
				'default' 		=> esc_html__('Default Price', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_five_top_list->add_control(
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

		$restan_food_menu_five_top_list->add_control(
			'image',
			[
				'label'			=> esc_html__('Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
			]
		);

		$this->add_control(
			'restan_food_menu_five_top_list',
			[
				'label' 	=> esc_html__('Food Menu List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $restan_food_menu_five_top_list->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Food Menu', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition'		=> ['style'	=>	['5']],
				'prevent_empty' => false
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'restan_food_menu_five_bottom',
			[
				'label'		=> esc_html__('Food Menu List Bottom', 'restan-core'),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'style' => ['5']
				]
			]
		);

		$this->add_control(
			'food_menu_five_bottom_image',
			[
				'label'			=> esc_html__('Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
			]
		);

		$this->add_control(
			'food_menu_five_bottom_image_title',
			[
				'label' 		=> esc_html__('Image Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('Image Title', 'restan-core'),
				'default' 		=> esc_html__('Default Image Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'food_menu_five_meal_type_bottom',
			[
				'label' 		=> esc_html__('Meal Type', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '3',
				'placeholder' 	=> esc_html__('Meal Type', 'restan-core'),
				'default' 		=> esc_html__('Default Meal Type', 'restan-core'),
				'label_block' 	=> true,
				'condition'		=> ['style'	=>	['5']],
			]
		);

		$restan_food_menu_five_bottom_list = new \Elementor\Repeater();

		$restan_food_menu_five_bottom_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_five_bottom_list->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default subitle', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_five_bottom_list->add_control(
			'subtitle_two',
			[
				'label' 		=> esc_html__('Subtitle Two', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle two', 'restan-core'),
				'default' 		=> esc_html__('Default subitle two', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_five_bottom_list->add_control(
			'price',
			[
				'label' 		=> esc_html__('Price', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('price', 'restan-core'),
				'default' 		=> esc_html__('Default Price', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_five_bottom_list->add_control(
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

		$restan_food_menu_five_bottom_list->add_control(
			'image',
			[
				'label'			=> esc_html__('Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
			]
		);

		$this->add_control(
			'restan_food_menu_five_bottom_list',
			[
				'label' 	=> esc_html__('Food Menu List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $restan_food_menu_five_bottom_list->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Food Menu', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition'		=> ['style'	=>	['5']],
				'prevent_empty' => false
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'restan_food_menu_six_left',
			[
				'label'		=> esc_html__('Food Menu List Left', 'restan-core'),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'style' => ['6']
				]
			]
		);

		$this->add_control(
			'layout_six_left_title',
			[
				'label' 		=> esc_html__('Section Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('Section Title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'layout_six_left_sub_title',
			[
				'label' 		=> esc_html__('Section Sub Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('Section Sub Title', 'restan-core'),
				'default' 		=> esc_html__('Default Sub Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'layout_six_left_meal_type',
			[
				'label' 		=> esc_html__('Meal Type', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '3',
				'placeholder' 	=> esc_html__('Meal Type', 'restan-core'),
				'default' 		=> esc_html__('Default Meal Type', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
		    'layout_six_left_subtitle_before_shape',
		    [
		        'label' => esc_html__('Subtitle Before Shape', 'agrofa-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .sub-title::before' => 'background-image:url({{URL}});',
		        ]
		    ]
		);

		$this->add_control(
		    'layout_six_left_subtitle_after_shape',
		    [
		        'label' => esc_html__('Subtitle After Shape', 'agrofa-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .sub-title::after' => 'background-image:url({{URL}});',
		        ]
		    ]
		);


		$restan_food_menu_six_left_list = new \Elementor\Repeater();

		$restan_food_menu_six_left_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_six_left_list->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default subitle', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_six_left_list->add_control(
			'subtitle_two',
			[
				'label' 		=> esc_html__('Subtitle Two', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle two', 'restan-core'),
				'default' 		=> esc_html__('Default subitle two', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_six_left_list->add_control(
			'price',
			[
				'label' 		=> esc_html__('Price', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('price', 'restan-core'),
				'default' 		=> esc_html__('Default Price', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_six_left_list->add_control(
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

		$restan_food_menu_six_left_list->add_control(
			'image',
			[
				'label'			=> esc_html__('Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
			]
		);

		$this->add_control(
			'restan_food_menu_six_left_list',
			[
				'label' 	=> esc_html__('Food Menu List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $restan_food_menu_six_left_list->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Food Menu', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition'		=> ['style'	=>	['6']],
				'prevent_empty' => false
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'restan_food_menu_six_right',
			[
				'label'		=> esc_html__('Food Menu List Right', 'restan-core'),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'style' => ['6']
				]
			]
		);

		$this->add_control(
			'layout_six_right_title',
			[
				'label' 		=> esc_html__('Section Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('Section Title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'layout_six_right_sub_title',
			[
				'label' 		=> esc_html__('Section Sub Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('Section Sub Title', 'restan-core'),
				'default' 		=> esc_html__('Default Sub Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'layout_six_right_meal_type',
			[
				'label' 		=> esc_html__('Meal Type', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '3',
				'placeholder' 	=> esc_html__('Meal Type', 'restan-core'),
				'default' 		=> esc_html__('Default Meal Type', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_six_right_list = new \Elementor\Repeater();

		$restan_food_menu_six_right_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_six_right_list->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default subitle', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_six_right_list->add_control(
			'subtitle_two',
			[
				'label' 		=> esc_html__('Subtitle Two', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle two', 'restan-core'),
				'default' 		=> esc_html__('Default subitle two', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_six_right_list->add_control(
			'price',
			[
				'label' 		=> esc_html__('Price', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('price', 'restan-core'),
				'default' 		=> esc_html__('Default Price', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$restan_food_menu_six_right_list->add_control(
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

		$restan_food_menu_six_right_list->add_control(
			'image',
			[
				'label'			=> esc_html__('Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
			]
		);

		$this->add_control(
			'restan_food_menu_six_right_list',
			[
				'label' 	=> esc_html__('Food Menu List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $restan_food_menu_six_right_list->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Food Menu', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition'		=> ['style'	=>	['6']],
				'prevent_empty' => false
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'food-menu-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
	?>
	<!-- Start food menu style one
	============================================= -->
	<div class="row">
        <div class="col-xl-5 thumb" style="background: url(<?php echo esc_url($settings['background_image']['url']);?>);">
            <div class="discount-badge">
                <?php echo wp_kses_post($settings['discount'], 'restan_kses_allowed_html'); ?>
            </div>
        </div>
         <div class="col-xl-7">
            <div class="info">
                <ul class="meal-type">
                   <?php echo wp_kses_post($settings['meal_type'], 'restan_kses_allowed_html'); ?>
                </ul>
                <ul class="meal-items">
                	<?php foreach ($settings['food_menu_list'] as $item) : ?>
                        <li>
                            <div class="thumbnail">
                               	<?php
									if (!empty($item['image']['url'])) :
										echo restan_img_tag(array(
											'url'   => esc_url($item['image']['url'])
										));
									endif;
								?>
                            </div>
                            <div class="content">
                                <div class="top">
                                    <div class="title">
                                        <h4><a href="<?php echo esc_url($item['url']['url']);?>"><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></a></h4>
                                    </div>
                                    <div class="price">
                                       <?php echo wp_kses_post($item['price'], 'restan_kses_allowed_html'); ?>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <div class="left">
                                        <p>
                                           <?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?>
                                        </p>
                                    </div>
                                    <div class="right">
                                        <p>
                                           <?php echo wp_kses_post($item['subtitle_two'], 'restan_kses_allowed_html'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

	<!-- End Start food menu style one -->

	<?php elseif($settings['style'] == '2'): ?>

	<!-- Start food menu style two -->

	<div class="row">
        <div class="col-lg-12">
            <div class="info">
            	<ul class="meal-type">
                    <?php echo wp_kses_post($settings['meal_type'], 'restan_kses_allowed_html'); ?>
                </ul>
                <ul class="meal-items">
					<?php foreach ($settings['food_menu_list'] as $item) : ?>
	                    <li>
	                        <div class="thumbnail">
	                           <?php
									if (!empty($item['image']['url'])) :
										echo restan_img_tag(array(
											'url'   => esc_url($item['image']['url'])
										));
									endif;
								?>
	                        </div>
	                        <div class="content">
	                            <div class="top">
	                                <div class="title">
	                                    <h4><a href="<?php echo esc_url($item['url']['url']);?>"><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></a></h4>
	                                </div>
	                                <div class="price">
	                                  <?php echo wp_kses_post($item['price'], 'restan_kses_allowed_html'); ?>
	                                </div>
	                            </div>
	                            <div class="bottom">
	                                <div class="left">
	                                    <p>
	                                        <?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?>
	                                    </p>
	                                </div>
	                                <div class="right">
	                                    <p>
	                                        <?php echo wp_kses_post($item['subtitle_two'], 'restan_kses_allowed_html'); ?>
	                                    </p>
	                                </div>
	                            </div>
	                        </div>
	                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- End Start food menu style two -->

    <?php elseif($settings['style'] == '3'): ?>

    <!-- Start Menu Type Three
    ============================================= -->
    <div class="menu-type-area overflow-hidden default-padding bg-dark bg-cover" style="background-image: url(<?php echo esc_url($settings['background_image']['url']);?>);">
        <div class="container">
            <div class="row">

            	<?php foreach ($settings['food_menu_list_three'] as $item) : ?>
	                <!-- Single Item -->
	                <div class="col-xl-4 col-md-6 menu-type-single">
	                    <div class="menu-type-item">
	                        <div class="thumb">
	                           	<?php
									if (!empty($item['image']['url'])) :
										echo restan_img_tag(array(
											'url'   => esc_url($item['image']['url'])
										));
									endif;
								?>
	                        </div>
	                        <div class="info">
	                            <h3> <?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></h3>
	                            <ul class="menu-type-list">
	                               <?php echo wp_kses_post($item['menu_item'], 'restan_kses_allowed_html'); ?>
	                            </ul>
	                            <?php if(!empty($item['button_label'])):?>
		                       		<a class="btn mt-30 circle btn-sm btn-theme effect" href="<?php echo esc_url($item['url']['url']);?>"><?php echo wp_kses_post($item['button_label'], 'restan_kses_allowed_html'); ?></a>
		                    	<?php endif;?>
	                        </div>
	                    </div>
	                </div>
	                <!-- End Single Item -->
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- End Menu Type Three -->

	<?php elseif($settings['style'] == '4'): ?>

	<!-- Start Menu Type Four
    ============================================= -->
    <div class="row">
        <div class="col-xl-6">
            <div class="food-menus-item">
                <ul class="meal-items">
					<?php foreach ($settings['layput_four_left_food_menu_list'] as $item) : ?>
	                    <li>
	                        <div class="thumbnail">
	                           	<?php
									if (!empty($item['image']['url'])) :
										echo restan_img_tag(array(
											'url'   => esc_url($item['image']['url'])
										));
									endif;
								?>
	                        </div>
	                        <div class="content">
	                            <div class="top">
	                                <div class="title">
	                                    <h4><a href="<?php echo esc_url($item['url']['url']);?>"><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?>
	                                    	</a>
	                                    </h4>
	                                </div>
	                                <div class="price">
	                                    <span> <?php echo wp_kses_post($item['price'], 'restan_kses_allowed_html'); ?></span>
	                                </div>
	                            </div>
	                            <div class="bottom">
	                                <div class="left">
	                                    <p>
	                                       <?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?>
	                                    </p>
	                                </div>
	                                <div class="right">
	                                    <p>
	                                        <?php echo wp_kses_post($item['subtitle_two'], 'restan_kses_allowed_html'); ?>
	                                    </p>
	                                </div>
	                            </div>
	                        </div>
	                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="food-menus-item">
                <ul class="meal-items">
                    <?php foreach ($settings['layout_four_right_food_menu_list'] as $item) : ?>
	                    <li>
	                        <div class="thumbnail">
	                           	<?php
									if (!empty($item['image']['url'])) :
										echo restan_img_tag(array(
											'url'   => esc_url($item['image']['url'])
										));
									endif;
								?>
	                        </div>
	                        <div class="content">
	                            <div class="top">
	                                <div class="title">
	                                    <h4><a href="<?php echo esc_url($item['url']['url']);?>"><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?>
	                                    	</a>
	                                    </h4>
	                                </div>
	                                <div class="price">
	                                    <span> <?php echo wp_kses_post($item['price'], 'restan_kses_allowed_html'); ?></span>
	                                </div>
	                            </div>
	                            <div class="bottom">
	                                <div class="left">
	                                    <p>
	                                       <?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?>
	                                    </p>
	                                </div>
	                                <div class="right">
	                                    <p>
	                                        <?php echo wp_kses_post($item['subtitle_two'], 'restan_kses_allowed_html'); ?>
	                                    </p>
	                                </div>
	                            </div>
	                        </div>
	                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Menu Type Four -->

    <?php elseif($settings['style'] == '5'): ?>

     <!-- Start Foot Menu 
    ============================================= -->
    <div class="food-menus-area default-padding">
        <div class="container">
            <!-- Tab Single Item -->
            <div class="food-menus-item">
                <div class="row">
                    <div class="col-lg-5 thumb" style="background: url(<?php echo esc_url($settings['food_menu_five_top_image']['url']);?>);">
                        <div class="discount-badge">
                            <?php echo wp_kses_post($settings['food_menu_five_top_image_title'], 'restan_kses_allowed_html'); ?>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="info">
                            <ul class="meal-type">
                                <?php echo wp_kses_post($settings['food_menu_five_meal_type_top'], 'restan_kses_allowed_html'); ?>
                            </ul>
                            <ul class="meal-items">
                            	<?php foreach ($settings['restan_food_menu_five_top_list'] as $item) : ?>
	                                <li>
	                                    <div class="thumbnail">
	                                        <?php
					                       		if (!empty($item['image']['url'])) :
													echo restan_img_tag(array(
														'url'   => esc_url($item['image']['url'])
													));
												endif;
											?>
	                                    </div>
	                                    <div class="content">
	                                        <div class="top">
	                                            <div class="title">
	                                                <h4><a href="<?php echo esc_url($item['url']['url']);?>"><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?>
	                                    				</a>
	                                    			</h4>
	                                            </div>
	                                            <div class="price">
	                                                <?php echo wp_kses_post($item['price'], 'restan_kses_allowed_html'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="bottom">
	                                            <div class="left">
	                                                <p>
	                                                    <?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?>
	                                                </p>
	                                            </div>
	                                            <div class="right">
	                                                <p>
	                                                   <?php echo wp_kses_post($item['subtitle_two'], 'restan_kses_allowed_html'); ?>
	                                                </p>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tab Single Item -->

            <!-- Tab Single Item -->
            <div class="food-menus-item">
                <div class="row">
                    <div class="col-lg-5 thumb order-lg-last" style="background: url(<?php echo esc_url($settings['food_menu_five_bottom_image']['url']);?>);">
                        <div class="discount-badge">
                            <?php echo wp_kses_post($settings['food_menu_five_bottom_image_title'], 'restan_kses_allowed_html'); ?>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="info">
                            <ul class="meal-type">
                               <?php echo wp_kses_post($settings['food_menu_five_meal_type_bottom'], 'restan_kses_allowed_html'); ?>
                            </ul>
                            <ul class="meal-items">
                            	<?php foreach ($settings['restan_food_menu_five_bottom_list'] as $item) : ?>
	                                <li>
	                                    <div class="thumbnail">
	                                        <?php
					                       		if (!empty($item['image']['url'])) :
													echo restan_img_tag(array(
														'url'   => esc_url($item['image']['url'])
													));
												endif;
											?>
	                                    </div>
	                                    <div class="content">
	                                        <div class="top">
	                                            <div class="title">
	                                                <h4>
	                                                	<a href="<?php echo esc_url($item['url']['url']);?>"><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?>
	                                    				</a>
	                                    			</h4>
	                                            </div>
	                                            <div class="price">
	                                                <?php echo wp_kses_post($item['price'], 'restan_kses_allowed_html'); ?>
	                                            </div>
	                                        </div>
	                                        <div class="bottom">
	                                            <div class="left">
	                                                <p>
	                                                   <?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?>
	                                                </p>
	                                            </div>
	                                            <div class="right">
	                                                <p>
	                                                    <?php echo wp_kses_post($item['subtitle_two'], 'restan_kses_allowed_html'); ?>
	                                                </p>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tab Single Item -->

        </div>
    </div>

    <?php elseif($settings['style'] == '6'): ?>

    <!-- Start Food Type Six
    ============================================= -->
    <div class="food-type-area default-padding">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6 pr-50 pr-md-15 pr-xs-15 mb-md-50 mb-xs-30">
                    <div class="info">
                        <div class="heading text-center">
                            <h4 class="sub-title"> <?php echo wp_kses_post($settings['layout_six_left_title'], 'restan_kses_allowed_html'); ?></h4>
                            <h2 class="title"> <?php echo wp_kses_post($settings['layout_six_left_sub_title'], 'restan_kses_allowed_html'); ?></h2>
                        </div>
                        <ul class="meal-type">
                           <?php echo wp_kses_post($settings['layout_six_left_meal_type'], 'restan_kses_allowed_html'); ?>
                        </ul>
                        <ul class="meal-items">
							<?php foreach ($settings['restan_food_menu_six_left_list'] as $item) : ?>
	                            <li>
	                                <div class="thumbnail">
	                                   <?php
				                       		if (!empty($item['image']['url'])) :
												echo restan_img_tag(array(
													'url'   => esc_url($item['image']['url'])
												));
											endif;
										?>
	                                </div>
	                                <div class="content">
	                                    <div class="top">
	                                        <div class="title">
	                                            <h4><a href="<?php echo esc_url($item['url']['url']);?>"><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?>
	                                    				</a>
	                                    		</h4>
	                                        </div>
	                                        <div class="price">
	                                            <?php echo wp_kses_post($item['price'], 'restan_kses_allowed_html'); ?>
	                                        </div>
	                                    </div>
	                                    <div class="bottom">
	                                        <div class="left">
	                                            <p>
	                                               <?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?>
	                                            </p>
	                                        </div>
	                                        <div class="right">
	                                            <p>
	                                                <?php echo wp_kses_post($item['subtitle_two'], 'restan_kses_allowed_html'); ?>
	                                            </p>
	                                        </div>
	                                    </div>
	                                </div>
	                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 pl-50 pl-md-15 pl-xs-15">
                    <div class="meal-thumb-less">
                        <div class="info">
                            <div class="heading text-center">
                                <h4 class="sub-title"> <?php echo wp_kses_post($settings['layout_six_right_title'], 'restan_kses_allowed_html'); ?></h4>
                            <h2 class="title"> <?php echo wp_kses_post($settings['layout_six_right_sub_title'], 'restan_kses_allowed_html'); ?></h2>
                            </div>
                            <ul class="meal-type">
                               <?php echo wp_kses_post($settings['layout_six_right_meal_type'], 'restan_kses_allowed_html'); ?>
                            </ul>
                            <ul class="meal-items">

                               <?php foreach ($settings['restan_food_menu_six_right_list'] as $item) : ?>
	                            <li>
	                                <div class="thumbnail">
	                                   <?php
				                       		if (!empty($item['image']['url'])) :
												echo restan_img_tag(array(
													'url'   => esc_url($item['image']['url'])
												));
											endif;
										?>
	                                </div>
	                                <div class="content">
	                                    <div class="top">
	                                        <div class="title">
	                                            <h4><a href="<?php echo esc_url($item['url']['url']);?>"><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?>
	                                    				</a>
	                                    		</h4>
	                                        </div>
	                                        <div class="price">
	                                            <?php echo wp_kses_post($item['price'], 'restan_kses_allowed_html'); ?>
	                                        </div>
	                                    </div>
	                                    <div class="bottom">
	                                        <div class="left">
	                                            <p>
	                                               <?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?>
	                                            </p>
	                                        </div>
	                                        <div class="right">
	                                            <p>
	                                                <?php echo wp_kses_post($item['subtitle_two'], 'restan_kses_allowed_html'); ?>
	                                            </p>
	                                        </div>
	                                    </div>
	                                </div>
	                            </li>
                            <?php endforeach; ?>
                               
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Food Type Six -->

    <?php elseif($settings['style'] == '7'): ?>

    <!-- Start Food Type Seven -->
     <div class="food-menu-style-three-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="site-heading text-center">
                        <h4 class="sub-title"><?php echo wp_kses_post($settings['sec_subtitle'], 'restan_kses_allowed_html'); ?></h4>
                        <h2 class="title"><?php echo wp_kses_post($settings['sec_title'], 'restan_kses_allowed_html'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row gutter-none">
                <div class="col-xl-6">
                    <ul class="meal-items-three">
                    	<?php foreach ($settings['restan_food_menu_seven_left_list'] as $item) : ?>
	                        <li>
	                            <div class="thumbnail">
	                               	<?php
			                       		if (!empty($item['image']['url'])) :
											echo restan_img_tag(array(
												'url'   => esc_url($item['image']['url'])
											));
										endif;
									?>
	                            </div>
	                            <div class="content">
	                                <div class="left">
	                                    <h4>
	                                        <a href="<?php echo esc_url($item['url']['url']);?>"> <?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></a>
	                                        <?php if(!empty($item['badge'])):?>
	                                        <span class="badge"> <?php echo wp_kses_post($item['badge'], 'restan_kses_allowed_html'); ?></span>
	                                        <?php endif;?>	
	                                    </h4>
	                                    <p>
	                                        <?php echo wp_kses_post($item['menu_list'], 'restan_kses_allowed_html'); ?>
	                                    </p>
	                                </div>
	                                <div class="right">
	                                    <h3> <?php echo wp_kses_post($item['price'], 'restan_kses_allowed_html'); ?></h3>
	                                </div>
	                            </div>
	                        </li>
                       	<?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-xl-6">
                    <ul class="meal-items-three">
                        <?php foreach ($settings['restan_food_menu_seven_right_list'] as $item) : ?>
	                        <li>
	                            <div class="thumbnail">
	                               	<?php
			                       		if (!empty($item['image']['url'])) :
											echo restan_img_tag(array(
												'url'   => esc_url($item['image']['url'])
											));
										endif;
									?>
	                            </div>
	                            <div class="content">
	                                <div class="left">
	                                    <h4>
	                                        <a href="<?php echo esc_url($item['url']['url']);?>"> <?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></a>
	                                        <?php if(!empty($item['badge'])):?>
	                                        <span class="badge"> <?php echo wp_kses_post($item['badge'], 'restan_kses_allowed_html'); ?></span>
	                                        <?php endif;?>	
	                                    </h4>
	                                    <p>
	                                        <?php echo wp_kses_post($item['menu_list'], 'restan_kses_allowed_html'); ?>
	                                    </p>
	                                </div>
	                                <div class="right">
	                                    <h3> <?php echo wp_kses_post($item['price'], 'restan_kses_allowed_html'); ?></h3>
	                                </div>
	                            </div>
	                        </li>
                       	<?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>	
    <!-- End Food Type Seven -->

	<?php
		endif;
	}
}
