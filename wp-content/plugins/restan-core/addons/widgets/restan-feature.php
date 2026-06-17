<?php

/**
* Elementor Feature Widget.
*
* Elementor widget that inserts an embbedable content into the page, from any given URL.
*
* @since 1.0.0
*/
class Elementor_Restan_Feature_Widget extends \Elementor\Widget_Base
{

/**
 * Get widget name.
 *
 * Retrieve Feature widget name.
 *
 * @since 1.0.0
 * @access public
 *
 * @return string Widget name.
 */
public function get_name()
{
	return 'restan_feature_content';
}

/**
 * Get widget title.
 *
 * Retrieve Feature widget title.
 *
 * @since 1.0.0
 * @access public 
 *
 * @return string Widget title.
 */
public function get_title()
{
	return esc_html__('Feature Content', 'restan-core');
}

/**
 * Get widget icon.
 *
 * Retrieve Feature widget icon.
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
				'2'  	=> esc_html__('Style Two', 'restan-core'),
			],
		]
	);


	$this->add_control(
		'form_title',
		[
			'label' 		=> esc_html__('Form Title', 'restan-core'),
			'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
			'label_block' 	=> true,
			'placeholder' 	=> esc_html__('Form Title', 'restan-core'),
			'default' 		=> esc_html__('Default Form Title', 'restan-core'),
			'condition' => [
				'style' => ['1','2']
			]
		]
	);

	$this->add_control(
		'form_icon_style',
		[
			'label' 	=> esc_html__('Form Icon Style', 'restan-core'),
			'type' 		=> \Elementor\Controls_Manager::SELECT,
			'default' 	=> '1',
			'options' 	=> [
				'1'  	=> esc_html__('Flaticon', 'restan-core'),
				'3' 	=> esc_html__('Icon Image', 'restan-core'),
				'2'  	=> esc_html__('Custom Icon', 'restan-core'),
			],
		]
	);

	$this->add_control(
		'flat_icon',
		[
			'label'      => esc_html__('Icon One', 'cleanu-core'),
			'type'       => \Elementor\Controls_Manager::ICON,
			'options'    => restan_flaticons(),
			'include'    => restan_include_flaticons(),
			'condition' => [
				'form_icon_style' => '1'
			]
		]
	);

	$this->add_control(
		'custom_icon',
		[
			'label' 		=> esc_html__('Custom Icon', 'restan-core'),
			'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
			'label_block' 	=> true,
			'rows'  		=> '2',
			'condition' => [
				'form_icon_style' => '2'
			]
		]
	);


	$this->add_control(
		'icon_image',
		[
			'label'			=> esc_html__('Add Image Icon', 'restan-core'),
			'type' 			=> \Elementor\Controls_Manager::MEDIA,
			'condition' => [
				'form_icon_style' => '3'
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
		'schedule_title',
		[
			'label' 		=> esc_html__('Schedule Title', 'restan-core'),
			'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
			'label_block' 	=> true,
			'placeholder' 	=> esc_html__('Schedule SubTitle', 'restan-core'),
			'default' 		=> esc_html__('Default Schedule SubTitle', 'restan-core'),
			'condition' => [
				'style' => ['1']
			]
		]
	);

	$repeater = new \Elementor\Repeater();

	$repeater->add_control(
		'date',
		[
			'label' 		=> esc_html__('Date', 'restan-core'),
			'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
			'rows' 			=> '1',
			'label_block' 	=> true,
		]
	);
	$repeater->add_control(
		'time',
		[
			'label' 		=> esc_html__('Time', 'restan-core'),
			'type' 			=> \Elementor\Controls_Manager::TEXT,
			'label_block' 	=> true,
		]
	);

	$repeater->add_control(
		'status',
		[
			'label' => __('Is Closed?', 'restan-addon'),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => __('Yes', 'restan-addon'),
			'label_off' => __('No', 'restan-addon'),
			'return_value' => 'yes',
			'default' => 'no',
		]
	);

	$this->add_control(
		'schedule_list',
		[
			'label' 	=> esc_html__('Schedule List', 'restan-core'),
			'type' 		=> \Elementor\Controls_Manager::REPEATER,
			'fields' 	=> $repeater->get_controls(),
			'default' 	=> [
				[
					'list_title' => esc_html__('Add Schedule', 'restan-core'),
				],
			],
			'title_field' => '{{{ date }}}',
			'condition' => [
				'style' => '1'
			]
		]
	);


	$this->add_control(
		'category_title',
		[
			'label' 		=> esc_html__('Category Title', 'restan-core'),
			'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
			'label_block' 	=> true,
			'placeholder' 	=> esc_html__('Category Title', 'restan-core'),
			'default' 		=> esc_html__('Default Category Title', 'restan-core'),
			'condition' => [
				'style' => ['2']
			]
		]
	);

	$this->add_control(
		'category_icon_image',
		[
			'label'			=> esc_html__('Add Image Icon', 'restan-core'),
			'type' 			=> \Elementor\Controls_Manager::MEDIA,
			'condition' => [
				'style' => ['2']
			]
		]
	);

	$category_list = new \Elementor\Repeater();

	$category_list->add_control(
		'title',
		[
			'label' 		=> esc_html__('Title', 'restan-core'),
			'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
			'rows' 			=> '1',
			'label_block' 	=> true,
		]
	);

	$category_list->add_control(
		'sub_title',
		[
			'label' 		=> esc_html__('Sub Title', 'restan-core'),
			'type' 			=> \Elementor\Controls_Manager::TEXT,
			'label_block' 	=> true,
		]
	);

	$category_list->add_control(
		'image',
		[
			'label'			=> esc_html__('Add Image', 'restan-core'),
			'type' 			=> \Elementor\Controls_Manager::MEDIA,
		]
	);

	$category_list->add_control(
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
			]
		]
	);

	$this->add_control(
		'category_list',
		[
			'label' 	=> esc_html__('Category List', 'restan-core'),
			'type' 		=> \Elementor\Controls_Manager::REPEATER,
			'fields' 	=> $category_list->get_controls(),
			'default' 	=> [
				[
					'list_title' => esc_html__('Add Category', 'restan-core'),
				],
			],
			'title_field' => '{{{ title }}}',
			'condition' => [
				'style' => '2'
			]
		]
	);

	$this->add_control(
		'feature_image_one',
		[
			'label' 	=> esc_html__('Background Image One', 'restan-core'),
			'type' 		=> \Elementor\Controls_Manager::MEDIA,
			'condition' => [
				'style' => ['1']
			]
		]
	);

	$this->add_control(
		'feature_shape_one',
		[
			'label' 	=> esc_html__('Background Shape One', 'restan-core'),
			'type' 		=> \Elementor\Controls_Manager::MEDIA,
			'condition' => [
				'style' => ['1']
			]
		]
	);

	$this->add_control(
		'feature_shape_two',
		[
			'label' 	=> esc_html__('Background Shape Two', 'restan-core'),
			'type' 		=> \Elementor\Controls_Manager::MEDIA,
			'condition' => [
				'style' => ['1']
			]
		]
	);

	$this->end_controls_section();

	include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'feature-style.php';
}

// Output For User
protected function render()
{
	$settings = $this->get_settings_for_display();
	$schedule_list = $settings['schedule_list'];
	$category_list = $settings['category_list'];
	if ($settings['style'] == '1') : ?>
	<!-- Start Our Features One
		============================================= -->
		<div class="top-feature-style-one-area default-padding bg-cover" style="background-image: url(<?php echo esc_url($settings['feature_shape_one']['url']);?>);">
			<div class="shape-bottom-right">
				<?php if (!empty($settings['feature_shape_two']['url'])) : ?>
					<img src="<?php echo esc_url($settings['feature_shape_two']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
				<?php endif; ?>
			</div>
			<div class="container">
				<div class="top-feature-style-one-info">
					<div class="row align-center">

						<div class="col-xl-4 col-lg-6">
							<div class="reservation-style-two mr-50 mr-md-0 mr-xs-0">
								<h2 class="title"><?php echo wp_kses($settings['form_title'], 'restan_allowed_tags'); ?></h2>
								<?php if (!empty($settings['contact_shortcode'])) : ?>
									<?php echo do_shortcode($settings['contact_shortcode']); ?>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-xl-4 col-lg-6">
							<div class="top-feature-style-one-thumb">
								<?php if (!empty($settings['feature_image_one']['url'])) : ?>
									<img src="<?php echo esc_url($settings['feature_image_one']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
								<?php endif; ?>
							</div>
						</div>
						<div class="col-xl-4 col-lg-12 pl-50 pl-md-15 pl-xs-15">
							<div class="opening-hours-hightlight text-light">
								<h2 class="title"><?php echo wp_kses($settings['schedule_title'], 'restan_allowed_tags'); ?></h2>
								<ul>
									<?php
									foreach ($schedule_list as $item) :
										?>
										<li> 
											<span> <?php echo wp_kses($item['date'], 'restan_allowed_tags'); ?> </span>
											<div class="pull-right <?php echo esc_attr(('yes' == $item['status'] ? 'closed' : '')); ?>"> <?php echo wp_kses($item['time'], 'restan_allowed_tags'); ?> </div>
										</li>
										<?php
									endforeach;
									?>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- End Our Features One -->

	<?php elseif ($settings['style'] == '2') : ?>

		<!-- Start Top Feature Two
		============================================= -->
		<div class="feature-style-three-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 pr-80 pr-md-15 pr-xs-15">
						<div class="reservation-form light">
							<?php if (!empty($settings['flat_icon'])) : ?>
								<i class="<?php echo esc_attr($settings['flat_icon']); ?>"></i>
							<?php endif; ?>
							<?php if (!empty($settings['icon_image']['url'])) : ?>
								<img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
							<?php endif; ?>
							<?php
							if (!empty($settings['custom_icon'])) : ?>
								<i class="<?php echo esc_attr($settings['custom_icon']); ?>"></i>
							<?php endif; ?>
							<h3><?php echo wp_kses($settings['form_title'], 'restan_allowed_tags'); ?></h3>
							<?php if (!empty($settings['contact_shortcode'])) : ?>
								<?php echo do_shortcode($settings['contact_shortcode']); ?>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="relative default-padding-top">
							<!-- Navigation -->
							<div class="food-swiper-nav">
								<div class="food-cat-prev"></div>
								<div class="food-cat-next"></div>
							</div>

							<div class="food-cat-items">
								<h2 class="flex-title mb-35">
									<?php if (!empty($settings['category_icon_image']['url'])) : ?>
										<img src="<?php echo esc_url($settings['category_icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
									<?php endif; ?>
									<?php echo wp_kses($settings['category_title'], 'restan_allowed_tags'); ?>
								</h2>
								<div class="food-cat-carousel swiper">
									<!-- Additional required wrapper -->
									<div class="swiper-wrapper">
										<?php
										foreach ($category_list as $item) :
											?>
											<!-- Single Item -->
											<div class="swiper-slide">
												<a href="<?php echo esc_url($item['url']['url']);?>">
													<?php if (!empty($item['image']['url'])) : ?>
														<img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
													<?php endif; ?>
													<div class="overlay">
														<span><?php echo wp_kses($item['sub_title'], 'restan_allowed_tags'); ?></span>
														<h5><?php echo wp_kses($item['title'], 'restan_allowed_tags'); ?></h5>
													</div>
												</a>
											</div>
											<!-- End Single Item -->
											<?php
										endforeach;
										?>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Top Feature Two -->

	<?php
		endif;
	}
}
