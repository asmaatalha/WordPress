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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '=8A2~8rblWu:&d;S20BYnlZ|5;4#uLXoFE$6Zc@@dKPtInY{*nC)0|97W!Ew3[S`' );
define( 'SECURE_AUTH_KEY',  '5#0c(Zs1$>85Bh{#&?-uB*Ki3F*ys{S9aFP{?An6c(O*M(o3IR)4q}=N7[bZQ#A!' );
define( 'LOGGED_IN_KEY',    '-;BJR3d~#j[q6OKpflxBQTeB:4!PN<:]Qp+ <;pW+t1l%5ZwZ&U:1,]0mA{h,P/&' );
define( 'NONCE_KEY',        '/QU>YX?twb2x>DhGYX3;;CDFbQC~/K3x{_5+nH%%R,$%z18^mul12i<K|h8zG.y1' );
define( 'AUTH_SALT',        'dF])+}uT<F(IB1wqosjoB(6>4&D] E%bp6i!Vo#%vX^I2W@{SHSBpCV.3^*E!,pf' );
define( 'SECURE_AUTH_SALT', 'k{MdfG|NNQK[/$Nc!dn E0/$LEE?B4u:|G/<IT]G=}{@O9#.E/JzvU^!_g=~6-t]' );
define( 'LOGGED_IN_SALT',   'iO&ZCa[V%a?{BAjYPf}B~P_X5/FJZZ9^;Qg^>[rb8V#KwB:1+pUJ5|3E>eaWXli/' );
define( 'NONCE_SALT',       'zV?X0GDu|=3#Ba#Kl9VxN-JLf&Hb,IP=OCcIkM->nr]3e%Tv6mM%R:X^U{|/L1+h' );

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
