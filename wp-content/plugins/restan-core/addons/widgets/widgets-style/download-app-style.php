<?php

$this->start_controls_section(
	'download_app_section_style_option',
	[
		'label'			=> esc_html__('Content Style', 'restan-core'),
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
			'{{WRAPPER}} .bg-dark .title' => 'color: {{VALUE}} !important',
		],
		'condition' => [
			'style' => ['1']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .bg-dark .title',
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
			'{{WRAPPER}} .bg-dark p' => 'color: {{VALUE}}',
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
		'selector' 		=> '{{WRAPPER}} .bg-dark p',
		'condition' => [
			'style' => ['1']
		]
	]
);


$this->add_control(
	'section_button_one_option',
	[
		'label' 		=> esc_html__('Button One Options', 'restan-core'),
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
			'{{WRAPPER}} .btn.btn-light' => 'color: {{VALUE}}',
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
			'{{WRAPPER}} .btn.btn-light' => 'background-color: {{VALUE}} !important',
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
			'{{WRAPPER}} .btn.btn-light' => 'color: {{VALUE}}',
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
		'name' 			=> 'section_button_typography',
		'label' 		=> esc_html__('Button Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .btn.btn-light',
		'condition' => [
			'style' => ['1']
		]
	]
);

$this->add_control(
	'section_button_two_option',
	[
		'label' 		=> esc_html__('Button Two Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1']
		]
	]
);

$this->add_control(
	'section_button_two_color',
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
	'section_button_two_bg_color',
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
	'section_button_two_hover_color',
	[
		'label' 		=> esc_html__('Button Hover Color', 'restan-core'),
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
	'section_button_two_hover_bg_color',
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
		'name' 			=> 'section_button_two_typography',
		'label' 		=> esc_html__('Button Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .btn.btn-theme',
		'condition' => [
			'style' => ['1']
		]
	]
);

$this->end_controls_section();