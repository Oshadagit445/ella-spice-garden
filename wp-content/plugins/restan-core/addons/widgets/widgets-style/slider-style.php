<?php

$this->start_controls_section(
	'banner_section_style_option',
	[
		'label' => esc_html__('Banner Section Style', 'restan-core'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	]
);

$this->add_control(
	'section_title_option',
	[
		'label' => esc_html__('Title Options', 'restan-core'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
		'condition' => [
			'slider_style' => ['1', '2', '3', '4','5'],
		],
	]
);
$this->add_control(
	'section_title_color',
	[
		'label' => esc_html__('Title Color', 'restan-core'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .banner-style-one h2,{{WRAPPER}} .banner-style-two h2,{{WRAPPER}} .banner-style-three-content h2,{{WRAPPER}} .banner-style-four-content h2,{{WRAPPER}} .banner-style-five h1' => 'color: {{VALUE}}',
		],
		'condition' => [
			'slider_style' => ['1', '2', '3', '4','5'],
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' => 'heading_title_typography',
		'label' => esc_html__('Title Typography', 'restan-core'),
		'selector' => '{{WRAPPER}} .banner-style-one h2,{{WRAPPER}} .banner-style-two h2,{{WRAPPER}} .banner-style-three-content h2,{{WRAPPER}} .banner-style-four-content h2,{{WRAPPER}} .banner-style-five h1',
		'condition' => [
			'slider_style' => ['1', '2', '3', '4','5'],
		],
	]
);

$this->add_control(
	'rounded_title_option',
	[
		'label' => esc_html__('Rounded Title Options', 'restan-core'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
		'condition' => [
			'slider_style' => ['4'],
		],
	]
);
$this->add_control(
	'rounded_title_color',
	[
		'label' => esc_html__('Rounded Title Color', 'restan-core'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .curve-text' => 'color: {{VALUE}}',
		],
		'condition' => [
			'slider_style' => ['4'],
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' => 'rounded_title_typography',
		'label' => esc_html__('Rounded Title Typography', 'restan-core'),
		'selector' => '{{WRAPPER}} .curve-text',
		'condition' => [
			'slider_style' => ['4'],
		],
	]
);

$this->add_control(
	'section_subtitle_option',
	[
		'label' => esc_html__('Sub-Title Options', 'restan-core'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
		'condition' => [
			'slider_style' => ['1', '2', '3','4'],
		],
	]
);

$this->add_control(
	'section_subtitle_color',
	[
		'label' => esc_html__('Subtitle Color', 'restan-core'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .banner-style-one h4,{{WRAPPER}} .banner-style-two h4,{{WRAPPER}}  ul.list-quality li,{{WRAPPER}} .banner-style-five h3' => 'color: {{VALUE}}',
		],
		'condition' => [
			'slider_style' => ['1', '2', '3','4'],
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' => 'section_subtitle_typography',
		'label' => esc_html__('Subtitle Typography', 'restan-core'),
		'selector' => '{{WRAPPER}} .banner-style-one h4,{{WRAPPER}} .banner-style-two h4,{{WRAPPER}}  ul.list-quality li,{{WRAPPER}} .banner-style-five h3',
		'condition' => [
			'slider_style' => ['1', '2', '3','4'],
		],
	]
);

$this->add_control(
	'section_summary_option',
	[
		'label' => esc_html__('Summary Options', 'restan-core'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
		'condition' => [
			'slider_style' => ['1', '2'],
		],
	]
);
$this->add_control(
	'section_summary_color',
	[
		'label' => esc_html__('Summary Color', 'restan-core'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .banner-style-one p,{{WRAPPER}} .banner-style-two p' => 'color: {{VALUE}}',
		],
		'condition' => [
			'slider_style' => ['1', '2'],
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' => 'section_summary_typography',
		'label' => esc_html__('Summary Typography', 'restan-core'),
		'selector' => '{{WRAPPER}} .banner-style-one p{{WRAPPER}} .banner-style-two p',
		'condition' => [
			'slider_style' => ['1', '2'],
		],
	]
);

$this->add_control(
	'section_bottom_text_option',
	[
		'label' => esc_html__('Bottom Text Options', 'restan-core'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
		'condition' => [
			'slider_style' => ['5'],
		],
	]
);
$this->add_control(
	'section_bottom_text_color',
	[
		'label' => esc_html__('Bottom Text Color', 'restan-core'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .banner-style-five .info p' => 'color: {{VALUE}}',
		],
		'condition' => [
			'slider_style' => ['5'],
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' => 'section_bottom_text_typography',
		'label' => esc_html__('Bottom Text Typography', 'restan-core'),
		'selector' => '{{WRAPPER}} .banner-style-five .info p',
		'condition' => [
			'slider_style' => ['5'],
		],
	]
);

$this->add_control(
	'section_button_option',
	[
		'label' => esc_html__('Button Options', 'restan-core'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
		'condition' => [
			'slider_style' => ['1', '2'],
		],
	]
);
$this->add_control(
	'section_button_color',
	[
		'label' => esc_html__('Button Color', 'restan-core'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .btn.btn-theme' => 'color: {{VALUE}}',
		],
		'condition' => [
			'slider_style' => ['1', '2'],
		],
	]
);

$this->add_control(
	'section_button_bg_color',
	[
		'label' => esc_html__('Button Background Color', 'restan-core'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .btn.btn-theme::after' => 'background-color: {{VALUE}}',
		],
		'condition' => [
			'slider_style' => ['1', '2'],
		],
	]
);

$this->add_control(
	'section_button_hover_color',
	[
		'label' => esc_html__('Button Hover Color', 'restan-core'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .btn.btn-theme::after' => 'color: {{VALUE}}',
		],
		'condition' => [
			'slider_style' => ['1', '2'],
		],
	]
);

$this->add_control(
	'section_button_hover_bg_color',
	[
		'label' => esc_html__('Button Background Color', 'restan-core'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .btn.btn-theme::after' => 'background-color: {{VALUE}}',
		],
		'condition' => [
			'slider_style' => ['1', '2'],
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' => 'section_button_typography',
		'label' => esc_html__('Button Typography', 'restan-core'),
		'selector' => '{{WRAPPER}} .btn.btn-theme',
		'condition' => [
			'slider_style' => ['1', '2'],
		],
	]
);

$this->end_controls_section();
