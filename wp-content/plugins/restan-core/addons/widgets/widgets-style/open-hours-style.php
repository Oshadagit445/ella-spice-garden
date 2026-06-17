<?php 

$this->start_controls_section(
	'content_style_option',
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
			'{{WRAPPER}} .opening-hours-info h3' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .opening-hours-info h3',
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
			'{{WRAPPER}} .opening-hours-info p' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_subtitle_typography',
		'label' 		=> esc_html__('Subtitle Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .opening-hours-info p',
	]
);

$this->add_control(
	'content_date_option',
	[
		'label' 		=> esc_html__('Date Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'content_date_color',
	[
		'label' 		=> esc_html__('Date Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} ul.opening-hours-table h6' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_date_typography',
		'label' 		=> esc_html__('Date Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} ul.opening-hours-table h6',
	]
);

$this->add_control(
	'content_time_option',
	[
		'label' 		=> esc_html__('Time Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'content_time_color',
	[
		'label' 		=> esc_html__('Time Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} ul.opening-hours-table span' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_time_typography',
		'label' 		=> esc_html__('Time Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} ul.opening-hours-table span',
	]
);

$this->add_control(
	'content_info_title_option',
	[
		'label' 		=> esc_html__('Info Title Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'content_info_title_color',
	[
		'label' 		=> esc_html__('Title Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .info p' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_info_title_typography',
		'label' 		=> esc_html__('Title Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .info p',
	]
);


$this->add_control(
	'content_info_number_option',
	[
		'label' 		=> esc_html__('Info Number Options', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::HEADING,
		'separator' 	=> 'before',
	]
);
$this->add_control(
	'content_info_number_color',
	[
		'label' 		=> esc_html__('Number Color', 'restan-core'),
		'type' 			=> \Elementor\Controls_Manager::COLOR,
		'selectors' 	=> [
			'{{WRAPPER}} .info a' => 'color: {{VALUE}}',
		],
	]
);
$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' 			=> 'content_info_number_typography',
		'label' 		=> esc_html__('Number Typography', 'restan-core'),
		'selector' 		=> '{{WRAPPER}} .info a',
	]
);
$this->end_controls_section();