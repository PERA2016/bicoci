<?php
/*
*Nombre del módulo: BitacoraController
*Objetivo: Controlador para Bitacora
*Dirección física: /bicoci/controller/BitacoraController.php
*/
function Activar_Menu_Bitacora()
{
   add_submenu_page('null', 'ReporteBitacora', 'ReporteBitacora', 'manage_options', 'ReporteBitacora', 'ReporteBitacora', 'ReporteBitacora');
}
add_action('admin_menu', 'Activar_Menu_Bitacora');

function ReporteBitacora()
{
  require_once(bicoci_plugin_dir.'includes/reportesXML/reporteBitacora.php');
}