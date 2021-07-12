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
define( 'DB_NAME', 'mskinclinic' );

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
define( 'AUTH_KEY',         '?j2LFA]Pi)`1F+(G8vQ=Y@E;(`Jjdj$RF%<L]A2IlO;y$ej0Eu}TOl(Ojzk _Vo ' );
define( 'SECURE_AUTH_KEY',  'gA$k1JkiU@:TY^dxO=Gj]o7/@Hq}Zp+Mfqg:)A~Eo`p1?ET/:l5{VN}6ioT*oaV9' );
define( 'LOGGED_IN_KEY',    'rR8!-ps<.d{PFepI+I:VEF.mAm5pVVaRv,=`Xu]OYr|Kz>aPfz/; E{#j`X{:F9g' );
define( 'NONCE_KEY',        ' u7J  AH9<*kceIMzy$dk}eEFfVjNW$2^P>:FYpQ/jWZ/xcf$._3E~qm5.;$_rk.' );
define( 'AUTH_SALT',        'tpsdSz~tHK8KpBjfq.F)6`J b_J~$7-  Yz/N>zyDj0+XDz2M&Dp#[$Ywn~?(+{ ' );
define( 'SECURE_AUTH_SALT', 'bx:5qlRL*#Tz8|8OOJ5c8J|5A3s(: @#*`h,P=KsZ] 3~[y{r:0nvaU]7Z;a1ya ' );
define( 'LOGGED_IN_SALT',   'NFvEQYSe<Ga#O7I4d4NX;?3DB)1aEvUPt$b<Mt#.jJ4KtIKN%gmG<m8#NC4z@;8^' );
define( 'NONCE_SALT',       'R8E6 )EEHd.%D$Jjg%t7iP?y:o?Flv3O_*Vz{Jy9!m>b^EVT+GR0Jhaxw(PY0otc' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'msc_';

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
