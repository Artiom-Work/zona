<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'meheynikov_zona' );


/** Database username */
define( 'DB_USER', 'meheynikov_zona' );


/** Database password */
define( 'DB_PASSWORD', 'zona@product' );


/** Database hostname */
define( 'DB_HOST', 'localhost' );


/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );


/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@@?TN65jHZKI(j*!UQykg1t6}=,oUK2M;pA_IE@Qy*We9I]C:`4arBS /Ch3Hk{<' );

define( 'SECURE_AUTH_KEY',  '>Z.W  fMKi=L,;1-X<NErL3;/h3*,gSt>U7U#c%1a?,A5|i$=r#M~XJxdS%/ %t;' );

define( 'LOGGED_IN_KEY',    '9IMib60x1 IcK*g&B!ad5t/zrXk}gRa85>GBFy$>lEdChE%FIC2_*0XJJ96]-p 6' );

define( 'NONCE_KEY',        '.{EK&UPeYX[H^yIM)9,gHCNeg+OYPBmUkc-D|U{E8)Q@`oQWv;5H4OxN$[S#J2hs' );

define( 'AUTH_SALT',        'Di9@|+tf(li2?Sh~Ec&=, S%ozY w7w .fn&L;a);R*vIYsF*6o.)#_ONbP?;#q9' );

define( 'SECURE_AUTH_SALT', '`>r##P h;?CAtBp!)$8f<mUm&Yn..kzppbf[L0x1.d?K7xX7m;y:p:jDbpe6VBg!' );

define( 'LOGGED_IN_SALT',   'xpryT6x1f{YVo4X^`]de;_Cej3Y33Ds-%AkZ:.o9v53.o5%g0|BwK^]ZHV[@J% Y' );

define( 'NONCE_SALT',       ']0;}1Y`9vG=!yW7cjk;~pHmOAUW@>+|?B=`Eo(cVj1bls+&Kwy!e_gT|p:[{~meS' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
