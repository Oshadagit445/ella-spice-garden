<?php

$this->start_controls_section(
	'funfact_style',
	[
		'label'			=> esc_html__('Style', 'restan-core'),
		'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
	]
);

$this->add_control(
	'funfact_title_option',
	[
		'label' 		=> esc_html__('Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);

$this->add_control(
	'funfact_title_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .fun-facts-area .medium' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'funfact_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .fun-facts-area .medium',
	]
);

$this->add_control(
	'funfact_number_option',
	[
		'label' 		=> esc_html__('Number Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);

$this->add_control(
	'funfact_number_color',
	[
		'label' 		=> esc_html__('Number Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .fun-facts-area .timer' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'funfact_number_typography',
		'label' 		=> esc_html__('Number Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .fun-facts-area .timer',
	]
);

$this->end_controls_section();
