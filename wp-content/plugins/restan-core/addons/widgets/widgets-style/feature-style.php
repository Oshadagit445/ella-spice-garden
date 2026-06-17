<?php

$this->start_controls_section(
	'funfact_style',
	[
		'label'			=> esc_html__('Style', 'restan-core'),
		'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
	]
);

$this->add_control(
	'form_title_option',
	[
		'label' 		=> esc_html__('Form Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'condition'		=> ['style'	=>	['1','2']],
		'separator' 	=> 'before',
	]
);

$this->add_control(
	'form_title_color',
	[
		'label' 		=> esc_html__('Form Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'condition'		=> ['style'	=>	['1','2']],
		'selectors' => [
			'{{WRAPPER}} .title,{{WRAPPER}} .reservation-form.light h3' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'form_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .title,{{WRAPPER}} .reservation-form.light h3',
		'condition'		=> ['style'	=>	['1','2']],
	]
);

$this->add_control(
	'category_title_option',
	[
		'label' 		=> esc_html__('Category Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'condition'		=> ['style'	=>	['2']],
		'separator' 	=> 'before',
	]
);

$this->add_control(
	'category_title_color',
	[
		'label' 		=> esc_html__('Category Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'condition'		=> ['style'	=>	['2']],
		'selectors' => [
			'{{WRAPPER}} h2.flex-title' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'category_title_typography',
		'label' 		=> esc_html__('Category Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} h2.flex-title',
		'condition'		=> ['style'	=>	['2']],
	]
);

$this->add_control(
	'date_option',
	[
		'label' 		=> esc_html__('Date Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition'		=> ['style'	=>	['1']],
	]
);

$this->add_control(
	'date_color',
	[
		'label' 		=> esc_html__('Date Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .opening-hours-hightlight ul li span' => 'color: {{VALUE}}',
		],
		'condition'		=> ['style'	=>	['1']],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'date_typography',
		'label' 		=> esc_html__('Date Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .opening-hours-hightlight ul li span',
		'condition'		=> ['style'	=>	['1']],
	]
);

$this->add_control(
	'time_option',
	[
		'label' 		=> esc_html__('Time Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition'		=> ['style'	=>	['1']],
	]
);

$this->add_control(
	'time_color',
	[
		'label' 		=> esc_html__('Time Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .opening-hours-hightlight ul li .pull-right' => 'color: {{VALUE}}',
		],
		'condition'		=> ['style'	=>	['1']],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'time_typography',
		'label' 		=> esc_html__('Time Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .opening-hours-hightlight ul li .pull-right',
		'condition'		=> ['style'	=>	['1']],
	]
);

$this->add_control(
	'section_button_option',
	[
		'label' 		=> esc_html__('Button Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1','2']
		]
	]
);
$this->add_control(
	'section_button_color',
	[
		'label' 		=> esc_html__('Button Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .top-feature-style-one-area button,{{WRAPPER}} .feature-style-three-area button' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1','2']
		]
	]
);

$this->add_control(
	'section_button_bg_color',
	[
		'label' 		=> esc_html__('Button Background Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .top-feature-style-one-area button,{{WRAPPER}} .feature-style-three-area button' => 'background-color: {{VALUE}} !important',
		],
		'condition' => [
			'style' => ['1','2']
		]
	]
);

$this->add_control(
	'section_button_hover_color',
	[
		'label' 		=> esc_html__('Button Hover Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .top-feature-style-one-area button::after,{{WRAPPER}} .feature-style-three-area button::after' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1','2']
		]
	]
);

$this->add_control(
	'section_button_hover_bg_color',
	[
		'label' 		=> esc_html__('Button Hover Background Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .top-feature-style-one-area button::after,{{WRAPPER}} .feature-style-three-area button::after' => 'background-color: {{VALUE}} !important',
		],
		'condition' => [
			'style' => ['1','2']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_button_typography',
		'label' 		=> esc_html__('Button Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .top-feature-style-one-area button,{{WRAPPER}} .feature-style-three-area button',
		'condition' => [
			'style' => ['1','2']
		]
	]
);

$this->add_control(
	'category_list_title_option',
	[
		'label' 		=> esc_html__('Category List Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'condition'		=> ['style'	=>	['2']],
		'separator' 	=> 'before',
	]
);

$this->add_control(
	'category_list_title_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'condition'		=> ['style'	=>	['2']],
		'selectors' => [
			'{{WRAPPER}} .food-cat-carousel .overlay h5' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'category_list_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .food-cat-carousel .overlay h5',
		'condition'		=> ['style'	=>	['2']],
	]
);

$this->add_control(
	'category_list_sub_title_option',
	[
		'label' 		=> esc_html__('Category List Sub-Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'condition'		=> ['style'	=>	['2']],
		'separator' 	=> 'before',
	]
);

$this->add_control(
	'category_list_sub_title_color',
	[
		'label' 		=> esc_html__('Sub-Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'condition'		=> ['style'	=>	['2']],
		'selectors' => [
			'{{WRAPPER}} .food-cat-carousel .overlay span' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'category_listsub_title_typography',
		'label' 		=> esc_html__('Sub-Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .food-cat-carousel .overlay span',
		'condition'		=> ['style'	=>	['2']],
	]
);
$this->end_controls_section();
