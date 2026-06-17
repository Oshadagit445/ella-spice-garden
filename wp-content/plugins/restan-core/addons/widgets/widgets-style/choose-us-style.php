<?php

$this->start_controls_section(
	'choose_style_option',
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
			'{{WRAPPER}} .choose-us-style-two-info .title' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => '2'
		]
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .choose-us-style-two-info .title',
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
			'{{WRAPPER}} .choose-us-style-one-one-area h4,{{WRAPPER}} .feature-style-two h4' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .choose-us-style-one-one-area h4,{{WRAPPER}} .feature-style-two h4',
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
			'{{WRAPPER}} .choose-us-style-one-one-area p,{{WRAPPER}} .feature-style-two p' => 'color: {{VALUE}}',
		]
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'subtitle_typography',
		'label' 		=> esc_html__('SubTitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .choose-us-style-one-one-area p,{{WRAPPER}} .feature-style-two p',
	]
);

$this->add_control(
	'funfact_title_option',
	[
		'label' 		=> esc_html__('Funfact Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => '2'
		]
	]
);
$this->add_control(
	'funfact_title_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .fun-fact-list .fun-fact span.medium' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => '2'
		]
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'funfact_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .fun-fact-list .fun-fact span.medium',
		'condition' => [
			'style' => '2'
		]
	]
);


$this->add_control(
	'funfact_number_option',
	[
		'label' 		=> esc_html__('Funfact Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => '2'
		]
	]
);
$this->add_control(
	'funfact_number_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .fun-fact-list .fun-fact .counter' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => '2'
		]
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'funfact_number_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .fun-fact-list .fun-fact .counter',
		'condition' => [
			'style' => '2'
		]
	]
);

$this->end_controls_section();
