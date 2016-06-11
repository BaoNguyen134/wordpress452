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
define('DB_NAME', 'learn_wordpress');

/** MySQL database username */
define('DB_USER', 'learn_wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'learn_wordpress');

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
define('AUTH_KEY',         'P<5)_MU%!wk=x=}8Uy2~~+~QTO&d_HeY)AZRMN$:)_1)bSQ^|~TcKLx!nHt|OPR}');
define('SECURE_AUTH_KEY',  'k6&_OmzY!3 pm`iR PGt){vY&4S}7uD8$~ybdsy ^]oV|:qFsh:HRuS;)%F8,9*`');
define('LOGGED_IN_KEY',    '*Hyi&TOdD8)ckaH`{Z8~L2IIo1wQRqliqLfNQde^@nR){I4@@#Fd2y2%&^OMZY|[');
define('NONCE_KEY',        'xPD^jl&M>?zCLt0eHB/Gs=p~?Sdvx(mEBJ32zz?K|6xu/`[;9grbIsDf2p/Me. ,');
define('AUTH_SALT',        'TTdC527m(*rOjvc@7Rg;@z?lhG:-ga -mOWH)v#P.c>Pac;AIP2|s;/6actDYk?n');
define('SECURE_AUTH_SALT', 'ggq_o SdW0/S{FM;8[n!qn&HzslUoc<pwV5X0&I]`jn0((8ct4+gfrJ-rD!zsV4*');
define('LOGGED_IN_SALT',   '9k|3T~dzuml^n.P4Czs@_KKs@y$pptZfaYTpU^me`Ip$gm-}PInhYoU+7jXrfJ_@');
define('NONCE_SALT',       ' t5Dh-p]qYjtP%ZvuUO0S:o]-63T4+h}r_v6Y`x +Bp>k?2r2#rf&{qD5PGHP&G{');

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
