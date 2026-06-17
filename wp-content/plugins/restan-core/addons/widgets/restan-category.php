<?php

/**
 * Elementor category Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Category_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve category widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_category';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve category widget title.
	 *
	 * @since 1.0.0
	 * @access public 
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Food Category', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve category widget icon.
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
	 * Retrieve the list of categories the category widget belongs to.
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
			'category_content',
			[
				'label'		=> esc_html__('Set Category Content', 'restan-core'),
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
					'2'  	=> esc_html__('Style Two', 'restan-core')
				],
			]
		);

		$this->add_control(
			'sec_title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('Title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'sec_subtitle',
			[
				'label' 		=> esc_html__('Sub-Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('SubTitle', 'restan-core'),
				'default' 		=> esc_html__('Default SubTitle', 'restan-core'),
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
		    'subtitle_before_shape',
		    [
		        'label' => esc_html__('Subtitle Before Shape', 'agrofa-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .sub-title::before' => 'background-image:url({{URL}});',
		        ],
		        'condition' => [
					'style' => ['1']
				]
		    ]
		);

		$this->add_control(
		    'subtitle_after_shape',
		    [
		        'label' => esc_html__('Subtitle After Shape', 'agrofa-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .sub-title::after' => 'background-image:url({{URL}});',
		        ],
		        'condition' => [
					'style' => ['1']
				]
		    ]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '1',
				'placeholder' 	=> esc_html__('Title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__('Title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'image_one',
			[
				'label'			=> esc_html__('Add Image One', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$repeater->add_control(
			'image_two',
			[
				'label'			=> esc_html__('Add Image Two', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$repeater->add_control(
			'image_three',
			[
				'label'			=> esc_html__('Add Image Three', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$repeater->add_control(
			'image_four',
			[
				'label'			=> esc_html__('Add Image Four', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$repeater->add_control(
			'rating_text',
			[
				'label' 	=> __('Rating Text', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Rating Text', 'restan-core')
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
				'label'      => esc_html__('Icon One', 'restan-core'),
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
				'rows'  => 	'1',
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

		$repeater->add_control(
			'button_label',
			[
				'label' 	=> __('Button Label', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Button Label', 'restan-core')
			]
		);

		$repeater->add_control(
			'url',
			[
				'label' 		=> __('URL', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> __('https://your-link.com', 'restan-core'),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'category_list',
			[
				'label' 	=> esc_html__('Category List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Category', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' => [
					'style' => ['1','2']
				]
			]
		);

		$this->add_control(
			'bg_image_one',
			[
				'label'			=> esc_html__('Add Background Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'style' => ['1','2']
				]
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'category-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$category_list = $settings['category_list'];
		if ($settings['style'] == '1') :
	?>
	<!-- Start Food Category 
    ============================================= -->
    <div class="food-category-area default-padding bottom-less" style="background-image: url(<?php echo esc_url($settings['bg_image_one']['url']);?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title"><?php echo wp_kses_post($settings['sec_subtitle'], 'restan_kses_allowed_html'); ?></h4>
                        <h2 class="title"><?php echo wp_kses_post($settings['sec_title'], 'restan_kses_allowed_html'); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
            	<?php
					foreach ($category_list as $item) :
				?>
	                <!-- Single Item -->
	                <div class="col-xl-3 col-lg-6 col-md-6">
	                    <div class="food-category-item">
	                        <div class="thumb">
	                           <?php
								if (!empty($item['image_one']['url'])) :
										echo restan_img_tag(array(
											'url'   => esc_url($item['image_one']['url'])
										));
									endif;
								?>
	                        </div>
	                        <div class="info">
	                            <div class="food-review">
	                                <div class="reviewer-avatar">
		                                <?php
											if (!empty($item['image_two']['url'])) :
												echo restan_img_tag(array(
													'url'   => esc_url($item['image_two']['url'])
												));
											endif;
										
											if (!empty($item['image_three']['url'])) :
												echo restan_img_tag(array(
													'url'   => esc_url($item['image_three']['url'])
												));
											endif;
										
											if (!empty($item['image_four']['url'])) :
												echo restan_img_tag(array(
													'url'   => esc_url($item['image_four']['url'])
												));
											endif;
										?>
	                                </div>
	                                <div class="rating">
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
	                                    <?php echo wp_kses_post($item['rating_text'], 'restan_kses_allowed_html'); ?>
	                                </div>
	                            </div>
	                            <h4>
	                            	<a href="<?php echo esc_url($item['url']['url']);?>"><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></a>
	                            </h4>
	                            <p>
	                             <?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?>
	                            </p>
	                            <?php if(!empty($item['button_label'])):?>
	                            	<a href="<?php echo esc_url($item['url']['url']);?>" class="btn-read-more"><?php echo wp_kses_post($item['button_label'], 'restan_kses_allowed_html'); ?> <i class="fas fa-arrow-right"></i></a>
	                            <?php endif;?>
	                        </div>
	                    </div>
	                </div>
	                <!-- End Single Item -->
               	<?php
					endforeach;
				?>
            </div>
        </div>
    </div>
    <!-- End Food Category -->

    <?php elseif($settings['style'] == '2'): ?>

    <!-- Start Food Category 
    ============================================= -->
    <div class="food-category-area default-padding bottom-less" style="background-image: url(<?php echo esc_url($settings['bg_image_one']['url']);?>);">
        <div class="container">
            <div class="row">
            	<?php
					foreach ($category_list as $item) :
				?>
	                <!-- Single Item -->
	                <div class="col-xl-3 col-lg-6 col-md-6">
	                    <div class="food-category-item">
	                        <div class="thumb">
	                           	<?php
									if (!empty($item['image_one']['url'])) :
										echo restan_img_tag(array(
											'url'   => esc_url($item['image_one']['url'])
										));
									endif;
								?>
	                        </div>
	                        <div class="info">
	                            <div class="food-review">
	                                <div class="reviewer-avatar">
	                                   <?php
											if (!empty($item['image_two']['url'])) :
												echo restan_img_tag(array(
													'url'   => esc_url($item['image_two']['url'])
												));
											endif;
										
											if (!empty($item['image_three']['url'])) :
												echo restan_img_tag(array(
													'url'   => esc_url($item['image_three']['url'])
												));
											endif;
										
											if (!empty($item['image_four']['url'])) :
												echo restan_img_tag(array(
													'url'   => esc_url($item['image_four']['url'])
												));
											endif;
										?>
	                                </div>
	                                <div class="rating">
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
	                                    <?php echo wp_kses_post($item['rating_text'], 'restan_kses_allowed_html'); ?>
	                                </div>
	                            </div>
	                            <h4>
	                            	<a href="<?php echo esc_url($item['url']['url']);?>"><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></a>
	                            </h4>
	                            <p>
	                                <?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?>
	                            </p>
	                            <?php if(!empty($item['button_label'])):?>
	                            	<a href="<?php echo esc_url($item['url']['url']);?>" class="btn-read-more"><?php echo wp_kses_post($item['button_label'], 'restan_kses_allowed_html'); ?> <i class="fas fa-arrow-right"></i></a>
	                            <?php endif;?>
	                        </div>
	                    </div>
	                </div>
	                <!-- End Single Item -->
                <?php
					endforeach;
				?>
            </div>
        </div>
    </div>
    <!-- End Food Category -->

	<?php
		endif;
	}
}
