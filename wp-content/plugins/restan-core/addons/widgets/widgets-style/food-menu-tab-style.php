<?php

$this->start_controls_section(
	'content_style',
	[
		'label'			=> esc_html__('Style', 'restan-core'),
		'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
	]
);

$this->add_control(
	'title_option',
	[
		'label' 		=> esc_html__('Section Title Options', 'restan-core'),
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
			'{{WRAPPER}} .site-heading .title' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .site-heading .title',
	]
);


$this->add_control(
	'subtitle_option',
	[
		'label' 		=> esc_html__('Section Sub Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);

$this->add_control(
	'subtitle_color',
	[
		'label' 		=> esc_html__('Sub Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .sub-title' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'subtitle_typography',
		'label' 		=> esc_html__('Sub Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .sub-title',
	]
);


$this->add_control(
	'menu_tab_option',
	[
		'label' 		=> esc_html__('Section Menu Tab Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);

$this->add_control(
	'menu_tab_color',
	[
		'label' 		=> esc_html__('Menu Tab Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .nav.nav-tabs.food-menu-nav.style-three button' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'menu_tab_typography',
		'label' 		=> esc_html__('Menu Tab Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .nav.nav-tabs.food-menu-nav.style-three button',
	]
);


$this->end_controls_section();
