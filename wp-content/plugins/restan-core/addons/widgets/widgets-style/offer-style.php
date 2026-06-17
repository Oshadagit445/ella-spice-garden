<?php

$this->start_controls_section(
	'offer_section_style_option',
	[
		'label'			=> esc_html__('Offer Section Style', 'restan-core'),
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
			'style' => ['1']
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
			'style' => ['1']
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
			'style' => ['1']
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
			'style' => ['1']
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
			'style' => ['1']
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
			'style' => ['1']
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
			'style' => ['1']
		]
	]
);
$this->add_control(
	'section_summary_color',
	[
		'label' 		=> esc_html__('Summary Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .about-style-one-info p,{{WRAPPER}} .about-style-three-area p' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_summary_typography',
		'label' 		=> esc_html__('Summary Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .about-style-one-info p,{{WRAPPER}} .about-style-three-area p',
		'condition' => [
			'style' => ['1']
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
			'style' => ['1']
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
			'style' => ['1']
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
			'style' => ['1']
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
			'style' => ['1']
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
			'style' => ['1']
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
			'style' => ['1']
		]
	]
);


$this->add_control(
	'offer_title_option',
	[
		'label' 		=> esc_html__('Offer Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1']
		]
	]
);
$this->add_control(
	'offer_title_color',
	[
		'label' 		=> esc_html__('Offer Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .food-quick-info a' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'offer_title_typography',
		'label' 		=> esc_html__('Offer Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .food-quick-info a',
		'condition' => [
			'style' => ['1']
		]
	]
);


$this->add_control(
	'offer_list_option',
	[
		'label' 		=> esc_html__('Offer List Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1']
		]
	]
);
$this->add_control(
	'offer_list_color',
	[
		'label' 		=> esc_html__('Offer List Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .food-quick-info ul li' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'offer_list_typography',
		'label' 		=> esc_html__('Offer List Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .food-quick-info ul li',
		'condition' => [
			'style' => ['1']
		]
	]
);


$this->end_controls_section();
