<?php

/**
 * Elementor restan teams Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Team_Deatils_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve teams widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_team_details';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve teams Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Team Details', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve teams Nav Tab widget icon.
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
	 * Retrieve the list of categories the teams Nav Tab widget belongs to.
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
			'restan_team_top_content',
			[
				'label'		=> esc_html__('Team Top Content', 'restan-core'),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'name',
			[
				'label' 		=> esc_html__('Name', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('name', 'restan-core'),
				'default' 		=> esc_html__('Default Name', 'restan-core'),
				'rows' => 	'2',
			]
		);

		$this->add_control(
			'designation',
			[
				'label' 		=> esc_html__('Designation', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('designation', 'restan-core'),
				'default' 		=> esc_html__('Default Sesignation', 'restan-core'),
				'rows' => 	'2',
			]
		);

		$this->add_control(
			'image',
			[
				'label'			=> esc_html__('Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'summary',
			[
				'label' 		=> esc_html__('Summary', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('summary', 'restan-core'),
				'default' 		=> esc_html__('Default Summary', 'restan-core'),
				'rows' => 	'4',
			]
		);

		$contact_info_list = new \Elementor\Repeater();

		$contact_info_list->add_control(
			'content',
			[
				'label' 		=> esc_html__('Content', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('content', 'restan-core'),
				'default' 		=> esc_html__('Default Content', 'restan-core'),
				'rows' => 	'2',
			]
		);

		$contact_info_list->add_control(
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

		$contact_info_list->add_control(
			'flat_icon',
			[
				'label'      => esc_html__('Icon One', 'cleanu-core'),
				'type'       => \Elementor\Controls_Manager::ICON,
				'options'    => restan_flaticons(),
				'include'    => restan_include_flaticons(),
				'default'    => 'fas fa-map-marker-alt',
				'condition' => [
					'icon_style' => '1'
				]
			]
		);

		$contact_info_list->add_control(
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


		$contact_info_list->add_control(
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
				'label' => __('Contact Info List', 'apsro-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $contact_info_list->get_controls(),
				'prevent_empty' => false,
				'default' => [
					[
						'social_url' => [
							'url' => '#',
							'is_external' => false,
							'nofollow' => false,
						],
					],
				],
			]
		);


		$this->add_control(
			'contact_button_label',
			[
				'label' 		=> esc_html__('Button Label', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__('button label', 'restan-core'),
				'default' 		=> esc_html__('Button Label', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'contact_url',
			[
				'label' 		=> esc_html__('URL', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__('https://your-link.com', 'restan-core'),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$social = new \Elementor\Repeater();

		$social->add_control(
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

		$social->add_control(
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

		$social->add_control(
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


		$social->add_control(
			'icon_image',
			[
				'label'			=> esc_html__('Add Image Icon', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'icon_style' => '3'
				]
			]
		);

		$social->add_control(
			'url',
			[
				'label' => __('Add Url', 'apsro-addon'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('#', 'apsro-addon'),
				'show_external' => false,
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
				'show_label' => false,
			]
		);

		$this->add_control(
			'social_list',
			[
				'label' => __('Social List', 'apsro-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $social->get_controls(),
				'prevent_empty' => false,
				'default' => [
					[
						'social_url' => [
							'url' => '#',
							'is_external' => false,
							'nofollow' => false,
						],
					],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'restan_team_bottom_content',
			[
				'label'		=> esc_html__('Team Bottom Content', 'restan-core'),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'education_heading',
			[
				'label' 		=> esc_html__('Education Heading', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('education heading', 'restan-core'),
				'default' 		=> esc_html__('Default Education Heading', 'restan-core'),
				'rows' => 	'1',
			]
		);

		$education_list = new \Elementor\Repeater();

		$education_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'rows' => 	'2',
			]
		);

		$education_list->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default Subtitle', 'restan-core'),
				'label_block' 	=> true,
				'rows' => 	'2',
			]
		);

		$education_list->add_control(
			'year',
			[
				'label' 		=> esc_html__('Year', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('year', 'restan-core'),
				'default' 		=> esc_html__('Default Year', 'restan-core'),
				'label_block' 	=> true,
				'rows' => 	'1',
			]
		);

		$this->add_control(
			'education_list',
			[
				'label' 	=> esc_html__('Education List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $education_list->get_controls(),
				'prevent_empty' => false,
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'education_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'experiance_heading',
			[
				'label' 		=> esc_html__('Experiance Heading', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('experiance heading', 'restan-core'),
				'default' 		=> esc_html__('Default Experiance Heading', 'restan-core'),
				'rows' => 	'1',
			]
		);

		$experiance_list = new \Elementor\Repeater();

		$experiance_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'rows' => 	'2',
			]
		);

		$experiance_list->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default Subtitle', 'restan-core'),
				'label_block' 	=> true,
				'rows' => 	'2',
			]
		);

		$experiance_list->add_control(
			'year',
			[
				'label' 		=> esc_html__('Year', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('year', 'restan-core'),
				'default' 		=> esc_html__('Default Year', 'restan-core'),
				'label_block' 	=> true,
				'rows' => 	'1',
			]
		);

		$this->add_control(
			'experiance_list',
			[
				'label' 	=> esc_html__('Experiance List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $experiance_list->get_controls(),
				'prevent_empty' => false,
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'progress_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'progress_heading',
			[
				'label' 		=> esc_html__('Progress Heading', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('progress heading', 'restan-core'),
				'default' 		=> esc_html__('Default Progress Heading', 'restan-core'),
				'rows' => 	'1',
			]
		);

		$progress_list = new \Elementor\Repeater();

		$progress_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'rows' => 	'2',
			]
		);

		$progress_list->add_control(
			'number',
			[
				'label' 		=> esc_html__('Number', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__('number', 'restan-core'),
				'default' 		=> esc_html__('88', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$progress_list->add_control(
			'operator',
			[
				'label' 		=> esc_html__('Operator', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__('operator', 'restan-core'),
				'default' 		=> esc_html__('%', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'progress_list',
			[
				'label' 	=> esc_html__('Progress List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $progress_list->get_controls(),
				'prevent_empty' => false,
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'team-details-style.php';
	}

	// Output For User
	protected function render()
	{
		$restan_team_deatils_output = $this->get_settings_for_display();
	?>
	<!-- Start Chef Single Area
    ============================================= -->
    <div class="chef-single-area bg-gray default-padding-top">
        <div class="container">
            <div class="chef-content-top">
                <div class="row align-center">
                	<?php if (!empty($restan_team_deatils_output['image']['url'])) : ?>
	                    <div class="col-lg-5 left-info">
	                        <div class="thumb">
	                            <img src="<?php echo esc_url($restan_team_deatils_output['image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
	                        </div>
	                    </div>
                	<?php endif;?>
                    <div class="col-lg-7 right-info pl-80 pl-md-15 pl-xs-15">
                        <h2><?php echo wp_kses_post($restan_team_deatils_output['name'], 'restan_kses_allowed_html'); ?></h2>
                        <p>
                           <?php echo wp_kses_post($restan_team_deatils_output['summary'], 'restan_kses_allowed_html'); ?>
                        </p>
                        <ul>
							<?php
								foreach ($restan_team_deatils_output['contact_info_list'] as $single_item) :
							?>
	                            <li>
	                               <?php if (!empty($single_item['flat_icon'])) : ?>
										<i class="<?php echo esc_attr($single_item['flat_icon']); ?>"></i>
									<?php endif; ?>
									<?php if (!empty($single_item['icon_image']['url'])) : ?>
										<img src="<?php echo esc_url($single_item['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
									<?php endif; ?>
									<?php
									if (!empty($single_item['custom_icon'])) : ?>
										<i class="<?php echo esc_attr($single_item['custom_icon']); ?>"></i>
									<?php endif; ?>
	                                <p>
	                                    <?php echo wp_kses_post($single_item['content'], 'restan_kses_allowed_html'); ?>
	                                </p>
	                            </li>
	                        <?php endforeach; ?>   
                        </ul>
                        <div class="social">
                            <?php if (!empty($restan_team_deatils_output['contact_button_label'])) : ?>
								<a class="btn circle btn-sm btn-theme animation" href="<?php echo esc_url($restan_team_deatils_output['contact_url']['url']); ?>"><?php echo wp_kses_post($restan_team_deatils_output['contact_button_label'], 'restan_kses_allowed_html'); ?></a>
							<?php endif; ?>
                            <div class="share-link">
                                <i class="fas fa-share-alt"></i>
                                <ul>
                                	<?php
										foreach ($restan_team_deatils_output['social_list'] as $single_item) :
									?>
	                                    <li class="facebook">
	                                        <a href="<?php echo esc_url($single_item['url']['url']); ?>">
												<?php if (!empty($single_item['flat_icon'])) : ?>
													<i class="<?php echo esc_attr($single_item['flat_icon']); ?>"></i>
												<?php endif; ?>
												<?php if (!empty($single_item['icon_image']['url'])) : ?>
													<img src="<?php echo esc_url($single_item['icon_image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
												<?php endif; ?>
												<?php
												if (!empty($single_item['custom_icon'])) : ?>
													<i class="<?php echo esc_attr($single_item['custom_icon']); ?>"></i>
												<?php endif; ?>
											</a>
	                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-info bg-light default-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="chef-single-list">

	                            <div class="chef-list-item">
	                                <h4><?php echo wp_kses_post($restan_team_deatils_output['progress_heading'], 'restan_kses_allowed_html'); ?></h4>
	                                <ul>
	                                	<?php foreach ($restan_team_deatils_output['education_list'] as $item) : ?>
		                                    <li>
		                                        <h5><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></h5>
		                                        <span><?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?></span>
		                                        <p>
		                                            <?php echo wp_kses_post($item['year'], 'restan_kses_allowed_html'); ?>
		                                        </p>
		                                    </li>
	                                  	<?php endforeach; ?>
	                                </ul>
	                            </div>

	                            <div class="chef-list-item">
	                                <h4><?php echo wp_kses_post($restan_team_deatils_output['experiance_heading'], 'restan_kses_allowed_html'); ?></h4>
	                                <ul>
	                                	<?php foreach ($restan_team_deatils_output['experiance_list'] as $item) : ?>
		                                    <li>
		                                        <h5><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></h5>
		                                        <span><?php echo wp_kses_post($item['subtitle'], 'restan_kses_allowed_html'); ?></span>
		                                        <p>
		                                            <?php echo wp_kses_post($item['year'], 'restan_kses_allowed_html'); ?>
		                                        </p>
		                                    </li>
	                                   	<?php endforeach; ?>
	                                </ul>
	                            </div>
                        </div>
                    </div>
                    <?php if (!empty($restan_team_deatils_output['progress_list'])) : ?>
	                    <div class="col-lg-6">
	                        <div class="skill-items">
	                            <h3><?php echo wp_kses_post($restan_team_deatils_output['progress_heading'], 'restan_kses_allowed_html'); ?></h3>
	                            <!-- Progress Bar Start -->
								<?php foreach ($restan_team_deatils_output['progress_list'] as $item) : ?>
		                            <div class="progress-box">
		                                <h5><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></h5>
		                                <div class="progress">
		                                    <div class="progress-bar" role="progressbar" data-width="<?php echo esc_attr($item['number']); ?>">
		                                         <span><?php echo wp_kses_post($item['number'], 'restan_kses_allowed_html'); ?><?php echo wp_kses_post($item['operator'], 'restan_kses_allowed_html'); ?></span>
		                                    </div>
		                                </div>
		                            </div>
	                            <?php endforeach; ?>
	                            <!-- End Progressbar -->
	                        </div>
	                    </div>
                	<?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Chef Single Area -->

<?php
	}
}
