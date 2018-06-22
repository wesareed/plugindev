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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define('AUTH_KEY',         'W7RIeJj1Ez2s19cA1UDUPewSx0DsFDroXaLMcKJ5jAW0+5vISJmvQnA39djHHojGcTJc8N6crCFvQaag1az8zw==');
define('SECURE_AUTH_KEY',  'n1Z4AkGa/Bul3nojJjK6ObDNznxDmChdPoFs4Tg3WJEQaNBHK+vQ5DX0//vnFZYOvDpkMerOkL2riujwhZkVdQ==');
define('LOGGED_IN_KEY',    'AhBKMZ+F63c45qjP0AiroY5XA3aAORza3/SSCjdIK46PdCcsJsv9ndpjkaa0/wvHlMnLRfOVQuFGhesQU0IlRQ==');
define('NONCE_KEY',        'vJsdhQWWTdkiZoOi91qnDciCXoVHsiZQYUxNkbjPqbkqvmAW6ka7bmaHKRUhfQZPY5sd8PybhDcC3lgVxaRE5g==');
define('AUTH_SALT',        'VKJMSzPjb6mi2Ik8v1NeQOByRBjit4VU9ayGorRVKzLE2jMFU0O40NCX6sbfNtrGTtBAeyD/HOGaqaSDBX3BKg==');
define('SECURE_AUTH_SALT', '9+NeMJ8YjavQU/t75k+HvGUBbrQz4NNDCnNOzIdcXfqiFHEUznvKwzbcaDGG0ruauTG2NHW9ceRi3neRlin99Q==');
define('LOGGED_IN_SALT',   'dS9A6x+1Q4XFUS+6tLL173ZbDEolwQGv3Kan0EREmUhBayYFh1YfuQv5zoQEBWotsfxTxy/DvQ7XjqStp60u+w==');
define('NONCE_SALT',       'fGcjG4mYCN+F1KDSnH8chugCFm1c3BW60XRyosbW2MB62gGziZtaVtr4IMwLuSK21asipbzi4ShCodSquksQ3Q==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}

/* Inserted by Local by Flywheel. Fixes $is_nginx global for rewrites. */
if ( ! empty( $_SERVER['SERVER_SOFTWARE'] ) && strpos( $_SERVER['SERVER_SOFTWARE'], 'Flywheel/' ) !== false ) {
	$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.10.1';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
