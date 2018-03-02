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
define('DB_NAME', 'scholaroo');

/** MySQL database username */
define('DB_USER', 'heather');

/** MySQL database password */
define('DB_PASSWORD', 'rrVPDcFRRbSL7dDT');

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
define('AUTH_KEY',         'c<t,&uR0%x,P]?~0$4~IwF`fhQysQ1[4 4)`4es (bhgDA3Hxm4D]XK~mfy7g<GA');
define('SECURE_AUTH_KEY',  'a9=A<1gj>lQ|XFy4nE&p*6]-cl51}cYe9NzpV_3pW`mlKjkc4&/MES]iqt-x3YNq');
define('LOGGED_IN_KEY',    '}m@xRD2KE1=zerg$aP=x.ZGlBtu8r2Xgy.gJ 0DRfu6?41~fFLme9N^:P.?aePp3');
define('NONCE_KEY',        '[5+_A|t//tW()W3+hGIN=4)Z[E#(dG=B!-cam.ZZ~Dm>aT]{4*gk3`Km|c(^K%bU');
define('AUTH_SALT',        '.1ZmZ;,2Sf_iKQc*&q*bF}B/w ?CPDu:7t47>dS<}[5e>8B56B;#O:?>1W}{ Vzi');
define('SECURE_AUTH_SALT', 'vbP(g~*OQ4cR)zKV{SxXf`kIwe`:hv_3A,gXr=3884wsIxm_!=(<zp+1}K|`miMj');
define('LOGGED_IN_SALT',   'N:gU6TA+S7]Y:Ug)O7vd]/|4Njg;d&.C2=78JnMw.idmxbQ^;S[Sw(@U$uAXbz/<');
define('NONCE_SALT',       ',|oEc(<81aI=FS0jSs_6Rt ;4D2WE)ba,pQX9AU#+s#*L1}![+[*(_%aq,8uM36m');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sc_';

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
