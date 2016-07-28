<?php
/*
*Nombre del módulo: BitacoraController
*Objetivo: Controlador para Bitacora
<<<<<<< 24c28b4c2210010a9014a5b5cef88f64d7ff8759
*Dirección física: /SIGOES-Comunicados/controller/BitacoraController.php
*/
function Activar_Menu_Bitacora()
{
   
=======
*Dirección física: /bicoci/controller/BitacoraController.php
*/
function Activar_Menu_Bitacora()
{
>>>>>>> b22bf0312604e9dd1610d62e37ef976bdcfde71b
   add_submenu_page('null', 'ReporteBitacora', 'ReporteBitacora', 'manage_options', 'ReporteBitacora', 'ReporteBitacora', 'ReporteBitacora');
}
add_action('admin_menu', 'Activar_Menu_Bitacora');

function ReporteBitacora()
{
  require_once(bicoci_plugin_dir.'includes/reportesXML/reporteBitacora.php');
}