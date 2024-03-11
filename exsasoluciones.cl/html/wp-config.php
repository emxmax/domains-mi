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
define('DB_NAME', 'xxqitbn_db77722_exsasoluciones_cl');


/** MySQL database username */
define('DB_USER', 'xxqitbn_db77722_sonrie');


/** MySQL database password */
define('DB_PASSWORD', 'DaWZO?Wm?n&goJP7');


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
define('AUTH_KEY',         ']2J01Nh_+?*<HNC!.lJZ%+dx-5Qmq=-~?vb,`g<S~{`,YbuY]E(Ot@u8|J;Jg~~E');

define('SECURE_AUTH_KEY',  'rq$SoM`_eq`+VXJs*G&B4~lV2a^;X*Z2;rddb6ut+huRCuhs)?)Qm-#L3p/Fn9S|');

define('LOGGED_IN_KEY',    '-bW%,!9kT#T0Zd$!{ZMocLLA;^#y,Pac 2^X8U=(gP^9~b5~kIJI/DXaB]>F4+$9');

define('NONCE_KEY',        'alG$>R$Q=qoie[?~PJ[>G)a73]3+;dNJ+@5>3:#_Jp,tjXJ:_|Sd.Mmi13=5tD12');

define('AUTH_SALT',        '2i+Pu~2Y(e:g!*9YwJ~&e9t2X>za$#Ujc>BW_(l3aR*23H|FyPX|/y(+2i+QP|V2');

define('SECURE_AUTH_SALT', 'etW4D2|YBR4y+voE}ALAh/X=zh1Ot?[,7E3NbrY3Hr)/GLsLBd6:@37U& |(z8a}');

define('LOGGED_IN_SALT',   '~RBAMm~,y(c8<<s@&2-c2E3zY`zxeQ}@b+=G Cv 9.XS[P9SRRGn[f#|a)[?QwNj');

define('NONCE_SALT',       '4QZPaQMAIe&}+C!;5XP2!,tR XH<R@/m Er.ep?-8>yt@Ry((iy(gpK&i.B,<(xj');


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
