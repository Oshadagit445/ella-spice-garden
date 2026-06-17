<?php

/**
* Elementor Footer Top Widget.
*
* Elementor widget that inserts an embbedable content into the page, from any given URL.
*
* @since 1.0.0
*/
class Elementor_Restan_Footer_Top_Widget extends \Elementor\Widget_Base
{

/**
 * Get widget name.
 *
 * Retrieve Footer Top widget name.
 *
 * @since 1.0.0
 * @access public
 *
 * @return string Widget name.
 */
public function get_name()
{
	return 'restan_feature';
}

/**
 * Get widget title.
 *
 * Retrieve Footer Top widget title.
 *
 * @since 1.0.0
 * @access public 
 *
 * @return string Widget title.
 */
public function get_title()
{
	return esc_html__('Footer Top', 'restan-core');
}

/**
 * Get widget icon.
 *
 * Retrieve Footer Top widget icon.
 *
 * @since 1.0.0
 * @access public
 *
 * @return string Widget icon.
 */
public function get_icon()
{
	return 'eicon-code';
}

/**
 * Get widget categories.
 *
 * Retrieve the list of categories the Feature widget belongs to.
 *
 * @since 1.0.0
 * @access public
 *
 * @return array Widget categories.
 */
public function get_categories()
{
	return ['restan_elements'];
}

public function get_script_depends()
{
	return array('main');
}

// Add The Input For User
protected function register_controls()
{


	$this->start_controls_section(
		'feature_content',
		[
			'label'		=> esc_html__('Set Feature Content', 'restan-core'),
			'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
		]
	);

	$this->add_control(
		'style',
		[
			'label' 	=> esc_html__('Style', 'restan-core'),
			'type' 		=> \Elementor\Controls_Manager::SELECT,
			'default' 	=> '1',
			'options' 	=> [
				'1'  	=> esc_html__('Style One', 'restan-core'),
			],
		]
	);
	
	$this->add_control(
		'logo',
		[
			'label'			=> esc_html__('Logo', 'restan-core'),
			'type' 			=> \Elementor\Controls_Manager::MEDIA,
		]
	);

	$this->add_control(
	    'logo_dimension',
	    [
	        'label' => __('Logo Dimension', 'ploming-addon'),
	        'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
	        'description' => __('Set Custom Logo Size.', 'ploming-addon'),
	        'default' => [
	            'width' => '121',
	            'height' => '60',
	        ],
	    ]
	);


	$this->end_controls_section();

}

// Output For User
protected function render()
{
	$settings = $this->get_settings_for_display();

	if ($settings['style'] == '1') : ?>

	<!-- Start Our Footer Top
	============================================= -->
	<div class="footer-top text-center">
        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                	<img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_url($settings['logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                </a>
            </div>
        </div>
    </div>
	<!-- End Our Footer Top -->

	<?php
		endif;
	}
}
