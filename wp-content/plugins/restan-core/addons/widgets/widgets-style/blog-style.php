<?php

$this->start_controls_section(
	'blog_section_style_option',
	[
		'label'			=> esc_html__('Section Style', 'restan-core'),
		'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
	]
);

$this->add_control(
	'section_title_option',
	[
		'label' 		=> esc_html__('Title Options', 'restan-core'),
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
			'{{WRAPPER}} .site-heading .title' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .site-heading .title',
	]
);

$this->add_control(
	'section_subtitle_option',
	[
		'label' 		=> esc_html__('Sub-Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);

$this->add_control(
	'section_subtitle_color_1',
	[
		'label' 		=> __('Subtitle Color 1 ', 'crysa-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
	]
);
$this->add_control(
	'section_subtitle_color_2',
	[
		'label' 		=> __('Subtitle Color 2', 'crysa-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .sub-heading' => 'background: linear-gradient(90deg, {{section_subtitle_color_1.VALUE}} 0%, {{VALUE}} 100%);',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_subtitle_typography',
		'label' 		=> esc_html__('Subtitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .sub-heading',
	]
);

$this->end_controls_section();

$this->start_controls_section(
	'blog_content_style_option',
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
			'{{WRAPPER}} .blog-style-one h4 a' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .blog-style-one h4 a',
	]
);


$this->add_control(
	'meta_option',
	[
		'label' 		=> esc_html__('Meta Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'meta_color',
	[
		'label' 		=> esc_html__('Meta Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .blog-meta ul li,{{WRAPPER}} .blog-meta ul li a' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'meta_typography',
		'label' 		=> esc_html__('Meta Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .blog-meta ul li,{{WRAPPER}} .blog-meta ul li a',
	]
);

$this->add_control(
	'blog_content_option',
	[
		'label' 		=> esc_html__('Content Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'blog_content_color',
	[
		'label' 		=> esc_html__('Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .blog-style-one.solid .info p' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'blog_content_typography',
		'label' 		=> esc_html__('Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .blog-style-one.solid .info p',
	]
);


$this->add_control(
	'read_more_option',
	[
		'label' 		=> esc_html__('Read More Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'read_more_color',
	[
		'label' 		=> esc_html__('Read More Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn-simple' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'read_more_typography',
		'label' 		=> esc_html__('Read More Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .btn-simple',
	]
);

$this->end_controls_section();
