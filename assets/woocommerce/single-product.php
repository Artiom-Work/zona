<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

do_action( 'woocommerce_before_main_content' );

while ( have_posts() ) :
    the_post();

    global $product;
    do_action( 'woocommerce_before_single_product' );
    ?>

    <div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

        <?php
        do_action( 'woocommerce_before_single_product_summary' );
        ?>

        <div class="summary entry-summary">
            <?php
            do_action( 'woocommerce_single_product_summary' );
            ?>
        </div>

        <?php
        do_action( 'woocommerce_after_single_product_summary' );
        ?>

    </div>

<?php
endwhile;

do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );