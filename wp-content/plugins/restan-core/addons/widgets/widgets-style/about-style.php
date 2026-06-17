<?php

$this->start_controls_section(
	'about_section_style_option',
	[
		'label'			=> esc_html__('About Section Style', 'restan-core'),
		'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
	]
);

$this->add_control(
	'section_title_option',
	[
		'label' 		=> esc_html__('Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1','2','3','4']
		]
	]
);
$this->add_control(
	'section_title_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .title' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1','2','3','4']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'heading_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .title',
		'condition' => [
			'style' => ['1','2','3','4']
		]
	]
);

$this->add_control(
	'section_subtitle_option',
	[
		'label' 		=> esc_html__('Sub-Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1','2','3']
		]
	]
);
$this->add_control(
	'section_subtitle_color',
	[
		'label' 		=> esc_html__('Subtitle Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .sub-heading' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1','2','3']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_subtitle_typography',
		'label' 		=> esc_html__('Subtitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .sub-heading',
		'condition' => [
			'style' => ['1','2','3']
		]
	]
);


$this->add_control(
	'section_summary_option',
	[
		'label' 		=> esc_html__('Summary Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1','2','3','4']
		]
	]
);
$this->add_control(
	'section_summary_color',
	[
		'label' 		=> esc_html__('Summary Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .about-style-one-info p,{{WRAPPER}} .about-style-three-area p,{{WRAPPER}} .about-style-five-area p' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1','2','3','4']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_summary_typography',
		'label' 		=> esc_html__('Summary Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .about-style-one-info p,{{WRAPPER}} .about-style-three-area p,{{WRAPPER}} .about-style-five-area p',
		'condition' => [
			'style' => ['1','2','3','4']
		]
	]
);

$this->add_control(
	'meal_list_title_option',
	[
		'label' 		=> esc_html__('Meal List Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['4']
		]
	]
);
$this->add_control(
	'meal_list_title_color',
	[
		'label' 		=> esc_html__('Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} ul.card-info h5' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['4']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'meal_list_title_typography',
		'label' 		=> esc_html__('Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} ul.card-info h5',
		'condition' => [
			'style' => ['4']
		]
	]
);

$this->add_control(
	'meal_list_subtitle_option',
	[
		'label' 		=> esc_html__('Meal List Sub Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['4']
		]
	]
);
$this->add_control(
	'meal_list_sub_title_color',
	[
		'label' 		=> esc_html__('Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} ul.card-info p' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['4']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'meal_list_sub_title_typography',
		'label' 		=> esc_html__('Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} ul.card-info p',
		'condition' => [
			'style' => ['4']
		]
	]
);

$this->add_control(
	'section_button_option',
	[
		'label' 		=> esc_html__('Button Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1','2','3','4']
		]
	]
);
$this->add_control(
	'section_button_color',
	[
		'label' 		=> esc_html__('Button Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn.btn-theme' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1','2','3','4']
		]
	]
);

$this->add_control(
	'section_button_bg_color',
	[
		'label' 		=> esc_html__('Button Background Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn.btn-theme' => 'background-color: {{VALUE}} !important',
		],
		'condition' => [
			'style' => ['1','2','3','4']
		]
	]
);

$this->add_control(
	'section_button_hover_color',
	[
		'label' 		=> esc_html__('Button Hover Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn.btn-theme::after' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1','2','3','4']
		]
	]
);

$this->add_control(
	'section_button_hover_bg_color',
	[
		'label' 		=> esc_html__('Button Hover Background Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn.btn-theme::after' => 'background-color: {{VALUE}} !important',
		],
		'condition' => [
			'style' => ['1','2','3','4']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_button_typography',
		'label' 		=> esc_html__('Button Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .color-style-two .btn.btn-theme',
		'condition' => [
			'style' => ['1','2','3','4']
		]
	]
);


$this->add_control(
	'author_title_option',
	[
		'label' 		=> esc_html__('Author Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['2','3']
		]
	]
);
$this->add_control(
	'author_title_color',
	[
		'label' 		=> esc_html__('Author Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .author-info p,{{WRAPPER}} .site-owner h4' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['2','3']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'author_title_typography',
		'label' 		=> esc_html__('Author Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .author-info p,{{WRAPPER}} .site-owner h4',
		'condition' => [
			'style' => ['2','3']
		]
	]
);

$this->end_controls_section();
