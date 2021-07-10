<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'alumni');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'mysql');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'bJWJ3ht_D-6,Y}}skIj>RO;o4cis0Z<gPwCkub1[O$aO:wr/DV_}}f~Cq<$o#M~+');
define('SECURE_AUTH_KEY',  'uH?H&7SZ El9Ue3?`08$R]`2TKH)=B^@NG+.x{9tE%fD~iNP>Ao,((Ay%|pU[sYf');
define('LOGGED_IN_KEY',    '#{Fq:gS+?@ght_d2LI6.Y2rRx#FS=J6b-R(Fbn}8}w2!wZl2bpB{G@S@ve@@R{pA');
define('NONCE_KEY',        '`X[ni6kp{]YW>GIL;?d,PS*=pY`hB3|d&ifeh#cCV&w@h@pa2zrGP)>Xc%}X8{p)');
define('AUTH_SALT',        '+Zqtvj(eXv0rAYW7VK@:tVp_Us[%T8>)=DW6Quc)v(CgaL(97Z<a>]cG&+5/X(ZX');
define('SECURE_AUTH_SALT', 'S&Z|e>wE049!t8nCmaSX/J(uXn+3.Ja-9`6$Tw6.4 iT,PA[kLynYpi}ND@W@cbd');
define('LOGGED_IN_SALT',   '6]thu*$42mGkwOHtSv,Lw&gd^D0JT@fipggNOQDJ>E&aU9##o6dvkPG5khrS}Qr~');
define('NONCE_SALT',       'TT=9gRnL$zzcV_4 !jeNwg{Q;>^Xi!M}L9Jtm)Jr#adX=v-Rf`p9<JNj;x@?y?6[');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
