<?php

/**
 * Elementor Blog Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Blog_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Blog widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_blog';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Blog widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Blog', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Blog widget icon.
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
	 * Retrieve the list of categories the Blog widget belongs to.
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


	protected function register_controls()
	{

		$this->start_controls_section(
			'blog_section_content',
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
					'2'  	=> esc_html__('Style Two', 'restan-core')
				],
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' 		=> esc_html__('Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('section title', 'restan-core'),
				'default' 		=> esc_html__('Default Section Title', 'restan-core'),
				'rows'   		=> '4',
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'section_subtitle',
			[
				'label' 		=> esc_html__('Sub-Title', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__('section subtitle', 'restan-core'),
				'default' 		=> esc_html__('Default Section SubTitle', 'restan-core'),
				'rows'   		=> '4',
				'label_block' 	=> true,
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
			'post_from',
			[
				'label' 		=> esc_html__('Post From', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'all',
				'options' 		=> [
					'all'  			=> esc_html__('All', 'restan-core'),
					'categories' 	=> esc_html__('Categories', 'restan-core'),
				],
			]
		);

		$this->add_control(
			'post_limit',
			[
				'label' 		=> esc_html__('Post Limit', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder'	=> esc_html__('Only Number Work. Like 4 or 6', 'restan-core'),
			]
		);

		$this->add_control(
			'order',
			[
				'label' 		=> esc_html__('Order', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'ASC',
				'options' 		=> [
					'ASC'  			=> esc_html__('Ascending', 'restan-core'),
					'DESC' 			=> esc_html__('Descending', 'restan-core'),
				],
			]
		);

		$this->add_control(
			'order_by',
			[
				'label' 		=> esc_html__('Order By', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'date',
				'options' 		=> [
					'none'  		=> esc_html__('None', 'restan-core'),
					'type' 			=> esc_html__('Type', 'restan-core'),
					'title' 		=> esc_html__('Title', 'restan-core'),
					'name' 			=> esc_html__('Name', 'restan-core'),
					'date' 			=> esc_html__('Date', 'restan-core'),
				],
			]
		);

		$this->add_control(
			'content_length',
			[
				'label' 		=> esc_html__('Content Length', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> '16',
				'placeholder' 	=> esc_html__('Type Content Length', 'restan-core'),
			]
		);

		$this->add_control(
			'read_more',
			[
				'label' 		=> esc_html__('Read More Text', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder'	=> esc_html__('read more text', 'restan-core'),
				'default' 		=> esc_html__('Read More', 'restan-core'),
			]
		);


		$this->end_controls_section();
		include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'blog-style.php';
	}


	protected function render()
	{

		$restan_blog_output = $this->get_settings_for_display();
		global $post;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$blog = array(
			'post_type'         => 'post',
			'posts_per_page'    => esc_attr($restan_blog_output['post_limit']),
			'order'             => esc_attr($restan_blog_output['order']),
			'orderby'           => esc_attr($restan_blog_output['order_by']),
			'paged' => $paged,
		);
		$restan_blog = new WP_Query($blog);
		if ($restan_blog_output['style'] == '1') :
	?>
	<!-- Start Blog Area One
	============================================= -->
    <div class="blog-area home-blog default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title"><?php echo wp_kses($restan_blog_output['section_subtitle'], 'restan_allowed_tags'); ?></h4>
						<h2 class="title"><?php echo wp_kses($restan_blog_output['section_title'], 'restan_allowed_tags'); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
            	<?php
					$counter = 1;
					while ($restan_blog->have_posts()) :
						$restan_blog->the_post();
						$restan_blog_one_img_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
						$categories = get_the_category();
				?>
                <!-- Single Item -->
                <div class="col-lg-6">
                    <div class="home-blog-style-one-item">
                        <?php if (!empty($restan_blog_one_img_url[0])) : ?>
							<img src="<?php echo esc_url($restan_blog_one_img_url[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>">
						<?php endif; ?>
                        <div class="content">
                            <div class="info">
                                <div class="date"><strong><?php echo get_the_date('d'); ?></strong> <?php echo get_the_date('M'); ?></div>
                                <ul class="blog-meta">
                                    <li>
                                        <?php echo esc_attr("By", 'restan'); ?><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"> <?php echo esc_html(ucwords(get_the_author())); ?></a>
                                    </li>
                                    <li>
                                       	<?php 
                                       	$separator = ', ';
                                       	$output = '';
                                       	if ( ! empty( $categories ) ) {
											foreach( $categories as $category ) {
												$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'restan' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
											}
											echo trim( $output, $separator );
										}
										?>
                                    </li>
                                </ul>
                                <h4 class="title">
                                    <a href="<?php echo  esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
                                </h4>
                                <a href="<?php echo  esc_url(get_permalink()); ?>" class="btn-read-more"><?php echo wp_kses($restan_blog_output['read_more'], 'restan_allowed_tags'); ?> <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
              	<?php $counter++;
					endwhile;
					wp_reset_postdata(); 
				?>
            </div>
        </div>
    </div>
 	<!-- End Blog Area One -->

	<?php elseif ($restan_blog_output['style'] == '2') : ?>

	<!-- Start Blog 
	============================================= -->
	<div class="home-blog-area default-padding">
		<?php if (!empty($restan_blog_output['section_title'] || $restan_blog_output['section_subtitle'])) : ?>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<div class="site-heading text-center">
							<h4 class="sub-heading"><?php echo wp_kses($restan_blog_output['section_subtitle'], 'restan_allowed_tags'); ?></h4>
							<h2 class="title"><?php echo wp_kses($restan_blog_output['section_title'], 'restan_allowed_tags'); ?></h2>
							<div class="devider"></div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="container">
			<div class="row">
				<!-- Single Item -->
				<div class="col-lg-6">
					<?php
					$counter_blog = 1;
					while ($restan_blog->have_posts()) :
						$restan_blog->the_post();
						$restan_blog_one_img_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'restan_598X673');
						if ($counter_blog == 1) :
							$tag_name = get_the_tags();
					?>
							<div class="blog-style-one solid<?php if (!has_post_thumbnail()) {
																echo esc_attr__(" thumbless", 'restan');
															} ?>">
								<div class="thumb">
									<?php if (!empty($restan_blog_one_img_url[0])) : ?>
										<img src="<?php echo esc_url($restan_blog_one_img_url[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>">
									<?php endif; ?>
									<?php if (has_tag()) : ?>
										<div class="tags">
											<a href="<?php echo esc_url(get_tag_link($tag_name[0]->term_id)); ?>"><?php echo esc_html($tag_name[0]->name); ?></a>
										</div>
									<?php endif; ?>
									<div class="info">
										<div class="blog-meta">
											<ul>
												<li>
													<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fas fa-user"></i> <?php echo esc_html(ucwords(get_the_author())); ?></a>
												</li>
												<li>
													<?php echo get_the_date(); ?>
												</li>
											</ul>
										</div>
										<h4>
											<a href="<?php echo  esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
										</h4>
										<p>
											<?php echo esc_html(wp_trim_words(get_the_content(), $restan_blog_output['content_length'], '')); ?>
										</p>
									</div>
								</div>
							</div>
					<?php endif;
						$counter_blog++;
					endwhile;
					wp_reset_postdata(); ?>
				</div>
				<!-- End Single Item -->
				<!-- Single Item -->
				<div class="col-lg-6 mt-md-30 mt-xs-30">

					<?php
					$counter = 1;
					while ($restan_blog->have_posts()) :
						$restan_blog->the_post();
						$restan_blog_one_img_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'restan_598X321');
						if ($counter == 2 || $counter == 3) :
							$tag_name = get_the_tags();
					?>
							<div class="blog-style-one solid <?php if ($counter == '2') {
																	echo esc_attr("mb-30");
																} ?>">
								<div class="thumb">
									<?php if (!empty($restan_blog_one_img_url[0])) : ?>
										<img src="<?php echo esc_url($restan_blog_one_img_url[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>">
									<?php endif; ?>
									<?php if (has_tag()) : ?>
										<div class="tags">
											<a href="<?php echo esc_url(get_tag_link($tag_name[0]->term_id)); ?>"><?php echo esc_html($tag_name[0]->name); ?></a>
										</div>
									<?php endif; ?>
									<div class="info">
										<div class="blog-meta">
											<ul>
												<li>
													<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fas fa-user"></i> <?php echo esc_html(ucwords(get_the_author())); ?></a>
												</li>
												<li>
													<?php echo get_the_date(); ?>
												</li>
											</ul>
										</div>
										<h4>
											<a href="<?php echo  esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
										</h4>
									</div>
								</div>
							</div>
					<?php endif;
						$counter++;
					endwhile;
					wp_reset_postdata(); ?>
				</div>
				<!-- End Single Item -->
			</div>
		</div>
	</div>
	<!-- End Blog  -->

<?php
		endif;
	}
}
