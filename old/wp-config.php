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
define( 'DB_NAME', 'cleanodd_wp' );

/** MySQL database username */
define( 'DB_USER', 'cleanodd_wp' );

/** MySQL database password */
define( 'DB_PASSWORD', 'xWVMBaeyFR5s' );

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
define( 'AUTH_KEY',          'IA*I<9f~`-j9fiX8Tv-K%Go~m@M*b?G1r6`UAL2|9O7ViQ[sCUrEc$Wo5I5Z$#!j' );
define( 'SECURE_AUTH_KEY',   'fH5]:eU7jg{dK)gv,!c*RYD&/oc:%9Ev,3(E)33`W4 |lychYKY/Q6B]M62;f jO' );
define( 'LOGGED_IN_KEY',     'kGS*m6ztM9iqZJwH8UsK<$ppRzEU]Wn8/LmuM3`[`&NOjZ^t%C).$~ 4u9G&j`$8' );
define( 'NONCE_KEY',         ':V*X72inOdG0U[I|t!5%_.]>@/:[{]o=IrN@]`ld69S2G5kdCf$eIm]>#&q1y;Z/' );
define( 'AUTH_SALT',         '9~3s!=afX${o%@~Rf*@S!/}xv:QDf@szCz+|<LC8d(Uk1R#+Si@%lF|eZ!3Xl]]G' );
define( 'SECURE_AUTH_SALT',  'p5[nF^~*z$%>YVU(7a0]e~tgj7(k],Jr^mg~}B]V*[0$pC$v$ORX]Nz}<Rd8b%}U' );
define( 'LOGGED_IN_SALT',    '5:R{bidGVUoEVqD$fTk`onl-b4 5:W@Qxl1|b^[Ka4p==j,xp?!4~s+-S5137g{!' );
define( 'NONCE_SALT',        'h8*C.O7Xf+tkK&W$,AOXQ@EP~5s6-Cjuc@bT9I 5kpNR,h7xi#?Q,qz&+s*q(h%%' );
define( 'WP_CACHE_KEY_SALT', '`.g6tJM], I4@gCRda)MH0Q,fe5RUu6cX8+w%,lce+#F0`jJBm<-TqS[%L$xN7<}' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
