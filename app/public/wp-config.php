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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}


define('AUTH_KEY',         'b3xpVOKRHM/+n+3USQWbu+0ly7xlnBWo7aJ7kUrqphjtht7mfVyGIhT//28xuWO3kJ2sahqq2hRkoOIHG5ZrUQ==');
define('SECURE_AUTH_KEY',  'uyvHvNLyobmIR2MlwEGqzX/Y1GKYHhXKEwCDPStoWxTqCnsIHSF4rExvqv54oje9gvug7NyiR6/oAc2yx+7oPA==');
define('LOGGED_IN_KEY',    'EkP6NtOY6VGgm92fo38pTZpd6UJFTQ3y7TQz4YZU3E2uyEIMOG1Vlx8XLZQ6E+xN3eh+zPDzg+Z+xBKBVENl8A==');
define('NONCE_KEY',        '2mLmBBMH++TeO75xFjYweTGFZAdxv7JhFRTCxN+Qc7nHC9GfzYlm9POWhQerlp1hEDa8NpYAuTS5Ksz2vSG5sw==');
define('AUTH_SALT',        'ola4gut5anTpjArLKi7GB4uwv1SSV982MuNMrU1qplVyh+xNmu/jS1vyh8b+NGBBZabaUgEMOnkzz34MQac4mw==');
define('SECURE_AUTH_SALT', '8mDHRXnEJo5zjSG9XtxN/fpVB+tckXoQnAfim3+Gqs0bkS/0JAMZAECy3xp8urP/wI0JSlNkpoB1wnWBSfIStw==');
define('LOGGED_IN_SALT',   'Kho+jcGVq2rSXvMDpF+g0+KpiduOqn4ad+btzaB69uVY37JCm2uuvahPt5B6Qf8NeP10WSGALj7ULuKDa7/9Hw==');
define('NONCE_SALT',       'qVBsvhiiM22QAyGz37KF26OBE/NPlk+nLn1Q9LPvGKVIQeQfVyz5MH89Bcab6MNVs6Fjdy0grCUkKAT5eNjHJQ==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
