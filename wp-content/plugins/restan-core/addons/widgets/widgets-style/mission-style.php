<?php

$this->start_controls_section(
	'mission_style_option',
	[
		'label'			=> esc_html__('Content Style', 'restan-core'),
		'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
	]
);

$this->add_control(
	'heading_option',
	[
		'label' 		=> esc_html__('Heading Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'heading_color',
	[
		'label' 		=> esc_html__('Heading Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .title' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'heading_typography',
		'label' 		=> esc_html__('Heading Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .title',
	]
);

$this->add_control(
	'title_option',
	[
		'label' 		=> esc_html__('Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'title_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .mission-tab-content h2' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .mission-tab-content h2',
	]
);

$this->add_control(
	'subtitle_option',
	[
		'label' 		=> esc_html__('SubTitle Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'subtitle_color',
	[
		'label' 		=> esc_html__('SubTitle Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .mission-tab-content p' => 'color: {{VALUE}}',
		]
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'subtitle_typography',
		'label' 		=> esc_html__('SubTitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .mission-tab-content p',
	]
);

$this->add_control(
	'content_option',
	[
		'label' 		=> esc_html__('Content Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'content_color',
	[
		'label' 		=> esc_html__('Content Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .mission-tab-content ul li' => 'color: {{VALUE}}',
		]
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_typography',
		'label' 		=> esc_html__('Content Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .mission-tab-content ul li',
	]
);

$this->add_control(
	'accordian_title_option',
	[
		'label' 		=> esc_html__('Accordian Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'accordian_title_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .faq-style-one button.accordion-button' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'accordian_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .faq-style-one button.accordion-button',
	]
);

$this->add_control(
	'accordian_subtitle_option',
	[
		'label' 		=> esc_html__('Accordian SubTitle Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'accordian_subtitle_color',
	[
		'label' 		=> esc_html__('SubTitle Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .faq-style-one .accordion-body p' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'accordian_subtitle_typography',
		'label' 		=> esc_html__('SubTitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .faq-style-one .accordion-body p',
	]
);

$this->end_controls_section();
