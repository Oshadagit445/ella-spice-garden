<?php

$this->start_controls_section(
	'pricing_section_style_option',
	[
		'label'			=> esc_html__('Pricing Content Style', 'restan-core'),
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
			'{{WRAPPER}} .partner-map h4,{{WRAPPER}} .partner-heading h3' => 'color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .partner-map h4,{{WRAPPER}} .partner-heading h3',
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
	'pricing_content_style_option',
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
			'{{WRAPPER}} .pricing-style-one .pricing-header h4' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .pricing-style-one .pricing-header h4',
	]
);

$this->add_control(
	'content_subtitle_option',
	[
		'label' 		=> esc_html__('Sub-Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'content_subtitle_color',
	[
		'label' 		=> esc_html__('Subtitle Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .pricing-style-one .pricing-header p' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_subtitle_typography',
		'label' 		=> esc_html__('Subtitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .pricing-style-one .pricing-header p',
	]
);

$this->add_control(
	'content_feature_option',
	[
		'label' 		=> esc_html__('Feature Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'content_feature_color',
	[
		'label' 		=> esc_html__('Feature Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .pricing-style-one .pricing-content li' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_feature_typography',
		'label' 		=> esc_html__('Feature Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .pricing-style-one .pricing-content li',
	]
);


$this->add_control(
	'section_button_option',
	[
		'label' 		=> esc_html__('Button Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'section_button_color',
	[
		'label' 		=> esc_html__('Button Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn.btn-dark' => 'color: {{VALUE}}',
		],
	]
);

$this->add_control(
	'section_button_bg_color',
	[
		'label' 		=> esc_html__('Button Background Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .btn.btn-dark' => 'background-color: {{VALUE}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'section_button_typography',
		'label' 		=> esc_html__('Button Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .btn-animation span, {{WRAPPER}} .btn.btn-theme,{{WRAPPER}} .btn.btn-dark'
	]
);

$this->end_controls_section();
