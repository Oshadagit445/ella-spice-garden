<?php

$this->start_controls_section(
	'project_section_style_option',
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
			'{{WRAPPER}} .site-heading .title,{{WRAPPER}} .heading' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'heading_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .site-heading .title,{{WRAPPER}} .heading',
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
	'project_content_style_option',
	[
		'label'			=> esc_html__('Content Style', 'restan-core'),
		'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
	]
);

$this->add_control(
	'content_title_option',
	[
		'label' 		=> esc_html__('Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'content_title_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .overlay .content a,{{WRAPPER}} .gallery-style-four-area h4 a, {{WRAPPER}} .project-style-one h3 a' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .overlay .content a,{{WRAPPER}} .gallery-style-four-area h4 a,{{WRAPPER}} .project-style-one h3 a',
	]
);

$this->add_control(
	'content_sub_title_option',
	[
		'label' 		=> esc_html__('SubTitle Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'content_sub_title_color',
	[
		'label' 		=> esc_html__('Sub Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .project-style-one .info > span' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_sub_title_typography',
		'label' 		=> esc_html__('Sub Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .project-style-one .info > span',
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
			'{{WRAPPER}} .project-style-one p' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_typography',
		'label' 		=> esc_html__('Content Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .project-style-one p',
	]
);

$this->add_control(
	'content_tagline_option',
	[
		'label' 		=> esc_html__('Tagline Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'content_tagline_color',
	[
		'label' 		=> esc_html__('Tagline Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .overlay span,{{WRAPPER}} .gallery-style-four .overlay span' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_tagline_typography',
		'label' 		=> esc_html__('Tagline Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .overlay span,{{WRAPPER}} .gallery-style-four .overlay span',
	]
);

$this->add_control(
	'content_loadmore_option',
	[
		'label' 		=> esc_html__('Loadmore Text Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
		'condition'		=> ['style'	=>	['1', '2']],
	]
);
$this->add_control(
	'content_loadmore_color',
	[
		'label' 		=> esc_html__('Loadmore Text Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .load-more-info p,{{WRAPPER}} .secondary.load-more-info a' => 'color: {{VALUE}}',
		],
		'condition'		=> ['style'	=>	['1', '2', '5']],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_loadmore_typography',
		'label' 		=> esc_html__('Loadmore Text Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .load-more-info p,{{WRAPPER}} .secondary.load-more-info a',
		'condition'		=> ['style'	=>	['1', '2', '5']],
	]
);

$this->end_controls_section();
