<?php

$this->start_controls_section(
	'category_section_style_option',
	[
		'label'			=> esc_html__('Category Section Style', 'restan-core'),
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
			'{{WRAPPER}} .sub-title' => 'color: {{VALUE}}',
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
		'selector' 		=> '{{WRAPPER}} .sub-title',
		'condition' => [
			'style' => ['1']
		]
	]
);


$this->add_control(
	'content_title_option',
	[
		'label' 		=> esc_html__('Content Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1']
		]
	]
);
$this->add_control(
	'content_title_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .info h4 a' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .info h4 a',
		'condition' => [
			'style' => ['1']
		]
	]
);

$this->add_control(
	'content_sub_title_option',
	[
		'label' 		=> esc_html__('Content Sub Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1']
		]
	]
);
$this->add_control(
	'content_sub_title_color',
	[
		'label' 		=> esc_html__('Sub Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .info p' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_sub_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .info p',
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
			'{{WRAPPER}} a.btn-read-more' => 'color: {{VALUE}}',
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
		'selector' 		=> '{{WRAPPER}} a.btn-read-more',
		'condition' => [
			'style' => ['1']
		]
	]
);

$this->end_controls_section();
