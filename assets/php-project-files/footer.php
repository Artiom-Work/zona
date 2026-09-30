	<footer class="footer">
		<div class="container">
			<a class="footer__logo logo logo--footer" href="<?php echo esc_url( home_url() ); ?>">
				<img class="logo__image" src="<?php the_field('footer_logo_image' , get_settings_page_id()); ?>" width="183" height="41" alt="zona's logotupe">
			</a>

			<div class="footer__right">
				<a class="footer__copyright" href="<?php echo esc_url( home_url() ); ?>/privacy-policy/" target="_blank" rel="noopener noreferrer">
					Copyright 2026&nbsp;- Zona&nbsp;- All rights reserved
				</a>

				<nav class="footer__nav">
					<ul>
						<li>
							<a href="<?php echo esc_url( get_field('footer_nav_link_url_1' , get_settings_page_id()) ); ?>">
								 <?php the_field('footer_nav_link_text_1' , get_settings_page_id()); ?>
							</a>
						</li>

						<li>
							<a href="<?php echo esc_url( get_field('footer_nav_link_url_2' , get_settings_page_id()) ); ?>">
								 <?php the_field('footer_nav_link_text_2' , get_settings_page_id()); ?>
							</a>
						</li>

						<li>
							<a href="<?php echo esc_url( get_field('footer_nav_link_url_3' , get_settings_page_id()) ); ?>">
								 <?php the_field('footer_nav_link_text_3' , get_settings_page_id()); ?>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>

</html>