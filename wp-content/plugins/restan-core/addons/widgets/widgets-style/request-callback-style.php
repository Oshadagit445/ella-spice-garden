<?php

$this->start_controls_section(
	'request_callback_section_style_option',
	[
		'label'			=> esc_html__('Section Style', 'restan-core'),
		'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
	]
);

$this->add_control(
	'section_heading_option',
	[
		'label' 		=> esc_html__('Section Heading Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'section_heading_color',
	[
		'label' 		=> esc_html__('Heading Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .text-light h2' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_heading_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .text-light h2',
	]
);


$this->add_control(
	'section_text_button_option',
	[
		'label' 		=> esc_html__('Section Button Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);

$this->add_control(
	'section_text_button_color',
	[
		'label' 		=> esc_html__('Button Text Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn.btn-light,{{WRAPPER}} form.seo-form button' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_button_text_typography',
		'label' 		=> esc_html__('Button Text Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .btn.btn-light,{{WRAPPER}} form.seo-form button',
	]
);

$this->add_control(
	'section_button_bg_color',
	[
		'label' 		=> esc_html__('Button Bg Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn.btn-light,{{WRAPPER}} form.seo-form button' => 'background: {{VALUE}}',
		],
	]
);

$this->add_control(
	'request_title_option',
	[
		'label' 		=> esc_html__('Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'request_title_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .achivement-counter .fun-fact .medium' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'request_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .achivement-counter .fun-fact .medium',
	]
);


$this->add_control(
	'request_number_option',
	[
		'label' 		=> esc_html__('Number Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'request_number_color',
	[
		'label' 		=> esc_html__('Number Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .achivement-counter .fun-fact .counter' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'request_number_typography',
		'label' 		=> esc_html__('Number Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .achivement-counter .fun-fact .counter',
	]
);

$this->end_controls_section();
