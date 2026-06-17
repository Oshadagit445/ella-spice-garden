<?php

/**
 * Elementor restan big deal Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Big_Deal_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve big deal widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_big_deal';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve big deal Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Big Deal', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve big deal Nav Tab widget icon.
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
	 * Retrieve the list of categories the big deal Nav Tab widget belongs to.
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
			'big_deal_content_style',
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
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'      	=> '2',
        		'default' => __('Default Title', 'sifoxen-addon'),
				'label_block' 	=> true,
				'condition' => [
					'style' => '1'
				]
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' 		=> esc_html__('Sub Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'      	=> '2',
        		'default' => __('Default Sub Title', 'sifoxen-addon'),
				'label_block' 	=> true,
				'condition' => [
					'style' => '1'
				]
			]
		);

		$this->add_control(
		    'subtitle_shape',
		    [
		        'label' => esc_html__('Subtitle Shape', 'agrofa-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .sub-heading::before' => 'background-image:url({{URL}});',
		        ],
		        'condition' => [
					'style' => '1'
				]
		    ]
		);

		$this->add_control(
			'summary',
			[
				'label' 		=> esc_html__('Summary', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'      	=> '2',
        		'default' => __('Default Summary', 'sifoxen-addon'),
				'label_block' 	=> true,
				'condition' => [
					'style' => '1'
				]
			]
		);

		$this->add_control(
			'badge_text',
			[
				'label' 		=> esc_html__('Badge Text', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'      	=> '2',
        		'default' => __('Default Badge Text', 'sifoxen-addon'),
				'label_block' 	=> true,
				'condition' => [
					'style' => '1'
				]
			]
		);

		$this->add_control(
			'button_label',
			[
				'label' 	=> __('Button Label', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Button Label', 'restan-core'),
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
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
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
		    'image_one',
		    [
		        'label' => __('Image One', 'sifoxen-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'condition' => [
					'style' => '1'
				]
		    ]
		);

		$this->add_control(
		    'image_two',
		    [
		        'label' => __('Image Two', 'sifoxen-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'condition' => [
					'style' => '1'
				]
		    ]
		);

		$this->add_control(
		    'image_three',
		    [
		        'label' => __('Image Three', 'sifoxen-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'condition' => [
					'style' => '1'
				]
		    ]
		);

		$this->add_control(
		    'bg_image_one',
		    [
		        'label' => __('Background Image', 'sifoxen-addon'),
		        'type' => \Elementor\Controls_Manager::MEDIA,
		        'default' => [
		            'url' => \Elementor\Utils::get_placeholder_image_src(),
		        ],
		        'condition' => [
					'style' => '1'
				]
		    ]
		);

		$big_deal_list = new \Elementor\Repeater();

		$big_deal_list->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '1',
				'label_block' 	=> true,
			]
		);

		$big_deal_list->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__('Sub Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$big_deal_list->add_control(
			'price',
			[
				'label' 		=> esc_html__('Price', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> '1',
				'label_block' 	=> true,
			]
		);

		$big_deal_list->add_control(
			'image',
			[
				'label'			=> esc_html__('Add Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$big_deal_list->add_control(
			'shape',
			[
				'label'			=> esc_html__('Add Shape', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$big_deal_list->add_control(
			'button_label',
			[
				'label' 	=> __('Button Label', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default'  	=> __('Button Label', 'restan-core'),
			]
		);

		$big_deal_list->add_control(
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
			'big_deal_list',
			[
				'label' 	=> esc_html__('Big Deal List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $big_deal_list->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__('Add Big Deal', 'restan-core'),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' => [
					'style' => '2'
				]
			]
		);

		$this->end_controls_section();

		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'big-deal-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
	?>

     <!-- Start Big Deal
    ============================================= -->
    <div class="big-deal-area">
        <div class="container">
            <div class="deal-style-one-items" style="background-image: url(<?php echo esc_url($settings['bg_image_one']['url']);?>);">
                <div class="row align-center">
                    <div class="col-lg-6 pr-80 pr-md-15 pr-xs-15">
                        <div class="deal-thumb">
                            <?php if (!empty($settings['image_one']['url'])) : ?>
								<img src="<?php echo esc_url($settings['image_one']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
							<?php endif; ?>

							<?php if (!empty($settings['image_two']['url'])) : ?>
								<img src="<?php echo esc_url($settings['image_two']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
							<?php endif; ?>

							<?php if (!empty($settings['image_three']['url'])) : ?>
								<img src="<?php echo esc_url($settings['image_three']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
							<?php endif; ?>

                            <div class="offer-badge animate" data-animate="zoomIn">
                                <?php echo wp_kses($settings['badge_text'], 'restan_allowed_tags'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="deal-info">
                            <h4 class="sub-heading"><?php echo wp_kses($settings['sub_title'], 'restan_allowed_tags'); ?></h4>
                            <h2><?php echo wp_kses($settings['title'], 'restan_allowed_tags'); ?></h2>
                            <p>
                               <?php echo wp_kses($settings['summary'], 'restan_allowed_tags'); ?>
                            </p>
                            <?php if(!empty($settings['button_label'])):?>
                            	<a class="btn btn-theme circle btn-md animation" href="<?php echo esc_url($settings['url']['url']);?>"><?php echo wp_kses($settings['button_label'], 'restan_allowed_tags'); ?></a>
                        	<?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Big Deal -->

    <?php elseif ($settings['style'] == '2'): ?>
    <!-- Start Best Deal
    ============================================= -->
    <div class="best-deal-style-one-area bg-dark default-padding">
        <div class="container">
            <div class="row">
            	<?php
            		$counter = 1;
					foreach ($settings['big_deal_list'] as $item) : 
				?>
	                <div class="col-xl-6 best-deal-style-one">
	                    <div class="best-deal-style-one-item">
	                       	<?php if (!empty($item['image']['url'])) : ?>
								<img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
							<?php endif; ?>
							<?php if($counter == '1'):?>
		                        <div class="offer">
		                            <h2><?php echo wp_kses($item['price'], 'restan_allowed_tags'); ?></h2>
		                            <?php if (!empty($item['shape']['url'])) : ?>
										<img src="<?php echo esc_url($item['shape']['url']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
									<?php endif; ?>
		                        </div>
	                        <?php else:?>
		                        <div class="item-discount">
		                            <h2><?php echo wp_kses($item['price'], 'restan_allowed_tags'); ?></h2>
		                        </div>
	                    	<?php endif;?>
	                        <div class="info">
	                            <div class="top">
	                                <h4><?php echo wp_kses($item['subtitle'], 'restan_allowed_tags'); ?></h4>
	                                <h2><?php echo wp_kses($item['title'], 'restan_allowed_tags'); ?></h2>
	                            </div>

	                            <?php if(!empty($item['button_label'])):?>
		                            <div class="button">
		                                <a class="btn btn-md circle btn-<?php if($counter == '1'){echo esc_attr__("light",'restan-core'); }else {echo esc_attr__("theme",'restan-core');}?> animation" href="<?php echo esc_url($item['url']['url']); ?>"><?php echo wp_kses($item['button_label'], 'restan_allowed_tags'); ?></a>
		                            </div>
	                       	 	<?php endif;?>
	                        </div>
	                    </div>
	                </div>
                <?php 
                	$counter ++;
					endforeach;
				?>
            </div>
        </div>
    </div>
    <!-- End Best Deal -->	
	<?php
		endif;
	}
}