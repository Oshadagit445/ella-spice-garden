<?php

/**
 * Elementor restan offer Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Choose_Us_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve offer widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_choose_us';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve offer Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Choose Us', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve offer Nav Tab widget icon.
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
	 * Retrieve the list of categories the offer Nav Tab widget belongs to.
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

	// Add The Input For User
	protected function register_controls()
	{
		$this->start_controls_section(
			'offer_content_style',
			[
				'label'		=> esc_html__('Content Style', 'restan-core'),
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
					'2'  	=> esc_html__('Style Two', 'restan-core'),
				],
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' 		=> esc_html__('Section Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'      	=> '2',
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Section Title', 'restan-core'),
				'condition' => [
					'style' => ['2']
				]
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'      	=> '2',
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
			]
		);

		$repeater->add_control(
			'summary',
			[
				'label' 		=> esc_html__('Summary', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'      	=> '4',
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('summary', 'restan-core'),
				'default' 		=> esc_html__('Default Summary', 'restan-core'),
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
				'rows'  		=> '2',
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
			'choose_us_list',
			[
				'label' 	=> esc_html__('Choose Us List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'prevent_empty' => false,
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Choose Us', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' => [
					'style' => ['1','2']
				]
			]
		);


		$fun_fact_list = new \Elementor\Repeater();

		$fun_fact_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'      	=> '2',
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default SubTitle', 'restan-core'),
			]
		);

		$fun_fact_list->add_control(
			'number',
			[
				'label' 		=> esc_html__('Number', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'      	=> '2',
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('Number', 'restan-core'),
				'default' 		=> esc_html__('88', 'restan-core'),
			]
		);

		$fun_fact_list->add_control(
			'operator',
			[
				'label' 		=> esc_html__('Operator', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'      	=> '2',
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('operator', 'restan-core'),
				'default' 		=> esc_html__('k', 'restan-core'),
			]
		);

		$this->add_control(
			'fun_fact_list',
			[
				'label' 	=> esc_html__('Funfact List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $fun_fact_list->get_controls(),
				'prevent_empty' => false,
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Fun Fact', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' => [
					'style' => ['2']
				]
			]
		);

		$this->add_control(
			'layout_two_bg_img',
			[
				'label'			=> esc_html__('Background Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'style' => '2'
				]
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'choose-us-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
	?>

	<!-- Start Why Choose us 
    ============================================= -->
    <div class="choose-us-style-one-one-area default-padding">
        <div class="container">
            <div class="choose-us-style-one-items">
                <div class="row">
					<?php foreach ($settings['choose_us_list'] as $key => $item) :
                    ?>
	                    <!-- Single Item -->
	                    <div class="col-lg-4 col-md-6 choose-us-style-one">
	                        <div class="item animate" data-animate="fadeInUp">
	                           	<?php if (!empty($item['flat_icon'])) : ?>
										<i class="<?php echo esc_attr($item['flat_icon']); ?>"></i>
								<?php endif; ?>
								<?php if (!empty($item['icon_image']['url'])) : ?>
									<img src="<?php echo esc_url($item['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
								<?php endif; ?>
								<?php
								if (!empty($item['custom_icon'])) : ?>
									<i class="<?php echo esc_attr($item['custom_icon']); ?>"></i>
								<?php endif; ?>
	                            <h4><?php echo wp_kses($item['title'], 'restan_allowed_tags'); ?></h4>
	                            <p>
	                               <?php echo wp_kses($item['summary'], 'restan_allowed_tags'); ?>
	                            </p>
	                        </div>
	                    </div>
	                    <!-- End Single Item -->
                  	<?php  endforeach;?>  
                </div>
            </div>
        </div>
    </div>
    <!-- End Why Choose Us -->
    <?php elseif ($settings['style'] == '2') : ?>

      <!-- Start Choose Us 
    ============================================= -->
    <div class="choose-us-style-one-area shadow dark default-padding text-light bg-fixed" style="background-image: url(<?php echo esc_url($settings['layout_two_bg_img']['url']);?>);">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-5 pr-60 pr-md-15 pr-xs-15">
                    <div class="choose-us-style-two-info">
                        <h2 class="title"><?php echo wp_kses($settings['section_title'], 'restan_allowed_tags'); ?></h2>
                        <div class="fun-fact-list">
                        	<?php foreach ($settings['fun_fact_list'] as $key => $item) : ?>
	                            <div class="fun-fact">
	                                <div class="counter">
	                                    <div class="timer" data-to="<?php echo esc_attr($item['number']); ?>" data-speed="3000"><?php echo wp_kses($item['number'], 'restan_allowed_tags'); ?></div>
	                                    <div class="operator"> <?php echo wp_kses($item['operator'], 'restan_allowed_tags'); ?></div>
	                                </div>
	                                <span class="medium"> <?php echo wp_kses($item['title'], 'restan_allowed_tags'); ?></span>
	                            </div>
                            <?php  endforeach;?>  
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="feature-style-two-items">
                   		<?php foreach ($settings['choose_us_list'] as $key => $item) : ?>
	                        <div class="feature-style-two">
	                            <?php if (!empty($item['flat_icon'])) : ?>
										<i class="<?php echo esc_attr($item['flat_icon']); ?>"></i>
								<?php endif; ?>
								<?php if (!empty($item['icon_image']['url'])) : ?>
									<img src="<?php echo esc_url($item['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
								<?php endif; ?>
								<?php
								if (!empty($item['custom_icon'])) : ?>
									<i class="<?php echo esc_attr($item['custom_icon']); ?>"></i>
								<?php endif; ?>
	                            <h4><?php echo wp_kses($item['title'], 'restan_allowed_tags'); ?></h4>
	                            <p>
	                                <?php echo wp_kses($item['summary'], 'restan_allowed_tags'); ?>
	                            </p>
	                        </div>
                       	<?php  endforeach;?>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Chose Us -->

	<?php
		endif;
	}
}
