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
define('DB_NAME', 'opentutorials');

/** MySQL database username */
define('DB_USER', 'jmaster');

/** MySQL database password */
define('DB_PASSWORD', 'wkdgusaud');

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
define('AUTH_KEY',         '%)A+4~u=:p^WAhCps*/KC3>+iS]i-(;=O+>?0gT;r4u&64^,MB&-[i2DEsv?f)c[');
define('SECURE_AUTH_KEY',  '>Za fC>1hRHz??`Jqtf38L5O1:[(t(]$?bVe/h+U*$eQYhoY1 x(ZULmc]dbG@Nd');
define('LOGGED_IN_KEY',    'm^D%?k0ZwKg [;n8(u4oH?v>r_z.`DX|;4<e..,J<KixDMpQ1MZ2,d*|v^j}dZ#X');
define('NONCE_KEY',        '4`q;,q&v~uWczelNeFUMcrTx(s6UQb>.B}|Q{xu+R-xnXrO :BOIVYl^.y,?eWTK');
define('AUTH_SALT',        'aLkhVn6.GcLbFKA@Db_,ivT@VM0EzP:LacDQ(iR#BwH#9U&5;%jH)*ygm.H. }LR');
define('SECURE_AUTH_SALT', '!Vm|([n1jBUNr:9O:KMS+ubkDli.HQb}qw[L_eMPA~<iz!YisHuR`]Nw9R:h]X*H');
define('LOGGED_IN_SALT',   '_df&al#:>T]uY@,fn<ZpcyZ#F%mkQOH8*UsKg1id!jJkvi:-ObZ;Ys]C`0YQ)gv;');
define('NONCE_SALT',       '~gKina={Y6^bch|%*6A_]&{pqez(`nNrakjsx/0w[:3{Q5l^vvg7iLUFo@*G5&)@');

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
