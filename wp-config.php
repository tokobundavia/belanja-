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
define( 'DB_NAME', 'db_wp1' );

/** Database username */
define( 'DB_USER', 'admin123' );

/** Database password */
define( 'DB_PASSWORD', '12345678910' );

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
define( 'AUTH_KEY',         '(Gb5nTkkD4u&Rf.dO7lXuk%bd*hkV)<#WI~h e)R=Ui!vf{Y>7uwV!|lwKuwsvt_' );
define( 'SECURE_AUTH_KEY',  '+%}9eT`5ICACY^,zVPX_[MLvdO7[HogurJ%VFwMc3GRETeRt=TOrf5~XS^[3]2z9' );
define( 'LOGGED_IN_KEY',    '.}jwUY>9:aW(cW?|dtObF*p70Yx-G{IEGh0QR`^yP>|Sr4+4W2D-,h)IfE$U[Y|m' );
define( 'NONCE_KEY',        '1>R8@F1aq@NoVh1s[,c|89dG!xQ3&D08Nj9hH.EIT<qpEz>pjcM#Ba&zYJLIELrN' );
define( 'AUTH_SALT',        '_5I)cU=#+E}`_:j}vkO0z>%|L0,wdFnw6F:V9O6lIS(IH8463TwSt^:t|Gs3E]|6' );
define( 'SECURE_AUTH_SALT', '%/2-BnvE`!Lh22$iV!&{L{zV@+uXUh~et7gY0!_bx1zC]UnByO40P7uB.cO`P_Y9' );
define( 'LOGGED_IN_SALT',   'JeUx4oR@[R[J_>%+&>3W $OC_<}{xke7D},6,9o{Es& {U8oek]o4rk=1lDVmyZX' );
define( 'NONCE_SALT',       'Pw7Ypw[>K*:w]|`kQ@a:8%F^UHmJ)h.?u{UKR#k1CGyc)wd{.;u<4Z#6_QVI6BHp' );

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
