<?php

/**
 * Elementor restan Service Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Food_Menu_Tab_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Service widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_food_menu_tab';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Service Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Food Menu Tab', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Service Nav Tab widget icon.
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
	 * Retrieve the list of categories the Service Nav Tab widget belongs to.
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

	public function restan_tab_choose_option()
	{

		$restan_post_query = new WP_Query(array(
			'post_type'				=> 'restan_tab',
			'posts_per_page'	    => -1,
		));

		$restan_tab_title = array();
		$restan_tab_title[''] = __('Select a Service', 'restan');

		while ($restan_post_query->have_posts()) {
			$restan_post_query->the_post();
			$restan_tab_title[get_the_ID()] =  get_the_title();
		}
		wp_reset_postdata();

		return $restan_tab_title;
	}

	// Add The Input For User
	protected function register_controls()
	{

		$this->start_controls_section(
			'restan_food_menu_tab_style',
			[
				'label'		=> esc_html__('Food Menu Tab Style', 'restan-core'),
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
					'3'  	=> esc_html__('Style Three', 'restan-core'),
					'4'  	=> esc_html__('Style Four', 'restan-core'),
				],
			]
		);


		$this->add_control(
			'sec_title',
			[
				'label' 		=> esc_html__('Section Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('section title', 'restan-core'),
				'default' 		=> esc_html__('Default Section Title', 'restan-core'),
				'condition' => [
					'style' => ['1', '2', '3']
				]
			]

		);

		$this->add_control(
			'sec_subtitle',
			[
				'label' 		=> esc_html__('Section Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('section subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default Section SubTitle', 'restan-core'),
				'condition' => [
					'style' => ['1', '2', '3']
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
					'{{WRAPPER}} .sub-title::before,{{WRAPPER}} .sub-heading::before' => 'background-image:url({{URL}});',
				],
				'condition' => [
					'style' => ['3', '1', '2']
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
					'style' => ['3', '1']
				]
			]
		);

		$this->add_control(
			'layout_four_bg_shape',
			[
				'label' => esc_html__('Background Shape', 'agrofa-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'selectors' => [
					'{{WRAPPER}} .food-menu-area.shape-less::before,{{WRAPPER}} .food-menu-area::before' => 'background-image:url({{URL}});',
				],
				'condition' => [
					'style' => ['4', '1']
				]
			]
		);

		$tab_food_menu_list = new \Elementor\Repeater();

		$tab_food_menu_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Dish Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('dish title', 'restan-core'),
				'default' 		=> esc_html__('Default Dish Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$tab_food_menu_list->add_control(
			'restan_tab_builder_option',
			[
				'label'     => __('Tab Name', 'ambrox'),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => $this->restan_tab_choose_option(),
				'default'	=> ''
			]
		);

		$this->add_control(
			'tab_food_menu_list',
			[
				'label' 	=> esc_html__('Food Menu List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $tab_food_menu_list->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Food Menu', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' => [
					'style' => ['1', '4']
				]
			]
		);

		$tab_food_menu_list_two = new \Elementor\Repeater();

		$tab_food_menu_list_two->add_control(
			'title',
			[
				'label' 		=> esc_html__('Dish Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('dish title', 'restan-core'),
				'default' 		=> esc_html__('Default Dish Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$tab_food_menu_list_two->add_control(
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

		$tab_food_menu_list_two->add_control(
			'flat_icon',
			[
				'label'      => esc_html__('Icon One', 'cleanu-core'),
				'type'       => \Elementor\Controls_Manager::ICON,
				'options'    => restan_flaticons(),
				'include'    => restan_include_flaticons(),
				'default'    => 'flaticon-budget',
				'condition' => [
					'icon_style' => '1'
				]
			]
		);

		$tab_food_menu_list_two->add_control(
			'custom_icon',
			[
				'label' 		=> esc_html__('Custom Icon', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' => [
					'icon_style' => '2'
				]
			]
		);


		$tab_food_menu_list_two->add_control(
			'icon_image',
			[
				'label'			=> esc_html__('Add Image Icon', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'icon_style' => '3'
				]
			]
		);


		$tab_food_menu_list_two->add_control(
			'restan_tab_builder_option',
			[
				'label'     => __('Tab Name', 'ambrox'),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => $this->restan_tab_choose_option(),
				'default'	=> ''
			]
		);

		$this->add_control(
			'tab_food_menu_list_two',
			[
				'label' 	=> esc_html__('Food Menu List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $tab_food_menu_list_two->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Food Menu', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' => [
					'style' => ['2', '3']
				]
			]
		);

		$this->add_control(
			'service_shape',
			[
				'label'			=> esc_html__('Shape', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'style' => ['3']
				]
			]
		);

		$this->add_control(
			'background_shape',
			[
				'label' => esc_html__('Background Shape', 'agrofa-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'selectors' => [
					'{{WRAPPER}} .nav.nav-tabs.food-menu-nav.style-two::before' => 'background-image:url({{URL}});',
				],
				'condition' => [
					'style' => ['2']
				]
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'service-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
?>
			<!-- Start Foot Menu 
    ============================================= -->
			<div class="food-menu-area default-padding-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 offset-lg-2">
							<div class="site-heading text-center text-light">
								<h4 class="sub-title">
									<?php echo wp_kses_post($settings['sec_subtitle'], 'restan_kses_allowed_html'); ?></h4>
								<h2 class="title"><?php echo wp_kses_post($settings['sec_title'], 'restan_kses_allowed_html'); ?>
								</h2>
							</div>
						</div>
					</div>
					<div class="food-menu-items text-light">
						<div class="row">
							<div class="col-lg-12 text-center">

								<div class="nav nav-tabs food-menu-nav" id="nav-tab" role="tablist">
									<?php
									$counter = 1;
									foreach ($settings['tab_food_menu_list'] as $item) :
									?>
										<button class="nav-link <?php if ($counter == '1') {
																	echo esc_attr("active");
																} ?>" id="nav-id-<?php echo esc_attr($counter); ?>" data-bs-toggle="tab" data-bs-target="#tab<?php echo esc_attr($counter); ?>" type="button" role="tab" aria-controls="tab<?php echo esc_attr($counter); ?>" aria-selected="true">
											<?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?>
										</button>
									<?php
										$counter++;
									endforeach;
									?>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="tab-content food-menu-tab-content" id="nav-tabContent">
									<?php
									$counter = 1;
									foreach ($settings['tab_food_menu_list'] as $item) :
									?>
										<!-- Tab Single Item -->
										<div class="tab-pane fade <?php if ($counter == '1') {
																		echo esc_attr("show active");
																	} ?>" id="tab<?php echo esc_attr($counter); ?>" role="tabpane<?php echo esc_attr($counter); ?>" aria-labelledby="nav-id-<?php echo esc_attr($counter); ?>">
											<?php
											$elementor = \Elementor\Plugin::instance();
											if (!empty($item['restan_tab_builder_option'])) {
												echo $elementor->frontend->get_builder_content_for_display($item['restan_tab_builder_option']);
											}
											?>
										</div>
										<!-- End Tab Single Item -->
									<?php
										$counter++;
									endforeach;
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End food style one -->

		<?php elseif ($settings['style'] == '2') : ?>

			<!-- Start Food Menu Two
    ============================================= -->
			<div class="food-menu-style-two-area overflow-hidden default-padding bg-gray">
				<div class="container">
					<div class="row align-center">
						<div class="col-lg-4">
							<div class="nav nav-tabs text-light food-menu-nav style-two" id="nav-tab" role="tablist">

								<h4 class="sub-heading">
									<?php echo wp_kses_post($settings['sec_subtitle'], 'restan_kses_allowed_html'); ?></h4>
								<h2 class="title"><?php echo wp_kses_post($settings['sec_title'], 'restan_kses_allowed_html'); ?>
								</h2>
								<?php
								$counter = 1;
								foreach ($settings['tab_food_menu_list_two'] as $item) :
								?>
									<button class="nav-link <?php if ($counter == '1') {
																echo esc_attr("active");
															} ?>" id="nav-id-<?php echo esc_attr($counter); ?>" data-bs-toggle="tab" data-bs-target="#tab<?php echo esc_attr($counter); ?>" type="button" role="tab" aria-controls="tab<?php echo esc_attr($counter); ?>" aria-selected="true">
										<?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?>
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
									</button>
								<?php
									$counter++;
								endforeach;
								?>
							</div>
						</div>
						<div class="col-lg-7 offset-lg-1">
							<div class="tab-content food-menu-tab-content style-two" id="nav-tabContent">
								<?php
								$counter = 1;
								foreach ($settings['tab_food_menu_list_two'] as $item) :
								?>
									<!-- Tab Single Item -->
									<div class="tab-pane fade <?php if ($counter == '1') {
																	echo esc_attr("show active");
																} ?>" id="tab<?php echo esc_attr($counter); ?>" role="tabpanel" aria-labelledby="nav-id-<?php echo esc_attr($counter); ?>">
										<?php
										$elementor = \Elementor\Plugin::instance();
										if (!empty($item['restan_tab_builder_option'])) {
											echo $elementor->frontend->get_builder_content_for_display($item['restan_tab_builder_option']);
										}
										?>
									</div>
									<!-- End Tab Single Item -->
								<?php
									$counter++;
								endforeach;
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Food Menu Two -->

		<?php elseif ($settings['style'] == '3') : ?>

			<!-- Start Foot Menu 
    ============================================= -->
			<div class="food-menu-style-four-area overflow-hidden default-padding bg-gray">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 offset-lg-2">
							<div class="site-heading text-center">
								<h4 class="sub-title">
									<?php echo wp_kses_post($settings['sec_subtitle'], 'restan_kses_allowed_html'); ?></h4>
								<h2 class="title"><?php echo wp_kses_post($settings['sec_title'], 'restan_kses_allowed_html'); ?>
								</h2>
							</div>
						</div>
					</div>
					<div class="food-menu-style-four-items">
						<div class="upDownScrol animate-up-down">
							<?php if (!empty($settings['service_shape']['url'])) : ?>
								<img src="<?php echo esc_url($settings['service_shape']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
							<?php endif; ?>
						</div>
						<div class="row">
							<div class="col-lg-12 text-center">

								<div class="nav nav-tabs food-menu-nav style-three four" id="nav-tab" role="tablist">
									<?php
									$counter = 1;
									foreach ($settings['tab_food_menu_list_two'] as $item) :
									?>
										<button class="nav-link <?php if ($counter == '1') {
																	echo esc_attr("active");
																} ?>" id="nav-id-<?php echo esc_attr($counter); ?>" data-bs-toggle="tab" data-bs-target="#tab<?php echo esc_attr($counter); ?>" type="button" role="tab" aria-controls="tab<?php echo esc_attr($counter); ?>" aria-selected="true">
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
											<?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?>
										</button>
									<?php
										$counter++;
									endforeach;
									?>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="tab-content food-style-four-content" id="nav-tabContent">
									<?php
									$counter = 1;
									foreach ($settings['tab_food_menu_list_two'] as $item) :
									?>
										<!-- Tab Single Item -->
										<div class="tab-pane fade <?php if ($counter == '1') {
																		echo esc_attr("show active");
																	} ?>" id="tab<?php echo esc_attr($counter); ?>" role="tabpanel" aria-labelledby="nav-id-<?php echo esc_attr($counter); ?>">
											<?php
											$elementor = \Elementor\Plugin::instance();
											if (!empty($item['restan_tab_builder_option'])) {
												echo $elementor->frontend->get_builder_content_for_display($item['restan_tab_builder_option']);
											}
											?>

										</div>
										<!-- End Tab Single Item -->
									<?php
										$counter++;
									endforeach;
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Food Menu -->

		<?php elseif ($settings['style'] == '4') : ?>

			<!-- Start Foot Menu 
    ============================================= -->
			<div class="food-menu-area shape-less default-padding-top">
				<div class="container">

					<div class="food-menu-items text-light">
						<div class="row">
							<div class="col-lg-12 text-center">

								<div class="nav nav-tabs food-menu-nav" id="nav-tab" role="tablist">

									<?php
									$counter = 1;
									foreach ($settings['tab_food_menu_list'] as $item) :
									?>
										<button class="nav-link <?php if ($counter == '1') {
																	echo esc_attr("active");
																} ?>" id="nav-id-<?php echo esc_attr($counter); ?>" data-bs-toggle="tab" data-bs-target="#tab<?php echo esc_attr($counter); ?>" type="button" role="tab" aria-controls="tab<?php echo esc_attr($counter); ?>" aria-selected="true">
											<?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?>
										</button>
									<?php
										$counter++;
									endforeach;
									?>

								</div>
							</div>
							<div class="col-lg-12">
								<div class="tab-content food-menu-tab-content" id="nav-tabContent">

									<!-- Tab Single Item -->
									<?php
									$counter = 1;
									foreach ($settings['tab_food_menu_list'] as $item) :
									?>
										<!-- Tab Single Item -->
										<div class="tab-pane fade <?php if ($counter == '1') {
																		echo esc_attr("show active");
																	} ?>" id="tab<?php echo esc_attr($counter); ?>" role="tabpane<?php echo esc_attr($counter); ?>" aria-labelledby="nav-id-<?php echo esc_attr($counter); ?>">
											<?php
											$elementor = \Elementor\Plugin::instance();
											if (!empty($item['restan_tab_builder_option'])) {
												echo $elementor->frontend->get_builder_content_for_display($item['restan_tab_builder_option']);
											}
											?>
										</div>
										<!-- End Tab Single Item -->
									<?php
										$counter++;
									endforeach;
									?>
									<!-- End Tab Single Item -->

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Food Menu -->

<?php
		endif;
	}
}
