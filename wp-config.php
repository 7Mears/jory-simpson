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
	define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'root');
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
define('AUTH_KEY',         'e%F+Fl?*X#7u6H!K-gP V!N{$)1|bn:sc5Wo6Sm%?nfhdykbd~[gx_((hL$X,+Bx');
define('SECURE_AUTH_KEY',  'jaEC~Kq- N!fko4^;V?d|wTU$OES~-hpkqzF&!3;WQ-c?e!5c@qbF+vpw2yW|(6X');
define('LOGGED_IN_KEY',    'L2Ud[v=G2><Q`Z5tJpOG00z|`T:cp!tG`vUd9S%I][%|sRA2W,VhwZvt6WD!)Fu>');
define('NONCE_KEY',        'af7F]-BCCZE:!i[]`_n$}^rbC(9g>qFCwzry%sw~$_{&r`]O42Vf+N6iEuv7U+]P');
define('AUTH_SALT',        'u,vl3ALv&,pJ7P1<,{)+No2_Fz<osI/52>Y =d48r--nuW$Q=)18<)Z5OqB(P)XK');
define('SECURE_AUTH_SALT', '!/}|7v+CnV6Myd[E-XD`9HY:[|@LNk%i9UO^_#*PAz8CH|>g7s2,I*S,=)9f-a|<');
define('LOGGED_IN_SALT',   'vi7S4 *<4&O-vW{M1[FRTUsk8[!5q$gb`Pw*f>ejZ*+wJ=@,/!:|4-M:vbT{|CLT');
define('NONCE_SALT',       '{||R?;{uhXyXlK0ub2?KC35VH<MA9*5:Pkh&(WqI|3+s>[7ag]r%O`dygwTKn0&z');

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
