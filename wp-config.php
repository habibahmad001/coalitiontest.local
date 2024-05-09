<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'coalitiontestDB' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'o6ryHMf] y#x~OKMNAS3C<kl|}&gVL*6!%t?[TyL)]:>GMl#UYbgtcZ4!h|!tAiK' );
define( 'SECURE_AUTH_KEY',  '$rj; HC<~`_+{UxZJJW#7UaOkq%M&vw$8xCe7%w`_t#0o#BHeD<j|Ckm8WGmX%w ' );
define( 'LOGGED_IN_KEY',    'JaY?~<-g1pHLalYUF*Xz?iu.-ffPiQBe[dfU[Dn1CXf-5|e0%9sP;YiRxzYx7-rj' );
define( 'NONCE_KEY',        '#A=]Z{(RU&-Kjo5(QOC&`=O/(=J8N0=wA31e8xY>]tDK`*41u}p~gz8js(n;+[Co' );
define( 'AUTH_SALT',        '7B`cne[$zC:HL+JoQ|^U0|(&9=EVTijZ~SFUxXG2]d:pvLx>FU:?Ej;RQ(5hox?O' );
define( 'SECURE_AUTH_SALT', '!$v34NlvrR^^KD#A?9s&%Gx.7.)! }V17}Vr2-QBbmM|[r*N)k|L;VUrv#.YZK(f' );
define( 'LOGGED_IN_SALT',   '>L7cN]z]RMU{zDl/_6Pq,JHHVFB72T0(!]:jaxQR)Q~vds9oBAOL_zbUfM`V(b1^' );
define( 'NONCE_SALT',       'BZjWT_W+R,Ifqe.LG2;[Hg&~[ibg}mx,NuD42,2!v%wxsnTQal/ VTsH]]HkD-NG' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
