<?php

$this->start_controls_section(
	'service_cta_style_option',
	[
		'label'			=> esc_html__('Content Style', 'restan-core'),
		'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
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
			'{{WRAPPER}} .quick-contact-widget .content h3' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .quick-contact-widget .content h3',
	]
);

$this->add_control(
	'subtitle_option',
	[
		'label' 		=> esc_html__('Sub-Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'subtitle_color',
	[
		'label' 		=> esc_html__('Subtitle Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .quick-contact-widget .content p' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'subtitle_typography',
		'label' 		=> esc_html__('Subtitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .quick-contact-widget .content p',
	]
);


$this->add_control(
	'number_option',
	[
		'label' 		=> esc_html__('Number Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'number_color',
	[
		'label' 		=> esc_html__('Number Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .quick-contact-widget h2' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'number_typography',
		'label' 		=> esc_html__('Number Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .quick-contact-widget h2',
	]
);

$this->end_controls_section();
