<?php
define( 'WP_CACHE', true );

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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'flexitApp_1790264611' );

/** MySQL database username */
define( 'DB_USER', 'flexitApp_1790264611' );

/** MySQL database password */
define( 'DB_PASSWORD', 'HulDGWH9pR3SZ0dmCWk51zVLii8k8QVa0krCMgpsdD8IDUPdzguns' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'mf6YipucYqL3JfZ3pW0NFoENQhDuIOWzGAZk3aMmAC05QX6UkfwdZ16My1A1fV6D' );
define( 'SECURE_AUTH_KEY',   'pFZHEWO1AjuXWI38GfR1t1onsoO5g315yFH7i2hwE7ML7bWDWl9JLSlq165T16sA' );
define( 'LOGGED_IN_KEY',     'PNxbl5Eu4K97frOGvp6bbn1ZnZtg165TocDKxhnXqy47utkw14095ACoCNxvvu76' );
define( 'NONCE_KEY',         'pjWVt1Y83FU3VNm7gfQpznkisuoia5QPY2jJuIi2q4gO47qDCmqjEbho0nZH60dK' );
define( 'AUTH_SALT',         'mOEB0tq575rZdSRoMqenLWFC689BO7uWBZ67viLnYThS0Xz5rk3rzGkzUeG1NYD8' );
define( 'SECURE_AUTH_SALT',  'N0cF13g92C9Ics1GO74dwR911xf2L6rLRZDZ6MnRQXvgaNY1HlFKHnNL48pYhfKp' );
define( 'LOGGED_IN_SALT',    'W4h2yaafSO6Iv7BfZp7iHSOVCvTKNhaG0nLmt7gG15g8k4GDOUk1f3wyGEt608Nl' );
define( 'NONCE_SALT',        '2XxtMs94mM0VRxk2FkjaKu0ihv9O5s54fofjhXz5s86L8pldN5LgwEpS0yimzHXt' );
define( 'WP_CACHE_KEY_SALT', 'Y8pKMobwUEfh3v0EGt2UOpP7pB85pbFOBTu5wMjyj6pC9OdXhZ5vgWdHSv9jwXDi' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




define( 'RCWP_REDIS_PASSWORD', ["flexit-app49761","bJe7RWxM9G2h0teT"] );
define( 'RCWP_REDIS_DOMAIN', 'flexit-app-rcredis:' );
define( 'LSOC_PREFIX', 'flexit-app-rcredis:' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

