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
define('DB_NAME', 'db_free');

/** MySQL database username */
define('DB_USER', 'ld_cao');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', 'db4free.net:3307');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define( 'WP_ALLOW_REPAIR', true );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'BS-h8Mi`Ew19=O<cj9J)2n%vrO&uRbM!P!z#|%5UVv!|ve]%<&m}m~eK~O~Ok<If');
define('SECURE_AUTH_KEY',  ' Os+]3j$+P|)p|]]&28V,(&n-JNjj^aiGsjo$TVy]cH)8B/S3LAyOHbMTS4T h3U');
define('LOGGED_IN_KEY',    'zbk !q^X2ZTXRumd|h/nm)+vf{]ufKL~;_TbGKo@AU8$<V)<!sSz7g<?f#.p4&q>');
define('NONCE_KEY',        '-tpsW=4%B1>z{$&u2K$KS!KA9RI|Bf6kb2dw8q|u;6}m|l3ZZSAPT xu]UALiKfB');
define('AUTH_SALT',        'FOK 0.eu.lE/wC(E/aT_+$$HRwjKePKoOkCxIG92?G<Z[($9uP|ft-jCYH7=_U;m');
define('SECURE_AUTH_SALT', '{|-PJbQ(ZydE[G/GUXNsJ+m ^R}>~5C05 5UqRM..qRJc#sQaGFu`qVXyXx0W)|6');
define('LOGGED_IN_SALT',   'Fr!a7wRlmWx6D,b1yV%3 gtI!0jOO?d.q]HOPU;HC52gRx LG-v/8y(^&!eCh9!N');
define('NONCE_SALT',       '&]-Qh}eq1HGvpsSqOJ1Cx$I3*z4ixNr!}>>-}|E]IEJ(0MOS6N#cw=(<Jdzd+ tz');

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
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );
define( 'SAVEQUERIES', true );
define( 'SCRIPT_DEBUG', true );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
