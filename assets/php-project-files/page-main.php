<?php
/**
	* Template Name: Template "Main page"
*/
?>

<?php get_header(); ?>

<main>
		<section class="promo" aria-labelledby="promo-title" data-js-promo-color>
			<h1 class="visually-hidden" id="promo-title">Zona's brand</h1>

			<div class="promo-swiper promoSwiper">
				<ul class="swiper-wrapper">
					<?php
						$slides = new WP_Query([
								'post_type'      => 'promo_slide',
								'posts_per_page' => -1,
								'orderby'        => 'menu_order',
								'order'          => 'ASC',
					]);

					if ( $slides->have_posts() ) :
							while ( $slides->have_posts() ) : $slides->the_post();

									$color_raw        = pods_field('slide_color');
									$color = is_array($color_raw) ? reset($color_raw) : $color_raw; /* Нужно достать из массива первый элемент , так как на страницу почему то приходит из поля Plain Text массив */
									$title_raw        = pods_field('slide_title');
									$title = is_array($title_raw) ? reset($title_raw) : $title_raw; /* Нужно достать из массива первый элемент , так как на страницу почему то приходит из поля Plain Text массив */
									$text_raw        = pods_field('slide_text');
									$text = is_array($text_raw) ? reset($text_raw) : $text_raw;/* Нужно достать из массива первый элемент , так как на страницу почему то приходит из поля Plain Text массив */
									$main_image   = pods_field('slide_main_image');
									$small_decor_image  = pods_field('slide_small_decor_image');
									$decor_image = pods_field('slide_decor_image');
					?>

					<li class="swiper-slide" data-js-slide-color="#<?php echo esc_attr( $color ); ?>">
						<div class="container">
							<div class="promo__body">
								<div class="promo__subtitle">
									<p>
										Introducing Zona
									</p>
								</div>

								<h2 class="promo__title h1">
									<?php echo esc_html( $title ); ?>
								</h2>

								<img class="promo__body-image" src="<?php echo esc_url( $small_decor_image['guid'] ); ?>" width="145" height="145"
									alt="lime">

								<div class="promo__text">
										<?php echo esc_html( $text ); ?>
								</div>

								<img class="promo__body-decor" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/drops-icon.svg" width="85" height="85" alt=""
									aria-hidden="true">
							</div>

							<figure class="promo__figure">
								<figcaption class="promo__figure-text hidden-tablet">Zona Sparkling Soda</figcaption>

								<img class="promo__figure-image" src="<?php echo esc_url( $main_image['guid'] ); ?>" width="570"
									height="940" alt="Сan of soda">
							</figure>

							<img class="promo__decor" src="<?php echo esc_url( $decor_image['guid'] ); ?>" width="427" height="425" alt=""
								aria-hidden="true">
						</div>
					</li>
					
					<?php
						endwhile;
						wp_reset_postdata();
						else :
						echo '<li>Слайды не найдены</li>';
						endif;
					?>
				</ul>

				<div class="promo-swiper__pagination hidden-tablet">
					<button class="promo-swiper__btn promoButtonPrev" type="button" aria-label="preview-slide"
						title="preview slide">
						<span class="visually-hidden">Preview slide</span>

						<svg width="32" height="22">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#arrow-left"></use>
						</svg>
					</button>

					<button class="promo-swiper__btn promoButtonNext" type="button" aria-label="next-slide" title="next slide">
						<span class="visually-hidden">Next slide</span>

						<svg width="32" height="22">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#arrow-right"></use>
						</svg>
					</button>
				</div>
			</div>
		</section>

		<section class="progress container" aria-labelledby="progress-title">
			<h2 class="h2" id="progress-title">
				<span class="accent-color">Zona</span> uniquely positions itself as a premium product
				at an <span class="secondary-accent-color">affordable price</span>
			</h2>

			<img class="progress__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/brand-icon-2.svg" width="220" height="180" alt=""
				aria-hidden="true">

			<a class="progress__button button" href="<?php echo get_template_directory_uri(); ?>/shop/">
				Shop&nbsp;Now
			</a>
		</section>
		
		 <section class="products container" aria-labelledby="products-title">
			<h2 class="products__title hidden-mobile" id="products-title">Products</h2>

			<ul class="products__list" id="products-list">
				<?php
				$top_products = new WP_Query([
						'post_type'      => 'product',
						'posts_per_page' => -1,
						'tax_query'      => [
								[
										'taxonomy' => 'product_tag',
										'field'    => 'slug',
										'terms'    => 'top_products',
								],
						],
				]);

				if ( $top_products->have_posts() ) :
						while ( $top_products->have_posts() ) : $top_products->the_post();

								global $product; 
								$bg_color   = get_field('product_color'); 
								$link_color = get_field('product_link_color'); 
				?>

					<li class="products__item" style="background-color: <?php echo esc_attr( $bg_color ); ?>;">
							<a href="<?php the_permalink(); ?>">
									<?php echo get_the_post_thumbnail( get_the_ID(), 'woocommerce_single', ['class' => 'products__image', 'loading' => 'lazy'] ); ?>
							</a>

							<a href="<?php the_permalink(); ?>" aria-label="product-link" style="color: <?php echo esc_attr( $link_color ); ?>;">
									<h3 class="products__name"><?php the_title(); ?></h3>
							</a>

							<div class="products__text">
								<p>Sabor Natural</p>
									<?php echo apply_filters( 'woocommerce_short_description', $product->get_short_description() ); ?>
							</div>
					</li>
			<?php
					endwhile;
					wp_reset_postdata();
			else :
					echo '<li>Товары с меткой top_products не найдены</li>';
			endif;
			?>
			</ul>
		</section>

		<section class="the-best" aria-labelledby="the-best-title">
			<h2 class="visually-hidden">Zona product presentation</h2>

			<div class="container">
				<div class="the-best__body">
					<div class="the-best__subtitle">
						<p>
							<?php the_field('the_best_subtitle' , get_settings_page_id()); ?>
						</p>
					</div>

					<h3 class="the-best__title h2" id="the-best-title">
						<?php the_field('the_best_title' , get_settings_page_id()); ?>
					</h3>

					<div class="the-best__text">
						<?php the_field('the_best_text' , get_settings_page_id()); ?>
					</div>

					<a class="the-best__link" href="<?php echo esc_url( get_field('the_best_link' , get_settings_page_id()) ); ?>" target="_blank" rel="noopener noreferrer">
						<?php the_field('the_best_link_text' , get_settings_page_id()); ?>
					</a>

					<ul class="the-best__badges">
						<li>
							<img src="<?php echo esc_url( get_field('the_best_badge_image_1' , get_settings_page_id()) ); ?>" width="95" height="95" alt="" aria-hidden="true">

							<span><?php the_field('the_best_badge_text_1' , get_settings_page_id()); ?></span>
						</li>

						<li>
							<img src="<?php echo esc_url( get_field('the_best_badge_image_2' , get_settings_page_id()) ); ?>" width="95" height="95" alt="" aria-hidden="true">

							<span><?php the_field('the_best_badge_text_2' , get_settings_page_id()); ?></span>
						</li>

						<li>
							<img src="<?php echo esc_url( get_field('the_best_badge_image_3' , get_settings_page_id()) ); ?>" width="95" height="95" alt="" aria-hidden="true">

							<span><?php the_field('the_best_badge_text_3' , get_settings_page_id()); ?></span>
						</li>
					</ul>
				</div>

				<div class="the-best__image-wrapper">
					<img class="the-best__image" src="<?php echo esc_url( get_field('the_best_main_image' , get_settings_page_id()) ); ?>" width="852" height="744"
						alt="Product zona image" loading="lazy">
				</div>

			</div>
		</section>

		 <section class="gallery" aria-labelledby="gallery-title">
			<h2 class="visually-hidden">zona's brand gallery of pictures</h2>

			<div class="gallery__header container">
				<img class="gallery__decor hidden-mobile" src="<?php echo esc_url( get_field('gallery_decor_image' , get_settings_page_id() ) ); ?>" width="267" height="267"
					alt="" aria-hidden="true">

				<h3 class="gallery__title h2" id="gallery-title">
					<a href="<?php echo esc_url( get_field('gallery_link' , get_settings_page_id() ) ); ?>" target="_blank" rel="noopener noreferrer">
						<?php the_field('gallery_link_text' , get_settings_page_id() ); ?>
					</a>
				</h3>

				<div class="gallery__title-label">
					<p>
						Get our exclusive images uploaded our social media
					</p>
				</div>
			</div>

			<div class="gallery__swiper gallerySwiper visible-tablet">
				<ul class="swiper-wrapper">
					<?php
						$gallerySlides = new WP_Query([
								'post_type'      => 'gallery_slide',
								'posts_per_page' => -1,
								'orderby'        => 'menu_order',
								'order'          => 'ASC',
						]);
						
						if ( $gallerySlides->have_posts() ) :
							while ( $gallerySlides->have_posts() ) : $gallerySlides->the_post();

							$gallery_image = pods_field('gallery_slide_image');
							$image_url = is_array($gallery_image) ? $gallery_image['guid'] : $gallery_image;
							$image_id  = is_array($gallery_image) ? $gallery_image['ID'] : null;
        			$alt_text = $image_id ? get_post_meta( $image_id, '_wp_attachment_image_alt', true ) : '';
					?>

					<li class="swiper-slide">
						<figure>
							<img src="<?php echo esc_url( $image_url ); ?>" width="298" height="351" alt="<?php echo esc_attr( $alt_text ); ?>"
								loading="lazy">
						</figure>
					</li>
					
					<?php
						endwhile;
						wp_reset_postdata();
						else :
						echo '<li>Слайды не найдены</li>';
						endif;
					?>
				</ul>
			</div>

			 <div class="collage hidden-tablet container">
				<ul class="collage__list">
					<?php $img1 = get_field('collage_image_1', get_settings_page_id()); ?>
					<li class="collage__item">
						<figure>
							<img src="<?php echo esc_url( $img1 ? $img1['url'] : get_template_directory_uri() . '/assets/images/gallery/collage-simple-image-1.webp' ); ?>" width="368" height="368" alt="<?php echo esc_attr( $img1 ? $img1['alt'] : 'Brand product photo' ); ?>">
						</figure>
					</li>
					
					<?php $img2 = get_field('collage_image_2', get_settings_page_id()); ?>
					<li class="collage__item">
						<figure>
							<img src="<?php echo esc_url( $img2 ? $img2['url'] : get_template_directory_uri() . '/assets/images/gallery/collage-simple-image-2.webp' ); ?>" width="650" height="650" alt="<?php echo esc_attr( $img2 ? $img2['alt'] : 'Brand product photo' ); ?>">
						</figure>
					</li>

					<?php $img3 = get_field('collage_image_3', get_settings_page_id()); ?>
					<li class="collage__item">
						<figure>
							<img src="<?php echo esc_url( $img3 ? $img3['url'] : get_template_directory_uri() . '/assets/images/gallery/collage-simple-image-3.webp' ); ?>" width="370" height="370" alt="<?php echo esc_attr( $img3 ? $img3['alt'] : 'Brand product photo' ); ?>">
						</figure>
					</li>

					<?php $img4 = get_field('collage_image_4', get_settings_page_id()); ?>
					<li class="collage__item">
						<figure>
							<img src="<?php echo esc_url( $img4 ? $img4['url'] : get_template_directory_uri() . '/assets/images/gallery/collage-simple-image-4.webp' ); ?>" width="649" height="654" alt="<?php echo esc_attr( $img4 ? $img4['alt'] : 'Brand product photo' ); ?>">
						</figure>
					</li>

					<?php $img5 = get_field('collage_image_5', get_settings_page_id()); ?>
					<li class="collage__item">
						<figure>
							<img src="<?php echo esc_url( $img5 ? $img5['url'] : get_template_directory_uri() . '/assets/images/gallery/collage-simple-image-5.webp' ); ?>" width="235" height="235" alt="<?php echo esc_attr( $img5 ? $img5['alt'] : 'Brand product photo' ); ?>">
						</figure>
					</li>

					<?php $img6 = get_field('collage_image_6', get_settings_page_id()); ?>
					<li class="collage__item">
						<figure>
							<img src="<?php echo esc_url( $img6 ? $img6['url'] : get_template_directory_uri() . '/assets/images/gallery/collage-simple-image-6.webp' ); ?>" width="510" height="510" alt="<?php echo esc_attr( $img6 ? $img6['alt'] : 'Brand product photo' ); ?>">
						</figure>
					</li>

					<?php $img7 = get_field('collage_image_7', get_settings_page_id()); ?>
					<li class="collage__item">
						<figure>
							<img src="<?php echo esc_url( $img7 ? $img7['url'] : get_template_directory_uri() . '/assets/images/gallery/collage-simple-image-7.webp' ); ?>" width="375" height="375" alt="<?php echo esc_attr( $img7 ? $img7['alt'] : 'Brand product photo' ); ?>">
						</figure>
					</li>

					<?php $img8 = get_field('collage_image_8', get_settings_page_id()); ?>
					<li class="collage__item">
						<figure>
							<img src="<?php echo esc_url( $img8 ? $img8['url'] : get_template_directory_uri() . '/assets/images/gallery/collage-simple-image-8.webp' ); ?>" width="236" height="236" alt="<?php echo esc_attr( $img8 ? $img8['alt'] : 'Brand product photo' ); ?>">
						</figure>
					</li>
				</ul>
			</div>  
		</section>

		<section class="advantages" aria-labelledby="advantages-title">
			<h2 class="visually-hidden">Advantages of Zona Sparkling Soda</h2>

			<div class="container">
				<div class="advantages__header">
					<h3 class="advantages__title h2" id="advantages-title">
						<?php the_field('advantages_title' , get_settings_page_id()); ?>
					</h3>

					<div class="advantages__subtitle">
						<p>
							<?php the_field('advantages_subtitle' , get_settings_page_id()); ?>
						</p>
					</div>
				</div>

				<div class="advantages__body">
					<div class="advantages__pictute">
						<figure>
							<img src="<?php echo esc_url( get_field('advantages_image' , get_settings_page_id()) ); ?>" width="704" height="704"
								alt="Product image">
							<svg class="visible-laptop" width="101" height="38" style="fill: #<?php the_field('advantages_svg_color' , get_settings_page_id()); ?>;">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#curl-arrow-right"></use>
							</svg>
						</figure>
					</div>

					<ul class="advantages__list">
						<li class="advantages__item">
							<h3 class="h4">
								<?php the_field('advantage_name_1' , get_settings_page_id()); ?>
							</h3>

							<div>
								<p>
									<?php the_field('advantage_text_1' , get_settings_page_id()); ?>
								</p>
							</div>

							<svg width="124" height="69" style="fill: #<?php the_field('advantages_svg_color' , get_settings_page_id()); ?>;">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#curl-arrow-left"></use>
							</svg>
						</li>

						<li class="advantages__item">
							<h3 class="h4">
								<?php the_field('advantage_name_2' , get_settings_page_id()); ?>
							</h3>

							<div>
								<p>
									<?php the_field('advantage_text_2' , get_settings_page_id()); ?>
								</p>
							</div>

							<svg width="79" height="78" style="fill: #<?php the_field('advantages_svg_color' , get_settings_page_id()); ?>;">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#curved-arrow-right"></use>
							</svg>
						</li>

						<li class="advantages__item">
							<h3 class="h4">
								<?php the_field('advantage_name_3' , get_settings_page_id()); ?>
							</h3>

							<div>
								<p>
									<?php the_field('advantage_text_3' , get_settings_page_id()); ?>
								</p>
							</div>

							<svg width="81" height="75" style="fill: #<?php the_field('advantages_svg_color' , get_settings_page_id()); ?>;">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#curved-arrow-left"></use>
							</svg>
						</li>

						<li class="advantages__item">
							<h3 class="h4">
								<?php the_field('advantage_name_4' , get_settings_page_id()); ?>
							</h3>

							<div>
								<p>
									<?php the_field('advantage_text_4' , get_settings_page_id()); ?>
								</p>
							</div>

							<svg width="101" height="38" style="fill: #<?php the_field('advantages_svg_color' , get_settings_page_id()); ?>;">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#curl-arrow-right"></use>
							</svg>
						</li>
					</ul>
				</div>
			</div>
		</section>

		<section class="consist container" aria-labelledby="consist-title">
			<h2 class="visually-hidden">Zona's beverage ingredients</h2>

			<div class="consist__text">
				<p>
					<?php the_field('consist_text' , get_settings_page_id()); ?>
				</p>
			</div>

			<ul class="consist__list">
				<li class="consist__item">
					<figure class="consist__image-wrapper">
						<img class="consist__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/consist/consist-step-1.webp" width="360" height="372"
							alt="Carbonated water" loading="lazy">

						<figcaption class="consist__image-text">Carbonated water</figcaption>
					</figure>
				</li>

				<li class="consist__item">
					<svg class="consist__item-icon" width="80" height="80">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#green-round-plus"></use>
					</svg>

					<figure class="consist__image-wrapper">
						<img class="consist__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/consist/consist-step-2.webp" width="244" height="413"
							alt="Grain neutral juice" loading="lazy">

						<figcaption class="consist__image-text">Grain&nbsp;neutral juice</figcaption>
					</figure>

					<svg class="consist__item-icon" width="80" height="80">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#green-round-plus"></use>
					</svg>
				</li>

				<li class="consist__item">
					<figure class="consist__image-wrapper">
						<img class="consist__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/consist/consist-step-3.webp" width="357" height="286"
							alt="Fruit extracts" loading="lazy">

						<figcaption class="consist__image-text">Fruit extracts</figcaption>
					</figure>

					<svg class="consist__item-icon consist__item-icon--equal" width="66" height="66">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#red-round-equal"></use>
					</svg>
				</li>

				<li class="consist__item">
					<figure class="consist__image-wrapper consist__image-wrapper--final">
						<img class="consist__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/consist/consist-final-step.webp" width="467" height="412"
							alt="Hard Seltzer" loading="lazy">

						<figcaption class="consist__image-text">Sparkling Soda</figcaption>
					</figure>
				</li>
			</ul>
		</section>

		<section class="reviews" aria-labelledby="reviews-title">
			<h2 class="visually-hidden">Customers Reviews of zona's product</h2>

			<figure class="reviews__image-wrapper">
				<img class="reviews__image" src="<?php echo esc_url( get_field('main_reviews_image' , get_settings_page_id()) ); ?>" width="856" height="756"
					alt="Brand product photo" loading="lazy">
			</figure>

			<div class="reviews__body">
				<h3 class="reviews__title h2" id="reviews-title">
					<span>Testimonials</span>

					<svg width="45" height="38">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#article-icon"></use>
					</svg>
				</h3>

				<div class="reviews__swiper reviewsSwiper">
					<ul class="swiper-wrapper">
						    <?php
									$all_reviews = get_comments([
											'post_type' => 'product',
											'type'      => 'review',
											'status'    => 'approve',
									]);

									$best_reviews = array_filter( $all_reviews, function( $review ) {
											return get_field( 'is_best_review', $review );
									});
								?>

    						<?php if ( $best_reviews ) : ?>
        					<?php foreach ( $best_reviews as $review ) : ?>
            				<li class="swiper-slide">
											<article class="reviews__article">
													<div class="reviews__text">
															<p><?php echo esc_html( $review->comment_content ); ?></p>
													</div>

													<h4 class="reviews__name">-&nbsp;&nbsp;<?php echo esc_html( $review->comment_author ); ?></h4>
											</article>
										</li>
       		  			<?php endforeach; ?>

								<?php else : ?>
										<li>No reviews found.</li>
								<?php endif; ?>
					</ul>
				</div>

				<div class="reviews__pagination">
					<button class="reviews__switch reviewsButtonPrev" type="button" aria-label="preview-slide"
						title="preview review">
						<span class="visually-hidden">Preview review</span>

						<svg width="66" height="66">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#round-triangle"></use>
						</svg>
					</button>

					<button class="reviews__switch reviewsButtonNext" type="button" aria-label="next-slide" title="next review">
						<span class="visually-hidden">Next review</span>

						<svg width="66" height="66">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#round-triangle"></use>
						</svg>
					</button>
				</div>
			</div>

			<ul class="reviews__photos hidden-mobile-medium">
				<li>
					<figure class="reviews__icon-wrapper">
						<img class="reviews__icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/reviews/user-1.webp" width="87" height="87"
							alt="Happy custamer">
					</figure>
				</li>

				<li>
					<figure class="reviews__icon-wrapper">
						<img class="reviews__icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/reviews/user-2.webp" width="68" height="68"
							alt="Happy custamer">
					</figure>
				</li>

				<li>
					<figure class="reviews__icon-wrapper">
						<img class="reviews__icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/reviews/user-3.webp" width="87" height="87"
							alt="Happy custamer">
					</figure>
				</li>

				<li>
					<figure class="reviews__icon-wrapper">
						<img class="reviews__icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/reviews/user-4.webp" width="68" height="68"
							alt="Happy custamer">
					</figure>
				</li>

				<li>
					<figure class="reviews__icon-wrapper">
						<img class="reviews__icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/reviews/user-5.webp" width="54" height="54"
							alt="Happy custamer">
					</figure>
				</li>
			</ul>
		</section>
</main>

<?php get_footer(); ?>