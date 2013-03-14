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
define('DB_NAME', 'wordpress');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY', 'kCvl:fvLn[zG(Kb#B?nw%WS2O1%1e+Fom3[2~qS#sAJW8@f8^^ PX=[*`1V*4^U/'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', ']$124pY)VZK{ 7dE4l*yF 9z^W;QYAQ]dvzOK*`0g/g!Q/:=nv.D~y{zA8nEe GR'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'tbxX?#&^#N/+b=;eavW@M(`JwIYQemg{uD_Q76Ni$=?#7!5O&NFstH}/A>jMN%^4'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', 'hkT+dx-vq&_(A~,<UIRqw1SaA8G5]}Ls|Negyi{?616-<|z&^e(53~rrp5Ya]z`9'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', ' #8~2oQ9)C#q?<cr|G.@X2Fp1S`-FGLh!Zrvq wbP_RKZhjoQ~mm.J|oLk?1=l!^'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', '/X}n*dwu4l SHlPdE2rjTII|f(E,JV+<Q=?qx[:Z?^Kzsq)uL V$M</+;t1&OMc,'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', '86;<Tfr{K$L)b^0HB8#)>|pAjI0CtdG8EVGB3~0m|!Y- ExrP ?(1J=2PcNP>rN3'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', '9p]n%TAP-kj%3XFRl#fxSR.JM1>0RicZTNT8aL0tNKF-C{)c>(?{&K}$ V{xe)}f'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

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

