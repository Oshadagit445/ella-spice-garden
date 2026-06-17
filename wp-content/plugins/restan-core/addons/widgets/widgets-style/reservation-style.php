<?php

$this->start_controls_section(
	'reservation_section_style_option',
	[
		'label'			=> esc_html__('Section Style', 'restan-core'),
		'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
	]
);

$this->add_control(
	'section_title_option',
	[
		'label' 		=> esc_html__('Section Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1','2']
		]
	]
);
$this->add_control(
	'section_title_color',
	[
		'label' 		=> esc_html__('Section Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .title' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1','2']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'heading_title_typography',
		'label' 		=> esc_html__('Section Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .title',
		'condition' => [
			'style' => ['1','2']
		]
	]
);

$this->add_control(
	'section_subtitle_option',
	[
		'label' 		=> esc_html__('Section Sub-Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1','2']
		]
	]
);
$this->add_control(
	'section_subtitle_color',
	[
		'label' 		=> esc_html__('Section Subtitle Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .sub-heading' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1','2']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_subtitle_typography',
		'label' 		=> esc_html__('Section Subtitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .sub-heading',
		'condition' => [
			'style' => ['1','2']
		]
	]
);

$this->add_control(
	'section_summary_option',
	[
		'label' 		=> esc_html__('Section Summary Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1','2']
		]
	]
);
$this->add_control(
	'section_summary_color',
	[
		'label' 		=> esc_html__('Section Summary Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .reservation-info p' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1','2']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_summary_typography',
		'label' 		=> esc_html__('Section Summary Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .reservation-info p',
		'condition' => [
			'style' => ['1','2']
		]
	]
);

$this->add_control(
	'content_title_option',
	[
		'label' 		=> esc_html__('Menu Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1','2']
		]
	]
);
$this->add_control(
	'content_title_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .reservation-time li h4' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1','2']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_title_typography',
		'label' 		=> esc_html__('Content Subtitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .reservation-time li h4',
		'condition' => [
			'style' => ['1','2']
		]
	]
);

$this->add_control(
	'content_subtitle_option',
	[
		'label' 		=> esc_html__('Menu Sub-Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1','2']
		]
	]
);
$this->add_control(
	'content_subtitle_color',
	[
		'label' 		=> esc_html__('Subtitle Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .reservation-time li p' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1','2']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_subtitle_typography',
		'label' 		=> esc_html__('Subtitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .reservation-time li p',
		'condition' => [
			'style' => ['1','2']
		]
	]
);

$this->end_controls_section();