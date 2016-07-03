<?php
/*
Plugin Name: BICOCI
Plugin URI: http://bicoci.site88.net
Description: Biblioteca virtual de departamento de comunicaciones y ciencias de la computacion
Version: 1.0
Author: Alumno PERA
Author URI: http://bicoci.site88.net
Text Domain: bicoci
*/
define('bicoci_plugin_dir', plugin_dir_path(__FILE__));
define('INDEX', __FILE__);
require_once(bicoci_plugin_dir.'/includes/SoloUnaCategoria.php');
require_once(bicoci_plugin_dir.'/controller/LibroController.php');
require_once(bicoci_plugin_dir.'/controller/RevistaController.php');
require_once(bicoci_plugin_dir.'/controller/HemerotecaController.php');
require_once(bicoci_plugin_dir.'/controller/PapersController.php');
require_once(bicoci_plugin_dir.'/controller/VideotecaController.php');

require_once(bicoci_plugin_dir.'/includes/EstadoComunicado.php');

require_once(bicoci_plugin_dir.'/includes/ImagenRequerida.php');

require_once(bicoci_plugin_dir.'/includes/Admin.php');

require_once(bicoci_plugin_dir.'/includes/MensajeComunicados.php');