<?php
class ComunicadoVista 
{
	
	function __construct()
	{
		# code...
	}
	public function RenderAyudaComunicado(  ) {
 // $contextual_help .= var_dump( $screen ); // use this to help determine $screen->id
  		function Ayuda($contextual_help, $screen_id, $screen){
		 global $pagenow;

  switch ($screen->id) {
    //Control de Ayuda para Libros
    case 'libro':
       //Ayuda Para Editar un Libro
      if ( in_array( $pagenow, array( 'post.php' ))&& $screen->id=='libro'  )
      {
         $contextual_help =
          '<p><strong>Agregar Nuevo: </strong> publicar un nuevo libro.</p>' .
          '<p><strong>Estado: </strong> cambiar el estado de la publicación del libro.</p>' .
          '<p><strong>Publicado el: </strong> programar publicación en la fecha y hora seleccionada.</p>' .
          '<p><strong>Actualizar: </strong> guardar los cambios realizados al libro.</p>' .
          '<p><strong>Asignar imagen destacada: </strong> permite asignar una imagen para el libro (obligatoria).</p>' .
          '<p><strong>Contenido: </strong>Debe ingresar la direccion url a la que sera redireccionado el visitante y que contiene la información del libro.</p>' 
           ;
      
            
      }elseif (in_array( $pagenow, array( 'post-new.php' ))&& $screen->id=='libro') {
          //Ayuda Para Nuevo Libro.
          $contextual_help =
           '<p><strong>Guardar Borrador: </strong>guardar el libro como borrador sin publicarlo.</p>'.
           '<p><strong>Estado: </strong>cambiar el estado de la publicación del libro.</p>'.
           '<p><strong>Publicar inmediatamente: </strong> programar publicación automatica en la fecha y hora seleccionada.</p>'.
           '<p><strong>Publicar: </strong> Opcion de publicar un libro.</p>'.
           '<p><strong>Asignar imagen destacada: </strong> permite asignar una imagen para el libro (obligatoria).</p>'.
           '<p><strong>Contenido: </strong>Debe ingresar la dirección url a la que sera redireccionado el visitante y que contiene la información del libro.</p>'
           ;        
      }
      return $contextual_help;
    break;
    case 'edit-libro':
      if ( in_array( $pagenow, array( 'edit.php' ) ) && $screen->id=='edit-libro')
        {
          //Ayuda Para Lista Libro.
        $contextual_help =
          '<p><strong>Agregar Nuevo: </strong> Agregar un nuevo libro.</p>' .
          '<p><strong>Todos: </strong> listar todos los libros.</p>' .
          '<p><strong>Mios: </strong> listar todos los libros del usuario logueado.</p>' .
          '<p><strong>Publicadas: </strong> listar todos los libros publicados.</p>' .
          '<p><strong>Borradores: </strong> listar todos los libros guardados como borrador.</p>' .
          '<p><strong>Papelera: </strong> listar todos los libros en la Papelera.</p>' .
          '<p><strong>Cancelados: </strong> listar todos los libros cancelados.</p>' .
          '<p><strong>Buscar Libro: </strong> listar todos los libros cancelados.</p>' .
          '<p><strong>Acciones en lote: </strong> permite realizar acciones para todos los libros seleccionados.</p>' .
          '<p><strong>Ver: </strong> Vista previa del contenido del libro publicado.</p>' .
          '<p><strong>Vista previa: </strong> Vista previa del contenido del libro.</p>' .
          '<p><strong>Restaurar: </strong> restaurar un libro a su estado anterior</p>' .
           '<p><strong>Borrar permanentemente: </strong>Borrar un libro sin posibilidad de restaurarlo.</p>' 
           ;
      }
      return $contextual_help;
    break;
///////////////////////////////////////////////////////////////////////////////////
 case 'revista':
       //Ayuda Para Editar una Revista
      if ( in_array( $pagenow, array( 'post.php' ))&& $screen->id=='revista'  )
      {
         $contextual_help =
          '<p><strong>Agregar Nueva: </strong> publicar una nueva revista.</p>' .
          '<p><strong>Estado: </strong> cambiar el estado de la publicación de revista.</p>' .
          '<p><strong>Publicada el: </strong> programar publicación en la fecha y hora seleccionada.</p>' .
          '<p><strong>Actualizar: </strong> guardar los cambios realizados a la revista.</p>' .
          '<p><strong>Contenido: </strong>Debe ingresar la direccion url a la que sera redireccionado el visitante y que contiene la informacion de la revista.</p>' 
           ;
      }elseif (in_array( $pagenow, array( 'post-new.php' ))&& $screen->id=='revista') {
          //Ayuda Para Nueva Revista.
         $contextual_help =
           '<p><strong>Guardar Borrador: </strong>guardar la revista como borrador sin publicarlo.</p>'.
           '<p><strong>Estado: </strong>cambiar el estado de la publicación de la revista.</p>'.
           '<p><strong>Publicar inmediatamente: </strong> programar publicación automática en la fecha y hora seleccionada.</p>'.
           '<p><strong>Publicar: </strong> Opción de publicar una revista.</p>'.
           '<p><strong>Contenido: </strong>Debe ingresar la dirección url a la que sera redireccionado el visitante y que contiene la informacion de la revista.</p>'
           ;            
      }
      return $contextual_help;
    break;
case 'edit-revista':
      if ( in_array( $pagenow, array( 'edit.php' ) ) && $screen->id=='edit-revista')
        {
          //Ayuda Para Lista Revista.
        $contextual_help =
          '<p><strong>Agregar Nueva: </strong> Agregar un nueva revista.</p>' .
          '<p><strong>Todos: </strong> listar todas las revistas.</p>' .
          '<p><strong>Mios: </strong> listar todas las revistas del usuario logueado.</p>' .
          '<p><strong>Publicadas: </strong> listar todas las revistas publicadas.</p>' .
          '<p><strong>Borradores: </strong> listar todas las revistas guardadas como borrador.</p>' .
          '<p><strong>Papelera: </strong> listar todas las revistas en la Papelera.</p>' .
          '<p><strong>Cancelados: </strong> listar todas las revistas canceladas.</p>' .
          '<p><strong>Buscar Revista: </strong> listar todas las revistas canceladas.</p>' .
          '<p><strong>Acciones en lote: </strong> permite realizar acciones para todas las revistas seleccionadas.</p>' .
          '<p><strong>Ver: </strong> Vista previa del contenido de la revista publicado.</p>' .
          '<p><strong>Vista previa: </strong> Vista previa del contenido de la revista.</p>' .
          '<p><strong>Restaurar: </strong> restaurar una revista a su estado anterior.</p>' .
           '<p><strong>Borrar permanentemente: </strong>Borrar una revista sin posibilidad de restaurarlo.</p>' 
           ;
      }
      return $contextual_help;
    break;
case 'hemeroteca':
       //Ayuda Para Editar Hemeroteca
      if ( in_array( $pagenow, array( 'post.php' ))&& $screen->id=='hemeroteca'  )
      {
         $contextual_help =
          '<p><strong>Agregar Nueva: </strong> publicar una nueva hemeroteca.</p>' .
          '<p><strong>Estado: </strong> cambiar el estado de la publicación de la hemeroteca.</p>' .
          '<p><strong>Publicada el: </strong> programar publicación en la fecha y hora seleccionada.</p>' .
          '<p><strong>Actualizar: </strong> guardar los cambios realizados a la hemeroteca.</p>' .
          '<p><strong>Contenido: </strong>Debe ingresar la dirección url a la que sera redireccionado el visitante y que contiene la informacion de la hemeroteca.</p>' 
           ;
      }elseif (in_array( $pagenow, array( 'post-new.php' ))&& $screen->id=='hemeroteca') {
          //Ayuda Para Nuevo Hemeroteca.
         $contextual_help =
           '<p><strong>Guardar Borrador: </strong>guardar la hemeroteca como borrador sin publicarlo.</p>'.
           '<p><strong>Estado: </strong>cambiar el estado de la publicación de la hemeroteca.</p>'.
           '<p><strong>Publicar inmediatamente: </strong> programar publicación automática en la fecha y hora seleccionada.</p>'.
           '<p><strong>Publicar: </strong> Opción de publicar una hemeroteca.</p>'.
           '<p><strong>Contenido: </strong>Debe ingresar la direccion url a la que sera redireccionado el visitante y que contiene la informacion de la hemeroteca.</p>'
           ;            
      }
      return $contextual_help;
    break;
case 'edit-hemeroteca':
      if ( in_array( $pagenow, array( 'edit.php' ) ) && $screen->id=='edit-hemeroteca')
        {
          //Ayuda Para Lista Hemeroteca.
        $contextual_help =
          '<p><strong>Agregar Nueva: </strong> Agregar una nueva hemeroteca.</p>' .
          '<p><strong>Todos: </strong> listar toda la hemeroteca.</p>' .
          '<p><strong>Mios: </strong> listar toda la hemeroteca del usuario logueado.</p>' .
          '<p><strong>Publicadas: </strong> listar toda la hemeroteca publicadas.</p>' .
          '<p><strong>Borradores: </strong> listar toda la hemeroteca guardadas como borrador.</p>' .
          '<p><strong>Papelera: </strong> listar toda la hemeroteca en la Papelera.</p>' .
          '<p><strong>Cancelados: </strong> listar toda la hemeroteca canceladas.</p>' .
          '<p><strong>Buscar Hemeroteca: </strong> listar toda la hemerotecas canceladas.</p>' .
          '<p><strong>Acciones en lote: </strong> permite realizar acciones para toda la hemerotecas seleccionadas.</p>' .
          '<p><strong>Ver: </strong> Vista previa del contenido de la hemeroteca publicada.</p>' .
          '<p><strong>Vista previa: </strong> Vista previa del contenido de la hemeroteca.</p>' .
          '<p><strong>Restaurar: </strong> restaurar una hemeroteca a su estado anterior</p>' .
          '<p><strong>Borrar permanentemente: </strong>Borrar una hemeroteca sin posibilidad de restaurarla.</p>' 
           ;
      }
      return $contextual_help;
    break;
case 'papers':
       //Ayuda Para Editar un Papers
      if ( in_array( $pagenow, array( 'post.php' ))&& $screen->id=='papers'  )
      {
         $contextual_help =
          '<p><strong>Agregar Nuevo: </strong> publicar un nuevo paper.</p>' .
          '<p><strong>Estado: </strong> cambiar el estado de la publicación del paper.</p>' .
          '<p><strong>Publicada el: </strong> programar publicación en la fecha y hora seleccionada.</p>' .
          '<p><strong>Actualizar: </strong> guardar los cambios realizados al paper.</p>' .
          '<p><strong>Asignar imagen destacada: </strong> permite asignar una imagen para el paper (opcional).</p>' .
          '<p><strong>Contenido: </strong>Debe ingresar la direccion url a la que sera redireccionado el visitante y que contiene la informacion del paper.</p>' 
           ;         
      }elseif (in_array( $pagenow, array( 'post-new.php' ))&& $screen->id=='papers') {
          //Ayuda Para Nuevo Papers.
          $contextual_help =
           '<p><strong>Guardar Borrador: </strong>guardar el paper como borrador sin publicarlo.</p>'.
           '<p><strong>Estado: </strong>cambiar el estado de la publicación del paper.</p>'.
           '<p><strong>Publicar inmediatamente: </strong> programar publicación automatica en la fecha y hora seleccionada.</p>'.
           '<p><strong>Publicar: </strong> Opción de publicar un paper.</p>'.
           '<p><strong>Asigmar imagen destacada: </strong> permite asignar una imagen para el paper (opcional).</p>'.
           '<p><strong>Contenido: </strong>Debe ingresar la direccion url a la que sera redireccionado el visitante y que contiene la informacion del paper.</p>'
           ;        
      }
      return $contextual_help;
    break;
    case 'edit-papers':
      if ( in_array( $pagenow, array( 'edit.php' ) ) && $screen->id=='edit-papers')
        {
          //Ayuda Para Lista Papers.
        $contextual_help =
          '<p><strong>Agregar Nuevo: </strong> Agregar un nuevo paper.</p>' .
          '<p><strong>Todos: </strong> listar todos los papers.</p>' .
          '<p><strong>Mios: </strong> listar todos los papers del usuario logueado.</p>' .
          '<p><strong>Publicadas: </strong> listar todos los papers publicados.</p>' .
          '<p><strong>Borradores: </strong> listar todos los papers guardados como borrador.</p>' .
          '<p><strong>Papelera: </strong> listar todos los papers en la Papelera.</p>' .
          '<p><strong>Cancelados: </strong> listar todos los papers cancelados.</p>' .
          '<p><strong>Buscar Paper: </strong> listar todos los papers cancelados.</p>' .
          '<p><strong>Acciones en lote: </strong> permite realizar acciones para todos los papers seleccionados.</p>' .
          '<p><strong>Ver: </strong> Vista previa del contenido del paper publicado.</p>' .
          '<p><strong>Vista previa: </strong> Vista previa del contenido del paper.</p>' .
          '<p><strong>Restaurar: </strong> restaurar un paper a su estado anterior</p>' .
           '<p><strong>Borrar permanentemente: </strong>Borrar un paper sin posibilidad de restaurarlo.</p>' 
           ;
      }
      return $contextual_help;
    break;
case 'dashboard':
      if ( in_array( $pagenow, array( 'index.php' ) ) && $screen->id=='dashboard')
        {
          //Ayuda Para Lista Escritorio.
         $screen->remove_help_tabs();
         if ( !current_user_can('delete_others_posts')) {
             $contextual_help =
           '<p><strong>Escritorio: </strong>pantalla principal del BICOCI.</p>'.
           '<p><strong>Publicas: </strong>Accede a publicar publicaciones segun rol.</p>'.
           '<p><strong>Perfil: </strong> gestionar opciones de credenciales.</p>'
           ;
          } else {
            $contextual_help = "";
          $contextual_help =
           '<p><strong>Escritorio: </strong>pantalla principal del BICOCI.</p>'.
           '<p><strong>Libros: </strong>gestionar la publicación de libros de EISI.</p>'.
           '<p><strong>Revistas Cientifica: </strong> gestionar la publicación de revistas cientificas.</p>'.
           '<p><strong>Hemeroteca: </strong>gestionar la hemeroteca de la EISI.</p>'.
           '<p><strong>Papers: </strong> gestionar la publicación de papers de la EISI.</p>'.
           '<p><strong>Asignar Rol-Usuarios: </strong>gestionar los usuarios y permisos de BICOCI.</p>'.
           '<p><strong>Bitacora: </strong> obtener las acciones que realizan los usuarios en el BICOCI.</p>'.
           '<p><strong>Apariencia: </strong> configurar opciones heredadas de Wordpress.</p>'.
           '<p><strong>Plugins: </strong> agregar nuevas caracteristicas al sistema por medio de plugins.</p>'.
           '<p><strong>Usuarios: </strong> gestionar usuarios y roles.</p>'
           ;   
          }
      }
      return $contextual_help;
    break;
case 'toplevel_page_aam':
      if ( in_array( $pagenow, array( 'admin.php' ) ) && $screen->id=='toplevel_page_aam')
        {
          //Ayuda Para Lista Usuarios.
        // $screen->remove_help_tabs();
          $contextual_help = "";
        $contextual_help =
           '<p><strong>Menu Administración : </strong>Configurar los elementos de acceso por rol de usuario.</p>'.
           '<p><strong>Capacidades: </strong>acciones que puede realizar un usuario segun rol establecido .</p>'.
           '<p><strong>Panel de control: </strong> Guardar los cambios realizados a un rol.</p>'.
           '<p><strong>Panel de Administración: </strong>Gestión de roles y usuarios.</p>'
            ;   
      }
      return $contextual_help;
    break; 
case 'toplevel_page_wp_stream':
      if ( in_array( $pagenow, array( 'admin.php' ) ) && $screen->id=='toplevel_page_wp_stream')
        {
          //Ayuda Para Bitacora.
         $screen->remove_help_tabs();
          $contextual_help = "";
        $contextual_help =
           '<p><strong>Exportar: </strong>exportar PDF.</p>'.
           '<p><strong>Todas las fechas: </strong>filtrar bitácora por fecha.</p>'.
           '<p><strong>Filtrar por users: </strong>filtrar bitácora por usuario.</p>'.
           '<p><strong>Filtrar por contexts: </strong>filtrar bitácora por lugar de modificación.</p>'.
           '<p><strong>Filtrar por actions: </strong> filtrar bitácora por acciones realizadas en el BICOCI.</p>'.
           '<p><strong>Filtrar por IP: </strong>filtrar bitacora por IP.</p>'.
           '<p><strong>Filtro: </strong> Aplicar las opciones del filtro.</p>'.
           '<p><strong>Buscar en actividad: </strong> filtrar bitacora por actividad.</p>'.
           '<p><strong>Restablecer filtros: </strong> restablecer filtros de busqueda.</p>'
           ;   
      }
      return $contextual_help;
    break;                       
///////////////////////////////////////////////////////////////////////////////////
    default:
    # code...
    break;
  }
}//fin Ayuda
add_action('contextual_help','Ayuda', 10, 3 );

}//Fin RenderAyudaComunicado
}// Fin class ComunicadoVista 
?>