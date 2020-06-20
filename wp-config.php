<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define( 'DB_NAME', 'cetprosmp' );

/** Tu nombre de usuario de MySQL */
define( 'DB_USER', 'root' );

/** Tu contraseña de MySQL */
define( 'DB_PASSWORD', '' );

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define( 'DB_HOST', 'localhost' );

/** Codificación de caracteres para la base de datos. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', 'uK;d}v32X(]God7Q^lYA/fzrpH{63Tx@@{s|/E3XCZ98S|6-Z!2r:?b==906r[q@' );
define( 'SECURE_AUTH_KEY', '-f-]o5o2.l)Q0yXCAub(q4~Oe1OHibIIaE${7/#-g/~EEqSX*Rv>&pj-_CB^wtd ' );
define( 'LOGGED_IN_KEY', 'Twj/HjU+qKB, (&B<i+4[_8D0l:U,z)tT$HZMbP-aJgz2V:)a^0{?<{<z_N42]q/' );
define( 'NONCE_KEY', ';I/,hClw,h1AWAVhcuLP=Q.//4$W>N@F1#P s62uJgW/)<@jcHG:NQsiF5&[=Jz2' );
define( 'AUTH_SALT', 'I:=w$OHtEe>]<LiC}.<n#5/pHN:%40gfUY^dbO1}/z8WLf>bfxT|ZLU m|g<9oQG' );
define( 'SECURE_AUTH_SALT', '8LrW&EmWH*^,_ )_@anlW%m96Y^Umu?eE$6-Y(4tPmCa`+U~7E:.sF:?!mgR2kuC' );
define( 'LOGGED_IN_SALT', ')1aWmbZC)<g;`A5iUUtJS#u>ov0xiIh/3eTNZ+/W7Ogy.QXt , J`m>eOQAQ;3+[' );
define( 'NONCE_SALT', 'i<@IyRL#|Aoj<.sl==!lpAas.ATz4Kj0]=TWnXw+a`kPlZ &gj]- kA6yEvY^cx ' );

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

