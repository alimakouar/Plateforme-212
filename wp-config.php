<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '212' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '#h~>R_gO^]dgj6qoQ=oZmt]i25;]]&~B,92~&RbKU{-QU$j(URYjuYrtMrE^r1ar' );
define( 'SECURE_AUTH_KEY',  '<33!=KF`r^L0S:Yb*ebr&MdhthOhNot?7pSUe0pvJGho~a`|*s|0sm_+1!b6s[tS' );
define( 'LOGGED_IN_KEY',    'b8b*j0Mq5hWo|@kf<OFFq.2O=Mk;TWM:$bkh/):O?g=+/y5musND@wX!antm6=(_' );
define( 'NONCE_KEY',        '.Mt`8k!e=T?;C^L23_#N5LlMx&83p$0MdYO+A}tw,i$&^osZ/LZauX$6dpV$WlF-' );
define( 'AUTH_SALT',        '%y;:R~Z`JPQuO?yh[RbW&9R652{wl)rBaE!Y~P*G|NNfDj|8}lA]3e,M0/T(u-#r' );
define( 'SECURE_AUTH_SALT', 'K|5b0wYV_6c5(q/nS5%%|LdKqqYD+@;E>KD??>M-8,xtOXLyOf ke0mJUq3(s:J9' );
define( 'LOGGED_IN_SALT',   'd@K0X LzXZj]`uFc1rHVF1xE=&<Qby^X0`e<sAY8*&=[;$_mQSEDTu<*&UDib7?s' );
define( 'NONCE_SALT',       '$h:X*6cnt%g1_$rE?bm%<,?siIPkQ9y?6TFcz4%s~b=GPvf3Kwc4Fv1@0X=c:=Hk' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
