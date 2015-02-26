<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'muwu');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'loveGL1314');

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
define('AUTH_KEY',         'ln-1)`~bDj]sB PMc(HsV;KMEiA$w/nV$wV(8%`<.|oX,`W;[5+[^#jMQ+mD<mN_');
define('SECURE_AUTH_KEY',  'YoGGt6C>%~}z&po@S<WFrzfr6FuwR-s(M<;`aX>^rvW~jf||&C`ME^%|0%!/<?:<');
define('LOGGED_IN_KEY',    '=dvs30tiub%FnXTL5Lms#w1)+0a0dqTH}aXzNnI-HtK V_Mmglu+N5>qwilp{|%r');
define('NONCE_KEY',        'EQ7&;JQy1;M+*tYvWJ{nz?2{l|QC!P+|6yaB;vbO(8]ZU*AO$OI]@.<|*L<FR~L%');
define('AUTH_SALT',        '(b1c|6p9KkV5M7$km{z^GRs)^l+i-`HIK|YgEz@+s+vj={_4J}<zNvc^vI1rV<.U');
define('SECURE_AUTH_SALT', 'h#[~$9 T>?(4Dtw`cn5}dlk4O ._esF&ETLdLNBsz~8cLo|^71nkxp.EO=|_5vsX');
define('LOGGED_IN_SALT',   '_P;_L_8$gyTGMIi0.m84}GuB>}-!ZO*1lcZ>c):U+G!&&-|4J:~n`;+HEWM9y#5#');
define('NONCE_SALT',       'b}5&.:yV+b)O+m8@~Fa|=mG=!yL+4/-s.ZEG?!tg)!t-_X6IxZ1@Y5eCPc2I-jMW');

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
