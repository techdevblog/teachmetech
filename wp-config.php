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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'teachmetechmain_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'E`yF(OPq{oxWIEUr4*F<[-E&d1Ln,N2](h}_m6Y.)GT)}T:l3A#PwHEy&r<Lr md' );
define( 'SECURE_AUTH_KEY',  'X6*}A~C?ncEWy7] $F%HIBU{CWs5@J =u6{gHiGDYn%=.cE0>jJz)gob7t^bmP<^' );
define( 'LOGGED_IN_KEY',    '>Nxp)rn8w02XXr5[7)V{}^JP{57bt6xQ.[@B:=]V*m|mBws(4iw9x?>}jll3> >h' );
define( 'NONCE_KEY',        '<ycXBBP+Q%~4m]b:,ouyzp5PgWW<KP)!jbdY*du3eg:lR=N?F:8C-OjR060:tp`c' );
define( 'AUTH_SALT',        'I/KZaIKW-;#4>SU}a4Faq2Fp5M~)uaVu6?oKRq[xpZ>CH7+2aS$Vw$?-VQM1%2Af' );
define( 'SECURE_AUTH_SALT', '9sB4!u=pmGe4YZ$47Er5%Yrr_9iG9v6ukSIjH$C2z70!A`)sLP)bWpIAPd@BL$Y|' );
define( 'LOGGED_IN_SALT',   ';V*7Rl=fnTio=&jR*JvD4c#)mm6Y=R_&7pa.J7k8W~~>F+XJ>;c05]Fv|wK.WHc!' );
define( 'NONCE_SALT',       '<Tm|:9{=x_vy,A%0<XEJ8e{o;r{&[c8!sPv>kQ/u>#:^]G*b!YhBKa$zzS^-wicv' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
