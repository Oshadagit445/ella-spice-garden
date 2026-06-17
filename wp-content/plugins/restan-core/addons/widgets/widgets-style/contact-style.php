<?php

$this->start_controls_section(
	'contact_content_style_option',
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
			'{{WRAPPER}} .contact-style-one-info h2,{{WRAPPER}} .title' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'heading_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .contact-style-one-info h2,{{WRAPPER}} .title',
	]
);

$this->add_control(
	'section_subtitle_option',
	[
		'label' 		=> esc_html__('Section Sub-Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'section_subtitle_color',
	[
		'label' 		=> esc_html__('Subtitle Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .contact-style-one-info p,{{WRAPPER}} .sub-heading' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_subtitle_typography',
		'label' 		=> esc_html__('Subtitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .contact-style-one-info p,{{WRAPPER}} .sub-heading',
	]
);

$this->add_control(
	'conatct_info_title_option',
	[
		'label' 		=> esc_html__('Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1', '2']
		]
	]
);
$this->add_control(
	'conatct_info_title_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .contact-style-one-info li h5' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1', '2']
		]
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'conatct_info_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .contact-style-one-info li h5',
		'condition' => [
			'style' => ['1', '2']
		]
	]
);

$this->add_control(
	'content_info_option',
	[
		'label' 		=> esc_html__('Contact Info Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1', '2']
		]
	]
);
$this->add_control(
	'content_tagline_color',
	[
		'label' 		=> esc_html__('Contact Info Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .contact-style-one-info li a' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1', '2']
		]
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_tagline_typography',
		'label' 		=> esc_html__('Contact Info Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .contact-style-one-info li a',
		'condition' => [
			'style' => ['1', '2']
		]
	]
);

$this->add_control(
	'form_title_option',
	[
		'label' 		=> esc_html__('Form Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1', '2']
		]
	]
);

$this->add_control(
	'form_title_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .contact-form-style-one .heading' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1', '2']
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'form_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .contact-form-style-one .heading',
		'condition' => [
			'style' => ['1', '2']
		]
	]
);

$this->add_control(
	'formn_subtitle_option',
	[
		'label' 		=> esc_html__('Form Sub-Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition' => [
			'style' => ['1', '2']
		]
	]
);
$this->add_control(
	'form_subtitle_color',
	[
		'label' 		=> esc_html__('Subtitle Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .contact-form-style-one .sub-heading' => 'color: {{VALUE}}',
		],
		'condition' => [
			'style' => ['1', '2']
		]
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'form_subtitle_typography',
		'label' 		=> esc_html__('Subtitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .contact-form-style-one .sub-heading',
		'condition' => [
			'style' => ['1', '2']
		]
	]
);

$this->add_control(
	'section_button_option',
	[
		'label' 		=> esc_html__('Button Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before'
	]
);
$this->add_control(
	'section_button_color',
	[
		'label' 		=> esc_html__('Button Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .contact-form-style-one button' => 'color: {{VALUE}}',
		]
	]
);

$this->add_control(
	'section_button_bg_color',
	[
		'label' 		=> esc_html__('Button Background Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .contact-form-style-one button' => 'background-color: {{VALUE}}',
		]
	]
);

$this->add_control(
	'section_button_hover__bg_color',
	[
		'label' 		=> esc_html__('Button Hover Background Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .contact-form-style-one button::after' => 'background-color: {{VALUE}}',
		]
	]
);


$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_button_typography',
		'label' 		=> esc_html__('Button Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .contact-form-style-one button'
	]
);


$this->end_controls_section();
