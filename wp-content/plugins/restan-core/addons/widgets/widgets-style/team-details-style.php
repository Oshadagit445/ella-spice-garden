<?php

$this->start_controls_section(
	'team_deatils_top_style_option',
	[
		'label'			=> esc_html__('Top Section Style', 'restan-core'),
		'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
	]
);

$this->add_control(
	'name_option',
	[
		'label' 		=> esc_html__('Name Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'name_color',
	[
		'label' 		=> esc_html__('Name Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .team-single-area .team-content-top .right-info h2' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'name_typography',
		'label' 		=> esc_html__('Name Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .team-single-area .team-content-top .right-info h2',
	]
);

$this->add_control(
	'designation_option',
	[
		'label' 		=> esc_html__('Designation Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'designation_color',
	[
		'label' 		=> esc_html__('Designation Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}}  .team-single-area .team-content-top .right-info span' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'designation_typography',
		'label' 		=> esc_html__('Designation Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .team-single-area .team-content-top .right-info span',
	]
);

$this->add_control(
	'summary_option',
	[
		'label' 		=> esc_html__('Summary Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'summary_color',
	[
		'label' 		=> esc_html__('Summary Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .team-single-area .team-content-top .right-info p' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'summary_typography',
		'label' 		=> esc_html__('Summary Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .team-single-area .team-content-top .right-info p',
	]
);

$this->add_control(
	'contact_title_option',
	[
		'label' 		=> esc_html__('Contact Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'contact_title_color',
	[
		'label' 		=> esc_html__('Contact Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .team-single-area .right-info ul li strong' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'contact_title_typography',
		'label' 		=> esc_html__('Contact Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .team-single-area .right-info ul li strong',
	]
);

$this->add_control(
	'contact_info_option',
	[
		'label' 		=> esc_html__('Contact Info Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'contact_info_color',
	[
		'label' 		=> esc_html__('Contact Info Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .team-single-area .right-info ul li a' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'contact_info_typography',
		'label' 		=> esc_html__('Contact Info Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .team-single-area .right-info ul li a',
	]
);

$this->add_control(
	'contact_btn_color',
	[
		'label' 		=> esc_html__('Button Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn.btn-dark' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'contact_btn_typography',
		'label' 		=> esc_html__('Button Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .btn.btn-dark',
	]
);

$this->add_control(
	'contact_btn_bg_color',
	[
		'label' 		=> esc_html__('Button Background Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn.btn-dark' => 'background-color: {{VALUE}}',
		],
	]
);

$this->add_control(
	'contact_btn_bg_hover_color',
	[
		'label' 		=> esc_html__('Button Background Hover Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn.btn-dark::after' => 'background-color: {{VALUE}}',
		],
	]
);

$this->end_controls_section();

$this->start_controls_section(
	'team_deatils_bottom_style_option',
	[
		'label'			=> esc_html__('Bottom Section Style', 'restan-core'),
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
			'{{WRAPPER}} .skill-items h3' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'heading_typography',
		'label' 		=> esc_html__('Heading Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .skill-items h3',
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
			'{{WRAPPER}} .skill-items .progress-box h5' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_subtitle_typography',
		'label' 		=> esc_html__('Subtitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .skill-items .progress-box h5',
	]
);

$this->end_controls_section();
