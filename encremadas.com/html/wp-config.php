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
//define( 'DB_NAME', 'encremadas' );
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/xxqitbn01s9k/domains/encremadas.com/html/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'xxqitbn_db77722_encremadas' );

/** MySQL database username */
//define( 'DB_USER', 'root' );
define( 'DB_USER', 'xxqitbn_db77722_dbenc' );

/** MySQL database password */
//define( 'DB_PASSWORD', 'Mediaimpact2016$' );
define( 'DB_PASSWORD', 'f@uOi0KqR5*uT%&q' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '[7*ae6.dz8bXL~d:hc|]oB4eJ5yD $yuP1m<%:+lIb.^WcU*XI<.9M:J<}b:SPfh' );
define( 'SECURE_AUTH_KEY',  'o5Ye$ngh|oKw@APy@oa[WKwMj*ev89uw)?Xt*4TEX,;M_[hIUEZn5Cd<:J<n~(Hn' );
define( 'LOGGED_IN_KEY',    '<TcDY:#~<IGvIApS5{:`QG:#PuF0PSo=?Xf^pYmzMTyxI6oOO~X;~mK%O*c|aC]N' );
define( 'NONCE_KEY',        'baxu4!k-D 5=`KBo&J`^ir+e*)#M0J?J*Y=8-)K.C,ka=c2./uEfYUjTY=AO/[z>' );
define( 'AUTH_SALT',        '-jG4E<{CiK-!gB2Iwaw=L[T&,)H6rzGH_E/aaF]-BZvxk+I00NMZ<opA)%}*PM$w' );
define( 'SECURE_AUTH_SALT', 'wd199v! kB8VI%V}Wc|wH#q&}L{63tu%b$DZ:GY,pRZNb-gC}3XmL1Mk5.=@poa~' );
define( 'LOGGED_IN_SALT',   '?~JR !FzdrJDC9Z g31_.7%R6$6V4NN_&}JHck@e e2,!8I4bthG *Ba3%-XyTs=' );
define( 'NONCE_SALT',       'Ch;ko}eOXHkxR:CYD7^6,h*Tf+B,L0A^6>M_}l,(WpFd%oG^jGw?W)o6|2[IKzNF' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );
define( 'SCRIPT_DEBUG', false );

define( 'WP_MEMORY_LIMIT', '256M' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
// define( 'WP_AUTO_UPDATE_CORE', false );
// define( 'AUTOMATIC_UPDATER_DISABLED', true );
