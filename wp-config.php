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
define( 'DB_NAME', 'wordpress_hl' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'qwerty' );

/** Database hostname */
define( 'DB_HOST', '192.168.1.75' );

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
define( 'AUTH_KEY',         '#}a.ZH#M5+`vYnrgUmVlC5l&hZd2>^E0LE.2gyPbA]7vl(^j[WFE~qTY,,]F%}<o' );
define( 'SECURE_AUTH_KEY',  '=wpC|#`jvy$g*)Ktxzx|>^a1&Fqks, Yy9U_l-3i|u|:_:+3zm^TU)4JR**hb|sK' );
define( 'LOGGED_IN_KEY',    'gL&n4b$;S{^4r=fd}T6XY4:K7nC#}sRS##G8hI?_=&0@11GVOTrMdRi`rUAs5*RT' );
define( 'NONCE_KEY',        'n+ds?s(`ERu(2*-n=,J^T0kaNPox)hK:sCz,Ay)Ab-K,`$`V_VXU9k0R*496ub*$' );
define( 'AUTH_SALT',        '70_5jQI5hahjKd^Zy|+9>Fl+l[}w:-i`%k[[&3^}l/7atcTpA8RVdpibVaXdQYDv' );
define( 'SECURE_AUTH_SALT', 'Jpj=-jZN*+}m%# (X9S4.B+c1azj>dC:MlP)LY2%O^NJmd[*b3$+zTAhU=s<?ST6' );
define( 'LOGGED_IN_SALT',   '4lU(B`9$?C~jG83s724YEP>}WmMnz_.d,}k<r6bi%Mdp1TT5UTya*r}n>t0jyK_u' );
define( 'NONCE_SALT',       '6iw8xs&@W!cx-F,bxu8._qR9ua.+g4OB,Hd>a:>eX5C*jZVq)66[3<Vvo2AYjGrT' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */

define( 'WP_ENVIRONMENT_TYPE', 'development' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
