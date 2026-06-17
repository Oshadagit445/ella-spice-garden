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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'site2_db' );

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
define( 'AUTH_KEY',         '.7`$^kEH&~$sU7Ot~a_B&$ _$q{aH5XZ~7|ihHcp]T[wTQ`^&f%(Z8p(/tPh0h_T' );
define( 'SECURE_AUTH_KEY',  'u*gn|~+uPn/=`tR3q*y5I5K +T1xK/S/RWP,Qjjd<7aOW]*3_y0C{mPMmG5|gqYi' );
define( 'LOGGED_IN_KEY',    'J;a9HNEZ-$||Fr]RJ_$lgeT85f9%49>t<J&?8RU^xrf0M1}nx#WG51mR]]_U_b#$' );
define( 'NONCE_KEY',        '8UO6=tMFa9W~C^3HE5J7<&woRT;NCK gjegH)h,Ny$[X!Uk$z^N:=bx/[*P6(6)y' );
define( 'AUTH_SALT',        'p|_-<K+80L.0rqCj)vOgSaVsxuwwZ3BM3$j)ZgN+yg[Fe0r)M-LAKO-~Ya?w[J&x' );
define( 'SECURE_AUTH_SALT', 'p{W+)HP%,@?SW[&)C5!#bpr:X>m?Sb=q3`jE~t ;8NX%ZIHlDD1jI1Ic`d.mQ^?7' );
define( 'LOGGED_IN_SALT',   '9R&](hQzzw|D#$x98Uu^sAHZ1v%NhEomG!C/ ~1-;y7$UsA`;T|fpZ0zn?g-EoY^' );
define( 'NONCE_SALT',       'A40<>/X_xAWE-V!H;qh(^ 6+-bS+xKGaT*E:f`kcJ&?ZhE<TP@ddX(axC18oe@]^' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
