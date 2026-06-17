<?php

/**
 * Elementor restan teams Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Team_Widget extends \Elementor\Widget_Base
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
		return 'restan_team';
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
		return esc_html__('Team Member', 'restan-core');
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
			'restan_team_style',
			[
				'label'		=> esc_html__('Team Style', 'restan-core'),
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
			'sec_title',
			[
				'label' 		=> esc_html__('Section Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'rows' => 	'2',
				'condition'		=> ['style'	=>	['1']],
			]
		);
		$this->add_control(
			'sec_subtitle',
			[
				'label' 		=> esc_html__('Section Subtitle', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default SubTitle', 'restan-core'),
				'rows' => 	'2',
				'condition'		=> ['style'	=>	['1']],
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
		$repeater->add_control(
			'designation',
			[
				'label' 		=> esc_html__('Designation', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('designation', 'restan-core'),
				'default' 		=> esc_html__('Default Designation', 'restan-core'),
				'label_block' 	=> true,
				'rows' => 	'2',
			]
		);

		$repeater->add_control(
			'team_image',
			[
				'label'			=> esc_html__('Add Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'team_url',
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

		$repeater->add_control(
			'social_network',
			[
				'label' => __('Social NetWork', 'insur-addon'),
				'type' => \Elementor\Controls_Manager::CODE,
				'label_block' => true,
				'default' => wp_kses('<li class="facebook"> <a class="facebook" href="#"> <i class="fab fa-facebook-f"></i> </a> </li>', 'restan_kses_allowed_html')
			]
		);

		$this->add_control(
			'team_list',
			[
				'label' 	=> esc_html__('Team List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'prevent_empty' => 'false',
				'title_field' => '{{{ name }}}',
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'team-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
	?>

	<!-- Start Chef Area 
    ============================================= -->
    <div class="chef-area default-padding bg-gray text-center">
        <div class="container">

        	<?php if (!empty($settings['sec_subtitle'] || $settings['sec_title'])) : ?>
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                        <h4 class="sub-title"><?php echo wp_kses_post($settings['sec_subtitle'], 'restan_kses_allowed_html'); ?></h4>
	                        <h2 class="title"><?php echo wp_kses_post($settings['sec_title'], 'restan_kses_allowed_html'); ?></h2>
	                    </div>
	                </div>
	            </div>
			<?php endif; ?>
            <div class="row">
            	<?php
					foreach ($settings['team_list'] as $item) : ?>
                <!-- Single Item -->
                <div class="col-xl-4 col-lg-6">
                    <div class="chef-style-one">
                        <div class="chef-thumb">
                            <?php
								if (!empty($item['team_image']['url'])) :
									echo restan_img_tag(array(
										'url'   => esc_url($item['team_image']['url'])
									));
								endif;
							?>
                            <div class="info">
                               <h4><a href="<?php echo esc_url($item['team_url']['url']); ?>"><?php echo wp_kses_post($item['name'], 'restan_kses_allowed_html'); ?></a></h4>
                                <span><?php echo wp_kses_post($item['designation'], 'restan_kses_allowed_html'); ?></span>
                            </div>
                            <?php if (!empty($item['social_network'])) : ?>
	                            <ul class="social">
	                                <?php echo wp_kses_post($item['social_network'], 'restan_kses_allowed_html'); ?>
	                            </ul>
                        	<?php endif;?>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <?php 
					endforeach; ?>
            </div>
        </div>
    </div>
    <!-- End Chef Area -->

	<?php elseif($settings['style'] == '2'): ?>

    <!-- Start Chef Area Two
    ============================================= -->
    <div class="chef-area default-padding text-center">
        <div class="container">

            <div class="row">
                <?php
					foreach ($settings['team_list'] as $item) : ?>
                <!-- Single Item -->
                <div class="col-xl-4 col-lg-6">
                    <div class="chef-style-one">
                        <div class="chef-thumb">
                            <?php
								if (!empty($item['team_image']['url'])) :
									echo restan_img_tag(array(
										'url'   => esc_url($item['team_image']['url'])
									));
								endif;
							?>
                            <div class="info">
                               <h4><a href="<?php echo esc_url($item['team_url']['url']); ?>"><?php echo wp_kses_post($item['name'], 'restan_kses_allowed_html'); ?></a></h4>
                                <span><?php echo wp_kses_post($item['designation'], 'restan_kses_allowed_html'); ?></span>
                            </div>
                            <?php if (!empty($item['social_network'])) : ?>
	                            <ul class="social">
	                                <?php echo wp_kses_post($item['social_network'], 'restan_kses_allowed_html'); ?>
	                            </ul>
                        	<?php endif;?>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <?php 
					endforeach; ?>
               
            </div>
        </div>
    </div>
    <!-- End Chef Area Two -->
<?php
		endif;
	}
}
