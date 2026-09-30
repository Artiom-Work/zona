<?php

add_action( 'wp_enqueue_scripts', function() {
		wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/assets/libs/swiper/swiper-bundle.min.css', array(), '11.2.4' );

		wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/styles/style.css' );

		wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/assets/libs/swiper/swiper-bundle.min.js', array(), '11.2.4', true );

		wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), null, true );

		 /* Предача php данных в js переменные функция wp_localize_script(куда , php-массив-json-js-объект ) */
    wp_localize_script( 'main', 'customPhpVars', [
        'templateUrl' => get_template_directory_uri(),
    ] );
});


/* Добавляет тип module для скриптов при его рендеренге */
add_filter( 'script_loader_tag', function( $tag, $handle, $src ) {
    if ( 'main' === $handle ) {
        return '<script type="module" src="' . esc_url( $src ) . '"></script>';
    }

    return $tag;
}, 10, 3 );

/* Для работы с админкой */
add_theme_support("post-thumbnails");
add_theme_support("title-tag");
/* wooCommerce */
add_action( 'after_setup_theme', function() {
		add_theme_support( 'woocommerce' );
		/* Подключение container к тегу main в страницах wooCommerce */
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
    add_action( 'woocommerce_before_main_content', function() {
        echo '<main class="container">';
    }, 10 );

    add_action( 'woocommerce_after_main_content', function() {
        echo '</main>';
    }, 10 );
});

add_action( 'woocommerce_widget_shopping_cart_buttons', function() {
/* Убрать кнопку перехода на страницу /cart/  */
	remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );
}, 1 );

add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {
	/* Регистрация "фрагмента" для счётчика товаров в шапке. */
    $fragments['span.cart-widget__count'] = '<span class="cart-widget__count">' . WC()->cart->get_cart_contents_count() . '</span>';
    return $fragments;
});
/* Убрать сообщения об успешном добавлении товара в корзину */
add_filter( 'wc_add_to_cart_message_html', '__return_false' );

/* Для работы svg */
add_filter( 'upload_mimes', 'svg_upload_allow' );

function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	if( $dosvg ){

		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}
/* Функция для вызова ACF полей со страницы настроек админки  */
function get_settings_page_id() {
    static $settings_id = null; // "static" запоминает значение между вызовами функции

    if ( $settings_id === null ) {
        $settings_page = get_page_by_path('settings-site-page');
        $settings_id = $settings_page ? $settings_page->ID : 0;
    }

    return $settings_id;
}
?>