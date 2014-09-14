<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress-db');

/** MySQL database username */
define('DB_USER', 'wordpress-user');

/** MySQL database password */
define('DB_PASSWORD', 'AS45gj85t');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'N_gs/%}}HH0zaO([)g:vyQw} SJPd6^j]z:rE,<%+01~1agTk.$CvV}1j?[;W=!d');
define('SECURE_AUTH_KEY',  '3oB)4G^-x(_+JRQB^ej(|!0:pk7P`B:qs+N!<N2.;7)~I=Ee?`+pe|@cIq_|{6M1');
define('LOGGED_IN_KEY',    'uo[,q!]j* %mXgu1%o<5d-S3T?vb^rQy.@,A#E%twF#Npqzt{sM-E+z+JCiS=7Q1');
define('NONCE_KEY',        's*M1eR)D)|*%b;<u]j+9hx+%)yCk0SE47/<?e>x8DmU,s!2+#MzyV-)1D3mGua`D');
define('AUTH_SALT',        'W5,oTGMQ;Jx|rOg|(*P|g2S_2pp(nx601mQJlL4]f-gaxhU?ye)w9C-U8fNJN@$D');
define('SECURE_AUTH_SALT', 'K!Ze5GO,lBN2D|1^t~mifPVr%U>~Ym| 4e4bd4ULncZExc1F[@/ erI6k:sSUdA_');
define('LOGGED_IN_SALT',   '^d1k0u.kT1a^drJIJtX;6P+*_.3[9_NScEenl}yBSM9Dj=EM}wjzk_ sK|,YIRHK');
define('NONCE_SALT',       '57W)Ys,:`]3m>{5+v~rRi+aN!R{62-_g&@qF-8YqEi@|^`WUYM#cvnL#@2iE2v1v');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
