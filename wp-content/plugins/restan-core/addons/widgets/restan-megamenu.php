<?php

/**
 * Elementor restan gallery Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Megamenu_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve gallery widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_megamenu';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve gallery Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Megamenu', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve gallery Nav Tab widget icon.
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
	 * Retrieve the list of categories the gallery Nav Tab widget belongs to.
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
			'restan_megamenu_style',
			[
				'label'		=> esc_html__('Megamenu Style', 'restan-core'),
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

		$megamenu = new \Elementor\Repeater();

		$megamenu->add_control(
			'title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('name', 'restan-core'),
				'default' 		=> esc_html__('Default Title', 'restan-core'),
				'rows' => 	'2',
			]
		);

		$megamenu->add_control(
			'url',
			[
				'label' 		=> esc_html__('URL', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__('https://your-link.com', 'restan-core'),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				]
			]
		);
		

		$megamenu->add_control(
			'image',
			[
				'label'			=> esc_html__('Add Image', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$megamenu->add_control(
			'button_one_label',
			[
				'label' 		=> esc_html__('Button One Label', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('Button One Label', 'restan-core'),
				'default' 		=> esc_html__('Button One Label', 'restan-core'),
				'rows' => 	'2',
			]
		);

		$megamenu->add_control(
			'button_one_url',
			[
				'label' 		=> esc_html__('Button One URL', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__('https://your-link.com', 'restan-core'),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				]
			]
		);

		$megamenu->add_control(
			'button_two_label',
			[
				'label' 		=> esc_html__('Button Two Label', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'placeholder' 	=> esc_html__('Button Two Label', 'restan-core'),
				'default' 		=> esc_html__('Button Two Label', 'restan-core'),
				'rows' => 	'2',
			]
		);

		$megamenu->add_control(
			'button_two_url',
			[
				'label' 		=> esc_html__('Button Two URL', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__('https://your-link.com', 'restan-core'),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				]
			]
		);
		
		$this->add_control(
			'megamenu_list',
			[
				'label' 	=> esc_html__('Megamenu List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $megamenu->get_controls(),
				'prevent_empty' => 'false',
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
	?>

	<!-- Start Gallery 
    ============================================= -->
    
    
            <div class="col-menu-wrap">
            	<?php
					foreach ($settings['megamenu_list'] as $item) : 
				?>
	                <div class="col-item">
	                    <div class="menu-thumb">
	                       	<?php
								if (!empty($item['image']['url'])) :
									echo restan_img_tag(array(
										'url'   => esc_url($item['image']['url'])
									));
								endif;
							?>
	                        <div class="overlay">
	                        	<?php if(!empty($item['button_one_label'])):?>
	                            	<a href="<?php echo esc_url($item['button_one_url']['url']); ?>"><?php echo wp_kses_post($item['button_one_label'], 'restan_kses_allowed_html'); ?></a>
	                        	<?php endif;?>
	                        	<?php if(!empty($item['button_one_label'])):?>
	                            	<a href="<?php echo esc_url($item['button_two_url']['url']); ?>"><?php echo wp_kses_post($item['button_two_label'], 'restan_kses_allowed_html'); ?></a>
	                            <?php endif;?>
	                        </div>
	                    </div>
						<?php if(!empty($item['title'])):?>
	                    	<h6 class="title"><a href="<?php echo esc_url($item['url']['url']); ?>"><?php echo wp_kses_post($item['title'], 'restan_kses_allowed_html'); ?></a></h6>
	                    <?php endif;?>	
	                </div>
                <?php 
					endforeach; 
				?>
            </div>

    <!-- End Gallery -->
	<?php
		endif;
	}
}
