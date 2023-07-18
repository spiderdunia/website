<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u717168193_sdmain' );

/** Database username */

//define( 'DB_USER', 'u717168193_sdmain' );
define( 'DB_USER', 'u717168193_sdmain1' );

/** Database password */
define( 'DB_PASSWORD', 'Beaucode@2023%' );

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
define( 'AUTH_KEY',         'su56V+H*MG[w~aMDO_*s~#Fmh-^wjwm<*xk3Xb9%=o6n6,&,Wi*pm+;puQ>vrXMO' );
define( 'SECURE_AUTH_KEY',  'cg,&[c4W&<nBGa8A@w4.V&f7Gse]6u%^yEp9eEb%?4sdwrOLZ|n.CSq<xQ|Nzs-l' );
define( 'LOGGED_IN_KEY',    '4F:`-#rx|AZWZ@/GW=3nLEfaMxnM@S11[ej?~jT]h$AQd}S#=ap>(Q5SI3=Nu[pT' );
define( 'NONCE_KEY',        '|sIDS](/+$*-)_~Zny*t=)A^^,}ARRyC5@wwH_2MQ}!miO- mdWUOMx/V)Pv-fPS' );
define( 'AUTH_SALT',        'bUa/U~bjgu-(8_/DTnMi@KW-J*1gXASL kue<1JUO_3~P!:E*C)i =2S|!qamWBT' );
define( 'SECURE_AUTH_SALT', '9Wp7YL;XCavpqedLD|Gj[2JT[Xo{.M=6J7T_dZjW#gk|A-bb?Ym1gdvN%&=+z$#L' );
define( 'LOGGED_IN_SALT',   '6Lu_7Vr-}MQ?_)^c$~peW?vzb)`4{VlhCP7W;sg0ym2yE;A5>&|UXW`hi:YFqi17' );
define( 'NONCE_SALT',       'Oj36/=NYh6P&z=jFi?>HllU$v{~#U*XU=>`^#;*t/87SN_OQ7HJLy~^#n~.vn5EC' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sdcode_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
