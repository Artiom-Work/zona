<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

do_action( 'woocommerce_before_main_content' );
?>

<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
	<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
<?php endif; ?>

<?php
if ( woocommerce_product_loop() ) :
    do_action( 'woocommerce_before_shop_loop' );
    woocommerce_product_loop_start();

    while ( have_posts() ) :
        the_post();
        do_action( 'woocommerce_shop_loop' );
        wc_get_template_part( 'content', 'product' );
    endwhile;

    woocommerce_product_loop_end();
    do_action( 'woocommerce_after_shop_loop' );

else :
    do_action( 'woocommerce_no_products_found' );
endif;

do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );