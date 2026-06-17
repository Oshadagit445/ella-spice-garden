<?php

/**
 * Elementor restan shop Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Restan_Shop_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve shop widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'restan_shop';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve shop Nav Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Shop', 'restan-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve shop Nav Tab widget icon.
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
	 * Retrieve the list of categories the shop Nav Tab widget belongs to.
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
			'shop_content_style',
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
					'3'  	=> esc_html__('Style Three', 'restan-core')
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
					'style' => ['1', '2','3']
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
					'style' => ['1', '2','3']
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
					'style' => ['1', '2','3']
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
					'style' => ['1', '2','3']
				]
			]
		);

		$this->add_control(
			'background_shape',
			[
				'label'			=> esc_html__('Background Shape', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'selectors' => [
					'{{WRAPPER}} .food-menu-area::before' => 'background-image:url({{URL}});',
				],
				'condition' => [
					'style' => ['2']
				]
			]
		);

		$this->add_control(
			'summary',
			[
				'label' 		=> esc_html__('Summary', 'restan-core'),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows' 			=> '4',
				'placeholder' 	=> esc_html__('summary', 'restan-core'),
				'default' 		=> esc_html__('Default Summary', 'restan-core'),
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'select_product_category',
			[
				'label' => __('Product Category', 'restan-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => restan_get_taxonoy('product_cat'),
				'multiple' => true,
			]
		);

		$this->add_control(
			'product_category_list',
			[
				'label' 	=> esc_html__('Product Category List', 'restan-core'),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'prevent_empty' => 'false',
				'condition' => [
					'style' => ['1']
				]
			]
		);

		$this->add_control(
			'post_count',
			[
				'label' => __('Number Of Posts', 'restan-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['count'],
				'range' => [
					'count' => [
						'min' => 0,
						'max' => 11,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'count',
					'size' => 6,
				],
				'condition' => [
					'style' => ['2','3']
				]
			]
		);

		$this->add_control(
			'select_category',
			[
				'label' => __('Product Category', 'restan-core'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => restan_get_taxonoy('product_cat'),
				'condition' => [
					'style' => ['2','3']
				]
			]
		);


		$this->add_control(
			'query_order',
			[
				'label' => __('Select Order', 'restan-core'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'default' => 'DESC',
				'options' => [
					'DESC' => __('DESC', 'restan-core'),
					'ASC' => __('ASC', 'restan-core'),
				],
				'condition' => [
					'style' => ['2','3']
				]
			]
		);

		$this->add_control(
			'content_length',
			[
				'label'         => esc_html__('Content Length', 'restan-core'),
				'type'             => \Elementor\Controls_Manager::TEXT,
				'default'         => '12',
				'placeholder'     => esc_html__('Type Content Length', 'restan-core'),
			]
		);

		$this->end_controls_section();

		// include RESTAN_PLUGIN_WIDGET_STYLE_PATH . 'shop-style.php';
	}

	// Output For User
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		if ($settings['style'] == '1') :
?>

			<!-- Start shop Product
    ============================================= -->
			<!-- Start Foot Menu 
    ============================================= -->
			<div class="food-menu-style-three-area default-padding-top vt-products">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 offset-lg-2">
							<div class="site-heading text-center">
								<h4 class="sub-title"><?php echo wp_kses_post($settings['subtitle'], 'restan_kses_allowed_html'); ?></h4>
								<h2 class="title"><?php echo wp_kses_post($settings['title'], 'restan_kses_allowed_html'); ?></h2>
							</div>
						</div>
					</div>
					<div class="food-menu-three-two-items">
						<div class="row">
							<div class="col-lg-12 text-center">

								<div class="nav nav-tabs food-menu-nav style-three" id="nav-tab" role="tablist">
									<?php
									$counter = 1;
									foreach ($settings['product_category_list'] as $item) :
										$product_category = $item['select_product_category'];
									?>
										<button class="nav-link <?php if ($counter == '1') : echo esc_attr__("active", 'restan-core');
																endif; ?>" id="nav-id-<?php echo esc_attr($counter); ?>" data-bs-toggle="tab" data-bs-target="#tab<?php echo esc_attr($counter); ?>" type="button" role="tab" aria-controls="tab<?php echo esc_attr($counter); ?>" aria-selected="true">

											<?php echo esc_html($product_category); ?>

										</button>
									<?php
										$counter++;
									endforeach;
									?>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="tab-content food-style-two-content" id="nav-tabContent">
									<?php
									$counter = 1;
									foreach ($settings['product_category_list'] as $item) :
										$product_category = $item['select_product_category'];


										if (!empty($product_category)) :
											$shop_post_query = new \WP_Query(array(
												'post_type' => 'product',
												'posts_per_page' => -1,
												'orderby' => 'menu_order title',
												'tax_query' => array(
													array(
														'taxonomy' => 'product_cat',
														'field' => 'slug',
														'terms' => $product_category
													)
												)
											));
									?>
											<!-- Tab Single Item -->
											<div class="tab-pane fade <?php if ($counter == '1') : echo esc_attr__("show active", 'restan-core');
																		endif; ?>" id="tab<?php echo esc_attr($counter); ?>" role="tabpane<?php echo esc_attr($counter); ?>" aria-labelledby="nav-id-<?php echo esc_attr($counter); ?>">
												<div class="row">
													<?php
													while ($shop_post_query->have_posts()) :
														$shop_post_query->the_post();
														global $product;
														$price = get_post_meta(get_the_ID(), '_price', true);
														$product_category =  get_the_terms(get_the_ID(), 'product_cat');
														$attachment_ids = $product->get_gallery_image_ids();
														if (!empty($attachment_ids[0])) :
															$image_link = wp_get_attachment_url($attachment_ids[0]);
														endif;
														$product_rating_count = $product->get_rating_count();
														$product_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
														$product_feature_list = get_post_meta(get_the_ID(), '_restan_shop_feature_list', true);
														$product_feature_image = get_post_meta(get_the_ID(), '_restan_feature_image', true);
													?>
														<!-- Single Item -->
														<div class="col-xl-4 col-lg-6 col-md-6 mt-30">
															<div class="food-menu-style-three product">
																<div class="thumb">
																	<?php if (!empty($product_feature_image)) : ?>
																		<img src="<?php echo esc_url($product_feature_image); ?>" alt="<?php echo get_bloginfo('name'); ?>">
																	<?php else : ?>
																		<img src="<?php echo esc_url($product_img_url); ?>" alt="<?php echo get_bloginfo('name'); ?>">
																	<?php endif; ?>
																	<div class="d-flex">
																		<?php if ($product_rating_count > 0) : ?>
																			<div class="food-review">
																				<i class="fas fa-star"></i>
																				<span>
																					<?php echo $average_ratings[] = $product->get_average_rating(); ?>
																					(<?php echo $product_rating_count = $product->get_rating_count(); ?>)
																				</span>
																			</div>
																		<?php endif; ?>
																		<div class="price">
																			<span><?php echo woocommerce_template_loop_price(); ?></span>
																		</div>
																	</div>
																</div>
																<div class="info">
																	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
																	<?php
																	if (!empty($product_feature_list)) :
																		echo wp_kses($product_feature_list, 'restan_allowed_tags');
																	endif;
																	?>
																	<?php
																	if ($product->is_type('variable')) {
																		echo sprintf(
																			'<a href="%s" class="%s">%s</a>',
																			esc_url($product->add_to_cart_url()),
																			esc_attr(implode(' ', array_filter(array(
																				'button', 'product_type_' . $product->get_type(),
																				'cart-btn-border ajax_add_to_cart add_to_cart_button'
																			)))),
																			'<i class="fas fa-shopping-cart"></i>' . esc_html($product->add_to_cart_text()) . '',

																		);
																	} else {
																		echo '<a href="' . $product->add_to_cart_url() . '"  class="cart-btn-border ajax_add_to_cart add_to_cart_button" data-product_id="' . get_the_ID() . '" data-product_sku="' . esc_attr($product->get_sku()) . '" >';
																		echo '<i class="fas fa-shopping-cart"></i>';
																		echo esc_html($product->add_to_cart_text());
																		echo '</a>';
																	}

																	?>
																</div>
															</div>
														</div>
														<!-- End Single Item -->
														<!-- Single Item -->
													<?php
													endwhile;
													wp_reset_postdata();
													?>
												</div>
											</div>
											<!-- End Tab Single Item -->
									<?php
										endif;
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

		<?php elseif ($settings['style'] == '2') : ?>

			<!-- Start Foot Menu 
    ============================================= -->
			<div class="food-menu-area default-padding-top overflow-hidden vt-products">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 offset-lg-2">
							<div class="site-heading text-center text-light">
								<h4 class="sub-title"><?php echo wp_kses_post($settings['subtitle'], 'restan_kses_allowed_html'); ?></h4>
								<h2 class="title"><?php echo wp_kses_post($settings['title'], 'restan_kses_allowed_html'); ?></h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="food-menu-carousel product-style-two swiper">
								<!-- Additional required wrapper -->
								<div class="swiper-wrapper">
									<?php
									if (!empty($settings['select_category'])) :
										$shop_post_query = new \WP_Query(array(
											'post_type' => 'product',
											'posts_per_page' => $settings['post_count']['size'],
											'orderby' => 'menu_order title',
											'order'   => $settings['query_order'],
											'tax_query' => array(
												array(
													'taxonomy' => 'product_cat',
													'field' => 'slug',
													'terms' => $settings['select_category']
												)
											)
										));

									else :

										$shop_post_query = new \WP_Query(array(
											'post_type' => 'product',
											'posts_per_page' => $settings['post_count']['size'],
											'orderby' => 'menu_order title',
											'order'   => $settings['query_order'],
										));

									endif;
									$i = 1;
									while ($shop_post_query->have_posts()) :
										$shop_post_query->the_post();
										global $product;

										$currency_symbol = get_woocommerce_currency_symbol();
										$discount_price = get_post_meta(get_the_ID(), '_price', true);
										$regular_price = get_post_meta(get_the_ID(), '_regular_price', true);
									?>
										<!-- Single Item -->
										<div class="swiper-slide">
											<div class="product">
												<div class="product-contents">
													<div class="product-image">
														<?php the_post_thumbnail('full'); ?>
														<div class="shop-action">
															<ul>
																<li class="wishlist">
																	<?php
																	if (class_exists('TInvWL_Admin_TInvWL')) {
																		echo do_shortcode('[ti_wishlists_addtowishlist]');
																	}
																	?>
																</li>
																<li class="quick-view">
																	<?php
																	if (class_exists('WPCleverWoosq')) {
																		echo do_shortcode('[woosq]');
																	}
																	?>
																</li>
															</ul>
														</div>
														<?php if ($product->get_average_rating() > 0) : ?>
															<div class="product-review">
																<i class="fas fa-star"></i>
																<?php echo $average_ratings[] = $product->get_average_rating(); ?>
															</div>
														<?php endif; ?>
													</div>
													<div class="product-caption">
														<h4 class="product-title">
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h4>
														<p>
															<?php echo esc_html(wp_trim_words(get_the_content(), $settings['content_length'], '')); ?>
														</p>
														<div class="bottom">
															<div class="price">
																<?php echo woocommerce_template_loop_price(); ?>
															</div>
															<a href="<?php the_permalink(); ?>"><i class="fas fa-shopping-basket"></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- End Single Item -->
									<?php
										$i++;
									endwhile;
									wp_reset_postdata();
									?>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Food Menu -->

			<?php elseif ($settings['style'] == '3') : ?>

			 	<!-- Start Best Food -->
			    <div class="best-food-style-one-area default-padding bottom-less bg-gray text-center">
			        <div class="container">
			            <div class="row">
			                <div class="col-lg-6 offset-lg-3">
			                    <div class="site-heading text-center">
			                        <h4 class="sub-title"><?php echo wp_kses_post($settings['subtitle'], 'restan_kses_allowed_html'); ?></h4>
									<h2 class="title"><?php echo wp_kses_post($settings['title'], 'restan_kses_allowed_html'); ?></h2>
			                    </div>
			                </div>
			            </div>
			        </div>
			        <div class="container">
			            <div class="row">
							<?php
								if (!empty($settings['select_category'])) :
									$shop_post_query = new \WP_Query(array(
										'post_type' => 'product',
										'posts_per_page' => $settings['post_count']['size'],
										'orderby' => 'menu_order title',
										'order'   => $settings['query_order'],
										'tax_query' => array(
											array(
												'taxonomy' => 'product_cat',
												'field' => 'slug',
												'terms' => $settings['select_category']
											)
										)
									));

								else :

									$shop_post_query = new \WP_Query(array(
										'post_type' => 'product',
										'posts_per_page' => $settings['post_count']['size'],
										'orderby' => 'menu_order title',
										'order'   => $settings['query_order'],
									));

								endif;
								$i = 1;
								while ($shop_post_query->have_posts()) :
									$shop_post_query->the_post();
									global $product;

									$currency_symbol = get_woocommerce_currency_symbol();
									$discount_price = get_post_meta(get_the_ID(), '_price', true);
									$regular_price = get_post_meta(get_the_ID(), '_regular_price', true);
							?>
				                <!-- Single Item -->
				                <div class="col-xl-3 col-lg-6 col-md-6 mb-30 best-food-style-one <?php if($i == '2'){echo esc_attr__("active",'restan');}?>">
				                    <div class="best-food-style-one-item">
				                        <div class="thumb">
				                           <?php the_post_thumbnail('full'); ?>
				                        </div>
				                        <div class="info">
				                           	<h4 class="product-title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h4>
				                            <div class="price-rate">
				                                <?php if ($product->get_average_rating() > 0) : ?>
													<div class="rating">
														<?php echo woocommerce_template_loop_rating() ?>
													</div>
														<?php endif; ?>
				                                <h5><?php echo woocommerce_template_loop_price(); ?></h5>
				                            </div>
				                            <p>
				                              <?php echo esc_html(wp_trim_words(get_the_content(), $settings['content_length'], '')); ?>
				                            </p>
				                        </div>
				                    </div>
				                </div>
				                <!-- End Single Item -->
			               	<?php
								$i++;
							endwhile;
							wp_reset_postdata();
							?>
			            </div>
			        </div>
			    </div>
			    <!-- End Best Food -->

<?php
		endif;
	}
}
