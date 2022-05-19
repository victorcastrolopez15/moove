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
define( 'DB_NAME', 'moove' );

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
define( 'AUTH_KEY',         '4}fEcKTX-OBts*X.O-z(=n`te@rDHKq5_9h9-S*?h;zY!)}Iys~tq$@o^O32GsOO' );
define( 'SECURE_AUTH_KEY',  'Gdk@x0cws,1Sb9#RX)54WUA))U-qu~LXmr1!%24YEW6@db<DxZ!qA6pT=:D)w0ep' );
define( 'LOGGED_IN_KEY',    '~iUZ~=HEtx4,b7Jv:30skdRRyRw`EBKV *F+]~ZvuZ~j6_]mt!q;)McEK9J(Q:`%' );
define( 'NONCE_KEY',        'gDgTwax4GVxdM& ^>;j)dco8OLs:0=k<_]Y glhu)eDL1[1py*?kh*@g u.tad#@' );
define( 'AUTH_SALT',        '~=8R>58.qE@3&_cX,mz%-)VoSOoS T,L?RMaZw5,/e!y{bBeX1#sQ/a.*&I!Zt.q' );
define( 'SECURE_AUTH_SALT', 'E|Wbcn1`mlc&-J>^9Y.Pq#(Ebruz;(CvB6Y[{c uWtyw.q?Uy=uJN;5Yz2~c^eWd' );
define( 'LOGGED_IN_SALT',   ';.+yP9BqOac6dZxoK=}U20Nd5XSghB`Ow8FC,%4|aFh5:=(bP-}td==<y+XbNqj`' );
define( 'NONCE_SALT',       'R^Lr+@uA mD5dBKNuA<>Vz%0vI./+camhT9s9rUqh*Mg-J%j[5#(bme~w$(Sl$V,' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'pw_';

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
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
