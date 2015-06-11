<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'onebigdiv_wp');

/** MySQL database username */
define('DB_USER', 'onebigdiv_admin');

/** MySQL database password */
define('DB_PASSWORD', 'rapAgC');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'w*j.u?nF3}b=![ZoPKP5r3Y9=90N m=Z&2GN0UB;Z+$7ecBl/}M?]h:,tw%jiA7Z');
define('SECURE_AUTH_KEY',  '0-%t!:5gtLIO^k@9vMn8m~,g8|BS(|=~|4z-g1EM!!9d;pR~, icN;L|htkBt?A)');
define('LOGGED_IN_KEY',    '[~[!U;5A%!K3[.&XSiuTUh5!RW *|S4[tIVqJ**.7U+$Q)=GZnVFQz%,v`Pv]3VG');
define('NONCE_KEY',        '3 BjZw7i!*jx1X+|>-8@?h7+1P/fhclz/$1bX~GGW9GrGjhFhlttV[^s5@9U29;f');
define('AUTH_SALT',        'ID:*rx#:wPLzbc68,0*Ir{(qO 4#KnM1qTn++^OUlC#z<FT|S+AZ|a^ht?:W[ 6Z');
define('SECURE_AUTH_SALT', '+7(/U{u$g)i$^x-pj,s|o+B9-76-8W0]sJ[0{@8&TDu@I[-73a|Nph|ZcaZOtVFY');
define('LOGGED_IN_SALT',   'I>`-wU`%~Scm<BSM@M*[;4IB+DgnHKlp:+K+N|S+o] >kwKW%_0gqu/FBM<*h3^l');
define('NONCE_SALT',       '$u<9 ?51ru`tQh3AUmr x;xt`[C[nTL2*&* E6$euuq&]Ego2R/NOUC+SSO8b:AU');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pr_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
