<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'jsim_db');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'endboss');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'xadnx212');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'uNDp26xu*[.G=r31B%}B>V|&D:]V>`Zt?S!Jeoq +Sw+>o|j!<yZrYHPof=Q+8cV');
define('SECURE_AUTH_KEY',  '<syt/$n0$yX!fB7q:cgqCL:yCWCI&[gwp2!-S.&F4wn&?]e2pG0E !WiU-:$F7<g');
define('LOGGED_IN_KEY',    'jF1grSP/#`^lMY(2Ofvcj(S5e4<RjlnLgs_WuJMfe$NK^%z-Y+zhBB_JV0>& GOB');
define('NONCE_KEY',        'wf(+^O+2wR8iYCELd|!3 t}2zZKhmq+MRPBa*w!WM3>YVy8C>8`e-uy[e=K}y0<e');
define('AUTH_SALT',        'b09LC|{cAC(0zAuu^ocT|H_|ZPD2xT*AoQ37H|#1FZ8DVR=!Tw^4Z]zX;npUVC}b');
define('SECURE_AUTH_SALT', ':Hu%V>PGUJ8W?Lim_Si,ZOr/x~>n<bsZS~^cQ)w/*z0}c0lQwSi6+|gDDUgeM:M*');
define('LOGGED_IN_SALT',   '3cG7]OshH{@^@%3bkV2NS;r&|=IJ|k{)&+-dFmL_2T*o(^(?!eFk4a]@) 5=%,dL');
define('NONCE_SALT',       'EveCp~BYZg!?Bly^$t@%,-lt6k(4Z)7voCmlZa[D~{tiS1-m2n-xl8_[RvYXs0Ag');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
