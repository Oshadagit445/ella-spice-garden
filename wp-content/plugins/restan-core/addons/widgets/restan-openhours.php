<?php

/**
 * Elementor Restan Open Hours Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Open_Hours_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Open Hours widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_open_hours';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Open Hours Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Open Hours', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Open Hours Nav Tab widget icon.
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
	 * Retrieve the list of categories the Open Hours Nav Tab widget belongs to.
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
			'Open Hours_content_style',
			[
				'label'		=> esc_html__('Open Hours Style', 'restan-core'),
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
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('title', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Sub-Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default Sub-Title', 'restan-core'),
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'heading_text',
			[
				'label' 		=> esc_html__('Heading Text', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('Heading Text', 'restan-core'),
				'default' 		=> esc_html__('Heading Text', 'restan-core'),
				'condition' => [
					'style' => ['1']
				]
			]
		);


		$open_hours_list = new \Elementor\Repeater();

		$open_hours_list->add_control(
			'date',
			[
				'label' 		=> esc_html__('Date', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('Date', 'restan-core'),
				'default' 		=> esc_html__('Default Date', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$open_hours_list->add_control(
			'time',
			[
				'label' 		=> esc_html__('Time', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('Time', 'restan-core'),
				'default' 		=> esc_html__('Default Time', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'open_hours_list',
			[
				'label' 	=> esc_html__('Open Hours List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $open_hours_list->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Open Hours List', 'restan-core'),
					],
				],
				'title_field' => '{{{ date }}}',
				'condition' => [
					'style' => '1'
				]
			]
		);

		$this->add_control(
			'info_title',
			[
				'label' 		=> esc_html__('Info Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '2',
				'placeholder' 	=> esc_html__('Info Title', 'restan-core'),
				'default' 		=> esc_html__('Default Info Title', 'restan-core'),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'info_number',
			[
				'label' 		=> esc_html__('Info Number', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('Info Number', 'restan-core'),
				'rows' 			=> '2',
				'default' 		=> esc_html__('Default Info Number', 'restan-core'),
				'label_block' 	=> true,
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
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'shape_image_one',
			[
				'label'			=> esc_html__('Add Shape Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'icon_image',
			[
				'label'			=> esc_html__('Add Icon Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'open-hours-style.php';

	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
	?>
     <!-- Start Opening Hours 
    ============================================= -->
    <div class="opening-hours-area default-padding overflow-hidden">
        <div class="container">
            <div class="opening-hour-items">
                <?php if (!empty($settings['heading_text'])) : ?>
		            <h2 class="text-fixed"><?php echo wp_kses_post($settings['heading_text'], 'restan_kses_allowed_html'); ?></h2>
		        <?php endif;?>
		        <?php if(!empty($settings['shape_image_one']['url'])):?>
	                <div class="shape">
	                   	<?php
							if (!empty($settings['shape_image_one']['url'])) :
								echo restan_img_tag(array(
									'url'   => esc_url($settings['shape_image_one']['url'])
								));
							endif;
						?>
	                </div>
            	<?php endif;?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="opening-hours-thumb video-bg-live">
                           	<?php
								if (!empty($settings['bg_image_one']['url'])) :
									echo restan_img_tag(array(
										'url'   => esc_url($settings['bg_image_one']['url'])
									));
								endif;
							?>
                            <div class="player" data-property="{videoURL:'0Fs-4GiNxQ8',containment:'.video-bg-live', showControls:false, autoPlay:true, zoom:0, loop:true, mute:true, startAt:654, opacity:1, quality:'default'}"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="opening-hours-info">
                            <h3><?php echo wp_kses_post($settings['title'], 'restan_kses_allowed_html'); ?></h3>
                            <p>
                              <?php echo wp_kses_post($settings['subtitle'], 'restan_kses_allowed_html'); ?>
                            </p>
                            <?php if(!empty($settings['open_hours_list'])):?>
	                            <ul class="opening-hours-table">
									<?php
										foreach ($settings['open_hours_list'] as $item) :
									?>
	                                <li>
	                                    <h6> <?php echo wp_kses_post($item['date'], 'restan_kses_allowed_html'); ?></h6> <span> <?php echo wp_kses_post($item['time'], 'restan_kses_allowed_html'); ?></span>
	                                </li>
	                                <?php endforeach;?>
	                            </ul>
                        	<?php endif?>
                        	<?php if(!empty($settings['info_title'] || $settings['info_number'])):?>
	                            <div class="call-to-action">
	                                <div class="icon">
	                                    <?php
											if (!empty($settings['icon_image']['url'])) :
												echo restan_img_tag(array(
													'url'   => esc_url($settings['icon_image']['url'])
												));
											endif;
										?>
	                                </div>
	                                <div class="info">
	                                    <p><?php echo wp_kses_post($settings['info_title'], 'restan_kses_allowed_html'); ?></p>
	                                    <h4><?php echo wp_kses_post($settings['info_number'], 'restan_kses_allowed_html'); ?></h4>
	                                </div>
	                            </div>
                        	<?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End  Open Hours Style One -->
	<?php
		endif;
	}
}
