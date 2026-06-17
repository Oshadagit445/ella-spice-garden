<?php

/**
 * Elementor Contact Form Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Contact_Form_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Contact Form widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_contact_form';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Contact Form widget title.
	 *
	 * @since 1.0.0
	 * @access public 
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Contact Form', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve contact_formor widget icon.
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
	 * Retrieve the list of categories the contact_formor widget belongs to.
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
			'contact_form_content',
			[
				'label'		=> esc_html__('Set Content', 'restan-core'),
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
			'section_subtitle',
			[
				'label' 		=> esc_html__('Sub-Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default Sub Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'info',
			[
				'label' 		=> esc_html__('Information', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__('Icon Style', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__('Flaticon', 'restan-core'),
					'3' 	=> esc_html__('Icon Image', 'restan-core'),
					'2'  	=> esc_html__('Custom Icon', 'restan-core'),
				],
			]
		);

		$repeater->add_control(
			'flat_icon',
			[
				'label'      => esc_html__('Icon One', 'cleanu-core'),
				'type'       => \Elementor\Controls_Manager::ICON,
				'options'    => restan_flaticons(),
				'include'    => restan_include_flaticons(),
				'default'    => 'flaticon-vegetables',
				'condition' => [
					'icon_style' => '1'
				]
			]
		);

		$repeater->add_control(
			'custom_icon',
			[
				'label' 		=> esc_html__('Custom Icon', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' => [
					'icon_style' => '2'
				]
			]
		);


		$repeater->add_control(
			'icon_image',
			[
				'label'			=> esc_html__('Add Image Icon', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'icon_style' => '3'
				]
			]
		);

		$this->add_control(
			'contact_info_list',
			[
				'label' 	=> esc_html__('Contact Info List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Contact Info', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' => [
					'style' => ['1']
				],
				'prevent_empty' => false
			]
		);

		$this->add_control(
			'form_title',
			[
				'label' 		=> esc_html__('Form Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'form_subtitle',
			[
				'label' 		=> esc_html__('Form Sub-Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default Sub Title', 'restan-core'),
				'label_block' 	=> true,
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'contact_shortcode',
			[
				'label' 		=> esc_html__('Contact Form Shortcode', 'cleanu-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'placeholder' 	=> esc_html__('Put your shortcode Here', 'cleanu-core'),
			]

		);

		$this->add_control(
			'contact_image',
			[
				'label'			=> esc_html__('Background Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'contact-style.php';
	}

	// Output For User
	protected function render()
	{
		$restan_contact_form_output = $this->get_settings_for_display();
	?>
	<!-- Start Contact Us 
	============================================= -->
	<div class="contact-style-one-area default-padding overflow-hidden">
        <div class="container">
            <div class="row align-center">

                <div class="col-lg-10 offset-lg-1">

                    <div class="contact-style-one-info">
                        <ul>
                        	<?php foreach ($restan_contact_form_output['contact_info_list'] as $single_contact_info) : ?>
	                            <li class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
	                                <div class="icon">
	                                    <?php if (!empty($single_contact_info['flat_icon'])) : ?>
											<i class="<?php echo esc_attr($single_contact_info['flat_icon']); ?>"></i>
										<?php endif; ?>
										<?php if (!empty($single_contact_info['icon_image'])) : ?>
											<img src="<?php echo esc_url($single_contact_info['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
										<?php endif; ?>
										<?php
										if (!empty($single_contact_info['custom_icon'])) : ?>
											<i class="<?php echo esc_attr($single_contact_info['custom_icon']); ?>"></i>
										<?php endif; ?>
	                                </div>
	                                <div class="content">
	                                   <h5 class="title"><?php echo wp_kses($single_contact_info['title'], 'restan_allowed_tags'); ?></h5>
										<?php echo wp_kses($single_contact_info['info'], 'restan_allowed_tags'); ?>
	                                </div>
	                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-10 offset-lg-1">
                    <div class="contact-form-style-one">
                        <div class="heading text-center">
	                        <?php if (!empty($restan_contact_form_output['form_title'])) : ?>
								<h5 class="sub-title"><?php echo wp_kses($restan_contact_form_output['form_title'], 'restan_allowed_tags'); ?></h5>
							<?php endif; ?>
							<?php if (!empty($restan_contact_form_output['form_subtitle'])) : ?>
								<h2 class="heading"><?php echo wp_kses($restan_contact_form_output['form_subtitle'], 'restan_allowed_tags'); ?></h2>
							<?php endif; ?>
                        </div>
                        <div class="contact-form contact-form">
	                       <?php echo do_shortcode($restan_contact_form_output['contact_shortcode']); ?>
	                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Contact -->

	<?php
	}
}
