<?php

$this->start_controls_section(
	'service_style_option',
	[
		'label'			=> esc_html__('Content Style', 'restan-core'),
		'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
	]
);

$this->add_control(
	'section_title_option',
	[
		'label' 		=> esc_html__('Section Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
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
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .title',
	]
);

$this->add_control(
	'subtitle_option',
	[
		'label' 		=> esc_html__('Section SubTitle Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'section_subtitle_color',
	[
		'label' 		=> esc_html__('SubTitle Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .sub-heading' => 'color: {{VALUE}}',
		]
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_subtitle_typography',
		'label' 		=> esc_html__('SubTitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .sub-heading',
	]
);

$this->add_control(
	'service_title_option',
	[
		'label' 		=> esc_html__('Service Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'service_title_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .services-style-one .thumb h4 a' => 'color: {{VALUE}}',
		]
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'service_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .services-style-one .thumb h4 a',
	]
);

$this->add_control(
	'service_sub_title_option',
	[
		'label' 		=> esc_html__('Service Sub Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'service_sub_title_color',
	[
		'label' 		=> esc_html__('Sub Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .services-style-one p' => 'color: {{VALUE}}',
		]
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'service_sub_title_typography',
		'label' 		=> esc_html__('Sub Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .services-style-one p',
	]
);

$this->add_control(
	'service_button_option',
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
	'service_button_color',
	[
		'label' 		=> esc_html__('Button Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn.btn-light' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1']
		]
	]
);

$this->add_control(
	'service_button_bg_color',
	[
		'label' 		=> esc_html__('Button Background Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn.btn-light' => 'background-color: {{VALUE}} !important',
		],
		'condition' => [
			'style' => ['1']
		]
	]
);

$this->add_control(
	'service_button_hover_color',
	[
		'label' 		=> esc_html__('Button Hover Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn.btn-light::after' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1']
		]
	]
);

$this->add_control(
	'service_button_hover_bg_color',
	[
		'label' 		=> esc_html__('Button Hover Background Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn.btn-light::after' => 'background-color: {{VALUE}} !important',
		],
		'condition' => [
			'style' => ['1']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'service_button_typography',
		'label' 		=> esc_html__('Button Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .btn.btn-light',
		'condition' => [
			'style' => ['1']
		]
	]
);



$this->end_controls_section();
