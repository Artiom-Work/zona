<?php get_header(); ?>

	<main>
		<h1 class="visually-hidden">error 404 page of Zona's product site</h1>

		<section class="section-error" aria-labelledby="section-error-title">
			<div class="container">
				<div class="section-error__image-wrapper">
					<svg class="section-error__image" width="400" height="400" role="img" aria-hidden="true">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#sad-smile"></use>
					</svg>
				</div>

				<h2 class="section-error__title" id="section-error-title">404</h2>

				<div class="section-error__subtitle">
					<p>
						We&rsquo;re really sorry about that. We&nbsp;can&rsquo;t seem to&nbsp;find the page you were looking for.
						Let&rsquo;s get you back on&nbsp;track
					</p>
				</div>

				<a class="section-error__button button" href="<?php echo esc_url( home_url() ); ?>">Back Home</a>
			</div>
		</section>
	</main>

<?php get_footer(); ?>
