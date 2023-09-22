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


define('AUTH_KEY',         '8dpgwW5vFx1NYEnGVzjN9MnO2mLhUauC0ZmzVVy1LW2rBpm/bliPXozKrERhtFbDU7pk72EqjcdS0ZK5JBOSbg==');
define('SECURE_AUTH_KEY',  'fCko/fIzHbFK4WWE7mZ1mcgFY7wC0FgZ5jA+206TSe5ypwWuyJKt1OakVc5NBjxvhIM0fKo+MOWPutWZOt115w==');
define('LOGGED_IN_KEY',    'qY8PlcEjM0clifOXrGnQu++5DUKfT/Gi9E/6eQUOcVC/muh7tygEEdH738W+mt/vvw41XBu4ou+qOjwzBhzg6g==');
define('NONCE_KEY',        '3D8m3ky8/JFWxdME+YPY7oxyIpnzqewKfYIzk+1E3YpFukudlwVBCKWrheQPcX1EN+tNYfxVjQ0XWG5Kcz3FYA==');
define('AUTH_SALT',        'AmF9sljy/0L9PStmxI5F6vicHBF+eMZDuG2eGmdxvv/uKpbRcB623yRFfm061aNAEPucb5YTmSqQrwS6VqJnVg==');
define('SECURE_AUTH_SALT', '4OZ6S81Ge27XBeBC8zq7YS7jvObEOLMqiEweAp/IB+V/tmQuZYDTlKQWrlm1ybWmsBCAeU/JpUl3S1IwZ7PRJw==');
define('LOGGED_IN_SALT',   '8XnYBPjjRiDogC4er2bcQDxLdvdbiF/kPKrz1g+oWlq8VbNk67bCC2CfTJVXKXIkesHPG6SjoLy+A3+Xpgmx3A==');
define('NONCE_SALT',       'dPRteMO8XU32KC+Jz44NSx8wbf2z5zKhIZpm8Uy3hrVC/y5BM5gzH/6AMo7yl9Py3MmSP2MlU5ftbBr06FQJ6w==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
