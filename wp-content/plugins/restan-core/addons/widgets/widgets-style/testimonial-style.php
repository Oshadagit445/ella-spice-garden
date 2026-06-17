<?php

$this->start_controls_section(
	'testimonial_content_style_option',
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
		'condition'		=> ['style'	=>	'1'],
	]
);
$this->add_control(
	'section_title_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .site-heading .title' => 'color: {{VALUE}}',
		],
		'condition'		=> ['style'	=>	'1'],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'heading_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .site-heading .title',
		'condition'		=> ['style'	=>	'1'],
	]
);

$this->add_control(
	'section_subtitle_option',
	[
		'label' 		=> esc_html__('Section Sub-Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition'		=> ['style'	=>	'1'],
	]
);
$this->add_control(
	'section_subtitle_color',
	[
		'label' 		=> esc_html__('Subtitle Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .site-heading .sub-title' => 'color: {{VALUE}}',
		],
		'condition'		=> ['style'	=>	'1'],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_subtitle_typography',
		'label' 		=> esc_html__('Subtitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .site-heading .sub-title',
		'condition'		=> ['style'	=>	'1'],
	]
);

$this->add_control(
	'content_title_option',
	[
		'label' 		=> esc_html__('Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition'		=> ['style'	=>	'1'],
	]
);
$this->add_control(
	'content_title_color',
	[
		'label' 		=> esc_html__('Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .testimonial-style-one h2' => 'color: {{VALUE}}',
		],
		'condition'		=> ['style'	=>	'1'],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_title_typography',
		'label' 		=> esc_html__('Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .testimonial-style-one h2',
		'condition'		=> ['style'	=>	'1'],
	]
);

$this->add_control(
	'content_name_option',
	[
		'label' 		=> esc_html__('Name Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition'		=> ['style'	=>	'1'],
	]
);
$this->add_control(
	'content_name_color',
	[
		'label' 		=> esc_html__('Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .testimonial-style-one .provider h4' => 'color: {{VALUE}}',
		],
		'condition'		=> ['style'	=>	'1'],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_name_typography',
		'label' 		=> esc_html__('Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .testimonial-style-one .provider h4',
		'condition'		=> ['style'	=>	'1'],
	]
);

$this->add_control(
	'content_designation_option',
	[
		'label' 		=> esc_html__('Designation Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition'		=> ['style'	=>	'1'],
	]
);
$this->add_control(
	'content_designation_color',
	[
		'label' 		=> esc_html__('Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .testimonial-style-one .provider h4' => 'color: {{VALUE}}',
		],
		'condition'		=> ['style'	=>	'1'],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_designation_typography',
		'label' 		=> esc_html__('Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .testimonial-style-one .provider h4',
		'condition'		=> ['style'	=>	'1'],
	]
);

$this->add_control(
	'testimonial_option',
	[
		'label' 		=> esc_html__('Testimonial Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'testimonial_color',
	[
		'label' 		=> esc_html__('Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .testimonial-style-one p' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'testimonial_typography',
		'label' 		=> esc_html__('Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .testimonial-style-one p',
	]
);

$this->end_controls_section();
